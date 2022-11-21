<?php

namespace core\application;
use PDO;

class Database
{
    private PDO $connection;
    private array $env = [];
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
        $this->env = DotEnver::getDotEnv();
        $dbHostName = $this->env['DB_HOST_NAME'];
        $dbPassword = $this->env['DB_PASSWORD'];
        $dbUserName = $this->env['DB_USER_NAME'];
        $dbName = $this->env['DB_NAME'];
        $dsn = "mysql:host=".$dbHostName.";dbname=".$dbName;

        $this->connection = new PDO($dsn, $dbUserName, $dbPassword);
    }

    public function &getConnection(): PDO
    {
        return $this->connection;
    }
}




