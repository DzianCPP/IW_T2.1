<?php

include AUTOLOAD_PATH;

class UserController
{
    public function create()
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

        $this->new();
    }

    public function new()
    {
    }
}
