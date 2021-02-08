<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// USE

use Francois\Projet\Model\Post ;
use Francois\Projet\Framework\View ;
use Francois\Projet\Model\Comment ;
use \Francois\Projet\Framework\Session ;
use Francois\Projet\Model\Message ;

// DECLARATION DE LA CLASSE

class FrontController {

	private $post ;
	private $view ;
	private $comment ;
	private $session ;
	private $message ;

	// LE CONSTRUTEUR

	public function __construct() {
        $this->post = new Post() ;
        $this->view = new View() ;
        $this->comment = new Comment() ;
        $this->session = new Session($this->session) ;
        $this->message = new Message() ;
    }

    // METHODE QUI RENVOIE SUR LA PAGE D'ACCUEIL AVEC LE DERNIER CHAPITRE

	public function home() {
		$posts = $this->post->lastPost() ;
		return $this->view->renderFront('Home', [				
			'posts' => $posts
		]) ;
	}

	// METHODE QUI RENVOIE LE NOMBRES DE CHAPITRES PUBLIES

	public function countPublishPost() {
		return $this->post->countPublishPost() ;
	}

	// METHODE QUI RENVOIE LE NOMBRES DE MESSAGES

	public function countMessage() {
		return $this->message->countMessage() ;
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

	// METHODE QUI RENVOIE SUR LA PAGE DE TOUT LES CHAPITRES

	public function posts() {
		$posts = $this->post->getPosts() ;
		return $this->view->renderFront('Posts',[				
			'posts' => $posts
		]) ;
	}

	// METHODE QUI RENVOIE SUR LA PAGE JEAN FORTEROCHE

	public function about() {
		return $this->view->renderFront('About') ;
	}

	// METHODE QUI RENVOIE SUR LA PAGE CONTACT

	public function contact() {
		return $this->view->renderFront('Contact') ;
	}

	// METHODE QUI RENVOIE SUR LA PAGE DE CONNEXION

	public function connection() {
		return $this->view->renderFront('Connection') ;
	}

	// METHODE QUI RENVOIE SUR LA PAGE D'AJOUT D'UN CHAPITRE

    public function addViewPost() {
    	if ($this->session->get('pseudo')) {
    		$countPublishPost = $this->post->countPublishPost() ;
        	return $this->view->renderBack('AddPost',[				
			'countPublishPost' => $countPublishPost
		]) ;
        } else {
			$posts = $this->post->lastPost() ;
			return $this->view->renderFront('Home', [				
				'posts' => $posts
			]) ;
		}
    }

	// METHODE QUI RENVOIE SUR LA PAGE DE GESTION DES CHAPITRES

	public function postManager() {
		if ($this->session->get('pseudo')) {
			$posts = $this->post->dashbordGetPosts() ;
			$countPublishPost = $this->post->countPublishPost() ;
			$countDraftPost = $this->post->countDraftPost() ;
			$countPublishPost = $this->post->countPublishPost() ;
			$countDraftPost = $this->post->countDraftPost() ;
			$draftPosts = $this->post->getDraftPosts() ;
			return $this->view->renderBack('PostManager', [
				'posts' => $posts ,
				'countPublishPost' => $countPublishPost ,
				'countDraftPost' => $countDraftPost ,
				'draftPosts' => $draftPosts 
			]) ;
		} else {
			$posts = $this->post->lastPost() ;
			return $this->view->renderFront('Home', [				
				'posts' => $posts
			]) ;
		}
	}

	// METHODE QUI RENVOIE SUR LA PAGE DE GESTIONS DES COMMENTAIRES

	public function commentManager() {
		if ($this->session->get('pseudo')) {
			$comments = $this->comment->getListValidateComments() ;
			$countValidatecomments = $this->comment->countValidateComment() ;
			$countSignalComments = $this->comment->countSignalComment() ;
			$countPublishComment = $this->comment->countPublishComment() ;
			$listComments = $this->comment->getListComments() ;
			$signalListComments = $this->comment->getListSignalComments() ;
			return $this->view->renderBack('CommentManager', [
				'comments' => $comments ,
				'countValidatecomments' => $countValidatecomments ,
				'countSignalComments' => $countSignalComments ,
				'countPublishComment' => $countPublishComment ,
				'signalListComments' => $signalListComments ,
				'listComments' => $listComments 
			]) ;
		} else {
			$posts = $this->post->lastPost() ;
			return $this->view->renderFront('Home', [				
				'posts' => $posts
			]) ;
		}
	}

	// METHODE QUI RENVOIE SUR LA PAGE DE GESTION DES MESSAGE

	public function messageManager() {
		if ($this->session->get('pseudo')) {
			$mails = $this->message->getListMails() ;
			$countReadMail = $this->message->countReadMail() ;
			$countNotReadMail = $this->message->countNotReadMail() ;
			$getListNotReadMails = $this->message->getListNotReadMail() ;
			return $this->view->renderBack('MessageManager', [
				'mails' => $mails ,
				'countReadMail' => $countReadMail ,
				'countNotReadMail' => $countNotReadMail ,
				'getListNotReadMails' => $getListNotReadMails
			]) ;
		} else {
			$posts = $this->post->lastPost() ;
			return $this->view->renderFront('Home', [				
				'posts' => $posts
			]) ;
		}
	}

	// METHODE QUI RENVOIE SUR LA PAGE D4UN MESSAGE EN PARTICULIER

	public function readMail($messageId) {
        $mails = $this->message->getMail($messageId) ;
        $mailReading = $this->message->mailReading($messageId) ;
        return $this->view->renderBack('ReadMail',[                
            'mails' => $mails,
            'mailReading' => $mailReading
        ]) ;
    }

    // METHODE QUI RENVOIE SUR LA PAGE D'EDITION D'UN POST

    public function editPost($chapterId) {
        $posts = $this->post->getPost($chapterId) ;
        return $this->view->renderBack('EditPost', [
            'posts' => $posts
        ]) ;
    }

}