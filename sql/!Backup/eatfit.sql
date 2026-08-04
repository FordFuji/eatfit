-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 04:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `gallery_banner_menu_head`
--

CREATE TABLE `gallery_banner_menu_head` (
  `gallery_menu_head_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_gallery_banner_menu_head` text NOT NULL,
  `menu_product_head_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lv_amphur`
--

CREATE TABLE `lv_amphur` (
  `amphur_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `amphur_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amphur_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lv_amphur`
--

INSERT INTO `lv_amphur` (`amphur_id`, `province_id`, `amphur_name_th`, `amphur_name_en`) VALUES
(1, 1, 'พระนคร', 'Phra Nakhon'),
(2, 1, 'ดุสิต', 'Dusit'),
(3, 1, 'หนองจอก', 'Nong Chok'),
(4, 1, 'บางรัก', 'Bang Rak'),
(5, 1, 'บางเขน', 'Bang Khen'),
(6, 1, 'บางกะปิ', 'Bang Kapi'),
(7, 1, 'ปทุมวัน', 'Pathum Wan'),
(8, 1, 'ป้อมปราบศัตรูพ่าย', 'Pom Prap Sattru Phai'),
(9, 1, 'พระโขนง', 'Phra Khanong'),
(10, 1, 'มีนบุรี', 'Min Buri'),
(11, 1, 'ลาดกระบัง', 'Lat Krabang'),
(12, 1, 'ยานนาวา', 'Yan Nawa'),
(13, 1, 'สัมพันธวงศ์', 'Samphanthawong'),
(14, 1, 'พญาไท', 'Phaya Thai'),
(15, 1, 'ธนบุรี', 'Thon Buri'),
(16, 1, 'บางกอกใหญ่', 'Bangkok Yai'),
(17, 1, 'ห้วยขวาง', 'Huai Khwang'),
(18, 1, 'คลองสาน', 'Khlong San'),
(19, 1, 'ตลิ่งชัน', 'Taling Chan'),
(20, 1, 'บางกอกน้อย', 'Bangkok Noi'),
(21, 1, 'บางขุนเทียน', 'Bang Khun Thian'),
(22, 1, 'ภาษีเจริญ', 'Phasi Charoen'),
(23, 1, 'หนองแขม', 'Nong Khaem'),
(24, 1, 'ราษฎร์บูรณะ', 'Rat Burana'),
(25, 1, 'บางพลัด', 'Bang Phlat'),
(26, 1, 'ดินแดง', 'Din Daeng'),
(27, 1, 'บึงกุ่ม', 'Bueng Kum'),
(28, 1, 'สาธร', 'Sa Thorn'),
(29, 1, 'บางซื่อ', 'Bang Sue'),
(30, 1, 'จตุจักร', 'Chatuchak'),
(31, 1, 'บางคอแหลม', 'Bang Kho Laem'),
(32, 1, 'ประเวศ', 'Prawet'),
(33, 1, 'คลองเตย', 'Khlong Toei'),
(34, 1, 'สวนหลวง', 'Suan Luang'),
(35, 1, 'จอมทอง', 'Chom Thong'),
(36, 1, 'ดอนเมือง', 'Don Mueang'),
(37, 1, 'ราชเทวี', 'Ratchathewi'),
(38, 1, 'ลาดพร้าว', 'Lat Phrao'),
(39, 1, 'วัฒนา', 'Vadhana'),
(40, 1, 'บางแค', 'Bang Kae'),
(41, 1, 'หลักสี่', 'Lak Si'),
(42, 1, 'สายไหม', 'Sai Mai'),
(43, 1, 'คันนายาว', 'Khan Na Yao'),
(44, 1, 'สะพานสูง', 'Saphan Sung'),
(45, 1, 'วังทองหลาง', 'Wang Thonglang'),
(46, 1, 'คลองสามวา', 'Khlong Sam Wa'),
(47, 1, 'บางนา', 'Bang Na'),
(48, 1, 'ทวีวัฒนา', 'Thawi Watthana'),
(49, 1, 'ทุ่งครุ', 'Thung Khru'),
(50, 1, 'บางบอน', 'Bang Bon'),
(51, 2, 'เมืองสมุทรปราการ', 'Mueang Samut Prakan'),
(52, 3, 'ไทรน้อย', 'Sai Noi'),
(53, 3, 'บางกรวย', 'Bang Kruai'),
(54, 3, 'บางบัวทอง', 'Bang Bua Thong'),
(55, 3, 'บางใหญ่', 'Bang Yai'),
(56, 3, 'ปากเกร็ด', 'Pak Kret'),
(57, 3, 'เมืองนนทบุรี', 'Mueang Nonthaburi'),
(58, 4, 'คลองหลวง', 'Khlong Luang'),
(59, 4, 'ธัญบุรี', 'Thanyaburi'),
(60, 4, 'เมืองปทุมธานี', 'Mueang Pathum Thani'),
(61, 4, 'ลาดหลุมแก้ว', 'Lat Lum Kaeo'),
(62, 4, 'ลำลูกกา', 'Lam Luk Ka'),
(63, 4, 'สามโคก', 'Sam Khok'),
(64, 4, 'หนองเสือ', 'Nong Suea'),
(65, 2, 'พระสมุทรเจดีย์', 'Phra Samut Chedi'),
(66, 2, 'พระประแดง', 'Phra Pradaeng'),
(67, 2, 'บางเสาธง', 'Bang Sao Thong'),
(68, 2, 'บางพลี', 'Bang Phli'),
(69, 2, 'บางบ่อ', 'Bang Bo');

-- --------------------------------------------------------

--
-- Table structure for table `lv_banner_promotion`
--

CREATE TABLE `lv_banner_promotion` (
  `banner_promotion_id` int(11) NOT NULL,
  `banner_promotion_image_pc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_promotion_image_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_promotion_enable` enum('Enable','Disable') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lv_banner_promotion`
--

INSERT INTO `lv_banner_promotion` (`banner_promotion_id`, `banner_promotion_image_pc`, `banner_promotion_image_mobile`, `banner_promotion_enable`) VALUES
(1, 'local/storage/app/pick_your_plan/banner-applewatch_02.jpg', 'local/storage/app/pick_your_plan/banner_promb.jpg', 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `lv_buy_1_get_1_free`
--

CREATE TABLE `lv_buy_1_get_1_free` (
  `buy_1_get_1_free_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_1_get_1_free_datetime_create` datetime NOT NULL,
  `buy_1_get_1_free_ip_create` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_buy_1_get_1_free`
--

INSERT INTO `lv_buy_1_get_1_free` (`buy_1_get_1_free_id`, `product_id`, `buy_1_get_1_free_datetime_create`, `buy_1_get_1_free_ip_create`) VALUES
(1, 10, '2021-01-11 16:26:00', 'www.eatfitshop.com'),
(2, 8, '2020-12-26 13:36:44', 'www.eatfitshop.com'),
(3, 7, '2020-12-26 13:37:05', 'www.eatfitshop.com'),
(4, 9, '2020-12-26 13:37:25', 'www.eatfitshop.com');

-- --------------------------------------------------------

--
-- Table structure for table `lv_charge`
--

CREATE TABLE `lv_charge` (
  `charge_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `charge_test_mcc` text DEFAULT NULL,
  `charge_union_pay` text DEFAULT NULL,
  `charge_tpn` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lv_member`
--

CREATE TABLE `lv_member` (
  `member_id` int(11) NOT NULL,
  `member_point` int(11) DEFAULT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_family` varchar(255) DEFAULT NULL,
  `member_birth_day` date DEFAULT NULL,
  `member_gender` enum('Male','Female') DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_phone_number` varchar(255) DEFAULT NULL,
  `member_password` varchar(255) DEFAULT NULL,
  `member_forgot_password` varchar(255) DEFAULT NULL,
  `member_address` text DEFAULT NULL,
  `member_province` varchar(255) DEFAULT NULL,
  `member_district` varchar(255) DEFAULT NULL,
  `member_sub_district` varchar(255) DEFAULT NULL,
  `member_postcode` varchar(255) DEFAULT NULL,
  `member_datetime_create` datetime NOT NULL,
  `member_ip_create` varchar(255) NOT NULL,
  `member_datetime_update` datetime NOT NULL,
  `member_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_member`
--

INSERT INTO `lv_member` (`member_id`, `member_point`, `member_name`, `member_family`, `member_birth_day`, `member_gender`, `member_email`, `member_phone_number`, `member_password`, `member_forgot_password`, `member_address`, `member_province`, `member_district`, `member_sub_district`, `member_postcode`, `member_datetime_create`, `member_ip_create`, `member_datetime_update`, `member_ip_update`) VALUES
(1, NULL, 'lalita', 'piboonkanarak', '2020-01-11', 'Female', 'roundroundlaos@gmail.com', '0879047477', '1234', NULL, 'thailand', 'Bangkok', 'Dusit', 'Dusit', '10300', '2020-12-05 00:09:01', '184.22.227.113', '2021-01-12 13:46:07', '180.183.98.5'),
(2, NULL, 'Dada', 'P.', '1994-03-16', 'Male', 'vichuda@bangkokaircatering.com', '0997822250', 'vichuda16', '', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2020-12-05 08:48:16', '58.8.152.140', '2021-01-13 09:06:06', '180.180.218.52'),
(3, 200, 'Ford', 'Fuji', '1979-06-14', 'Male', 'sitiporn@orange-thailand.com', '0990943010', 'qwaszx', '', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-05 09:07:44', '1.20.8.133', '2020-12-12 10:33:51', '180.183.126.140'),
(4, NULL, 'Weerathep', 'Kongsarnsri', '1994-10-09', 'Male', 'weerathep09@gmail.com', '0959282829', '160337', NULL, '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2020-12-05 10:18:50', '58.8.152.140', '2020-12-05 10:18:50', '58.8.152.140'),
(5, 4, 'Natchanun', 'Suvannaratana', '1980-07-11', 'Female', 'suvannaratana@gmail.com', '0624429922', 'Preston_2014', NULL, '758/255 Waterford Diamond Tower, Sukhumvit 30/1, Sukhumvit Rd., Klongton, Klongtoey', 'Bangkok', 'Khlong Toei', 'Khlong Ton', '10110', '2020-12-06 11:44:40', '49.230.135.85', '2020-12-16 16:49:25', '180.180.218.52'),
(6, NULL, 'Weerathap', 'Kongsarnsri', '1994-10-09', 'Male', 'vi-chuda@hotmail.com', '0997822250', 'vichuda16', NULL, '1589/57 The miracle plus 3', 'Bangkok', 'Bang Kae', 'Lak Song', '10510', '2020-12-06 12:05:55', '171.99.161.54', '2020-12-06 12:05:55', '171.99.161.54'),
(7, NULL, 'HN', 'TK', '1998-06-17', 'Male', 'husnee1717@gmail.com', '0832262579', '12345678', NULL, '11', 'Bangkok', 'Bang Phlat', 'Bang O', '10700', '2020-12-06 12:07:12', '49.228.152.108', '2020-12-06 12:07:12', '49.228.152.108'),
(8, NULL, 'test', 'test', '2019-06-04', 'Male', 'ford@ford.com', '099999999', 'qwaszx', NULL, '566666', 'Bangkok', 'Bang Khun Thian', 'Chom Thong', '45009', '2020-12-06 12:10:28', '27.55.88.190', '2020-12-06 12:10:28', '27.55.88.190'),
(9, NULL, 'Panjaree', 'Hutacharoen', '1996-09-19', 'Male', 'panjree.h@gmail.com', '0816845414', 'onpitcha', NULL, '39 ซอย ลาดกระบัง 48', 'Bangkok', 'Lat Krabang', 'Lat Krabang', '10520', '2020-12-06 12:13:22', '182.52.218.43', '2020-12-06 12:13:22', '182.52.218.43'),
(10, NULL, 'Test', 'Test', '2019-03-03', 'Male', 'test@test.com', '099999999', 'qwaszx', NULL, 'Test', 'Pathum Thani', 'Khlong Luang', 'Khlong Ha', '10888', '2020-12-06 17:50:53', '27.55.88.190', '2020-12-06 17:50:53', '27.55.88.190'),
(11, NULL, 'Phaphassorn', 'จักกะพาก', '1976-10-25', 'Male', 'phaphassornc@gmail.com', '0979244466', 'eatfit2020', NULL, '348/304 The Nest  สุขุมวิท 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-08 06:28:21', '49.230.203.176', '2020-12-08 06:28:21', '49.230.203.176'),
(12, NULL, 'ภภัสสร', 'จักกะพาก', '1976-10-25', 'Male', 'ammypc2020@gmai.com', '0979244466', 'eatfit2020', NULL, 'The Nest สุขุมวิท 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-08 06:30:21', '49.230.203.176', '2020-12-08 06:30:21', '49.230.203.176'),
(13, NULL, 'Test', 'Test', '2007-10-17', 'Male', 'test@test123.com', '099999999', 'qwaszx', NULL, '366/66 Bangsue', 'Bangkok', 'Bang Kho Laem', 'Bang Khlo', '54345', '2020-12-08 09:17:07', '58.8.212.1', '2020-12-08 09:17:07', '58.8.212.1'),
(14, NULL, 'Test', 'Test', '2019-06-05', 'Male', 'rr@rr.com', '09998898', 'qwaszx', NULL, '4444', 'Bangkok', 'Bang Khen', 'Sai Mai', '65666', '2020-12-08 09:26:55', '124.120.200.36', '2020-12-08 09:26:55', '124.120.200.36'),
(15, NULL, 'Rrrr', 'Dddd', '2019-05-03', 'Male', 'rr@jkl.com', '098877777', 'qwaszx', NULL, '46677', 'Bangkok', 'Bang Khun Thian', 'Bang Khun Thian', '65776', '2020-12-08 09:29:13', '124.120.200.36', '2020-12-08 09:29:13', '124.120.200.36'),
(16, NULL, 'Ford2', 'Ford2', '2023-02-03', 'Male', 'abc@def.com', '09999999', 'qwaszx', NULL, '366/66 Bangsue', 'Nonthaburi', 'Bang Kruai', 'Bang Kruai', '10800', '2020-12-08 09:43:58', '124.120.200.36', '2020-12-08 09:43:58', '124.120.200.36'),
(17, NULL, 'Ford', 'Fuji', '2022-02-12', 'Male', 'siti@aa.com', '0990943010', 'qwaszx', NULL, '366/66 Bangsue', 'Bangkok', 'Min Buri', 'Sai Kong Din', '10800', '2020-12-08 09:45:05', '124.120.200.36', '2020-12-08 09:45:05', '124.120.200.36'),
(18, NULL, 'Fluke', 'Abc', '2024-02-02', 'Male', 'a@fluke.com', '0990943010', 'qwaszx', NULL, '366/66 Bangsue5', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-08 09:52:50', '124.120.200.36', '2020-12-08 09:52:50', '124.120.200.36'),
(19, NULL, 'Sitiporn', 'Trongwichien', '1979-06-14', 'Male', 'ford@ford123.com', '099999999', 'qwaszx', NULL, '366/66 Bangsue', 'Bangkok', 'Huai Khwang', 'Huai Khwang', '54353', '2020-12-08 10:01:34', '124.120.200.36', '2020-12-08 10:01:34', '124.120.200.36'),
(20, NULL, 'Ford', 'Fuji', '2021-04-11', 'Male', 'test-ford@gmail.com', '099999999', 'qwaszx', NULL, '366/66 Bangsue', 'Bangkok', 'Bangkok Noi', 'Bang Phlat', '10800', '2020-12-08 10:04:02', '124.120.200.36', '2020-12-08 10:04:02', '124.120.200.36'),
(21, NULL, 'Natchanun', 'Suvannaratana', '1980-07-11', 'Male', 'natchanun@bangkokaircatering.com', '0624429922', 'Preston_2014', NULL, '11/07/2523 BE', 'Bangkok', 'Khlong Toei', 'Khlong Ton', '10110', '2020-12-08 14:44:12', '49.230.128.227', '2020-12-08 14:44:12', '49.230.128.227'),
(22, NULL, 'Kriangsak', 'Tangvichitsagul', '1975-10-15', 'Male', 'kriangsak@bangkokaircatering.com', '0982692266', 'Tee@oct75', '', '95/60 Suksawas road', 'Samut Prakan', 'Phra Pradaeng', 'Bang Phueng', '10130', '2020-12-09 14:11:04', '49.230.205.241', '2020-12-22 11:43:09', '180.180.218.52'),
(23, NULL, 'Benjalat', 'Khemnarong', '1992-05-12', 'Male', 'benjalat.pear@gmail.com', '0634264629', 'benjalat4264629', NULL, 'อาคารวาริช เลขที่ 88 ถนนเทพรัตน', 'Bangkok', 'Bang Na', 'Bang Na Tai', '10260', '2020-12-09 20:35:58', '182.232.161.174', '2020-12-09 20:35:58', '182.232.161.174'),
(24, 150, 'Ford', 'FFF', '1979-05-06', 'Male', 'nirvanaford94@gmail.com', '0990943010', 'qwaszx', NULL, '366/66 Bangsue', 'Bangkok', 'Don Mueang', 'Talad Bang Khen', '54355', '2020-12-11 09:38:26', '119.76.33.247', '2021-01-12 19:41:54', '27.55.74.78'),
(25, NULL, 'aaa', 'bbbb', '2008-11-20', 'Male', 'fds@fds.com', '900099999', 'qwaszx', NULL, '366/66 Bangsue', 'Bangkok', 'Din Daeng', 'Ratchadapisek', '54353', '2020-12-11 09:39:29', '119.76.33.247', '2020-12-11 09:39:29', '119.76.33.247'),
(26, NULL, 'suwannee', 'siriwattanakul', '2014-06-11', 'Male', 'ssiriwattanakul108@gmail.com', '0646871513', 'Appurusinhua50', NULL, '89/108หมู่​บ้านคา​ซ่า​วิลล์​ว​ั​ชร​พล​', 'Bangkok', 'Sai Mai', 'Khlong Thanon', '10220', '2020-12-12 18:19:39', '171.97.35.206', '2020-12-12 18:19:39', '171.97.35.206'),
(27, NULL, 'Jiranun', 'Khumkaew', '1993-05-21', 'Male', 'bogy_f@hotmail.com', '0809589809', '1000000', NULL, '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2020-12-12 19:22:34', '124.120.218.242', '2020-12-12 19:22:34', '124.120.218.242'),
(28, NULL, 'จงจิต', 'ปรางกุลเจริญกิจ', '1972-05-24', 'Male', 'jongjit.p@gmail.com', '0991758854', 'Jsp#978899', NULL, '29/38 ม.อลิชา1 ถ.พุทธบูชา36 แขวงบางมด เขตทุ่งครุ', 'Bangkok', 'Thung Khru', 'Bang Mod', '10140', '2020-12-17 06:37:38', '1.47.226.153', '2020-12-17 06:37:38', '1.47.226.153'),
(29, NULL, 'SORRATAN', 'SATHIRAPAKAWUT', '1980-02-02', 'Male', 'sorratant@gmail.com', '0859593434', '0859593434', NULL, '44 Langsuan', 'Bangkok', 'Pathum Wan', 'Lumphini', '10330', '2020-12-17 19:06:17', '1.47.73.191', '2020-12-17 19:06:17', '1.47.73.191'),
(30, NULL, 'kittima', 'kraokaew', '1993-04-13', 'Male', 'kittimakraokaew@gmail.com', '0922541709', '111333', NULL, '55/50', 'Nonthaburi', 'Pak Kret', 'Pak Kret', '11120', '2020-12-18 13:51:29', '180.180.218.52', '2020-12-18 13:51:29', '180.180.218.52'),
(31, 8, 'phaphassorn', 'chakkaphak', '1976-10-25', 'Male', 'ammypc2020@gmail.com', '0979244466', 'Eatfit2020', NULL, 'The Nest Sukhumvit 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-21 13:17:32', '182.232.175.2', '2020-12-24 14:42:32', '180.180.218.52'),
(32, NULL, 'Supaluk', 'Siriburananon', '1987-10-29', 'Male', 'jubmako@hotmail.com', '0944829499', 'Jj246841', NULL, '298/55 Pyne by Sansiri condomnium, Phayathai Rd', 'Bangkok', 'Ratchathewi', 'Thanon Phetchaburi', '10400', '2020-12-30 14:27:44', '202.90.6.36', '2020-12-30 14:27:44', '202.90.6.36'),
(33, NULL, 'Kamonchanok', 'Porncharoen', '1990-08-11', 'Male', 'kwangpongpang@gmail.com', '0814352746', 'P@ssword01', NULL, '199/2981', 'Samut Prakan', 'Mueang Samut Prakan', 'Phraek Sa Mai', '10280', '2020-12-30 16:54:48', '182.52.67.178', '2020-12-30 16:54:48', '182.52.67.178'),
(34, NULL, 'Rachada', 'kirakira', '2000-01-16', 'Male', 'hellokitty_9@outlook.com', '0626273002', '123456789', NULL, 'หมู่บ้าน vive บางนา-ตราด', 'Bangkok', 'Bang Na', 'Bang Na', '10270', '2021-01-04 08:40:10', '180.180.218.52', '2021-01-04 08:40:10', '180.180.218.52'),
(35, NULL, 'Kanpitchaya', 'Ausavanodom', '1984-06-15', 'Male', 'doraepiggy_koong@hotmail.com', '0818114439', 'Koongie1511', NULL, '11 The Colory Vivid Condo ห้อง 11/117 ประชาราษฎร์บำเพ็ญ ซอย 6 แขวงห้วยขวาง เขตห้วยขวาง', 'Bangkok', 'Huai Khwang', 'Huai Khwang', '10310', '2021-01-12 11:41:09', '202.183.213.242', '2021-01-12 11:41:09', '202.183.213.242'),
(36, NULL, 'Vchd Daada', NULL, NULL, NULL, 'f.stitch@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12 13:03:09', '49.230.9.161', '2021-01-13 08:48:42', '180.180.218.52'),
(37, NULL, 'GH Gourmethouse', NULL, NULL, NULL, 'gourmethousethailand@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12 13:05:26', '49.230.9.161', '2021-01-13 08:49:33', '180.180.218.52'),
(38, NULL, 'Ford Fuji', NULL, NULL, NULL, 'nirvanaford9411@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12 13:17:39', '180.183.98.5', '2021-01-12 19:35:38', '1.47.174.229'),
(39, NULL, 'McConnell David', NULL, NULL, NULL, 'maniacmaniacmaniacz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12 13:47:16', '180.180.241.12', '2021-01-12 14:29:37', '180.180.241.12'),
(40, NULL, 'Mana Manachai', NULL, NULL, NULL, 'indyguna_na@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12 14:23:44', '180.183.98.5', '2021-01-12 14:23:44', '180.183.98.5'),
(41, NULL, 'Panjaree Hutacharoen', NULL, NULL, NULL, 'panjaree.h@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-13 09:28:59', '180.180.218.52', '2021-01-13 09:28:59', '180.180.218.52');

-- --------------------------------------------------------

--
-- Table structure for table `lv_order`
--

CREATE TABLE `lv_order` (
  `order_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `point_redeem` int(11) DEFAULT NULL,
  `product_redeem` varchar(255) NOT NULL,
  `point_redeem_discount` varchar(255) DEFAULT NULL,
  `point_redeem_type` varchar(255) DEFAULT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_price` float(10,2) NOT NULL,
  `order_image` varchar(1000) NOT NULL,
  `order_calories` int(11) NOT NULL,
  `order_products_id_1_day` varchar(11) NOT NULL,
  `order_products_id_2_day` varchar(11) NOT NULL,
  `order_products_id_3_day` varchar(11) NOT NULL,
  `order_products_id_4_day` varchar(11) NOT NULL,
  `order_products_id_5_day` varchar(11) NOT NULL,
  `order_products_id_6_day` varchar(11) NOT NULL,
  `order_products_id_7_day` varchar(11) NOT NULL,
  `product_buy_1_get_1_free` enum('','Buy 1 get 1 free') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_order`
--

INSERT INTO `lv_order` (`order_id`, `order_detail_id`, `products_id`, `point_redeem`, `product_redeem`, `point_redeem_discount`, `point_redeem_type`, `order_name`, `order_qty`, `order_price`, `order_image`, `order_calories`, `order_products_id_1_day`, `order_products_id_2_day`, `order_products_id_3_day`, `order_products_id_4_day`, `order_products_id_5_day`, `order_products_id_6_day`, `order_products_id_7_day`, `product_buy_1_get_1_free`) VALUES
(1, 1, -1, NULL, '', NULL, NULL, 'Package 3 Days', 1, 899.00, 'local/storage/app/pick_your_plan/photo_slimfast.jpg', 3476, 'true', 'false', 'true', 'true', 'false', 'false', 'false', ''),
(2, 2, 27, NULL, '', NULL, NULL, 'Brown rice noodle with salmon curry sauce', 1, 169.00, 'local/storage/app/img_products_outside/AvNDTtWF8IuLzJruxn1in6QCoPWN48rMb6P1zyKp.jpeg', 397, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(3, 3, 29, NULL, '', NULL, NULL, 'Steamed red snapper with celery sauce and red cargo rice', 1, 169.00, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 407, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(4, 4, -1, NULL, '', NULL, NULL, 'Package 7 Days', 8, 1999.00, 'local/storage/app/pick_your_plan/photo_slimfast3.jpg', 8260, 'true', 'true', 'true', 'true', 'true', 'true', 'true', ''),
(5, 5, 35, NULL, '', NULL, NULL, 'Chicken kua kling with brown rice', 1, 99.00, 'local/storage/app/img_products_outside/Zrx6FqrVb20aKF51CRxnHLA3LlipA376bbawuQKy.jpeg', 476, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(6, 6, -1, NULL, '', NULL, NULL, 'Package 3 Days', 1, 899.00, 'local/storage/app/pick_your_plan/photo_slimfast.jpg', 3557, 'false', 'true', 'false', 'true', 'true', 'false', 'false', ''),
(7, 7, -1, NULL, '', NULL, NULL, 'Package 7 Days', 1, 1999.00, 'local/storage/app/pick_your_plan/photo_slimfast3.jpg', 8260, 'true', 'true', 'true', 'true', 'true', 'true', 'true', ''),
(8, 8, 40, NULL, '', NULL, NULL, 'Asian chicken stew with riceberry', 5, 109.00, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 416, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(9, 8, -1, NULL, '', NULL, NULL, 'Package 5 Days', 1, 1489.00, 'local/storage/app/pick_your_plan/photo_slimfast2.jpg', 5880, 'true', 'true', 'true', 'true', 'true', 'false', 'false', ''),
(10, 9, 22, NULL, '', NULL, NULL, 'Quinoa avocado salad and Italian dressing', 1, 149.00, 'local/storage/app/img_products_outside/XZH3G6WLTayAc8MelL7oIyQx89K3IhOotCNLZk5K.jpeg', 285, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(11, 9, 26, NULL, '', NULL, NULL, 'Smoked salmon with whole wheat bread', 1, 109.00, 'local/storage/app/img_products_outside/E0eErYPICDXIGZb3FXIgwtWsYx3HFGfSvpYSwtoz.jpeg', 647, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(12, 9, 19, NULL, '', NULL, NULL, 'Grilled chicken caesar salad with caesar dressing', 1, 99.00, 'local/storage/app/img_products_outside/tdXjEAXWz8oDaHTyU0H7QwyZDbTvywiWZMxjHPQl.jpeg', 369, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(13, 9, 23, NULL, '', NULL, NULL, 'Chicken avocado caesar salad wrap', 1, 169.00, 'local/storage/app/img_products_outside/IJKMkrBmkvl1MmJdvnzbqJBl3PiMYnfozeCHUnqf.jpeg', 483, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(14, 10, 40, NULL, '', NULL, NULL, 'Asian chicken stew with riceberry', 1, 109.00, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 416, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(15, 10, -1, NULL, '', NULL, NULL, 'Package 5 Days', 1, 1489.00, 'local/storage/app/pick_your_plan/photo_slimfast2.jpg', 5880, 'true', 'true', 'true', 'true', 'true', 'false', 'false', ''),
(16, 11, 22, NULL, '', NULL, NULL, 'Quinoa avocado salad and Italian dressing', 1, 149.00, 'local/storage/app/img_products_outside/XZH3G6WLTayAc8MelL7oIyQx89K3IhOotCNLZk5K.jpeg', 285, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(17, 11, 21, NULL, '', NULL, NULL, 'Wakame salad with ponzu dressing', 1, 69.00, 'local/storage/app/img_products_outside/ERd2dLra2ZaE0M1n1yzyh2gOZZhar3ARu9pctXVT.jpeg', 91, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(18, 11, 23, NULL, '', NULL, NULL, 'Chicken avocado caesar salad wrap', 1, 169.00, 'local/storage/app/img_products_outside/IJKMkrBmkvl1MmJdvnzbqJBl3PiMYnfozeCHUnqf.jpeg', 483, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(19, 11, 47, NULL, '', NULL, NULL, 'Smoked salmon with whole wheat bread + Cold-Pressed Carrot juice', 1, 145.00, 'local/storage/app/img_products_outside/S8KYHPuP3FqDDGpSwS6Wpf3POl2aUkBgn7hJQkpX.jpeg', 1051, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(20, 12, 31, NULL, '', NULL, NULL, 'Herb roasted chicken with jaew sauce and red cargo rice', 1, 109.00, 'local/storage/app/img_products_outside/2Njyn4mgfpyLOa9tlNB1R3pO8GN0NUloQXOqgMV6.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(21, 12, 47, NULL, '', NULL, NULL, 'Smoked salmon with whole wheat bread + Cold-Pressed Carrot juice', 1, 145.00, 'local/storage/app/img_products_outside/S8KYHPuP3FqDDGpSwS6Wpf3POl2aUkBgn7hJQkpX.jpeg', 1051, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(22, 12, 45, NULL, '', NULL, NULL, 'Grilled chicken honey mustard with multigrain bread  + Cold-Pressed Beetroot juice', 1, 145.00, 'local/storage/app/img_products_outside/kSMjiymjL2N3K0pMK5qDZg8Rt3Cb5UQgKKsKhU06.jpeg', 922, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(23, 12, 21, NULL, '', NULL, NULL, 'Wakame salad with ponzu dressing', 1, 69.00, 'local/storage/app/img_products_outside/ERd2dLra2ZaE0M1n1yzyh2gOZZhar3ARu9pctXVT.jpeg', 91, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(24, 12, 30, NULL, '', NULL, NULL, 'Stir-fried chicken with green curry and riceberry', 1, 109.00, 'local/storage/app/img_products_outside/VDsmfKMX3l6LgQLOoymgi2dFezKscMxOoWiUIvId.jpeg', 467, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(25, 13, 31, NULL, '', NULL, NULL, 'Herb roasted chicken with jaew sauce and red cargo rice', 1, 109.00, 'local/storage/app/img_products_outside/2Njyn4mgfpyLOa9tlNB1R3pO8GN0NUloQXOqgMV6.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(26, 15, 29, NULL, '', NULL, NULL, 'Steamed red snapper with celery sauce and red cargo rice', 1, 169.00, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 407, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(27, 16, 32, NULL, '', NULL, NULL, 'Spicy larb quinoa with chicken', 1, 129.00, 'local/storage/app/img_products_outside/S0bDZHn2854JW75PKCr6zm5obHyEQmTOl1yLlwcX.jpeg', 389, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(28, 17, 29, NULL, '', NULL, NULL, 'Steamed red snapper with celery sauce and red cargo rice', 1, 169.00, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 407, 'false', 'false', 'false', 'false', 'false', 'false', 'false', ''),
(29, 18, 40, NULL, '', NULL, NULL, 'Asian chicken stew with riceberry', 5, 109.00, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 416, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(30, 19, 40, NULL, '', NULL, NULL, 'Asian chicken stew with riceberry', 5, 109.00, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 416, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(31, 20, 32, NULL, '', NULL, NULL, 'Spicy larb quinoa with chicken', 1, 129.00, 'local/storage/app/img_products_outside/S0bDZHn2854JW75PKCr6zm5obHyEQmTOl1yLlwcX.jpeg', 389, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(32, 21, 29, NULL, '', NULL, NULL, 'Steamed red snapper with celery sauce and red cargo rice', 3, 169.00, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 407, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(33, 22, 29, NULL, '', NULL, NULL, 'Steamed red snapper with celery sauce and red cargo rice', 1, 169.00, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 407, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(34, 23, 27, NULL, '', NULL, NULL, 'Brown rice noodle with salmon curry sauce', 1, 169.00, 'local/storage/app/img_products_outside/AvNDTtWF8IuLzJruxn1in6QCoPWN48rMb6P1zyKp.jpeg', 397, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(35, 24, 40, NULL, '', NULL, NULL, 'Asian chicken stew with riceberry', 1, 109.00, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 416, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(36, 25, 7, NULL, '', NULL, NULL, 'Chicken breast smoothie - Peanut butter', 1, 159.00, 'local/storage/app/img_products_outside/nUUfUlnXhYSCOSAIJZvtnRc4cAoroAlv3Uaqq639.jpeg', 705, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(37, 25, 48, NULL, '', NULL, NULL, 'Healthy banana muffin + Cold-Pressed Butterfly pea  & apple juice', 1, 145.00, 'local/storage/app/img_products_outside/VXNEW0uexuBA1kU6x5ktzPr49aQUY9GeOdngFRWc.jpeg', 755, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(38, 25, 50, NULL, '', NULL, NULL, 'Chicken breast smoothie - Chocolate + Rice bran cookie with cashew nut (2pcs)', 1, 179.00, 'local/storage/app/img_products_outside/Yxfst5c59ickG23pxqpQAawIdI6GMeM4HK3GeNNW.jpeg', 724, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(39, 25, 52, NULL, '', NULL, NULL, 'Chicken breast smoothie - Green tea + Rice bran cookie with cashew nut (2pcs)', 1, 179.00, 'local/storage/app/img_products_outside/514y8A1WOw06ElCd4mc3YpiCI5F9lVLkqnHCWfth.jpeg', 792, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(40, 25, 51, NULL, '', NULL, NULL, 'Chicken breast smoothie-Strawberry yogurt + Rice bran cookie with cashew nut (2pcs)', 1, 179.00, 'local/storage/app/img_products_outside/ZIafqdZJyFnsfzjbdV33WUbMlJAaRA4JqmGmuOyV.jpeg', 706, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(41, 26, 32, NULL, '', NULL, NULL, 'Spicy larb quinoa with chicken', 1, 129.00, 'local/storage/app/img_products_outside/S0bDZHn2854JW75PKCr6zm5obHyEQmTOl1yLlwcX.jpeg', 389, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(42, 26, 29, NULL, '', NULL, NULL, 'Steamed red snapper with celery sauce and red cargo rice', 1, 169.00, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 407, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(43, 26, 40, NULL, '', NULL, NULL, 'Asian chicken stew with riceberry', 2, 109.00, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 416, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(44, 26, 9, NULL, '', NULL, NULL, 'Chicken breast smoothie-Strawberry yogurt', 2, 159.00, 'local/storage/app/img_products_outside/ASJxU5CtmdYbRJxWa80Rn5a41shMJcA9IxfMz3TJ.jpeg', 478, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(45, 27, 27, NULL, '', NULL, NULL, 'Brown rice noodle with salmon curry sauce ()', 2, 169.00, 'local/storage/app/img_products_outside/AvNDTtWF8IuLzJruxn1in6QCoPWN48rMb6P1zyKp.jpeg', 397, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(46, 27, 31, NULL, '', NULL, NULL, 'Herb roasted chicken with jaew sauce and red cargo rice ()', 1, 109.00, 'local/storage/app/img_products_outside/2Njyn4mgfpyLOa9tlNB1R3pO8GN0NUloQXOqgMV6.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(47, 27, 35, NULL, '', NULL, NULL, 'Chicken kua kling with brown rice ()', 2, 99.00, 'local/storage/app/img_products_outside/Zrx6FqrVb20aKF51CRxnHLA3LlipA376bbawuQKy.jpeg', 476, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(48, 27, 11, NULL, '', NULL, NULL, 'Cold-Pressed Beetroot juice ()', 1, 99.00, 'local/storage/app/img_products_outside/2bOn7cnhKCrVPjLNjAxRDumKnRrRoQF5naP0S1Aq.jpeg', 426, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(49, 28, 7, NULL, 'true', ' ', NULL, 'Chicken breast smoothie - Peanut butter', 1, 159.00, 'local/storage/app/img_products_outside/nUUfUlnXhYSCOSAIJZvtnRc4cAoroAlv3Uaqq639.jpeg', 705, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(50, 29, 8, NULL, 'true', ' ', NULL, 'Chicken breast smoothie - Chocolate', 1, 159.00, 'local/storage/app/img_products_outside/QGAqCrQK3eeoBmF1z0TYNrPVSpNIKV6FqzAUb2TA.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(51, 30, 8, NULL, 'true', ' ', NULL, 'Chicken breast smoothie - Chocolate', 1, 159.00, 'local/storage/app/img_products_outside/QGAqCrQK3eeoBmF1z0TYNrPVSpNIKV6FqzAUb2TA.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(52, 31, 8, NULL, 'true', ' ', NULL, 'Chicken breast smoothie - Chocolate', 1, 159.00, 'local/storage/app/img_products_outside/QGAqCrQK3eeoBmF1z0TYNrPVSpNIKV6FqzAUb2TA.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(53, 32, 8, NULL, 'true', ' ', NULL, 'Chicken breast smoothie - Chocolate', 1, 159.00, 'local/storage/app/img_products_outside/QGAqCrQK3eeoBmF1z0TYNrPVSpNIKV6FqzAUb2TA.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL),
(54, 33, 8, NULL, 'true', ' ', NULL, 'Chicken breast smoothie - Chocolate', 1, 159.00, 'local/storage/app/img_products_outside/QGAqCrQK3eeoBmF1z0TYNrPVSpNIKV6FqzAUb2TA.jpeg', 496, 'false', 'false', 'false', 'false', 'false', 'false', 'false', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lv_order_detail`
--

CREATE TABLE `lv_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `order_detail_sub_total` float(10,2) NOT NULL,
  `order_detail_discount` float(10,2) NOT NULL,
  `order_detail_shipping` float(10,2) NOT NULL,
  `order_detail_total` float(10,2) NOT NULL,
  `order_detail_shipping_name` varchar(255) NOT NULL,
  `order_detail_shipping_family` varchar(255) NOT NULL,
  `order_detail_birth_day` date DEFAULT NULL,
  `order_detail_shipping_email` varchar(255) NOT NULL,
  `order_detail_shipping_phone_number` varchar(255) NOT NULL,
  `order_detail_shipping_address` text NOT NULL,
  `order_detail_shipping_province` varchar(255) NOT NULL,
  `order_detail_shipping_district` varchar(255) NOT NULL,
  `order_detail_shipping_sub_district` varchar(255) NOT NULL,
  `order_detail_shipping_postcode` varchar(255) NOT NULL,
  `order_detail_billing_name` varchar(255) NOT NULL,
  `order_detail_billing_family` varchar(255) NOT NULL,
  `order_detail_billing_email` varchar(255) NOT NULL,
  `order_detail_billing_phone_number` varchar(255) NOT NULL,
  `order_detail_billing_address` text NOT NULL,
  `order_detail_billing_province` varchar(255) NOT NULL,
  `order_detail_billing_district` varchar(255) NOT NULL,
  `order_detail_billing_sub_district` varchar(255) NOT NULL,
  `order_detail_billing_postcode` varchar(255) NOT NULL,
  `order_detail_shipping_date` date NOT NULL,
  `order_detail_shipping_time` varchar(255) NOT NULL,
  `order_detail_shipping_date2` date DEFAULT NULL,
  `order_detail_shipping_time2` varchar(255) DEFAULT NULL,
  `order_detail_point` int(11) NOT NULL,
  `order_detail_payment_method` enum('ATM / Internet Banking','Credit Card','QR Code','Unionpay') NOT NULL,
  `order_detail_datetime_upload_slip` datetime DEFAULT NULL,
  `order_detail_status` enum('Waiting for Payment','Order Processing','Shipped','Delivered','Complete','Order Canceled') NOT NULL,
  `order_detail_promotion_15000_before_3_person` enum('No','Yes') NOT NULL,
  `order_detail_promotion_500_get_20_percent_and_free_delivery` enum('No','Yes') NOT NULL,
  `order_detail_promotion` enum('No','Yes') NOT NULL,
  `order_detail_view` enum('No','Yes') DEFAULT NULL,
  `order_detail_datetime_create` datetime NOT NULL,
  `order_detail_ip_create` varchar(255) NOT NULL,
  `order_detail_datetime_update` datetime NOT NULL,
  `order_detail_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_order_detail`
--

INSERT INTO `lv_order_detail` (`order_detail_id`, `order_no`, `member_id`, `order_detail_sub_total`, `order_detail_discount`, `order_detail_shipping`, `order_detail_total`, `order_detail_shipping_name`, `order_detail_shipping_family`, `order_detail_birth_day`, `order_detail_shipping_email`, `order_detail_shipping_phone_number`, `order_detail_shipping_address`, `order_detail_shipping_province`, `order_detail_shipping_district`, `order_detail_shipping_sub_district`, `order_detail_shipping_postcode`, `order_detail_billing_name`, `order_detail_billing_family`, `order_detail_billing_email`, `order_detail_billing_phone_number`, `order_detail_billing_address`, `order_detail_billing_province`, `order_detail_billing_district`, `order_detail_billing_sub_district`, `order_detail_billing_postcode`, `order_detail_shipping_date`, `order_detail_shipping_time`, `order_detail_shipping_date2`, `order_detail_shipping_time2`, `order_detail_point`, `order_detail_payment_method`, `order_detail_datetime_upload_slip`, `order_detail_status`, `order_detail_promotion_15000_before_3_person`, `order_detail_promotion_500_get_20_percent_and_free_delivery`, `order_detail_promotion`, `order_detail_view`, `order_detail_datetime_create`, `order_detail_ip_create`, `order_detail_datetime_update`, `order_detail_ip_update`) VALUES
(1, '1', 2, 899.00, 179.80, 0.00, 719.20, 'Dada', 'P.', '1994-03-16', 'vichuda@bangkokaircatering.com', '0997822250', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', 'Dada', 'P.', 'vichuda@bangkokaircatering.com', '0997822250', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2020-12-06', '16:00 – 20:00', NULL, '', 7, 'ATM / Internet Banking', '2020-12-05 09:54:00', 'Order Canceled', 'No', 'Yes', 'No', 'Yes', '2020-12-05 08:54:32', '58.8.152.140', '2020-12-05 09:54:46', '184.22.227.113'),
(2, '2', 3, 169.00, 0.00, 180.00, 349.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-06', '14:00 – 16:00', NULL, '', 3, 'ATM / Internet Banking', '2020-12-05 11:05:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-05 10:05:22', '1.20.8.133', '2020-12-05 11:06:01', '61.19.1.201'),
(3, '3', 1, 169.00, 0.00, 116.00, 285.00, 'lalita', 'piboonkanarak', '2020-01-11', 'roundroundlaos@gmail.com', '0879047477', 'thailand', 'Bangkok', 'Dusit', 'Dusit', '10300', 'lalita', 'piboonkanarak', 'roundroundlaos@gmail.com', '0879047477', 'thailand', 'Bangkok', 'Dusit', 'Dusit', '10300', '2020-12-06', '14:00 – 16:00', NULL, '', 2, 'ATM / Internet Banking', '2020-12-05 11:07:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-05 10:07:15', '184.22.227.113', '2020-12-05 11:13:50', '180.180.218.52'),
(4, '4', 26, 15992.00, 0.00, 168.00, 16160.00, 'suwannee', 'siriwattanakul', '2014-06-11', 'ssiriwattanakul108@gmail.com', '0646871513', '89/108หมู่​บ้านคา​ซ่า​วิลล์​ว​ั​ชร​พล​', 'Bangkok', 'Sai Mai', 'Khlong Thanon', '10220', 'suwannee', 'siriwattanakul', 'ssiriwattanakul108@gmail.com', '0646871513', '89/108หมู่​บ้านคา​ซ่า​วิลล์​ว​ั​ชร​พล​', 'Bangkok', 'Sai Mai', 'Khlong Thanon', '10220', '2020-12-15', '16:00 – 20:00', '2020-12-18', '16:00 – 20:00', 161, 'ATM / Internet Banking', '2020-12-12 19:34:00', 'Order Canceled', 'Yes', 'No', 'No', 'Yes', '2020-12-12 18:34:18', '171.97.35.206', '2020-12-12 19:36:52', '124.120.218.242'),
(5, '5', 27, 99.00, 0.00, 84.00, 183.00, 'Jiranun', 'Khumkaew', '1993-05-21', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', 'Jiranun', 'Khumkaew', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2020-12-13', '14:00 – 16:00', NULL, '', 1, 'ATM / Internet Banking', '2020-12-12 20:24:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-12 19:24:04', '124.120.218.242', '2020-12-12 19:26:54', '124.120.218.242'),
(6, '6', 27, 899.00, 179.80, 0.00, 719.20, 'Jiranun', 'Khumkaew', '1993-05-21', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', 'Jiranun', 'Khumkaew', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2020-12-13', '16:00 – 20:00', NULL, '', 7, 'ATM / Internet Banking', '2020-12-12 20:51:00', 'Order Canceled', 'No', 'Yes', 'No', 'Yes', '2020-12-12 19:51:07', '124.120.218.242', '2020-12-12 21:25:31', '173.252.95.2'),
(7, '7', 27, 1999.00, 399.80, 0.00, 1599.20, 'Jiranun', 'Khumkaew', '1993-05-21', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', 'Jiranun', 'Khumkaew', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2020-12-14', '08:00 – 12:00', '2020-12-17', '08:00 – 12:00', 15, 'ATM / Internet Banking', '2020-12-13 09:29:00', 'Order Canceled', 'No', 'Yes', 'No', 'Yes', '2020-12-13 08:29:08', '180.180.218.52', '2020-12-13 10:08:15', '31.13.127.22'),
(8, '8', 3, 2034.00, 406.80, 0.00, 1627.20, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-15', '08:00 – 12:00', '2020-12-18', '08:00 – 12:00', 16, 'ATM / Internet Banking', '2020-12-14 11:45:00', 'Order Canceled', 'No', 'Yes', 'No', 'Yes', '2020-12-14 10:45:32', '180.183.126.140', '2020-12-14 13:25:24', '147.92.179.105'),
(9, '9', 5, 526.00, 105.20, 0.00, 420.80, 'Natchanun', 'Suvannaratana', '1980-07-11', 'suvannaratana@gmail.com', '0624429922', '758/255 Waterford Diamond Tower, Sukhumvit 30/1, Sukhumvit Rd., Klongton, Klongtoey', 'Bangkok', 'Khlong Toei', 'Khlong Ton', '10110', 'Natchanun', 'Suvannaratana', 'suvannaratana@gmail.com', '0624429922', '758/255 Waterford Diamond Tower, Sukhumvit 30/1, Sukhumvit Rd., Klongton, Klongtoey', 'Bangkok', 'Khlong Toei', 'Khlong Ton', '10110', '2020-12-17', '16:00 – 20:00', NULL, '', 4, 'ATM / Internet Banking', '2020-12-16 17:28:00', 'Delivered', 'No', 'Yes', 'No', 'Yes', '2020-12-16 16:28:40', '182.232.51.3', '2020-12-18 10:00:09', '180.180.218.52'),
(10, '10', 30, 1598.00, 319.60, 0.00, 1278.40, 'kittima', 'kraokaew', '1993-04-13', 'kittimakraokaew@gmail.com', '0922541709', '55/50', 'Nonthaburi', 'Pak Kret', 'Pak Kret', '11120', 'kittima', 'kraokaew', 'kittimakraokaew@gmail.com', '0922541709', '55/50', 'Nonthaburi', 'Pak Kret', 'Pak Kret', '11120', '2020-12-19', '14:00 – 16:00', '2020-12-22', '08:00 – 12:00', 12, 'ATM / Internet Banking', '2020-12-18 14:55:00', 'Order Canceled', 'No', 'Yes', 'No', 'Yes', '2020-12-18 13:55:17', '180.180.218.52', '2020-12-18 16:17:12', '182.232.60.211'),
(11, '11', 31, 532.00, 106.40, 0.00, 425.60, 'phaphassorn', 'chakkaphak', '1976-10-25', 'ammypc2020@gmail.com', '0979244466', 'The Nest Sukhumvit 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', 'phaphassorn', 'chakkaphak', 'ammypc2020@gmail.com', '0979244466', 'The Nest Sukhumvit 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-22', '16:00 – 20:00', NULL, '', 4, 'ATM / Internet Banking', '2020-12-21 16:13:00', 'Delivered', 'No', 'Yes', 'No', 'Yes', '2020-12-21 15:13:05', '182.232.175.2', '2020-12-24 14:42:09', '180.180.218.52'),
(12, '12', 31, 577.00, 115.40, 0.00, 461.60, 'phaphassorn', 'chakkaphak', '1976-10-25', 'ammypc2020@gmail.com', '0979244466', 'The Nest Sukhumvit 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', 'phaphassorn', 'chakkaphak', 'ammypc2020@gmail.com', '0979244466', 'The Nest Sukhumvit 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-25', '16:00 – 20:00', NULL, '', 4, 'ATM / Internet Banking', '2020-12-24 10:10:00', 'Delivered', 'No', 'Yes', 'No', 'Yes', '2020-12-24 09:10:56', '182.232.175.2', '2020-12-26 11:41:31', '180.180.218.52'),
(13, '13', 3, 109.00, 0.00, 180.00, 289.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-25', '14:00 – 16:00', NULL, '', 2, 'ATM / Internet Banking', '2020-12-24 11:27:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-24 10:27:21', '180.183.102.193', '2020-12-24 11:56:54', '147.92.179.107'),
(14, '14', 3, 0.00, 0.00, 180.00, 180.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-25', '14:00 – 16:00', NULL, '', 1, 'ATM / Internet Banking', '2020-12-24 11:33:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-24 10:33:31', '180.183.102.193', '2020-12-24 11:56:54', '147.92.179.107'),
(15, '15', 3, 169.00, 0.00, 180.00, 349.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-25', '08:00 – 12:00', NULL, '', 3, 'ATM / Internet Banking', '2020-12-24 11:38:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-24 10:38:09', '180.183.102.193', '2020-12-24 11:56:54', '147.92.179.107'),
(16, '16', 3, 129.00, 0.00, 180.00, 309.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-25', '16:00 – 20:00', NULL, '', 3, 'ATM / Internet Banking', '2020-12-24 11:39:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-24 10:39:51', '180.183.102.193', '2020-12-24 11:56:54', '147.92.179.107'),
(17, '17', 3, 169.00, 0.00, 180.00, 349.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-25', '14:00 – 16:00', NULL, '', 3, 'ATM / Internet Banking', '2020-12-24 11:41:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-24 10:41:56', '180.183.102.193', '2020-12-24 11:56:54', '147.92.179.107'),
(18, '18', 3, 545.00, 109.00, 0.00, 436.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-29', '16:00 – 20:00', NULL, '', 4, 'ATM / Internet Banking', '2020-12-28 14:11:00', 'Order Canceled', 'No', 'No', 'Yes', 'Yes', '2020-12-28 13:11:00', '180.183.102.83', '2020-12-28 14:35:19', '49.230.17.157'),
(19, '19', 3, 545.00, 109.00, 0.00, 436.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-29', '16:00 – 20:00', NULL, '', 4, 'ATM / Internet Banking', '2020-12-28 14:11:00', 'Order Canceled', 'No', 'No', 'Yes', 'Yes', '2020-12-28 13:11:38', '180.183.102.83', '2020-12-28 14:35:19', '49.230.17.157'),
(20, '20', 3, 129.00, 0.00, 180.00, 309.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-29', '14:00 – 16:00', NULL, '', 3, 'ATM / Internet Banking', '2020-12-28 14:14:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-28 13:14:53', '180.183.102.83', '2020-12-28 14:35:19', '49.230.17.157'),
(21, '21', 3, 507.00, 101.40, 0.00, 405.60, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-29', '14:00 – 16:00', NULL, '', 4, 'ATM / Internet Banking', '2020-12-28 14:23:00', 'Order Canceled', 'No', 'No', 'Yes', 'Yes', '2020-12-28 13:23:13', '180.183.102.83', '2020-12-28 14:35:19', '49.230.17.157'),
(22, '22', 3, 169.00, 0.00, 180.00, 349.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-29', '14:00 – 16:00', NULL, '', 3, 'ATM / Internet Banking', '2020-12-28 14:24:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-28 13:24:58', '180.183.102.83', '2020-12-28 14:35:19', '49.230.17.157'),
(23, '23', 27, 169.00, 0.00, 84.00, 253.00, 'Jiranun', 'Khumkaew', '1993-05-21', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', 'Jiranun', 'Khumkaew', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2020-12-29', '14:00 – 16:00', NULL, '', 2, 'ATM / Internet Banking', '2020-12-28 14:48:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-28 13:48:44', '180.180.218.52', '2020-12-28 14:57:36', '223.24.154.226'),
(24, '24', 33, 109.00, 0.00, 96.00, 205.00, 'Kamonchanok', 'Porncharoen', '1990-08-11', 'kwangpongpang@gmail.com', '0814352746', '199/2981', 'Samut Prakan', 'Mueang Samut Prakan', 'Phraek Sa Mai', '10280', 'Kamonchanok', 'Porncharoen', 'kwangpongpang@gmail.com', '0814352746', '199/2981', 'Samut Prakan', 'Mueang Samut Prakan', 'Phraek Sa Mai', '10280', '2020-12-31', '16:00 – 20:00', NULL, '', 2, 'ATM / Internet Banking', '2020-12-30 18:00:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2020-12-30 17:00:40', '182.52.67.178', '2020-12-30 18:38:03', '66.249.71.114'),
(25, '25', 27, 841.00, 0.00, 0.00, 841.00, 'Jiranun', 'Khumkaew', '1993-05-21', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', 'Jiranun', 'Khumkaew', 'bogy_f@hotmail.com', '0809589809', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2021-01-03', '08:00 – 12:00', NULL, '', 8, 'ATM / Internet Banking', '2021-01-01 17:11:00', 'Order Canceled', 'No', 'No', 'Yes', 'Yes', '2021-01-01 16:11:44', '119.76.153.238', '2021-01-01 18:47:43', '13.66.139.161'),
(26, '26', 34, 834.00, 0.00, 0.00, 834.00, 'Rachada', 'kirakira', '2000-01-16', 'hellokitty_9@outlook.com', '0626273002', 'หมู่บ้าน vive บางนา-ตราด', 'Bangkok', 'Bang Na', 'Bang Na', '10270', 'Rachada', 'kirakira', 'hellokitty_9@outlook.com', '0626273002', 'หมู่บ้าน vive บางนา-ตราด', 'Bangkok', 'Bang Na', 'Bang Na', '10270', '2021-01-05', '08:00 – 12:00', NULL, '', 8, 'ATM / Internet Banking', '2021-01-04 09:47:00', 'Order Canceled', 'No', 'No', 'Yes', 'Yes', '2021-01-04 08:47:42', '180.180.218.52', '2021-01-04 08:51:16', '180.180.218.52'),
(27, '27', 30, 744.00, 0.00, 0.00, 744.00, 'kittima', 'kraokaew', '1993-04-13', 'kittimakraokaew@gmail.com', '0922541709', '55/50', 'Nonthaburi', 'Pak Kret', 'Pak Kret', '11120', 'kittima', 'kraokaew', 'kittimakraokaew@gmail.com', '0922541709', '55/50', 'Nonthaburi', 'Pak Kret', 'Pak Kret', '11120', '2021-01-05', '08:00 – 12:00', NULL, '', 7, 'ATM / Internet Banking', '2021-01-04 12:52:00', 'Order Canceled', 'No', 'No', 'Yes', 'Yes', '2021-01-04 11:52:11', '180.180.218.52', '2021-01-04 12:52:10', '180.180.218.52'),
(28, '28', 2, 159.00, 0.00, 176.00, 335.00, 'Dada', 'P.', '1994-03-16', 'vichuda@bangkokaircatering.com', '0997822250', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', 'Dada', 'P.', 'vichuda@bangkokaircatering.com', '0997822250', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2021-01-12', '16:00 – 20:00', NULL, '', 3, 'ATM / Internet Banking', '2021-01-11 15:04:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2021-01-11 14:04:03', '182.52.67.163', '2021-01-11 15:13:58', '125.25.74.153'),
(29, '29', 2, 159.00, 0.00, 176.00, 335.00, 'Dada', 'P.', '1994-03-16', 'vichuda@bangkokaircatering.com', '0997822250', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', 'Dada', 'P.', 'vichuda@bangkokaircatering.com', '0997822250', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2021-01-14', '08:00 – 12:00', NULL, '', 1, 'ATM / Internet Banking', '2021-01-13 10:08:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2021-01-13 09:08:30', '180.180.218.52', '2021-01-13 10:10:49', '58.9.213.173'),
(30, '30', 3, 159.00, 0.00, 180.00, 339.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2021-01-19', '14:00 – 16:00', NULL, '', 1, 'ATM / Internet Banking', '2021-01-18 18:41:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2021-01-18 17:41:57', '::1', '2021-01-19 08:58:58', '::1'),
(31, '31', 3, 159.00, 0.00, 180.00, 339.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2021-01-19', '14:00 – 16:00', NULL, '', 1, 'ATM / Internet Banking', '2021-01-18 18:43:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2021-01-18 17:43:14', '::1', '2021-01-19 08:58:58', '::1'),
(32, '32', 3, 159.00, 0.00, 180.00, 339.00, 'Ford', 'Fuji', '1979-06-14', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', 'Ford', 'Fuji', 'sitiporn@orange-thailand.com', '0990943010', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2021-01-19', '14:00 – 16:00', NULL, '', 1, 'ATM / Internet Banking', '2021-01-18 18:45:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2021-01-18 17:45:46', '::1', '2021-01-19 08:58:58', '::1'),
(33, '33', 24, 159.00, 0.00, 140.00, 299.00, 'Ford', 'FFF', '1979-05-06', 'nirvanaford94@gmail.com', '0990943010', '366/66 Bangsue', 'Bangkok', 'Don Mueang', 'Talad Bang Khen', '54355', 'Ford', 'FFF', 'nirvanaford94@gmail.com', '0990943010', '366/66 Bangsue', 'Bangkok', 'Don Mueang', 'Talad Bang Khen', '54355', '2021-01-20', '14:00 – 16:00', NULL, '', 1, 'ATM / Internet Banking', '2021-01-19 15:28:00', 'Order Canceled', 'No', 'No', 'No', 'Yes', '2021-01-19 14:28:12', '::1', '2021-01-19 16:26:10', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `lv_package`
--

CREATE TABLE `lv_package` (
  `package_id` int(11) NOT NULL,
  `product_id1` int(11) NOT NULL,
  `product_id2` int(11) NOT NULL,
  `product_id3` int(11) NOT NULL,
  `package_calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lv_package`
--

INSERT INTO `lv_package` (`package_id`, `product_id1`, `product_id2`, `product_id3`, `package_calories`) VALUES
(1, 40, 41, 19, 1188),
(2, 29, 35, 20, 1113),
(3, 44, 34, 22, 1135),
(4, 42, 27, 19, 1153),
(5, 37, 33, 28, 1291),
(6, 43, 30, 32, 1198),
(7, 36, 31, 22, 1182);

-- --------------------------------------------------------

--
-- Table structure for table `lv_package_price`
--

CREATE TABLE `lv_package_price` (
  `package_price_id` int(11) NOT NULL,
  `package_price_3_day` int(11) NOT NULL,
  `package_price_5_day` int(11) NOT NULL,
  `package_price_7_day` int(11) NOT NULL,
  `package_price3_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_description_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_description_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_description_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_detail_th` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_detail_en` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_detail_th` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_detail_en` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_detail_th` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_detail_en` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_detail2_th` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price3_detail2_en` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_detail2_th` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price5_detail2_en` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_detail2_th` text COLLATE utf8_unicode_ci NOT NULL,
  `package_price7_detail2_en` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lv_package_price`
--

INSERT INTO `lv_package_price` (`package_price_id`, `package_price_3_day`, `package_price_5_day`, `package_price_7_day`, `package_price3_image`, `package_price5_image`, `package_price7_image`, `package_price3_name_th`, `package_price3_name_en`, `package_price5_name_th`, `package_price5_name_en`, `package_price7_name_th`, `package_price7_name_en`, `package_price3_description_th`, `package_price3_description_en`, `package_price5_description_th`, `package_price5_description_en`, `package_price7_description_th`, `package_price7_description_en`, `package_price3_detail_th`, `package_price3_detail_en`, `package_price5_detail_th`, `package_price5_detail_en`, `package_price7_detail_th`, `package_price7_detail_en`, `package_price3_detail2_th`, `package_price3_detail2_en`, `package_price5_detail2_th`, `package_price5_detail2_en`, `package_price7_detail2_th`, `package_price7_detail2_en`) VALUES
(1, 899, 1489, 1999, 'local/storage/app/pick_your_plan/photo_slimfast.jpg', 'local/storage/app/pick_your_plan/photo_slimfast2.jpg', 'local/storage/app/pick_your_plan/photo_slimfast3.jpg', '9-COURSE MEAL PLAN', '9-COURSE MEAL PLAN', '15-COURSE MEAL PLAN', '15-COURSE MEAL PLAN', '21-COURSE MEAL PLAN', '21-COURSE MEAL PLAN', 'eatfit Packages', 'eatfit Packages', 'eatfit Packages', 'eatfit Packages', 'eatfit Packages', 'eatfit Packages', '9-COURSE MEAL PLAN', '9-COURSE MEAL PLAN', '15-COURSE MEAL PLAN', '15-COURSE MEAL PLAN', '21-COURSE MEAL PLAN', '21-COURSE MEAL PLAN', 'Need better deals? Select a plan that works best for you', 'Need better deals? Select a plan that works best for you', 'Need better deals? Select a plan that works best for you', 'Need better deals? Select a plan that works best for you', 'Need better deals? Select a plan that works best for you', 'Need better deals? Select a plan that works best for you');

-- --------------------------------------------------------

--
-- Table structure for table `lv_payment`
--

CREATE TABLE `lv_payment` (
  `payment_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `payment_phone_number` varchar(255) NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_time` varchar(255) DEFAULT NULL,
  `payment_message` text DEFAULT NULL,
  `payment_slip` varchar(255) NOT NULL,
  `payment_view` enum('No','Yes') DEFAULT NULL,
  `payment_datetime_create` datetime NOT NULL,
  `payment_ip_create` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_payment`
--

INSERT INTO `lv_payment` (`payment_id`, `order_detail_id`, `payment_phone_number`, `payment_amount`, `payment_date`, `payment_time`, `payment_message`, `payment_slip`, `payment_view`, `payment_datetime_create`, `payment_ip_create`) VALUES
(1, 6, '123456789', 719.20, '2020-12-12', '20.00', '0', 'ดาวน์โหลด.jpg', 'Yes', '2020-12-12 20:02:21', '124.120.218.242'),
(2, 9, '0624429922', 420.80, '2020-12-16', '16.30', 'Payment', 'IMG_71FEE0B1C553-1.JPEG', 'Yes', '2020-12-16 16:48:34', '180.180.218.52'),
(3, 11, '0979244466', 425.60, '2020-12-21', '15:13', 'I love U', '131999915_400931484463052_2206263416202566677_n.jpg', 'Yes', '2020-12-21 15:20:25', '182.232.175.2'),
(4, 12, '0979244466', 461.60, '2020-12-24', '09:14', 'I love U', '132804740_4237090126308346_9221522942387954234_n.png', 'Yes', '2020-12-24 09:14:44', '182.232.175.2'),
(5, 26, '0626273002', 0.00, '2021-01-04', '8.50 am', 'test', 'images.png', 'Yes', '2021-01-04 08:50:14', '180.180.218.52'),
(6, 33, '0990943010', 0.00, '2021-01-19', '09:05', NULL, '1580974500516.jpg', 'Yes', '2021-01-19 14:32:39', '::1'),
(7, 35, '0990943010', 0.00, NULL, NULL, NULL, 'floralBG-smallGR.jpg', 'Yes', '2021-01-19 16:30:08', '::1'),
(8, 35, '0990943010', 0.00, NULL, NULL, NULL, 'floralBG-smallGR.jpg', 'Yes', '2021-01-19 16:31:38', '::1'),
(9, 35, '0990943010', 0.00, NULL, NULL, NULL, 'floralBG-smallGR.jpg', 'Yes', '2021-01-19 16:31:54', '::1'),
(10, 35, '0990943010', 0.00, NULL, NULL, NULL, 'floralBG-smallGR.jpg', 'Yes', '2021-01-19 16:33:44', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `lv_point_redeem`
--

CREATE TABLE `lv_point_redeem` (
  `point_redeem_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `point_redeem_point` int(11) NOT NULL,
  `point_redeem_datetime_create` datetime NOT NULL,
  `point_redeem_ip_create` varchar(255) NOT NULL,
  `point_redeem_datetime_update` datetime NOT NULL,
  `point_redeem_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_point_redeem`
--

INSERT INTO `lv_point_redeem` (`point_redeem_id`, `product_id`, `point_redeem_point`, `point_redeem_datetime_create`, `point_redeem_ip_create`, `point_redeem_datetime_update`, `point_redeem_ip_update`) VALUES
(1, 41, 100, '2020-12-26 13:38:34', '1.20.6.83', '2020-12-26 13:38:34', '1.20.6.83'),
(2, 35, 200, '2020-12-26 13:38:43', '1.20.6.83', '2020-12-26 13:38:43', '1.20.6.83');

-- --------------------------------------------------------

--
-- Table structure for table `lv_point_redeem_new`
--

CREATE TABLE `lv_point_redeem_new` (
  `point_redeem_new_id` int(11) NOT NULL,
  `point_redeem_new_image` varchar(255) DEFAULT NULL,
  `point_redeem_new_type` enum('Product','Minimum Price','Free Shipping','Discount') NOT NULL,
  `point_redeem_new_product_id` int(11) DEFAULT NULL,
  `point_redeem_new_minimum_price` int(11) DEFAULT NULL,
  `point_redeem_new_free_shipping` enum('No','Yes') DEFAULT NULL,
  `point_redeem_new_discount` int(11) DEFAULT NULL,
  `point_redeem_new_discount_type` enum('','%','Baht') DEFAULT NULL,
  `point_redeem_new_point` int(11) NOT NULL,
  `point_redeem_new_datetime_create` datetime NOT NULL,
  `point_redeem_new_ip_create` varchar(255) NOT NULL,
  `point_redeem_new_datetime_update` datetime NOT NULL,
  `point_redeem_new_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_point_redeem_new`
--

INSERT INTO `lv_point_redeem_new` (`point_redeem_new_id`, `point_redeem_new_image`, `point_redeem_new_type`, `point_redeem_new_product_id`, `point_redeem_new_minimum_price`, `point_redeem_new_free_shipping`, `point_redeem_new_discount`, `point_redeem_new_discount_type`, `point_redeem_new_point`, `point_redeem_new_datetime_create`, `point_redeem_new_ip_create`, `point_redeem_new_datetime_update`, `point_redeem_new_ip_update`) VALUES
(1, 'local/storage/app/point_redeem/S__4562965.jpg', 'Minimum Price', 0, 99, 'No', 0, '', 10, '2021-01-13 10:49:47', '180.180.218.52', '2021-01-13 10:49:47', '180.180.218.52'),
(2, 'local/storage/app/point_redeem/S__4562964.jpg', 'Free Shipping', 0, 0, 'Yes', 0, '', 20, '2021-01-13 10:50:23', '180.180.218.52', '2021-01-13 10:50:23', '180.180.218.52'),
(3, 'local/storage/app/point_redeem/S__4562962.jpg', 'Discount', 0, 0, 'No', 200, 'Baht', 30, '2021-01-13 10:50:51', '180.180.218.52', '2021-01-13 10:50:51', '180.180.218.52');

-- --------------------------------------------------------

--
-- Table structure for table `lv_point_text`
--

CREATE TABLE `lv_point_text` (
  `point_text_id` int(11) NOT NULL,
  `point_text_name_th` text NOT NULL,
  `point_text_name_en` text NOT NULL,
  `point_text_datetime_create` varchar(255) NOT NULL,
  `point_text_ip_create` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_point_text`
--

INSERT INTO `lv_point_text` (`point_text_id`, `point_text_name_th`, `point_text_name_en`, `point_text_datetime_create`, `point_text_ip_create`) VALUES
(1, '10 points get 1 free meal at price 99 bht.', '10 points get 1 free meal at price 99 bht.', '2020-12-26 13:38:16', '1.20.6.83'),
(2, '20 points get Free delivery within 150 bht.', '20 points get Free delivery within 150 bht.', '2020-12-26 13:38:16', '1.20.6.83'),
(3, '30 points get 200 bht. voucher.', '30 points get 200 bht. voucher.', '2020-12-26 13:38:16', '1.20.6.83');

-- --------------------------------------------------------

--
-- Table structure for table `lv_product_point`
--

CREATE TABLE `lv_product_point` (
  `product_point_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_point` int(11) NOT NULL,
  `product_point_begin_date` date NOT NULL,
  `product_point_end_date` date NOT NULL,
  `product_point_datetime_create` datetime NOT NULL,
  `product_point_ip_create` varchar(255) NOT NULL,
  `product_point_datetime_update` datetime NOT NULL,
  `product_point_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lv_promocode`
--

CREATE TABLE `lv_promocode` (
  `promocode_id` int(11) NOT NULL,
  `promocode_name` varchar(255) NOT NULL,
  `promocode_discount` int(11) NOT NULL,
  `promocode_type` enum('Baht','%') NOT NULL,
  `promocode_begin_date` date NOT NULL,
  `promocode_end_date` date NOT NULL,
  `promocode_datetime_create` datetime NOT NULL,
  `promocode_ip_create` varchar(255) NOT NULL,
  `promocode_datetime_update` datetime NOT NULL,
  `promocode_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lv_promotion_complete`
--

CREATE TABLE `lv_promotion_complete` (
  `promotion_complete_id` int(11) NOT NULL,
  `promotion_complete_from_price` int(11) NOT NULL,
  `promotion_complete_discount` int(11) NOT NULL,
  `promotion_complete_free_shipping` enum('No','Yes') NOT NULL,
  `promotion_complete_begin_date` date DEFAULT NULL,
  `promotion_complete_end_date` date DEFAULT NULL,
  `promotion_complete_datetime_update` datetime NOT NULL,
  `promotion_complete_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_promotion_complete`
--

INSERT INTO `lv_promotion_complete` (`promotion_complete_id`, `promotion_complete_from_price`, `promotion_complete_discount`, `promotion_complete_free_shipping`, `promotion_complete_begin_date`, `promotion_complete_end_date`, `promotion_complete_datetime_update`, `promotion_complete_ip_update`) VALUES
(1, 500, 0, 'Yes', '2021-01-01', '2021-01-31', '2021-01-04 10:56:25', 'www.eatfitshop.com');

-- --------------------------------------------------------

--
-- Table structure for table `lv_promotion_day`
--

CREATE TABLE `lv_promotion_day` (
  `promotion_day_id` int(11) NOT NULL,
  `promotion_day_day` int(11) NOT NULL,
  `promotion_day_percent` int(11) NOT NULL,
  `promotion_day_baht` int(11) NOT NULL,
  `promotion_day_begin` date DEFAULT NULL,
  `promotion_day_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_promotion_day`
--

INSERT INTO `lv_promotion_day` (`promotion_day_id`, `promotion_day_day`, `promotion_day_percent`, `promotion_day_baht`, `promotion_day_begin`, `promotion_day_end`) VALUES
(1, 14, 20, 0, '2021-01-01', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `lv_promotion_text`
--

CREATE TABLE `lv_promotion_text` (
  `promotion_text_id` int(11) NOT NULL,
  `promotion_text_th` text NOT NULL,
  `promotion_text_en` text NOT NULL,
  `promotion_text_datetime_update` datetime NOT NULL,
  `promotion_text_ip_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv_promotion_text`
--

INSERT INTO `lv_promotion_text` (`promotion_text_id`, `promotion_text_th`, `promotion_text_en`, `promotion_text_datetime_update`, `promotion_text_ip_update`) VALUES
(1, 'Shop for 500 baht and get free delivery', 'Shop for 500 baht and get free delivery', '2021-01-13 09:13:25', 'www.eatfitshop.com'),
(2, 'Buy 1 get 1 free for Chicken Breast Smoothies', 'Buy 1 get 1 free for Chicken Breast Smoothies', '2021-01-13 09:13:25', 'www.eatfitshop.com');

-- --------------------------------------------------------

--
-- Table structure for table `lv_province`
--

CREATE TABLE `lv_province` (
  `province_id` int(11) NOT NULL,
  `province_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lv_province`
--

INSERT INTO `lv_province` (`province_id`, `province_name_th`, `province_name_en`) VALUES
(1, 'กรุงเทพมหานคร', 'Bangkok'),
(2, 'สมุทรปราการ', 'Samut Prakan'),
(3, 'นนทบุรี', 'Nonthaburi'),
(4, 'ปทุมธานี', 'Pathum Thani');

-- --------------------------------------------------------

--
-- Table structure for table `lv_test_creditcard`
--

CREATE TABLE `lv_test_creditcard` (
  `test_creditcard_id` int(11) NOT NULL,
  `test_creditcard_test1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_creditcard_test2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_creditcard_test3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_creditcard_test4` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lv_tumbol`
--

CREATE TABLE `lv_tumbol` (
  `tumbol_id` int(11) NOT NULL,
  `amphur_id` int(11) NOT NULL,
  `tumbol_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tumbol_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tumbol_distinct` int(11) NOT NULL,
  `tumbol_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lv_tumbol`
--

INSERT INTO `lv_tumbol` (`tumbol_id`, `amphur_id`, `tumbol_name_th`, `tumbol_name_en`, `tumbol_distinct`, `tumbol_shipping`) VALUES
(1, 1, 'สำราญราษฎร์', 'Samran Rat', 28, 112),
(2, 1, 'พระบรมมหาราชวัง', 'Phra Borom Maha Ratchawang', 29, 116),
(3, 1, 'วังบุรพาภิรมย์', 'Wang Burapha Phirom', 29, 116),
(4, 1, 'วัดราชบพิธ', 'Wat Ratchabophit', 29, 116),
(5, 1, 'บวรนิเวศ', 'Bowon Niwet', 29, 116),
(6, 1, 'บ้านพานถม', 'Ban Phan Thom', 29, 116),
(7, 1, 'บางขุนพรหม', 'Bang Khun Phrom', 29, 116),
(8, 1, 'เสาชิงช้า', 'Sao Chingcha', 30, 120),
(9, 1, 'วัดสามพระยา', 'Wat Sam Phraya', 32, 128),
(10, 1, 'ศาลเจ้าพ่อเสือ', 'San Chao Pho Suea', 33, 132),
(11, 1, 'ตลาดยอด', 'Talat Yot', 33, 132),
(12, 1, 'ชนะสงคราม', 'Chana Songkhram', 33, 132),
(13, 2, 'ดุสิต', 'Dusit', 29, 116),
(14, 2, 'สวนจิตรลดา', 'Suan Chit Lada', 29, 116),
(15, 2, 'สี่แยกมหานาค', 'Si Yaek Maha Nak', 29, 116),
(16, 2, 'วชิรพยาบาล', 'Wachiraphayaban', 30, 120),
(17, 2, 'ถนนนครไชยศรี', 'Thanon Nakhon Chai Si', 30, 120),
(18, 2, 'บางซื่อ', 'Bang Sue', 33, 132),
(19, 3, 'ลำผักชี', 'Lam Phak Chi', 24, 96),
(20, 3, 'โคกแฝด', 'Khok Faet', 32, 128),
(21, 3, 'คู้ฝั่งเหนือ', 'Khu Fang Nuea', 32, 128),
(22, 3, 'ลำต้อยติ่ง', 'Lam Toiting', 32, 128),
(23, 3, 'หนองจอก', 'Nong Chok', 34, 136),
(24, 3, 'กระทุ่มราย', 'Krathum Rai', 39, 156),
(25, 3, 'คลองสิบสอง', 'Khlong Sip Song', 40, 160),
(26, 3, 'คลองสิบ', 'Khlong Sip', 41, 164),
(27, 4, 'สีลม', 'Si Lom', 24, 96),
(28, 4, 'สุริยวงศ์', 'Suriyawong', 24, 96),
(29, 4, 'มหาพฤฒาราม', 'Maha Phruettharam', 25, 100),
(30, 4, 'สี่พระยา', 'Si Phraya', 25, 100),
(31, 4, 'บางรัก', 'Bang Rak', 26, 104),
(32, 5, 'ท่าแร้ง', 'Tha Raeng', 30, 120),
(33, 5, 'ลาดยาว', 'Lad Yaw', 34, 136),
(34, 5, 'ตลาดบางเขน', 'Talad Bang Khen', 34, 136),
(35, 5, 'อนุสาวรีย์', 'Anusawari', 36, 144),
(36, 5, 'ออเงิน', 'Or Ngern', 36, 144),
(37, 5, 'คลองถนน', 'Khlong Thanon', 37, 148),
(38, 5, 'ทุ่งสองห้อง', 'Thung Song Hong', 40, 160),
(39, 5, 'สายไหม', 'Sai Mai', 38, 152),
(40, 5, 'สีกัน', 'See Kan', 49, 196),
(41, 6, 'สะพานสูง', 'Saphan Sung', 13, 65),
(42, 6, 'หัวหมาก', 'Hua Mak', 17, 85),
(43, 6, 'คลองจั่น', 'Khlong Chan', 21, 84),
(44, 6, 'คันนายาว', 'Khan Na Yao', 22, 88),
(45, 6, 'คลองกุ่ม', 'Khlong Kum', 24, 96),
(46, 6, 'วังทองหลาง', 'Wang Thonglang', 25, 100),
(47, 6, 'ลาดพร้าว', 'Lat Phrao', 29, 116),
(48, 6, 'จระเข้บัว', 'Chorakhe Bua', 30, 120),
(49, 7, 'ปทุมวัน', 'Pathum Wan', 23, 92),
(50, 7, 'ลุมพินี', 'Lumphini', 23, 92),
(51, 7, 'วังใหม่', 'Wang Mai', 25, 100),
(52, 7, 'รองเมือง', 'Rong Mueang', 26, 104),
(53, 8, 'ป้อมปราบ', 'Pom Prap', 26, 104),
(54, 8, 'วัดเทพศิรินทร์', 'Wat Thep Sirin', 27, 108),
(55, 8, 'คลองมหานาค', 'Khlong Maha Nak', 27, 108),
(56, 8, 'บ้านบาตร', 'Ban Bat', 28, 112),
(57, 8, 'วัดโสมนัส', 'Wat Sommanat', 30, 120),
(58, 9, 'ดอกไม้', 'Dok Mai', 3, 18),
(59, 9, 'หนองบอน', 'Nong Bon', 8, 48),
(60, 9, 'ประเวศ', 'Prawet', 8, 48),
(61, 9, 'บางนา', 'Bang Na', 14, 70),
(62, 9, 'สวนหลวง', 'Suan Luang', 15, 75),
(63, 9, 'พระโขนงใต้', 'Phrakha Nong Tai', 18, 90),
(64, 9, 'บางจาก', 'Bang Chak', 19, 95),
(65, 9, 'คลองเตย', 'Khlong Toei', 42, 168),
(66, 9, 'คลองตัน', 'Khlong Ton', 44, 176),
(67, 9, 'พระโขนง', 'Phra Kha Nong', 44, 176),
(68, 10, 'มีนบุรี', 'Min Buri', 23, 92),
(69, 10, 'บางชัน', 'Bang Chan', 26, 104),
(70, 10, 'แสนแสบ', 'Saen Saep', 28, 112),
(71, 10, 'ทรายกองดินใต้', 'Sai Kong Din Tai', 28, 112),
(72, 10, 'ทรายกองดิน', 'Sai Kong Din', 30, 120),
(73, 10, 'สามวาตะวันออก', 'Sam Wa Ta Wan Ook', 32, 128),
(74, 10, 'สามวาตะวันตก', 'Sam Wa Tawantok', 32, 128),
(75, 11, 'ลาดกระบัง', 'Lat Krabang', 9, 54),
(76, 11, 'คลองสองต้นนุ่น', 'Khlong Song Ton Nun', 15, 75),
(77, 11, 'คลองสามประเวศ', 'Khlong Sam Prawet', 17, 85),
(78, 11, 'ทับยาว', 'Thap Yao', 19, 95),
(79, 11, 'ลำปลาทิว', 'Lam Pla Thio', 20, 100),
(80, 11, 'ขุมทอง', 'Khum Thong', 25, 100),
(81, 12, 'ทุ่งมหาเมฆ', 'Tung Ma Ha Mek', 23, 92),
(82, 12, 'ช่องนนทรี', 'Chong Nonsi', 24, 96),
(83, 12, 'ทุ่งวัดดอน', 'Thung Wat Don', 26, 104),
(84, 12, 'ยานนาวา', 'Yan Nawa', 27, 108),
(85, 12, 'วัดพระยาไกร', 'Wat Phraya Krai', 28, 112),
(86, 12, 'บางโคล่', 'Bang Khlo', 28, 112),
(87, 12, 'บางคอแหลม', 'Bang Kho Laem', 28, 112),
(88, 12, 'บางโพงพาง', 'Bang Phongphang', 29, 116),
(89, 13, 'จักรวรรดิ', 'Chakkrawat', 27, 108),
(90, 13, 'ตลาดน้อย', 'Talat Noi', 27, 108),
(91, 13, 'สัมพันธวงศ์', 'Samphanthawong', 32, 128),
(92, 14, 'มักกะสัน', 'Makkasan', 24, 96),
(93, 14, 'สามเสนใน', 'Samsen Nai', 29, 116),
(94, 14, 'ทุ่งพญาไท', 'Thung Phaya Thai', 29, 116),
(95, 14, 'ถนนพญาไท', 'Thanon Phaya Thai', 29, 116),
(96, 14, 'พญาไท', 'Phaya Thai', 29, 116),
(97, 14, 'ถนนเพชรบุรี', 'Thanon Phetchaburi', 30, 120),
(98, 15, 'วัดกัลยาณ์', 'Wat Kanlaya', 30, 120),
(99, 15, 'หิรัญรูจี', 'Hiran Ruchi', 30, 120),
(100, 15, 'บางยี่เรือ', 'Bang Yi Ruea', 30, 120),
(101, 15, 'บุคคโล', 'Bukkhalo', 30, 120),
(102, 15, 'สำเหร่', 'Samre', 30, 120),
(103, 15, 'ตลาดพลู', 'Talat Phlu', 31, 124),
(104, 15, 'ดาวคะนอง', 'Dao Khanong', 31, 124),
(105, 16, 'วัดอรุณ', 'Wat Arun', 31, 124),
(106, 16, 'วัดท่าพระ', 'Wat Tha Phra', 32, 128),
(107, 17, 'บางกะปิ', 'Bang Kapi', 21, 84),
(108, 17, 'ห้วยขวาง', 'Huai Khwang', 25, 100),
(109, 17, 'ดินแดง', 'Din Daeng', 25, 100),
(110, 17, 'สามเสนนอก', 'Samsen Nok', 27, 108),
(111, 18, 'บางลำภูล่าง', 'Bang Lamphu Lang', 28, 112),
(112, 18, 'คลองต้นไทร', 'Khlong Ton Sai', 28, 112),
(113, 18, 'คลองสาน', 'Khlong San', 30, 120),
(114, 18, 'สมเด็จเจ้าพระยา', 'Somdet Chao Phraya', 31, 124),
(115, 19, 'บางพรม', 'Bang Phrom', 38, 152),
(116, 19, 'บางเชือกหนัง', 'Bang Chueak Nang', 38, 152),
(117, 19, 'บางระมาด', 'Bang Ramat', 39, 156),
(118, 19, 'คลองชักพระ', 'Khlong Chak Phra', 40, 160),
(119, 19, 'ตลิ่งชัน', 'Taling Chan', 42, 168),
(120, 19, 'ฉิมพลี', 'Chimphli', 42, 168),
(121, 19, 'ศาลาธรรมสพน์', 'Sala Thammasop', 49, 196),
(122, 19, 'ทวีวัฒนา', 'Thawi Watthana', 51, 204),
(123, 20, 'บ้านช่างหล่อ', 'Ban Chang Lo', 32, 128),
(124, 20, 'อรุณอมรินทร์', 'Arun Ammarin', 33, 132),
(125, 20, 'บางบำหรุ', 'Bang Bumru', 35, 140),
(126, 20, 'บางยี่ขัน', 'Bang Yikhan', 35, 140),
(127, 20, 'ศิริราช', 'Siri Rat', 36, 144),
(128, 20, 'บางขุนนนท์', 'Bang Khun Non', 36, 144),
(129, 20, 'บางขุนศรี', 'Bang Khun Si', 36, 144),
(130, 20, 'บางอ้อ', 'Bang O', 37, 148),
(131, 20, 'บางพลัด', 'Bang Phlat', 40, 160),
(132, 21, 'บางค้อ', 'Bang Kho', 32, 128),
(133, 21, 'จอมทอง', 'Chom Thong', 33, 132),
(134, 21, 'บางขุนเทียน', 'Bang Khun Thian', 39, 156),
(135, 21, 'บางมด', 'Bang Mod', 39, 156),
(136, 21, 'บางบอน', 'Bang Bon', 44, 176),
(137, 21, 'แสมดำ', 'Samae Dam', 48, 192),
(138, 21, 'ท่าข้าม', 'Tha Kham', 53, 212),
(139, 22, 'ปากคลองภาษีเจริญ', 'Pak Khlong Phasi Charoen', 33, 132),
(140, 22, 'บางจาก', 'Bang Chak', 34, 136),
(141, 22, 'บางแวก', 'Bang Waek', 36, 144),
(142, 22, 'บางหว้า', 'Bang Wa', 37, 148),
(143, 22, 'บางด้วน', 'Bang Duan', 37, 148),
(144, 22, 'คูหาสวรรค์', 'Khuha Sawan', 37, 148),
(145, 22, 'บางแค', 'Bang Khae', 39, 156),
(146, 22, 'คลองขวาง', 'Khlong Khwang', 39, 156),
(147, 22, 'บางแคเหนือ', 'Bang Kae Nua', 41, 164),
(148, 22, 'บางไผ่', 'Bang Phai', 45, 180),
(149, 23, 'หลักสอง', 'Lak Song', 43, 172),
(150, 23, 'หนองค้างพลู', 'Nong Khang Phlu', 46, 184),
(151, 23, 'หนองแขม', 'Nong Khaem', 47, 188),
(152, 24, 'ราษฎร์บูรณะ', 'Rat Burana', 32, 128),
(153, 24, 'บางปะกอก', 'Bang Pakok', 35, 140),
(154, 24, 'บางมด', 'Bang Mod', 39, 156),
(155, 24, 'ทุ่งครุ', 'Thung Khru', 47, 188),
(156, 25, 'บางพลัด', 'Bang Phlat', 33, 132),
(157, 25, 'บางบำหรุ', 'Bang Bumru', 33, 132),
(158, 25, 'บางอ้อ', 'Bang O', 34, 136),
(159, 25, 'บางยี่ขัน', 'Bang Yikhan', 34, 136),
(160, 26, 'ดินแดง', 'Din Daeng', 25, 100),
(161, 26, 'รัชดาภิเษก', 'Ratchadapisek', 25, 100),
(162, 27, 'สะพานสูง', 'Saphan Sung', 13, 65),
(163, 27, 'คันนายาว', 'Khan Na Yao', 18, 90),
(164, 27, 'คลองกุ่ม', 'Khlong Kum', 23, 92),
(165, 27, 'นวมินทร์', 'Nawa Min', 24, 96),
(166, 27, 'นวลจันทร์', 'Nuan Jun', 26, 104),
(167, 28, 'ทุ่งมหาเมฆ', 'Thung Maha Mek', 23, 92),
(168, 28, 'ทุ่งวัดดอน', 'Thung Wat Don', 26, 104),
(169, 28, 'ยานนาวา', 'Yan Nawa', 26, 104),
(170, 29, 'บางซื่อ', 'Bang Sue', 33, 132),
(171, 29, 'วงศ์สว่าง', 'Wong Sa Wang', 35, 140),
(172, 30, 'จอมพล', 'Chom Phon', 28, 112),
(173, 30, 'จันทรเกษม', 'Chan Kasem', 32, 128),
(174, 30, 'เสนานิคม', 'Sena Nikhom', 34, 136),
(175, 30, 'ลาดยาว', 'Lad Yaw', 36, 144),
(176, 30, 'จตุจักร', 'Chatuchak', 37, 148),
(177, 31, 'วัดพระยาไกร', 'Wat Phraya Krai', 28, 112),
(178, 31, 'บางโคล่', 'Bang Khlo', 29, 116),
(179, 31, 'บางคอแหลม', 'Bang Kho Laem', 33, 132),
(180, 32, 'ดอกไม้', 'Dokmai', 3, 18),
(181, 32, 'หนองบอน', 'Nong Bon', 8, 48),
(182, 32, 'ประเวศ', 'Prawet', 9, 54),
(183, 32, 'สวนหลวง', 'Suan Luang', 15, 75),
(184, 33, 'พระโขนง', 'Phra Kha Nong', 18, 90),
(185, 33, 'พระโขนงเหนือ', 'Phra Khanong Nua', 19, 95),
(186, 33, 'คลองเตย', 'Khlong Toei', 20, 100),
(187, 33, 'คลองเตยเหนือ', 'Khlong Toei Nua', 20, 100),
(188, 33, 'คลองตันเหนือ', 'Khlong Tan Nua', 20, 100),
(189, 33, 'คลองตัน', 'Khlong Ton', 21, 84),
(190, 34, 'อ่อนนุช', 'Oan Nuch', 10, 60),
(191, 34, 'สวนหลวง', 'Suan Luang', 15, 75),
(192, 34, 'พัฒนาการ', 'Phattakarn', 16, 80),
(193, 35, 'บางค้อ', 'Bang Kho', 33, 132),
(194, 35, 'จอมทอง', 'Chom Thong', 34, 136),
(195, 35, 'บางมด', 'Bang Mod', 38, 152),
(196, 35, 'บางขุนเทียน', 'Bang Khun Thian', 39, 156),
(197, 36, 'ตลาดบางเขน', 'Talad Bang Khen', 35, 140),
(198, 36, 'ทุ่งสองห้อง', 'Thung Song Hong', 41, 164),
(199, 36, 'ดอนเมือง', 'Don Mueang', 47, 188),
(200, 36, 'สนามบิน', 'Sanambin', 50, 200),
(201, 36, 'สีกัน', 'See Kan', 51, 204),
(202, 37, 'มักกะสัน', 'Makkasan', 24, 96),
(203, 37, 'ถนนพญาไท', 'Thanon Phaya Thai', 26, 104),
(204, 37, 'ถนนเพชรบุรี', 'Thanon Phetchaburi', 26, 104),
(205, 37, 'ทุ่งพญาไท', 'Thung Phaya Thai', 29, 116),
(206, 38, 'ลาดพร้าว', 'Lat Phrao', 30, 120),
(207, 38, 'จรเข้บัว', 'Chorakhe Bua', 33, 132),
(208, 39, 'คลองตันเหนือ', 'Khlong Tan Nua', 20, 100),
(209, 39, 'พระโขนงเหนือ', 'Phra Khanong Nua', 21, 84),
(211, 40, 'บางแค', 'Bang Khae', 39, 156),
(212, 40, 'บางแคเหนือ', 'Bang Kae Nua', 42, 168),
(213, 40, 'หลักสอง', 'Lak Song', 43, 172),
(214, 40, 'บางไผ่', 'Bang Phai', 50, 200),
(215, 41, 'ตลาดบางเขน', 'Talad Bang Khen', 40, 160),
(216, 41, 'ทุ่งสองห้อง', 'Thung Song Hong', 41, 164),
(217, 42, 'สายไหม', 'Sai Mai', 41, 164),
(218, 42, 'ออเงิน', 'Or Ngern', 42, 168),
(219, 42, 'คลองถนน', 'Khlong Thanon', 42, 168),
(220, 43, 'รามอินทรา', 'Ramintra', 27, 108),
(221, 43, 'คันนายาว', 'Khan Na Yao', 30, 120),
(222, 44, 'ราษฎร์พัฒนา', 'Ratsadon Phatthana', 20, 100),
(223, 44, 'ทับช้าง', 'Thap Chang', 21, 84),
(224, 44, 'สะพานสูง', 'Saphan Sung', 24, 96),
(225, 45, 'คลองเจ้าคุณสิงห์', 'Khlong Jao Khun Singha', 21, 84),
(226, 45, 'พลับพลา', 'Phlapphla', 21, 84),
(227, 45, 'วังทองหลาง', 'Wang Thonglang', 26, 104),
(228, 45, 'สะพานสอง', 'Saphan Song', 26, 104),
(229, 46, 'บางชัน', 'Bang Chan', 29, 116),
(230, 46, 'ทรายกองดินใต้', 'Sai Kong Din Tai', 29, 116),
(231, 46, 'ทรายกองดิน', 'Sai Kong Din', 31, 124),
(232, 46, 'สามวาตะวันออก', 'Sam Wa Ta Wan Ook', 32, 128),
(233, 46, 'สามวาตะวันตก', 'Sam Wa Tawantok', 33, 132),
(234, 47, 'บางนาเหนือ', 'Bang Na Nueor', 14, 70),
(235, 47, 'บางนาใต้', 'Bang Na Tai', 14, 70),
(236, 47, 'บางนา', 'Bang Na', 15, 75),
(237, 48, 'ศาลาธรรมสพน์', 'Sala Thammasop', 45, 180),
(238, 48, 'ทวีวัฒนา', 'Thawi Watthana', 52, 208),
(239, 49, 'บางมด', 'Bang Mod', 39, 156),
(240, 49, 'ทุ่งครุ', 'Thung Khru', 41, 164),
(241, 50, 'คลองบานพราน', 'Khlong Ban Pran', 40, 160),
(242, 50, 'บางบอนเหนือ', 'Bang Bon Nuer', 44, 176),
(243, 50, 'บางบอนใต้', 'Bang Bon Tai', 44, 176),
(244, 50, 'บางบอน', 'Bang Bon', 45, 180),
(245, 50, 'คลองบางบอน', 'Talad Bang Bon', 45, 180),
(246, 51, 'หนองปรือ', 'Nong Prue', 21, 84),
(247, 51, 'บางพลีใหญ่', 'Bang Phli Yai', 15, 75),
(248, 51, 'บางเสาธง', 'Bang Sao Thong', 20, 100),
(249, 51, 'ปากน้ำ', 'Pak Nam', 18, 90),
(250, 51, 'บางบ่อ', 'Bang Bo', 24, 96),
(251, 51, 'บางปู', 'Bang Pu', 30, 120),
(252, 51, 'พระประแดง', 'Phra Pradaeng', 29, 116),
(253, 51, 'บางแก้ว', 'Bang Kaeo', 13, 65),
(254, 51, 'สำโรงเหนือ', 'Samrong Nuea', 18, 90),
(255, 51, 'แพรกษา', 'Phraek Sa', 24, 96),
(256, 51, 'แพรกษาใหม่', 'Phraek Sa Mai', 24, 96),
(257, 51, 'บางเมืองใหม่', 'Bang Mueang Mai', 18, 90),
(258, 51, 'บางเมือง', 'Bang Mueang', 18, 90),
(259, 51, 'บางโปรง', 'Bang Prong', 24, 96),
(260, 51, 'บางปูใหม่', 'Bang Pu Mai', 30, 120),
(261, 51, 'บางด้วน', 'Bang Duan', 23, 92),
(262, 51, 'เทพารักษ์', 'Thepharak', 15, 75),
(263, 51, 'ท้ายบ้าน', 'Thai Ban', 21, 84),
(264, 51, 'ท้ายบ้านใหม่', 'Thai Ban Mai', 21, 84),
(265, 51, 'แหลมฟ้าผ่า', 'Laem Khapa', 43, 172),
(266, 51, 'ปากคลองบางปลากด', 'Pak Klong Pa Kod', 37, 148),
(267, 51, 'บ้านคลองสวน', 'Ban Klong Suan', 38, 152),
(268, 51, 'ในคลองปลากด', 'Ni Khlong Pla Kod', 36, 144),
(269, 51, 'นาเกลือ', 'Na Kluea', 51, 204),
(270, 51, 'สำโรงใต้', 'Samrong Tai', 22, 88),
(271, 51, 'สำโรงกลาง', 'Samrong Klang', 21, 84),
(272, 51, 'บางหัวเสือ', 'Bang Hua Suea', 23, 92),
(273, 51, 'บางหญ้าแพรก', 'Bang Ya Phraek', 27, 108),
(274, 51, 'บางยอ', 'Bang Yo', 30, 120),
(275, 51, 'บางพึ่ง', 'Bang Phueng', 29, 116),
(276, 51, 'บางน้ำผึ้ง', 'Bang Namphueng', 33, 132),
(277, 51, 'บางจาก', 'Bang Chak', 32, 128),
(278, 51, 'บางครุ', 'Bang Khru', 33, 132),
(279, 51, 'บางกอบัว', 'Bang Ko Bua', 33, 132),
(280, 51, 'บางกะสอบ', 'Bang Ka Sob', 30, 120),
(281, 51, 'บางกะเจ้า', 'Bang Ka Jao', 33, 132),
(282, 51, 'ทรงคนอง', 'Song Khanong', 27, 108),
(283, 51, 'ตลาด', 'Talat', 26, 104),
(284, 51, 'ศีรษะจระเข้ใหญ่', 'Srisa Jorakhae Yai', 21, 84),
(285, 51, 'ศีรษะจระเข้น้อย', 'Srisa Jorakhae Noi', 15, 75),
(286, 51, 'ราชาเทวะ', 'Racha Thewa', 4, 24),
(287, 51, 'บางปลา', 'Bang Pla', 22, 88),
(288, 51, 'บางโฉลง', 'Bang Chalong', 14, 70),
(289, 51, 'เปร็ง', 'Preng', 27, 108),
(290, 51, 'บ้านระกาศ', 'Ban Rakat', 35, 140),
(291, 51, 'บางเพรียง', 'Bang Phriang', 29, 116),
(292, 51, 'บางพลีน้อย', 'Bang Phli Noi', 30, 120),
(293, 51, 'คลองสวน', 'Khlong Suan', 32, 128),
(294, 51, 'คลองนิยมยาตรา', 'Khlong Niyom Yattra', 37, 148),
(295, 51, 'คลองด่าน', 'Khlong Dan', 36, 144),
(298, 39, 'บางแค', 'Bang Khae', 39, 156),
(300, 52, 'ขุนศรี', 'Khun Si', 50, 200),
(301, 52, 'คลองขวาง', 'Khlong Khwang', 50, 200),
(302, 52, 'ทวีวัฒนา', 'Thawi Watthana', 50, 200),
(303, 52, 'ไทรน้อย', 'Sai Noi', 50, 200),
(304, 52, 'ไทรใหญ่', 'Sai Yai', 50, 200),
(305, 52, 'ราษฎร์นิยม', 'Rat Niyom', 50, 200),
(306, 52, 'หนองเพรางาย', 'Nong Phrao Ngai', 50, 200),
(307, 53, 'บางกรวย', 'Bang Kruai', 50, 200),
(308, 53, 'บางขุนกอง', 'Bang Khun Kong', 50, 200),
(309, 53, 'บางคูเวียง', 'Bang Khu Wiang', 50, 200),
(310, 53, 'บางสีทอง', 'Bang Si Thong', 50, 200),
(311, 53, 'ปลายบาง', 'Plai Bang', 50, 200),
(312, 53, 'มหาสวัสดิ์', 'Mahasawat', 50, 200),
(313, 53, 'วัดชลอ', 'Wat Chalo', 50, 200),
(314, 53, 'ศาลากลาง', 'Sala Klang', 50, 200),
(315, 54, 'บางคูรัด', 'Bang Khu Rat', 50, 200),
(316, 54, 'บางบัวทอง', 'Bang Bua Thong', 50, 200),
(317, 54, 'บางรักพัฒนา', 'Bang Rak Phatthana', 50, 200),
(318, 54, 'บางรักใหญ่', 'Bang Rak Yai', 50, 200),
(319, 54, 'พิมลราช', 'Phimolrach', 50, 200),
(320, 54, 'ละหาร', 'La Han', 50, 200),
(321, 54, 'ลำโพ', 'Lam Pho', 50, 200),
(322, 55, 'บางม่วง', 'Bang Muang', 50, 200),
(323, 55, 'บางแม่นาง', 'Bang Mae Nang', 50, 200),
(324, 55, 'บางเลน', 'Bang Len', 50, 200),
(325, 55, 'บางใหญ่', 'Bang Yai', 50, 200),
(326, 55, 'เสาธงหิน', 'Sao Thong Hin', 50, 200),
(327, 56, 'ปากเกร็ด', 'Pak Kret', 50, 200),
(328, 56, 'คลองเกลือ', 'Khlong Kluea', 50, 200),
(329, 56, 'คลองข่อย', 'Khlong Khoi', 50, 200),
(330, 56, 'คลองพระอุดม', 'Khlong Phra Udom', 50, 200),
(331, 56, 'ท่าอิฐ', 'Tha It', 50, 200),
(332, 56, 'บางตลาด', 'Bang Talat', 50, 200),
(333, 56, 'บางตะไนย์', 'Bang Tanai', 50, 200),
(334, 56, 'บางพลับ', 'Bang Phlap', 50, 200),
(335, 56, 'บางพูด', 'Bang Phut', 50, 200),
(336, 56, 'บ้านใหม่', 'Ban Mai', 50, 200),
(337, 56, 'ปากเกร็ด', 'Pak Kret', 50, 200),
(338, 56, 'อ้อมเกร็ด', 'Om Kret', 50, 200),
(339, 57, 'เมืองนนทบุรี', 'Mueang Nonthaburi', 50, 200),
(340, 57, 'ท่าทราย', 'Tha Sai', 50, 200),
(341, 57, 'ไทรม้า', 'Sai Ma', 50, 200),
(342, 57, 'บางกระสอ', 'Bang Kraso', 50, 200),
(343, 57, 'บางกร่าง', 'Bang Krang', 50, 200),
(344, 57, 'บางเขน', 'Bang Khen', 50, 200),
(345, 57, 'บางไผ่', 'Bang Phai', 50, 200),
(346, 57, 'บางรักน้อย', 'Bang Rak Noi', 50, 200),
(347, 57, 'บางศรีเมือง', 'Bang Si Mueang', 50, 200),
(348, 57, 'สวนใหญ่', 'Suan Yai', 50, 200),
(349, 58, 'คลองเจ็ด', 'Khlong Chet', 50, 200),
(350, 58, 'คลองสอง', 'Khlong Song', 50, 200),
(351, 58, 'คลองสาม', 'Khlong Sam', 50, 200),
(352, 58, 'คลองสี่', 'Khlong Si', 50, 200),
(353, 58, 'คลองหก', 'Khlong Hok', 50, 200),
(354, 58, 'คลองหนึ่ง', 'Khlong Nueng', 50, 200),
(355, 58, 'คลองห้า', 'Khlong Ha', 50, 200),
(356, 59, 'บึงน้ำรักษ์', 'Bueng Nam Rak', 50, 200),
(357, 59, 'บึงยี่โถ', 'Bueng Yitho', 50, 200),
(358, 59, 'บึงสนั่น', 'Bueng Sanan', 50, 200),
(359, 59, 'ประชาธิปัตย์', 'Prachathipat', 50, 200),
(360, 59, 'รังสิต', 'Rangsit', 50, 200),
(361, 59, 'ลำผักกูด', 'Lam Phak Kut', 50, 200),
(362, 60, 'บางกะดี่', 'Bang Kadi', 50, 200),
(363, 60, 'บางขะแยง', 'Bang Khayaeng', 50, 200),
(364, 60, 'บางคูวัด', 'Bang Khu Rat', 50, 200),
(365, 60, 'บางเดื่อ', 'Bang Duea', 50, 200),
(366, 60, 'บางปรอก', 'Bang Parok', 50, 200),
(367, 60, 'บางพูด', 'Bang Phut', 50, 200),
(368, 60, 'บางพูน', 'Bang Phun', 50, 200),
(369, 60, 'บางหลวง', 'Bang Luang', 50, 200),
(370, 60, 'บ้านกระแชง', 'Ban Krachaeng', 50, 200),
(371, 60, 'บ้านกลาง', 'Ban Klang', 50, 200),
(372, 60, 'บ้านฉาง', 'Ban Chang', 50, 200),
(373, 60, 'บ้านใหม่', 'Ban Mai', 50, 200),
(374, 60, 'สวนพริกไทย', 'Suan Phrikthai', 50, 200),
(375, 60, 'หลักหก', 'Lak Hok', 50, 200),
(376, 61, 'คลองพระอุดม', 'Khlong Phra Udom', 50, 200),
(377, 61, 'คูขวาง', 'Khu Khwang', 50, 200),
(378, 61, 'คูบางหลวง', 'Khu Bang Luang', 50, 200),
(379, 61, 'บ่อเงิน', 'Bo Ngoen', 50, 200),
(380, 61, 'ระแหง', 'Rahaeng', 50, 200),
(381, 61, 'ลาดหลุมแก้ว', 'Lad Yaw', 50, 200),
(382, 61, 'หน้าไม้', 'Na Mai', 50, 200),
(383, 62, 'คูคต', 'Khu Khot', 50, 200),
(384, 62, 'บึงคอไห', 'Bueng Kho Hai', 50, 200),
(385, 62, 'บึงคำพร้อย', 'Bueng Kham Phroi', 50, 200),
(386, 62, 'พืชอุดม', 'Phuet Udom', 50, 200),
(387, 62, 'ลาดสวาย', 'Lad Yaw', 50, 200),
(388, 62, 'ลำไทร', 'Lam Sai', 50, 200),
(389, 62, 'ลำลูกกา', 'Lam Luk Ka', 50, 200),
(390, 63, 'กระแซง', 'Krasaeng', 50, 200),
(391, 63, 'คลองควาย', 'Khlong Khwai', 50, 200),
(392, 63, 'เชียงรากน้อย', 'Chiang Rak Noi', 50, 200),
(393, 63, 'เชียงรากใหญ่', 'Chiang Rak Yai', 50, 200),
(394, 63, 'ท้ายเกาะ', 'Thai Ko', 50, 200),
(395, 63, 'บางกระบือ', 'Bang Krabue', 50, 200),
(396, 63, 'บางเตย', 'Bang Toei', 50, 200),
(397, 63, 'บางโพธิ์เหนือ', 'Bang Pho Nuea', 50, 200),
(398, 63, 'บ้านงิ้ว', 'Ban Ngio', 50, 200),
(399, 63, 'บ้านปทุม', 'Ban Pathum', 50, 200),
(400, 63, 'สามโคก', 'Sam Khok', 50, 200),
(401, 64, 'นพรัตน์', 'Noppharat', 50, 200),
(402, 64, 'บึงกาสาม', 'Bueng Ka Sam', 50, 200),
(403, 64, 'บึงชำอ้อ', 'Bueng Cham O', 50, 200),
(404, 64, 'บึงบอน', 'Bueng Bon', 50, 200),
(405, 64, 'บึงบา', 'Bueng Ba', 50, 200),
(406, 64, 'ศาลาครุ', 'Sala Khru', 50, 200),
(407, 64, 'หนองสามวัง', 'Nong Sam Wang', 50, 200),
(409, 51, 'ปากน้ำ', 'Pak Nam', 18, 90),
(410, 51, 'สำโรงเหนือ', 'Samrong Nuea', 18, 90),
(411, 51, 'บางเสาธง', 'Bang Sao Thong', 20, 100),
(412, 51, 'บางปู', 'Bang Pu', 30, 120),
(413, 51, 'พระประแดง', 'Phra Pradaeng', 29, 116),
(414, 51, 'แพรกษา', 'Phraek Sa', 24, 96),
(415, 51, 'แพรกษาใหม่', 'Phraek Sa Mai', 24, 96),
(416, 51, 'บางเมืองใหม่', 'Bang Mueang Mai', 18, 90),
(417, 51, 'บางเมือง', 'Bang Mueang', 18, 90),
(418, 51, 'บางโปรง', 'Bang Prong', 24, 96),
(419, 51, 'บางปูใหม่', 'Bang Pu Mai', 30, 120),
(420, 51, 'บางด้วน', 'Bang Duan', 23, 92),
(421, 51, 'เทพารักษ์', 'Thepharak', 15, 75),
(422, 51, 'ท้ายบ้าน', 'Thai Ban', 21, 84),
(423, 51, 'ท้ายบ้านใหม่', 'Thai Ban Mai', 21, 84),
(424, 65, 'แหลมฟ้าผ่า', 'Laem Khapa', 43, 172),
(425, 65, 'ปากคลองบางปลากด', 'Pak Klong Bang Pla Kot', 37, 148),
(426, 65, 'บ้านคลองสวน', 'Ban Khlong Suan', 38, 152),
(427, 65, 'ในคลองปลากด', 'Nai Khlong Pla Kod', 36, 144),
(428, 65, 'นาเกลือ', 'Na Klua', 51, 204),
(429, 66, 'สำโรงใต้', 'Samrong Tai', 22, 88),
(430, 66, 'สำโรงกลาง', 'Samrong Klang', 21, 84),
(431, 66, 'บางหัวเสือ', 'Bang Hua Suea', 23, 92),
(432, 66, 'บางหญ้าแพรก', 'Bang Ya Phraek', 27, 108),
(433, 66, 'บางยอ', 'Bang Yo', 30, 120),
(434, 66, 'บางพึ่ง', 'Bang Phueng', 29, 116),
(435, 66, 'บางน้ำผึ้ง', 'Bang Namphueng', 33, 132),
(436, 66, 'บางจาก', 'Bang Chak', 32, 128),
(437, 66, 'บางครุ', 'Bang Khru', 33, 132),
(438, 66, 'บางกอบัว', 'Bang Ko Bua', 33, 132),
(439, 66, 'บางกะสอบ', 'Bang Ka Sob', 30, 120),
(440, 66, 'บางกะเจ้า', 'Bang Kachao', 33, 132),
(441, 66, 'ทรงคนอง', 'Song Khanong', 27, 108),
(442, 66, 'ตลาด', 'Talat', 26, 104),
(443, 67, 'บางเสาธง', 'Bang Sao Thong', 20, 100),
(444, 67, 'ศีรษะจรเข้ใหญ่', 'Sisa Chorakhe Yai', 21, 84),
(445, 67, 'ศีรษะจรเข้น้อย', 'Sisa Chorakhe Noi', 15, 75),
(446, 68, 'หนองปรือ', 'Nong Prue', 21, 84),
(447, 68, 'บางพลีใหญ่', 'Bang Phli Yai', 15, 75),
(448, 68, 'บางแก้ว', 'Bang Kaeo', 13, 65),
(449, 68, 'ราชาเทวะ', 'Racha Thewa', 4, 24),
(450, 68, 'บางปลา', 'Bang Pla', 22, 88),
(451, 68, 'บางโฉลง', 'Bang Chalong', 14, 70),
(452, 69, 'บางบ่อ', 'Bang Bo', 24, 96),
(453, 69, 'เปร็ง', 'Preng', 27, 108),
(454, 69, 'บ้านระกาศ', 'Ban Rakat', 35, 140),
(455, 69, 'บางเพรียง', 'Bang Phriang', 29, 116),
(456, 69, 'บางพลีน้อย', 'Bang Phli Noi', 30, 120),
(457, 69, 'คลองสวน', 'Khlong Suan', 32, 128),
(458, 69, 'คลองนิยมยาตรา', 'Khlong Niyom Yattra', 37, 148),
(459, 69, 'คลองด่าน', 'Khlong Dan', 36, 144);

-- --------------------------------------------------------

--
-- Table structure for table `menu_product_head`
--

CREATE TABLE `menu_product_head` (
  `menu_product_head_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name_head_menu_thai` text NOT NULL,
  `name_head_menu_eng` text NOT NULL,
  `img_head_menu_eng` text NOT NULL,
  `title_head_menu_thai` text DEFAULT NULL,
  `title_head_menu_eng` text DEFAULT NULL,
  `content_head_menu_thai` text DEFAULT NULL,
  `content_head_menu_eng` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_product_head`
--

INSERT INTO `menu_product_head` (`menu_product_head_id`, `created_at`, `updated_at`, `name_head_menu_thai`, `name_head_menu_eng`, `img_head_menu_eng`, `title_head_menu_thai`, `title_head_menu_eng`, `content_head_menu_thai`, `content_head_menu_eng`) VALUES
(3, '2020-11-19 00:18:21', '2021-01-21 03:41:25', 'อาหารควบคุมน้ำหนัก', 'WEIGHT CONTROL MEALS', 'local/storage/app/image_head_menu/mqKDRT1c1RQ81xaivRWSnBhHkcr6XVrD3I7J2nPV.jpeg', 'อร่อยแบบสุขภาพดี มีความสุขในทุกมื้อ', 'Control your weight without losing food pleasure', 'อร่อยแบบสุขภาพดี มีความสุขในทุกมื้อ', '<p>Control your weight without losing food pleasure</p>'),
(4, '2020-11-19 00:20:36', '2021-01-21 03:34:39', 'เครื่องดื่มโปรตีนสูง', 'HIGH-PROTEIN DRINKS', 'local/storage/app/image_head_menu/SVJcUbxnQ6TfRfeqkUmX4Vx0ltv6RnEHdUrYyvsR.jpeg', 'อร่อยจนน่าทึ่ง ดึงดูดทุกสายตา', 'The tastiest way to look awesome', 'อร่อยจนน่าทึ่งดึงดูดทุกสายตา', '<p>The tastiest way to look awesome</p>'),
(5, '2020-11-19 00:22:23', '2021-01-21 03:36:26', 'เครื่องดื่มเพื่อสุขภาพ', 'HEALTHY DRINKS', 'local/storage/app/image_head_menu/hQ0NQRMdRVFBLG2psGBFeNTfi9c2o5Hf3ARf98Gk.jpeg', 'ดื่มแล้วดี ต้องเฮลธ์ตี้ดริ้งค์', 'Say “cheers” to nutrition', 'ดื่มแล้วดี ต้องเฮลธ์ตี้ดริ้งค์', '<p>Say “cheers” to nutrition</p>'),
(6, '2020-11-19 00:25:31', '2021-01-21 03:38:05', 'ขนมเพื่อสุขภาพ', 'HEALTHY SNACKS', 'local/storage/app/image_head_menu/EGeEGvHsMcLjTvAO9cksUKqdJoCRk4lxChq55nh7.jpeg', 'เติมความสุขให้ตัวเองด้วยขนมที่ใช่ ทานได้ไม่ต้องรู้สึกผิด', 'Snack to please yourself – and stay guilt-free', 'เติมความสุขให้ตัวเองด้วยขนมที่ใช่ทานได้ไม่ต้องรู้สึกผิด', '<p>Snack to please yourself – and stay guilt-free</p>'),
(7, '2020-11-19 00:26:11', '2021-01-21 03:39:38', 'คู่หูสุดคุ้ม', 'DOUBLE VALUE SET', 'local/storage/app/image_head_menu/KBxhpFYJSFYPCneqsu2OUh0M8p7l6I51zR6OjMql.jpeg', 'เลือกคู่หูที่ใช่ ได้รูปร่างที่ชอบ', 'Save as you sharpen up your shape', 'เลือกคู่หูที่ใช่ได้รูปร่างที่ชอบ', '<p>Save as you sharpen up your shape</p>');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_bestsellers` enum('No','Yes') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `percent` int(11) DEFAULT NULL,
  `img_products` text NOT NULL,
  `name_products_thai` text NOT NULL,
  `name_products_eng` text NOT NULL,
  `price_full` float DEFAULT NULL,
  `price_sale` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `title_inside_products_thai` text NOT NULL,
  `title_inside_products_eng` text NOT NULL,
  `calories_products` int(11) DEFAULT NULL,
  `carbs_products` int(11) DEFAULT NULL,
  `fat_products` int(11) DEFAULT NULL,
  `protein_products` int(11) DEFAULT NULL,
  `text_delivery_upper_thai` text NOT NULL,
  `text_delivery_upper_eng` text NOT NULL,
  `text_delivery_down_thai` text NOT NULL,
  `text_delivery_down_eng` text NOT NULL,
  `menu_head_pk` int(11) NOT NULL,
  `color_percent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_bestsellers`, `created_at`, `updated_at`, `percent`, `img_products`, `name_products_thai`, `name_products_eng`, `price_full`, `price_sale`, `price`, `title_inside_products_thai`, `title_inside_products_eng`, `calories_products`, `carbs_products`, `fat_products`, `protein_products`, `text_delivery_upper_thai`, `text_delivery_upper_eng`, `text_delivery_down_thai`, `text_delivery_down_eng`, `menu_head_pk`, `color_percent`) VALUES
(7, 'Yes', '2020-11-19 00:38:34', '2021-01-04 04:15:37', NULL, 'local/storage/app/img_products_outside/nUUfUlnXhYSCOSAIJZvtnRc4cAoroAlv3Uaqq639.jpeg', 'อกไก่ปั่นรสพีนัทบัตเตอร์', 'Chicken breast smoothie - Peanut butter', NULL, NULL, 159, '<p>อกไก่ปั่นผสมพีนัทบัตเตอร์หอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล<br></p>', '<p>One of the world’s best-loved tastes in a pure, natural energy drink.</p>', 705, 28, 46, 50, '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\">We currently provide the following shipping options within Bangkok and the metropolitan region:<br></p>', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\">We currently provide the following shipping options within Bangkok and the metropolitan region:<br></p>', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">Standard delivery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">Monday – Sunday&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">8 am – 12 noon<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">2 – 4 pm&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">4 – 6 pm<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">Next day delivery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">Monday – Sunday </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">8 am – 12 noon (order placed before 12 noon the&nbsp;previous day)<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">2 – 4 pm (order placed before 8 pm the previous day<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">4 – 6 pm (order placed before 8 pm the previous day)</span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\"><br></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\"><br></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 17.1200008392334px; font-size: medium; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">*Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries</span><span lang=\"EN-US\">.</span><br></p>', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">Standard delivery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">Monday – Sunday&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">8 am – 12 noon<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">2 – 4 pm&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">4 – 6 pm<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">Next day delivery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">Monday – Sunday&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">8 am – 12 noon (order placed before 12 noon the&nbsp;previous day)<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">2 – 4 pm (order placed before 8 pm the previous day<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\">4 – 6 pm (order placed before 8 pm the previous day)</span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\"><br></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\"><br></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: medium; line-height: 17.1200008392334px; font-family: Georgia, serif; text-align: start;\"><span lang=\"EN-US\">*Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries</span><span lang=\"EN-US\">.</span></p>', 4, '2'),
(8, 'No', '2020-11-19 00:44:38', '2021-01-12 00:27:19', NULL, 'local/storage/app/img_products_outside/QGAqCrQK3eeoBmF1z0TYNrPVSpNIKV6FqzAUb2TA.jpeg', 'อกไก่ปั่นรสช็อกโกแลต', 'Chicken breast smoothie - Chocolate', NULL, NULL, 159, '<p>อกไก่ปั่นรสช็อกโกแลตหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล<br></p>', '<p>The guilt-free way to indulge yourself with chocolate.</p>', 496, 37, 20, 41, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 4, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(9, 'No', '2020-11-19 00:47:07', '2020-12-02 06:59:43', NULL, 'local/storage/app/img_products_outside/ASJxU5CtmdYbRJxWa80Rn5a41shMJcA9IxfMz3TJ.jpeg', 'อกไก่ปั่นรสสตรอว์เบอร์รี่โยเกิร์ต', 'Chicken breast smoothie-Strawberry yogurt', NULL, NULL, 159, '<p>อกไก่ปั่นรสสตรอว์เบอร์รี่โยเกิร์ตหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล<br></p>', '<p>Irresistible strawberries serve invaluable nutrition.</p>', 478, 36, 19, 42, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 4, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(10, 'No', '2020-11-19 00:49:29', '2020-12-02 07:01:15', NULL, 'local/storage/app/img_products_outside/cNkFVyChTqSa1ITR5mXjJRMomR3kbCYFLPV7CDDU.jpeg', 'อกไก่ปั่นรสชาเขียว', 'Chicken breast smoothie - Green tea', NULL, NULL, 159, '<p>อกไก่ปั่นรสชาเขียวหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล<br></p>', '<p>With the flavor of the tea that supports heart health and more.</p>', 564, 27, 25, 46, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 4, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(11, 'Yes', '2020-11-19 00:53:57', '2020-12-02 07:03:18', NULL, 'local/storage/app/img_products_outside/2bOn7cnhKCrVPjLNjAxRDumKnRrRoQF5naP0S1Aq.jpeg', 'น้ำบีทรูท', 'Cold-Pressed Beetroot juice', NULL, NULL, 99, '<p>น้ำบีทรูท+ตะไคร้+ส้ม+สับปะรด+แอปเปิ้ล</p><p>เรื่องระบบหมุนเวียนของเลือด&nbsp; ขับลมต้องยกให้บีทรูท อีกทั้งยังเต็มไปด้วยวิตามินเอ </p><p>ซึ่งช่วยบำรุงสายตาวิตามินบีรวมตลอดจนมีสารสีแดงในหัวคือ เบทานิน&nbsp;&nbsp;</p>', '<p>Sweet tasting; good for fiber, vitamins and minerals.</p>', 426, 99, 1, 5, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 5, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(12, 'No', '2020-11-19 00:56:51', '2020-12-02 07:03:45', NULL, 'local/storage/app/img_products_outside/gO7txiyj3QrE7nG2z5Je7RiubM53EWoultimLXTO.jpeg', 'น้ำสับปะรด', 'Cold-Pressed Pineapple juice', NULL, NULL, 99, '<p>สับปะรด+ส้ม+ขิง+มะนาว</p><p>สับปะรดมีสารต่อต้านอนุมูลอิสระ ลดคลอเรสเตอรอล ช่วยในการย่อยอาหาร การขับถ่าย มีวิตามินสูง</p><p>ผสมขิง มีสารต่อต้านอนุมูลอิสระเป็นจำนวนมาก ช่วยชะลอความแก่ ชะลอการเกิดริ้วรอย ลดอาการท้องอืด ช่วยให้ร่างกายอบอุ่นขึ้นได้</p><div><br></div>', '<p>Nutrient-packed, with health-supporting antioxidants.</p>', 508, 119, 2, 6, '<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>-<br></p>', '<p>-</p>', 5, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(13, 'No', '2020-11-19 00:59:07', '2020-12-02 07:04:02', NULL, 'local/storage/app/img_products_outside/6FoSIFqJXMvUSMhDRKc0KG4J7Db51XIHVHXbPN1G.jpeg', 'น้ำแครอท', 'Cold-Pressed Carrot juice', NULL, NULL, 79, '<p>น้ำแครอท+แอปเปิลเขียว+สัปปะรด</p><p>แครอทขึ้นชื่อเรื่องของวิตามินเอ บำรุงสายตา เพิ่มความสดชื่นทุกครั้งที่ดื่ม<br></p>', '<p>Encourages weight loss. &nbsp;Provides fiber. &nbsp;Tastes delicious.</p>', 404, 92, 1, 7, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 5, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(14, 'No', '2020-11-19 01:01:20', '2020-12-02 07:04:21', NULL, 'local/storage/app/img_products_outside/EtGWBbISnIaSMaqQLDcFHi7AwkJfAMlUVO72Qdmp.jpeg', 'น้ำคื่นช่าย', 'Cold-Pressed Celery juice', NULL, NULL, 79, '<p>น้ำเซลเลอรี่ช่วยเรื่อง ระบบภูมิคุ้มกัน,ดีท๊อกซ์,ความดันโลหิตสูง บำรุงสายตา วิตามินซี เซเลอรี่มีวิตามินซีจะช่วยป้องกันโรคหวัด โรคภูมิแพ้ โรคเลือดออกตามไรฟัน&nbsp;<br></p>', '<p>Mega-nutrition that’s enjoyably soothing.</p>', 125, 26, 1, 3, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 5, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(15, 'No', '2020-11-19 01:03:26', '2020-12-02 07:02:50', NULL, 'local/storage/app/img_products_outside/U91czQY7CJy2RIVLcW1RlWrdlE1IrXvvZBcx3QKS.jpeg', 'น้ำอัญชัน แอปเปิ้ล', 'Cold-Pressed Butterfly pea  & apple juice', NULL, NULL, 79, '<p>น้ำผึ้ง+อัญชัน+แอปปิ้ล+มะนาว&nbsp;&nbsp;&nbsp;&nbsp;</p><p>อัญชันมีสรรพคุณและเอกลักษณ์เฉพาะตัวเพราะมีสาร แอนโทไซยานิน ซึ่งทำหน้าที่กระตุ้นการไหลเวียนของโลหิต ทำให้เลือดไปเลี้ยงส่วนต่างๆได้ดีขึ้น&nbsp;&nbsp;<br></p>', '<p>Extra special flavor. &nbsp;Promotes all-round wellbeing.</p>', 239, 56, 2, 1, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 5, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(16, 'No', '2020-11-19 01:09:12', '2020-12-02 09:55:03', NULL, 'local/storage/app/img_products_outside/i6VYSHLv2CKfQP24TY8RNLxsULnjjme9KTghrAhd.jpeg', 'คุ๊กกี้รำข้าว (1ชิ้น)', 'Rice bran cookie with cashew nut (1 piece)', NULL, NULL, 29, '<p>คุ๊กกี้รำข้าว (29 บาท ต่อ 1 ชิ้น)</p><p>สูตรไร้ไขมันทรานส์ ลดเนย ลดน้ำตาลแต่ยังคงความอร่อย ในรูปแบบคนรักสุขภาพ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '<p>Fruit’n’nut cookie, loaded with goodness. (29 BAHT / 1 piece)</p>', 228, 24, 13, 5, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 6, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(17, 'Yes', '2020-11-19 01:13:31', '2021-01-04 04:24:14', NULL, 'local/storage/app/img_products_outside/WIAPbGVInufqMBiPT401luxPWKaDZ1oIdORwcIST.jpeg', 'พาวเวอร์ บาร์', 'Power bar mixed flavor', NULL, NULL, 169, '<p style=\"text-align: left; \">พาวเวอร์บาร์ให้พลังงานจากธัญพืชและผลไม้นานาชนิด</p><p style=\"text-align: left; \">4 ชิ้น 4 รสชาติ</p><p style=\"text-align: left; \">1. ชินนาม่อน</p><p style=\"text-align: left; \">2. โกโก้</p><p style=\"text-align: left; \">3. ชาเขียว</p><p style=\"text-align: left; \">4. แครนเบอร์รี่&nbsp;</p>', '<p style=\"text-align: left; \">Oats, banana and almond milk in the fun bar for fitness fans.</p><p style=\"text-align: left; \">4 pcs 4&nbsp; flavors</p><p style=\"text-align: left; \">1. Cinnamon</p><p style=\"text-align: left; \">2. Cocoa</p><p style=\"text-align: left; \">3. Greentea</p><p style=\"text-align: left; \">4. Cranberry</p><p style=\"text-align: left; \"><br></p><p><br></p>', 310, 50, 10, 7, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 6, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(18, 'No', '2020-11-19 01:16:46', '2020-12-02 07:07:03', NULL, 'local/storage/app/img_products_outside/VDWCYNe88UUQzEUHtgHLmDJqRMCz4cRtciwz1tn1.jpeg', 'มัฟฟินกล้วยหอม', 'Healthy banana muffin', NULL, NULL, 109, '<p>มัฟฟินกล้วยสูตรไร้แป้ง ไร้ไขมัน รสชาติหวานจากผลไม้ตามธรรมชาติ<br></p>', '<p>Traditional banana-with-cranberry Muffin, reinvented for the shape-conscious.</p>', 516, 83, 16, 14, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 6, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(19, 'Yes', '2020-11-19 01:20:29', '2020-12-02 07:08:18', NULL, 'local/storage/app/img_products_outside/tdXjEAXWz8oDaHTyU0H7QwyZDbTvywiWZMxjHPQl.jpeg', 'ซีซาร์สลัด ไก่ย่าง', 'Grilled chicken caesar salad with caesar dressing', NULL, NULL, 99, '<p>เมนูเพื่อสุขภาพซีซาร์สลัด สลัดรสชาติกลมกล่อม น้ำสลัดสูตรเฉพาะของเรา ประกอบด้วยผักกาดหอมและมะเขือเทศเชอรี่ โรยพามิซานชีส<br></p>', '<p>Chicken breast and salad with classic dressing, eatfit style.</p>', 369, 11, 29, 18, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(20, 'No', '2020-11-19 01:22:07', '2020-12-02 07:08:37', NULL, 'local/storage/app/img_products_outside/e2ymfAVkjYyQGUOqh6VcYA1wdSoJsG2qUVkF9OT1.jpeg', 'สลัดผลไม้รวมกับน้ำสลัดโยเกิร์ต', 'Mixed fruit salad with yogurt dressing', NULL, NULL, 89, '<p>สลัดผลไม้รวมตามฤดูกาลเพิ่มความสดชื่นด้วยน้ำสลัดโยเกิร์ตสูตรพิเศษ<br></p>', '<p>Medley of apples, cantaloupe and more, in a yogurt drizzle.</p>', 230, 50, 2, 3, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(21, 'No', '2020-11-19 01:23:33', '2020-12-02 07:09:01', NULL, 'local/storage/app/img_products_outside/ERd2dLra2ZaE0M1n1yzyh2gOZZhar3ARu9pctXVT.jpeg', 'สลัดสาหร่ายวากาเมะและน้ำสลัดพอนซึ', 'Wakame salad with ponzu dressing', NULL, NULL, 69, 'สลัดผักเขียวทานกับยำสาหร่ายญี่ปุ่นและน้ำสลัดพอนซึสูตรลับเฉพาะของเรา', '<p>Legendary Japanese seaweed salad - low in calories, high in nutrients.</p>', 91, 17, 2, 4, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(22, 'Yes', '2020-11-19 01:27:02', '2020-12-02 07:09:31', NULL, 'local/storage/app/img_products_outside/XZH3G6WLTayAc8MelL7oIyQx89K3IhOotCNLZk5K.jpeg', 'สลัดผักควินัวกับอะโวคาโดและน้ำสลัดอิตาเลี่ยน', 'Quinoa avocado salad and Italian dressing', NULL, NULL, 149, '<p>สลัดผักใส่เมล็ดควินัวกับอโวคาโดและน้ำสลัดอิตาเลียนสูตรลับของเชฟ สลัดผักสดที่มีส่วนประกอบหลักเป็นควินัว สุดยอดอาหารมากคุณค่า ผสมผสานกับอะโวคาโด้ในน้ำสลัดอิตาเลี่ยนรสชาติอมเปรี้ยว ทานแล้วสดชื่น<br></p>', '<p>The tastiest way to enjoy avocado, with a healthful dressing and salad.</p>', 285, 18, 16, 18, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(23, 'No', '2020-11-19 01:32:28', '2020-12-02 07:10:12', NULL, 'local/storage/app/img_products_outside/IJKMkrBmkvl1MmJdvnzbqJBl3PiMYnfozeCHUnqf.jpeg', 'แซนด์วิชม้วนสลัดซีซาร์ ไส้ไก่กับอะโวคาโด', 'Chicken avocado caesar salad wrap', NULL, NULL, 169, 'สำหรับคนกินอาหารคลีน เวลาท้องว่างยามบ่ายต้องหาเมนูอาหารว่างคลีนประทังความหิว โดยเฉพาะเมนูแซนด์วิชทำให้หายหิว', '<p>Our take on the wrap that’s a worldwide favorite.</p>', 483, 38, 60, 29, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(24, 'No', '2020-11-19 01:36:39', '2020-12-02 07:10:42', NULL, 'local/storage/app/img_products_outside/fr9E2V06bAXNjeOvZbKdwMyCWLnBuj6eilhVi0Kl.jpeg', 'แซนด์วิชไก่ย่างกับขนมปังมัลติเกรน', 'Grilled chicken honey mustard with multigrain bread', NULL, NULL, 79, '<p>แซนวิชไก่ย่างกับซอสฮันนี่มัสตาร์ดทานพร้อมกับขนมปังมัลติเกรนสูตรพิเศษ ซึ่งอุดมไปด้วยใยอาหาร&nbsp; โปรตีน และวิตามินบี6 แมกนีเซียม ธาตุเหล็ก สูงกว่าแป้งขาว<br></p>', '<p>Chicken Breast with exotic dressing and wholesome multigrain bread.</p>', 497, 59, 20, 21, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(25, 'No', '2020-11-19 01:39:43', '2020-12-02 07:11:11', NULL, 'local/storage/app/img_products_outside/TVZPnNFI3N4Y7CtXgqgoFMT3srS9t60qiKSJBoKJ.jpeg', 'แซนด์วิชไก่ย่างกับน้ำสลัดเทาซันด์ไอส์แลนด์', 'Grilled chicken with whole wheat bread and Thousand Island dressing', NULL, NULL, 79, '<p>แซนวิชไก่ย่างกับซอสเทาซันไอแลนด์ทานพร้อมกับขนมปังโฮลวีทสูตรพิเศษ ซึ่งอุดมไปด้วย โปรตีน และวิตามินบี6 แมกนีเซียม ธาตุเหล็ก สูงกว่าแป้งขาว<br></p>', '<p>Creamily dressed Chicken Breast, plus salad garnish and wholewheat bread.</p>', 643, 88, 20, 27, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(26, 'No', '2020-11-19 01:41:42', '2020-12-02 07:12:03', NULL, 'local/storage/app/img_products_outside/E0eErYPICDXIGZb3FXIgwtWsYx3HFGfSvpYSwtoz.jpeg', 'แซนด์วิชโฮลวีท แซลมอนรมควัน', 'Smoked salmon with whole wheat bread', NULL, NULL, 109, '<p>แซนวิชปลาแซลม่อนทานพร้อมกับขนมปังโฮลวีทสูตรพิเศษ ซึ่งอุดมไปด้วยใยอาหาร โปรตีน และ วิตามินบี6 แมกนีเซียม ธาตุเหล็ก สูงกว่าแป้งขาว<br></p>', '<p>Healthful salmon in its yummiest form, and nutritious wholewheat bread.</p>', 647, 82, 24, 27, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(27, 'Yes', '2020-11-19 01:47:28', '2020-12-02 07:12:42', NULL, 'local/storage/app/img_products_outside/AvNDTtWF8IuLzJruxn1in6QCoPWN48rMb6P1zyKp.jpeg', 'เส้นหมี่ข้าวกล้องกับน้ำยาแซลม่อน', 'Brown rice noodle with salmon curry sauce', NULL, NULL, 169, '<p>เรานำปลาแซลมอนมาปรับสูตรเป็นวัตถุดิบในเมนูแสนอร่อย อย่างเส้นหมี่ข้าวกล้องน้ำยาปลาแซลมอน รสชาติเผ็ด ร้อน จัดจ้านทานคู่กับไข่ต้ม<br></p>', '<p>Salmon, a scrumptious sauce, and brown rice vermicelli.</p>', 397, 36, 15, 28, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(28, 'No', '2020-11-19 01:49:31', '2020-12-02 07:13:17', NULL, 'local/storage/app/img_products_outside/HaCgbP1Izkwyxe9d7wtVs8S9iR6DlxqusfBR3D9w.jpeg', 'ไก่ย่างราดซอสมะเขือเทศและมะกอก', 'Grilled chicken with tomato olive sauce and rice berry', NULL, NULL, 129, '<p>อกไก่ย่างหอมๆราดซอสมะเขือเทศผสมมะกอก เสิร์ฟพร้อมผักลวก ให้คุณค่าทางอาหารสูง<br></p>', '<p>Chicken Breast in a tangy sauce, plus the sweetness of pumpkin and carrot.</p>', 484, 32, 23, 38, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(29, 'No', '2020-11-19 01:53:16', '2021-01-04 04:11:32', NULL, 'local/storage/app/img_products_outside/XdhAHfmBENtdVsY6jd0Yw1dgFFdH6FAaLHjoblVP.jpeg', 'ข้าวหอมมันปูกับปลากะพงนึ่ง', 'Steamed red snapper with celery sauce and red cargo rice', NULL, NULL, 195, '<p>ปลากะพงนึ่งราดด้วยซอสผักคื่นช่าย หอมอร่อยจนต้องสั่งแล้วสั่งอีก<br></p>', '<p>Red Snapper in Chinese sauce, crowned with Eryngii mushroom and chewy rice.</p>', 407, 47, 10, 31, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(30, 'No', '2020-11-19 01:55:31', '2020-12-02 07:14:48', NULL, 'local/storage/app/img_products_outside/VDsmfKMX3l6LgQLOoymgi2dFezKscMxOoWiUIvId.jpeg', 'ข้าวไรซ์เบอร์รี่แกงเขียวหวานผัดแห้ง', 'Stir-fried chicken with green curry and riceberry', NULL, NULL, 109, '<p>ลดไขมันจากกะทิ ด้วยการผัดแห้ง แต่ยังคงความจัดจ้าน เผ็ดร้อนด้วยเครื่องพริกแกง ทานคู่กับไข่ต้มและข้าวไรซ์เบอร์รี่<br></p>', '<p>Stir-fried Chicken in a Thai-style curry.</p>', 467, 43, 18, 43, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(31, 'Yes', '2020-11-19 01:57:41', '2021-01-04 11:13:22', NULL, 'local/storage/app/img_products_outside/2Njyn4mgfpyLOa9tlNB1R3pO8GN0NUloQXOqgMV6.jpeg', 'ข้าวหอมมันปูกับไก่ย่างน้ำจิ้มแจ่ว', 'Herb roasted chicken with jaew sauce and red cargo rice', NULL, NULL, 109, '<p>อกไก่ย่างหอมนุ่มทานกับข้าวหอมมันปูและน้ำจิ้มแจ่วสูตรเด็ด<br></p>', '<p>Chicken Breast, with eatfit’s version of the spicy sauce from Isan.</p>', 496, 50, 16, 39, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(32, 'No', '2020-11-19 02:00:18', '2021-01-04 04:11:52', NULL, 'local/storage/app/img_products_outside/S0bDZHn2854JW75PKCr6zm5obHyEQmTOl1yLlwcX.jpeg', 'ลาบอกไก่กับควินัว', 'Spicy larb quinoa with chicken', NULL, NULL, 149, '<p>ลาบอกไก่รสจัดใส้เมล็ดควินัวหุงสุกเพิ่มประโยชน์ ทานกับไข่ต้มและผักนึ่ง<br></p>', '<p>Chicken with larb, plus nutrition-packed quinoa.</p>', 389, 51, 9, 26, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, '3'),
(33, 'No', '2020-11-19 02:01:37', '2020-12-02 07:16:39', NULL, 'local/storage/app/img_products_outside/Tur1JkT2fxYgY8GOxqaWMoM1l3SyHAFgyDN2A7O1.jpeg', 'ข้าวไรซ์เบอร์รี่กับปลาดอรี่นึ่งมะนาว', 'Steamed dory fish with lemon sauce and riceberry', NULL, NULL, 119, '<p>สายรักสุขภาพที่อยากกินอาหารเบาๆ&nbsp; แต่อิ่มท้อง ด้วยเมนูเนื้อปลาเน้น ๆ นึ่งจนสุก ราดด้วยน้ำยำรสเปรี้ยว อุดมไปด้วยคุณประโยชน์ โปรตีนและไขมันต่ำ<br></p>', '<p>Popular white fish with zesty dip and chewy brown rice.</p>', 385, 38, 5, 48, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(34, 'No', '2020-11-19 02:04:11', '2020-12-02 07:17:05', NULL, 'local/storage/app/img_products_outside/ZgMyZFYxRoJfD0xLpFhWEsWPyvV6kd6j7ZNA2JxE.jpeg', 'ข้าวกล้องกับลาบอกไก่ไข่ต้มและผักนึ่ง', 'Larb chicken breast with boiled egg and steamed vegetables and brown rice', NULL, NULL, 109, '<p>ลาบอกไก่ แบบโปรตีนจัดเต็ม เพราะอกไก่เป็นแหล่งโปรตีนที่ดีที่สุด แถมรสแซ่บ จัดจ้าน ทานกับไข่ต้มและผักนิ่ง อิ่มอร่อยไปอีกมื้อ<br></p>', '<p>Chicken Breast, Thai style, plus a filling mix of vegetables and rice.</p>', 447, 43, 14, 36, '<p>-&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>-&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(35, 'Yes', '2020-11-19 02:05:46', '2020-12-02 07:17:44', NULL, 'local/storage/app/img_products_outside/Zrx6FqrVb20aKF51CRxnHLA3LlipA376bbawuQKy.jpeg', 'ข้าวกล้องกับคั่วกลิ้งไก่', 'Chicken kua kling with brown rice', NULL, NULL, 99, '<p>คั่วกลิ้งไก่รสจัดจ้านทานกับข้าวกล้องหอมๆและไข่ต้ม<br></p>', '<p>Chicken in Thai dry curry, with the added eatfit flourish.</p>', 476, 46, 18, 34, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(36, 'No', '2020-11-19 02:07:08', '2021-01-04 04:21:12', NULL, 'local/storage/app/img_products_outside/v736OFbiOtEhV2nJ0RMfIY0OAxggP0py5UbB5MQG.jpeg', 'ข้าวไรซ์เบอร์รี่กับไก่ผัดซอสเกาหลี', 'Stir-fried chicken korean style and riceberry', NULL, NULL, 109, '<p>อกไก่ผัดกับซอสเกาหลีเผ็ดร้อนทานคู่กับข้าวไรซ์เบอรี่และไข่ต้ม<br></p>', '<p>Chicken marinated in a spicy, Korean-style sauce. &nbsp;Plus chewy rice and vegetables.</p>', 401, 38, 14, 42, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(37, 'No', '2020-11-19 02:08:50', '2020-12-02 07:18:36', NULL, 'local/storage/app/img_products_outside/r500MsrWYZYcfrNruybtLW4dQLbgNnLLkaFZkqXe.jpeg', 'สปาเกตตี้โบโลเนสไก่', 'Spaghetti with chicken bolognese sauce', NULL, NULL, 99, '<p>เมนูแบบคลีนๆกับสปาเก็ตตี้โฮลวีตซอสมะเขือเทศ ดีต่อสุขภาพแบบไม่ต้องกลัวอ้วน แถมได้ประโยชน์จากมะเขือเทศอีกด้วย&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '<p>Italian classic, here made with chicken and healthfully garnished.</p>', 422, 55, 12, 24, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(38, 'No', '2020-11-19 02:10:05', '2020-12-02 07:19:08', NULL, 'local/storage/app/img_products_outside/tvvn8JcMLlYxqH9xPT8o7weqIHG34T21s67OyxaU.jpeg', 'อกไก่ย่างเคจุนกับซอสมะเขือเทศ', 'Cajun chicken breast with tomato concasse', NULL, NULL, 129, '<p>อกไก่หมักกับเครื่องเทศหอมๆ ย่างทานคู่กับสตูว์ผักสไตล์ยุโรป<br></p>', '<p>Chicken Breast prepared the Cajun way, plus tomato concasse.<br></p>', 495, 51, 15, 39, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(39, 'No', '2020-11-19 02:16:40', '2020-12-02 07:19:45', NULL, 'local/storage/app/img_products_outside/pIKGk8ip8egcvmsOghqS7sR31FH28XfBVIsAa2yY.jpeg', 'ปลาดอร์รี่ย่างราดซอสเห็ด', 'Pan-fried dory with mushroom sauce', NULL, NULL, 139, '<p>ปลาดอรี่ชิ้นโตย่างทานคู่กับฟักทองและซอสมะเขือเทศรสจัดแบบคลีนๆ สไตล์ยุโรป</p><p>เมนูปลาหน้าตาดี ด้วยการนำปลาไปย่างในน้ำมันเพียงเล็กน้อยจนสุก ราดด้วยซอสมะเขือเทศใส่เห็ด แกล้มกับฟักทองบดรสชาติกลมกล่อม</p>', '<p>Fillet of Dory, pan-fried, with nutrient-rich pumpkin and Parmesan.</p>', 497, 50, 11, 50, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(40, 'No', '2020-11-19 02:18:07', '2021-01-04 04:09:09', NULL, 'local/storage/app/img_products_outside/CjFGPeYMqlKtmYhzn315tf3rL1LiYJU4dgLXjdGz.jpeg', 'ข้าวไรซ์เบอร์รี่กับสตูว์ไก่', 'Asian chicken stew with riceberry', NULL, NULL, 129, '<p>สตูว์ไก่สไตล์จีนโบราณเคี่ยวจนนุ่ม เสิร์ฟกับฟักทองและบร็อคโคลี่ อร่อยเด็ด<br></p>', '<p>Asian Chicken stew, with super-healthful riceberry.</p>', 416, 55, 12, 22, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, '2'),
(41, 'No', '2020-11-19 02:19:31', '2020-12-02 07:20:43', NULL, 'local/storage/app/img_products_outside/8bfhZb5AV5Rp5SnHEcnEMtODRxE38y71qSaVmI31.jpeg', 'ข้าวกล้องกับกะเพราทูน่า', 'Stir-fried tuna with basil and brown rice', NULL, NULL, 119, '<p>ผัดกะเพราทูน่าเผ็ดร้อน ทานคู่กับข้าวกล้องเพื่อสุขภาพ เติมไข่ต้มและผักนึ่งหลากหลายชนิด<br></p>', '<p>Tuna, stir-fried with Basil, served with fiber-rich brown rice.</p>', 403, 60, 4, 31, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(42, 'No', '2020-11-19 02:21:10', '2020-12-02 07:21:10', NULL, 'local/storage/app/img_products_outside/fUDox8bMfc9QtPAVKS3cGAUfIBGHozmRTD36lsG8.jpeg', 'ข้าวกล้องกับอกไก่อบพะโล้', 'Stewed chicken breast with five spices and brown rice', NULL, NULL, 99, '<p>ไก่พะโล้เมนูสุดคลาสสิคที่ไม่มีใครไม่รู้จัก ยิ่งเคี่ยวนานยิ่งอร่อยทานกับข้าวกล้องได้ไม่มีเบื่อด้วยพะโล้สูตรโบราณของเรา เคี่ยวจนแห้ง เข้มข้น หอมอร่อย<br></p>', '<p>Chicken Breast stewed to perfection, plus our own mix of five spices.</p>', 387, 53, 11, 20, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(43, 'No', '2020-11-19 02:23:03', '2020-12-02 07:22:20', NULL, 'local/storage/app/img_products_outside/k6ZtehEXY81s4o2NYRc1WWYdQfjIYjR95jveykuz.jpeg', 'สปาเกตตี้หอยลายผัดขี้เมา', 'Spaghetti kee mao with baby clams', NULL, NULL, 119, '<p>สปาเกตตี้โฮลวีทผัดขี้เมาสปาเกตตี้ที่แซ่บๆกับเส้นโฮลวีทเพื่อสุขภาพ เพราะทำมาจากแป้งที่ไม่ขัดขาว มีไฟเบอร์ มีวิตามินมากกว่าเส้นสปาเก็ตตี้ธรรมดา<br></p>', '<p>Spaghetti in a rich, Thai sauce, and the big nutrition of baby clams.</p>', 342, 54, 6, 18, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(44, 'No', '2020-11-19 02:24:22', '2020-12-02 07:22:51', NULL, 'local/storage/app/img_products_outside/YS5wIpdkTjP2txpwEJj8OvghK0kidX7sdANzyMka.jpeg', 'ข้าวหอมมันปูไก่ผัดขิง', 'Stir-fried chicken with ginger with red cargo rice', NULL, NULL, 109, '<p>ข้าวหอมมันปูทานคู่กับไก่ผัดขิงหอมสมุนไพรกับผักลวกและไข่ต้มหั่นครึ่ง<br></p>', '<p>Stir-fried, ginger-spiced chicken, served with riceberry and Jasmine rice.</p>', 403, 39, 14, 30, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 3, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(45, 'No', '2020-11-20 00:52:29', '2020-12-02 07:25:29', NULL, 'local/storage/app/img_products_outside/kSMjiymjL2N3K0pMK5qDZg8Rt3Cb5UQgKKsKhU06.jpeg', 'แซนด์วิชไก่ย่างกับขนมปังมัลติเกรน + น้ำบีทรูท', 'Grilled chicken honey mustard with multigrain bread  + Cold-Pressed Beetroot juice', NULL, NULL, 145, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"293\" style=\"width: 220pt;\"><tbody><tr height=\"133\" style=\"mso-height-source:userset;height:99.95pt\">\r\n  <td height=\"133\" class=\"xl68\" align=\"left\" width=\"293\" style=\"height:99.95pt;\r\n  width:220pt\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"293\" style=\"width: 220pt;\"><tbody><tr height=\"133\" style=\"mso-height-source:userset;height:99.95pt\">\r\n  <td height=\"133\" class=\"xl68\" align=\"left\" width=\"293\" style=\"height:99.95pt;\r\n  width:220pt\"><p>แซนวิชไก่ย่างกับซอสฮันนี่มัสตาร์ดทานพร้อมกับขนมปังมัลติเกรนสูตรพิเศษ\r\n</p><p>  ซึ่งอุดมไปด้วยใยอาหาร&nbsp; โปรตีน\r\n  และวิตามินบี6 แมกนีเซียม ธาตุเหล็ก สูงกว่าแป้งขาว</p></td></tr></tbody></table><p>น้ำบีทรูท+ตะไคร้+ส้ม+สับปะรด+แอปเปิ้ล</p><p>เรื่องระบบหมุนเวียนของเลือด&nbsp; ขับลมต้องยกให้บีทรูท\r\n  อีกทั้งยังเต็มไปด้วยวิตามินเอ ซึ่งช่วยบำรุงสายตา วิตามินบีรวม\r\n</p><p>  ตลอดจนมีสารสีแดงในหัวคือ เบทานิน&nbsp;&nbsp;</p></td></tr></tbody></table>', '<p>Chicken Breast with exotic dressing and wholesome multigrain bread.<br></p><p><br></p><p><br></p><p>Sweet tasting; good for fiber, vitamins and minerals.</p>', 922, 158, 21, 26, '<p>-&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>-&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(46, 'No', '2020-11-20 00:55:28', '2020-12-02 07:28:52', NULL, 'local/storage/app/img_products_outside/U5cdD5NuAUKTogRiPTgYtrFy0fZySjLAJIbtFBGw.jpeg', 'แซนด์วิชไก่ย่างกับน้ำสลัดเทาซันด์ไอส์แลนด์ + น้ำสับปะรด', 'Grilled chicken with whole wheat bread and Thousand Island dressing + Cold-Pressed Pineapple juice', NULL, NULL, 145, '<p>-</p>', '<p>Creamily dressed Chicken Breast, plus salad garnish and wholewheat bread.<br></p><p><br></p><p>Nutrient-packed, with health-supporting antioxidants.</p>', 1151, 207, 22, 33, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(47, 'No', '2020-11-20 01:01:33', '2020-11-30 10:15:55', NULL, 'local/storage/app/img_products_outside/S8KYHPuP3FqDDGpSwS6Wpf3POl2aUkBgn7hJQkpX.jpeg', 'แซนด์วิชโฮลวีท แซลมอนรมควัน + น้ำแครอท', 'Smoked salmon with whole wheat bread + Cold-Pressed Carrot juice', NULL, NULL, 145, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"293\" style=\"width: 220pt;\"><tbody><tr height=\"133\" style=\"mso-height-source:userset;height:99.95pt\">\r\n  <td height=\"133\" class=\"xl68\" align=\"left\" width=\"293\" style=\"height:99.95pt;\r\n  width:220pt\"><p>แซนวิชปลาแซลม่อนทานพร้อมกับขนมปังโฮลวีทสูตรพิเศษ\r\n</p><p>  ซึ่งอุดมไปด้วยใยอาหาร โปรตีน และ วิตามินบี6 แมกนีเซียม ธาตุเหล็ก\r\n  สูงกว่าแป้งขาว</p><p><br></p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"293\" style=\"width: 220pt;\"><tbody><tr height=\"133\" style=\"mso-height-source:userset;height:99.95pt\">\r\n  <td height=\"133\" class=\"xl68\" align=\"left\" width=\"293\" style=\"height:99.95pt;\r\n  width:220pt\"><p>น้ำแครอท+แอปเปิลเขียว+สัปปะรด</p><p>แครอทขึ้นชื่อเรื่องของวิตามินเอ\r\n  บำรุงสายตา ผสมน้ำส้มสดเพื่อให้ได้วิตามินซี เพิ่มความสดชื่นทุกครั้งที่ดื่ม</p></td></tr></tbody></table></td></tr></tbody></table>', '<p>-</p>', 1051, 174, 25, 33, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(48, 'No', '2020-11-20 01:07:25', '2020-12-02 07:26:58', NULL, 'local/storage/app/img_products_outside/VXNEW0uexuBA1kU6x5ktzPr49aQUY9GeOdngFRWc.jpeg', 'มัฟฟินกล้วยหอม + น้ำอัญชัน แอปเปิ้ล', 'Healthy banana muffin + Cold-Pressed Butterfly pea  & apple juice', NULL, NULL, 145, '<p class=\"MsoNormal\"><span lang=\"TH\" style=\"font-size:14.0pt;mso-ansi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot;Cordia New&quot;,sans-serif;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin\">มัฟฟินกล้วยสูตรไร้แป้ง ไร้ไขมัน\r\nรสชาติหวานจากผลไม้ตามธรรมชาติ</span><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>\r\n\r\n<p class=\"MsoNormal\"><span lang=\"TH\" style=\"font-size:14.0pt;mso-ansi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot;Cordia New&quot;,sans-serif;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin\">น้ำผึ้ง+อัญชัน+แอปปิ้ล+มะนาว</span><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\"><span lang=\"TH\" style=\"font-size:14.0pt;mso-ansi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot;Cordia New&quot;,sans-serif;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin\">อัญชันมีสรรพคุณและเอกลักษณ์เฉพาะตัวเพราะมีสารแอนโทไซยานิน\r\nซึ่งทำหน้าที่กระตุ้นการไหลเวียนของโลหิต\r\nทำให้เลือดไปเลี้ยงส่วนต่างๆได้ดีขึ้น&nbsp; </span><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '<p>Traditional banana-with-cranberry Muffin, reinvented for the shape-conscious.</p><p><br></p><p>Extra special flavor. &nbsp;Promotes all-round wellbeing.<br></p>', 755, 139, 18, 15, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(49, 'No', '2020-11-20 01:12:43', '2020-12-02 09:56:07', NULL, 'local/storage/app/img_products_outside/NOu830TtLCySwRqxu5maoUEy6aESoY8RXiu25HWB.jpeg', 'อกไก่ปั่นรสพีนัทบัตเตอร์ + คุ๊กกี้รำข้าว (2ชิ้น)', 'Chicken breast smoothie - Peanut butter + Rice bran cookie with cashew nut (2pcs)', NULL, NULL, 179, '<p style=\"text-align: left; \">อกไก่ปั่นหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล</p><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\">คุ๊กกี้รำข้าว&nbsp;<span style=\"font-size: 0.875em;\">(2ชิ้น)</span></p><p style=\"text-align: left;\">สูตรไร้ไขมันทรานส์ ลดเนย ลดน้ำตาลแต่ยังคงความอร่อย ในรูปแบบคนรักสุขภาพ<br></p>', '<p>-</p>', 933, 80, 59, 55, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(50, 'No', '2020-11-20 01:17:06', '2020-12-02 09:56:44', NULL, 'local/storage/app/img_products_outside/Yxfst5c59ickG23pxqpQAawIdI6GMeM4HK3GeNNW.jpeg', 'อกไก่ปั่นรสช๊อกโกแลต + คุ๊กกี้รำข้าว (2ชิ้น)', 'Chicken breast smoothie - Chocolate + Rice bran cookie with cashew nut (2pcs)', NULL, NULL, 179, '<p style=\"text-align: left; \"><span style=\"text-align: center;\">อกไก่ปั่นหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล</span></p><p style=\"text-align: left; \"><span style=\"text-align: center;\"><br></span></p><p style=\"text-align: left; \"><span style=\"text-align: center;\">คุ๊กกี้รำข้าว (2ชิ้น)</span></p><p style=\"text-align: left; \"><span style=\"text-align: center;\">สูตรไร้ไขมันทรานส์ ลดเนย ลดน้ำตาลแต่ยังคงความอร่อย ในรูปแบบคนรักสุขภาพ<br></span></p><p><br></p><p></p>', '<p>-</p>', 724, 52, 33, 46, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(51, 'No', '2020-11-20 01:22:50', '2020-12-02 09:57:14', NULL, 'local/storage/app/img_products_outside/ZIafqdZJyFnsfzjbdV33WUbMlJAaRA4JqmGmuOyV.jpeg', 'อกไก่ปั่นรสสตรอว์เบอร์รรี่โยเกิร์ต + คุ๊กกี้รำข้าว (2ชิ้น)', 'Chicken breast smoothie-Strawberry yogurt + Rice bran cookie with cashew nut (2pcs)', NULL, NULL, 179, '<p style=\"text-align: left; \">อกไก่ปั่นหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล<br></p><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\">คุ๊กกี้รำข้าว<span style=\"text-align: center; font-size: 0.875em;\">(2ชิ้น)</span></p><p style=\"text-align: left;\">สูตรไร้ไขมันทรานส์ ลดเนย ลดน้ำตาลแต่ยังคงความอร่อย ในรูปแบบคนรักสุขภาพ</p><p><br></p><p><br></p><p><br></p>', '<p>-</p>', 706, 60, 32, 47, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์'),
(52, 'No', '2020-11-20 01:25:44', '2020-12-02 09:59:00', NULL, 'local/storage/app/img_products_outside/514y8A1WOw06ElCd4mc3YpiCI5F9lVLkqnHCWfth.jpeg', 'อกไก่ปั่นรสชาเขียว + คุ๊กกี้รำข้าว (2ชิ้น)', 'Chicken breast smoothie - Green tea + Rice bran cookie with cashew nut (2pcs)', NULL, NULL, 179, '<p style=\"text-align: left; \">อกไก่ปั่นหอมอร่อยจากวัตถุดิบธรรมชาติไม่ใส่สารปรุงแต่งกลิ่นและใช้หญ้าหวานแทนน้ำตาล<br></p><p style=\"text-align: left; \"><br></p><p style=\"text-align: left; \">คุ๊กกี้รำข้าว(2ชิ้น)</p><p style=\"text-align: left; \">สูตรไร้ไขมันทรานส์ ลดเนย ลดน้ำตาลแต่ยังคงความอร่อย ในรูปแบบคนรักสุขภาพ<br></p><p style=\"text-align: left;\"><br></p><p style=\"text-align: left; \"><br></p>', '<p>-</p>', 792, 51, 38, 51, '<p>-</p>', '<p>-</p>', '<p>-</p>', '<p>-</p>', 7, 'กรุณาเลือกสีของ เปอร์เซ็นต์');

-- --------------------------------------------------------

--
-- Table structure for table `products_delivery`
--

CREATE TABLE `products_delivery` (
  `products_delivery_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `option_thai` text NOT NULL,
  `option_eng` text NOT NULL,
  `day_thai` text NOT NULL,
  `day_eng` text NOT NULL,
  `time_thai` text NOT NULL,
  `time_eng` text NOT NULL,
  `products_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_delivery`
--

INSERT INTO `products_delivery` (`products_delivery_id`, `created_at`, `updated_at`, `option_thai`, `option_eng`, `day_thai`, `day_eng`, `time_thai`, `time_eng`, `products_pk`) VALUES
(1, '2020-11-08 08:35:30', '2020-11-08 08:35:30', 'a', 'a', 'dd', 'dd', '<p>qq</p>', '<p>qq</p>', 1),
(2, '2020-11-10 03:05:27', '2020-11-10 03:05:27', 'rrrr', 'rrrrr', 'kkkkkk-+hnjgh', 'dd55', '<p><span style=\"color: rgb(34, 34, 34);\">elivery time thai</span><br></p>', '<p><span style=\"color: rgb(34, 34, 34);\">elivery time thai</span><br></p>', 5),
(3, '2020-11-12 20:32:08', '2020-11-12 20:32:08', 'Standard Shipping*', 'Standard Shipping*', 'Mon-Sun', 'Mon-Sun', '<ul style=\"box-sizing: border-box; margin-bottom: 1rem; color: rgb(102, 102, 102); font-family: poppins, prompt, sans-serif; font-size: 16px; outline: 0px !important;\"><li style=\"box-sizing: border-box; outline: 0px !important; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px;\">10:00 – 12:00</li><li style=\"box-sizing: border-box; outline: 0px !important; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px;\">14:00 – 16:00</li><li style=\"box-sizing: border-box; outline: 0px !important; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px;\">16:00 – 20:00</li><li style=\"box-sizing: border-box; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px; outline: 0px !important;\">10:00 – 12:00</li><li style=\"box-sizing: border-box; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px; outline: 0px !important;\">14:00 – 16:00</li><li style=\"box-sizing: border-box; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px; outline: 0px !important;\">16:00 – 20:00</li></ul>', '<ul style=\"box-sizing: border-box; margin-bottom: 1rem; color: rgb(102, 102, 102); font-family: poppins, prompt, sans-serif; font-size: 16px; outline: 0px !important;\"><li style=\"box-sizing: border-box; outline: 0px !important; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px;\">10:00 – 12:00</li><li style=\"box-sizing: border-box; outline: 0px !important; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px;\">14:00 – 16:00</li><li style=\"box-sizing: border-box; outline: 0px !important; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px;\">16:00 – 20:00</li><li style=\"box-sizing: border-box; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px; outline: 0px !important;\">10:00 – 12:00</li><li style=\"box-sizing: border-box; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px; outline: 0px !important;\">14:00 – 16:00</li><li style=\"box-sizing: border-box; list-style: none; position: relative; margin-bottom: 10px; padding-left: 15px; outline: 0px !important;\">16:00 – 20:00</li></ul>', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products_gallery`
--

CREATE TABLE `products_gallery` (
  `products_gallery_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_products_gallery` text NOT NULL,
  `products_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_gallery`
--

INSERT INTO `products_gallery` (`products_gallery_id`, `created_at`, `updated_at`, `img_products_gallery`, `products_pk`) VALUES
(1, '2020-11-08 08:34:22', '2020-11-08 08:34:22', 'local/storage/app/imagegalley_products/vhhJJMk0EkRkzybM4PPiE8RX2NPEqwdon0NKUHrK.jpeg', 1),
(2, '2020-11-10 03:04:02', '2020-11-10 03:04:02', 'local/storage/app/imagegalley_products/oA5SQg5BNfKvcZ9VRoGqelU4V4SCLN7PK8NYhSXj.jpeg', 5),
(3, '2020-11-10 03:04:02', '2020-11-10 03:04:02', 'local/storage/app/imagegalley_products/plec7oWinqLx6dvfpnvnorEeLP3fXYSUiXkFs1ZM.jpeg', 5),
(4, '2020-11-12 20:28:33', '2020-11-12 20:28:33', 'local/storage/app/imagegalley_products/ejIRIhJmGziqedCbCW3Oa8ngCxZxCzRKb2c09DEe.jpeg', 6),
(5, '2020-11-12 20:28:33', '2020-11-12 20:28:33', 'local/storage/app/imagegalley_products/fsaVKVNDCYiHYLrrx6Ws3hK0gAnthE3dUVKfgAun.jpeg', 6),
(6, '2020-11-12 20:28:33', '2020-11-12 20:28:33', 'local/storage/app/imagegalley_products/nE49x6eTGmkblGBgQ2s5dAg7qtED9uk5sSCaU80F.jpeg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products_ingredients`
--

CREATE TABLE `products_ingredients` (
  `products_ingredients_id` int(11) NOT NULL,
  `ingredient_sort` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_ingredients` text NOT NULL,
  `text_ingredients_thai` text NOT NULL,
  `text_ingredients_eng` text NOT NULL,
  `products_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_ingredients`
--

INSERT INTO `products_ingredients` (`products_ingredients_id`, `ingredient_sort`, `created_at`, `updated_at`, `img_ingredients`, `text_ingredients_thai`, `text_ingredients_eng`, `products_pk`) VALUES
(1, 0, '2020-11-08 08:34:59', '2020-11-08 08:34:59', 'local/storage/app/img_ingredients_products/jG3EtCfDOcp3Q6eXqd60BP02NY56f3kXNNnKfZ3d.jpeg', 'tT', 'tT', 1),
(2, 0, '2020-11-10 03:04:56', '2020-11-10 03:04:56', 'local/storage/app/img_ingredients_products/oOSD0EIbKYDqG0qQcyxQ3iSsL7tOMER8nOYp0VHG.jpeg', 'rice', 'rice', 5),
(3, 0, '2020-11-12 20:31:00', '2020-11-12 20:31:00', 'local/storage/app/img_ingredients_products/o6qItoO0nzyEpxZDp1DNRGuj1PZxesFtvipsaHCH.jpeg', 'พริกไทยน', 'พริกไทยน', 6),
(6, 2, '2020-11-28 04:45:39', '2020-11-30 03:56:40', 'local/storage/app/img_ingredients_products/23Ae91qHcQauPIdpyWYT1clpAErYClXYJJHiszjA.jpeg', 'อกไก่', 'Chicken breast', 7),
(7, 1, '2020-11-28 04:46:44', '2020-11-30 04:19:02', 'local/storage/app/img_ingredients_products/7qRVp6uUndi14rgevC3HgfzFAfONMGDJlQquvbcL.jpeg', 'เนยถั่ว', 'Peanut butter', 7),
(8, 0, '2020-11-28 04:58:28', '2020-11-28 04:58:28', 'local/storage/app/img_ingredients_products/C9FawiyqMrtxe1uuiphD9FoMWHjSqGioe5GqGwFr.jpeg', 'นมไขมันต่ำ', 'Low fat milk', 7),
(9, 0, '2020-11-28 04:59:02', '2020-11-28 05:17:43', 'local/storage/app/img_ingredients_products/a8vz9EoYgVksZQw0xwLEQpHwfPKCyajSSMWtQIxa.jpeg', 'อกไก่', 'Chicken breast', 8),
(10, 0, '2020-11-28 05:00:07', '2020-11-28 05:00:07', 'local/storage/app/img_ingredients_products/pYo2z5kbN5xfxPJ7M2akyPWpzR65ZhKcJRgRXjOD.jpeg', 'ผงโกโก้', 'Cocoa powder', 8),
(11, 0, '2020-11-28 05:01:29', '2020-11-28 05:01:29', 'local/storage/app/img_ingredients_products/fYyINXwYwUweajeYJ6R9caVcMC2DBSjBe9YE2jPa.jpeg', 'นมไขมันต่ำ', 'Low fat milk', 8),
(12, 0, '2020-11-28 05:01:54', '2020-11-28 05:18:12', 'local/storage/app/img_ingredients_products/qTLmBhvN9Rd2aM6S3sF3FjQHHaMqVRyFkWS8bWbb.jpeg', 'อกไก่', 'Chicken breast', 9),
(13, 0, '2020-11-28 05:02:56', '2020-11-28 05:02:56', 'local/storage/app/img_ingredients_products/hML3jdi9kWD7zkBaSS5aqT1VU8TjpOcjrj2YEHza.jpeg', 'สตรอว์เบอร์รี', 'Strawberry', 9),
(14, 0, '2020-11-28 05:03:44', '2020-11-28 05:03:44', 'local/storage/app/img_ingredients_products/R6MLZfK4jPKZAvLw3Q8xd8cQJTuIK9srNOhpVcfd.jpeg', 'โยเกิร์ต', 'ํYogurt', 9),
(15, 0, '2020-11-28 05:04:05', '2020-11-28 05:18:24', 'local/storage/app/img_ingredients_products/M3EO6xKrUhTy1lPAjiElO4l8xroj6kOna9z2R97n.jpeg', 'อกไก่', 'Chicken breast', 10),
(16, 0, '2020-11-28 05:04:42', '2020-11-28 05:04:42', 'local/storage/app/img_ingredients_products/3is0qjqumNjeTpFrQCNEm8wpo1KdJ1bmPKknfuYw.jpeg', 'ผงชาเขียว', 'Green tea powder', 10),
(17, 0, '2020-11-28 05:06:46', '2020-11-28 05:06:46', 'local/storage/app/img_ingredients_products/WBfwDUMWr32i4CSVjklmPKlEKVzLwxoLtUa4iLEq.jpeg', 'นมอัลมอนด์', 'Almond milk', 10),
(18, 0, '2020-11-28 05:07:25', '2020-11-28 05:08:48', 'local/storage/app/img_ingredients_products/jGa0rbvgv8povZkzD69GEat34YNi97V3nMLn2Wll.jpeg', 'บีทรูท', 'Beetroot', 11),
(19, 0, '2020-11-28 05:09:46', '2020-11-28 05:20:28', 'local/storage/app/img_ingredients_products/P3zh1MTcjQHSQwd8klAVJ7UjmUE4nWBTEinGlhx5.jpeg', 'ตะไคร้', 'Lemongrass', 11),
(20, 0, '2020-11-28 05:11:16', '2020-11-28 05:30:07', 'local/storage/app/img_ingredients_products/h0TsCr8eICnxWCTbqWQWj7qvkiwIAVAONh7ifvmP.jpeg', 'ส้มวาเลนเซีย', 'Valencia orange', 11),
(21, 0, '2020-11-28 05:30:53', '2020-11-28 05:30:53', 'local/storage/app/img_ingredients_products/AUyQLpYquWyH9xkbKqZT3XtPfn7NdNVe07OYeK98.jpeg', 'สับปะรด', 'Pineapple', 12),
(22, 0, '2020-11-28 05:33:08', '2020-11-28 05:33:08', 'local/storage/app/img_ingredients_products/9D1jgq9HsjHDjm4SP45ultRp1iBe50ekMqZKnPrv.jpeg', 'ขิง', 'Ginger', 12),
(23, 0, '2020-11-28 05:33:32', '2020-11-28 05:33:32', 'local/storage/app/img_ingredients_products/GOrZZBYiVAMO2Y868tATkXvUxwEuiEushVUXqMgJ.jpeg', 'ส้มวาเลนเซีย', 'Valencia orange', 12),
(24, 0, '2020-11-28 05:36:18', '2020-11-28 05:36:18', 'local/storage/app/img_ingredients_products/HQeRZuyXVg09Xv8ur7l0dsMdI2rCOvYOb5qPPgP6.jpeg', 'คื่นช่าย', 'Celery', 14),
(25, 0, '2020-11-28 05:38:01', '2020-11-28 05:38:01', 'local/storage/app/img_ingredients_products/jqNqIjZdZsiTzxnVvDvME1Ibmz7Dx6S9kFR0RyQJ.jpeg', 'แครอท', 'Carrot', 13),
(26, 0, '2020-11-28 05:39:34', '2020-11-28 05:39:34', 'local/storage/app/img_ingredients_products/3veKQW24EV8gNJPL3R5wcsODJHcKGJHSXw6HETG1.jpeg', 'สับปะรด', 'Pineapple', 13),
(27, 0, '2020-11-28 05:40:05', '2020-11-28 05:40:05', 'local/storage/app/img_ingredients_products/CRvQmxlapmOzbNSgUyHuor7Q966NLx3BpivJAPEF.jpeg', 'แอปเปิ้ลเขียว', 'Green apple', 13),
(28, 0, '2020-11-28 05:41:07', '2020-11-28 05:41:07', 'local/storage/app/img_ingredients_products/LwTQDjCfdDHDH4CZPn60AvQ0G1rkl7TR02K328ri.jpeg', 'แตงกวา', 'Cucumber', 14),
(29, 0, '2020-11-28 05:44:04', '2020-11-28 05:44:04', 'local/storage/app/img_ingredients_products/5cvgeZPshBVPbABR4hZK3fTRNZMGCRng3tF1swGF.jpeg', 'มินต์', 'Mint', 14),
(30, 0, '2020-11-28 05:46:01', '2020-11-28 05:46:01', 'local/storage/app/img_ingredients_products/N8BuExBkC0CgPyT8uz4C6nF47EMe7cjk3dtABEi6.jpeg', 'อัญชัน', 'Butterfly pea', 15),
(31, 0, '2020-11-28 05:46:48', '2020-11-28 05:46:48', 'local/storage/app/img_ingredients_products/I9BvY8C0WV2vlwCk57k7O2vpisXQug4SgUx5EKe8.jpeg', 'แอปเปิ้ลเขียว', 'Green apple', 15),
(32, 0, '2020-11-28 05:47:33', '2020-11-28 05:47:33', 'local/storage/app/img_ingredients_products/mFFy6OxRdlUzYKhUhqC5tUtiINQZj5kpkIa0nHUt.jpeg', 'น้ำผึ้ง', 'Honey', 15),
(33, 0, '2020-11-28 06:27:58', '2020-11-28 06:27:58', 'local/storage/app/img_ingredients_products/Oou5QUSqa2ZpL0GK5lyQIlrCibczYh4WBi7fgTjZ.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 16),
(34, 0, '2020-11-28 06:32:42', '2020-11-28 06:32:42', 'local/storage/app/img_ingredients_products/rck9eTNVQxiYdGGlCtP0drAOirx3ghop0jvsSJkH.jpeg', 'กล้วย', 'Banana', 16),
(35, 0, '2020-11-28 06:33:42', '2020-11-28 06:33:42', 'local/storage/app/img_ingredients_products/1XKvBCXvFZB3gLGR6SQDoGGBjTHHXM6sPtq1z2E1.jpeg', 'อัลมอนด์', 'Almond', 16),
(36, 0, '2020-11-28 06:34:21', '2020-11-28 06:34:21', 'local/storage/app/img_ingredients_products/XSdgvBm26HcZEbhHUhUpMQCeDl0gJjEkSH4pzRoD.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 17),
(38, 0, '2020-11-28 06:39:28', '2020-11-28 06:39:28', 'local/storage/app/img_ingredients_products/SlJ0ulWrcRQmHZ15cmkJfSLWbwa5BYJXu9klsNF2.jpeg', 'งาขาว', 'White sesame', 17),
(41, 0, '2020-11-28 06:43:13', '2020-11-28 06:43:13', 'local/storage/app/img_ingredients_products/KmXVsrVqrnzZFPBZFUR3bGGGyru4l8us3l3tnPnd.jpeg', 'กล้วย', 'Banana', 17),
(42, 0, '2020-11-28 06:44:26', '2020-11-28 06:44:26', 'local/storage/app/img_ingredients_products/o5y6slDay3ViFfy1Zn8P4r3yKYuf2QXPLHcdlD0n.jpeg', 'กล้วย', 'Banana', 18),
(43, 0, '2020-11-28 06:44:58', '2020-11-28 06:44:58', 'local/storage/app/img_ingredients_products/LX1SwbL2vaOGwP1UYZ4B3r7wwLvkdLqUMvUCGMLX.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 18),
(44, 0, '2020-11-28 06:45:25', '2020-11-28 06:45:25', 'local/storage/app/img_ingredients_products/J9ZF9xC4DA57wDLwNZwpK1p8jnxkKPYfzRaF5PI4.jpeg', 'ลูกเกด', 'Raisin', 18),
(45, 0, '2020-11-28 06:45:44', '2020-11-28 06:45:44', 'local/storage/app/img_ingredients_products/u7Omd457XIxLiZmgJ7DsdmClR0FfevscUhiNHxoA.jpeg', 'แครนเบอร์รี่', 'Cranberry', 18),
(46, 0, '2020-11-28 06:46:09', '2020-11-28 06:46:09', 'local/storage/app/img_ingredients_products/TT90Y5MSEHqEUO5sB4ScWgZsniJ0GfTNMGz5afGl.jpeg', 'อกไก่', 'Chicken breast', 19),
(47, 0, '2020-11-28 06:49:50', '2020-11-28 06:49:50', 'local/storage/app/img_ingredients_products/DHWu99TOMQMK9uGcC14W2T5LEzDOWymeQg6Ri9LZ.jpeg', 'ผักกาดหอม', 'Lettuce', 19),
(48, 0, '2020-11-28 06:52:32', '2020-11-28 06:52:32', 'local/storage/app/img_ingredients_products/FfZBS5FLsD6C4bVIJQjildo4uTDicXaj3PqPpXue.jpeg', 'พาร์เมซานชีส', 'Parmesan Cheese', 19),
(49, 0, '2020-11-28 06:53:34', '2020-11-28 06:53:34', 'local/storage/app/img_ingredients_products/7fk3cxQWxjmRf9T9rPjkZnxjIAUjiWcEHO1HO3GU.jpeg', 'แอปเปิ้ลเขียว', 'Green apple', 20),
(50, 0, '2020-11-28 06:55:57', '2020-11-28 06:55:57', 'local/storage/app/img_ingredients_products/EVk6BE0Iukr6XGHOmjapXTos2LxqUguTJKxEHZ3s.jpeg', 'แคนตาลูป', 'Cantaloupe', 20),
(51, 0, '2020-11-28 07:29:27', '2020-11-28 07:29:27', 'local/storage/app/img_ingredients_products/pxnF9mhtB9IlnfgBhUJBqeJABlIRECde3yPy89el.jpeg', 'แอปเปิ้ลแดง', 'Red apple', 20),
(52, 0, '2020-11-28 07:31:50', '2020-11-28 07:31:50', 'local/storage/app/img_ingredients_products/XWBKBYWSdS61ibLjUXBWWzPC2umV0Rh6h3T7G4b8.jpeg', 'แก้วมังกร', 'Dragon fruit', 20),
(53, 0, '2020-11-28 07:37:38', '2020-11-28 07:37:38', 'local/storage/app/img_ingredients_products/HxWRZp8vSXvCi3TSOKwwzgjeA82hxk2zp9dw9bXr.jpeg', 'องุ่นแดง', 'Red grape', 20),
(54, 0, '2020-11-28 07:41:08', '2020-11-28 07:41:08', 'local/storage/app/img_ingredients_products/HJC2HdEr6eGh0RZ8DGs7kGsYPhKrWbAwaHN15UPi.jpeg', 'โยเกิร์ต', 'Yogurt', 20),
(55, 0, '2020-11-28 08:31:00', '2020-11-28 08:31:00', 'local/storage/app/img_ingredients_products/mS3h6Rw5ySCRMwNYtulPiUvSfsoCGpblBiOPFbl6.jpeg', 'ควินัว', 'Quinoa', 22),
(56, 0, '2020-11-28 08:32:55', '2020-11-28 15:20:46', 'local/storage/app/img_ingredients_products/24ziHUgmuZpL59CTL9oN2GByk0mKNcslcXbqBTHY.jpeg', 'กรีนโอ๊ค', 'Green oak', 22),
(57, 0, '2020-11-28 08:34:58', '2020-11-28 08:34:58', 'local/storage/app/img_ingredients_products/Yi4lM1sekascaDY6NNOq2AmMhT34b3nMEwhFXvtf.jpeg', 'อะโวคาโด', 'Avocado', 22),
(59, 0, '2020-11-28 08:38:35', '2020-11-28 15:13:59', 'local/storage/app/img_ingredients_products/wHSNM6Ei2AQEdhg2olcN4g3JV1GgTqozwhL9A67x.jpeg', 'สาหร่ายวากาเมะ', 'Wakame', 21),
(60, 0, '2020-11-28 08:49:16', '2020-11-28 08:49:16', 'local/storage/app/img_ingredients_products/Axv3FiTo0WPScwFHWp8FR1HKliEcKvZDkzjvXte7.jpeg', 'อกไก่', 'Chicken breast', 23),
(61, 0, '2020-11-28 08:50:05', '2020-11-28 08:50:05', 'local/storage/app/img_ingredients_products/yiwUPnOfNPU5YVBrm7GUZriwhnPNkI4fTQYpFShH.jpeg', 'อะโวคาโด', 'Avocado', 23),
(62, 0, '2020-11-28 08:52:18', '2020-11-28 08:52:18', 'local/storage/app/img_ingredients_products/PKItsdqSyoskdjNPJmmnfytmwtaRr5ZZx7SF27a5.jpeg', 'ผักกาดแก้ว', 'Ice berg lettuce', 23),
(63, 0, '2020-11-28 08:52:43', '2020-11-28 08:52:43', 'local/storage/app/img_ingredients_products/e5qgkKMjNj7eDGJyX0IZwu74nO4OWBfKe4BvXDHT.jpeg', 'งาขาว', 'White sesame', 21),
(64, 0, '2020-11-28 08:54:47', '2020-11-28 15:20:27', 'local/storage/app/img_ingredients_products/WcHCwTVIsfr8vRrq41MxlHvDLhLUPSZ9obAtneSA.jpeg', 'กรีนโอ๊ค', 'Green oak', 21),
(65, 0, '2020-11-28 08:55:42', '2020-11-28 08:55:42', 'local/storage/app/img_ingredients_products/zLI8MXmFz9JfWD8cQLp4Yky17vaTRnI4dSWEQqNw.jpeg', 'อกไก่', 'Chicken breast', 24),
(66, 0, '2020-11-28 08:57:20', '2020-11-28 08:57:20', 'local/storage/app/img_ingredients_products/j9zJwOAB0QujjDfAVmo0TVepFeBX8Fy9YXNTwtjr.jpeg', 'มะกอกดำ', 'Black olive', 24),
(67, 0, '2020-11-28 08:58:04', '2020-11-28 15:21:41', 'local/storage/app/img_ingredients_products/chQRYUnWZiW2TrOHUZJgizROBSYYEeLALBM6qZU3.jpeg', 'กรีนโอ๊ค', 'Green oak', 24),
(68, 0, '2020-11-28 08:59:04', '2020-11-28 08:59:04', 'local/storage/app/img_ingredients_products/vnydQ6E5qxTkLUMA4UTNcZN7shWHJTyZFBugM5cx.jpeg', 'แซลมอน', 'Salmon', 26),
(69, 0, '2020-11-28 09:00:00', '2020-11-28 09:00:00', 'local/storage/app/img_ingredients_products/GhuP088s49IZsWZCHylX6T0Nz9k9VQ2DlPOD2AQk.jpeg', 'อกไก่', 'Chicken breast', 25),
(70, 0, '2020-11-28 09:01:02', '2020-11-28 15:21:23', 'local/storage/app/img_ingredients_products/S5db7VPvcdu3bjvGNKTztXIYXTNTu27yiGSEiaw6.jpeg', 'กรีนโอ๊ค', 'Green oak', 25),
(71, 0, '2020-11-28 09:01:41', '2020-11-28 09:01:41', 'local/storage/app/img_ingredients_products/NzlhTxzJ9cFFJpMatTWz5w8uu94pee6lJkXMDwY5.jpeg', 'แตงกวา', 'Cucumber', 25),
(72, 0, '2020-11-28 09:03:13', '2020-11-28 09:05:40', 'local/storage/app/img_ingredients_products/7jf4oUQxu6MDmafZGyja9CCrGyizxbfovvs0x5uD.jpeg', 'หอมแดง', 'Shallot', 25),
(73, 0, '2020-11-28 09:04:25', '2020-11-28 15:22:10', 'local/storage/app/img_ingredients_products/bJnPRO6ess4FwkSbSvqXTF0NzVRTHmfWDZWDx9XS.jpeg', 'กรีนโอ๊ค', 'Green oak', 26),
(74, 0, '2020-11-28 09:04:51', '2020-11-28 09:04:51', 'local/storage/app/img_ingredients_products/y4CloJStjayb0FUP2GF7YZ3b7K1T7wqqpAhk3tCp.jpeg', 'ไข่', 'Egg', 26),
(75, 0, '2020-11-28 09:05:25', '2020-11-28 09:05:25', 'local/storage/app/img_ingredients_products/HfRvzpFtGgfML87Arwy1UvDYKymRwj21tmVopg1h.jpeg', 'หอมแดง', 'Shallot', 26),
(76, 0, '2020-11-28 09:06:28', '2020-11-28 09:06:28', 'local/storage/app/img_ingredients_products/AWMWcJNTYVFuZAlFp8FmJsUNLNg1gSdO076TXnRk.jpeg', 'แซลมอน', 'Salmon', 27),
(77, 0, '2020-11-28 09:06:50', '2020-11-28 09:06:50', 'local/storage/app/img_ingredients_products/gh77fProtY8D1Q9ZCHmGXEL8xfyLTLXi0LgqRBTB.jpeg', 'ไข่', 'Egg', 27),
(78, 0, '2020-11-28 09:08:04', '2020-11-28 09:08:04', 'local/storage/app/img_ingredients_products/5SW3l9wHZQVsijKKuzJDd21ctyKyRJ8aWpNLeFze.jpeg', 'บร็อคโคลี่', 'Broccoli', 27),
(79, 0, '2020-11-28 09:08:39', '2020-11-28 09:08:39', 'local/storage/app/img_ingredients_products/FrGWInT2sNmiAZZqx63LSFIjYhVboPN6dDaes3EC.jpeg', 'แครอท', 'Carrot', 27),
(80, 0, '2020-11-28 09:09:34', '2020-11-28 09:09:34', 'local/storage/app/img_ingredients_products/qYEU7pI9Wcso9tCSeQ7gAxbdM3h2hvnyvuunkGbZ.jpeg', 'อกไก่', 'Chicken breast', 28),
(81, 0, '2020-11-28 09:11:38', '2020-11-28 09:11:38', 'local/storage/app/img_ingredients_products/Doq8AIuX9TXcSHJlWDxmOjcLzqGF3gAlTOb3DPwf.jpeg', 'ซอสมะเขือเทศ', 'Tomato sauce', 28),
(82, 0, '2020-11-28 09:12:01', '2020-11-28 09:12:01', 'local/storage/app/img_ingredients_products/ZXRQTimmYxVrTJLdyTmw1TECECgGtw7Tunel3HID.jpeg', 'มะกอกดำ', 'Black olive', 28),
(83, 0, '2020-11-28 09:12:37', '2020-11-28 09:12:37', 'local/storage/app/img_ingredients_products/r1fiGbNZspaDJCb3oflhluf1K8bqIuvHVyTqTer1.jpeg', 'ฟักทอง', 'Pumpkin', 28),
(84, 0, '2020-11-28 09:13:01', '2020-11-28 09:13:01', 'local/storage/app/img_ingredients_products/75w9jQUPLWqRMbdTruxBoZ8t1qsGqIEHWTHf18nT.jpeg', 'แครอท', 'Carrot', 28),
(85, 0, '2020-11-28 09:13:26', '2020-11-28 09:13:26', 'local/storage/app/img_ingredients_products/VRyLnFW3lTEQElGDx3eRPWXZnM9xZqxA7MkMaV5t.jpeg', 'บร็อคโคลี่', 'Broccoli', 28),
(86, 0, '2020-11-28 09:15:05', '2020-11-28 09:15:05', 'local/storage/app/img_ingredients_products/Ir0Ew1KPxiY8kcJnZ78R1st8TqucUuapGilC55TX.jpeg', 'ไข่', 'Egg', 29),
(87, 0, '2020-11-28 09:15:35', '2020-11-28 09:15:35', 'local/storage/app/img_ingredients_products/dR3oSxOuECFuLAQcd3WbkhPLTZqkH6xdXQkjGSPQ.jpeg', 'หน่อไม้ฝรั่ง', 'Asparagus', 29),
(88, 0, '2020-11-28 09:16:00', '2020-11-28 09:16:00', 'local/storage/app/img_ingredients_products/IwibdjYwaJWNh589NJ8s8EAk0jiRccDpQHyiN4td.jpeg', 'ฟักทอง', 'Pumpkin', 29),
(89, 0, '2020-11-28 09:16:42', '2020-11-28 09:16:42', 'local/storage/app/img_ingredients_products/HAYHAoLsXRlkjBjpMZrY3X8WJpV5ljEXWzXpGskY.jpeg', 'อกไก่', 'Chicken breast', 30),
(90, 0, '2020-11-28 09:18:07', '2020-11-28 09:18:07', 'local/storage/app/img_ingredients_products/CTjC3acRfgoXaejZpCPsAlXY4gKtw1uwvp6jtjIF.jpeg', 'มะเขือยาว', 'Eggplant', 30),
(91, 0, '2020-11-28 09:18:30', '2020-11-28 09:18:30', 'local/storage/app/img_ingredients_products/WTvJzc0vfrr1ZetkTgx712NQ9ikzrEp7mY4gbfeB.jpeg', 'ไข่', 'Egg', 30),
(92, 0, '2020-11-28 09:19:13', '2020-11-28 09:19:13', 'local/storage/app/img_ingredients_products/3Ud9rbqfWK4VB0VbPPgdVaI54iRmwvMOaihOT9Bz.jpeg', 'แครอท', 'Carrot', 30),
(93, 0, '2020-11-28 09:20:30', '2020-11-28 09:20:30', 'local/storage/app/img_ingredients_products/053cW8PLaPk1wBG1lTjmkTn52gQPYUSQ0a1N9xUS.jpeg', 'พริก', 'Red chilli', 30),
(94, 0, '2020-11-28 09:25:03', '2020-11-28 09:25:03', 'local/storage/app/img_ingredients_products/CuGPUdarmVRuschyO1wQTV1MmB1w2n4dfkdSrLvX.jpeg', 'อกไก่', 'Chicken breast', 31),
(95, 0, '2020-11-28 09:26:00', '2020-11-28 09:26:00', 'local/storage/app/img_ingredients_products/re6os1jCgB6pnnD67kpR9WMJNNl2Ag1w2i1OP8Wk.jpeg', 'แครอท', 'Carrot', 31),
(96, 0, '2020-11-28 09:26:22', '2020-11-28 09:26:22', 'local/storage/app/img_ingredients_products/Yl74slMqxRkTy3dfNyZZPOqkuFNVgFk0Ql8Souf2.jpeg', 'บร็อคโคลี่', 'Broccoli', 31),
(97, 0, '2020-11-28 09:30:38', '2020-11-28 09:30:38', 'local/storage/app/img_ingredients_products/7GXGAhIIf6YcohXVxOAzYTnZhiQL5FSjbFF6bF1i.jpeg', 'ข้าวโพดอ่อน', 'Baby corn', 31),
(98, 0, '2020-11-28 09:32:32', '2020-11-28 09:32:32', 'local/storage/app/img_ingredients_products/yXT1ZZyLKlead3azddMjwnlYZJHhvmE0P67cZYIY.jpeg', 'อกไก่', 'Chicken breast', 32),
(99, 0, '2020-11-28 09:33:11', '2020-11-28 09:33:11', 'local/storage/app/img_ingredients_products/Q1hU4L7NOu3pLRJvqGIQs1ndiIIwOiphGUXcYhSh.jpeg', 'ควินัว', 'Quinoa', 32),
(100, 0, '2020-11-28 09:33:41', '2020-11-28 09:33:41', 'local/storage/app/img_ingredients_products/xbEgLOoHNOxa7dsNfYiCLrIhqOTy3pOvlArskbYz.jpeg', 'แครอท', 'Carrot', 32),
(101, 0, '2020-11-28 09:34:06', '2020-11-28 09:34:06', 'local/storage/app/img_ingredients_products/8MSBUwdRpj5miH7GfCBYtTa4krYat0mujq7MId1i.jpeg', 'บร็อคโคลี่', 'Broccoli', 32),
(102, 0, '2020-11-28 09:35:07', '2020-11-28 09:35:07', 'local/storage/app/img_ingredients_products/7fJAKv3dDyWEILwtXLKgjZdUl4tbcm0t4PVBVtqW.jpeg', 'ปลาดอรี่', 'Dory fish', 33),
(103, 0, '2020-11-28 09:35:30', '2020-11-28 09:35:30', 'local/storage/app/img_ingredients_products/zew0fb00r6RFpAvssOvtQeg1Sm4xxLDWusKYiaX6.jpeg', 'แครอท', 'Carrot', 33),
(104, 0, '2020-11-28 09:36:37', '2020-11-28 09:36:37', 'local/storage/app/img_ingredients_products/bbSYJimVLbCz91kTWIPhhSi87DWetdhXIe2VeybD.jpeg', 'ฟักทอง', 'Pumpkin', 33),
(105, 0, '2020-11-28 09:38:46', '2020-11-28 09:38:46', 'local/storage/app/img_ingredients_products/QtlQWbFINoHz9rHP5rU27mPMSyHjS3CUWmGttCRB.jpeg', 'น้ำจิ่มซีฟู้ด', 'Seafood dipping', 33),
(106, 0, '2020-11-28 09:39:09', '2020-11-28 09:39:09', 'local/storage/app/img_ingredients_products/jM5nNpcrfnI6hvdrEuPWLSXOdTNveC6uf1B5CuWM.jpeg', 'อกไก่', 'Chicken breast', 34),
(107, 0, '2020-11-28 09:39:40', '2020-11-28 09:39:40', 'local/storage/app/img_ingredients_products/SyoKvaXMlYIDMqwiw7zhG2xtIpKlPIzLtEdgbU0r.jpeg', 'ไข่', 'Egg', 34),
(108, 0, '2020-11-28 09:40:32', '2020-11-28 09:40:32', 'local/storage/app/img_ingredients_products/XfK6LC0xVgLgnDxqd13Nq2gJjnDQfQAtDdfWs5up.jpeg', 'แครอท', 'Carrot', 34),
(109, 0, '2020-11-28 09:41:40', '2020-11-28 09:41:40', 'local/storage/app/img_ingredients_products/YvXJaOtQTZSy3cADIsEld2hgyHZ1c62w6cPjZSPJ.jpeg', 'กะหล่ำดอก', 'Cauliflower', 34),
(110, 0, '2020-11-28 09:42:24', '2020-11-28 09:42:24', 'local/storage/app/img_ingredients_products/Oexox9LPCj2sRTGlud9hcgZItioEoM62ILawlYFu.jpeg', 'ถั่วฝักยาว', 'Long bean', 34),
(111, 0, '2020-11-28 09:42:40', '2020-11-28 09:42:40', 'local/storage/app/img_ingredients_products/euHL6VmKF7CIuGHEiuMSHiVIPGELunlKeFuXMU8P.jpeg', 'อกไก่', 'Chicken breast', 35),
(112, 0, '2020-11-28 09:42:59', '2020-11-28 09:42:59', 'local/storage/app/img_ingredients_products/XO0s1S3SIFd4RFAGpp0HgjFUteelgJqkdIsTV9gN.jpeg', 'ไข่', 'Egg', 35),
(113, 0, '2020-11-28 09:43:33', '2020-11-28 09:43:33', 'local/storage/app/img_ingredients_products/u7KzAGPQB89q3XQvKALzPwB3Dp321shx9MkElohn.jpeg', 'แครอท', 'Carrot', 35),
(114, 0, '2020-11-28 09:43:52', '2020-11-28 09:43:52', 'local/storage/app/img_ingredients_products/VSFBF2UesLZUHXLNjQa1N7kqQQ52wqfD0I56ivt3.jpeg', 'บร็อคโคลี่', 'Broccoli', 35),
(115, 0, '2020-11-28 09:44:24', '2020-11-28 09:44:24', 'local/storage/app/img_ingredients_products/VKcKmJKfoXcFbZEqJbgQcx6AQ8qB2ZxldeOJ4smJ.jpeg', 'ฟักทอง', 'Pumpkin', 35),
(116, 0, '2020-11-28 09:44:51', '2020-11-28 09:44:51', 'local/storage/app/img_ingredients_products/PqStzCT127xovlx59kLgZKH0YQNpIlm10M3ytusz.jpeg', 'ถั่วฝักยาว', 'Long bean', 35),
(117, 0, '2020-11-28 09:45:33', '2020-11-28 09:45:33', 'local/storage/app/img_ingredients_products/mPUKKUmbWeBONyjEq3U6VgHMBlIpBMDPbwjSx37O.jpeg', 'อกไก่', 'Chicken breast', 36),
(118, 0, '2020-11-28 09:47:33', '2020-11-28 09:47:33', 'local/storage/app/img_ingredients_products/VEYCoWNNptYiHnCUCjS3r9W3xMc8MmtGe0xS3m4v.jpeg', 'เห็ดออรินจิ', 'Eryngii mushroom', 36),
(119, 0, '2020-11-28 09:49:00', '2020-11-28 09:49:00', 'local/storage/app/img_ingredients_products/7Zqq9OtkhFYmNvHAWJX5CMmNkN79fuboUr5kc5RN.jpeg', 'ซูกินี', 'Zucchini', 36),
(120, 0, '2020-11-28 09:49:58', '2020-11-28 09:49:58', 'local/storage/app/img_ingredients_products/q91CTGfK7A1EVwE6m7QWA12S5YGngmtC3BURCqcM.jpeg', 'แครอท', 'Carrot', 36),
(121, 0, '2020-11-28 09:50:35', '2020-11-28 09:50:35', 'local/storage/app/img_ingredients_products/Pj3P1esxcMWkpGP1bx6VPHiAdXSsQ8mnAXVjxrfR.jpeg', 'หน่อไม้ฝรั่ง', 'Asparagus', 36),
(122, 0, '2020-11-28 09:51:06', '2020-11-28 09:51:06', 'local/storage/app/img_ingredients_products/7s1poOWhwZTv2MLZhaKwiwHqPHyb68UDAstrI7SV.jpeg', 'อกไก่', 'Chicken breast', 37),
(123, 0, '2020-11-28 09:51:30', '2020-11-28 09:51:30', 'local/storage/app/img_ingredients_products/Oockngza8ukCpzULrlMLUwlU5t6riYDrj5MJUJJF.jpeg', 'แครอท', 'Carrot', 37),
(124, 0, '2020-11-28 09:51:52', '2020-11-28 09:51:52', 'local/storage/app/img_ingredients_products/5V0jYSWmyQj4VcaothL3jQ21k3IVnvGbwRx1F3CO.jpeg', 'บร็อคโคลี่', 'Broccoli', 37),
(125, 0, '2020-11-28 09:52:13', '2020-11-28 09:52:13', 'local/storage/app/img_ingredients_products/dEzrPacBAjw70uVISGQ7e9V6pnkl7m643fuv1q1Q.jpeg', 'ฟักทอง', 'Pumpkin', 37),
(126, 0, '2020-11-28 09:52:39', '2020-11-28 09:52:39', 'local/storage/app/img_ingredients_products/1rSjkTHp8TPBW9lvC0MnTOgvEFXXHB5JlwO9up0a.jpeg', 'ข้าวโพดอ่อน', 'Baby corn', 37),
(127, 0, '2020-11-28 09:53:22', '2020-11-28 09:53:22', 'local/storage/app/img_ingredients_products/TgtPQ2ysGjzmyEIpXXgsS5Kqq8BWgRcpY2hwwvlV.jpeg', 'อกไก่', 'Chicken breast', 38),
(128, 0, '2020-11-28 09:53:40', '2020-11-28 09:53:40', 'local/storage/app/img_ingredients_products/4MTjSDqAfwnxWHjQ4NayuT4WenmD0iIf8vFqztM8.jpeg', 'แครอท', 'Carrot', 38),
(129, 0, '2020-11-28 09:54:02', '2020-11-28 09:54:02', 'local/storage/app/img_ingredients_products/vDvjNBXLNA9wjTDXKjmFOUm1BNZXMlxDyqpkH8Rg.jpeg', 'ฟักทอง', 'Pumpkin', 38),
(130, 0, '2020-11-28 09:54:27', '2020-11-28 09:54:27', 'local/storage/app/img_ingredients_products/OHfwvWzNqXADejQh1MOEqNYtsT7Ndq22hVyPqwWJ.jpeg', 'ข้าวโพดอ่อน', 'Baby corn', 38),
(131, 0, '2020-11-28 09:54:55', '2020-11-28 09:54:55', 'local/storage/app/img_ingredients_products/miZeIraXT1WayGysE9FuJWsF8tmAPZYUiplQEkvF.jpeg', 'ปลาดอรี่', 'Dory fish', 39),
(132, 0, '2020-11-28 09:55:58', '2020-11-28 09:55:58', 'local/storage/app/img_ingredients_products/n7v7GssBTRmGzFPpGkKq3hyPmq0jeuoxZeBln4ej.jpeg', 'ซอสมะเขือเทศ', 'Tomato sauce', 39),
(134, 0, '2020-11-28 09:56:53', '2020-11-28 09:56:53', 'local/storage/app/img_ingredients_products/RTnvRnYA9eNCWk4v7bPcjfeki8qsI1YfQ7euNI70.jpeg', 'ซอสมะเขือเทศ', 'Tomato sauce', 38),
(135, 0, '2020-11-28 09:58:16', '2020-11-28 09:58:16', 'local/storage/app/img_ingredients_products/EHViiFoO20F5IslTLTGDQE2bC2EEVIw8v1avKnXl.jpeg', 'พาร์เมซานชีส', 'Parmesan Cheese', 39),
(136, 0, '2020-11-28 09:58:59', '2020-11-28 09:58:59', 'local/storage/app/img_ingredients_products/h27xeb9sa594iTtYA0JPEh1kSNb1NyO36zmxkJ2T.jpeg', 'เห็ดออรินจิ', 'Eryngii mushroom', 39),
(137, 0, '2020-11-28 09:59:17', '2020-11-28 09:59:17', 'local/storage/app/img_ingredients_products/pGvVi4ghFIctQf4TmpIeseEW6IaEQDfdXGBSsltB.jpeg', 'ฟักทอง', 'Pumpkin', 39),
(139, 0, '2020-11-28 09:59:38', '2020-11-28 09:59:38', 'local/storage/app/img_ingredients_products/c4P4TGb1UJHpkaxYKT45j4w9reVKWkDCGJXMQL2h.jpeg', 'แครอท', 'Carrot', 39),
(140, 0, '2020-11-28 10:00:36', '2020-11-28 10:00:36', 'local/storage/app/img_ingredients_products/tPFajZN9FqkGdU0qkKrScx7A2pmWtioNfSW533bI.jpeg', 'อกไก่', 'Chicken breast', 40),
(141, 0, '2020-11-28 10:01:19', '2020-11-28 10:01:19', 'local/storage/app/img_ingredients_products/rX4jpr6b2eqknHUwT5mxtfZsOYJEzbyeEIEO17Ks.jpeg', 'เห็ดออรินจิ', 'Eryngii mushroom', 40),
(142, 0, '2020-11-28 10:01:42', '2020-11-28 10:01:42', 'local/storage/app/img_ingredients_products/jubgdICR072WUSBtCiNU0pJGYOVuJUaoRQsK4ITP.jpeg', 'แครอท', 'Carrot', 40),
(143, 0, '2020-11-28 10:02:04', '2020-11-28 10:02:04', 'local/storage/app/img_ingredients_products/khjGfkyjcKLB8k1tmOeKiVJWZgc4zpV3CzAzugVX.jpeg', 'ฟักทอง', 'Pumpkin', 40),
(144, 0, '2020-11-28 10:02:53', '2020-11-28 10:02:53', 'local/storage/app/img_ingredients_products/1XT5P4BENmvqh71AeMVCpItWIs3X8SW557eJtYcy.jpeg', 'ทูน่า', 'Tuna', 41),
(145, 0, '2020-11-28 10:03:30', '2020-11-28 10:03:30', 'local/storage/app/img_ingredients_products/0Z0WwWWHmQvOCkxzapjdeWUseds949iGIjOO64oa.jpeg', 'ไข่', 'Egg', 41),
(146, 0, '2020-11-28 10:04:46', '2020-11-28 10:04:46', 'local/storage/app/img_ingredients_products/5rscPTSDkf9Y1NSYXVBLl1msj6GmWzswIwUwePxo.jpeg', 'แครอท', 'Carrot', 41),
(147, 0, '2020-11-28 10:05:30', '2020-11-28 10:05:30', 'local/storage/app/img_ingredients_products/k3IWVWAlSf5l6YsBqqI4i4gmYcHcEHEIyVCzBT4v.jpeg', 'พริก', 'Red chilli', 41),
(148, 0, '2020-11-28 10:06:57', '2020-11-28 10:06:57', 'local/storage/app/img_ingredients_products/RdOFTHrhETkOBSSW415R9oRYI8Z4ty5ntHx4K5cX.jpeg', 'กะเพรา', 'Basil', 41),
(149, 0, '2020-11-28 10:07:16', '2020-11-28 10:07:16', 'local/storage/app/img_ingredients_products/HVDYkqkZrhEUtHmdPitUVw0tR1u7gYZ8KtQdoM2p.jpeg', 'อกไก่', 'Chicken breast', 42),
(150, 0, '2020-11-28 10:07:56', '2020-11-28 10:07:56', 'local/storage/app/img_ingredients_products/L0hooZMVtHyBoOIJVKHpXysNWq3LqhhK4zHpNh2g.jpeg', 'บร็อคโคลี่', 'Broccoli', 42),
(151, 0, '2020-11-28 10:08:14', '2020-11-28 10:08:14', 'local/storage/app/img_ingredients_products/zYtfy87d1RqBLqjXDDquCztgvbjvCTv5NCoEHqvy.jpeg', 'ฟักทอง', 'Pumpkin', 42),
(152, 0, '2020-11-28 10:08:29', '2020-11-28 10:08:29', 'local/storage/app/img_ingredients_products/P9TOaXHW5XHRHNXqwq8OsmLFk5JErkXcMRFBfb6x.jpeg', 'แครอท', 'Carrot', 42),
(153, 0, '2020-11-28 10:22:02', '2020-11-28 10:22:02', 'local/storage/app/img_ingredients_products/XfH0QokkflhovUFFiCGYSgIgSVks0KUUxJ37DQBJ.jpeg', 'โหระพา', 'Sweet basil', 43),
(154, 0, '2020-11-28 10:25:49', '2020-11-28 10:25:49', 'local/storage/app/img_ingredients_products/k6qXgUKi0yjYev8kNRcq3KWolHSN3TqWH9T4narZ.jpeg', 'น้ำพริกเผา', 'Chilli paste', 43),
(155, 0, '2020-11-28 10:26:42', '2020-11-28 10:26:42', 'local/storage/app/img_ingredients_products/g6JzjlyRfCmuVLtXwtOTg47bIG9Kzxj1OqbpMqrh.jpeg', 'น้ำมันหอย', 'Oyster sauce', 43),
(156, 0, '2020-11-28 10:27:20', '2020-11-28 10:27:20', 'local/storage/app/img_ingredients_products/bHe7PvzCDaiIoPiv4S6TugG07DT61wDfXCG0xug2.jpeg', 'พริก', 'Red chilli', 43),
(157, 0, '2020-11-28 10:29:13', '2020-11-28 10:29:13', 'local/storage/app/img_ingredients_products/6WLZptS3MkoKeQG0Ss0LGz8I8u2xywAObRWekb96.jpeg', 'แครอท', 'Carrot', 43),
(158, 0, '2020-11-28 10:32:37', '2020-11-28 10:32:37', 'local/storage/app/img_ingredients_products/jj1PriRPRgInnl8mgJ8kdWUmbO6vz9reQGi36YNs.jpeg', 'อกไก่', 'Chicken breast', 44),
(159, 0, '2020-11-28 10:33:44', '2020-11-28 10:33:44', 'local/storage/app/img_ingredients_products/6LFsoZPtrVbEiJQNaudStPNa3Cb3njNCaVvuFtg8.jpeg', 'ขิง', 'Ginger', 44),
(160, 0, '2020-11-28 10:34:55', '2020-11-28 10:34:55', 'local/storage/app/img_ingredients_products/SXocXmm403RXKWIb2LDavbkRv6sykYmfg6KZMLMO.jpeg', 'แครอท', 'Carrot', 44),
(161, 0, '2020-11-28 10:35:14', '2020-11-28 10:35:14', 'local/storage/app/img_ingredients_products/oaKhwKzohs3b9pJqnv3m3twr5WeaI3uhs6vrHRb1.jpeg', 'บร็อคโคลี่', 'Broccoli', 44),
(162, 0, '2020-11-28 10:37:47', '2020-11-28 10:37:47', 'local/storage/app/img_ingredients_products/3lsSqwZIBgwpFsorkXTz9qvgz1CQvALUk47lxXNJ.jpeg', 'นมอัลมอนด์', 'Almond milk', 7),
(163, 0, '2020-11-28 10:38:14', '2020-11-28 10:38:14', 'local/storage/app/img_ingredients_products/pIAEhztbbbYfZn6waz1HIpcJD7UWOMLQKfcBc79s.jpeg', 'กล้วย', 'Banana', 7),
(164, 0, '2020-11-28 10:40:37', '2020-11-28 10:40:37', 'local/storage/app/img_ingredients_products/OJVYQhQOM0jH2MsVCefptCLhhLOKNHaOlVuY8k5o.jpeg', 'กล้วย', 'Banana', 8),
(165, 0, '2020-11-28 10:41:16', '2020-11-28 10:45:50', 'local/storage/app/img_ingredients_products/X6yy6VpcypkDQ9rw2iPoHKle1atvtlnnN1uNI5mp.jpeg', 'น้ำเชื่อมหญ้าหวาน', 'Stevia syrup', 8),
(166, 0, '2020-11-28 10:41:51', '2020-11-28 10:41:51', 'local/storage/app/img_ingredients_products/1at3Tl6aqpRNAE5yrkSzCTJnzyuUcUDyesIukas9.jpeg', 'กล้วย', 'Banana', 9),
(167, 0, '2020-11-28 10:42:43', '2020-11-28 10:46:04', 'local/storage/app/img_ingredients_products/pvCinBgsqBh786VltwwYpQQBm4LOy5YHLTdMP19d.jpeg', 'น้ำเชื่อมหญ้าหวาน', 'Stevia syrup', 9),
(168, 0, '2020-11-28 10:45:25', '2020-11-28 10:45:25', 'local/storage/app/img_ingredients_products/NcNJON9BRdKDjTmytSEQRWcyK27tcyhil05HkuY2.jpeg', 'น้ำเชื่อมหญ้าหวาน', 'Stevia syrup', 10),
(169, 0, '2020-11-28 10:47:14', '2020-11-28 10:47:14', 'local/storage/app/img_ingredients_products/wbaUoCygWpC8dFqEdrqXpshVo0qnAv8ZAdWjudjQ.jpeg', 'สับปะรด', 'Pineapple', 11),
(170, 0, '2020-11-28 10:47:45', '2020-11-28 10:47:45', 'local/storage/app/img_ingredients_products/30vjLtiB8v1h4HCkCVFNZMCoCuuvqzm62GLIzzSx.jpeg', 'เลมอน', 'Lemon', 12),
(171, 0, '2020-11-28 10:48:40', '2020-11-28 10:48:40', 'local/storage/app/img_ingredients_products/Fx8dpjAaR5H6LdAmqDtKlqgQJmJRhHbyXDczQLxp.jpeg', 'เลมอน', 'Lemon', 14),
(172, 0, '2020-11-28 10:49:43', '2020-11-28 10:49:43', 'local/storage/app/img_ingredients_products/ytBkB3Da4K3xKiDthWNtUoWuYByjuLycgPytKNJE.jpeg', 'ใบบัวบก', 'Asiatica leaf', 14),
(173, 0, '2020-11-28 10:50:06', '2020-11-28 10:50:06', 'local/storage/app/img_ingredients_products/dk8rXv2KC6NsilOjD3pJFcOOl5TlgGINpL5gplrG.jpeg', 'เลมอน', 'Lemon', 15),
(174, 0, '2020-11-28 10:50:58', '2020-11-28 10:50:58', 'local/storage/app/img_ingredients_products/Zc6RvJD71rQl6FLHz1tzDYhf0139284ttflNtqfB.jpeg', 'อบเชย', 'Cinnamon', 16),
(175, 0, '2020-11-28 10:52:10', '2020-11-28 10:52:10', 'local/storage/app/img_ingredients_products/0y19Cx2NYrHrbi52oWjAoB1t4hcUlDOtATBL0VEK.jpeg', 'อบเชย', 'Cinnamon', 17),
(176, 0, '2020-11-28 10:53:16', '2020-11-28 10:53:16', 'local/storage/app/img_ingredients_products/fH0YuYjrf8K1Zn8WnJmZmDW9uIYmucAwUAPRbUzI.jpeg', 'ไข่', 'Egg', 17),
(177, 0, '2020-11-28 10:53:55', '2020-11-28 10:53:55', 'local/storage/app/img_ingredients_products/VxBRKLA8Wu88abEkBfmR3mSDeigCv8YXyM9Vvs3E.jpeg', 'แครนเบอร์รี่', 'Cranberry', 17),
(178, 0, '2020-11-28 10:54:19', '2020-11-28 10:54:19', 'local/storage/app/img_ingredients_products/fgRBwUHmkxNks7uP8q2dhwxAOQ7NnZVCMUwUe5uH.jpeg', 'นมอัลมอนด์', 'Almond milk', 17),
(179, 0, '2020-11-28 10:55:32', '2020-11-28 10:55:32', 'local/storage/app/img_ingredients_products/DMUCbkSx58boR3ZLVyUpA5eEYCRECPcXn0QmxbrV.jpeg', 'ผงโกโก้', 'Cocoa powder', 17),
(180, 0, '2020-11-28 10:55:54', '2020-11-28 10:55:54', 'local/storage/app/img_ingredients_products/7Vz0AW49QGPbYn4H4qxQnF86aYUuZtuzJebu8szJ.jpeg', 'ผงชาเขียว', 'Green tea powder', 17),
(181, 0, '2020-11-28 10:58:27', '2020-11-28 10:58:27', 'local/storage/app/img_ingredients_products/ApUemDKTjAZx19wUD7XWUgXKXvF05yjbPAls2K39.jpeg', 'ไข่', 'Egg', 19),
(182, 0, '2020-11-28 11:00:07', '2020-11-28 11:00:07', 'local/storage/app/img_ingredients_products/6oFuGLi3u3nlvSkX7g24y5zpxvRTzdz154JzWweD.jpeg', 'อกไก่', 'Chicken breast', 22),
(183, 0, '2020-11-28 14:37:35', '2020-11-28 14:37:35', 'local/storage/app/img_ingredients_products/mL535Z1EapLQY2R3J8MZZiWrBxNxwUPkMRsIRMop.jpeg', 'อกไก่', 'Chicken breast', 45),
(184, 0, '2020-11-28 14:38:33', '2020-11-28 14:38:33', 'local/storage/app/img_ingredients_products/zE3osez39S50zWaLLPuhSqeoGvAbw4YAGEXj1fCu.jpeg', 'ไข่', 'Egg', 45),
(185, 0, '2020-11-28 14:39:04', '2020-11-28 15:26:23', 'local/storage/app/img_ingredients_products/pQxask35EwY0XjCiaR1MlL8RAEYKHWaft0I3QroN.jpeg', 'กรีนโอ๊ค', 'Green oak', 45),
(186, 0, '2020-11-28 14:39:29', '2020-11-28 14:39:29', 'local/storage/app/img_ingredients_products/egVgepbJEouAT8o9Uxc2I1xW03vy26bt0V27Q3UE.jpeg', 'บีทรูท', 'Beetroot', 45),
(187, 0, '2020-11-28 14:40:13', '2020-11-28 14:40:13', 'local/storage/app/img_ingredients_products/mbxEgDxNdRQGv6QiCAB8tEM2oZPfo1FCI42p0Oim.jpeg', 'ตะไคร้', 'Lemongrass', 45),
(188, 0, '2020-11-28 14:40:44', '2020-11-28 14:40:44', 'local/storage/app/img_ingredients_products/qslnPl2E83Tf2PFaJlEubL3Bzdsx5WjSElEZon1k.jpeg', 'ส้มวาเลนเซีย', 'Valencia orange', 45),
(189, 0, '2020-11-28 14:41:47', '2020-11-28 14:41:47', 'local/storage/app/img_ingredients_products/50wxsBo3HHdT36gDmdsAS6ZY9Qp3WEnTibBet87L.jpeg', 'อกไก่', 'Chicken breast', 46),
(190, 0, '2020-11-28 14:42:27', '2020-11-28 14:42:27', 'local/storage/app/img_ingredients_products/qFLvwGUu4y1pWciXmvSJgVn3MCxWHUQvoNdZu2pf.jpeg', 'แตงกวา', 'Cucumber', 46),
(191, 0, '2020-11-28 14:43:21', '2020-11-28 14:43:21', 'local/storage/app/img_ingredients_products/8EKEyn2M0ySv73yYt1rGU5S2MOi3013kjPH5iyqF.jpeg', 'หอมแดง', 'Shallot', 46),
(192, 0, '2020-11-28 14:43:48', '2020-11-28 14:43:48', 'local/storage/app/img_ingredients_products/TzE9VPOXCNxhUx8Naupnfamj5w0Sd5QRNNqIBChD.jpeg', 'สับปะรด', 'Pineapple', 46),
(193, 0, '2020-11-28 14:45:27', '2020-11-28 14:45:27', 'local/storage/app/img_ingredients_products/X6QTXuwb0LzJHxJfpgLKeI7ny36QdTj6kXPc0PSs.jpeg', 'ขิง', 'Ginger', 46),
(194, 0, '2020-11-28 14:45:56', '2020-11-28 14:45:56', 'local/storage/app/img_ingredients_products/aSeGcY1OrjTEeuNDpJYhq6RMaVcD6JZqSIrZcvfv.jpeg', 'ส้มวาเลนเซีย', 'Valencia orange', 46),
(195, 0, '2020-11-28 14:46:44', '2020-11-28 14:46:44', 'local/storage/app/img_ingredients_products/wkQJ2lJ5OCgjeduahcy0KmzfkWBIjoElQiQrFGlN.jpeg', 'แซลมอน', 'Salmon', 47),
(196, 0, '2020-11-28 14:47:59', '2020-11-28 14:47:59', 'local/storage/app/img_ingredients_products/wFp3fAwkYQNi4DuQt9WLwI3SpiOMNgrGR4ekW03K.jpeg', 'ไข่', 'Egg', 47),
(197, 0, '2020-11-28 14:49:27', '2020-11-28 15:26:35', 'local/storage/app/img_ingredients_products/wokKyWvFwwN1m6Yhpqopu6uYUVqgYZ1Z4ukrhHW4.jpeg', 'กรีนโอ๊ค', 'Green oak', 47),
(198, 0, '2020-11-28 14:49:59', '2020-11-28 14:49:59', 'local/storage/app/img_ingredients_products/ADgVuaSP9aka9rljeLf9tQMMYuw7dIpYpC7F2WXO.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 48),
(200, 0, '2020-11-28 14:52:10', '2020-11-28 14:52:10', 'local/storage/app/img_ingredients_products/b7Na9MRkmo6hi5Cge1jCD8JopeLM0qTqXqRJCROz.jpeg', 'กล้วย', 'Banana', 48),
(201, 0, '2020-11-28 14:53:16', '2020-11-28 14:53:16', 'local/storage/app/img_ingredients_products/mBoFT9CnrGXtRZbsk3mZLPORR2VtLWY1yWIdMaCY.jpeg', 'ลูกเกด', 'Raisin', 48),
(202, 0, '2020-11-28 14:54:23', '2020-11-28 14:54:23', 'local/storage/app/img_ingredients_products/dBt5cHvXrKl8aiXsOYy9SAijXRMFHDHDzx5JDzA8.jpeg', 'แครอท', 'Carrot', 47),
(203, 0, '2020-11-28 14:55:22', '2020-11-28 14:55:22', 'local/storage/app/img_ingredients_products/JFhtq8JgxHW3E33ooNIPwwu13FxFYFV4P8Ln0zLj.jpeg', 'แอปเปิ้ลเขียว', 'Green apple', 47),
(204, 0, '2020-11-28 14:56:24', '2020-11-28 14:56:24', 'local/storage/app/img_ingredients_products/k99aLh8Kc7rqEiagwq9jTZy7VwvUUhCOctvschSv.jpeg', 'สับปะรด', 'Pineapple', 47),
(205, 0, '2020-11-28 14:57:18', '2020-11-28 14:57:18', 'local/storage/app/img_ingredients_products/8gEgaSr8GB0mcjVVztYeS1lmxjYljzOtZYLIxAES.jpeg', 'อัญชัน', 'Butterfly pea', 48),
(206, 0, '2020-11-28 14:58:02', '2020-11-28 14:58:02', 'local/storage/app/img_ingredients_products/TgxBsHZdRq5SnBus42GAlT3WlDIC2vMChF4wi2JU.jpeg', 'แอปเปิ้ลเขียว', 'Green apple', 48),
(207, 0, '2020-11-28 14:58:29', '2020-11-28 14:58:29', 'local/storage/app/img_ingredients_products/SROLhHXWAleOixBFZ1YiCd15lKGboXhs04jZNpL8.jpeg', 'น้ำผึ้ง', 'Honey', 48),
(208, 0, '2020-11-28 14:59:58', '2020-11-28 14:59:58', 'local/storage/app/img_ingredients_products/C2yq8IygViO4OVcefI4C2gg6OzNEbGis1dqFr4xN.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 49),
(209, 0, '2020-11-28 15:01:33', '2020-11-28 15:01:33', 'local/storage/app/img_ingredients_products/9n4pqELAJg30UMsBGuvuMjAHsRRtZwHi1fQRZdyz.jpeg', 'กล้วย', 'Banana', 49),
(210, 0, '2020-11-28 15:01:58', '2020-11-28 15:01:58', 'local/storage/app/img_ingredients_products/Z75gWFIgCbGcrYPdNTJyL2cpCV9GLC7wesChqvqX.jpeg', 'อัลมอนด์', 'Almond', 49),
(211, 0, '2020-11-28 15:02:26', '2020-11-28 15:02:26', 'local/storage/app/img_ingredients_products/3ckCVtlVYeEuUY9W1xWQMFl5maggvavKwD3DZgxi.jpeg', 'อกไก่', 'Chicken breast', 49),
(212, 0, '2020-11-28 15:03:00', '2020-11-28 15:03:51', 'local/storage/app/img_ingredients_products/AVNdkrspD0eS0twudqJq1RQTzunb4hkpkTLadQk1.jpeg', 'เนยถั่ว', 'Peanut butter', 49),
(213, 0, '2020-11-28 15:04:14', '2020-11-28 15:04:14', 'local/storage/app/img_ingredients_products/cw247CLxqbR6ooSSyYMjbId8av4ALZnkhdmKHfj5.jpeg', 'นมไขมันต่ำ', 'Low fat milk', 49),
(214, 0, '2020-11-28 15:04:35', '2020-11-28 15:04:35', 'local/storage/app/img_ingredients_products/ygKhE7L0p3Uhk46ZpUHnBpuT4S1bGtk6fp9XXQKg.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 50),
(215, 0, '2020-11-28 15:04:57', '2020-11-28 15:04:57', 'local/storage/app/img_ingredients_products/PwRSYxF5BoBcpL8R008D3uIEtIGZZCGdz5QMSs9E.jpeg', 'กล้วย', 'Banana', 50),
(217, 0, '2020-11-28 15:06:05', '2020-11-28 15:06:05', 'local/storage/app/img_ingredients_products/cZN1ws8HCnMjRAfjBXqjRDAbHX346ZfYm1xoYHBE.jpeg', 'อัลมอนด์', 'Almond', 50),
(218, 0, '2020-11-28 15:06:37', '2020-11-28 15:06:37', 'local/storage/app/img_ingredients_products/OydgMG9NwtQSCm17Z7IhfLQYPQOk61sqvxJdvOI8.jpeg', 'อกไก่', 'Chicken breast', 50),
(219, 0, '2020-11-28 15:06:56', '2020-11-28 15:06:56', 'local/storage/app/img_ingredients_products/zdTaxz2XwiJgnJyLvAA8Ma2jNsc71A7CnGonBe9d.jpeg', 'ผงโกโก้', 'Cocoa powder', 50),
(220, 0, '2020-11-28 15:07:57', '2020-11-28 15:07:57', 'local/storage/app/img_ingredients_products/RFH45fM9l9vd2tIn6bYUBFQEICH9PuADhfstzq2c.jpeg', 'นมไขมันต่ำ', 'Low fat milk', 50),
(221, 0, '2020-11-28 15:08:20', '2020-11-28 15:08:20', 'local/storage/app/img_ingredients_products/p363UIpXDGdpMcft1OpDcw16uav9Ap1HCIjdqHGU.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 51),
(222, 0, '2020-11-28 15:08:38', '2020-11-28 15:08:38', 'local/storage/app/img_ingredients_products/xjXnmhpwQGNY9qEwPG8TmJ6XyEZYBufIttUyp2VX.jpeg', 'อัลมอนด์', 'Almond', 51),
(223, 0, '2020-11-28 15:08:56', '2020-11-28 15:08:56', 'local/storage/app/img_ingredients_products/rcAarrjAIaXPKA2c5EzrvVnaxX9UL135gaX6FYlH.jpeg', 'กล้วย', 'Banana', 51),
(224, 0, '2020-11-28 15:09:11', '2020-11-28 15:09:11', 'local/storage/app/img_ingredients_products/PAbO7KpJGWvNRQfUxCBPcB2otDJreDHXx7rAWhm6.jpeg', 'อกไก่', 'Chicken breast', 51),
(225, 0, '2020-11-28 15:10:01', '2020-11-28 15:10:01', 'local/storage/app/img_ingredients_products/7AjnF9DzIpBJJVl4CwjzOxBBlODtEbmc5fdsBGhZ.jpeg', 'สตรอว์เบอร์รี่', 'Strawberry', 51),
(226, 0, '2020-11-28 15:10:24', '2020-11-28 15:10:24', 'local/storage/app/img_ingredients_products/th5IVduxFzH2e99URsT9fkGUlnjQZfja7lD7q93l.jpeg', 'โยเกิร์ต', 'Yogurt', 51),
(227, 0, '2020-11-28 15:10:46', '2020-11-28 15:10:46', 'local/storage/app/img_ingredients_products/tZ8MEKCbCo2hq7WqpGd6kuNWss2e1WNdeL3vyg9n.jpeg', 'รำข้าวโอ๊ต', 'Oat bran', 52),
(228, 0, '2020-11-28 15:11:01', '2020-11-28 15:11:01', 'local/storage/app/img_ingredients_products/NAdUDV9murlqAfko4tRawdywyb2CqJl84YmXTx4w.jpeg', 'กล้วย', 'Banana', 52),
(229, 0, '2020-11-28 15:11:20', '2020-11-28 15:11:20', 'local/storage/app/img_ingredients_products/xvdgw9pTVjfg5ekcEoxzdsQMrcwsi3DqfbaSLOim.jpeg', 'อัลมอนด์', 'Almond', 52),
(230, 0, '2020-11-28 15:11:32', '2020-11-28 15:11:32', 'local/storage/app/img_ingredients_products/f5qzeYObZtdiqYfYTxDwgD2h4w8VXZ3NE8Y6XWbI.jpeg', 'อกไก่', 'Chicken breast', 52),
(231, 0, '2020-11-28 15:12:02', '2020-11-28 15:12:02', 'local/storage/app/img_ingredients_products/hSJpUNuDUPjS96gIpcljRkmM3amySnoP9wvq8q5h.jpeg', 'ผงชาเขียว', 'Green tea powder', 52),
(232, 0, '2020-11-28 15:12:40', '2020-11-28 15:12:40', 'local/storage/app/img_ingredients_products/8AC9wdW017TsyYr4PRnKh6DtLe26zlOGvNZiJkR2.jpeg', 'น้ำเชื่อมหญ้าหวาน', 'Stevia syrup', 52),
(233, 0, '2020-11-28 15:24:26', '2020-11-28 15:24:26', 'local/storage/app/img_ingredients_products/lZhVVUMqh9B4fAUJhgUjzKiz9rzepHZ2hC5QIoCx.jpeg', 'ปลากะพง', 'red snapper', 29);

-- --------------------------------------------------------

--
-- Table structure for table `products_tag`
--

CREATE TABLE `products_tag` (
  `products_tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tag_thai` text NOT NULL,
  `tag_eng` text NOT NULL,
  `products_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tag`
--

INSERT INTO `products_tag` (`products_tag_id`, `created_at`, `updated_at`, `tag_thai`, `tag_eng`, `products_pk`) VALUES
(1, '2020-11-08 08:34:40', '2020-11-08 08:34:40', 'aa', 'aa', 1),
(2, '2020-11-10 03:04:13', '2020-11-10 03:04:13', 'aa', 'aa', 5),
(9, '2020-11-12 20:30:07', '2020-11-12 20:30:07', 'tag1x', 'tag1x', 6),
(19, '2020-12-02 06:58:34', '2020-12-02 06:58:34', 'โปรตีนสูง', 'Hight Protein', 9),
(20, '2020-12-02 06:58:34', '2020-12-02 06:58:34', 'ไขมันต่ำ', 'Low Fat', 9),
(21, '2020-12-02 06:58:34', '2020-12-02 06:58:34', 'ไม่ใส่สารกันบูด', 'No Preservative', 9),
(28, '2020-12-02 08:51:33', '2020-12-02 08:51:33', 'ไม่มีน้ำตาล', 'No sugar added', 15),
(29, '2020-12-02 08:51:33', '2020-12-02 08:51:33', 'วิตามินสูง', 'Hight vitamin', 15),
(30, '2020-12-02 08:51:33', '2020-12-02 08:51:33', 'ไม่ใส่สารกันบูด', 'No preservative', 15),
(31, '2020-12-02 09:22:19', '2020-12-02 09:22:19', 'ไม่มีน้ำตาล', 'No Sugar Added', 11),
(32, '2020-12-02 09:22:19', '2020-12-02 09:22:19', 'วิตามินสูง', 'Hight Vitamin', 11),
(33, '2020-12-02 09:22:19', '2020-12-02 09:22:19', 'ไม่ใส่สารกันบูด', 'No Preservative', 11),
(34, '2020-12-02 09:22:34', '2020-12-02 09:22:34', 'โปรตีนสูง', 'Hight Protein', 7),
(35, '2020-12-02 09:22:34', '2020-12-02 09:22:34', 'ไขมันต่ำ', 'Low Fat', 7),
(36, '2020-12-02 09:22:34', '2020-12-02 09:22:34', 'ไม่ใส่สารกันบูด', 'No Preservative', 7),
(37, '2020-12-02 09:22:52', '2020-12-02 09:22:52', 'โปรตีนสูง', 'Hight Protein', 8),
(38, '2020-12-02 09:22:52', '2020-12-02 09:22:52', 'ไขมันต่ำ', 'Low Fat', 8),
(39, '2020-12-02 09:22:53', '2020-12-02 09:22:53', 'ไม่ใส่สารกันบูด', 'No Preservative', 8),
(40, '2020-12-02 09:23:10', '2020-12-02 09:23:10', 'โปรตีน', 'High Protein', 10),
(41, '2020-12-02 09:23:10', '2020-12-02 09:23:10', 'ไขมันต่ำ', 'Low Fat', 10),
(42, '2020-12-02 09:23:10', '2020-12-02 09:23:10', 'ไม่ใส่สารกันบูด', 'No Preservative', 10),
(43, '2020-12-02 09:24:16', '2020-12-02 09:24:16', 'ไม่มีน้ำตาล', 'No Sugar Added', 12),
(44, '2020-12-02 09:24:16', '2020-12-02 09:24:16', 'วิตามินสูง', 'Hight Vitamin', 12),
(45, '2020-12-02 09:24:16', '2020-12-02 09:24:16', 'ไม่ใส่สารกันบูด', 'No Preservative', 12),
(46, '2020-12-02 09:25:00', '2020-12-02 09:25:00', 'ไม่มีน้ำตาล', 'No Sugar Added', 13),
(47, '2020-12-02 09:25:00', '2020-12-02 09:25:00', 'วิตามินสูง', 'Hight Vitamin', 13),
(48, '2020-12-02 09:25:00', '2020-12-02 09:25:00', 'ไม่ใส่สารกันบูด', 'No Preservative', 13),
(49, '2020-12-02 09:25:36', '2020-12-02 09:25:36', 'ไม่มีน้ำตาล', 'No Sugar Added', 14),
(50, '2020-12-02 09:25:36', '2020-12-02 09:25:36', 'วิตามินสูง', 'Hight Vitamin', 14),
(51, '2020-12-02 09:25:36', '2020-12-02 09:25:36', 'ไม่ใส่สารกันบูด', 'No Preservative', 14),
(52, '2020-12-02 09:27:32', '2020-12-02 09:27:32', '<300 แคลอรี่', '<300 Kcal', 16),
(53, '2020-12-02 09:27:32', '2020-12-02 09:27:32', 'ไม่ใส่สารกันบูด', 'No Preservative', 16),
(54, '2020-12-02 09:27:32', '2020-12-02 09:27:32', 'คาร์โบไฮเดรตต่ำ', 'Low Carb', 16),
(57, '2020-12-04 08:59:44', '2020-12-04 08:59:44', 'พลังงานสูง', 'Hight Energy', 18),
(58, '2020-12-04 08:59:44', '2020-12-04 08:59:44', 'ไม่ใส่สารกันบูด', 'No Preservative', 18),
(59, '2020-12-04 08:59:53', '2020-12-04 08:59:53', '<400 แคลอรี่', '<400 Kcal', 17),
(60, '2020-12-04 08:59:53', '2020-12-04 08:59:53', 'ไม่ใส่สารกันบูด', 'No Preservative', 17),
(61, '2020-12-04 09:01:17', '2020-12-04 09:01:17', '<500 แคลอรี่', '<500 Kcal', 19),
(62, '2020-12-04 09:01:17', '2020-12-04 09:01:17', 'ไฟเบอร์สูง', 'Hight Fiber', 19),
(63, '2020-12-04 09:01:17', '2020-12-04 09:01:17', 'วิตามินสูง', 'Hight Vitamin', 19),
(64, '2020-12-04 09:01:57', '2020-12-04 09:01:57', 'แคลอรี่ต่ำ', 'Low Calorie', 20),
(65, '2020-12-04 09:01:57', '2020-12-04 09:01:57', 'วิตามินสูง', 'Hight Vitamin', 20),
(66, '2020-12-04 09:01:57', '2020-12-04 09:01:57', 'ไฟเบอร์สูง', 'Hight Fiber', 20),
(67, '2020-12-04 09:10:26', '2020-12-04 09:10:26', 'ไขมันต่ำ', 'Low Fat', 21),
(68, '2020-12-04 09:10:26', '2020-12-04 09:10:26', 'ไฟเบอร์สูง', 'Hight Fiber', 21),
(69, '2020-12-04 09:10:26', '2020-12-04 09:10:26', 'แคลอรี่ต่ำ', 'Low Calorie', 21),
(70, '2020-12-04 09:10:26', '2020-12-04 09:10:26', 'วัตถุดิบถูกสุขอนามัย', 'Clean Recipe', 21),
(71, '2020-12-04 09:13:11', '2020-12-04 09:13:11', '<500 แคลอรี่', '<500 Kcal', 22),
(72, '2020-12-04 09:13:11', '2020-12-04 09:13:11', 'ไม่ใส่สารกันบูด', 'No Preservative', 22),
(73, '2020-12-04 09:13:11', '2020-12-04 09:13:11', 'โซเดียมต่ำ', 'Low Sodium', 22),
(74, '2020-12-04 09:15:41', '2020-12-04 09:15:41', '<500 แคลอรี่', '<500 Kcal', 23),
(75, '2020-12-04 09:15:41', '2020-12-04 09:15:41', 'โปรตีนสูง', 'Hight Protein', 23),
(76, '2020-12-04 09:15:41', '2020-12-04 09:15:41', 'ไม่ใส่สารกันบูด', 'No Preservative', 23),
(77, '2020-12-04 09:16:28', '2020-12-04 09:16:28', '<500 แคลอรี่', '<500 Kcal', 24),
(78, '2020-12-04 09:16:28', '2020-12-04 09:16:28', 'โปรตีนสูง', 'Hight Protein', 24),
(79, '2020-12-04 09:16:28', '2020-12-04 09:16:28', 'ไม่ใส่สารกันบูด', 'No Preservative', 24),
(80, '2020-12-04 09:17:11', '2020-12-04 09:17:11', '<500 แคลอรี่', '<500 Kcal', 25),
(81, '2020-12-04 09:17:11', '2020-12-04 09:17:11', 'ไม่ใส่สารกันบูด', 'No Preservative', 25),
(82, '2020-12-04 09:17:11', '2020-12-04 09:17:11', 'โปรตีนสูง', 'Hight Protein', 25),
(83, '2020-12-04 09:19:54', '2020-12-04 09:19:54', 'พลังงานสูง', 'Hight Energy', 26),
(84, '2020-12-04 09:19:54', '2020-12-04 09:19:54', 'ไม่ใส่สารกันบูด', 'No Preservative', 26),
(85, '2020-12-04 09:19:54', '2020-12-04 09:19:54', 'โปรตีนสูง', 'Hight Protein', 26),
(86, '2020-12-04 09:21:14', '2020-12-04 09:21:14', '<400 แคลอรี่', '<400 Kcal', 27),
(87, '2020-12-04 09:21:14', '2020-12-04 09:21:14', 'ไม่ใส่ผงชูรส', 'No MSG', 27),
(88, '2020-12-04 09:21:14', '2020-12-04 09:21:14', 'น้ำตาลต่ำ', 'Low Sugar', 27),
(89, '2020-12-04 09:21:14', '2020-12-04 09:21:14', 'ไม่ใส่สารกันบูด', 'No Preservative', 27),
(90, '2020-12-04 09:22:15', '2020-12-04 09:22:15', '<500 แคลอรี่', '<500 Kcal', 28),
(91, '2020-12-04 09:22:15', '2020-12-04 09:22:15', 'โซเดียมต่ำ', 'Low Sodium', 28),
(92, '2020-12-04 09:22:15', '2020-12-04 09:22:15', 'ไม่ใส่สารกันบูด', 'No Preservative', 28),
(93, '2020-12-04 09:22:15', '2020-12-04 09:22:15', 'ไม่ใส่ผงชูรส', 'No MSG', 28),
(94, '2020-12-04 09:23:42', '2020-12-04 09:23:42', '<500 แคลอรี่', '<500 Kcal', 29),
(95, '2020-12-04 09:23:42', '2020-12-04 09:23:42', 'โซเดียมต่ำ', 'Low Sodium', 29),
(96, '2020-12-04 09:23:42', '2020-12-04 09:23:42', 'ไม่ใส่ผงชูรส', 'No MGS', 29),
(97, '2020-12-04 09:23:42', '2020-12-04 09:23:42', 'ไม่ใส่สารกันบูด', 'No Preservative', 29),
(98, '2020-12-04 09:24:51', '2020-12-04 09:24:51', '<500 แคลอรี่', '<500 Kcal', 30),
(99, '2020-12-04 09:24:51', '2020-12-04 09:24:51', 'โซเดียมต่ำ', 'Low Sodium', 30),
(100, '2020-12-04 09:24:51', '2020-12-04 09:24:51', 'ไม่ใส่ผงชูรส', 'No MSG', 30),
(101, '2020-12-04 09:24:51', '2020-12-04 09:24:51', 'ไม่ใส่สารกันบูด', 'No Preservative', 30),
(102, '2020-12-04 09:26:48', '2020-12-04 09:26:48', '<500 แคลอรี่', '<500 Kcal', 31),
(103, '2020-12-04 09:26:48', '2020-12-04 09:26:48', 'โซเดียมต่ำ', 'Low Sodium', 31),
(104, '2020-12-04 09:26:48', '2020-12-04 09:26:48', 'ไม่ใส่ผงชูรส', 'No MSG', 31),
(105, '2020-12-04 09:26:48', '2020-12-04 09:26:48', 'ไม่ใส่สารกันบูด', 'No Preservative', 31),
(106, '2020-12-04 09:27:57', '2020-12-04 09:27:57', '<400 แคลอรี่', '<400 Kcal', 32),
(107, '2020-12-04 09:27:58', '2020-12-04 09:27:58', 'โซเดียมต่ำ', 'Low Sodium', 32),
(108, '2020-12-04 09:27:58', '2020-12-04 09:27:58', 'ไม่ใส่ผงชูรส', 'No MGS', 32),
(109, '2020-12-04 09:27:58', '2020-12-04 09:27:58', 'ไม่ใส่สารกันบูด', 'No Preservative', 32),
(110, '2020-12-04 09:29:14', '2020-12-04 09:29:14', '<400 แคลอรี่', '<400 Kcal', 33),
(111, '2020-12-04 09:29:14', '2020-12-04 09:29:14', 'ไขมันต่ำ', 'Low Fat', 33),
(112, '2020-12-04 09:29:14', '2020-12-04 09:29:14', 'ไม่ใส่ผงชูรส', 'No MGS', 33),
(113, '2020-12-04 09:29:14', '2020-12-04 09:29:14', 'ไม่ใส่สารกันบูด', 'No Preservative', 33),
(114, '2020-12-04 09:31:56', '2020-12-04 09:31:56', '<500 แคลอรี่', '<500 Kcal', 34),
(115, '2020-12-04 09:31:56', '2020-12-04 09:31:56', 'ไขมันต่ำ', 'Low Fat', 34),
(116, '2020-12-04 09:31:56', '2020-12-04 09:31:56', 'ไม่ใส่ผงชูรส', 'No MGS', 34),
(117, '2020-12-04 09:31:56', '2020-12-04 09:31:56', 'ไม่ใส่สารกันบูด', 'No Preservative', 34),
(118, '2020-12-04 09:32:59', '2020-12-04 09:32:59', '<500 แคลอรี่', '<500 Kcal', 35),
(119, '2020-12-04 09:32:59', '2020-12-04 09:32:59', 'ไขมันต่ำ', 'Low Fat', 35),
(120, '2020-12-04 09:32:59', '2020-12-04 09:32:59', 'ไม่ใส่ผงชูรส', 'No MGS', 35),
(121, '2020-12-04 09:32:59', '2020-12-04 09:32:59', 'ไม่ใส่สารกันบูด', 'No Preservative', 35),
(122, '2020-12-04 09:33:35', '2020-12-04 09:33:35', 'โปรตีนสูง', 'Hight Protein', 36),
(123, '2020-12-04 09:34:21', '2020-12-04 09:34:21', 'ไม่ใส่สารกันบูด', 'No Preservative', 36),
(124, '2020-12-04 09:34:21', '2020-12-04 09:34:21', 'น้ำตาลต่ำ', 'Low Sugar', 36),
(125, '2020-12-04 09:34:22', '2020-12-04 09:34:22', 'ไม่ใส่ผงชูรส', 'No MSG', 36),
(126, '2020-12-04 09:35:52', '2020-12-04 09:35:52', '<500 แคลอรี่', '<500 Kcal', 37),
(127, '2020-12-04 09:35:52', '2020-12-04 09:35:52', 'โซเดียมต่ำ', 'Low Sodium', 37),
(128, '2020-12-04 09:35:52', '2020-12-04 09:35:52', 'ไม่ใส่ผงชูรส', 'No MSG', 37),
(129, '2020-12-04 09:35:52', '2020-12-04 09:35:52', 'ไม่ใส่สารกันบูด', 'No Preservative', 37),
(130, '2020-12-04 09:36:52', '2020-12-04 09:36:52', '<500 แคลอรี่', '<500 Kcal', 38),
(131, '2020-12-04 09:36:52', '2020-12-04 09:36:52', 'โซเดียมต่ำ', 'Low Sodium', 38),
(132, '2020-12-04 09:36:52', '2020-12-04 09:36:52', 'ไม่ใส่ผงชูรส', 'No MSG', 38),
(133, '2020-12-04 09:36:52', '2020-12-04 09:36:52', 'ไม่ใส่สารกันบูด', 'No Preservative', 38),
(134, '2020-12-04 09:38:02', '2020-12-04 09:38:02', 'โปรตีนสูง', 'Hight Protein', 39),
(135, '2020-12-04 09:38:02', '2020-12-04 09:38:02', 'ไม่ใส่สารกันบูด', 'No Preservative', 39),
(136, '2020-12-04 09:38:02', '2020-12-04 09:38:02', 'น้ำตาลต่ำ', 'Low Sugar', 39),
(137, '2020-12-04 09:38:02', '2020-12-04 09:38:02', 'ไม่ใส่ผงชูรส', 'No MSG', 39),
(138, '2020-12-04 09:39:37', '2020-12-04 09:39:37', '<500 แคลอรี่', '<500 Kcal', 40),
(139, '2020-12-04 09:39:37', '2020-12-04 09:39:37', 'ไม่ใส่ผงชูรส', 'No MSG', 40),
(140, '2020-12-04 09:39:37', '2020-12-04 09:39:37', 'ไม่ใส่สารกันบูด', 'No Preservative', 40),
(141, '2020-12-04 09:39:37', '2020-12-04 09:39:37', 'โซเดียมต่ำ', 'Low Sodium', 40),
(142, '2020-12-04 09:40:49', '2020-12-04 09:40:49', 'โปรตีนสูง', 'Hight Protein', 41),
(143, '2020-12-04 09:40:49', '2020-12-04 09:40:49', 'ไม่ใส่ผงชูรส', 'No MSG', 41),
(144, '2020-12-04 09:40:49', '2020-12-04 09:40:49', 'ไขมันต่ำ', 'Low Fat', 41),
(145, '2020-12-04 09:40:49', '2020-12-04 09:40:49', 'โซเดียมต่ำ', 'Low Sodium', 41),
(146, '2020-12-04 09:41:56', '2020-12-04 09:41:56', '<500 แคลอรี่', '<500 Kcal', 42),
(147, '2020-12-04 09:41:56', '2020-12-04 09:41:56', 'โซเดียมต่ำ', 'Low Sodium', 42),
(148, '2020-12-04 09:41:56', '2020-12-04 09:41:56', 'ไขมันต่ำ', 'Low Fat', 42),
(149, '2020-12-04 09:41:56', '2020-12-04 09:41:56', 'ไม่ใส่ผงชูรส', 'No MSG', 42),
(150, '2020-12-04 09:43:53', '2020-12-04 09:43:53', '<500 แคลอรี่', '<500 Kcal', 43),
(151, '2020-12-04 09:43:53', '2020-12-04 09:43:53', 'ไขมันต่ำ', 'Low Fat', 43),
(152, '2020-12-04 09:43:53', '2020-12-04 09:43:53', 'น้ำตาลต่ำ', 'Low Sugar', 43),
(153, '2020-12-04 09:43:53', '2020-12-04 09:43:53', 'ไม่ใส่สารกันบูด', 'No Preservative', 43),
(154, '2020-12-04 09:44:44', '2020-12-04 09:44:44', '<500 แคลอรี่', '<500 Kcal', 44),
(155, '2020-12-04 09:44:44', '2020-12-04 09:44:44', 'โปรตีนสูง', 'Hight Protein', 44),
(156, '2020-12-04 09:44:44', '2020-12-04 09:44:44', 'ไม่ใส่สารกันบูด', 'No Preservative', 44),
(157, '2020-12-04 09:44:44', '2020-12-04 09:44:44', '<50g คาร์บโบไฮเดรต', '<50g Carb', 44);

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `about_id` int(11) NOT NULL,
  `about_profile_th` text DEFAULT NULL,
  `about_profile_en` text DEFAULT NULL,
  `about_content_th` text DEFAULT NULL,
  `about_content_en` text DEFAULT NULL,
  `about_address_th` text DEFAULT NULL,
  `about_address_en` text DEFAULT NULL,
  `about_phone` text DEFAULT NULL,
  `about_fax` text DEFAULT NULL,
  `about_email` text DEFAULT NULL,
  `about_facebook` text DEFAULT NULL,
  `about_facebook_name` text DEFAULT NULL,
  `about_line` text DEFAULT NULL,
  `about_line_id` text DEFAULT NULL,
  `about_youtube` text DEFAULT NULL,
  `about_youtube_name` text DEFAULT NULL,
  `about_instagram` text DEFAULT NULL,
  `about_instagram_name` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`about_id`, `about_profile_th`, `about_profile_en`, `about_content_th`, `about_content_en`, `about_address_th`, `about_address_en`, `about_phone`, `about_fax`, `about_email`, `about_facebook`, `about_facebook_name`, `about_line`, `about_line_id`, `about_youtube`, `about_youtube_name`, `about_instagram`, `about_instagram_name`, `created_at`, `updated_at`) VALUES
(1, '<p>&nbsp; &nbsp; บริษัท ตรีศักดิ์ออโตเมชั่น จำกัด ก่อตั้งขึ้นในปี 2521 ภายใต้ชื่อห้างหุ้นส่วนจำกัดไตรศักดิ์พานิช (พาณิชย์) เป็นการร่วมทุนระหว่างผู้ลงทุนไทยกับ บริษัท ญี่ปุ่น บริษัท มิยากาวา จำกัด<br></p><p><br></p><p>ในปี 2538 ห้างหุ้นส่วนจำกัดไตรศักดิ์พานิช (พาณิชย์) เปลี่ยนชื่อเป็น บริษัท ไตรศักดิ์ออโตเมชั่น จำกัด</p><p><br></p><p>บริษัท แฟคทอรี่ออโตเมชั่นเซ็นเตอร์ จำกัด ก่อตั้งขึ้นในปี 2532 ภายใต้การบริหารงานของ บริษัท ไตรศักดิ์ออโตเมชั่น จำกัด</p><p><br></p><p>Hytron Trisak Co. , Ltd ก่อตั้งขึ้นในปี 1994 เป็นกิจการร่วมค้าของ Trisak Automation Co. , Ltd และ Miyakawa Corporation ของญี่ปุ่น บริษัท อยู่ภายใต้การบริหารของ บริษัท ไตรศักดิ์ออโตเมชั่น จำกัด</p>', '<p class=\"mb-4\" style=\"box-sizing: border-box; font-family: Roboto, Prompt, sans-serif; font-size: 16px; text-indent: 50px; margin-bottom: 1.5rem !important;\">Trisak Automation Co., Ltd. was established in 1978 under the name of Trisak Panich (Commercial) limmited Partnership. It was a joint venture between Thai invertors and the Japanese Company, Miyakawa Co., Ltd</p><p class=\"mb-4\" style=\"box-sizing: border-box; font-family: Roboto, Prompt, sans-serif; font-size: 16px; text-indent: 50px; margin-bottom: 1.5rem !important;\">In 1995, Trisak Panich (Commercial) Limited Partnership, changed its name to Trisak Automation Co., Ltd</p><p class=\"mb-4\" style=\"box-sizing: border-box; font-family: Roboto, Prompt, sans-serif; font-size: 16px; text-indent: 50px; margin-bottom: 1.5rem !important;\">Factory Automation Centre Co., Ltd was established in 1989 under ther management of Trisak Automation Co., Ltd</p><p class=\"mb-4\" style=\"box-sizing: border-box; font-family: Roboto, Prompt, sans-serif; font-size: 16px; text-indent: 50px; margin-bottom: 1.5rem !important;\">Hytron Trisak Co., Ltd was established in 1994 as a joint venture of Trisak Automation Co., Ltd and Miyakawa Corporation of Japan. The company is under the management Of Trisak Automation Co., Ltd.</p><div><br></div>', 'บริษัท ไตรศักดิ์ออโตเมชั่น จำกัด ก่อตั้งขึ้นในปี 2521 \nภายใต้ชื่อห้างหุ้นส่วนจำกัดไตรศักดิ์พานิช (พาณิชย์) \nเป็นการร่วมทุนระหว่างผู้ลงทุนไทยกับ', 'Lorem Ipsum is simply dummy text of the \nprinting and typesetting industry. \nLorem Ipsum has been the', '129 ถ. สุขาภิบาล 2 แขวงดอกไม้เขตประเวศกรุงเทพมหานคร 10250', '129 Sukhapiban 2 Road,Dokmai, Prawet, Bangkok 10250 Thailand', '091 666 0998', '02 328 5979, 02 328 5988', 'customerrelation@gourmetprimo.com', 'https://www.facebook.com/', 'Eatfit by Gourmet Primo', 'https://line.me/R/ti/p/@eatfit.th', '@eatfit.th', 'https://www.youtube.com/', 'eatfit channal', 'https://www.instagram.com/eatfit.th/', 'eatfit.th', '0000-00-00 00:00:00', '2020-11-26 18:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `address_id` int(11) NOT NULL,
  `address_regis` text DEFAULT NULL,
  `address_no` text DEFAULT NULL,
  `address_province` text DEFAULT NULL,
  `address_distric` text DEFAULT NULL,
  `address_sub_distric` text DEFAULT NULL,
  `address_postcode` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `address_shipping` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`address_id`, `address_regis`, `address_no`, `address_province`, `address_distric`, `address_sub_distric`, `address_postcode`, `created_at`, `updated_at`, `address_shipping`) VALUES
(1, '1', 'thailand', 'Bangkok', 'Dusit', 'Dusit', '10300', '2020-12-05 00:09:01', '2020-12-05 00:09:01', 1),
(2, '2', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2020-12-05 08:48:16', '2020-12-05 08:48:16', 1),
(3, '3', '366/66', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-05 09:07:44', '2020-12-05 09:07:44', 1),
(4, '4', '22 ถนน กัลปพฤกษ์ Khwaeng Bang Khun Thian', 'Bangkok', 'Bang Bon', 'Bang Bon Nuer', '10150', '2020-12-05 10:18:50', '2020-12-05 10:18:50', 1),
(5, '5', '758/255 Waterford Diamond Tower, Sukhumvit 30/1, Sukhumvit Rd., Klongton, Klongtoey', 'Bangkok', 'Khlong Toei', 'Khlong Ton', '10110', '2020-12-06 11:44:40', '2020-12-06 11:44:40', 1),
(6, '6', '1589/57 The miracle plus 3', 'Bangkok', 'Bang Kae', 'Lak Song', '10510', '2020-12-06 12:05:56', '2020-12-06 12:05:56', 1),
(7, '7', '11', 'Bangkok', 'Bang Phlat', 'Bang O', '10700', '2020-12-06 12:07:12', '2020-12-06 12:07:12', 1),
(8, '8', '566666', 'Bangkok', 'Bang Khun Thian', 'Chom Thong', '45009', '2020-12-06 12:10:29', '2020-12-06 12:10:29', 1),
(9, '9', '39 ซอย ลาดกระบัง 48', 'Bangkok', 'Lat Krabang', 'Lat Krabang', '10520', '2020-12-06 12:13:22', '2020-12-06 12:13:22', 1),
(10, '10', 'Test', 'Pathum Thani', 'Khlong Luang', 'Khlong Ha', '10888', '2020-12-06 17:50:53', '2020-12-06 17:50:53', 1),
(11, '11', '348/304 The Nest  สุขุมวิท 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-08 06:28:21', '2020-12-08 06:28:21', 1),
(12, '12', 'The Nest สุขุมวิท 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-08 06:30:21', '2020-12-08 06:30:21', 1),
(13, '13', '366/66 Bangsue', 'Bangkok', 'Bang Kho Laem', 'Bang Khlo', '54345', '2020-12-08 09:17:07', '2020-12-08 09:17:07', 1),
(14, '14', '4444', 'Bangkok', 'Bang Khen', 'Sai Mai', '65666', '2020-12-08 09:26:55', '2020-12-08 09:26:55', 1),
(15, '15', '46677', 'Bangkok', 'Bang Khun Thian', 'Bang Khun Thian', '65776', '2020-12-08 09:29:13', '2020-12-08 09:29:13', 1),
(16, '16', '366/66 Bangsue', 'Nonthaburi', 'Bang Kruai', 'Bang Kruai', '10800', '2020-12-08 09:43:58', '2020-12-08 09:43:58', 1),
(17, '17', '366/66 Bangsue', 'Bangkok', 'Min Buri', 'Sai Kong Din', '10800', '2020-12-08 09:45:10', '2020-12-08 09:45:10', 1),
(18, '18', '366/66 Bangsue5', 'Bangkok', 'Bang Bon', 'Bang Bon', '10800', '2020-12-08 09:52:50', '2020-12-08 09:52:50', 1),
(19, '19', '366/66 Bangsue', 'Bangkok', 'Huai Khwang', 'Huai Khwang', '54353', '2020-12-08 10:01:35', '2020-12-08 10:01:35', 1),
(20, '20', '366/66 Bangsue', 'Bangkok', 'Bangkok Noi', 'Bang Phlat', '10800', '2020-12-08 10:04:02', '2020-12-08 10:04:02', 1),
(21, '21', '11/07/2523 BE', 'Bangkok', 'Khlong Toei', 'Khlong Ton', '10110', '2020-12-08 14:44:12', '2020-12-08 14:44:12', 1),
(22, '22', '95/60 Suksawas road', 'Samut Prakan', 'Phra Pradaeng', 'Bang Phueng', '10130', '2020-12-09 14:11:04', '2020-12-09 14:11:04', 1),
(23, '23', 'อาคารวาริช เลขที่ 88 ถนนเทพรัตน', 'Bangkok', 'Bang Na', 'Bang Na Tai', '10260', '2020-12-09 20:35:58', '2020-12-09 20:35:58', 1),
(24, '24', '366/66 Bangsue', 'Bangkok', 'Don Mueang', 'Talad Bang Khen', '54355', '2020-12-11 09:38:26', '2020-12-11 09:38:26', 1),
(25, '25', '366/66 Bangsue', 'Bangkok', 'Din Daeng', 'Ratchadapisek', '54353', '2020-12-11 09:39:29', '2020-12-11 09:39:29', 1),
(26, '26', '89/108หมู่​บ้านคา​ซ่า​วิลล์​ว​ั​ชร​พล​', 'Bangkok', 'Sai Mai', 'Khlong Thanon', '10220', '2020-12-12 18:19:40', '2020-12-12 18:19:40', 1),
(27, '27', '20/140 ซ. ลาดพร้าว 101 แยก 38 แขวง คลองจั่น เขต บางกะปิ กทม 10240', 'Bangkok', 'Bang Kapi', 'Khlong Chan', '10240', '2020-12-12 19:22:34', '2020-12-12 19:22:34', 1),
(28, '28', '29/38 ม.อลิชา1 ถ.พุทธบูชา36 แขวงบางมด เขตทุ่งครุ', 'Bangkok', 'Thung Khru', 'Bang Mod', '10140', '2020-12-17 06:37:38', '2020-12-17 06:37:38', 1),
(29, '29', '44 Langsuan', 'Bangkok', 'Pathum Wan', 'Lumphini', '10330', '2020-12-17 19:06:17', '2020-12-17 19:06:17', 1),
(30, '30', '55/50', 'Nonthaburi', 'Pak Kret', 'Pak Kret', '11120', '2020-12-18 13:51:29', '2020-12-18 13:51:29', 1),
(31, '31', 'The Nest Sukhumvit 22', 'Bangkok', 'Khlong Toei', 'Khlong Toei', '10110', '2020-12-21 13:17:32', '2020-12-21 13:17:32', 1),
(32, '22', '129 Sukhapiban 2 Road', 'Bangkok', 'Prawet', 'Dokmai', '10250', '2020-12-22 11:43:37', '2020-12-22 11:43:58', 1),
(33, '32', '298/55 Pyne by Sansiri condomnium, Phayathai Rd', 'Bangkok', 'Ratchathewi', 'Thanon Phetchaburi', '10400', '2020-12-30 14:27:44', '2020-12-30 14:27:44', 1),
(34, '33', '199/2981', 'Samut Prakan', 'Mueang Samut Prakan', 'Phraek Sa Mai', '10280', '2020-12-30 16:54:48', '2020-12-30 16:54:48', 1),
(35, '34', 'หมู่บ้าน vive บางนา-ตราด', 'Bangkok', 'Bang Na', 'Bang Na', '10270', '2021-01-04 08:40:10', '2021-01-04 08:40:10', 1),
(36, '35', '11 The Colory Vivid Condo ห้อง 11/117 ประชาราษฎร์บำเพ็ญ ซอย 6 แขวงห้วยขวาง เขตห้วยขวาง', 'Bangkok', 'Huai Khwang', 'Huai Khwang', '10310', '2021-01-12 11:41:09', '2021-01-12 11:41:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_logo` text DEFAULT NULL,
  `bank_namelogo_th` text DEFAULT NULL,
  `bank_namelogo_en` text DEFAULT NULL,
  `bank_accountnumber` text DEFAULT NULL,
  `bank_accountname_th` text DEFAULT NULL,
  `bank_accountname_en` text DEFAULT NULL,
  `bank_show` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`bank_id`, `bank_logo`, `bank_namelogo_th`, `bank_namelogo_en`, `bank_accountnumber`, `bank_accountname_th`, `bank_accountname_en`, `bank_show`, `created_at`, `updated_at`) VALUES
(1, 'image/file/image_file_ONtJadBcYf7H.png', 'กสิกร', 'kasikorm', '1230456', 'ตรีศักดิ์', 'trisak', 1, '2020-07-30 04:56:13', '2020-07-30 04:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_link` text DEFAULT NULL,
  `banner_image` text DEFAULT NULL,
  `banner_topic_th` text DEFAULT NULL,
  `banner_topic_en` text DEFAULT NULL,
  `banner_title_th` text DEFAULT NULL,
  `banner_title_en` text DEFAULT NULL,
  `banner_content_th` text DEFAULT NULL,
  `banner_content_en` text DEFAULT NULL,
  `banner_show` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`banner_id`, `banner_link`, `banner_image`, `banner_topic_th`, `banner_topic_en`, `banner_title_th`, `banner_title_en`, `banner_content_th`, `banner_content_en`, `banner_show`, `created_at`, `updated_at`) VALUES
(1, 'http://ford.orangeworkshop.info/eatfit/product/3', 'image/banner/image_banner_uGBw8mfxzvTe.JPG', 'ที่สุดความอร่อย ของคนรักสุขภาพ', 'Healthfully Delicious', NULL, NULL, 'Eatfit ส่งอาหารสุขภาพพร้อมทานแสนอร่อย เต็มไปด้วยคุณค่าทางโภชนาการส่งตรงถึงบ้านคุณ', 'eatfit brings life-enhancing, delicious and nutritious meals direct to your door, ready to eat.', 1, '2020-11-11 06:51:22', '2021-01-21 10:08:50'),
(2, 'http://ford.orangeworkshop.info/eatfit/product/3', 'image/banner/image_banner_emwd85SMhWIC.JPG', 'Delicious nutrition', 'Delicious nutrition', NULL, NULL, 'เวลาน้อย ก็ดูแลสุขภาพให้ดีได้ด้วย Eatfit', 'for busy professionals', 1, '2020-11-11 07:57:16', '2021-01-21 11:28:57'),
(3, 'http://ford.orangeworkshop.info/eatfit/product/4', 'image/banner/image_banner_UKD1bkVyS1aP.JPG', 'Healthy Eating –', 'Healthy Eating –', NULL, NULL, 'สุขภาพดี ออกแบบได้', 'Designed For Results', 1, '2020-11-30 10:02:41', '2021-01-21 11:29:48'),
(4, 'http://ford.orangeworkshop.info/eatfit/product/5', 'image/banner/image_banner_x6W0IIug1RGo.JPG', 'We make more than juice.', 'We make more than juice.', NULL, NULL, 'It’s nutrition, deliciously crafted.', 'It’s nutrition, deliciously crafted.', 1, '2020-11-30 10:34:26', '2020-12-01 10:28:53'),
(5, 'http://ford.orangeworkshop.info/eatfit/product/6', 'image/banner/image_banner_Dx9CtVrwfcSg.JPG', 'Healthful and tasty mini-desserts', 'Healthful and tasty mini-desserts', NULL, NULL, 'เติมเต็มมื้อนี้มื้อนี้ของคุณให้สมบูรณ์แบบด้วยขนมหวานแสนอร่อย สุขภาพดี', 'make a great meal PERFECT', 1, '2020-11-30 10:44:26', '2021-01-21 11:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_banner_image` text DEFAULT NULL,
  `blog_cover_image` text DEFAULT NULL,
  `blog_topic_th` text DEFAULT NULL,
  `blog_topic_en` text DEFAULT NULL,
  `blog_content_th` text DEFAULT NULL,
  `blog_content_en` text DEFAULT NULL,
  `blog_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`blog_id`, `blog_banner_image`, `blog_cover_image`, `blog_topic_th`, `blog_topic_en`, `blog_content_th`, `blog_content_en`, `blog_date`, `created_at`, `updated_at`) VALUES
(4, 'image/blog/image_blog_R4TNddHactBw.JPG', 'image/blog/image_blog_o0KpfhRgv7dr.JPG', '5 อาหารเพื่อสุขภาพที่ควรมีติดตู้เย็นไว้ อย่าให้ขาด!', '5 อาหารเพื่อสุขภาพที่ควรมีติดตู้เย็นไว้ อย่าให้ขาด!', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.693333625793457px; font-size: 11pt; font-family: Calibri, sans-serif; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; text-decoration: none;\"><span style=\"font-size: 14pt;\">การดูแลสุขภาพสามารถเริ่มได้ง่าย ๆ ที่อาหารด้วยการหันมาเลือกทานอาหารที่มีประโยชน์ต่อร่างกาย หากใครที่กำลังสนใจอยากเริ่มดูแลตัวเองอยู่ วันนี้เราก็จะชวนไปโล๊ะตู้เย็นเก่าให้กลายเป็นตู้เย็นเพื่อสุขภาพกันด้วยการเลือกแต่อาหารที่มีประโยชน์ไว้ในตู้เย็น ส่วนจะมีอะไรบ้างนั้น ไปดูกันเลย</span><br></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.693333625793457px; font-size: 11pt; font-family: Calibri, sans-serif; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; text-decoration: none;\"><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แนะนำ 5 อาหารเพื่อสุขภาพที่คนรักสุขภาพควรมีติดตู้เย็น</span></b><b><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></b></p><p class=\"MsoListParagraphCxSpFirst\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">1.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ไข่</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;เป็นอาหารที่มีโปรตีนสูงและเป็นสารอาหารที่มีประโยชน์ต่อร่างกาย โดยโปรตีนจะช่วยสร้างกล้ามเนื้อและช่วยซ่อมแซมสิ่งที่สึกหรอ เป็นอาหารที่เหมาะสำหรับคนรักสุขภาพหรือคนที่ต้องการสร้างกล้ามเนื้อ ควรทานไม่เกินวันละ&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">2&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฟอง เพราะหากทานมากเกินไปก็อาจส่งผลเสียต่อร่างกายได้</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">2.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ปลาแซลมอน</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;เป็นอาหารที่มีไขมันและอุดมไปด้วยประโยชน์ต่าง ๆ เช่น มีโอเมก้า 3 ที่เป็นสารอาหารที่ดีต่อระบบสมอง ช่วยเร่งระบบการเผาผลาญในร่ายกาย ช่วยให้ระบบเผาผลาญทำงานได้ดีขึ้น เมื่อระบบเผาผลาญทำงานได้ดีขึ้นก็จะส่งผลดีต่อร่างกายด้วยเช่นกัน</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">3.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ผักสด</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;การทานผักสดจะช่วยให้ได้สารอาหารมากที่สุด เพราะหากผ่านขั้นตอนการประกอบอาหารต่าง ๆ จากการทำให้สุกแล้วสารอาหารจะลดลง จึงควรมีผักสดพร้อมทานติดตู้เย็นไว้ เช่น ผักสลัดอย่าง กรีนโอ๊ค (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Green Oak Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">เรดโอ๊ค (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Red Oak Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">เรดคอรัล (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Red Coral Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ร็อกเก็ต (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Rocket Salad),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">กรีนคอส (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Green Cos Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฟิลเลย์ไอซ์เบิร์ก (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Frillice Iceberg),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">บัตเตอร์เฮด (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Butterhead Lettuce)</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;ฯลฯ เพราะเป็นผักที่มีกากใยสูง แคลอรี่ต่ำ มีวิตามินสูง และช่วยบำรุงระบบสายตาได้ดี นอกจากนี้ยังมีผักกาดแก้ว</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แครอท มะเขือเทศ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แตงกวา ฯลฯ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">4.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ผลไม้</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;เป็นของที่ไม่ควรปล่อยให้ขาดตู้เย็นเลยเพราะนอกจากจะมีประโยชน์ต่อร่างกายแล้วยังมีแคลอรี่ต่ำอีกด้วย ใน<span>&nbsp;&nbsp;</span>100 กรัม ผลไม้ต่าง ๆ สามารถให้พลังงานได้ดังนี้ มะละกอ ให้พลังงาน 13 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แตงโม ให้พลังงาน 25 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">สตรอว์เบอร์รี ให้พลังงาน 33 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ส้ม ให้พลังงาน 42 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แอปเปิ้ล ให้พลังงาน 52 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">บลูเบอร์รี่ ให้พลังงาน 57 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฝรั่ง ให้พลังงาน 60 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แก้วมังกร ให้พลังงาน 60 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">กล้วยหอม ให้พลังงาน&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">120&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">อาโวคาโด ให้พลังงาน&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">160&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แคลอรี่</span><span lang=\"TH\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฯลฯ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">5.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">โยเกิร์ต</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;ควรเลือกทานโยเกิร์ตสูตรธรรมชาติหรือกรีกโยเกิร์ต เพราะสามารถให้พลังงานได้สูงกว่าโยเกิร์ตแบบทั่วไปมากถึง&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">2&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">เท่า ช่วยให้อยู่ท้อง ไม่หิวบ่อย มีแคลอรี่ต่ำ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p><style class=\"WebKit-mso-list-quirks-style\">\r\n<!--\r\n/* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:\"\";\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:8.0pt;\r\n	margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoHeader, li.MsoHeader, div.MsoHeader\r\n	{mso-style-priority:99;\r\n	mso-style-link:\"Header Char\";\r\n	margin:0cm;\r\n	mso-pagination:widow-orphan;\r\n	tab-stops:center 234.0pt right 468.0pt;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:8.0pt;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-type:export-only;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:0cm;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-type:export-only;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:0cm;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-type:export-only;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:8.0pt;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\nspan.HeaderChar\r\n	{mso-style-name:\"Header Char\";\r\n	mso-style-priority:99;\r\n	mso-style-unhide:no;\r\n	mso-style-locked:yes;\r\n	mso-style-link:Header;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-size:11.0pt;\r\n	mso-ansi-font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\n.MsoPapDefault\r\n	{mso-style-type:export-only;\r\n	margin-bottom:8.0pt;\r\n	line-height:107%;}\r\n@page WordSection1\r\n	{size:612.0pt 792.0pt;\r\n	margin:72.0pt 72.0pt 72.0pt 72.0pt;\r\n	mso-header-margin:35.4pt;\r\n	mso-footer-margin:35.4pt;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n /* List Definitions */\r\n @list l0\r\n	{mso-list-id:601913514;\r\n	mso-list-type:hybrid;\r\n	mso-list-template-ids:-1195752714 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}\r\n@list l0:level1\r\n	{mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level2\r\n	{mso-level-number-format:alpha-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level3\r\n	{mso-level-number-format:roman-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:right;\r\n	text-indent:-9.0pt;}\r\n@list l0:level4\r\n	{mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level5\r\n	{mso-level-number-format:alpha-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level6\r\n	{mso-level-number-format:roman-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:right;\r\n	text-indent:-9.0pt;}\r\n@list l0:level7\r\n	{mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level8\r\n	{mso-level-number-format:alpha-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level9\r\n	{mso-level-number-format:roman-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:right;\r\n	text-indent:-9.0pt;}\r\n\r\n-->\r\n</style></p><p class=\"MsoNormal\" style=\"line-height: 15.693333625793457px;\"><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;สำหรับใครที่อยากดูแลสุขภาพให้ดีขึ้นสามารถเริ่มได้ง่าย ๆ ด้วยการมีอาหารเพื่อสุขภาพติดตู้เย็น เพราะเป็นอาหารที่มีประโยชน์ต่อร่างกายและระบบเผาผลาญในร่างกาย ช่วยให้คุณมีสุขภาพที่ดีขึ้นได้ในเวลาไม่นาน<o:p></o:p></span></p>', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.693333625793457px; font-size: 11pt; font-family: Calibri, sans-serif; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; text-decoration: none;\"><span style=\"font-size: 14pt;\">การดูแลสุขภาพสามารถเริ่มได้ง่าย ๆ ที่อาหารด้วยการหันมาเลือกทานอาหารที่มีประโยชน์ต่อร่างกาย หากใครที่กำลังสนใจอยากเริ่มดูแลตัวเองอยู่ วันนี้เราก็จะชวนไปโล๊ะตู้เย็นเก่าให้กลายเป็นตู้เย็นเพื่อสุขภาพกันด้วยการเลือกแต่อาหารที่มีประโยชน์ไว้ในตู้เย็น ส่วนจะมีอะไรบ้างนั้น ไปดูกันเลย</span><br></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.693333625793457px; font-size: 11pt; font-family: Calibri, sans-serif; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; text-decoration: none;\"><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แนะนำ 5 อาหารเพื่อสุขภาพที่คนรักสุขภาพควรมีติดตู้เย็น</span></b><b><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></b></p><p class=\"MsoListParagraphCxSpFirst\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">1.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ไข่</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;เป็นอาหารที่มีโปรตีนสูงและเป็นสารอาหารที่มีประโยชน์ต่อร่างกาย โดยโปรตีนจะช่วยสร้างกล้ามเนื้อและช่วยซ่อมแซมสิ่งที่สึกหรอ เป็นอาหารที่เหมาะสำหรับคนรักสุขภาพหรือคนที่ต้องการสร้างกล้ามเนื้อ ควรทานไม่เกินวันละ&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">2&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฟอง เพราะหากทานมากเกินไปก็อาจส่งผลเสียต่อร่างกายได้</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">2.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ปลาแซลมอน</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;เป็นอาหารที่มีไขมันและอุดมไปด้วยประโยชน์ต่าง ๆ เช่น มีโอเมก้า 3 ที่เป็นสารอาหารที่ดีต่อระบบสมอง ช่วยเร่งระบบการเผาผลาญในร่ายกาย ช่วยให้ระบบเผาผลาญทำงานได้ดีขึ้น เมื่อระบบเผาผลาญทำงานได้ดีขึ้นก็จะส่งผลดีต่อร่างกายด้วยเช่นกัน</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">3.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ผักสด</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;การทานผักสดจะช่วยให้ได้สารอาหารมากที่สุด เพราะหากผ่านขั้นตอนการประกอบอาหารต่าง ๆ จากการทำให้สุกแล้วสารอาหารจะลดลง จึงควรมีผักสดพร้อมทานติดตู้เย็นไว้ เช่น ผักสลัดอย่าง กรีนโอ๊ค (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Green Oak Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">เรดโอ๊ค (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Red Oak Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">เรดคอรัล (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Red Coral Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ร็อกเก็ต (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Rocket Salad),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">กรีนคอส (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Green Cos Lettuce),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฟิลเลย์ไอซ์เบิร์ก (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Frillice Iceberg),&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">บัตเตอร์เฮด (</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">Butterhead Lettuce)</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;ฯลฯ เพราะเป็นผักที่มีกากใยสูง แคลอรี่ต่ำ มีวิตามินสูง และช่วยบำรุงระบบสายตาได้ดี นอกจากนี้ยังมีผักกาดแก้ว</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แครอท มะเขือเทศ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แตงกวา ฯลฯ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">4.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ผลไม้</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;เป็นของที่ไม่ควรปล่อยให้ขาดตู้เย็นเลยเพราะนอกจากจะมีประโยชน์ต่อร่างกายแล้วยังมีแคลอรี่ต่ำอีกด้วย ใน<span>&nbsp;&nbsp;</span>100 กรัม ผลไม้ต่าง ๆ สามารถให้พลังงานได้ดังนี้ มะละกอ ให้พลังงาน 13 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แตงโม ให้พลังงาน 25 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">สตรอว์เบอร์รี ให้พลังงาน 33 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ส้ม ให้พลังงาน 42 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แอปเปิ้ล ให้พลังงาน 52 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">บลูเบอร์รี่ ให้พลังงาน 57 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฝรั่ง ให้พลังงาน 60 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แก้วมังกร ให้พลังงาน 60 แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">กล้วยหอม ให้พลังงาน&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">120&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แคลอรี่</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">,&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">อาโวคาโด ให้พลังงาน&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">160&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">แคลอรี่</span><span lang=\"TH\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">ฯลฯ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:124.5pt\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:\r\n\" angsana=\"\" new\",serif;mso-ascii-theme-font:major-bidi;mso-fareast-font-family:=\"\" \"angsana=\"\" new\";mso-fareast-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;=\"\" mso-bidi-theme-font:major-bidi\"=\"\"><span style=\"mso-list:Ignore\">5.<span style=\"font:7.0pt \" times=\"\" new=\"\" roman\"\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><!--[endif]--><b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">โยเกิร์ต</span></b><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp;ควรเลือกทานโยเกิร์ตสูตรธรรมชาติหรือกรีกโยเกิร์ต เพราะสามารถให้พลังงานได้สูงกว่าโยเกิร์ตแบบทั่วไปมากถึง&nbsp;</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">2&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">เท่า ช่วยให้อยู่ท้อง ไม่หิวบ่อย มีแคลอรี่ต่ำ</span><span lang=\"EN-US\" style=\"font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><o:p></o:p></span></p><p><style class=\"WebKit-mso-list-quirks-style\">\r\n<!--\r\n/* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:\"\";\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:8.0pt;\r\n	margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoHeader, li.MsoHeader, div.MsoHeader\r\n	{mso-style-priority:99;\r\n	mso-style-link:\"Header Char\";\r\n	margin:0cm;\r\n	mso-pagination:widow-orphan;\r\n	tab-stops:center 234.0pt right 468.0pt;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:8.0pt;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-type:export-only;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:0cm;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-type:export-only;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:0cm;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\np.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast\r\n	{mso-style-priority:34;\r\n	mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-type:export-only;\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:8.0pt;\r\n	margin-left:36.0pt;\r\n	mso-add-space:auto;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\nspan.HeaderChar\r\n	{mso-style-name:\"Header Char\";\r\n	mso-style-priority:99;\r\n	mso-style-unhide:no;\r\n	mso-style-locked:yes;\r\n	mso-style-link:Header;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-size:11.0pt;\r\n	mso-ansi-font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:\"Calibri\",sans-serif;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:Calibri;\r\n	mso-fareast-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Cordia New\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-US;}\r\n.MsoPapDefault\r\n	{mso-style-type:export-only;\r\n	margin-bottom:8.0pt;\r\n	line-height:107%;}\r\n@page WordSection1\r\n	{size:612.0pt 792.0pt;\r\n	margin:72.0pt 72.0pt 72.0pt 72.0pt;\r\n	mso-header-margin:35.4pt;\r\n	mso-footer-margin:35.4pt;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n /* List Definitions */\r\n @list l0\r\n	{mso-list-id:601913514;\r\n	mso-list-type:hybrid;\r\n	mso-list-template-ids:-1195752714 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}\r\n@list l0:level1\r\n	{mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level2\r\n	{mso-level-number-format:alpha-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level3\r\n	{mso-level-number-format:roman-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:right;\r\n	text-indent:-9.0pt;}\r\n@list l0:level4\r\n	{mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level5\r\n	{mso-level-number-format:alpha-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level6\r\n	{mso-level-number-format:roman-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:right;\r\n	text-indent:-9.0pt;}\r\n@list l0:level7\r\n	{mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level8\r\n	{mso-level-number-format:alpha-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:left;\r\n	text-indent:-18.0pt;}\r\n@list l0:level9\r\n	{mso-level-number-format:roman-lower;\r\n	mso-level-tab-stop:none;\r\n	mso-level-number-position:right;\r\n	text-indent:-9.0pt;}\r\n\r\n-->\r\n</style></p><p class=\"MsoNormal\" style=\"line-height: 15.693333625793457px;\"><span lang=\"TH\" style=\"font-size: 14pt; line-height: 19.97333335876465px; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;สำหรับใครที่อยากดูแลสุขภาพให้ดีขึ้นสามารถเริ่มได้ง่าย ๆ ด้วยการมีอาหารเพื่อสุขภาพติดตู้เย็น เพราะเป็นอาหารที่มีประโยชน์ต่อร่างกายและระบบเผาผลาญในร่างกาย ช่วยให้คุณมีสุขภาพที่ดีขึ้นได้ในเวลาไม่นาน<o:p></o:p></span></p>', '2020-11-10', '2020-11-10 07:56:18', '2020-12-01 11:32:04');
INSERT INTO `tb_blog` (`blog_id`, `blog_banner_image`, `blog_cover_image`, `blog_topic_th`, `blog_topic_en`, `blog_content_th`, `blog_content_en`, `blog_date`, `created_at`, `updated_at`) VALUES
(5, 'image/blog/image_blog_qThUWlhoWD8s.jpg', 'image/blog/image_blog_5OgPdJdvCA6v.jpg', '5 เคล็ดลับปั้นหุ่นสวยใน 4 สัปดาห์', '5 เคล็ดลับปั้นหุ่นสวยใน 4 สัปดาห์', '<p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;\"=\"\"><span lang=\"TH\" style=\"font-size: 14pt; color: rgb(34, 34, 34);\">การมีสุขภาพที่ดีและรูปร่างที่สมบูรณ์แบบ คือสุดยอดความปรารถนาของสุภาพสตรีแทบทุกท่านเลยก็ว่าได้ ซึ่งในบางครั้ง บทความลดน้ำหนักหรือ&nbsp;</span><span lang=\"EN-US\" style=\"font-size: 14pt; color: rgb(34, 34, 34);\">How to&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; color: rgb(34, 34, 34);\">ต่าง ๆ อาจไม่ใช่วิธีที่เหมาะสมกับทุกคนเสมอไป อาจต้องปรับเปลี่ยน หรือเลือกวิธีการที่เหมาะกับตนเอง และถูกต้องตามหลักของการดูแลสุขภาพ เพื่อสร้างรูปร่างที่ดูดีได้ในระยะยาว ไม่กลับมาอ้วนซ้ำ</span><br></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เคล็ดลับง่าย ๆ ในการปั้นหุ่นสวยนั้นมีไม่มาก หลัก ๆ ก็คือการเน้นหนักไปทางโภชนาการและควบคุมอาหารถึง&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">80</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">%&nbsp;</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ในขณะที่อีก&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">20</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">%</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">&nbsp;ที่เหลือนั้น เน้นไปทางการออกกำลังกายเพียงสัปดาห์ละไม่กี่วัน ตามรายละเอียดดังนี้</span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">1</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">พักผ่อนให้เพียงพอ</span></b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">การพักผ่อนให้เพียงพอ คือปัจจัยสำคัญอีกประการหนึ่งของการสร้างหุ่นสวยสุขภาพดี เพราะการนอนหลับพักผ่อนหลัง&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">22</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">:</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">00&nbsp;</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">น.นั้น จะส่งผลให้การซ่อมแซมตัวเองของร่างกายถูกขัดจังหวะ การทำงานของอวัยวะสำคัญต่าง ๆ รวนและไม่เป็นระบบ ทำให้เกิดการหิวโหยช่วงดึก ๆ และยิ่งถ้าเผลอรับประทานมื้อดึกลงไปแล้ว ก็จะยิ่งย่อยยากและทำให้กระเพราะอาหารทำงานหนักขึ้นอีกด้วย</span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">2</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ปรับพฤติกรรมการใช้ชีวิต</span></b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ควรเปลี่ยนตารางเวลาในการใช้ชีวิต ให้เหมือนช่วงที่เราเคยเป็นเด็ก เพราะจะส่งผลดีต่อสุขภาพกับรูปร่างมากที่สุด อาทิ ตื่นแต่เช้าตรู่ กินอาหารให้ตรงเวลา และเข้านอนแต่หัวค่ำ ถ้าหากทำได้ตามนี้ทั้งหมด ไม่เกิน&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">4&nbsp;</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">สัปดาห์ คุณจะเห็นผลลัพธ์ที่ดีขึ้นได้อย่างแน่นอน</span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">3</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ปรับพฤติกรรมในการกิน</span></b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เน้นการรับประทานอาหารที่เป็นประโยชน์ต่อร่างกาย โดยเลือกทานผักสด และผลไม้เป็นหลัก เลือกโปรตีนจากธัญพืชและไขมันดีจากไข่แดง ประกอบอาหารด้วยวิธีต้ม นึ่ง ตุ๋นเป็นหลัก หากไม่สะดวก ก็ใช้บริการเดลิเวอรีจากร้านอาหารแนวสุขภาพต่าง ๆ ที่มีอยุ่มากมายให้เลือกสั่งซื้อ ถ้าทำได้ตามนี้แล้ว หุ่นสวยที่คุณปรารถนาก็ไม่ไกลเกินเอื้อมอีกแล้วค่ะ</span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">4</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เลือกวิธีออกกำลังกายที่ได้ผลกับตนเอง</span></b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ร่างกายของแต่ละคน เหมาะกับการออกกำลังกายคนละแบบ ก่อนจะเลือกวิธีใดวิธีหนึ่ง ควรปรึกษาโค้ชที่เชื่อถือได้ตามสปอร์ตคลับ อย่าลองผิดลองถูกด้วยตนเอง เพราะอาจส่งผลเสียต่อร่างกายได้</span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">5</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span></b><b><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">คิดแต่สิ่งดี ๆ ลดความเครียดและวางเรื่องหนัก ๆ ลง</span></b><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">การคิดดีจะทำให้ใจเบาสบาย และร่างกายไม่ต้องหลั่งสารที่เป็นพลังงานในด้านลบ ทั้งนี้ เพราะความเครียดส่งผลต่อระบบประสาท จนในบางครั้งอาจสั่งให้เรารับประทานอาหารหวานจัดหรือรสจัดมากขึ้นจนเกินความพอดี ทำให้เกิดการสะสมของโคเรสเตอรอล ไขมัน และมีปริมาณโซเดียมมากขึ้นจนทำให้ร่างกายเกิดอาการบวมน้ำได้ในที่สุด</span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><br></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt; font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เพียงเท่านี้ สุขภาพที่ดีและหุ่นสวยที่เพอร์เฟคก็จะอยู่คู่กับเราได้นาน โดยไม่กลับมาล้มเหลวซ้ำแล้วซ้ำเล่า แถมยังกลับมาสวมใส่เสื้อผ้าเก่า ๆ และใช้ชีวิตด้วยความมั่นใจในทุก ๆ วันได้อีกด้วยนะ</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p>', '<p angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"font-size: 14pt; color: rgb(34, 34, 34);\">การมีสุขภาพที่ดีและรูปร่างที่สมบูรณ์แบบ คือสุดยอดความปรารถนาของสุภาพสตรีแทบทุกท่านเลยก็ว่าได้ ซึ่งในบางครั้ง บทความลดน้ำหนักหรือ&nbsp;</span><span lang=\"EN-US\" style=\"font-size: 14pt; color: rgb(34, 34, 34);\">How to&nbsp;</span><span lang=\"TH\" style=\"font-size: 14pt; color: rgb(34, 34, 34);\">ต่าง ๆ อาจไม่ใช่วิธีที่เหมาะสมกับทุกคนเสมอไป อาจต้องปรับเปลี่ยน หรือเลือกวิธีการที่เหมาะกับตนเอง และถูกต้องตามหลักของการดูแลสุขภาพ เพื่อสร้างรูปร่างที่ดูดีได้ในระยะยาว ไม่กลับมาอ้วนซ้ำ</span><br></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เคล็ดลับง่าย ๆ ในการปั้นหุ่นสวยนั้นมีไม่มาก หลัก ๆ ก็คือการเน้นหนักไปทางโภชนาการและควบคุมอาหารถึง&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">80</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">%&nbsp;</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ในขณะที่อีก&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">20</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">%</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">&nbsp;ที่เหลือนั้น เน้นไปทางการออกกำลังกายเพียงสัปดาห์ละไม่กี่วัน ตามรายละเอียดดังนี้</span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">1</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">พักผ่อนให้เพียงพอ</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">การพักผ่อนให้เพียงพอ คือปัจจัยสำคัญอีกประการหนึ่งของการสร้างหุ่นสวยสุขภาพดี เพราะการนอนหลับพักผ่อนหลัง&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">22</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">:</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">00&nbsp;</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">น.นั้น จะส่งผลให้การซ่อมแซมตัวเองของร่างกายถูกขัดจังหวะ การทำงานของอวัยวะสำคัญต่าง ๆ รวนและไม่เป็นระบบ ทำให้เกิดการหิวโหยช่วงดึก ๆ และยิ่งถ้าเผลอรับประทานมื้อดึกลงไปแล้ว ก็จะยิ่งย่อยยากและทำให้กระเพราะอาหารทำงานหนักขึ้นอีกด้วย</span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">2</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ปรับพฤติกรรมการใช้ชีวิต</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ควรเปลี่ยนตารางเวลาในการใช้ชีวิต ให้เหมือนช่วงที่เราเคยเป็นเด็ก เพราะจะส่งผลดีต่อสุขภาพกับรูปร่างมากที่สุด อาทิ ตื่นแต่เช้าตรู่ กินอาหารให้ตรงเวลา และเข้านอนแต่หัวค่ำ ถ้าหากทำได้ตามนี้ทั้งหมด ไม่เกิน&nbsp;</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">4&nbsp;</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">สัปดาห์ คุณจะเห็นผลลัพธ์ที่ดีขึ้นได้อย่างแน่นอน</span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">3</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ปรับพฤติกรรมในการกิน</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เน้นการรับประทานอาหารที่เป็นประโยชน์ต่อร่างกาย โดยเลือกทานผักสด และผลไม้เป็นหลัก เลือกโปรตีนจากธัญพืชและไขมันดีจากไข่แดง ประกอบอาหารด้วยวิธีต้ม นึ่ง ตุ๋นเป็นหลัก หากไม่สะดวก ก็ใช้บริการเดลิเวอรีจากร้านอาหารแนวสุขภาพต่าง ๆ ที่มีอยุ่มากมายให้เลือกสั่งซื้อ ถ้าทำได้ตามนี้แล้ว หุ่นสวยที่คุณปรารถนาก็ไม่ไกลเกินเอื้อมอีกแล้วค่ะ</span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">4</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เลือกวิธีออกกำลังกายที่ได้ผลกับตนเอง</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">ร่างกายของแต่ละคน เหมาะกับการออกกำลังกายคนละแบบ ก่อนจะเลือกวิธีใดวิธีหนึ่ง ควรปรึกษาโค้ชที่เชื่อถือได้ตามสปอร์ตคลับ อย่าลองผิดลองถูกด้วยตนเอง เพราะอาจส่งผลเสียต่อร่างกายได้</span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\">5</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">.</span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">คิดแต่สิ่งดี ๆ ลดความเครียดและวางเรื่องหนัก ๆ ลง</span><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><br></span><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">การคิดดีจะทำให้ใจเบาสบาย และร่างกายไม่ต้องหลั่งสารที่เป็นพลังงานในด้านลบ ทั้งนี้ เพราะความเครียดส่งผลต่อระบบประสาท จนในบางครั้งอาจสั่งให้เรารับประทานอาหารหวานจัดหรือรสจัดมากขึ้นจนเกินความพอดี ทำให้เกิดการสะสมของโคเรสเตอรอล ไขมัน และมีปริมาณโซเดียมมากขึ้นจนทำให้ร่างกายเกิดอาการบวมน้ำได้ในที่สุด</span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><br></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34);\"><o:p></o:p></span></p><p angsana=\"\" new\",=\"\" serif;=\"\" text-indent:=\"\" 36pt;\"=\"\" style=\"margin-right: 0cm; margin-left: 0cm; font-size: 14pt;\"><span lang=\"TH\" style=\"color: rgb(34, 34, 34);\">เพียงเท่านี้ สุขภาพที่ดีและหุ่นสวยที่เพอร์เฟคก็จะอยู่คู่กับเราได้นาน โดยไม่กลับมาล้มเหลวซ้ำแล้วซ้ำเล่า แถมยังกลับมาสวมใส่เสื้อผ้าเก่า ๆ และใช้ชีวิตด้วยความมั่นใจในทุก ๆ วันได้อีกด้วยนะ</span></p>', '2020-11-16', '2020-11-13 10:16:48', '2020-12-01 11:10:00'),
(6, 'image/blog/image_blog_sdcguu2DNRSO.jpg', 'image/blog/image_blog_C3qI2HhYFP0h.jpg', 'ไขข้อข้องใจทานก็น้อยแต่ทำไมยังอ้วนกับ 4 สาเหตุใกล้ตัวที่คุณคาดไม่ถึง', 'ไขข้อข้องใจทานก็น้อยแต่ทำไมยังอ้วนกับ 4 สาเหตุใกล้ตัวที่คุณคาดไม่ถึง', '<p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ปัญหาโลกแตกของผู้ที่กำลังอยู่ในช่วงลดน้ำหนักคุมอาหาร ทานน้อยก็แล้ว ลดมื้ออาหารก็แล้ว นับแคลอรีก็แล้ว แต่น้ำหนักก็ยังขึ้นอย่างไม่มีทีท่าว่าจะลงเอาเสียเลย ทำเอาเสียความตั้งใจแถมหมดกำลังใจไปตาม ๆ กัน วันนี้เราจึงนำสาระความรู้ดี ๆ มาฝาก ไขข้อข้องใจทลายความสงสัยว่าทำไมทานน้อยแต่ยังอ้วน เพื่อสร้างความเข้าใจที่ถูกต้อง ต่อยอดไปสู่การลดน้ำหนักที่ถูกทาง สร้างหุ่นสวยสุขภาพดีได้ง่าย ๆ เพียงรู้อย่างเข้าใจ</span><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\"><br></span><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  1. ฮอร์โมน \r\n\r\n                  ฮอร์โมน คือ ปัจจัยสำคัญประการแรกที่มีส่วนต่อหุ่นสวยสุขภาพดีของคุณ เพราะฮอร์โมนจะเป็นหัวใจหลักในการกำหนดรูปร่างของแต่ละบุคคล อาการอยากอาหารอย่างไร้สาเหตุในวันที่คุณมีอาการเครียด หรือยามบ่ายที่รู้สึกว่าร่างกายขาดหวาน แล้วต้องเป็นงานหาของหวานเข้าปากเพื่อให้คลายความอยากนั้น หรือบางวันที่คุณทานอะไรก็อร่อย รู้สึกสนุก เพลิดเพลินมีความสุขที่ได้ทาน เจริญอาหารเกินไปแบบไม่รู้ตัว สิ่งเหล่านี้ล้วนมีผลมาจากฮอร์โมนทั้งสิ้น และฮอร์โมนที่มีส่วนเกี่ยวข้องกับอาการเหล่านี้ ก็คือ\r\n\r\nฮอร์โมนเลปติน (Leptin Hormone) ที่ทำหน้าที่ควบคุมความอยากอาหาร ผลิตจากเซลล์ไขมัน ซึ่งหากใครมีไขมันส่วนเกินในร่างกายที่เยอะเกินไปอาจก่อให้เกิดภาวะต้านเลปติน แต่ก็สามารถปรับสมดุลให้กับร่างกายได้ด้วยการหันมาทานอาหารที่มีประโยชน์ และหมั่นออกกำลังกายอยู่เสมอ\r\n\r\nฮอร์โมนคอร์ติซอล (Cortisol Hormone) ความเครียดที่เกิดจะถูกฮอร์โมนตัวนี้ควบคุมดูแล สังเกตในวันที่ร่างกายเกิดความเครียด หรืออ่อนล้า อาหารอยากทานของหวาน ร่างกายต้องการแป้งและน้ำตาล มาฟื้นฟูร่างกายให้สดชื่นพร้อมต่อสู้กับปัญหา ซึ่งเบื้องหลังการปรับตัวเพื่อเอาตัวรอดนี้ ก็มาจากฮอร์โมนคอร์ติซอลนี้นั่นเอง เท่ากับว่า ถ้าคุณยิ่งเครียด ร่างกายจะยิ่งเรียกหาของหวานตัวการที่ทำให้อ้วนนั่นเองปัญหาโลกแตกของผู้ที่กำลังอยู่ในช่วงลดน้ำหนักคุมอาหาร ทานน้อยก็แล้ว ลดมื้ออาหารก็แล้ว นับแคลอรีก็แล้ว แต่น้ำหนักก็ยังขึ้นอย่างไม่มีทีท่าว่าจะลงเอาเสียเลย ทำเอาเสียความตั้งใจแถมหมดกำลังใจไปตาม ๆ กัน วันนี้เราจึงนำสาระความรู้ดี ๆ มาฝาก ไขข้อข้องใจทลายความสงสัยว่าทำไมทานน้อยแต่ยังอ้วน เพื่อสร้างความเข้าใจที่ถูกต้อง ต่อยอดไปสู่การลดน้ำหนักที่ถูกทาง สร้างหุ่นสวยสุขภาพดีได้ง่าย ๆ เพียงรู้อย่างเข้าใจ  \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n                  1. ฮอร์โมน \r\n\r\n\r\n\r\n                  ฮอร์โมน คือ ปัจจัยสำคัญประการแรกที่มีส่วนต่อหุ่นสวยสุขภาพดีของคุณ เพราะฮอร์โมนจะเป็นหัวใจหลักในการกำหนดรูปร่างของแต่ละบุคคล อาการอยากอาหารอย่างไร้สาเหตุในวันที่คุณมีอาการเครียด หรือยามบ่ายที่รู้สึกว่าร่างกา</p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">&nbsp;&nbsp;1.&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">ฮอร์โมน</span><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">&nbsp;</span><span style=\"box-sizing: inherit; line-height: 16.1px;\"><o:p style=\"box-sizing: inherit;\"></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">ฮอร์โมน คือ ปัจจัยสำคัญประการแรกที่มีส่วนต่อหุ่นสวยสุขภาพดีของคุณ เพราะฮอร์โมนจะเป็นหัวใจหลักในการกำหนดรูปร่างของแต่ละบุคคล อาการอยากอาหารอย่างไร้สาเหตุในวันที่คุณมีอาการเครียด หรือยามบ่ายที่รู้สึกว่าร่างกายขาดหวาน แล้วต้องเป็นงานหาของหวานเข้าปากเพื่อให้คลายความอยากนั้น หรือบางวันที่คุณทานอะไรก็อร่อย รู้สึกสนุก เพลิดเพลินมีความสุขที่ได้ทาน เจริญอาหารเกินไปแบบไม่รู้ตัว สิ่งเหล่านี้ล้วนมีผลมาจากฮอร์โมนทั้งสิ้น และฮอร์โมนที่มีส่วนเกี่ยวข้องกับอาการเหล่านี้ ก็คือ</span><span style=\"box-sizing: inherit; line-height: 16.1px;\"><o:p style=\"box-sizing: inherit;\"></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">ฮอร์โมนเลปติน (</span><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">Leptin Hormone)&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">ที่ทำหน้าที่ควบคุมความอยากอาหาร ผลิตจากเซลล์ไขมัน ซึ่งหากใครมีไขมันส่วนเกินในร่างกายที่เยอะเกินไปอาจก่อให้เกิดภาวะต้านเลปติน แต่ก็สามารถปรับสมดุลให้กับร่างกายได้ด้วยการหันมาทานอาหารที่มีประโยชน์ และหมั่นออกกำลังกายอยู่เสมอ</span><span style=\"box-sizing: inherit; line-height: 16.1px;\"><o:p style=\"box-sizing: inherit;\"></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">ฮอร์โมนคอร์ติซอล (</span><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">Cortisol Hormone)&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"box-sizing: inherit; line-height: 16.1px;\">ความเครียดที่เกิดจะถูกฮอร์โมนตัวนี้ควบคุมดูแล สังเกตในวันที่ร่างกายเกิดความเครียด หรืออ่อนล้า อาหารอยากทานของหวาน ร่างกายต้องการแป้งและน้ำตาล มาฟื้นฟูร่างกายให้สดชื่นพร้อมต่อสู้กับปัญหา ซึ่งเบื้องหลังการปรับตัวเพื่อเอาตัวรอดนี้ ก็มาจากฮอร์โมนคอร์ติซอลนี้นั่นเอง เท่ากับว่า ถ้าคุณยิ่งเครียด ร่างกายจะยิ่งเรียกหาของหวานตัวการที่ทำให้อ้วนนั่นเอง</span><span style=\"box-sizing: inherit; line-height: 16.1px;\"><o:p style=\"box-sizing: inherit;\"></o:p></span>ปัญหาโลกแตกของผู้ที่กำลังอยู่ในช่วงลดน้ำหนักคุมอาหาร ทานน้อยก็แล้ว ลดมื้ออาหารก็แล้ว นับแคลอรีก็แล้ว แต่น้ำหนักก็ยังขึ้นอย่างไม่มีทีท่าว่าจะลงเอาเสียเลย ทำเอาเสียความตั้งใจแถมหมดกำลังใจไปตาม ๆ กัน วันนี้เราจึงนำสาระความรู้ดี ๆ มาฝาก ไขข้อข้องใจทลายความสงสัยว่าทำไมทานน้อยแต่ยังอ้วน เพื่อสร้างความเข้าใจที่ถูกต้อง ต่อยอดไปสู่การลดน้ำหนักที่ถูกทาง สร้างหุ่นสวยสุขภาพดีได้ง่าย ๆ เพียงรู้อย่างเข้าใจ&nbsp;&nbsp;</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit;\"></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit;\"></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit;\"></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit;\"></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1. ฮอร์โมน&nbsp;</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit;\"></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"box-sizing: inherit; margin: 0cm; overflow: hidden; line-height: 18.4px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ฮอร์โมน คือ ปัจจัยสำคัญประการแรกที่มีส่วนต่อหุ่นสวยสุขภาพดีของคุณ เพราะฮอร์โมนจะเป็นหัวใจหลักในการกำหนดรูปร่างของแต่ละบุคคล อาการอยากอาหารอย่างไร้สาเหตุในวันที่คุณมีอาการเครียด หรือยามบ่ายที่รู้สึกว่าร่างกา</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">ยขาดหวาน แล้วต้องเป็นงานหาของหวานเข้าปากเพื่อให้คลายความอยากนั้น หรือบางวันที่คุณทานอะไรก็อร่อย รู้สึกสนุก เพลิดเพลินมีความสุขที่ได้ทาน เจริญอาหารเกินไปแบบไม่รู้ตัว สิ่งเหล่านี้ล้วนมีผลมาจากฮอร์โมนทั้งสิ้น และฮอร์โมนที่มีส่วนเกี่ยวข้องกับอาการเหล่านี้ ก็คือ</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">ฮอร์โมนเลปติน (Leptin Hormone) ที่ทำหน้าที่ควบคุมความอยากอาหาร ผลิตจากเซลล์ไขมัน ซึ่งหากใครมีไขมันส่วนเกินในร่างกายที่เยอะเกินไปอาจก่อให้เกิดภาวะต้านเลปติน แต่ก็สามารถปรับสมดุลให้กับร่างกายได้ด้วยการหันมาทานอาหารที่มีประโยชน์ และหมั่นออกกำลังกายอยู่เสมอ</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">ฮอร์โมนคอร์ติซอล (Cortisol Hormone) ความเครียดที่เกิดจะถูกฮอร์โมนตัวนี้ควบคุมดูแล สังเกตในวันที่ร่างกายเกิดความเครียด หรืออ่อนล้า อาหารอยากทานของหวาน ร่างกายต้องการแป้งและน้ำตาล มาฟื้นฟูร่างกายให้สดชื่นพร้อมต่อสู้กับปัญหา ซึ่งเบื้องหลังการปรับตัวเพื่อเอาตัวรอดนี้ ก็มาจากฮอร์โมนคอร์ติซอลนี้นั่นเอง เท่ากับว่า ถ้าคุณยิ่งเครียด ร่างกายจะยิ่งเรียกหาของหวานตัวการที่ทำให้อ้วนนั่นเอง</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2. พันธุกรรม</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; สิ่งที่ถ่ายทอดจากรุ่นสู่รุ่น จากบรรพบุรุษสู่ลูกหลาน ซึ่งไม่เพียงแค่ลักษณะรูปร่างหน้าตาเท่านั้น ระบบการทำงานภายในร่างกายก็ยังถ่ายทอดตามมาอีกด้วย อาทิ พ่อแม่ที่มีกลไกการทำงานการเผาผลาญของร่างกายช้า ซึ่งส่งผลให้ร่างกายเผาผลาญอาหารออกจากร่างกายได้ไม่ค่อยดีนัก จึงทำให้ถึงแม้ทานน้อยแต่ก็ยังอ้วนได้ ซึ่งกลไกการทำงานของร่างกายเหล่านี้ก็จะถูกถ่ายทอดมายังลูกของคุณด้วย ดังนั้น ใครที่มีพันธุกรรมเช่นนี้ และไม่อยากมีหุ่นหมีรูปร่างอ้วนท้วนเหมือนสมาชิกในบ้าน ก็ควรหมั่นดูแลร่างกายตัวเองให้ดี ทั้งเลือกทานอาหารที่ถูกสุขลักษณะ และออกกำลังกายควบคู่กันไปด้วย</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3. โซเดียมแฝงในอาหาร</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; โซเดียมที่แฝงอยู่ในอาหารต่าง ๆ รอบตัว ไม่ว่าจะเป็นอาหารฟาสต์ฟู้ด ของหมักดอง น้ำซุปสุกี้หรือก๋วยเตี๋ยว หรืออาหารแช่แข็งตามร้านสะดวกซื้อล้วนแต่อุดมไปด้วยโซเดียมด้วยกันทั้งสิ้น ซึ่งหากร่างกายได้รับโซเดียมมากเกินไป จะส่งผลให้ร่างกายมีอาการบวมน้ำ ทานน้อยหรือออกกำลังกายอย่างไรก็ไม่สามารถมีรูปร่างที่ผอมได้</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 4. การใช้ชีวิตประจำวันที่ไม่เหมาะสม</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; อาการร่างพัง ผลพวงจากการดำเนินชีวิตอย่างไม่ใส่ใจดูแลตัวเอง ทำงานหนัก นอนน้อยเป็นประจำ หรือแม้แต่ทานอาหารไม่เป็นเวลา อดอาหาร ทานน้อยแบบไม่ถูกสุขลักษณะ และความเข้าใจเรื่องการควบคุมอาหารอย่างถูกต้อง ส่งผลให้ร่างกายทำงานผิดปกติ ระบบรวน ฮอร์โมนเปลี่ยน เผาผลาญได้ช้า เรียกได้ว่าเข้าสู่อาการร่างพัง ซึ่งปัจจัยเหล่านี้ส่งผลโดยตรงต่อน้ำหนักของคุณ สาเหตุก็มาจากเจ้าร่างกายเข้าสู่ภาวะอ่อนแอ ทำให้เจ้าฮอร์โมนคอร์ติซอลถูกเรียกใช้งานมากกว่าปกตินั่นเอง</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; มาถึงตรงนี้คงพอไขข้อข้องใจได้แล้วว่า ทานก็น้อยแต่ทำไมยังอ้วนอยู่ดี เพราะปัจจัยเรื่องน้ำหนักไม่ได้ขึ้นอยู่กับการคุมอาหารเพียงอย่างเดียว ยังมีปัจจัยแวดล้อมเหล่านี้เป็นส่วนประกอบสำคัญในการสร้างหุ่นสวยสุขภาพดีให้กับคุณเช่นกัน รู้แบบนี้แล้วหันมาสังเกตตัวเอง และดูแลตัวเองอย่างถูกวิธีในแบบของคุณ เพราะสุขภาพที่ดีหาซื้อไม่ได้ ความใส่ใจเท่านั้นที่จะทำให้คุณกลับมามีรูปร่างที่ดีดังเดิม</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp;</p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\">&nbsp;</p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;</span><span lang=\"TH\" style=\"line-height: 16.1px;\" angsana=\"\" new\",=\"\" serif;\"=\"\">พันธุกรรม</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: \" angsana=\"\" new\",=\"\" serif;=\"\" font-size:=\"\" 10.5pt;\"=\"\">สิ่งที่ถ่ายทอดจากรุ่นสู่รุ่น จากบรรพบุรุษสู่ลูกหลาน ซึ่งไม่เพียงแค่ลักษณะรูปร่างหน้าตาเท่านั้น ระบบการทำงานภายในร่างกายก็ยังถ่ายทอดตามมาอีกด้วย อาทิ พ่อแม่ที่มีกลไกการทำงานการเผาผลาญของร่างกายช้า ซึ่งส่งผลให้ร่างกายเผาผลาญอาหารออกจากร่างกายได้ไม่ค่อยดีนัก จึงทำให้ถึงแม้ทานน้อยแต่ก็ยังอ้วนได้ ซึ่งกลไกการทำงานของร่างกายเหล่านี้ก็จะถูกถ่ายทอดมายังลูกของคุณด้วย ดังนั้น ใครที่มีพันธุกรรมเช่นนี้ และไม่อยากมีหุ่นหมีรูปร่างอ้วนท้วนเหมือนสมาชิกในบ้าน ก็ควรหมั่นดูแลร่างกายตัวเองให้ดี ทั้งเลือกทานอาหารที่ถูกสุขลักษณะ และออกกำลังกายควบคู่กันไปด้วย</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\" style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">3.&nbsp;</span><span lang=\"TH\" style=\"line-height: 16.1px;\" angsana=\"\" new\",=\"\" serif;\"=\"\">โซเดียมแฝงในอาหาร</span><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang=\"TH\" style=\"line-height: 16.1px;\" angsana=\"\" new\",=\"\" serif;\"=\"\">โซเดียมที่แฝงอยู่ในอาหารต่าง ๆ รอบตัว ไม่ว่าจะเป็นอาหารฟาสต์ฟู้ด ของหมักดอง น้ำซุปสุกี้หรือก๋วยเตี๋ยว หรืออาหารแช่แข็งตามร้านสะดวกซื้อล้วนแต่อุดมไปด้วยโซเดียมด้วยกันทั้งสิ้น ซึ่งหากร่างกายได้รับโซเดียมมากเกินไป จะส่งผลให้ร่างกายมีอาการบวมน้ำ ทานน้อยหรือออกกำลังกายอย่างไรก็ไม่สามารถมีรูปร่างที่ผอมได้</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;</span><span lang=\"TH\" style=\"line-height: 16.1px;\" angsana=\"\" new\",=\"\" serif;\"=\"\">การใช้ชีวิตประจำวันที่ไม่เหมาะสม</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang=\"TH\" style=\"line-height: 16.1px;\" angsana=\"\" new\",=\"\" serif;\"=\"\">อาการร่างพัง ผลพวงจากการดำเนินชีวิตอย่างไม่ใส่ใจดูแลตัวเอง ทำงานหนัก นอนน้อยเป็นประจำ หรือแม้แต่ทานอาหารไม่เป็นเวลา อดอาหาร ทานน้อยแบบไม่ถูกสุขลักษณะ และความเข้าใจเรื่องการควบคุมอาหารอย่างถูกต้อง ส่งผลให้ร่างกายทำงานผิดปกติ ระบบรวน ฮอร์โมนเปลี่ยน เผาผลาญได้ช้า เรียกได้ว่าเข้าสู่อาการร่างพัง ซึ่งปัจจัยเหล่านี้ส่งผลโดยตรงต่อน้ำหนักของคุณ สาเหตุก็มาจากเจ้าร่างกายเข้าสู่ภาวะอ่อนแอ ทำให้เจ้าฮอร์โมนคอร์ติซอลถูกเรียกใช้งานมากกว่าปกตินั่นเอง</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\"><span style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"TH\" style=\"line-height: 16.1px;\" angsana=\"\" new\",=\"\" serif;\"=\"\">มาถึงตรงนี้คงพอไขข้อข้องใจได้แล้วว่า ทานก็น้อยแต่ทำไมยังอ้วนอยู่ดี เพราะปัจจัยเรื่องน้ำหนักไม่ได้ขึ้นอยู่กับการคุมอาหารเพียงอย่างเดียว ยังมีปัจจัยแวดล้อมเหล่านี้เป็นส่วนประกอบสำคัญในการสร้างหุ่นสวยสุขภาพดีให้กับคุณเช่นกัน รู้แบบนี้แล้วหันมาสังเกตตัวเอง และดูแลตัวเองอย่างถูกวิธีในแบบของคุณ เพราะสุขภาพที่ดีหาซื้อไม่ได้ ความใส่ใจเท่านั้นที่จะทำให้คุณกลับมามีรูปร่างที่ดีดังเดิม</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 18.4px;\"><span lang=\"EN-US\" style=\"line-height: 16.1px;\" helvetica=\"\" neue\";\"=\"\">&nbsp;</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" style=\"\">&nbsp;</span></p>', '<p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ปัญหาโลกแตกของผู้ที่กำลังอยู่ในช่วงลดน้ำหนักคุมอาหาร ทานน้อยก็แล้ว ลดมื้ออาหารก็แล้ว นับแคลอรีก็แล้ว แต่น้ำหนักก็ยังขึ้นอย่างไม่มีทีท่าว่าจะลงเอาเสียเลย ทำเอาเสียความตั้งใจแถมหมดกำลังใจไปตาม ๆ กัน วันนี้เราจึงนำสาระความรู้ดี ๆ มาฝาก ไขข้อข้องใจทลายความสงสัยว่าทำไมทานน้อยแต่ยังอ้วน เพื่อสร้างความเข้าใจที่ถูกต้อง ต่อยอดไปสู่การลดน้ำหนักที่ถูกทาง สร้างหุ่นสวยสุขภาพดีได้ง่าย ๆ เพียงรู้อย่างเข้าใจ</span><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\"><br></span><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"font-family: \" arial=\"\" black\";=\"\" font-size:=\"\" 0.875em;\"=\"\">&nbsp; 1. ฮอร์โมน&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ฮอร์โมน คือ ปัจจัยสำคัญประการแรกที่มีส่วนต่อหุ่นสวยสุขภาพดีของคุณ เพราะฮอร์โมนจะเป็นหัวใจหลักในการกำหนดรูปร่างของแต่ละบุคคล อาการอยากอาหารอย่างไร้สาเหตุในวันที่คุณมีอาการเครียด หรือยามบ่ายที่รู้สึกว่าร่างกายขาดหวาน แล้วต้องเป็นงานหาของหวานเข้าปากเพื่อให้คลายความอยากนั้น หรือบางวันที่คุณทานอะไรก็อร่อย รู้สึกสนุก เพลิดเพลินมีความสุขที่ได้ทาน เจริญอาหารเกินไปแบบไม่รู้ตัว สิ่งเหล่านี้ล้วนมีผลมาจากฮอร์โมนทั้งสิ้น และฮอร์โมนที่มีส่วนเกี่ยวข้องกับอาการเหล่านี้ ก็คือ</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ฮอร์โมนเลปติน (</span><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">Leptin Hormone)&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ที่ทำหน้าที่ควบคุมความอยากอาหาร ผลิตจากเซลล์ไขมัน ซึ่งหากใครมีไขมันส่วนเกินในร่างกายที่เยอะเกินไปอาจก่อให้เกิดภาวะต้านเลปติน แต่ก็สามารถปรับสมดุลให้กับร่างกายได้ด้วยการหันมาทานอาหารที่มีประโยชน์ และหมั่นออกกำลังกายอยู่เสมอ</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ฮอร์โมนคอร์ติซอล (</span><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">Cortisol Hormone)&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">ความเครียดที่เกิดจะถูกฮอร์โมนตัวนี้ควบคุมดูแล สังเกตในวันที่ร่างกายเกิดความเครียด หรืออ่อนล้า อาหารอยากทานของหวาน ร่างกายต้องการแป้งและน้ำตาล มาฟื้นฟูร่างกายให้สดชื่นพร้อมต่อสู้กับปัญหา ซึ่งเบื้องหลังการปรับตัวเพื่อเอาตัวรอดนี้ ก็มาจากฮอร์โมนคอร์ติซอลนี้นั่นเอง เท่ากับว่า ถ้าคุณยิ่งเครียด ร่างกายจะยิ่งเรียกหาของหวานตัวการที่ทำให้อ้วนนั่นเอง</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">พันธุกรรม</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span angsana=\"\" new\",=\"\" serif;=\"\" font-size:=\"\" 10.5pt;\"=\"\">สิ่งที่ถ่ายทอดจากรุ่นสู่รุ่น จากบรรพบุรุษสู่ลูกหลาน ซึ่งไม่เพียงแค่ลักษณะรูปร่างหน้าตาเท่านั้น ระบบการทำงานภายในร่างกายก็ยังถ่ายทอดตามมาอีกด้วย อาทิ พ่อแม่ที่มีกลไกการทำงานการเผาผลาญของร่างกายช้า ซึ่งส่งผลให้ร่างกายเผาผลาญอาหารออกจากร่างกายได้ไม่ค่อยดีนัก จึงทำให้ถึงแม้ทานน้อยแต่ก็ยังอ้วนได้ ซึ่งกลไกการทำงานของร่างกายเหล่านี้ก็จะถูกถ่ายทอดมายังลูกของคุณด้วย ดังนั้น ใครที่มีพันธุกรรมเช่นนี้ และไม่อยากมีหุ่นหมีรูปร่างอ้วนท้วนเหมือนสมาชิกในบ้าน ก็ควรหมั่นดูแลร่างกายตัวเองให้ดี ทั้งเลือกทานอาหารที่ถูกสุขลักษณะ และออกกำลังกายควบคู่กันไปด้วย</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">3.&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">โซเดียมแฝงในอาหาร</span><br></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">โซเดียมที่แฝงอยู่ในอาหารต่าง ๆ รอบตัว ไม่ว่าจะเป็นอาหารฟาสต์ฟู้ด ของหมักดอง น้ำซุปสุกี้หรือก๋วยเตี๋ยว หรืออาหารแช่แข็งตามร้านสะดวกซื้อล้วนแต่อุดมไปด้วยโซเดียมด้วยกันทั้งสิ้น ซึ่งหากร่างกายได้รับโซเดียมมากเกินไป จะส่งผลให้ร่างกายมีอาการบวมน้ำ ทานน้อยหรือออกกำลังกายอย่างไรก็ไม่สามารถมีรูปร่างที่ผอมได้</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">การใช้ชีวิตประจำวันที่ไม่เหมาะสม</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">อาการร่างพัง ผลพวงจากการดำเนินชีวิตอย่างไม่ใส่ใจดูแลตัวเอง ทำงานหนัก นอนน้อยเป็นประจำ หรือแม้แต่ทานอาหารไม่เป็นเวลา อดอาหาร ทานน้อยแบบไม่ถูกสุขลักษณะ และความเข้าใจเรื่องการควบคุมอาหารอย่างถูกต้อง ส่งผลให้ร่างกายทำงานผิดปกติ ระบบรวน ฮอร์โมนเปลี่ยน เผาผลาญได้ช้า เรียกได้ว่าเข้าสู่อาการร่างพัง ซึ่งปัจจัยเหล่านี้ส่งผลโดยตรงต่อน้ำหนักของคุณ สาเหตุก็มาจากเจ้าร่างกายเข้าสู่ภาวะอ่อนแอ ทำให้เจ้าฮอร์โมนคอร์ติซอลถูกเรียกใช้งานมากกว่าปกตินั่นเอง</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\"><span helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 0cm; line-height: 18.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang=\"TH\" angsana=\"\" new\",=\"\" serif;\"=\"\" style=\"line-height: 16.1px;\">มาถึงตรงนี้คงพอไขข้อข้องใจได้แล้วว่า ทานก็น้อยแต่ทำไมยังอ้วนอยู่ดี เพราะปัจจัยเรื่องน้ำหนักไม่ได้ขึ้นอยู่กับการคุมอาหารเพียงอย่างเดียว ยังมีปัจจัยแวดล้อมเหล่านี้เป็นส่วนประกอบสำคัญในการสร้างหุ่นสวยสุขภาพดีให้กับคุณเช่นกัน รู้แบบนี้แล้วหันมาสังเกตตัวเอง และดูแลตัวเองอย่างถูกวิธีในแบบของคุณ เพราะสุขภาพที่ดีหาซื้อไม่ได้ ความใส่ใจเท่านั้นที่จะทำให้คุณกลับมามีรูปร่างที่ดีดังเดิม</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 18.4px;\"><span lang=\"EN-US\" helvetica=\"\" neue\";\"=\"\" style=\"line-height: 16.1px;\">&nbsp;</span><span style=\"line-height: 16.1px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; line-height: 18.4px;\"><span lang=\"EN-US\">&nbsp;</span></p>', '2020-11-08', '2020-11-13 10:17:49', '2020-12-01 11:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_form`
--

CREATE TABLE `tb_contact_form` (
  `contact_form_id` int(11) NOT NULL,
  `contact_form_email` text DEFAULT NULL,
  `contact_form_name` text DEFAULT NULL COMMENT 'ชื่อ',
  `contact_form_phone` text DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `contact_form_subject` text DEFAULT NULL,
  `contact_form_massage` text DEFAULT NULL COMMENT 'ข้อความ',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_contact_form`
--

INSERT INTO `tb_contact_form` (`contact_form_id`, `contact_form_email`, `contact_form_name`, `contact_form_phone`, `contact_form_subject`, `contact_form_massage`, `created_at`, `updated_at`) VALUES
(2, 'husnee1717@gmail.com', 'Husnee', '0853214697', NULL, 'test', '2020-08-10 06:59:14', '2020-08-10 06:59:14'),
(3, 'husnee1717@gmail.com', 'husnee', '0853214697', NULL, 'asdfg', '2020-08-10 06:59:54', '2020-08-10 06:59:54'),
(4, 'husnee1717@gmail.com', 'husnee1717@gmail.com', '0853214697', NULL, 'aaaaaaaaa', '2020-08-24 03:41:14', '2020-08-24 03:41:14'),
(5, 'sales@gourmetprimo.com', 'Husnee hn', '0852136479', 'ทดสอบ EAT', 'EATFIT', '2020-11-06 10:03:48', '2020-11-06 10:03:48'),
(6, 'sales@gourmetprimo.com', 'saran', '0852136479', 'ทดสอบ2', 'aaaaaaaaaaaa', '2020-11-06 10:04:59', '2020-11-06 10:04:59'),
(7, 'sales@gourmetprimo.com', 'saran hn', '0852136479', 'ทดสอบAAE', 'EATFITTT', '2020-11-06 10:08:39', '2020-11-06 10:08:39'),
(8, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'ถ้าเห็นข้อความไลน์มาบอกหน่อยค่ะ', '2020-11-30 20:02:49', '2020-11-30 20:02:49'),
(9, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'ถ้าเห็นข้อความไลน์มาบอกหน่อยค่ะ', '2020-11-30 20:03:04', '2020-11-30 20:03:04'),
(10, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'Test', '2020-11-30 20:56:33', '2020-11-30 20:56:33'),
(11, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '1111', '2020-11-30 20:57:26', '2020-11-30 20:57:26'),
(12, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '11111', '2020-11-30 20:58:36', '2020-11-30 20:58:36'),
(13, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', 'กกกกกกก', '2020-11-30 21:07:31', '2020-11-30 21:07:31'),
(14, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '5356896+8', '2020-11-30 21:11:27', '2020-11-30 21:11:27'),
(15, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Need more details', 'I would like to more more detail about eatfit packages', '2020-12-02 10:14:52', '2020-12-02 10:14:52'),
(16, 'vichuda@bangkokaircatering.com', 'dada', '0997822250', 'test', 'test', '2020-12-02 14:42:38', '2020-12-02 14:42:38'),
(17, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'test', '2020-12-02 15:06:29', '2020-12-02 15:06:29'),
(18, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '254254254', '2020-12-02 16:19:42', '2020-12-02 16:19:42'),
(19, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'fgdhfghgffj', '2020-12-02 17:15:39', '2020-12-02 17:15:39'),
(20, 'husnee1717@gmail.com', 'Husnee', '0852136479', 'ทดสอบ', '2622546254625432546', '2020-12-02 17:35:42', '2020-12-02 17:35:42'),
(21, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'ะำหะ', '2020-12-02 17:38:09', '2020-12-02 17:38:09'),
(22, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'ธำหะกดหดหกด', '2020-12-02 17:43:40', '2020-12-02 17:43:40'),
(23, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '1541541546546', '2020-12-02 17:45:30', '2020-12-02 17:45:30'),
(24, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'กฟหกฟหกฟหกฟห', '2020-12-02 17:49:06', '2020-12-02 17:49:06'),
(25, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'test', '2020-12-03 11:26:39', '2020-12-03 11:26:39'),
(26, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'test', '2020-12-03 14:37:39', '2020-12-03 14:37:39'),
(27, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'testestestes', '2020-12-03 16:02:28', '2020-12-03 16:02:28'),
(28, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'testestsetes', '2020-12-03 16:12:18', '2020-12-03 16:12:18'),
(29, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '15481768876867681768', '2020-12-03 16:26:57', '2020-12-03 16:26:57'),
(30, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '254625462546254615461681681641465813546666630134543054630754305463', '2020-12-03 16:30:25', '2020-12-03 16:30:25'),
(31, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', '3542546154616156', '2020-12-03 16:31:24', '2020-12-03 16:31:24'),
(32, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', 'wwwwwwqqaaasdsddfffgg', '2020-12-03 16:32:51', '2020-12-03 16:32:51'),
(33, 'husnee1717@gmail.com', 'Husnee', '0853214697', 'ทดสอบ', 'เทสสสสส', '2020-12-03 16:34:49', '2020-12-03 16:34:49'),
(34, 'vichuda@bangkokaircatering.com', 'Vichuda', '0997822250', 'Test', 'test', '2020-12-03 16:37:18', '2020-12-03 16:37:18'),
(35, 'qruby776@gmail.com', 'iMdIHCkrmzvNYlo', '6982147537', 'MGtSpqXyLuxD', 'DrIOchEigu', '2020-12-05 13:18:23', '2020-12-05 13:18:23'),
(36, 'qruby776@gmail.com', 'ypSnFuXMNUE', '7779359338', 'VdmJzpba', 'nOoaNXEgS', '2020-12-05 13:18:33', '2020-12-05 13:18:33'),
(37, 'johnsnow9441@gmail.com', 'AjfdvnJVbWch', '6816372492', 'tGXHPsfIO', 'dyvIKqZxohcirmRj', '2020-12-15 14:00:27', '2020-12-15 14:00:27'),
(38, 'johnsnow9441@gmail.com', 'JdlSkuzIgcvjb', '5171185018', 'BdfvwLrzcUnP', 'qerCuZSN', '2020-12-15 14:00:52', '2020-12-15 14:00:52'),
(39, 'jaskim11@gmail.com', 'HenryEmath', '89034182352', 'Every your dollar can turn into $100 after you lunch this Robot.  Link - http://3d-file.ru/redirect?url=https://hdredtube3.mobi/btsmart', 'Start your online work using the financial Robot. \r\nLink - http://1c-met.ru/bitrix/rk.php?id=2&event1=banner&event2=click&goto=https://hdredtube3.mobi/btsmart', '2020-12-19 17:38:17', '2020-12-19 17:38:17'),
(40, 'ericjonesonline@outlook.com', 'Eric Jones', '555-555-1212', 'There they go…', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at eatfitshop.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=eatfitshop.com', '2020-12-28 20:16:55', '2020-12-28 20:16:55'),
(41, 'lionelharris5427@gmail.com', 'MXCKnoBSvEuRZm', '4671942149', 'CKsfUInkuJWBQmq', 'tbglXZoiR', '2020-12-30 19:13:16', '2020-12-30 19:13:16'),
(42, 'lionelharris5427@gmail.com', 'HcSrbqJY', '4828182804', 'jZfdcHtJs', 'SykwlWEHQz', '2020-12-30 19:13:48', '2020-12-30 19:13:48'),
(43, 'ericjonesonline@outlook.com', 'Eric Jones', '555-555-1212', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website eatfitshop.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE http://www.talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=eatfitshop.com', '2021-01-04 21:52:36', '2021-01-04 21:52:36'),
(44, 'rf2342524@gmail.com', 'jQMPCgcxoa', '4500922064', 'mHDLhFtNdx', 'TtCOLNEvR', '2021-01-05 08:36:56', '2021-01-05 08:36:56'),
(45, 'rf2342524@gmail.com', 'AghYeHIakQiv', '2082608238', 'vhdctNbqi', 'PMIaXKAWJ', '2021-01-05 08:37:12', '2021-01-05 08:37:12'),
(46, 'nathaniel@stardatagroup.com', 'Nathaniel Burchfield', 'NA', 'StarDataGroup.com Shutting Down', 'It is with sad regret to inform you StarDataGroup.com is shutting down.\r\nIt has been a tough year all round and we decided to go out with a bang!\r\n\r\nAny group of databases listed below is $49 or $149 for all 16 databases in this one time offer.\r\nYou can purchase it at www.StarDataGroup.com and view samples.\r\n\r\n- LinkedIn Database\r\n 43,535,433 LinkedIn Records\r\n\r\n- USA B2B Companies Database\r\n 28,147,835 Companies\r\n\r\n- Forex\r\n Forex South Africa 113,550 Forex Traders\r\n Forex Australia 135,696 Forex Traders\r\n Forex UK 779,674 Forex Traders\r\n\r\n- UK Companies Database\r\n 521,303 Companies\r\n\r\n- German Databases\r\n German Companies Database: 2,209,191 Companies\r\n German Executives Database: 985,048 Executives\r\n\r\n- Australian Companies Database\r\n 1,806,596 Companies\r\n\r\n- UAE Companies Database\r\n 950,652 Companies\r\n\r\n- Affiliate Marketers Database\r\n 494,909 records\r\n\r\n- South African Databases\r\n B2B Companies Database: 1,462,227 Companies\r\n Directors Database: 758,834 Directors\r\n Healthcare Database: 376,599 Medical Professionals\r\n Wholesalers Database: 106,932 Wholesalers\r\n Real Estate Agent Database: 257,980 Estate Agents\r\n Forex South Africa: 113,550 Forex Traders\r\n\r\nVisit www.stardatagroup.com or contact us with any queries.\r\n\r\nKind Regards,\r\nStarDataGroup.com', '2021-01-09 13:15:34', '2021-01-09 13:15:34'),
(47, 'nirvanaford94@gmail.com', 'Sitiporn Trongwichien', '099999999', 'Test', 'Test', '2021-01-19 10:34:16', '2021-01-19 10:34:16'),
(48, NULL, NULL, NULL, NULL, NULL, '2021-01-19 10:35:52', '2021-01-19 10:35:52'),
(49, NULL, NULL, NULL, NULL, NULL, '2021-01-19 11:01:19', '2021-01-19 11:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL,
  `order_number` text DEFAULT NULL,
  `order_customer` text DEFAULT NULL COMMENT 'ชื่อผู้ซื้อ',
  `order_totalprice` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `order_count` text DEFAULT NULL,
  `order_tracking` text DEFAULT NULL,
  `order_pay` text DEFAULT NULL,
  `order_satatus` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `order_number`, `order_customer`, `order_totalprice`, `order_date`, `order_time`, `order_count`, `order_tracking`, `order_pay`, `order_satatus`, `created_at`, `updated_at`) VALUES
(2, 'SW20090002', '1', '6172', '2020-09-09', '10:17:53', '1', '123456', 'onDelivery', 'D', '2020-09-09 10:17:53', '2020-09-15 03:15:46'),
(3, 'SW20090003', '1', '9681', '2020-09-09', '10:18:44', '2', NULL, 'Later', 'Pay', '2020-09-09 10:18:44', '2020-09-10 08:25:52'),
(7, 'SW20090007', '1', '13190', '2020-09-09', '10:30:33', '2', NULL, 'Later', 'Pay', '2020-09-09 10:30:33', '2020-09-11 07:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_detail_product` text DEFAULT NULL,
  `order_detail_price` text DEFAULT NULL,
  `order_detail_numproduct` text DEFAULT NULL,
  `order_detail_ordernumber` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`order_detail_id`, `order_detail_product`, `order_detail_price`, `order_detail_numproduct`, `order_detail_ordernumber`, `created_at`, `updated_at`) VALUES
(2, '1', '3086', '2', 'SW20090002', '2020-09-09 10:17:53', '2020-09-09 10:17:53'),
(3, '1', '3086', '3', 'SW20090003', '2020-09-09 10:18:44', '2020-09-09 10:18:44'),
(4, '2', '423', '1', 'SW20090003', '2020-09-09 10:18:44', '2020-09-09 10:18:44'),
(8, '1', '12344', '4', 'SW20090007', '2020-09-09 10:30:33', '2020-09-09 10:30:33'),
(9, '2', '846', '2', 'SW20090007', '2020-09-09 10:30:33', '2020-09-09 10:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_destinationbank` text DEFAULT NULL,
  `payment_amount` text DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_time` time DEFAULT NULL,
  `payment_slip` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `payment_ordernumber` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `question_id` int(11) NOT NULL,
  `question_q_th` text DEFAULT NULL,
  `question_q_en` text DEFAULT NULL,
  `question_answer_th` text DEFAULT NULL,
  `question_answer_en` text DEFAULT NULL,
  `question_show` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `question_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`question_id`, `question_q_th`, `question_q_en`, `question_answer_th`, `question_answer_en`, `question_show`, `created_at`, `updated_at`, `question_type`) VALUES
(3, 'WHAT’S eatfit?', 'WHAT’S eatfit?', 'I’m glad you asked! We’re a healthy food delivery service – our meals are developed by our team of chefs and nutritionist. We design our meals to be healthy, satisfying, calorie-controlled and nutritionally balanced. \r\n\r\nWe include a calorie count on each meal’s packaging.  Your food is fully cooked, so all you need to do is reheat and follow the instructions. It’s obvious the instructions will be included with the meal. No more worrying about what’s for breakfast, lunch or dinner – no more artificial ingredients, chemical preservatives, or highly processed sugars, either!\r\n\r\nWe started eatfit because we truly believe eating fresh, nutritious and delicious dishes should be easy for all. We do the hard work for you – sourcing the highest quality ingredients, and all the while making sure each meal is nutrient-dense and packed with goodness.', 'I’m glad you asked! We’re a healthy food delivery service – our meals are developed by our team of chefs and nutritionist. We design our meals to be healthy, satisfying, calorie-controlled and nutritionally balanced. \r\n\r\nWe include a calorie count on each meal’s packaging.  Your food is fully cooked, so all you need to do is reheat and follow the instructions. It’s obvious the instructions will be included with the meal. No more worrying about what’s for breakfast, lunch or dinner – no more artificial ingredients, chemical preservatives, or highly processed sugars, either!\r\n\r\nWe started eatfit because we truly believe eating fresh, nutritious and delicious dishes should be easy for all. We do the hard work for you – sourcing the highest quality ingredients, and all the while making sure each meal is nutrient-dense and packed with goodness.', 1, '2020-11-12 04:59:38', '2020-12-18 14:38:03', '2'),
(6, 'Where are your meals cooked?', 'Where are your meals cooked?', 'We make our meals at Gourmet Primo’s production facility located in Prawet, Bangkok. Our production plant is internationally accredited by GMP + HACCP, and Halal certified.', 'We make our meals at Gourmet Primo’s production facility located in Prawet, Bangkok. Our production plant is internationally accredited by GMP + HACCP, and Halal certified.', 1, '2020-11-30 20:52:51', '2020-12-18 14:39:19', '2'),
(7, 'Can I choose a specific time for my delivery?', 'Can I choose a specific time for my delivery?', 'We currently provide the following shipping options within Bangkok and the metropolitan region:\r\n\r\nOptions		            Delivery Days 	                 Delivery Timeslots\r\nStandard delivery	Monday – Sunday       	            8 am – 12 noon\r\n						                                                   2 – 4 pm \r\n						                                                   4 – 6 pm\r\nNext day delivery     Monday – Sunday                     8 am – 12 noon (order placed before 12 noon the  previous day)\r\n					                                                           2 – 4 pm (order placed before 8 pm the previous day\r\n					                                                           4 – 6 pm (order placed before 8 pm the previous day)\r\n                                                                                                   \r\n\r\n*Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries.', 'We currently provide the following shipping options within Bangkok and the metropolitan region:\r\n\r\nOptions		            Delivery Days 	                 Delivery Timeslots\r\nStandard delivery	Monday – Sunday       	            8 am – 12 noon\r\n						                                                   2 – 4 pm \r\n						                                                   4 – 6 pm\r\nNext day delivery     Monday – Sunday                     8 am – 12 noon (order placed before 12 noon the  previous day)\r\n					                                                           2 – 4 pm (order placed before 8 pm the previous day\r\n					                                                           4 – 6 pm (order placed before 8 pm the previous day)\r\n                                                                                                   \r\n\r\n*Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries.', 1, '2020-12-01 10:49:37', '2020-12-02 10:05:37', '4'),
(8, 'What should I do if my order hasn’t been delivered?', 'What should I do if my order hasn’t been delivered?', 'You can keep an eye on delivery by tracking your order in your order history. If your timeslot has come and gone, you can contact us at 091 666 0998', 'You can keep an eye on delivery by tracking your order in your order history. If your timeslot has come and gone, you can contact us at  091 666 0998', 1, '2020-12-01 14:10:03', '2020-12-01 14:10:03', '4'),
(9, 'How much does shipping cost?', 'How much does shipping cost?', 'Your shipping costs will be calculated at checkout and will be calculated based on your location. Depending on your location within your district, estimated shipping cost may vary.', 'Your shipping costs will be calculated at checkout and will be calculated based on your location. Depending on your location within your district, estimated shipping cost may vary.', 1, '2020-12-01 14:10:20', '2020-12-01 14:10:20', '4'),
(11, 'Where can I order eatfit products?', 'Where can I order eatfit products?', 'You can make an order on this website, or via our facebook/Line @ eatfit.th.', 'You can make an order on this website, or via our facebook/Line @ eatfit.th.', 1, '2020-12-01 14:14:46', '2020-12-01 14:14:46', '5'),
(12, 'Can I amend my order after I have placed it?', 'Can I amend my order after I have placed it?', 'Yes, it’s possible to amend your order up to one working day prior to your original delivery date by contacting us by email or telephone. Sorry, but any changes requested after this deadline cannot be made.\r\nOur Customer Relations team will be happy to assist you and can be reached at 091 666 0998', 'Yes, it’s possible to amend your order up to one working day prior to your original delivery date by contacting us by email or telephone. Sorry, but any changes requested after this deadline cannot be made.\r\nOur Customer Relations team will be happy to assist you and can be reached at 091 666 0998', 1, '2020-12-01 14:15:47', '2020-12-01 14:15:47', '5'),
(13, 'Can I cancel my order before delivery?', 'Can I cancel my order before delivery?', 'Cancellation requests must be made by contacting our Customer Relations team as soon as possible. As we use fresh ingredients, we cannot guarantee to accept cancellations.  \r\nOur Customer Relations team will be happy to assist you and can be reached at 091 666 0998', 'Cancellation requests must be made by contacting our Customer Relations team as soon as possible. As we use fresh ingredients, we cannot guarantee to accept cancellations.  \r\nOur Customer Relations team will be happy to assist you and can be reached at 091 666 0998', 1, '2020-12-01 14:16:16', '2020-12-01 14:16:16', '5'),
(14, 'What if I am not happy with my order?', 'What if I am not happy with my order?', 'It’s really important to us that you have an amazing experience from start to finish. If you’re not happy or run into any difficulty, please chat with our Customer Relations team. We’ll do our best to make it right.', 'It’s really important to us that you have an amazing experience from start to finish. If you’re not happy or run into any difficulty, please chat with our Customer Relations team. We’ll do our best to make it right.', 1, '2020-12-01 14:16:45', '2020-12-01 14:16:45', '5'),
(15, 'What do I do if part of my order is missing or I receive damaged goods?', 'What do I do if part of my order is missing or I receive damaged goods?', 'We ask that you kindly inspect your package as soon as it is delivered. If there are any faults or missing items, please inform us by email using the contact details on our website. If we don’t hear from you by email within 3 hours of delivery, we reserve the right not to refund or replace your purchase.', 'We ask that you kindly inspect your package as soon as it is delivered. If there are any faults or missing items, please inform us by email using the contact details on our website. If we don’t hear from you by email within 3 hours of delivery, we reserve the right not to refund or replace your purchase.', 1, '2020-12-01 14:17:03', '2020-12-01 14:17:03', '5'),
(16, 'What forms of payment do you accept?', 'What forms of payment do you accept?', 'We accept bank issued credit cards: Visa and MasterCard. We also accept bank transfer payments. You can upload your payment slip via your account page.', 'We accept bank issued credit cards: Visa and MasterCard. We also accept bank transfer payments. You can upload your payment slip via your account page.', 1, '2020-12-01 14:18:09', '2020-12-01 14:18:09', '6'),
(17, 'How can I redeem my eatfit points?', 'How can I redeem my eatfit points?', 'You can redeem your eatfit points via your account page.', 'You can redeem your eatfit points via your account page.', 1, '2020-12-01 14:18:45', '2020-12-01 14:18:45', '6'),
(18, 'Can I really lose weight with eatfit?', 'Can I really lose weight with eatfit?', 'The key to weight loss is achieving a negative energy balance, or taking in less calories than you burn. It’s 80 percent diet and 20 percent exercise. However, you can lose weight without exercise – what you eat matters more than working it off, but fitness will keep you progressing and and help you achieve your ultimate goals.', 'The key to weight loss is achieving a negative energy balance, or taking in less calories than you burn. It’s 80 percent diet and 20 percent exercise. However, you can lose weight without exercise – what you eat matters more than working it off, but fitness will keep you progressing and and help you achieve your ultimate goals.', 1, '2020-12-01 14:19:12', '2020-12-01 14:19:12', '7'),
(19, 'When will I see my weight loss results?', 'When will I see my weight loss results?', 'You should begin to lose weight within two to three weeks of starting an eatfit plan. However, this all depends on each individual’s metabolism.', 'You should begin to lose weight within two to three weeks of starting an eatfit plan. However, this all depends on each individual’s metabolism.', 1, '2020-12-01 14:19:32', '2020-12-01 14:19:32', '7'),
(20, 'What is the shelf life of eatfit products?', 'What is the shelf life of eatfit products?', 'Our products will have a maximum of 3 days of shelf life when they reach you. Remember to keep them refrigerated and refer to the expiration date on each package.', 'Our products will have a maximum of 3 days of shelf life when they reach you. Remember to keep them refrigerated and refer to the expiration date on each package.', 1, '2020-12-01 14:19:50', '2020-12-01 14:19:50', '7'),
(21, 'Is your packaging environmentally friendly?', 'Is your packaging environmentally friendly?', 'Yes, we work hard to reduce our environmental impact as much as we can. Our food containers are biodegradable and compostable. Our boxes, plastic bottles and cardboard wrappers are all recyclable.', 'Yes, we work hard to reduce our environmental impact as much as we can. Our food containers are biodegradable and compostable. Our boxes, plastic bottles and cardboard wrappers are all recyclable.', 1, '2020-12-01 14:20:13', '2020-12-01 14:20:13', '8'),
(22, 'Can I return my packaging to be recycled?', 'Can I return my packaging to be recycled?', 'Yes, you can return your packaging to be recycled; just make sure to wash it first. You will be credited with loyalty points for each package returned.', 'Yes, you can return your packaging to be recycled; just make sure to wash it first. You will be credited with loyalty points for each package returned.', 1, '2020-12-01 14:20:38', '2020-12-01 14:20:38', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `review_id` int(11) NOT NULL,
  `review_member` int(11) DEFAULT NULL,
  `review_menu` int(11) DEFAULT NULL,
  `review_title` text DEFAULT NULL,
  `review_content` text DEFAULT NULL,
  `review_star` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_order` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `review_show` int(11) DEFAULT NULL,
  `review_orderno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_review_file`
--

CREATE TABLE `tb_review_file` (
  `review_file_id` int(11) NOT NULL,
  `review_file_main` int(11) DEFAULT NULL,
  `review_file_type` text DEFAULT NULL,
  `review_file_file` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_question`
--

CREATE TABLE `tb_type_question` (
  `type_question_id` int(11) NOT NULL,
  `type_question_name_th` text DEFAULT NULL,
  `type_question_name_en` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_type_question`
--

INSERT INTO `tb_type_question` (`type_question_id`, `type_question_name_th`, `type_question_name_en`, `created_at`, `updated_at`) VALUES
(2, 'ABOUT EATFIT', 'ABOUT EATFIT', '2020-11-12 04:59:38', '2020-11-30 20:51:40'),
(4, 'SHIPPING & DELIVERY', 'SHIPPING & DELIVERY', '2020-12-01 10:49:36', '2020-12-01 14:08:25'),
(5, 'ORDERS', 'ORDERS', '2020-12-01 14:14:00', '2020-12-01 14:14:00'),
(6, 'PAYMENTS', 'PAYMENTS', '2020-12-01 14:18:09', '2020-12-01 14:18:09'),
(7, 'DIETARY AND NUTRITIONAL', 'DIETARY AND NUTRITIONAL', '2020-12-01 14:19:12', '2020-12-01 15:13:11'),
(8, 'PACKAGING & RECYCLING', 'PACKAGING & RECYCLING', '2020-12-01 14:20:13', '2020-12-01 14:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wish`
--

CREATE TABLE `tb_wish` (
  `wish_id` int(11) NOT NULL,
  `wish_member` int(11) DEFAULT NULL,
  `wish_menu` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_wish`
--

INSERT INTO `tb_wish` (`wish_id`, `wish_member`, `wish_menu`, `created_at`, `updated_at`) VALUES
(2, 1, 32, '2020-12-05 00:12:49', '2020-12-05 00:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ford Fuji', 'nirvanaford94@gmail.com', 'qwaszx', '2020-11-25 03:39:10', '2020-11-25 03:39:16'),
(2, 'K.Dada', 'eatfit_admin', 'dec@2020', NULL, NULL),
(3, 'Aomz Aomaomaomaomz', 'roundroundlaos@gmail.com', '$2y$10$6POPtDpjlDwWvdtquW/ZLeLAo0Jfp9LjU4mkac4yBnXtTgiWdUfqC', '2021-01-12 06:46:07', '2021-01-12 06:46:07'),
(4, 'McConnell David', 'maniacmaniacmaniacz@gmail.com', '$2y$10$c/hF1fxtm8rJmtStvgNaWu4ydbOTUPccX2wrL0uUE7P0hjQ1Uy9PC', '2021-01-12 06:47:17', '2021-01-12 06:47:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery_banner_menu_head`
--
ALTER TABLE `gallery_banner_menu_head`
  ADD PRIMARY KEY (`gallery_menu_head_id`);

--
-- Indexes for table `lv_amphur`
--
ALTER TABLE `lv_amphur`
  ADD PRIMARY KEY (`amphur_id`);

--
-- Indexes for table `lv_banner_promotion`
--
ALTER TABLE `lv_banner_promotion`
  ADD PRIMARY KEY (`banner_promotion_id`);

--
-- Indexes for table `lv_buy_1_get_1_free`
--
ALTER TABLE `lv_buy_1_get_1_free`
  ADD PRIMARY KEY (`buy_1_get_1_free_id`);

--
-- Indexes for table `lv_charge`
--
ALTER TABLE `lv_charge`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `lv_member`
--
ALTER TABLE `lv_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `lv_order`
--
ALTER TABLE `lv_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `lv_order_detail`
--
ALTER TABLE `lv_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `lv_package`
--
ALTER TABLE `lv_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `lv_package_price`
--
ALTER TABLE `lv_package_price`
  ADD PRIMARY KEY (`package_price_id`);

--
-- Indexes for table `lv_payment`
--
ALTER TABLE `lv_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `lv_point_redeem`
--
ALTER TABLE `lv_point_redeem`
  ADD PRIMARY KEY (`point_redeem_id`);

--
-- Indexes for table `lv_point_redeem_new`
--
ALTER TABLE `lv_point_redeem_new`
  ADD PRIMARY KEY (`point_redeem_new_id`);

--
-- Indexes for table `lv_point_text`
--
ALTER TABLE `lv_point_text`
  ADD PRIMARY KEY (`point_text_id`);

--
-- Indexes for table `lv_product_point`
--
ALTER TABLE `lv_product_point`
  ADD PRIMARY KEY (`product_point_id`);

--
-- Indexes for table `lv_promocode`
--
ALTER TABLE `lv_promocode`
  ADD PRIMARY KEY (`promocode_id`);

--
-- Indexes for table `lv_promotion_complete`
--
ALTER TABLE `lv_promotion_complete`
  ADD PRIMARY KEY (`promotion_complete_id`);

--
-- Indexes for table `lv_promotion_day`
--
ALTER TABLE `lv_promotion_day`
  ADD PRIMARY KEY (`promotion_day_id`);

--
-- Indexes for table `lv_promotion_text`
--
ALTER TABLE `lv_promotion_text`
  ADD PRIMARY KEY (`promotion_text_id`);

--
-- Indexes for table `lv_province`
--
ALTER TABLE `lv_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `lv_test_creditcard`
--
ALTER TABLE `lv_test_creditcard`
  ADD PRIMARY KEY (`test_creditcard_id`);

--
-- Indexes for table `lv_tumbol`
--
ALTER TABLE `lv_tumbol`
  ADD PRIMARY KEY (`tumbol_id`);

--
-- Indexes for table `menu_product_head`
--
ALTER TABLE `menu_product_head`
  ADD PRIMARY KEY (`menu_product_head_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `products_delivery`
--
ALTER TABLE `products_delivery`
  ADD PRIMARY KEY (`products_delivery_id`);

--
-- Indexes for table `products_gallery`
--
ALTER TABLE `products_gallery`
  ADD PRIMARY KEY (`products_gallery_id`);

--
-- Indexes for table `products_ingredients`
--
ALTER TABLE `products_ingredients`
  ADD PRIMARY KEY (`products_ingredients_id`);

--
-- Indexes for table `products_tag`
--
ALTER TABLE `products_tag`
  ADD PRIMARY KEY (`products_tag_id`);

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tb_contact_form`
--
ALTER TABLE `tb_contact_form`
  ADD PRIMARY KEY (`contact_form_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tb_review_file`
--
ALTER TABLE `tb_review_file`
  ADD PRIMARY KEY (`review_file_id`);

--
-- Indexes for table `tb_type_question`
--
ALTER TABLE `tb_type_question`
  ADD PRIMARY KEY (`type_question_id`);

--
-- Indexes for table `tb_wish`
--
ALTER TABLE `tb_wish`
  ADD PRIMARY KEY (`wish_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery_banner_menu_head`
--
ALTER TABLE `gallery_banner_menu_head`
  MODIFY `gallery_menu_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lv_amphur`
--
ALTER TABLE `lv_amphur`
  MODIFY `amphur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `lv_banner_promotion`
--
ALTER TABLE `lv_banner_promotion`
  MODIFY `banner_promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lv_buy_1_get_1_free`
--
ALTER TABLE `lv_buy_1_get_1_free`
  MODIFY `buy_1_get_1_free_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lv_charge`
--
ALTER TABLE `lv_charge`
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lv_member`
--
ALTER TABLE `lv_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `lv_order`
--
ALTER TABLE `lv_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `lv_order_detail`
--
ALTER TABLE `lv_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `lv_package`
--
ALTER TABLE `lv_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lv_package_price`
--
ALTER TABLE `lv_package_price`
  MODIFY `package_price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lv_payment`
--
ALTER TABLE `lv_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lv_point_redeem`
--
ALTER TABLE `lv_point_redeem`
  MODIFY `point_redeem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lv_point_redeem_new`
--
ALTER TABLE `lv_point_redeem_new`
  MODIFY `point_redeem_new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lv_point_text`
--
ALTER TABLE `lv_point_text`
  MODIFY `point_text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lv_product_point`
--
ALTER TABLE `lv_product_point`
  MODIFY `product_point_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lv_promocode`
--
ALTER TABLE `lv_promocode`
  MODIFY `promocode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lv_promotion_complete`
--
ALTER TABLE `lv_promotion_complete`
  MODIFY `promotion_complete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lv_promotion_day`
--
ALTER TABLE `lv_promotion_day`
  MODIFY `promotion_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lv_promotion_text`
--
ALTER TABLE `lv_promotion_text`
  MODIFY `promotion_text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lv_province`
--
ALTER TABLE `lv_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lv_test_creditcard`
--
ALTER TABLE `lv_test_creditcard`
  MODIFY `test_creditcard_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lv_tumbol`
--
ALTER TABLE `lv_tumbol`
  MODIFY `tumbol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `menu_product_head`
--
ALTER TABLE `menu_product_head`
  MODIFY `menu_product_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products_delivery`
--
ALTER TABLE `products_delivery`
  MODIFY `products_delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_gallery`
--
ALTER TABLE `products_gallery`
  MODIFY `products_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_ingredients`
--
ALTER TABLE `products_ingredients`
  MODIFY `products_ingredients_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `products_tag`
--
ALTER TABLE `products_tag`
  MODIFY `products_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_contact_form`
--
ALTER TABLE `tb_contact_form`
  MODIFY `contact_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_review_file`
--
ALTER TABLE `tb_review_file`
  MODIFY `review_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_type_question`
--
ALTER TABLE `tb_type_question`
  MODIFY `type_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_wish`
--
ALTER TABLE `tb_wish`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
