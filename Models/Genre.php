<?php

class Genre extends BDDConnect
{
    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    public function getAllGenres()
    {
        $sql = 'SELECT * FROM movie_genres';
        $req = self::$_pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}
