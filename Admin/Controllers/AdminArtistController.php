<?php


/**
 * Class AdminArtistController
 */
class AdminArtistController extends AdminController
{
    /** @var $artist Artist */
    private $artist;
    /** @var $arrayArtists array */
    private $arrayArtists;

    public function __construct()
    {
        parent::__construct();
        $this->artist = new Artist();
        $this->arrayArtists = ArtistController::convertArtistArrayForTwig(($this->artist->getAllArtists()));
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