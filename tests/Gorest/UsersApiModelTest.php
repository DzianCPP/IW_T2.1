<?php

declare(strict_types=1);

namespace tests\Unit;

use core\GorestCurlBuilder;
use PHPUnit\Framework\TestCase;
use core\models\UsersApiModel;

class UsersApiModelTest extends TestCase
{
    private static $usersApiModel;
    private static $newUser;

    protected function setUp(): void
    {
        self::$usersApiModel = new UsersApiModel(new GorestCurlBuilder());
        self::$newUser = [
            'email' => 'eronplaze@gmail.com',
            'name' => 'Json Statham',
            'gender' => 'male',
            'status' => 'active'
        ];
    }

    protected function tearDown(): void
    {
        self::$usersApiModel = null;
    }

    public function testGetReturnsArray(): array
    {
        $actual = self::$usersApiModel->get();
        $this->assertIsArray($actual);
        return $actual;
    }

    public function testCreateReturnsTrue(): int
    {
        $result = self::$usersApiModel->create(json_encode(self::$newUser));
        $this->assertSame(true, $result);
        return self::$usersApiModel->getCreatedUserId();
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
    public function testGetReturnsOneUser(array $users): array
    {
        $actual = self::$usersApiModel->get((string)$users[0]['id']);
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

    /** @depends testCreateReturnsTrue */
    public function testUpdateReturnsTrue(int $id): void
    {
        self::$newUser['id'] = $id;
        self::$newUser['name'] .= " Stupid";
        $result = self::$usersApiModel->update(self::$newUser);
        $this->assertSame(true, $result);
    }

    /** @depends testCreateReturnsTrue */
    public function testDeleteReturnsTrue(int $id): void
    {
        $actual = self::$usersApiModel->delete($id);
        $this->assertSame(true, $actual);
    }
}
