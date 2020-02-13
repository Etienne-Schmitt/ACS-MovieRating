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
      $req = $this->pdo->prepare(
          'SELECT * FROM film'
      );
      $req->execute();
      return $req->fetchAll();
    }

    public function getAllDirectors() {
      $req = $this->pdo->prepare(
        'SELECT DISTINCT id_artiste, nom_artiste, prenom_artiste FROM artiste a, film f WHERE a.id_artiste = f.artiste_id_artiste');
      $req->execute();
      return $req->fetchAll();
    }

    public function getAllGenres() {
      $req = $this->pdo->prepare(
          'SELECT * FROM genre'
      );
      $req->execute();
      return $req->fetchAll();
    }

    public function insertMovie($titre, $annee_sortie, $synopsis, $genre, $director) {
      $sql = "INSERT INTO film (titre, annee_sortie, synposis, genre_id_genre, artiste_id_artiste) VALUES (:titre, :annee_sortie, :synopsis, :genre, :director)";
      $req = self::$_pdo->prepare($sql);
      // $req->bindParam(':titre', $titre);
      // $req->bindParam(':annee_sortie', $annee_sortie);
      // // $req->bindParam(':affiche', $affiche);
      // // $req->bindParam(':affiche_temp', $affiche_temp);
      // $req->bindParam(':synopsis', $synopsis);
      return $req->execute(['titre' => $titre, 'annee_sortie' => $annee_sortie, 'synopsis' => $synopsis, 'genre' => $genre, 'director' => $director]);
      // move_uploaded_file($affiche_temp, "/Uploads/posters/$affiche");
    }
}
