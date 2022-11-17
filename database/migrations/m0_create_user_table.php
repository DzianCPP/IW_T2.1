<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m0_create_user_table
{
    public function up(): bool
    {
        $db = new Database;
        $conn = $db->getConnection();

        $sqlQuery = "CREATE TABLE IF NOT EXISTS usersTable(
                        userID int(20) NOT NULL AUTO_INCREMENT,
                        email varchar(255) NOT NULL,
                        fullName varchar(255) default NULL,
                        gender varchar(25) NOT NULL,
                        PRIMARY KEY(userID))";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->createMigrationHistoryTable($conn)) {
                if ($this->addThisMigrationToHistory($conn)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function down(): bool
    {
        $db = new Database();
        $conn = $db->getConnection();

        $sqlQuery = "DROP TABLE usersTable";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->removeThisMigrationFromHistory($conn)) {
                if ($this->dropMigrationHistoryTable($conn)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function addThisMigrationToHistory(PDO &$conn): bool
    {
        $sqlQuery = "INSERT INTO migrationHistory(migrationIndex, migrationName) VALUES ('m0', 'm0_create_users_table')";

        $query = $conn->prepare($sqlQuery);

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function removeThisMigrationFromHistory(PDO &$conn): bool
    {
        $sqlQuery = "DELETE FROM migrationHistory WHERE migrationIndex='m0'";
        $query = $conn->prepare($sqlQuery);
        if($query->execute()) {
            return true;
        }
        return false;
    }

    private function createMigrationHistoryTable(PDO &$conn): bool
    {
        $sqlQuery = "CREATE TABLE IF NOT EXISTS migrationHistory(
                            migrationID int(20) NOT NULL AUTO_INCREMENT,
                            migrationIndex varchar(10) NOT NULL,
                            migrationName varchar(100) NOT NULL,
                            PRIMARY KEY(migrationID))";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            return true;
        }

        return false;
    }

    private function dropMigrationHistoryTable(PDO &$conn): bool
    {
        $sqlQuery = "DROP TABLE migrationHistory";
        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}