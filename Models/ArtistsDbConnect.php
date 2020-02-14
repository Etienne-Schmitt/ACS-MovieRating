<?php

class ArtistsDbConnect extends dbConnect {
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
