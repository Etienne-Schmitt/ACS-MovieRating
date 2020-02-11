<?php

class GenreController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->movieGenre = new Genre();
    }

    public function showGenre() {
        $result = $this->movieGenre->getAllGenres();
        $pageTwig = 'genre/genre.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
    // Formulaire pour creer un nouvel artiste
	// public function add() 
	// {
	// 	$pageTwig = 'genre/addGenre.html.twig';
	// 	$template = self::$_twig->load($pageTwig);
	// 	$result = "";// $id element clef correspond a la table mysql artiste

	// 	echo $template->render(["result" => $result]);
	// }

    public function AddGenre() {
        $pageTwig = 'genre/addGenre.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render();
    }

    public function insertNewGenre() {
        $genre = $_POST['genre'];
        $this->movieGenre->insertGenre($genre);
        header('Location: http://localhost/MovieFilm/genre/add');
        exit;

    }
} 