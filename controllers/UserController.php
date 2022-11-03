<?php

class UserController
{
    public function __construct()
    {
        $this->createUser();
    }
    
    public static function newUser()
    {
        header("Location: index.php");
        die();
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