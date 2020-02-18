<?php

class MoviesDbConnect extends dbConnect
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    /**
     * @param $movieID int ID of a movie
     * @return array Contains all actors from a movie
     */
    public function getActorsDetails($movieID)
    {
        $req = $this->pdo->prepare('SELECT nom_artiste, prenom_artiste FROM artiste a, film f, artiste_has_film m where a.id_artiste = m.artiste_id_artiste AND f.id_film = m.film_id_film AND f.id_film = ? AND a.id_artiste NOT IN (SELECT artiste_id_artiste FROM film)');
        $req->execute([$movieID]);
        return $req->fetchAll();
    }

    /**
     * @param $movieID int ID of a movie
     * @return mixed
     */
    public function getMovieDetails($movieID) {
      $req = $this->pdo->prepare('SELECT * FROM movies WHERE movie_id = ?');
      $req->execute([$movieID]);
      return $req->fetch();
  }

    /**
     * @return array All data for all movies
     */
    public function getAllMoviesData()
    {
        $req = $this->pdo->prepare(
            'SELECT * FROM movies'
        );
        $req->execute();
        return $req->fetchAll();
    }

    public function getAllDirectors() {
      $req = $this->pdo->prepare(
        'SELECT DISTINCT artist_id, lastname_artist, firstname_artist FROM artists a, movies m WHERE a.artist_id = m.director_id');
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

    public function insertMovie($titre, $annee_sortie, $affiche, $synopsis, $genre, $director) {
      $sql = "INSERT INTO film (titre, annee_sortie, affiche, synposis, genre_id_genre, artiste_id_artiste) VALUES (:titre, :annee_sortie, :affiche, :synopsis, :genre, :director)";
      $req = self::$_pdo->prepare($sql);
      return $req->execute(['titre' => $titre, 'annee_sortie' => $annee_sortie, 'affiche' => $affiche, 'synopsis' => $synopsis, 'genre' => $genre, 'director' => $director]);
    }

    public function getDirectorDetails($id) {
      $req = $this->pdo->prepare(
        'SELECT DISTINCT a.id_artiste, a.nom_artiste, a.prenom_artiste FROM artiste a, film f WHERE a.id_artiste = f.artiste_id_artiste AND f.id_film = ?');
      $req->execute([$id]);
      return $req->fetch();
    }

    public function getAllOtherDirectors($id) {
      $req = $this->pdo->prepare(
        'SELECT DISTINCT f.artiste_id_artiste, a.prenom_artiste, a.nom_artiste FROM artiste a, film f WHERE f.artiste_id_artiste = a.id_artiste AND f.artiste_id_artiste NOT IN
        (SELECT id_artiste FROM artiste a, film f WHERE a.id_artiste = f.artiste_id_artiste AND f.id_film = ? )'
        );
      $req->execute([$id]);
      return $req->fetchAll();
    }

    public function getGenre($id) {
      $req = $this->pdo->prepare(
        'SELECT * FROM genre g, film f WHERE g.id_genre = f.genre_id_genre AND f.id_film = ?'
      );
      $req->execute([$id]);
      return $req->fetch();
    }

    public function getAllOtherGenres($id) {
      $req = $this->pdo->prepare(
        'SELECT * FROM genre WHERE nom_genre NOT IN
        (SELECT nom_genre FROM genre g, film f WHERE g.id_genre = f.genre_id_genre AND f.id_film = ?)'
      );
      $req->execute([$id]);
      return $req->fetchAll();
    }

    public function updateMovie($id_film, $titre, $annee_sortie, $affiche, $synopsis, $genre, $director) {
      $req = self::$_pdo->prepare(
        'UPDATE film SET titre=:titre, annee_sortie=:annee_sortie, affiche=:affiche, synposis=:sinopsis, genre_id_genre=:genre_id_genre, artiste_id_artiste=:artiste_id_artiste WHERE id_film=:id_film'
      );
      $req->execute(['id_film' => $id_film, 'titre' => $titre, 'annee_sortie' => $annee_sortie, 'affiche' => $affiche, 'synopsis' => $synopsis, 'genre' => $genre, 'director' => $director]);
    }
}