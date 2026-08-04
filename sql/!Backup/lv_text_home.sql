-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 10:03 AM
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
-- Table structure for table `lv_text_home`
--

CREATE TABLE `lv_text_home` (
  `text_home_id` int(11) NOT NULL,
  `text_home_th` text NOT NULL,
  `text_home_en` text NOT NULL,
  `text_home_datetime_create` datetime NOT NULL,
  `text_home_datetime_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_text_home`
--

INSERT INTO `lv_text_home` (`text_home_id`, `text_home_th`, `text_home_en`, `text_home_datetime_create`, `text_home_datetime_update`) VALUES
(1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lv_text_home`
--
ALTER TABLE `lv_text_home`
  ADD PRIMARY KEY (`text_home_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lv_text_home`
--
ALTER TABLE `lv_text_home`
  MODIFY `text_home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
