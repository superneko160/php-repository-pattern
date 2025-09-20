<?php
namespace App\Infrastructure\Persistence;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Model\User;
use DateTime;
use PDO;

// MySQL実装のリポジトリ
class MySQLUserRepository implements UserRepositoryInterface {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findById(int $id): ?User {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->mapRowToUser($row);
    }

    public function findAll(): array {
        $stmt = $this->db->query('SELECT * FROM users ORDER BY created_at');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($rows as $row) {
            $users[] = $this->mapRowToUser($row);
        }

        return $users;
    }

    // 配列からUserオブジェクトにマッピングするためのヘルパーメソッド
    private function mapRowToUser(array $row): User {
        return new User(
            (int)$row['id'],
            $row['name'],
            $row['role'],
            new DateTime($row['created_at']),
            new DateTime($row['updated_at']),
        );
    }
}
