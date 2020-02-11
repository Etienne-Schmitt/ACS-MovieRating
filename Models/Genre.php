<?php 

class Genre extends BDDConnect
{

    public function __construct()
    {
        self::$_pdo = parent::getPdo();
    }

    public function getAllGenres()
    {
        $sql = 'SELECT genre FROM movie_genres';
        //$sql = 'SELECT * FROM movie_genres';
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

    //exemple('L\'homme irrationnel','Woody Allen','2015');
     // or die(print-r($bdd->errorInfo())) ;
    /* le or die est inutile avec la connexion en ERRMODE */
    /* $resultat pour traiter les erreurs proprement, sans ERRMODE */


    
        
    } 
