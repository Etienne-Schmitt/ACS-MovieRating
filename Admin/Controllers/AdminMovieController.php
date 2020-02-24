<?php


/**
 * Class AdminMovieController
 */
class AdminMovieController extends AdminHomeController
{
    /** @var $movie Movie */
    private $movie;
    /** @var $arrayMovies array */
    private $arrayMovies;

    public function __construct()
    {
        parent::__construct();
        $this->movie = new Movie();
        $this->arrayMovies = MovieController::convertMovieArrayForTwig($this->movie->getAllMovies());
    }

    public function showAddMovie()
    {
        $pageTwig = 'admin/movie/movie.add.admin.html.twig';
        echo $this->showPage($pageTwig);
    }

    public function showEditMovie()
    {
        $pageTwig = 'admin/movie/movie.edit.admin.html.twig';
        self::$_twig->addGlobal('arrayMovies', $this->arrayMovies);
        echo $this->showPage($pageTwig);
    }

    public function showDelMovie()
    {
        $pageTwig = 'admin/movie/movie.delete.admin.html.twig';
        self::$_twig->addGlobal('arrayMovies', $this->arrayMovies);
        echo $this->showPage($pageTwig);
    }


}