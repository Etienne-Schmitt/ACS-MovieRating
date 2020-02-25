<?php

/**
 * Class AdminHomeController
 */
class AdminHomeController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function postLogIn()
    {
        $correctUser = "admin@admin";
        $correctPassword = "password";

        if (isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
            $inputUser = $_POST['inputEmail'];
            $inputPass = $_POST['inputPassword'];
            if ($inputUser === $correctUser && $inputPass === $correctPassword) {
                $this->loginState = true;
            } else {
                header("Location: http://awco-soft.fr/");
                exit;
            }
        }
        //TODO delete
        var_dump($this);
    }

    public function showAdmin()
    {
        header("Controller Header");
        if ($this->loginState) {
            $pageTwig = 'admin/home.admin.html.twig';
            echo $this->showPage($pageTwig);
        } else {
            echo $this->showLoginPage();
        }
    }

    public function showLoginPage()
    {
        $pageTwig = 'admin/login.admin.html.twig';
        echo $this->showPage($pageTwig);
    }


//    public function insertNewGenre()
//    {
//        $genre = $_POST['genre-add-new'];
//        $this
//            ->admin
//            ->insertGenre($genre);
//        header('Location: http://localhost/MovieFilm/admin/genre/add');
//        exit;
//    }
//
//    public function showAllGenres($id)
//    {
//
//        $result = $this
//            ->admin
//            ->getAllGenres();
//        $pageTwig = 'admin/genre/genre.edit.admin.html.twig';
//        $template = self::$_twig->load($pageTwig);
//        echo $template->render(["result" => $result]);
//    }
//
//    public function getAllGenres()
//    {
//        $nbrGenreInDB = getNbrGenreInDB();
//        $arrayAllGenres = [];
//
//        for ($id = 1; $id > $nbrGenreInDB; $id++) {
//            array_push($arrayAllGenres, ["test"]);
//        }
//        return $arrayAllGenre;
//    }
//
//
//    public function getArtistData($id)
//    {
//        header("Content-Type: application/json");
//        echo json_encode(getDBDataArtist($id));
//        echo json_encode(["firstname" => 'Etienne', "lastname" => 'Schmitt', "birthdate" => 1997]);
//    }
//
//    public function getMovieData($id)
//    {
//        header("Content-Type: application/json");
//        echo json_encode(["title" => 'The Wind Rises', "genre" => 6, "director" => 2, "year" => 2013, "poster" => 'le_vent_se_leve.jpg', "synopsis" => 'A lifelong love of flight inspires Japanese aviation engineer Jiro Horikoshi' . '(Hideaki Anno), whose storied career includes the creation of the A6M World War II fighter plane.']);
//    }
}

