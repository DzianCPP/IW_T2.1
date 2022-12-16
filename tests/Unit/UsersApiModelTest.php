<?php

declare(strict_types=1);

namespace tests\Unit;

use PHPUnit\Framework\TestCase;

class UsersApiModelTest extends TestCase
{
    public function testGetReturnsArray(): array
    {
        require __DIR__ . "/../../bootstrap/base-paths.php";
        \core\application\DotEnver::getDotEnv();
        $usersApiModel = new \core\models\UsersApiModel();
        $actual = $usersApiModel->get();
        $this->assertIsArray($actual);
        return $actual;
    }

    /** @depends testGetReturnsArray */
    public function testUsersArrayHasRightKeys(array $users): void
    {
        foreach ($users as $user) {
            $this->assertArrayHasKey('name', $user);
            $this->assertArrayHasKey('email', $user);
            $this->assertArrayHasKey('gender', $user);
            $this->assertArrayHasKey('status', $user);
            $this->assertArrayHasKey('id', $user);
        }
    }

    /** @depends testGetReturnsArray */
    public function testUpdateReturnsTrue(array $users): void
    {
        $usersApiModel = new \core\models\UsersApiModel();
        $user = $users[0];
        $user['name'] .= ' Jr.';
        $result = $usersApiModel->update($user);
        $this->assertSame(true, $result);
    }

    /** @depends testGetReturnsArray */
    public function testGetReturnsOneUser(array $users): array
    {
        $usersApiModel = new \core\models\UsersApiModel();
        $user = $users[0];
        $actual = $usersApiModel->get($user['id']);
        $this->assertIsArray($actual);
        return $actual;
    }

    /** @depends testGetReturnsOneUser */
    public function testUserArrayHasRightKeys(array $user): void
    {
        $this->assertArrayHasKey('email', $user);
        $this->assertArrayHasKey('name', $user);
        $this->assertArrayHasKey('gender', $user);
        $this->assertArrayHasKey('status', $user);
        $this->assertArrayHasKey('id', $user);
    }

    /** @depends testGetReturnsOneUser */
    public function testCreateReturnsTrue(array $user): void
    {
        $usersApiModel = new \core\models\UsersApiModel();
        unset($user['id']);
        $user['name'] .= "";

        $result = $usersApiModel->create(json_encode($user));
        $this->assertSame(true, $result);
    }

    /** @depends testGetReturnsArray */
    public function testDeleteReturnsTrue(array $users): void
    {
        $usersApiModel = new \core\models\UsersApiModel();
        $ids = [];
        $i = 0;
        foreach ($users as $user) {
            $ids[] = $user['id'];
            $i++;
            if ($i > 5) {
                break;
            }
        }
        $actual = $usersApiModel->delete(...$ids);
        $this->assertSame(true, $actual);
    }
}
