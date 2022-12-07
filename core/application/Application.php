<?php

namespace core\application;

use core\application\DotEnver;

class Application
{
    private Router $router;

    public function run(): void
    {
        DotEnver::getDotEnv();
        $this->router = new Router();
        $track = $this->router->getTrack();

        $controllerName = $track->getControllerName();
        $controllerObject = new $controllerName;
        $actionName = $track->getActionName();

        $controllerObject->$actionName();
    }
}
