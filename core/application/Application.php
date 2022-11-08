<?php

namespace core\application;
use core\controllers\AppController;
use core\controllers\UserController;
use core\application\Router;

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