<?php
require_once '../bootstrap/base-paths.php';
require_once BASE_PATH . '/bootstrap/autoload.php';

use core\application\Application;

$app = new Application();
$app->run();