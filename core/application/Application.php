<?php

namespace core\application;

class Application
{
    public function run(): void
    {
        $router = new Router();
        $track = $router->getTrack();
        $controllerActionPath = $track->getControllerActionPath();

        require_once $controllerActionPath;
    }
}