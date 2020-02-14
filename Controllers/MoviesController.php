<?php
//include_once ob_start();

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


/**
 * Class MoviesController
 * @mixin
 */
class MoviesController extends Controller
{
  /**
   * MoviesController constructor
   */
  public function __construct()
  {
    parent::__construct();
    $this->model = new MoviesModel();

    self::$_twig = parent::getTwig();
  }

    public function index() {
      $result = $this->model->getAllMovies();
      $pageTwig = 'Movies/allMovies.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result]);
    }

    public function showMovie(int $id) {
      $actorsDetails = $this->model->getActorsDetails($id);
      $movieDetails = $this->model->getMovieDetails($id);
      $pageTwig = 'Movies/showMovie.html.twig';
      //self::$_twig->addGlobal('actor', $result);
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["actorsDetails" => $actorsDetails, "movieDetails" => $movieDetails]);
    }

    public function addMovie() {
      // Fetch all directors and genres from the database into two dropdown lists on the Add Movie page
      $directors = $this->model->getAllDirectors();
      $genres = $this->model->getAllGenres();
      // Display the input form on the Add Movie page
      $pageTwig = 'Movies/addMovie.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["directors" => $directors, "genres" => $genres]);
    }

    public function insertNewMovie() {
      $titre = $_POST['titre'];
      $annee_sortie = $_POST['annee_sortie'];
      $affiche = $_FILES['affiche']['name'];
      $affiche_temp = $_FILES['affiche']['tmp_name'];
      $synopsis = $_POST['synopsis'];
      $genre = $_POST['genre'];
      $director = $_POST['director'];

      move_uploaded_file($affiche_temp, "../Uploads/posters/$affiche");

      $this->model->insertMovie($titre, $annee_sortie, $affiche, $synopsis, $genre, $director);

      header("Location: http://localhost/ACS-MovieRating/movies");
    }

    public function getAllMovies() {
      $getAllMovies = $this->model->getAllMovies();
      $pageTwig = 'Movies/getAllMovies.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["getAllMovies" => $getAllMovies]);
    }

    // Function to fetch all the data from the DB into the Update Movie form on the Update Movie page
    public function getMovie($id_film) {
      $movieDetails = $this->model->getMovieDetails($id_film);
      $director = $this->model->getDirectorDetails($id_film);
      $directors = $this->model->getAllOtherDirectors($id_film);

      $genre = $this->model->getGenre($id_film);
      $genres = $this->model->getAllOtherGenres($id_film);

      $pageTwig = 'Movies/getMovie.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["movieDetails" => $movieDetails, 'director' => $director, 'directors' => $directors, 'genre' => $genre, 'genres' => $genres]);
    }

    public function updateMovie($id_film) {
      $titre = $_POST['titre'];
      $annee_sortie = $_POST['annee_sortie'];
      $affiche = $_FILES['affiche']['name'];
      $affiche_temp = $_FILES['affiche']['tmp_name'];
      $synopsis = $_POST['synopsis'];
      $genre = $_POST['genre'];
      $director = $_POST['director'];

      move_uploaded_file($affiche_temp, "../Uploads/posters/$affiche");

      if($this->model->updateMovie($id_film, $titre, $annee_sortie, $affiche, $synopsis, $genre, $director)) {
        echo "ok";
      } else {
        echo "not ok";
      };

      // header("Location: http://localhost/ACS-MovieRating/movies");
    }
}