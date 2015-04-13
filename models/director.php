<?php 

// Parent class

require_once(__ROOT__.'/epsimovie/models/model.php');

class Director extends Model {
	public static $TABLE_NAME = 'directors';
	public static $FIELDS     = ['name', 'image', 'year', 'external_id'];

	private $id;
	private $name;
	private $image;
	private $year;
	private $external_id;

	public function __construct($values) {
		$this->id          = (int)$values['id'];
		$this->name        = $values['name'];
		$this->image       = $values['image'];
		$this->year        = (int)$values['year'];
		$this->external_id = (int)$values['external_id'];
	}

	public function get_id() {
		return $this->id;
	}

	public function get_name() {
		return $this->name;
	}

	public function get_image() {
		return $this->image;
	}

	public function get_year() {
		return $this->year;
	}

	public function get_external_id() {
		return $this->external_id;
	}

}