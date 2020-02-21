<?php
require_once 'vendor/autoload.php';

if (isset($_GET['uri']) && ($_GET['uri'] !== "")) {
    $mainRouter = new Router($_GET['uri']);
} else {
    $mainRouter = new Router("/");
}

header('Cache-Control: no-cache');


//// GET
// AdminGenre
$mainRouter->addRouteGET('/admin/genre/add', 'AdminGenre.showAddGenre');
$mainRouter->addRouteGET('/admin/genre/edit', 'AdminGenre.showEditGenre');
$mainRouter->addRouteGET('/admin/genre/delete', 'AdminGenre.showDelGenre');
// AdminArtist
$mainRouter->addRouteGET('/admin/artist/add', 'AdminArtist.showAddArtist');
$mainRouter->addRouteGET('/admin/artist/edit', 'AdminArtist.showEditArtist');
$mainRouter->addRouteGET('/admin/artist/delete', 'AdminArtist.showDelArtist');
// AdminMovie
$mainRouter->addRouteGET('/admin/movie/add', 'AdminMovie.showAddMovie');
$mainRouter->addRouteGET('/admin/movie/edit', 'AdminMovie.showEditMovie');
$mainRouter->addRouteGET('/admin/movie/delete', 'AdminMovie.showDelMovie');

// Public
$mainRouter->addRouteGET('/admin', 'AdminHome.showAdmin');
$mainRouter->addRouteGET('/genre', 'Genre.showGenre');
$mainRouter->addRouteGET('/artist', 'Artist.showArtist');
$mainRouter->addRouteGET('/director', 'Home.showDirector');
$mainRouter->addRouteGET('/movie', 'Movie.showMovie');

//// POST
$mainRouter->addRoutePOST('/admin/genre/add', 'AdminGenre.');
$mainRouter->addRoutePOST('/admin/genre/edit', 'AdminGenre.');
$mainRouter->addRoutePOST('/admin/genre/delete', 'AdminGenre.');

$mainRouter->addRoutePOST('/admin/artist/add', 'AdminArtist.');
$mainRouter->addRoutePOST('/admin/artist/edit', 'AdminArtist.');
$mainRouter->addRoutePOST('/admin/artist/delete', 'AdminArtist.');

$mainRouter->addRoutePOST('/admin/movie/add', 'AdminMovie.');
$mainRouter->addRoutePOST('/admin/movie/edit', 'AdminMovie.');
$mainRouter->addRoutePOST('/admin/movie/delete', 'AdminMovie.');


try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}


