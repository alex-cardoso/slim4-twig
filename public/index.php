<?php

require "../vendor/autoload.php";

use src\controllers\Home;
use Slim\Factory\AppFactory;
use src\classes\Container;

$app = AppFactory::create();

Container::set_instance('app', $app);

$app->get('/', Home::class . ':index');

$app->run();