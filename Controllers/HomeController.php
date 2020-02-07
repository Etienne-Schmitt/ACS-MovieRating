<?php

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


/**
 * Class HomeController
 * @mixin
 */
class HomeController extends Controller
{
  /**
   * HomeController constructor
   */
  public function __construct()
  {
    parent::__construct();
    $this->model = new HomeModel();

    self::$_twig = parent::getTwig();
  }

    public function index() {
      $result = $this->model->getAllMovies();
      $pageTwig = 'home.html.twig';
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result]);
    }

    public function show(int $id) {
      $result = $this->model->getActors($id);
      $pageTwig = 'show.html.twig';
      // var_dump($result);
      self::$_twig->addGlobal('actor', $result);
      $template = self::$_twig->load($pageTwig);
      echo $template->render(["result" => $result]);
    }
}