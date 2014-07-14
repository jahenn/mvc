<?php 

class HomeController extends Controller {

	public function index(){
		$this->set('version', VERSION);
	}
}

 ?>