<?php

namespace core\application;

use core\models\UsersDatabaseModel;
use core\application\DotEnver;
use database\seeds\users\UserFactory;

class UsersSeeder
{
    public function run(int $count = 10): void
    {
        DotEnver::getDotEnv();
        $usersModel = new UsersDatabaseModel();
        $userFactory = new UserFactory();
        $usersToSeed = $userFactory->generateUsers($count);
        foreach ($usersToSeed as $user) {
            if (!$usersModel->seedUsers($user)) {
                echo "Error: UsersSeeder could not seed data";
            }
        }
    }
}
