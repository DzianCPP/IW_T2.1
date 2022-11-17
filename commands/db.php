<?php

require "../system/Migrations.php";
require_once '../bootstrap/base-paths.php';

use system\Migrations;

$migrations = new Migrations();
$migrations->run();