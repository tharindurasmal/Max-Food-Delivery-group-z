-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Sep 02, 2024 at 06:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_product` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `pin_code`, `total_product`, `total_price`) VALUES
(1, 'tharindu rashmal', '2323233', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', ''),
(2, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', ''),
(3, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(4, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(5, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(6, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(7, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(8, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(9, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(10, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(11, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(12, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(13, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(14, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650'),
(15, 'tharindu rashmal', '0775922215', 'tharindurashmal2020@gmail.com', 'cash on delivery', '484/b dummune', 'cb', 'nittambuwa', 11880, 'Fatburger(1), Cheeseburger(1)', '1650');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(52, 'Hamburger', 600.00, 'klipartz.com (2).png'),
(53, 'Cheeseburger', 860.00, 'klipartz.com (1).png'),
(54, 'Fatburger', 790.00, 'klipartz.com (3).png'),
(55, 'Fried potato', 250.00, 'klipartz.com (10).png'),
(57, 'Egg Dis', 250.00, 'klipartz.com (14).png'),
(58, 'noodles', 350.00, 'klipartz.com (7).png'),
(59, 'Chicken', 580.00, 'klipartz.com (6).png'),
(60, 'chicken spicy', 250.00, 'klipartz.com (12).png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(47, 'rash', 'tharindurasmal1@gmail.com', '$2y$10$bbMlCk6h2Bd5CTwyNzrx9eIXyf1kc0OdSyzFWvRV6xrWSUu.IJduW', 'user'),
(49, 'akila', 'tharindurasmal1a@gmail.com', '$2y$10$TSi.xPK9UtwhoxJY8AQf8eCJMimynm05QkUDkLSUaCUjgf5l84iaW', 'user'),
(50, 'madhuka', 'madhuka@gmail.com', '$2y$10$H7wsdfcZytM99sPcwXF.dOPS9u2sPJg8z6yVCCQVx8Evh8.xuNP32', 'user'),
(63, 'Tharindu', 'tharindurashmal2020@gmail.com', '$2y$10$nOGr/fnqcgV92OWGplilceyFLvy9VPCGKEoElVhUfhGZFprw9omou', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
