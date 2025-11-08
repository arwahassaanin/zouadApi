-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 نوفمبر 2025 الساعة 13:23
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zouad`
--

-- --------------------------------------------------------

--
-- بنية الجدول `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `condition` enum('جديد','مستعمل') NOT NULL DEFAULT 'جديد',
  `status` enum('متوفر','غير متوفر') NOT NULL DEFAULT 'متوفر',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `books`
--

INSERT INTO `books` (`id`, `user_id`, `faculty_id`, `title`, `author`, `image`, `cover_image`, `condition`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'تصميم', 'تصميم', '', NULL, 'جديد', 'متوفر', NULL, NULL),
(2, 2, 2, 'علم التشريح', NULL, '/storage/books/QUGBHbW1zfih8Se6w4was0PuO9ncIpg3FppjGqCf.jpg', NULL, 'مستعمل', 'غير متوفر', '2025-10-09 06:04:28', '2025-10-09 06:04:28'),
(3, 2, 2, 'علم الادوية', NULL, '/storage/books/yMxxLYCdR8E4E2snECPsvD8X2Mv5H5zeZiW3QfmA.jpg', NULL, 'مستعمل', 'غير متوفر', '2025-10-09 06:15:36', '2025-10-09 06:15:36');

-- --------------------------------------------------------

--
-- بنية الجدول `borrows`
--

CREATE TABLE `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `borrower_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `borrowed_at` date NOT NULL,
  `returned_at` date DEFAULT NULL,
  `status` enum('pending','accepted','rejected','returned') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الهندسة ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(2, 'الطب', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(3, ' الصيدلة', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(4, 'العلوم الصحية ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(5, 'الشريعة والدراسات الاسلامية ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(6, ' العلوم الإجتماعية', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(7, 'التجارة ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(8, 'المحاسبة ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(9, ' تكنولوجيا المعلومات ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(10, 'التربية ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(11, ' الآداب', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(12, 'الحقوق ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(13, ' الاقتصاد والعلوم الإدارية', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(14, ' العلوم المالية والإدارية ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(15, 'الفنون الجميلة  ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(16, 'العلوم التطبيقية ', '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(17, ' إدارة الأعمال', '2025-10-09 05:05:36', '2025-10-09 05:05:36');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(53, '0001_01_01_000001_create_cache_table', 1),
(54, '0001_01_01_000002_create_jobs_table', 1),
(55, '2025_07_23_091934_create_personal_access_tokens_table', 1),
(56, '2025_07_27_070935_create_users_table', 1),
(57, '2025_07_28_080547_create_faculties_table', 1),
(58, '2025_07_29_082024_create_books_table', 1),
(59, '2025_07_30_084759_create_reviews_table', 1),
(60, '2025_08_12_074641_create_reports_table', 1),
(61, '2025_08_12_084420_create_profiles_table', 1),
(62, '2025_08_16_094702_create_password_resets_table', 1),
(63, '2025_08_24_075947_create_borrows_table', 1),
(64, '2025_09_07_120935_update_books_condition_and_status_columns', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '2265da30c7033763c472abc350f63cadd0651b1854138887c0f58dcc33ccfebc', '[\"*\"]', NULL, NULL, '2025-10-09 05:32:18', '2025-10-09 05:32:18'),
(2, 'App\\Models\\User', 2, 'auth_token', 'ce55bf17274f8a42e715d517c1d1357f82af5c08b3bd44b2a9c39ee47fe6d10f', '[\"*\"]', NULL, NULL, '2025-10-09 05:33:06', '2025-10-09 05:33:06'),
(3, 'App\\Models\\User', 2, 'auth_token', '02590de4bb8d885f4b1507d1828bb13d5b5d5215157226e1af6250293b7b4448', '[\"*\"]', NULL, NULL, '2025-10-09 05:34:51', '2025-10-09 05:34:51'),
(4, 'App\\Models\\User', 3, 'auth_token', '937d7486e5b8ffa5721fd2d12e3eadeaf8746f574ac28c23508c2c94ff44819f', '[\"*\"]', NULL, NULL, '2025-10-09 05:35:46', '2025-10-09 05:35:46'),
(5, 'App\\Models\\User', 2, 'auth_token', '1296ad1f449db6c5dc50bb8ec40c1e1c7e1ffc001963e7c5a514d47586cf7501', '[\"*\"]', '2025-10-09 06:28:18', NULL, '2025-10-09 06:03:38', '2025-10-09 06:28:18'),
(6, 'App\\Models\\User', 1, 'auth_token', 'fee9b9fa756f965dca0f8d3aae8d32c67e0ab224c3ab209c5aa8f6867b8348b8', '[\"*\"]', NULL, NULL, '2025-10-19 18:20:07', '2025-10-19 18:20:07'),
(7, 'App\\Models\\User', 5, 'auth_token', '59a586e240c53f9a47ace3739b5032d85d29c2d56ba17f431f25960752674964', '[\"*\"]', NULL, NULL, '2025-10-19 18:37:32', '2025-10-19 18:37:32'),
(8, 'App\\Models\\User', 6, 'auth_token', 'd823d732ce24bfa5530dee5004cbe62014c3b7b01b83532d4e8ec2cac44bd65a', '[\"*\"]', '2025-10-19 19:10:29', NULL, '2025-10-19 18:58:18', '2025-10-19 19:10:29'),
(9, 'App\\Models\\User', 7, 'auth_token', '808bc6481bbdbcf25a17a31222c1324472692cbc1bc9f121ca31025f3778451c', '[\"*\"]', NULL, NULL, '2025-11-03 07:48:13', '2025-11-03 07:48:13'),
(10, 'App\\Models\\User', 8, 'auth_token', '3d635f53a5c6f00d10fe4573a24c8f0f51a1fa3963443cb76868dc8a5a7269b1', '[\"*\"]', NULL, NULL, '2025-11-03 08:25:04', '2025-11-03 08:25:04'),
(11, 'App\\Models\\User', 9, 'auth_token', '7485c8d0ead151b878a082a2001d32da685c503b6c0e72600f6dda669ac3912d', '[\"*\"]', NULL, NULL, '2025-11-03 08:27:32', '2025-11-03 08:27:32'),
(12, 'App\\Models\\User', 10, 'auth_token', '39a1b81cfd1a35729d25add3e57ab4fc880e269fa9cd8688ce01d4f61ec6b425', '[\"*\"]', NULL, NULL, '2025-11-04 08:53:26', '2025-11-04 08:53:26');

-- --------------------------------------------------------

--
-- بنية الجدول `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `reportable_type` varchar(255) NOT NULL,
  `reportable_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('open','in_progress','resolved','closed') NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pyrnVTernZy9P1qRGNiNRPjv5YS8ZoB3dWoZSEH5', NULL, '127.0.0.1', 'WhatsApp/2.2542.2 W', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUVIdzlRSEdyTzd3SGxOaDd6OTNpT2FUQ29DYWlVWHVRanQ4cWJJeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9mOGRlZDY5NzgyNzEubmdyb2stZnJlZS5hcHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1762159982);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `university_id` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` enum('طالب','خريج') NOT NULL DEFAULT 'طالب',
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `university`, `national_id`, `university_id`, `phone_number`, `address`, `department`, `role`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '2025-10-09 05:05:36', '$2y$12$ugkLRJXD8YUXwrH60DS9R.qcau2Cxhg7RwMRnVwlkOXXYMeNJ4VZS', 'الجامعة الاسلامية', '408724937', '', '591234567', 'غزة', 'هندسة البرمجيات', 'خريج', 1, NULL, '2025-10-09 05:05:36', '2025-10-09 05:05:36'),
(2, 'أروى', 'arwa@gmail.com', '2025-10-09 05:05:36', '$2y$12$gCowWxixkDOfRuXWEhAq2Oij9jg/4WOw7qMv4nJiQBT0ZNSNS0g9q', 'جامعة الازهر', NULL, '25636', '591234560', 'غزة', 'هندسة مدني', 'طالب', 1, NULL, '2025-10-09 05:05:36', '2025-10-09 06:34:57'),
(3, 'MarwaNabil', 'marwa002@gmail.com', '2025-10-09 05:38:50', '$2y$12$szODBWKuXwLZRffP9lDtQeGSGVF0dMe5HfVnsjn5FzEqWyjNceLqK', 'Islamic University', '428724967', NULL, '563924820', 'Gaza', 'طب الاسنان', 'خريج', 1, NULL, '2025-10-09 05:35:22', '2025-10-09 05:38:50'),
(5, 'NewUser', 'NewUser@gmail.com', '2025-10-19 18:39:24', '$2y$12$FEKpO7vZIe3Frgd5hnywLuUHUI51q9R1Rxfa2//ipL..QamaL8r3y', 'Islamic University', NULL, '123457', '563924880', 'Gaza', 'طب الاسنان', 'طالب', 1, NULL, '2025-10-19 18:37:06', '2025-10-19 18:39:24'),
(6, 'GraduateUser', 'GraduateUser@gmail.com', '2025-10-19 18:58:56', '$2y$12$H03t7dYiAxi/1luTUP3is.Hge3EoE73gczNWc0fGYg8U/TMxNZWuq', 'Islamic University', '488724967', NULL, '563924890', 'Gaza', 'الشريعة والدراسات الاسلامية', 'خريج', 1, NULL, '2025-10-19 18:58:13', '2025-10-19 18:58:56'),
(7, 'Logain', 'logain@gmail.com', NULL, '$2y$12$9qTh3WX76063tVaC8E/8j.AiIqASiMC6gxmn7ug4JPo0b78J5nhdC', 'Islamic University', '123123123', NULL, '591231234', 'Gaza', 'هندسة الحاسوب', 'خريج', 0, NULL, '2025-11-03 07:47:46', '2025-11-03 07:47:46'),
(8, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$12$mw2LE7KD5lvFL.SnSNj8b.frI3L/N4HrJy4hBWVXBMRH2eI7QHvLq', 'Islamic University', '123412345', NULL, '591234123', 'Gaza', 'هندسة الحاسوب', 'خريج', 0, NULL, '2025-11-03 08:24:52', '2025-11-03 08:24:52'),
(9, 'mohammed', 'mohammed@gmail.com', NULL, '$2y$12$QSqmcdvw1sUxmz409fjV6OyzsAfS5ET0plBnPrQWU2iGKOZFT2GKG', 'Islamic University', NULL, '1234123', '591212123', 'Gaza', 'هندسة الحاسوب', 'طالب', 0, NULL, '2025-11-03 08:27:29', '2025-11-03 08:27:29'),
(10, 'hamod', 'hamod@gmail.com', NULL, '$2y$12$u7afuO1IbzSpEmafVXx2h.Fp7EvHNKqerCOim4takfArNF7cJ522G', 'Islamic University', NULL, '1111111', '591111122', 'Gaza', 'هندسة الحاسوب', 'طالب', 0, NULL, '2025-11-04 08:53:12', '2025-11-04 08:53:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrows_owner_id_foreign` (`owner_id`),
  ADD KEY `borrows_borrower_id_foreign` (`borrower_id`),
  ADD KEY `borrows_book_id_foreign` (`book_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_book_id_foreign` (`book_id`),
  ADD KEY `reports_reportable_type_reportable_id_index` (`reportable_type`,`reportable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `users_university_id_unique` (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrows_borrower_id_foreign` FOREIGN KEY (`borrower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrows_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
