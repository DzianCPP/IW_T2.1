<?php

namespace core\controllers;

use core\view\AppView;

class AppController extends BaseController
{
    public function __construct()
    {
        $this->setView(AppView::class);
    }
    
    public function index(): void
    {
        $data = [
            'title' => 'Main Page',
        ];

        $this->view->render("main.html.twig", $data);
    }

    public function notFound(): void
    {
        $data = [
            'title' => 'Not found',
            'message' => '404: page not found'
        ];
        http_response_code(404);
        $this->view->render("404.html.twig", $data);
    }
}
