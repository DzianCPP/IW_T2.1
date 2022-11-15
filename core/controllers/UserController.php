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
            $fullName = $_POST['name'];
            $this->new($email, $fullName);
        }
    }

    public function new(string $email = '', string $fullName = ''): void
    {
        include VIEW_PATH . "/forms/newUser.html";
    }

    private function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();
        $this->renderAllUsers($allUsers);
    }

    public function editUser(): void
    {
        $users = new Users();
        $userID = $_GET['userID'];
        $userID = rtrim($userID, '}');
        $userID = ltrim($userID, '{');
        $userToEdit = $users->getUserById($userID);
        $currentEmail = $userToEdit['email'];
        $currentFullName = $userToEdit['fullName'];
        $currentGender = $userToEdit['gender'];
        $currentStatus = $userToEdit['status'];
        include VIEW_PATH . "/forms/editUser.html";
    }

    private function renderAllUsers(array $allUsers): void
    {
        include VIEW_PATH . "/tables/users.html";
    }
}