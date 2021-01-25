<?php

// NAMESPACE

namespace Francois\projet\Model ;

// REQUIRE

require_once('Model/Database.php') ;

// USE

use \Francois\projet\Model\Database ;

class Comment extends Database {

	public function getComments($chapterId) {
        $sql ='SELECT id, author, content, signalComment,post_id,al_ready_signal, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM comments WHERE post_id = ? AND publish = 1 ORDER BY date DESC' ;
        $comments = $this->executeRequest($sql, [$chapterId]);
        return $comments ;
    }
}