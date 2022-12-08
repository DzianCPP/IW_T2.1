<?php

namespace core\controllers;

use core\view\UsersView;
use core\models\Users;

abstract class BaseController
{
    protected static Users $users;
    protected static UsersView $view;

    protected static function setView()
    {
        if (!isset(self::$view)) {
            self::$view = new UsersView();
        }
    }

    protected static function setModel()
    {
        if (!isset(self::$users)) {
            self::$users = new Users();
        }
    }
}
