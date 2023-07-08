<?php

namespace Engine\Core\Router;

class Router
{
    /**
     * @var array
     */
    private array $routes;
    /**
     * @var
     */
    private $dispatcher;
    /**
     * @var string
     */
    private string $host;

    /**
     * @param $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     * @return void
     */
    public function add($key, $pattern, $controller, string $method = 'GET')
    {
        $this->routes[$key] = [
            "pattern"       => $pattern,
            "controller"    => $controller,
            "method"        => $method
        ];
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute|null
     */
    public function dispatch($method, $uri): ?DispatchedRoute
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher(): UrlDispatcher
    {
        if($this->dispatcher == null)
        {
            $this->dispatcher = new UrlDispatcher();

            foreach ($this->routes as $route)
            {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}