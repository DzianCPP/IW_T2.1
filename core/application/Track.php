<?php

namespace core\application;

class Track
{
    private string $controller = "";
    private string $action = "";
    private $method = '';
    private string $controllerActionPath;

    public function __construct(array $route)
    {
        $this->controller = $route['controller'];
        $this->action = $route['action'];
        $this->method = $route['method'];

        $this->setControllerActionPath();
    }

    private function setControllerActionPath(): void
    {
        $this->controllerActionPath = CONTROLLERS_PATH . $this->controller;
        $this->controllerActionPath .= ucfirst($this->action);
        $this->controllerActionPath .= ".php";
    }

    public function getControllerActionPath(): string
    {
        return $this->controllerActionPath;
    }
}