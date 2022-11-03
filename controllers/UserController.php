<?php

include "../system/autoload.php";

class UserController
{
    public function __construct()
    {
        $this->createUser();
        $appConroller = new AppController();
        $appConroller->index();
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

$userController = new UserController();