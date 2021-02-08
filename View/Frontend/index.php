<?php

require_once '../../Autoloader.php' ;

use Francois\Projet\Autoloader ;

Autoloader::register();

use \Francois\Projet\Framework\Router ;

session_start() ;

$router = new Router() ;
$router->run() ;