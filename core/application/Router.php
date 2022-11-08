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
                $this->track = new Track('AppController', 'index', '');
        } else {
            $request_uri = $_SERVER['REQUEST_URI'];
            $request_uri = trim($request_uri);
            $slashPosition = strpos($request_uri, '/', 0);
            $controller = substr($request_uri, 0, $slashPosition);
            $action = substr($request_uri, $slashPosition, strlen($request_uri));

            $this->track = new Track($controller, $action, '');
        }
    }

    public function getTrack(): Track
    {
        return $this->track;
    }
}