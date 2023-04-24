<?php
namespace Controller;

use Exception;
use View\View;

class ControllerConnexion{
    public function __construct($url)
    {
        $nbParametresMax = 1;
        if(isset($url) && count($url)>$nbParametresMax){
            throw new Exception("Page introuvable");
        }else{
            $view = new View('Connexion', 'Connexion', 'connexion');
            $view->generate([]);
        }
    }
}