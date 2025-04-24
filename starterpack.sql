-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2025 at 08:19 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starterpack`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('menu','action') COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `icon`, `type`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'fa-home', 'menu', NULL, '2025-04-23 21:13:15', '2025-04-23 21:13:15'),
(13, 'System Administration', NULL, 'fa-book', 'menu', NULL, '2025-04-23 21:13:15', '2025-04-23 21:13:15'),
(14, 'Users', 'sysadmin.users.index', 'fa-circle', 'menu', 13, '2025-04-23 21:13:15', '2025-04-23 21:13:15'),
(15, 'User Add', 'sysadmin.users.add', NULL, 'action', 14, '2025-04-23 21:13:15', '2025-04-23 21:13:15'),
(16, 'Users Edit', 'sysadmin.users.update', NULL, 'action', 14, '2025-04-23 21:13:15', '2025-04-23 21:13:15'),
(17, 'Users Delete', 'sysadmin.users.delete', NULL, 'action', 14, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(18, 'Menus', 'sysadmin.menus.index', 'fa-circle', 'menu', 13, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(19, 'Menus Add', 'sysadmin.menus.add', NULL, 'action', 18, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(20, 'Menus Edit', 'sysadmin.menus.update', NULL, 'action', 18, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(21, 'Menus Delete', 'sysadmin.menus.delete', NULL, 'action', 18, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(22, 'Permissions', 'sysadmin.permissions.index', 'fa-circle', 'menu', 13, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(23, 'Permissions Detail', 'sysadmin.permissions.detail', NULL, 'action', 22, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(24, 'Permissions Update', 'sysadmin.permissions.update', NULL, 'action', 22, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(25, 'Human Resources', NULL, 'fa-person-booth', 'menu', NULL, '2025-04-23 22:02:44', '2025-04-23 22:02:44'),
(26, 'Employee', 'hr.employee.worker.index', 'fa-circle', 'menu', 25, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(27, 'Employee Add', 'hr.employee.worker.add', NULL, 'menu', 26, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(28, 'Employee Edit', 'hr.employee.worker.update', NULL, 'menu', 26, '2025-04-23 21:13:16', '2025-04-23 21:13:16'),
(29, 'Employee Delete', 'hr.employee.worker.delete', NULL, 'menu', 26, '2025-04-23 21:13:16', '2025-04-23 21:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_04_16_085542_create_permission_tables', 2),
(7, '2025_04_21_022234_create_menus_table', 3),
(8, '2025_04_21_022918_create_permissions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_user_id_foreign` (`user_id`),
  KEY `permissions_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(51, 3, 1, '2025-04-24 00:30:55', '2025-04-24 00:30:55'),
(52, 3, 13, '2025-04-24 00:30:55', '2025-04-24 00:30:55'),
(53, 3, 18, '2025-04-24 00:30:55', '2025-04-24 00:30:55'),
(54, 3, 22, '2025-04-24 00:30:55', '2025-04-24 00:30:55'),
(55, 3, 14, '2025-04-24 00:30:55', '2025-04-24 00:30:55'),
(56, 1, 1, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(57, 1, 25, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(58, 1, 26, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(59, 1, 27, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(60, 1, 29, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(61, 1, 28, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(62, 1, 13, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(63, 1, 18, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(64, 1, 19, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(65, 1, 21, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(66, 1, 20, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(67, 1, 22, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(68, 1, 23, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(69, 1, 24, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(70, 1, 14, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(71, 1, 15, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(72, 1, 17, '2025-04-24 00:54:50', '2025-04-24 00:54:50'),
(73, 1, 16, '2025-04-24 00:54:50', '2025-04-24 00:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@user.com', NULL, '$2y$10$wWshDnzeQOhUIR6K3VWVZ.H2xXxv.TMbRe.TMhEfNG6Lcd3cSAhim', 'oyeZiqSeCtQ5MO6SyAxIWKeVcAZlaYjDpG4DBC5NrfJJfSe10JzwLHbM1x0u', '2025-04-16 01:22:45', '2025-04-16 01:22:45'),
(2, 'Admin IT', 'admin.it@user.com', NULL, '$2y$10$/Iaz45SdNz4ENUqotIC9nebc4AMQ.xpk5zdDxosUVabNEipzrBl/G', NULL, '2025-04-16 19:56:01', '2025-04-24 00:23:50'),
(3, 'Admin HR', 'admin.hr@user.com', NULL, '$2y$10$xEmfBGMF/XpIad2tru1Hpu8xnmn3OcO.Dxhs5OJi5sAlsb9FK5nJm', 'VDzVi1Hyyj0jj9n8x7yOE3udB0RsHu0n3pwy8mcADftz3MFpqLY9Yqqbjttx', '2025-04-16 20:02:06', '2025-04-16 20:02:06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
