<?php

namespace core\controllers;

use core\view\UsersView;
use core\models\UsersModel;

class UserController extends BaseController
{
    const PER_PAGE = 5;

    public function __construct()
    {
        $this->setModel(UsersModel::class);
        $this->setView(UsersView::class);
    }

    public function create(): void
    {
        $this->model->create();
    }

    public function new(string $email = '', string $name = ''): void
    {
        $data = [
            'email' => $email,
            'name' => $name,
            'genders' => $this->model->getGenders(),
            'statuses' => $this->model->getStatuses(),
            'title' => 'New user',
            'dataSource' => $_COOKIE['dataSource']
        ];

        $this->view->render("new.html.twig", $data);
    }

    public function show(): void
    {
        $allUsers = $this->model->getUsers();
        $page = $this->getPage();
        $pages = (int)ceil(count($allUsers) / self::PER_PAGE);
        $this->limitUsersRange($allUsers, $page);
        $data = [
            'allUsers' => $allUsers,
            'GENDERS' => $this->model->getGenders(),
            'STATUSES' => $this->model->getStatuses(),
            'thisPage' => $page,
            'pages' => $pages,
            'countUsers' => count($allUsers),
            'title' => 'All users',
            'message' => 'Users from',
            'dataSource' => $_COOKIE['dataSource']
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
        $user = $this->model->selectUser();
        $data = [
            'allUsers' => [$user],
            'GENDERS' => $this->model->getGenders(),
            'STATUSES' => $this->model->getStatuses(),
            'title' => 'User' . $user['name'],
            'countUsers' => count([$user])
        ];

        $this->view->render("users.html.twig", $data);
    }

    public function editUser(): void
    {
        $id = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $data = [
            'genders' => $this->model->getGenders(),
            'statuses' => $this->model->getStatuses(),
            'user' => $this->model->selectUser($id)[0],
            'title' => 'Edit user'
        ];
        $this->view->render("edit.html.twig", $data);
    }

    public function update(): void
    {
        if (!$this->model->update()) {
            http_response_code(400);
        }
    }

    public function delete(): void
    {
        $this->model->delete();
    }

    private function notFound(): void
    {
        $data = [
            'title' => 'Not found',
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
