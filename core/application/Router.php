<?php

namespace core\application;

use \core\application\Track;

class Router
{
    private Track $track;

    public function __construct()
    {
        $routes = require_once "../bootstrap/routes.php";

        if (!array_key_exists("REQUEST_URI", $_SERVER) || $_SERVER['REQUEST_URI'] === '' || $_SERVER['REQUEST_URI'] === '/') {
            $route = '';
            if ($this->methodValid($route)) {
                $this->track = new Track($routes[$route]);
            }
        } else {
            $query_string = $_SERVER['QUERY_STRING'];
            $request_route = ltrim($_SERVER['REQUEST_URI'], '/');
            $questionMarkPosition = strpos($request_route, '?');
            if ($questionMarkPosition > 0) {
                $request_route = substr($request_route, 0, $questionMarkPosition);
            }
            $request_route = rtrim($request_route, '/');
            if ($this->methodValid($routes[$request_route])) {
                $this->track = new Track($routes[$request_route]);
            }
        }
    }

    public function getTrack(): Track
    {
        return $this->track;
    }

    private function methodValid($route): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === strtoupper($route['method'])) {
            return true;
        }
        return false;
    }
}