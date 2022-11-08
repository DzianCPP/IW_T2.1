<?php

namespace core\application;

class Application
{
    public function run(): void
    {
        $router = new Router();
        $track = $router->getTrack();
        $controllerName = $track->getControllerName();
        $controllerObject = new $controllerName;
        $actionName = $track->getActionName();

        $controllerObject->$actionName();
    }
}