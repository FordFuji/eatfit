-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 11:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eatfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `lv_promotion_by_product`
--

CREATE TABLE `lv_promotion_by_product` (
  `promotion_by_product_id` int(11) NOT NULL,
  `products_id` text NOT NULL,
  `promotion_by_product_amount` float(10,2) NOT NULL,
  `promotion_by_product_datetime_create` datetime NOT NULL,
  `promotion_by_datetime_product_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lv_promotion_by_product`
--
ALTER TABLE `lv_promotion_by_product`
  ADD PRIMARY KEY (`promotion_by_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lv_promotion_by_product`
--
ALTER TABLE `lv_promotion_by_product`
  MODIFY `promotion_by_product_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
