-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 10:22 AM
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
  `vehicle_id` int NOT NULL,
  `fromdate` varchar(50) NOT NULL,
  `todate` varchar(50) NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `vehicle_id`, `fromdate`, `todate`, `total`, `created_at`, `updated_at`) VALUES
(1, 'rijad', 0, '05/04/2023', '14/05/2023', 35, '2023-05-18 19:40:50', '2023-05-18 19:40:50'),
(2, 'adf', 0, '05/04/2023', '14/05/2023', 22, '2023-05-18 23:47:19', '2023-05-18 23:47:19');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','client') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Rijad', 'Sekiraqa', 'rijadsekiraqa@gmail.com', 'admin123', 'admin', NULL, NULL),
(2, 'Rijad', 'Sekiraqa', 'rijad@gmail.com', 'admin123', 'client', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `overview` varchar(255) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `cubical` varchar(50) NOT NULL,
  `power` int NOT NULL,
  `mileage` int NOT NULL,
  `year` int NOT NULL,
  `seat` int NOT NULL,
  `photo` varchar(255) NOT NULL,
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
(101, 'Golf 7 GTD', '5', 'dsadsadsaa', 'Automatik', 40, 'Diesel', '2.0', 184, 170342, 2018, 5, 'file_name', '[\"golf7gtd.jfif\", \"golf7gtd2.jfif\", \"golf7gtd3.jfif\", \"golf7gtdinterior.jpg\", \"golf7gtdinterior2.jpg\"]', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-05-17 01:08:18', '2023-05-17 15:29:14'),
(102, 'Golf 6 Rline', '5', 'Golf 6 Gtd i vitit 2013.Ngjyra e kuqe limuzine.', 'Manual', 35, 'Diesel', '2.0', 140, 213222, 2011, 5, 'file_name', '[\"golf6rline.jpg\", \"golf6rline2.jpg\", \"golf6rline3.jpg\", \"golf6rlineinterior.jpg\", \"golf6rlineinterior2.jpg\"]', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-05-17 13:08:48', '2023-05-17 15:20:16'),
(106, 'saddsadsa', '1', 'sdadsadsa', 'Automatik', 22, 'Benzin', '2.0', 170, 2123123, 2012, 5, 'file_name', '[\"img_390x390.jpg\", \"\", \"\", \"\", \"\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-05-17 19:15:37', '2023-05-17 19:36:16'),
(108, 'dsdsadsadsa', '4', 'saddsasdada', 'Manual', 22, 'Diesel', '2.0', 170, 2123123, 2012, 5, 'file_name', '[\"2.png\", \"2.png\", \"2.png\", \"2.png\", \"2.png\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-05-17 19:40:44', '2023-05-17 19:41:22');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
