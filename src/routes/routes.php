<?php

use src\controllers\Home;
use src\controllers\About;
use src\controllers\Login;
use src\middlewares\Before;
use Slim\Factory\AppFactory;
use src\controllers\NotFound;

$app = AppFactory::create();

$app->get('/', Home::class . ':index')->add(new Before);
$app->get('/about', About::class . ':index');
$app->get('/login', Login::class . ':index');
$app->post('/login', Login::class . ':store');
$app->get('/logout', Login::class . ':destroy');
$app->get('/404', NotFound::class . ':index');

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    return $response->withStatus(404)->withHeader('Location', '/404');
});

$app->run();
