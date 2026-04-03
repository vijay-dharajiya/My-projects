-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2026 at 06:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lvrohit`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-boost.roster.scan', 'a:2:{s:6:\"roster\";O:21:\"Laravel\\Roster\\Roster\":3:{s:13:\"\0*\0approaches\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:10:{i:0;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^12.0\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:LARAVEL\";s:14:\"\0*\0packageName\";s:17:\"laravel/framework\";s:10:\"\0*\0version\";s:7:\"12.47.0\";s:6:\"\0*\0dev\";b:0;}i:1;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:7:\"v0.3.10\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PROMPTS\";s:14:\"\0*\0packageName\";s:15:\"laravel/prompts\";s:10:\"\0*\0version\";s:6:\"0.3.10\";s:6:\"\0*\0dev\";b:0;}i:2;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^2.3\";s:10:\"\0*\0package\";E:36:\"Laravel\\Roster\\Enums\\Packages:BREEZE\";s:14:\"\0*\0packageName\";s:14:\"laravel/breeze\";s:10:\"\0*\0version\";s:5:\"2.3.8\";s:6:\"\0*\0dev\";b:1;}i:3;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.5.2\";s:10:\"\0*\0package\";E:33:\"Laravel\\Roster\\Enums\\Packages:MCP\";s:14:\"\0*\0packageName\";s:11:\"laravel/mcp\";s:10:\"\0*\0version\";s:5:\"0.5.2\";s:6:\"\0*\0dev\";b:1;}i:4;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.24\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PINT\";s:14:\"\0*\0packageName\";s:12:\"laravel/pint\";s:10:\"\0*\0version\";s:6:\"1.27.0\";s:6:\"\0*\0dev\";b:1;}i:5;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.41\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:SAIL\";s:14:\"\0*\0packageName\";s:12:\"laravel/sail\";s:10:\"\0*\0version\";s:6:\"1.52.0\";s:6:\"\0*\0dev\";b:1;}i:6;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^3.8\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PEST\";s:14:\"\0*\0packageName\";s:12:\"pestphp/pest\";s:10:\"\0*\0version\";s:5:\"3.8.4\";s:6:\"\0*\0dev\";b:1;}i:7;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:7:\"11.5.33\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PHPUNIT\";s:14:\"\0*\0packageName\";s:15:\"phpunit/phpunit\";s:10:\"\0*\0version\";s:7:\"11.5.33\";s:6:\"\0*\0dev\";b:1;}i:8;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:10:\"\0*\0package\";E:38:\"Laravel\\Roster\\Enums\\Packages:ALPINEJS\";s:14:\"\0*\0packageName\";s:8:\"alpinejs\";s:10:\"\0*\0version\";s:6:\"3.15.4\";s:6:\"\0*\0dev\";b:1;}i:9;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:10:\"\0*\0package\";E:41:\"Laravel\\Roster\\Enums\\Packages:TAILWINDCSS\";s:14:\"\0*\0packageName\";s:11:\"tailwindcss\";s:10:\"\0*\0version\";s:6:\"3.4.19\";s:6:\"\0*\0dev\";b:1;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:21:\"\0*\0nodePackageManager\";E:43:\"Laravel\\Roster\\Enums\\NodePackageManager:NPM\";}s:9:\"timestamp\";i:1771822351;}', 1771908751);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'electronics', '2026-02-16 00:37:38', '2026-02-18 07:56:21'),
(2, 'facewash', '2026-02-16 00:37:51', '2026-02-16 00:37:51'),
(3, 'goggles', '2026-02-16 00:38:03', '2026-02-16 00:38:03'),
(4, 'mobile', '2026-02-16 00:38:13', '2026-02-16 00:38:13'),
(5, 'Cloths', '2026-02-16 00:38:46', '2026-02-16 00:38:46'),
(6, 'shoes', '2026-02-16 06:54:11', '2026-02-16 06:54:11'),
(7, 'Travel Bags', '2026-02-19 00:52:48', '2026-02-19 00:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_02_054219_create_catagories_table', 1),
(5, '2026_02_04_054739_create_products_table', 1),
(6, '2026_02_11_044518_create_productcarts_table', 1),
(7, '2026_02_18_042441_create_orders_table', 2),
(8, '2026_02_18_052105_create_wishlists_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PLACED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `product_id`, `name`, `contact`, `address`, `qty`, `price`, `subtotal`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ORD1771389657', 1, 3, 'Vijay Bhai Dharajiya', '1234567890', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 120000.00, 120000.00, 'COD', 'processing', '2026-02-17 23:10:57', '2026-02-23 23:00:24'),
(2, 'ORD1771389657', 1, 8, 'Vijay Bhai Dharajiya', '1234567890', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 90000.00, 90000.00, 'COD', 'processing', '2026-02-17 23:10:57', '2026-02-23 23:00:24'),
(3, 'ORD1771389678', 1, 3, 'Vijay Bhai Dharajiya', '1234567890', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 120000.00, 120000.00, 'COD', 'canceled', '2026-02-17 23:11:18', '2026-02-23 23:11:56'),
(4, 'ORD1771389678', 1, 8, 'Vijay Bhai Dharajiya', '1234567890', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 90000.00, 90000.00, 'COD', 'canceled', '2026-02-17 23:11:18', '2026-02-23 23:11:56'),
(5, 'ORD1771390631', 1, 5, 'Rohit Bhai Dharajiya', '9515256897', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 1599.00, 1599.00, 'COD', 'canceled', '2026-02-17 23:27:11', '2026-02-23 23:07:13'),
(6, 'ORD1771390631', 1, 7, 'Rohit Bhai Dharajiya', '9515256897', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 20999.00, 20999.00, 'COD', 'canceled', '2026-02-17 23:27:11', '2026-02-23 23:07:13'),
(7, 'ORD1771390647', 1, 5, 'Rohit Bhai Dharajiya', '9515256897', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 1599.00, 1599.00, 'COD', 'canceled', '2026-02-17 23:27:27', '2026-02-23 23:06:48'),
(8, 'ORD1771390647', 1, 7, 'Rohit Bhai Dharajiya', '9515256897', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 20999.00, 20999.00, 'COD', 'canceled', '2026-02-17 23:27:27', '2026-02-23 23:06:48'),
(9, 'ORD1771562986', 2, 3, 'Vijay Bhai Dharajiya', '8320917515', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 120000.00, 120000.00, 'COD', 'PLACED', '2026-02-19 23:19:46', '2026-02-19 23:19:46'),
(10, 'ORD1771562986', 2, 8, 'Vijay Bhai Dharajiya', '8320917515', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 90000.00, 90000.00, 'COD', 'PLACED', '2026-02-19 23:19:46', '2026-02-19 23:19:46'),
(11, 'ORD1771563045', 2, 3, 'Vijay Bhai Dharajiya', '8320917515', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 120000.00, 120000.00, 'COD', 'PLACED', '2026-02-19 23:20:45', '2026-02-19 23:20:45'),
(12, 'ORD1771563045', 2, 8, 'Vijay Bhai Dharajiya', '8320917515', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 90000.00, 90000.00, 'COD', 'PLACED', '2026-02-19 23:20:45', '2026-02-19 23:20:45'),
(13, 'ORD1771563153', 2, 5, 'Vishal Bhai Dharajiya', '9521852741', 'At : JALI  , Ta : wankaner , Dist : morbi', 1, 1599.00, 1599.00, 'COD', 'shipped', '2026-02-19 23:22:33', '2026-02-19 23:32:40'),
(14, 'ORD1771563897', 2, 7, 'Rohit Dharajiya', '9856487569', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 255000.00, 255000.00, 'COD', 'PLACED', '2026-02-19 23:34:57', '2026-02-19 23:34:57'),
(15, 'ORD1771564046', 2, 6, 'Vijay Dharajiya', '08320917517', 'Drala\r\nWamkaner', 1, 15999.00, 15999.00, 'COD', 'shipped', '2026-02-19 23:37:26', '2026-02-23 23:00:13'),
(16, 'ORD1771908866', 1, 1, 'Vijay Bhai Dharajiya', '8320917517', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 499.00, 499.00, 'COD', 'PLACED', '2026-02-23 23:24:26', '2026-02-23 23:24:26'),
(17, 'ORD1771908866', 1, 7, 'Vijay Bhai Dharajiya', '8320917517', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 255000.00, 255000.00, 'COD', 'PLACED', '2026-02-23 23:24:26', '2026-02-23 23:24:26'),
(18, 'ORD1772336898', 1, 5, 'Vijay Bhai Dharajiya', '8320917545', 'At : DERALA , Ta : wankaner , Dist : morbi', 1, 1599.00, 1599.00, 'COD', 'shipped', '2026-02-28 22:18:18', '2026-02-28 22:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcarts`
--

CREATE TABLE `productcarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcarts`
--

INSERT INTO `productcarts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(29, 1, 6, '2026-03-01 10:00:08', '2026-03-01 10:00:08'),
(30, 1, 10, '2026-03-05 23:57:10', '2026-03-05 23:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `catagories` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_desc`, `product_image`, `catagories`, `created_at`, `updated_at`) VALUES
(1, 'white shirt', 499, 'white shirt', '1771222198.jfif', 'Cloths', '2026-02-16 00:39:58', '2026-02-16 00:39:58'),
(2, 'blazer', 1599, 'wedding cloths', '1771222274.jpg', 'Cloths', '2026-02-16 00:41:14', '2026-02-16 00:41:14'),
(3, 'iphone 15pro', 120000, 'i phone the world choice', '1771222354.jfif', 'mobile', '2026-02-16 00:42:34', '2026-02-16 00:42:34'),
(4, 'goggles', 799, 'goggles gives you stylish look', '1771222421.jpeg', 'goggles', '2026-02-16 00:43:41', '2026-02-16 00:43:41'),
(5, 'facewash', 1599, 'facewach gives you clear skin', '1771222474.webp', 'facewash', '2026-02-16 00:44:34', '2026-02-16 00:44:34'),
(6, 'adidas', 15999, 'white adidas shoes....', '1771244691.webp', 'shoes', '2026-02-16 06:54:51', '2026-02-16 06:54:51'),
(7, 'puma runing', 25500, 'best Runing shoes of puma in ground', '1771244763.webp', 'shoes', '2026-02-16 06:56:03', '2026-03-05 23:49:47'),
(8, 'macbook', 90000, 'The Macbook laptop', '1771244845.jpg', 'electronics', '2026-02-16 06:57:25', '2026-02-16 06:57:25'),
(9, 'lens goggles', 2000, 'the smart goggles..', '1771245004.jpeg', 'goggles', '2026-02-16 07:00:04', '2026-02-16 07:00:04'),
(10, 'laptop', 225000, 'The best laptop in the presence of time and best quality.', '1772774362.jfif', 'electronics', '2026-03-05 23:49:22', '2026-03-05 23:49:22'),
(11, 'travel bag', 2899, 'The traveling bag for travelers.', '1772774556.jpg', 'Travel Bags', '2026-03-05 23:52:36', '2026-03-05 23:52:36'),
(12, 'Samsung S25', 160000, 'The new series with new technology.', '1772774777.jfif', 'mobile', '2026-03-05 23:56:17', '2026-03-05 23:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XITKOPlZISKXpR0NS4b6rVhGdprBmwPbEojwO1PN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT0o4dk1vQ21LbUlvcWxmajhqVkxwVFFDSEJpeEl4dmpaTmZIbkxvVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXJ0bGlzdCI7czo1OiJyb3V0ZSI7czo4OiJjYXJ0bGlzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1772775546);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vijay Dharajiya', 'dharajiyavijay1204@gmail.com', 'admin', NULL, '$2y$12$47wRUGiNlp9nDu2RIGawZugoQ604b5PpxRC.quwDSn6KU2oFGOHuy', 'OdsY1CCT379YMQvCkha2APmNdgYbLYk2FyEAnPkeeuG3FP1mCp8UyPOTHyGS', '2026-02-16 00:35:03', '2026-02-16 00:35:03'),
(2, 'Rohit Dharajiya', 'dharajiyarohit123@gmail.com', 'user', NULL, '$2y$12$AAZd.XvewLkQLH4sduUdxe7clJT5nhK6YeRABv3Xhj6yyqNcWpu9.', NULL, '2026-02-16 00:35:48', '2026-02-16 00:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 1, 6, '2026-03-01 10:00:14', '2026-03-01 10:00:14'),
(8, 1, 2, '2026-03-05 23:56:56', '2026-03-05 23:56:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `productcarts`
--
ALTER TABLE `productcarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productcarts_user_id_foreign` (`user_id`),
  ADD KEY `productcarts_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `productcarts`
--
ALTER TABLE `productcarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productcarts`
--
ALTER TABLE `productcarts`
  ADD CONSTRAINT `productcarts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productcarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
