<?php

namespace core\application;
use core\controllers\AppController;
use core\controllers\UserController;

class Application
{

    public function run($controller, $action, $params = ''): void
    {
        if ($controller === "main" && $action === "index") {
            $appController = new AppController();
            $appController->index();
        }

        if ($controller === "user" && $action === "new") {
            $userController = new UserController();
            $userController->new();
        }
    }
}