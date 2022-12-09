<?php

namespace core\controllers;

use core\view\UsersView;
use core\models\Users;

abstract class BaseController
{
    protected Users $users;
    protected UsersView $view;

    protected function setView()
    {
        if (!isset($this->view)) {
            $this->view = new UsersView();
        }
    }

    protected function setModel()
    {
        if (!isset($this->users)) {
            $this->users = new Users();
        }
    }
}
