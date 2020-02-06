<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/actor', 'Home.showActor');
$mainRouter->addRouteGET('/genre', 'Home.showGenre');
$mainRouter->addRouteGET('/director', 'Home.showDirector');
$mainRouter->addRouteGET('/', 'Home.showHome');


try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}


