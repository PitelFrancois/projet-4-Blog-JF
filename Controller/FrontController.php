<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// REQUIRE

require_once 'Model/Post.php' ;
require_once 'Framework/View.php' ;
require_once "Framework/Session.php" ;
require_once 'Model/Comment.php' ;

// USE

use Francois\Projet\Model\Post ;
use Francois\Projet\Framework\View ;
use \Francois\Projet\Framework\Session ;
use Francois\Projet\Model\Comment ;

// DECLARATION DE LA CLASSE

class FrontController {

	private $post ;
	private $view ;
	private $session ;
	private $comment ;

	// LE CONSTRUTEUR

	public function __construct() {
        $this->post = new Post() ;
        $this->view = new View() ;
        $this->session = new Session($this->session) ;
        $this->comment = new Comment() ;
    }

    // METHODE QUI RENVOIE SUR LA PAGE D'ACCUEIL AVEC LE DERNIER CHAPITRE

	public function home() {
		$lastPosts = $this->post->lastPost() ;
		return $this->view->renderFront('Home', [				
			'lastPosts' => $lastPosts
		]) ;
	}

	// METHODE QUI RENVOIE LE NOMBRES DE CHAPITRES PUBLIES

	public function countPublishPost() {
		return $this->post->countPublishPost() ;
	}

	// METHODE QUI RENVOIE SUR LA PAGE D'UN CHAPITRE EN PARTICULIER

	public function post($chapterId) {
		$posts = $this->post->getPost($chapterId) ;
		$countPublishPost = $this->post->countPublishPost() ;				
		$comments = $this->comment->getComments($chapterId) ;
		return $this->view->renderFront('Post',[				
			'posts' => $posts ,
			'comments' => $comments,
			'countPublishPost' => $countPublishPost
		]) ;
	}
}