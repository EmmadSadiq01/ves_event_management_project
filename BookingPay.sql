-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2021 at 02:34 AM
-- Server version: 10.3.27-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vesengrc_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `BookingPay`
--

CREATE TABLE `BookingPay` (
  `Payid` int(11) NOT NULL,
  `booking_no` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `partial_payments` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BookingPay`
--
ALTER TABLE `BookingPay`
  ADD PRIMARY KEY (`Payid`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `booking_no` (`booking_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BookingPay`
--
ALTER TABLE `BookingPay`
  MODIFY `Payid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BookingPay`
--
ALTER TABLE `BookingPay`
  ADD CONSTRAINT `BookingPay_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `Manager` (`Mid`),
  ADD CONSTRAINT `BookingPay_ibfk_2` FOREIGN KEY (`booking_no`) REFERENCES `Booking` (`Bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
