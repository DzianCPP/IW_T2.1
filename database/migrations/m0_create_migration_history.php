<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m0_create_migration_history extends MigrationsBase
{
    public function up(): bool
    {
        $sqlQuery = "CREATE TABLE migrationHistory(
                     migrationID int(10) NOT NULL AUTO_INCREMENT,
                     migrationIndex varchar(10) NOT NULL,
                     migrationName varchar(100) NOT NULL,
                     PRIMARY KEY (migrationID))";

        $query = $this->conn->prepare($sqlQuery);

        if (!$this->trySqlQuery($query, $this->conn, get_class($this))) {
            return false;
        }

        return true;
    }

    public function down(): bool
    {
        $sqlQuery = "DROP TABLE migrationHistory";

        $query = $this->conn->prepare($sqlQuery);

        try {
            $query->execute();
        } catch (\PDOException $e) {
            return false;
        }

        return true;
    }
}