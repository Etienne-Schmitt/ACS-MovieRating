<?php

/**
 * Class Artist
 */
class Artist extends BDDConnect
{
    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    /**
     * Get all artists id and data
     * @return array
     */
    public function getAllArtists()
    {
        $sql = "SELECT * FROM artists";
        $req = self::$_pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getActorsDetails($id) {
      $sql = 
      'SELECT lastname_artist, firstname_artist ' . 
      'FROM artists a, movies m, artists_movies r ' . 
      'WHERE a.id_artist = r.id_artist ' . 
      'AND m.movie_id = r.id_movie ' . 
      'AND m.movie_id = ? ' . 
      'AND a.id_artist ' . 
      'NOT IN ' . 
      '(SELECT director_id FROM movies)';

      $req =  self::$_pdo->prepare($sql);
      $req->execute([$id]);
      return $req->fetchAll();
    }

}
