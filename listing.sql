-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 05:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babamotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_desc`, `short_desc`, `image`, `cate_id`, `slug`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How To Start a Blog', 'So below, I’m going to outline exactly what you need to do to get started and set up your own personal blog. Before we dive in though, I really want to talk about WHY you should build a blog.\n                            Note', '', '760192808.jpg', 1, 'how-do-i-start-a-blog', 'HTML,Web Hosting,Domain Name,WordPress', '1', '2021-07-26 17:23:33', '2021-07-26 17:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Diamond Halo', 'diamond-halo', '2021-07-26 17:23:30', '2021-07-26 17:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(5, 1, 'Maruti Suzuki', '32223621.png', '2021-07-28 16:46:25', '2021-08-01 03:03:23'),
(6, 1, 'Hyundai', '88724510.png', '2021-08-01 08:27:49', '2021-08-01 08:27:49'),
(7, 1, 'Tata', '56084155.png', '2021-08-01 08:28:15', '2021-08-01 08:28:15'),
(8, 1, 'Mahindra', '47241242.png', '2021-08-01 08:28:39', '2021-08-01 08:28:39'),
(9, 11, 'Bajaj', '43081186.png', '2021-08-01 09:48:35', '2021-08-01 09:48:35'),
(10, 11, 'Hero', '50838958.png', '2021-08-01 09:48:56', '2021-08-01 09:48:56'),
(11, 11, 'Hero Honda', '72546803.png', '2021-08-01 09:49:15', '2021-08-01 09:49:15'),
(12, 11, 'Honda', '37780683.png', '2021-08-01 09:49:35', '2021-08-01 09:49:35'),
(13, 11, 'KTM', '21455561.png', '2021-08-01 09:49:54', '2021-08-01 09:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IMG', 'img@gmail.com', '7788559556', 'World Class Infant Nutrition<br>By Milk Baby Dairy', '1', '2021-07-26 17:23:29', '2021-07-26 17:23:29'),
(2, 'Gopal', 'imggopal@gmail.com', '7788559966', 'World Class Infant Nutrition<br>By Milk Baby Dairy', '1', '2021-07-26 17:23:29', '2021-07-26 17:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `title`, `info_desc`, `created_at`, `updated_at`) VALUES
(1, 'terms and condition', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc.', '2021-07-26 17:23:28', '2021-07-26 17:23:28'),
(2, 'privacy policy', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc.', '2021-07-26 17:23:28', '2021-07-26 17:23:28'),
(3, 'about us', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc.', '2021-07-26 17:23:28', '2021-07-26 17:23:28'),
(4, 'return policy', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc.', '2021-07-26 17:23:28', '2021-07-26 17:23:28'),
(5, 'refund policy', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc.', '2021-07-26 17:23:28', '2021-07-26 17:23:28');

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
(4, '2021_03_15_075736_create_procategories_table', 2),
(5, '2021_03_15_092735_create_products_table', 2),
(6, '2021_03_15_113318_create_information_table', 2),
(7, '2021_03_19_074907_create_banners_table', 2),
(8, '2021_03_31_074001_contact_message', 2),
(9, '2021_04_19_034304_create_blog_categories_table', 2),
(10, '2021_04_19_064403_user_activity', 2),
(11, '2021_04_20_090220_blogtable', 2),
(12, '2021_04_26_062538_add_extra_field_products', 2),
(13, '2021_04_27_062754_add_extra_field_short_blog', 2),
(14, '2021_05_28_054927_add_product_sku', 2),
(15, '2021_05_28_085317_change_products_image_size', 3),
(16, '2021_06_19_052013_add_product_info_field', 3),
(17, '2021_06_26_063339_create_table_wishlist', 3),
(18, '2021_04_26_075843_remove_extra_field_in_category', 4),
(19, '2021_07_23_0505454525_change_users_status', 5),
(20, '2021_07_23_050525_change_users_status', 6),
(21, '2021_07_28_163616_add_cate_brand', 7),
(22, '2021_07_28_170518_create_models_table', 8),
(23, '2021_07_28_172656_create_variants_table', 9),
(24, '2021_08_01_100529_products', 10);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `model_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `model_title`, `created_at`, `updated_at`) VALUES
(1, 5, '800', '2021-07-28 17:21:30', '2021-07-28 17:24:28'),
(3, 5, 'Alto', '2021-07-28 17:24:44', '2021-07-28 17:24:44'),
(4, 5, '1000', '2021-08-01 08:34:00', '2021-08-01 08:34:00'),
(5, 5, 'A-Star', '2021-08-01 08:34:15', '2021-08-01 08:34:15'),
(6, 6, 'Accent', '2021-08-01 08:35:35', '2021-08-01 08:35:35'),
(7, 6, 'Accent Viva', '2021-08-01 08:35:48', '2021-08-01 08:35:48'),
(8, 6, 'Avante', '2021-08-01 08:35:58', '2021-08-01 08:35:58'),
(9, 6, 'Carlino', '2021-08-01 08:36:08', '2021-08-01 08:36:08'),
(10, 6, 'Creta', '2021-08-01 08:36:19', '2021-08-01 08:36:19'),
(11, 7, 'Altroz', '2021-08-01 08:36:34', '2021-08-01 08:36:34'),
(12, 7, 'Altroz EV', '2021-08-01 08:36:49', '2021-08-01 08:36:49'),
(13, 7, 'Aria', '2021-08-01 08:36:59', '2021-08-01 08:36:59'),
(14, 7, 'Bolt', '2021-08-01 08:37:12', '2021-08-01 08:37:12'),
(15, 7, 'Buzzard', '2021-08-01 08:37:25', '2021-08-01 08:37:25'),
(16, 7, 'Estate', '2021-08-01 08:37:42', '2021-08-01 08:37:42'),
(17, 7, 'Evision Electric', '2021-08-01 08:37:53', '2021-08-01 08:37:53'),
(18, 8, 'Alturas G4', '2021-08-01 08:38:11', '2021-08-01 08:38:11'),
(19, 8, 'Armada', '2021-08-01 08:38:21', '2021-08-01 08:38:21'),
(20, 8, 'Bolero', '2021-08-01 08:38:35', '2021-08-01 08:38:35'),
(21, 8, 'Bolero Pik-Up', '2021-08-01 08:38:46', '2021-08-01 08:39:06'),
(22, 8, 'Bolero Power Plus', '2021-08-01 08:39:20', '2021-08-01 08:39:20'),
(23, 9, 'Avenger', '2021-08-01 09:52:31', '2021-08-01 09:52:31'),
(24, 9, 'CT 100', '2021-08-01 09:53:20', '2021-08-01 09:53:20'),
(25, 9, 'Discover', '2021-08-01 09:53:32', '2021-08-01 09:53:32'),
(26, 9, 'Platina', '2021-08-01 09:53:48', '2021-08-01 09:53:48'),
(27, 10, 'Achiever', '2021-08-01 09:54:10', '2021-08-01 09:54:10'),
(28, 10, 'Ambition', '2021-08-01 09:54:25', '2021-08-01 09:54:25'),
(29, 10, 'CBZ', '2021-08-01 09:54:39', '2021-08-01 09:54:39'),
(30, 10, 'CD 100', '2021-08-01 09:54:50', '2021-08-01 09:54:50'),
(31, 11, 'hero-honda-Achiever', '2021-08-01 09:55:32', '2021-08-01 09:55:32');

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
-- Table structure for table `procategories`
--

CREATE TABLE `procategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procategories`
--

INSERT INTO `procategories` (`id`, `cate_title`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cars', '22059328.png', 'cars', '1', '2021-07-28 16:33:47', '2021-07-31 01:51:39'),
(11, 'Bikes', '74499893.png', 'bikes', '1', '2021-07-28 16:34:03', '2021-07-30 20:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `variant_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transmission` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `km_drive` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owners` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `featured` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `brand_id`, `model_id`, `variant_id`, `year`, `fuel`, `transmission`, `km_drive`, `owners`, `images`, `pro_desc`, `price`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 5, 4, 3, '2000', 'CNG-Hybrids', 'Manual', '15000', '2nd', 'product_image_1628091986.jpg', 'test bike', '15000.00', '1', '0', '2021-08-01 11:14:47', '2021-08-04 10:16:27'),
(4, 1, 1, 5, 4, 3, '2022', 'CNG-Hybrids', 'Manual', '20000', '2nd', 'product_image_1628091955.jpg', 'test', '15000.00', '1', '0', '2021-08-01 11:15:38', '2021-08-04 10:15:55'),
(5, 1, 1, 5, 4, 3, '2000', 'Electric', 'Manual', '20000', '3rd', 'product_image_1628091884.jpg', 'test', '15000.00', '1', '0', '2021-08-01 11:20:01', '2021-08-04 10:14:44'),
(6, 1, 11, 9, 23, NULL, '2011', NULL, NULL, '12000', '2nd', 'product_image_1628095717.jpg', 'Description', '20000.00', '1', '0', '2021-08-04 16:48:37', '2021-08-04 11:18:43'),
(7, 1, 11, 9, 23, NULL, '2020', NULL, NULL, '15000', '1st', 'product_image_1628097182.jpg,product_image_1628128098.jpg,product_image_1628128098.jpg', 'gfhgfhhfg', '45000.00', '1', '0', '2021-08-04 17:13:02', '2021-08-04 20:18:18'),
(8, 1, 11, 9, 25, NULL, '2015', NULL, NULL, '25000', '1st', 'product_image_1628097653.jpg', 'ghfhgfh hgf', '15000.00', '1', '0', '2021-08-04 17:20:53', '2021-08-04 11:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>user, 2=>admin',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `status`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '9988552266', NULL, '1', '2', '$2y$10$/7uiMbvmc8WUoizGPC2xvOEBIWmiX/flJUxM65GfttujJH4.2Sdyi', NULL, '2021-07-26 15:57:00', '2021-07-26 15:57:00'),
(2, 'user', 'user@gmail.com', '8899663355', NULL, '1', '1', '$2y$10$/7uiMbvmc8WUoizGPC2xvOEBIWmiX/flJUxM65GfttujJH4.2Sdyi', NULL, '2021-07-26 15:57:00', '2021-07-26 15:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `variant_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `model_id`, `variant_title`, `created_at`, `updated_at`) VALUES
(2, 1, 'XD', '2021-07-28 17:51:55', '2021-07-28 17:51:55'),
(3, 4, 'AC', '2021-08-01 09:13:43', '2021-08-01 09:13:43'),
(4, 4, 'Std', '2021-08-01 09:13:57', '2021-08-01 09:13:57'),
(5, 4, 'Others', '2021-08-01 09:14:11', '2021-08-01 09:14:11'),
(6, 1, '800-AC', '2021-08-01 09:14:40', '2021-08-01 09:14:40'),
(7, 1, 'AC BSII', '2021-08-01 09:14:54', '2021-08-01 09:14:54'),
(8, 1, 'ziro', '2021-08-01 11:13:46', '2021-08-01 11:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_category_id_foreign` (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `models_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `procategories`
--
ALTER TABLE `procategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_model_id_foreign` (`model_id`),
  ADD KEY `products_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activity_user_id_foreign` (`user_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_model_id_foreign` (`model_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `procategories`
--
ALTER TABLE `procategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `procategories` (`id`);

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `procategories` (`id`),
  ADD CONSTRAINT `products_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`);

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
