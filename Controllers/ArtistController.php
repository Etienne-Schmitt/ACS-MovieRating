<?php
class ArtistController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->Artist = new Artist();
    }

    public function showAllArtists() {
        $result = $this->Artist->getAllArtists();
      
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
        $this->Artist ->insertArtist($lastname_artist, $firstname_artist, $birth_date);
        header('Location: http://localhost/MovieFilm/artist/add');
        exit;

    }
    public function getArtistById($id)
    {
        $result = $this->Artist->getAllArtists($id);
        $pageTwig = 'genre/updateArtist.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }

    public function updateArtistById($id_artist)
    {
        $lastname_artist = $_POST['lastname_artist'];
        $firstname_artist = $_POST['firstname_artist'];
        $birth_date = $_POST['birth_date'];
        $this->Artist->updateArtist($lastname_artist, $firstname_artist, $birth_date);
        $uri= self::$_baseUrl;
        header("Location:$uri/artist");

    }

    public function deleteArtistById($id)
    {
        $this->movieGenre->deleteArtist($id);
        $uri = self::$_baseUrl;
        header("Location: $uri/artist");
        exit ;
    }
}