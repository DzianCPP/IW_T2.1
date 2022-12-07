<?php

namespace core\controllers;

use core\models\Users;

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
        $this->limitUsersRange($allUsers, $page);

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

    private function getAllUsers(Users $users): array
    {
        if ($_COOKIE['dataSource'] === "local") {
            return $users->getAllUsers();
        }

        if ($_COOKIE['dataSource'] === "gorest") {
            return GorestApiController::getRecords("/public/v2/users");
        }
    }

    public function showOne(): void
    {
        $users = new Users();
        $userID = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $userID = ltrim(rtrim($userID, '}'), '{');
        $user = $this->getUserById($users, $userID);
        $this->setView();
        $data = [
            'allUsers' => [$user],
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
        $id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $userToEdit = $this->getUserById($users, $id);
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

    private function getUserById(Users $users, int $id): array
    {
        if ($_COOKIE['dataSource']  === "local") {
            return $userToEdit = $users->getUserById($id)[0];
        }

        return GorestApiController::getRecordById($id, "/public/v2/users");
    }

    public function update(): void
    {
        $users = new Users();
        if (!$this->updateUser($users)) {
            http_response_code(400);
        }
    }

    private function updateUser(Users $users): bool
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);

        if ($_COOKIE['dataSource'] === "local") {
            if (!$users->editUser($newUserInfo)) {
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

    public function delete(): void
    {
        $jsonString = file_get_contents("php://input");
        $ids = json_decode($jsonString, true);
        if (count($ids) > 0) {
            $users = new Users();
            $this->deleteUsers($users, $ids);
        }
    }

    private function deleteUsers(Users $users, array $ids): bool
    {
        if ($_COOKIE['dataSource'] === "local") {
            if (!$users->deleteUsers($ids)) {
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

    private function limitUsersRange(array &$allUsers, int $requestedPage = 0): void
    {
        if ($requestedPage === 0) {
            $requestedPage = 1;
        }

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
