<?php

namespace core\controllers;

class AppController
{
    public function index(): void
    {
        $file = fopen(MAIN_PAGE, "r");
        echo fread($file, filesize(MAIN_PAGE));
    }
}
