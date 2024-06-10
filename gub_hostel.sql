-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 05:29 PM
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
-- Database: `gub_hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('admin1', '123'),
('admin2', '456'),
('admin3', '123'),
('admin4', '456');

-- --------------------------------------------------------

--
-- Table structure for table `admin_c_room`
--

CREATE TABLE `admin_c_room` (
  `bed_id` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `room_type` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_c_room`
--

INSERT INTO `admin_c_room` (`bed_id`, `amount`, `room_type`, `status`) VALUES
('B001', 6999, 'standard', 1),
('B002', 6999, 'standard', 1),
('B003', 6999, 'standard', 1),
('B004', 9999, 'Business', 0),
('B005', 9999, 'Business', 0),
('B006', 9999, 'Business', 0),
('B1', 6999, 'standard', 1),
('B2', 6999, 'standard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `room_id` varchar(10) NOT NULL,
  `bed_id` varchar(30) NOT NULL,
  `floor_no` varchar(30) NOT NULL,
  `room_type` varchar(30) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`room_id`, `bed_id`, `floor_no`, `room_type`, `amount`) VALUES
('R101', 'B1', '1', 'Single', 1000),
('R101', 'B2', '1', 'Double', 800),
('R102', 'B1', '1', 'Single', 1000),
('R102', 'B2', '1', 'Double', 800),
('R201', 'B1', '2', 'Single', 1200),
('R201', 'B2', '2', 'Double', 900);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `email` varchar(255) NOT NULL,
  `bed_id` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`email`, `bed_id`, `amount`) VALUES
('asif@gmail.com', 'B001', 6999),
('asif@gmail.com', 'B002', 6999),
('farhan@gmail.com', 'B003', 6999);

-- --------------------------------------------------------

--
-- Table structure for table `student_allocation`
--

CREATE TABLE `student_allocation` (
  `s_id` varchar(30) NOT NULL,
  `bed_id` varchar(30) NOT NULL,
  `floor_no` varchar(30) DEFAULT NULL,
  `room_id` varchar(10) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `s_id` varchar(30) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `mother` varchar(30) DEFAULT NULL,
  `father` varchar(30) DEFAULT NULL,
  `b_date` date DEFAULT NULL,
  `local_guardian` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`s_id`, `s_name`, `mother`, `father`, `b_date`, `local_guardian`, `address`, `phone`, `email`, `password`, `photo`) VALUES
('s-87', 'Farhan', 'Sayeda', 'Kabir', '2002-07-14', 'guardian', 'Uttara Bank goli', '0188888', 'farhan@gmail.com', 'farhan', 0x37663432616234323936376130303132306463396466643761313933616135392e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin_c_room`
--
ALTER TABLE `admin_c_room`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`room_id`,`bed_id`,`floor_no`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`email`,`bed_id`);

--
-- Indexes for table `student_allocation`
--
ALTER TABLE `student_allocation`
  ADD PRIMARY KEY (`s_id`,`bed_id`,`email`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `bed_id` (`bed_id`),
  ADD KEY `floor_no` (`floor_no`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`s_id`,`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_allocation`
--
ALTER TABLE `student_allocation`
  ADD CONSTRAINT `fk1_std_alc` FOREIGN KEY (`s_id`) REFERENCES `student_registration` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4_std_alc` FOREIGN KEY (`room_id`) REFERENCES `hostel` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
