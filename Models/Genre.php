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

    public function insertGenre($genre){
        $sql = "INSERT INTO movie_genres(genre) values (:genre)";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':genre', $genre);
        return $req->execute();
    }
    
    public function getGenrebyId($id_genre)
    {
        $sql ="SELECT genre FROM movie_genres
        WHERE id_genre = $id_genre";
        $req = self::$_pdo->prepare($sql);
        return $req->execute();
    }

    public function updateGenre($id_genre, $genre)
    {
        $sql ="UPDATE movie_genres
        SET genre = '$genre'
        WHERE id_genre = $id_genre";
        $req = self::$_pdo->prepare($sql);
    return $req->execute();
    }

    public function deleteGenre($id_genre)
    {
        $sql ="DELETE FROM `movie_genres` WHERE `movie_genres`.`id_genre` = $id_genre";
        $req = self::$_pdo->prepare($sql);
    return $req->execute();
    }
} 
