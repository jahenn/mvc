<?php 


class Bootstrap {


	public static function run(Request $request) {

		$controller = $request->getController() . 'Controller';
		$rutaController = ROOT . DS . APP_DIR . DS . 'controllers' . DS . $controller . '.php';

		$method = $request->getMethod();
		$args = $request->getArgs();


		if(is_readable($rutaController)) {

			require_once $rutaController;
			$controller = new $controller;

			if(!is_callable(array($controller, $method))) {
				throw new Exception("Methodo no Definido o no accesible", 1);
			}


			if(!isset($args) || count($args) <= 0 ) {
				call_user_func(array($controller, $method));
			}else{

				call_user_func_array(array($controller, $method), $args);
			}

			foreach ($controller->helpers as $key => $value) {
				$helper = $value . 'Helper';
				require_once  ROOT . DS . CORE . DS . 'helpers' . DS . $helper . '.php'	;
				$helper = new $helper;
				$controller->getView()->$value = $helper;
				}

			$controller->getView()->render();

		}else {
			throw new Exception("Controlador no existe", 504);

			

		}


	}

}


 ?>