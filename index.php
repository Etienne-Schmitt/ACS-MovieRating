<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/admin/artist/get/:id', 'Admin.getArtistData');

$mainRouter->addRouteGET('/admin/genre/add', 'Admin.showAddGenre');
$mainRouter->addRouteGET('/admin/genre/edit', 'Admin.showEditGenre');
$mainRouter->addRouteGET('/admin/genre/delete', 'Admin.showDelGenre');

$mainRouter->addRouteGET('/admin/artist/add', 'Admin.showAddArtist');
$mainRouter->addRouteGET('/admin/artist/edit', 'Admin.showEditArtist');
$mainRouter->addRouteGET('/admin/artist/delete', 'Admin.showDelArtist');

$mainRouter->addRouteGET('/admin/movie/add', 'Admin.showAddMovie');
$mainRouter->addRouteGET('/admin/movie/edit', 'Admin.showEditMovie');
$mainRouter->addRouteGET('/admin/movie/delete', 'Admin.showDelMovie');

$mainRouter->addRouteGET('/login', 'Admin.showLogin');
$mainRouter->addRouteGET('/admin', 'Admin.showAdmin');
$mainRouter->addRouteGET('/', 'Home.showHome');


try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}