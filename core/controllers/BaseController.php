<?php

namespace core\controllers;
use core\view\View;
use core\models\Model;
use core\models\Users;

class BaseController
{
    protected Users $users;
    protected View $view;

    protected function setView(string $templatePath): void
    {
        $this->view = new View($templatePath);
    }

    protected function setModel(): void
    {
        $this->users = new Users();
    }
}