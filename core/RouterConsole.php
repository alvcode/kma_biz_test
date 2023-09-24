<?php

namespace core;

class RouterConsole
{
  protected array $routes = [];
  public RequestConsole $request;
  
  public function __construct()
  {
  	$this->request = new RequestConsole();
  }

  
  public function set($path, $callback)
  {
  	$this->routes[$path] = $callback;
  }

  
  public function resolve()
  {
        $path = $this->request->getPath();
        $callback = $this->routes[$path] ?? false;

        if ($callback === false) {
            return "404";
        }

       return call_user_func($callback);
  }
}