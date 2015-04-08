<?php

class DirectorSerializer {
	public static function multiple_to_json($director) {
		$formated_director = [];

		foreach ($director as $actor) {
			array_push($formated_director, [
                'id' 		=> $actor->get_id(),
                'name' 		=> $actor->get_name(),
                'image' 	=> $actor->get_image(),
                'year' 		=> $actor->get_year()
			]);
		}

		return json_encode($formated_director);
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