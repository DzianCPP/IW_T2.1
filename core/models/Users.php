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

    public function insertUser(): bool
    {
        $params = [
            'email' => $this->validator->makeDataSafe($_POST['email']),
            'fullName' => $this->validator->makeDataSafe($_POST['name']),
            'gender' => $this->validator->makeDataSafe($_POST['gender']),
            'status' => $this->validator->makeDataSafe($_POST['status'])
        ];

        if (!$this->insert($params)) {
            return false;
        }

        return true;
    }

    public function editUser($newUserData): bool
    {
        $params = [
            'email' => $newUserData['newEmail'],
            'fullName' => $newUserData['newFullName'],
            'gender' => $newUserData['newGender'],
            'status' => $newUserData['newStatus'],
            'userID' => $newUserData['newUserID']
        ];

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

        if (!$this->insertUser()) {
            return false;
        }

        return true;
    }
}