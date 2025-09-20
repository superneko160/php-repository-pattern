<?php
namespace App\Application\Service;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Model\User;

// ユーザサービスクラス（ビジネスロジック）
class UserService {
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $UserRepository) {
        $this->userRepository = $UserRepository;
    }

    public function getUserById(int $id): ?User {
        return $this->userRepository->findById($id);
    }

    public function getAllUsers(): array {
        return $this->userRepository->findAll();
    }
}
