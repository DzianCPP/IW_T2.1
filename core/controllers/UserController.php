<?php

namespace core\controllers;
use core\models\Users;

class UserController
{
    public function create(): void
    {
        $users = new Users();
        $users->insertNewUser();

        $this->show();
    }

    public function new(): void
    {
        $newUserFormHtml = VIEW_PATH . "/forms/newUser.html";
        $file = fopen($newUserFormHtml, "r");
        echo fread($file, filesize($newUserFormHtml));
    }

    public function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();
        $this->render($allUsers);
    }

    private function render(array $allUsers): void
    {
        include VIEW_PATH . "/tables/users.html";
    }
}