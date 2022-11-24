<?php

namespace core\models;
use core\application\Database;
use PDO;

class Model
{
    protected PDO $conn;
    protected Database $database;
    protected Validator $validator;

    public function __construct()
    {
        $this->database = Database::getInstance();
        $this->validator = new Validator();
        $this->conn = $this->database->getConnection();
    }

    public function insert(array $params): bool
    {
        if (!$this->validator->userDataValid($params['email'], $params['fullName'])) {
            return false;
        }

        $sqlQuery = "INSERT INTO usersTable (email, fullName, gender, status)
                    VALUES ('${params['email']}', '${params['fullName']}', '${params['gender']}', '${params['status']}')";
        $query = $this->conn->prepare($sqlQuery);
        if (!$query->execute()) {
            return false;
        }

        return true;
    }

    public function selectAll(string $tableName): array
    {
        $sqlQuery = "SELECT * FROM $tableName";
        $query = $this->conn->prepare($sqlQuery);
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        return $result;
    }

    protected function getRecordBy(string $colName, $value, string $tableName): array
    {
        $sqlQuery = "SELECT * FROM ${tableName} WHERE ${colName}=${value}";
        $query = $this->conn->prepare($sqlQuery);
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        return $result;
    }

    protected function update(string $tableName, array $params): bool
    {
        $sqlQuery = "UPDATE ${tableName}
                     SET email='${params['email']}', fullName='${params['fullName']}', gender='${params['gender']}', status='${params['status']}'
                     WHERE userID='${params['userID']}'";
        $query = $this->conn->prepare($sqlQuery);
        if (!$query->execute()) {
            return false;
        }

        return true;
    }

    protected function delete(string $tableName, int $id): bool
    {
        $sqlQuery = "DELETE FROM ${tableName} WHERE userID=${id}";
        $query = $this->conn->prepare($sqlQuery);
        if (!$query->execute()) {
            return false;
        }

        return true;
    }
}