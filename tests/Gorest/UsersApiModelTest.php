<?php

declare(strict_types=1);

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use core\application\DotEnver;
use core\models\UsersApiModel;

class UsersApiModelTest extends TestCase
{
    private static $usersApiModel;

    public static function setUpBeforeClass(): void
    {
        require __DIR__ . "/../../bootstrap/base-paths.php";
        DotEnver::getDotEnv();
        self::$usersApiModel = new UsersApiModel();
    }
    
    public function testGetReturnsArray(): array
    {
        $actual = self::$usersApiModel->get();
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
        $user = $users[0];
        $user['name'] .= ' Jr.';
        $result = self::$usersApiModel->update($user);
        $this->assertSame(true, $result);
    }

    /** @depends testGetReturnsArray */
    public function testGetReturnsOneUser(array $users): array
    {
        $user = $users[0];
        $actual = self::$usersApiModel->get($user['id']);
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
        unset($user['id']);
        $user['name'] .= "";

        $result = self::$usersApiModel->create(json_encode($user));
        $this->assertSame(true, $result);
    }

    /** @depends testGetReturnsArray */
    public function testDeleteReturnsTrue(array $users): void
    {
        $ids = [];
        $i = 0;
        foreach ($users as $user) {
            $ids[] = $user['id'];
            $i++;
            if ($i > 5) {
                break;
            }
        }
        $actual = self::$usersApiModel->delete(...$ids);
        $this->assertSame(true, $actual);
    }

    public static function tearDownAfterClass(): void
    {
        self::$usersApiModel = null;
    }
}
