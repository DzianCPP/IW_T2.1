<?php

namespace Controller;

include_once "UserController.php";
include_once "UserAdder.php";

use UserController\UserController as UC;

class AppController {
    public static function index()
    {
        $uc = new UC();
        $uc->newUser(); 
    }
}