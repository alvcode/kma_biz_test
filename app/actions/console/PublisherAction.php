<?php

namespace app\actions\console;

use core\RabbitMqConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

class PublisherAction 
{
    public function __invoke()
    {
        $connection = RabbitMqConnection::getInstance();
        $channel = $connection->channel();

        $channel->exchange_declare(
            'my_delayed', 
            'x-delayed-message',
            false, 
            true, 
            false,
            false,
            false,
            ['x-delayed-type' => ['S', 'direct']]
        );

        $file = fopen(__DIR__ . '/../../../storage/links.txt', 'r');
        
        while (!feof($file)) {
            $line = fgets($file);
            $delay = rand(10, 100);
            $channel->queue_declare('my_delayed', false, true, false, false, false);

            $channel->queue_bind('my_delayed', 'my_delayed');

            $msg = new AMQPMessage(
                $line,
                [
                    'content_type' => 'text/plain',
                    'application_headers' => new AMQPTable([
                        'x-delay' => $delay *1000
                    ]),
                    'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
                ]
            );
            $channel->basic_publish($msg, 'my_delayed');

            echo " [x] Sent {$line}\n";
        }
        $channel->close();
        $connection->close();
        fclose($file);
        exit();
    }
}