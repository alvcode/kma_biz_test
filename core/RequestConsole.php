<?php

namespace core;

class RequestConsole 
{
    public function getPath()
    {
        $path = $_SERVER['argv'][1];
        return $path;
    }
}