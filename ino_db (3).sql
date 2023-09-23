-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 07:26 PM
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
-- Database: `ino_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_scat` varchar(255) NOT NULL COMMENT 'Service Category',
  `cat_sub` varchar(255) NOT NULL COMMENT 'Category',
  `cat_item` varchar(255) NOT NULL COMMENT 'Sub Category',
  `problem` varchar(255) NOT NULL COMMENT 'Problem',
  `site` varchar(255) NOT NULL COMMENT 'โครงการ',
  `cat_case` varchar(255) NOT NULL COMMENT 'สาเหตุ',
  `cat_resovle` varchar(255) NOT NULL COMMENT 'วิธีการแก้ไข',
  `cate_staff` varchar(255) NOT NULL COMMENT 'ผู้บันทึก',
  `cate_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_scat`, `cat_sub`, `cat_item`, `problem`, `site`, `cat_case`, `cat_resovle`, `cate_staff`, `cate_crt`) VALUES
(1, 'LIS Systems', 'Service Interface Program', 'Error ', 'ปัญหาไม่สามารถใช้งานระบบ LIS เนื่องจาก Service Interface Program ขึ้น Error ', 'โรงพยาบาลมิตรไมตรี (Lab)', 'Parameter Log ที่ส่งมาจากระบบ HIS ไม่ตรงกับ Service Interface ตัวรับ จึงทำให้เกิด Error (HL7)', 'ลบ Log Files HL7 ออก ทำการ Backup ข้อมูลไว้ Run Service Interface Programs สามารถใช้งานได้ปกติ', 'Apirak Bangpuk', '2023-09-02 08:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL COMMENT 'รหัส',
  `contact_fullname` varchar(255) NOT NULL COMMENT 'ชื่อ-สกุล',
  `contact_position` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  `contact_agency` varchar(200) NOT NULL COMMENT 'หน่วยงาน',
  `contact_tel` varchar(25) NOT NULL COMMENT '้เบอร',
  `contact_email` varchar(50) NOT NULL COMMENT 'อิเมล',
  `contact_detail` varchar(255) NOT NULL COMMENT 'รายละเอียดบริษัทและธุรกิจ',
  `contact_company` varchar(255) NOT NULL COMMENT 'บริษัท',
  `contact_type` varchar(255) NOT NULL COMMENT 'ลูกค้า,พนักงาน,หุ่นส่วน',
  `contact_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้าง',
  `contact_staff` text NOT NULL COMMENT 'ผู้สร้าง',
  `contact_province` varchar(255) NOT NULL COMMENT 'จังหวัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_fullname`, `contact_position`, `contact_agency`, `contact_tel`, `contact_email`, `contact_detail`, `contact_company`, `contact_type`, `contact_crt`, `contact_staff`, `contact_province`) VALUES
(10, 'นายตรีลุพธ์ ธูปกระจ่าง', 'นายกเทศบาลนครนครรังสิต', 'เทศบาลนครนครรังสิต', '(025) 676-0000', 'rangsitcity@gmail.com', 'เทศบาลนครนครรังสิต เลขที่ 151 ถนนรังสิต-ปทุมธานี ตำบลประชาธิปัตย์ อำเภอธัญบุรี จังหวัดปทุมธานี 12130 0-2567-6000 02-567-6000 ต่อ 131', 'เทศบาลนครนครรังสิต', 'Customer', '2023-09-02 06:09:23', 'Apirak bangpuk', '36f7051a199d39d46449e5f50920e1a5cc007317'),
(12, 'นายสิรวิชฐ์ อำไพวงษ์', 'นายกเทศบาลตาบลบ่อวิน', 'องค์การบริหารส่วนตำบลบ่อวิน', '(038) 345-918_', 'admin@bowin.go.th', 'องค์การบริหารส่วนตำบลบ่อวิน เลขที่ 1 หมู่ที่ 6 ตำบลบ่อวิน อำเภอศรีราชา จังหวัดชลบุรี 20230 โทรศัพท์ 0-3834-5949 ,0-3834-5918 โทรสาร 0-3834-6116 สายด่วนร้องทุกข์ 24 ชม. 08-1949-7771', 'องค์การบริหารส่วนตำบลบ่อวิน', 'Customer', '2023-09-02 06:11:27', 'Apirak bangpuk', '8d67df5e76466cb0e3e61eef70e9ef1d0c8f1e0e'),
(13, 'อ.ชะนวนทอง ธนสุกาญจน์', 'คณบดีคณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล', 'คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล', '(081) 823-7880', 'chanuantong.tan@mahidol.ac.th', '420/1 ถนน ราชวิถี แขวง ทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร 10400\r\nคณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล', 'มหาวิทยาลัยมหิดล', 'Customer', '2023-09-02 11:07:49', 'Apirak bangpuk', 'd5d600b3ca994884c37c8fb8bdc5501ffd5e932f'),
(14, 'คุณชาคริยา นาคมณี', 'Customer', 'บริษัท เอเชี่ยน เอ็กซ์ฟิดิชั่น จำกัด', '(090) 317-7256', 'Non@non.co.th', '9/1 อาคารมูลนิธิสนธิอิสลาม ชั้น 4 ห้อง 402 ถนนอรุณอมรินทร์ แขวงอรุณอมรินทร์ เขตบางกอกน้อย กรุงเทพมหานคร\r\nบริษัท เอเชี่ยน เอ็กซ์ฟิดิชั่น จำกัด', 'บริษัท เอเชี่ยน เอ็กซ์ฟิดิชั่น จำกัด', 'Customer', '2023-09-02 11:19:04', 'Apirak bangpuk', 'd5d600b3ca994884c37c8fb8bdc5501ffd5e932f'),
(15, 'Pakorn Kulsupakorn', 'Customer', 'สถาบันส่งเสริมการสอนวิทยาศาสตร์และเทคโนโลยี (สสวท.)', '(086) 680-4500', 'pkuls@ipst.ac.th', 'เลขที่ 924 ถนนสุขุมวิท แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10110\r\nสถาบันส่งเสริมการสอนวิทยาศาสตร์และเทคโนโลยี (สสวท.)', 'สถาบันส่งเสริมการสอนวิทยาศาสตร์และเทคโนโลยี (สสวท.)', 'Customer', '2023-09-02 11:30:03', 'Apirak bangpuk', 'd5d600b3ca994884c37c8fb8bdc5501ffd5e932f');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `doc_id` int(11) NOT NULL COMMENT 'รหัส',
  `folder_name` varchar(255) NOT NULL COMMENT 'เลือกโฟลเดอร์ที่ต้องการเก็บข้อมูล',
  `doc_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้าง',
  `doc_staff` varchar(100) NOT NULL COMMENT 'ผู้สร้าง',
  `project_name` varchar(255) NOT NULL COMMENT 'โปรเจค',
  `task_name` varchar(255) NOT NULL,
  `doc_type` varchar(45) NOT NULL COMMENT 'ประเภอเอกสาร',
  `doc_name` varchar(100) NOT NULL COMMENT 'ชื่อเอกสาร',
  `doc_link` varchar(200) NOT NULL COMMENT 'แนบลิงค์',
  `doc_remark` varchar(200) NOT NULL COMMENT 'รายละเอียดเพิ่มเติม',
  `doc_status` varchar(255) NOT NULL COMMENT 'สถานะเอกสาร',
  `file_upfile` varchar(255) NOT NULL COMMENT 'ไฟล์อัพโหลด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`doc_id`, `folder_name`, `doc_crt`, `doc_staff`, `project_name`, `task_name`, `doc_type`, `doc_name`, `doc_link`, `doc_remark`, `doc_status`, `file_upfile`) VALUES
(34, 'Amp', '2023-09-02 14:41:04', 'Apirak bangpuk', 'Health Care', 'Emergency', 'Word', 'แผนการดำเนินการโครงการ 2023', 'http://localhost/ino/doc_add.php', 'แผนการดำเนินการโครงการ 2023', 'Complated', ''),
(35, 'New', '2023-09-02 14:34:09', 'Apirak bangpuk', 'ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกล', 'Emergency', 'Word', 'ใบเสนอราคา', '', 'ใบเสนอราคา', 'Complated', ''),
(36, 'New', '2023-09-02 14:42:52', 'Apirak bangpuk', 'ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกล', 'Emergency', 'Excel', 'แผนการดำเนินการโครงการใหม่', '', 'แผนการดำเนินการโครงการใหม่', 'Complated', '');

-- --------------------------------------------------------

--
-- Table structure for table `folder_doc`
--

CREATE TABLE `folder_doc` (
  `folder_id` int(11) NOT NULL COMMENT 'รหัส',
  `folder_name` varchar(255) NOT NULL COMMENT 'ชื่อโฟร์เดอร์',
  `folder_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้าง',
  `folder_staff` varchar(255) NOT NULL COMMENT 'ผู้สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder_doc`
--

INSERT INTO `folder_doc` (`folder_id`, `folder_name`, `folder_crt`, `folder_staff`) VALUES
(14, '06/11/2023-Apirak', '2023-06-11 11:33:39', 'Apirak bangpuk'),
(15, 'Amp', '2023-06-27 15:04:37', 'Apirak bangpuk'),
(16, 'xzcxzc', '2023-06-27 15:05:12', 'Apirak bangpuk'),
(17, 'New', '2023-09-02 13:48:58', 'Apirak bangpuk');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline`
--

CREATE TABLE `pipeline` (
  `pip_id` int(11) NOT NULL COMMENT 'เลขไอดีของ Project',
  `project_name` varchar(255) NOT NULL COMMENT 'ชื่อโครงการ',
  `project_product` varchar(255) NOT NULL COMMENT 'ชื่อผลิตภัณฑ์',
  `project_brand` varchar(255) NOT NULL COMMENT 'แบรน์',
  `pip_vat` varchar(255) NOT NULL COMMENT 'Vat',
  `pip_salen` int(11) NOT NULL COMMENT 'ราคาขายไม่รวมภาษี Amount/Manaul',
  `pip_sale` int(11) NOT NULL COMMENT 'ราคาขายรวมภาษี',
  `pip_costn` int(11) NOT NULL COMMENT 'ราคาต้นทุนไม่รวมภาษี Amount/Manaul',
  `pip_cost` int(11) NOT NULL COMMENT 'ราคาทุนรวมภาษี',
  `pip_gp` int(11) NOT NULL COMMENT 'ผลกำไร',
  `pip_gp2` int(11) NOT NULL COMMENT 'ผลกำไร (%)',
  `pip_p` varchar(255) NOT NULL COMMENT 'ประมาณการโครงการ  Dropdown/Manaul',
  `contact_id` int(11) NOT NULL COMMENT 'Contact',
  `pip_r` varchar(255) NOT NULL COMMENT 'เพิ่มเติม',
  `pip_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันเดือนปีที่สร้าง',
  `pip_staff` varchar(255) NOT NULL COMMENT 'ผู้สร้าง',
  `pip_ess` int(11) NOT NULL COMMENT 'ประมาณการขาย',
  `pip_esc` int(11) NOT NULL COMMENT 'ประมาณการต้นทุน',
  `pip_esp` int(11) NOT NULL COMMENT 'ประมาณผลกำไร',
  `date_start` date NOT NULL COMMENT 'วันเริ่มโครงการ',
  `date_end` date NOT NULL COMMENT 'วันสิ้นสุดโครงการ',
  `status` varchar(255) NOT NULL COMMENT 'Win,Loss',
  `con_number` varchar(255) NOT NULL COMMENT 'เลขที่สัญญา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipeline`
--

INSERT INTO `pipeline` (`pip_id`, `project_name`, `project_product`, `project_brand`, `pip_vat`, `pip_salen`, `pip_sale`, `pip_costn`, `pip_cost`, `pip_gp`, `pip_gp2`, `pip_p`, `contact_id`, `pip_r`, `pip_date`, `pip_staff`, `pip_ess`, `pip_esc`, `pip_esp`, `date_start`, `date_end`, `status`, `con_number`) VALUES
(6, 'ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกล', 'KYD', 'Emergency Platform', '7', 500000, 535000, 300000, 321000, 200000, 40, '100', 10, 'ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกลโดย เจ้าหน้าที่ประจำศูนย์command centerเทศบาลนครรังสิต  POC อุปกรณ์จำนวน 15 ตัว ระยะเวลา 01-04-56 ถึง 30-09-56 \r\n', '2023-09-01 18:12:35', 'Apirak bangpuk', 500000, 300000, 200000, '2023-05-01', '2023-09-30', 'On-Hold', 'TH20230501'),
(7, 'โครงการ นวัตกรรมบริการชุมชนเพื่อควบคุมการแพร่ระบาดเชื้อไวรัสโคโรน่า 2019 ย่านนวัตกรรมการแพทย์โยธี', 'KYD', 'Health Care', '7', 1457480, 1559504, 600000, 642000, 857480, 59, '100', 13, 'โครงการ นวัตกรรมบริการชุมชนเพื่อควบคุมการแพร่ระบาดเชื้อไวรัสโคโรน่า 2019 ย่านนวัตกรรมการแพทย์โยธี', '2023-09-02 11:15:23', 'Apirak bangpuk', 1457480, 600000, 857480, '2022-02-01', '2023-12-31', 'Done', 'QT-000000809'),
(8, 'ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกล', 'KYD', 'Emergency Platform', '7', 500000, 535000, 300000, 321000, 200000, 40, '100', 10, 'ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกลโดย เจ้าหน้าที่ประจำศูนย์command centerเทศบาลนครรังสิต  POC อุปกรณ์จำนวน 15 ตัว ระยะเวลา 01-04-56 ถึง 30-09-56 \r\n', '2023-09-01 16:09:53', 'Apirak bangpuk', 500000, 300000, 200000, '2023-05-01', '2023-09-30', 'On Process', 'TH20230501'),
(9, 'ติดตั้งระบบ Access Control (Aiface) ร่าง TOR (สถาบันสุขภาพจิต)', 'Facescan', 'Aiface', '7', 182700, 195489, 100000, 107000, 82700, 45, '100', 14, 'Lost ติดตั้งระบบ Access Control (Aiface) ร่าง TOR (สถาบันสุขภาพจิต) Lost เนื่องจากลูกค้าเปลี่ยนรูปแบบการใช้เปฌนแบบที่ไม่ใช่ Facescan', '2023-09-02 11:21:36', 'Apirak bangpuk', 182700, 100000, 82700, '2023-02-28', '2023-12-31', 'Done', ''),
(10, 'โครงการซื้อระบบ Access Control', 'Facescan', 'Aiface', '7', 136449, 146000, 100000, 107000, 36449, 27, '100', 14, 'โครงการซื้อระบบ Access Control ติดตั้งระบบ Access Control ที่อาคารชั่วคราว ยูนิตเลขที่ 903-904 ชั้น 9 อาคารสิริภิญโญ 475 ถนนศรีอยุธยา แขวงถนนพญาไท เขตราชเทวี กรุงเทพฯ\r\nชุดอุปกรณ์ ZK 4 Set', '2023-09-02 11:32:35', 'Apirak bangpuk', 136449, 100000, 36449, '2023-01-27', '2023-02-03', 'Done', 'ศธ 5305.2/468');

-- --------------------------------------------------------

--
-- Table structure for table `pip_file`
--

CREATE TABLE `pip_file` (
  `file_id` int(11) NOT NULL COMMENT 'Key',
  `pip_id` int(11) NOT NULL COMMENT 'เชื่อมข้อมูลโครกการ',
  `t_name` varchar(255) NOT NULL COMMENT 'โฟรเดอร์',
  `file_type` varchar(11) NOT NULL COMMENT 'ชนิดไฟล์',
  `file_name` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์',
  `file_upfile` varchar(255) NOT NULL COMMENT 'ไฟล์',
  `file_link` varchar(255) NOT NULL COMMENT 'Link Google Drive',
  `file_r` varchar(255) NOT NULL COMMENT 'คำอธิบาย',
  `file_status` varchar(255) NOT NULL COMMENT 'สถานะ',
  `file_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้าง',
  `file_staff` varchar(255) NOT NULL COMMENT 'ผู้สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pip_file`
--

INSERT INTO `pip_file` (`file_id`, `pip_id`, `t_name`, `file_type`, `file_name`, `file_upfile`, `file_link`, `file_r`, `file_status`, `file_date`, `file_staff`) VALUES
(1, 5, 'Work', 'Word', 'รายงานงวดงานที่ 1', 'Data.xlsx', 'https://github.com/Amp-Apirak/ino/tree/dev-4', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Complated', '2023-09-03 17:18:18', 'Apirak Bangpuk'),
(2, 7, 'Work', 'Word', 'รายงานงวดงานที่ 1', 'Data.xlsx', 'https://github.com/Amp-Apirak/ino/tree/dev-4', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Complated', '2023-09-03 17:18:16', 'Apirak Bangpuk'),
(3, 6, 'Work', 'Word', 'รายงานงวดงานที่ 1', 'Data.xlsx', 'https://github.com/Amp-Apirak/ino/tree/dev-4', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Complated', '2023-09-03 17:16:25', 'Apirak bangpuk'),
(4, 6, 'Work', 'Word', 'รายงานงวดงานที่ 2', 'INO  Pipeline.xlsx', 'https://drive.google.com/drive/u/0/my-drive 456', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Wait Approve', '2023-09-03 17:16:28', 'Apirak bangpuk'),
(5, 9, 'Work', 'Excel', 'รายงานงวดงานที่ 1', 'INO  Pipeline (1).xlsx', 'https://drive.google.com/drive/u/0/my-drive 45633', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Process', '2023-09-03 17:16:31', 'Apirak bangpuk'),
(6, 9, 'Work', 'Presentatio', 'รายงานงวดงานที่ 2', 'รายงานงานดูแลบำรุงรักษาแบบแก้ไขเหตุชำรุ.docx', 'https://drive.google.com/drive/u/0', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Wait Approve', '2023-09-03 17:16:35', 'Apirak bangpuk'),
(7, 7, 'Work', 'PDF', 'รายงานงวดงานที่ 2', 'Investor Relations - Sitemap VSK.pdf', 'https://docs.google.com/document/d/1EjTWrHHDzXUtaUwOcwiNwNHbOeuf-bmIn9j_XV5fCC0/edit', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Complated', '2023-09-03 17:16:38', 'Apirak bangpuk'),
(8, 5, 'Work', 'Word', 'รายงานงวดงานที่ 2', 'Data.xlsx', 'https://github.com/Amp-Apirak/ino/tree/dev-4', 'เปอร์เซ็นต์ คืออะไร หลักการพื้นฐานของเรื่องนี้ เปอร์เซ็นต์ (%) หมายถึง ร้อยละ/เศษส่วนที่มีส่วนเป็น 100 เสมอ ดังนั้นทุกครั้งที่คำนวณเปอร์เซ็นต์จะต้องคิดจาก 100 ทุกครั้ง', 'Complated', '2023-09-03 17:18:18', 'Apirak Bangpuk');

-- --------------------------------------------------------

--
-- Table structure for table `pip_folder`
--

CREATE TABLE `pip_folder` (
  `type_id` int(11) NOT NULL,
  `pip_id` int(11) NOT NULL COMMENT 'Docker',
  `t_name` varchar(255) NOT NULL COMMENT 'ชื่อโฟรเดอร์',
  `type_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้าง',
  `type_staff` varchar(255) NOT NULL COMMENT 'ผู้สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pip_folder`
--

INSERT INTO `pip_folder` (`type_id`, `pip_id`, `t_name`, `type_date`, `type_staff`) VALUES
(1, 9, 'Amp', '2023-09-03 09:03:44', 'Apirak Bangpuk'),
(2, 7, 'OK', '2023-09-03 09:20:15', 'Apirak bangpuk'),
(3, 7, 'PPPP', '2023-09-03 09:21:04', 'Apirak bangpuk'),
(4, 9, 'PPPPK', '2023-09-03 09:22:52', 'Apirak bangpuk'),
(5, 9, 'Apirak', '2023-09-03 09:25:58', 'Apirak bangpuk'),
(6, 9, 'XXXX', '2023-09-03 09:27:23', 'Apirak bangpuk'),
(7, 9, 'OOL', '2023-09-03 09:37:01', 'Apirak bangpuk');

-- --------------------------------------------------------

--
-- Table structure for table `pip_period`
--

CREATE TABLE `pip_period` (
  `p_id` int(11) NOT NULL COMMENT 'เลขไอดีของ period',
  `pip_id` int(11) NOT NULL COMMENT 'เลขไอดีของ Project',
  `pip_ps` varchar(255) NOT NULL COMMENT 'งวดชำระเงิน (เพิ่มได้มากกว่า 1 )',
  `pip_month` varchar(255) NOT NULL COMMENT 'เดือน',
  `pip_pst` int(11) NOT NULL COMMENT 'งวดชำระเงิน (%) Amount/Manaul',
  `pip_psw` int(11) NOT NULL COMMENT 'คำนวณราคาขายจาก %',
  `pip_pssum` int(11) NOT NULL COMMENT 'รวมกันต้องได้ 100 % และเท่ากับราคาขาย '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pip_period`
--

INSERT INTO `pip_period` (`p_id`, `pip_id`, `pip_ps`, `pip_month`, `pip_pst`, `pip_psw`, `pip_pssum`) VALUES
(1, 1, 'ชำระเงินงวดแรก', 'มกราคม', 20, 100000, 10000),
(2, 1, 'ชำระเงินงวด 2', 'มิถุนายน', 20, 100000, 10000),
(3, 2, 'ชำระเงินงวด 1', 'เมษายน', 50, 750000, 750000),
(6, 0, 'ชำระงวดที่ 1', 'January', 50, 50, 0),
(7, 0, 'Select', 'Select', 0, 0, 0),
(8, 0, 'Select', 'Select', 0, 0, 0),
(13, 0, 'ชำระงวดที่ 1', 'January', 50, 0, 0),
(14, 0, 'ชำระงวดที่ 1', 'January', 50, 0, 0),
(15, 0, 'ชำระงวดที่ 1', 'January', 50, 0, 0),
(16, 0, 'ชำระงวดที่ 1', 'January', 50, 0, 0),
(17, 0, 'ชำระงวดที่ 1', 'January', 50, 0, 0),
(21, 0, 'ชำระงวดที่ 1', 'March', 50, 0, 0),
(22, 0, 'ชำระงวดที่ 5', 'January', 70000, 0, 0),
(23, 0, 'ชำระงวดที่ 5', 'January', 70000, 0, 0),
(24, 0, 'ชำระงวดที่ 1', 'January', 50, 50, 0),
(25, 0, 'ชำระงวดที่ 1', 'January', 50, 50, 0),
(26, 0, 'ชำระงวดที่ 1', 'February', 70000, 0, 0),
(27, 0, 'ชำระงวดที่ 1', 'February', 70000, 0, 0),
(36, 6, 'ชำระงวดที่ 1', 'January', 100, 500000, 0),
(37, 6, 'ชำระงวดที่ 1', 'January', 100, 500000, 0),
(38, 7, 'ชำระงวดที่ 1', 'January', 50, 728740, 0),
(39, 7, 'ชำระงวดที่ 2', 'November', 50, 728740, 0),
(40, 9, 'ชำระงวดที่ 1', 'January', 50, 91350, 0),
(41, 9, 'ชำระงวดที่ 2', 'August', 50, 91350, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `pip_id` int(11) NOT NULL COMMENT 'เชื่อมกับโปรเจคเนม',
  `project_d` varchar(255) NOT NULL COMMENT 'รายละเอียดโครงการ',
  `project_m` varchar(255) NOT NULL COMMENT 'ผู้รับผิดชอบโครงการ',
  `project_u` varchar(255) NOT NULL COMMENT 'ทีม',
  `project_status` varchar(255) NOT NULL COMMENT 'สถานะ',
  `project_start` date NOT NULL COMMENT 'วันเริ่ม',
  `project_end` date NOT NULL COMMENT 'วัันสิ้นสุด',
  `project_crt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันสร้าง',
  `project_staff` varchar(255) NOT NULL COMMENT 'ผู้สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `pip_id`, `project_d`, `project_m`, `project_u`, `project_status`, `project_start`, `project_end`, `project_crt`, `project_staff`) VALUES
(1, 1, 'เพื่อสนับสนุนการทำงาน และร่วมปรึกษาหาลือ เพื่อพัฒนาระบบแพลตฟอร์ม ให้ตอบโจทย์การทำงานของของเจ้าหน้าที่ และกลุ่มเป้าหมายผู้ใช้งานอุปกรณ์แต่ละบ้าน ของเทศบาลนครนครรังสิต จังหวัดปทุมธานี', '2', '1,2,3', 'On Hold', '2023-08-18', '2023-08-31', '2023-08-18 04:35:08', 'Apirak Bangpuk');

-- --------------------------------------------------------

--
-- Table structure for table `remind`
--

CREATE TABLE `remind` (
  `remind_id` int(11) NOT NULL COMMENT 'รหัส',
  `project_id` int(11) NOT NULL COMMENT 'โปรเจค',
  `task_id` int(11) NOT NULL COMMENT 'โปรเจคย่อย',
  `sub_id` int(11) NOT NULL COMMENT 'ชื่อเอกสาร',
  `remind_crt` datetime NOT NULL COMMENT 'วันที่สร้าง',
  `remind_staff` varchar(100) NOT NULL COMMENT 'ผู้สร้าง',
  `remind_name` varchar(100) NOT NULL COMMENT 'หัวข้อ',
  `remind_detail` varchar(255) NOT NULL COMMENT 'รายละเอีดย',
  `remind_file` varchar(100) NOT NULL COMMENT 'ไฟล์แนบ',
  `remind_date` datetime NOT NULL COMMENT 'วันที่กำหนด',
  `remind_status` varchar(100) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resolve`
--

CREATE TABLE `resolve` (
  `resolve_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL COMMENT 'เชื่อมกับ category',
  `project_name` varchar(255) NOT NULL COMMENT 'โครงการ',
  `case` varchar(255) NOT NULL COMMENT 'สาเหตุ',
  `resovle` varchar(255) NOT NULL COMMENT 'วิธีการแก้ไข'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resolve`
--

INSERT INTO `resolve` (`resolve_id`, `cat_id`, `project_name`, `case`, `resovle`) VALUES
(1, 1, 'โรงพยาบาลมิตรไมตรี (Lab)', 'Parameter Log ที่ส่งมาจากระบบ HIS ไม่ตรงกับ Service Interface ตัวรับ จึงทำให้เกิด Error (HL7)', 'ลบ Log Files HL7 ออก ทำการ Backup ข้อมูลไว้ Run Service Interface Programs สามารถใช้งานได้ปกติ');

-- --------------------------------------------------------

--
-- Table structure for table `sub_task`
--

CREATE TABLE `sub_task` (
  `sub_id` int(11) NOT NULL COMMENT 'รหัส',
  `project_id` int(11) NOT NULL COMMENT 'โปรเจค',
  `sub_crt` datetime NOT NULL COMMENT 'วันที่สร้าง',
  `sub_staff` varchar(45) NOT NULL COMMENT 'ชื่อผู้สร้าง',
  `sub_tpye` text NOT NULL COMMENT 'ประเภทเอกสาร',
  `sub_name` text NOT NULL COMMENT 'หัวข้อชื่อ',
  `sub_file` varchar(100) NOT NULL COMMENT 'เอกสาร',
  `sub_link` varchar(100) NOT NULL COMMENT 'แนบลิงค์',
  `sub_remark` int(200) NOT NULL COMMENT 'รายละเอียด',
  `sub_status` varchar(45) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_project`
--

CREATE TABLE `task_project` (
  `task_id` int(11) NOT NULL COMMENT 'รหัส',
  `project_name` varchar(255) NOT NULL COMMENT 'โปรเจค',
  `task_crt` datetime NOT NULL COMMENT 'วันที่สรัาง',
  `task_staff` text NOT NULL COMMENT 'ผู้สร้าง',
  `task_name` varchar(200) NOT NULL COMMENT 'หัวข้อ',
  `task_detail` varchar(200) NOT NULL COMMENT 'รายละเอียด',
  `task_status` varchar(100) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_project`
--

INSERT INTO `task_project` (`task_id`, `project_name`, `task_crt`, `task_staff`, `task_name`, `task_detail`, `task_status`) VALUES
(1, 'Health Care', '2023-06-10 13:54:04', 'Apirak bangpuk', 'Emergency', 'AI Tracker', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อเข้าใช้งานระบบ',
  `password` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `fullname` varchar(100) NOT NULL COMMENT 'ชื่อ-สกุล',
  `email` varchar(100) NOT NULL COMMENT 'อิเมล',
  `tel` varchar(20) NOT NULL COMMENT 'เบอร์',
  `user_crt` datetime NOT NULL COMMENT 'วันส้ราง',
  `user_staff` varchar(100) NOT NULL COMMENT 'ผู้สร้าง',
  `role` varchar(100) NOT NULL COMMENT 'บทบาท',
  `team` varchar(100) NOT NULL COMMENT 'ทีม',
  `position` varchar(100) NOT NULL COMMENT 'ตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `tel`, `user_crt`, `user_staff`, `role`, `team`, `position`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Apirak bangpuk', 'apirak@gmail.com', '(089) 353-5555', '2023-06-04 11:53:19', 'phattraorn amornophakun', 'Administrator', 'Non Service', 'IT Service'),
(2, 'Theerachart ', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Theerachart ', 'apirak@pointit.co.th', '(099) 999-9', '2023-06-04 11:53:19', 'phattraorn amornophakun', 'Administrator', 'Service Solution', 'Service Manager'),
(3, 'phattraorn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'phattraorn amornophakun', 'phattraorn.a@gmail.com', '(061) 952-2', '2023-06-04 11:53:19', 'apirak bangpuk', 'Administrator', 'Innovation', 'Product Sale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `folder_doc`
--
ALTER TABLE `folder_doc`
  ADD PRIMARY KEY (`folder_id`);

--
-- Indexes for table `pipeline`
--
ALTER TABLE `pipeline`
  ADD PRIMARY KEY (`pip_id`);

--
-- Indexes for table `pip_file`
--
ALTER TABLE `pip_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `pip_folder`
--
ALTER TABLE `pip_folder`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `pip_period`
--
ALTER TABLE `pip_period`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `remind`
--
ALTER TABLE `remind`
  ADD PRIMARY KEY (`remind_id`);

--
-- Indexes for table `resolve`
--
ALTER TABLE `resolve`
  ADD PRIMARY KEY (`resolve_id`);

--
-- Indexes for table `sub_task`
--
ALTER TABLE `sub_task`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `task_project`
--
ALTER TABLE `task_project`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `folder_doc`
--
ALTER TABLE `folder_doc`
  MODIFY `folder_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pipeline`
--
ALTER TABLE `pipeline`
  MODIFY `pip_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เลขไอดีของ Project', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pip_file`
--
ALTER TABLE `pip_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Key', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pip_folder`
--
ALTER TABLE `pip_folder`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pip_period`
--
ALTER TABLE `pip_period`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เลขไอดีของ period', AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `remind`
--
ALTER TABLE `remind`
  MODIFY `remind_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';

--
-- AUTO_INCREMENT for table `resolve`
--
ALTER TABLE `resolve`
  MODIFY `resolve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_task`
--
ALTER TABLE `sub_task`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';

--
-- AUTO_INCREMENT for table `task_project`
--
ALTER TABLE `task_project`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
