<?php

abstract class BDDConnect {

    private const CONFIG = __DIR__ . '/../core/config.json';
    protected static $_pdo = null; 
    private const OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    protected static function getPdo() {
        if (is_null(self::$_pdo)) {
            $config = json_decode(file_get_contents(self::CONFIG));
            try{
                //$bdd = new PDO('mysql:host=localhost;dbname=mydb;','root','');
                self::$_pdo = new PDO($config->dsn, $config->user, $config->psswd,self::OPTIONS);
             }catch(PDOException $e){
                die('Erreur : '.$e->getMessage());
             }
        }
        return self::$_pdo;
    }
}