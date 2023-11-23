-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 02:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

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
  `category_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(24, 'Add Idea\r\n'),
(25, 'Register\r\n'),
(26, 'Notification\r\n'),
(27, 'Dashboard\r\n'),
(29, 'Total Idea'),
(30, 'Benefit'),
(31, 'Your Idea_On Hold'),
(32, 'Your Idea_Ongoing'),
(33, 'Your Idea_Verifying'),
(34, 'Your Idea_Complete'),
(35, 'Your Idea_Cancel'),
(36, 'Setting'),
(37, 'Add Friend'),
(38, 'My Profile setting'),
(39, 'Team Setting'),
(40, 'Add Team member(s)'),
(41, 'Log off Team '),
(42, 'Share Uplevel to others'),
(43, 'Back to home'),
(44, 'Search'),
(46, 'Home Team'),
(47, 'Your Idea'),
(51, 'Add Friend'),
(52, 'Link (URL)'),
(53, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `username`, `password`, `role`, `position`) VALUES
(1, 'คุณอาทิตย์ (พี่เหน่ง)', 'a', '12345678', 'b', 'Customer'),
(2, 'คุณภัทราอร (ซีน)', 'b', '12345678', 'a', 'QC'),
(3, 'คุณอภิรักษ์ (แอมป์)', 'c', '12345678', 'a', 'QC'),
(4, 'คุณสุรพันธ์ (พี่ขวัญ)', 'd', '12345678', 'b', 'Dev'),
(5, 'คุณปิติ (พี่เบียร์)', 'e', '12345678', 'b', 'Dev'),
(6, 'คุณยุทธนา (พี่ตำรวจ)', 'f', '12345678', 'b', 'Dev'),
(7, 'คุณพิสุทธ์(พี่เชษ)', 'g', '12345678', 'c', 'Tester'),
(8, 'คุณธนาคม (พี่จ๋า)', 'h', '12345678', 'c', 'Tester'),
(9, 'คุณผานิต (พี่หญิง)', 'i', '12345678', 'a', 'QC'),
(10, 'คุณกริชเพชร (พี่เด่น)', 'j', '12345678', 'c', 'Tester'),
(11, 'คุณอนุชิต (ทัช)', 'k', '12345678', 'c', 'Tester'),
(13, 'คุณนันทิกา (โม)', 'l', '12345678', 'a', 'QC'),
(14, 'คุณกรกฎ​ (ฮอน)', 'm', '12345678', 'c', 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `device_name`) VALUES
(1, 'Apple'),
(2, 'OPPO'),
(4, 'Samsung'),
(5, 'ASUS'),
(6, 'i-mobile'),
(7, 'vivo'),
(8, 'Lenovo'),
(9, 'Huawei'),
(11, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `items_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `service_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`) VALUES
(1, 'Production'),
(2, 'Dev Test'),
(7, 'iOS'),
(8, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL,
  `v_status` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_task` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_edit` datetime NOT NULL,
  `staff_edit` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_id` int(11) NOT NULL,
  `file_test` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`log_id`, `v_status`, `add_task`, `date_edit`, `staff_edit`, `work_id`, `file_test`) VALUES
(1, 'On Process', '', '2023-11-08 12:21:04', 'คุณภัทราอร (ซีน)', 59, ''),
(2, 'On Process', 'เปลี่ยนหัวข้อเรื่องใหม่', '2023-11-08 14:59:57', 'คุณภัทราอร (ซีน)', 57, ''),
(3, 'Pending', 'ตรงนี้ผฝากพี่ตำรวจตรวจสอบ endpoint verify token Respond displayName กลับมาเป็นชื่อเดิม\r\n\r\nhttps://uplevel.pointit.co.th/uplevel/v1/verify?access_token=eyJhbGciOiJIUzI1NiJ9.PBT9gjO0oAdV42saD4wfEZ0WfB5_DP874F72T872a8LLnrNx-mwjCeY1LnQnIp32puQZ-dT5W7dqG1c1iYbOFiLJiE-l1BgKDyR29_-t_eHoLWLxaAbDQbhipN8VRrxGnZektBhRYHUWaqmvgHAIkQ2MpdI6BUTNdjF--TBLimw.ikxfY0HBB3wHR1qnBcynpRkbd2b5Jul4XuJoJdvISoU\r\n\r\n{\r\n	\"details\": {\r\n		\"id\": \"e4ea756f-3ff7-11ee-a530-0242ac120005\",\r\n		\"userId\": \"Ucfc99165c2a876b332f65c5ce85a0f6a\",\r\n		\"displayName\": \"android\",\r\n		\"statusMessage\": null,\r\n		\"pictureUrl\": null,\r\n		\"picture\": null,\r\n		\"province\": \"2\",\r\n		\"provinceName\": \"กรุงเทพฯและปริมณฑล\",\r\n		\"profile\": {\r\n			\"organization\": null,\r\n			\"organizationName\": null,\r\n			\"picture\": null,\r\n			\"language\": \"en\",\r\n			\"isOwner\": null,\r\n			\"isVerifier\": null\r\n		},\r\n		\"expire\": \"0001-01-01T00:00:00\",\r\n		\"access_token\": \"eyJhbGciOiJIUzI1NiJ9.PBT9gjO0oAdV42saD4wfEZ0WfB5_DP874F72T872a8LLnrNx-mwjCeY1LnQnIp32puQZ-dT5W7dqG1c1iYbOFiLJiE-l', '2023-11-09 10:29:57', 'คุณสุรพันธ์ (พี่ขวัญ)', 63, ''),
(4, 'Done', 'แก้ไขเรียบร้อบครับ', '2023-11-09 10:42:47', 'คุณสุรพันธ์ (พี่ขวัญ)', 61, ''),
(5, 'Done', 'แก้ไขเรียบร้อย', '2023-11-09 10:52:15', 'คุณสุรพันธ์ (พี่ขวัญ)', 60, ''),
(6, 'On Process', 'คำตอบจาก API ของพี่ ตอบ result=false และ message=token is null เท่ากับว่า ไม่มี token หรื token ไม่ถูกต้อง ดังนั้น front-end ควรพาไปหน้า login น่ะ ฝากขวัญดูต่อนะ หรือให้พี่แก้ตรงไหน ว่ามา', '2023-11-09 12:59:23', 'คุณสุรพันธ์ (พี่ขวัญ)', 57, ''),
(7, 'Done', 'ดำเนินการเรียบร้อย แต่ตอนที่แสดงข้อมูลมันจะซ้ำซ้อนนะ แจ้งให้ทราบ', '2023-11-09 13:23:10', 'คุณภัทราอร (ซีน)', 58, ''),
(8, 'On Process', 'ส่วนของการแสดงผล เข้าใจว่าเป็นส่วนของ front-end ถ้าพี่เข้าใจผิด ส่งกลับมาอีกทีนะ', '2023-11-09 13:26:27', 'คุณสุรพันธ์ (พี่ขวัญ)', 59, ''),
(9, 'Done', 'ซีนแจ้งว่า ได้แล้ว ', '2023-11-09 13:27:39', 'คุณภัทราอร (ซีน)', 62, ''),
(10, 'Done', 'พี่ลองใส่ emoji ก็ save ได้ ออกไป กลับมายังแสดง emoji เดิมอยู่', '2023-11-09 13:43:40', 'คุณภัทราอร (ซีน)', 63, ''),
(11, 'On Process', 'case นี้ พี่ไล่ดู flow แล้วแปลกๆ นะ\r\n1. User ที่ได้รับ invite เมื่อได้ link จาก QR ก็จะไปเริ่มที่ verify แล้วถ้าเคย register ไปแล้วก็จะยังไม่มี team ดังนั้นเมื่อ verify จะไม่มี ข้อมูล team ถูกไหม\r\n2. หลังจาก verify ก็จะไป ขั้นตอน post invite\r\n3. หลังจาก invite ก็จะไป get team ซึ่งอันนี้มี ชื่อ team มาแน่นอน\r\n', '2023-11-14 08:21:02', 'คุณสุรพันธ์ (พี่ขวัญ)', 64, ''),
(12, 'Done', 'ปรับ Flower invite ใหม่แล้สครับ ', '2023-11-14 16:42:22', 'คุณสุรพันธ์ (พี่ขวัญ)', 64, 'DisplayTeam.png'),
(13, 'Done', 'ปรับ Flow เรียบร้อยแล้ว ', '2023-11-14 16:43:01', 'คุณสุรพันธ์ (พี่ขวัญ)', 59, ''),
(14, 'Done', 'ลองทดสอบแล้วไม่พออาการดังกร่าว', '2023-11-14 16:47:41', 'คุณสุรพันธ์ (พี่ขวัญ)', 57, 'Login Create.png'),
(15, 'On Process', 'พี่ลองใช้ QR เมื่อวาน แล้ว Inspect เข้าใจว่า Front-end จะตรวจสอบว่า Expired หรือไม่ก่อนจะ นำข้อมูลนั้นส่งไป API ของพี่ เข้าใจถูกไหมไม่รู้', '2023-11-16 07:54:14', 'คุณสุรพันธ์ (พี่ขวัญ)', 65, 'Screenshot 2566-11-16 at 07.51.42.png'),
(16, 'On Process', 'ต้องเปลี่ยน Status เป็น Verifying ก่อนแล้ว Save ถึงจะ Noti ไปสิ', '2023-11-16 07:57:10', 'คุณนันทิกา (โม)', 66, ''),
(17, 'Done', 'ชื่อที่ไม่แสดง คือถูกลบไปแล้ว แก้ไขให้แล้วครับ', '2023-11-16 08:13:18', 'คุณยุทธนา (พี่ตำรวจ)', 67, ''),
(18, 'On Process', 'Save แล้วค่ะ ไม่มีการแจ้งเตือนใดๆ เลยค่ะ', '2023-11-16 09:52:48', 'คุณนันทิกา (โม)', 66, 'IMG_5123.png'),
(19, 'On Process', 'พี่เปลี่ยน Status เป็น Verifying แล้ว Save มี เตือนไปที่ Verifier ที่เป็น Team Owner \r\nหรือถ้าเป็นของ Team ตัวเองก็มี Noti เช่นเดียวกัน', '2023-11-16 10:25:22', 'คุณนันทิกา (โม)', 66, 'Screenshot 2566-11-16 at 10.21.58.png'),
(20, 'On Process', 'น่าจะต้องทำเหมือน token ที่มีวันหมดอายุครับพี่ \r\nเพราะถ้า url นี้หลุดไปจะเป็นช่องทางในการเข้าถึงข้อมูลได้ครับ ', '2023-11-19 10:11:41', 'คุณสุรพันธ์ (พี่ขวัญ)', 65, ''),
(21, 'On Process', 'ที่ชุด Dev update แล้วครับ \r\n', '2023-11-19 10:17:53', 'คุณสุรพันธ์ (พี่ขวัญ)', 45, 'LastUpdate.png'),
(22, 'Done', '', '2023-11-19 10:19:39', 'คุณสุรพันธ์ (พี่ขวัญ)', 45, ''),
(23, 'Done', 'แก้ไขที่ชุด Dev แล้วครับ', '2023-11-19 10:22:31', 'คุณสุรพันธ์ (พี่ขวัญ)', 44, 'SearchLastUpdate.png'),
(24, 'Done', 'ให้ทดสอบจาก ชุด Dev ก่อนครับ \r\n', '2023-11-19 10:24:09', 'คุณสุรพันธ์ (พี่ขวัญ)', 43, ''),
(25, 'On Process', 'อันนี้น่าจะต้องฝากขวัญช่วยดู', '2023-11-22 12:11:31', 'คุณสุรพันธ์ (พี่ขวัญ)', 69, ''),
(26, 'On Process', 'อันนี้ฝากขวัญดูให้นะ', '2023-11-22 12:13:55', 'คุณสุรพันธ์ (พี่ขวัญ)', 70, ''),
(27, 'On Process', 'ตรวจสอบแล้ว เจอเฉพาะ Idea ตัวเอง Public Idea จากคนอื่นๆ ไม่แสดง แสดงเฉพาะของตนเอง\r\nแต่ Owner และ Verifyer จะแสดงทั้งหมด รวมถึง Private Idea ด้วย\r\nhttps://uplevel.pointit.co.th/uplevel/v1/idea/organizationId/c14aadcb-88e9-11ee-8f0b-0242ac1e0002\r\nRequest Method:\r\nGET', '2023-11-22 14:47:09', 'คุณสุรพันธ์ (พี่ขวัญ)', 77, 'SearchNotShowIdea.jpg'),
(28, 'Done', 'ดำเนินการเรียบร้อยแล้ว', '2023-11-23 10:45:49', 'คุณยุทธนา (พี่ตำรวจ)', 70, ''),
(29, 'Done', 'ติดปัญหาเรื่อง front บน IOS ให้แจ้งน้อง outsource แก้ไข', '2023-11-23 10:46:35', 'คุณยุทธนา (พี่ตำรวจ)', 80, ''),
(30, 'Done', 'ติดปัญหาเรื่อง front บน IOS ให้แจ้งน้อง outsource แก้ไข', '2023-11-23 10:48:03', 'คุณสุรพันธ์ (พี่ขวัญ)', 79, ''),
(31, 'Done', 'ติดปัญหาเรื่อง front บน IOS ให้แจ้งน้อง outsource แก้ไข', '2023-11-23 10:48:29', 'คุณสุรพันธ์ (พี่ขวัญ)', 78, ''),
(32, 'Done', 'แก้ไขเรียบร้อย', '2023-11-23 14:15:10', 'คุณยุทธนา (พี่ตำรวจ)', 73, ''),
(33, 'Done', '', '2023-11-23 14:19:08', 'คุณยุทธนา (พี่ตำรวจ)', 73, ''),
(34, 'On Process', 'ไม่แน่ใจว่าเป็นเรื่อง Privacy หรือเปล่า', '2023-11-23 14:20:12', 'คุณสุรพันธ์ (พี่ขวัญ)', 75, ''),
(35, 'Done', 'แก้ไขเรียบร้อย', '2023-11-23 14:21:41', 'คุณยุทธนา (พี่ตำรวจ)', 77, ''),
(36, 'On Process', 'เข้าใจว่าแก้ไขแล้ว', '2023-11-23 14:22:30', 'คุณสุรพันธ์ (พี่ขวัญ)', 85, ''),
(37, 'Done', 'เรียงล่าสุดก่อนตาม requirement พี่เหน่ง ครับ', '2023-11-23 14:26:45', 'คุณยุทธนา (พี่ตำรวจ)', 86, ''),
(38, 'On Process', 'เข้าใจว่าขวัญแก้แล้ว', '2023-11-23 14:28:11', 'คุณสุรพันธ์ (พี่ขวัญ)', 85, ''),
(39, 'On Process', 'อาจจะติดเรื่อง Privacy', '2023-11-23 14:28:54', 'คุณสุรพันธ์ (พี่ขวัญ)', 75, ''),
(40, 'Done', 'แก้ไขแล้ว', '2023-11-23 14:29:31', 'คุณยุทธนา (พี่ตำรวจ)', 74, '');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL,
  `project_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_type` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_crt` datetime NOT NULL,
  `staff_crt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_edit` datetime NOT NULL,
  `staff_edit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_im1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เก็บรูปภาพ',
  `file_im2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_im3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_im4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_task` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`work_id`, `project_name`, `work_type`, `service`, `category`, `items`, `status`, `subject`, `detail`, `requester`, `date_crt`, `staff_crt`, `date_edit`, `staff_edit`, `file_im1`, `file_im2`, `file_im3`, `file_im4`, `file_test`, `device_name`, `add_task`) VALUES
(1, '', 'Service', 'Production', 'Add Idea', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข Padding กับ Spacing', 'เรื่อง Padding กับ Spacing ที่ คาดว่ามีผลต่อ ช่องว่างอยากให้ปรับขนาดพอดีทั้ง ด้านหน้า ด้านหลัง ข้างบน ข้างล่าง ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(2, '', 'Service', 'Production', 'Register', 'New requirement', 'Done', 'แจ้งขอ เพิ่มเติม เงื่อนไขการลงทะเบียนด้วยตัวเอง 2 ทางเลือก', 'ขั้นตอนการลงทะเบียนให้ห้ลงทะเบียนชื่อตัวเอง ว่าจะให้ใช้ชื่อและรูปตามของ Line เลยนะ ถ้า OK ก็จบ ถ้าไม่โอเค ก็เปิดให้ปรับชื่อกับรูปได้ ไม่ต้องถามรายละเอียดอื่น อย่างจังหวัด หรืออุตสาหกรรม เราอยากให้เขาเข้ามาได้ง่ายที่สุดก่อน', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(3, '', 'Service', 'Production', 'Notification', 'New requirement', 'Done', 'แจ้งขอ เพิ่มเติม แจ้งเตือนในกรณีที่ยังไมได้ลงทะเบียน ในขณะใช้งาน', 'ในกรณีที่เข้ามาใน App แต่ยังไม่ลงทะเบียนชื่อตัวเอง App สามารถที่จะขึ้นเตือนว่า ยังไม่ได้ลงทะเบียนชื่อ ขอให้ลงทะเบียนก่อนด้วยการกดปุ่ม นี้', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(4, '', 'Service', 'Production', 'Dashboard', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข Spacing หน้า Dashboard', 'มีปรับ spacing ของ กราฟ หน้า dashboard', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-16 10:37:48', 'คุณภัทราอร (ซีน)', '2023-10-16 10:37:48', 'คุณอภิรักษ์ (แอมป์)', '001.jpg', '', '', '', '', '', ''),
(5, '', 'Service', 'Production', 'Dashboard', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข เลื่อนข้อความหน้าแสดงผลกราฟไปจนสุดทางซ้าย และขวา', 'ให้ตัว หนังสือทั้ง 4 นั่น เลื่อนไปจนสุด ซ้าย ขวา ', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-04 21:51:22', 'คุณภัทราอร (ซีน)', '2023-10-04 21:51:22', '', '', '', '', '', '', '', ''),
(6, '', 'Service', 'Production', 'Register', 'Delected', 'Done', 'แจ้งขอ ลบ หน้า Register ออก', 'ตัดหน้าการ Register หน้านี้ออก ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(7, '', 'Service', 'Production', 'Register', 'Delected', 'Done', 'แจ้งขอ ลบ หน้า Register ให้เอาจังหวัด และ Industry ออก', 'เมื่อกดเข้ามาที่ Application ให้แสดงหน้าการลงทะเบียน แต่เอา จังหวัด และ Industry ออก', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(8, '', 'Service', 'Production', 'Register', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name', 'เปลี่ยนคำเป็น Your Name and Photo ?   (ตัวใหญ่กว่า)\nYou can always change them later. (ตัวเล็กกว่า)\nและปุ่ม Confirm \nตัดคำว่า Register ข้างบนออก', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(9, '', 'Service', 'Production', 'Register', 'New requirement', 'Done', 'แจ้งขอ เพิ่มเติม กรณีเข้าถึงหน้า Register ได้แต่ยังไม่ได้ลงทะเบียน ในแสดงปุ่น Login และลงทะเบียน', 'แต่ถ้าใครเข้ามาถึงหน้านี้ได้ โดยไม่ได้ Register ก็ให้แสดงหน้านี้  เพียงแต่เอา Let’s Get Started ออก \r\nเหลือแต่ Welcome to/Logo/และมีปุ่ม Register อยู่ข้างล่าง ', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-04 22:01:56', 'คุณภัทราอร (ซีน)', '2023-10-04 22:01:56', 'Apirak', '', '', '', '', '', '', ''),
(10, '', 'Service', 'Production', 'Register', 'New requirement', 'Done', 'แจ้งขอ เพิ่มเติม กรณีลงทะเบียนเรียบร้อยแล้วข้อความ และเปลี่ยนชื่อปุ่ม', 'หลังจากที่ทำการลงทะเบียนชื่อเรียบร้อยแล้ว ให้แสดงหน้า เขียนเป็น Hello !\nPlease select organization to work on\nและเปลี่ยนชื่อปุ่ม Create เป็น ปุ่ม Create new organization', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(11, '', 'Service', 'Production', 'Create New Team', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name หน้า Create New Organization ', 'เมื่อกด Create new organization ก็เปิดหน้านี้มา\nเปลี่ยนคำเป็น \nCreate organization profile\nEnter organization name\nSet name and picture.  \nYou will be admin for this organization.\nตามด้วยปุ่ม Confirm', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(12, '', 'Service', 'Production', 'Create New Team', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข ไม่สามารถเลื่อนลงล่างได้ กรณีมี Chanel มากกว่า 1', 'หน้าของ Chanel\nสร้างไป 4 channel ดู ปรากฏว่าอันที่สี่ถูกปัดตกไปอยู่ข้างล่าง เข้าไม่ถึง ช่วยปรับให้เลื่อนลงไปให้ถึงได้ และขนาดของรูป เล็กใหญ่ไม่เท่ากัน อยากให้ปรับให้เท่ากันหมดด้วย', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(13, '', 'Service', 'Production', 'Setting', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name หน้า OR Code : Shared Chanel  เป็นชื่อที่ตั้งตาม Chanel และระบุวัน/เวลา', 'อยากให้เปลี่ยนคำจาก Share Channel เป็นชื่อ Organization (หรือชื่อ channel นั่นๆ) ตามด้วย scan with Line before 27Jul23, 18:04 คือระบุวันเวลาไปเลย\nเอาปุ่ม save ออก หรือเปลี่ยนชื่อปุ่มเป็น Send to Line ก็ได้ ซึ่งเมื่อกดแล้ว ก็จะส่งรูปไปที่ Line Uplevel ของค', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(14, '', 'Service', 'Production', 'Add Idea', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข เมื่อกดถ่ายภาพ สัญลักษณ์จะขยับสูงขึ้น ', 'กดเพิ่มรูป มีให้เลือก 2 ตัวเลือก ไม่มีแบบที่ให้ตลอดหรือครับ จะได้ไม่ต้องถามอีก และพอถ่ายรูปเสร็จ จะเห็นว่าปุ่มกล้องข้างล่างมันขยับสูงขึ้นมานิดนึง', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(15, '', 'Service', 'Production', 'Total Idea', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name \"Hi, Zeen\" ', 'อยากให้เอาตัว Hi, Zeen หรือชื่อตรงนั้นออกด้วยครับ แล้วเปลี่ยนเป็นชื่อ Organization (channel) แทน เวลาดู จะได้รู้ว่านี่อยู่ใน Organization ไหน', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(16, '', 'Service', 'Production', 'Add Idea', 'Delected', 'Done', 'แจ้งขอ ลบ ส่วนที่เป็น Toggle ออก ', 'ตัว ชื่อ ยังมี toggle หดขยายอยู่ น่าจะเอาออกและสังเกตดูว่าตอนหดกลับ จะมีสีเทาอ่อนที่รูปร่างไม่เป็นสี่เหลี่ยมตรงๆ เอา toggle ออกไปแล้ว น่าจะหายไป', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(17, '', 'Service', 'Production', 'Total Idea', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข การจัดเรียง Chart ', 'ใน chart ตัวอักษรเรียงถูกแล้ว แต่กราฟยังไม่ถูกครับ ตอนนี้ เรียงตามเข็มนาฬิกา คือ Onhold, Complete, Verifying, Ongoing.  ต้อวเปลี่ยนเป็น Onhold, Ongoing, Verifying, Complete ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(18, '', 'Incident', 'Production', 'Your Idea', 'Error Application', 'Done', 'แจ้งปัญหา เปิดไอเดียเลื่อนลง หรือกดแก้ไขได้บ้างไม่ได้บ้าง ', 'ตอนเปิดไอเดียดู มันเลื่อนลงมาดูไม่ได้ บางทีเราไม่ได้อยาก edit แต่อยากดูเฉยๆ แต่ดูท่อนล่างไม่ได้ อยากให้ช่วนแก้ให้ดูได้แม้จะไม่ได้ edit ด้วยครับ  และตอน edit ไอเดีย พอมีการแก้ไขอะไรนิดนึง แล้วจะกลับไปกดปุ่ม save ปุ่มมันจะถูกบังอยู่ครึ่งนึง ไม่รู้เป็นเพราะอ', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-04 21:50:32', 'คุณภัทราอร (ซีน)', '2023-10-04 21:50:32', '', '', '', '', '', '', '', ''),
(19, '', 'Incident', 'Production', 'Your Idea', 'Error Application', 'Done', 'แจ้งปัญหา เวลาหน้า Your Idea ไม่ตรง', 'Format เวลา โอเคแล้ว แต่เวลายังไม่ตรง ดูเหมือนช้าไป 7 ชั่วโมง และเวลาในหน้ารวมก็เหมือนจะเป็นเวลาตอนที่สร้างไอเดีย (ที่ช้าไป 7 ชั่วโมง) ถึงจะมีการแก้ไข เวลาในหน้ารวมก็ไม่เปลี่ยนตาม', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-04 21:50:34', 'คุณภัทราอร (ซีน)', '2023-10-04 21:50:34', '', '', '', '', '', '', '', ''),
(20, '', 'Incident', 'Production', 'Add Idea', 'Error Application', 'Done', 'แจ้งปัญหา สร้างไอเดียวใหม่ กดเข้าดูวันที่ Fomat เป็น 1979-1-1', 'ไอเดียที่เพิ่งสร้างขึ้นมาใหม่ เวลาตอนเปิดมาดูจะเป็น 1979-1-1  น่าจะเป็นเวลาที่สร้างมากกว่า', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-04 21:50:36', 'คุณภัทราอร (ซีน)', '2023-10-04 21:50:36', '', '', '', '', '', '', '', ''),
(21, '', 'Service', 'Production', 'Add Idea', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข ช่องที่ยังไม่ได้ใส่ข้อความแสดงเป็น [] ', 'ช่องที่ยังไม่มีข้อมูล แสดงเป็น [] ซึ่งมันดูแปลกๆ ถ้าเปลี่ยนได้ ขอเป็นว่างๆดีกว่าครับ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(22, '', 'Service', 'Production', 'Add Idea', 'Edit/Update', 'Done', 'แจ้งขอ เพิ่มเติม สถานะ Cancel ไม่มีให้เลือก', 'ตอนเปิดไอเดียมา edit จะเปลี่ยน status เป็น cancel แต่ไม่มี cancel ให้เลือกครับ น่าจะเติมเข้าไปนะ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(23, '', 'Service', 'Production', 'Add Idea', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข ตัวอักษร เมื่อกดลบไอเดีย ตัว Cancel กับ OK เล็ก', 'ตอนจะลบ idea  Cancel กับ OK น่าจะใหญ่กว่านี้อีกหน่อยครับ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(24, '', 'Service', 'Production', 'Add Idea', 'New requirement', 'Done', 'แจ้งขอ เพิ่มเติม Category ', 'Category ตอนนี้มี 1 กับ 2 ผมอยากเปลี่ยนเป็น\nCost Saving\nTime Saving\nError Reduction\nMore Sales\nHappy Customers\nBetter H E S\nBetter moral', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(25, '', 'Service', 'Production', 'Total Idea', 'New requirement', 'Done', 'แจ้งขอ เพิ่มเติม You Idea หากตั้ง Private ให้แสดงสัญลักษณ์ด้วย ', 'ผมลองเปลี่ยน idea อันนึงเป็น private หน้ารวม ไอเดียนั้นหายไป ซึ่งถูกต้องแล้ว เปิดรายละเอียดมาดู ยังเห็นไอเดียนั้นอยู่ ซึ่งก็ถูกแล้ว แต่น่าจะมี mark สีแดงนิดนึงให้รู้ว่า ไอเดียนี้ private นะ และตอนเปิดขึ้นมาดู ก็เปิดได้ ซึ่งก็ถูกแล้ว แต่ก็ควรจะมี display เ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(26, '', 'Service', 'Production', 'Dashboard', 'Delected', 'Done', 'แจ้งขอ ลบ Link เมื่อกดที่กราฟ แล้ว Link ไปยัง List Idea', 'ตอนนี้ กดไปกราฟ  จะวิ่งไปที่ list ของ idea อันนี้ ไม่จำเป็นครับ เอาออกไปได้เลย ให้กดแล้วก็ไม่ได้วิ่งไปไหน', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(27, '', 'Service', 'Production', 'Setting Profile', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข รายละเอียด Profiles ', 'หน้านี้ อยากให้เอาชื่อ user (อาทิตย์) ตัวนั้นออกครับ แล้วเปลี่ยนเป็นชื่อ Organization แทน  เปลี่ยนคำว่า Profile Setting เป็น My profile setting แทน อันถัดไป เป็น Share App (เดิม Share Application Uplevel) ถัดไป ให้เป็น Organization Setting (แทน Channel Se', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(28, '', 'Service', 'Production', 'Setting Profile', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข รายละเอียด QR Code ของ Share application uplevel ', 'QR code ของ share application uplevel ก็ควรจะเป็นอีกแบบ คือ เป็น QR ที่ใช้ลง App เฉยๆ ไม่ได้เข้า channel ไหน และควร เขียนว่า Uplevel App (บรรทัดใหญ่) และบรรทัดถัดไปเขียนว่า Code generate 27Jul23, 20:48:56.35  เวลาใครลง App ด้วย QR นี้ ก็จะมี Time stamps อ', 'คุณอาทิตย์ (พี่เหน่ง)', '0000-00-00 00:00:00', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
(29, '', 'Incident', 'Production', 'Dashboard', 'Error Application', 'Done', 'แจ้งปัญหา ใส่ตัวเลขเยอะๆ ทำให้ กราฟ benefit', 'ลองใส่ ตัวเลข onhold เยอะๆ กราฟ benefit เลยเพี้ยนไป ฝากแก้ด้วย', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-04 21:50:38', 'คุณภัทราอร (ซีน)', '2023-10-04 21:50:38', '', '', '', '', '', '', '', ''),
(43, '', 'Incident', 'Production', 'Search', 'Error Application', 'Done', 'แจ้งปัญหา ดู idea ของคนอื่นบ้าง แต่ไม่มีขึ้นมา', 'เข้าไปใน PointIT จะไปดู idea ของคนอื่นบ้าง แต่ไม่มีขึ้นมา ไม่รู้เพราะอะไร ของเดิมก็เคยดูได้อยู่', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-05 15:48:11', 'คุณภัทราอร (ซีน)', '2023-11-19 10:24:09', 'คุณสุรพันธ์ (พี่ขวัญ)', 'S__42246386.jpg', '', '', '', '', '', 'ให้ทดสอบจาก ชุด Dev ก่อนครับ \r\n'),
(44, '', 'Incident', 'Production', 'Search', 'Error Application', 'Done', 'แจ้งปัญหา เวลาที่แสดงในหน้า search ยังไม่ได้เป็นเวลาที่ last update', 'เวลาที่แสดงในหน้า search ยังไม่ได้เป็นเวลาที่ last update', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-05 15:47:27', 'คุณภัทราอร (ซีน)', '2023-11-19 10:22:31', 'คุณสุรพันธ์ (พี่ขวัญ)', 'Screenshot 2023-10-05 154441.png', '', '', '', 'SearchLastUpdate.png', '', 'แก้ไขที่ชุด Dev แล้วครับ'),
(45, '', 'Incident', 'Production', 'Your Idea', 'Error Application', 'Done', 'แจ้งปัญหา เวลา last update ที่หน้าสรุป ยังไม่ได้แก้ไข', ' เวลา last update ที่หน้าสรุป ยังไม่ได้แก้ไข', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-05 15:51:19', 'คุณภัทราอร (ซีน)', '2023-11-19 10:19:39', 'คุณสุรพันธ์ (พี่ขวัญ)', 'Screenshot 2023-10-05 154912.png', '', '', '', '', '', ''),
(46, '', 'Service', 'Production', 'Add Idea', 'New requirement', 'Done', 'ขอบริการ เพิ่มเติม ใส่ตัวอย่าง 5 (Dummy Idea) ทุกครั้งที่มีการสร้าง Organization', 'อยากให้ใส่ dummy idea สักห้าไอเดีย ทุกครั้งที่มีการสร้าง organization (channel) ใหม่ ทำได้มั้ยครับ ?  เอาแบบ Title เป็น\r\n- (ตัวอย่าง) ไอเดียที่กำลังคิดอยู่ \r\n- (ตัวอย่าง) ไอเดียที่กำลังทำอยู่\r\n- (ตัวอย่าง) ไอเดียที่ทำแล้วและรอการประเมินอยู่\r\n- (ตัวอย่าง) ', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-11 09:52:51', 'คุณภัทราอร (ซีน)', '2023-10-11 09:52:51', 'คุณภัทราอร (ซีน)', '', '', '', '', '', '', ''),
(47, '', 'Service', 'Production', 'My Profile setting', 'Error Application\r\n', 'Done', 'แจ้งปัญหา เปลี่ยนรูป Profile แต่หน้าอื่นๆ ของไอเดียไม่เปลี่ยนไปตาม ', 'ผมลองเปลี่ยนรูป profile ผม แต่รูป profile ในแต่ละไอเดีย ดูจะไม่ได้เปลี่ยนตามไปด้วย ไม่น่าจะถูกนะครับ เปลี่ยนทีเดียว น่าจะเปลี่ยนหมด', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-11 10:00:27', 'คุณภัทราอร (ซีน)', '2023-10-11 10:00:27', '', '', '', '', '', '', '', ''),
(48, '', 'Service', 'Production', 'Setting', 'Edit/Update\r\n', 'Done', 'ขอบริการ แก้ไข ข้อความส่วนของ QR Code เป็นชื่อ Organization ', 'ขอบริการ แก้ไข ข้อความส่วนของ QR Code เป็นชื่อ Organization ', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-11 10:13:59', 'คุณภัทราอร (ซีน)', '2023-10-11 10:13:59', '', '', '', '', '', '', '', ''),
(49, '', 'Service', 'Production', 'Link (URL)', 'Edit/Update\r\n', 'Done', 'ขอบริการ แก้ไข Link (URL) ที่แสดงด้านบนออก', 'เอาตัว uplevel-app - uplevel-app ข้างบนสุดนั่นออก และเอา Let’s Get Started ออก \r\n\r\nให้มีแต่ \r\nWelcome to Uplevel ! \r\nตามด้วย \r\nPlease register your details.', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-11 10:30:57', 'คุณภัทราอร (ซีน)', '2023-10-11 10:30:57', '', '2023-10-11_10-30-30.jpg', '', '', '', '', '', ''),
(50, 'Up Level (Phase 1)', 'Service', 'Production', 'Register', 'Edit/Update', 'Done', 'แจ้งขอ แก้ไข การจัดวางตำแหน่งและ เปลี่ยนคำอธิบาย Display name', ' \"ตัวอักษร Register เปลี่ยนเป็น Your details และปรับให้อยู่ตรงกลาง (ตอนนี้ ตัว Register มันเอียงขวาอยู่นิดนึง) เอาบรรทัด Set your display name … ออก เลื่อน box Province กับ Industry ขึ้นมา (ถ้าไม่ยุ่งยาก เตรียมที่จะใส่ Country ในอนาคตด้วยครับ) เติม', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-16 11:00:02', 'คุณภัทราอร (ซีน)', '2023-10-16 11:00:02', 'คุณอภิรักษ์ (แอมป์)', '002.jpg', '', '', '', '', '', ''),
(51, 'Up Level (Phase 1)', 'Service', 'Production', 'Register\r\n', 'Edit/Update\r\n', 'Done', 'แจ้งขอ ลบ คำอธิบายแสดงในส่วนของจังหวัด และเพิ่มเติมบางรายการเข้า', 'ในรายการจังหวัด อยากให้ลบ “ไม่ทราบจังหวัด” ออกแล้วเติม กรุงเทพฯและปริมณฑลไปแทน (อยู่ก่อนกรุงเทพมหานคร) และตอนท้ายสุด เติมอีกสองตัวเลือกคือ “Outside Thailand” กับ “ไม่ระบุ”', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-16 11:01:42', 'คุณภัทราอร (ซีน)', '2023-10-16 11:01:42', '', '003.jpg', '', '', '', '', '', ''),
(52, 'Up Level (Phase 1)', 'Service', 'Production', 'Register\r\n', 'Edit/Update\r\n', 'Done', 'แจ้งขอ แก้ไข รายการใน Industry ', 'ในรายการ Industry อยากให้ลบ Nothing ออก  และเปลี่ยน Bank เป็น Banking และเปลี่ยนช่องสุดท้ายเป็น others และใส่ Electronics, Petrochemicals, Packaging, Manufacturing, IT (แทน ICT), Retail, Oil & Gas, Energy, Fashion, Repair and Service, Food and Beverages (', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-16 11:03:38', 'คุณภัทราอร (ซีน)', '2023-10-16 11:03:38', '', '004.jpg', '', '', '', '', '', ''),
(53, 'Up Level (Phase 1)', 'Service', 'Production', 'Register\r\n', 'Edit/Update\r\n', 'Done', 'แจ้งขอ แก้ไข Consent Form ในการลงทะเบียน', 'แจ้งขอ แก้ไข Consent Form ในการลงทะเบียนผู้ป่วย \r\n\"Customer : ข้อความใน Privacy policy เอาตามที่เสนอมาก่อนก็ได้ครับ เดี๋ยวผมไปหาดูอีกที\r\nPlease read these terms and conditions carefully before using Uplevel app service operated by us.\r\n \r\nConditions of us', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-10-16 11:10:49', 'คุณภัทราอร (ซีน)', '2023-10-16 11:10:49', '', '005.jpg', '', '', '', '', '', ''),
(54, 'Uplevel Application', 'Service', 'Production', 'Create New Team\n\n', 'Edit/Update\r\n', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name ในส่วนของ Create Channel Complated.', '\"แก้ประโยคเป็น \r\nCongrats !\r\nYou account has been\r\nSuccessfully registered !  และแก้ปุ่มเป็น Create Team\"\r\n', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-11-08 12:32:09', 'คุณภัทราอร (ซีน)', '2023-11-08 12:32:09', '', '', '', '', '', '', '', ''),
(55, 'Uplevel Application', 'Service', 'Production', 'Create New Team\r\n\r\n', 'Edit/Update\r\n', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name ในส่วนของ Create Channel.\r\n', '\"เปลี่ยนเป็น \r\nWelcome back !\r\nPlease select your team\r\nและเปลี่ยนปุ่มเป็น create new team \"\r\n', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-11-08 12:32:05', 'คุณภัทราอร (ซีน)', '2023-11-08 12:32:05', '', '', '', '', '', '', '', ''),
(56, 'Uplevel Application', 'Service', 'Production', 'Create New Team\r\n\r\n', 'Edit/Update\r\n', 'Done', 'แจ้งขอ แก้ไข คำอธิบาย Display name ในส่วน Create New Team\r\n', 'เปลี่ยนตัวหนังสือจาก\nCreate organization profile เป็น Team profile\nEnter channel name เป็น Team name\nลบ Set your channel name and profile photo for the channel ออก\nย้าย Industry box มาตรงนี้ เพราะ Industry เกี่ยวกับทีมมากกว่าคน  และเปลี่ยนชื่อในกล่องจาก Industry เป็น what industry ? \nและเติม text ไปใต้ กล่องว่า\nDetails can be edit later', 'คุณอาทิตย์ (พี่เหน่ง)', '2023-11-08 12:32:01', 'คุณภัทราอร (ซีน)', '2023-11-08 12:32:01', '', '', '', '', '', '', '', ''),
(57, 'Uplevel Application', 'Incident', 'Dev Test', 'Register', 'Application Respone', 'Done', 'การ Login เข้าใช้งาน App ในครั้งแรกบางครั้งมีการเด้งไปที่หน้าสร้างทีม โดยไม่ผ่านหน้า Register', 'ถ้าเข้าไปแล้วระบบไปที่หน้าสร้างทีมเลยจะเกิดปัญหาตามภาพที่แนบคะ แต่ถ้าระบบไปที่หน้า Register หน้าสีน้ำเงินจะสามารถเข้าใช้งาน application ได้ปกติคะ ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-14 16:47:41', 'คุณภัทราอร (ซีน)', '2023-11-14 16:47:41', 'คุณสุรพันธ์ (พี่ขวัญ)', '1226.jpg', '', '', '', 'Login Create.png', '', 'ลองทดสอบแล้วไม่พออาการดังกร่าว'),
(58, 'Uplevel Application', 'Incident', 'Dev Test', 'Dashboard', 'Edit/Update', 'Done', 'รบกวนแก้ไขหน้า Team Dashboard โดยให้ยังคงมี () และตัวเลขของสมาชิกในทีม', 'รบกวนแก้ไขหน้า Team Dashboard โดยให้ยังคงมี () และตัวเลขของสมาชิกในทีม แบบเดิม หลังชื่อทีม อาทิเช่น Health Food (2)', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-09 13:23:10', 'คุณภัทราอร (ซีน)', '2023-11-09 13:23:10', 'คุณภัทราอร (ซีน)', 'Team.jpg', '', '', '', '', '', 'ดำเนินการเรียบร้อย แต่ตอนที่แสดงข้อมูลมันจะซ้ำซ้อนนะ แจ้งให้ทราบ'),
(59, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Team member(s)', 'Edit/Update', 'Done', 'แก้ไขหน้าการแสดงผลหลังจากที่มีการ Invite เข้าทีม', 'ในกรณีที่เรา Scan QR cord เข้าร่วมทีม ที่เพื่อนเชิญมา ระบบควรแสดงไปยังหน้าทีมที่เพื่อเชิญให้เราเข้าร่วมทีม ไม่ควรเป็นหน้าทีมที่เราเข้าค้างไว้จากครั้งก่อนคะ \r\nตรงกับที่ทางพี่เหน่งขอมาคะ *และเมื่อ scan แล้ว ผมอยากให้ app ของคนที่ scan มันวิ่งไปที่หน้าหลักของ ทีมๆที่เพิ่ง scan เลยตอนนี้ ที่ผมลองดู ด้วยอีกเครื่องนึง แม้จะเข้าเป็นสมาชิกเรียบร้อยแล้ว แต่หน้าใน App ที่เปิดยังเป็นหน้าทีมเดิมที่ใช้งานอยู่ เลยไม่รู้ว่า add เข้ามาสำเร็จมั้ยจนกว่าจะถอยออกมาก่อน*', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-14 16:43:01', 'คุณภัทราอร (ซีน)', '2023-11-14 16:43:01', 'คุณสุรพันธ์ (พี่ขวัญ)', '', '', '', '', '', '', 'ปรับ Flow เรียบร้อยแล้ว '),
(60, '๊Uplevel Application', 'Incident', 'Dev Test', 'Add Team member(s)', 'Edit/Update', 'Done', 'แก้ไข text ของ QR code ที่ใช้ add team member', 'ขอให้ทำการแก้ไข text ของ QR code ที่ใช้ add team member แก้ไขเป็น  \r\nAdd Team members\r\nGet them to scan this before 08:17:11 (within 3 minutes)', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-09 10:52:14', 'คุณภัทราอร (ซีน)', '2023-11-09 10:52:14', 'คุณสุรพันธ์ (พี่ขวัญ)', 'Add member.jpg', '', '', '', 'Invite QR.png', '', 'แก้ไขเรียบร้อย'),
(61, 'Uplevel Application', 'Incident', 'Dev Test', 'Share Uplevel to others', 'Edit/Update', 'Done', 'แก้ไข taxt QR code ที่ใช้ share uplevel ', 'แก้ไข taxt QR code ที่ใช้ share uplevel ให้คนอื่น (บอกต่อให้เพื่อนใช้) ควรเปลี่ยน text เป็น\r\nScan QR code to install Uplevel App to Line account. \r\nCap screen for sharing, or\r\nและมีปุ่ม \r\nsend link to Line \r\nอยู่ด้านล่าง', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-09 10:42:47', 'คุณภัทราอร (ซีน)', '2023-11-09 10:42:47', 'คุณสุรพันธ์ (พี่ขวัญ)', 'Share App.jpg', '', '', '', 'share QR.png', '', 'แก้ไขเรียบร้อบครับ'),
(62, 'Uplevel Application', 'Incident', 'Dev Test', 'My Profile setting', 'Application Respone', 'Done', 'ระบบไม่ดึง Display name ใน Line มาแสดง', 'หลังจากที่มีการ Register เข้าใช้งานระบบ ปรากฎว่าระบบไม่ดึงชื่อ Display name ที่เราตั้งไว้ในระบบ Line มาให้ ซึ่งก่อนหน้านี้ระบบจะดึงมาให้คะ ตอนนี้ระบบโชว์เป็นสัญลักษณ์แทนคะ ตามรูปแนบ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-09 13:27:39', 'คุณภัทราอร (ซีน)', '2023-11-09 13:27:39', 'คุณภัทราอร (ซีน)', 'S__114024450.jpg', '', '', '', '', '', 'ซีนแจ้งว่า ได้แล้ว '),
(63, 'Uplevel Application', 'Incident', 'Dev Test', 'My Profile setting', 'Application Respone', 'Done', 'ระบบไม่จำชื่อ Profile ที่เราแก้ไข', 'เมื่อทำการแก้ไขชื่อที่ edit profile กดบันทึกเรียบร้อยแล้ว ระบบแสดงชื่อที่ได้มีการแก้ไขใหม่ แต่หลังจากที่ออกจากระบบและเข้าใช้ระบบใหม่อีกครั้งปรากฎว่าระบบกลับแสดงชื่อเดิมที่ได้มีการเปลี่ยนหรือแก้ไขไปแล้ว ตามรูปแบบ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-09 13:43:40', 'คุณภัทราอร (ซีน)', '2023-11-09 13:43:40', 'คุณภัทราอร (ซีน)', 'Display name.png', '', '', '', 'Screenshot 2566-11-09 at 13.42.24.png', '', 'พี่ลองใส่ emoji ก็ save ได้ ออกไป กลับมายังแสดง emoji เดิมอยู่'),
(64, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Team member(s)', 'Error Application', 'Done', 'ชื่อทีมแสดงผลไม่ตรง', 'ทดสอบเชิญเพื่อนเข้าร่วมทีม ปรากฏว่ารูปทีมถูกแต่ชื่อทีมที่แสดงไม่ถูก ตามรูปแนบคะ  ชื่อที่แสดงยังไปจำชื่อทีมเดิมที่เข้าไปสร้าง Idea ก่อนหน้านี้คะ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-14 16:42:22', 'คุณภัทราอร (ซีน)', '2023-11-14 16:42:22', 'คุณสุรพันธ์ (พี่ขวัญ)', 'Invite Team.jpg', '', '', '', 'DisplayTeam.png', '', 'ปรับ Flower invite ใหม่แล้สครับ '),
(65, 'Uplevel Application', 'Incident', 'Dev Test', 'Register', 'Application Respone', 'On Process', 'QR ที่ Expire แล้ว ยังใช้ scan เช้าทีมได้', 'QR ที่หมดอายุแล้ว ยังสามารถนำมาใช้ Scan เข้าทีมได้ปกติ ตาม Flow แล้วควรตอบกลับมาเป็น status: false', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-16 07:54:14', 'คุณนันทิกา (โม)', '2023-11-19 10:11:41', 'คุณสุรพันธ์ (พี่ขวัญ)', 'IMG_5114.jpeg', '', '', '', '', '', 'น่าจะต้องทำเหมือน token ที่มีวันหมดอายุครับพี่ \r\nเพราะถ้า url นี้หลุดไปจะเป็นช่องทางในการเข้าถึงข้อมูลได้ครับ '),
(66, 'Uplevel Application', 'Incident', 'Dev Test', 'Notification', 'Application Respone', 'On Process', 'การแจ้งเตือน Verifier', 'เมื่อเลือก Verifier แล้ว ยังไม่มีการแจ้งเตือนไปที่ verifier คนนั้น', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-16 09:52:48', 'คุณนันทิกา (โม)', '2023-11-16 09:52:48', 'คุณนันทิกา (โม)', 'IMG_5117.jpeg', '', '', '', 'IMG_5123.png', '', 'Save แล้วค่ะ ไม่มีการแจ้งเตือนใดๆ เลยค่ะ'),
(67, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea', 'Edit/Update', 'Done', 'ไม่แสดงชื่อ teammate ', 'เมื่อกดเพิ่ม teammate แล้วไม่ขึ้นชื่อ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-16 08:13:18', 'คุณนันทิกา (โม)', '2023-11-16 08:13:18', 'คุณยุทธนา (พี่ตำรวจ)', 'IMG_5119.jpeg', '', '', '', '', '', 'ชื่อที่ไม่แสดง คือถูกลบไปแล้ว แก้ไขให้แล้วครับ'),
(68, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea\r\n', 'Application Respone', 'On Process', 'add idea ไม่ได้', '', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-22 10:15:38', 'คุณยุทธนา (พี่ตำรวจ)', '0000-00-00 00:00:00', '', '1700623288956.jpg', '', '', '', '', '', ''),
(69, 'Uplevel Application', 'Incident', 'Dev Test', 'Setting', 'Application Respone', 'On Process', 'การ Leave Team', 'เมื่อมีเพื่อนชวนให้เรา Scan QR code ร่วมทีม เราทำการ Scan ทะลุเข้ามาใน Team แล้ว แต่ต้องการ Leave Team ระบบไม่ยอมให้ออกจากทีม ต้องไปแก้ไขหรือปรับปรุง Profile ในส่วน Org (จังหวัด)', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-22 11:19:15', 'คุณกริชเพชร (พี่เด่น)', '2023-11-22 12:11:31', 'คุณสุรพันธ์ (พี่ขวัญ)', '', '', '', '', '', '', 'อันนี้น่าจะต้องฝากขวัญช่วยดู'),
(70, 'Uplevel Application', 'Incident', 'iOS', 'Your Idea_Verifying', 'Application Respone', 'Done', 'เมื่อเลือกคน Verifier แล้วเข้าไปที่หน้า Your Idea ปรากฎว่าเอาชื่อคน Verifier มาด้วย', 'เมื่อเลือกคน Verifier แล้วเข้าไปที่หน้า Your Idea ปรากฎว่าเอาชื่อคน Verifier มาด้วย พอกลับไปที่หน้าการสร้าง Idea ปรากฎว่าช่อง Verifier ไม่ปรากฎชื่อที่ได้เลือกไว้ ต้องมานั่งเลือกใหม่', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-22 11:42:05', 'คุณพิสุทธ์(พี่เชษ)', '2023-11-23 10:45:49', 'คุณยุทธนา (พี่ตำรวจ)', 'Verifier.jpg', '', '', '', '', '', 'ดำเนินการเรียบร้อยแล้ว'),
(71, 'Uplevel Application', 'Incident', 'Dev Test', 'Other', 'New requirement\r\n', 'On Process', 'OPPO ไม่มีฟังก์ชั่นในหน้าของการกรอก Idea ', '', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-22 12:01:56', 'คุณกรกฎ​ (ฮอน)', '0000-00-00 00:00:00', '', '219A0948-C2F4-4BE8-8A4D-AC3B3DC06B1A.jpg', '', '', '', '', '', ''),
(72, 'Uplevel Application', 'Incident', 'Dev Test', 'Your Idea_Complete', 'Application Respone', 'On Process', 'สถานะ Complete ยังคงมีให้เราเลือกในขณะที่เราเลือกคนอื่นเป็น Verifier แล้ว', 'เมื่อเราเลือกให้คนอื่นเป็นสิทธิ์  Verifier แล้ว เราไม่ควรเลือกสถานะ Complete (ไม่ควรเห็นในช่อง Dropdowe list หลังจากที่มีการตั้งค่าคน  Verifier', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-22 13:30:12', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', 'S__115286021.jpg', '', '', '', '', '', ''),
(73, 'Uplevel Application', 'Incident', 'Android', 'Add Idea', 'Application Respone', 'Done', 'Create Idea กำหนดหัวข้อใส่ Emoji Con ไม่สามารถบันทึกได้ ', 'Create Idea กำหนดหัวข้อใส่ Emoji Con ไม่สามารถบันทึกได้ ดังภาพ\r\nกดบันทึก ไม่มีอะไรเกิดขึ้น และค้าง\r\nPhone :  Vivo X70 Pro ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-22 13:47:02', 'คุณอภิรักษ์ (แอมป์)', '2023-11-23 14:19:08', 'คุณยุทธนา (พี่ตำรวจ)', '466105_0.jpg', '', '', '', '', '', ''),
(74, 'Uplevel Application', 'Incident', 'Android', 'Add Idea', 'Application Respone', 'Done', 'Create Idea ใส่ข้อความ และ Emoji Con  ที่ช่องกรอกข้อมูล ไม่สามารถบันทึกได้ ', 'Create Idea ใส่ข้อความ และ Emoji Con  ที่ช่อง : Before, ช่อง : Progress, ช่อง : Learning, ช่อง : After ไม่สามารถบันทึกได้ \r\nกดบันทึก ไม่มีอะไรเกิดขึ้น และค้าง\r\nไม่ใช่ Emoji Con  สามารถบันทึกได้ปกติ\r\nPhone : Vivo X70 Pro', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-22 14:05:45', 'คุณกรกฎ​ (ฮอน)', '2023-11-23 14:29:31', 'คุณยุทธนา (พี่ตำรวจ)', '466121_0.jpg', '', '', '', '', '', 'แก้ไขแล้ว'),
(75, 'Uplevel Application', 'Incident', 'Android', 'Add Idea', 'Application Respone', 'On Process', 'Create Idea เลือกภาพที่อยู่ในเครื่อง ภาพไม่แสดงผล และบันทึกไม่เข้าระบบ ดังภาพ', 'Create Idea เลือกภาพที่อยู่ในเครื่อง ภาพไม่แสดงผล และบันทึกไม่เข้าระบบ ประกอบด้วยภาพ \r\nช่อง : imageBefore, ช่อง : imageProgress, ช่อง : imageLearning, ช่อง : imageAfter \r\nPhone : Vivo X70 Pro', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-22 14:14:58', 'คุณอภิรักษ์ (แอมป์)', '2023-11-23 14:28:54', 'คุณสุรพันธ์ (พี่ขวัญ)', '466130_0.jpg', '', '', '', '', '', 'อาจจะติดเรื่อง Privacy'),
(76, 'Uplevel Application', 'Incident', 'Android', 'Add Idea\r\n', 'Application Respone', 'On Process', 'Create Idea เลือกถ่ายภาพ กล้องไม่แสดงผล ดังภาพ', 'Create Idea เลือกถ่ายภาพ กล้องไม่แสดงผล แต่สามารถเลือกภาพจากคลังภาพได้ และแสดงผลพร้อมกับบันทึกข้อมูลได้ ', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-22 14:31:54', 'คุณอภิรักษ์ (แอมป์)', '0000-00-00 00:00:00', '', '466138_0.jpg', '', '', '', '', '', ''),
(77, 'Uplevel Application', 'Incident', 'Dev Test', 'Your Idea', 'Application Respone', 'Done', 'Search in your team ไม่มี Idea ทั้งหมดของทีมนั้น', 'Search in your team ไม่มี Idea ทั้งหมดของทีมนั้น และเมื่อเลือกดูตามสถานะต่างๆ ก็ไม่เห็นไอเดียของเพื่อนในทีม เห็นแต่ของตัวเอง', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-22 14:27:47', 'คุณนันทิกา (โม)', '2023-11-23 14:21:41', 'คุณยุทธนา (พี่ตำรวจ)', 'S__115286026.jpg', '', '', '', '', '', 'แก้ไขเรียบร้อย'),
(78, 'Uplevel Application', 'Incident', 'Dev Test', 'Other', 'New requirement', 'Done', 'ตัวอักษรคำว่า ', 'เป็นที่เครื่องระบบปฏิบัติการ iOS ', 'คุณนันทิกา (โม)', '2023-11-22 16:33:09', 'คุณกริชเพชร (พี่เด่น)', '2023-11-23 10:48:29', 'คุณสุรพันธ์ (พี่ขวัญ)', 'S__115302404.jpg', '', '', '', '', '', 'ติดปัญหาเรื่อง front บน IOS ให้แจ้งน้อง outsource แก้ไข'),
(79, 'Uplevel Application', 'Incident', 'iOS', 'Other', 'New requirement', 'Done', 'คำสะกดผิด ', '', 'คุณนันทิกา (โม)', '2023-11-22 16:41:45', 'คุณพิสุทธ์(พี่เชษ)', '2023-11-23 10:48:03', 'คุณสุรพันธ์ (พี่ขวัญ)', 'S__6111261.jpg', '', '', '', '', '', 'ติดปัญหาเรื่อง front บน IOS ให้แจ้งน้อง outsource แก้ไข'),
(80, 'Uplevel Application', 'Incident', 'Android', 'Other', 'New requirement', 'Done', 'คำสะกดผิด ', 'ทดสอบด้วยเครื่อง แอนดรอย', 'คุณนันทิกา (โม)', '2023-11-22 16:47:33', 'คุณพิสุทธ์(พี่เชษ)', '2023-11-23 10:46:35', 'คุณยุทธนา (พี่ตำรวจ)', '627906.jpg', '', '', '', '', '', 'ติดปัญหาเรื่อง front บน IOS ให้แจ้งน้อง outsource แก้ไข'),
(81, 'Uplevel Application', 'Incident', 'Dev Test', 'Search', 'New requirement\r\n', 'On Process', 'เพิ่ม ฟังก์ชั่น การค้นหาโดยใช้ คำสั่ง Usage และ จบด้วย Empty', 'ข้อให้ช่วยเพิ่มฟังก์ชั่น คำสั่ง Usage และ จบด้วย Empty ในหมวด List รายการเรียกดูของการ Search , การแจ้งเตือน, Add team member', 'คุณนันทิกา (โม)', '2023-11-23 12:11:36', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '1.jpg', '', '', '', '', '', ''),
(84, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea\r\n', 'Application Respone', 'On Process', 'การโชว์ ชื่อให้ ตั้ง  เห็น ก่อน ตั้ง เป็น ไม่มี ไม้เอก ', 'โชว์ ชื่อ ก่อน ตั้ง ชื่อ ไม่ครบ อักษร ', 'คุณสุรพันธ์ (พี่ขวัญ)', '2023-11-23 13:35:17', 'คุณกริชเพชร (พี่เด่น)', '0000-00-00 00:00:00', '', 'S__56614915-2.jpg', 'S__56614915-2.jpg', 'S__56614915-2.jpg', 'S__56614915-2.jpg', '', 'Apple', ''),
(85, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Team member(s)', 'Application Respone', 'On Process', 'Scanแล้วไม่ทะลุเข้ากลุ่ม', 'เมื่อเพื่อนส่ง QR Code กลุ่มมาให้Scanเข้ากลุ่ม  หลังจากนั้น Scan เพื่อเข้ากลุ่ม จากนั้นมาค้างที่หน้า dashboard ทีม ไม่สามารถทะลุเข้ากลุุ่มหน้า ไอเดียกลุ่มเลย', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 13:48:58', 'คุณพิสุทธ์(พี่เชษ)', '2023-11-23 14:28:11', 'คุณสุรพันธ์ (พี่ขวัญ)', 'S__6119427.jpg', '', '', '', '', 'Apple', 'เข้าใจว่าขวัญแก้แล้ว'),
(86, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea', 'Application Respone', 'Done', 'พอสร้าง Ided ใหม่ ไม่ขึ้น โชว์ ในด้าน บน หน้า Search in your Team ', 'ไม่โชว์เรียง ตาม วันที่ เวลา  ด้านบน ล่าสุด \r\nอยู่ด้านล่าง เเทน  ตาม verifying   Ongoing  On Hold  จะเรียงกัน ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 13:57:42', 'คุณกริชเพชร (พี่เด่น)', '2023-11-23 14:26:45', 'คุณยุทธนา (พี่ตำรวจ)', '23-11-2566 13-47-09.jpg', '', '', '', '', 'Apple', 'เรียงล่าสุดก่อนตาม requirement พี่เหน่ง ครับ'),
(87, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea\r\n', 'Application Respone', 'On Process', 'Private เเล้ว เเชร์ ให้ คนอื่นโชว์ ไม่ได้', 'สร้าง  Ided ตั้งค่า เป็น Private   ให้ 1 คน  โชว์ไปที่อีกคน ไม่ได้', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 14:45:18', 'คุณกริชเพชร (พี่เด่น)', '0000-00-00 00:00:00', '', '30-08-2566 13-27-59.png', '23-11-2566 14-19-11.jpg', '', '', '', 'Apple', ''),
(88, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea\r\n', 'Edit/Update\r\n', 'On Process', 'สร้างไอเดียแล้วการ์ดไอเดียอยู่ด้านล่างสุด', 'สร้างไอเดียแล้วการ์ดไอเดียอยู่ด้านล่างสุด เวลาสร้างไอเดียใหม่จะต้องขึ้นบนสุดเหมือนกันแก้ไขหรือการเข้าใช้งานไอเดียนั้นๆ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 15:05:00', 'คุณอภิรักษ์ (แอมป์)', '0000-00-00 00:00:00', '', 'Screenshot_20231123_150405.jpg', '', '', '', '', 'vivo', ''),
(89, 'Uplevel Application', 'Incident', 'Dev Test', 'Add Idea\r\n', 'Application Respone', 'On Process', 'QR code ครบ 3 นาที่ เเล้ว ยังเข้ากลุ่ม ได้ ', '- ถ้าครบ ได้ 3 นาที่เเล้ว ไม่ควร เข้ากลุ่มต้อง มี  popup เเจ้งเตือน ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 15:33:15', 'คุณกริชเพชร (พี่เด่น)', '0000-00-00 00:00:00', '', '467300.jpg', '467299.jpg', '', '', '', 'Apple', ''),
(90, 'Uplevel Application', 'Incident', 'Dev Test', 'Other', 'Application Respone', 'On Process', 'การเรียงลำดับ Idea ในหน้า Search in your Team ไม่เรียงตามลำดับเวลาการใน Update ข้อมูล', 'การเรียงลำดับ Idea ในหน้า Search in your Team ไม่เรียงตามลำดับเวลาการใน Update ข้อมูล  ควรจะต้องให้ข้อมูลของ Idea ที่มีการ Update ล่าสุด อยู่ด้านบนคะ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 17:06:02', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '1700729832303.jpg', '', '', '', '', 'All', ''),
(91, 'Uplevel Application', 'Incident', 'Dev Test', 'Notification\r\n', 'New requirement\r\n', 'On Process', 'ไอคอน ถังขยะ กับ ลูกศรชี้ถัดไป ติดกันเกินไป', 'ไอคอน ถังขยะ กับ ลูกศรชี้ถัดไป ติดกันเกินไป เวลาผู้ใช้งานกดอาจเผลอไปโดยปุ่มลบโดยที่ไม่ได้ตั้งใจ อยากให้ขยับให้ห่างกันหน่อยคะ เพื่อป้องกันความผิดพลาดคะ', 'คุณยุทธนา (พี่ตำรวจ)', '2023-11-23 17:08:41', 'คุณภัทราอร (ซีน)', '0000-00-00 00:00:00', '', '1700730070700.jpg', '', '', '', '', 'All', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

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
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
