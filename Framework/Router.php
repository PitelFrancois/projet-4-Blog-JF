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

				} 

			}  else {

				$frontController->home() ;

			}

		} catch (Exception $e) {

			$e->getMessage('Cette page n\'existe pas') ;
			
        }

	}

}