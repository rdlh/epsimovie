<?php

// Parent class
require_once(__ROOT__.'/epsimovie/controllers/base_controller.php');

// Models
require_once(__ROOT__.'/epsimovie/models/film.php');

// Serializers
require_once(__ROOT__.'/epsimovie/serializers/film_serializer.php');

class FilmsController extends BaseController {
	public static function index() {
		echo FilmSerializer::multiple_to_json(Film::all());
	}

	public static function show($id) {
		echo FilmSerializer::one_to_json(Film::find($id));
	}

	public static function create($values) {
		Film::create($values);
		echo json_encode(['message' => 'Film saved']);
	}
	
	public static function update($id, $values) {
		Film::update($id, $values);
		echo json_encode(['message' => 'Film updated']);
	}
}