-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 06:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ldshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BEDROOM', 'sieu sin', 'f-icon f-icon-bedroom', 1, '2022-04-03 01:29:19', '2022-04-03 01:29:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_04_032710_create_categories_table', 1),
(6, '2022_03_04_032753_create_product_types_table', 1),
(7, '2022_03_04_064755_create_slides_table', 1),
(8, '2022_03_15_173650_add_status_column_in_categories_table', 1),
(9, '2022_03_15_174115_create_suppliers_table', 1),
(10, '2022_03_15_190130_add_address_column_in_suppliers_table', 1),
(11, '2022_03_16_032933_create_products_table', 1),
(12, '2022_03_16_081648_create_product_details_table', 1),
(13, '2022_03_16_082119_create_product_images_table', 1),
(14, '2022_03_16_083034_create_tags_table', 1),
(15, '2022_03_16_083119_create_product_tags_table', 1),
(16, '2022_03_18_165133_add_status_column_in_products_table', 1),
(17, '2022_04_05_141350_alter_product_details_table', 2),
(20, '2022_04_09_095305_create_promotions_table', 3),
(21, '2022_04_11_144328_alter_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_type_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_type_id`, `supplier_id`, `name`, `image`, `sku_code`, `slug`, `size`, `status`, `description`, `insurance`, `transport`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, 1, 'editor', 'products_0MDCEMRnGXrQBq84Kow6.jpg', '11222333', 'editor', 'Siêu to', 1, '<p>hhhhhhh</p>', NULL, NULL, NULL, '2022-04-11 09:44:34', '2022-04-11 09:44:34', NULL),
(3, 1, 1, 1, 'Beds1111', 'products_yi3kGYYjtvUW2C13cFBl.jpg', '11222333', 'beds1111', 'Siêu to', 1, '<p>Siêu hot</p>', '<p>Bảo hành 1 năm</p>', NULL, NULL, '2022-04-11 10:48:32', '2022-04-11 10:48:32', NULL),
(4, 1, 1, 1, 'aaaa', 'products_d5y0Iod8f5DrlnlguCDU.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 10:53:02', '2022-04-11 10:53:02', NULL),
(5, 1, 1, 1, 'aaaa', 'products_akNvLhlCP2dzXhzEB2Fn.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 10:53:24', '2022-04-11 10:53:24', NULL),
(6, 1, 1, 1, 'aaaa', 'products_wwvlNvUwvI1toyq3RgAU.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 10:56:21', '2022-04-11 10:56:21', NULL),
(7, 1, 1, 1, 'aaaa', 'products_XylJUshtDGKpdvSa7NC0.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 10:56:45', '2022-04-11 10:56:45', NULL),
(8, 1, 1, 1, 'aaaa', 'products_qmgKsDpQgJR9T5TrY0U6.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 10:58:28', '2022-04-11 10:58:28', NULL),
(9, 1, 1, 1, 'aaaa', 'products_iVHemS9NSec2hEHyqj3t.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 11:01:54', '2022-04-11 11:01:54', NULL),
(10, 1, 1, 1, 'aaaa', 'products_BiYB1LfAcsSRyLUywEMT.jpg', '1122233344', 'aaaa', '24', 1, NULL, NULL, NULL, NULL, '2022-04-11 11:03:35', '2022-04-11 11:03:35', NULL),
(11, 1, 1, 1, 'aaaa', 'products_Yr45sue87g4uW3E5LZPJ.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, '2022-04-11 11:04:15', '2022-04-11 11:04:15', NULL),
(12, 1, 1, 1, 'aaaa', 'products_q4Pka9GjtQOzZUS1mSDd.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, '2022-04-11 11:04:53', '2022-04-11 11:04:53', NULL),
(13, 1, 1, 1, 'aaaa', 'products_EEmUamywp0nEqNVhAKNL.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, '2022-04-11 11:06:42', '2022-04-11 11:06:42', NULL),
(14, 1, 1, 1, 'aaaa', 'products_8mGOtdnANYhAZ8qJqXcg.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 1, 1, 'aaaa', 'products_YI3nav9EkxDKA2WtKGsv.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, '2022-04-11 11:09:58', '2022-04-11 11:09:58', NULL),
(16, 1, 1, 1, 'aaaa', 'products_L1ECC1deBmliAS5Ggyxd.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, '2022-04-11 11:10:49', '2022-04-11 11:10:49', NULL),
(17, 1, 1, 1, 'aaaa', 'products_UjhI3SilO0qWgBQhfAA7.jpg', '1122233344', 'aaaa', '24', 1, '<p>aaaaa</p>', NULL, NULL, NULL, '2022-04-11 11:11:18', '2022-04-11 11:11:18', NULL),
(18, 1, 1, 1, 'aaaa', 'products_WwVFIukDOonKwjb7yCCG.jpg', '1122233344', 'aaaa', '25', 1, NULL, NULL, NULL, NULL, '2022-04-11 11:12:16', '2022-04-11 11:12:16', NULL),
(19, 1, 1, 1, 'aaaa', 'products_PpTpcgKKW08DZfK4bjMI.jpg', '1122233344', 'aaaa', '25', 1, NULL, NULL, NULL, NULL, '2022-04-11 11:13:38', '2022-04-11 11:13:38', NULL),
(20, 1, 1, 1, 'aaaa', 'products_MkxfY7V9a4jqwCDg4jER.jpg', '1122233344', 'aaaa', '25', 1, NULL, NULL, NULL, NULL, '2022-04-11 11:13:50', '2022-04-11 11:13:50', NULL),
(21, 1, 1, 1, 'aaaa', 'products_Ha4fqIJddva7R5mR2buA.jpg', '1122233344', 'aaaa', '25', 1, NULL, NULL, NULL, NULL, '2022-04-11 11:14:03', '2022-04-11 11:14:03', NULL),
(22, 1, 1, 1, 'Bàn xinh', 'products_ox5fHasQ7nXHp7lNg059.jpg', '1122234', 'ban-xinh', '24', 1, NULL, NULL, NULL, NULL, '2022-04-15 23:36:47', '2022-04-15 23:36:47', NULL),
(23, 1, 1, 1, 'editor334', 'products_1HmXEolexDEiwB0k951z.jpg', '1122233343', 'editor334', '243', 1, NULL, NULL, NULL, NULL, '2022-04-16 20:14:00', '2022-04-16 20:14:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `import_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feture_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `quantity`, `import_price`, `sale_price`, `created_at`, `updated_at`, `feture_image_path`) VALUES
(1, 2, 'vang', 222, 3333, 55555, '2022-04-11 11:14:03', '2022-04-11 11:14:03', NULL),
(2, 22, 'Trắng', 2333, 3000000, 3500000, '2022-04-15 23:36:47', '2022-04-15 23:36:47', NULL),
(3, 23, 'Đen', 23, 2500000, 3000000, '2022-04-16 20:14:00', '2022-04-16 20:14:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_detail_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_detail_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'products_Yr45sue87g4uW3E5LZPJ.jpg', NULL, '2022-04-11 11:14:03', '2022-04-11 11:14:03'),
(2, 2, 'product_images_wVreF9tzFSjVQA212Sjs.jpg', NULL, '2022-04-15 23:36:47', '2022-04-15 23:36:47'),
(3, 3, 'product_images_KRV9BcqeXTKRb5X9lDzf.jpg', NULL, '2022-04-16 20:14:00', '2022-04-16 20:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-04-11 10:48:32', '2022-04-11 10:48:32'),
(2, 3, 2, '2022-04-11 10:48:32', '2022-04-11 10:48:32'),
(3, 6, 3, '2022-04-11 10:56:21', '2022-04-11 10:56:21'),
(4, 7, 3, '2022-04-11 10:56:45', '2022-04-11 10:56:45'),
(5, 11, 4, '2022-04-11 11:04:15', '2022-04-11 11:04:15'),
(6, 12, 4, '2022-04-11 11:04:53', '2022-04-11 11:04:53'),
(7, 13, 4, '2022-04-11 11:06:42', '2022-04-11 11:06:42'),
(8, 15, 5, '2022-04-11 11:09:58', '2022-04-11 11:09:58'),
(9, 16, 5, '2022-04-11 11:10:49', '2022-04-11 11:10:49'),
(10, 22, 6, '2022-04-15 23:36:47', '2022-04-15 23:36:47'),
(11, 23, 7, '2022-04-16 20:14:00', '2022-04-16 20:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Beds', 'Gường', '2022-04-03 01:29:53', '2022-04-03 01:29:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_method` tinyint(4) NOT NULL,
  `started_at` date NOT NULL,
  `ended_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `link`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'editor', 'aaaa', 'slides_g2lAjn9QbMTqtfM9RAji.jpg', 'sasss', 1, '2022-04-16 21:20:09', '2022-04-16 21:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Phạm Julia', '6106-6134 Washington St', '0974469808', 'pham2000long@gmail.com', '2022-04-03 01:30:03', '2022-04-03 01:30:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gỗ', '2022-04-11 10:48:32', '2022-04-11 10:48:32'),
(2, 'Giường', '2022-04-11 10:48:32', '2022-04-11 10:48:32'),
(3, 'aaaa', '2022-04-11 10:56:21', '2022-04-11 10:56:21'),
(4, 'aaaaa', '2022-04-11 11:04:15', '2022-04-11 11:04:15'),
(5, 'ssss', '2022-04-11 11:09:58', '2022-04-11 11:09:58'),
(6, 'Bàn', '2022-04-15 23:36:47', '2022-04-15 23:36:47'),
(7, 'Sịn', '2022-04-16 20:14:00', '2022-04-16 20:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `active`, `phone`, `address`, `gender`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NULL, NULL, 'male', NULL, 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_1` (`category_id`),
  ADD KEY `FK_products_2` (`product_type_id`),
  ADD KEY `FK_products_3` (`supplier_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_details_1` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_images_1` (`product_detail_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_tags_1` (`product_id`),
  ADD KEY `FK_product_tags_2` (`tag_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_types_1` (`category_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_promotions_1` (`product_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_products_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`),
  ADD CONSTRAINT `FK_products_3` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `FK_product_details_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `FK_product_images_1` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`);

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `FK_product_tags_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_product_tags_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `product_types`
--
ALTER TABLE `product_types`
  ADD CONSTRAINT `FK_product_types_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `FK_promotions_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
