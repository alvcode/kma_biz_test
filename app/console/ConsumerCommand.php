<?php

namespace app\console;

use app\actions\console\ConsumerAction;

class ConsumerCommand 
{
    public function __invoke()
    {
        $consume = new ConsumerAction();
        $consume();
    }
}