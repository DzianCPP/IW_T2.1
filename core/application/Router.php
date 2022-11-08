<?php

namespace core\application;

use \core\application\Track;

class Router
{
    private Track $track;

    public function __construct()
    {
        $routes = require_once "../bootstrap/routes.php";
        $route = '';

        if (array_key_exists("REQUEST_URI", $_SERVER) || $_SERVER['REQUEST_URI'] !== '' && $_SERVER['REQUEST_URI'] !== '/') {
            $query_string = $_SERVER['QUERY_STRING'];
            $request_route = ltrim($_SERVER['REQUEST_URI'], '/');
            $questionMarkPosition = strpos($request_route, '?');
            if ($questionMarkPosition > 0) {
                $request_route = substr($request_route, 0, $questionMarkPosition);
            }
            $route = rtrim($request_route, '/');
        }

        $this->setTrack($routes, $route);
    }

    private function setTrack(array $routes, string $route): void
    {
        if ($this->methodValid($routes[$route])) {
            $this->track = new Track($routes[$route]);
        } else {
            echo "405 Method Not Allowed";
            header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
            exit;
        }
    }

    public function getTrack(): Track
    {
        return $this->track;
    }

    private function methodValid(array $route): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === strtoupper($route['method'])) {
            return true;
        }
        return false;
    }
}