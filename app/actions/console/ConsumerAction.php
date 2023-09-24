<?php

namespace app\actions\console;

use core\MysqlDatabase;
use core\RabbitMqConnection;
use DateTime;
use DateTimeZone;

class ConsumerAction 
{
    public function __invoke()
    {
        $connection = RabbitMqConnection::getInstance();
        $channel = $connection->channel();

        echo " [*] Waiting for messages. To exit press CTRL+C\n";
        
        $callback = function ($msg) {
            $ch = curl_init($msg->body);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $contentLength = 0;
            }else{
                $contentLength = strlen($response);
            }
        
            $dateTime = new DateTime('now', new DateTimeZone('UTC'));

            $db = new MysqlDatabase();

            $query = "
                INSERT INTO `main`.`content` 
                (content_length, request_dt) 
                VALUES 
                (:content_length, :request_dt)";

            $statement = $db->prepare($query);
            $params = array(':content_length' => $contentLength, ':request_dt' => $dateTime->format('Y-m-d H:i:s'));
            $db->execute($statement, $params);
            echo ' [x] Received ', $msg->body, "\n";
            
            curl_close($ch);
        };
        
        $channel->basic_consume('my_delayed', '', false, true, false, false, $callback);
        
        while ($channel->is_open()) {
            $channel->wait();
        }   
    }
}