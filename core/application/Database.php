<?php

namespace core\application;
use PDO;

class Database
{
    private PDO $connection;
    private static $instance = null;

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $env = DotEnver::getDotEnv();
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
}