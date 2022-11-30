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
        $this->setView();
        $users = new Users();
        $genders = $users->getGenders();
        $statuses = $users->getStatuses();
        $data = [
            'email' => $email,
            'fullName' => $fullName,
            'genders' => $genders,
            'statuses' => $statuses,
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        $this->view->render("new.html.twig", $data);
    }

    public function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();
        $this->setView();
        $page = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $pages = (int)ceil(count($allUsers) / 10);
        $data = [
            'allUsers' => $allUsers,
            'GENDERS' => $users->getGenders(),
            'STATUSES' => $users->getStatuses(),
            'thisPage' => $page,
            'pages' => $pages,
            'countUsers' => count($allUsers),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];
        if (count($allUsers) === 0) {
            $this->view->render("emptyTable.html.twig", $data);
            http_response_code(200);
            return;
        }
        if ($page > $pages) {
            $this->view->render("404.html.twig", $data);
            http_response_code(404);
            return;
        }
        
        $this->limitUsersRange($allUsers, $page);
        $this->view->render("users.html.twig", $data);
    }

    public function showOne(): void
    {
        $users = new Users();
        $userID = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $userID = ltrim(rtrim($userID, '}'), '{');
        $user = $users->getUserById($userID);
        $this->setView();
        $data = [
            'allUsers' => $user,
            'GENDERS' => $users->getGenders(),
            'STATUSES' => $users->getStatuses(),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP',
            'countUsers' => count([$user])
        ];
        $this->view->render("users.html.twig", $data);
    }

    public function editUser(): void
    {
        $users = new Users();
        $this->setView();
        $userID = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $userToEdit = $users->getUserById($userID)[0];
        $genders = $users->getGenders();
        $statuses = $users->getStatuses();
        $data = [
            'genders' => $genders,
            'statuses' => $statuses,
            'user' => $userToEdit,
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP',
            'userEmail' => $userToEdit['email'],
            'userFullName' => $userToEdit['fullName'],
            'userGender' => $userToEdit['gender'],
            'userStatus' => $userToEdit['status'],
            'userID' => $userToEdit['userID']
        ];
        $this->view->render("edit.html.twig", $data);
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
        $users = new Users();
        if (!$users->deleteUsers($ids)) {
            http_response_code(500);
        }

        http_response_code(200);
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
