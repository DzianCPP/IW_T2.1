<?php

require_once __DIR__ . '/../bootstrap/base-paths.php';
require_once BASE_PATH . 'vendor/autoload.php';

use system\Migrations;

$dbVersion = getopt("v:");

$migrations = new Migrations();
$migrations->run($dbVersion["v"]);