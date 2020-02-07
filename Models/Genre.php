<?php 

        class Genre extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getAllGenres()
    {
        $sql = 'SELECT * FROM movie_genres';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    
}
