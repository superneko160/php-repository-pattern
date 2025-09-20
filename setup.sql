-- DB作成
CREATE DATABASE `testdb` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- DB選択
USE `testdb`;

-- テーブル作成
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` tinyint(8) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ダミーデータ挿入
INSERT INTO `users` (`id`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Alice', 1, '2025-06-28 23:57:09', '2025-06-28 23:57:09'),
(2, 'Bob', 1, '2025-06-29 00:32:07', '2025-06-29 00:32:07'),
(3, 'Eve', 2, '2025-06-29 00:34:39', '2025-06-29 00:34:39'),
(4, 'Jhon', 1, '2025-07-29 13:43:42', '2025-08-31 17:55:52');
