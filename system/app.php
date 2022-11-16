<?php

require_once '../bootstrap/base-paths.php';
require_once '../vendor/autoload.php';

use core\application\Application;
use system\Migrations;

$migrations = new Migrations();
$migrations->run();

$app = new Application();
$app->run();