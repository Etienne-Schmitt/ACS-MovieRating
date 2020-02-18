<?php

/**
 * Class ArtistController
 */
class ArtistController extends Controller
{
    /** @var Artist Instance of Artist Class */
    private $artist;

    /**
     * ArtistController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->artist = new Artist();
    }

    public function showArtist()
    {
        $allArtists = self::convertArtistArrayForTwig($this->artist->getAllArtists());
        $pageTwig = 'artist.html.twig';
        self::$_twig->addGlobal("arrayArtists", $allArtists);
        echo $this->showPage($pageTwig);
    }

    public static function convertArtistArrayForTwig($array)
    {
        $arrayEnd = [];

        for ($i = 0; $i < count($array); $i++) {
            $arrayEnd[$array[$i]['id_artist']] = [
                'firstname' => $array[$i]['firstname_artist'],
                'lastname' => $array[$i]['lastname_artist'],
                'birthdate' => $array[$i]['birth_date']
            ];
        }

        return $arrayEnd;
    }

}