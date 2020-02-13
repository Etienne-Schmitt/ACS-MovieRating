<?php

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


/**
 * Class MoviesController
 * @mixin
 */
class ArtistsController extends Controller
{
  /**
   * MoviesController constructor
   */
  public function __construct()
  {
    parent::__construct();
    $this->model = new ArtistsModel();

    self::$_twig = parent::getTwig();
  }

    public function index() {
      $result = $this->model->getAllArtists();
      $pageTwig = 'Artists/allArtists.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result]);
    }

  //   public function show(int $id) {
  //     $result = $this->model->getActors($id);
  //     $movieDetails = $this->model->getMovieDetails($id);
  //     $pageTwig = 'Movies/showMovie.html.twig';
  //     self::$_twig->addGlobal('actor', $result);
  //     $template = self::$_twig->load($pageTwig);
  //     echo $template->render(["result" => $result, "movieDetails" => $movieDetails]);
  //   }

}