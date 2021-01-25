<?php

// NAMESPACE

namespace Francois\Projet\Model;

// CLASSE

abstract class Database {

	private static $db ;

    // Méthode qui permet de différencier la requête à effectuer

    protected function executeRequest ($sql, $params = null) {
        
        if($params == null) {
            $result = self::getDb()->query($sql) ;
        } else {
            $result = self::getDb()->prepare($sql) ; 
            $result->execute($params) ;
        }
		return $result ;
    }

    // Méthode qui permet de se connecter à la bdd

	private static function getDb() {
        
        if(self::$db === null) {
            $dsn = 'mysql:host=localhost;dbname=blog;charset=utf8' ;
            $login = 'root' ;
            $password = '' ;
			self::$db = new \PDO($dsn, $login, $password,
            array (\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)) ;
        }
        return self::$db ;
    }
    
}