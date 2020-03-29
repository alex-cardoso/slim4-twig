<?php
session_start();

require "../vendor/autoload.php";

use src\controllers\Home;
use src\controllers\About;
use src\controllers\Login;
use Slim\Factory\AppFactory;
use src\middlewares\RedirectIfLogged;

$app = AppFactory::create();

$app->get('/', Home::class . ':index');
$app->get('/about', About::class . ':index');
$app->get('/login', Login::class . ':index')->add(new RedirectIfLogged);
$app->post('/login', Login::class . ':store');

$app->run();