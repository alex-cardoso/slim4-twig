<?php

namespace src\controllers;

use Exception;
use Slim\Views\Twig;
use src\helpers\TwigGlobalVariables;

abstract class Base
{
    public function getTwig()
    {
        try {
            $twig = Twig::create('../src/views/');
            TwigGlobalVariables::loadVariables($twig);
            return $twig;
        } catch (Exception $error) {
            var_dump($error->getMessage());
        }
    }
}