<?php

namespace core\models;

use core\GorestCurlBuilder;

class UsersApiModel //implements ModelInterface
{
    private $curlHandler;
    private GorestCurlBuilder $gorestCurlBuilder;

    public function __construct()
    {
        $this->gorestCurlBuilder = new GorestCurlBuilder();
    }

    public function getUsers(int $id = 0): array
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl(method: "GET", id: $id);
        $result = curl_exec($this->curlHandler);
        curl_close($this->curlHandler);
        return json_decode($result, true);
    }

    public function create(): bool
    {
        $newUserInfo = file_get_contents("php://input");

        $this->curlHandler = $this->gorestCurlBuilder->setCurl(method: "POST", json_body: $newUserInfo);
        $gorest_response = curl_exec($this->curlHandler);
        curl_close($this->curlHandler);

        if ($gorest_response === false) {
            return false;
        }

        return true;
    }

    public function delete(int $id = 0): bool
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl(method: "DELETE", id: $id);
        $result = curl_exec($this->curlHandler);

        if (!$result) {
            return false;
        }

        return true;
    }

    public function update(array $newUserInfo, int $id = 0): bool
    {
        $this->curlHandler = $this->gorestCurlBuilder->setCurl(method: "PATCH", json_body: json_encode($newUserInfo));
        $result = curl_exec($this->curlHandler);

        if ($result === false) {
            return false;
        }

        return true;
    }
}
