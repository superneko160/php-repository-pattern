<?php
namespace App\Infrastructure\Persistence;

use App\Domain\Model\User;

// ユーザリポジトリインターフェース
interface UserRepositoryInterface {
    function findById(int $id): ?User;
    function findAll(): array;
}
