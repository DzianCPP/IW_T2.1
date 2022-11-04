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
        require_once APP_PATH;
    }
}

$userController = new UserController();
$userController->create();
