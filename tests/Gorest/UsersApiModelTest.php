<?php

declare(strict_types=1);

namespace tests\Unit;

use core\GorestCurlBuilder;
use PHPUnit\Framework\TestCase;
use core\models\UsersApiModel;

class UsersApiModelTest extends TestCase
{
    private $usersApiModel;
    private $newUser;

    protected function setUp(): void
    {
        $this->usersApiModel = new UsersApiModel(new GorestCurlBuilder());
        $this->newUser = [
            'email' => 'eronplaze@gmail.com',
            'name' => 'Json Statham',
            'gender' => 'male',
            'status' => 'active'
        ];
    }

    protected function tearDown(): void
    {
        $this->usersApiModel = null;
    }

    public function testGetReturnsArray(): array
    {
        $actual = $this->usersApiModel->get();
        $this->assertIsArray($actual);
        return $actual;
    }

    public function testCreateReturnsTrue(): int
    {
        $result = $this->usersApiModel->create(json_encode($this->newUser));
        $this->assertSame(true, $result);
        return $this->usersApiModel->getCreatedUserId();
    }

    public function testCreateReturnsFalse(): void
    {
        $result = $this->usersApiModel->create(json_encode($this->newUser));
        $this->assertSame(false, $result);
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
        $actual = $this->usersApiModel->get((string)$users[0]['id']);
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
        $this->newUser['id'] = $id;
        $this->newUser['name'] .= " Stupid";
        $result = $this->usersApiModel->update($this->newUser);
        $this->assertSame(true, $result);
    }

    public function testUpdateReturnsFalse(): void
    {
        $this->newUser['id'] = 0;
        $this->newUser['name'] .= " Stupid";
        $result = $this->usersApiModel->update($this->newUser);
        $this->assertSame(false, $result);
    }

    /** @depends testCreateReturnsTrue */
    public function testDeleteReturnsTrue(int $id): void
    {
        $actual = $this->usersApiModel->delete($id);
        $this->assertSame(true, $actual);
    }

    public function testDeleteReturnsFalse(): void
    {
        $actual = $this->usersApiModel->delete(0);
        $this->assertSame(false, $actual);
    }
}
