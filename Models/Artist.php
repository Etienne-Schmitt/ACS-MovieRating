<?php 

class Artist extends BDDConnect
{
    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    public function getAllArtists()
    {
        $sql = 'SELECT * FROM artists';
        $req =  self::$_pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function insertArtist($lastname_artist, $firstname_artist, $birth_date)
        {
    $sql= "INSERT INTO artists(lastname_artist, firstname_artist, birth_date) VALUES (:lastname_artist, :firstname_artist, :birth_date)" ;
    $req=self::$_pdo->prepare($sql);
    $req->bindParam(':lastname_artist', $lastname_artist);
    $req-> bindParam(':firstname_artist', $firstname_artist);
    $req-> bindParam(':birth_date', $birth_date);
    return $req->execute();
        }

    
}
