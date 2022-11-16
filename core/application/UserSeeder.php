<?php

namespace core\application;
use core\models\Users;

class UserSeeder
{
    private Users $users;

    public function run()
    {
        $this->users = new Users();
        $users = require "../../database/seeds/UserFactory.php";
        foreach ($users as $user) {
            $this->users->seedData($user);
        }
    }

}