<?php

class GenreController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->movieGenre = new Genre();
    }

    public function showGenre() 
    {
        $result = $this->movieGenre->getAllGenres();
        $pageTwig = 'genre/genre.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
   
    public function AddGenre() 
    {
        $pageTwig = 'genre/addGenre.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render();
    }

    public function getGenreById($id)
    {
        $result = $this->movieGenre->getGenreByName($id);
        $pageTwig = 'genre/updateGenre.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }

    public function updateGenreById($id_genre)
    {
        $genre = $_POST['genre'];
        $this->movieGenre->updateGenre($id_genre, $genre);
        //header('Location: ' . self::$_baseUrl . '/genre');
        $uri = self::$_baseUrl;
        //header("Location: $uri/admin/genre/update");
        header("Location: $uri/genre");
        exit ;
    }

    public function deleteGenreById($id)
    {
        $this->movieGenre->deleteGenre($id);
        $uri = self::$_baseUrl;
        header("Location: $uri/genre");
        exit ;
    }
} 