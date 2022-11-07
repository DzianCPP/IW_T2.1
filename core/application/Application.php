<?php

namespace core\application;
use core\controllers\AppController;

class Application
{

    public function run(): void
    {
        //todo routing

        //switch newUser create UserController()
        $appController = new AppController();
        $appController->index();
    }
}