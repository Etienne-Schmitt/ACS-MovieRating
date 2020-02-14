<?php

class ArtistsModel extends Model {
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getAllArtists() {
        $req = $this->pdo->prepare(
          'SELECT * FROM artiste'
        );
        $req->execute();
        return $req->fetchAll();
    }
}
