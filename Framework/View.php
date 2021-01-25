<?php 

namespace Francois\Projet\Framework ;

class View {

	private $file ;
	private $title ;

	public function renderFront($template, $data = []) {
		$this->file = 'View/Frontend/view' . $template . '.php' ;
		$content = $this->renderFile($this->file, $data) ;
		$view = $this->renderFile('View/Frontend/viewFrontTemplate.php', [
				'title' => $this->title,
				'content' => $content 
		]) ;
	echo $view ;
	}

	public function renderBack($template, $data = []) {
		$this->file = 'View/Backend/view' . $template . '.php' ;
		$content = $this->renderFile($this->file, $data) ;
		$view = $this->renderFile('View/Backend/viewBackTemplate.php', [
				'title' => $this->title,
				'content' => $content 
		]) ;
	echo $view ;
	}

	public function renderfile($file, $data) {
		if (file_exists($file)) {
			extract($data) ;
			ob_start() ;
			require $file ;
			return ob_get_clean() ;
		}
		header('Location:index.php?url=error404') ;
	}
}