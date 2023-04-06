
<?php
use Controller\Router;

require_once 'vendor/autoload.php';

define("URL", str_replace("index.php","",$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) );

$router = new Router();
$router->routerReq();


?>

