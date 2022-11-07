<?php

namespace core\controllers;

class AppController
{
    public function index(): void
    {
        $file = fopen(NEW_USER_HTML_PATH, "r");
        echo fread($file, filesize(NEW_USER_HTML_PATH));
    }
}
