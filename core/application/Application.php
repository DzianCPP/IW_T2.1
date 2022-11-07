<?php

namespace core\application;
use core\controllers\AppController;

class Application
{

    public function run(): void
    {
        $appController = new AppController();
        $appController->index();
    }
}