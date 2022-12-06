<?php

namespace core\controllers;

abstract class GorestApiController
{
    private const API_BASE_URI = "https://gorest.co.in";
    private static $curlHandler;

    public static function getRecords(string $request_uri): array
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec(self::$curlHandler);
        $result = str_replace("id", "userID", $result);
        return json_decode($result);
    }

    private static function setCurlResource(): void
    {
        self::$curlHandler = curl_init();
    }
}