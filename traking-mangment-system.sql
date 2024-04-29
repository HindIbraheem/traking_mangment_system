-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 12:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traking-mangment-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE `clases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `clas_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clases`
--

INSERT INTO `clases` (`id`, `dep_id`, `clas_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'bramj', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `created_at`, `updated_at`) VALUES
(1, 'قسم الحاسبة الالكترونية ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eductaiones`
--

CREATE TABLE `eductaiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `college` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empoloye_details`
--

CREATE TABLE `empoloye_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_number` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `full_m_name` varchar(255) NOT NULL,
  `marital_sta` tinyint(1) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `vacation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `eductaion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_normal_vacation` varchar(255) NOT NULL,
  `total_timer_vacation` varchar(255) NOT NULL,
  `total_sick_vacation` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `vertified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empoloye_details`
--

INSERT INTO `empoloye_details` (`id`, `user_id`, `job_number`, `full_name`, `full_m_name`, `marital_sta`, `gender`, `birth`, `department_id`, `class_id`, `vacation_id`, `eductaion_id`, `total_normal_vacation`, `total_timer_vacation`, `total_sick_vacation`, `notes`, `vertified`, `created_at`, `updated_at`) VALUES
(1, 1, '123', 'hind', 'eman', 0, 0, '2015-04-04', 1, 1, NULL, NULL, '0', '0', '0', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobes`
--

CREATE TABLE `jobes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_28_082157_create_departments_table', 1),
(6, '2024_02_28_082653_create_clases_table', 1),
(8, '2024_04_03_080229_create_eductaiones_table', 1),
(9, '2024_04_03_083206_create_jobes_table', 1),
(10, '2024_04_03_084548_create_roles_table', 1),
(11, '2014_10_12_000000_create_users_table', 2),
(13, '2024_04_03_075056_create_vactaions_table', 3),
(14, '2024_02_25_082525_create_empoloye_details_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL),
(3, 'department', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `passward_reset_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `dep_id`, `passward_reset_at`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$rFrRdmie6sTny6PmLGICo.QWSL1SHlelz4aMc1TliZZZJXmojE.4G', 2, 1, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', '$2y$10$rFrRdmie6sTny6PmLGICo.QWSL1SHlelz4aMc1TliZZZJXmojE.4G', 1, 1, NULL, NULL, NULL),
(3, 'department', 'department@gmail.com', '$2y$10$rFrRdmie6sTny6PmLGICo.QWSL1SHlelz4aMc1TliZZZJXmojE.4G', 3, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vactaions`
--

CREATE TABLE `vactaions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empl_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `vacation_type` varchar(255) NOT NULL,
  `from_day` datetime DEFAULT NULL,
  `to_day` datetime DEFAULT NULL,
  `vacation_purpoes` varchar(255) DEFAULT NULL,
  `mag_classes_aprove` tinyint(1) NOT NULL DEFAULT 0,
  `mag_department_aprove` tinyint(1) NOT NULL DEFAULT 0,
  `vacation_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vactaions`
--

INSERT INTO `vactaions` (`id`, `empl_id`, `dep_id`, `vacation_type`, `from_day`, `to_day`, `vacation_purpoes`, `mag_classes_aprove`, `mag_department_aprove`, `vacation_note`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'u', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clases_dep_id_foreign` (`dep_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eductaiones`
--
ALTER TABLE `eductaiones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empoloye_details`
--
ALTER TABLE `empoloye_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empoloye_details_user_id_foreign` (`user_id`),
  ADD KEY `empoloye_details_department_id_foreign` (`department_id`),
  ADD KEY `empoloye_details_class_id_foreign` (`class_id`),
  ADD KEY `empoloye_details_vacation_id_foreign` (`vacation_id`),
  ADD KEY `empoloye_details_eductaion_id_foreign` (`eductaion_id`);

--
-- Indexes for table `jobes`
--
ALTER TABLE `jobes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_dep_id_foreign` (`dep_id`);

--
-- Indexes for table `vactaions`
--
ALTER TABLE `vactaions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vactaions_dep_id_foreign` (`dep_id`),
  ADD KEY `vactaions_empl_id_foreign` (`empl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eductaiones`
--
ALTER TABLE `eductaiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empoloye_details`
--
ALTER TABLE `empoloye_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobes`
--
ALTER TABLE `jobes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vactaions`
--
ALTER TABLE `vactaions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `empoloye_details`
--
ALTER TABLE `empoloye_details`
  ADD CONSTRAINT `empoloye_details_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `clases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empoloye_details_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empoloye_details_eductaion_id_foreign` FOREIGN KEY (`eductaion_id`) REFERENCES `eductaiones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empoloye_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empoloye_details_vacation_id_foreign` FOREIGN KEY (`vacation_id`) REFERENCES `vactaions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vactaions`
--
ALTER TABLE `vactaions`
  ADD CONSTRAINT `vactaions_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vactaions_empl_id_foreign` FOREIGN KEY (`empl_id`) REFERENCES `empoloye_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vactaions_user_id_foreign` FOREIGN KEY (`empl_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
