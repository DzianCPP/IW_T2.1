<?php

require_once __DIR__ . '/../bootstrap/base-paths.php';
require_once BASE_PATH . 'vendor/autoload.php';

use system\Migrations;

$migrations = new Migrations();
$migrations->run(2);