-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 07:47 AM
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
-- Database: `xpressfixdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`id`, `fullname`, `phoneNumber`, `email`, `address`, `city`, `state`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Damilola Samuel', '08108375627', 'damilolasamuel@gmail.com', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ratione harum doloremque amet, iusto similique vel deserunt, facere inventore sit quo officia in est. Ipsum quasi ullam officiis esse dolorem.', 'Oshogbo', 'Osun', '$2y$10$R4Hgnvc2OMVjdWizKBpBF.r/RKY5ZdKup.2n3dUslJin3c4blQYTe', 'TqNUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFKlJ', '2022-02-28 21:34:02', '2022-02-28 21:34:02'),
(2, 'Blessing Ikwein', '07039756352', 'ikweinblessing@gmail.com', 'consectetur adipisicing elit. Veritatis ratione harum doloremque amet, iusto similique vel deserunt, facere inventore Lorem ipsum, dolor sit amet  sit quo officia in est. Ipsum quasi ullam officiis esse dolorem.', 'Ijebu Ode', 'Osun', '$2y$10$xl7HJNHMJ7gkO17zlFeR2uevO2VYxOnGfDCIffhuuWBqr2BP8GrG.', 'wioup35TYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFKlJ', '2022-02-28 22:23:59', '2022-02-28 22:23:59'),
(3, 'Oki Emmanuel', '08054679749', 'okiemmanuel@gmail.com', 'quasi ullam officiis esse dolorem. consectetur adipisicing elit. Veritatis ratione harum doloremque amet, iusto similique vel deserunt, facere inventore Lorem ipsum, dolor sit amet  sit quo officia in est. Ipsum', 'Sokoto', 'Sokoto', '$2y$10$UAskC3zC7wj6ewuBZ8zwF.lFr3JCUgV.b7FRs.BYdeT2tLpj19mji', 'TOITUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFKlJJW', '2022-02-28 22:30:28', '2022-02-28 22:30:28'),
(5, 'Benjamin Johnson', '08054679749', 'Johnsonben@gmail.com', 'quasi ullam officiis esse dolorem. consectetur adipisicing elit. Veritatis ratione harum doloremque amet, iusto similique vel deserunt, facere inventore Lorem ipsum, dolor sit amet  sit quo officia in est. Ipsum', 'Jos', 'Plateu', '$2y$10$Dt3fnHl1jKCmcD8PQXECIO1cLbNoVw3AkUHxF7BHVgKq4AQzhQjm2', 'TqNUIcTYbSmVMEqEEZE58AZ0Ukz7sfAhFKlJ', '2022-02-28 22:32:19', '2022-02-28 22:32:19'),
(6, 'Abraham Ossai', '09082305867', 'abrahamgreatebele@gmail.com', 'No 31, Palm Street Extension, Calabar', 'Ilorin', 'Kwara', '$2y$10$pRxeKwCOTABjgrDteAH/gOvPbyGwmlmbO/oTCs7GefzpJXwZq0oWy', 'uiowpetkUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFnks', '2022-02-28 22:37:07', '2022-02-28 22:37:07');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_02_03_003035_create_ride_table', 6),
(10, '2022_02_03_052605_create_possibleproblems_table', 6),
(11, '2022_02_03_054251_create_possibleproblems_table', 7),
(12, '2022_02_03_055415_create_possibleproblems_table', 8),
(13, '2022_02_03_061747_create_possible_problems_table', 9),
(14, '2022_02_03_062008_create_possible_problems_table', 10),
(15, '2022_02_05_152820_create_engineers_table', 11),
(17, '2022_02_05_160018_create_orderdetails_table', 12),
(18, '2022_02_07_155153_create_payments_table', 13),
(19, '2022_02_10_002913_create_states_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviceType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imieNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problemCategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignedEngineer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignedRider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `approvalImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvalStatus` tinyint(1) DEFAULT 0,
  `deviceFixPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isBookRide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ridePrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activePhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentCity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentState` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `email`, `user_id`, `fullName`, `phone`, `deviceType`, `model`, `imieNo`, `problemCategory`, `assignedEngineer`, `assignedRider`, `complain`, `status`, `approval`, `approvalImage`, `approvalStatus`, `deviceFixPrice`, `isBookRide`, `ridePrice`, `activePhoneNumber`, `price`, `currentCity`, `currentState`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'samuelsmith@gmail.com', 7, 'Samuel Smith', '07054977409', 'Phone', 'Hawaii X5', '345678907890', 'Mouth Piece', 'TqNUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFKlJ', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. A architecto quod, pariatur magni quibusdam delectus ea voluptate veritatis optio excepturi ratione temporibus, repellat similique sit corporis consequatur? Ad, quibusdam excepturi.', '2', 2, 'storage/Payment_Proof_Upload_Images/z5LGG6m1ZWCUo211NmWPzLaj0qcKJW1RDRrHSv1q.jpg', 2, '50', '0', NULL, NULL, NULL, 'Osogbo', 'Osun', 'cGQ5aXqEF8SKkMuSRPzO0XjjU6KFANDh', '2022-03-02 01:02:54', '2022-03-03 04:00:35'),
(2, 'samuelsmith@gmail.com', 7, 'Samuel Smith', '08108554110', 'Phone', 'Samsumg S8', '346785878623', 'Flash Light', 'uiowpetkUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFnks', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla laudantium, distinctio voluptatem, possimus magni nostrum reprehenderit totam aperiam at vitae perferendis veritatis. Pariatur architecto, numquam esse voluptas ratione aliquam earum?', '0', 0, NULL, 0, NULL, '0', NULL, NULL, NULL, 'Ilorin', 'Kwara', 'F7m0maOm42WUKrqP8p44ukHVumLx7LGT', '2022-03-02 02:03:30', '2022-03-02 02:03:30'),
(3, 'samuelsmith@gmail.com', 7, 'Samuel Smith', '08108554110', 'Laptop', 'DESKTOP 580XC', '345678907890', 'IC', 'TqNUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFKlJ', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla laudantium, distinctio voluptatem, possimus magni nostrum reprehenderit totam aperiam at vitae perferendis veritatis. Pariatur architecto, numquam esse voluptas ratione aliquam earum?', '0', 0, NULL, 0, NULL, '0', NULL, NULL, NULL, 'Delta', 'Osun', 'iSqAODmk86V8zi5gjlXrCiWmcvkZoQiM', '2022-03-02 02:10:34', '2022-03-02 02:10:34'),
(4, 'danielmatthew@gmail.com', 4, 'Daniel Mathew', '08108554110', 'Laptop', 'Samsumg S8', '345678907890', 'KeyPad', 'uiowpetkUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFnks', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque minima temporibus deserunt illum, asperiores voluptatem cupiditate excepturi consequatur fuga nulla dicta impedit fugit autem pariatur rerum saepe sequi vero itaque!', '3', 1, NULL, 0, '10', '0', NULL, NULL, NULL, 'Ilorin', 'Kwara', 'HoiWV0a53cIIwLAFROnNI6oFfbC6uP37', '2022-03-03 04:34:01', '2022-03-03 04:42:23'),
(5, 'danielmatthew@gmail.com', 4, 'Daniel Mathew', '07054977409', 'Phone', 'Samsumg S8', '346785878623', 'Broken Screen', 'uiowpetkUIcTYbnjHYSmVMEqEEZE58AZ0Ukz7sfAhFnks', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ullam ducimus eos optio, hic dolorum temporibus ratione commodi eum ipsa nulla, earum voluptatibus placeat maxime accusamus. Autem, modi rem. Temporibus!', '2', 2, 'storage\\Payment_Proof_Upload_Images\\paid\\paid-g21daab019_640.png', 2, '10', '0', NULL, NULL, NULL, 'tyug', 'Kwara', 'jNcKZoycsnyMtuDq1XBtaXZKmwMqCb89', '2022-03-03 05:01:08', '2022-03-03 05:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `possible_problems`
--

CREATE TABLE `possible_problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `possibleProblems` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `possible_problems`
--

INSERT INTO `possible_problems` (`id`, `possibleProblems`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Broken Screen', '6Vfn0HW3tatAtqMHxqSYpHwQHkNnZ5U0', '2022-02-03 05:34:34', '2022-02-03 05:34:34'),
(2, 'Charging Port', 'KLB0rwujsE5lut3B05thMS6QdYa64yEx', '2022-02-03 05:44:40', '2022-02-03 05:44:40'),
(5, 'Mouth Piece', 'rlNbif9U1MTQfTQP8gdeljDQohgE97CG', '2022-02-03 06:05:52', '2022-02-03 06:05:52'),
(6, 'Ear Piece', 'yvfLxZBzs6ZhF8Aqkld7fBTugRMjQHcz', '2022-02-03 13:25:14', '2022-02-03 13:25:14'),
(7, 'Flash Light', 'NJPSS343sH6RvPfMquSMNnwUwiTSg5XW', '2022-02-03 13:26:13', '2022-02-03 13:26:13'),
(8, 'KeyPad', 'djWh91AB8ddWPYoC3TCMycF3G7BtzjXR', '2022-02-05 22:14:25', '2022-02-05 22:14:25'),
(9, 'Battery', 'uY3ZXwpmNl9TF7GsgcMzWJ5reY6FjKzx', '2022-02-05 22:15:56', '2022-02-05 22:15:56'),
(14, 'IC', 'tGf05tZ4KD8H0SJhy0XNTMcKcXCdeCE7', '2022-02-10 00:19:44', '2022-02-10 00:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ridePrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rideCurrentLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rideCurrentCity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rideCurrentState` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stateName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `stateName`, `created_at`, `updated_at`) VALUES
(1, 'Kwara', '2022-02-10 00:01:22', '2022-02-10 00:01:22'),
(2, 'Osun', '2022-02-10 00:01:58', '2022-02-10 00:01:58'),
(3, 'Niger', '2022-02-10 00:02:10', '2022-02-10 00:02:10'),
(4, 'Kaduna', '2022-02-10 00:02:21', '2022-02-10 00:02:21'),
(5, 'Plateu', '2022-02-10 00:02:45', '2022-02-10 00:02:45'),
(6, 'Sokoto', '2022-02-10 00:02:55', '2022-02-10 00:02:55'),
(7, 'F.C.T', '2022-02-10 00:03:01', '2022-02-10 00:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `category`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Michael Aranmonise', 'admin', 'Kingmichael9812@gmail.com', '$2y$10$BetWIU5DHsepWWU1D0lSPuU6iMuTB5OfZzFhZjYo4OUOy0Py4.l/S', NULL, '2022-01-24 14:14:35', '2022-01-24 14:14:35'),
(4, 'Daniel Mathew', 'customer', 'danielmatthew@gmail.com', '$2y$10$Z6QTTd6J8/bNFTk1QE0hCOgEB.Bk0RjIkEEZC.Inz8Mvpusqk62ji', NULL, '2022-01-24 14:15:21', '2022-01-24 14:15:21'),
(6, 'Michael King', 'engineer', 'kingmichael872@gmail.com', '$2y$10$YLYXqTgLUWwj2nER1BlxQ.Grqw9GmBui1FMm7qY9ryP5iE3J.guXy', NULL, '2022-01-26 09:57:46', '2022-01-26 09:57:46'),
(7, 'Samuel Smith', 'customer', 'samuelsmith@gmail.com', '$2y$10$uAmN8yBXljs8LZQR9uiZouL9ilIEJQdEnOB7/5WajNIRPSZaBbpyW', NULL, '2022-01-29 00:43:16', '2022-01-29 00:43:16'),
(8, 'Michael Aranmonise', 'customer', 'Kingmichael98@gmail.com', '$2y$10$bgY1Covv6aaZtNa/hHRsJOJP5RP7.e7maMIwZcgAtfsHqGIcJ78ja', NULL, '2022-02-01 01:22:59', '2022-02-01 01:22:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `engineers_email_unique` (`email`);

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
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `possible_problems`
--
ALTER TABLE `possible_problems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `possible_problems_possible_problems_unique` (`possibleProblems`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `possible_problems`
--
ALTER TABLE `possible_problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
