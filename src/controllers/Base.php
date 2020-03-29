<?php

namespace src\controllers;

use Exception;
use Slim\Views\Twig;

class Base
{
    public function getTwig()
    {
        try {
            return Twig::create('../src/views/');
        } catch (Exception $error) {
            var_dump($error->getMessage());
        }
    }
}