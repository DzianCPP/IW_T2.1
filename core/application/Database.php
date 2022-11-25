<?php

namespace core\application;
use Exception;
use PDO;
use Dotenv\Dotenv;

class Database
{
    private PDO $connection;

    public function __construct()
    {
        try {
            $env = DotEnver::getDotEnv();
        } catch (Exception $e) {
            echo "Internal server error";
            http_response_code(400);
            return;
        }

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




