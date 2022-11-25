<?php

namespace core\application;
use core\models\Users;
use database\seeds\users\UserFactory;

class UsersSeeder
{
    public function run(int $count = 10): void
    {
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