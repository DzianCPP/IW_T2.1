<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m2_add_status_column extends MigrationsBase
{
    public function up(): bool
    {
        $sqlQuery = "ALTER TABLE usersTable ADD status varchar(10) NOT NULL";

        $query = $this->conn->prepare($sqlQuery);

        if (!$this->trySqlQuery($query, $this->conn, get_class($this))) {
            return false;
        }

        return true;
    }

    public function down(): bool
    {
        $sqlQuery = "ALTER TABLE usersTable DROP status";

        $query = $this->conn->prepare($sqlQuery);
        if ($query->execute()) {
            if ($this->migrationHistoryHandler->removeMigrationFromHistory($this->conn, get_class($this))) {
                return true;
            }
        }

        return false;
    }
}