<?php

namespace core\models;

use core\models\UsersApiModel;
use core\models\UsersDatabaseModel;

class UsersModel
{
    private $model;

    private array $genders = [
        'male' => 'Male',
        'female' => 'Female'
    ];

    private array $statuses = [
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    public function __construct()
    {
        switch ($_COOKIE['dataSource']) {
            case ("gorest"):
                $modelName = UsersApiModel::class;
                break;
            case ("local"):
            default:
                $modelName = UsersDatabaseModel::class;
                break;
        }

        $this->model = new $modelName();
    }

    public function create(): void
    {
        $newUserInfo = file_get_contents("php://input");
        if (!$this->model->create($newUserInfo)) {
            http_response_code(400);
            return;
        }
    }

    public function get(int $id = 0): array
    {
        if ($id > 0) {
            return $this->model->get(value: $id);
        }

        return $this->model->get();
    }

    public function update(): bool
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = $jsonString;
        $newUserInfo = json_decode($newUserInfo, true);

        if (!$this->model->update(newInfo: $newUserInfo)) {
            return false;
        }

        return true;
    }

    public function delete(): bool
    {
        $ids = json_decode(file_get_contents("php://input"), true);
        $this->model->delete(...$ids);

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
