<?php

require "../vendor/autoload.php";

use src\controllers\Home;
use src\controllers\About;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', Home::class . ':index');
$app->get('/about', About::class . ':index');

$app->run();