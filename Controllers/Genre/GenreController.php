
  
<?php

class GenreController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->model = new Genre();
    }

    public function showGenre() {
        $result = $this->movieGenre->getAllGenres();
        $pageTwig = 'genre/genre.html.twig';
        //$tewigu = "test var twig";
         //self::$_twig->addGlobal('tewigu', $tewigu);
        $template = self::$_twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
    

//     public function show(int $id) {
//         $pageTwig = 'Exemple/show.html.twig';
//         $template = $this->twig->load($pageTwig);
//         $result = $this->model->getOneExemple($id);
//         echo $template->render(["result" => $result]);
//     }

//     public function test() {
//         if(isset($_POST['test'])) {
//             $test = $_POST['test'];
//             header('Location: ');
//         } else {
//             $test = null;
//         }
//         $pageTwig = 'Exemple/test.html.twig';
//         $template = $this->twig->load($pageTwig);
//         echo $template->render(['test' => $test]);
//     }
} 