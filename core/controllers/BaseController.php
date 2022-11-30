<?php

namespace core\controllers;
use core\view\UsersView;
use core\models\Model;
use core\models\Users;

class BaseController
{
    protected Users $users;
    protected UsersView $view;

    protected function setView(): void
    {
        $this->view = new UsersView();
    }

    protected function setModel(): void
    {
        $this->users = new Users();
    }
}