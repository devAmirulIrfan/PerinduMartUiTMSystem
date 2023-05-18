-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 10:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp550`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_item_category`
--

CREATE TABLE `1_item_category` (
  `item_category_id` int(10) NOT NULL,
  `item_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1_item_category`
--

INSERT INTO `1_item_category` (`item_category_id`, `item_category_name`) VALUES
(1, 'Food'),
(2, 'Toiletries'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `2_item`
--

CREATE TABLE `2_item` (
  `item_id` int(10) NOT NULL,
  `item_category_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2_item`
--

INSERT INTO `2_item` (`item_id`, `item_category_id`, `item_name`, `item_price`) VALUES
(1, 1, 'Mamee', 2),
(2, 2, 'Shampoo', 10),
(3, 3, 'Milo Iced Tea', 3);

-- --------------------------------------------------------

--
-- Table structure for table `3_cart`
--

CREATE TABLE `3_cart` (
  `cart_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3_cart`
--

INSERT INTO `3_cart` (`cart_id`, `user_id`, `item_id`, `item_quantity`) VALUES
(1, 576031044, 1, 1),
(2, 173660776, 1, 4),
(3, 173660776, 2, 5),
(4, 921347450, 1, 1),
(5, 2103698126, 1, 1),
(6, 2103698126, 2, 1),
(7, 81872307, 1, 1),
(8, 81872307, 2, 1),
(9, 1540456215, 1, 1),
(10, 1540456215, 2, 1),
(11, 1857423196, 3, 1),
(12, 1857423196, 2, 1),
(13, 1857423196, 1, 1),
(14, 450601602, 1, 1),
(15, 450601602, 2, 1),
(16, 59400745, 1, 1),
(17, 59400745, 2, 1),
(18, 59400745, 3, 1),
(19, 607589897, 1, 1),
(20, 607589897, 2, 1),
(21, 1435251068, 1, 1),
(22, 1435251068, 2, 1),
(23, 668746127, 2, 1),
(24, 668746127, 3, 1),
(25, 1049869853, 1, 1),
(26, 1049869853, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `4_payment`
--

CREATE TABLE `4_payment` (
  `payment_id` int(10) NOT NULL,
  `payment_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_phone_num` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4_payment`
--

INSERT INTO `4_payment` (`payment_id`, `payment_date`, `user_id`, `user_phone_num`, `amount`, `payment_status`, `state`) VALUES
(1, '2022-02-03', 576031044, '60196643494', 2, 'PAID', 'IN PROGRESS'),
(2, '2022-02-03', 576031044, '60196643494', 2, 'PAID', 'PICKED UP'),
(3, '2022-06-25', 173660776, '60196643493', 58, 'PAID', 'PICKED UP'),
(4, '2022-06-28', 2103698126, '60196643494', 12, 'PAID', 'ORDER COMPLETED'),
(5, '2022-06-30', 81872307, '60196643494', 12, 'UNPAID', 'IN PROGRESS'),
(6, '2022-06-30', 81872307, '60196643494', 12, 'UNPAID', 'IN PROGRESS'),
(7, '2022-06-30', 2118577272, '60196643494', 90, 'PAID', 'IN PROGRESS'),
(8, '2022-06-30', 2118577272, '60196643494', 330, 'PAID', 'PICKED UP'),
(9, '2022-06-30', 1381953525, '60196643494', 10, 'UNPAID', 'IN PROGRESS'),
(10, '2022-06-30', 1381953525, '60196643494', 10, 'UNPAID', 'IN PROGRESS'),
(11, '2022-06-30', 1449767301, '6019663494', 90, 'UNPAID', 'IN PROGRESS'),
(12, '2022-07-14', 1540456215, '60196643494', 12, 'PAID', 'ORDER COMPLETED'),
(13, '2022-11-03', 1857423196, '60196643494', 15, 'PAID', 'ORDER COMPLETED'),
(14, '2022-11-04', 450601602, '60135168378', 12, 'PAID', 'PICKED UP'),
(15, '2022-11-04', 59400745, '60176429855', 15, 'PAID', 'PICKED UP'),
(16, '2022-11-05', 607589897, '60132715250', 12, 'PAID', 'PICKED UP'),
(17, '2022-11-05', 1435251068, '01111650160', 12, 'PAID', 'PICKED UP'),
(18, '2022-11-11', 668746127, '60129231508', 13, 'PAID', 'PICKED UP'),
(19, '2022-11-11', 1049869853, '60129231508', 12, 'UNPAID', 'IN PROGRESS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1_item_category`
--
ALTER TABLE `1_item_category`
  ADD PRIMARY KEY (`item_category_id`);

--
-- Indexes for table `2_item`
--
ALTER TABLE `2_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `3_cart`
--
ALTER TABLE `3_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `4_payment`
--
ALTER TABLE `4_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1_item_category`
--
ALTER TABLE `1_item_category`
  MODIFY `item_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `2_item`
--
ALTER TABLE `2_item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `3_cart`
--
ALTER TABLE `3_cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `4_payment`
--
ALTER TABLE `4_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
