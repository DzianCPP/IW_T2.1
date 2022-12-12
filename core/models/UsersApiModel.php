<?php

namespace core\models;

use core\GorestCurlBuilder;

class UsersApiModel
{
    private $curlHandler;
    private GorestCurlBuilder $gorestCurlBuilder;

    public function __construct()
    {
        $this->gorestCurlBuilder = new GorestCurlBuilder();
    }

    public function getRecords(string $request_uri): array
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl("GET", $request_uri);
        $result = curl_exec($this->curlHandler);
        curl_close($this->curlHandler);
        return json_decode($result, true);
    }

    public function getRecordById(int $id, $request_uri): array
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl("GET", $request_uri . "/${id}");
        $result = curl_exec($this->curlHandler);
        curl_close($this->curlHandler);
        return json_decode($result, true);
    }

    public function createRecord(string $request_uri): bool
    {
        $newUserInfo = file_get_contents("php://input");

        $this->curlHandler = $this->gorestCurlBuilder->setCurl("POST", $request_uri, $newUserInfo);
        $gorest_response = curl_exec($this->curlHandler);
        curl_close($this->curlHandler);

        if ($gorest_response === false) {
            return false;
        }

        return true;
    }

    public function deleteRecord(int $id, string $request_uri): bool
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl("DELETE", $request_uri . "/${id}");
        $result = curl_exec($this->curlHandler);

        if (!$result) {
            return false;
        }

        return true;
    }

    public function updateRecordById(array $newRecordInfo, string $requested_uri): bool
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl("PATCH", $requested_uri, json_encode($newRecordInfo));
        $result = curl_exec($this->curlHandler);

        if ($result === false) {
            return false;
        }

        return true;
    }
}
