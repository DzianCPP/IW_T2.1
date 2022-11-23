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
        http_response_code(404);
        include VIEW_PATH . "404.html";
    }
}
