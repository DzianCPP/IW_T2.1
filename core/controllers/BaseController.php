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
        if (!isset(self::$view)) {
            $this->view = new UsersView();
        }
    }

    protected function setModel()
    {
        if (!isset(self::$users)) {
            $this->users = new Users();
        }
    }
}
