<?php

namespace core;

class ApplicationConsole
{
    public RouterConsole $router;

    public function __construct()
    {
        $this->router = new RouterConsole();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}