<?php 

// Parent class

require_once(__ROOT__.'/epsimovie/models/model.php');

class Film extends Model {
	public static $TABLE_NAME = 'films';
	public static $FIELDS     = ['title', 'synopsis', 'image', 'year', 'external_id'];

	private $id;
	private $title;
	private $synopsis;
	private $image;
	private $year;
	private $external_id;

	public function __construct($values) {
		$this->id          = (int)$values['id'];
		$this->title       = $values['title'];
		$this->synopsis    = $values['synopsis'];
		$this->image       = $values['image'];
		$this->year        = (int)$values['year'];
		$this->external_id = (int)$values['external_id'];
	}

	public function get_id() {
		return $this->id;
	}

	public function get_title() {
		return $this->title;
	}

	public function get_synopsis() {
		return $this->synopsis;
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