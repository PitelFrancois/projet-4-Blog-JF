<?php

// NAMESPACE

namespace Francois\Projet\Controller ;

// USE

use Francois\Projet\Model\Comment ;
use \Francois\Projet\Framework\Session ;
use Francois\Projet\Model\Post ;
use Francois\Projet\Model\Message ;
use Francois\Projet\Model\User ;

// CLASSE

class BackController {

    private $comment ;
    private $session ;
    private $post ;
    private $message ;
    private $user ;

    // LE CONSTRUTEUR

    public function __construct() {
        $this->comment = new Comment() ;
        $this->session = new Session($this->session) ;
        $this->post = new Post() ;
        $this->message = new Message() ; 
        $this->user = new User() ;
    }

    // METHODE QUI PERMET D'AJOUTER UN COMMENTAIRE 

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

    // METHODE QUI PERMET DE SIGNALER UN COMMENTAIRE 

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

    // METHODE QUI PERMET D'AJOUTER UN MESSAGE

    public function addMessage($pseudo, $message, $mail) {
        
        $this->message->addMessage($pseudo, $message, $mail) ;
        
        $this->session->set('add_message', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Votre message à bien été envoyé.</p>
            </div>
        </div>') ;
        
        header('Location: index.php?url=contact') ;
    }

    // METHODE QUI PERMET DE SE CONNECTER

    public function login($pseudo, $password) {
        $result = $this->user->login($pseudo, $password) ;
        if($result && $result['isPasswordValid']) {
            $this->session->set('login', 
                    '<div id=session>
                        <div id="session2">
                            <a id="cross"><i class="fas fa-times-circle"></i></a>
                            <p class="sessionP">Bonjour ' . $pseudo .'</p>
                        </div>
                    </div>') ;
            $this->session->set('pseudo', $pseudo) ;
            header('Location: index.php') ;
        } else {
            $this->session->set('badConnect', 
            '<div id=session>
                <div id="session2">
                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                    <p class="sessionP">Le mot de passe ou l\'identifiant est incorrect.</p>
                </div>
            </div>') ;
            header('Location: index.php?url=connection') ;
        }
    }

    // METHODE QUI PERMET DE SE DECONNECTER

    public function logout() {
        $this->session->stop() ;
        $this->session->start() ;
        $this->session->set('logout', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Vous etes bien déconnecté.</p>
            </div>
        </div>') ;
        header('Location: index.php') ;
    }

    // METHODE QUI PERMET DE METTRE UN CHAPITRE HORS-LIGNE

    public function draftPost($chapterId) {
        $this->post->draftPost($chapterId) ;
        header('Location: index.php?url=postManager#listPosts') ;
    }

    // METHODE QUI PERMET DE METTRE UN CHAPITRE EN LIGNE

    public function publishPost($chapterId) {
        $this->post->publishPost($chapterId) ;
        header('Location: index.php?url=postManager#listPosts') ;
    }

    // METHODE QUI PERMET D'AJOUTER UN CHAPITRE

    public function addPost($chapitre, $title, $content, $author) {
        $this->post->addPost($chapitre, $title, $content, $author) ;
        $this->session->set('add_post', 
        '<div id=session>
            <div id="session2">
                <a id="cross"><i class="fas fa-times-circle"></i></a>
                <p class="sessionP">Le chapitre a bien été enregistré.</p>
            </div>
        </div>') ;
        header('Location: index.php?url=postManager') ;
    }

    // METHODE QUI PERMET DE SUPPRIMER UN CHAPITRE ET SES COMMENTAIRES

    public function deletePost($chapterId) {
        $this->post->deletePost($chapterId) ;
        $this->comment->deleteComments($chapterId) ;
        header('Location: index.php?url=postManager') ;
    }

    // METHODE QUI PERMET DE VALIDER UN COMMENTAIRE

    public function validateComment($commentId) {
        $this->comment->validateComment($commentId) ;
        header('Location: index.php?url=commentManager') ;
    }

    // METHODE QUI PERMET DE VALIDER LE SIGNALMENT D'UN COMMENTAIRE

    public function validateSignalComment($commentId) {
        $this->comment->validateSignalComment($commentId) ;
        header('Location: index.php?url=commentManager') ;
    }

    // METHODE QUI PERMET DE SUPPRIMER UN COMMENTAIRE

    public function deleteComment($commentId) {
        $this->comment->deleteComment($commentId) ;
        header('Location: index.php?url=commentManager') ;
    }

    // METHODE QUI PERMET DE SUPPRIMER UN MESSAGE

    public function deleteMessage($messageId) {
        $this->message->deleteMail($messageId) ;
        header('Location: index.php?url=messageManager') ;
    }

    // METHODE QUI PERMET DE MODIFIER UN CHAPITRE

    public function updatePost($postId, $chapitre, $title, $content, $author ) {
        $this->post->updatePost($postId, $chapitre, $title , $content, $author) ;
        $this->session->set('updatePost', 
            '<div id=session>
                <div id="session2">
                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                    <p class="sessionP">Le chapitre à bien été édité.</p>
                </div>
            </div>') ;
        header('Location: index.php?url=postManager') ;
        
    }

}