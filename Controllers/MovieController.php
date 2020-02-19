<?php

/**
 * Class GenreController
 */
class MovieController extends Controller {

    /** @var Movie Instance of Movie Class */
     private $movie;
    
    public function __construct()
    {
        parent::__construct();
        $this->movie = new Movie();
    }

    public function showMovie()
    {
        $allMovies = self::convertMovieArrayForTwig($this->movie->getAllMovies());
        $pageTwig = 'movie.html.twig';
        self::$_twig->addGlobal("arrayMovies", $allMovies);
        echo $this->showPage($pageTwig);
    }

    public static function convertMovieArrayForTwig($array)
    {
        $arrayEnd = [];

        for ($i = 0; $i < count($array); $i++) {
            $arrayEnd[$array[$i]['movie_id']] = [
                'titre' => $array[$i]['title'],
                'releaseYear' => $array[$i]['release_year'],
                'poster' => $array[$i]['poster'],
                'synopsis' => $array[$i]['synopsis']
            ];
        }

        return $arrayEnd;
    }



}