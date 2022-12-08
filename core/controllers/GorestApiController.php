<?php

namespace core\controllers;

abstract class GorestApiController
{
    private const API_BASE_URI = "https://gorest.co.in";
    private static $curlHandler;

    public static function getRecords(string $request_uri): array
    {
        self::setGetCurl($request_uri);
        $result = curl_exec(self::$curlHandler);
        $result = str_replace("id", "userID", $result);
        curl_close(self::$curlHandler);
        return json_decode($result, true);
    }

    public static function getRecordById(int $id, $request_uri)
    {
        self::setGetCurl($request_uri . "/${id}");
        $result = curl_exec(self::$curlHandler);
        $result = str_replace("id", "userID", $result);
        curl_close(self::$curlHandler);
        return json_decode($result, true);
    }

    private static function setGetCurl(string $request_uri): void
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN']
        ]);
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
    }

    public static function createRecord(string $request_uri): bool
    {
        self::setPostCurl($request_uri);
        $gorest_response = curl_exec(self::$curlHandler);
        curl_close(self::$curlHandler);
        return true;
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

    public static function deleteRecord(int $id, string $request_uri)
    {
        self::setDeleteCurl($request_uri . "/${id}");
        $result = curl_exec(self::$curlHandler);
    }

    private static function setDeleteCurl(string $request_uri): void
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt(self::$curlHandler, CURLOPT_HEADER, true);
        curl_setopt(self::$curlHandler, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN']
        ]);
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
    }

    public static function updateRecordById(array $newRecordInfo, string $requested_uri): bool
    {
        self::setPutCurl($newRecordInfo, $requested_uri . "/{$newRecordInfo['id']}");
        $result = curl_exec(self::$curlHandler);
        $info = curl_getinfo(self::$curlHandler);
        if ($result === false) {
            return false;
        }

        return true;
    }

    private static function setPutCurl(array &$newRecordInfo, string $requested_uri): void
    {
        self::setCurlResource();
        curl_setopt(self::$curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt(self::$curlHandler, CURLOPT_HEADER, true);
        curl_setopt(self::$curlHandler, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt(self::$curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN'],
            "Content-Type:application/json"
        ]);
        $newRecordInfo = json_encode($newRecordInfo);
        curl_setopt(self::$curlHandler, CURLOPT_URL, self::API_BASE_URI . $requested_uri);
        curl_setopt(self::$curlHandler, CURLOPT_POSTFIELDS, $newRecordInfo);
    }

    private static function setCurlResource(): void
    {
        self::$curlHandler = curl_init();
    }
}
