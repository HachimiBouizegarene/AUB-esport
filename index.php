
<?php


use Controller\Router;

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


define("URL", str_replace("index.php","","//".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) );

$router = new Router();
$router->routerReq();


?>

