-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 04:54 AM
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
-- Database: `apartment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

CREATE TABLE `tb_bill` (
  `bill_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `electricity_id` int(11) NOT NULL,
  `water_id` int(11) NOT NULL,
  `rent_id` int(11) NOT NULL,
  `bill_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ออกบิล',
  `total_amount` decimal(10,2) NOT NULL COMMENT 'ราคารวม',
  `payment_date` datetime DEFAULT NULL COMMENT 'วันที่ชำระเงิน',
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=ยังไม่ได้ชำระ, 1=ชำระแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_bill`
--

INSERT INTO `tb_bill` (`bill_id`, `room_id`, `customer_id`, `electricity_id`, `water_id`, `rent_id`, `bill_date`, `total_amount`, `payment_date`, `status`) VALUES
(1, 1, 1, 1, 1, 1, '2023-08-31 12:00:00', 5850.00, '2023-08-31 16:44:00', 1),
(2, 2, 2, 2, 2, 2, '2023-08-31 12:00:00', 7120.00, NULL, 0),
(3, 3, 3, 3, 3, 3, '2023-08-31 12:00:00', 8380.00, '2023-09-01 10:48:15', 1),
(4, 5, 4, 4, 4, 4, '2023-08-31 12:00:00', 5180.00, '2023-09-02 15:19:44', 1),
(5, 1, 5, 5, 5, 5, '2023-08-31 12:00:00', 6010.00, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่จอง',
  `start_date` datetime NOT NULL COMMENT 'วันที่เช็คอิน',
  `end_date` datetime DEFAULT NULL COMMENT 'วันที่เช็คเอาท์',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=ยกเลิก, 1=จองแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`booking_id`, `room_id`, `customer_id`, `booking_date`, `start_date`, `end_date`, `status`) VALUES
(1, 1, 1, '2023-08-01 06:34:12', '2023-08-05 07:00:00', NULL, 1),
(2, 2, 2, '2023-08-02 19:26:42', '2023-08-10 10:00:00', NULL, 1),
(3, 3, 3, '2023-08-03 12:16:40', '2023-08-15 12:00:00', NULL, 1),
(4, 5, 4, '2023-08-04 08:37:14', '2023-08-20 18:00:00', NULL, 0),
(5, 1, 5, '2023-08-05 17:18:48', '2023-08-25 15:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `customer_id` int(11) NOT NULL,
  `citizen_id` varchar(13) DEFAULT NULL COMMENT 'เลขบัตรประชาชน',
  `title` varchar(10) DEFAULT NULL COMMENT 'คำนำหน้าชื่อ',
  `first_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อจริง',
  `last_name` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `email` varchar(255) DEFAULT NULL COMMENT 'อีเมล',
  `previous_address` text DEFAULT NULL COMMENT 'ที่อยู่เดิม',
  `phone_number` int(15) DEFAULT NULL COMMENT 'เบอร์โทร',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อบัญชีผู้ใช้',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `date_registered` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สมัคร account'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_customers`
--

INSERT INTO `tb_customers` (`customer_id`, `citizen_id`, `title`, `first_name`, `last_name`, `email`, `previous_address`, `phone_number`, `username`, `password`, `date_registered`) VALUES
(1, '1234567890123', 'นาย', 'สมชาย', 'ใจดี', 'somchai@example.com', '123 หมู่บ้านสุขสันต์', 812345678, 'somchai', 'password123', '2023-08-01 15:18:37'),
(2, '2345678901234', 'นางสาว', 'สมหญิง', 'แก้วดี', 'somhint@example.com', '456 ถนนสุขาภิบาล', 823456789, 'somhint', 'password234', '2023-08-02 06:33:23'),
(3, '3456789012345', 'นาง', 'พรทิพย์', 'สุขใจ', 'pornthip@example.com', '789 ซอยสุขสำราญ', 834567890, 'pornthip', 'password345', '2023-08-03 20:20:36'),
(4, '4567890123456', 'นาย', 'สมบัติ', 'คงสุข', 'sombat@example.com', '101 ซอยสุขเจริญ', 845678901, 'sombat', 'password456', '2023-08-04 05:34:42'),
(5, '5678901234567', 'นางสาว', 'สมศรี', 'แก้วกาญจน์', 'somsri@example.com', '202 ซอยสุขสำราญ', 856789012, 'somsri', 'password567', '2023-08-05 12:18:42'),
(6, '6789012345678', 'นาย', 'สมชาย', 'ทรงพล', 'somchai2@example.com', '303 หมู่บ้านทรงพล', 867890123, 'somchai2', 'password678', '2023-08-06 08:37:59'),
(7, '7890123456789', 'นาง', 'สมพร', 'แก้วไพร', 'somporn@example.com', '404 ถนนสุขาภิบาล', 878901234, 'somporn', 'password789', '2023-08-07 13:15:00'),
(8, '8901234567890', 'นาย', 'สมศักดิ์', 'เจริญดี', 'somsak@example.com', '505 หมู่บ้านสุขสันต์', 889012345, 'somsak', 'password890', '2023-08-08 05:58:34'),
(9, '9012345678901', 'นางสาว', 'สมพร', 'ใจกว้าง', 'somphorn@example.com', '606 ถนนสุขเจริญ', 890123456, 'somphorn', 'password901', '2023-08-09 14:10:59'),
(10, '0123456789012', 'นาย', 'สมปอง', 'ใจเย็น', 'sompong@example.com', '707 ซอยสุขาภิบาล', 801234567, 'sompong', 'password012', '2023-08-10 06:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_deposit`
--

CREATE TABLE `tb_deposit` (
  `deposit_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL COMMENT 'ค่ามัดจำ',
  `deposit_date` datetime NOT NULL COMMENT 'วันที่จ่ายมัดจำ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_deposit`
--

INSERT INTO `tb_deposit` (`deposit_id`, `customer_id`, `room_id`, `deposit_amount`, `deposit_date`) VALUES
(1, 1, 1, 10000.00, '2023-08-01 11:16:00'),
(2, 2, 2, 12000.00, '2023-08-02 07:14:00'),
(3, 3, 3, 14000.00, '2023-08-03 15:29:00'),
(4, 4, 5, 10000.00, '2023-08-04 20:00:00'),
(5, 5, 1, 10000.00, '2023-08-05 19:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_electricity`
--

CREATE TABLE `tb_electricity` (
  `electricity_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `month_year` varchar(7) NOT NULL COMMENT 'เดือน/ปี ที่ออกบิลค่าไฟฟ้า',
  `unit_used` decimal(10,2) NOT NULL COMMENT 'หน่วยที่ใช้ไป',
  `unit_price` decimal(10,2) NOT NULL COMMENT 'ราคาต่อหน่วย',
  `total_price` decimal(10,2) NOT NULL COMMENT 'หน่วย*ราคาต่อหน่วย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_electricity`
--

INSERT INTO `tb_electricity` (`electricity_id`, `room_id`, `month_year`, `unit_used`, `unit_price`, `total_price`) VALUES
(1, 1, '08/2023', 150.00, 5.00, 750.00),
(2, 2, '08/2023', 200.00, 5.00, 1000.00),
(3, 3, '08/2023', 250.00, 5.00, 1250.00),
(4, 5, '08/2023', 100.00, 5.00, 500.00),
(5, 1, '08/2023', 180.00, 5.00, 900.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rent`
--

CREATE TABLE `tb_rent` (
  `rent_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL COMMENT 'วันที่เริ่มเช่า',
  `end_date` datetime DEFAULT NULL COMMENT 'วันที่ออก',
  `rent_amount` decimal(10,2) NOT NULL COMMENT 'ราคาค่าเช่า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_rent`
--

INSERT INTO `tb_rent` (`rent_id`, `room_id`, `customer_id`, `start_date`, `end_date`, `rent_amount`) VALUES
(1, 1, 1, '2023-08-05 00:00:00', NULL, 5000.00),
(2, 2, 2, '2023-08-10 00:00:00', NULL, 6000.00),
(3, 3, 3, '2023-08-15 00:00:00', NULL, 7000.00),
(4, 5, 4, '2023-08-20 00:00:00', NULL, 5000.00),
(5, 1, 5, '2023-08-25 00:00:00', NULL, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_detail` text NOT NULL COMMENT 'รายละเอียดของห้อง',
  `room_size` varchar(2) NOT NULL COMMENT 's, m, l, xl',
  `room_price` decimal(10,2) NOT NULL COMMENT 'ค่าเช่า',
  `rental_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=ไม่ว่าง, 1=ว่าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`room_id`, `room_number`, `room_detail`, `room_size`, `room_price`, `rental_status`) VALUES
(1, '101', '', 's', 5000.00, 0),
(2, '102', '', 'm', 6000.00, 0),
(3, '103', '', 'l', 7000.00, 0),
(4, '104', '', 'xl', 8000.00, 0),
(5, '105', '', 's', 5000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `staff_id` int(11) NOT NULL,
  `citizen_id` varchar(13) DEFAULT NULL COMMENT 'เลขบัตรประชาชน',
  `title` varchar(10) DEFAULT NULL COMMENT 'คำนำหน้า',
  `first_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อจริง',
  `last_name` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `email` varchar(50) DEFAULT NULL COMMENT 'อีเมล',
  `address` text DEFAULT NULL COMMENT 'ที่อยู่',
  `phone_number` varchar(15) DEFAULT NULL COMMENT 'เบอร์โทร',
  `salary` decimal(10,2) DEFAULT NULL COMMENT 'เงินเดือน',
  `date_joined` datetime DEFAULT current_timestamp() COMMENT 'วันที่สมัครงาน',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อบัญชีผู้ใช้',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `img_profile` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=admin, 1=staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`staff_id`, `citizen_id`, `title`, `first_name`, `last_name`, `email`, `address`, `phone_number`, `salary`, `date_joined`, `username`, `password`, `img_profile`, `status`) VALUES
(3, NULL, NULL, 'Admin', 'Admin', NULL, NULL, NULL, NULL, NULL, 'admin', '$2y$10$RSxLmLNS0nrYMXptaG7pI.hTL/BGhPFDGt6iRgPc5C8KeOxZ/inj6', '', 0),
(5, '123456789', 'นาย', 'แซน', 'test', 'sand@gmail.com', 'จันทบุรี', '0822801948', 25000.00, '2024-08-30 14:38:48', 'san', '$2y$10$O3gpzb.Lt5iluZwrpAuovuQMk2molvdbPKsBv2enpzHNFRCVmR..y', '1294517476.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_water`
--

CREATE TABLE `tb_water` (
  `water_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `month_year` varchar(7) NOT NULL COMMENT 'เดือน/ปี ที่ออกบิลค่าน้ำ',
  `unit_used` decimal(10,2) NOT NULL COMMENT 'หน่วยที่ใช้ไป',
  `unit_price` decimal(10,2) NOT NULL COMMENT 'ราคาต่อหน่วย',
  `total_price` decimal(10,2) NOT NULL COMMENT 'หน่วย*ราคาต่อหน่วย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_water`
--

INSERT INTO `tb_water` (`water_id`, `room_id`, `month_year`, `unit_used`, `unit_price`, `total_price`) VALUES
(1, 1, '08/2023', 50.00, 2.00, 100.00),
(2, 2, '08/2023', 60.00, 2.00, 120.00),
(3, 3, '08/2023', 70.00, 2.00, 140.00),
(4, 5, '08/2023', 40.00, 2.00, 80.00),
(5, 1, '08/2023', 55.00, 2.00, 110.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `electricity_id` (`electricity_id`),
  ADD KEY `water_id` (`water_id`),
  ADD KEY `rent_id` (`rent_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `citizen_id` (`citizen_id`);

--
-- Indexes for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `tb_electricity`
--
ALTER TABLE `tb_electricity`
  ADD PRIMARY KEY (`electricity_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `tb_rent`
--
ALTER TABLE `tb_rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `citizen_id` (`citizen_id`);

--
-- Indexes for table `tb_water`
--
ALTER TABLE `tb_water`
  ADD PRIMARY KEY (`water_id`),
  ADD KEY `room_id` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bill`
--
ALTER TABLE `tb_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_customers`
--
ALTER TABLE `tb_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_electricity`
--
ALTER TABLE `tb_electricity`
  MODIFY `electricity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rent`
--
ALTER TABLE `tb_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_water`
--
ALTER TABLE `tb_water`
  MODIFY `water_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD CONSTRAINT `tb_bill_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`),
  ADD CONSTRAINT `tb_bill_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tb_customers` (`customer_id`),
  ADD CONSTRAINT `tb_bill_ibfk_3` FOREIGN KEY (`electricity_id`) REFERENCES `tb_electricity` (`electricity_id`),
  ADD CONSTRAINT `tb_bill_ibfk_4` FOREIGN KEY (`water_id`) REFERENCES `tb_water` (`water_id`),
  ADD CONSTRAINT `tb_bill_ibfk_5` FOREIGN KEY (`rent_id`) REFERENCES `tb_rent` (`rent_id`);

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tb_customers` (`customer_id`);

--
-- Constraints for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD CONSTRAINT `tb_deposit_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tb_customers` (`customer_id`),
  ADD CONSTRAINT `tb_deposit_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`);

--
-- Constraints for table `tb_electricity`
--
ALTER TABLE `tb_electricity`
  ADD CONSTRAINT `tb_electricity_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`);

--
-- Constraints for table `tb_rent`
--
ALTER TABLE `tb_rent`
  ADD CONSTRAINT `tb_rent_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`),
  ADD CONSTRAINT `tb_rent_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tb_customers` (`customer_id`);

--
-- Constraints for table `tb_water`
--
ALTER TABLE `tb_water`
  ADD CONSTRAINT `tb_water_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
