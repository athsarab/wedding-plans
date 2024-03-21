-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 10:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `serviceName` varchar(500) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Price` int(40) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `serviceName`, `Image`, `Price`, `description`, `category`, `user_id`) VALUES
(55, 'Platinum', '', 3789, 'hourse Coverage\r\nBridal Session\r\nEngagement session\r\nProfessional editing\r\n2 additional session', '', 24),
(56, 'Platinum', '', 3789, 'hourse Coverage\r\nBridal Session\r\nEngagement session\r\nProfessional editing\r\n2 additional session', '', 25),
(57, 'Platinum', '', 3789, 'hourse Coverage\r\nBridal Session\r\nEngagement session\r\nProfessional editing\r\n2 additional session', '', 26),
(58, 'dasun', '', 23000, 'das', '', 25);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `BillingAddress` varchar(500) NOT NULL,
  `PaymentMethod` varchar(200) NOT NULL,
  `serviceName` varchar(500) NOT NULL,
  `orderStatus` text NOT NULL DEFAULT 'pending',
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `Amount`, `BillingAddress`, `PaymentMethod`, `serviceName`, `orderStatus`, `user_id`) VALUES
(19, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'Cancelled', 14),
(20, 35000, '  Matara, malimbada', 'Paypal', 'Silver', 'Cancelled', 14),
(21, 35000, '  Matara, malimbada', 'Paypal', 'Silver', 'Cancelled', 14),
(39, 3789, '  Matara, malimbada', 'CashOnDelivery', 'Platinum', 'Cancelled', 14),
(40, 236900, '  Matara, malimbada', 'CreditDebitCard', 'Gold', 'Cancelled', 14),
(41, 236900, '  Matara, malimbada', 'CashOnDelivery', 'Gold', 'Cancelled', 14),
(42, 236900, '  Matara, malimbada', 'CashOnDelivery', 'Gold', 'Cancelled', 14),
(43, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'pending', 14),
(44, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'pending', 14),
(45, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'pending', 14),
(46, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'pending', 14),
(47, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'pending', 14),
(48, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'Cancelled', 14),
(49, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'Cancelled', 14),
(50, 35000, '  Matara, malimbada', 'CashOnDelivery', 'Silver', 'Cancelled', 14),
(51, 3789, 'sds', 'CashOnDelivery', 'Platinum', 'Cancelled', 25),
(52, 3789, 'sds', 'CreditDebitCard', 'Platinum', 'pending', 26),
(53, 23000, 'sds', 'CashOnDelivery', 'dasun', 'pending', 25);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(200) NOT NULL,
  `package_name` varchar(30) NOT NULL,
  `package_price` int(11) NOT NULL,
  `package_description` varchar(300) NOT NULL,
  `package_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package_name`, `package_price`, `package_description`, `package_image`) VALUES
(1, 'Silver', 35000, 'hourse Coverage\r\nBridal Session\r\nEngagement session\r\nProfessional editing\r\n2 additional session\r\n', './images/package-images/silver.png'),
(6, 'Platinum', 3789, 'hourse Coverage\r\nBridal Session\r\nEngagement session\r\nProfessional editing\r\n2 additional session', ''),
(10, 'Gold', 236900, 'hourse Coverage\r\nBridal Session\r\nEngagement session\r\nProfessional editing\r\n2 additional session', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_No` varchar(12) NOT NULL,
  `pwd` varchar(500) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `Acc_type` text NOT NULL DEFAULT 'General'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `fname`, `lname`, `email`, `phone_No`, `pwd`, `gender`, `dob`, `address`, `city`, `postalcode`, `Acc_type`) VALUES
(25, 'dasun', 'tharuka', 'dasuntharuka456@gmail.com', '0772931877', '$2y$10$LnvxOauu1LPt5vt2CWVnaecY9PzyrCbj79ggmrlOOQ1AW17.Gj5xG', 'Male', '2023-10-18', 'sds', 'mara', 81060, 'General'),
(27, 'admin', 'admin', 'admin', '0772931877', '$2y$10$8ZXsskXu07Mq5JMqHT.ZoeGYvk8CSEO5q8UZ41QR1aUOULZnnxFH2', 'Male', '2023-10-16', '99/7', 'Matara', 81060, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
