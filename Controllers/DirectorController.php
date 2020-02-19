<?php

/**
 * Class ArtistController
 */
class DirectorController extends Controller
{
    /** @var Director Instance of Director Class */
    private $director;

    public function __construct()
    {
        parent::__construct();
        $this->director = new Director();
    }

    public function showDirector()
    {
        $allDirectors = ArtistController::convertArtistArrayForTwig($this->director->getAllDirectors());
        $pageTwig = 'director.html.twig';
        self::$_twig->addGlobal("arrayDirectors", $allDirectors);
        echo $this->showPage($pageTwig);
    }
}