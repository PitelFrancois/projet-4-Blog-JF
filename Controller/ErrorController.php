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

    // Méthode qui renvoie une pop-up pour dire que tous les champs ne sont pas remplis (Commentaire)

	public function commentFieldsNotFilled($chapterId) {
		$this->session->set('commentFieldsNotFilled', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Vous devez remplir tous les champs.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=post&chapter=' . $chapterId ) ;
	}

    // Méthode qui renvoie une pop-up pour dire que le commentaire n'existe pas

	public function signalCommentNotId($chapterId) {
		$this->session->set('signalCommentNotId', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Impossible de signaler ce commentaire.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=post&chapter=' . $chapterId ) ;
	}

    // Méthode qui renvoie une pop-up pour dire que tous les champs ne sont pas remplis (Message)

    public function messageFieldsNotFilled() {
        $this->session->set('messageFieldsNotFilled', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Vous devez remplir tous les champs.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=contact') ;
    }

    // Méthode qui renvoie une pop-up pour dire que tous les champs ne sont pas remplis (login)

    public function loginFieldsNotFilled() {
        $this->session->set('loginFieldsNotFilled', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Vous devez remplir tous les champs.</p>
            </div>
        </div>') ;
        header('Location: index.php') ;
    }

    // Méthode qui renvoie une pop-up pour dire que tous les champs ne sont pas remplis (post)

    public function addPostFieldsNotFilled() {
        $this->session->set('addPostFieldsNotFilled', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Vous devez remplir tous les champs.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=addViewPost') ;
    }

    // Méthode qui renvoie une pop-up pour dire que le message n'existe pas

    public function erreurMail() {
        $this->session->set('erreurMail', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Ce message est introuvable.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=messageManager') ;
    }

     public function erreurPost() {}

}