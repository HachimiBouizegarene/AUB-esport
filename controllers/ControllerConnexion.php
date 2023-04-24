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

        $nbParametresMax = 1;
        if(isset($url) && count($url)>$nbParametresMax){
            throw new Exception("Page introuvable");
        }else{
            
            if(sizeof($_POST)>0){
                $response = $this->utilisateurManager->verifyCoords($_POST['mail'], $_POST['mdp']);
                if(is_int($response)){
                    $id = $response;
                    $this->connectUser($id);
                }else{
                    var_dump('erreur : '.$response);
                }
            }
            $view = new View('Connexion', 'Connexion', 'connexion');
            $view->generate([]);
        }

    }


    public function connectUser($id){
        $header = [
            "typ"=> "JWT",
            "alg"=> "HS256"
        ];
        
        $payload = [
            "id" => $id
        ];

        // var_dump($this->JWT->generate($header, $payload, "4uB_E4sp0rt933oo@", 20));
        //faire la suite ici
    }
}