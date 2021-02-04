<?php

// NAMESPACE

namespace Francois\projet\Model ;

// USE

use \Francois\projet\Model\Database ;

class Comment extends Database {

	public function getComments($chapterId) {
        $sql ='SELECT id, author, content, signalComment,post_id,al_ready_signal, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_fr FROM comments WHERE post_id = ? AND publish = 1 ORDER BY date DESC' ;
        $comments = $this->executeRequest($sql, [$chapterId]);
        return $comments ;
    }

    public function addComment($chapterId, $author, $comment) {
    	$sql = ('INSERT INTO comments(post_id, Author, content, date) VALUES(?, ?, ?, NOW())') ;
    	$comments = $this->executeRequest($sql,array($chapterId,$author, $comment)) ;
        return $comments ;	
    }

    public function signalComment($commentId) {
        $sql = 'UPDATE comments SET signalComment = ? WHERE id = ?' ;
        $signalcomments = $this->executeRequest($sql, [1, $commentId]) ;
    }
}