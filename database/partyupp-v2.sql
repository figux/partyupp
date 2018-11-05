-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2018 at 01:03 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `partyupp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bares`
--

CREATE TABLE `bares` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `cover` varchar(15) NOT NULL,
  `rate` float DEFAULT NULL,
  `schedule` varchar(150) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `lat` decimal(16,7) NOT NULL,
  `lng` decimal(16,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bares`
--

INSERT INTO `bares` (`id`, `name`, `description`, `cover`, `rate`, `schedule`, `state`, `updated_at`, `created_at`, `lat`, `lng`) VALUES
(1, 'La prosperidad', 'Estanco metemono del valle', '0', 3, '4pm-4am', 1, '2018-11-05 00:59:37', NULL, '4.7514133', '-74.0908737'),
(4, 'los recuerdos de eiia', 'tiendecita', '4675567890', NULL, NULL, 0, '2018-11-04 23:51:13', '2018-10-15 00:03:30', '4.7244049', '-74.0823121'),
(6, 'Casa Babilon', 'Reagge', '1', NULL, NULL, 1, '2018-11-04 23:51:36', '2018-10-19 03:37:17', '4.7225872', '-74.0919037'),
(10, 'Salsa Camara', 'Salsa Brava', '0', NULL, NULL, 1, '2018-11-04 23:52:04', '2018-10-23 16:30:40', '4.7274415', '-74.1174168'),
(11, 'El Trueno', 'Vienen del valle', '1', 5, NULL, 1, '2018-11-04 23:52:39', '2018-11-04 22:41:25', '4.7442069', '-74.0876765'),
(12, 'El calambuco de figux', 'Restaurante - Bar', '0', NULL, NULL, 1, '2018-11-04 23:50:04', '2018-11-04 23:48:10', '4.6757956', '-74.0487523');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comentario` text,
  `rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `bar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `user_id`, `comentario`, `rate`, `created_at`, `updated_at`, `bar_id`) VALUES
(1, 4, 'Comentario 1', 4, '2018-11-05 00:58:31', '2018-11-05 00:58:31', 1),
(2, 4, 'Comentarioi 2', 4, '2018-11-05 00:59:02', '2018-11-05 00:59:02', 1),
(3, 4, 'Deberia dar 3', 1, '2018-11-05 00:59:37', '2018-11-05 00:59:37', 1);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'j.dwran', 'pedritoperez@hotmail.com', NULL, '$2y$10$ytXM6WcrGd8c5X2KT1oifOy0MGaQva4NmdSEyXla8lrtZDrTaxiBm', 'S3GbBF9LtBdFISyh6i099DT8pBHQsdc5vxsxohlrGRDdj9e3JQH8bdYc6s0d', '2018-10-15 02:47:19', '2018-10-15 02:47:19'),
(2, 'sebas', 'sjduranh@gmail.com', NULL, '$2y$10$8XgEonagiWPQkKes8iZJ4uSoRVMINaDKWKD8epvImaE23FNZyurE2', 'MRKzYL4Y9pHulSQSRYtlIpBrG2e3uD1CIUdvW4TEKmElELOSLjp0JKSr4BAu', '2018-10-15 02:50:04', '2018-10-15 02:50:04'),
(3, 'sebastian', 'sebastianjdh86@gmail.com', NULL, '$2y$10$Qo4wVuP2kkdUgMH9Aho1n.W7H71BR4SHRZEfPTYZ55dMOh/n7yNOu', NULL, '2018-10-16 21:59:58', '2018-10-16 21:59:58'),
(4, 'Figux', 'saufigo@gmail.com', NULL, '$2y$10$w3EqcUKTQNkZ2oj0M/WJQO28Net60UQjwdn10BVF4F/8fxoEIYnxK', '8EeXAR56eXwOuAVYMorB5uQVUBP1rFZDoE5lvRcL4YDNBewpAV50Tg3NLTw5', '2018-11-05 04:18:26', '2018-11-05 04:18:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bares`
--
ALTER TABLE `bares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bares`
--
ALTER TABLE `bares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
