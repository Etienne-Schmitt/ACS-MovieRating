<?php
class ArtistController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->model = new Artist();
    }

    public function showArtist() {
        $result = $this->model->getAllArtists();
        //var_dump($result);
        $pageTwig = 'artist/artist.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
}