<?php

namespace system;

class Migrations
{
    private array $completedMigrations = [];

    public function run(): void
    {
        $migrations = require "../bootstrap/migrations.php";

        for ($i = 0; $i <= array_count_values($this->completedMigrations); ++$i) {
            $migrationIndex = "m".$i;
            if (array_key_exists("m".(string)$i, $this->completedMigrations)) {
                continue;
            } else {
                $migrationName = $migrations[$migrationIndex];
                $ext = ".php";
                $migrationPath = MIGRATIONS_PATH . $migrationName . $ext;
                $migrationName->up();
                $this->completedMigrations[$migrationIndex] = $migrationIndex;
            }
        }
    }
}