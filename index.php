<?php
require_once 'vendor/autoload.php';

$mainRouter = new Router($_GET['uri']);

$mainRouter->addRouteGET('/', 'Home.index');


try {
    $mainRouter->startRouter();
} catch (RouterException $e) {
}