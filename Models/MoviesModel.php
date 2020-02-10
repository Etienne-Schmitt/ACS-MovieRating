<?php

class MoviesModel extends Model {
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getActors($id) {
        $req = $this->pdo->prepare('SELECT nom_artiste, prenom_artiste FROM artiste a, film f, artiste_has_film m where a.id_artiste = m.artiste_id_artiste AND f.id_film = m.film_id_film AND f.id_film = ? AND a.id_artiste NOT IN (SELECT artiste_id_artiste FROM film)');
        $req->execute([$id]);
        return $req->fetchAll();
    }

    public function getMovieDetails($id) {
      $req = $this->pdo->prepare('SELECT * FROM film WHERE id_film = ?');
      $req->execute([$id]);
      return $req->fetch();
  }

    public function getAllMovies() {
        //$req = $this->pdo->prepare('SELECT * FROM exemple');
        //$req = $this->pdo->prepare('SELECT exemple.*, truc.* FROM exemple, truc, exemple_truc WHERE exemple.id = exemple_truc.id_exemple AND exemple_truc.id_truc = truc.id');
        $req = $this->pdo->prepare(
            // 'SELECT e.*, t.*,
            // GROUP_CONCAT(DISTINCT t.text SEPARATOR "\#~#") AS text
            // FROM exemple e
            // INNER JOIN exemple_truc et ON e.id = et.id_exemple
            // INNER JOIN truc t ON et.id_truc = t.id_truc
            // GROUP BY e.id'
            'SELECT * FROM film'
        );
        $req->execute();
        return $req->fetchAll();
    }

    // public function addMovie() {

    // }
}
