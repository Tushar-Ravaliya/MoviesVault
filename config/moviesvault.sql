-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2025 at 12:21 PM
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
-- Table structure for table `aboutus_content`
--

CREATE TABLE `aboutus_content` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aboutus_content`
--

INSERT INTO `aboutus_content` (`id`, `title`, `content`, `image_path`, `last_updated`) VALUES
(1, 'Welcome to MoviesVault, your ultimate destination for hassle-free movie ticket booking!', 'At MoviesVault, we are passionate about bringing the magic of cinema closer to you. Whether you’re a die-hard movie buff or just looking for a fun night out, our platform makes booking tickets simple, fast, and convenient.', '../../public/Images/aboutus_image_1743675009.jpeg', '2025-04-03 10:10:09');

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
(11, 6, 5, 'C4'),
(12, 7, 12, 'A1'),
(13, 7, 12, 'A2'),
(14, 7, 12, 'A5'),
(15, 7, 12, 'A4'),
(16, 8, 14, 'A6'),
(17, 8, 14, 'B6'),
(18, 8, 14, 'C4'),
(19, 8, 14, 'D4'),
(20, 8, 14, 'E5'),
(21, 8, 14, 'F5'),
(22, 8, 14, 'G6'),
(23, 8, 14, 'H6'),
(24, 8, 14, 'I7'),
(25, 8, 14, 'J7'),
(27, 10, 10, 'A1'),
(28, 10, 10, 'B2'),
(29, 10, 10, 'C3'),
(30, 10, 10, 'D4'),
(31, 10, 10, 'E5'),
(32, 10, 10, 'F6'),
(33, 10, 10, 'G7'),
(34, 10, 10, 'H8'),
(35, 10, 10, 'I9'),
(36, 10, 10, 'J10'),
(37, 11, 16, 'J1'),
(38, 11, 16, 'J2'),
(39, 11, 16, 'J10'),
(40, 11, 16, 'J9');

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
(6, 18, 5, 2, 'C5,C4', '398.00', 'debit_card', 'confirmed', '2025-03-31 13:24:56'),
(7, 20, 12, 4, 'A1,A2,A5,A4', '40.00', 'cash', 'confirmed', '2025-04-03 05:54:56'),
(8, 19, 14, 10, 'A6,B6,C4,D4,E5,F5,G6,H6,I7,J7', '5550.00', 'debit_card', 'confirmed', '2025-04-03 10:00:26'),
(10, 19, 10, 10, 'A1,B2,C3,D4,E5,F6,G7,H8,I9,J10', '990.00', 'upi', 'confirmed', '2025-04-03 10:01:40'),
(11, 23, 16, 4, 'J1,J2,J10,J9', '796.00', 'cash', 'confirmed', '2025-04-06 07:15:19');

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
(2, 'Action', '2025-03-21 12:15:35', '2025-04-02 17:22:19'),
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
-- Table structure for table `homepage_content`
--

CREATE TABLE `homepage_content` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `homepage_content`
--

INSERT INTO `homepage_content` (`id`, `content`, `image_path`, `last_updated`) VALUES
(1, 'A movie, also known as a film or motion picture, is a visual art form that conveys stories, ideas, and emotions through moving images. Movies are made up of a series of still images that are projected onto a screen in rapid succession.', '../../public/Images/homepage_image_1743675153.png', '2025-04-03 10:12:33');

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
(3, 'AVATAR', '2025-03-06', 175, 'PG-13', 'Avatar (disambiguation).\r\nAvatar\r\n\r\nLogo used since 2022\r\nCreated by	James Cameron\r\nOriginal work	Avatar (2009)\r\nOwners	20th Century Studios\r\nLightstorm Entertainment\r\nYears	2009–present\r\nPrint publications\r\nGraphic novel(s)	Avatar: The High Ground (2022–2023)\r\nFilms and television\r\nFilm(s)	\r\nAvatar (2009)\r\nAvatar: The Way of Water (2022)\r\nAvatar: Fire and Ash (2025)\r\nAvatar 4 (2029)\r\nAvatar 5 (2031)\r\nGames\r\nVideo game(s)	\r\nAvatar: The Game (2009)\r\nAvatar: Pandora Rising (2020)\r\nAvatar: Frontiers of Pandora (2023)\r\nAudio\r\nSoundtrack(s)	\r\nAvatar (2009)\r\nAvatar: The Way of Water (2022)\r\nAvatar: Frontiers of Pandora (2023)\r\nOriginal music	\r\nI See You\r\nNothing Is Lost\r\nMiscellaneous\r\nToy(s)	Lego Avatar\r\nTheme park attraction(s)	\r\nAvatar Flight of Passage (2017)\r\nNa\'vi River Journey (2017)\r\nOfficial website\r\nwww.avatar.com Edit this at Wikidata\r\nAvatar is an American epic science fiction media franchise created by James Cameron, which began with the eponymous 2009 film. Produced by 20th Century Studios and distributed by Lightstorm Entertainment, it consists of associated merchandise, video games, and theme park attractions.[1]', '67ea92e39ce13.jpg'),
(4, 'marco', '2025-04-03', 155, 'PG-13', 'Adattu is one of the most renowned gold-trading families in Kerala. Unexpectedly, an incident shakes the Adattu family. George, the head of the family, sets out to uncover the truth and find those responsible. At the same time, his younger brother, Marco, embarks on the same quest but through a different Path.', '67ee02ae30841.jpg'),
(5, 'Mufasa : The Lion King', '2025-04-07', 165, 'PG-13', 'Lost and alone, orphaned cub Mufasa meets a sympathetic lion named Taka, the heir to a royal bloodline. The chance meeting sets in motion an expansive journey of an extraordinary group of misfits searching for their destinies.', '67ee537837532.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_cast`
--

CREATE TABLE `movie_cast` (
  `cast_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `actor_name` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `character_name` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie_cast`
--

INSERT INTO `movie_cast` (`cast_id`, `movie_id`, `actor_name`, `role`, `character_name`, `image_path`) VALUES
(14, 3, 'Sam Worthington', 'Lead Actor', 'Jake Sully', NULL),
(15, 3, 'Zoe Saldaña', 'Lead Actress', 'Neytiri(as Zoë Saldana)', NULL),
(16, 1, 'tito', 'Lead Actor', 'titumamu', NULL),
(17, 4, 'Unni Mukundan', 'Lead Actor', 'Unni Mukundan', 'cast/cast_67ee02ae3126b.jpg'),
(18, 5, 'Aaron Pierre', 'Lead Actor', 'as Mufasa (English)', 'cast/cast_67ee53783810f.avif'),
(19, 5, 'Shah Rukh Khan', 'Lead Actor', 'as Mufasa (Hindi)', 'cast/cast_67ee5378383d0.avif');

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
(19, 1, 'Drama'),
(20, 4, 'Action'),
(21, 4, 'Thriller'),
(22, 5, 'Action'),
(23, 5, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `movie_reviews`
--

CREATE TABLE `movie_reviews` (
  `review_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `review_text` text,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `movie_reviews`
--

INSERT INTO `movie_reviews` (`review_id`, `movie_id`, `user_id`, `rating`, `review_text`, `review_date`) VALUES
(1, 5, 23, '4.0', 'nise', '2025-04-06 07:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_otps`
--

CREATE TABLE `password_reset_otps` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_used` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_reset_otps`
--

INSERT INTO `password_reset_otps` (`id`, `user_id`, `email`, `otp`, `created_at`, `expires_at`, `is_used`) VALUES
(38, 1, 'tushar.ravaliya18@gmail.com', '856752', '2025-04-03 10:21:26', '2025-04-03 10:31:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_used` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `user_id`, `token`, `created_at`, `expires_at`, `is_used`) VALUES
(4, 1, 'f0a0d41b11a7181c6d32f0997f4ecc975ba8b204dc7a92a5f5168c550314368f', '2025-04-03 10:20:19', '2025-04-03 11:20:19', 0),
(5, 1, 'e62b2050884ef86db903f6f53b9ee843d23df5b6df77ea5cd3d6b419b2a80d1d', '2025-04-03 10:21:46', '2025-04-03 11:21:46', 1);

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
(6, 3, 2, 4, '2025-04-01', '22:46:00', '150.00', 'active', '2025-04-01 16:16:22', '2025-04-01 16:16:22'),
(7, 4, 2, 4, '2025-04-03', '09:15:00', '265.00', 'cancelled', '2025-04-03 03:54:06', '2025-04-03 04:16:46'),
(8, 4, 1, 6, '2025-04-03', '10:00:00', '250.00', 'cancelled', '2025-04-03 03:54:55', '2025-04-03 04:17:39'),
(9, 4, 2, 4, '2025-04-03', '09:15:00', '265.00', 'active', '2025-04-03 03:58:27', '2025-04-03 03:58:27'),
(10, 4, 2, 4, '2025-04-03', '11:29:00', '99.00', 'active', '2025-04-03 03:59:53', '2025-04-03 03:59:53'),
(11, 4, 2, 4, '2025-04-04', '00:30:00', '78.00', 'cancelled', '2025-04-03 04:00:22', '2025-04-03 04:18:36'),
(12, 3, 1, 6, '2025-04-03', '15:20:00', '10.00', 'active', '2025-04-03 05:53:47', '2025-04-03 05:53:47'),
(13, 4, 2, 4, '2025-04-03', '17:30:00', '199.00', 'active', '2025-04-03 09:00:55', '2025-04-03 09:00:55'),
(14, 3, 2, 4, '2025-04-03', '18:54:00', '555.00', 'active', '2025-04-03 09:24:18', '2025-04-03 09:24:18'),
(15, 3, 1, 6, '2025-04-05', '17:46:00', '199.00', 'active', '2025-04-03 10:17:53', '2025-04-03 10:17:53'),
(16, 5, 2, 4, '2025-04-06', '18:30:00', '199.00', 'active', '2025-04-06 07:14:53', '2025-04-06 07:14:53');

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
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'inactive',
  `role` enum('user','admin','operator') DEFAULT 'user',
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'profile-pic.png',
  `number` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `pic`, `number`, `created_at`, `activation_token`) VALUES
(1, 'Tushar Ravaliya', 'tushar.ravaliya18@gmail.com', '$2y$10$Z0Uey8OoH1KlmQSHGe5j1O.xruF9cG7MK51VKRo1eHdWZrqfFGTfS', 'active', 'user', '1736097138_bdd40c190ad2e650a5f54c7548fb1fb2.jpg', '8238186558', '2025-01-29 14:40:01', NULL),
(2, 'harshit nananiya', 'nananiyaharshit@gmail.com', '$2y$10$a8cMAQpFoi6yf0z05fosmOBluvN5DXBJRR8gnFAYS16ca1IJaPcqy', 'active', 'user', '1736098166_wallhaven-l86opp_1920x1080.png', '8238184558', '2025-01-29 14:40:01', NULL),
(3, 'John Doe', 'john.doe@example.com', 'password123', 'active', 'user', 'john.jpg', '1234567890', '2025-01-29 14:40:01', NULL),
(4, 'Jane Smith', 'jane.smith@example.com', 'securepass', 'active', 'user', 'jane.png', '0987654321', '2025-01-29 14:40:01', NULL),
(5, 'Alice Johnson', 'alice.johnson@example.com', 'alicepass', 'inactive', 'admin', NULL, '1122334455', '2025-01-29 14:40:01', NULL),
(6, 'Bob Brown', 'bob.brown@example.com', 'bobsecure', 'active', 'user', 'bob.jpg', '6677889900', '2025-01-29 14:40:01', NULL),
(7, 'Charlie Davis', 'charlie.davis@example.com', 'charlie123', 'active', 'user', NULL, '7788990011', '2025-01-29 14:40:01', NULL),
(8, 'Emily Wilson', 'emily.wilson@example.com', 'emilypass', 'inactive', 'user', 'emily.png', '4455667788', '2025-01-29 14:40:01', NULL),
(9, 'Frank Moore', 'frank.moore@example.com', 'frank123', 'active', 'admin', 'frank.jpg', '3344556677', '2025-01-29 14:40:01', NULL),
(10, 'Grace Lee', 'grace.lee@example.com', 'gracelee', 'active', 'user', NULL, '9988776655', '2025-01-29 14:40:01', NULL),
(11, 'Henry King', 'henry.king@example.com', 'henrypass', 'inactive', 'user', 'henry.jpg', '5566778899', '2025-01-29 14:40:01', NULL),
(12, 'Ivy Green', 'ivy.green@example.com', 'ivypass', 'active', 'admin', 'ivy.png', '4433221100', '2025-01-29 14:40:01', NULL),
(13, 'Jack White', 'jack.white@example.com', 'jackwhite', 'active', 'user', NULL, '2233445566', '2025-01-29 14:40:01', NULL),
(14, 'Kelly Black', 'kelly.black@example.com', 'kellyblack', 'inactive', 'user', 'kelly.jpg', '1122003344', '2025-01-29 14:40:01', NULL),
(15, 'Luke Gray', 'luke.gray@example.com', 'lukegray', 'active', 'user', 'luke.png', '6677001122', '2025-01-29 14:40:01', NULL),
(16, 'Mia Young', 'mia.young@example.com', 'miapass', 'inactive', 'admin', 'mia.jpg', '5544332211', '2025-01-29 14:40:01', NULL),
(17, 'Noah Hall', 'noah.hall@example.com', 'noah123', 'active', 'user', NULL, '9988007766', '2025-01-29 14:40:01', NULL),
(18, 'Tushar Ravaliya', 'ahirt889@gmail.com', '$2y$10$zWfXjXwwyzC0AYnRm7UTOexhzGWxMOuy6KRZqwrOWo.DnZ3/ryVqW', 'active', 'user', '', '0823186558', '2025-01-29 14:40:01', NULL),
(19, 'admin', 'admin@gmail.com', '$2y$10$SyDlRS.ZoYTFPua1TmLxsOrznt44o7iZoXlousNj4jEL5Thg//0LK', 'active', 'admin', '19_1743673644.jpg', '8238186558', '2025-01-29 14:40:01', NULL),
(20, 'nisha', 'nisha@gmail.com', '$2y$10$QDvCrwjmegc9c9d6hh5jk.8LIWwMVofOO0YlWpvSfMVeKKEbTrRPW', 'active', 'user', '', '6238186558', '2025-01-30 15:03:21', NULL),
(21, 'Wendy Sears', 'jexaw@mailinator.com', '$2y$10$RGeE5rUKyyVjyKD4C326U.5c/s9FdcZPcGXazFZmSAcZS/ISe9FG6', 'active', 'user', '', '1234567840', '2025-01-30 15:52:02', NULL),
(22, 'Tushar Ravaliya', 'admidn@gmail.com', '$2y$10$M7PF/Jktk0kHo3X6jhzypubgekkmqhhISitOJ8v3eEspoveXXaHyq', 'active', 'user', '1738657733_1279868.jpg', '8238186558', '2025-02-04 13:58:53', NULL),
(23, 'nisha', 'nisha12@gmail.com', '$2y$10$RpSMxdTVEOprH.zyCOHdluSUs5BoSRmHwzB0RLcxnxbso3xP/6w5K', 'active', 'user', '23_1743675323.jpg', '9874543240', '2025-02-06 15:15:11', NULL),
(24, 'Tushar Ravaliya', 'admisfsen@gmail.com', '$2y$10$4m3pfwSEmHUkWWCV2uHppeXpUTaamaBFM4Kgf5UesjbFZCOcmP5we', 'active', 'user', '', '8238186553', '2025-02-25 15:12:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `code` varchar(64) NOT NULL,
  `type` varchar(20) NOT NULL,
  `expires_at` datetime NOT NULL,
  `is_used` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`id`, `user_id`, `code`, `type`, `expires_at`, `is_used`, `created_at`) VALUES
(1, 23, '65e6894a18344a2bb01501a5b88060b3', 'phone_change', '2025-04-03 18:59:36', 1, '2025-04-02 18:59:36'),
(2, 23, '19f3906735929cf2d41a4a57dfbe1c09', 'phone_change', '2025-04-04 08:48:38', 1, '2025-04-03 03:18:38'),
(3, 23, '59e5d3721c499e06a1e9798a28c65e04', 'phone_change', '2025-04-04 08:50:22', 1, '2025-04-03 03:20:22'),
(4, 23, '5230d5d6a8f439ab73f1550891a0da35', 'phone_change', '2025-04-04 08:50:50', 0, '2025-04-03 03:20:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus_content`
--
ALTER TABLE `aboutus_content`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `homepage_content`
--
ALTER TABLE `homepage_content`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD UNIQUE KEY `movie_id` (`movie_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_reset_otps`
--
ALTER TABLE `password_reset_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus_content`
--
ALTER TABLE `aboutus_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_seats`
--
ALTER TABLE `booked_seats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `homepage_content`
--
ALTER TABLE `homepage_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie_cast`
--
ALTER TABLE `movie_cast`
  MODIFY `cast_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_otps`
--
ALTER TABLE `password_reset_otps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD CONSTRAINT `movie_reviews_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `movie_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `password_reset_otps`
--
ALTER TABLE `password_reset_otps`
  ADD CONSTRAINT `password_reset_otps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD CONSTRAINT `password_reset_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
