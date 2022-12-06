<?php

namespace core\controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJarInterface;

abstract class GorestApiController
{
    const API_BASE_URI = "https://gorest.co.in";
    private static $apiClient;

    public static function getRecords(string $request_uri): array
    {
        self::setClient();
        $records = self::$apiClient->request("GET", self::API_BASE_URI . $request_uri);
        $rawBody = (string)$records->getBody();
        $cookies = self::$apiClient->getConfig("cookies");
        $rawBody = str_replace("id", "userID", $rawBody);
        return json_decode($rawBody);
    }

    private static function setClient(): void
    {
        self::$apiClient = new Client();
    }
}