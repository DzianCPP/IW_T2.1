<?php

namespace core\controllers;

use Exception;

class AppController extends BaseController
{
    public function index(): void
    {
        $this->setView();
        $data = [
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        try {
        $this->view->render("main.html.twig", $data); }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function notFound(): void
    {
        $this->setView();
        $data = [
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];
        http_response_code(404);
        $this->view->render("404.html.twig", $data);
    }
}
