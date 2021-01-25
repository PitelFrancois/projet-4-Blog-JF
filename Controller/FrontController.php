<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// REQUIRE

require_once 'Model/Post.php' ;
require_once 'Framework/View.php' ;

// USE

use Francois\Projet\Model\Post ;
use Francois\Projet\Framework\View ;

// DECLARATION DE LA CLASSE

class FrontController {

	private $post ;
	private $view ;

	// LE CONSTRUTEUR

	public function __construct() {
        $this->post = new Post() ;
        $this->view = new View() ;
    }

    // METHODE QUI RENVOIE SUR LA PAGE D'ACCUEIL AVEC LE DERNIER CHAPITRE

	public function home() {
		$posts = $this->post->lastPost() ;
		return $this->view->renderFront('Home', [				
			'posts' => $posts
		]) ;
	}
}