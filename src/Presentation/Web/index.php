<?php
namespace App\Presentation\Web;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Infrastructure\Persistence\DatabaseConnection;
use App\Infrastructure\Persistence\MySQLUserRepository;
use App\Application\Service\UserService;

// Webというディレクトリ名にしたが場合によってはApi
try {
    $db = DatabaseConnection::create();
    $userRepository = new MySQLUserRepository($db);
    $userService = new UserService($userRepository);

    $allUsers = $userService->getAllUsers();

    foreach ($allUsers as $user) {
        $createdAt = $user->getCreatedAt();
        $createdAtStr = $createdAt->format('Y/m/d H:i:s');
        echo "{$user->getId()} {$user->getName()} ({$createdAtStr})\n";
    }
} catch (Exception $e) {
    throw new Exception($e->getMessage());
}
