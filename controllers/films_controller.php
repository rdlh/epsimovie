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

	public static function search($search) {
		require_once(__ROOT__.'/epsimovie/services/allocine/allocine.php');
		require_once(__ROOT__.'/epsimovie/services/allocine/parser.php');

		$allocine = new Allocine('100043982026', '29d185d98c984a359e6e6f26a0474269');

		$films = $allocine->search($search);

		echo FilmSerializer::multiple_to_json(AllocineParser::parse(json_decode($films)->feed->movie, Film::all()));
	}

	public static function show($id) {
		$film = Film::find($id);
		if ($film == null) {
			static::render_404();
		} else {
			echo FilmSerializer::one_to_json($film);
		}
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