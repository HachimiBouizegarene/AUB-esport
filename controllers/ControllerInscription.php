<?php
namespace Controller;

use Exception;
use View\View;
use Model\Utilisateur;
use Model\UtilisateurManager;
use Service\EmailManager;

class ControllerInscription{

    private UtilisateurManager $utilisateurManager;
    private EmailManager $emailManager;

    public function __construct($url)
    {
        $this->utilisateurManager = new UtilisateurManager();
        $this->emailManager = new EmailManager();

        $nbParametresMax = 2;
        if(isset($url) && count($url)>$nbParametresMax){
            throw new Exception("Page introuvable");
        }else{

            if(count($url)==1){
               $this->principalePage();
            }
            elseif(count($url)==2){
                if($url[1]==="confirmation"){
                    $this->confirmationMailPage();
                }
                else{
                    throw new Exception("Page introuvable");
                }
            }
            else{
                throw new Exception("Page introuvable");
            }
            
        }
    }


    public function confirmationMailPage(){
        $error = "";
        if(!$_SESSION['mailConf']){
            header("Location: ".URL."Accueil");
            exit;
        }
        if(isset($_POST['codeConf'])){
            $verif = $this->utilisateurManager->verifCodeConfMail($_SESSION['mailConf'], $_POST['codeConf']);
            if($verif === false){
                $error = "Le code de confirmation n'est pas valide";
            }else{
                header("Location: ".URL."Connexion");
                exit;
            }
        }
        $view = new View('ConfirmationMail', 'Confirmation mail', 'confirmationMail', 'confirmationMail');
        $view->generate(['error'=>$error]);

    }

    public function principalePage(){
        $error = "";
        if(count($_POST) > 0){
            $register = $this->register();
            $error = $register === true ? false : $register;
            if($error == false){
                $_SESSION['mailConf'] = $_POST['mail'];
                header("Location: ".URL."Inscription/confirmation");
                exit;
            }
        }
        $view = new View('Inscription', 'Inscription', 'inscription', 'inscription');
        $view->generate(['error'=> $error== false ? "" : $error]);
    }


    public function register(){
        try{  
            $codeVerif = rand(1000000, 9999999);

            $data = ['nom' =>  $_POST['nom'], 'prenom'=>  $_POST['prenom'], 'dateNaiss'=>  $_POST['dateNaiss'], "sexe" =>  $_POST['sexe'],
            'mail' =>  $_POST['mail'], 'mdp'=> $_POST['mdp'], "codeVerif"=> $codeVerif];
            $mdpConf = $_POST['mdpConf'];
    
            //verifeir que touts les champs sont remplis
            foreach($data as $key=>$value){
                if($value == "" | $value == null){
                    return "Veuillez remplir tous les champs";
                }
            }
            //verifier que le mail est valide et pas deja enregistree
            if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
                return "Le mail n'est pas valide";
            }
            if($this->utilisateurManager->mailExist($data['mail'])){
                return "Ce mail est deja utilisee";
            }
    
            //verifier que les mots de passe correspondent
            if($data['mdp'] !== $mdpConf){
                return "les mots de passe ne correspondent pas";
            }
    
            //verifier que le mot de pass est assez long
            if(strlen($data['mdp'])<8){
                return "le mot de passe est trop court";
            }


            $utilisateur = new Utilisateur($data);
            $this->utilisateurManager->register($utilisateur);
            $confirmationMail = $this->emailManager->sendConfirmationMail($utilisateur->getMail(), $codeVerif);
            if($confirmationMail){
                return true;
            }else{
                $this->utilisateurManager->delete($utilisateur);
                throw new Exception("Erreure lors de l'envoi du mail");
            }
        }catch(Exception $e){
            return "Erreur avec le serveur, veuillez reesayer plus tard !";
        }
    }
}