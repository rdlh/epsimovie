<?php

define('__ROOT__', dirname(dirname(__FILE__))); 

// Controllers

require_once(__ROOT__.'/epsimovie/controllers/films_controller.php');
require_once(__ROOT__.'/epsimovie/controllers/actors_controller.php');
require_once(__ROOT__.'/epsimovie/controllers/directors_controller.php');

$path   = $_SERVER['REQUEST_URI'];
$paths  = explode("/", $path);

if ($paths[2] == 'films') {

	FilmsController::render($paths[3]);
    
} else if ($paths[2] == 'actors') {

	ActorsController::render($paths[3]);
    
} else if ($paths[2] == 'directors') {

	DirectorsController::render($paths[3]);
    
}