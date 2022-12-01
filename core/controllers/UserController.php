<?php

namespace core\controllers;

use core\models\Users;
use function MongoDB\BSON\fromJSON;

class UserController extends BaseController
{
    const PER_PAGE = 10;
    
    public function create(): void
    {
        $this->setModel();
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);
        foreach($newUserInfo as $key => $value) {
            $_POST[$key] = $value;
        }
        if (!$this->users->insertUser()) {
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
        $pages = (int)ceil(count($allUsers) / self::PER_PAGE);
        $this->setView(VIEW_PATH);
        if ($page > $pages) {
            $this->view->render("404");
            http_response_code(404);
            return;
        }

        if ($page) {
            $this->limitUsersRange($allUsers, $page);
        } else {
            $this->limitUsersRange($allUsers);
        }

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

    private function limitUsersRange(array &$allUsers, int $requestedPage = 1): void
    {
        $usersRangeStart = $requestedPage * 10 - self::PER_PAGE;
        $usersRangeEnd = $usersRangeStart + self::PER_PAGE;

        $newAllUsers = [];
        for ($i = $usersRangeStart; $i < $usersRangeEnd && $i < count($allUsers); ++$i) {
            $newAllUsers[] = $allUsers[$i];
        }

        $allUsers = $newAllUsers;
    }
}
