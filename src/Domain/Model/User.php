<?php
namespace App\Domain\Model;

use DateTime;

// Userエンティティ（データモデル）
class User {
    private int $id;
    private string $name;
    private int $role;
    private ?DateTime $createdAt;
    private ?DateTime $updatedAt;

    public function __construct(
        int $id,
        string $name,
        int $role,
        DateTime $createdAt = null,
        DateTime $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt ?? new DateTime();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRole(): int {
        return $this->role;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    public function updatedAt(): DateTime {
        return $this->updatedAt;
    }
}
