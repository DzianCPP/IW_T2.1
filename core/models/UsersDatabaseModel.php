<?php

namespace core\models;

class UsersDatabaseModel extends Model
{
    protected array $fields = ['email', 'name', 'gender', 'status'];
    private array $genders = [
      'male' => 'Male',
        'female' => 'Female',
        'transgender' => 'Transgender',
        'non-binary' => 'Non-binary',
        'other' => 'Other',
    ];

    private array $statuses = [
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    public function getAllUsers(): array
    {
        return $this->selectAll("usersTable");
    }

    public function getUserById(int $id): array
    {
        return $this->getRecordBy("id", $id, "usersTable");
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

        if (!$this->update("usersTable", $this->fields, $params, "id")) {
            return false;
        }

        return true;
    }

    public function deleteUsers(array $ids): bool
    {
        if (!$this->delete("id", $ids, "usersTable")) {
            return false;
        }

        return true;
    }

    public function seedUsers(array $data): bool
    {
        $params = [
                'email' => $data['email'],
            'name' => $data['name'],
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