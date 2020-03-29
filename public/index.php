<?php
session_start();

require "../vendor/autoload.php";

use src\controllers\Home;
use src\controllers\About;
use Slim\Factory\AppFactory;
use src\middlewares\Logged;

$app = AppFactory::create();

$app->get('/', Home::class . ':index');
$app->get('/about', About::class . ':index')->add(new Logged());

$app->run();