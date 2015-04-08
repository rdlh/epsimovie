<?php

class BaseController {
	public static function render($id) {
		header('Content-Type: application/json; charset=utf8');

		switch ($_SERVER['REQUEST_METHOD']) {
	        case 'GET':

	        	if (is_null($id)) {
	        		static::index();
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
}