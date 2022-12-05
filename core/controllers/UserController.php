<?php

namespace core\controllers;

use core\models\Users;
use function MongoDB\BSON\fromJSON;

class UserController extends BaseController
{
    const PER_PAGE = 3;
    
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
        $page = $this->getPage();
        $pages = (int)ceil(count($allUsers) / self::PER_PAGE);
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
            'pages' => $pages,
            'countUsers' => count($allUsers),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        if (count($allUsers) === 0) {
            $this->view->render("emptyTable.html.twig", $data);
            return;
        }

        if ($page > $pages || $page < 1) {
            $this->notFound();
            return;
        }

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
            'author' => 'Author: DzianCPP'
        ];
        $this->view->render("edit.html.twig", $data);
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
        $usersRangeStart = $requestedPage * self::PER_PAGE - self::PER_PAGE;
        $usersRangeEnd = $usersRangeStart + self::PER_PAGE;

        $newAllUsers = [];
        for ($i = $usersRangeStart; $i < $usersRangeEnd && $i < count($allUsers); ++$i) {
            $newAllUsers[] = $allUsers[$i];
        }

        $allUsers = $newAllUsers;
    }

    private function getPage(): int
    {
        $page = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        if ($page == "") {
            $page = 1;
        }

        return $page;
    }

    private function notFound(): void
    {
        $data = [
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP',
            'message' => '404: page not found'
        ];
        $this->view->render("404.html.twig", $data);
        http_response_code(404);
        return;
    }
}
