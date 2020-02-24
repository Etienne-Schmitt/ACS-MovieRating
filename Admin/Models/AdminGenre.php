<?php


class AdminGenre extends Genre
{
    public function insertGenre($genre)
    {
        $sql = "INSERT INTO movie_genres (genre) values (:genre)";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':genre', $genre);
        return $req->execute();
    }

    public function updateGenre($id_genre, $genre)
    {
        $sql = "UPDATE movie_genres SET genre = :genre WHERE id_genre = :id";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':genre', $genre);
        $req->bindParam(':id', $id_genre);
        return $req->execute();
    }

    public function deleteGenre($id_genre)
    {
        $sql = "DELETE FROM movie_genres WHERE id_genre = :id";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':id', $id_genre);
        return $req->execute();
    }

    public function getGenreById($id_genre)
    {
        $sql = "SELECT genre FROM movie_genres WHERE id_genre = :id";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':id', $id_genre);
        return $req->fetch();
    }
}