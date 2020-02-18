<?php

class Movie extends BDDConnect {

    /**
     * Movie constructor.
     */
    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    public function getAllMovies()
    {
        $sql = "SELECT * FROM movies";
        $req = self::$_pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

