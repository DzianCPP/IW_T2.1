<?php

namespace Controller;
include_once "UserController.php";
use UserController\UserController as UC;

class AppController {
    public static function index()
    {
        $uc = new UC();
        $uc->newUser(); 
    }
}