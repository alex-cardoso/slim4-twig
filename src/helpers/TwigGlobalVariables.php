<?php

namespace src\helpers;

class TwigGlobalVariables
{
    protected static $variables = [];

    public static function setVariable($key, $value)
    {
        if (!isset(static::$variables[$key])) {
            static::$variables[$key] = $value;
        }
    }


    public static function loadVariables($twig)
    {
        $env = $twig->getEnvironment();
        foreach (static::$variables as $key => $variable) {
            $env->addGlobal($key, $variable);
        }
    }
}