-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 07:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ves_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `eventDate` varchar(50) NOT NULL,
  `hijriDate` varchar(50) NOT NULL,
  `eventDay` varchar(10) NOT NULL,
  `personName` varchar(50) NOT NULL,
  `personAddress` varchar(100) DEFAULT NULL,
  `personContact` varchar(50) DEFAULT NULL,
  `personCinc` varchar(20) DEFAULT NULL,
  `personEmail` varchar(20) DEFAULT NULL,
  `eventShift` varchar(7) NOT NULL,
  `hallportion` varchar(5) NOT NULL,
  `bookingAmount` int(11) NOT NULL,
  `advanceAmount` int(11) NOT NULL,
  `totalPrice` varchar(20) NOT NULL,
  `totalGuest` int(11) NOT NULL,
  `packages_id` int(11) NOT NULL,
  `currentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eventName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `bookingDate` date DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `hijriDate` varchar(50) DEFAULT NULL,
  `eventDay` varchar(10) DEFAULT NULL,
  `personName` varchar(50) DEFAULT NULL,
  `personAddress` varchar(100) DEFAULT NULL,
  `personContact` varchar(50) DEFAULT NULL,
  `personCinc` varchar(20) DEFAULT NULL,
  `personEmail` varchar(20) DEFAULT NULL,
  `eventShift` varchar(10) DEFAULT NULL,
  `hallportion` varchar(5) DEFAULT NULL,
  `bookingAmount` int(11) DEFAULT NULL,
  `advanceAmount` int(11) DEFAULT NULL,
  `totalPrice` varchar(20) DEFAULT NULL,
  `totalGuest` int(11) DEFAULT NULL,
  `eventName` varchar(50) DEFAULT NULL,
  `currentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `bookingDate`, `eventDate`, `hijriDate`, `eventDay`, `personName`, `personAddress`, `personContact`, `personCinc`, `personEmail`, `eventShift`, `hallportion`, `bookingAmount`, `advanceAmount`, `totalPrice`, `totalGuest`, `eventName`, `currentTime`) VALUES
(7, '2021-03-31', '2021-03-05', '', 'Friday', 'emmad', 'address', 'cell no', '', '', '', 'b', 0, 123, '', 123, 'event name', '2021-03-31 08:08:26'),
(8, '2021-03-31', '2021-03-05', '', 'Friday', 'emmad', 'address', 'cell no', '', '', '', 'b', 0, 123, '', 123, 'event name', '2021-03-31 08:13:50'),
(9, '2021-03-31', '2021-03-05', '', 'Friday', 'emmad', 'address', '30020', '123', 'emmad@gmail.com', '', 'b', 0, 123, '', 678, 'event nam', '2021-03-31 08:14:56'),
(10, '2021-03-31', '2021-03-12', '', 'Friday', 'emmad', 'address', '03030', '011111', 'emadsadiq@gmail.com', '', 'a', 20000, 500, '', 20, 'emmad ', '2021-03-31 08:18:56'),
(11, '2021-03-31', '2021-03-13', '29-رَجَب-1442', 'Saturday', 'ee', 'yeyt', '77787', '788', 'emmadsDUQ@F..CIN', '', 'a', 88382, 83992, '', 8382, '8383', '2021-03-31 08:24:01'),
(12, '2021-04-06', '2021-04-01', '25-شَعْبان-1442', '', 'emmad edit', 'address', '334', '443', '33@ga.com', '', 'a', 345, 567, '', 987, 'event', '2021-04-01 07:23:55'),
(13, '2021-04-08', '2021-04-01', '25-شَعْبان-1442', '', 'emmad edit', 'address', '334', '443', '33@ga.com', '', 'b', 345, 567, '', 987, 'event', '2021-04-01 07:23:48'),
(14, '2021-04-01', '2021-04-01', '18-شَعْبان-1442', 'Thursday', '', '', '', '', '', '', '', 0, 0, '', 0, '', '2021-04-01 03:53:02'),
(15, '2021-04-01', '2021-04-01', '18-شَعْبان-1442', 'Thursday', '', '', '', '', '', 'evening', '', 0, 0, '', 1234, '', '2021-04-01 07:23:25'),
(16, '2021-04-01', '2021-04-02', '19-شَعْبان-1442', '', 'emmad sadiq edit', 'north karachi', '03412725048', '421010-39292939-19', 'emadsadiq@gmail.com', 'morning', 'b', 20000, 5000, '', 200, 'Mehndi', '2021-04-01 07:23:15'),
(17, '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, '', '2021-04-03 05:40:14'),
(18, '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, '', '2021-04-01 10:07:43'),
(19, '2021-04-01', '2021-04-09', '26-شَعْبان-1442', 'Friday', 'abc', '8883', '888', '888', '88@gm.com', '', 'b', 999, 222, '', 7777, '888', '2021-04-01 07:39:46'),
(20, '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, '', '2021-04-03 06:19:37'),
(21, '0000-00-00', '0000-00-00', '$book_Hijridate', '$book_even', '$bookperson_Name', '$bookperson_Address', '$bookperson_Contact', '$bookperson_Cnic', '$bookperson_Email', '$book_even', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-01 07:51:13'),
(22, '2021-04-01', '2021-04-11', '28-شَعْبان-1442', 'Sunday', '', '', '', '', '', '', '', 0, 0, '0', 0, '', '2021-04-01 07:55:16'),
(23, '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, '', '2021-04-01 07:57:20'),
(24, '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, '', '2021-04-01 10:07:57'),
(25, '2021-04-01', '2021-04-11', '28', 'Sunday', '', '', '', '', '', '', '', 0, 0, '0', 0, '', '2021-04-01 07:59:28'),
(26, '2021-04-01', '2021-04-11', '28', 'Sunday', '', '', '', '', '', '', '', 0, 0, '0', 0, '', '2021-04-01 08:01:00'),
(27, '2021-04-01', '2021-04-11', '28', 'Sunday', '', '', '', '', '', 'evening', '', 0, 0, '0', 0, '', '2021-04-01 08:02:22'),
(28, '2021-04-01', '2021-04-16', '04-رَمَضان-1442', '', 'dome edit', 'dome add edit', '12323000', '42101000', 'emmadsDUQ@F..CINedit', '', 'Array', 345000, 5443000, '', 3333000, 'Mehndi000', '2021-04-01 08:06:05'),
(29, '2021-04-03', '2021-04-07', '24-شَعْبان-1442', 'Wednesday', '', '', '', '', '', 'morning', 'a', 0, 0, '0', 0, '', '2021-04-03 06:05:42'),
(30, '2021-04-03', '2021-04-08', '25-شَعْبان-1442', 'Thursday', '', '', '', '', '', 'morning', 'a', 0, 0, '0', 0, '', '2021-04-03 06:07:05'),
(31, '2021-04-04', '2021-04-04', '21-شَعْبان-1442', 'Sunday', 'umaid', '', '', '', '', '', 'a', 2000, 100, '0', 200, 'shadi', '2021-04-03 22:19:02'),
(32, '2021-04-04', '2021-04-03', '20-شَعْبان-1442', 'Saturday', 'emmad', '123', '222', '02039219', 'emadsadiq@gmail.com', 'morning', 'a', 1000, 100, '0', 200, 'shadi', '2021-04-04 03:37:57'),
(33, '2021-04-05', '2021-04-10', '27-شَعْبان-1442', 'Saturday', 'emmad', '73727', '77372', '22222', 'emmadsDUQ@F.CIN', 'morning', 'a', 20000, 5000, '0', 199, 'Mehndi', '2021-04-05 10:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `inquery`
--

CREATE TABLE `inquery` (
  `iquery_id` int(11) NOT NULL,
  `inquery_date` varchar(50) NOT NULL,
  `hijridate` varchar(50) NOT NULL,
  `personName` varchar(50) DEFAULT NULL,
  `personAddress` varchar(100) DEFAULT NULL,
  `personContact` varchar(50) DEFAULT NULL,
  `personCinc` varchar(20) DEFAULT NULL,
  `personEmail` varchar(20) DEFAULT NULL,
  `hallportion` varchar(5) DEFAULT NULL,
  `event_name` varchar(50) DEFAULT NULL,
  `estimated_cost` int(11) DEFAULT NULL,
  `totalGuest` int(11) DEFAULT NULL,
  `currentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquery`
--

INSERT INTO `inquery` (`iquery_id`, `inquery_date`, `hijridate`, `personName`, `personAddress`, `personContact`, `personCinc`, `personEmail`, `hallportion`, `event_name`, `estimated_cost`, `totalGuest`, `currentTime`) VALUES
(12, '2021-03-11', 'HIJRI DATE', 'hello Name', 'ADDREESS', '9499291', '421010-49239482-4', 'EMMADSADIQ@GMAIL.COM', 'b', 'valima', 200000, 200000, '2021-03-30 06:30:17'),
(13, '2021-03-04', 'HIJRI DATE', 'hello Name', 'ADDREESS', '030409394', '421010-49239482-4', 'EMMADSADIQ@GMAIL.COM', 'b', 'valima', 3000000, 3000000, '2021-03-30 15:12:59'),
(15, '2021-03-03', 'HIJRI DATE', 'hello Name', 'ADDREESS', '940020112332', '421010-49239482-4', 'EMMADSADIQ@GMAIL.COM', 'a', 'shadi', 499920, 499920, '2021-03-30 09:03:44'),
(16, '2021-03-02', 'HIJRI DATE', 'hello Name', 'ADDREESS', '12345', '421010-49239482-4', 'EMMADSADIQ@GMAIL.COM', 'b', 'mangni function edit', 3999, 400, '2021-03-30 10:41:50'),
(17, '2021-03-05', '21-رَجَب-1442', 'emmad', '1234 address', '0341342', '43203982', 'emmadsadiq55@gmail.c', 'a', 'shadi', 2000, 2000, '2021-03-31 04:48:55'),
(18, '2021-03-06', 'HIJRI DATE edit', 'hello Name edit', 'ADDREESS edit', '034594999326969', '421010-49239482-48ed', 'EMMADSADIQ@GMAIL.COM', 'b', 'valima edit', 20000069, 20000069, '2021-03-31 05:02:34'),
(19, '2021-04-06', '23-شَعْبان-1442', 'mohsin', 'address', '0303003030', '12234992992', 'moh@ff.com', 'a', 'valima', 200000, 200000, '2021-03-31 09:45:47'),
(21, '2021-03-11', '27-رَجَب-1442', '', '', '', '', '', '', '', 0, 0, '2021-04-01 09:04:55'),
(22, '2021-03-11', '27-رَجَب-1442', '', '', '', '', '', '', '', 0, 0, '2021-04-01 09:05:00'),
(23, '2021-03-11', '27-رَجَب-1442', '', '', '', '', '', '', '', 0, 0, '2021-04-01 09:05:00'),
(24, '2021-03-11', '27-رَجَب-1442', '', '', '', '', '', '', '', 0, 0, '2021-04-01 09:05:01'),
(25, '2021-03-11', '27-رَجَب-1442', '', '', '', '', '', '', '', 0, 0, '2021-04-01 09:05:01'),
(26, '2021-03-11', '27-رَجَب-1442', '', '', '', '', '', '', '', 0, 0, '2021-04-01 09:05:01'),
(27, '2021-04-10', '27-شَعْبان-1442', 'mohsin', '4567', '7765657', '7367627', '7emm@jf.cinm', 'a', 'valima', 20000, 20000, '2021-04-05 09:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packages_id` int(11) NOT NULL,
  `packages` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `packages_id` (`packages_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `inquery`
--
ALTER TABLE `inquery`
  ADD PRIMARY KEY (`iquery_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packages_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `inquery`
--
ALTER TABLE `inquery`
  MODIFY `iquery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`packages_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
