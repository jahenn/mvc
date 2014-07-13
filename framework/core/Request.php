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