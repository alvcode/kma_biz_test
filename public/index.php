<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use core\Application;
use Dotenv\Dotenv;
use routes\Http;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

$app = new Application();

$httpRoutes = new Http($app);
$httpRoutes();

$app->run();