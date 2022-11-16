<?php

namespace database\migrations;

require "../../vendor/autoload.php";

use core\application\Database;
use PDO;

class m0001_create_user_table
{
    public function up(): bool
    {
        $db = new Database;
        $conn = $db->getConnection();

        $sqlQuery = "CREATE TABLE usersTable(
                        userID int(20) NOT NULL AUTO_INCREMENT,
                        email varchar(255) NOT NULL,
                        fullName varchar(255) default NULL,
                        gender varchar(25) NOT NULL,
                        status varchar(25) NOT NULL,
                        PRIMARY KEY(userID))";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            return true;
        }

        return false;
    }

    public function down(): bool
    {
        $db = new Database();
        $conn = $db->getConnection();

        $sqlQuery = "DROP TABLE usersTable";

        $query = $conn->prepare($sqlQuery);
        if ($query->execute()) {
            return true;
        }

        return false;
    }

}