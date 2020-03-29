<?php

namespace src\helpers;

class Flash
{

    public static function setError($key, $value)
    {
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = $value;
        }
    }

    public static function getError($key)
    {
        if (isset($_SESSION[$key])) {
            $error = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $error;
        }
    }
}