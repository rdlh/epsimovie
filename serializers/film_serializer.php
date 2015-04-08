<?php

class FilmSerializer {
	public static function multiple_to_json($films) {
		$formated_films = [];

		foreach ($films as $film) {
			array_push($formated_films, [
                'id' 		=> $film->get_id(),
                'title' 	=> $film->get_title(),
                'image' 	=> $film->get_image(),
                'year' 		=> $film->get_year()
			]);
		}

		return json_encode($formated_films);
	}

	public static function one_to_json($film) {
		$formated_film =[
            'id' 		=> $film->get_id(),
            'title' 	=> $film->get_title(),
            'image' 	=> $film->get_image(),
            'synopsis' 	=> $film->get_synopsis(),
            'year' 		=> $film->get_year()
		];

		return json_encode($formated_film);
	}
}