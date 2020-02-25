<?php


/**
 * Class AdminArtistController
 */
class AdminArtistController extends AdminController
{
    /** @var $adminArtist AdminArtist */
    private $adminArtist;
    /** @var $arrayArtists array */
    private $arrayArtists;

    public function __construct()
    {
        parent::__construct();
        $this->adminArtist = new AdminArtist();
        $this->arrayArtists = AdminArtist::convertArtistArrayForTwig(($this->adminArtist->getAllArtists()));
    }

    public function showAddArtist()
    {
        $pageTwig = 'admin/artist/artist.add.admin.html.twig';
        echo $this->showPage($pageTwig);
    }

    public function showEditArtist()
    {
        $pageTwig = 'admin/artist/artist.edit.admin.html.twig';
        self::$_twig->addGlobal("arrayArtists", $this->arrayArtists);
        echo $this->showPage($pageTwig);
    }

    public function showDelArtist()
    {
        $pageTwig = 'admin/artist/artist.delete.admin.html.twig';
        self::$_twig->addGlobal("arrayArtists", $this->arrayArtists);
        echo $this->showPage($pageTwig);
    }
}