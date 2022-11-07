<?php
require_once "../system/base-paths.php";
include AUTOLOAD_PATH;

class UserController
{
    public function create()
    {
        $this->new();
    }

    public function new()
    {
<<<<<<< HEAD
        $newUser = array(
            $_REQUEST['email'],
            $_REQUEST['name'],
            $_REQUEST['gender'],
            $_REQUEST['status']
        );
        return $newUser;
=======
        require_once APP_PATH;
>>>>>>> 5d94b6a1ce0fa13b20eb964e6d661a1a58a82507
    }
}

$userController = new UserController();
$userController->create();
