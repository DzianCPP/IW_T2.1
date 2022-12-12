<?php

namespace core\controllers;

use core\view\UsersView;
use core\models\Users;

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
        if (!isset($this->users)) {
            $this->model = new $modelName();
        }
    }
}
