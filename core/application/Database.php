<?php

namespace core\application;
use PDO;

class Database
{
    private PDO $connection;

    public function __construct()
    {
        $env = DotEnver::getDotEnv();

        if ($env) {

            $dbHostName = $env['DB_HOST_NAME'];
            $dbPassword = $env['DB_PASSWORD'];
            $dbUserName = $env['DB_USER_NAME'];
            $dbName = $env['DB_NAME'];
            $dsn = "mysql:host=" . $dbHostName . ";dbname=" . $dbName;

            $this->connection = new PDO($dsn, $dbUserName, $dbPassword);
        }
    }

    public function &getConnection(): PDO
    {
        return $this->connection;
    }
}




