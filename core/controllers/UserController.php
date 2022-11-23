<?php

namespace core\controllers;
use core\models\Users;
use function MongoDB\BSON\fromJSON;

class UserController extends BaseController
{
    public function create(): void
    {
        $this->setModel();
        if ($this->users->insertNewUser()) {
            $this->show();
        } else {
            $email = $_POST['email'];
            $fullName = $_POST['name'];
            $this->new($email, $fullName);
        }
    }

    public function new(string $email = '', string $fullName = ''): void
    {
        $this->setView(VIEW_PATH);
        $data = array(
            "email" => $email,
            "fullName" => $fullName
        );

        $this->view->render("new", $data);
    }

    public function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();
        $this->setView(VIEW_PATH);
        $this->view->render("users", array("allUsers" => $allUsers));
    }

    public function showById(): void
    {
        $users = new Users();
        $userID = $_GET['userID'];
        $userID = ltrim(rtrim($userID, '}'), '{');
        $user = $users->getUserById($userID);
        $this->setView(VIEW_PATH);
        $this->view->render("users", array("allUsers" => $user));
    }

    public function editUser(): void
    {
        $users = new Users();
        $this->setView(VIEW_PATH);
        $userID = $_GET['userID'];
        $userID = rtrim($userID, '}');
        $userID = ltrim($userID, '{');
        $userToEdit = $users->getUserById($userID);
        $this->view->render("edit", array("userToEdit" => $userToEdit));
    }

    public function update(): void
    {
        $jsonString = file_get_contents("php://input");
        $newUserInfo = json_decode($jsonString, true);
        $users = new Users();
        if ($users->editUser($newUserInfo)) {
            http_response_code(200);
            $this->show();
        }
    }

    public function delete(): void
    {
        $jsonString = file_get_contents("php://input");
        $id = json_decode($jsonString, true);
        $id = $id['userID'];
        $id = ltrim($id, "\"");
        $id = rtrim($id, "\"");
        $users = new Users();
        if ($users->delete($id)) {
            http_response_code(200);
        }
    }
}