<?php
namespace Controller;

use Exception;
use View\View;
use Model\UtilisateurManager;
use Helper\JWT;


class ControllerConnexion{

    private UtilisateurManager $utilisateurManager;
    private JWT $JWT;

    public function __construct($url)
    {
        $this->JWT = new JWT();
        $this->utilisateurManager = new UtilisateurManager();

        $error = "";
        $nbParametresMax = 1;

        // Vérifier si l'URL contient plus de paramètres que le maximum autorisé
        if(isset($url) && count($url) > $nbParametresMax){
            throw new Exception("Page introuvable");
        }

        // Vérifier si l'utilisateur est déjà connecté
        if(isset($_COOKIE['connect_token']) ){
            if($this->JWT->check($_COOKIE['connect_token'], $_ENV['SECRET_JWT'])){
                header("Location: ".URL."EspaceMembre");
                return;
            }else{
                setcookie('connect_token', "", time()-3600);
            }
            
        }

        // Vérifier si l'utilisateur a soumis le formulaire de connexion
        if(sizeof($_POST) > 0){
            $response = $this->utilisateurManager->verifyCoords($_POST['mail'], $_POST['mdp']);

            // Vérifier si les identifiants de connexion sont valides
            if(is_int($response)){
                $id = $response;
                $this->connectUser($id);
                header("Location: ".URL."EspaceMembre");
                return;
            }else{
                $error = $response;
            }
        }

        // Afficher la vue de connexion
        $view = new View('Connexion', 'Connexion', 'connexion', 'connexion');
        $view->generate(['error'=> $error]);
    }

    // Méthode pour générer un token JWT et définir un cookie d'authentification
    public function connectUser($id){
        $header = [
            "typ"=> "JWT",
            "alg"=> "HS256"
        ];
        
        $payload = [
            "id" => $id
        ];
        $durationToken = 20;
        // 60 * 60 * 24 *30
        $token = $this->JWT->generate($header, $payload,$_ENV['SECRET_JWT'], $durationToken);
        setcookie("connect_token", $token, time() + $durationToken);
    }
}