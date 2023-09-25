<?php

namespace core;

use PDO;

interface DatabaseConfigInterface
{
    public static function getConnection(): PDO;
}