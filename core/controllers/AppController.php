<?php

namespace core\controllers;

use Couchbase\View;

class AppController
{
    public function index(): void
    {
        $mainPageHtml = VIEW_PATH . "mainPage.html";
        $file = fopen($mainPageHtml, "r");
        echo fread($file, filesize($mainPageHtml));
    }

    public function notFound(): void
    {
        $pageNotFoundHtml = VIEW_PATH . "notFoundPage.html";
        $file = fopen($pageNotFoundHtml, "r");
        echo fread($file, filesize($pageNotFoundHtml));
    }
}
