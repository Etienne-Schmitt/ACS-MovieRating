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
    
    public function getGenre()
    {
        $sql ="SELECT genre FROM movie_genres
        WHERE id_genre = $id_genre";
        $req = self::$_pdo->prepare($sql);
        return $req->execute();
    }
    
    public function getGenreByName($id_genre)
    {
        $sql="SELECT * from movie_genres where id_genre = :id_genre";
        $req=self::$_pdo->prepare($sql);
        $req->bindParam(':id_genre', $id_genre, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OgitBJ);
    }

    public function updateGenre($id_genre, $genre)
    {
        $sql ="UPDATE movie_genres
        SET genre = '$genre'
        WHERE id_genre = $id_genre";
        $req = self::$_pdo->prepare($sql);
    return $req->execute();
    }
    
    } 
