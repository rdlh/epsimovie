<?php

// Database connexion

require_once(__ROOT__.'/epsimovie/database/database.php');

abstract class Model {
	public static $INT_FIELDS = ['year', 'external_id'];

	public static function all() {
		$db 	 = new Database();
		$models  = [];
		$class   = get_called_class();

		$matches = $db->select('SELECT * FROM `' . static::$TABLE_NAME . '`;');

		foreach ($matches as $match) {
			array_push($models, new $class($match));
		}

		return $models;
	}

	public static function find($id) {
		$db 	 = new Database();
		$models  = [];
		$class   = get_called_class();

		$matches = $db->select('SELECT * FROM `' . static::$TABLE_NAME . '` WHERE `id` = ' . $id . ';');

		foreach ($matches as $match) {
			return new $class($match);
		}
	}

	public static function find_by_external_id($id) {
		$db 	 = new Database();
		$models  = [];
		$class   = get_called_class();

		$matches = $db->select('SELECT * FROM `' . static::$TABLE_NAME . '` WHERE `id` = ' . $external_id . ';');

		foreach ($matches as $match) {
			return new $class($match);
		}
	}

	public static function create($attributes) {
		$db 	 = new Database();
		$class   = get_called_class();
		$fields  = join(', ', static::$FIELDS);

		$attrs   = [];

		foreach (static::$FIELDS as $field) {
			if (in_array($field, static::$INT_FIELDS)) {
				array_push($attrs, $attributes[$field]);
			} else {
				array_push($attrs, '"' . $attributes[$field] . '"');
			}
		}
		

		$db->insert('INSERT INTO `' . static::$TABLE_NAME . '` (' . $fields . ') VALUES (' . join(', ', $attrs) . ');');
	}

	public static function update($id, $attributes) {
		$db 	 = new Database();
		$class   = get_called_class();
		$fields  = join(', ', static::$FIELDS);

		$attrs   = [];

		foreach ($attributes as $field => $attribute) {
			if (in_array($field, static::$INT_FIELDS)) {
				array_push($attrs, $field . ' = ' . $attribute);
			} else {
				array_push($attrs, $field . ' = "' . $attribute . '"');
			}
		}

		$db->insert('UPDATE `' . static::$TABLE_NAME . '` SET ' . join(', ', $attrs) . ' WHERE `id` = ' . $id . ';');
	}
}