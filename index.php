<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/', 'Home.index');
$mainRouter->addRouteGET('/movies/show/:id', "Movies.showMovie");

$mainRouter->addRouteGET('/movies/add', "Movies.addMovie");
$mainRouter->addRoutePOST('/movies/add', "Movies.insertNewMovie");

$mainRouter->addRouteGET('/movies', 'Movies.index');
$mainRouter->addRouteGET('/artists', 'Artists.index');

try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}