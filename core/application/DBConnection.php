<?php

namespace core\application;
use PDO;

class DBConnection
{
    private string $userName = 'root';
    private string $hostName = 'localhost';
    private string $password = '';
    private string $databaseName = 'UsersDatabase'; //todo mode all the credentials to a protected env file
    private PDO $connection;

    public function __construct()
    {
        $dsn = "mysql:host=$this->hostName;dbname=$this->databaseName";
        $this->connection = new PDO(
            $dsn,
            $this->userName,
            $this->password);
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}



