<?php

use src\controllers\Home;
use src\controllers\About;
use src\controllers\Login;
use Slim\Factory\AppFactory;
use src\controllers\NotFound;
use src\middlewares\RedirectIfLogged;

$app = AppFactory::create();

$app->get('/', Home::class . ':index');
$app->get('/about', About::class . ':index');
$app->get('/login', Login::class . ':index')->add(new RedirectIfLogged);
$app->post('/login', Login::class . ':store');
$app->get('/logout', Login::class . ':destroy');
$app->get('/404', NotFound::class . ':index');

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    return $response->withStatus(404)->withHeader('Location', '/404');
});

$app->run();