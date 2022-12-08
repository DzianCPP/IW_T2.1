<?php

namespace core\controllers;

use core\models\Users;

class UserController extends BaseController
{
    const PER_PAGE = 5;

    public function create(): void
    {
        UserDataController::createUser();
    }

    public function new(string $email = '', string $name = ''): void
    {
        self::setView();
        self::setModel();
        $data = [
            'email' => $email,
            'name' => $name,
            'genders' => self::$users->getGenders(),
            'statuses' => self::$users->getStatuses(),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        self::$view->render("new.html.twig", $data);
    }

    public function show(): void
    {
        self::setModel();
        self::setView();
        $allUsers = UserDataController::selectUsers();
        $page = $this->getPage();
        $pages = (int)ceil(count($allUsers) / self::PER_PAGE);
        $this->limitUsersRange($allUsers, $page);
        $data = [
            'allUsers' => $allUsers,
            'GENDERS' => self::$users->getGenders(),
            'STATUSES' => self::$users->getStatuses(),
            'thisPage' => $page,
            'pages' => $pages,
            'countUsers' => count($allUsers),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        if (count($allUsers) === 0) {
            self::$view->render("emptyTable.html.twig", $data);
            return;
        }

        if ($page > $pages || $page < 1) {
            $this->notFound();
            return;
        }

        self::$view->render("users.html.twig", $data);
    }

    public function showOne(): void
    {
        self::setModel();
        $id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $id = ltrim(rtrim($id, '}'), '{');
        $user = UserDataController::selectUser($id);
        self::setView();
        $data = [
            'allUsers' => [$user],
            'GENDERS' => self::$users->getGenders(),
            'STATUSES' => self::$users->getStatuses(),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP',
            'countUsers' => count([$user])
        ];

        self::$view->render("users.html.twig", $data);
    }

    public function editUser(): void
    {
        self::setModel();
        self::setView();
        $id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $data = [
            'genders' => self::$users->getGenders(),
            'statuses' => self::$users->getStatuses(),
            'user' => UserDataController::selectUser($id),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];
        self::$view->render("edit.html.twig", $data);
    }

    public function update(): void
    {
        if (!UserDataController::updateUser()) {
            http_response_code(400);
        }
    }

    public function delete(): void
    {
        $jsonString = file_get_contents("php://input");
        $ids = json_decode($jsonString, true);
        if (count($ids) > 0) {
            UserDataController::deleteUsers($ids);
        }
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
}
