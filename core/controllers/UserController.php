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
            $_POST['email'],
            $_POST['name'],
            $_POST['gender'],
            $_POST['status']
        ));
    }
}