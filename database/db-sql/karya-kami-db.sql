-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2025 at 04:36 AM
-- Server version: 8.0.32
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karya-kami-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint UNSIGNED NOT NULL,
  `work_id` bigint UNSIGNED NOT NULL,
  `score` int NOT NULL COMMENT 'Nilai karya',
  `comment` text COLLATE utf8mb4_unicode_ci COMMENT 'Komentar guru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `breezy_sessions`
--

CREATE TABLE `breezy_sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `authenticatable_id` bigint UNSIGNED NOT NULL,
  `authenticatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_16_052454_create_works_table', 1),
(6, '2025_02_18_080032_create_assessments_table', 1),
(8, '2025_02_20_142525_create_permission_tables', 2),
(9, '2022_12_14_083707_create_settings_table', 3),
(10, '2025_02_21_134659_create_karya_settings_table', 4),
(11, '2025_02_22_143658_create_breezy_sessions_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(2, 'view_any_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(3, 'create_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(4, 'update_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(5, 'restore_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(6, 'restore_any_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(7, 'replicate_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(8, 'reorder_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(9, 'delete_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(10, 'delete_any_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(11, 'force_delete_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(12, 'force_delete_any_assessment', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(13, 'view_role', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(14, 'view_any_role', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(15, 'create_role', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(16, 'update_role', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(17, 'delete_role', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(18, 'delete_any_role', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(19, 'view_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(20, 'view_any_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(21, 'create_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(22, 'update_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(23, 'restore_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(24, 'restore_any_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(25, 'replicate_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(26, 'reorder_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(27, 'delete_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(28, 'delete_any_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(29, 'force_delete_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(30, 'force_delete_any_user', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(31, 'view_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(32, 'view_any_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(33, 'create_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(34, 'update_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(35, 'restore_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(36, 'restore_any_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(37, 'replicate_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(38, 'reorder_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(39, 'delete_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(40, 'delete_any_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(41, 'force_delete_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(42, 'force_delete_any_work', 'web', '2025-02-20 08:09:02', '2025-02-20 08:09:02'),
(43, 'page_ManageSetting', 'web', '2025-02-22 07:12:42', '2025-02-22 07:12:42'),
(44, 'page_MyProfilePage', 'web', '2025-02-22 07:39:24', '2025-02-22 07:39:24'),
(45, 'view_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(46, 'view_any_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(47, 'create_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(48, 'update_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(49, 'restore_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(50, 'restore_any_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(51, 'replicate_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(52, 'reorder_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(53, 'delete_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(54, 'delete_any_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(55, 'force_delete_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46'),
(56, 'force_delete_any_token', 'web', '2025-02-23 18:39:46', '2025-02-23 18:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'hak akses ke faisal', 'fc999afeab4e897e3ed1c11eabadbc9d37adaeb071d3be5b606e2ad824f3faa5', '[\"view_any_work\",\"view_work\",\"update_work\",\"create_work\"]', NULL, NULL, '2025-02-23 18:40:38', '2025-02-23 18:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-02-20 08:07:07', '2025-02-20 08:07:07'),
(2, 'guru', 'web', '2025-02-20 21:46:27', '2025-02-20 21:46:27'),
(3, 'murid', 'web', '2025-02-20 21:48:08', '2025-02-20 21:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(9, 2),
(13, 2),
(19, 2),
(22, 2),
(31, 2),
(32, 2),
(1, 3),
(2, 3),
(13, 3),
(19, 3),
(22, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `name`, `locked`, `payload`, `created_at`, `updated_at`) VALUES
(1, 'KaryaSetting', 'site_name', 0, '\"karya kami\"', '2025-02-21 06:49:14', '2025-02-23 05:36:06'),
(2, 'KaryaSetting', 'site_active', 0, 'true', '2025-02-21 06:49:14', '2025-02-23 05:36:06'),
(3, 'KaryaSetting', 'registration_enabled', 0, 'true', '2025-02-21 06:49:14', '2025-02-23 05:36:06'),
(4, 'KaryaSetting', 'login_enabled', 0, 'true', '2025-02-21 06:49:14', '2025-02-23 05:36:06'),
(5, 'KaryaSetting', 'password_reset_enabled', 0, 'true', '2025-02-21 06:49:14', '2025-02-23 05:36:06'),
(6, 'KaryaSetting', 'sso_enabled', 0, 'true', '2025-02-21 06:49:14', '2025-02-23 05:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar_url`, `theme`, `theme_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'adminkaryakami@mail.com', '2025-02-21 07:59:19', '$2y$10$Q6nJK7vuVE2ZERPgN9WqReKF/jopfdC4rtSErcLzUhwkuF1wXlRv2', 'DJ80IKDTCRvBPmGDRVTOkHm7h0aBRIYvSpAZKGh03K6E0P5bTXitoB2LSHOT', NULL, 'default', NULL, '2025-02-20 07:36:34', '2025-02-21 07:59:19', NULL),
(2, 'faisal', 'faisal@mail.com', '2025-02-22 07:07:18', '$2y$10$yf9mUvrmK0pQIXt1tepuxOXIS2vs0lHzduWD3ulvHcUlIYBT44oSW', 'gPmXiB5teoNREMY4s4IpJO4u66NxpzZtnVnMBPgbj0s4la8yzUB1Bdy4QEmr', NULL, 'default', NULL, '2025-02-20 22:39:29', '2025-02-22 07:07:18', NULL),
(3, 'sinta', 'sinta@mail.com', NULL, '$2y$10$yf9mUvrmK0pQIXt1tepuxOXIS2vs0lHzduWD3ulvHcUlIYBT44oSW', 'qcKpWfh3mcFMOG9WrEmke79y4Yrrlqx3NM5NplfQ3DgzW4zmDR2hJls9OmwV', NULL, 'default', NULL, '2025-02-20 22:44:41', '2025-02-20 22:44:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` json DEFAULT NULL,
  `usage_guide` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessments_work_id_foreign` (`work_id`);

--
-- Indexes for table `breezy_sessions`
--
ALTER TABLE `breezy_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breezy_sessions_authenticatable_id_foreign` (`authenticatable_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_group_name_unique` (`group`,`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `breezy_sessions`
--
ALTER TABLE `breezy_sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `breezy_sessions`
--
ALTER TABLE `breezy_sessions`
  ADD CONSTRAINT `breezy_sessions_authenticatable_id_foreign` FOREIGN KEY (`authenticatable_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
