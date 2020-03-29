<?php

namespace src\database\models;

use src\database\Connection;

abstract class Base
{
    protected $pdoInstance;

    public function __construct()
    {
        $this->pdoInstance = Connection::connectPDO();
    }
}