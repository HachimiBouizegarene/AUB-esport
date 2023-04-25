<?php
namespace Controller;

use Exception;
use View\View;
use Model\UtilisateurManager;
use Helper\JWT;

class ControllerEspaceMembre{

    private JWT $JWT;
    private UtilisateurManager $utilisateurManager;

    public function __construct($url)
    {   
        $this->utilisateurManager = new UtilisateurManager();
        $this->JWT = new JWT();

        

        if(!isset($_COOKIE['connect_token'])){
            header("Location: ".URL."connexion");
        }
        if(!$this->JWT->check($_COOKIE['connect_token'], $_ENV['SECRET_JWT'])){
            setcookie('connect_token', "", time()-3600);
            header("Location: ".URL."connexion");
        }

        $id = $this->JWT->getId($_COOKIE['connect_token']);
        if($id !==false){
            $utilisateur = $this->utilisateurManager->getUtilisateur($id);
        }

        $nbParametresMax = 1;
        if(isset($url) && count($url)>$nbParametresMax){
            throw new Exception("Page introuvable");
        }else{
            $view = new View('EspaceMembre', 'Espace Membre', 'espace_membre', 'espace_membre');
            $view->generate(['utilisateur' => $utilisateur]);
        }
    }
}