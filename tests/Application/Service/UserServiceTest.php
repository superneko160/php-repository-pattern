<?php
namespace Tests\Application\Service;

use PHPUnit\Framework\TestCase;
use App\Application\Service\UserService;
use App\Domain\Model\User;
use App\Infrastructure\Persistence\UserRepositoryInterface;

class UserServiceTest extends TestCase
{
    private $userRepository;
    private $userService;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->userService = new UserService($this->userRepository);
    }

    public function testGetUserById(): void
    {
        $user = new User(1, 'test user', 1);
        $this->userRepository->method('findById')
            ->with(1)
            ->willReturn($user);

        $result = $this->userService->getUserById(1);

        $this->assertSame($user, $result);
    }

    public function testGetAllUsers(): void
    {
        $users = [
            new User(1, 'test user 1', 1),
            new User(2, 'test user 2', 1),
        ];
        $this->userRepository->method('findAll')
            ->willReturn($users);

        $result = $this->userService->getAllUsers();

        $this->assertSame($users, $result);
    }
}
