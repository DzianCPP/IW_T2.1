<?php

function getRouteFromRequestRoute(): string
{
    $route = "";
    $request_route = "user/edit";
    if (preg_match("/\d/", $request_route) !== 0) {
        $num = (int) filter_var($request_route, FILTER_SANITIZE_NUMBER_INT);
        $numPos = strpos($request_route, $num, 0);
        $route = substr($request_route, 0, $numPos);
    }

    return $route;
}

getRouteFromRequestRoute();