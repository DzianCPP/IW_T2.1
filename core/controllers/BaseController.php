<?php

namespace core\controllers;

class BaseController
{
    protected function render(string $templateName, $dataToRender = null): void
    {
        include VIEW_PATH . $templateName . ".html";
    }
}