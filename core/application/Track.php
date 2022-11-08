<?php

namespace core\application;

class Track
{
    private string $controller = '';
    private string $action = '';
    private string $method = '';

    public function __construct(array $route)
    {
        $this->controller = $route['controller'];
        $this->action = $route['action'];
        $this->method = $route['method'];
    }

    public function getActionName(): string
    {
        return lcfirst($this->action);
    }

    public function getControllerName(): string
    {
        return "core\controllers\\" . $this->controller;
    }
}