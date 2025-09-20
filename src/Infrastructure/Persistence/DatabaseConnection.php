<?php
namespace App\Infrastructure\Persistence;

use PDO;

// DB接続
class DatabaseConnection {
    public static function create(): PDO {
        $host = 'localhost';
        $dbname = 'testdb';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO($dsn, $username, $password, $options);
    }
}
