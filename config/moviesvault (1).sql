-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2025 at 09:44 AM
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
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `movie_id` int NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `duration` int NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `id` int NOT NULL,
  `theatername` varchar(255) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `contact` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
  `number` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `pic`, `number`, `created_at`) VALUES
(1, 'Tushar Ravaliya', 'tushar.ravaliya18@gmail.com', '$2y$10$nfBw9V0ha8YF6dpeVLPd.eqfarRMBllcDw/CDKkmn5g5oAT0/5YR.', 'active', 'user', '1736097138_bdd40c190ad2e650a5f54c7548fb1fb2.jpg', '8238186558', '2025-01-29 14:40:01'),
(2, 'harshit nananiya', 'nananiyaharshit@gmail.com', '$2y$10$a8cMAQpFoi6yf0z05fosmOBluvN5DXBJRR8gnFAYS16ca1IJaPcqy', 'active', 'user', '1736098166_wallhaven-l86opp_1920x1080.png', '8238184558', '2025-01-29 14:40:01'),
(3, 'John Doe', 'john.doe@example.com', 'password123', 'active', 'user', 'john.jpg', '1234567890', '2025-01-29 14:40:01'),
(4, 'Jane Smith', 'jane.smith@example.com', 'securepass', 'active', 'user', 'jane.png', '0987654321', '2025-01-29 14:40:01'),
(5, 'Alice Johnson', 'alice.johnson@example.com', 'alicepass', 'inactive', 'admin', NULL, '1122334455', '2025-01-29 14:40:01'),
(6, 'Bob Brown', 'bob.brown@example.com', 'bobsecure', 'active', 'user', 'bob.jpg', '6677889900', '2025-01-29 14:40:01'),
(7, 'Charlie Davis', 'charlie.davis@example.com', 'charlie123', 'active', 'user', NULL, '7788990011', '2025-01-29 14:40:01'),
(8, 'Emily Wilson', 'emily.wilson@example.com', 'emilypass', 'inactive', 'user', 'emily.png', '4455667788', '2025-01-29 14:40:01'),
(9, 'Frank Moore', 'frank.moore@example.com', 'frank123', 'active', 'admin', 'frank.jpg', '3344556677', '2025-01-29 14:40:01'),
(10, 'Grace Lee', 'grace.lee@example.com', 'gracelee', 'active', 'user', NULL, '9988776655', '2025-01-29 14:40:01'),
(11, 'Henry King', 'henry.king@example.com', 'henrypass', 'inactive', 'user', 'henry.jpg', '5566778899', '2025-01-29 14:40:01'),
(12, 'Ivy Green', 'ivy.green@example.com', 'ivypass', 'active', 'admin', 'ivy.png', '4433221100', '2025-01-29 14:40:01'),
(13, 'Jack White', 'jack.white@example.com', 'jackwhite', 'active', 'user', NULL, '2233445566', '2025-01-29 14:40:01'),
(14, 'Kelly Black', 'kelly.black@example.com', 'kellyblack', 'inactive', 'user', 'kelly.jpg', '1122003344', '2025-01-29 14:40:01'),
(15, 'Luke Gray', 'luke.gray@example.com', 'lukegray', 'active', 'user', 'luke.png', '6677001122', '2025-01-29 14:40:01'),
(16, 'Mia Young', 'mia.young@example.com', 'miapass', 'inactive', 'admin', 'mia.jpg', '5544332211', '2025-01-29 14:40:01'),
(17, 'Noah Hall', 'noah.hall@example.com', 'noah123', 'active', 'user', NULL, '9988007766', '2025-01-29 14:40:01'),
(18, 'Tushar Ravaliya', 'ahirt889@gmail.com', '$2y$10$zWfXjXwwyzC0AYnRm7UTOexhzGWxMOuy6KRZqwrOWo.DnZ3/ryVqW', 'active', 'user', '', '0823186558', '2025-01-29 14:40:01'),
(19, 'admin', 'admin@gmail.com', '$2y$10$SyDlRS.ZoYTFPua1TmLxsOrznt44o7iZoXlousNj4jEL5Thg//0LK', 'active', 'admin', '', '8238186558', '2025-01-29 14:40:01'),
(20, 'nisha', 'nisha@gmail.com', '$2y$10$QDvCrwjmegc9c9d6hh5jk.8LIWwMVofOO0YlWpvSfMVeKKEbTrRPW', 'active', 'user', '', '6238186558', '2025-01-30 15:03:21'),
(21, 'Wendy Sears', 'jexaw@mailinator.com', '$2y$10$RGeE5rUKyyVjyKD4C326U.5c/s9FdcZPcGXazFZmSAcZS/ISe9FG6', 'active', 'user', '', '1234567840', '2025-01-30 15:52:02'),
(22, 'Tushar Ravaliya', 'admidn@gmail.com', '$2y$10$M7PF/Jktk0kHo3X6jhzypubgekkmqhhISitOJ8v3eEspoveXXaHyq', 'active', 'user', '1738657733_1279868.jpg', '8238186558', '2025-02-04 13:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `OwnerID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
