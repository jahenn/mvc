<?php 
	
class ErrorController {



	public static function setError(Exception $e){
		$errorException = $e;
		$errorCode = $e->getCode();


		$errorView = WWW_ROOT . DS . 'layouts' . DS . DEFAULT_LAYOUT . DS . 'errors' . DS . $errorCode . '.html';

		if(!is_readable($errorView)){
			$errorView = WWW_ROOT . DS . 'layouts' . DS . DEFAULT_LAYOUT . DS . 'errors' . DS . '504' . '.html';
		}

		include_once $errorView;

	}


}

 ?>