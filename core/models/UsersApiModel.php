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

    public function get(int|string $value = NULL): array
    {
        $result = $this->gorestCurlBuilder->executeCurl(method: "GET", id: $value);
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

    public function delete(int ...$ids): bool
    {
        foreach ($ids as $id) {
            $result = $this->gorestCurlBuilder->executeCurl(method: "DELETE", id: $id);
            if (!$result) {
                return false;
            }
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
