<?php
namespace Tests\Infrastructure\Persistence;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Persistence\MySQLUserRepository;
use App\Domain\Model\User;
use PDO;
use PDOStatement;

class MySQLUserRepositoryTest extends TestCase
{
    private $pdo;
    private $stmt;
    private $repository;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->repository = new MySQLUserRepository($this->pdo);
    }

    public function testFindById_UserFound(): void
    {
        $userData = [
            'id' => 1,
            'name' => 'test user',
            'role' => 1,
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ];

        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->with([1]);
        $this->stmt->method('fetch')->willReturn($userData);

        $user = $this->repository->findById(1);

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame($userData['id'], $user->getId());
    }

    public function testFindById_UserNotFound(): void
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->with([1]);
        $this->stmt->method('fetch')->willReturn(false);

        $user = $this->repository->findById(1);

        $this->assertNull($user);
    }

    public function testFindAll(): void
    {
        $usersData = [
            [
                'id' => 1,
                'name' => 'test user 1',
                'role' => 1,
                'created_at' => '2024-01-01 00:00:00',
                'updated_at' => '2024-01-01 00:00:00',
            ],
            [
                'id' => 2,
                'name' => 'test user 2',
                'role' => 1,
                'created_at' => '2024-01-02 00:00:00',
                'updated_at' => '2024-01-02 00:00:00',
            ],
        ];

        $this->pdo->method('query')->willReturn($this->stmt);
        $this->stmt->method('fetchAll')->willReturn($usersData);

        $users = $this->repository->findAll();

        $this->assertCount(2, $users);
        $this->assertInstanceOf(User::class, $users[0]);
        $this->assertSame($usersData[0]['id'], $users[0]->getId());
    }
}
