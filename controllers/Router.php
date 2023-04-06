<?php
namespace Controller;
require_once 'vendor/autoload.php';
use Exception;

class Router{
    public function routerReq(){
        try{
            $url = [];
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url'], FILTER_SANITIZE_URL);
                
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                $controllerClassNew = "Controller\\".$controllerClass;
                if(file_exists($controllerFile)){
                    new $controllerClassNew($url);
                }else{
                    throw new Exception("Page introuvable");
                }
            }else{
                new ControllerAccueil($url);
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
}

?>