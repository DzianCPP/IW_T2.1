<?php

namespace core\controllers;

use core\application\Database;
use PDO;

class UserController
{
    public function create(): void
    {
        $db = new Database();
        $dbConn = $db->getConnection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];
        $fullName = $_POST['name'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        $query = $dbConn->prepare("INSERT INTO usersTable (email, fullName, gender, status)
        VALUES ('$email', '$fullName', '$gender', '$status')");

        $query->execute();

        $dbConn = null;
    }

    public function new(): void
    {
        $newUserFormHtml = VIEW_PATH . "newUserForm.html";
        $file = fopen($newUserFormHtml, "r");
        echo fread($file, filesize($newUserFormHtml));
    }
}