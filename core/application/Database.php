<?php

namespace core\application;
use PDO;

class Database
{
    private string $userName = 'root';
    private string $hostName = 'localhost';
    private string $password = 'pass';
    private string $databaseName = 'UsersDatabase'; //todo move all the credentials to a protected .env file
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

$DBConnection = new Database();
$conn = $DBConnection->getConnection();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn;

$query = $conn->prepare("SELECT * FROM usersTable");
$query->execute();

$fetchMode = $query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetchAll();

foreach ($result as $row) {
    echo $row['userID'] . "    " . $row['email'] . "    " . $row['fullName'] . "    " . $row['gender'] . "    " . $row['status'];
}

$conn = null;





