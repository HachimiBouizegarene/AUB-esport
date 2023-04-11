<?php
namespace Controller;

use Exception;
use View\View;

class ControllerInscription{
    public function __construct($url)
    {
        $nbParametresMax = 1;
        if(isset($url) && count($url)>$nbParametresMax){
            throw new Exception("Page introuvable");
        }else{
            $view = new View('Inscription', 'Inscription', 'inscription');
            $view->generate([]);
        }
    }
}