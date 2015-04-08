<?php

class ActorSerializer {
	public static function multiple_to_json($actors) {
		$formated_actors = [];

		foreach ($actors as $actor) {
			array_push($formated_actors, [
                'id' 		=> $actor->get_id(),
                'name' 		=> $actor->get_name(),
                'image' 	=> $actor->get_image(),
                'year' 		=> $actor->get_year()
			]);
		}

		return json_encode($formated_actors);
	}

	public static function one_to_json($actor) {
		$formated_actor =[
            'id' 		=> $actor->get_id(),
            'name' 		=> $actor->get_name(),
            'image' 	=> $actor->get_image(),
            'year' 		=> $actor->get_year()
		];

		return json_encode($formated_actor);
	}
}