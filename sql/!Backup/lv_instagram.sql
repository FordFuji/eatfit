-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 08:58 AM
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
-- Table structure for table `lv_instagram`
--

CREATE TABLE `lv_instagram` (
  `instagram_id` int(11) NOT NULL,
  `instagram_image` varchar(255) NOT NULL,
  `instagram_alt` text NOT NULL,
  `instagram_datetime_create` datetime NOT NULL,
  `instagram_ip_create` varchar(255) NOT NULL,
  `instagram_datetime_update` datetime NOT NULL,
  `instagram_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lv_instagram`
--
ALTER TABLE `lv_instagram`
  ADD PRIMARY KEY (`instagram_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lv_instagram`
--
ALTER TABLE `lv_instagram`
  MODIFY `instagram_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
