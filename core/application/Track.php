<?php

namespace core;

class Track
{
    private string $controller = "";
    private string $action = "";
    private array|string $params;

    public function __construct($controller, $action, $params)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
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