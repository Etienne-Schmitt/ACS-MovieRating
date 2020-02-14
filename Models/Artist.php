<?php 

class Artist extends BDDConnect
{
    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    public function getAllArtists()
    {
        $sql = "SELECT * FROM artists";
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

 public function updateArtist($lastname_artist, $firstname_artist, $birth_date)
    {

        $sql="UPDATE artists
        SET lastname_artist='$lastname_artist',
        firstname_artist='$firstname_artist',
        birth_date='$birth_date'
        WHERE id_artist= $id_artist";

        $req=self::$_pdo->prepare($sql);
        return $req->execute();
       
    }

   public function deleteArtist($id_artist)
   {
        $sql= "DELETE FROM artists
        WHERE id_artist= '$ad_artist' " ;
        $req= self::$_pdo->prepare($sql);
        return $req->execute();

   } 
}
