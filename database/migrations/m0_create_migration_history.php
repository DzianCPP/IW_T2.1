<?php

namespace database\migrations;

use core\application\Database;
use PDO;

class m0_create_migration_history extends MigrationsBase
{
    public function up(): bool
    {
        $db = new Database;
        $conn = $db->getConnection();

        $sqlQuery = "CREATE TABLE migrationHistory(
                     migrationID int(10) NOT NULL AUTO_INCREMENT,
                     migrationIndex varchar(10) NOT NULL,
                     migrationName varchar(100) NOT NULL,
                     PRIMARY KEY (migrationID))";

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

        $sqlQuery = "DROP TABLE migrationHistory";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
                return true;
        }

        return false;
    }
}