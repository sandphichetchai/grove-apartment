-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 06:10 AM
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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(45) DEFAULT NULL,
  `admin_password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

CREATE TABLE `tb_bill` (
  `bill_id` int(11) NOT NULL,
  `electic` float DEFAULT NULL,
  `water` varchar(45) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `bill_date` date DEFAULT NULL,
  `Rent_rent_id` varchar(45) NOT NULL,
  `electric_electric_id` int(11) NOT NULL,
  `Water_water_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `booking_id` int(11) NOT NULL,
  `bookingcol` varchar(45) DEFAULT NULL,
  `room_id` varchar(45) DEFAULT NULL,
  `customer_cus_id_1` int(11) NOT NULL,
  `customer_cus_id_2` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `Bookingcol1` varchar(45) DEFAULT NULL,
  `Bill_bill_id` int(11) NOT NULL,
  `room_room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `cus_Fname` varchar(45) DEFAULT NULL,
  `cus_Lname` varchar(45) DEFAULT NULL,
  `cus_address` varchar(255) DEFAULT NULL,
  `personal_id` varchar(11) DEFAULT NULL,
  `cus_tell` varchar(10) DEFAULT NULL,
  `cus_email` varchar(45) DEFAULT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_electric`
--

CREATE TABLE `tb_electric` (
  `electric_id` int(11) NOT NULL,
  `electric_start` int(11) DEFAULT NULL,
  `electric_end` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion`
--

CREATE TABLE `tb_promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_text` text NOT NULL,
  `promotion_option` text NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `promotion_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rent`
--

CREATE TABLE `tb_rent` (
  `room_id` int(11) NOT NULL,
  `rent_id` varchar(45) NOT NULL,
  `cus_id_1` int(11) NOT NULL,
  `cus_id_2` int(11) DEFAULT NULL,
  `Bill_bill_id` int(11) NOT NULL,
  `Customer_cus_id` int(11) NOT NULL,
  `Customer_cus_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `room_id` int(11) NOT NULL,
  `room_prince` float DEFAULT NULL,
  `room_size` varchar(45) DEFAULT NULL,
  `room_status` int(11) DEFAULT NULL,
  `rent_deposent` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_water`
--

CREATE TABLE `tb_water` (
  `water_id` int(11) NOT NULL,
  `water_start` int(11) DEFAULT NULL,
  `water_end` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `fk_Bill_Rent1_idx` (`Rent_rent_id`),
  ADD KEY `fk_Bill_electric1_idx` (`electric_electric_id`),
  ADD KEY `fk_Bill_Water1_idx` (`Water_water_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`customer_cus_id_1`),
  ADD KEY `fk_Booking_Bill1_idx` (`Bill_bill_id`),
  ADD KEY `fk_Booking_room1_idx` (`room_room_id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tb_electric`
--
ALTER TABLE `tb_electric`
  ADD PRIMARY KEY (`electric_id`);

--
-- Indexes for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `tb_rent`
--
ALTER TABLE `tb_rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `fk_Rent_Customer1_idx` (`Customer_cus_id`),
  ADD KEY `fk_Rent_Customer2_idx` (`Customer_cus_id1`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tb_water`
--
ALTER TABLE `tb_water`
  ADD PRIMARY KEY (`water_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD CONSTRAINT `fk_Bill_Rent1` FOREIGN KEY (`Rent_rent_id`) REFERENCES `tb_rent` (`rent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bill_Water1` FOREIGN KEY (`Water_water_id`) REFERENCES `tb_water` (`water_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bill_electric1` FOREIGN KEY (`electric_electric_id`) REFERENCES `tb_electric` (`electric_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `fk_Booking_Bill1` FOREIGN KEY (`Bill_bill_id`) REFERENCES `tb_bill` (`bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Booking_room1` FOREIGN KEY (`room_room_id`) REFERENCES `tb_room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_rent`
--
ALTER TABLE `tb_rent`
  ADD CONSTRAINT `fk_Rent_Customer1` FOREIGN KEY (`Customer_cus_id`) REFERENCES `tb_customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rent_Customer2` FOREIGN KEY (`Customer_cus_id1`) REFERENCES `tb_customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
