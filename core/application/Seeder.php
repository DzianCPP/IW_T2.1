<?php
namespace core\application;
use core\models\Users;

class Seeder
{
    private array $testData;
    private Users $users;

    public function __construct()
    {
        $this->testData = require "testData.php";
        $this->users = new Users();
    }

    public function run(): bool
    {
        if ($this->tableEmpty()) {
            foreach ($this->testData as $user)
            {
                $this->users->seedData($user);
            }

            return true;
        }

        return false;
    }

    private function tableEmpty(): bool
    {
        $result = $this->users->tableEmpty();

        if ($result) {
            return true;
        }

        return false;
    }
}