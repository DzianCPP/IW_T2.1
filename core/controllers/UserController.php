<?php

namespace core\controllers;
require_once "../../system/base-paths.php";
include AUTOLOAD_PATH;

class UserController
{
    public function create(): void
    {
        $this->new();
    }

    public function new(): void
    {
        echo var_dump(array(
            $_REQUEST['email'],
            $_REQUEST['name'],
            $_REQUEST['gender'],
            $_REQUEST['status']
        ));

        return;
    }
}