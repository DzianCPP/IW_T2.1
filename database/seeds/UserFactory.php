<?php

require "names.php";

class UserFactory
{
    public function generateUsers(int $count): array
    {
        $i = 0;
        $users = [];
        while ($i < $count) {
            $users[] = [
                'email' => getRandomName() . '@gmail.com',
                'fullName' => getRandomFullName(),
                'gender' => 'male',
                'status' => 'active'
            ];
            ++$i;
        }
        return $users;
    }
}