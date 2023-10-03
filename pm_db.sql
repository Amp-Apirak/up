-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 05:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(24, 'Add Idea\r\n'),
(25, 'Register\r\n'),
(26, 'Notification\r\n'),
(27, 'Dashboard\r\n'),
(28, 'Register\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `items_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `items_name`) VALUES
(1, 'Application Respone'),
(2, 'Edit/Update\r\n'),
(3, 'New requirement\r\n'),
(4, 'Delected\r\n'),
(5, 'Error Application\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`) VALUES
(1, 'Production'),
(2, 'Dev Test');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL,
  `work_type` varchar(500) NOT NULL,
  `service` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `items` varchar(500) NOT NULL,
  `file_upfile` varchar(255) NOT NULL COMMENT 'เก็บรูปภาพ',
  `subject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `result` varchar(1000) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `date_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_edit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `staff_crt` varchar(255) NOT NULL,
  `staff_edit` varchar(255) NOT NULL,
  `file_test` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`work_id`, `work_type`, `service`, `category`, `items`, `file_upfile`, `subject`, `status`, `detail`, `result`, `requester`, `date_crt`, `date_edit`, `staff_crt`, `staff_edit`, `file_test`) VALUES
(4, '1', '', '', '', 'LINE_ALBUM_เอกสาร เชื้อดื้อยา (Manual)_230922_1.jpg', 'พิมพ์หัวข้อยาวไม่ได้ ข้อความขาดหาย ', 'On Process', 'asdasdasdasd', 'asdasdasd', 'พี่กอบ', '2023-09-23 06:58:49', '2023-09-23 06:58:49', 'Apirak', 'Apirak', ''),
(20, '1', '', '', '', '196998_1734922497377_1377213_n.jpg', 'ทดสอบ', 'On Process', 'test', 'test', 'test', '2023-09-27 14:19:25', '2023-09-27 14:19:25', 'test', '', ''),
(21, '1', '', '', '', '154249_1587672376216_4351218_n.jpg', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'On Process', 'Example', 'Example', 'Example', '2023-09-27 14:21:51', '2023-09-27 14:21:51', 'Example', '', ''),
(22, '2', '', '', '', '269819733_10220679436920325_122717282354935340_n.jpg', 'ทดสอบ', 'On Process', 'file_upfile2', 'file_upfile2', 'file_upfile2', '2023-09-27 14:24:55', '2023-09-27 14:24:55', '', '', ''),
(23, '2', '', '', '', '12033176_10205538685090992_5391607707403538330_n.jpg', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'Done', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'ขายที่ติดถนน ราคาต่อรองกันได้', '2023-09-27 14:25:58', '2023-09-27 14:25:58', 'ขายที่ติดถนน ราคาต่อรองกันได้', '', ''),
(24, '1', '', '', '', '228663_1874689951476_7134040_n.jpg', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'On Process', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'ขายที่ติดถนน ราคาต่อรองกันได้', '2023-09-27 14:26:59', '2023-09-27 14:26:59', 'ขายที่ติดถนน ราคาต่อรองกันได้', '', ''),
(25, '3', '', '', '', '193941774_10219735679686984_6879008541905282694_n.jpg', 'dfgdfgdfgdf', 'On Process', 'dfgdfgdfgdf', 'dfgdfgdfgdf', 'dfgdfgdfgdf', '2023-09-27 14:29:35', '2023-09-27 14:29:35', 'dfgdfgdfgdf', '', ''),
(26, '1', '', '', '', '206864_1815330107517_6875115_n.jpg', 'ทดสอบ', 'On Process', 'dfgdfgdfgdf', 'dfgdfgdfgdf', 'dfgdfgdfgdf', '2023-09-27 14:30:52', '2023-09-27 14:30:52', 'dfgdfgdfgdf', '', ''),
(27, '1', '', '', '', '560026_3550385202810_1319521324_n.jpg', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'On Process', 'dfgdfgdfgdf', 'dfgdfgdfgdf', 'dfgdfgdfgdf', '2023-09-27 14:31:47', '2023-09-27 14:31:47', 'dfgdfgdfgdf', '', ''),
(28, '1', '', '', '', '207003_1840585018874_8235727_n.jpg', 'ทดสอบ', 'Done', 'file_upfile2', 'file_upfile2', 'file_upfile2', '2023-09-27 14:33:27', '2023-09-27 14:33:27', 'file_upfile2', '', ''),
(29, '1', '', '', '', '279911498_10221217163763160_2475573270922942148_n.jpg', 'ทดสอบ', 'On Process', 'file_upfile2', 'file_upfile2', 'file_upfile2', '2023-09-27 14:34:19', '2023-09-27 14:34:19', 'file_upfile2', '', ''),
(30, '1', '', '', '', '2023-09-09_16-36-50.png', 'ทดสอบ', 'On Process', 'file_upfile2', 'file_upfile2', 'file_upfile2', '2023-09-27 14:37:00', '2023-09-27 14:37:00', 'file_upfile2', '', ''),
(31, '2', '', '', '', '205344_1815387908962_242987_n.jpg', 'file_up', 'On Process', 'file_up', 'file_up', 'file_up', '2023-09-27 14:39:24', '2023-09-27 14:39:24', 'file_up', '', ''),
(32, '1', '', '', '', '228712_1874711872024_1719264_n.jpg', 'ขายที่ติดถนน ราคาต่อรองกันได้', 'On Process', '$target_file', '$target_file', '$target_file', '2023-09-27 14:41:43', '2023-09-27 14:41:43', '$target_file', '', ''),
(33, '2', '', '', '', '2023-09-09_20-00-43.png', 'fffffffffff', 'Done', 'fffffffffff', 'fffffffffff', 'fffffffffff', '2023-09-27 14:43:32', '2023-09-27 14:43:32', 'fffffffffff', '', ''),
(34, '1', '', '', '', '269819733_10220679436920325_122717282354935340_n.jpg', 'ทดสอบ', 'On Process', 'sdasddddddd', 'sdasddddddd', 'sdasddddddd', '2023-09-27 14:47:02', '2023-09-27 14:47:02', 'sdasddddddd', '', ''),
(35, '2', '', '', '', '193941774_10219735679686984_6879008541905282694_n.jpg', 'dfgdfgdfgdf', 'Done', 'fasfsadfadsf', 'asdfdsaf', 'adsfadsf', '2023-09-27 14:52:36', '2023-09-27 14:52:36', 'adsfadsf', '', ''),
(36, '1', '', '', '', '216336_1843969383481_4264956_n.jpg', 'dsfdsfsdfsdfdsf', 'On Process', 'sdfsdfdsf', 'dsfdsfdsfds', 'fdsfdsf', '2023-09-27 14:54:03', '2023-09-27 14:54:03', 'dsfdsdsfdsf', '', ''),
(37, '1', '', '', '', '10603211_10204325812889945_43771953024443023_n.jpg', 'adsfdsafsadfsadfadsf', 'On Process', 'adsfadsf', 'asdfadsfadsf', 'asdfadsfads', '2023-09-27 14:55:21', '2023-09-27 14:55:21', 'fasdfsadf', '', 'asdfadsfsadfdsaf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
