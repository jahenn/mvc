<?php 

class Request {

	private $_controller = NULL;
	private $_method = NULL;
	private $_args = NULL;


	public function __construct(){
		
		if(isset($_GET['url'])){
			$url = explode('/', $_GET['url']);
			$url = array_filter($url);

			$this->_controller = array_shift($url);
			$this->_method = array_shift($url);
			$this->_args = $url;
			
			$query_string = $_GET['url'];
			$root = str_replace($query_string, '', $_SERVER['REQUEST_URI']);
			$root = 'http://'.$_SERVER['HTTP_HOST'].$root;
			

		}else{

			$root = $_SERVER['REQUEST_URI'];
			$root = 'http://'.$_SERVER['HTTP_HOST'].$root;
			
		}

		$root = rtrim($root, '/');

		if(!defined('WEBROOT_URL')){
			define('WEBROOT_URL', $root);
		}


		if(!$this->_controller) $this->_controller = DEFAULT_CONTROLLER;
		if(!$this->_method) $this->_method = DEFAULT_METHOD;
		if(!$this->_args) $this->_args = array();

	}


	public function getController()
	{
		return $this->_controller;
	}

	public function getMethod()
	{
		return $this->_method;
	}

	public function getArgs()
	{
		return $this->_args;
	}


}

 ?>