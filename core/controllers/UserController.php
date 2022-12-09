<?php

namespace core\controllers;

use core\models\Users;
use core\view\UsersView;

class UserController extends BaseController
{
    const PER_PAGE = 5;
    private UserDataController $userDataController;

    public function __construct()
    {
        $this->userDataController = new UserDataController();
        $this->setModel();
        $this->setView();
    }

    public function create(): void
    {
        $this->userDataController->createUser();
    }

    public function new(string $email = '', string $name = ''): void
    {
        $data = [
            'email' => $email,
            'name' => $name,
            'genders' => $this->users->getGenders(),
            'statuses' => $this->users->getStatuses(),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];

        $this->view->render("new.html.twig", $data);
    }

    public function show(): void
    {
        $allUsers =  $this->userDataController->selectUsers();
        $page = $this->getPage();
        $pages = (int)ceil(count($allUsers) / self::PER_PAGE);
        $this->limitUsersRange($allUsers, $page);
        $g = $this->users->getGenders();
        $data = [
            'allUsers' => $allUsers,
            'GENDERS' => $this->users->getGenders(),
            'STATUSES' => $this->users->getStatuses(),
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
        $id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $id = ltrim(rtrim($id, '}'), '{');
        $user = $this->userDataController->selectUser($id);
        $data = [
            'allUsers' => [$user],
            'GENDERS' => $this->users->getGenders(),
            'STATUSES' => $this->users->getStatuses(),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP',
            'countUsers' => count([$user])
        ];

        $this->view->render("users.html.twig", $data);
    }

    public function editUser(): void
    {
        $id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $data = [
            'genders' => $this->users->getGenders(),
            'statuses' => $this->users->getStatuses(),
            'user' => $this->userDataController->selectUser($id),
            'title' => 'Add User App',
            'author' => 'Author: DzianCPP'
        ];
        $this->view->render("edit.html.twig", $data);
    }

    public function update(): void
    {
        if (!$this->userDataController->updateUser()) {
            http_response_code(400);
        }
    }

    public function delete(): void
    {
        $jsonString = file_get_contents("php://input");
        $ids = json_decode($jsonString, true);
        if (count($ids) > 0) {
            $this->userDataController->deleteUsers($ids);
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
