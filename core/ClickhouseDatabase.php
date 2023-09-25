<?php

namespace core;

use PDO;

class ClickhouseDatabase extends Database{

    public function __construct() {
        parent::__construct();
    }

    protected function getConnection(): PDO
    {
        return ClickhouseDatabaseConfig::getConnection();
    }
}