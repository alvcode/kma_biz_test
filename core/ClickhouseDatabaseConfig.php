<?php 

namespace core;

use PDO;
use PDOException;

class ClickhouseDatabaseConfig implements DatabaseConfigInterface{

    private static $connection;

    public static function getConnection(): PDO {
        if(!self::$connection){
            $host = $_ENV['CLICKHOUSE_HOST'];
            $username = $_ENV['CLICKHOUSE_USERNAME'];
            $password = $_ENV['CLICKHOUSE_PASSWORD'];
            $dbname = $_ENV['CLICKHOUSE_NAME'];

            $dsn = "mysql:host={$host};dbname={$dbname}";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            try {
                self::$connection = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                die("Ошибка подключения к базе данных: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}