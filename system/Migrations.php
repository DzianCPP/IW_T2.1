<?php

namespace system;
use core\application\Database;
use PDO;
use Exception;

class Migrations
{

    public function run(int $databaseVersion = -1): bool
    {
        $db = new Database();
        $conn = $db->getConnection();
        $migrations = require __DIR__ . "/../bootstrap/migrationsList.php";

        if ($databaseVersion > count($migrations)) {
            echo "No such version of the database.\n";
            return false;
        }
        if ($databaseVersion === -1) {
            $databaseVersion = count($migrations);
        }

        if (!$this->migrationHistoryExists($conn)) {
            $fullMigrationName = "database\migrations\\" . $migrations[0]['m0'];
            $migrationObject = new $fullMigrationName();
            if (!$migrationObject->up()) {
                return false;
            }
        }
        for ($i = 1; $i <= $databaseVersion; ++$i) {
            $completedMigrations = $this->getCompletedMigrations($conn);
            $migration = $migrations[$i];
            $migrationIndex = "m" . (string)$i;
            $migrationName = $migration[$migrationIndex];

            if ($migrationIndex === $completedMigrations[$i-1]['migrationIndex']) {
                continue;
            }
            $fullMigrationName = "database\migrations\\" . $migrationName;

            $migrationObject = new $fullMigrationName();
            if (!$migrationObject->up()) {
                return false;
            }
        }

            return true;
    }

    private function migrationHistoryExists(PDO &$conn): bool
    {
        $sqlQuery = "SELECT 1 FROM migrationHistory LIMIT 1";
        try {
            $result = $conn->query($sqlQuery);
        }
        catch (Exception $e) {
            return false;
        }

        if ($result !== false) {
            return true;
        }

        return false;
    }

    private function getCompletedMigrations(PDO &$conn): array
    {
        $sqlQuery = "SELECT * FROM migrationHistory";
        $query = $conn->prepare($sqlQuery);
        $query->execute();
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();
        return $result;
    }
}