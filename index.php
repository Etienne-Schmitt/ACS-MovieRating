<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/', 'Home.index');
$mainRouter->addRouteGET('/movies/show/:id', "Movies.showMovie");

$mainRouter->addRouteGET('/movies/add', "Movies.addMovie");
$mainRouter->addRoutePOST('/movies/add', "Movies.insertNewMovie");

// A list of all the movies with the update option
$mainRouter->addRouteGET('/movies/updatemovies', "Movies.getAllMovies");

// Updating each movie separately
$mainRouter->addRouteGET('/movies/updatemovies/:id', "Movies.getMovie");
$mainRouter->addRoutePOST('/movies/updatemovies/:id', "Movies.updateMovie");

$mainRouter->addRouteGET('/movies', 'Movies.index');
$mainRouter->addRouteGET('/artists', 'Artists.index');

try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}