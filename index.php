<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/', 'Home.index');
$mainRouter->addRouteGET('/show/:id', "Home.show");


try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}