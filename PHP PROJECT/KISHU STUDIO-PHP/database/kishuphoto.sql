-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2026 at 06:15 AM
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
-- Database: `kishuphoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kihala Vijay', 'kishustudio123@gmail.com', 'kishu123@');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`) VALUES
(1, 'PRE - WEDDING', '2026-03-26 14:54:58'),
(2, 'WEDDING', '2026-03-28 06:55:01'),
(3, 'OUTDOOR SHOOT', '2026-03-29 05:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `phone`, `email`, `message`, `created_at`) VALUES
(1, 'Vijay Dharajiya', '8320917517', 'dharajiyavijay1204@gmail.com', 'WEDDING', '2026-04-01 06:02:48'),
(2, 'Vijay Dharajiya', '8320917517', 'dharajiyavijay1204@gmail.com', 'WEDDING', '2026-04-01 06:07:10'),
(3, 'Vijay Dharajiya', '8320917517', 'dharajiyavijay1204@gmail.com', 'WEDDING', '2026-04-01 06:08:25'),
(4, 'Rohit Dharajiya', '9904517517', 'dharajiyarohit123@gmail.com', 'pre wedding', '2026-04-01 06:09:25'),
(5, 'Vijay Bhai Dharajiya', '9521074410', 'kishustudio123@gmail.com', 'photo', '2026-04-01 06:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `event_date` date NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `name`, `email`, `phone`, `event_date`, `message`, `status`, `created_at`) VALUES
(1, 1, 'Vijay Dharajiya', 'dharajiyavijay1234@gmail.com', '8320917589', '2026-04-28', 'wedding\r\n', 'completed', '2026-04-06 11:16:54'),
(2, 1, 'Sanjay Dharajiya', 'sanjay123@gmail.com', '9714856982', '2026-04-28', 'wedding\r\n', 'completed', '2026-04-06 11:18:58'),
(3, 1, 'Vikram', 'dharajiyavikram123@gmail.com', '9856487569', '2026-04-23', 'wedding', 'cancelled', '2026-04-06 13:01:31'),
(4, 2, 'Vikram', 'dharajiyavikram123@gmail.com', '8956487495', '2026-04-22', '', 'completed', '2026-04-07 03:52:14'),
(5, 1, 'Vishal Bhai Dharajiya', 'vishal123@gmail.com', '9685745869', '2026-04-24', 'wedding', 'completed', '2026-04-07 04:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(3) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `cat_name`, `photo`, `created_at`) VALUES
(1, 'OUTDOOR SHOOT', 'image/1770354706.jpg', '2026-03-28 14:24:14'),
(2, 'PRE - WEDDING', 'image/1770356517.jpg', '2026-03-28 14:26:18'),
(3, 'WEDDING', 'image/1771222198.jfif', '2026-03-31 05:49:10'),
(4, 'PRE - WEDDING', 'image/1771244763.webp', '2026-03-31 05:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `price`, `image`, `category`, `created_at`) VALUES
(1, 'WEDDING', ' The Full Wedding shoot', 20000.00, 'image/1770354706.jpg', 'WEDDING', '2026-03-29 11:04:01'),
(2, 'protraint', 'the potrait', 15000.00, 'image/1770354779.jfif', 'WEDDING', '2026-03-29 11:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `sid` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`sid`, `username`, `email`, `password`, `contact`) VALUES
(1, 'DHARAJIYA VIKRAMBHAI', 'dharajiyavikram123@gmail.com', '123123', 6351026651),
(2, 'Vijay Bhai', 'dharajiyarohit123@gmail.com', '951236', 1234567890),
(3, 'Vijay Bhai', 'dharajiyarohit123@gmail.com', '951236', 1234567890),
(6, 'Alpesh Kihala', 'alpesh123@gmail.com', '123123', 9875645897),
(7, 'Vishal Dharajiya', 'vishal123@gmail.com', '123123', 6351026653),
(8, 'Vishal Dharajiya', 'vishal123@gmail.com', '123123', 6351026653),
(9, 'Ajit Dharajiya', 'ajit123@gmail.com', '123123', 1234567890),
(10, 'priyansh123@gmail.com', 'priyansh@gmail.com', '123123', 6351026652),
(11, 'priyansh123@gmail.com', 'priyansh@gmail.com', '123123', 6351026652),
(12, 'Sanjay dharajiya', 'sanjay123@gmail.com', '123123', 9714856987);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `cat_name`, `title`, `video`, `created_at`) VALUES
(1, 'PRE - WEDDING', 'BRIDE SHOOT', 'video/NAVRATI.mp4', '2026-03-29 06:56:04'),
(2, 'WEDDING', 'GROOM SHOOT', 'video/HANUMAN.mp4', '2026-03-29 06:56:44'),
(3, 'OUTDOOR SHOOT', 'NAVRATRI', 'video/HANUMAN.mp4', '2026-03-29 06:57:36'),
(4, 'OUTDOOR SHOOT', 'NAVRATRI', 'video/DWARKA.mp4', '2026-03-29 07:01:28'),
(5, 'PRE - WEDDING', 'WEDDING ', 'video/DWARKA.mp4', '2026-03-29 07:06:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_date` (`event_date`,`status`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `sid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
