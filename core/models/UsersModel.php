<?php

namespace core\models;

use core\models\UsersApiModel;
use core\models\UsersDatabaseModel;

class UsersModel
{
    private UsersApiModel $usersApiModel;
    private UsersDatabaseModel $usersDatabaseModel;
    
    public function __construct()
    {
        $this->usersApiModel = new UsersApiModel();
        $this->usersDatabaseModel = new UsersDatabaseModel();
    }
    
    public function create(): void
    {
        if ($_COOKIE['dataSource'] === 'gorest') {
            if (!$this->usersApiModel->create()) {
                http_response_code(400);
                return;
            }
        }

        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->usersDatabaseModel->create()) {
                http_response_code(400);
                return;
            }
        }
    }

    public function getUsers(): array
    {
        if ($_COOKIE['dataSource'] === "gorest") {
            return $this->usersApiModel->getUsers();
        }
        
        if ($_COOKIE['dataSource'] === "local") {
            return $this->usersDatabaseModel->getUsers();
        }
    }

    public function selectUser(int $id): array
    {
        if ($_COOKIE['dataSource'] === "gorest") {
            return $this->usersApiModel->getUsers("/public/v2/users", $id);
        }

        if ($_COOKIE['dataSource']  === "local") {
            return $this->usersDatabaseModel->getUsers(fieldValue: [
                'field' => 'id',
                'value' => $id
            ])[0];
        }
    }

    public function update(): bool
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = $jsonString;
        $newUserInfo = json_decode($newUserInfo, true);

        if ($_COOKIE['dataSource'] === "gorest") {
            if (!$this->usersApiModel->update(newUserInfo: $newUserInfo, id: $newUserInfo['id'])) {
                return false;
            }
        }
        
        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->usersDatabaseModel->update($newUserInfo)) {
                return false;
            }
        }

        return true;
    }

    public function delete(array $ids): bool
    {
        if ($_COOKIE['dataSource'] === "gorest") {
            foreach ($ids as $id) {
                if (!$this->usersApiModel->delete(id: $id)) {
                    http_response_code(500);
                    return false;
                }
            }
        }
        
        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->usersDatabaseModel->delete(
                fieldValues: [ 'field' => 'id', 'values' => $ids]
            )) {
                http_response_code(500);
                return false;
            }
        }

        return true;
    }

    public function getGenders(): array
    {
        return $this->usersDatabaseModel->getGenders();
    }

    public function getStatuses(): array
    {
        return $this->usersDatabaseModel->getStatuses();
    }
}
