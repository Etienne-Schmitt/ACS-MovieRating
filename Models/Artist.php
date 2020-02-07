<?php 

        class Artist extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getAllArtists()
    {
        $sql = 'SELECT * FROM artists';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    
}
