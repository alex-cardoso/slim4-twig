<?php

namespace src\classes;

class Container
{

    public static $instances = [];

    public static function set_instance($key, $instance)
    {
        if (!isset(static::$instances[$key])) {
            static::$instances[$key] = $instance;
        }
    }

    public static function get_instance($key)
    {
        if (isset(static::$instances[$key])) {
            return static::$instances[$key];
        }
    }
}