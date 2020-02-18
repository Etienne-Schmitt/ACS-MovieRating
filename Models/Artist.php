<?php

/**
 * Class Artist
 */
class Artist extends BDDConnect
{
    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    /**
     * Get all artists id and data
     * @return array
     */
    public function getAllArtists()
    {
        $sql = "SELECT * FROM artists";
        $req = self::$_pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}
