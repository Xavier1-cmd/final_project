-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 07:59 AM
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
-- Database: `album`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `passwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) UNSIGNED NOT NULL,
  `album_date` datetime DEFAULT NULL,
  `album_location` varchar(255) DEFAULT NULL,
  `album_title` varchar(255) DEFAULT NULL,
  `album_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_date`, `album_location`, `album_title`, `album_desc`) VALUES
(1, '2016-10-20 12:11:53', '清水', '清水路邊老攤冰店', '清水路邊老攤冰店，很古早味的冰。'),
(2, '2016-10-20 12:13:08', '樹太老定食', '一家三口聚餐', '樹太老定食，不錯吃。'),
(3, '2016-10-20 12:14:37', '大翔書局', '十月份慶生', '幫朋友小朋友十月份慶生'),
(4, '2016-10-20 12:15:16', '三育書院', '命運石之門 牧瀨紅莉栖', '預購25年6月 好微笑 代理版 1/7 命運石之門 牧瀨紅莉栖 ～命運探知魔眼～ PVC 完成品'),
(5, '2016-10-20 12:16:18', '文淵閣工作室', 'DMC5 但丁', '預購25年1月 壽屋 1/8 ARTFX J 惡魔獵人5 DMC5 但丁 PVC 完成品'),
(6, '2016-10-20 12:17:22', '清水牛肉麵', 'DMC5 尼祿', '預購25年2月 壽屋 1/8 ARTFX J 惡魔獵人5 DMC5 尼祿 PVC 完成品'),
(7, '2016-10-20 12:18:31', '埔里往武嶺的路上', '被束縛的貓 露芙娜', '預購25年3月 SIKI ANIM 1/7 PVC人形 被束縛的貓 露芙娜 豪華版 附掛軸 PVC 完成品'),
(8, '2016-10-20 12:22:39', '高美溼地', '貞子 PVC 附恐怖臉', '預購25年3月 壽屋 1/7 HORROR美少女 美少女 貞子 PVC 附恐怖臉 完成品'),
(9, '2016-10-20 12:24:31', '各處', '濕身阿爾維娜', '預購25年3月 SIKI ANIM 1/7 PVC人形 濕身阿爾維娜 豪華版 附掛軸 PVC 完成品'),
(11, '2024-07-16 10:23:20', '', 'aaaaa', 'adsakgjdla;g');

-- --------------------------------------------------------

--
-- Table structure for table `albumphoto`
--

CREATE TABLE `albumphoto` (
  `ap_id` int(11) UNSIGNED NOT NULL,
  `album_id` int(11) UNSIGNED DEFAULT NULL,
  `ap_subject` varchar(255) DEFAULT NULL,
  `ap_date` datetime DEFAULT NULL,
  `ap_picurl` varchar(100) DEFAULT NULL,
  `ap_hits` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albumphoto`
--

INSERT INTO `albumphoto` (`ap_id`, `album_id`, `ap_subject`, `ap_date`, `ap_picurl`, `ap_hits`) VALUES
(1, 1, '清水路邊老攤冰店', '2016-10-20 12:13:03', 'IMAGE_042.jpg', 0),
(2, 1, '清水路邊老攤冰店', '2016-10-20 12:13:03', 'IMAGE_043.jpg', 0),
(3, 1, '清水路邊老攤冰店', '2016-10-20 12:13:03', 'IMAGE_044.jpg', 0),
(4, 1, '清水路邊老攤冰店', '2016-10-20 12:13:03', 'IMAGE_045.jpg', 0),
(5, 2, '樹太老定食', '2016-10-20 12:13:48', 'IMAGE_052.jpg', 0),
(6, 2, '樹太老定食', '2016-10-20 12:13:48', 'IMAGE_053.jpg', 0),
(7, 2, '樹太老定食', '2016-10-20 12:13:48', 'IMAGE_054.jpg', 0),
(8, 2, '樹太老定食', '2016-10-20 12:13:49', 'IMAGE_058.jpg', 0),
(9, 2, '樹太老定食', '2016-10-20 12:13:49', 'IMAGE_059.jpg', 0),
(10, 2, '樹太老定食', '2016-10-20 12:14:24', 'IMAGE_061.jpg', 0),
(11, 2, '樹太老定食', '2016-10-20 12:14:24', 'IMAGE_062.jpg', 0),
(12, 3, '十月份慶生', '2016-10-20 12:15:12', '201609202004_076.jpg', 0),
(13, 3, '十月份慶生', '2016-10-20 12:15:12', '201609202004_077.jpg', 0),
(38, 9, '可愛的兒子', '2016-10-20 12:25:25', '201609201134_072.jpg', 0),
(39, 9, '可愛的兒子', '2016-10-20 12:25:25', 'DSCN3442.JPG', 0),
(40, 9, '可愛的兒子', '2016-10-20 12:25:25', 'DSCN3449.JPG', 0),
(41, 9, '可愛的兒子', '2016-10-20 12:25:25', 'DSCN3562.JPG', 0),
(42, 9, '可愛的兒子', '2016-10-20 12:25:25', 'DSCN3693.JPG', 0),
(43, 9, '可愛的兒子', '2016-10-20 12:25:44', 'IMAGE_00038.jpg', 2),
(44, 9, '可愛的兒子', '2016-10-20 12:25:44', 'IMAGE_00040.jpg', 0),
(45, 9, '可愛的兒子', '2016-10-20 12:25:44', 'IMAGE_00135.jpg', 0),
(48, 8, '貞子 PVC 附恐怖臉', '2024-07-15 12:49:34', 'pic01.jpg', 0),
(49, 7, '被束縛的貓 露芙娜', '2024-07-15 12:54:11', 'pic03.jpg', 0),
(50, 6, 'DMC5 尼祿', '2024-07-15 12:56:39', 'pic04.jpg', 0),
(51, 5, 'DMC5 但丁', '2024-07-15 12:57:28', 'pic05.jpg', 0),
(52, 4, '命運石之門 牧瀨紅莉栖', '2024-07-15 12:58:21', 'pic06.jpg', 0),
(53, 11, '123', '2024-07-16 10:23:59', '2f8fbd96b6dea34ec08c90f443e71044.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `albumphoto`
--
ALTER TABLE `albumphoto`
  ADD PRIMARY KEY (`ap_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `albumphoto`
--
ALTER TABLE `albumphoto`
  MODIFY `ap_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
