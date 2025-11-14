-- ============================================
-- SQL Manual untuk Calculus Project
-- Gunakan jika ingin setup manual tanpa migration
-- ============================================

-- 1. USERS TABLE
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `bmr` decimal(10,2) DEFAULT NULL,
  `role` enum('client') NOT NULL DEFAULT 'client',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. LIST_FOOD TABLE (Master Data)
CREATE TABLE `list_food` (
  `id_list_food` varchar(10) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_calories` decimal(10,2) NOT NULL,
  `cholesterol` decimal(10,2) NOT NULL,
  `fat` decimal(10,2) NOT NULL,
  `protein` decimal(10,2) NOT NULL,
  `carbohydrate` decimal(10,2) NOT NULL,
  `sodium` decimal(10,2) NOT NULL,
  `sugar` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_list_food`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. FOOD TABLE (Data Makanan yang Dikonsumsi)
CREATE TABLE `food` (
  `id_food` varchar(10) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_calories` decimal(10,2) NOT NULL,
  `cholesterol` decimal(10,2) NOT NULL,
  `fat` decimal(10,2) NOT NULL,
  `protein` decimal(10,2) NOT NULL,
  `carbohydrate` decimal(10,2) NOT NULL,
  `sodium` decimal(10,2) NOT NULL,
  `sugar` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_food`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. BREAKFAST TABLE
CREATE TABLE `breakfast` (
  `breakfast_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_food` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`breakfast_id`),
  KEY `breakfast_id_foreign` (`id`),
  KEY `breakfast_id_food_foreign` (`id_food`),
  CONSTRAINT `breakfast_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `breakfast_id_food_foreign` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. LUNCH TABLE
CREATE TABLE `lunch` (
  `lunch_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_food` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lunch_id`),
  KEY `lunch_id_foreign` (`id`),
  KEY `lunch_id_food_foreign` (`id_food`),
  CONSTRAINT `lunch_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lunch_id_food_foreign` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. DINNER TABLE
CREATE TABLE `dinner` (
  `dinner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_food` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dinner_id`),
  KEY `dinner_id_foreign` (`id`),
  KEY `dinner_id_food_foreign` (`id_food`),
  CONSTRAINT `dinner_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dinner_id_food_foreign` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. SNACK TABLE
CREATE TABLE `snack` (
  `snack_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_food` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`snack_id`),
  KEY `snack_id_foreign` (`id`),
  KEY `snack_id_food_foreign` (`id_food`),
  CONSTRAINT `snack_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `snack_id_food_foreign` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- SAMPLE DATA
-- ============================================

-- Insert Sample Users
INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `sex`, `date_of_birth`, `profile_pic`, `height`, `weight`, `bmr`, `role`, `created_at`, `updated_at`) VALUES
(1, 'johndoe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John Doe', 'Laki-laki', '1990-01-15', 'avatar.png', 170.00, 70.00, 1680.50, 'client', NOW(), NOW()),
(2, 'janedoe', 'jane@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jane Doe', 'Perempuan', '1995-05-20', 'avatar.png', 160.00, 55.00, 1390.00, 'client', NOW(), NOW()),
(3, 'admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'Laki-laki', '1985-12-10', 'avatar.png', 175.00, 80.00, 1850.00, 'client', NOW(), NOW());

-- Note: Password di atas adalah hash untuk "password123"
-- Untuk admin123: $2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm

-- Insert Sample List Food (contoh beberapa makanan)
INSERT INTO `list_food` (`id_list_food`, `food_name`, `food_calories`, `cholesterol`, `fat`, `protein`, `carbohydrate`, `sodium`, `sugar`, `weight`, `created_at`, `updated_at`) VALUES
('ABC1234567', 'Nasi Putih', 130.00, 0.00, 0.28, 2.69, 28.17, 1.00, 0.05, 100.00, NOW(), NOW()),
('DEF1234567', 'Ayam Goreng', 246.00, 84.00, 15.30, 24.70, 0.00, 70.00, 0.00, 100.00, NOW(), NOW()),
('GHI1234567', 'Telur Rebus', 155.00, 373.00, 10.60, 12.60, 1.10, 124.00, 1.10, 100.00, NOW(), NOW()),
('JKL1234567', 'Tempe Goreng', 193.00, 0.00, 10.80, 20.80, 7.50, 9.00, 1.70, 100.00, NOW(), NOW()),
('MNO1234567', 'Tahu Goreng', 271.00, 0.00, 20.70, 17.20, 5.30, 11.00, 0.60, 100.00, NOW(), NOW());

-- ============================================
-- USEFUL QUERIES
-- ============================================

-- Cek total kalori user hari ini
SELECT
    u.name,
    SUM(f.food_calories) as total_calories
FROM users u
LEFT JOIN (
    SELECT id, id_food, date FROM breakfast
    UNION ALL
    SELECT id, id_food, date FROM lunch
    UNION ALL
    SELECT id, id_food, date FROM dinner
    UNION ALL
    SELECT id, id_food, date FROM snack
) meals ON u.id = meals.id
LEFT JOIN food f ON meals.id_food = f.id_food
WHERE DATE(meals.date) = CURDATE()
GROUP BY u.id, u.name;

-- Cek makanan yang dimakan user hari ini
SELECT
    u.name,
    f.food_name,
    f.food_calories,
    f.weight,
    'breakfast' as meal_type
FROM breakfast b
JOIN users u ON b.id = u.id
JOIN food f ON b.id_food = f.id_food
WHERE DATE(b.date) = CURDATE()
UNION ALL
SELECT
    u.name,
    f.food_name,
    f.food_calories,
    f.weight,
    'lunch' as meal_type
FROM lunch l
JOIN users u ON l.id = u.id
JOIN food f ON l.id_food = f.id_food
WHERE DATE(l.date) = CURDATE()
ORDER BY name, meal_type;

-- Cek BMR vs Kalori Konsumsi
SELECT
    u.name,
    u.bmr,
    IFNULL(SUM(f.food_calories), 0) as consumed_calories,
    u.bmr - IFNULL(SUM(f.food_calories), 0) as calorie_deficit
FROM users u
LEFT JOIN (
    SELECT id, id_food, date FROM breakfast
    UNION ALL
    SELECT id, id_food, date FROM lunch
    UNION ALL
    SELECT id, id_food, date FROM dinner
    UNION ALL
    SELECT id, id_food, date FROM snack
) meals ON u.id = meals.id
LEFT JOIN food f ON meals.id_food = f.id_food
WHERE DATE(meals.date) = CURDATE() OR meals.date IS NULL
GROUP BY u.id, u.name, u.bmr;
