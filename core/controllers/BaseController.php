<?php

namespace core\controllers;

abstract class BaseController
{
    protected $view;
    protected $model;

    protected function setView(string $viewName)
    {
        if (!isset($this->view)) {
            $this->view = new $viewName();
        }
    }

    protected function setModel(string $modelName)
    {
        if (!isset($this->model)) {
            $this->model = new $modelName();
        }
    }
}
