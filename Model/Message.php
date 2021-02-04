<?php

// NAMESPACE

namespace Francois\projet\Model ;

// USE

use \Francois\projet\Model\Database ;

// CLASSE

class Message extends Database {

	// Méthode qui permet d'insérer un message dans la bdd

	public function addMessage($pseudo, $message, $mail) {
    	
        $sql = ('INSERT INTO mail(pseudo, message, mail, date) VALUES(?, ?, ?, NOW())') ;
    	$mails = $this->executeRequest($sql,array($pseudo, $message, $mail)) ;
        return $mails ;
    }

}