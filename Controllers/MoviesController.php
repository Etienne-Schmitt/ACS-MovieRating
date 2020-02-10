<?php

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
      $pageTwig = 'allMovies.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result]);
    }

    public function show(int $id) {
      $result = $this->model->getActors($id);
      $movieDetails = $this->model->getMovieDetails($id);
      $pageTwig = 'showMovie.html.twig';
      self::$_twig->addGlobal('actor', $result);
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result, "movieDetails" => $movieDetails]);
    }

    public function add() {
      if(isset($_POST['test'])) {
          $test = $_POST['test'];
          header('Location: ');
      } else {
          $test = null;
      }
      $pageTwig = 'test.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(['test' => $test]);
  }
}