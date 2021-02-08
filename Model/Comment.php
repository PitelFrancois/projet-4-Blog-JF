<?php

// NAMESPACE

namespace Francois\projet\Model ;

// USE

use \Francois\projet\Model\Database ;

class Comment extends Database {

    // METHODE QUI PERMET DE RECUPERER TOUS LES COMMENTAIRES D'UN CHAPITRE

	public function getComments($chapterId) {
        $sql ='SELECT id, author, content, signalComment,post_id,al_ready_signal, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM comments WHERE post_id = ? AND publish = 1 ORDER BY date DESC' ;
        $comments = $this->executeRequest($sql, [$chapterId]);
        return $comments ;
    }

    // METHODE QUI PERMET D'INSERER UN COMMENTAIRE DANS LA BDD

    public function addComment($chapterId, $author, $comment) {
    	$sql = ('INSERT INTO comments(post_id, Author, content, date) VALUES(?, ?, ?, NOW())') ;
    	$comments = $this->executeRequest($sql,array($chapterId,$author, $comment)) ;
        return $comments ;	
    }

    // METHODE QUI PERMET DE SIGNALER UN COMMENTAIRE

    public function signalComment($commentId) {
        $sql = 'UPDATE comments SET signalComment = ? WHERE id = ?' ;
        $signalcomments = $this->executeRequest($sql, [1, $commentId]) ;
    }

    // METHODE QUI PERMET D'AVOIR TOUS LES COMMENTAIRES EN ATTENTE DE VALIDATION

    public function getListValidateComments() {
        $sql ='SELECT id, author, post_id, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM comments WHERE publish = 0 ORDER BY date DESC' ;
        $comments = $this->executeRequest($sql);
        return $comments ;
    }

    // METHODE QUI RENVOIE LE NOMBRE DE COMMENTAIRES EN ATTENTE DE VALIDATION

    public function countValidateComment() {
        $sql = 'SELECT count(*) as nbComments from comments WHERE publish = 0';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();
        return $line['nbComments'];  
    }

    // METHODE QUI RENVOIE LE NOMBRE DE COMMENTAIRES SIGNALES

    public function countSignalComment() {
        $sql = 'SELECT count(*) as nbComments from comments WHERE signalComment = 1';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbComments'] ;  
    }

    // METHODE QUI RENVOIE LE NOMBRE DE COMMENTAIRES PUBLIES

    public function countPublishComment() {
        $sql = 'SELECT count(*) as nbComments from comments WHERE publish = 1';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbComments'] ;  
    }

    // METHODE QUI PERMET D'AVOIR TOUS LES COMMENTAIRES 

    public function getListComments() {
        $sql ='SELECT id, author, post_id, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM comments WHERE publish = 1 ORDER BY date DESC' ;
        $listComments = $this->executeRequest($sql);
        return $listComments ;
    }

    // METHODE QUI PERMET D'AVOIR TOUS LES COMMENTAIRES SIGNALES

    public function getListSignalComments() {
        $sql ='SELECT id, author,post_id, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM comments WHERE signalComment = 1 ORDER BY date DESC' ;
        $signalListComments = $this->executeRequest($sql);
        return $signalListComments ;
    }

    // METHODE QUI PERMET DE VALIDER UN COMMENTAIRE

    public function validateComment($commentId) {
        $sql = 'UPDATE comments SET publish = ? WHERE id = ?' ;
        $validateComment = $this->executeRequest($sql, [1, $commentId]) ;
    }

    // METHODE QUI PERMET DE VALIDER UN COMMENTAIRE SIGNALE

    public function validateSignalComment($commentId) {
        $sql = 'UPDATE comments SET signalComment = ?,al_ready_signal = ?  WHERE id = ?' ;
        $signalcomments = $this->executeRequest($sql, [0,1, $commentId]) ;
    }

    // METHODE QUI PERMET DE SUPPRIMER UN COMMENTAIRE

    public function deleteComment($commentId) {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $deleteComment = $this->executeRequest($sql, [$commentId]) ;
    }

    // METHODE QUI PERMET DE SUPPRIMER TOUS LES COMMENTAIRE D4UN CHAPITRE

    public function deleteComments($commentId) {
        $sql = 'DELETE FROM comments WHERE post_id = ?';
        $deleteComments = $this->executeRequest($sql, [$commentId]) ;
    }

}