<?php

// Parent class
require_once(__ROOT__.'/epsimovie/controllers/base_controller.php');

// Models
require_once(__ROOT__.'/epsimovie/models/actor.php');

// Serializers
require_once(__ROOT__.'/epsimovie/serializers/actor_serializer.php');

class ActorsController extends BaseController {
	public static function index() {
		echo ActorSerializer::multiple_to_json(Actor::all());
	}

	public static function show($id) {
		echo ActorSerializer::one_to_json(Actor::find($id));
	}

	public static function create($values) {
		Actor::create($values);
		echo json_encode(['message' => 'Actor saved']);
	}
	
	public static function update($id, $values) {

	}
}