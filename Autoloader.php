<?php
namespace Francois\Projet ;

class Autoloader {

    public static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class) {
        //retire le début du namespace appelé par le use
        $class = str_replace('Francois\Projet', '', $class);
        //remplace les \ par /
        $class = str_replace('\\', '/', $class);
        //va chercher ../(controller ou model)/$class.php
        require '../..'.$class.'.php';
    }
}