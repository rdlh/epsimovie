<?php

// Parent class
require_once(__ROOT__.'/epsimovie/controllers/base_controller.php');

// Models
require_once(__ROOT__.'/epsimovie/models/director.php');

// Serializers
require_once(__ROOT__.'/epsimovie/serializers/director_serializer.php');

class DirectorsController extends BaseController {
	public static function index() {
		echo DirectorSerializer::multiple_to_json(Director::all());
	}

	public static function show($id) {
		echo DirectorSerializer::one_to_json(Director::find($id));
	}

	public static function create($values) {
		Director::create($values);
		echo json_encode(['message' => 'Director saved']);
	}
	
	public static function update() {

	}
}