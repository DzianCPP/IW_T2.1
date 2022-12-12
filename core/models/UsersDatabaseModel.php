<?php

namespace core\models;

class UsersDatabaseModel implements ModelInterface
{
    private const TABLE_NAME = "usersTable";
    protected array $fields = ['email', 'name', 'gender', 'status', 'id'];
    private Validator $validator;
    private array $genders = [
      'male' => 'Male',
        'female' => 'Female'
    ];

    private array $statuses = [
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    private DatabaseSqlBuilder $sqlBuilder;

    public function __construct()
    {
        $this->sqlBuilder = new DatabaseSqlBuilder();
        $this->validator = new Validator();
    }

    public function getUsers(array $columnValue = []): array
    {
        return $this->sqlBuilder->select(self::TABLE_NAME, $columnValue);
    }

    public function create(): bool
    {
        $newUserInfo = file_get_contents("php://input");
        $newUserInfo = json_decode($newUserInfo, true);

        $newUserInfo = $this->validator->makeDataSafe($newUserInfo);

        if (!$this->validator->userDataValid($newUserInfo['email'], $newUserInfo['name'])) {
            return false;
        }

        if (!$this->sqlBuilder->insert(recordInfo: $newUserInfo, fields: $this->fields, tableName: self::TABLE_NAME)) {
            return false;
        }

        return true;
    }

    public function update(array $newInfo): bool
    {
        $newUserInfo = $this->validator->makeDataSafe($newInfo);

        if (!$this->validator->userDataValid($newUserInfo['email'], $newUserInfo['name'])) {
            return false;
        }

        if (!$this->sqlBuilder->update(self::TABLE_NAME, $this->fields, column: "id", recordInfo: $newUserInfo)) {
            return false;
        }

        return true;
    }

    public function delete(array $columnValues = [], string $column = "", mixed $value = NULL): bool
    {
        $jsonString = file_get_contents("php://input");
        $ids = json_decode($jsonString, true);

        if (count($ids) < 1) {
            return false; 
        }
        
        if (!$this->sqlBuilder->delete(
                columnValues: $columnValues,
                tableName: self::TABLE_NAME)) {
            
            return false;
        }

        return true;
    }

    public function seedUsers(array $data): bool
    {
        $userInfo = [
                'email' => $data['email'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'status' => $data['status']
        ];

        if (!$this->sqlBuilder->insert($userInfo, $this->fields, self::TABLE_NAME)) {
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