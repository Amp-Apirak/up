-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 04:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `service_id` int(11) NOT NULL,
  `service_cate` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `service_sup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`service_id`, `service_cate`, `service_type`, `service_sup`) VALUES
(1, 'Production', 'Setting Profile', 'Application Error'),
(2, 'Production', 'Setting Profile', 'Insert Requirment'),
(3, 'Production', 'Setting Profile', 'Edit/Setting');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `file_upfile` varchar(255) NOT NULL COMMENT 'เก็บรูปภาพ',
  `work_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `result` varchar(1000) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `date_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_edit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `staff_crt` varchar(255) NOT NULL,
  `staff_edit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`work_id`, `service_id`, `file_upfile`, `work_type`, `subject`, `status`, `detail`, `result`, `requester`, `date_crt`, `date_edit`, `staff_crt`, `staff_edit`) VALUES
(2, 1, 'LINE_ALBUM_เอกสาร เชื้อดื้อยา (Manual)_230922_1.jpg', 'Incident', 'รูปภาพ Profiles ไม่แสดง ', 'On Process', 'asdadadasd', 'asdasdasdsa', 'พี่กอบ', '2023-09-23 06:57:45', '2023-09-23 06:57:45', 'Apirak', 'Apirak'),
(3, 1, 'LINE_ALBUM_เอกสาร เชื้อดื้อยา (Manual)_230922_1.jpg', 'Incident', 'ตัวเลข On Process ไม่ขึ้น ', 'Done', 'asdadadasd', 'asdasdasdsa', 'พี่กอบ', '2023-09-23 06:58:08', '2023-09-23 06:58:08', 'Apirak', 'Apirak'),
(4, 1, 'LINE_ALBUM_เอกสาร เชื้อดื้อยา (Manual)_230922_1.jpg', 'Incident', 'พิมพ์หัวข้อยาวไม่ได้ ข้อความขาดหาย ', 'On Process', 'asdasdasdasd', 'asdasdasd', 'พี่กอบ', '2023-09-23 06:58:49', '2023-09-23 06:58:49', 'Apirak', 'Apirak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
