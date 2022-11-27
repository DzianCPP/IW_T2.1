<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m2_add_status_column extends MigrationsBase
{
    public function up(): bool
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sqlQuery = "ALTER TABLE usersTable ADD status varchar(10) NOT NULL";

        $query = $conn->prepare($sqlQuery);

        if (!$this->trySqlQuery($query, $conn, get_class($this))) {
            return false;
        }

        return true;
    }

    public function down(): bool
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sqlQuery = "ALTER TABLE usersTable DROP status";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->migrationHistoryHandler->removeMigrationFromHistory($conn, get_class($this))) {
                return true;
            }
        }

        return false;
    }
}