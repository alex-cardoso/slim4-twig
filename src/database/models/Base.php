<?php

namespace src\database\models;

use PDOException;
use src\database\Connection;

abstract class Base
{
    protected $pdoInstance;

    public function __construct()
    {
        $this->pdoInstance = Connection::connectPDO();
    }

    public function findUserBy($field, $value)
    {
        try {
            $preparedSql = $this->pdoInstance->prepare("select * from {$this->table} where {$field} = :{$field}");
            $preparedSql->bindValue(":{$field}", $value);
            $preparedSql->execute();
            return $preparedSql->fetch();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}