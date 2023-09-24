<?php 

namespace core;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMqConnection 
{
    public static function getInstance(): AMQPStreamConnection
    {
        return new AMQPStreamConnection(
            $_ENV['RABBIT_HOST'], 
            $_ENV['RABBIT_PORT'], 
            $_ENV['RABBIT_USER'], 
            $_ENV['RABBIT_PASSWORD']
        );
    }
}