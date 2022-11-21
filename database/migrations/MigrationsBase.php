<?php

namespace database\migrations;
use core\application\Database;
use database\migrationHistory\MigrationHistoryHandler;
use PDO;

abstract class MigrationsBase
{
    protected MigrationHistoryHandler $migrationHistoryHandler;
    protected Database $db;
    protected PDO $conn;

    public function __construct()
    {
        $this->migrationHistoryHandler = new MigrationHistoryHandler();
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }

    protected function trySqlQuery(\PDOStatement $query, PDO &$conn, string $className): bool
    {
        try {
            $query->execute();
            $this->migrationHistoryHandler->addMigrationToHistory($conn, $className);
        } catch (\PDOException $e) {
            return false;
        }

        return true;
    }

    abstract public function up(): bool;
    abstract public function down(): bool;
}