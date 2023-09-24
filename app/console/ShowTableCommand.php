<?php

namespace app\console;

use core\MysqlDatabase;

class ShowTableCommand 
{
    public function __invoke()
    {
        $db = new MysqlDatabase();

        $query = "SELECT * FROM `main`.`content`";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $db->fetchAll($statement);
        var_dump($result);
        exit();
    }
}