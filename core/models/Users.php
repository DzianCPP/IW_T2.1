<?php

namespace core\models;

use PDO;
use core\application\Database;

class Users
{
    private PDO $conn;
    private Database $database;

    public function __construct()
    {
        $this->database = new Database();
        $this->conn = $this->database->getConnection();
    }

    public function insertNewUser(): bool
    {
        $email = $_POST['email'];
        $fullName = $_POST['name'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        if (!$this->emailValid($email)) {
            return false;
        }

        if (!$this->nameValid($fullName)) {
            return false;
        }

        $query = $this->conn->prepare("INSERT INTO usersTable (email, fullName, gender, status)
                                                VALUES ('$email', '$fullName', '$gender', '$status')");

        $query->execute();
        return true;
    }

    public function getAllUsers(): array
    {
        $query = $this->conn->prepare("SELECT * FROM usersTable");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        return $result;
    }

    public function getUserbyId(int $id): array
    {
        $query = $this->conn->prepare("SELECT * FROM usersTable WHERE userID = $id");
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        return $result;
    }

    private function emailValid(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function nameValid(string $fullName): bool
    {
        $firstName = substr($fullName, 0, strpos($fullName, " ", 0));
        $lastName = ltrim(substr($fullName, strpos($fullName, " ", 0), strlen($fullName)));

        if (!preg_match("/^[a-z ,.'-]+$/i", $firstName) || !preg_match("/^[a-z ,.'-]+$/i", $lastName)) {
            return false;
        }
        return true;
    }
}