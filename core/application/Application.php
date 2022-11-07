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

        $controller = $track->getController();
        $action = $track->getAction();
        $method = $stack->getMethod();
    }
}