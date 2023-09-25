<?php

namespace core;

use PDO;
use PDOStatement;

abstract class Database 
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    public function query($query) { 
        return $this->connection->query($query);
    }

    public function prepare($query): PDOStatement {
        return $this->connection->prepare($query);
    }

    public function execute($statement, $params) {
        return $statement->execute($params);
    }

    public function fetchAll($statement) {
        return $statement->fetchAll();
    }

    abstract protected function getConnection(): PDO;
}