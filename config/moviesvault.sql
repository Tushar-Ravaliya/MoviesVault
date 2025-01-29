-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2025 at 04:53 AM
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
-- Database: `moviesvault`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `OwnerID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `number` varchar(15) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('admin','operator') DEFAULT 'operator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MovieID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Genre` varchar(50) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Duration` int DEFAULT NULL,
  `Language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `role` enum('user','admin','operator') DEFAULT 'user',
  `pic` varchar(255) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `pic`, `number`) VALUES
(1, 'Tushar Ravaliya', 'tushar.ravaliya18@gmail.com', '$2y$10$nfBw9V0ha8YF6dpeVLPd.eqfarRMBllcDw/CDKkmn5g5oAT0/5YR.', 'active', 'user', '1736097138_bdd40c190ad2e650a5f54c7548fb1fb2.jpg', '8238186558'),
(2, 'harshit nananiya', 'nananiyaharshit@gmail.com', '$2y$10$a8cMAQpFoi6yf0z05fosmOBluvN5DXBJRR8gnFAYS16ca1IJaPcqy', 'active', 'user', '1736098166_wallhaven-l86opp_1920x1080.png', '8238184558'),
(3, 'John Doe', 'john.doe@example.com', 'password123', 'active', 'user', 'john.jpg', '1234567890'),
(4, 'Jane Smith', 'jane.smith@example.com', 'securepass', 'active', 'user', 'jane.png', '0987654321'),
(5, 'Alice Johnson', 'alice.johnson@example.com', 'alicepass', 'inactive', 'admin', NULL, '1122334455'),
(6, 'Bob Brown', 'bob.brown@example.com', 'bobsecure', 'active', 'user', 'bob.jpg', '6677889900'),
(7, 'Charlie Davis', 'charlie.davis@example.com', 'charlie123', 'active', 'user', NULL, '7788990011'),
(8, 'Emily Wilson', 'emily.wilson@example.com', 'emilypass', 'inactive', 'user', 'emily.png', '4455667788'),
(9, 'Frank Moore', 'frank.moore@example.com', 'frank123', 'active', 'admin', 'frank.jpg', '3344556677'),
(10, 'Grace Lee', 'grace.lee@example.com', 'gracelee', 'active', 'user', NULL, '9988776655'),
(11, 'Henry King', 'henry.king@example.com', 'henrypass', 'inactive', 'user', 'henry.jpg', '5566778899'),
(12, 'Ivy Green', 'ivy.green@example.com', 'ivypass', 'active', 'admin', 'ivy.png', '4433221100'),
(13, 'Jack White', 'jack.white@example.com', 'jackwhite', 'active', 'user', NULL, '2233445566'),
(14, 'Kelly Black', 'kelly.black@example.com', 'kellyblack', 'inactive', 'user', 'kelly.jpg', '1122003344'),
(15, 'Luke Gray', 'luke.gray@example.com', 'lukegray', 'active', 'user', 'luke.png', '6677001122'),
(16, 'Mia Young', 'mia.young@example.com', 'miapass', 'inactive', 'admin', 'mia.jpg', '5544332211'),
(17, 'Noah Hall', 'noah.hall@example.com', 'noah123', 'active', 'user', NULL, '9988007766'),
(18, 'Tushar Ravaliya', 'ahirt889@gmail.com', '$2y$10$zWfXjXwwyzC0AYnRm7UTOexhzGWxMOuy6KRZqwrOWo.DnZ3/ryVqW', 'active', 'user', '', '0823186558'),
(19, 'admin', 'admin@gmail.com', '$2y$10$SyDlRS.ZoYTFPua1TmLxsOrznt44o7iZoXlousNj4jEL5Thg//0LK', 'active', 'admin', '', '8238186558');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`OwnerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `OwnerID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MovieID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
