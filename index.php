<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/', 'Home.index');
$mainRouter->addRouteGET('/movies/show/:id', "Movies.show");
$mainRouter->addRouteGET('/movies/add', "Movies.add");
$mainRouter->addRouteGET('/movies', 'Movies.index');

try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}