-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2025 at 04:32 AM
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
-- Table structure for table `booked_seats`
--

CREATE TABLE `booked_seats` (
  `id` int NOT NULL,
  `booking_id` int NOT NULL,
  `showtime_id` int NOT NULL,
  `seat_number` varchar(10) NOT NULL COMMENT 'e.g., A1, B2, etc.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booked_seats`
--

INSERT INTO `booked_seats` (`id`, `booking_id`, `showtime_id`, `seat_number`) VALUES
(1, 1, 3, 'D4'),
(2, 2, 3, 'F4'),
(3, 2, 3, 'F5'),
(5, 4, 4, 'J10'),
(6, 4, 4, 'J9'),
(7, 4, 4, 'J8'),
(8, 5, 5, 'E1'),
(9, 5, 5, 'E2'),
(10, 6, 5, 'C5'),
(11, 6, 5, 'C4');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int NOT NULL,
  `user_id` int NOT NULL,
  `showtime_id` int NOT NULL,
  `num_tickets` int NOT NULL,
  `selected_seats` text NOT NULL COMMENT 'Comma-separated list of seat numbers',
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','credit_card','debit_card','upi','net_banking') NOT NULL,
  `booking_status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `showtime_id`, `num_tickets`, `selected_seats`, `total_amount`, `payment_method`, `booking_status`, `booking_date`) VALUES
(1, 19, 3, 1, 'D4', '159.00', 'cash', 'confirmed', '2025-03-30 13:22:47'),
(2, 19, 3, 2, 'F4,F5', '318.00', 'upi', 'confirmed', '2025-03-30 13:52:14'),
(4, 20, 4, 3, 'J10,J9,J8', '597.00', 'cash', 'confirmed', '2025-03-31 13:05:38'),
(5, 15, 5, 2, 'E1,E2', '398.00', 'upi', 'confirmed', '2025-03-31 13:20:25'),
(6, 18, 5, 2, 'C5,C4', '398.00', 'debit_card', 'confirmed', '2025-03-31 13:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `genre_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
(2, 'Action', '2025-03-21 12:15:35', '2025-03-21 12:15:35'),
(13, 'Comedy', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(14, 'Drama', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(15, 'Horror', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(16, 'Science Fiction', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(17, 'Romance', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(18, 'Thriller', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(19, 'Animation', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(20, 'Documentary', '2025-03-21 12:16:26', '2025-03-21 12:16:26'),
(21, 'Fantasy', '2025-03-21 12:16:26', '2025-03-21 12:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `duration` int NOT NULL,
  `age_rating` varchar(10) NOT NULL,
  `description` text,
  `poster_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `release_date`, `duration`, `age_rating`, `description`, `poster_path`) VALUES
(1, 'pappu', '2025-03-01', 55, 'PG', 'pappi pandos', '67cd9a8f50fe7.jpg'),
(3, 'AVATAR', '2025-03-06', 175, 'PG-13', 'Avatar (disambiguation).\r\nAvatar\r\n\r\nLogo used since 2022\r\nCreated by	James Cameron\r\nOriginal work	Avatar (2009)\r\nOwners	20th Century Studios\r\nLightstorm Entertainment\r\nYears	2009–present\r\nPrint publications\r\nGraphic novel(s)	Avatar: The High Ground (2022–2023)\r\nFilms and television\r\nFilm(s)	\r\nAvatar (2009)\r\nAvatar: The Way of Water (2022)\r\nAvatar: Fire and Ash (2025)\r\nAvatar 4 (2029)\r\nAvatar 5 (2031)\r\nGames\r\nVideo game(s)	\r\nAvatar: The Game (2009)\r\nAvatar: Pandora Rising (2020)\r\nAvatar: Frontiers of Pandora (2023)\r\nAudio\r\nSoundtrack(s)	\r\nAvatar (2009)\r\nAvatar: The Way of Water (2022)\r\nAvatar: Frontiers of Pandora (2023)\r\nOriginal music	\r\nI See You\r\nNothing Is Lost\r\nMiscellaneous\r\nToy(s)	Lego Avatar\r\nTheme park attraction(s)	\r\nAvatar Flight of Passage (2017)\r\nNa\'vi River Journey (2017)\r\nOfficial website\r\nwww.avatar.com Edit this at Wikidata\r\nAvatar is an American epic science fiction media franchise created by James Cameron, which began with the eponymous 2009 film. Produced by 20th Century Studios and distributed by Lightstorm Entertainment, it consists of associated merchandise, video games, and theme park attractions.[1]', '67ea92e39ce13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_cast`
--

CREATE TABLE `movie_cast` (
  `cast_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `actor_name` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `character_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie_cast`
--

INSERT INTO `movie_cast` (`cast_id`, `movie_id`, `actor_name`, `role`, `character_name`) VALUES
(14, 3, 'Sam Worthington', 'Lead Actor', 'Jake Sully'),
(15, 3, 'Zoe Saldaña', 'Lead Actress', 'Neytiri(as Zoë Saldana)'),
(16, 1, 'tito', 'Lead Actor', 'titumamu');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `genre_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`genre_id`, `movie_id`, `genre_name`) VALUES
(16, 3, 'Action'),
(17, 3, 'Horror'),
(18, 1, 'Comedy'),
(19, 1, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `id` int NOT NULL,
  `theater_id` int NOT NULL,
  `screen_name` varchar(100) NOT NULL,
  `screen_type` varchar(50) NOT NULL,
  `seating_capacity` int NOT NULL,
  `rows` int NOT NULL,
  `cols` int NOT NULL,
  `layout_type` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `theater_id`, `screen_name`, `screen_type`, `seating_capacity`, `rows`, `cols`, `layout_type`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, '1', 'Regular Theater', 55, 10, 10, 'Stadium', 'active', '2025-03-18 13:35:53', '2025-03-30 12:17:15'),
(6, 1, '2', 'Premium Theater', 55, 5, 5, 'Recliner', 'active', '2025-03-31 13:19:23', '2025-03-31 13:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `id` int NOT NULL,
  `movie_id` int NOT NULL,
  `theater_id` int NOT NULL,
  `screen_id` int NOT NULL,
  `showtime_date` date NOT NULL,
  `showtime_time` time NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('active','cancelled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`id`, `movie_id`, `theater_id`, `screen_id`, `showtime_date`, `showtime_time`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, '2025-03-19', '09:15:00', '199.00', 'active', '2025-03-18 14:19:51', '2025-03-18 14:19:51'),
(2, 1, 2, 4, '2025-03-22', '21:17:00', '199.00', 'active', '2025-03-21 13:33:06', '2025-03-21 13:33:06'),
(3, 1, 2, 4, '2025-03-30', '09:45:00', '159.00', 'active', '2025-03-30 12:11:23', '2025-03-30 12:11:23'),
(4, 3, 2, 4, '2025-03-31', '21:34:00', '199.00', 'active', '2025-03-31 13:04:56', '2025-03-31 13:04:56'),
(5, 3, 1, 6, '2025-03-31', '21:49:00', '199.00', 'active', '2025-03-31 13:19:59', '2025-03-31 13:19:59'),
(6, 3, 2, 4, '2025-04-01', '22:46:00', '150.00', 'active', '2025-04-01 16:16:22', '2025-04-01 16:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `rating` int NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Inactive',
  `owner_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`id`, `title`, `area`, `rating`, `status`, `owner_name`, `email`, `password_hash`, `created_at`, `updated_at`) VALUES
(1, 'cosmoplex', 'rajkot', 4, 'Active', 'admin', 'admin@gmail.com', '$2y$10$/QXxZq9XRKOerzJrkFolWOJ.bv/I/L.WYWVk8LXUUc5J7/9axgEyi', '2025-03-16 13:29:40', '2025-03-18 13:53:21'),
(2, 'imax', 'rajkot', 2, 'Active', 'admin', 'admin1@gmail.com', '$2y$10$snMYfgNLDMZpm.TKGVsx5.UE2ef5ynMKUvSkxXx5OqbsZgOYIomHa', '2025-03-16 13:32:54', '2025-03-18 13:53:51'),
(3, 'pandu', 'rajkot', 4, 'Inactive', 'admin', 'admisdfesfn@gmail.com', '$2y$10$9foyHru01Hf8cOmfjThfC.j8/EOQQwxFZLNRSDjBQrFNvvawjyOeW', '2025-03-30 15:45:17', '2025-03-30 15:45:17'),
(4, 'cosmoplex', 'rajkot', 2, 'Inactive', 'admin', 'admisdfsn@gmail.com', '$2y$10$aE5qwEIxDfIqVDO8lXD14.4pl0RA/CM.EeqVqUldUJo1jz4.hBDni', '2025-03-30 15:45:52', '2025-03-30 15:45:52'),
(6, 'gdgdr', 'rajkot', 1, 'Inactive', 'admin', 'awefedmin@gmail.com', '$2y$10$dB8xYNWImDwmBxVDue9wpOkFdT6Bg6vqAcqh5ixk45wXgYOirtha.', '2025-03-30 15:47:02', '2025-03-30 15:47:02'),
(7, 'pandudg', 'rajkot', 5, 'Inactive', 'admin', 'adminfdf@gmail.com', '$2y$10$eQI/0AEWPFGvPQuqUmBeJuT25MA5iwQyqNWEaVXbnx62o/vmncB5q', '2025-03-30 15:47:27', '2025-03-30 15:47:27');

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
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'profile-pic.png',
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
(19, 'admin', 'admin@gmail.com', '$2y$10$SyDlRS.ZoYTFPua1TmLxsOrznt44o7iZoXlousNj4jEL5Thg//0LK', 'active', 'admin', 'profile-pic.png', '8238186558', '2025-01-29 14:40:01'),
(20, 'nisha', 'nisha@gmail.com', '$2y$10$QDvCrwjmegc9c9d6hh5jk.8LIWwMVofOO0YlWpvSfMVeKKEbTrRPW', 'active', 'user', '', '6238186558', '2025-01-30 15:03:21'),
(21, 'Wendy Sears', 'jexaw@mailinator.com', '$2y$10$RGeE5rUKyyVjyKD4C326U.5c/s9FdcZPcGXazFZmSAcZS/ISe9FG6', 'active', 'user', '', '1234567840', '2025-01-30 15:52:02'),
(22, 'Tushar Ravaliya', 'admidn@gmail.com', '$2y$10$M7PF/Jktk0kHo3X6jhzypubgekkmqhhISitOJ8v3eEspoveXXaHyq', 'active', 'user', '1738657733_1279868.jpg', '8238186558', '2025-02-04 13:58:53'),
(23, 'nisha', 'nisha12@gmail.com', '$2y$10$gyaIb2K61050JJX7LikOn.DPa/bwXmoCtFZ3xKX4R9zgf7.U0Q/vy', 'active', 'user', '1738835111_wallhaven-l3zmwy_1920x1080.png', '0987654322', '2025-02-06 15:15:11'),
(24, 'Tushar Ravaliya', 'admisfsen@gmail.com', '$2y$10$4m3pfwSEmHUkWWCV2uHppeXpUTaamaBFM4Kgf5UesjbFZCOcmP5we', 'active', 'user', '', '8238186553', '2025-02-25 15:12:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_seats`
--
ALTER TABLE `booked_seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `showtime_id` (`showtime_id`,`seat_number`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `showtime_id` (`showtime_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD PRIMARY KEY (`cast_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `theater_id` (`theater_id`),
  ADD KEY `screen_id` (`screen_id`);

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
-- AUTO_INCREMENT for table `booked_seats`
--
ALTER TABLE `booked_seats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie_cast`
--
ALTER TABLE `movie_cast`
  MODIFY `cast_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_seats`
--
ALTER TABLE `booked_seats`
  ADD CONSTRAINT `booked_seats_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_seats_ibfk_2` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`id`);

--
-- Constraints for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD CONSTRAINT `movie_cast_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE;

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE;

--
-- Constraints for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `showtimes_ibfk_2` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`),
  ADD CONSTRAINT `showtimes_ibfk_3` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
