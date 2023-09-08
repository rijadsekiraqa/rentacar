-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2023 at 04:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentacar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicle_id` int DEFAULT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` enum('Confirmed','Canceled','Not confirmed yet','') NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `vehicle_id`, `fromdate`, `todate`, `total`, `status`, `created_at`, `updated_at`) VALUES
(78, 'Rijad Sekiraqa', NULL, '2023-06-13', '2023-06-15', 'Qmimi Total: 70 euro', 'Canceled', '2023-06-12 22:44:46', '2023-08-17 22:53:47'),
(79, 'Rijad Sekiraqa', NULL, '2023-06-13', '2023-06-14', 'Qmimi Total: 35 euro', 'Confirmed', '2023-06-13 19:52:41', '2023-08-17 22:22:02'),
(80, 'Rijad Sekiraqa', 117, '2023-06-13', '2023-06-14', 'Qmimi Total: 35 euro', 'Confirmed', '2023-06-13 19:58:33', '2023-08-17 22:42:53'),
(81, 'Rijad Sekiraqa', 102, '2023-06-13', '2023-06-14', 'Qmimi Total: 35 euro', 'Confirmed', '2023-06-13 19:59:32', '2023-08-17 22:51:58'),
(82, 'Rijad Sekiraqa', 102, '2023-06-14', '2023-06-16', 'Qmimi Total: 70 euro', 'Confirmed', '2023-06-13 23:13:24', '2023-08-17 23:23:47'),
(83, 'Rijad Sekiraqa', 102, '2023-06-14', '2023-06-16', 'Qmimi Total: 70 euro', '', '2023-06-13 23:14:30', '2023-06-13 23:14:30'),
(84, 'Rijad Sekiraqa', 119, '2023-06-16', '2023-06-17', 'Qmimi Total: 35 euro', '', '2023-06-15 22:16:00', '2023-06-15 22:16:00'),
(85, 'Rijad Sekiraqa', 119, '2023-06-16', '2023-06-17', 'Qmimi Total: 35 euro', '', '2023-06-15 22:31:24', '2023-06-15 22:31:24'),
(86, 'Rijad Sekiraqa', 117, '2023-06-17', '2023-06-19', 'Qmimi Total: 70 euro', '', '2023-06-16 21:57:00', '2023-06-16 21:57:00'),
(87, 'Rijad Sekiraqa', 117, '2023-06-17', '2023-06-19', 'Qmimi Total: 70 euro', '', '2023-06-16 21:57:12', '2023-06-16 21:57:12'),
(88, 'Rijad Sekiraqa', 119, '2023-06-17', '2023-06-18', 'Qmimi Total: 25 euro', '', '2023-06-16 21:59:00', '2023-06-16 21:59:00'),
(89, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 21:09:35', '2023-07-20 21:09:35'),
(90, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 21:38:11', '2023-07-20 21:38:11'),
(91, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 21:38:50', '2023-07-20 21:38:50'),
(92, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 22:24:34', '2023-07-20 22:24:34'),
(93, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 22:27:58', '2023-07-20 22:27:58'),
(94, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 22:31:09', '2023-07-20 22:31:09'),
(95, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 22:31:46', '2023-07-20 22:31:46'),
(96, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 22:32:01', '2023-07-20 22:32:01'),
(97, 'Rijad Sekiraqa', 102, '2023-07-21', '2023-07-22', 'Qmimi Total: 35 euro', '', '2023-07-20 22:36:08', '2023-07-20 22:36:08'),
(98, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-29', 'Qmimi Total: 105 euro', '', '2023-07-25 23:16:52', '2023-07-25 23:16:52'),
(99, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-28', 'Qmimi Total: 70 euro', '', '2023-07-26 00:37:01', '2023-07-26 00:37:01'),
(100, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-27', 'Qmimi Total: 35 euro', '', '2023-07-26 00:43:53', '2023-07-26 00:43:53'),
(101, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-27', 'Qmimi Total: 35 euro', '', '2023-07-26 00:48:33', '2023-07-26 00:48:33'),
(102, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-28', 'Qmimi Total: 70 euro', '', '2023-07-26 00:49:00', '2023-07-26 00:49:00'),
(103, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-29', 'Qmimi Total: 105 euro', '', '2023-07-26 00:54:03', '2023-07-26 00:54:03'),
(104, 'Rijad Sekiraqa', 102, '2023-07-26', '2023-07-27', 'Qmimi Total: 35 euro', '', '2023-07-26 01:01:04', '2023-07-26 01:01:04'),
(105, 'Rijad Sekiraqa', 102, '2023-07-27', '2023-07-28', 'Qmimi Total: 35 euro', '', '2023-07-26 22:06:25', '2023-07-26 22:06:25'),
(106, 'Rijad Sekiraqa', 102, '2023-07-27', '2023-07-28', 'Qmimi Total: 35 euro', '', '2023-07-26 22:07:41', '2023-07-26 22:07:41'),
(107, 'Rijad Sekiraqa', 117, '2023-07-30', '2023-07-31', 'Qmimi Total: 35 euro', '', '2023-07-29 23:18:10', '2023-07-29 23:18:10'),
(108, 'as', 117, '2023-08-01', '2023-08-24', 'Qmimi Total: 805 euro', '', '2023-07-31 23:07:03', '2023-07-31 23:07:03'),
(109, 'Rijad Sekiraqa', 102, '2023-08-14', '2023-08-16', '70 euro', '', '2023-08-14 12:57:29', '2023-08-14 12:57:29'),
(110, 'Rijad Sekiraqa', 102, '2023-08-16', '2023-08-17', '35 euro', 'Confirmed', '2023-08-15 22:45:16', '2023-08-17 22:26:22'),
(111, 'Rijad Sekiraqa', 102, '2023-08-18', '2023-08-25', '245 euro', 'Confirmed', '2023-08-17 22:26:48', '2023-08-17 23:30:31'),
(112, 'Rijad Sekiraqa', 117, '2023-08-19', '2023-08-24', '175 euro', 'Confirmed', '2023-08-18 22:22:40', '2023-08-18 22:22:40'),
(113, 'Rijad Sekiraqa', 102, '2023-08-21', '2023-08-22', '35 euro', 'Confirmed', '2023-08-20 22:14:07', '2023-08-20 22:14:07'),
(114, 'Rijad Sekiraqa', 102, '2023-08-21', '2023-08-22', '35 euro', 'Confirmed', '2023-08-20 22:26:22', '2023-08-20 22:26:22'),
(115, 'Rijad Sekiraqa', 102, '2023-08-21', '2023-08-22', '35 euro', 'Confirmed', '2023-08-21 16:02:59', '2023-08-21 16:02:59'),
(116, 'Rijad Sekiraqa', 117, '2023-08-22', '2023-08-23', '35 euro', 'Canceled', '2023-08-22 13:19:06', '2023-08-22 13:19:24'),
(117, 'Rijad Sekiraqa', 117, '2023-08-22', '2023-08-23', '35 euro', 'Confirmed', '2023-08-22 13:20:10', '2023-08-22 13:20:20'),
(118, 'Rijad Sekiraqa', 102, '2023-08-22', '2023-08-25', '105 euro', 'Not confirmed yet', '2023-08-22 21:00:25', '2023-08-22 21:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bmw', '2023-05-11 17:20:10', '2023-05-14 23:51:23'),
(2, 'Audi', '2023-05-11 17:20:14', '2023-05-14 23:51:16'),
(4, 'Mercedes', '2023-05-11 17:20:24', '2023-05-14 23:51:31'),
(5, 'Volkswagen', '2023-05-14 23:50:50', '2023-05-14 23:50:50'),
(6, 'Opel', '2023-05-14 23:51:05', '2023-05-14 23:51:05'),
(7, 'Peugeot', '2023-05-14 23:52:14', '2023-05-14 23:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `surname`, `email`, `phone`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rijad ', 'Sekiraqa', 'rijads@gmail.com', '044232121', 'Rruga Hakif Zejnullahu,Podujeve', 'admin', '2023-06-26 14:39:06', '2023-06-26 14:39:06'),
(2, 'adsfdsaf', 'dfasfad', 'rijads1@gmail.com', '0434343', 'Rruga Hakif ', '123123', '2023-06-25 20:24:51', '2023-08-09 22:05:23'),
(3, 'sssssss', NULL, 'rijadsekiraqa22@gmail.com', '04343432323', NULL, 'rijad1111', '2023-07-09 23:09:14', '2023-07-09 23:09:14'),
(5, 'Rijad Sekiraqa', NULL, 'rijadsekiraqa21@gmail.com', '04343432323', NULL, 'rijad1111', '2023-07-09 23:14:05', '2023-07-09 23:14:05'),
(7, 'Rijad Sekiraqa', NULL, 'rijadsekiraqa24@gmail.com', '04343432323', NULL, 'rijad1111', '2023-07-09 23:14:37', '2023-07-09 23:14:37'),
(8, 'Rijad Sekiraqa', NULL, 'rijadsekiraqa25@gmail.com', '04343432323', NULL, 'rijad1111', '2023-07-09 23:18:14', '2023-07-09 23:18:14'),
(9, 'Rijad Sekiraqa', NULL, 'sssssssss', '123', NULL, '123', '2023-07-09 23:24:58', '2023-07-09 23:24:58'),
(10, 'Rijad Sekiraqa', NULL, 'rijadsekiraqa11@gmail.com', '123123', NULL, '123123', '2023-07-10 21:59:05', '2023-07-10 21:59:05'),
(11, 'Rijad Sekiraqa', NULL, 'admin', '123123', NULL, '1231', '2023-07-10 22:06:08', '2023-07-10 22:06:08'),
(13, 'assasa', NULL, 'assaas', 'sasasa', NULL, 'asaas', '2023-07-10 22:20:09', '2023-07-10 22:20:09'),
(15, 'Rijad Sekiraqa', NULL, 'rijadsekiraqa@gmail.com', 'asd', NULL, 'asd', '2023-07-10 22:20:36', '2023-07-10 22:20:36'),
(18, 'Rijad Sekiraqa', NULL, 'rijadsekiraqaaaa@gmail.com', '123', NULL, '123', '2023-07-10 22:24:05', '2023-07-10 22:24:05'),
(19, 'aas', NULL, 'aaaaaaaaaaa', '123', NULL, '123', '2023-07-10 22:24:49', '2023-07-10 22:24:49'),
(20, 'Rijad Sekiraqa', NULL, 'rijadsekiraqaaaaaaaaaaa@gmail.com', 'sadsaasd', NULL, 'sad', '2023-07-10 22:26:19', '2023-07-10 22:26:19'),
(21, 'Rijad Sekiraqa', NULL, 'rijadssssss@hotmail.com', '04580321213', NULL, 'rijadi123', '2023-09-06 15:06:48', '2023-09-06 15:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(3, 'sasasa', 'rijadsekiraqa7@gmail.com', '045801212', 'afdfaddfdfsadadsffds', '2023-05-19 22:31:32', '2023-05-19 22:31:32'),
(10, 'dsasdas', 'rijad12@gmail.com', '4334343434', 'afdfadfadafdsasas', '2023-05-19 22:37:09', '2023-05-19 22:37:09'),
(11, 'adsdasffdasasdfff', 'rijad123@gmail.com', '43343434343', 'dfasdasfsfadasfffff', '2023-05-19 22:37:23', '2023-05-20 00:42:21'),
(12, 'assaas', 'rijad12@gmail.com', '4334343434', 'assasasa', '2023-05-21 21:31:44', '2023-05-21 21:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `image` json NOT NULL,
  `title` varchar(255) NOT NULL,
  `paragraph` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `paragraph`, `created_at`, `updated_at`) VALUES
(1, '[\"shkolla-programimit-logo.png\"]', 'adffd', 'fadsfdasfdsafds', '2023-08-01 12:30:19', '2023-08-01 12:30:19'),
(2, '[\"shkolla-programimit-logo.png\"]', 'adsffadssfa', 'ffadsdfasaf', '2023-08-01 12:31:03', '2023-08-01 12:31:03'),
(3, '[\"2018-golf-gtd-variant-wallpaper-preview.jpg\"]', 'afafsa', 'fsasfdsffsdasf', '2023-08-04 23:10:22', '2023-08-04 23:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rijad', 'Rijadd', 'rijadsekiraqa@gmail.com', 'admin123', NULL, '2023-05-23 11:36:19'),
(2, 'Rijaddd', 'Rijad', 'rijad@gmail.com', 'admin123', NULL, '2023-05-20 00:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `overview` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `cubical` varchar(50) NOT NULL,
  `power` int NOT NULL,
  `mileage` int NOT NULL,
  `year` int NOT NULL,
  `seat` int NOT NULL,
  `photo` varchar(50) NOT NULL,
  `photo1` json DEFAULT NULL,
  `airconditioner` tinyint(1) NOT NULL,
  `powerdoorlocks` tinyint(1) NOT NULL,
  `antilock` tinyint(1) NOT NULL,
  `brakeassist` tinyint(1) NOT NULL,
  `powersteering` tinyint(1) NOT NULL,
  `driverairbag` tinyint(1) NOT NULL,
  `passengerairbag` tinyint(1) NOT NULL,
  `powerwindows` tinyint(1) NOT NULL,
  `cdplayer` tinyint(1) NOT NULL,
  `centralock` tinyint(1) NOT NULL,
  `crashsensor` tinyint(1) NOT NULL,
  `leatherseats` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `brand_id`, `overview`, `transmission`, `price`, `fuel`, `cubical`, `power`, `mileage`, `year`, `seat`, `photo`, `photo1`, `airconditioner`, `powerdoorlocks`, `antilock`, `brakeassist`, `powersteering`, `driverairbag`, `passengerairbag`, `powerwindows`, `cdplayer`, `centralock`, `crashsensor`, `leatherseats`, `created_at`, `updated_at`) VALUES
(102, 'Golf 6 Rline', '5', 'Golf 6 Gtd i vitit 2013.Ngjyra e kuqe limuzine.', 'Manual', 35, 'Diesel', '2.0', 140, 213222, 2011, 5, '', '[\"golf6rline.jpg\", \"golf6rline2.jpg\", \"golf6rline3.jpg\", \"golf6rlineinterior.jpg\", \"golf6rlineinterior2.jpg\"]', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-05-17 13:08:48', '2023-06-14 19:55:46'),
(117, 'Golf 7 GTD', '5', 'Golf 7 GTD është më shumë se  një veturë- është një eksperiencë e veçantë e vozitjes që të bën të ndjehesh me stil në çdo rrugë.\r\n', 'Automatik', 35, 'Diesel', '2.0', 184, 176322, 2017, 5, 'file_name', '[\"golf7gtd.jpg\", \"golf7gtd2.jpg\", \"golf7gtd3.jpg\", \"golf7gtdinterior.jpg\", \"golf7gtdinterior2.jpg\"]', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-05-19 21:03:26', '2023-05-20 09:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
