-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2023 at 02:52 PM
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

INSERT INTO `vehicles` (`id`, `name`, `brand_id`, `overview`, `transmission`, `price`, `fuel`, `year`, `seat`, `photo`, `photo1`, `airconditioner`, `powerdoorlocks`, `antilock`, `brakeassist`, `powersteering`, `driverairbag`, `passengerairbag`, `powerwindows`, `cdplayer`, `centralock`, `crashsensor`, `leatherseats`, `created_at`, `updated_at`) VALUES
(94, 'admin', '2', 'dsadssadads', '', 22, 'Diesel', 2023, 5, 'file_name', '[\"adminlogin.jpg\", \"logo.jpg\"]', 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2023-05-16 16:42:18', '2023-05-16 16:42:18'),
(95, 'saddsadsa', '1', 'sdadsasdaads', '', 25, 'Diesel', 2023, 5, 'file_name', '[\"about_us_img1.jpg\", \"about_services_faq_bg.jpg\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-05-16 18:01:39', '2023-05-16 18:01:39'),
(96, 'dasdsadas', '9', 'dsaadsasd', '', 25, 'Diesel', 2023, 5, 'file_name', '[\"about_us_img1.jpg\", \"01.jpg\", \"03.jpg\", \"2.png\", \"1270f621-600b72f9-react-1024x680-1.png\", \"car_755x430.png\", \"img_390x390.jpg\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-05-16 18:14:19', '2023-05-16 21:13:48'),
(97, 'asddsadsadsa', '4', 'asddaasdsa', '', 25, 'Diesel', 2023, 5, 'file_name', '[\"about_services_faq_bg.jpg\", \"about_us_img1.jpg\", \"about.jpg\", \"03.jpg\", \"01.jpg\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-05-16 18:39:09', '2023-05-16 18:39:09'),
(98, 'Golf 7', '5', 'Ipet Golf 7 me qersadknjsajdkjklda', '', 30, 'Diesel', 2023, 5, 'file_name', '[\"1270f621-600b72f9-react-1024x680-1.png\", null, null, null, null]', 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2023-05-16 18:42:34', '2023-05-16 21:50:07'),
(99, 'sasasaas', '2', 'asdsasda', '', 25, 'Diesel', 2023, 5, 'file_name', '[\"listing_img3.jpg\", \"\", \"\", \"\", \"\"]', 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2023-05-16 18:49:20', '2023-05-16 20:40:52'),
(100, 'dsaasdsa', '1', 'sdadsaads', '', 22, 'Diesel', 2023, 5, 'file_name', '[\"1270f621-600b72f9-react-1024x680-1.png\", \"about_us_img1.jpg\", \"about_services_faq_bg.jpg\", \"\", \"\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-05-16 23:01:48', '2023-05-16 23:01:48'),
(101, 'Golf 7 GTD', '5', 'dsadsadsaa', '', 2222, 'Diesel', 2018, 5, 'file_name', '[\"golf7gtd.jfif\", \"golf7gtd2.jfif\", \"golf7gtd3.jfif\", \"golf7gtdinterior.jpg\", \"golf7gtdinterior2.jpg\"]', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-05-17 01:08:18', '2023-05-17 11:36:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
