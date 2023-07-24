-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 10:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yupprealtors`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_07_16_095206_create_properties_table', 1),
(13, '2023_07_16_095225_create_properties_condo_table', 1),
(14, '2023_07_16_095233_create_properties_lot_table', 1),
(15, '2023_07_16_095249_create_users_table', 1),
(16, '2023_07_16_142211_update_lot_id_auto_increment', 2),
(17, '2023_07_16_142219_update_condo_id_auto_increment', 2),
(22, '2023_07_16_150921_create_property_images_table', 3),
(23, '2023_07_18_063511_create_scheduled_tours_table', 3),
(24, '2023_07_18_082432_create_property_images_table', 4),
(26, '2014_10_12_100000_create_password_resets_table', 5),
(29, '2023_07_18_170607_create_scheduled_tour_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `tb` int(11) NOT NULL,
  `lot_area` int(11) NOT NULL,
  `floor_area` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `address`, `price`, `room`, `tb`, `lot_area`, `floor_area`, `type`, `image`) VALUES
(10, '1435 CPG North Ave., Tagbilaran City, Bohol 123', 3000000, 5, 5, 3452, 2341, 'House_and_Lot', NULL),
(11, 'J.A. Clarin St, Dao, Tagbilaran City, Bohol', 2500000, 2, 2, 2000, 1390, 'House_and_Lot', NULL),
(12, '0707 Carlos P. Garcia Ave, Tagbilaran City, Bohol', 2100000, 2, 2, 2570, 1760, 'House_and_Lot', NULL),
(13, '1123 Dagohoy Rd, Tagbilaran City, Bohol', 3500000, 4, 4, 1732, 1032, 'House_and_Lot', NULL),
(16, 'safagfhgdfhdfhdfhsadf', 23423434, 4, 4, 1443, 1000, 'House_and_Lot', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `properties_condo`
--

CREATE TABLE `properties_condo` (
  `condo_id` bigint(20) UNSIGNED NOT NULL,
  `condo_address` varchar(255) NOT NULL,
  `condo_price` int(11) NOT NULL,
  `condo_floor_area` int(11) NOT NULL,
  `condo_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties_condo`
--

INSERT INTO `properties_condo` (`condo_id`, `condo_address`, `condo_price`, `condo_floor_area`, `condo_type`) VALUES
(413, 'H. Zamora St, Tagbilaran City, Bohol', 2000000, 454, 'Condominium'),
(414, 'Mansasa-Dampas Road, Tagbilaran City, Bohol', 3400000, 1800, 'Condominium'),
(415, '850 Venancio P. Inting Avenue, Tagbilaran City, Bohol', 3700000, 3300, 'Condominium'),
(416, '1464 CPG North Ave, Tagbilaran City, Bohol', 3500000, 847, 'Condominium'),
(417, 'Riverside Songculan Bridge, Songculan, Dauis, Bohol', 2500000, 549, 'Condominium');

-- --------------------------------------------------------

--
-- Table structure for table `properties_lot`
--

CREATE TABLE `properties_lot` (
  `lot_id` bigint(20) UNSIGNED NOT NULL,
  `lot_address` varchar(255) NOT NULL,
  `lot_price` int(11) NOT NULL,
  `lot_area` int(11) NOT NULL,
  `lot_type` varchar(255) NOT NULL,
  `lot_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties_lot`
--

INSERT INTO `properties_lot` (`lot_id`, `lot_address`, `lot_price`, `lot_area`, `lot_type`, `lot_image`) VALUES
(805, '91 Mansasa-Dampas Road, Tagbilaran City, Bohol', 4000000, 43124, 'lot_only', NULL),
(806, 'Purok 3, Panglao, Bohol', 30000000, 49658, 'lot_only', NULL),
(807, 'Purok 2, Brgy. Tawala, Municipality, Panglao, Bohol', 12000000, 20037, 'lot_only', NULL),
(808, 'Bayan ng Panglao, Lalawigan ng Bohol', 33000000, 87120, 'lot_only', NULL),
(809, 'Panglao Circumferential Rd, Panglao, Bohol', 8000000, 49658, 'lot_only', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_condo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_lot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `property_id`, `property_condo_id`, `property_lot_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 10, NULL, NULL, '20230718h11.jpg', '2023-07-18 00:25:19', '2023-07-18 00:25:19'),
(7, 10, NULL, NULL, '20230718h111111.jpg', '2023-07-18 00:55:20', '2023-07-18 00:55:20'),
(10, 10, NULL, NULL, '20230718h111.jpg', '2023-07-18 00:55:20', '2023-07-18 00:55:20'),
(12, 10, NULL, NULL, '20230718h1.jpg', '2023-07-18 00:55:20', '2023-07-18 00:55:20'),
(14, 10, NULL, NULL, '20230718h11111.jpg', '2023-07-18 00:56:40', '2023-07-18 00:56:40'),
(15, 10, NULL, NULL, '20230718h1111.jpg', '2023-07-18 00:56:40', '2023-07-18 00:56:40'),
(23, NULL, 413, NULL, '20230718c111111.jpg', '2023-07-18 01:14:55', '2023-07-18 01:14:55'),
(24, NULL, 413, NULL, '20230718c11111.jpg', '2023-07-18 01:14:55', '2023-07-18 01:14:55'),
(25, NULL, 413, NULL, '20230718c1111.jpg', '2023-07-18 01:14:55', '2023-07-18 01:14:55'),
(26, NULL, 413, NULL, '20230718c111.jpg', '2023-07-18 01:14:55', '2023-07-18 01:14:55'),
(27, NULL, 413, NULL, '20230718c11.jpg', '2023-07-18 01:14:55', '2023-07-18 01:14:55'),
(28, NULL, 413, NULL, '20230718c1.jpg', '2023-07-18 01:14:55', '2023-07-18 01:14:55'),
(29, 11, NULL, NULL, '20230718h222222.jpg', '2023-07-18 01:28:24', '2023-07-18 01:28:24'),
(30, 11, NULL, NULL, '20230718h22222.jpg', '2023-07-18 01:28:24', '2023-07-18 01:28:24'),
(31, 11, NULL, NULL, '20230718h2222.jpg', '2023-07-18 01:28:25', '2023-07-18 01:28:25'),
(32, 11, NULL, NULL, '20230718h222.jpg', '2023-07-18 01:28:25', '2023-07-18 01:28:25'),
(33, 11, NULL, NULL, '20230718h22.jpg', '2023-07-18 01:28:25', '2023-07-18 01:28:25'),
(34, 11, NULL, NULL, '20230718h2.jpg', '2023-07-18 01:28:25', '2023-07-18 01:28:25'),
(35, 12, NULL, NULL, '20230718h333333.jpg', '2023-07-18 01:46:13', '2023-07-18 01:46:13'),
(36, 12, NULL, NULL, '20230718h33333.jpg', '2023-07-18 01:46:13', '2023-07-18 01:46:13'),
(37, 12, NULL, NULL, '20230718h3333.jpg', '2023-07-18 01:46:13', '2023-07-18 01:46:13'),
(38, 12, NULL, NULL, '20230718h333.jpg', '2023-07-18 01:46:13', '2023-07-18 01:46:13'),
(39, 12, NULL, NULL, '20230718h33.jpg', '2023-07-18 01:46:13', '2023-07-18 01:46:13'),
(40, 12, NULL, NULL, '20230718h3.jpg', '2023-07-18 01:46:13', '2023-07-18 01:46:13'),
(41, 13, NULL, NULL, '20230718h444444.jpg', '2023-07-18 01:55:47', '2023-07-18 01:55:47'),
(42, 13, NULL, NULL, '20230718h44444.jpg', '2023-07-18 01:55:47', '2023-07-18 01:55:47'),
(43, 13, NULL, NULL, '20230718h4444.jpg', '2023-07-18 01:55:47', '2023-07-18 01:55:47'),
(44, 13, NULL, NULL, '20230718h444.jpg', '2023-07-18 01:55:47', '2023-07-18 01:55:47'),
(45, 13, NULL, NULL, '20230718h44.jpg', '2023-07-18 01:55:47', '2023-07-18 01:55:47'),
(46, 13, NULL, NULL, '20230718h4.jpg', '2023-07-18 01:55:47', '2023-07-18 01:55:47'),
(48, NULL, 414, NULL, '20230719c222222.jpg', '2023-07-18 18:09:29', '2023-07-18 18:09:29'),
(49, NULL, 414, NULL, '20230719c22222.jpg', '2023-07-18 18:09:29', '2023-07-18 18:09:29'),
(50, NULL, 414, NULL, '20230719c2222.jpg', '2023-07-18 18:09:29', '2023-07-18 18:09:29'),
(51, NULL, 414, NULL, '20230719c222.jpg', '2023-07-18 18:09:29', '2023-07-18 18:09:29'),
(52, NULL, 414, NULL, '20230719c22.jpg', '2023-07-18 18:09:29', '2023-07-18 18:09:29'),
(53, NULL, 414, NULL, '20230719c2.jpg', '2023-07-18 18:09:29', '2023-07-18 18:09:29'),
(54, NULL, 415, NULL, '20230719c333333.jpg', '2023-07-18 18:17:34', '2023-07-18 18:17:34'),
(55, NULL, 415, NULL, '20230719c33333.jpg', '2023-07-18 18:17:34', '2023-07-18 18:17:34'),
(56, NULL, 415, NULL, '20230719c3333.jpg', '2023-07-18 18:17:34', '2023-07-18 18:17:34'),
(57, NULL, 415, NULL, '20230719c333.jpg', '2023-07-18 18:17:34', '2023-07-18 18:17:34'),
(58, NULL, 415, NULL, '20230719c33.jpg', '2023-07-18 18:17:34', '2023-07-18 18:17:34'),
(59, NULL, 415, NULL, '20230719c3.jpg', '2023-07-18 18:17:34', '2023-07-18 18:17:34'),
(60, NULL, NULL, 805, '20230719l6.jpg', '2023-07-18 18:21:33', '2023-07-18 18:21:33'),
(61, NULL, NULL, 805, '20230719l5.jpg', '2023-07-18 18:21:33', '2023-07-18 18:21:33'),
(62, NULL, NULL, 805, '20230719l4.jpg', '2023-07-18 18:21:33', '2023-07-18 18:21:33'),
(63, NULL, NULL, 805, '20230719l3.jpg', '2023-07-18 18:21:33', '2023-07-18 18:21:33'),
(64, NULL, NULL, 805, '20230719l2.jpg', '2023-07-18 18:21:33', '2023-07-18 18:21:33'),
(65, NULL, NULL, 805, '20230719l1.jpg', '2023-07-18 18:21:33', '2023-07-18 18:21:33'),
(74, 16, NULL, NULL, '20230720h222.jpg', '2023-07-19 18:25:12', '2023-07-19 18:25:12'),
(75, 16, NULL, NULL, '20230720h22.jpg', '2023-07-19 18:25:12', '2023-07-19 18:25:12'),
(76, 16, NULL, NULL, '20230720h2.jpg', '2023-07-19 18:25:12', '2023-07-19 18:25:12'),
(77, 16, NULL, NULL, '20230720c11111.jpg', '2023-07-19 18:25:12', '2023-07-19 18:25:12'),
(78, 16, NULL, NULL, '20230720c1111.jpg', '2023-07-19 18:25:12', '2023-07-19 18:25:12'),
(79, 16, NULL, NULL, '20230720h111111.jpg', '2023-07-19 18:25:12', '2023-07-19 18:25:12'),
(80, NULL, 416, NULL, '20230720c444444.jpg', '2023-07-20 00:14:40', '2023-07-20 00:14:40'),
(81, NULL, 416, NULL, '20230720c44444.jpg', '2023-07-20 00:14:40', '2023-07-20 00:14:40'),
(82, NULL, 416, NULL, '20230720c4444.jpg', '2023-07-20 00:14:40', '2023-07-20 00:14:40'),
(83, NULL, 416, NULL, '20230720c444.jpg', '2023-07-20 00:14:40', '2023-07-20 00:14:40'),
(84, NULL, 416, NULL, '20230720c44.jpg', '2023-07-20 00:14:40', '2023-07-20 00:14:40'),
(85, NULL, 416, NULL, '20230720c4.jpg', '2023-07-20 00:14:40', '2023-07-20 00:14:40'),
(86, NULL, 417, NULL, '20230720c555555.jpg', '2023-07-20 00:21:12', '2023-07-20 00:21:12'),
(87, NULL, 417, NULL, '20230720c55555.jpg', '2023-07-20 00:21:12', '2023-07-20 00:21:12'),
(88, NULL, 417, NULL, '20230720c5555.jpg', '2023-07-20 00:21:12', '2023-07-20 00:21:12'),
(89, NULL, 417, NULL, '20230720c555.jpg', '2023-07-20 00:21:12', '2023-07-20 00:21:12'),
(90, NULL, 417, NULL, '20230720c55.jpg', '2023-07-20 00:21:12', '2023-07-20 00:21:12'),
(91, NULL, 417, NULL, '20230720c5.jpg', '2023-07-20 00:21:12', '2023-07-20 00:21:12'),
(92, NULL, NULL, 806, '20230720l111111.jpg', '2023-07-20 01:14:05', '2023-07-20 01:14:05'),
(93, NULL, NULL, 806, '20230720l11111.jpg', '2023-07-20 01:14:05', '2023-07-20 01:14:05'),
(94, NULL, NULL, 806, '20230720l1111.jpg', '2023-07-20 01:14:05', '2023-07-20 01:14:05'),
(95, NULL, NULL, 806, '20230720l111.jpg', '2023-07-20 01:14:05', '2023-07-20 01:14:05'),
(96, NULL, NULL, 806, '20230720l11.jpg', '2023-07-20 01:14:05', '2023-07-20 01:14:05'),
(97, NULL, NULL, 806, '20230720l1.jpg', '2023-07-20 01:14:05', '2023-07-20 01:14:05'),
(98, NULL, NULL, 807, '20230720l222222.jpg', '2023-07-20 01:15:48', '2023-07-20 01:15:48'),
(99, NULL, NULL, 807, '20230720l22222.jpg', '2023-07-20 01:15:48', '2023-07-20 01:15:48'),
(100, NULL, NULL, 807, '20230720l2222.jpg', '2023-07-20 01:15:48', '2023-07-20 01:15:48'),
(101, NULL, NULL, 807, '20230720l222.jpg', '2023-07-20 01:15:48', '2023-07-20 01:15:48'),
(102, NULL, NULL, 807, '20230720l22.jpg', '2023-07-20 01:15:48', '2023-07-20 01:15:48'),
(103, NULL, NULL, 807, '20230720l2.jpg', '2023-07-20 01:15:48', '2023-07-20 01:15:48'),
(104, NULL, NULL, 808, '20230720l333333.jpg', '2023-07-20 01:17:50', '2023-07-20 01:17:50'),
(105, NULL, NULL, 808, '20230720l33333.jpg', '2023-07-20 01:17:50', '2023-07-20 01:17:50'),
(106, NULL, NULL, 808, '20230720l3333.jpg', '2023-07-20 01:17:50', '2023-07-20 01:17:50'),
(107, NULL, NULL, 808, '20230720l333.jpg', '2023-07-20 01:17:50', '2023-07-20 01:17:50'),
(108, NULL, NULL, 808, '20230720l33.jpg', '2023-07-20 01:17:50', '2023-07-20 01:17:50'),
(109, NULL, NULL, 808, '20230720l3.jpg', '2023-07-20 01:17:50', '2023-07-20 01:17:50'),
(110, NULL, NULL, 809, '20230720l444444.jpg', '2023-07-20 01:20:29', '2023-07-20 01:20:29'),
(111, NULL, NULL, 809, '20230720l44444.jpg', '2023-07-20 01:20:29', '2023-07-20 01:20:29'),
(112, NULL, NULL, 809, '20230720l4444.jpg', '2023-07-20 01:20:29', '2023-07-20 01:20:29'),
(113, NULL, NULL, 809, '20230720l444.jpg', '2023-07-20 01:20:29', '2023-07-20 01:20:29'),
(114, NULL, NULL, 809, '20230720l44.jpg', '2023-07-20 01:20:29', '2023-07-20 01:20:29'),
(115, NULL, NULL, 809, '20230720l4.jpg', '2023-07-20 01:20:29', '2023-07-20 01:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_tour`
--

CREATE TABLE `scheduled_tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_image_id` bigint(20) UNSIGNED NOT NULL,
  `tour_date` date NOT NULL,
  `tour_time` time NOT NULL,
  `tour_contact_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheduled_tour`
--

INSERT INTO `scheduled_tour` (`id`, `user_id`, `property_image_id`, `tour_date`, `tour_time`, `tour_contact_number`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2023-07-24', '16:00:00', '12345678922', '2023-07-19 07:55:10', '2023-07-19 07:55:10'),
(2, 2, 23, '2023-07-31', '23:36:00', '03214567892', '2023-07-20 07:30:15', '2023-07-20 07:30:15'),
(3, 2, 23, '2023-07-31', '15:40:00', '12345678901', '2023-07-20 07:34:13', '2023-07-20 07:34:13'),
(4, 2, 23, '2023-07-31', '15:40:00', '12345678901', '2023-07-20 07:36:05', '2023-07-20 07:36:05'),
(5, 2, 60, '2023-08-02', '06:43:00', '12345678901', '2023-07-20 09:37:41', '2023-07-20 09:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$zteX0BuZ/Ukc9E7tCutWVuZqFYW32Zhu9Tlr9n9nu6hqBZC5D.FwK', 'admin', NULL, '2023-07-16 06:46:05', '2023-07-20 21:54:43'),
(2, 'Matthew', 'Pamaong', 'matt@gmail.com', '$2y$10$2Kihz9KOKM9CAIEyK7Y2d.1GTFPhtY7qe/xrNkfrhU./ow8L/2s0u', 'user', NULL, '2023-07-16 06:46:20', '2023-07-20 21:45:42'),
(3, 'sdagfdfg', 'sdffadsf', 'asd41asd@gmail.com', '$2y$10$zteX0BuZ/Ukc9E7tCutWVuZqFYW32Zhu9Tlr9n9nu6hqBZC5D.FwK', 'user', NULL, '2023-07-21 00:16:05', '2023-07-21 00:16:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties_condo`
--
ALTER TABLE `properties_condo`
  ADD PRIMARY KEY (`condo_id`);

--
-- Indexes for table `properties_lot`
--
ALTER TABLE `properties_lot`
  ADD PRIMARY KEY (`lot_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_images_property_id_foreign` (`property_id`),
  ADD KEY `property_images_property_condo_id_foreign` (`property_condo_id`),
  ADD KEY `property_images_property_lot_id_foreign` (`property_lot_id`);

--
-- Indexes for table `scheduled_tour`
--
ALTER TABLE `scheduled_tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scheduled_tour_user_id_foreign` (`user_id`),
  ADD KEY `scheduled_tour_property_image_id_foreign` (`property_image_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `properties_condo`
--
ALTER TABLE `properties_condo`
  MODIFY `condo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `properties_lot`
--
ALTER TABLE `properties_lot`
  MODIFY `lot_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `scheduled_tour`
--
ALTER TABLE `scheduled_tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_property_condo_id_foreign` FOREIGN KEY (`property_condo_id`) REFERENCES `properties_condo` (`condo_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_images_property_lot_id_foreign` FOREIGN KEY (`property_lot_id`) REFERENCES `properties_lot` (`lot_id`) ON DELETE CASCADE;

--
-- Constraints for table `scheduled_tour`
--
ALTER TABLE `scheduled_tour`
  ADD CONSTRAINT `scheduled_tour_property_image_id_foreign` FOREIGN KEY (`property_image_id`) REFERENCES `property_images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scheduled_tour_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
