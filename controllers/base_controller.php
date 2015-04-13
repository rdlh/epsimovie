<?php

class BaseController {
	public static function render($id) {
		header('Content-Type: application/json; charset=utf8');

		switch ($_SERVER['REQUEST_METHOD']) {
	        case 'GET':

	        	if (is_null($id)) {
	        		if (is_null($_GET['search'])) {
		        		static::index();
		        	} else {
		        		static::search($_GET['search']);
		        	}
	        	} else {
	        		static::show((int)$id);
	        	}

	        	break;
	            
	        case 'POST':

	        	if (is_null($id)) {
	        		static::create($_POST);
	        	} else {
	        		static::update((int)$id, $_POST);
	        	}

	        	break;
	    }
	}


	public static function render_404() {
		http_response_code(404);

		echo json_encode(['error' => 'Not found']);
	}
}