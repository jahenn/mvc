<?php 

class View {
	private $_controller = NULL;
	private $_view = NULL;
	private $_vars = NULL;

	private $fetch = array();

	public function __construct(Request $request) {

		$this->_controller = $request->getController();
		$this->_view = $request->getMethod();
		$this->_vars = array();

	}

	public function setVar($varArr){
		foreach ($varArr as $key => $value) {
			$this->_vars[$key] = $value;
		}
	}

	public function render() {
		
		foreach ($this->_vars as $key => $value) {
			$$key = $value;
		}


		$this->fetch['content'] = ROOT . DS . APP_DIR . DS . 'views' . DS . $this->_controller . DS . $this->_view . '.html';

		include_once ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'layouts' . DS . DEFAULT_LAYOUT . DS . 'index.html';
	}


	public function fetchContent()
	{
		foreach ($this->_vars as $key => $value) {
			$$key = $value;
		}

		if(is_readable($this->fetch['content'])) {
			include_once $this->fetch['content'];
			
		}else{

			throw new Exception("Vista no definida", 1);
			

		}

	}






}


 ?>