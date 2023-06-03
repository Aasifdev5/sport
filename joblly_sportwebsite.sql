-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2023 at 05:54 AM
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
(13, '19:48:00', '2023-06-01', 'South Africa', 'India', '2023-06-01 17:16:16', '2023-06-01 17:16:16');

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
  `fpts` varchar(255) NOT NULL,
  `sal` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_management`
--

INSERT INTO `player_management` (`id`, `name`, `category`, `pos`, `fpts`, `sal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Temba Bavuma', 'South Africa', 'C', '75', '8', 1, '2023-06-01 16:51:58', '2023-06-01 16:51:58'),
(2, 'Yusuf Adam Abdulla', 'South Africa', 'PG', '100', '125', 0, '2023-06-01 16:53:21', '2023-06-03 15:50:20'),
(3, 'Adams, RA', 'South Africa', 'SG', '22', '13', 0, '2023-06-01 16:53:52', '2023-06-01 16:53:52'),
(4, 'Rabada', 'South Africa', 'F', '85', '14', 0, '2023-06-01 16:54:23', '2023-06-01 16:54:23'),
(5, 'FAF', 'South Africa', 'SF', '78', '20', 0, '2023-06-01 16:54:43', '2023-06-01 16:54:43'),
(6, 'Amla, HM', 'South Africa', 'VC', '45', '19', 1, '2023-06-01 16:55:26', '2023-06-01 16:55:26'),
(7, 'ABD', 'South Africa', 'WC', '85', '21', 0, '2023-06-01 16:55:59', '2023-06-01 16:55:59'),
(8, 'Adam Bacher', 'South Africa', 'F', '22', '27', 0, '2023-06-01 16:56:59', '2023-06-01 16:56:59'),
(9, 'Bradley Barnes', 'South Africa', 'PG', '45', '30', 0, '2023-06-01 16:57:32', '2023-06-01 16:57:32'),
(10, 'Bedingham, DG', 'South Africa', 'SF', '8', '55', 0, '2023-06-01 16:58:16', '2023-06-01 16:58:16'),
(11, 'Farhaan Behardien', 'South Africa', 'C', '78', '35', 1, '2023-06-01 16:59:45', '2023-06-01 16:59:45'),
(12, 'Aubrey Faulkner', 'South Africa', 'SG', '75', '23', 0, '2023-06-01 17:00:42', '2023-06-01 17:00:42'),
(13, 'Herschelle Gibbs', 'South Africa', 'PG', '78', '40', 0, '2023-06-01 17:01:32', '2023-06-01 17:01:32'),
(14, 'Simon Harmer', 'South Africa', 'F', '22', '8', 1, '2023-06-01 17:02:20', '2023-06-01 18:10:58'),
(15, 'Paul Harris', 'South Africa', 'SF', '45', '44', 0, '2023-06-01 17:03:00', '2023-06-01 17:03:00'),
(16, 'Imran Tahir', 'South Africa', 'SG', '78', '21', 0, '2023-06-01 17:03:53', '2023-06-03 15:50:53'),
(18, 'Abhishek Sharma', 'India', 'SF', '85', '15', 0, '2023-06-01 17:06:20', '2023-06-01 17:06:20'),
(19, 'Ravichandran Ashwin', 'India', 'SG', '22', '45', 0, '2023-06-01 17:06:50', '2023-06-01 17:06:50'),
(20, 'Jasprit Bumrah', 'India', 'C', '78', '19', 0, '2023-06-01 17:07:15', '2023-06-01 17:07:15'),
(21, 'Ravindra Jadeja', 'India', 'F', '75', '13', 0, '2023-06-01 17:08:00', '2023-06-01 17:08:00'),
(22, 'sanju samson', 'India', 'PG', '22', '23', 0, '2023-06-01 17:08:23', '2023-06-01 17:08:23'),
(23, 'Virat Kohli', 'India', 'VC', '45', '21', 0, '2023-06-01 17:08:50', '2023-06-01 17:08:50'),
(24, 'Bhuvneshwar Kumar', 'India', 'PF', '75', '10', 0, '2023-06-01 17:09:51', '2023-06-01 18:10:18'),
(25, 'Kuldeep Yadav', 'India', 'SF', '29', '17', 0, '2023-06-01 17:11:05', '2023-06-01 17:11:05'),
(26, 'Mohammed Siraj', 'India', 'F', '78', '12', 0, '2023-06-01 17:11:36', '2023-06-01 17:11:36'),
(27, 'Hardik Pandya', 'India', 'WC', '45', '50', 0, '2023-06-01 17:12:03', '2023-06-01 17:12:03'),
(28, 'Axar Patel', 'India', 'PF', '22', '22', 0, '2023-06-01 17:12:28', '2023-06-01 17:12:28'),
(29, 'Harshal Patel', 'India', 'PG', '78', '9', 0, '2023-06-01 17:12:56', '2023-06-01 17:12:56'),
(30, 'Shahbaz Ahmed', 'India', 'WC', '45', '16', 0, '2023-06-01 17:13:49', '2023-06-01 17:13:49'),
(31, 'Rohit Sharma', 'India', 'C', '22', '11', 0, '2023-06-01 17:14:18', '2023-06-01 17:14:18'),
(32, 'Shubman Gill', 'India', 'SG', '75', '65', 0, '2023-06-01 17:14:49', '2023-06-01 17:14:49'),
(33, 'Shardul Thakur', 'India', 'VC', '45', '24', 0, '2023-06-01 17:15:19', '2023-06-01 17:15:19');

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
(5, 'South Africa', '2023-04-25 01:31:51', '2023-06-01 14:57:03'),
(19, 'India', '2023-06-01 15:16:38', '2023-06-01 15:16:38'),
(20, 'Phi', '2023-06-03 12:15:13', '2023-06-03 12:15:13');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_management`
--
ALTER TABLE `team_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
