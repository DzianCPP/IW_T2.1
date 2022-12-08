<?php

namespace core\controllers;

class AppController extends BaseController
{
    public function index(): void
    {
        self::setView();
        $data = [
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        self::$view->render("main.html.twig", $data);
    }

    public function notFound(): void
    {
        self::setView();
        $data = [
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP',
            'message' => '404: page not found'
        ];
        http_response_code(404);
        self::$view->render("404.html.twig", $data);
    }
}
