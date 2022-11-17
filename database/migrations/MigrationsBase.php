<?php

namespace database\migrations;
use database\migrationHistory\MigrationHistoryHandler;

abstract class MigrationsBase
{
    protected MigrationHistoryHandler $migrationHistoryHandler;

    public function __construct()
    {
        $this->migrationHistoryHandler = new MigrationHistoryHandler();
    }
}