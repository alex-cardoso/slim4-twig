<?php
session_start();

require "../vendor/autoload.php";

// Controllers
use src\controllers\Home;
use src\controllers\About;
use src\controllers\Login;
// Slim
use Slim\Factory\AppFactory;
// Helpers
use src\helpers\TwigGlobalVariables;
// middlewares
use src\middlewares\RedirectIfLogged;

$app = AppFactory::create();

// Global Variables
TwigGlobalVariables::setVariable('logged', $_SESSION['logged'] ?? null);
TwigGlobalVariables::setVariable('user', $_SESSION['user'] ?? null);

$app->get('/', Home::class . ':index');
$app->get('/about', About::class . ':index');
$app->get('/login', Login::class . ':index')->add(new RedirectIfLogged);
$app->post('/login', Login::class . ':store');
$app->get('/logout', Login::class . ':destroy');

$app->run();