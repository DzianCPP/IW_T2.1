<?php

namespace core\application;

class Router
{
    private Track $track;

    public function __construct()
    {
        $routes = require_once "../bootstrap/routes.php";
        $route = $this->setRoute($routes);
        $this->setTrack($routes, $route);
    }

    private function setRoute(array $routes): string
    {
        if (!array_key_exists("REQUEST_URI", $_SERVER) || $_SERVER['REQUEST_URI'] === '' || $_SERVER['REQUEST_URI'] === '/') {
            return '';
        }

        $route = $this->getRouteFromRequestRoute($_SERVER['REQUEST_URI']);

        if (!$this->isRouteValid($route, $routes)) {
            return 'notfound';
        }

        return $route;
    }

    private function setTrack(array $routes, string $route): void
    {
        if ($this->methodValid($routes[$route])) {
            $this->track = new Track($routes[$route]);
        } else {
            echo "405 Method Not Allowed";
            http_response_code(405);
            exit;
        }
    }

    private function methodValid(array $route): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === strtoupper($route['method'])) {
            return true;
        }

        return false;
    }

    private function isRouteValid($route, $routes): bool
    {
        if (preg_match("/^\/[0-9]+/", $_SERVER['REQUEST_URI']) === 1) {
            return false;
        }

        if (array_key_exists($route, $routes)) {
            return true;
        }

        return false;
    }

    public function getTrack(): Track
    {
        return $this->track;
    }

    private function getRouteFromRequestRoute(string $request_route): string
    {
        $num = (int) filter_var($request_route, FILTER_SANITIZE_NUMBER_INT);
        if ($num) {
            $numPos = strpos($request_route, $num, 0);
        } else {
            $numPos = strlen($request_route);
        }

        return ltrim(rtrim(substr($request_route, 0, $numPos), "/"), "/");
    }
}