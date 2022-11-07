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

        elseif ($controller === "user" && $action === "create") {
            $userController = new UserController();
            $userController->create();
        } else {
            $appController = new AppController();
            $appController->index();
        }
    }
}