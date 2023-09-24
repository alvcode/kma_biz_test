<?php 

namespace core;

use PDO;
use PDOException;

class MysqlDatabaseConfig {
    private string $host;
    private string $username;
    private string $password;
    private string $dbname;

    public function getConnection(): PDO {
        $this->host = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];

        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            $pdo = new PDO($dsn, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }
}