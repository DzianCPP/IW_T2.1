<?php

namespace core\application;
use PDO;
use Dotenv\Dotenv;

class Database
{
    private PDO $connection;

    public function __construct()
    {
        $env = $this->getDotEnv();
        $dbHostName = $env['DB_HOST_NAME'];
        $dbPassword = $env['DB_PASSWORD'];
        $dbUserName = $env['DB_USER_NAME'];
        $dbName = $env['DB_NAME'];
        $dsn = "mysql:host=".$dbHostName.";dbname=".$dbName;

        $this->connection = new PDO($dsn, $dbUserName, $dbPassword);
    }

    public function &getConnection(): PDO
    {
        return $this->connection;
    }

    private function getDotEnv(): array
    {
        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->safeLoad();
        return $_ENV;
    }
}




