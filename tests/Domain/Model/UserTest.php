<?php
namespace Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\User;
use DateTime;

class UserTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $id = 1;
        $name = 'test user';
        $role = 1;
        $user = new User($id, $name, $role);

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame($id, $user->getId());
        $this->assertSame($name, $user->getName());
        $this->assertSame($role, $user->getRole());
        $this->assertInstanceOf(DateTime::class, $user->getCreatedAt());
        $this->assertInstanceOf(DateTime::class, $user->updatedAt());
    }
}
