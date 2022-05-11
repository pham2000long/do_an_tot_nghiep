-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 07:41 PM
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
-- Database: `chung_hiep_shop_db`
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
(1, 'Phòng ngủ', 'Phòng ngủ thiết kế với nhiều phong cách', 'f-icon f-icon-bedroom', 1, '2022-04-20 10:20:52', '2022-05-06 20:39:14', NULL),
(2, 'Nhà bếp', 'Nhà bếp bố trí một cách thông minh', 'f-icon f-icon-kitchen', 1, '2022-04-20 10:21:38', '2022-05-06 20:38:43', NULL),
(3, 'Phòng làm việc', 'Nội thất phòng làm việc thông minh sáng tạo', 'f-icon f-icon-office', 1, '2022-04-20 10:22:06', '2022-05-06 20:29:33', NULL),
(4, 'Phòng trẻ em', 'Nội thất phòng trẻ em cực kì đẹp mắt', 'f-icon f-icon-children-room', 1, '2022-04-20 10:22:46', '2022-05-06 20:29:11', NULL),
(5, 'Tủ sách', 'Sắp xếp tủ sách một cách thông minh sáng tạo với nhiều kiểu dáng khác nhau', 'f-icon f-icon-bookcase', 1, '2022-05-05 17:30:52', '2022-05-06 20:30:57', NULL),
(6, 'Tủ đa năng', 'Khám phá những kiểu dáng tủ đa năng thông minh', 'f-icon f-icon-media-cabinet', 1, '2022-05-05 17:32:13', '2022-05-06 20:31:29', NULL),
(7, 'Bàn thiết kế', 'Khám phá các mẫu bàn theo nhiều thiết kế', 'f-icon f-icon-table', 1, '2022-05-05 17:59:11', '2022-05-06 20:32:57', NULL);

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(22, 13, 9, '2022-05-11 10:27:34', '2022-05-11 10:27:34');

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
(16, '2022_04_09_095305_create_promotions_table', 1),
(17, '2022_04_24_020147_add_promotion_id_column_to_products_table', 2),
(18, '2022_04_24_020616_drop_product_id_column_to_promotions_table', 3),
(19, '2022_04_24_060021_add_column_status_to_promotions_table', 4),
(20, '2022_05_01_08051_create_payments_table', 5),
(21, '2022_05_01_083343_create_orders_table', 5),
(22, '2022_05_01_085009_create_order_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `order_code`, `name`, `phone`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 'PSO87650', 'Admin', '0342966077', 'camnguyen.37h@gmail.com', 'Nghệ An', 3, '2022-05-02 10:47:09', '2022-05-05 10:32:46'),
(4, 2, 1, 'PSO87651', 'Admin', '0342966077', 'camnguyen.37h@gmail.com', 'Nghệ An', 3, '2022-05-02 10:47:09', '2022-05-05 10:32:51'),
(5, 2, 1, '20305074308', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 3, '2022-05-03 00:43:08', '2022-05-05 10:32:39'),
(6, 2, NULL, '20305075701', 'Long Phạm', '0974469808', 'long2kpham@gmail.com', 'N/A', 3, '2022-05-03 00:57:01', '2022-05-05 10:32:29'),
(7, 2, NULL, '20305112241', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 3, '2022-05-03 04:22:41', '2022-05-05 10:32:22'),
(8, 13, NULL, '130305154413', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 4, '2022-05-03 08:44:13', '2022-05-05 10:31:06'),
(9, 2, NULL, '20305160948', 'use+1', '0342966077', 'use+1@gmail.com', 'NA', 3, '2022-05-03 09:09:48', '2022-05-05 10:32:14'),
(10, 13, NULL, '130305161803', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 0, '2022-05-03 09:18:03', '2022-05-03 09:18:03'),
(11, 13, NULL, '130605021238', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 3, '2022-05-05 19:12:38', '2022-05-05 19:13:55'),
(12, 13, NULL, '130605071751', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 0, '2022-05-06 00:17:51', '2022-05-06 00:17:51'),
(13, 2, NULL, '20605144208', 'use+1', '0342966077', 'use+1@gmail.com', 'NA', 0, '2022-05-06 07:42:08', '2022-05-06 07:42:08'),
(14, 13, NULL, '130605144305', 'Phạm Julia', '0974469808', 'pham2000long@gmail.com', '6106-6134 Washington St', 0, '2022-05-06 07:43:05', '2022-05-06 07:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_detail_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_detail_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 25000, '2022-05-03 10:47:09', '2022-04-20 10:47:09'),
(2, 3, 2, 10, 25000, '2022-05-03 10:47:09', '2022-04-20 10:47:09'),
(3, 3, 4, 10, 25000, '2022-05-03 10:47:09', '2022-04-20 10:47:09'),
(7, 4, 2, 5, 25000, '2022-04-28 10:47:09', '2022-04-20 10:47:09'),
(8, 4, 4, 5, 25000, '2022-04-28 10:47:09', '2022-04-20 10:47:09'),
(9, 5, 1, 3, 25000, '2022-05-03 00:43:08', '2022-05-03 00:43:08'),
(10, 6, 1, 2, 25000, '2022-05-03 00:57:01', '2022-05-03 00:57:01'),
(11, 7, 1, 1, 25000, '2022-05-03 04:22:41', '2022-05-03 04:22:41'),
(12, 8, 1, 3, 25000, '2022-05-03 08:44:13', '2022-05-03 08:44:13'),
(13, 9, 1, 1, 25000, '2022-05-03 09:09:48', '2022-05-03 09:09:48'),
(14, 10, 1, 3, 25000, '2022-05-03 09:18:03', '2022-05-03 09:18:03'),
(15, 11, 6, 1, 19540000, '2022-05-05 19:12:38', '2022-05-05 19:12:38'),
(16, 11, 5, 1, 3500000, '2022-05-05 19:12:38', '2022-05-05 19:12:38'),
(17, 12, 6, 1, 19540000, '2022-05-06 00:17:51', '2022-05-06 00:17:51'),
(18, 13, 6, 1, 19540000, '2022-05-06 07:42:08', '2022-05-06 07:42:08'),
(19, 14, 6, 1, 19540000, '2022-05-06 07:43:05', '2022-05-06 07:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(3, 'pham2000long@gmail.com', '49469eeecb21ccc5e77a3b65c8585e0f7b07d32a82aded3340675b4e1958677a', '2022-05-04 13:22:59', '2022-05-06 00:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Toán Khi Nhận Hàng (COD)', 'Bạn chỉ phải thanh toán khi nhận hàng', NULL, NULL),
(2, 'Thanh Toán Online (Online Payment)', 'Thanh toán qua cổng thanh toán NganLuong.VN', NULL, NULL);

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
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `import_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_type_id`, `supplier_id`, `promotion_id`, `name`, `image`, `sku_code`, `slug`, `size`, `status`, `import_price`, `sale_price`, `description`, `insurance`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 1, 2, 'Bộ bàn ghế nhỏ xinh', 'products_a0jjkUCT1rDPwARrZmBF.jpg', '1222', 'bo-ban-ghe-nho-xinh', '24', 1, 24000, 25000, '<p><img style=\"width: 25%;\" data-filename=\"product-5.jpg\" src=\"http://127.0.0.1:8000/images/product_descriptions/product_description_0v57xo6gW1mapG8jfFbj.jpeg\"></p><p>Sản phẩm đẹp chất lượng cao</p>', '<p>Bảo hành 3 năm. Hoàn tiền nếu sản phẩm hỏng hóc do vận chuyển.</p>', NULL, '2020-04-20 10:47:09', '2022-05-05 17:27:17', NULL),
(2, 2, 1, 1, NULL, 'aaaa', 'products_xDmy77Nsgz525L9jh0xO.jpg', '1222', 'aaaa', '24', 1, 24000, 25000, NULL, NULL, NULL, '2022-04-22 18:36:34', '2022-04-22 18:36:38', '2022-04-22 18:36:38'),
(7, 6, 3, 2, NULL, 'Tủ gỗ đa năng', 'products_cHQNG7aA4zSB0mJk69Tt.jpg', '0605005407', 'tu-go-da-nang', '24', 1, 3000000, 3500000, '<p>Sịn sò</p>', NULL, NULL, '2022-05-05 17:54:07', '2022-05-05 17:54:07', NULL),
(8, 7, 4, 1, NULL, 'Bàn nước Glam xanh dương', 'products_pd2e89v9ChipLln7H3U3.jpg', '0605010623', 'ban-nuoc-glam-xanh-duong', 'Ø600 - C350 mm', 1, 19000000, 19540000, NULL, '<p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"> <img width=\"30\" height=\"30\" src=\"https://nhaxinh.com/image/check.png\" data-lazy-src=\"https://nhaxinh.com/image/check.png\" data-ll-status=\"loaded\" class=\"entered lazyloaded\" style=\"transition-duration: 1s; transition-property: opacity; height: auto; display: inline-block; opacity: 1;\"> Các sản phẩm nội thất tại Nhà Xinh đa số đều được sản xuất tại nhà máy của công ty cổ phần xây dựng kiến trúc AA với đội ngũ nhân viên và công nhân ưu tú cùng cơ sở vật chất hiện đại. Chung Hiệp đã kiểm tra kỹ lưỡng từ nguồn nguyên liệu cho đến sản phẩm hoàn thiện cuối cùng.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img width=\"30\" height=\"30\" src=\"https://nhaxinh.com/image/check.png\" data-lazy-src=\"https://nhaxinh.com/image/check.png\" data-ll-status=\"loaded\" class=\"entered lazyloaded\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Chung Hiệp bảo hành một năm cho các trường hợp có lỗi về kỹ thuật trong quá trình sản xuất hay lắp đặt.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img width=\"30\" height=\"30\" src=\"https://nhaxinh.com/image/check.png\" data-lazy-src=\"https://nhaxinh.com/image/check.png\" data-ll-status=\"loaded\" class=\"entered lazyloaded\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Quý khách không nên tự sửa chữa mà hãy báo ngay cho Chung Hiệp qua hotline: <a href=\"https://nhaxinh.com/#\" style=\"color: rgb(10, 10, 11); touch-action: manipulation;\">1800 100100.</a></p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img width=\"30\" height=\"30\" src=\"https://nhaxinh.com/image/check.png\" data-lazy-src=\"https://nhaxinh.com/image/check.png\" data-ll-status=\"loaded\" class=\"entered lazyloaded\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Sau thời gian hết hạn bảo hành, nếu quý khách có bất kỳ yêu cầu hay thắc mắc thì vui lòng liên hệ với Nhà Xinh để được hướng dẫn và giải quyết các vấn đề gặp phải.</p>', NULL, '2022-05-05 18:06:23', '2022-05-05 18:06:23', NULL),
(9, 1, 6, 1, NULL, 'Giường ngủ bọc da Mây 1m8', 'products_K8BiO3uWvrrQhDedMgdo.jpg', '0805135600', 'giuong-ngu-boc-da-may-1m8', 'D2000- R1800- C1000 mm', 1, 28000000, 29000000, '<p><span style=\"color: rgb(48, 48, 54); font-family: Roboto, sans-serif;\">Giường ngủ bọc da Mây là sự kết hợp giữa thân giường chính bằng gỗ tràm, bọc da và nhấn bằng chất liệu mây cho phần đầu giường. Màu sắc trầm giúp không gian phòng ngủ ấm cúng và gần gũi hơn. Giường Mây có 2 kích thước 1m6 và 1m8.</span><br></p>', '<p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Các sản phẩm nội thất tại Chung Hiệp đa số đều được sản xuất tại nhà máy của công ty cổ phần xây dựng kiến trúc AA với đội ngũ nhân viên và công nhân ưu tú cùng cơ sở vật chất hiện đại <a href=\"http://www.aacorporation.com/\" style=\"color: rgb(10, 10, 11); touch-action: manipulation;\">(http://www.aacorporation.com/)</a>. Chung Hiệp đã kiểm tra kỹ lưỡng từ nguồn nguyên liệu cho đến sản phẩm hoàn thiện cuối cùng.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Chung Hiệp bảo hành một năm cho các trường hợp có lỗi về kỹ thuật trong quá trình sản xuất hay lắp đặt.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Quý khách không nên tự sửa chữa mà hãy báo ngay cho Chung Hiệp qua hotline: <font color=\"#0a0a0b\"><span style=\"touch-action: manipulation;\">1800 6666</span></font></p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Sau thời gian hết hạn bảo hành, nếu quý khách có bất kỳ yêu cầu hay thắc mắc thì vui lòng liên hệ với Chung Hiệp để được hướng dẫn và giải quyết các vấn đề gặp phải.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><span style=\"font-weight: 600 !important;\">TUY NHIÊN CHUNG HIỆP KHÔNG BẢO HÀNH CHO CÁC TRƯỜNG HỢP SAU:</span></p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Khách hàng tự ý sửa chữa khi sản phẩm bị trục trặc mà không báo cho Chung Hiệp.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Sản phẩm được sử dụng không đúng quy cách của sổ bảo hành (được trao gửi khi quý khách mua sản phẩm) gây nên trầy xước, móp, dơ bẩn hay mất màu.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Sản phẩm bị biến dạng do môi trường bên ngoài bất bình thường (quá ẩm, quá khô, mối hay do tác động từ các thiết bị điện nước, các hóa chất hay dung môi khách hàng sử dụng không phù hợp).</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Sản phẩm hết hạn bảo hành.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> Sản phẩm không có phiếu bảo hành của Chung Hiệp.</p><p style=\"margin-bottom: 1.3em; color: rgb(48, 48, 54); font-family: Roboto, sans-serif; text-align: justify;\"><img src=\"https://nhaxinh.com/image/check.png\" style=\"height: auto; display: inline-block; transition-duration: 1s; transition-property: opacity; opacity: 1;\"> <a href=\"https://nhaxinh.com/index.php?menu=302\" style=\"color: rgb(10, 10, 11); touch-action: manipulation;\">Xem nội dung sổ bảo hành</a></p>', NULL, '2022-05-08 06:56:00', '2022-05-08 06:56:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `import_quantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `import_quantity`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trắng', 130, 100, '2022-04-20 10:47:09', '2022-05-05 10:32:46'),
(2, 1, 'Xanh', 50, 40, '2022-04-20 10:47:09', '2022-05-05 10:32:51'),
(4, 1, 'Đen', 50, 50, '2022-04-20 10:47:09', '2022-05-05 10:32:51'),
(5, 7, 'Basic', 200, 199, '2022-05-05 17:54:07', '2022-05-05 19:13:55'),
(6, 8, 'Basic', 300, 299, '2022-05-05 18:06:23', '2022-05-05 19:13:55'),
(7, 9, 'Basic', 200, 200, '2022-05-08 06:56:00', '2022-05-08 06:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_detail_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_detail_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 'product_images_Sjvhr4LINwsRhPZUAy4w.jpg', '2022-04-23 10:25:15', '2022-04-23 10:25:15'),
(6, 1, 1, 'product_images_IG1nUEreGqIxOATcWbP3.jpg', '2022-04-23 10:25:15', '2022-04-23 10:25:15'),
(7, 1, 1, 'product_images_S6kKYrGg3Pmo8A9TywEL.jpg', '2022-04-23 10:25:15', '2022-04-23 10:25:15'),
(8, 7, 5, 'product_images_FSFfPXrGSsfraKLjf5o1.jpg', '2022-05-05 17:54:07', '2022-05-05 17:54:07'),
(9, 8, 6, 'product_images_mp4wgHpetkeKOO1Umfsx.jpg', '2022-05-05 18:06:23', '2022-05-05 18:06:23'),
(10, 8, 6, 'product_images_WIsK1mJX1nKXAzpsLhBu.jpg', '2022-05-05 18:06:23', '2022-05-05 18:06:23'),
(11, 8, 6, 'product_images_JbdlmVQuKekKTCl7Lorr.jpg', '2022-05-05 18:06:23', '2022-05-05 18:06:23'),
(12, 9, 7, 'product_images_dKIysmoYz1TNGMUjehUv.jpg', '2022-05-08 06:56:00', '2022-05-08 06:56:00'),
(13, 9, 7, 'product_images_fws0kseKEK5ud5EsfsLP.jpg', '2022-05-08 06:56:00', '2022-05-08 06:56:00');

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
(1, 1, 1, '2022-04-20 10:47:09', '2022-04-20 10:47:09'),
(2, 2, 2, '2022-04-22 18:36:34', '2022-04-22 18:36:34'),
(11, 7, 11, '2022-05-05 17:54:07', '2022-05-05 17:54:07'),
(12, 7, 12, '2022-05-05 17:54:07', '2022-05-05 17:54:07'),
(13, 9, 13, '2022-05-08 06:56:00', '2022-05-08 06:56:00'),
(14, 9, 14, '2022-05-08 06:56:00', '2022-05-08 06:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `category_id`, `name`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Beds', NULL, 'Giường ngủ', '2022-04-20 10:21:14', '2022-05-06 20:33:45', '2022-05-06 20:33:45'),
(2, 3, 'Bàn làm việc', 'product_types_IoizGlXazxXiasNJX5rY.jpg', 'Siêu sịn', '2022-04-20 10:45:46', '2022-05-06 21:44:30', NULL),
(3, 6, 'Tủ để đồ', 'product_types_MhUDP6klUdJ4o5ZvOd2Y.jpg', 'Siêu đẹp', '2022-05-05 17:33:05', '2022-05-06 21:44:12', NULL),
(4, 7, 'Bàn thời trang', 'product_types_FyCEiCfg1Jwd7UkDy62D.jpg', 'Siêu sịn sò', '2022-05-05 17:59:36', '2022-05-06 21:43:43', NULL),
(5, 1, 'Phòng ngủ mây', NULL, 'Giường ngủ bọc da Mây là sự kết hợp giữa thân giường chính bằng gỗ tràm, bọc da và nhấn bằng chất liệu mây cho phần đầu giường. Màu sắc trầm giúp không gian phòng ngủ ấm cúng và gần gũi hơn. Giường Mây có 2 kích thước 1m6 và 1m8.', '2022-05-06 21:01:07', '2022-05-06 21:43:18', '2022-05-06 21:43:18'),
(6, 1, 'Phòng ngủ mây', 'product_types_vJwLjwtC2npS6Kp0ue0f.jpg', 'Giường ngủ bọc da Mây là sự kết hợp giữa thân giường chính bằng gỗ tràm, bọc da và nhấn bằng chất liệu mây cho phần đầu giường. Màu sắc trầm giúp không gian phòng ngủ ấm cúng và gần gũi hơn. Giường Mây có 2 kích thước 1m6 và 1m8.', '2022-05-06 21:41:47', '2022-05-08 06:50:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_method` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `started_at` date NOT NULL,
  `ended_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `price`, `promotion_method`, `status`, `started_at`, `ended_at`, `created_at`, `updated_at`) VALUES
(2, 'Black friday', 20, 1, 1, '2022-05-06', '2022-05-21', '2022-04-25 06:47:19', '2022-05-05 17:27:17');

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
(1, 'Happy women\'s day', 'aaaa', 'slides_hwkHRZOeAYll8Di9bxG0.jpg', 'Siêu hot sale', 1, '2022-04-20 10:20:29', '2022-04-23 10:23:27'),
(2, 'Happy Men\'s day', 'aaaa', 'slides_uWIXEoyeLJDmmbl5xyxR.jpg', 'Sịn sò', 1, '2022-04-20 11:00:35', '2022-05-03 09:12:34');

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
(1, 'Chung Hiệp', '6106-6134 Washington St', '0974469808', 'pham2000long@gmail.com', '2022-04-20 10:23:13', '2022-04-20 10:23:13', NULL),
(2, 'AAA', '6106-6134 Washington St', '0974469808', 'pham2000long@gmail.com', '2022-04-20 10:23:13', '2022-04-20 10:23:13', NULL);

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
(1, 'bàn', '2022-04-20 10:47:09', '2022-04-20 10:47:09'),
(2, 'Nhựa', '2022-04-22 18:36:34', '2022-04-22 18:36:34'),
(11, 'Gỗ', '2022-05-05 17:54:07', '2022-05-05 17:54:07'),
(12, 'Tủ', '2022-05-05 17:54:07', '2022-05-05 17:54:07'),
(13, 'Giường', '2022-05-08 06:56:00', '2022-05-08 06:56:00'),
(14, 'Mây', '2022-05-08 06:56:00', '2022-05-08 06:56:00');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NULL, NULL, 'male', 'hinh-anh-cute-3.gif', 'admin', NULL, NULL, NULL),
(2, 'use+1', 'use+1@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '0342966077', 'NA', 'male', 'hinh-anh-cute-3.gif', 'user', NULL, NULL, NULL),
(3, 'use+2', 'use+2@gmail.com', NULL, '$2y$10$hUAlZIKuTEiA0KLA3hM.mu1hN0HANXBt7sUTz9UoWN5rXbIBDiG/m', 0, '0342966077', 'NA', 'male', 'hinh-anh-cute-3.gif', 'user', NULL, NULL, NULL),
(4, 'use+3', 'use+3@gmail.com', NULL, '$2y$10$hUAlZIKuTEiA0KLA3hM.mu1hN0HANXBt7sUTz9UoWN5rXbIBDiG/m', 0, '0342966077', 'NA', 'male', 'hinh-anh-cute-3.gif', 'user', NULL, NULL, NULL),
(5, 'use+4', 'use+4@gmail.com', NULL, '$2y$10$hUAlZIKuTEiA0KLA3hM.mu1hN0HANXBt7sUTz9UoWN5rXbIBDiG/m', 1, '0342966077', 'NA', 'male', 'hinh-anh-cute-3.gif', 'user', NULL, NULL, NULL),
(6, 'use+5', 'use+5@gmail.com', NULL, '$2y$10$hUAlZIKuTEiA0KLA3hM.mu1hN0HANXBt7sUTz9UoWN5rXbIBDiG/m', 1, '0342966077', 'NA', 'male', 'hinh-anh-cute-3.gif', 'user', NULL, NULL, NULL),
(7, 'use+6', 'use+6@gmail.com', NULL, '$2y$10$hUAlZIKuTEiA0KLA3hM.mu1hN0HANXBt7sUTz9UoWN5rXbIBDiG/m', 1, '0342966077', 'NA', 'male', 'hinh-anh-cute-3.gif', 'user', NULL, NULL, NULL),
(8, 'use+8', 'use+8@gmail.com', NULL, '$2y$10$hUAlZIKuTEiA0KLA3hM.mu1hN0HANXBt7sUTz9UoWN5rXbIBDiG/m', 0, '0342966077', 'NA', 'male', '', 'user', NULL, NULL, '2022-05-01 00:58:19'),
(13, 'Phạm Julia', 'pham2000long@gmail.com', NULL, '$2y$10$UZuMZuqcyQhCVbhQILshjOVryNrIKEuvmd1OtwNazKz7wT6I3j9iy', 1, '0974469808', '6106-6134 Washington St', 'male', NULL, 'user', NULL, '2022-05-03 08:40:45', '2022-05-04 13:22:13');

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
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_1` (`user_id`),
  ADD KEY `FK_orders_2` (`payment_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_details_1` (`order_id`),
  ADD KEY `FK_order_details_2` (`product_detail_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `FK_products_3` (`supplier_id`),
  ADD KEY `FK_products_4` (`promotion_id`);

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
  ADD KEY `FK_product_images_1` (`product_id`),
  ADD KEY `FK_product_images_2` (`product_detail_id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_orders_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_order_details_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_order_details_2` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_products_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`),
  ADD CONSTRAINT `FK_products_3` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `FK_products_4` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `FK_product_details_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `FK_product_images_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_product_images_2` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
