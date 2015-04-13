<?php

// Models
require_once(__ROOT__.'/epsimovie/models/film.php');

class AllocineParser
{
    public static function parse($allocine_films, $local_films)
    {
        $films = [];
        foreach ($allocine_films as $allocine_film) {
            $is_local = false;
            foreach ($local_films as $local_film) {
                if ((int)$local_film->get_external_id() == (int)$allocine_film->code) {
                    $is_local = true;
                }
            }

            if ($is_local) {
                array_push($films, $local_film);
            } else {
                $new_film = new Film(static::object_to_array($allocine_film));
                array_push($films, $new_film);
            }
        }
        return $films;
    }

    public static function parse_single($allocine_film, $local_film)
    {
        if(is_null($local_film)) {
            return new Film(static::object_to_array($allocine_film));
        } else {
            return $local_film;
        }
    }

    public static function object_to_array($object) {
        $formated_name  = (is_null($object->title)) ? $object->originalTitle : $object->originalTitle . ' (' . $object->title . ')';
        $formated_image = (is_null($object->poster)) ? 'http://fr.web.img4.acsta.net/r_160_240/b_1_d6d6d6/commons/emptymedia/empty_photo.jpg' : $object->poster->href;
        
        $values = [
            'external_id'   => $object->code,
            'title'         => $formated_name,
            'synopsis'      => null,
            'image'         => $formated_image,
            'year'          => $object->productionYear
        ];

        return $values;
    }
}