<?php 
	
	class HtmlHelper extends Helper
	{
		public function css($filename) {

			$url = WEBROOT_URL . '/layouts/' . DEFAULT_LAYOUT . '/css/' . $filename . '.css';

			return '
				<link rel="stylesheet" href="'.$url.'">
				' ;

		}
		public function js($filename) {

			$url = WEBROOT_URL . '/layouts/' . DEFAULT_LAYOUT . '/js/' . $filename . '.js';

			return '
				<script src="' . $url . '" type="text/javascript"></script>
				' ;

		}

		public function url($args) {

			$url = WEBROOT_URL . '/' . $args['controller'] . '/' . $args['action'];
			
			if(isset($args['args'])) {
				foreach ($args['args'] as $key => $value) {
					if(is_numeric($value)) {
						$url = $url . '/' . $value;
					}
				}
			}else{
				$url = rtrim($url, "index");
			}


			return $url;

		}
	}


 ?>