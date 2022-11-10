<?php

namespace core\application;

class Application
{
    private Router $router;
    private Database $database;

    public function run(): void
    {
        $this->router = new Router();
        $track = $this->router->getTrack();
        $controllerName = $track->getControllerName();
        $controllerObject = new $controllerName;
        $actionName = $track->getActionName();

        $controllerObject->$actionName();
    }
}