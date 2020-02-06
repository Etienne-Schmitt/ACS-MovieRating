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
        self::$_twig = parent::getTwig();
    }

    public function showHome()
    {
        $pageTwig = 'home.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render();
    }
}