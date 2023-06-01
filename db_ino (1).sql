-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 02:09 PM
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
-- Database: `db_ino`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contact_id` int(10) NOT NULL,
  `contact_name` varchar(500) NOT NULL COMMENT 'ชื่อ-สกุล',
  `contact_position` varchar(500) NOT NULL COMMENT 'ตำแหน่ง',
  `contact_phone` varchar(200) NOT NULL COMMENT 'เบอร์ติดต่อ',
  `contact_email` varchar(200) NOT NULL COMMENT 'อิเมล',
  `contact_address` varchar(1000) NOT NULL,
  `contact_company` varchar(1000) NOT NULL,
  `contact_date` varchar(100) NOT NULL COMMENT 'วันสร้าง',
  `contact_team` varchar(500) NOT NULL COMMENT 'ทีม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contact_id`, `contact_name`, `contact_position`, `contact_phone`, `contact_email`, `contact_address`, `contact_company`, `contact_date`, `contact_team`) VALUES
(1, 'คุณ ภัทราอร อมรโอภาคุณ', 'Consulting ', '(061) 952-2111', 'Phattraorn@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', 'Innovation'),
(5, 'คุณอภิรักษ์ บางพุก', 'IT Service Engineer', '(083) 959-5800', 'Apirk@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', 'Services'),
(6, 'คุณธีรชาติ ติยพงศ์พัฒนา', 'IT Service Manager', '(089) 666-0149', 'theerachart@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', 'Services'),
(7, 'สุภาภรณ์ สมสงวน', 'Asset ', '(082) 790-2068', 'supaporn@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '10/31/2022', 'Innovation'),
(8, 'คุณบุลากร พัวพันธุ์', 'Executive Director', '(081) 360-2828', 'Bulakorn@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', 'Innovation'),
(9, 'คุณผาณิต เผ่าพันธ์', 'Executive Director', '(086) 995-8396', 'Panit@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', ''),
(10, 'คุณพิสุทธ์ วงศ์โสภา', 'Tecnical Support', '(091) 545-0988', 'Phisut@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', ''),
(11, 'คุณธนาคม อ่องสถาน', 'Tecnical Support', '(089) 777-1155', 'Tanacom@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', ''),
(12, 'คุณโอฬาร สินธุพันธุ์', 'Sale Maketing', '(085) 151-1551', 'Sintupha@pointit.co.th', 'บริษัท พอยท์ ไอที คอนซัลทิ่ง จำกัด ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร', 'พอยท์ ไอที คอนซัลทิ่ง จำกัด', '11/01/2022', 'Sale Maketing'),
(13, 'ผู้ช่วยศาสตราจารย์วิรุฬห์ ศรีบริรักษ์', 'Project Consultant', '(086) 139-8887', 'wiroon@eng.buu.ac.th', 'บริษัท เซนโกรท จำกัด\r\n15/133 หมู่ที่ 5\r\nตำบลห้วยกะปิ อำเภอเมืองชลบุรี จังหวัดชลบุรี 20130\r\nเว็บไซต์: https://zanegrowth.com/ \r\nKIN-YOO-DEE PLATFORM', 'บริษัท เซนโกรท จำกัด - Zanegrowth Smart City Thailand', '11/01/2022', 'Customer'),
(14, 'คุณภานุวัฒน์ พรหมศิริ (ตั้ม)', 'Executive Director', '(063) 249-2845', 'panuwat@zanegrowth.com', 'Platform Developer (KIN-YOO-DEE)\r\nบริษัท เซนโกรท จำกัด\r\n15/133 หมู่ที่ 5\r\nตำบลห้วยกะปิ อำเภอเมืองชลบุรี จังหวัดชลบุรี 20130\r\nเว็บไซต์: https://zanegrowth.com/', 'บริษัท เซนโกรท จำกัด - Zanegrowth Smart City Thailand', '11/01/2022', 'Customer'),
(15, 'คุณพีรเดช ลออธรรม', 'Software Architect Engineer', '(085) 557-1556', 'peeradach@zanegrowth.com', 'Software Architect Engineer (KIN-YOO-DEE PLATFORM)\r\nบริษัท เซนโกรท จำกัด\r\n15/133 หมู่ที่ 5\r\nตำบลห้วยกะปิ อำเภอเมืองชลบุรี จังหวัดชลบุรี 20130\r\nเว็บไซต์: https://zanegrowth.com/', 'บริษัท เซนโกรท จำกัด - Zanegrowth Smart City Thailand', '11/01/2022', 'Customer'),
(16, 'คุณชยนณัฏฐ ทะนะมูล', 'Consulting', '(092) 652-9659', 'chayonnat@tcels.or.th', 'ผู้ประสานงานโครงการ\r\nเลขที่ 252 อาคารเอสพีอี ทาวเวอร์ ชั้น 9 ถ.พหลโยธิน แขวงสามเสนใน เขตพญาไท กรุงเทพฯ 10400', 'TCELS', '11/01/2022', 'Customer'),
(17, 'คุณคุณสร้างรัฐ หัตถวงษ์', 'Chief Executive Officer', '', '', '919/414-420 ห้องอี อาคารจิวเวลรี่เทรดเซ็นเตอร์ ชั้น 33, แขวง สีลม เขตบางรัก กรุงเทพมหานคร 10500', 'INSPIRE COMMUNICATIONS CO., LTD.', '11/18/2022', 'Customer'),
(18, 'พล.ต.ท.ดร.เสนิต สำราญสำรวจกิจ', 'หัวหน้าโครงการ ', '(061) 952-2111', '', 'โรงเรียนนายร้อยสามพาน จ.นครปฐม', 'โรงเรียนนายร้อยสามพาน จ.นครปฐม', '11/18/2022', 'Customer'),
(19, 'นายเฉลิมศักดิ์ มณีศรี', 'นายกเทศบาลเมืองป่าตอง', '', '', 'เลขที่ 12/3 ถนนราชปาทานุสรณ์ ตำบลป่าตอง อำเภอกะทู้ จังหวัดภูเก็ต 83150.\r\nเทศบาลเมืองป่าตอง', 'เทศบาลเมืองป่าตอง', '11/18/2022', 'Customer'),
(20, 'นายสิรวิชฐ์ อำไพวงษ์', 'นายกเทศบาลตาบลบ่อวิน', '', '', 'องค์การบริหารส่วนตำบลบ่อวิน (อบต. บ่อวิน) อำเภอศรีราชา จังหวัดชลบุรี.\r\nเทศบาลตำบลบ่อวิน', 'เทศบาลตำบลบ่อวิน', '11/18/2022', 'Customer'),
(21, 'นายศราวุธ กล้วยจำนงค์', 'นายกเทศบาลตำบลบางจะเกร็ง', '', '', '3/4 หมู่ที่ 2 ถนนราชญาติรักษา ตำบลบางจะเกร็ง อำเภอเมืองสมุทรสงคราม จังหวัดสมุทรสงคราม 75000\r\nเทศบาลตำบลบางจะเกร็ง จังหวัดสมุทรสงคราม', 'เทศบาลตำบลบางจะเกร็ง', '11/18/2022', 'Customer'),
(22, 'คุณประพัฒน์ จันทร์เกื้อ', 'หัวหน้าโครงการ LIS (LAOS)', '', '', '', 'PROMs Company', '12/27/2022', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_files`
--

CREATE TABLE `tb_files` (
  `files_id` int(10) NOT NULL,
  `file_pk` int(10) NOT NULL COMMENT 'รหัสอ้างอิงโปรเจค',
  `project_cate` varchar(500) NOT NULL COMMENT 'ชื่อรูปแบบการใช้งาน',
  `file_date` text NOT NULL COMMENT 'วันที่บันทึก',
  `file_type` varchar(500) NOT NULL COMMENT 'ประเภทเอกสาร',
  `file_name` varchar(1000) NOT NULL COMMENT 'ชื่อไฟล์เอกสาร',
  `file_status` varchar(200) NOT NULL COMMENT 'จัดหมวดหมูไฟล์',
  `file_staff` varchar(200) NOT NULL COMMENT 'ชื่อผู้บันทึก',
  `file_upfile` varchar(2000) NOT NULL COMMENT 'ไฟล์',
  `file_link` varchar(200) NOT NULL COMMENT 'Link Google Drive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_files`
--

INSERT INTO `tb_files` (`files_id`, `file_pk`, `project_cate`, `file_date`, `file_type`, `file_name`, `file_status`, `file_staff`, `file_upfile`, `file_link`) VALUES
(59, 12, 'SMART SECURITY PLATFORM', '30/10/2022', 'PDF', 'หนังสือเชิญประชุม 27-10-65', 'เอกสารการประชุม', 'คุณภัทราอร อมรโอภาคุณ', '651027 1514-หนังสือเชิญประชุม 27 ต.ค.2565.pdf', 'https://drive.google.com/drive/u/0/folders/1OMC5sxQfdYs-sjxhDuHM9RZkMqfdJrsV'),
(61, 12, 'SMART SECURITY PLATFORM', '30/10/2022', 'PDF', 'วาระการประชุม 27-10-65', 'เอกสารการประชุม', 'คุณภัทราอร อมรโอภาคุณ', '651027 วาระการประชุม.pdf', 'https://drive.google.com/drive/u/0/folders/1OMC5sxQfdYs-sjxhDuHM9RZkMqfdJrsV'),
(62, 12, 'SMART SECURITY PLATFORM', '30/10/2022', 'PDF', 'Brochure IBOC', 'เอกสารการประชุม', 'คุณภัทราอร อมรโอภาคุณ', '2022-06-01_IBOC_Brochure.pdf', 'https://drive.google.com/drive/u/0/folders/1OMC5sxQfdYs-sjxhDuHM9RZkMqfdJrsV'),
(63, 12, 'SMART SECURITY PLATFORM', '30/10/2022', 'PDF', 'คู่มือการใช้งานระบบตรวจสอบ เฝ้าระวังความปลอดภัย และติดตามวัตถุที่สนใจ (Smart Security Platform)', 'เอกสารนำเสนอ (Presentation) ', 'คุณภัทราอร อมรโอภาคุณ', 'Smart-Security-Platform-Manual_compressed.pdf', 'https://drive.google.com/drive/u/0/folders/1OMC5sxQfdYs-sjxhDuHM9RZkMqfdJrsV'),
(71, 14, 'Home Isolation', '31/10/2022', 'PDF', 'เอกสารส่งงวดงานที่ 4 โครงการระบบแพลตฟอร์มเชิงรุกสำหรับบริหารระบบ Home Isolation', 'ส่งงวดงาน', 'คุณภัทราอร อมรโอภาคุณ', 'โครงการระบบแพลตฟอร์มเชิงรุกสำหรับบริหารระบบ Home Isolation.pdf', 'https://drive.google.com/drive/folders/1lsylhpv2uB8b0qKKsMMC9aJsJBnn2JUw'),
(75, 13, 'Public Care Services', '03/11/2022', 'PDF', 'แบบยินยอมการเข้าใช้งานระบบ กิน-อยู่-ดี (Consent Form)', 'Consent Form', 'คุณภัทราอร อมรโอภาคุณ', 'Consent_form.pdf', 'https://drive.google.com/drive/u/0/folders/1SizKgFc0-i6AxX1T0JcK9tQsyRwKFVKT'),
(76, 17, 'Emergency Monitoring เทศบาลตำบลบางจะเกร็ง', '05/11/2022', 'Excel', 'Quatation', '', 'คุณภัทราอร อมรโอภาคุณ', 'QT_aitracker และ Platform_บางจะเกร็ง_Update 9-8_22_Oh Zoom.xlsx', ''),
(77, 17, 'Emergency Monitoring เทศบาลตำบลบางจะเกร็ง', '05/11/2022', 'Document', 'เอกสารของบโครงการ', '', 'คุณภัทราอร อมรโอภาคุณ', 'เทศบาลบางจะเกร็ง_Phattraorn_V1.0.docx', ''),
(78, 18, 'Kudson Moo LiveStock AI Ag', '05/11/2022', 'PDF', 'Present', '', 'คุณภัทราอร อมรโอภาคุณ', 'Boar Taint Meeting Zoetis_28102022.pdf', ''),
(79, 18, 'Kudson Moo LiveStock AI Ag', '05/11/2022', 'Presentation', 'Run ตัวเลข เก็บ Data Set', '', 'คุณภัทราอร อมรโอภาคุณ', 'Run ตัวเลขใช้ในการเก็บ Data Set.pptx', ''),
(80, 19, 'เครื่อง NUC', '05/11/2022', 'PDF', 'Quotation', '', 'คุณภัทราอร อมรโอภาคุณ', 'QT-000000617_NUC_VAMStack_28-10-22.pdf', ''),
(81, 19, 'เครื่อง NUC', '05/11/2022', 'Document', 'Sale Order', '', 'คุณภัทราอร อมรโอภาคุณ', 'Sale Oder_VAMStack_NUC.xlsx', ''),
(82, 20, 'Emergency Monitoring', '15/11/2022', 'PDF', 'QT_aitracker และ Platform_เทศบาลตำบลบ่อวิน_ราคาเช่าใช้บ', 'เสนอราคาเช่าใช้ระบบและอุปกรณ์', 'คุณภัทราอร อมรโอภาคุณ', '../ino/file/QT_aitracker และ Platform_เทศบาลตำบลบ่อวิน_ราคาเช่าใช้บ.pdf', ''),
(83, 21, 'Emergency Monitoring', '16/11/2022', 'Presentation', 'ไฟล์นำเสนอ โครงการระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้มในผู้สูงอายุภายในบ้านและภายนอกบ้าน (Presentation)', 'ไฟล์นำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', 'สำเนาของ Kin-yoo-dee Platform_(ป่าตอง).pptx.pdf', 'https://docs.google.com/presentation/d/1iMMtvh__TiXtDZIFpkZ98XQ1iYpprF_A/edit?pli=1#slide=id.p1'),
(84, 21, 'Emergency Monitoring', '16/11/2022', 'PDF', 'รายงานการลงพื้นที่ครั้งที่ 1-3 เทศบาลเมืองป่าตอง จังหวัดภูเก็ต', 'รายงานการลงพื้นที่', 'คุณภัทราอร อมรโอภาคุณ', 'รายงานการลงพื้นที่เทศบาลเมืองป่าตอง จังหวัดภูเก็ต ครั้งที่ 1 -3 - Google เอกสาร.pdf', 'https://docs.google.com/document/d/1p6cilC1XZ_O9DV8ve_jxL6_w6ceyQHd02cEMPoqiCyg/edit'),
(85, 21, 'Emergency Monitoring', '16/11/2022', 'JPG/PNG', 'ภาพการทำกิจกรรมลงพื้นที่เทศบาลเมืองป่าต่อง จังหวัดภูเก็ต', 'รูปภาพ', 'คุณภัทราอร อมรโอภาคุณ', '2022-11-16_22-07-49.png', 'https://drive.google.com/drive/u/0/folders/1z31PSMRlMCBXm3pXIvGZ6yfQaAK1LT52'),
(86, 20, 'Emergency Monitoring', '18/11/2022', 'PDF', 'แบบประเมินภาวะสุขภาพและการพยาบาลผู้ป่วยต่อเนื่องที่บ้าน (Home Health Care)', 'แบบประเมิน', 'คุณภัทราอร อมรโอภาคุณ', 'ใบ HHC (เอกสารแนบ 3).pdf', 'https://drive.google.com/drive/u/1/folders/1SV5nyJm2hXkcf41TirLDhboUiOblXNzK'),
(88, 20, 'Emergency Monitoring', '18/11/2022', 'Document', 'รายงานการลงพื้นที่ เทศบาลตำบลบ่อวิน จังหวัดชลบุรี', 'รายงานการลงพื้นที่', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1-pHCQJL4joCgq5dQxiinKM4OD_QC5BUD'),
(90, 20, 'Emergency Monitoring', '18/11/2022', 'Presentation', 'การนำเสนอข้อมูล โครงการกิน-อยู่-ดี การจับการล้มในผู้สูงอายุเทศบาลตำบลบ่อวิน จังหวัดชลบุรี', 'เอกสารนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', 'Kin-yoo-dee Platform(เทศบาลบ่อวิน).pptx.pdf', 'https://docs.google.com/presentation/d/1SC85Itjzk7-kHotUW0_3NL0qYFz385Pt/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(91, 20, 'Emergency Monitoring', '18/11/2022', 'JPG/PNG', 'รูปภาพ การลงพื้นที่เทศบาลตำบลบ่อวิน จังหวัดชลบุรี', 'รูปภาพ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1uSS_7DlgiE5hZHsjfhmuIgqqenOg3vk_'),
(92, 13, 'Public Care Services', '18/11/2022', 'JPG/PNG', 'รูปภาพ การลงพื้นที่คณะสาธารณสุขศาสตร์ ม.มหิดล', 'รูปภาพ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1byqYz1He0yb530gim3EIPDlVQGTCct9X'),
(93, 13, 'Public Care Services', '18/11/2022', 'Video', 'วีดีโอ  แนะนำการใช้งานระบบ และอุปกรณ์ (Video Training)', 'วีดีโอ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1XMFBXZ5KoE3IqWkCt4HDJU6TKJmAvWk7'),
(94, 22, 'BIO IDM', '30/11/2022', 'Video', 'วีดีโอการนำเสนอ BIO IDM (Video)', 'วีดีโอ', 'คุณภัทราอร อมรโอภาคุณ', 'KYC-Demo-Project.mp4', 'https://drive.google.com/drive/u/0/folders/1PHBZrUIcxuTcE8oKePz8M4Qrh4PGr2Cp'),
(95, 22, 'BIO IDM', '23/11/2022', 'Document', 'เอกสารคู่มือการใช้งานระบบ eKYC BIO IDM (Manual)', 'คู่มือการใช้งาน', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/15TsqgpyvDXLTcdscdbMmFbO3i0jDGs6r5EFbXfh7HSM/edit#heading=h.kk1966kbedef'),
(96, 13, 'Public Care Services', '25/11/2022', 'Presentation', 'คู่มือการเพิ่มผู้รับบริการ We@SAFE ใน TABLET', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'คู่มือการเพิ่งผู้รับบริการ ม.มหิดล.pptx.pdf', 'https://docs.google.com/presentation/d/1DO3QrmAIB7WwWW4fHHxgvVPtppLKmS4m/edit#slide=id.gfc91e00753_0_0'),
(97, 13, 'Public Care Services', '25/11/2022', 'JPG/PNG', 'คู่มือการใช้งานเครื่อง Sonka (Kiosk)', 'Kiosk', 'คุณภัทราอร อมรโอภาคุณ', 'Manaul.psd', 'https://drive.google.com/file/d/1rffKNTerUxKapsjDTbfzrC-QiCyGxEHh/view?usp=sharing'),
(98, 13, 'Public Care Services', '29/11/2022', 'Excel', 'เอกสารตรวจสอบ (QC) TABLET SETTING สำหรับใช้งาน (Calibrate) (Asset)', 'Check List', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/spreadsheets/d/1bIkvEyoRAhmgQQJI1E5QvaB5hXLg72YOMSiLFcJTI3Y/edit#gid=970547268'),
(99, 13, 'Public Care Services', '29/11/2022', 'Excel', 'รายการส่งมอบอุปกรณ์ และตรวจสอบการตั้งค่าอุปกรณ์ (Check List and Calibrate Device) (Asset)', 'Check List', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/spreadsheets/d/18ipdw2VvzYYurUtCzjV_Yz4knUqu-Rdr8QjUiygkqAM/edit#gid=949238162'),
(100, 13, 'Public Care Services', '25/11/2022', 'Document', 'คู่มือแนบกระเป๋าตรวจคัดกรองสถานะค่าสุขภาพ (Health Kit Set Manaul)', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'มหิดล_Brochure-B.psd', 'https://docs.google.com/document/d/1ln6C3MPAlJ0NXHdwoOHGvZ46hFpesx6e/edit'),
(101, 13, 'Public Care Services', '09/06/2022', 'Document', 'รายงานสรุปการลงพื้นที่  ชุมชนเพิ่มทรัพย์สุขภาวะ(บางแค) (9 มิถุนายน 2565)', 'รายงาน', 'คุณภัทราอร อมรโอภาคุณ', 'รายงานการลงพื้นที่หมู่บ้านเพิ่มทรัพย์สุขภาวะ(บางแค)9 มิถุนายน 2565 - Google เอกสาร.pdf', 'https://docs.google.com/document/d/1JjNvbfJpQ-1OYXdXaBW1cxZRwf5KJ3S3rjc9nrOCmJc/edit'),
(102, 13, 'Public Care Services', '25/11/2022', 'Document', 'รายงานสรุปการลงพื้นที่  ซอย สุขสวัสดิ์(พญาไท) (20  มิถุนายน 2565)', 'รายงาน', 'คุณภัทราอร อมรโอภาคุณ', 'รายงานการลงพื้นทีซอยสุขสวัสดิ์(พญาไท)20 มิถุนายน 2565 - Google เอกสาร.pdf', 'https://docs.google.com/document/d/1UBG2TQLhd3VJJewBlpqoOz0AtwCRiByADspKs_vzUeE/edit'),
(103, 13, 'Public Care Services', '25/11/2022', 'Document', 'รายงานสรุปการลงพื้นที่  ชุมชนศิรินทร์และเพื่อน (วันที่ 9-10 กรกฎาคม 2565 วลา 08.00 - 17.00 น. )', 'รายงาน', 'คุณภัทราอร อมรโอภาคุณ', 'รายงานการลงพื้นทีชุมชนศิรินทร์และเพื่อนวันที่ 9-10 กรกฎาคม 2565 - Google เอกสาร.pdf', 'https://docs.google.com/document/d/1iPikG4WSu47wKR8Fu80BuwRe6LnpMCG0Zcy14ARONRc/edit'),
(104, 13, 'Public Care Services', '25/11/2022', 'Non Files', 'เอกสารตัวอย่าง แบบสอบถามเก็บข้อมูลผู้รับบริการ (Questionnaire)', 'แบบสอบถาม', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1nKxe5TFUIzFphM9PvQJuZ8TXfv7fl1lr'),
(105, 13, 'Public Care Services', '25/11/2022', 'Other', 'รายชื่อคณะทำงาน ทีมเก็บข้อมูลชุมชมย่านโยธี และสิทธิการเข้าใช้งานระบบ', 'รายชื่อ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1Xy7OlFW83j90w9D_il5pzmGzb03n3ldu'),
(106, 13, 'Public Care Services', '25/11/2022', 'PDF', 'คู่มือการใช้งาน Application Caregiver การเก็บข้อมูล และบันทึกค่าสุขภาพ (Bullet)', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'คู่มือการใช้งานรวม 4 แบบ (YMID).pdf', 'https://drive.google.com/drive/u/0/folders/1vSNubxa_iuVpl7o694OcsssRlQR2fk9q'),
(107, 13, 'Public Care Services', '25/11/2022', 'Document', 'รายงานสรุปการดำเนินการประยุกต์ใช้เทคโนโลยีดิจิทัล โครงการนวัตกรรมบริการชุมชนเพื่อควบคุมการแพร่ระบาดเชื้อไวรัสโคโรน่า 2019  ย่านนวัตกรรมการแพทย์โยธี (ส่งมอบ) (ส่งงวดงาน)', 'ส่งงวดงาน', 'คุณภัทราอร อมรโอภาคุณ', 'รายงานสรุปการดำเนินการประยุกต์ใช้เทคโนโลยีดิจิทัล (คณะสาธารณสุขศาสตร์ ม.มหิดล).docx - Google เอกสาร.pdf', 'https://docs.google.com/document/d/11wilYV3gMGFEyrhARq0BnjpRK7hIJe6n/edit'),
(108, 13, 'Public Care Services', '25/11/2022', 'Document', 'รายการแอฟพลิเคชั่น (Appliacation) ของ กระทรวงสาธารณสุข สปสช พัฒนาขึ้น (สำหรับประชาชนทั่วไป)   ', 'List App', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/spreadsheets/d/1ZuYTW8EEHCXZsOpsC22cpcHtlDpO0bd6hEB8y6lngDo/edit#gid=0'),
(109, 23, 'NEXLAB', '29/11/2022', 'PDF', 'คู่มือการใช้งานระบบ NEXLAB-LIS (For User)', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'คู่มือNexLab-LIS.pdf', 'https://drive.google.com/file/d/1X3vv7AGlt3kfazoIJxTccC46bhlLwcAV/view?usp=sharing'),
(110, 23, 'NEXLAB', '28/11/2022', 'Document', 'Proposal -Scope of work', 'Proposal', 'คุณภัทราอร อมรโอภาคุณ', 'PRoposal - Scope of work 2.docx', 'https://docs.google.com/document/d/1WogUuBHghcWo2ObPedSsFWt2k4N0U-Tz/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(111, 23, 'NEXLAB', '29/11/2022', 'PDF', 'คู่มือการใช้งานระบบ NEXLAB-LIS (For Admin)', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'คู่มือNexLab + Setting(Admin).pdf', 'https://drive.google.com/drive/folders/13q3voUmnGCESQ3PfCzEE9mBFj9KI1Qg_'),
(112, 24, 'Family Health Wallet', '29/11/2022', 'Video', 'การประชุมสรุปแผนงานการออกแบบระบบ ครั้งที่ 1', 'วาระการประชุม', 'คุณภัทราอร อมรโอภาคุณ', 'Meeting Conception Health Care_28112022.mp4', 'https://drive.google.com/file/d/1E6J72QFRXM9Dq3AMonL_0fXTOQT8FhP1/view?usp=sharing'),
(113, 24, 'Family Health Wallet', '29/11/2022', 'Other', 'กระบวนการออกแบบระบบ  (Flow Diagrams)', 'Work Flow', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://gitmind.com/app/docs/mz2l34o5'),
(114, 20, 'Emergency Monitoring', '29/11/2022', 'Other', 'ออกแบบการนำเสนอหน้า (Dashboard Mockup)', 'Mockup', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://www.figma.com/file/9Hl9g7NOmP6K1A8YRlwo24/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99-%E0%B9%81%E0%B'),
(115, 25, 'BIO IDM', '29/11/2022', 'Presentation', 'เอกสารนำเสอนกระบวนการทำงานของระบบยืมยันตัวตนพร้อมการวิเคราะห์ภาพใบหน้า ', 'เอกสารนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', 'Super Rich_Phattraorn_2022-8-27.pptx (1).pdf', 'https://docs.google.com/presentation/d/11nBqh79NGFD9ubyBY3avc_8BLA6O6I4g/edit#slide=id.g1534fc7aee2_0_204'),
(116, 16, 'VAM On-premise – Advance Security and Surveillance SolutionFeatures', '29/11/2022', 'Document', 'เอกสารตรวจสอบเทียบสเป็คอุปกรณ์กระบวนการทดสอบการใช้งานซอฟต์แวร์โดยผู้ใช้งานจริง (End users) หรือลูกค้า (UAT Device) ', 'ส่งงวดงาน', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1j2mgBqu1m4Zi4Gm45XI0_XARiI8VBAylCaVYqneesCM/edit'),
(117, 16, 'VAM On-premise – Advance Security and Surveillance SolutionFeatures', '29/11/2022', 'Other', 'LOGO VAMSTACK', 'UAT ', 'คุณภัทราอร อมรโอภาคุณ', 'LOGO VAMSTACK.zip', 'https://www.dropbox.com/work/Innovation%20Team/VAM/LOGO%20VAMSTACK?select=Logo+VAM+laser.ai'),
(118, 22, 'BIO IDM', '30/11/2022', 'Presentation', 'การนำเสนอข้อมูล ระบบยืนยันตัวตนพร้อมการวิเคราะห์ภาพใบหน้า (Standard Present)', 'การนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', 'Elegant and Professional Company Business Proposal Presentation.pdf', 'https://www.canva.com/design/DAFTYnDyios/gLs5SG7w7IYFIIMjEPfrbg/edit?utm_content=DAFTYnDyios&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton'),
(119, 12, 'Global Fund Thai-Korea', '30/11/2022', 'PDF', 'เอกสารขอเชิญเข้ำร่วมงำนสัมมนำด้ำนกำรแพทย์และ AI สำธำรณสุขของประเทศไทย ในงำนสัมมนำ Digital Healthcare Transformation Conference ๒๐๒๒', 'เอกสารเชิญ', 'คุณภัทราอร อมรโอภาคุณ', '(บริษัท พอยท์ไอที คอนซัลทิ่ง จำกัด) จดหมายเ.pdf', 'https://drive.google.com/file/d/1OoJM1na9d2O3KL95wAW8WTWREW7_a432/view?usp=sharing'),
(120, 24, 'Family Health Wallet', '01/12/2022', 'Excel', 'Requirment App ', 'application สำหรับบริหารจัดการในองค์กร', 'คุณภัทราอร อมรโอภาคุณ', 'Improv.xlsx', ''),
(121, 23, 'NEXLAB', '08/12/2022', 'PDF', 'เอกสารข้อมูลรายละเอียดตัว GeneXpert (05/12/2022)', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'Downloads.rar', 'https://drive.google.com/drive/u/0/folders/1lUq6Fj57qqjfbF-Fs9GLm7w-dKEu-arA'),
(122, 26, 'Global Fund Thai-Korea', '09/12/2022', 'JPG/PNG', 'รูปภาพ ', 'DHTC Bangkok ', 'คุณภัทราอร อมรโอภาคุณ', 'Desktop.rar', 'https://drive.google.com/drive/folders/1vLZjT-MbiJzWU1uzRjk4YV0BHA_cPAk7?usp=sharing'),
(123, 26, 'Global Fund Thai-Korea', '09/12/2022', 'Presentation', 'การนำเสนอข้อมูลโครงการ South Korea-Thailand Smart City Development Collaboration in Holistic and Continuity Elderly Care Platform', 'เอกสารนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', 'Global fund_Thai Korea.pptx.pdf', 'https://docs.google.com/presentation/d/1zN_qHqsQ6t6pj6gyeiVWyn2FKFYnydSi/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(124, 23, 'NEXLAB', '10/12/2022', 'Document', 'TB examination request form_Ultra_v3 แบบฟอร์มรับข้อมูลการส่งตรวจแล็บ', 'แบบฟอร์ม', 'คุณภัทราอร อมรโอภาคุณ', '1 - TB examination request form_Ultra_v3.docx.pdf', 'https://docs.google.com/document/d/1uKY1vL2cEmqKB5undq3qyD2_OVMXRFkl/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(125, 23, 'NEXLAB', '10/12/2022', 'Excel', 'NRL-TB-Translation ไฟล์ฐานข้อมูลฟิวล์ต่างๆ ที่จะเก็บในระบบ NexLab (LAOS Project)', 'แบบฟอร์ม', 'คุณภัทราอร อมรโอภาคุณ', 'NRL-TB-Translation.pdf', 'https://docs.google.com/spreadsheets/d/1uP4Ar8hnQ2_wNFvxfMS2l_GWBWHTUkfp/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(126, 23, 'NEXLAB', '12/12/2022', 'Other', 'การออกแบบหน้า Order เพิ่มเติมตาม Requiment ของพี่ประพัฒน์ (Mock Up)', 'Mock Up', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://www.figma.com/proto/Ha5P8YqGKSqG0XK1oweSxo/LAOS-%7C-Model-(V2)-(Copy)?node-id=1%3A2&scaling=scale-down&page-id=0%3A1&starting-point-node-id=1%3A2'),
(127, 21, 'Emergency Monitoring', '20/12/2022', 'Document', 'เอกสารส่งมอบชุดอุปกรณ์คัดกรองค่าสุขภาพ พร้อมกระเป๋า (Health Kit Set)', 'เอกสารส่งมอบ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1EjTWrHHDzXUtaUwOcwiNwNHbOeuf-bmIn9j_XV5fCC0/edit'),
(128, 27, 'Emergency Monitoring', '20/12/2022', 'Presentation', 'ข้อมูลนำเสนองาน โครงการกิน-อยู่-ดี ระบบเฝ้าระวังเหตุฉุกเฉิน และเฝ้าระวังค่าสุขภาพทางไกล สำนักงานเทศบาลเมืองมาบตาพุด ', 'เอกสารนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', '_Kin-yoo-dee Platform (เทศบาลเมืองมาบตาพุด).pptx.pdf', 'https://docs.google.com/presentation/d/1xETcgWGyYIUBIqT1PIJ_76Y-9mJx3wwE/edit#slide=id.g11f6351053c_1_3'),
(129, 27, 'Emergency Monitoring', '20/12/2022', 'Document', 'แผนลงพื้นที่ เทศบาลเมืองมาบตาพุด ประจำปี 2023', 'แผนงาน', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1z9EzC2ZDpjPrgtsYIn3oyqCx7Jvq_yj0/edit'),
(130, 23, 'NEXLAB', '22/12/2022', 'Presentation', 'แผนภาพแสดงการทำงานของระบบ  LAOS LIS  (Systems Diagram)', 'Work Flow', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/presentation/d/146saOb7Kiw6foc1si6UNBGtmod8ooGGK/edit#slide=id.p1'),
(131, 23, 'NEXLAB', '19/01/2023', 'Other', 'โปรแกรม DX GeneXpert (GeneXpert Software)', 'Software', 'คุณภัทราอร อมรโอภาคุณ', 'Setup Barcode.rar', 'https://drive.google.com/drive/u/0/folders/1smNbXmLWc_5NUbdHeB3fi7FTh1h-lT4E'),
(132, 23, 'NEXLAB', '22/12/2022', 'Document', 'คู่มือการใช้งานระบบ NEXLAB-LIS (ฉบับแก้ไขหน้างาน)', 'คู่มือการใช้งาน', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1KypORIT8FW7vpgTxjkk3avQTYzQMQb1h5BPffGNgzNY/edit'),
(133, 20, 'Emergency Monitoring', '22/12/2022', 'Document', 'ขอบเขต และคุณสมบัติ แผนการเก็บข้อมูลดูแลสุขภาพผู้ป่วย ติดบ้าน ติดเตียง ติดสังคม (ร่าง TOR)', 'TOR', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1xQVsoWf24ImCQwfNpL4dtxX1WixhRdLe96X0DQdPEpA/edit'),
(134, 15, 'Health Kit Set', '22/12/2022', 'Document', 'ใบส่งมอบอุปกรณ์ Health Care สถานที่ : โรงพยาบาลพนมไพร  อำเภอพนมไพร จังหวัดร้อยเอ็ด', 'เอกสารส่งมอบ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1EjTWrHHDzXUtaUwOcwiNwNHbOeuf-bmIn9j_XV5fCC0/edit'),
(135, 15, 'Health Kit Set', '22/12/2022', 'Document', 'รายงานการลงพื้นที่โรงพยาบาลพนมไพร จังหวัดร้อยเอ็ด ครั้งที่ 1', 'รายงานการลงพื้นที่', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1TdSu3fnnsnoxiL7i4WaLRxlEx2K463mjIGEUq0EodtA/edit'),
(136, 15, 'Health Kit Set', '22/12/2022', 'Document', 'เอกสารอบรมการใช้งานระบบ Health Monitoring และชุดอุปกรณ์ Health Kit Set สำหรับ Caregiver', 'เอกสารการประชุม', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1P7u7lcKHsk_EMhXs7tD09CMNHC1FKov-/edit'),
(137, 15, 'Health Kit Set', '22/12/2022', 'Document', 'Project-Timeline_รพ.พนมไพร_2022-12-12', 'Work Plan', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/spreadsheets/d/1PpdvSdIelDLInRW_CEhXxGquNipEDvwf/edit#gid=1829202658'),
(138, 15, 'Health Kit Set', '22/12/2022', 'Presentation', 'เอกสารนำเสนอ Healthcare Monitoring', 'เอกสารนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/presentation/d/1VO1BBlz9CaGauRz95BFnA5ipWqv_qD-b/edit#slide=id.gfc9b79eeda_0_680'),
(139, 23, 'NEXLAB', '26/12/2022', 'Document', 'วาระการประชุม ครั้งที่ 2 ระบบ LIS & GeneXpert (26/12/2022)', 'วาระการประชุม', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1K27YuRvHRiNZAeYYqWAdSt4mt1j3XJO21gZFtC5ENNU/edit'),
(140, 28, 'Data Science', '26/12/2022', 'Presentation', 'การนำเสนอข้อมูล Data Infomation Survey Peoject', 'เอกสารนำเสนอ', 'คุณภัทราอร อมรโอภาคุณ', 'Light Pink and Orange Soft Gradient Tutorial Talking Presentation (V1).pdf', 'https://www.canva.com/design/DAFV0uFRGXI/F7y6-fi0CnUu_fx_TFGo4w/view?utm_content=DAFV0uFRGXI&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton'),
(141, 23, 'NEXLAB', '27/12/2022', 'Document', 'ไฟล์เอกสารการผูก Lab เข้ากับระบบ LIS  (S/N LAB) ', 'LAB', 'คุณภัทราอร อมรโอภาคุณ', 'SN.GeneXpert.xlsx', 'https://docs.google.com/spreadsheets/d/1IZ1nNVrlA_dJ_F8tJLCo80SLGb9Z1PAt8Odaz6G5aaQ/edit?usp=sharing'),
(142, 15, 'Health Kit Set', '29/12/2022', 'Excel', 'ทะเบียนอุปกรณ์ (ไฟล์พี่เพชร)', 'ทะเบียนอุปกรณ์ (Asset)', 'คุณภัทราอร อมรโอภาคุณ', 'พนมไพร.xlsx', 'https://docs.google.com/spreadsheets/d/1JyQbYjfsGV5AuNEDGO65kydwI13Am7Kr/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(143, 23, 'NEXLAB', '29/12/2022', 'PDF', 'เอกสารแนบท้ายสัญญา_ LAOS Project_V.03.pdf', '', 'คุณภัทราอร อมรโอภาคุณ', 'เอกสารแนบท้ายสัญญา_ LAOS Project_V.03.pdf', 'https://docs.google.com/document/d/1WA5r_HIsmLwKbzMUPJfDZWNekSc11UleSpGWj9h9-zw/edit'),
(144, 15, 'Health Kit Set', '29/12/2022', 'JPG/PNG', 'รูปภาพประกอบโครงการ', 'รูปภาพ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/0/folders/1OmVjbY0Ce13l5_pkjtaGaqioPSLXT_LW'),
(145, 15, 'Health Kit Set', '29/12/2022', 'Document', 'เอกสารส่งมอบงาน _รพ.พนมไพร (UAT From)', 'UAT Form', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1fJNcEP08SA1mlDjs12IxlFypPlkJuBfp3L8eW_DR9nM/edit'),
(146, 15, 'Health Kit Set', '29/12/2022', 'Document', 'เอกสารส่งมอบงาน _รพ.พนมไพร (UAT From)_เครื่องชั่งน้ำหนัก', 'UAT Form', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1Hb3Yu82eRPPOn3qPF4YC0CXJwDJ6Jt776uZuvcXocR4/edit'),
(147, 23, 'NEXLAB', '29/12/2022', 'Document', 'เอกสารออกแบบหน้า ORDER (ได้รับการ  Approve  จากพี่ประพัฒน์) DESIGN  LAOS PROJECT', 'Order Design Page', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1WA5r_HIsmLwKbzMUPJfDZWNekSc11UleSpGWj9h9-zw/edit'),
(148, 23, 'NEXLAB', '03/01/2023', 'Document', 'คู่มือการใช้งานระบบ NEXLAB-LIS (For Guest)', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'สำหรับ Guest ดูผลและสั่งตรวจ160921(1).docx', 'https://docs.google.com/document/d/1xUk4wfee-zewcUAl7FwWK7xkE6gwPVhR/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(149, 23, 'NEXLAB', '03/01/2023', 'PDF', 'ข้อมูลการเชื่อมต่อระบบ LIS  (API Service Interface)', 'API Interface', 'คุณภัทราอร อมรโอภาคุณ', 'API - Service Checkpoint(1).pdf', 'https://drive.google.com/file/d/1YE1kzyXBwY-5yEp53GbHJUARuZedy-vl/view?usp=sharing'),
(150, 23, 'NEXLAB', '03/01/2023', 'PDF', 'รายละเอียดคอมพิวเตอร์สำหรับใช้งานระบบ LIS (Client Computer)', 'Spac', 'คุณภัทราอร อมรโอภาคุณ', 'Client Computer.pdf', 'https://drive.google.com/file/d/1bLex2fbdBaLQgyqwxq8e9jGwx-zIv-GD/view?usp=sharing'),
(151, 23, 'NEXLAB', '03/01/2023', 'PDF', 'รายละเอียดคอมพิวเตอร์สำหรับใช้งานระบบ LIS (Server Computer)', 'Spec', 'คุณภัทราอร อมรโอภาคุณ', 'Server Computer.pdf', 'https://drive.google.com/file/d/1bXI2h5sD_iz29qRH9iZgaFchzK0fH4LQ/view?usp=sharing'),
(152, 23, 'NEXLAB', '03/01/2023', 'PDF', 'รายละเอียดปริ้นเตอร์ TSC TTP 247 สำหรับใช้งานระบบ LIS (Print Sticker)', 'Spac', 'คุณภัทราอร อมรโอภาคุณ', 'TSC_TTP_247_by_CPS.pdf', 'https://drive.google.com/file/d/1bhZPxjIerKf7-_PYHvfH74lFA-tEpS37/view?usp=sharing'),
(153, 23, 'NEXLAB', '03/01/2023', 'Excel', 'ไฟล์แขวงของประเทศลาว (Laos Province District) พี่ประพัฒน์', 'พี่ประพัฒน์', 'คุณภัทราอร อมรโอภาคุณ', 'Laos Province-District.xlsx', 'https://docs.google.com/spreadsheets/d/1BF9uxT4POdHUPIwXyHqbMuztDWa_YOQK/edit?usp=sharing&ouid=118179143727330053247&rtpof=true&sd=true'),
(154, 23, 'NEXLAB', '03/01/2023', 'Excel', 'ไฟล์ข้อมูลผู้ป่วยเก่า 800 รายชื่อ ของประเทศลาว (Laos Province District) Sample For Migration พี่ประพัฒน์', 'พี่ประพัฒน์', 'คุณภัทราอร อมรโอภาคุณ', 'SampleForMigration.xlsx', 'https://docs.google.com/spreadsheets/d/1xPmPxpa1sl7ajebY2QSx5femjElSBbGs/edit#gid=782413872'),
(155, 23, 'NEXLAB', '30/01/2023', 'PDF', 'HL7 Interfacing Specification ', 'API Interface', 'คุณภัทราอร อมรโอภาคุณ', 'HL7 Interfacing Specification.pdf', 'https://drive.google.com/file/d/1-ukI9xn0e_ExqWEqOzYbuCgNPpuUpaXT/view?usp=sharing'),
(156, 23, 'NEXLAB', '03/01/2023', 'PDF', 'Annex D - Tests and Equipment', 'คู่มือ', 'คุณภัทราอร อมรโอภาคุณ', 'Annex D - Tests and Equipment.pdf', 'https://drive.google.com/file/d/1FUqQC1yTQJ3tlYnjlsO4bjmsS1gWtSus/view?usp=sharing'),
(157, 23, 'NEXLAB', '03/01/2023', 'PDF', 'PMOS-LPDR LIS Complie TOR', 'TOR', 'คุณภัทราอร อมรโอภาคุณ', 'Annex D - Tests and Equipment.pdf', 'https://drive.google.com/file/d/1ixQuDm9z3FAnzJbWYHOrpHbPxotHBCG6/view?usp=sharing'),
(158, 23, 'NEXLAB', '10/01/2023', 'Other', 'คู่มือการติดตั้ง Print Sticker และ Software Print Sticker', 'Software Print Sticker', 'คุณภัทราอร อมรโอภาคุณ', 'Setup Barcode.rar', 'https://drive.google.com/file/d/1S9fZ2qyOqgyYEfkRIZC77wRZ1ZBtREvo/view?usp=sharing'),
(159, 15, 'Health Kit Set', '11/01/2023', 'Excel', 'Stock_รพ.พนมไพร', 'Stock_รพ.พนมไพร', 'คุณภัทราอร อมรโอภาคุณ', 'Strock_รพ.พนมไพร.xlsx', 'https://docs.google.com/spreadsheets/d/1QbllQiujoZQ9JtfsKXTvWPT3pkpeWsQn/edit#gid=871938110'),
(160, 15, 'Health Kit Set', '16/01/2023', 'Excel', 'ข้อมูลผู้รับบริการ และเจ้าหน้าที่ โรงพยาบาลพนมไพร (16/01/2023)', 'Templated', 'คุณภัทราอร อมรโอภาคุณ', 'template โรงพยาบาลพนมไพร.xlsx', 'https://docs.google.com/spreadsheets/d/1KDPC11tcNmRgePbKHvsJi5bLuFWU3se9/edit?usp=drive_web&ouid=118179143727330053247&rtpof=true'),
(161, 13, 'Public Care Services', '19/01/2023', 'Excel', 'Link Dashboard 14 ชุมชน', 'Link', 'คุณภัทราอร อมรโอภาคุณ', 'Link_Dashboard_ชุมชน.xlsx', 'https://docs.google.com/spreadsheets/d/19L35txtFvbyTlki1GNnoHxb97rNOczSm/edit?usp=drive_web&ouid=118179143727330053247&rtpof=true'),
(162, 23, 'NEXLAB', '25/01/2023', 'Other', 'Order_Interface_Results', 'Result', 'คุณภัทราอร อมรโอภาคุณ', 'OrderInterfaceResults.rar', 'https://drive.google.com/file/d/173tAFzlzG3wg12C_17NhJzVUnckckJ9P/view?usp=sharing'),
(163, 23, 'NEXLAB', '27/01/2023', 'JPG/PNG', 'รูปภาพประกอบการลงพื้นที่ UAT LAOS (23-260123)', 'รูปภาพ', 'คุณภัทราอร อมรโอภาคุณ', 'รูปภาพประกอบการลงพื้นที่ LAOS 23-270123.rar', 'https://drive.google.com/drive/folders/1xhxqwJFrVj7GEhIz3KVejNSc3Ilnsjh9?usp=sharing'),
(164, 23, 'NEXLAB', '30/01/2023', 'Other', 'ลิงค์เทสส่งผลแล็บ (Link Result Interface PHP)', 'Link Result Interface', 'คุณภัทราอร อมรโอภาคุณ', '', 'http://58.137.58.168/GeneXpertTestResult/test.php'),
(165, 23, 'NEXLAB', '30/01/2023', 'PDF', 'LIS HL7 Interfacing Specification 2', 'API Interface', 'คุณภัทราอร อมรโอภาคุณ', 'LIS HL7 Interfacing Specification 2.pdf', 'https://drive.google.com/file/d/1jBuXCUv_0QesLjma3VfVICZjYQaPZbWo/view?usp=sharing'),
(166, 23, 'NEXLAB', '30/01/2023', 'Other', 'รายละเอียดของ Huawei Clound ทั้งหมด', 'Huawei Clound', 'คุณภัทราอร อมรโอภาคุณ', 'HuaweiCloudServer.rar', 'https://drive.google.com/file/d/1xEy8ybRe41Db_pp3pQ50tzUYMET16HaP/view?usp=sharing'),
(167, 23, 'NEXLAB', '01/02/2023', 'Document', 'Support Printer รพ. ธนบุรี', 'Print Sticker ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1_ZEcO58vpkjJMUAlZO41-hlacfuhcTDnE295KdnPfzs/edit'),
(168, 20, 'Emergency Monitoring', '08/02/2023', 'Document', 'Agenda_การลงพื้นที่ติดตั้งอุปกรณ์เฝ้าระวังเหตุฉุกเฉินในผู้สูงอายุ (14/02/2023)', 'Agenda', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1YlFzfyMZ3PV7hdo9nPZdkP26VIAeXMD5/edit'),
(169, 20, 'Emergency Monitoring', '09/02/2023', 'Document', 'รายชื่อผู้ผ่านการคัดเลือกเข้าร่วมโครงการ \"บ่อวิน สมาร์ท ซิตี้” ', 'รายชื่อ', 'คุณภัทราอร อมรโอภาคุณ', 'รายชื่อผู้ผ่านการคัดเลือกเข้าร่วมโครงกา.docx', 'https://docs.google.com/document/d/1DNUmVrsa8LlXuxhqTvtOp_uawdNOcmmu3ZQ4kr-f7NI/edit'),
(170, 27, 'Emergency Monitoring', '13/02/2023', 'JPG/PNG', 'ยืนยันใบเสนอราคา', 'มาบตาพุด', 'คุณภัทราอร อมรโอภาคุณ', 'ใบตอบรับการเช่าอุปกรณ์_ต่อ.jpg', ''),
(171, 27, 'Emergency Monitoring', '13/02/2023', 'JPG/PNG', 'เอกสารโอนเงินชำระค่าเช่าใช้อุปกรณ์', 'มาบตาพุด', 'คุณภัทราอร อมรโอภาคุณ', 'ใบโอนเงินการเช่าอุปกรณ์ 65_66.jpg', ''),
(172, 27, 'Emergency Monitoring', '13/02/2023', 'Excel', 'Sale Order', 'มาบตาพุด', 'คุณภัทราอร อมรโอภาคุณ', 'SO_Q_65_66_กองทุนสนันสนุนการจัดบริการศูนย์พัฒนาคุณภาพชีวิตผู้สูงอายุและคนพิการเมืองมาบตาพุด.xls', ''),
(173, 13, 'Public Care Services', '13/02/2023', 'Presentation', 'ข้อมูลนำเสนอการใช้งานแพลตฟอร์ม และอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'Presentation ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/presentation/d/12uWLxLLZR9UWt35cdRADTo5OWVsMnp1w/edit#slide=id.gfc9b79eeda_0_782'),
(174, 20, 'Emergency Monitoring', '13/02/2023', 'JPG/PNG', 'เอกสารสั่งซื้อสั่งจ้าง_เช่าใช้ 8 เดือน', 'อบต.บ่อวิน', 'คุณภัทราอร อมรโอภาคุณ', 'เอกสารสั่งซื้อสั่งจ้าง_เช่าใช้อุปกรณ์ 8 เดือน.jpg', ''),
(175, 13, 'Public Care Services', '13/02/2023', 'PDF', 'Quatation', 'TCELS', 'คุณภัทราอร อมรโอภาคุณ', 'QT_TCELS_2021-10-27.pdf', ''),
(176, 13, 'Public Care Services', '13/02/2023', 'PDF', 'หนังสือขอเข้าร่วมสนับสนุนโครงการปีที่ 2', 'หนังสือตอบกลับ_ม.หหิดล', 'คุณภัทราอร อมรโอภาคุณ', 'หนังสือตอบรับร่วมขับเคลื่อนธรรมนูญสุขภาพในชุมชนฯ_PIT.pdf', ''),
(177, 31, 'Access Control', '13/02/2023', 'PDF', 'เอกสารสั่งซื้อสั่งจ้าง', 'เอกสารสั่งซื้อสั่งจ้าง', 'คุณภัทราอร อมรโอภาคุณ', 'ใบสั่งซื้อระบบ Access Control.pdf', ''),
(178, 31, 'Access Control', '13/02/2023', 'PDF', 'เอกสารยื่นงาน', 'เอกสารยื่นงาน', 'คุณภัทราอร อมรโอภาคุณ', 'เอกสารจัดซื้อระบบ Access Control_Point IT.zip', ''),
(179, 31, 'Access Control', '13/02/2023', 'Document', 'เอกสารส่งมอบงาน', 'เอกสารส่งมอบงาน', 'คุณภัทราอร อมรโอภาคุณ', 'เอกสารส่งมอบงาน Access Control_สสวท_23-2-6.docx', ''),
(180, 31, 'Access Control', '13/02/2023', 'Document', 'เอกสารรับประกันสินค้า', 'เอกสารรับประกันสินค้า', 'คุณภัทราอร อมรโอภาคุณ', 'เอกสารการรับประกันสินค้า.doc', ''),
(181, 31, 'Access Control', '13/02/2023', 'Document', 'หนังสือนัดหมายกรรมการส่งมอบงาน', 'หนังสือนัดหมายกรรมการส่งมอบงาน', 'คุณภัทราอร อมรโอภาคุณ', 'จดหมายส่งมอบงาน สสวท_Access Control_23-2-13.doc', ''),
(182, 31, 'Access Control', '13/02/2023', 'PDF', 'คู่มือการใช้งาน ZK Smart AC1+ (รูปแบบใช้อบรม)', 'คู่มือการใช้งาน ZK Smart AC1+ (รูปแบบใช้อบรม)', 'คุณภัทราอร อมรโอภาคุณ', 'BioAccess.pdf', ''),
(183, 31, 'Access Control', '13/02/2023', 'PDF', 'คู่มือการใช้งาน ZK Smart AC1+', 'คู่มือการใช้งาน ZK Smart AC1+', 'คุณภัทราอร อมรโอภาคุณ', 'SmartAC1+-+User+manual+(EN+Ver.).pdf', ''),
(184, 31, 'Access Control', '13/02/2023', 'PDF', 'Guide Smart AC1+ (การติดตั้งชุดอุปกรณ์+การลงทะเบียนระบบ)', 'Guide Smart AC1+ (การติดตั้งชุดอุปกรณ์+การลงทะเบียนระบบ)', 'คุณภัทราอร อมรโอภาคุณ', 'SmartAC1+-+Quick++Start+++Guide+(EN+Ver.).pdf', ''),
(185, 31, 'Access Control', '13/02/2023', 'PDF', 'เอกสารข้อมูลสินค้า ZK Smart AC1+', 'เอกสารข้อมูลสินค้า ZK Smart AC1+', 'คุณภัทราอร อมรโอภาคุณ', 'SmartAC1+-+เอกสารข้อมูลผลิตภัณฑ์+(โบรชัวร์).pdf', ''),
(186, 31, 'Access Control', '13/02/2023', 'Document', 'เอกสารร่าง TOR', 'เอกสารร่าง TOR', 'คุณภัทราอร อมรโอภาคุณ', 'ขอบเขตงานงาน_23-1-24.docx', ''),
(187, 32, 'Access Control', '13/02/2023', 'PDF', 'เอกสาร PO', 'เอกสาร PO', 'คุณภัทราอร อมรโอภาคุณ', 'PO_ติดตั้ง Access Control.pdf', ''),
(188, 32, 'Access Control', '13/02/2023', 'Excel', 'Sale Order', 'Sale Order', 'คุณภัทราอร อมรโอภาคุณ', 'Sale Order_ZG.xlsx', ''),
(189, 32, 'Access Control', '13/02/2023', 'PDF', 'เอกสารใบเสนอราคา', 'เอกสารใบเสนอราคา', 'คุณภัทราอร อมรโอภาคุณ', 'QT-000000687_Access Control_ZG.pdf', ''),
(190, 32, 'Access Control', '13/02/2023', 'Document', 'เอกสารติดตั้ง', 'เอกสารติดตั้ง', 'คุณภัทราอร อมรโอภาคุณ', 'Installation Access Control_ZG.docx', ''),
(191, 31, 'Access Control', '14/02/2023', 'JPG/PNG', 'เอกสารตรวจรับงาน', 'เอกสารตรวจรับงาน', 'คุณภัทราอร อมรโอภาคุณ', 'เอกสารรับมอบงาน_สสวท..jpg', ''),
(192, 44, 'Application', '14/02/2023', 'PDF', 'Medical Service Record Form', 'Medical Service Record Form', 'คุณภัทราอร อมรโอภาคุณ', 'Medical Service Record Form v13.pdf', ''),
(193, 28, 'Data Science', '15/02/2023', 'Other', 'Brochure-AI Tracker', 'Brochure', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://drive.google.com/drive/u/1/folders/1hp4G6vtkvN1b6GlM8pjiU6vUmOAH2SJ5'),
(194, 20, 'Emergency Monitoring', '16/02/2023', 'Excel', 'Account Templated อบต.บ่อวิน', 'Account Templated ', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/spreadsheets/d/1tdZJLf_az0j3zxIDQGnEHGHBsPQUzofgCqMozrToOZI/edit#gid=0'),
(195, 45, 'โครงการค่าเช่าใช้ชุดเฝ้าระวังเหตุฉุกเฉินการล้มในผู้สูงอายุภายในบ้านและภายนอกบ้านพร้อมระบบแพลตฟอร์มเฝ้าระวังเหตุฉุกเฉินในผู้สูงอายุ ระยะเวลา 1 ปี', '23/02/2023', 'PDF', 'ใบเสนอราคา  POC 20 Unit', 'ใบเสนอราคา  POC 20 Unit', 'คุณภัทราอร อมรโอภาคุณ', 'QT Emergency Solution_POC 20 U_UTI_23-2-23.pdf', ''),
(196, 46, 'Emergency Monitoring', '27/02/2023', 'Document', 'กำหนดการลงพื้นที่ติดตั้งอุปกรณ์เฝ้าระวังเหตุฉุกเฉินในผู้สูงอายุ 2566', 'Agenda', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/u/0/d/1EdWFDzB737HthTqiiOusYL8Wy6BHdDf9/edit?fromCopy=true'),
(197, 46, 'Emergency Monitoring', '27/02/2023', 'Excel', 'คัดแยกประเภทการแจ้งเตือนกลุ่มเป้าหมาย กลุ่มผู้สูงอายุเทศบาลทับมา', 'Leval Ai Tracker', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/spreadsheets/d/1NJ_BxoDfcM4MHpxQgNiKsM_Vz16UzWpR/edit#gid=1488058773'),
(198, 46, 'Emergency Monitoring', '28/02/2023', 'Document', 'เอกสารรายงาน สรุปโครงการ POC ชุดอุปกรณ์เฝ้าระวังเหตุฉุกเฉินในผู้สูงอายุ (14/10/2565)', 'POC', 'คุณภัทราอร อมรโอภาคุณ', '', 'https://docs.google.com/document/d/1cxZqeOgt8dXtHlQEFZ7BPEyRDjLsjW5rbgUN_6Uv2EQ/edit'),
(199, 47, 'Smart City', '28/02/2023', 'Presentation', 'Presentation_อบจ.ชลบุรี', 'Presentation_อบจ.ชลบุรี', 'คุณภัทราอร อมรโอภาคุณ', 'Telemedicine_อบจ.ชลบุรี_PIT_23-2-16__Tum.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(10) NOT NULL,
  `image_pk` int(10) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `project_id` int(10) NOT NULL,
  `project_date` datetime NOT NULL COMMENT 'วันที่สร้าง',
  `project_name` varchar(255) NOT NULL COMMENT 'ชื่อโครงการ',
  `project_start` date NOT NULL COMMENT 'วันเริ่มสัญญา',
  `project_end` date NOT NULL COMMENT 'วันสิ้นสุดสัญญา',
  `project_in` varchar(100) NOT NULL COMMENT 'เลขที่สัญญา',
  `project_price` int(255) NOT NULL COMMENT 'ราคาขาย',
  `project_cost` int(255) NOT NULL COMMENT 'ราคาต้นทุน',
  `project_profit` int(255) NOT NULL COMMENT 'กำไร',
  `project_team` varchar(255) NOT NULL COMMENT 'ทีม',
  `project_status` varchar(255) NOT NULL COMMENT 'สถานะการดำเนินการ',
  `project_pro` int(200) NOT NULL COMMENT 'ความคืบหน้า',
  `project_detail` varchar(256) NOT NULL COMMENT 'รายละเอียดโครงการ',
  `project_year` int(11) NOT NULL COMMENT 'จำนวนปี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_upfile`
--

CREATE TABLE `tb_upfile` (
  `upfile_id` int(10) NOT NULL COMMENT 'รหัสยูนีคไอดี',
  `project_id` int(10) NOT NULL COMMENT 'รหัสเชื่อมข้อมูลกับ Project	',
  `upfile_sub` varchar(1000) NOT NULL COMMENT 'ชื่อ album',
  `upfile` varchar(1000) NOT NULL COMMENT 'เก็บไฟล์ชื่อ',
  `upfile_name` varchar(1100) NOT NULL COMMENT 'ชื่อผู้บันทึก',
  `upfile_date` varchar(1000) NOT NULL COMMENT 'วันที่บันทึกข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_upfile`
--

INSERT INTO `tb_upfile` (`upfile_id`, `project_id`, `upfile_sub`, `upfile`, `upfile_name`, `upfile_date`) VALUES
(15, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', '354052.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(16, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', '354021.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(17, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', '354020.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(18, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', '354019.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(19, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', '354018.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(20, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', '354017.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(21, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', 'S__31351178.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(22, 13, 'รูปภาพการลงพื้นที่แนะนำการใช้งานชุดกระเป๋าและเก็บข้อมูลปัญหาจากผู้นำชุมชน', 'S__31351118.jpg', 'คุณอภิรักษ์ บางพุก', '04/12/2022 12:00 AM'),
(23, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38336.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(24, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38337.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(25, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38338.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(26, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38339.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(27, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38340.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(28, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38341.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(29, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38342.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(30, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38343.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(31, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38344.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(32, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38345.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(33, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38346.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(34, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38348.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(35, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38347.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(36, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38349.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(37, 12, 'รูปภาพ ประชุมการนำเสนอระบบ SMART SECURITY PLATFORM โรงเรียนนายร้อยสามพาน จ.นครปฐม', '38349_0.jpg', 'คุณอภิรักษ์ บางพุก', '10/28/2022 12:00 AM'),
(38, 17, '', 'S__77471765.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(39, 17, '', 'S__77471767.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(40, 17, '', 'S__77471768.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(41, 17, '', 'S__77471769.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(42, 17, '', 'S__77471770.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(43, 17, '', 'S__77471771.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(44, 17, '', 'S__77471772.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(45, 17, '', 'S__77471773.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(46, 17, '', 'S__77471774.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(47, 17, '', 'S__77471775.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(48, 17, '', 'S__77471776.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(49, 17, '', 'S__77471778.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(50, 17, '', 'S__77471779.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(51, 17, '', 'S__77471780.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(52, 17, '', 'S__77471781.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(53, 17, '', 'S__77471782.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(54, 17, '', 'S__77471783.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(55, 17, '', 'S__77471784.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/11/2022'),
(56, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_49.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(57, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_50.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(58, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_51.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(59, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_52.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(60, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_53.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(61, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_54.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(62, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_55.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(63, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_39.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(64, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_40.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(65, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_41.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(66, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_42.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(67, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_43.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(68, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_44.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(69, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_45.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(70, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_46.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(71, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_47.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(72, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_48.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(73, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_25.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(74, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_26.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(75, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_27.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(76, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_28.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(77, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_29.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(78, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_30.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(79, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_31.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(80, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_32.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(81, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_33.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(82, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_34.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(83, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_35.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(84, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_36.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(85, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_37.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(86, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_38.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(87, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(88, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(89, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(90, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(91, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(92, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(93, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(94, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_7.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(95, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_8.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(96, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_9.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(97, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_10.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(98, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_11.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(99, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_12.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(100, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_13.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(101, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_14.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(102, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_15.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(103, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(104, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(105, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(106, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(107, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(108, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(109, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(110, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(111, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(112, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(113, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(114, 20, 'รูปการลงพื้นที่ แนะนำการใช้งานอุปกรณ์ AI Tracker คัดเลือกกลุ่มเป้าหมาย ของกลุ่ม อสม 70 คน', 'LINE_ALBUM_เทศบาลตำบลบ่อวิน ชลบุรี_221115_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '15/11/2022'),
(115, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(116, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_0_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(117, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(118, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_1_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(119, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(120, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_2_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(121, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(122, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_3_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(123, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(124, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_4_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(125, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(126, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_5_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(127, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(128, 21, 'ลงพื้นที่นำเสนอระบบเฝ้าระวังเหตุฉุกเฉินตรวจจับการล้ม (Sign MOU) ระหว่างหน่วยงานเทศบาล โรงพยาบาล และหน่วยงานที่เกี่ยวข้อง', 'LINE_ALBUM_Emergency Monitoring เทศบาลเมืองป่าตอง_221116_6_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '16/11/2022'),
(129, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(130, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(131, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(132, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(133, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(134, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(135, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(136, 17, 'รูป POC ระบบ Emergency เทศบางตำบลบ้างจะเกร็ง (31/11/2022)', 'LINE_ALBUM_POC ระบบ Emergency เทศบาลตำบลบางจะเกร็ง_221130_7.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/11/2022'),
(137, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(138, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(139, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(140, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(141, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(142, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(143, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(144, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_7.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(145, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_8.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(146, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_9.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(147, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_10.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(148, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_11.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(149, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_12.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(150, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_13.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(151, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_14.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(152, 23, 'รูปการลงพื้นที่ แนะนำการใช้งาน POC ระบบบ LAOS National LIS', 'LINE_ALBUM_POC Laos National Lis 51265_221208_15.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/12/2022 12:00 AM'),
(153, 26, 'DHTC Bangkok (07/12/2022)', '220607.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(154, 26, 'DHTC Bangkok (07/12/2022)', '220608.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(155, 26, 'DHTC Bangkok (07/12/2022)', '220609.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(156, 26, 'DHTC Bangkok (07/12/2022)', '220610.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(157, 26, 'DHTC Bangkok (07/12/2022)', '220611.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(158, 26, 'DHTC Bangkok (07/12/2022)', '220612.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(159, 26, 'DHTC Bangkok (07/12/2022)', '220613.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(160, 26, 'DHTC Bangkok (07/12/2022)', '220614.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(161, 26, 'DHTC Bangkok (07/12/2022)', '220885.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(162, 26, 'DHTC Bangkok (07/12/2022)', '220886.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(163, 26, 'DHTC Bangkok (07/12/2022)', '220887.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(164, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(165, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_0_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(166, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(167, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_1_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(168, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(169, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_2_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(170, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(171, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_3_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(172, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(173, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_4_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(174, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(175, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_5_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(176, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(177, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_6_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(178, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_7.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(179, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_7_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(180, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_8.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(181, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_9.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(182, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_10.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(183, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_11.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(184, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_12.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(185, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_13.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(186, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_14.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(187, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_15.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(188, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_16.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(189, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_17.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(190, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_18.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(191, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_19.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(192, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_20.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(193, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_21.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(194, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_22.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(195, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_23.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(196, 26, 'DHTC Bangkok (07/12/2022)', 'LINE_ALBUM_DHTC Bangkok 2022 - 7 Dec_221209_24.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(197, 26, 'DHTC Bangkok (08/12/2022)', '221500.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(198, 26, 'DHTC Bangkok (08/12/2022)', '221501.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(199, 26, 'DHTC Bangkok (08/12/2022)', '221502.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(200, 26, 'DHTC Bangkok (08/12/2022)', '221503.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(201, 26, 'DHTC Bangkok (08/12/2022)', '221504.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(202, 26, 'DHTC Bangkok (08/12/2022)', '221505.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(203, 26, 'DHTC Bangkok (08/12/2022)', '221506.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(204, 26, 'DHTC Bangkok (08/12/2022)', '221507.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(205, 26, 'DHTC Bangkok (08/12/2022)', '221508.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(206, 26, 'DHTC Bangkok (08/12/2022)', '221509.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(207, 26, 'DHTC Bangkok (08/12/2022)', '221510.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(208, 26, 'DHTC Bangkok (08/12/2022)', '221511.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(209, 26, 'DHTC Bangkok (08/12/2022)', '221512.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(210, 26, 'DHTC Bangkok (08/12/2022)', '221513.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(211, 26, 'งานประชุมอัพเดท Product ZG, Vam, PT', '95794_02122022.jpg', 'คุณภัทราอร อมรโอภาคุณ', '09/12/2022'),
(212, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101247.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(213, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101255.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(214, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101301.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(215, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101303.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(216, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101304.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(217, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101310.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(218, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_101312.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(219, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102658.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(220, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102701.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(221, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102704.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(222, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102709.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(223, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102714.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(224, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102717.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(225, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102722.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(226, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102730.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(227, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_102737.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(228, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113603.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(229, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113605.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(230, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113607.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(231, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113611.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(232, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113612.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(233, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113623.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(234, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113627.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(235, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113637.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(236, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113638.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(237, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_113640.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(238, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120822.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(239, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120824.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(240, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120825.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(241, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120828.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(242, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120830.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(243, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120852.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(244, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120855.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(245, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120856.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(246, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120859.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(247, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120908.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(248, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120913.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(249, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_120916.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(250, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_125745.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(251, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_125746.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(252, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_125749.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(253, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_125751.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(254, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'IMG_20220905_155756.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(255, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_0.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(256, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_1.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(257, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_2.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(258, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_3.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(259, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_4.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(260, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_5.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(261, 15, 'รูปการลงพื้นที่ แนะนำการใช้งานระบบกินอยู่ดี และชุดอุปกรณ์คัดกรองสถานะค่าสุขภาพ', 'LINE_ALBUM_Demo ระบบ Health screening รพ.พนมไพร จ.ร้อยเอ็ด_220905_6.jpg', 'คุณภัทราอร อมรโอภาคุณ', '05/09/2565 12:00 AM'),
(262, 23, 'รายละเอียดของ Huawei Clound ทั้งหมดครับ', 'DomainName.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/01/2023'),
(263, 23, 'รายละเอียดของ Huawei Clound ทั้งหมดครับ', 'Huawei_IP_Address.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/01/2023'),
(264, 23, 'รายละเอียดของ Huawei Clound ทั้งหมดครับ', 'Secure_Connection.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/01/2023'),
(265, 23, 'รายละเอียดของ Huawei Clound ทั้งหมดครับ', 'SSL_Certificate.jpg', 'คุณภัทราอร อมรโอภาคุณ', '30/01/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL COMMENT 'ไอดี',
  `user_name` text NOT NULL COMMENT 'ชื่อ',
  `user_lastname` text NOT NULL COMMENT 'นามสกุล',
  `user_position` text NOT NULL COMMENT 'ตำแหน่ง',
  `user_team` text NOT NULL COMMENT 'ทีม',
  `user_role` text NOT NULL COMMENT 'บทบาท',
  `user_email` varchar(256) NOT NULL COMMENT 'อิเมล',
  `user_tel` varchar(256) NOT NULL COMMENT 'เบอร์โทร',
  `user_company` varchar(256) NOT NULL COMMENT 'บริษัท',
  `username` varchar(256) NOT NULL COMMENT 'ชื่อเข้าใช้งาน',
  `password` varchar(256) NOT NULL COMMENT 'รหัสผ่าน',
  `user_date` varchar(256) NOT NULL COMMENT 'วันที่สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_lastname`, `user_position`, `user_team`, `user_role`, `user_email`, `user_tel`, `user_company`, `username`, `password`, `user_date`) VALUES
(8, 'Apirak', 'bangpuk', 'Service Application', 'Innovation', 'Administrator', 'apirak@gmail.com', '(083) 959-5800', 'Point IT', 'apirak', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '19/03/2023'),
(9, 'Phattraorn', 'Amornophakun', 'Sale', 'Innovation', 'Administrator', 'phattraorn@gmail.com', '(061) 952-2111', 'Point IT', 'phattraorn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '19/03/2023'),
(10, 'Awirut', 'sandee', 'Project Manager', 'Infrastructure', 'Engineer', 'fd@gmail.com', '(066) 666-6666', 'Point IT', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '31/05/2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tb_files`
--
ALTER TABLE `tb_files`
  ADD PRIMARY KEY (`files_id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tb_upfile`
--
ALTER TABLE `tb_upfile`
  ADD PRIMARY KEY (`upfile_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_files`
--
ALTER TABLE `tb_files`
  MODIFY `files_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_upfile`
--
ALTER TABLE `tb_upfile`
  MODIFY `upfile_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยูนีคไอดี', AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
