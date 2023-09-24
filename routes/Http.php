<?php

namespace routes;

use app\http\controllers\IndexController;
use app\repositories\ContentRepository;
use core\Application;

class Http implements RouteInterface
{
    private Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function __invoke()
    {
        $this->app->router->get('/', function () {
           $controller = new IndexController(new ContentRepository());
           $controller();
        });
    }
}