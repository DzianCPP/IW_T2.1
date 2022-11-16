<?php

namespace core\application;

class Application
{
    private Router $router;
    private Seeder $seeder;

    public function run(): void
    {
        $this->seeder = new Seeder();
        $this->seeder->run();

        $this->router = new Router();
        $track = $this->router->getTrack();
        $controllerName = $track->getControllerName();
        $controllerObject = new $controllerName;
        $actionName = $track->getActionName();

        $controllerObject->$actionName();
    }
}