<?php

namespace app\console;

use app\actions\console\PublisherAction;

class PublisherCommand 
{
    public function __invoke()
    {
        $publishAction = new PublisherAction();
        $publishAction();
    }
}