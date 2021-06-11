-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2021 at 12:29 AM
-- Server version: 10.3.27-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vesengrc_hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `log_type` tinyint(1) NOT NULL COMMENT '1 = AM IN,2 = AM out, 3= PM IN, 4= PM out\r\n',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime_log` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `log_type`, `hallid`, `userid`, `datetime_log`, `date_updated`) VALUES
(8, 5, 1, 1, 6, '2021-05-28 10:00:00', '2021-05-31 00:33:12'),
(9, 6, 1, 1, 6, '2021-05-28 10:00:00', '2021-05-31 00:33:28'),
(10, 9, 1, 1, 6, '2021-05-28 08:00:00', '2021-05-31 00:33:36'),
(18, 15, 1, 2, 8, '2021-05-31 08:00:00', '2021-05-31 01:56:01'),
(19, 15, 4, 2, 8, '2021-05-31 16:00:00', '2021-05-31 01:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `booked_packages`
--

CREATE TABLE `booked_packages` (
  `id` int(10) NOT NULL,
  `pkg_id` int(10) NOT NULL,
  `pkg_name` varchar(100) NOT NULL,
  `pkg_cost` int(6) NOT NULL,
  `qty_pkg` varchar(6) NOT NULL,
  `pkg_desc` text NOT NULL,
  `booking_id` int(6) NOT NULL,
  `return_amnt` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `hall_code` int(6) NOT NULL,
  `userCode` int(11) NOT NULL,
  `included` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_packages`
--

INSERT INTO `booked_packages` (`id`, `pkg_id`, `pkg_name`, `pkg_cost`, `qty_pkg`, `pkg_desc`, `booking_id`, `return_amnt`, `return_qty`, `hall_code`, `userCode`, `included`, `datetime`) VALUES
(1, 1, 'col drink', 30, '20', 'ves', 21, 440, 22, 2, 8, '', '2021-06-02 11:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `bookingpay`
--

CREATE TABLE `bookingpay` (
  `Payid` int(11) NOT NULL,
  `booking_no` int(11) NOT NULL,
  `partial_payments` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `hallCode` int(11) NOT NULL,
  `userCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remarks` text NOT NULL,
  `eventName` varchar(50) DEFAULT NULL,
  `currentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(11) NOT NULL,
  `userCode` int(11) NOT NULL,
  `hall_code` int(11) NOT NULL,
  `cashIn_Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `bookingDate`, `eventDate`, `hijriDate`, `eventDay`, `personName`, `personAddress`, `personContact`, `personCinc`, `personEmail`, `eventShift`, `hallportion`, `bookingAmount`, `advanceAmount`, `totalPrice`, `totalGuest`, `remarks`, `eventName`, `currentTime`, `status`, `userCode`, `hall_code`, `cashIn_Status`) VALUES
(5, '2021-05-31', '2021-11-06', 'not available', 'Saturday', 'Muhammad Ashfaq', 'House# 152 Sector 16-A Buffer Zone Karachi.', '0313 228 6035 / 0313 220 4678', '42101-5388918-1', '', 'evening', 'a', 100000, 20000, '0', 300, '', 'Valima', '2021-05-31 11:22:57', '', 6, 1, 1),
(15, '2021-05-31', '2021-05-06', 'not available', 'Saturday', 'Muhammad Ashfaq', 'House# 152 Sector 16-A Buffer Zone Karachi.', '0313 228 6035 / 0313 220 4678', '42101-5388918-1', '', 'evening', 'a', 100000, 10000, '0', 300, '', 'Valima', '2021-05-31 11:22:57', '', 8, 2, 1),
(16, '2021-05-31', '2021-05-07', 'not available', 'Saturday', 'Muhammad Ashfaq', 'House# 152 Sector 16-A Buffer Zone Karachi.', '0313 228 6035 / 0313 220 4678', '42101-5388918-1', '', 'evening', 'a', 100000, 10000, '0', 300, '', 'Valima', '2021-05-31 11:22:57', '', 8, 2, 1),
(17, '2021-06-01', '2021-01-01', 'not available', 'Friday', 'hasnain', 'asd', '243', '3534645756858', 'emmad@ves-engr.com', 'evening', 'a', 20, 1, '', 12, '', 'ves', '2021-06-02 06:30:52', '', 8, 2, 0),
(18, '2021-06-01', '2021-01-03', 'not available', 'Sunday', 'hasnain', 'dsa', '2323', '3534645756858', 'emmad@ves-engr.com', 'evening', 'a', 20, 12, '', 23, 'hello', 'ves', '2021-06-02 06:52:19', '', 8, 2, 0),
(19, '2021-06-01', '2021-01-05', 'not available', 'Tuesday', 'hasnain', 'dadsas', '2323', '3534645756858', 'emmad@ves-engr.com', 'evening', 'a', 30, 3, '', 43, 'lll', 'ves', '2021-06-02 06:37:03', '', 8, 2, 0),
(20, '2021-06-01', '2021-01-07', 'not available', 'Thursday', 'hasnain', 'ewq', '243', '3534645756858', 'emmad@gmail.com', 'evening', 'a', 223, 0, '0', 22, '', 'ves', '2021-06-01 07:28:34', '', 8, 2, 0),
(21, '2021-06-01', '2021-01-11', 'not available', 'Saturday', 'hasnain', 'dasads', '2323', '324342', 'emmad@ves-engr.com', 'evening', 'b', 222, 2, '', 22, '', 'ves', '2021-06-02 06:07:51', '', 8, 2, 1),
(22, '2021-06-01', '2021-01-09', 'not available', 'Monday', 'hasnain', '2adsas', '433434', '3534645756858', 'emmad@gmail.com', 'evening', 'b', 2222, 22, '', 22, '', 'valima', '2021-06-02 06:07:29', '', 8, 2, 1),
(23, '2021-06-01', '2021-06-26', 'not available', 'Saturday', 'Moiz Abid', 'House R61 Sector 15-B Buffer zone', '0346 270 4658 / 0349 396 1005', '42101-8916480-3', '', 'evening', 'a', 100000, 20000, '0', 350, '', 'Wedding(this date is moved from 24-05-2021 to 26-0', '2021-06-01 10:53:23', '', 6, 1, 0),
(24, '2021-06-01', '2021-06-02', '21-شَوّال-1442', 'Wednesday', 'emmad edit', '123', '123', '33', 'emmad@mail.com', 'morning', 'b', 222, 2, '0', 12, 'remarksssssss', 'Mehndi', '2021-06-02 06:39:32', '', 8, 2, 0),
(25, '2021-06-01', '2021-06-03', '22-شَوّال-1442', 'Thursday', 'mohsin', '4444', '5555', '42101-8194892-769', 'princesabih878@yahoo', 'evening', 'a', 22, 0, '0', 678, '', 'hasnain', '2021-06-02 06:45:55', '', 8, 2, 0),
(26, '2021-06-02', '2021-06-02', '21-شَوّال-1442', 'Wednesday', 'mohsin', '12', '22', '7367627', 'emmadxadiq@yahoo.com', 'evening', 'a', 12, 0, '', 2147483647, 'hhhhffffffffff', 'emmad edit', '2021-06-02 07:22:39', '', 8, 2, 0),
(27, '2021-06-02', '2021-06-26', '16-ذوالقعدة-1442', 'Saturday', 'AHMED', 'R1152', '0321223344', '', '', 'evening', 'a', 120000, 10000, '0', 500, '', 'birthday party', '2021-06-02 16:29:37', '', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookingtarget`
--

CREATE TABLE `bookingtarget` (
  `BTid` int(11) NOT NULL,
  `target_date` varchar(255) DEFAULT NULL,
  `selectHall` varchar(10) NOT NULL,
  `selectShift` varchar(10) NOT NULL,
  `target_price` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `hall_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtarget`
--

INSERT INTO `bookingtarget` (`BTid`, `target_date`, `selectHall`, `selectShift`, `target_price`, `owner_id`, `hall_code`) VALUES
(1, '2021-05-06', 'b', 'evening', 6000, 9, 2),
(2, '2021-05-06', 'b', 'morning', 5000, 9, 2),
(3, '2021-05-06', 'a', 'evening', 4000, 9, 2),
(4, '2021-05-06', 'a', 'morning', 3000, 9, 2),
(5, '2021-05-07', 'b', 'evening', 89890, 9, 2),
(6, '2021-05-07', 'b', 'morning', 77780, 9, 2),
(7, '2021-05-07', 'a', 'evening', 7770, 9, 2),
(8, '2021-05-07', 'a', 'morning', 1000, 9, 2),
(9, '2021-01-01', 'b', 'morning', 10, 9, 2),
(10, '2021-01-01', 'a', 'evening', 10, 9, 2),
(11, '2021-01-01', 'a', 'morning', 10, 9, 2),
(12, '2021-01-01', 'b', 'evening', 10, 9, 2),
(13, '2021-01-03', 'a', 'morning', 20, 9, 2),
(14, '2021-01-03', 'a', 'evening', 20, 9, 2),
(15, '2021-01-03', 'b', 'morning', 20, 9, 2),
(16, '2021-01-03', 'b', 'evening', 20, 9, 2),
(17, '2021-01-05', 'b', 'morning', 30, 9, 2),
(18, '2021-01-05', 'a', 'evening', 30, 9, 2),
(19, '2021-01-05', 'a', 'morning', 30, 9, 2),
(20, '2021-01-07', 'b', 'evening', 40, 9, 2),
(21, '2021-01-07', 'b', 'morning', 40, 9, 2),
(22, '2021-01-07', 'a', 'evening', 40, 9, 2),
(23, '2021-01-07', 'a', 'morning', 40, 9, 2),
(24, '2021-01-09', 'b', 'evening', 50, 9, 2),
(25, '2021-01-09', 'b', 'morning', 50, 9, 2),
(26, '2021-01-09', 'a', 'evening', 50, 9, 2),
(27, '2021-01-09', 'a', 'morning', 50, 9, 2),
(28, '2021-01-11', 'b', 'evening', 60, 9, 2),
(29, '2021-01-11', 'b', 'morning', 60, 9, 2),
(30, '2021-01-11', 'a', 'evening', 60, 9, 2),
(31, '2021-01-11', 'a', 'morning', 60, 9, 2),
(32, '2021-01-13', 'a', 'morning', 70, 9, 2),
(33, '2021-01-13', 'a', 'evening', 70, 9, 2),
(34, '2021-01-13', 'b', 'morning', 70, 9, 2),
(35, '2021-01-13', 'b', 'evening', 70, 9, 2),
(36, '2021-01-15', 'b', 'evening', 80, 9, 2),
(37, '2021-01-15', 'b', 'morning', 80, 9, 2),
(38, '2021-01-15', 'a', 'evening', 80, 9, 2),
(39, '2021-01-15', 'a', 'morning', 80, 9, 2),
(40, '2021-01-17', 'b', 'evening', 90, 9, 2),
(41, '2021-01-17', 'b', 'morning', 90, 9, 2),
(42, '2021-01-17', 'a', 'evening', 90, 9, 2),
(43, '2021-01-17', 'a', 'morning', 90, 9, 2),
(44, '2021-01-19', 'b', 'evening', 100, 9, 2),
(45, '2021-01-19', 'b', 'morning', 100, 9, 2),
(46, '2021-01-19', 'a', 'evening', 100, 9, 2),
(47, '2021-01-19', 'a', 'morning', 100, 9, 2),
(48, '2021-01-21', 'b', 'evening', 110, 9, 2),
(49, '2021-01-21', 'b', 'morning', 110, 9, 2),
(50, '2021-01-21', 'a', 'evening', 110, 9, 2),
(51, '2021-01-21', 'a', 'morning', 110, 9, 2),
(52, '2021-01-23', 'b', 'evening', 20, 9, 2),
(53, '2021-01-23', 'b', 'morning', 20, 9, 2),
(54, '2021-01-23', 'a', 'evening', 20, 9, 2),
(55, '2021-01-23', 'a', 'morning', 20, 9, 2),
(56, '2021-01-25', 'b', 'evening', 30, 9, 2),
(57, '2021-01-25', 'b', 'morning', 30, 9, 2),
(58, '2021-01-25', 'a', 'evening', 30, 9, 2),
(59, '2021-01-25', 'a', 'morning', 30, 9, 2),
(60, '2021-01-27', 'b', 'evening', 10, 9, 2),
(61, '2021-01-27', 'b', 'morning', 10, 9, 2),
(62, '2021-01-27', 'a', 'evening', 10, 9, 2),
(63, '2021-01-27', 'a', 'morning', 10, 9, 2),
(64, '2021-01-29', 'b', 'evening', 10, 9, 2),
(65, '2021-01-29', 'b', 'morning', 20, 9, 2),
(66, '2021-01-29', 'a', 'evening', 20, 9, 2),
(67, '2021-01-29', 'a', 'morning', 20, 9, 2),
(68, '2021-01-31', 'a', 'morning', 110, 9, 2),
(69, '2021-01-31', 'a', 'evening', 110, 9, 2),
(70, '2021-01-31', 'b', 'morning', 110, 9, 2),
(71, '2021-01-31', 'b', 'evening', 110, 9, 2),
(72, '2021-01-02', 'b', 'evening', 22, 9, 2),
(73, '2021-01-02', 'b', 'morning', 22, 9, 2),
(74, '2021-01-02', 'a', 'evening', 22, 9, 2),
(75, '2021-01-02', 'a', 'morning', 22, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cashin`
--

CREATE TABLE `cashin` (
  `id` int(11) NOT NULL,
  `cashin_no` varchar(100) NOT NULL,
  `Description` varchar(156) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `recept_id` varchar(100) NOT NULL,
  `hall_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashin`
--

INSERT INTO `cashin` (`id`, `cashin_no`, `Description`, `price`, `recept_id`, `hall_id`, `created_at`) VALUES
(12, 'CI-1705-2021', 'Booking Advance', 20000, 'HMS-SM-1005', 1, '2021-05-31'),
(13, 'CI-7745-2021', 'Booking Advance', 2, 'HMS-VC-1021', 2, '2021-06-02'),
(14, 'CI-7583-2021', 'Booking Advance', 22, 'HMS-VC-1022', 2, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `id` int(11) NOT NULL,
  `cashout_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=low , 2=medium, 3=high',
  `amount` int(11) DEFAULT NULL,
  `providby` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not_approved,1 = approved',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`id`, `cashout_no`, `bill_no`, `description`, `priority`, `amount`, `providby`, `status`, `hallid`, `userid`, `created_at`) VALUES
(2, 'CO-2739-2021', 'U-3192-2021', 'ves', 2, 2323, NULL, 1, 2, 8, '2021-01-01'),
(3, 'CO-8891-2021', 'U-4157-2021', 'ves', 2, 222, NULL, 1, 2, 8, '2021-01-02'),
(4, 'CO-9628-2021', 'U-5950-2021', 'ves', 2, 23, NULL, 1, 2, 8, '2021-01-03'),
(5, 'CO-9549-2021', 'M-6347-2021', 'dsfdsfsdfsdfs', 2, 34, NULL, 1, 2, 8, '2021-01-04'),
(6, 'CO-7870-2021', 'M-920-2021', 'ves', 2, 343, NULL, 1, 2, 8, '2021-01-05'),
(7, 'CO-1739-2021', 'P-8670-2021', 'sfsdfsd', 3, 3423, NULL, 1, 2, 8, '2021-01-06'),
(8, 'CO-2227-2021', 'P-9681-2021', 'asd', 1, 3434, NULL, 1, 2, 8, '2021-01-07'),
(9, 'CO-4776-2021', 'CO-4776-2021', 'asasd', 1, 333, 'sad', 1, 2, 8, '2021-01-08'),
(10, 'CO-5921-2021', 'CO-5921-2021', 'adsd', 1, 11, 'sss', 1, 2, 8, '2021-01-09'),
(17, 'CO-3062-2021', 'HMS-VC-1021', 'Package Return Amount From col drink', 3, 440, 'Manager', 1, 2, 8, '2021-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `cashout_img`
--

CREATE TABLE `cashout_img` (
  `id` int(11) NOT NULL,
  `recept_no` int(11) NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enable',
  `image_createtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `hallid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `hallid`) VALUES
(1, 'Account & Finance', 1),
(2, 'Management', 1),
(4, 'Janitorial', 1),
(5, 'Security', 1),
(7, 'Maintenance', 1),
(8, 'new ves', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department_id` int(30) NOT NULL,
  `position_id` int(30) NOT NULL,
  `salary` double NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `cnic` varchar(25) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `emergency_contact` varchar(20) DEFAULT NULL,
  `responsiblity` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '	0 =inactive,1 = active',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `crested_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `department_id`, `position_id`, `salary`, `Email`, `cnic`, `contact`, `address`, `emergency_contact`, `responsiblity`, `status`, `hallid`, `userid`, `crested_at`) VALUES
(5, '2021-7291', 'Moazzam', '', '', 2, 2, 30000, '', '42101-9039246-1', '0345 211 9992', 'house A-596 Block ', '03452119992', '', 1, 1, 6, '2021-05-31 00:38:24'),
(6, '2021-2104', 'Shabeer', 'Ahmed', '', 2, 4, 25000, '', '42101-6802964-9', '0322 221 1043', '3rd Floor C-13 Anaar Gali Apartment ', '0334 337 7497', '', 1, 1, 6, '2021-05-31 00:38:24'),
(7, '2021-3455', 'Khurram', 'Jalil', '', 2, 3, 25000, '', '', '0321 261 6292', '', '', '', 1, 1, 6, '2021-05-31 00:38:24'),
(8, '2021-161', 'Raheel', '', '', 2, 5, 17000, '', '', '0308 513 3388', '', '', '', 1, 1, 6, '2021-05-31 00:38:24'),
(9, '2021-9463', 'Suliman', 'Panhwar', '', 4, 6, 18000, '', '41202-3273027-9', '0302 969 6657', '', '', '', 1, 1, 6, '2021-05-31 00:38:24'),
(10, '2021-1903', 'Haroon', '', '', 4, 7, 20000, '', '', '0316 103 7155', '', '', '', 1, 1, 6, '2021-05-31 00:38:24'),
(11, '2021-8458', 'Yaseen', '', '', 5, 8, 3000, '', '', '', '', '', '', 1, 1, 6, '2021-05-31 00:38:24'),
(15, '2021-9063', 'hasnain', 'hasnain', 'hasnain', 8, 12, 43345, 'hasnain@ves-engr.com', '32234234', '23234234234', 'hasnain adress', '23423234', 'dfsdfs', 1, 2, 8, '2021-05-31 01:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `hall_address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `hall_name`, `hall_address`, `created_at`) VALUES
(1, 'Shahab Mehal', 'D-13, Block N, Near Sakhi Hassan Chorangi North Nazimabad, Karachi.', '2021-05-20 14:43:46'),
(2, 'Ves Comapny', 'D-13, Block N, Near Sakhi Hassan Chorangi North Nazimabad, Karachi.', '2021-05-31 05:05:08');

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
  `hall_shift` varchar(15) NOT NULL,
  `event_name` varchar(50) DEFAULT NULL,
  `estimated_cost` int(11) DEFAULT NULL,
  `totalGuest` int(11) DEFAULT NULL,
  `remarks` text NOT NULL,
  `currentTime` date NOT NULL DEFAULT current_timestamp(),
  `userCode` int(11) NOT NULL,
  `hall_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquery`
--

INSERT INTO `inquery` (`iquery_id`, `inquery_date`, `hijridate`, `personName`, `personAddress`, `personContact`, `personCinc`, `personEmail`, `hallportion`, `hall_shift`, `event_name`, `estimated_cost`, `totalGuest`, `remarks`, `currentTime`, `userCode`, `hall_code`) VALUES
(1, '2021-05-05', '23-رَمَضان-1442', 'cxz', 'xcz', '433434', '32234234', 'ves@ves-engr.com', 'a', 'evening', 'hasnain new', 3000000, 433434, '0', '2021-05-31', 8, 2),
(2, '2021-05-07', '25-رَمَضان-1442', 'hasnainves', 'asadsads', '433434', '32234234', 'ves@ves-engr.com', 'b', 'morning', 'Birthday', 5000, 433434, '0', '2021-05-31', 8, 2),
(3, '2021-05-07', '25-رَمَضان-1442', 'hasnain new', 'fgdf', '433434', '32234234', 'ves@ves-engr.com', 'b', 'morning', 'Birthday', 7000, 433434, '0', '2021-05-31', 8, 2),
(4, '2021-03-02', '18-رَجَب-1442', 'khuirram', '56677', '02136629729', '', '', 'a', 'evening', 'valima', 15000, 350, '0', '2021-05-31', 2, 1),
(5, '2021-03-03', '19-رَجَب-1442', 'mohsin', 'a-640 karachi', '02136629729', '421011836271', '', 'a', 'evening', 'valima', 50, 500, '0', '2021-05-31', 2, 1),
(6, '2021-03-04', '20-رَجَب-1442', 'ahmed', 'a640', '02136629729', '', '', 'a', 'evening', 'valima', 50000, 500, '0', '2021-05-31', 2, 1),
(7, '2021-11-12', '06-رَبيع الثاني-1443', 'tariq', 'house no l .87 sec 5l2 noth karachi', '03442265908', '', '', 'a', 'evening', 'wedding', 120000, 300, '0', '2021-06-01', 2, 1),
(8, '2021-06-03', '22-شَوّال-1442', 'mohsin', '4444', '5555', '42101-8194892-769', 'princesabih878@yahoo', 'a', 'evening', 'hasnain', 22, 678, '0', '2021-06-02', 8, 2),
(9, '2021-06-02', '21-شَوّال-1442', 'mohsin', '12', '22', '7367627', 'emmadxadiq@yahoo.com', 'a', 'evening', 'emmad edit', 12, 2147483647, 'hhhh', '2021-06-02', 8, 2),
(10, '2021-06-21', '11-ذوالقعدة-1442', 'SHAZAIB', 'B16 BLACK N NOTH NIZ KARACHI', '03002371460', '', '', 'a', 'evening', 'NIKHA', 120000, 250, '', '2021-06-02', 2, 1),
(11, '2021-11-26', '20-رَبيع الثاني-1443', 'SYED INSHA', 'HOUSE L.315 SEC 11.L NOTH NIZ', '03132149263', '', '', 'a', 'evening', 'wedding', 120000, 300, '', '2021-06-02', 2, 1),
(12, '2021-09-05', '27-مُحَرَّم-1443', 'ISMAIL', '1443 BLOCK 3 ALIABAD FB AREA KARACHI', '03209202101', '', '', 'a', 'evening', 'VALIMA', 75000, 300, '', '2021-06-02', 2, 1),
(13, '2021-10-10', '03-رَبيع الأوّل-1443', 'SAMEER', '', '03218918358', '', '', 'a', 'evening', 'VALIMA', 120000, 500, '', '2021-06-02', 2, 1),
(14, '2021-10-31', '24-رَبيع الأوّل-1443', 'KAMRAN', '', '03472738391', '', '', 'a', 'evening', 'VALIMA', 120000, 450, '', '2021-06-02', 2, 1),
(15, '2021-08-14', '05-مُحَرَّم-1443', 'UZAIR', '', '03162684092', '', '', 'a', 'evening', 'valima', 75000, 550, '', '2021-06-02', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintenanace_img`
--

CREATE TABLE `maintenanace_img` (
  `id` int(11) NOT NULL,
  `recept_no` int(11) NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enable',
  `image_createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `maintenance_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=low , 2=medium, 3=high',
  `owner_remarks` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not_approved,1 = approved',
  `gen_cashout` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not_generate,1 = generate',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `maintenance_no`, `description`, `resolution`, `assign`, `priority`, `owner_remarks`, `status`, `gen_cashout`, `hallid`, `userid`, `created_at`) VALUES
(1, 'M-6347-2021', 'dsfdsfsdfsdfs', 'dsfsdfdf', 'sdsdfsd', 2, '', 0, 1, 2, 8, '2021-05-31'),
(2, 'M-920-2021', 'ves', 'sad', 'asd', 2, '', 0, 1, 2, 8, '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packages_id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `pkg_cost` int(10) NOT NULL,
  `return_price` int(6) NOT NULL,
  `hall_id` int(10) NOT NULL,
  `userCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`packages_id`, `package_name`, `pkg_cost`, `return_price`, `hall_id`, `userCode`) VALUES
(1, 'Cold drink', 30, 20, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = monthly ,2 semi-monthly',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =New,1 = computed',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `ref_no`, `date_from`, `date_to`, `type`, `status`, `hallid`, `userid`, `date_created`) VALUES
(3, '2021-7247', '2021-05-01', '2021-05-31', 1, 1, 2, 8, '2021-05-31 03:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `id` int(30) NOT NULL,
  `payroll_id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `present` int(30) NOT NULL,
  `absent` int(10) NOT NULL,
  `late` text NOT NULL,
  `salary` double NOT NULL,
  `net` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `hallid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_items`
--

INSERT INTO `payroll_items` (`id`, `payroll_id`, `employee_id`, `present`, `absent`, `late`, `salary`, `net`, `date_created`, `hallid`) VALUES
(17, 3, 15, 0, 22, '0', 43345, 0, '2021-05-31 03:33:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `hallid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `department_id`, `name`, `hallid`) VALUES
(1, 1, 'Accountant', 1),
(2, 2, 'Senior Manager (Morning)', 1),
(3, 2, 'Senior Manager (Evening)', 1),
(4, 2, 'Manager (Morning)', 1),
(5, 2, 'Manager (Evening)', 1),
(6, 4, 'Floor Head', 1),
(7, 4, 'Sweeper', 1),
(8, 5, 'Guard', 1),
(9, 7, 'Electrical', 1),
(10, 7, 'Mechanical', 1),
(11, 8, 'new po', 2),
(12, 8, 'new po2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id` int(11) NOT NULL,
  `procurement_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=low , 2=medium, 3=high',
  `amount` int(11) DEFAULT NULL,
  `supplier_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_remarks` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not_approved,1 = approved',
  `gen_cashout` tinyint(1) NOT NULL DEFAULT 0 COMMENT '	0 =not_generate,1 = generate',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`id`, `procurement_no`, `description`, `priority`, `amount`, `supplier_name`, `owner_remarks`, `status`, `gen_cashout`, `hallid`, `userid`, `created_at`) VALUES
(1, 'P-8670-2021', 'sfsdfsd', 3, 3423, 'dsfsdf', '', 0, 1, 2, 8, '2021-05-31'),
(2, 'P-9681-2021', 'asd', 1, 3434, 'adsdas', '', 0, 1, 2, 8, '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `procurement_img`
--

CREATE TABLE `procurement_img` (
  `id` int(11) NOT NULL,
  `recept_no` int(11) NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enable',
  `image_createtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrelation`
--

CREATE TABLE `userrelation` (
  `id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrelation`
--

INSERT INTO `userrelation` (`id`, `hall_id`, `user_id`, `created_at`) VALUES
(1, 1, 1, '2021-05-20 14:48:49'),
(2, 1, 2, '2021-05-20 14:49:00'),
(3, 1, 3, '2021-05-20 14:49:11'),
(4, 1, 4, '2021-05-20 14:49:20'),
(5, 1, 5, '2021-05-20 14:49:27'),
(6, 1, 6, '2021-05-28 10:26:52'),
(7, 1, 7, '2021-05-28 10:26:59'),
(8, 2, 8, '2021-05-31 05:13:52'),
(9, 2, 9, '2021-05-31 05:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=owner , 2=manager'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 'Khurram', 'Khurram address', '0303030', 'Khurram@ves-engr.com', 'khurram123', 2),
(2, 'Raheel', 'Raheel address', '03030302', 'Raheel@ves-engr.com', 'raheel123', 2),
(3, 'Mohsin', 'Mohsin address', '03030302', 'Mohsin@ves-engr.com', 'mohsin123', 2),
(4, 'Mohsin', 'Mohsin address', '03030302', 'Mohsinowner@ves-engr.com', 'mohsin123', 1),
(5, 'Ahmed', 'Ahmed address', '03030302', 'Ahmed@ves-engr.com', 'ahmed123', 1),
(6, 'Moazam', 'Moazam address', '03030302', 'Moazam@ves-engr.com', 'moazam123', 2),
(7, 'Moazam', 'Moazam address', '03030302', 'Moazamowner@ves-engr.com', 'moazam123', 1),
(8, 'VES', 'VES address', '03030302', 'ves@ves-engr.com', 'vesengr123', 2),
(9, 'VES owner', 'VES owner address', '03030302', 'vesowner@ves-engr.com', 'vesengr123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(11) NOT NULL,
  `utility_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=low , 2=medium, 3=high',
  `owner_remarks` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not_approved,1 = approved',
  `gen_cashout` tinyint(1) NOT NULL DEFAULT 0 COMMENT '	0 =not_generate,1 = generate',
  `hallid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `utility_no`, `description`, `priority`, `owner_remarks`, `status`, `gen_cashout`, `hallid`, `userid`, `created_at`, `amount`) VALUES
(1, 'U-4157-2021', 'ves', 2, '', 0, 1, 2, 8, '2021-05-31', 222),
(3, 'U-3192-2021', 'ves', 2, '', 0, 1, 2, 8, '2021-06-01', 2323),
(4, 'U-5950-2021', 'ves', 2, '', 0, 1, 2, 8, '2021-06-01', 23);

-- --------------------------------------------------------

--
-- Table structure for table `utility_img`
--

CREATE TABLE `utility_img` (
  `id` int(11) NOT NULL,
  `recept_no` int(11) NOT NULL,
  `image_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enable',
  `image_createtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `hallid` (`hallid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `booked_packages`
--
ALTER TABLE `booked_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_code` (`hall_code`),
  ADD KEY `userCode` (`userCode`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `pkg_id` (`pkg_id`);

--
-- Indexes for table `bookingpay`
--
ALTER TABLE `bookingpay`
  ADD PRIMARY KEY (`Payid`),
  ADD KEY `userCode` (`userCode`),
  ADD KEY `booking_no` (`booking_no`),
  ADD KEY `Payid` (`Payid`,`booking_no`,`userCode`),
  ADD KEY `hallCode` (`hallCode`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `hall_code` (`hall_code`),
  ADD KEY `booking_id` (`booking_id`,`bookingDate`,`eventDate`),
  ADD KEY `userCode` (`userCode`,`hall_code`);

--
-- Indexes for table `bookingtarget`
--
ALTER TABLE `bookingtarget`
  ADD PRIMARY KEY (`BTid`),
  ADD KEY `hall_code` (`hall_code`),
  ADD KEY `BTid` (`BTid`,`target_date`),
  ADD KEY `owner_id` (`owner_id`,`hall_code`);

--
-- Indexes for table `cashin`
--
ALTER TABLE `cashin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `cashout_img`
--
ALTER TABLE `cashout_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recept_no` (`recept_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `hallid` (`hallid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`hall_name`);

--
-- Indexes for table `inquery`
--
ALTER TABLE `inquery`
  ADD PRIMARY KEY (`iquery_id`),
  ADD KEY `hall_Id` (`hall_code`),
  ADD KEY `userCode` (`userCode`);

--
-- Indexes for table `maintenanace_img`
--
ALTER TABLE `maintenanace_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recept_no` (`recept_no`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packages_id`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `userCode` (`userCode`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hallid` (`hallid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `payroll_id` (`payroll_id`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hallid` (`hallid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `procurement_img`
--
ALTER TABLE `procurement_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recept_no` (`recept_no`);

--
-- Indexes for table `userrelation`
--
ALTER TABLE `userrelation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`username`,`type`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `utility_img`
--
ALTER TABLE `utility_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recept_no` (`recept_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `booked_packages`
--
ALTER TABLE `booked_packages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingpay`
--
ALTER TABLE `bookingpay`
  MODIFY `Payid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bookingtarget`
--
ALTER TABLE `bookingtarget`
  MODIFY `BTid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `cashin`
--
ALTER TABLE `cashin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cashout_img`
--
ALTER TABLE `cashout_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquery`
--
ALTER TABLE `inquery`
  MODIFY `iquery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `maintenanace_img`
--
ALTER TABLE `maintenanace_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procurement_img`
--
ALTER TABLE `procurement_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrelation`
--
ALTER TABLE `userrelation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utility_img`
--
ALTER TABLE `utility_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `attendance_ibfk_4` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `booked_packages`
--
ALTER TABLE `booked_packages`
  ADD CONSTRAINT `booked_packages_ibfk_1` FOREIGN KEY (`hall_code`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `booked_packages_ibfk_2` FOREIGN KEY (`userCode`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booked_packages_ibfk_3` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `booked_packages_ibfk_4` FOREIGN KEY (`pkg_id`) REFERENCES `packages` (`packages_id`);

--
-- Constraints for table `bookingpay`
--
ALTER TABLE `bookingpay`
  ADD CONSTRAINT `bookingpay_ibfk_1` FOREIGN KEY (`userCode`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookingpay_ibfk_2` FOREIGN KEY (`booking_no`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `bookingpay_ibfk_3` FOREIGN KEY (`hallCode`) REFERENCES `halls` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`userCode`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`hall_code`) REFERENCES `halls` (`id`);

--
-- Constraints for table `bookingtarget`
--
ALTER TABLE `bookingtarget`
  ADD CONSTRAINT `bookingtarget_ibfk_1` FOREIGN KEY (`hall_code`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `bookingtarget_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cashin`
--
ALTER TABLE `cashin`
  ADD CONSTRAINT `cashin_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`);

--
-- Constraints for table `cashout`
--
ALTER TABLE `cashout`
  ADD CONSTRAINT `cashout_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cashout_ibfk_2` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`);

--
-- Constraints for table `cashout_img`
--
ALTER TABLE `cashout_img`
  ADD CONSTRAINT `cashout_img_ibfk_1` FOREIGN KEY (`recept_no`) REFERENCES `cashout` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `inquery`
--
ALTER TABLE `inquery`
  ADD CONSTRAINT `hall_Id` FOREIGN KEY (`hall_code`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `inquery_ibfk_1` FOREIGN KEY (`userCode`) REFERENCES `users` (`id`);

--
-- Constraints for table `maintenanace_img`
--
ALTER TABLE `maintenanace_img`
  ADD CONSTRAINT `maintenanace_img_ibfk_1` FOREIGN KEY (`recept_no`) REFERENCES `maintenance` (`id`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `maintenance_ibfk_2` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`userCode`) REFERENCES `users` (`id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `payroll_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD CONSTRAINT `payroll_items_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `payroll_items_ibfk_2` FOREIGN KEY (`payroll_id`) REFERENCES `payroll` (`id`),
  ADD CONSTRAINT `payroll_items_ibfk_3` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`);

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`);

--
-- Constraints for table `procurement`
--
ALTER TABLE `procurement`
  ADD CONSTRAINT `procurement_ibfk_1` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `procurement_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `procurement_img`
--
ALTER TABLE `procurement_img`
  ADD CONSTRAINT `procurement_img_ibfk_1` FOREIGN KEY (`recept_no`) REFERENCES `procurement` (`id`);

--
-- Constraints for table `userrelation`
--
ALTER TABLE `userrelation`
  ADD CONSTRAINT `userrelation_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `userrelation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `utilities`
--
ALTER TABLE `utilities`
  ADD CONSTRAINT `utilities_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `utilities_ibfk_2` FOREIGN KEY (`hallid`) REFERENCES `halls` (`id`);

--
-- Constraints for table `utility_img`
--
ALTER TABLE `utility_img`
  ADD CONSTRAINT `utility_img_ibfk_1` FOREIGN KEY (`recept_no`) REFERENCES `utilities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
