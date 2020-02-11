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
      $result = $this->model->getActors($id);
      $movieDetails = $this->model->getMovieDetails($id);
      $pageTwig = 'Movies/showMovie.html.twig';
      self::$_twig->addGlobal('actor', $result);
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result, "movieDetails" => $movieDetails]);
    }

    public function addMovie() {
      $pageTwig = 'Movies/addMovie.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render();
    }

    public function insertNewMovie() {
      $titre = $_POST['titre'];
      $annee_sortie = $_POST['annee_sortie'];
      // $affiche = $_FILES['affiche']['name'];
      // $affiche_temp = $_FILES['affiche']['tmp_name'];
      $synopsis = $_POST['synopsis'];
      $this->model->insertMovie($titre, $annee_sortie, $synopsis);
      header("Location: http://localhost/ACS-MovieRating/movies/add");
      exit;
    }
}