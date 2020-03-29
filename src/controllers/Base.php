<?php

namespace src\controllers;

use Exception;
use Slim\Views\Twig;
use src\helpers\VariablesToTemplate;

class Base
{
    public function getTwig()
    {
        try {
            $twig = Twig::create('../src/views/');
            VariablesToTemplate::loadVariables($twig);
            return $twig;
        } catch (Exception $error) {
            var_dump($error->getMessage());
        }
    }
}