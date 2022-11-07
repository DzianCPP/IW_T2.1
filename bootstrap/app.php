<?php
require_once "base-paths.php";
require_once "autoload.php";

use core\application\Application;
use core\application\Router;
use core\application\Track;

$router = new Router();
$track = $router->getTrack();
$controller = $track->getController();
$action = $track->getAction();
$params = $track->getParams();

$app = new Application();
$app->run($controller, $action, $params);