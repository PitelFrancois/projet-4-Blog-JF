<?php

namespace Francois\Projet\Framework ;

use \Francois\Projet\Controller\FrontController ;
use \Francois\Projet\Controller\ErrorController ;
use \Francois\Projet\Controller\BackController ;

class Router {

	public function run() {

		$frontController = new FrontController() ;
		$errorController = new ErrorController() ;
		$backController = new BackController() ;

		try {

			if (isset($_GET['url'])) {

				/*************************************************************************/
				/*                                FRONTEND                               */
				/*************************************************************************/

				if($_GET['url'] === 'home') {

					$frontController->home() ;

				} elseif ($_GET['url'] == 'post') {

					$countPublishPost = $frontController->countPublishPost() ;
					
					if (isset($_GET['chapter']) && $_GET['chapter'] <= $countPublishPost) {

                		$frontController->post($_GET['chapter']) ;
            
                    } else {

                    	$errorController->page404() ;

                    }

				} elseif ($_GET['url'] == 'readMail') {
                    
                    if (isset($_GET['mailId']) && $_GET['mailId'] > 0) {
                        
                        $frontController->readMail($_GET['mailId']) ;
                    
                    } else {

                        $errorController->erreurMail() ;

                    }
                    
                } elseif ($_GET['url'] == 'posts') {
					
					$frontController->posts() ;

				} elseif ($_GET['url'] == 'about') {
					
					$frontController->about() ;

				} elseif ($_GET['url'] == 'contact') {
					
					$frontController->contact() ;

				} elseif ($_GET['url'] == 'addViewPost') {
					
					$frontController->addViewPost() ;

				} elseif ($_GET['url'] == 'postManager') {
					
					$frontController->postManager() ;

				} elseif ($_GET['url'] == 'commentManager') {
					
					$frontController->commentManager() ;

                } elseif ($_GET['url'] == 'messageManager') {
                    
                    $frontController->messageManager() ;

				/*************************************************************************/
				/*                                BACKEND                                */
				/*************************************************************************/

				} elseif ($_GET['url'] == 'addComment') {

					$countPublishPost = $frontController->countPublishPost() ;

                    if (isset($_GET['chapter']) && $_GET['chapter'] <= $countPublishPost) {
                        
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            
                            $backController->addComment($_GET['chapter'],$_POST['author'], $_POST['comment']) ;
                        
                        } else {
                            
                            $errorController->commentFieldsNotFilled($_GET['chapter']) ;
                        
                        }
                    
                    }
                
                } elseif ($_GET['url'] == 'signalComment') {
                        
                    if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                            
                        $backController->signalComment($_GET['commentId'],$_GET['chapterId']) ;
                        
                    } else {
                            
                    	$errorController->signalCommentNotId($_GET['chapterId']) ;
                            
                    }
                    
                } elseif ($_GET['url'] == 'addMessage') {

                    if (!empty($_POST['pseudo']) && !empty($_POST['message']) && !empty($_POST['mail'])) {
                            
                        $backController->addMessage($_POST['pseudo'], $_POST['message'], $_POST['mail']) ;
                        
                    } else {
                            
                        $errorController->messageFieldsNotFilled() ;
                        
                    }
                    
                } elseif ($_GET['url'] == 'addPost') {

                    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])) {
                            
                        $backController->addPost($_POST['chapitre'], $_POST['title'], $_POST['content'],$_POST['author']) ;
                        
                    } else {
                            
                        $errorController->addPostFieldsNotFilled() ;
                        
                    }
                    
                }  elseif ($_GET['url'] == 'login') {

                    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                            
                        $backController->login($_POST['pseudo'],$_POST['password']) ;
                        
                    } else {
                            
                        $errorController->loginFieldsNotFilled() ;
                        
                    }

                } elseif ($_GET['url'] == 'logout') {

                    $backController->logout() ;

                } elseif ($_GET['url'] == 'deletePost') {
                    
                    $backController->deletePost($_GET['chapterId']) ;

                } elseif ($_GET['url'] == 'draftPost') {

                    if (isset($_GET['chapterId'])) {

						$backController->draftPost($_GET['chapterId']) ;

                    } else {

                    	$errorController->erreurPost() ;

                    }

                } elseif ($_GET['url'] == 'publishPost') {

                    if (isset($_GET['chapterId'])) {

						$backController->publishPost($_GET['chapterId']) ;

                    } else {

                    	$errorController->erreurPost() ;

                    }

                } elseif ($_GET['url'] == 'validateComment') {
                    
                    if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                        
                        $backController->validateComment($_GET['commentId']) ;
                    
                    } else {

                        $errorController->erreurComment() ;

                    }

                } elseif ($_GET['url'] == 'validateSignalComment') {
                    
                    if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                        
                        $backController->validateSignalComment($_GET['commentId']) ;
                    
                    } else {

                        $errorController->erreurComment() ;

                    }
                    
                } elseif ($_GET['url'] == 'deleteComment') {
                    
                    if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                        
                        $backController->deleteComment($_GET['commentId']) ;
                    
                    } else {

                        $errorController->erreurComment() ;

                    }
                    
                } elseif ($_GET['url'] == 'deleteMessage') {
                    
                    if (isset($_GET['mailId']) && $_GET['mailId'] > 0) {
                        
                        $backController->deleteMessage($_GET['mailId']) ;
                    
                    } else {

                        $errorController->erreurMail() ;

                    }
                    
                } elseif ($_GET['url'] == 'editPost') {

                    if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0) {

                        $frontController->editPost($_GET['chapterId']) ;

                    } else {

                        $errorController->erreurPost() ;

                    }

                } elseif ($_GET['url'] == 'updatePost') {

                    $backController->updatePost($_GET['postId'], $_POST['chapitre'], $_POST['title'], $_POST['content'], $_POST['author']) ;

                } else {

					$errorController->erreurPost() ;

				}

			}  else {

				$frontController->home() ;

			}

		} catch (Exception $e) {

			$e->getMessage('Cette page n\'existe pas') ;
			

		}

	}

}