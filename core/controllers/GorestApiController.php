<?php

namespace core\controllers;

abstract class GorestApiController
{
    private const API_BASE_URI = "https://gorest.co.in";
    private const API_AUTH_TOKEN = "'Authorization: Bearer " . $_ENV['API_AUTH_TOKEN'] . "'";
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
        curl_setopt(self::$curlHandler, CURLOPT_HEADER, "Accept:application/json");
        curl_setopt(self::$curlHandler, CURLOPT_HEADER, "Content-Type:application/json");
        curl_setopt(self::$curlHandler, CURLOPT_HEADER, self::API_AUTH_TOKEN);
    }

    private static function setPostCurl(string $request_uri): void
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
        curl_setopt(self::$curlHandler, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            self::API_AUTH_TOKEN
        ]);
        curl_setopt(self::$curlHandler, CURLOPT_POST, 1);
        curl_setopt(
            self::$curlHandler,
            CURLOPT_POSTFIELDS,
            "email=example@gmail.ru&name=John Doe&gender=male&status=active"
        );

        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, true);
    }

    private static function setCurlResource(): void
    {
        self::$curlHandler = curl_init();
    }
}
