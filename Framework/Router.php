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

                } elseif ($_GET['url'] == 'about') {
					
					$frontController->about() ;

				
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
                
                }  elseif ($_GET['url'] == 'signalComment') {
                        
                    if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                            
                        $backController->signalComment($_GET['commentId'],$_GET['chapterId']) ;
                        
                    } else {
                            
                    	$errorController->signalCommentNotId($_GET['chapterId']) ;
                            
                    }
                    
                }

			}  else {

				$frontController->home() ;

			}

		} catch (Exception $e) {

			$e->getMessage('Cette page n\'existe pas') ;
			
        }

	}

}