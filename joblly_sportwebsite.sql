-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2023 at 08:12 AM
-- Server version: 5.7.42-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblly_sportwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches_management`
--

CREATE TABLE `matches_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `team1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches_management`
--

INSERT INTO `matches_management` (`id`, `time`, `date`, `team1`, `team2`, `created_at`, `updated_at`) VALUES
(14, '05:39:00', '2023-06-08', 'DEN', 'MIA', '2023-06-07 16:08:44', '2023-06-07 16:08:44');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_24_130731_create_team_management_table', 1),
(3, '2023_04_25_071618_create_player_management_table', 2),
(4, '2023_04_25_103508_create_matches_management_table', 3);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player_management`
--

CREATE TABLE `player_management` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `fpts` decimal(32,2) NOT NULL,
  `sal` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_management`
--

INSERT INTO `player_management` (`id`, `name`, `category`, `pos`, `fpts`, `sal`, `status`, `created_at`, `updated_at`) VALUES
(34, 'J murray', 'DEN', 'PG', 46.82, '19', 1, '2023-06-07 15:28:01', '2023-06-14 12:18:43'),
(35, 'K Lowry', 'MIA', 'PG', 19.42, '11.5', 0, '2023-06-07 15:33:01', '2023-06-14 12:20:49'),
(36, 'G VICENT', 'MIA', 'PG', 21.24, '8', 0, '2023-06-07 15:35:16', '2023-06-14 12:21:20'),
(37, 'K cadwell pope', 'DEN', 'SG', 20.89, '9.5', 0, '2023-06-07 15:38:16', '2023-06-14 12:21:04'),
(38, 'M strus', 'MIA', 'SG', 17.35, '9.5', 0, '2023-06-07 15:40:13', '2023-06-14 12:21:49'),
(39, 'D robinson', 'MIA', 'SG', 12.73, '8.5', 0, '2023-06-07 15:41:08', '2023-06-14 12:22:04'),
(40, 'C brun', 'DEN', 'SG', 7.09, '6.5', 0, '2023-06-07 15:42:52', '2023-06-14 16:05:29'),
(41, 'j buttler', 'MIA', 'SF', 53.39, '21', 1, '2023-06-07 15:43:57', '2023-06-14 12:18:27'),
(42, 'M porter jr', 'DEN', 'SF', 29.53, '11.5', 0, '2023-06-07 15:44:56', '2023-06-14 12:20:02'),
(43, 'C martin', 'MIA', 'SF', 18.20, '10', 0, '2023-06-07 15:45:44', '2023-06-14 12:20:39'),
(44, 'J green', 'DEN', 'SF', 7.71, '5.5', 0, '2023-06-07 15:47:06', '2023-06-14 12:22:44'),
(45, 'A gordon', 'DEN', 'PF', 27.20, '11.5', 0, '2023-06-07 15:48:34', '2023-06-14 12:19:51'),
(46, 'B Brown', 'DEN', 'PF', 20.66, '10.5', 0, '2023-06-07 15:49:27', '2023-06-14 12:20:17'),
(47, 'K love', 'MIA', 'PF', 19.22, '9.5', 0, '2023-06-07 15:50:13', '2023-06-14 12:21:35'),
(48, 'H hismith', 'MIA', 'PF', 3.00, '6', 0, '2023-06-07 15:51:07', '2023-06-15 10:47:15'),
(49, 'N jokik', 'DEN', 'C', 65.52, '25', 0, '2023-06-07 15:52:07', '2023-06-14 12:39:21'),
(50, 'B adbyo', 'MIA', 'C', 44.14, '16.5', 0, '2023-06-07 15:53:00', '2023-06-14 12:19:30'),
(51, 'C zeler', 'MIA', 'C', 5.10, '5', 0, '2023-06-07 15:53:52', '2023-06-14 12:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `actual_team1` varchar(255) NOT NULL,
  `actual_team2` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `player_id` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `pos` varchar(255) DEFAULT NULL,
  `sal` decimal(32,2) NOT NULL,
  `fpts` decimal(32,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `actual_team1`, `actual_team2`, `team`, `player_id`, `player_name`, `pos`, `sal`, `fpts`, `created_at`, `updated_at`) VALUES
(1, 'DEN', 'MIA', 'team3', 50, 'B adbyo', NULL, 16.50, 44.14, '2023-06-08 06:38:29', '2023-06-08 06:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `team_management`
--

CREATE TABLE `team_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_management`
--

INSERT INTO `team_management` (`id`, `team`, `created_at`, `updated_at`) VALUES
(21, 'DEN', '2023-06-07 15:26:07', '2023-06-07 15:26:07'),
(22, 'MIA', '2023-06-07 15:26:23', '2023-06-07 15:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '$2y$10$vjnYVDwHlxCXDU2MNMeybu4lb7dix.LFMLUVQnJiGFtad9WpWZQAC', '2023-05-01 09:01:17', '2023-05-01 09:01:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches_management`
--
ALTER TABLE `matches_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `player_management`
--
ALTER TABLE `player_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_management`
--
ALTER TABLE `team_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches_management`
--
ALTER TABLE `matches_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_management`
--
ALTER TABLE `player_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_management`
--
ALTER TABLE `team_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
