<?php

namespace database\seeds\users;

require "usersNames.php";

class UserFactory
{
    public function generateUsers(int $count): array
    {
        $i = 0;
        $users = [];
        while ($i < $count) {
            $users[] = [
                'email' => getRandomName() . '@gmail.com',
                'name' => getRandomFullName(),
                'gender' => 'male',
                'status' => 'active'
            ];
            ++$i;
        }
        return $users;
    }
}
