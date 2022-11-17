<?php

namespace system;
use core\application\Database;
use PDO;
use Exception;

require "../vendor/autoload.php";

class Migrations
{

    public function run(): bool
    {
        $db = new Database();
        $conn = $db->getConnection();
        $migrations = require "../bootstrap/migrationsList.php";

        if (!$this->migrationHistoryExists($conn)) {
            $fullMigrationName = "database\migrations\\" . $migrations[0]['m0'];
            $migrationObject = new $fullMigrationName();
            if (!$migrationObject->up()) {
                return false;
            }
        }

        $completedMigrations = $this->getCompletedMigrations($conn);

        for ($i = 1; $i < count($migrations); ++$i) {
            $migration = $migrations[$i];
            $migrationIndex = "m" . (string)$i;
            $migrationName = $migration[$migrationIndex];

            if ($migrationIndex === $completedMigrations[$i]['migrationIndex']) {
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