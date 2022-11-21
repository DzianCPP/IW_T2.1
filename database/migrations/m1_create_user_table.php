<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m1_create_user_table extends MigrationsBase
{
    public function up(): bool
    {
        $sqlQuery = "CREATE TABLE usersTable(
                        userID int(20) NOT NULL AUTO_INCREMENT,
                        email varchar(255) NOT NULL,
                        fullName varchar(255) default NULL,
                        gender varchar(25) NOT NULL,
                        PRIMARY KEY(userID))";

        $query = $this->conn->prepare($sqlQuery);

        if (!$this->trySqlQuery($query, $this->conn, get_class($this))) {
            return false;
        }

        return true;
    }

    public function down(): bool
    {
        $sqlQuery = "DROP TABLE usersTable";

        $query = $this->conn->prepare($sqlQuery);

        try {
            $query->execute();
            $this->migrationHistoryHandler->removeMigrationFromHistory($this->conn, get_class($this));
        } catch (\PDOException $e) {
            return false;
        }

        return true;
    }
}