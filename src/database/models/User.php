<?php

namespace src\database\models;

use PDOException;

class User extends Base
{
    public function findUserBy($field, $value)
    {
        try {
            $preparedSql = $this->pdoInstance->prepare("select * from users where {$field} = :{$field}");
            $preparedSql->bindValue(":{$field}", $value);
            $preparedSql->execute();
            return $preparedSql->fetch();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}