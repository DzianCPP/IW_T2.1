<?php

require_once "UserController.php";

use core\controllers\UserController;

$appController = new UserController();
$appController->create();
