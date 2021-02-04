<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// USE

use Francois\Projet\Framework\View ;
use \Francois\Projet\Framework\Session ;

// DECLARATION DE LA CLASSE

class ErrorController {

	private $view ;
	private $session ;

	// LE CONSTRUTEUR

	public function __construct() {
        $this->view = new View() ;
        $this->session = new Session($this->session) ;
    }

    // Méthode qui renvoie sur la page 404

	public function page404() {
		return $this->view->renderFront('404') ;
	}

}