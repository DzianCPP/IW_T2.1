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
        $newUserFormHtml = VIEW_PATH . "newUserForm.html";
        $file = fopen($newUserFormHtml, "r");
        echo fread($file, filesize($newUserFormHtml));
    }

    public function show(): void
    {
        $users = new Users();
        $allUsers = $users->getAllUsers();

        $allUsersTableHtml = VIEW_PATH . "usersTable.html";
        $file = fopen($allUsersTableHtml, "r");
        echo fread($file, filesize($allUsersTableHtml));

        foreach ($allUsers as $user) {
            echo "<tr>" .
                "<td>" . $user['userID'] . "</td>" .
                "<td>" . $user['email'] . "</td>" .
                "<td>" . $user['fullName'] . "</td>" .
                "<td>" . $user['gender'] . "</td>" .
                "<td>" . $user['status'] . "</td>" .
                "</tr>";
        }
    }
}