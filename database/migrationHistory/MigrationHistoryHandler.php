<?php

namespace database\migrationHistory;
use PDO;

class MigrationHistoryHandler
{
    public function addMigrationToHistory(PDO &$conn, string $className): bool
    {
        $migrationIndex = $this->getMigrationIndex($className);
        $sqlQuery = "INSERT INTO migrationHistory (migrationIndex, migrationName) VALUES $migrationIndex, $className)";

        if (!$this->executeQuery($conn, $sqlQuery)) {
            return false;
        }
        return true;
    }

    public function removeMigrationFromHistory(PDO &$conn, string $className): bool
    {
        $migrationIndex = $this->getMigrationIndex($className);
        $sqlQuery = "DELETE FROM migrationHistory WHERE migrationIndex=$migrationIndex";
        if (!$this->executeQuery($conn, $sqlQuery)) {
            return false;
        }

        return true;
    }

    private function getMigrationIndex(string $className): string
    {
        return substr($className, 0, strpos($className, "_", 0));
    }

    private function executeQuery(PDO &$conn, string $sqlQuery): bool
    {
        $query = $conn->prepare($sqlQuery);
        if (!$query->execute()) {
            return false;
        }
        return true;
    }
}