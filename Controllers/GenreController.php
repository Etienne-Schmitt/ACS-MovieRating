<?php

/**
 * Class GenreController
 */
class GenreController extends Controller
{

    /** @var Genre Instance of Genre Class */
    private $genre;

    public function __construct()
    {
        parent::__construct();
        $this->genre = new Genre();
    }

    public function showGenre()
    {
        $allGenres = self::convertGenreArrayForTwig($this->genre->getAllGenres());

        $pageTwig = 'genre.html.twig';

        self::$_twig->addGlobal("arrayGenres", $allGenres);
        echo $this->showPage($pageTwig);
    }

    public static function convertGenreArrayForTwig($array)
    {
        $arrayEnd = [];

        for ($i = 0; $i < count($array); $i++) {
            $arrayEnd[$array[$i]['id_genre']] = $array[$i]['genre'];
        }

        return $arrayEnd;
    }
}