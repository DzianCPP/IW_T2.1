<?php

require_once __DIR__ . '/../bootstrap/base-paths.php';
require_once BASE_PATH . 'vendor/autoload.php';

use core\application\UsersSeeder;

$usersSeeder = new UsersSeeder();

$usersSeeder->run(3);
