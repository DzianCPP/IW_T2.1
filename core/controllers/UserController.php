<?php

namespace core\controllers;

class UserController
{
    public function create(): void
    {
        echo var_dump(array(
            $_POST['email'],
            $_POST['name'],
            $_POST['gender'],
            $_POST['status']
        ));
    }

    public function new(): void
    {

    }
}