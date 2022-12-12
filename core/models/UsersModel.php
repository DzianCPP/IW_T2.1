<?php

namespace core\models;

use core\models\Model;
use core\models\UsersApiModel;
use core\models\UsersDatabaseModel;

class UsersModel extends Model
{
    private UsersApiModel $usersApiModel;
    private UsersDatabaseModel $usersDatabaseModel;
    
    public function __construct()
    {
        $this->usersApiModel = new UsersApiModel();
        $this->usersDatabaseModel = new UsersDatabaseModel();
    }
    
    public function createUser(): void
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);

        if ($_COOKIE['dataSource'] === 'gorest') {
            if (!$this->usersApiModel->createRecord("/public/v2/users")) {
                http_response_code(400);
                return;
            }
        }

        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->usersDatabaseModel->insertUser($newUserInfo)) {
                http_response_code(400);
                return;
            }
        }
    }

    public function selectUsers(): array
    {
        if ($_COOKIE['dataSource'] === "gorest") {
            return $this->usersApiModel->getRecords("/public/v2/users");
        }
        
        if ($_COOKIE['dataSource'] === "local") {
            return $this->usersDatabaseModel->getAllUsers();
        }
    }

    public function selectUser(int $id): array
    {
        if ($_COOKIE['dataSource'] === "gorest") {
            return $this->usersApiModel->getRecordById($id, "/public/v2/users");
        }

        if ($_COOKIE['dataSource']  === "local") {
            return $this->usersDatabaseModel->getUserById($id)[0];
        }
    }

    public function updateUser(): bool
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = $jsonString;
        $newUserInfo = json_decode($newUserInfo, true);

        if ($_COOKIE['dataSource'] === "gorest") {
            if (!$this->usersApiModel->updateRecordById($newUserInfo, "/public/v2/users/" . $newUserInfo['id'])) {
                return false;
            }
        }
        
        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->usersDatabaseModel->editUser($newUserInfo)) {
                return false;
            }
        }

        return true;
    }

    public function deleteUsers(array $ids): bool
    {
        if ($_COOKIE['dataSource'] === "gorest") {
            foreach ($ids as $id) {
                if (!$this->usersApiModel->deleteRecord($id, "/public/v2/users")) {
                    http_response_code(500);
                    return false;
                }
            }
        }
        
        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->usersDatabaseModel->deleteUsers($ids)) {
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
