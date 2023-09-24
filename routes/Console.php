<?php

namespace routes;

use app\console\ConsumerCommand;
use app\console\MigrateCommand;
use app\console\PublisherCommand;
use app\console\ShowTableCommand;
use core\ApplicationConsole;

class Console 
{
    private ApplicationConsole $app;

    public function __construct(ApplicationConsole $app)
    {
        $this->app = $app;
    }

    public function __invoke()
    {
        $this->app->router->set('publish', function () {
            $controller = new PublisherCommand();
            $controller();
        });

        $this->app->router->set('consume', function () {
            $controller = new ConsumerCommand();
            $controller();
        });

        $this->app->router->set('migrate', function () {
            $controller = new MigrateCommand();
            $controller();
        });

        $this->app->router->set('show-table', function () {
            $controller = new ShowTableCommand();
            $controller();
        });
    }
}