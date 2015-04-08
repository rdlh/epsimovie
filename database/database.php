<?php

class Database {
    private $db;

    const HOST     = '127.0.0.1';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'epsimovie';

    public function __construct() {
      $this->db = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);
    }

    public function __destruct() {
      	mysqli_close($this->db);
    }

    public function select($query) {
      	return $this->toArray($this->query($query));
    }

    public function insert($query) {
        return $this->query($query);
    }

    public function delete($query) {
        return $this->query($query);
    }

    public function update($query) {
        return $this->query($query);
    }

    public function query($query) {
      	return mysqli_query($this->db, $query);
    }

    private function toArray($results) {
		$arr = array();
		while ($row = mysqli_fetch_array($results)) {
			$temp = array();
			foreach ($row as $key => $val) {
			  	if (is_string($key))
			    	$temp[$key] = $val;
			}
			array_push($arr, $temp);
		}
		return $arr;
    }
}
?>