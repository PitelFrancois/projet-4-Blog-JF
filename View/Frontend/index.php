<?php

require_once 'Framework/Router.php' ;

use \Francois\Projet\Framework\Router ;

session_start() ;

$router = new Router() ;
$router->run() ;