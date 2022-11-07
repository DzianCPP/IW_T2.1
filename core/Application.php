<?php

namespace core\application;

class Application
{

    public function run()
    {
        $appController = new AppController();
        $appController->index();
    }
}