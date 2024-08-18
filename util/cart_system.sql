-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 04:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`) VALUES
(20, 'Cabbage', '100.00', 'image/cabbage.jpeg', 3, '300.00', 'CBG001'),
(21, 'Egg', '100.00', 'image/egg.jpeg', 10, '1000.00', 'EGG001'),
(22, 'Tomato', '100.00', '../image/tomato.jpeg', 7, '700.00', 'TMT001'),
(23, 'Potato', '100.00', '../image/potato.jpeg', 9, '900.00', 'PTT001');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pmode` varchar(255) DEFAULT NULL,
  `products` text DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(4, 'pranav', 'pranav@gmail.com', '1234567896', 'sjt ground floor', 'cod', 'Cabbage(3), Banana(8), Egg(10)', '2100.00'),
(5, 'Avinash chhetri', 'avinash0chhetri@gmail.com', '06306093650', 'mens hostel vit vellore\r\nq block', 'cod', 'Cabbage(4), ', '400.00'),
(6, 's;gm;l', 'asd@gmail.com', '1234567896', 'w;glm;lwmg', 'cod', 'Egg(10)', '1000.00'),
(7, 'Avinash chhetri', 'avinash0chhetri@gmail.com', '06306093650', 'mens hostel vit vellore\r\nq block', 'cod', 'Banana(8), Egg(10)', '1800.00'),
(8, 'Avinash chhetri', 'avinash0chhetri@gmail.com', '06306093650', 'mens hostel vit vellore\r\nq block', 'cod', 'Apple(8), Tomato(7)', '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_image`, `product_name`, `product_price`, `product_qty`, `product_code`) VALUES
(17, '../image/apple.jpg', 'Apple', '100.00', 5, 'APL001'),
(18, '../image/banana.jpg', 'Banana', '100.00', 8, 'BNN001'),
(19, '../image/cabbage.jpeg', 'Cabbage', '100.00', 3, 'CBG001'),
(20, '../image/egg.jpeg', 'Egg', '100.00', 10, 'EGG001'),
(21, '../image/papaya.jpg', 'Papaya', '100.00', 6, 'PPY001'),
(22, '../image/pumpkin.jpg', 'Pumpkin', '100.00', 4, 'PMK001'),
(23, '../image/tomato.jpeg', 'Tomato', '100.00', 7, 'TMT001'),
(24, '../image/potato.jpeg', 'Potato', '100.00', 9, 'PTT001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
