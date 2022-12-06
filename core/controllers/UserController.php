<?php

namespace core\controllers;

use core\models\Users;
use GuzzleHttp\Client;
use function MongoDB\BSON\fromJSON;

class UserController extends BaseController
{
    const PER_PAGE = 5;
    
    public function create(): void
    {
        $this->setModel();
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);

        if ($_COOKIE['dataSource'] === 'gorest') {
            GorestApiController::createRecord("/public/v2/users");
        }
        
        if (!$this->users->insertUser($newUserInfo)) {
            http_response_code(400);
            return;
        }
    }

    public function new(string $email = '', string $name = ''): void
    {
        $this->setView();
        $users = new Users();
        $genders = $users->getGenders();
        $statuses = $users->getStatuses();
        $data = [
            'email' => $email,
            'name' => $name,
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
        $allUsers = $this->getAllUsers($users);
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
        if (!$users->editUser($newUserInfo)) {
            http_response_code(400);
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

    private function getAllUsers(Users $users): array
    {
        if ($_COOKIE['dataSource'] === "local") {
            return $users->getAllUsers();
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            return GorestApiController::getRecords("/public/v2/users");
        }
    }
}
