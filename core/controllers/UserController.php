<?php

namespace core\controllers;

use core\models\Users;
use function MongoDB\BSON\fromJSON;

class UserController extends BaseController
{
    public function create(): void
    {
        $this->setModel();
        if ($this->users->insertUser()) {
            $this->show();
        } else {
            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $this->new($email, $fullName);
        }
    }

    public function new(string $email = '', string $fullName = ''): void
    {
        $this->setView(VIEW_PATH);
        $users = new Users();
        $genders = $users->getGenders();
        $statuses = $users->getStatuses();
        $data = [
            'email' => $email,
            'fullName' => $fullName,
            'genders' => $genders,
            'statuses' => $statuses
        ];

        $this->view->render("new", $data);
    }

    public function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();
        $page = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $pages = (int)ceil(count($allUsers) / 10);
        $this->setView(VIEW_PATH);
        if ($page > $pages) {
            $this->view->render("404");
            http_response_code(404);
            return;
        }
        $this->limitUsersRange($allUsers, $page);

        $data = [
            'allUsers' => $allUsers,
            'GENDERS' => $users->getGenders(),
            'STATUSES' => $users->getStatuses(),
            'thisPage' => $page,
            'pages' => $pages
        ];

        $this->view->render("users", $data);
    }

    public function showOne(): void
    {
        $users = new Users();
        $userID = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $userID = ltrim(rtrim($userID, '}'), '{');
        $user = $users->getUserById($userID);
        $this->setView(VIEW_PATH);
        $data = [
            'allUsers' => $user,
            'GENDERS' => $users->getGenders(),
            'STATUSES' => $users->getStatuses()
        ];
        $this->view->render("users", $data);
    }

    public function editUser(): void
    {
        $users = new Users();
        $this->setView(VIEW_PATH);
        $userID = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $userToEdit = $users->getUserById($userID)[0];
        $genders = $users->getGenders();
        $statuses = $users->getStatuses();
        $data = [
            'genders' => $genders,
            'statuses' => $statuses,
            'user' => $userToEdit
        ];
        $this->view->render("edit", $data);
    }

    public function update(): void
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);
        $users = new Users();
        if ($users->editUser($newUserInfo)) {
            http_response_code(200);
            $this->show();
        }
    }

    public function delete(): void
    {
        $jsonString = file_get_contents("php://input");
        $ids = json_decode($jsonString, true);
        if (count($ids) > 0) {
            $users = new Users();
            if (!$users->deleteUsers($ids)) {
                http_response_code(500);
            }
        }
    }

    private function limitUsersRange(array &$allUsers, int $requestedPage): void
    {
        $usersRangeStart = $requestedPage * 10 - 10;
        $usersRangeEnd = $usersRangeStart + 10;

        $newAllUsers = [];
        for ($i = $usersRangeStart; $i < $usersRangeEnd && $i < count($allUsers); ++$i) {
            $newAllUsers[] = $allUsers[$i];
        }

        $allUsers = $newAllUsers;
    }
}
