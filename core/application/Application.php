<?php

namespace core\application;
//use core\controllers\AppController;
//use core\controllers\UserController;
//use core\application\Router;

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