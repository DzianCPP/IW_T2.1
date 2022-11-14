<?php

namespace core\controllers;
use core\models\Users;

class UserController
{
    public function create(): void
    {
        $users = new Users();
        if ($users->insertNewUser()) {
            $this->show();
        } else {
            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $this->renderNewUserFormAgain($email, $fullName);
        }
    }

    public function new(): void
    {
        $newUserFormHtml = VIEW_PATH . "/forms/newUser.php";
        $file = fopen($newUserFormHtml, "r");
        echo fread($file, filesize($newUserFormHtml));
    }

    private function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();
        $this->renderAllUsers($allUsers);
    }

    private function renderAllUsers(array $allUsers): void
    {
        include VIEW_PATH . "/tables/users.html";
    }

    private function renderNewUserFormAgain($email, $fullName): void
    {
        include VIEW_PATH . "/forms/newUser.php";
    }
}