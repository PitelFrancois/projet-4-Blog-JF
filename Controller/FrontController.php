<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// REQUIRE

require_once 'Model/Post.php' ;
require_once 'Framework/View.php' ;
require_once "Framework/Session.php" ;

// USE

use Francois\Projet\Model\Post ;
use Francois\Projet\Framework\View ;
use \Francois\Projet\Framework\Session ;

// DECLARATION DE LA CLASSE

class FrontController {

	private $post ;
	private $view ;
	private $session ;

	// LE CONSTRUTEUR

	public function __construct() {
        $this->post = new Post() ;
        $this->view = new View() ;
        $this->session = new Session($this->session) ;
    }

    // METHODE QUI RENVOIE SUR LA PAGE D'ACCUEIL AVEC LE DERNIER CHAPITRE

	public function home() {
		$lastPosts = $this->post->lastPost() ;
		return $this->view->renderFront('Home', [				
			'lastPosts' => $lastPosts
		]) ;
	}
}