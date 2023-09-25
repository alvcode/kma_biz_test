<?php 

namespace core;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMqConnection 
{
    private static $connection;

    public static function getInstance(): AMQPStreamConnection
    {
        if(!self::$connection){
            self::$connection = new AMQPStreamConnection(
                $_ENV['RABBIT_HOST'], 
                $_ENV['RABBIT_PORT'], 
                $_ENV['RABBIT_USER'], 
                $_ENV['RABBIT_PASSWORD']
            );
        }
        return self::$connection;
    }
}