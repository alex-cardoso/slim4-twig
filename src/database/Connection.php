<?php

namespace src\database;

use PDO;
use PDOException;

class Connection
{
    public static $pdo;

    public static function connectPDO()
    {
        if (!static::$pdo) {
            try {
                static::$pdo = new PDO('mysql:host=localhost;dbname=slim4', 'root', '', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
                return static::$pdo;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }
}