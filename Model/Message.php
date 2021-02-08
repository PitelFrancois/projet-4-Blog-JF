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

    // Méthode qui permet de récupérer tout les messages "lu" dans la bdd

    public function getListMails() {
    	
        $sql = 'SELECT id, pseudo, message, mail,mail_read, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM mail WHERE mail_read = 0 ORDER BY date_fr' ;
        $mails = $this->executeRequest($sql) ;
        return $mails ;
    }

    // Méthode qui permet de récupérer tout les messages "non lu" dans la bdd 

    public function getListNotReadMail() {
        
        $sql = 'SELECT id, pseudo, message, mail,mail_read, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM mail WHERE mail_read = 1 ORDER BY date_fr' ;
        $mails = $this->executeRequest($sql) ;
        return $mails ; 
    }

    // Méthode qui permet de récupérer un message en particulier via son id

    public function getMail($mailId) {
        
        $sql = 'SELECT id, pseudo, message, mail, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM mail WHERE id = ?' ;
        $mails = $this->executeRequest($sql, array($mailId)) ;
        return $mails ;
    }

    // Méthode qui permet de récupérer un compteur des messages "lu"

    public function countReadMail() {
        
        $sql = 'SELECT count(*) as nbMails from mail WHERE mail_read = 0';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbMails'] ;  
    }

    // Méthode qui permet de récupérer un compteur des messages "lu"

    public function countMessage() {
        
        $sql = 'SELECT count(*) as nbMails from mail WHERE id';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbMails'] ;  
    }

    // Méthode qui permet de récupérer un compteur des messages "non lu"

    public function countNotReadMail() {
        
        $sql = 'SELECT count(*) as nbMails from mail WHERE mail_read = 1';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbMails'] ;  
    }

    // Méthode qui permet de supprimer un message en particulier via son id

    public function deleteMail($mailId) {
        
        $sql = 'DELETE FROM mail WHERE id = ?';
        $deleteComment = $this->executeRequest($sql, [$mailId]);
    }

    // Méthode qui permet de passer un message "non lu" en "lu"

    public function mailReading($mailId) {
        
        $sql = 'UPDATE mail SET mail_read = ? WHERE id = ?' ;
        $mailReading = $this->executeRequest($sql, [1, $mailId]) ;
        return $mailReading ;
    }

}