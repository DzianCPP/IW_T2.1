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
        $newUserData = array(
            $_POST['email'],
            $_POST['name'],
            $_POST['gender'],
            $_POST['status']
        );

        foreach ($newUserData as $newUserDataField) {
            echo "<script> console.log($newUserDataField); </script>";
        }

        return $newUserData;
    }
}

$userController = new UserController();
