<?php

require_once __DIR__ . '/../bootstrap/base-paths.php';
require_once BASE_PATH . 'vendor/autoload.php';

use core\application\UsersSeeder;

$count = getopt("c:");

$usersSeeder = new UsersSeeder();
$usersSeeder->run($count["c"]);
