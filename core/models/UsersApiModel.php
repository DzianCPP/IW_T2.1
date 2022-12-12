<?php

namespace core\models;

use core\GorestCurlBuilder;

class UsersApiModel implements ModelInterface
{
    private GorestCurlBuilder $gorestCurlBuilder;

    public function __construct()
    {
        $this->gorestCurlBuilder = new GorestCurlBuilder();
    }

    public function getUsers(array $columnValue = []): array
    {
        $result = $this->gorestCurlBuilder->executeCurl(method: "GET", id: $columnValue['value']);
        return json_decode($result, true);
    }

    public function create(): bool
    {
        $newUserInfo = file_get_contents("php://input");

        $gorest_response = $this->gorestCurlBuilder->executeCurl(method: "POST", json_body: $newUserInfo);

        if ($gorest_response === false) {
            return false;
        }

        return true;
    }

    public function delete(array $columnValues = [], string $column = "", mixed $value = NULL): bool
    {
        $result = $this->gorestCurlBuilder->executeCurl(method: "DELETE", id: $value);

        if (!$result) {
            return false;
        }

        return true;
    }

    public function update(array $newInfo): bool
    {
        $result = $this->gorestCurlBuilder->executeCurl(method: "PATCH", json_body: json_encode($newInfo), id: $newInfo['id']);

        if ($result === false) {
            return false;
        }

        return true;
    }
}
