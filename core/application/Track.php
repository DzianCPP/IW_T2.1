<?php

namespace core\application;

class Track
{
    private string $controller = "";
    private string $action = "";
    private array|string $params;
    private $method;

    public function __construct($controller, $action, $params, $method)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
        $this->method =
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParams(): array|string
    {
        return $this->params;
    }

    public function getAllProperties(): array
    {
        return array(
            'controller' => $this->controller,
            'action' => $this->action,
            'params' => $this->params
        );
    }
}