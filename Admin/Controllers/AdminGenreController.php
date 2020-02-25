<?php


/**
 * Class AdminGenreController
 */
class AdminGenreController extends AdminController
{
    /** @var $adminGenre AdminGenre */
    private $adminGenre;
    /** @var $arrayGenres array */
    private $arrayGenres;

    public function __construct()
    {
        parent::__construct();
        $this->adminGenre = new AdminGenre();
        $this->arrayGenres = Genre::convertGenreArrayForTwig($this->adminGenre->getAllGenres());
    }

    public function showAddGenre()
    {
        $pageTwig = 'admin/genre/genre.add.admin.html.twig';
        echo $this->showPage($pageTwig);
    }

    public function showEditGenre()
    {
        $pageTwig = 'admin/genre/genre.edit.admin.html.twig';
        self::$_twig->addGlobal('arrayGenres', $this->arrayGenres);
        echo $this->showPage($pageTwig);
    }

    public function showDelGenre()
    {
        $pageTwig = 'admin/genre/genre.delete.admin.html.twig';
        self::$_twig->addGlobal('arrayGenres', $this->arrayGenres);
        echo $this->showPage($pageTwig);
    }
}