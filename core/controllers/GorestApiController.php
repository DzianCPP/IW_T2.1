<?php

namespace core\controllers;

abstract class GorestApiController
{
    private const API_BASE_URI = "https://gorest.co.in";
    private const API_AUTH_TOKEN = "'Authorization: Bearer ";
    private static $curlHandler;

    public static function getRecords(string $request_uri): array
    {
        self::setGetCurl($request_uri);
        $result = curl_exec(self::$curlHandler);
        $result = str_replace("id", "userID", $result);
        curl_close(self::$curlHandler);
        return json_decode($result);
    }

    public static function createRecord(string $request_uri): bool
    {
        self::setPostCurl($request_uri);
        $gorest_response = curl_exec(self::$curlHandler);
        echo $gorest_response;
        curl_close(self::$curlHandler);
        return true;
    }

    private static function setGetCurl(string $request_uri): void
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
    }

    private static function setPostCurl(string $request_uri): void
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt(self::$curlHandler, CURLOPT_HEADER, true);
        curl_setopt(self::$curlHandler, CURLOPT_POST, true);
        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN']
        ]);
        $newUserInfo = file_get_contents("php://input");
        $newUserInfo = str_replace("userID", "id", $newUserInfo);
        $newUserInfo = json_decode($newUserInfo);
        $newUserInfo = http_build_query($newUserInfo);
        curl_setopt(self::$curlHandler, CURLOPT_POSTFIELDS, $newUserInfo);
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
    }

    private static function setCurlResource(): void
    {
        self::$curlHandler = curl_init();
    }
}
