<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/', 'Home.showHome');

$mainRouter->addRouteGET('/genre', 'Genre.showGenre');
 $mainRouter->addRouteGET('/artist', 'Artist.showArtist');
$mainRouter->addRouteGET('/director', 'Home.showDirector');


try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}


