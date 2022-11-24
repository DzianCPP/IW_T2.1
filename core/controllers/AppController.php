<?php

namespace core\controllers;

class AppController extends BaseController
{
    public function index(): void
    {
        $this->setView(VIEW_PATH);
        $this->view->render("main");
    }

    public function notFound(): void
    {
        $this->setView(VIEW_PATH);
        http_response_code(404);
        $this->view->render("404");
    }
}
