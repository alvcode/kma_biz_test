<?php

namespace app\repositories;

use core\MysqlDatabase;

class BaseRepository 
{
    protected function getMysqlDatabase(): MysqlDatabase
    {
        return new MysqlDatabase();
    }
}