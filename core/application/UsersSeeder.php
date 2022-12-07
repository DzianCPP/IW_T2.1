<?php

namespace core\application;

use core\models\Users;
use core\application\DotEnver;
use database\seeds\users\UserFactory;

class UsersSeeder
{
    public function run(int $count = 10): void
    {
        DotEnver::getDotEnv();
        $users = new Users();
        $userFactory = new UserFactory();
        $usersToSeed = $userFactory->generateUsers($count);
        foreach ($usersToSeed as $user) {
            if (!$users->seedUsers($user)) {
                echo "Error: UsersSeeder could not seed data";
            }
        }
    }
}
