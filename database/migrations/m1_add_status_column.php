<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m1_add_status_column
{
    public function up(): bool
    {
        $db = new Database;
        $conn = $db->getConnection();

        $sqlQuery = "ALTER TABLE usersTable ADD status varchar(10) NOT NULL";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->addThisMigrationToHistory($conn)) {
                return true;
            }
        }

        return false;
    }

    public function down(): bool
    {
        $db = new Database();
        $conn = $db->getConnection();

        $sqlQuery = "ALTER TABLE usersTable DROP status";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->removeThisMigrationFromHistory($conn)) {
                return true;
            }
        }

        return false;
    }

    private function addThisMigrationToHistory(PDO &$conn): bool
    {
        $sqlQuery = "INSERT INTO migrationHistory(migrationIndex, migrationName) VALUES ('m1', 'm1_add_status_column')";

        $query = $conn->prepare($sqlQuery);

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function removeThisMigrationFromHistory(PDO &$conn): bool
    {
        $sqlQuery = "DELETE FROM migrationHistory WHERE migrationIndex='m1'";
        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}