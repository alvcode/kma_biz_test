<?php

namespace core;

class Router
{
  protected array $routes = [];
  public Request $request;
  
  public function __construct()
  {
  	$this->request = new Request();
  }

  
  public function get($path, $callback)
  {
  	$this->routes['get'][$path] = $callback;
  }

  public function post($path, $callback)
  {
  	$this->routes['post'][$path] = $callback;
  }
  
  public function resolve()
  {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "404";
        }

       return call_user_func($callback);
  }
}