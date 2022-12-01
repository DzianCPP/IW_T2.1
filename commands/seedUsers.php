<?php

require_once __DIR__ . '/../bootstrap/base-paths.php';
require_once BASE_PATH . 'vendor/autoload.php';

use core\application\UsersSeeder;

$count = getopt("c:");

$usersSeeder = new UsersSeeder();
if (array_key_exists("c", $count)) {
    $usersSeeder->run($count["c"]);
} else {
    $usersSeeder->run();
}
