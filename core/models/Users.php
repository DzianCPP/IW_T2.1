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

    public function insertNewUser(): void
    {
        $email = $_POST['email'];
        $fullName = $_POST['name'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        $query = $this->conn->prepare("INSERT INTO usersTable(email, fullName, gender, status)
        VALUES ('$email', '$fullName', '$gender', '$status')");

        $query->execute();
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

    public function deleteDuplicates(): void
    {
        $query = $this->conn->prepare("DELETE FROM usersTable WHERE ")
    }
}