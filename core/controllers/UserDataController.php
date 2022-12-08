<?php

namespace core\controllers;

abstract class UserDataController extends BaseController
{
    public static function createUser(): void
    {
        self::setModel();
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);

        if ($_COOKIE['dataSource'] === 'gorest') {
            if (!GorestApiController::createRecord("/public/v2/users")) {
                http_response_code(400);
                return;
            }
        }

        if ($_COOKIE['dataSourc'] === "local") {
            if (!self::$users->insertUser($newUserInfo)) {
                http_response_code(400);
                return;
            }
        }
    }

    public static function selectUsers(): array
    {
        self::setModel();

        if ($_COOKIE['dataSource'] === "local") {
            return self::$users->getAllUsers();
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            return GorestApiController::getRecords("/public/v2/users");
        }
    }

    public static function selectUser(int $id): array
    {
        self::setModel();

        if ($_COOKIE['dataSource']  === "local") {
            return self::$users->getUserById($id)[0];
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            return GorestApiController::getRecordById($id, "/public/v2/users");
        }
    }

    public static function updateUser(): bool
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);
        self::setModel();
        if ($_COOKIE['dataSource'] === "local") {
            if (!self::$users->editUser($newUserInfo)) {
                return false;
            }
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            if (!GorestApiController::updateRecordById($newUserInfo, "/public/v2/users")) {
                return false;
            }
        }

        return true;
    }

    public static function deleteUsers(array $ids): bool
    {
        self::setModel();
        if ($_COOKIE['dataSource'] === "local") {
            if (!self::$users->deleteUsers($ids)) {
                http_response_code(500);
                return false;
            }
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            foreach ($ids as $id) {
                GorestApiController::deleteRecord($id, "/public/v2/users");
            }
        }

        return true;
    }
}
