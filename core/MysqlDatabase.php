<?php

namespace core;

use PDO;

class MysqlDatabase extends Database{

    public function __construct() {
        parent::__construct();
    }

    protected function getConnection(): PDO
    {
        return MysqlDatabaseConfig::getConnection();
    }
}