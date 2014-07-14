<?php 

class Controller {

	private $_view = NULL;

	public $helpers = array(
		'Html'
		);

	public function __construct() {
		$this->_view = new View(new Request());
	}


	public function getView(){
		return $this->_view;
	}

	public function set() {
		$args = func_num_args();
		switch ($args) {
			case 1:
				$this->serArray(func_get_arg(0));
				break;
			case 2:
				$this->setKeys(func_get_arg(0), func_get_arg(1));

		}
	}
	public function setArray($arrVar) {
		$this->_view->setVar($arrVar);
	}

	public function setKeys($key, $val) {
		$this->_view->setVar(array($key=>$val));
	}

	
}


 ?>