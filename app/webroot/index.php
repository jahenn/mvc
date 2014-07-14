<?php 

/**
 * @Author: Jorge Luis Juárez M.
 * @email: Personal@JorgeJuarez.net
 * @Web: http://JorgeJuarez.Net
 * 
 * Framework MVC PHP 5.
 * http://mvc.jorgejuarez.net/
 * @Version: 0.1
 * @date: 13 / Jul / 2014.
 * 
 */

 ?>



<?php

define('VERSION', '0.1');
define('APP_DIR', basename(dirname(dirname(__FILE__))));
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(dirname(__FILE__))));
define('WEBROOT_DIR', basename(dirname(__FILE__)));
define('WWW_ROOT', dirname(__FILE__) . DS);


require_once ROOT . DS . APP_DIR . DS . 'config.php';
require_once ROOT . DS . CORE . DS . 'Basics.php';
require_once ROOT . DS . CORE . DS . 'Request.php';
require_once ROOT . DS . CORE . DS . 'Bootstrap.php';
require_once ROOT . DS . CORE . DS . 'Controller.php';
require_once ROOT . DS . CORE . DS . 'View.php';
require_once ROOT . DS . CORE . DS . 'Helper.php';



require_once ROOT . DS . CORE . DS . 'ErrorController.php';


try {
	Bootstrap::run(new Request());
} catch (Exception $e) {
	ErrorController::setError($e);
}

?>