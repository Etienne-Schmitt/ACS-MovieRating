<?php

class HomeModel extends Model {
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getOneMovie($id) {
        $req = $this->pdo->prepare('SELECT exemple.*, truc.*,
        GROUP_CONCAT(truc.text) AS text FROM exemple, truc, exemple_truc WHERE exemple.id = ? AND exemple.id = exemple_truc.id_exemple AND exemple_truc.id_truc = truc.id_truc');
        $req->execute([$id]);
        return $req->fetch();
    }

    public function getAllMovies() {
        //$req = $this->pdo->prepare('SELECT * FROM exemple');
        //$req = $this->pdo->prepare('SELECT exemple.*, truc.* FROM exemple, truc, exemple_truc WHERE exemple.id = exemple_truc.id_exemple AND exemple_truc.id_truc = truc.id');
        $req = $this->pdo->prepare(
            // 'SELECT e.*, t.*,
            // GROUP_CONCAT(DISTINCT t.text SEPARATOR "\#~#") AS text
            // FROM exemple e
            // INNER JOIN exemple_truc et ON e.id = et.id_exemple
            // INNER JOIN truc t ON et.id_truc = t.id_truc
            // GROUP BY e.id'
            'SELECT * FROM film'
        );
        $req->execute();
        return $req->fetchAll();
    }
}
