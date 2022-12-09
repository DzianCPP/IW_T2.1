<?php

namespace core\controllers;

class UserDataController extends BaseController
{
    private GorestApiController $gorestApiController;
    
    public function __construct()
    {
        $this->gorestApiController = new GorestApiController();
        $this->setModel();
    }
    
    public function createUser(): void
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);

        if ($_COOKIE['dataSource'] === 'gorest') {
            if (!$this->gorestApiController->createRecord("/public/v2/users")) {
                http_response_code(400);
                return;
            }
        }

        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->users->insertUser($newUserInfo)) {
                http_response_code(400);
                return;
            }
        }
    }

    public function selectUsers(): array
    {
        if ($_COOKIE['dataSource'] === "local") {
            return $this->users->getAllUsers();
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            return $this->gorestApiController->getRecords("/public/v2/users");
        }
    }

    public function selectUser(int $id): array
    {
        if ($_COOKIE['dataSource']  === "local") {
            return $this->users->getUserById($id)[0];
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            return $this->gorestApiController->getRecordById($id, "/public/v2/users");
        }
    }

    public function updateUser(): bool
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = $jsonString;
        $newUserInfo = json_decode($newUserInfo, true);
        
        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->users->editUser($newUserInfo)) {
                return false;
            }
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            if (!$this->gorestApiController->updateRecordById($newUserInfo, "/public/v2/users/" . $newUserInfo['id'])) {
                return false;
            }
        }

        return true;
    }

    public function deleteUsers(array $ids): bool
    {
        if ($_COOKIE['dataSource'] === "local") {
            if (!$this->users->deleteUsers($ids)) {
                http_response_code(500);
                return false;
            }
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            foreach ($ids as $id) {
                $this->gorestApiController->deleteRecord($id, "/public/v2/users");
            }
        }

        return true;
    }
}
