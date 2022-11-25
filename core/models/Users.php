<?php

namespace core\models;

class Users extends Model
{
    protected array $fields = ['email', 'fullName', 'gender', 'status'];
    private array $genders = [
      'male' => ['lower' => 'male', 'upper' => 'Male'],
        'female' => ['lower' => 'female', 'upper' => 'Female'],
        'transgender' => ['lower' => 'transgender', 'upper' => 'Transgender'],
        'non-binary' => ['lower' => 'non-binary', 'upper' => 'Non-binary'],
        'other' => ['lower' => 'other', 'upper' => 'Other'],
    ];

    private array $statuses = [
        'active' => ['lower' => 'active', 'upper' => 'Active'],
        'inactive' => ['lower' => 'inactive', 'upper' => 'Inactive']
    ];

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

        if (!$this->insert($params, $this->fields, 'usersTable')) {
            return false;
        }

        return true;
    }

    public function editUser($newUserData): bool
    {
        $params = $this->validator->makeDataSafe($newUserData);

        if (!$this->update("usersTable", $this->fields, $params, "userID")) {
            return false;
        }

        return true;
    }

    public function deleteUser(int $id): bool
    {
        if (!$this->delete("userID", $id, "usersTable")) {
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

    public function getGenders(): array
    {
        return $this->genders;
    }

    public function getStatuses(): array
    {
        return $this->statuses;
    }
}