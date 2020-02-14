<?php
//include_once ob_start();

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class MoviesController
 */
class MoviesController extends Controller
{
    /** @var MoviesDbConnect */
    private $dbLink;

    /**
     * MoviesController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbLink = new MoviesDbConnect();
        self::$_twig = parent::getTwig();
    }

    /**
     * @param string $page page name without .html.twig that will be displayed
     * @return string Twig Rendered page
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    private function showPage($page)
    {
        $page .= ".html.twig";
        $template = self::$_twig->load($page);
        return $template->render();
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showMovieHome()
    {
        $moviesData = $this->dbLink->getAllMoviesData();
        self::$_twig->addGlobal('moviesArray', $moviesData);
        echo $this->showPage("list.movie.home.html.twig");

    }

    /**
     * @param int $id
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showMovie($id)
    {
        $allActorsData = $this->dbLink->getActorsDetails($id);
        $movieData = $this->dbLink->getMovieDetails($id);
        self::$_twig->addGlobal('actorsArray', $allActorsData);
        self::$_twig->addGlobal('movie', $movieData);
        echo $this->showPage("Movies/specific.movie");
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getAllMovies()
    {
        $getAllMovies = $this->dbLink->getAllMoviesData();

        self::$_twig->addGlobal('getAllMovies', $getAllMovies);

        echo $this->showPage("Movies/getAllMovies");
    }

    /**
     * Deprecated only method down there
     */

    /**
     * Add a new Movie to the DB
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @deprecated Only for test envs, done in prod via admin pages
     */
    public function addMovie()
    {
        self::$_twig->addGlobal('directors', $this->dbLink->getAllDirectors());
        self::$_twig->addGlobal('genres', $this->dbLink->getAllGenres());

        echo $this->showPage("Movies/addMovie");
    }

    /**
     * Fetch all data from DB into the Update Movie form on the Update Movie page
     * @param $id_film
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @deprecated Only for test envs, done in prod via admin pages
     */
    public function getMovie($id_film)
    {
        $movieDetails = $this->dbLink->getMovieDetails($id_film);
        $director = $this->dbLink->getDirectorDetails($id_film);
        $directors = $this->dbLink->getAllOtherDirectors($id_film);

        $genre = $this->dbLink->getGenre($id_film);
        $genres = $this->dbLink->getAllOtherGenres($id_film);

        $pageTwig = 'Movies/test.update.movie.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["movieDetails" => $movieDetails, 'director' => $director, 'directors' => $directors, 'genre' => $genre, 'genres' => $genres]);
    }

    /**
     * @deprecated Only for test envs, done in prod via admin pages
     */
    public function insertNewMovie()
    {
        $titre = $_POST['titre'];
        $annee_sortie = $_POST['annee_sortie'];
        $affiche = $_FILES['affiche']['name'];
        $affiche_temp = $_FILES['affiche']['tmp_name'];
        $synopsis = $_POST['synopsis'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];

        move_uploaded_file($affiche_temp, "../Uploads/posters/$affiche");

        $this->dbLink->insertMovie($titre, $annee_sortie, $affiche, $synopsis, $genre, $director);

        header("Location: http://localhost/ACS-MovieRating/movies");
    }

    /**
     * @deprecated Only for test envs, done in prod via admin pages
     */
    public function updateMovie($id_film)
    {
        $titre = $_POST['titre'];
        $annee_sortie = $_POST['annee_sortie'];
        $affiche = $_FILES['affiche']['name'];
        $affiche_temp = $_FILES['affiche']['tmp_name'];
        $synopsis = $_POST['synopsis'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];

        move_uploaded_file($affiche_temp, "../Uploads/posters/$affiche");

        if ($this->dbLink->updateMovie($id_film, $titre, $annee_sortie, $affiche, $synopsis, $genre, $director)) {
            echo "ok";
        } else {
            echo "not ok";
        }
    }
}