-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2025 at 10:03 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectfriend`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `name`, `avatar`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Chilli', 'img/avatar1.jpg', 65000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(2, 'Romy', 'img/avatar2.jpg', 100000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(3, 'Yochi', 'img/avatar3.jpg', 80000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(4, 'Bonbon', 'img/avatar4.jpg', 85000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(5, 'Lawoo', 'img/avatar5.jpg', 70000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(6, 'Hikun', 'img/avatar6.jpg', 100000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(7, 'Som', 'img/avatar7.jpg', 90000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(8, 'Ruru', 'img/avatar8.jpg', 75000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(9, 'Woopy', 'img/avatar9.jpg', 95000, '2025-01-09 09:49:18', '2025-01-09 09:49:18'),
(10, 'Podong', 'img/avatar10.jpg', 60000, '2025-01-09 09:49:18', '2025-01-09 09:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `bears`
--

CREATE TABLE `bears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bears`
--

INSERT INTO `bears` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'img/bear1.jpg', '2025-01-08 18:23:06', '2025-01-08 18:23:06'),
(2, 'img/bear2.jpg', '2025-01-08 18:23:06', '2025-01-08 18:23:06'),
(3, 'img/bear3.jpg', '2025-01-08 18:23:06', '2025-01-08 18:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user1_id` bigint(20) UNSIGNED NOT NULL,
  `user2_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user1_id`, `user2_id`, `message`, `created_at`, `updated_at`) VALUES
(7, 3, 4, 'keren', '2025-01-07 10:40:18', '2025-01-07 10:40:18'),
(8, 3, 4, 'hai', '2025-01-07 10:41:29', '2025-01-07 10:41:29'),
(9, 3, 9, 'bro', '2025-01-07 10:55:25', '2025-01-07 10:55:25'),
(18, 3, 4, 'hai', '2025-01-09 07:46:37', '2025-01-09 07:46:37'),
(19, 4, 3, 'helloo', '2025-01-09 12:54:46', '2025-01-09 12:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `field`, `created_at`, `updated_at`) VALUES
(1, 'Database', '2025-01-03 08:46:24', '2025-01-03 08:46:24'),
(2, 'Network', '2025-01-03 08:46:24', '2025-01-03 08:46:24'),
(3, 'Computer Science', '2025-01-03 08:46:24', '2025-01-03 08:46:24'),
(4, 'Artificial Intelligence', '2025-01-03 10:55:54', '2025-01-03 10:55:54'),
(5, 'Marketing', '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(6, 'Business', '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(7, 'Finance', '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(8, 'Taxation', '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(9, 'Education', '2025-01-04 14:28:39', '2025-01-04 14:28:39'),
(10, 'Culinary', '2025-01-05 08:39:40', '2025-01-05 08:39:40'),
(11, 'Tourism', '2025-01-05 08:39:40', '2025-01-05 08:39:40'),
(12, 'Communications', '2025-01-06 02:50:27', '2025-01-06 02:50:27'),
(13, 'Human Resources', '2025-01-06 02:54:27', '2025-01-06 02:54:27'),
(14, 'Entertainment', '2025-01-06 02:57:45', '2025-01-06 02:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user1_id` bigint(20) UNSIGNED NOT NULL,
  `user2_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2025-01-05 14:53:28', '2025-01-05 14:53:28'),
(2, 3, 4, '2025-01-05 14:53:28', '2025-01-05 14:53:28'),
(3, 9, 3, '2025-01-06 11:53:33', '2025-01-06 11:53:33'),
(4, 3, 9, '2025-01-06 11:53:33', '2025-01-06 11:53:33'),
(5, 5, 4, '2025-01-07 10:49:43', '2025-01-07 10:49:43'),
(6, 4, 5, '2025-01-07 10:49:43', '2025-01-07 10:49:43'),
(7, 6, 9, '2025-01-08 12:14:13', '2025-01-08 12:14:13'),
(8, 9, 6, '2025-01-08 12:14:13', '2025-01-08 12:14:13'),
(11, 6, 3, '2025-01-08 22:12:27', '2025-01-08 22:12:27'),
(12, 3, 6, '2025-01-08 22:12:27', '2025-01-08 22:12:27'),
(13, 4, 6, '2025-01-09 07:36:23', '2025-01-09 07:36:23'),
(14, 6, 4, '2025-01-09 07:36:23', '2025-01-09 07:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_02_221659_create_fields_table', 1),
(5, '2025_01_02_221720_create_user_fields_table', 1),
(6, '2025_01_02_223143_add_user_field_id_to_users_table', 1),
(7, '2025_01_05_202816_create_wishlists_table', 2),
(8, '2025_01_05_202839_create_friends_table', 2),
(9, '2025_01_05_203139_create_notifications_table', 2),
(10, '2025_01_06_185035_create_notifications_table', 3),
(11, '2025_01_06_210605_create_chats_table', 4),
(12, '2025_01_09_005549_add_is_visbile_to_users_table', 5),
(13, '2025_01_09_005617_create_bears_table', 5),
(14, '2025_01_09_041145_add_bear_id_to_users_table', 6),
(15, '2025_01_09_162112_create_avatars_table', 7),
(16, '2025_01_09_162638_add_avatar_id_to_users_table', 7),
(17, '2025_01_09_170948_create_transactions_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `is_read`, `type`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 1, 'friend_accept', '2025-01-06 11:53:33', '2025-01-06 13:06:21'),
(2, 5, 3, 1, 'friend_request', '2025-01-06 11:53:57', '2025-01-09 07:07:20'),
(3, 3, 4, 1, 'chat', '2025-01-07 10:41:29', '2025-01-09 07:47:06'),
(4, 4, 5, 1, 'friend_request', '2025-01-07 10:49:17', '2025-01-07 10:49:47'),
(5, 5, 4, 1, 'friend_accept', '2025-01-07 10:49:43', '2025-01-09 07:47:07'),
(6, 3, 9, 1, 'chat', '2025-01-07 10:55:25', '2025-01-07 10:55:46'),
(7, 6, 9, 0, 'friend_accept', '2025-01-08 12:14:13', '2025-01-08 12:14:13'),
(8, 6, 8, 0, 'friend_request', '2025-01-08 12:14:48', '2025-01-08 12:14:48'),
(9, 8, 6, 0, 'friend_accept', '2025-01-08 12:15:16', '2025-01-08 12:15:16'),
(10, 3, 6, 0, 'friend_request', '2025-01-08 22:12:10', '2025-01-08 22:12:10'),
(11, 6, 3, 1, 'friend_accept', '2025-01-08 22:12:27', '2025-01-09 07:07:21'),
(12, 6, 4, 0, 'friend_request', '2025-01-09 07:24:24', '2025-01-09 07:24:24'),
(13, 4, 6, 0, 'friend_accept', '2025-01-09 07:36:23', '2025-01-09 07:36:23'),
(14, 3, 4, 0, 'chat', '2025-01-09 07:46:37', '2025-01-09 07:46:37'),
(15, 4, 3, 0, 'chat', '2025-01-09 12:54:47', '2025-01-09 12:54:47');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `avatar_id`, `created_at`, `updated_at`) VALUES
(1, 3, 8, NULL, NULL),
(2, 3, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coin` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isVisible` tinyint(1) NOT NULL DEFAULT 1,
  `isPaid` tinyint(1) NOT NULL DEFAULT 0,
  `bear_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `age`, `profession`, `linkedin`, `mobile`, `location`, `coin`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `isVisible`, `isPaid`, `bear_id`, `avatar_id`) VALUES
(3, 'Jingga', 'Female', 20, 'IT Developer', 'https://www.linkedin.com/in/jinggakinanti', '085237119388', 'Jakarta', 10025, NULL, 'jinggakinanti22@gmail.com', NULL, '$2y$12$CLsc0M4F1POrfnb9X9aG3Ot6oxVdx6YZMtHt8pC.mXf67ckvmaETy', NULL, '2025-01-03 08:46:24', '2025-01-09 12:49:26', 1, 1, NULL, NULL),
(4, 'Asahi', 'Male', 23, 'Data Analyst', 'https://www.linkedin.com/in/asahi', '085337111118', 'Jakarta', 20100, '1736079582.jpg', 'asahi@gmail.com', NULL, '$2y$12$GNURkyjm97H8HoFVEg/OcOpuiFaCAVEdk3SyclAg7Aq.S6Kyn8T3C', NULL, '2025-01-03 10:55:54', '2025-01-05 05:19:42', 1, 1, NULL, NULL),
(5, 'Jeongwoo', 'Male', 20, 'Entrepreneur', 'https://www.linkedin.com/in/JeongwooKeren', '081238723240', 'Bandung', 1100, '1736079425.jpg', 'jeongwoo@gmail.com', NULL, '$2y$12$CYQ1KqVSvw0GY48uFd5fv.mqEtV7TEbLeGd0Pn7Op.5suUX8DLc.y', NULL, '2025-01-04 14:23:25', '2025-01-05 05:17:05', 1, 1, NULL, NULL),
(6, 'Junkyu', 'Male', 24, 'Lecturer', 'https://www.linkedin.com/in/KimJunkyu', '081907112665', 'Yogyakarta', 100, '1736079226.jpg', 'junkyu@gmail.com', NULL, '$2y$12$OUUx1sGPHQ596JuF.XiZFOU/FFB4GgBswzzXXadcm0KBN4682LIcS', NULL, '2025-01-04 14:28:39', '2025-01-05 05:13:46', 1, 1, NULL, NULL),
(7, 'Haruto', 'Male', 20, 'Chef', 'https://www.linkedin.com/in/Haruto', '08123456781', 'Malang', 1100, '1736091753.jpg', 'haruto@gmail.com', NULL, '$2y$12$0tzEYYrsikzvGXNzNy0GyO9Giv1y9vM8OceeMAcElo6.iYj1QCZMq', NULL, '2025-01-05 08:39:40', '2025-01-05 08:42:33', 1, 1, NULL, NULL),
(8, 'Jaehyuk', 'Male', 23, 'Quality Assurance', 'https://www.linkedin.com/in/Jaehyuk', '089234612780', 'Jakarta', 100, '1736157073.jpg', 'jaehyuk@gmail.com', NULL, '$2y$12$ofLVWfiLezI2kGSAskeG3ua0M04uhBmK/j0TSFeFPUqwtX194YuX2', NULL, '2025-01-06 02:50:27', '2025-01-06 02:51:13', 1, 1, NULL, NULL),
(9, 'Park Jihoon', 'Male', 24, 'Recruiter', 'https://www.linkedin.com/in/Jihoon', '081542767888', 'Jakarta', 100, '1736157293.jpg', 'jihoon@gmail.com', NULL, '$2y$12$Ds250czlSNwYSrB9Ud43ueI12R1z1fnWlGCBRsgtenQcLpWfQDcb.', NULL, '2025-01-06 02:54:27', '2025-01-06 02:54:53', 1, 1, NULL, NULL),
(10, 'Junghwan', 'Male', 20, 'Content Creator', 'https://www.linkedin.com/in/Junghwan', '081267555190', 'Jakarta', 5100, '1736157488.jpg', 'junghwan@gmail.com', NULL, '$2y$12$suKbbAJhb5lSR1psN1vlyO0bO5GTGkFembCExlxEpS6pv6NlJ.aKm', NULL, '2025-01-06 02:57:45', '2025-01-06 02:58:08', 1, 1, NULL, NULL),
(11, 'Yoshi', 'Male', 24, 'Lecturer', 'https://www.linkedin.com/in/Yoshi', '081222554881', 'Bogor', 1045, '1736397916.jpg', 'yoshi@gmail.com', NULL, '$2y$12$2fsF94s27jUdwKZeosJlq.uq8LuZ.CS5qKE0gwR6KP/DUcQIDFkWG', NULL, '2025-01-08 21:40:40', '2025-01-08 21:46:00', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_fields`
--

CREATE TABLE `user_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_fields`
--

INSERT INTO `user_fields` (`id`, `user_id`, `field_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2025-01-03 08:46:24', '2025-01-03 08:46:24'),
(2, 3, 2, '2025-01-03 08:46:24', '2025-01-03 08:46:24'),
(3, 3, 3, '2025-01-03 08:46:24', '2025-01-03 08:46:24'),
(4, 4, 1, '2025-01-03 10:55:54', '2025-01-03 10:55:54'),
(5, 4, 4, '2025-01-03 10:55:54', '2025-01-03 10:55:54'),
(6, 4, 3, '2025-01-03 10:55:54', '2025-01-03 10:55:54'),
(7, 5, 5, '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(8, 5, 6, '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(9, 5, 7, '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(10, 5, 8, '2025-01-04 14:23:26', '2025-01-04 14:23:26'),
(11, 6, 6, '2025-01-04 14:28:39', '2025-01-04 14:28:39'),
(12, 6, 9, '2025-01-04 14:28:39', '2025-01-04 14:28:39'),
(13, 6, 5, '2025-01-04 14:28:39', '2025-01-04 14:28:39'),
(14, 7, 6, '2025-01-05 08:39:40', '2025-01-05 08:39:40'),
(15, 7, 10, '2025-01-05 08:39:40', '2025-01-05 08:39:40'),
(16, 7, 11, '2025-01-05 08:39:40', '2025-01-05 08:39:40'),
(17, 8, 3, '2025-01-06 02:50:27', '2025-01-06 02:50:27'),
(18, 8, 6, '2025-01-06 02:50:27', '2025-01-06 02:50:27'),
(19, 8, 12, '2025-01-06 02:50:27', '2025-01-06 02:50:27'),
(20, 9, 13, '2025-01-06 02:54:27', '2025-01-06 02:54:27'),
(21, 9, 12, '2025-01-06 02:54:27', '2025-01-06 02:54:27'),
(22, 9, 6, '2025-01-06 02:54:28', '2025-01-06 02:54:28'),
(23, 10, 12, '2025-01-06 02:57:45', '2025-01-06 02:57:45'),
(24, 10, 6, '2025-01-06 02:57:45', '2025-01-06 02:57:45'),
(26, 11, 4, '2025-01-08 21:40:40', '2025-01-08 21:40:40'),
(27, 11, 3, '2025-01-08 21:40:40', '2025-01-08 21:40:40'),
(28, 11, 2, '2025-01-08 21:40:40', '2025-01-08 21:40:40'),
(35, 10, 14, '2025-01-09 20:00:05', '2025-01-09 20:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `sender_id`, `receiver_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 5, 3, 'Pending', '2025-01-06 11:53:57', '2025-01-06 11:53:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bears`
--
ALTER TABLE `bears`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user1_id_foreign` (`user1_id`),
  ADD KEY `chats_user2_id_foreign` (`user2_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_user1_id_foreign` (`user1_id`),
  ADD KEY `friends_user2_id_foreign` (`user2_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`),
  ADD KEY `notifications_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_bear_id_foreign` (`bear_id`),
  ADD KEY `users_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `user_fields`
--
ALTER TABLE `user_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fields_user_id_foreign` (`user_id`),
  ADD KEY `user_fields_field_id_foreign` (`field_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_sender_id_foreign` (`sender_id`),
  ADD KEY `wishlists_receiver_id_foreign` (`receiver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bears`
--
ALTER TABLE `bears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_fields`
--
ALTER TABLE `user_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_bear_id_foreign` FOREIGN KEY (`bear_id`) REFERENCES `bears` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_fields`
--
ALTER TABLE `user_fields`
  ADD CONSTRAINT `user_fields_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fields_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
