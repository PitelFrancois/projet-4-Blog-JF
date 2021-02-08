<?php

// NAMESPACE

namespace Francois\Projet\Model;

// CLASSE

abstract class Database {

	private static $db ;

    // METHODE QUI PERMET DE DIFFERENCIER LA REQUETE A EFFECTUER

    protected function executeRequest ($sql, $params = null) {
        
        if($params == null) {
            $result = self::getDb()->query($sql) ;
        } else {
            $result = self::getDb()->prepare($sql) ; 
            $result->execute($params) ;
        }
		return $result ;
    }

    // METHODE QUI PERMET DE SE CONNECTER A LA BDD

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