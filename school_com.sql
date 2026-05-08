-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 08, 2026 at 09:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no, 1:yes',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', 0, 0, 1, '2026-01-15 15:01:11', '2026-01-15 15:01:11'),
(2, 'Class 2', 0, 0, 1, '2026-01-15 15:23:28', '2026-01-15 15:49:17'),
(3, 'Class 3', 0, 0, 1, '2026-01-15 15:23:41', '2026-01-15 20:27:05'),
(4, 'PART TIME', 1, 0, 1, '2026-01-20 16:19:21', '2026-02-06 14:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `class_suject`
--

CREATE TABLE `class_suject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not, 1:yes',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_suject`
--

INSERT INTO `class_suject` (`id`, `class_id`, `subject_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(27, 4, 23, 1, 0, 0, '2026-01-24 14:31:45', '2026-01-24 14:31:45'),
(28, 4, 14, 1, 0, 0, '2026-01-24 14:31:45', '2026-01-24 14:31:45'),
(29, 4, 22, 1, 0, 0, '2026-01-24 14:31:45', '2026-01-24 14:31:45'),
(30, 3, 23, 1, 0, 1, '2026-01-24 14:31:56', '2026-01-24 14:31:56'),
(31, 3, 14, 1, 0, 1, '2026-01-24 14:31:56', '2026-01-24 14:31:56'),
(32, 3, 22, 1, 0, 1, '2026-01-24 14:31:56', '2026-01-24 14:31:56'),
(36, 1, 23, 1, 0, 1, '2026-01-24 14:32:30', '2026-01-24 14:32:30'),
(37, 1, 14, 1, 0, 1, '2026-01-24 14:32:30', '2026-01-24 14:32:30'),
(38, 1, 21, 1, 0, 1, '2026-01-24 14:32:30', '2026-01-24 14:45:50'),
(39, 2, 23, 1, 0, 0, '2026-02-06 14:25:24', '2026-02-06 14:25:24'),
(40, 2, 14, 1, 0, 0, '2026-02-06 14:25:24', '2026-02-06 14:25:24'),
(41, 2, 22, 1, 0, 0, '2026-02-06 14:25:25', '2026-02-06 14:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0:active, 1:inactive',
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:yes, 1:no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`id`, `teacher_id`, `class_id`, `status`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 45, 1, 0, 1, 0, '2026-02-04 21:42:43', '2026-02-04 21:42:43'),
(2, 43, 2, 1, 1, 0, '2026-02-04 21:43:08', '2026-02-04 21:43:08'),
(3, 2, 2, 0, 24, 0, '2026-02-04 22:22:52', '2026-02-04 22:22:52'),
(4, 42, 3, 0, 24, 0, '2026-02-04 22:24:11', '2026-02-04 22:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2025_12_02_152826_create_sessions_table', 2),
(7, '2026_01_22_183610_add_image_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jcB49CSC5dIJ5FZekwZ6PmeoaXZUYIl3vbwjbEOb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGVFY25kN1l4NlJyd0JtTTE1a3Nhclk3V0lXckRZckVhVnR3SE81VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1769183799);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not, 1:yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(14, 'HOME ECONOMICS', 'Pratical', 1, 0, 0, '2025-12-11 03:57:13', '2026-01-15 18:43:40'),
(15, 'ENGLISH LANGUAGE', 'Theory', 1, 0, 0, '2025-11-05 17:23:24', '2026-01-15 18:43:41'),
(16, 'MATHEMATIC', 'Pratical', 1, 1, 0, '2025-11-06 16:43:35', '2026-01-15 18:44:34'),
(17, 'SOCIAL STIDIES', 'Pratical', 1, 0, 0, '2026-01-04 16:38:22', '2026-01-15 18:43:41'),
(18, 'SOCIAL STIDIES', 'Theory', 1, 1, 0, '2025-12-02 05:01:46', '2026-01-15 18:44:45'),
(19, 'BASIC TECHNOLOGY', 'Pratical', 1, 0, 0, '2025-11-06 19:36:48', '2026-01-15 18:43:41'),
(20, 'ENGLISH LANGUAGE', 'Pratical', 1, 1, 0, '2026-01-07 14:22:48', '2026-01-15 18:44:24'),
(21, 'MATHEMATIC', 'Theory', 1, 0, 0, '2025-10-26 22:30:01', '2026-01-15 18:43:41'),
(22, 'HOME ECONOMICS', 'Pratical', 1, 0, 0, '2025-11-12 14:03:41', '2026-01-15 18:43:41'),
(23, 'ENGLISH LANGUAGE', 'Theory', 1, 0, 0, '2026-01-10 23:07:04', '2026-01-15 18:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admission_number` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `photo_pic` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `address_permanent` varchar(255) DEFAULT NULL,
  `materiel_status` varchar(255) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1:admin, 2:teacher, 3:student, 4:parent',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not delete, 1:delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `mobile_number`, `admission_date`, `photo_pic`, `blood_group`, `height`, `weight`, `occupation`, `adresse`, `address_permanent`, `materiel_status`, `date_of_joining`, `qualification`, `work_experience`, `note`, `user_type`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', NULL, 'admin@gmail.com', NULL, '$2y$10$7wgTi2AgBkd/n3oMMtn32etTnyoxTGlQ9FWdnlfNJA5sPrGb8iiBi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2026-01-12 15:43:49', '2026-01-27 18:17:52'),
(2, NULL, 'Teacher', 'Teacher', 'teacher@gmail.com', NULL, '$2y$10$Mv1zmN2RIRVSScTUslNcuO7eMFvx6Pi1mEpRSv2OXn0QHCaTKaa82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Female', '1977-05-16', NULL, NULL, '206', NULL, '20260127033750cqgphyuabzlvtkdmojqi.jpg', '', '', '', NULL, 'Eum amet hic deseru', 'Ut recusandae Sit', 'Praesentium sit reic', '2017-09-23', 'Elit optio sed sol', 'Aut irure nulla in q', 'Voluptas earum lorem', 2, 1, 0, '2026-01-12 16:27:20', '2026-01-27 14:37:50'),
(3, NULL, 'Student', 'Student', 'student@gmail.com', NULL, '$2y$10$9y23gbm9Ggb.m71ZnjdffOlNnKxLhm05HaffiSZH/hwQiMDFFKSz.', NULL, NULL, NULL, NULL, '201', '168', 1, 'Male', '1991-02-01', 'Natus ipsam ', 'Islamic', '1756', '2026-02-01', '', 'O+', '157', '85', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-12 16:28:56', '2026-01-24 14:16:04'),
(4, NULL, 'Parent', 'Parent', 'parent@gmail.com', NULL, '$2y$10$lbYx2TG54Qenehk/BwGCSeZNrG9kgyWXmB/XI6O57bsojbcFXJ58K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '0658482', NULL, '20260127064849b6ys3tq8zfsmguoj8yrv.jpg', '', '', '', 'Nothing', 'rue 123 Maroc', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, '2026-01-12 16:29:24', '2026-01-27 17:48:49'),
(20, NULL, 'Admin', NULL, 'admin1@gmail.com', NULL, '$2y$10$HxiAL7Ow7x3Ci7LVeyrQ3OUJA5.BCucr0qW1xiKRWqqmozQP2CGpa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2026-01-14 12:05:12', '2026-01-14 15:44:50'),
(24, NULL, 'Jack', 'Jack', 'jack@gmail.com', NULL, '$2y$10$rGUrxgimJ6a.Jihw5hBr7O4HsTpieDP25XUP/sa9mGP4NxQA.FTt.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2026-01-14 13:41:37', '2026-01-15 12:14:39'),
(26, 39, 'Orson', 'Woodard', 'robysir@mailinator.com', NULL, '$2y$10$9y23gbm9Ggb.m71ZnjdffOlNnKxLhm05HaffiSZH/hwQiMDFFKSz.', NULL, NULL, NULL, NULL, '256', '100', 1, 'Male', '1998-07-20', 'Vel laborum', 'Islamic', '162', '2021-07-03', 'Untitled-1.png', 'Mag', '175', '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-21 17:59:52', '2026-01-26 18:59:54'),
(27, 39, 'Thaddeus', 'Hood', 'dako01@mailinator.com', NULL, '$2y$10$9y23gbm9Ggb.m71ZnjdffOlNnKxLhm05HaffiSZH/hwQiMDFFKSz.', NULL, NULL, NULL, NULL, '929', '7623', 2, 'Male', '1980-09-05', 'Voluptatem', 'Islamic', '299', '1985-03-24', '20260127063735ofm4b1u8kxfgwu4r120h.jpg', 'Faci', '170', '69', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, '2026-01-21 18:02:04', '2026-01-27 17:37:35'),
(29, 38, 'Abdul', 'Hoover', 'jufozuzic@mailinator.com', NULL, '$2y$10$erIF7kgLDHNRNOyVvCV8Ze3W9JK96Gzn7Ef/yuZUPCMetR4YNSgIG', NULL, NULL, NULL, NULL, '675', '80518', 4, 'Male', '1992-06-20', 'Ullam proident ', 'Islamic', '782', '2000-08-21', 'Untitled-1.png', 'Min', '180', '72', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-21 18:04:37', '2026-01-26 19:03:46'),
(30, 38, 'Aimee', 'Knox', 'tahico@mailinator.com', NULL, '$2y$10$SeQgfHGg6UTEobWbFhy2jOAFyg2Z1E0eO4VY0dHSEjoo.09/tD1su', NULL, NULL, NULL, NULL, '479', '7154', 3, 'Male', '1993-12-31', 'Ullam repellendus I', 'Islamic', '972', '2017-01-24', 'Upload/ukPIlMBZuMYtTnvffhxQH0kCD1qBAUS4YNqPerW1.png', 'B+', '154', '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-22 13:42:55', '2026-01-26 19:04:03'),
(31, 38, 'Hashim', 'Drake', 'lyran@mailinator.com', NULL, '$2y$10$UTpnBY8Q/1MuPIzUoOzWnO/itM1gHvI2zuIUFp2cDn/noeK9HKyZi', NULL, NULL, NULL, NULL, '962', '1200', 2, 'Male', '1994-01-28', 'Animi autem ', 'Islamic', '877', '2025-12-17', 'Upload/WSZKuW3aw5xpDmh9nEVTiQ14FUY3ZW7oGZGMOVBZ.jpg', 'A-', '154', '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-22 14:27:04', '2026-01-26 19:04:57'),
(32, NULL, 'Idola', 'Church', 'depahe@mailinator.com', NULL, '$2y$10$CJcPBSB0tA9qHLQeZE4PQOJE/a5YnUbYBcp/uPjxGxdTUQ2hC6UYi', NULL, NULL, NULL, NULL, '776', '941', 3, 'Male', '2001-06-20', 'Natus ipsam ', 'Islamic', '87', '2025-09-09', '2ivfljhz9fdy3582a26x.jpg', 'O+', '150', '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-22 16:09:44', '2026-01-22 16:09:44'),
(33, 4, 'Rhona', 'Petty', 'jazuhyvax@mailinator.com', NULL, '$2y$10$CJcPBSB0tA9qHLQeZE4PQOJE/a5YnUbYBcp/uPjxGxdTUQ2hC6UYi', NULL, NULL, NULL, NULL, '79', '697', 4, 'Male', '1997-06-09', 'In ut exercitationem', 'Islamic', '338', '2025-09-12', 'upload/jg3weezYoJ6LJ7634JCzIBs0EbQID7W6u8rAtoHF.jpg', 'O+', '175', '70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, '2026-01-23 14:18:15', '2026-01-26 19:17:32'),
(35, 41, 'Miranda', 'Miranda', 'miranda@mailinator.com', NULL, '$2y$10$7XU6RYxFDSPNWQWm1V4lX.gwJLW.vGnyiTwK1vfZvvBh2ibCtkLKW', NULL, NULL, NULL, NULL, '291', '839', 1, 'Male', '2000-08-21', 'Officia aut', 'Islamic', '588', '2026-01-08', 'upload/BltuWzgCmog8nLzMQiukatgwW0vylU4FfhiR3NDZ.jpg', 'O+', '175', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2026-01-23 15:08:58', '2026-01-26 19:28:07'),
(36, NULL, 'Colton', 'Collins', 'wetuvuja@mailinator.com', NULL, '$2y$10$gkDYaBJ6ZvTEmIr5C.BfR.IxFH2Ybh8eYC91cD4dhB1i.vYyBp7Ku', NULL, NULL, NULL, NULL, '754', '5300', 4, 'Male', '1992-04-12', 'Esse ex', 'Islamic', '70874', '2026-01-22', 'images/mAsYx9CCxxZkc80v3egbO1C6YV3EPbHEFtH3XNVx.jpg', 'O+', '157', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, '2026-01-24 12:38:43', '2026-01-27 19:11:44'),
(37, NULL, 'Kaitlin', 'Mcpherson', 'pyda@mailinator.com', NULL, '$2y$10$XYwVimm/Q2MMJi.BsjsNSei0xhlL.qRt4MyjlZwAfnONhzp/QjleK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '9568', NULL, '20260124093256ebl6ta86ohum17sfhkah.jpg', NULL, NULL, NULL, 'Engineering', 'Rue 100 Maroc', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 0, '2026-01-24 17:02:12', '2026-01-24 20:32:56'),
(38, NULL, 'Chastity', 'Chandler', 'xaliw@mailinator.com', NULL, '$2y$10$m/3cYOObgpMmnQCUKhX89OR/Och35R9t3JA2Tg75Ta5GSDudmD1My', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '5302', NULL, '20260124093423tcpxbgrohaa4ylnsbsqo.jpg', NULL, NULL, NULL, 'Low', 'Aut qui id ut et tot', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, '2026-01-24 17:04:28', '2026-01-24 20:34:23'),
(39, NULL, 'Jason', 'Scott', 'ziguca@mailinator.com', NULL, '$2y$10$R40tcSu.ek.cnRIPTNoEK.DHDC8ErMuvGpu.Wjk0Sq0fp6d3n0J1e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '73811', NULL, '20260124092042vjtmmnitk8nouks0suhd.jpg', NULL, NULL, NULL, 'Engineering', 'Reprehenderit et ni', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 0, '2026-01-24 17:05:42', '2026-01-24 20:20:42'),
(40, NULL, 'Jarrod', 'Combs', 'gajulyheso@mailinator.com', NULL, '$2y$10$hvX3xIoyuOb7f.ceABMfwuaC5IsqPDhy6RQymli6ZYmraQOgFYihG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, '296', NULL, 'images/6vEuznAzsV8EFyYSPx2NsbPq6EAjGwsgBkPqdOrX.jpg', NULL, NULL, NULL, 'Accounting', 'Rue 101 Consequat Ipsam', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 0, '2026-01-26 19:13:03', '2026-01-26 19:13:03'),
(41, NULL, 'Scarlet', 'Camacho', 'ronapul@mailinator.com', NULL, '$2y$10$G4CRQWbyEPh7YI1QES3R8eKUzpGsvQ2oCEHIaB5HGnuazMDj1FMwS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '860', NULL, NULL, NULL, NULL, NULL, 'Accounting', 'Rue 258 aliquid eos', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, '2026-01-26 19:16:18', '2026-01-26 19:16:18'),
(42, NULL, 'Nolan', 'Pruitt', 'tycutivis@mailinator.com', NULL, '$2y$10$D.EyNv6EhLxlTeHzIxD.vuVTfC4PPfwlXLw.NUxBAZvITwYp6m6l.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '2008-07-03', NULL, NULL, '778168', NULL, '20260127024517kztxaku8cf4g6a8ntdez.jpg', NULL, NULL, NULL, NULL, 'Quia velit sint omni', 'Tempore sit aut del', 'Pariatur Cumque eos', '1977-03-07', 'Explicabo Et maxime', 'teacher in the school', 'Nisi illum sunt mol', 2, 1, 0, '2026-01-27 13:45:17', '2026-01-27 14:20:24'),
(43, NULL, 'Halee', 'Lara', 'tedony@mailinator.com', NULL, '$2y$10$dxS7aqFmGEY0eL8eV/on0Oy/P.3VB9UE1qFXWF6t8YKc6n6spjH.a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1975-12-16', NULL, NULL, '626', NULL, '20260127032347m9t30zieoiqt4aabkpuw.jpg', NULL, NULL, NULL, NULL, 'Non in laborum Ut s', 'Repellendus Qui neq', 'Eos architecto faci', '1975-04-29', 'Dolore aut amet exp', 'amet exp', 'Itaque odio voluptas', 2, 0, 0, '2026-01-27 14:23:47', '2026-01-27 17:15:46'),
(44, NULL, 'Inez', 'Mcbride', 'hiquhydyze@mailinator.com', NULL, '$2y$10$K3T4JhkYef4CpyW.z09MDe3Sr9X/ADck/vxmmzrblghPaJq.8vxA2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1985-05-05', NULL, NULL, '195', NULL, NULL, NULL, NULL, NULL, NULL, 'Consequat Aperiam e', 'Impedit rerum illum', 'Deleniti magnam repr', '1983-10-13', 'Debitis quis id rem', 'Debitis quis', 'Quis nisi est aut of', 2, 0, 0, '2026-01-27 14:25:28', '2026-01-27 14:35:51'),
(45, NULL, 'Pascale', 'Jimenez', 'dibuvecy@mailinator.com', NULL, '$2y$10$7X7ZGdY2we2akK70MNB8AOFfZJBK36o.eEHpp8ATiiJbE.ML9mmj6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', '1980-05-08', NULL, NULL, '784', NULL, NULL, NULL, NULL, NULL, NULL, 'Iusto ea ad deserunt', 'Assumenda ipsum et s', 'Dolorum adipisci ut', '1971-10-28', 'In et nostrum minim', 'Optio error non sim', 'Et reprehenderit do', 2, 1, 0, '2026-01-27 14:29:44', '2026-01-27 14:29:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_suject`
--
ALTER TABLE `class_suject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_suject`
--
ALTER TABLE `class_suject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
