<?php

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use App\Entity\Genre;


/**
 * Class HomeController
 * @mixin
 */
   
class HomeController extends Controller
{
    /**
     * HomeController constructor.
     * 
     */
    
    public function __construct()
    {
        parent::__construct();
        self::$_twig = parent::getTwig();
        
    }

    public function showHome()
    {
        echo $this->showPage('home');
    }

    public function showGenre()
    {
        echo $this->showPage('genre');
    }

    public function showActor()
    {
        echo $this->showPage('actor');
    }

    public function showDirector()
    {
        echo $this->showPage('director');
    }

    private function showPage($page)
    {
        $template = self::$_twig->load($page . ".html.twig" );
        return $template->render();
    }



}
