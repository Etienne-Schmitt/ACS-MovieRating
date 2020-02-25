<?php


/**
 * Class AdminMovieController
 */
class AdminMovieController extends AdminController
{
    const AUTHORIZEDFILESTYPES = [
        'image/jpeg',
        'image/png',
        'image/tiff'
    ];
    /** @var $adminMovie AdminMovie */
    private $adminMovie;
    private $arrayArtists;
    /** @var AdminMovie */
    private $adminGenre;
    /** @var AdminMovie */
    private $adminArtist;

    /** @var $arrayMovies array */
    private $arrayMovies;
    private $arrayGenres;

    public function __construct()
    {
        parent::__construct();
        $this->adminMovie = new AdminMovie();
        $this->adminGenre = new AdminGenre();
        $this->adminArtist = new AdminArtist();
        $this->arrayMovies = Movie::convertMovieArrayForTwig($this->adminMovie->getAllMovies());
        $this->arrayGenres = Genre::convertGenreArrayForTwig($this->adminGenre->getAllGenres());
        $this->arrayArtists = AdminArtist::convertArtistArrayForTwig(($this->adminArtist->getAllArtists()));
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