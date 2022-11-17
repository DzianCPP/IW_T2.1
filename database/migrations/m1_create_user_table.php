<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m1_create_user_table extends MigrationsBase
{
    public function up(): bool
    {
        $db = new Database;
        $conn = $db->getConnection();

        $sqlQuery = "CREATE TABLE usersTable(
                        userID int(20) NOT NULL AUTO_INCREMENT,
                        email varchar(255) NOT NULL,
                        fullName varchar(255) default NULL,
                        gender varchar(25) NOT NULL,
                        PRIMARY KEY(userID))";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->migrationHistoryHandler->addMigrationToHistory($conn, get_class($this))) {
                return true;
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
            if ($this->migrationHistoryHandler->removeMigrationFromHistory($conn, get_class($this))) {
                return true;
            }
        }

        return false;
    }
}