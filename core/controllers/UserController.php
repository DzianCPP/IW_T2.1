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
            'header' => 'Create user',
            'dataSource' => $this->setDataSource()
        ];

        $this->view->render("new.html.twig", $data);
    }

    public function show(): void
    {
        $allUsers = $this->model->get();
        $page = $this->getPage();
        $pages = (int)ceil(count($allUsers) / self::PER_PAGE);
        $this->limitUsersRange($allUsers, $page);
        $data = [
            'users' => $allUsers,
            'GENDERS' => $this->model->getGenders(),
            'STATUSES' => $this->model->getStatuses(),
            'currentPage' => $page,
            'pages' => $pages,
            'PER_PAGE' => self::PER_PAGE,
            'title' => 'All users',
            'header' => 'Users',
            'dataSource' => $this->setDataSource()
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
        $id = (int)ltrim(rtrim($id, '}'), '{');
        $user = $this->model->get($id);
        $data = [
            'users' => $user,
            'GENDERS' => $this->model->getGenders(),
            'STATUSES' => $this->model->getStatuses(),
            'title' => 'User - ' . $user['name'],
            'header' => 'User - ' . $user['name'],
            'dataSource' => $this->setDataSource()
        ];

        $this->view->render("users.html.twig", $data);
    }

    public function editUser(): void
    {
        $data = [
            'genders' => $this->model->getGenders(),
            'statuses' => $this->model->getStatuses(),
            'user' => $this->model->get()[0],
            'title' => 'Edit user',
            'header' => 'Edit user',
            'dataSource' => $this->setDataSource()
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
            'header' => '404: page not found'
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

    private function setDataSource(): string
    {
        if (!isset($_COOKIE['dataSource'])) {
            return "Local DB";
        }

        if ($_COOKIE['dataSource'] == 'local') {
            return "Local DB";
        }

        return "gorest API";
    }
}
