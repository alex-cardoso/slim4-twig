<?php

namespace src\controllers;

use Exception;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use src\classes\Container;

class Base
{
    protected $twig;

    public function __construct()
    {
        // Para usar com cache
        // $this->twig = Twig::create('../views/', ['cache' => '../views/cache/']);
        try {
            $this->twig = Twig::create('../src/views/');
            $app = Container::get_instance('app');
            $app->add(TwigMiddleware::create($app, $this->twig));
        } catch (Exception $error) {
            var_dump($error->getMessage());
        }
    }
}