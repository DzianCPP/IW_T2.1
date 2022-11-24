<?php

namespace core\models;

class Users extends Model
{
    public function getAllUsers(): array
    {
        return $this->selectAll("usersTable");
    }

    public function getUserById(int $id): array
    {
        return $this->getRecordBy("userID", $id, "usersTable");
    }

    public function insertUser(array $params = []): bool
    {
        if ($params === []) {
            $params = $this->validator->makeDataSafe($_POST);
        } else {
            $params = $this->validator->makeDataSafe($params);
        }

        if (!$this->insert($params)) {
            return false;
        }

        return true;
    }

    public function editUser($newUserData): bool
    {
        $params = $this->validator->makeDataSafe($newUserData);

        if (!$this->update("usersTable", $params)) {
            return false;
        }

        return true;
    }

    public function deleteUser(int $id): bool
    {
        if (!$this->delete("usersTable", $id)) {
            return false;
        }

        return true;
    }

    public function seedUsers(array $data): bool
    {
        $params = [
            'email' => $data['email'],
            'fullName' => $data['fullName'],
            'gender' => $data['gender'],
            'status' => $data['status']
        ];

        if (!$this->insertUser($params)) {
            return false;
        }

        return true;
    }
}