<?php

// NAMESPACE

namespace Francois\projet\Model ;

// REQUIRE

require_once('Model/Database.php') ;

// USE

use \Francois\projet\Model\Database ;

// CLASSE

class Post extends Database {

	// Méthode qui permet de récupérer le dernier chapitre publié
    
    public function lastPost() {
        
        $sql = 'SELECT id,chapitre, title, author, content, DATE_FORMAT(dateAdd, \'%d/%m/%Y\') AS date_fr FROM posts WHERE posted = 1 ORDER BY chapitre DESC LIMIT 1' ;
        $lastPosts = $this->executeRequest($sql) ;
        return $lastPosts ;
    }
}