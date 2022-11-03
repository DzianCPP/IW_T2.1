<?php

namespace UserController;

class UserController
{
    public function __construct()
    {
        $this->createUser();
    }
    
    public static function newUser()
    {
        include_once "index.php";
    }

    private function createUser()
    {
        $newUser = array(
            $_POST['email'],
            $_POST['name'],
            $_POST['gender'],
            $_POST['status']
        );

        return $newUser;
    }
}