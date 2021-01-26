<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// REQUIRE

require_once 'Model/Comment.php' ;
require_once "Framework/Session.php" ;

// USE

use Francois\Projet\Model\Comment ;
use \Francois\Projet\Framework\Session ;

// CLASSE

class BackController {

    private $comment ;
    private $session ;

    // LE CONSTRUTEUR

    public function __construct() {
        $this->comment = new Comment() ;
        $this->session = new Session($this->session) ;
    }

    public function addComment($chapterId, $author, $comment) {
        
        $this->comment->addComment($chapterId, $author, $comment) ;
        $this->session->set('add_comment', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Votre commentaire a bien été ajouté</p>
                <p>Il est en attende validation.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=post&chapter=' . $chapterId ) ;
    }

    public function signalComment($commentId,$chapterId) {
        
        $this->comment->signalComment($commentId,$chapterId) ;
        $this->session->set('signal_comment', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Le commentaire a été signalé.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=post&chapter=' . $chapterId ) ;
    }
}