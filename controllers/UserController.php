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
            $_REQUEST['email'],
            $_REQUEST['name'],
            $_REQUEST['gender'],
            $_REQUEST['status']
        );
        return $newUser;
    }
}

$userController = new UserController();