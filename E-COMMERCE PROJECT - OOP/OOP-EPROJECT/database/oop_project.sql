-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2026 at 06:04 AM
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
-- Database: `oop_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'priyansh@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(3) NOT NULL,
  `pid` int(3) NOT NULL,
  `sid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `sid`) VALUES
(47, 15, 31),
(48, 16, 31),
(49, 17, 31);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cid` int(3) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cid`, `cname`) VALUES
(1, 'ELECTRONICS'),
(2, 'Fashion'),
(3, 'Shoes'),
(4, 'Skin Products'),
(5, 'Facewash'),
(7, 'Furniture'),
(8, 'Mobile vivo');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(3) NOT NULL,
  `sid` int(3) NOT NULL,
  `pid` int(3) NOT NULL,
  `shiping` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `date time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `sid`, `pid`, `shiping`, `address`, `contact`, `pmode`, `date time`) VALUES
(1, 3, 3, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:08:55'),
(2, 3, 3, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:08:55'),
(3, 3, 13, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:08:55'),
(4, 3, 3, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:09:05'),
(5, 3, 3, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:09:05'),
(6, 3, 13, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:09:05'),
(13, 13, 7, 'SANJAY DHARAJIYA', 'At : DERALA , Ta : wankaner , Dist : morbi', 9714896587, 'ONLINE', '2025-12-30 06:19:07'),
(14, 13, 12, 'SANJAY DHARAJIYA', 'At : DERALA , Ta : wankaner , Dist : morbi', 9714896587, 'ONLINE', '2025-12-30 06:19:07'),
(15, 13, 13, 'SANJAY DHARAJIYA', 'At : DERALA , Ta : wankaner , Dist : morbi', 9714896587, 'ONLINE', '2025-12-30 06:19:07'),
(16, 14, 14, 'BAVALIYA ASHWIN BHAI', 'At : RAJESHTHALI , Ta : wankaner , Dist : morbi', 6589732587, 'COD', '2025-12-30 06:21:58'),
(17, 14, 10, 'BAVALIYA ASHWIN BHAI', 'At : RAJESHTHALI , Ta : wankaner , Dist : morbi', 6589732587, 'COD', '2025-12-30 06:21:58'),
(18, 12, 8, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:22:42'),
(19, 12, 13, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-30 06:22:42'),
(20, 3, 13, 'DHARAJIYA ROHIT', 'At : DERALA , Ta : wankaner , Dist : morbi', 6359878456, 'ONLINE', '2025-12-30 06:27:13'),
(21, 15, 6, 'MAKWANA HARSH', 'AT: GADHADA, TA: BOTAD , DIST:BOTAD', 9856432587, 'ONLINE', '2025-12-30 06:40:23'),
(22, 14, 3, ' BAVALIYA ASHWIN BHAI', 'At : Rajshthali , Ta : wankaner , Dist : morbi', 6859732567, 'ONLINE', '2025-12-30 07:05:40'),
(23, 14, 6, ' BAVALIYA ASHWIN BHAI', 'At : Rajshthali , Ta : wankaner , Dist : morbi', 6859732567, 'ONLINE', '2025-12-30 07:05:40'),
(24, 14, 8, ' BAVALIYA ASHWIN BHAI', 'At : Rajshthali , Ta : wankaner , Dist : morbi', 6859732567, 'ONLINE', '2025-12-30 07:05:40'),
(25, 3, 9, 'DHARAJIYA ROHIT BHAI', 'At : LUNSAR , Ta : wankaner , Dist : morbi', 9856754897, 'ONLINE', '2025-12-30 12:01:23'),
(26, 14, 11, 'BAVALIYA ASHWIN BHAI', 'At : Rajeshthali , Ta : wankaner , Dist : morbi', 9568776832, 'ONLINE', '2025-12-30 17:40:59'),
(27, 14, 5, 'BAVALIYA ASHWIN BHAI', 'At : Rajeshthali , Ta : wankaner , Dist : morbi', 9568776832, 'ONLINE', '2025-12-30 17:40:59'),
(28, 13, 3, 'DHARAJIYA SANJAY BHAI', 'At : DERALA , Ta : wankaner , Dist : morbi', 9714896587, 'ONLINE', '2025-12-30 17:52:28'),
(29, 13, 13, 'DHARAJIYA SANJAY BHAI', 'At : DERALA , Ta : wankaner , Dist : morbi', 9714896587, 'ONLINE', '2025-12-30 17:52:28'),
(30, 3, 3, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'COD', '2025-12-31 21:27:32'),
(31, 12, 7, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'ONLINE', '2026-01-01 09:31:41'),
(32, 12, 10, 'Vijay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 8320917517, 'ONLINE', '2026-01-01 09:31:41'),
(33, 3, 17, 'Vijay Dharajiya', 'Derala\r\nWamkaner', 8320917517, 'COD', '2026-02-12 17:20:29'),
(34, 3, 3, 'Vijay Dharajiya', 'Derala\r\nWamkaner', 8320917517, 'COD', '2026-02-12 17:20:29'),
(35, 3, 5, 'Rohit Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 6351026645, 'ONLINE', '2026-02-12 18:07:21'),
(36, 3, 6, 'Rohit Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 6351026645, 'ONLINE', '2026-02-12 18:07:21'),
(37, 3, 17, 'Sanjay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 9824857623, 'COD', '2026-02-12 18:16:08'),
(38, 3, 16, 'Sanjay Bhai Dharajiya', 'At : DERALA , Ta : wankaner , Dist : morbi', 9824857623, 'COD', '2026-02-12 18:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(3) NOT NULL,
  `cid` int(3) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pphoto` varchar(255) NOT NULL,
  `pmrp` varchar(255) NOT NULL,
  `pprice` varchar(255) NOT NULL,
  `pdescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `pname`, `pphoto`, `pmrp`, `pprice`, `pdescription`) VALUES
(3, 1, 'samsung S25 ultra', 'image/s25.jpeg', '180000', '160000', 'The S25, S25+ and S25 Ultra models were announced on January 22, 2025.'),
(5, 1, 'Headphone', 'image/1.jpeg', '15000', '10000', 'Headphones are a pair of small loudspeaker drivers worn on or around'),
(6, 1, 'iphone', 'image/iphone.jpeg', '200000', '150000', 'Succeeding the iPhone 16, the device was announced alongside the higher-priced iPhone 17 Pro and 17 Pro Max and iPhone Air during an Apple Event at Apple Park in Cupertino, California, on September 9, 2025, and released on September 19'),
(7, 3, 'adidas shoes', 'image/adidas.webp', '10999', '7699', 'Luxury brands exude exclusivity, craftsmanship, and prestige, making them the ultimate aspiration for many. On the other hand, premium brands offer top-notch quality at a more accessible price point, making them a smart choice for those who appreciate val'),
(8, 3, 'nike shoes', 'image/NIKE.jpeg', '18000', '14999', 'Nike shoes have become a global symbol of quality and innovation, offering footwear that blends performance, comfort, and style. The Nike shoes features and benefits are what truly make them stand out, catering to athletes and fashion enthusiasts alike.'),
(9, 3, 'puma shoes', 'image/puma.webp', '15000', '10999', 'Puma is the main producer of enthusiast driving shoes and race suits and entered a partnership with BMW, Ducati and Ferrari to make their respective shoes. In Formula 1, Puma equips the teams of Scuderia Ferrari, Aston Martin Aramco, Stake Kick Sauber, an'),
(10, 2, 'goggles', 'image/3.jpeg', '1500', '999', 'There are so many brands like Vincent chase, Ray Ban , Vogue, Carrera and John Jacobs which are considered to be the best in providing branded premium sunglasses.'),
(11, 2, 'lenskart goggles ', 'image/lenskart.jpeg', '1200', '899', 'Branded Goggles for Men for online shopping. Browse through latest range of mens goggles at best prices online at Lenskart.'),
(12, 2, 'bugatti goggles', 'image/bugatti.jpeg', '5000', '3999', 'The Limited-Edition Tourbillon Sunglass – a jaw dropping 3D-printed titanium frame inspired by the aerodynamic rear design of the Tourbillon hypercar.'),
(13, 1, 'macbook', 'image/macbook.jpg', '150000', '99999', 'MacBooks are generally considered premium laptops and tend to be a bit pricier compared to many Windows laptops with similar specifications.'),
(14, 3, 'Campus shoes', 'image/campus.jpeg', '3000', '1999', 'A well-recognised go to for those looking for sporty style and quality at a reasonable price tag, Campus.'),
(15, 5, 'Rise Face Wash', 'image/shopping.webp', '499', '350', 'Mama earth Rise Face Wash is safe for all skin types, including oily, dry, and combination skin'),
(16, 4, 'simple', 'image/simple.webp', '1399', '1099', 'Cleanse, soothe, hydrate | For all skin types'),
(17, 6, 'Oil Painting', 'image/painting.jpg', '25000', '22000', 'Vijay Art -Landscape Oil Painting On Canvas Textured Tree Abstract Contemporary Art Wall Paintings Handmade painting Home Office Decorations Canvas Wall Art painting');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `sid` int(3) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`sid`, `uname`, `email`, `password`, `contact`) VALUES
(3, 'DHARAJIYA ROHIT BHAI ', 'rohit123@gmail.com', '111222', 6351026651),
(5, 'DHARAJIYA VIKRAM BHAI', 'vikram987@gmail.com', '987987', 9664968532),
(12, 'DHARAJIYA VIJAY BHAI', 'vijay123@gmail.com', '123123', 8320917518),
(13, 'DHARAJIYA SANJAY BHAI ', 'sanjay342@gmail.com', '342342', 9714568952),
(14, 'BAVALIYA ASHWIN BHAI', 'ashwin789@gmail.com', '789789', 9563578533),
(15, 'MAKWANA HARSH', 'harsh234@gmail.com', '234234', 9568776832),
(31, 'BAVALIYA HARSHAD BHAI', 'harshad12@gmail.com', '1212', 9586732578);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wid` int(3) NOT NULL,
  `pid` int(3) NOT NULL,
  `sid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `sid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
