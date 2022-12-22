<?php

namespace core\models;

use core\application\Database;
use PDO;

class DatabaseSqlBuilder
{
    protected PDO $conn;
    protected Database $database;
    protected Validator $validator;

    public function __construct()
    {
        $this->database = Database::getInstance();
        $this->conn = $this->database->getConnection();
    }

    public function insert(array $recordInfo, array $fields, string $tableName): bool
    {
        $tableFields = $this->getTableFields($fields);
        $values = $this->getValues($recordInfo);
        $sqlQuery = "INSERT INTO ${tableName} (${tableFields})
                    VALUES (${values})";
        $query = $this->conn->prepare($sqlQuery);
        if (!$query->execute()) {
            return false;
        }

        return true;
    }

    public function select(string $tableName, string $column = "", int|string $value = NULL): array
    {
        $sqlQuery = "SELECT * FROM $tableName";
        if ($column != "") {
            $field = $column;
            $sqlQuery .= " WHERE ${field}=${value}";
        }

        $sqlQuery .= " LIMIT 1000";
        $query = $this->conn->prepare($sqlQuery);
        $query->execute();

        return $query->fetchAll();
    }

    public function update(string $tableName, array $fields, array $recordInfo, $column): bool
    {
        $sets = $this->getSets($fields);
        $sqlQuery = "UPDATE ${tableName}
            SET ${sets}
            WHERE ${column}={$recordInfo[$column]}
        ";
        $query = $this->conn->prepare($sqlQuery);

        if (!$query->execute($recordInfo)) {
            return false;
        }

        return true;
    }

    public function delete(string $column = "", string $tableName = "", array $values): bool
    {
        $values = implode(", ", $values);
        $column = $column;
        $sqlQuery = "DELETE FROM ${tableName} WHERE ${column} = (${values})";
        $query = $this->conn->prepare($sqlQuery);
        if (!$query->execute()) {
            return false;
        }

        return true;
    }

    private function getTableFields(array $fields): string
    {
        return implode(", ", $fields);
    }

    private function getValues(array $params): string
    {
        foreach ($params as &$param) {
            $param = "'" . $param . "'";
        }

        return implode(",", $params);
    }

    private function getSets(array $fields): string
    {
        foreach ($fields as &$field) {
            $field = $field . "=:" . $field;
        }

        return implode(",", $fields);
    }
}
