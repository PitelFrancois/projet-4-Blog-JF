<?php

// NAMESPACE

namespace Francois\projet\Model ;

// USE

use \Francois\Projet\Model\Database ;

// CLASSE

class Post extends Database {

	// Méthode qui permet de récupérer le dernier chapitre publié
    
    public function lastPost() {
        
        $sql = 'SELECT id,chapitre, title, author, content, DATE_FORMAT(dateAdd, \'%d/%m/%Y\') AS date_fr FROM posts WHERE posted = 1 ORDER BY chapitre DESC LIMIT 1' ;
        $posts = $this->executeRequest($sql) ;
        return $posts ;
    }

    // Méthode qui permet de récupérer un chapitre en particulier via son id

    public function getPost($chapterId) {
    	
        $sql = 'SELECT id, chapitre, title, author, content, DATE_FORMAT(dateAdd, \'%d/%m/%Y\') AS date_fr FROM posts WHERE chapitre = ?' ;
    	$posts = $this->executeRequest($sql, array($chapterId)) ;
    	return $posts ;
    }

    // Méthode qui permet de récupérer un compteur des chapitres "publiés"

    public function countPublishPost() {
        
        $sql = 'SELECT count(*) as nbPosts from posts WHERE posted = 1';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbPosts'] ;  
    }

    // Méthode qui permet de récupérer tous les chapitres "publiés"
    
    public function getPosts() {
        
        $sql = 'SELECT id, chapitre, title, author, content,posted, DATE_FORMAT(dateAdd, \'%d/%m/%Y\') AS date_fr FROM posts WHERE posted = 1 ORDER BY chapitre DESC' ;
        $posts = $this->executeRequest($sql) ;
        return $posts ;
    }

    // Méthode qui permet de récupérer tous les chapitres

    public function dashbordGetPosts() {
        
        $sql = 'SELECT id, chapitre, title, author, content,posted, DATE_FORMAT(dateAdd, \'%d/%m/%Y\') AS date_fr FROM posts ORDER BY chapitre DESC' ;
        $posts = $this->executeRequest($sql) ;
        return $posts ;
    }

    // Méthode qui permet de récupérer un compteur des chapitres "non publiés"

    public function countDraftPost() {
        
        $sql = 'SELECT count(*) as nbPosts from posts WHERE posted = 0';
        $result = $this->executeRequest($sql) ;
        $line = $result->fetch() ;
        return $line['nbPosts'] ;  
    }

    // Méthode quî permet de publié un chapitre en particulier via son id

    public function publishPost($chapterId) {
        $sql = 'UPDATE posts SET posted = ? WHERE chapitre = ?' ;
        $publishPost = $this->executeRequest($sql, [1, $chapterId]) ;
    }

    // Méthode qui permet de mettre hors ligne un chapitre en particulier via son id

    public function draftPost($chapterId) {
        $sql = 'UPDATE posts SET posted = ? WHERE chapitre = ?' ;
        $draftPost = $this->executeRequest($sql, [0, $chapterId]) ;
    }

    // Méthode qui permet de supprimer un chapitre en particulier via son id

    public function deletePost($chapterId) {
        $sql = 'DELETE FROM posts WHERE chapitre = ?';
        $deletePost = $this->executeRequest($sql, [$chapterId]) ;
    }

    // Méthode qui permet de mettre à jour un chapitre en particulier via son id

    public function updatePost($postId, $chapitre, $title, $content, $author ) {
        
        $sql = 'UPDATE posts SET chapitre = :newchapitre, title = :newtitle, content = :newcontent, author = :newauthor, dateAdd = NOW() WHERE id =' . $postId;
        $update = $this->executeRequest($sql, [
            'newchapitre' => $chapitre ,
            'newtitle' => $title ,
            'newcontent' => $content ,
            'newauthor' => $author 
        ]);
        return $update ;
    }

    // Méthode qui permet de récupérer tous les chapitres "non publiés"

    public function getDraftPosts() {
        
        $sql = 'SELECT id,chapitre, title, author, content, posted, DATE_FORMAT(dateAdd, \'%d/%m/%Y\') AS date_fr FROM posts WHERE posted = 0 ORDER BY dateAdd DESC' ;
        $posts = $this->executeRequest($sql) ;
        return $posts ;
    }

    // Méthode qui permet d'insérer un chapitre dans la bdd

    public function addPost($chapitre, $title, $content, $author) {
        
        $sql = ('INSERT INTO posts(chapitre, title, content, author, dateAdd, posted) VALUES(?, ?, ?, ?, NOW(),0)') ;
        $posts = $this->executeRequest($sql,array($chapitre, $title, $content, $author)) ;
        return $posts ;  
    }

}