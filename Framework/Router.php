<?php

namespace Francois\Projet\Framework ;

require_once 'Controller/FrontController.php' ;

use \Francois\Projet\Controller\FrontController ;

class Router {

	public function run() {

		$frontController = new FrontController() ;

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

				} 

			}  else {

				$frontController->home() ;

			}

		} catch (Exception $e) {

			$e->getMessage('Cette page n\'existe pas') ;
			
        }

	}

}