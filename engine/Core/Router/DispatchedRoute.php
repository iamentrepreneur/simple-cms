<?php

namespace Engine\Core\Router;

class DispatchedRoute
{
    /**
     * @var
     */
    private $controller;
    /**
     * @var array
     */
    private array $parameters;

    /**
     * @param $controller
     * @param array $parameters
     */
    public function __construct($controller, array $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

}