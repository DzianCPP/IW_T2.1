<?php

namespace core\controllers;

class AppController
{
    public function index(): void
    {
        require VIEW_PATH . "main.html";
    }

    public function notFound(): void
    {
        $pageNotFoundHtml = VIEW_PATH . "404.html";
        http_response_code(404);
        $file = fopen($pageNotFoundHtml, "r");
        echo fread($file, filesize($pageNotFoundHtml));
    }
}
