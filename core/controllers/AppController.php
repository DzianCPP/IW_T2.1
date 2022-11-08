<?php

namespace core\controllers;

class AppController
{
    public function index(): void
    {
        $file = fopen(VIEW_PATH . "mainPage.html", "r");
        echo fread($file, filesize(VIEW_PATH . "mainPage.html"));
    }
}
