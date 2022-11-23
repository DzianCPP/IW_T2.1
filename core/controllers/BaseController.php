<?php

namespace core\controllers;

class BaseController
{
    protected function render(string $templateName, string $view, $data = null): void
    {
        $view = VIEW_PATH . $view . ".php";
        include LAYOUTS_PATH . $templateName . ".html";
    }
}