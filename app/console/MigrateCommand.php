<?php

namespace app\console;

use core\MysqlDatabase;

class MigrateCommand 
{
    public function __invoke()
    {
        $db = new MysqlDatabase();

        $query = "
        CREATE TABLE `main`.`content` (
            `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `content_length` bigint NOT NULL,
            `request_dt` datetime NOT NULL
        )";
        $statement = $db->prepare($query);
        $db->execute($statement, []);
        var_dump('ok'); 
        exit();
    }
}