<?php

//demande mot de pass pour entrer dans le site
define("WEBSITE_PASSEWORD", "aubesport93300@");

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['website_auth']) || $_SESSION['website_auth']==false){
    if(isset($_POST['website_password'])){
        if($_POST['website_password']==WEBSITE_PASSEWORD){
            $_SESSION['website_auth'] = true;
        }else{
            $_SESSION['website_auth'] = false;
        }
    }else{
        require 'authentificate.php';
        return;
    }

    if($_SESSION['website_auth']==false){
        require 'authentificate.php';
        return;
    }
}
// fin demande de mot de pass

use Controller\Router;

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


define("URL", str_replace("index.php","","//".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) );

$router = new Router();
$router->routerReq();


?>

