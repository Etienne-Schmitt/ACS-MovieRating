<?php

class HomeDbConnect extends dbConnect {
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getActors($id) {
        $req = $this->pdo->prepare('SELECT lastname_artist, firstname_artist FROM artists a, movies m, artists_movies r where a.id_artist = r.id_artist AND m.movie_id = r.id_movie AND r.id_movie = ? AND a.id_artist NOT IN (SELECT director_id FROM movies)');
        $req->execute([$id]);
        return $req->fetchAll();
    }

    public function getMovieDetails($id) {
      $req = $this->pdo->prepare('SELECT * FROM movies WHERE movie_id = ?');
      $req->execute([$id]);
      return $req->fetch();
  }

    public function getAllMovies() {
        $req = $this->pdo->prepare(
            'SELECT * FROM movies'
        );
        $req->execute();
        return $req->fetchAll();
    }
}
