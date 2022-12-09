<?php

namespace core\controllers;

use core\GorestCurlBuilder;

class GorestApiController
{
    private $curlHandler;
    private GorestCurlBuilder $gorestCurlBuilder;

    public function __construct()
    {
        $this->gorestCurlBuilder = new GorestCurlBuilder();
    }

    public function getRecords(string $request_uri): array
    {
        $this->curlHandler = $this->gorestCurlBuilder->setGetCurl($request_uri);
        $result = curl_exec($this->curlHandler);
        $result = str_replace("id", "userID", $result);
        curl_close($this->curlHandler);
        return json_decode($result, true);
    }

    public function getRecordById(int $id, $request_uri): array
    {
        $this->curlHandler = $this->gorestCurlBuilder->setGetCurl($request_uri . "/${id}");
        $result = curl_exec($this->curlHandler);
        $result = str_replace("id", "userID", $result);
        curl_close($this->curlHandler);
        return json_decode($result, true);
    }

    public function createRecord(string $request_uri): bool
    {
        $newUserInfo = file_get_contents("php://input");
        $newUserInfo = str_replace("userID", "id", $newUserInfo);
        $newUserInfo = json_decode($newUserInfo);
        $newUserInfo = http_build_query($newUserInfo);

        $this->curlHandler = $this->gorestCurlBuilder->setPostCurl($request_uri, $newUserInfo);
        $gorest_response = curl_exec($this->curlHandler);
        curl_close($this->curlHandler);

        if ($gorest_response === false) {
            return false;
        }

        return true;
    }

    public function deleteRecord(int $id, string $request_uri): bool
    {
        $this->curlHandler = $this->gorestCurlBuilder->setDeleteCurl($request_uri . "/${id}");
        $result = curl_exec($this->curlHandler);

        if (!$result) {
            return false;
        }

        return true;
    }

    public function updateRecordById(array $newRecordInfo, string $requested_uri): bool
    {
        $this->curlHandler = $this->gorestCurlBuilder->setPutCurl(json_encode($newRecordInfo), $requested_uri);
        $result = curl_exec($this->curlHandler);

        if ($result === false) {
            return false;
        }

        return true;
    }
}
