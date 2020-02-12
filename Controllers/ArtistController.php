<?php
class ArtistController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->movieArtist = new Artist();
    }

    public function showArtist() {
        $result = $this->movieArtist->getAllArtists();
        //var_dump($result);
        $pageTwig = 'artist/artist.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
    public function AddArtist() {
        $pageTwig = 'artist/addArtist.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render();
    }
    public function insertNewArtist() {
        $lastname_artist = $_POST['lastname_artist'];
        $firstname_artist = $_POST['firstname_artist'];
        $birth_date = $_POST['birth_date'];
        $this->movieArtist ->insertArtist($lastname_artist, $firstname_artist, $birth_date);
        header('Location: http://localhost/MovieFilm/artist/add');
        exit;

    }
}