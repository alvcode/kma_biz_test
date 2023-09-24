<?php

namespace routes;

use core\Application;

interface RouteInterface 
{
    public function __construct(Application $app);

    public function __invoke();
}