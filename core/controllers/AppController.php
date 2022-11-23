<?php

namespace core\controllers;

class AppController extends BaseController
{
    public function index(): void
    {
        $this->render("main", "main");
    }

    public function notFound(): void
    {
        http_response_code(404);
        $this->render("main", "404");
    }
}
