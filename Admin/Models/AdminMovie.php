<?php


class AdminMovie extends Movie
{
    public function insertMovie($title, $year, $poster, $synopsis, $genre_id, $director_id) {
        $sql = "INSERT INTO movies (title, release_year, poster, synopsis, genre_id, director_id) VALUES (:title, :year, :poster, :synopsis, :genre_id, :director_id)";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(":title", $title);
        $req->bindParam("year", $year);
        $req->bindParam("poster", $poster);
        $req->bindParam("synopsis", $synopsis);
        $req->bindParam("genre_id", $genre_id);
        $req->bindParam("director_id", $director_id);

        return $req->execute();
    }

    public function updateMovie($movie_id, $title, $year, $poster, $synopsis, $genre_id, $director_id)
    {
        $sql = "UPDATE movies SET title=:title, release_year=:year, poster=:poster, synopsis=:synopsis, genre_id=:genre_id, director_id=:director_id WHERE movie_id=:movie_id";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(":movie_id", $movie_id);
        $req->bindParam(":title", $title);
        $req->bindParam("year", $year);
        $req->bindParam("poster", $poster);
        $req->bindParam("synopsis", $synopsis);
        $req->bindParam("genre_id", $genre_id);
        $req->bindParam("director_id", $director_id);

        return $req->execute();
    }

    public function deleteMovie($movie_id)
    {
        $sql = "DELETE FROM movies WHERE movie_id= ':id' ";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':id', $movie_id);
        return $req->execute();
    }

    public function getMovieById($movie_id)
    {
        $sql = "SELECT title, release_year, poster, synopsis, genre_id, director_id FROM movies WHERE movie_id = :id";
        $req = self::$_pdo->prepare($sql);
        $req->bindParam(':id', $movie_id);
        return $req->fetch();
    }
}