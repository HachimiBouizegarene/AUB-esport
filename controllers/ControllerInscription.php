<?php
namespace Controller;

use Exception;
use View\View;
use Model\Utilisateur;
use Model\UtilisateurManager;

class ControllerInscription{

    private UtilisateurManager $utilisateurManager;

    public function __construct($url)
    {
        $this->utilisateurManager = new UtilisateurManager();

        $nbParametresMax = 1;
        if(isset($url) && count($url)>$nbParametresMax){
            throw new Exception("Page introuvable");
        }else{
            //inscription
            $error = "";
            if(count($_POST) > 0){
                $register = $this->register();
                $error = $register === true ? false : $register;
            }
            $view = new View('Inscription', 'Inscription', 'inscription', 'inscription');
            $view->generate(['error'=> $error== false ? "" : $error]);
        }
    }


    public function register(){
        $data = ['nom' =>  $_POST['nom'], 'prenom'=>  $_POST['prenom'], 'dateNaiss'=>  $_POST['dateNaiss'], "sexe" =>  $_POST['sexe'],
        'mail' =>  $_POST['mail'], 'mdp'=> $_POST['mdp']];
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

        try{  
            $utilisateur = new Utilisateur($data);
            $this->utilisateurManager->register($utilisateur);
            return true;
        }catch(Exception $e){
            return "Erreur avec le serveur, veuillez reesayer plus tard !";
        }
    }
}