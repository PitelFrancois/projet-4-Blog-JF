<?php

namespace Francois\Projet\Framework ;

require_once 'Controller/FrontController.php' ;
require_once 'Controller/ErrorController.php' ;
require_once 'Controller/BackController.php' ;

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
                
                }

			}  else {

				$frontController->home() ;

			}

		} catch (Exception $e) {

			$e->getMessage('Cette page n\'existe pas') ;
			
        }

	}

}