-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 08:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carservicecenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `log_id` int(11) NOT NULL,
  `log_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `log_activity` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `grant_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`log_id`, `log_datetime`, `log_activity`, `username`, `grant_level`) VALUES
(1, '2020-01-21 22:14:50', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(2, '2020-01-21 22:15:34', 'Logged in to the system', 'abu', 'Staff'),
(3, '2020-01-21 22:40:27', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(4, '2020-01-21 22:41:24', 'Registered a staff', 'shafinaz', 'Supervisor'),
(5, '2020-01-21 22:47:29', 'Deleted a staff', 'shafinaz', 'Supervisor'),
(6, '2020-01-21 22:52:10', 'Added a customer', 'shafinaz', 'Supervisor'),
(7, '2020-01-21 22:55:53', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(8, '2020-01-21 22:58:01', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(9, '2020-01-21 22:59:02', 'Added a customer', 'shafinaz', 'Supervisor'),
(10, '2020-01-21 23:01:15', 'Added a service', 'shafinaz', 'Supervisor'),
(11, '2020-01-21 23:03:59', 'Updated a service payment', 'shafinaz', 'Supervisor'),
(12, '2020-01-21 23:05:42', 'Updated a service details', 'shafinaz', 'Supervisor'),
(13, '2020-01-21 23:07:16', 'Deleted a service', 'shafinaz', 'Supervisor'),
(14, '2020-01-21 23:11:16', 'Added a spare part', 'shafinaz', 'Supervisor'),
(15, '2020-01-21 23:13:59', 'Logged in to the system', 'farah', 'Staff'),
(16, '2020-01-21 23:14:38', 'Updated a service payment', 'farah', 'Supervisor'),
(17, '2020-01-21 23:16:32', 'Updated a service payment', 'farah', 'Supervisor'),
(18, '2020-01-22 13:49:54', 'Logged in to the system', 'farah', 'Staff'),
(19, '2020-01-25 18:58:49', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(20, '2020-01-27 15:36:45', 'Logged in to the system', 'farah', 'Staff'),
(21, '2020-01-27 15:37:21', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(22, '2020-02-02 23:20:56', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(23, '2020-02-02 23:31:24', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(24, '2020-02-02 23:32:03', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(25, '2020-02-02 23:32:23', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(26, '2020-02-02 23:32:42', 'Added a service', 'shafinaz', 'Supervisor'),
(27, '2020-02-02 23:33:00', 'Deleted a service', 'shafinaz', 'Supervisor'),
(28, '2020-02-02 23:35:48', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(29, '2020-02-02 23:37:47', 'Logged in to the system', 'farah', 'Staff'),
(30, '2020-02-03 15:56:19', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(31, '2020-02-03 15:59:44', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(32, '2020-02-03 16:00:14', 'Added a service', 'shafinaz', 'Supervisor'),
(33, '2020-02-03 16:00:45', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(34, '2020-02-03 16:02:36', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(35, '2020-02-03 16:02:56', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(36, '2020-02-03 16:03:17', 'Added a service', 'shafinaz', 'Supervisor'),
(37, '2020-02-03 16:06:43', 'Updated a service payment', 'shafinaz', 'Supervisor'),
(38, '2020-02-03 16:08:05', 'Updated a service payment', 'shafinaz', 'Supervisor'),
(39, '2020-02-03 16:08:41', 'Updated a service payment', 'shafinaz', 'Supervisor'),
(40, '2020-02-03 16:09:05', 'Updated a service details', 'shafinaz', 'Supervisor'),
(41, '2020-02-03 16:09:09', 'Deleted a service', 'shafinaz', 'Supervisor'),
(42, '2020-02-03 16:21:30', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(43, '2020-02-03 16:25:18', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(44, '2020-02-03 16:25:33', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(45, '2020-02-03 16:25:33', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(46, '2020-02-03 16:26:01', 'Deleted a spare part details', 'shafinaz', 'Supervisor'),
(47, '2020-02-03 16:28:42', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(48, '2020-02-03 16:28:48', 'Deleted a spare part details', 'shafinaz', 'Supervisor'),
(49, '2020-02-03 16:39:24', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(50, '2020-02-03 16:42:34', 'Logged in to the system', 'farah', 'Staff'),
(51, '2020-02-03 16:55:02', 'Updated a customer details', 'farah', 'Staff'),
(52, '2020-02-03 16:55:06', 'Deleted a customer', 'farah', 'Staff'),
(53, '2020-02-03 16:56:20', 'Deleted a customer', 'farah', 'Staff'),
(54, '2020-02-03 16:56:37', 'Deleted a customer', 'farah', 'Staff'),
(55, '2020-02-03 16:57:07', 'Deleted a customer', 'farah', 'Staff'),
(56, '2020-02-03 16:57:26', 'Added a service', 'farah', 'Staff'),
(57, '2020-02-03 16:58:08', 'Updated a service payment', 'farah', 'Staff'),
(58, '2020-02-03 17:01:02', 'Updated a service payment', 'farah', 'Staff'),
(59, '2020-02-03 17:01:07', 'Updated a service details', 'farah', 'Staff'),
(60, '2020-02-03 17:01:11', 'Deleted a service', 'farah', 'Staff'),
(61, '2020-02-03 17:01:18', 'Deleted a service', 'farah', 'Staff'),
(62, '2020-02-03 17:06:49', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(63, '2020-02-05 14:19:43', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(64, '2020-02-05 14:20:07', 'Logged in to the system', 'farah', 'Staff'),
(65, '2020-02-05 14:31:33', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(67, '2020-02-05 18:47:03', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(68, '2020-02-05 18:49:18', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(69, '2020-02-05 22:28:21', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(70, '2020-02-05 22:31:52', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(71, '2020-02-05 23:00:30', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(72, '2020-02-06 10:09:53', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(73, '2020-02-06 10:29:35', 'Registered a staff', 'shafinaz', 'Supervisor'),
(74, '2020-02-06 10:31:02', 'Registered a staff', 'shafinaz', 'Supervisor'),
(75, '2020-02-06 10:35:09', 'Deleted a staff', 'shafinaz', 'Supervisor'),
(76, '2020-02-06 10:39:59', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(77, '2020-02-06 10:40:41', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(78, '2020-02-06 10:41:14', 'Added a customer', 'shafinaz', 'Supervisor'),
(79, '2020-02-06 10:42:19', 'Added a customer', 'shafinaz', 'Supervisor'),
(80, '2020-02-06 10:43:22', 'Updated a customer details', 'shafinaz', 'Supervisor'),
(81, '2020-02-06 10:44:28', 'Deleted a customer', 'shafinaz', 'Supervisor'),
(82, '2020-02-06 10:49:00', 'Added a service', 'shafinaz', 'Supervisor'),
(83, '2020-02-06 10:52:13', 'Deleted a service', 'shafinaz', 'Supervisor'),
(84, '2020-02-06 11:08:32', 'Deleted a spare part', 'shafinaz', 'Supervisor'),
(85, '2020-02-06 11:39:42', 'Logged in to the system', 'farah', 'Staff'),
(86, '2020-02-06 11:47:45', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(87, '2020-02-06 11:50:33', 'Updated a service payment', 'shafinaz', 'Supervisor'),
(88, '2020-02-06 12:00:54', 'Updated their profile', 'shafinaz', 'Supervisor'),
(89, '2020-02-06 12:02:32', 'Logged in to the system', 'fatin', 'Staff'),
(90, '2020-02-06 12:04:52', 'Updated their profile', 'fatin', 'Staff'),
(91, '2020-02-06 12:19:38', 'Logged in to the system', 'farah ', 'Staff'),
(92, '2020-02-06 15:12:20', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(93, '2020-02-06 21:27:29', 'Updated a spare part  details', 'shafinaz', 'Supervisor'),
(94, '2020-02-06 21:32:37', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(95, '2020-02-06 21:38:14', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(96, '2020-02-06 21:41:45', 'Deleted a spare part', 'shafinaz', 'Supervisor'),
(97, '2020-02-06 21:53:15', 'Added a spare part', 'shafinaz', 'Supervisor'),
(98, '2020-02-06 21:55:55', 'Deleted a spare part', 'shafinaz', 'Supervisor'),
(99, '2020-02-06 21:57:06', 'Added a spare part', 'shafinaz', 'Supervisor'),
(100, '2020-02-06 21:57:55', 'Updated a spare part details', 'shafinaz', 'Supervisor'),
(101, '2020-02-06 22:05:04', 'Deleted a spare part', 'shafinaz', 'Supervisor'),
(102, '2020-02-06 22:05:31', 'Deleted a spare part', 'shafinaz', 'Supervisor'),
(103, '2020-02-06 22:06:34', 'Added a spare part', 'shafinaz', 'Supervisor'),
(104, '2020-02-06 22:07:53', 'Added a spare part', 'shafinaz', 'Supervisor'),
(105, '2020-02-06 22:09:07', 'Added a spare part', 'shafinaz', 'Supervisor'),
(106, '2020-02-06 22:36:51', 'Logged in to the system', 'farah', 'Staff'),
(107, '2020-02-06 22:38:48', 'Updated a spare part details', 'farah', 'Staff'),
(108, '2020-02-07 11:06:40', 'Logged in to the system', 'fatin', 'Staff'),
(109, '2020-02-07 11:14:22', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(110, '2020-02-07 11:41:14', 'Logged in to the system', 'shafinaz', 'Supervisor'),
(111, '2020-02-07 11:44:48', 'Logged in to the system', 'farah', 'Staff'),
(112, '2020-02-07 14:19:06', 'Logged in to the system', 'fatin', 'Staff'),
(113, '2020-02-07 14:20:35', 'Added a spare part', 'fatin', 'Staff'),
(114, '2020-02-07 14:28:05', 'Logged in to the system', 'farah', 'Staff'),
(115, '2020-02-07 14:28:26', 'Added a spare part', 'farah', 'Staff'),
(116, '2020-02-07 14:28:43', 'Logged in to the system', 'fatin', 'Staff'),
(117, '2020-02-07 14:28:57', 'Added a spare part', 'fatin', 'Staff'),
(118, '2020-02-07 14:31:21', 'Deleted a spare part', 'fatin', 'Staff'),
(119, '2020-02-07 14:31:31', 'Deleted a spare part', 'fatin', 'Staff'),
(120, '2020-02-07 14:33:19', 'Logged in to the system', 'farah', 'Staff'),
(121, '2020-02-07 14:33:39', 'Added a spare part', 'farah', 'Staff'),
(122, '2020-02-07 14:34:06', 'Deleted a spare part', 'farah', 'Staff'),
(123, '2020-02-09 15:57:35', 'Logged in to the system', 'farah', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cust_ic` varchar(30) NOT NULL,
  `cust_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_ic`, `cust_contact`) VALUES
(8, 'Zainal Abidin', '080808-08-0808', '018 0808008'),
(9, 'Tan Kwok Lee', '090909-09-0909', '019 0909009'),
(10, 'Putri', '101010-10-1010', '010 1010110'),
(11, 'Aiman', '111111-11-1111', '011 1111111'),
(12, 'Ali Ikmal', '121212-12-1212', '012 1212112'),
(13, 'Muthu', '131313-13-1313', '013 1313113'),
(14, 'Maria', '141414-14-1414', '014 1414114'),
(15, 'Yin Yi Jing', '151515-15-1515', '015 1515115'),
(16, 'Arrumugam', '161616-16-1616', '016 1616116'),
(17, 'Marthini', '171717-17-1717', '017 1717117'),
(18, 'Amran', '181818-18-1818', '018 1818118'),
(19, 'Athirah', '191919-19-1919', '019 1919119'),
(20, 'Puspawati', '202020-20-2020', '012 2020220'),
(21, 'Amira Hartini', '212121-21-2121', '012 2121221'),
(22, 'Intan', '222222-22-2222', '012 2222222'),
(23, 'Kumalasari', '232323-23-2323', '012 2323223'),
(24, 'Lee Kwok Weng', '242424-24-2424', '012 2424224'),
(25, 'Anthony Lew', '252525-25-2525', '012 2525225'),
(27, 'Anita Bachan', '272727-27-2727', '017 2727227'),
(29, 'Nazira', '292929-29-2929', '019 2929229'),
(30, 'Amy Nasuha', '303030-30-3030', '013 3030330');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `svc_id` int(11) NOT NULL,
  `svc_type` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sp_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `sp_used` int(15) NOT NULL,
  `vhc_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `svc_desc` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `svc_installfees` float(11,2) NOT NULL,
  `svc_totalfees` float(11,2) NOT NULL,
  `svc_date` date NOT NULL DEFAULT current_timestamp(),
  `svc_paymentstatus` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`svc_id`, `svc_type`, `cust_id`, `sp_name`, `sp_used`, `vhc_name`, `svc_desc`, `svc_installfees`, `svc_totalfees`, `svc_date`, `svc_paymentstatus`) VALUES
(1, 'Purchase & Installation', 1, 'Tyre Michelin Energy XM2 + (for Car & Van)', 2, 'Proton Saga FLX', 'Purchase + change tires', 20.00, 200.00, '2020-01-13', 'Paid'),
(2, 'Installation', 2, '-', 0, 'Volkswagen Jetta', 'Change tires only', 25.00, 25.00, '2020-01-13', 'Paid'),
(3, 'Purchase & Installation', 3, 'Tyre Goodyear Eagle F1 Asymmetric 2', 2, 'Toyota Camry', 'Purchase + change tires', 25.00, 175.00, '2020-01-13', 'Paid'),
(4, 'Purchase & Installation', 4, 'Tyre Michelin Pilot Super Sport (for Car & Van)', 2, 'Mini Cooper S', 'Purchase + change tires', 20.00, 240.00, '2020-01-13', 'Paid'),
(5, 'Purchase', 5, 'Tyre Michelin Pilot Sport Cup 2 (for Car & Van)', 4, 'Perodua Myvi', 'Purchase tyre', 0.00, 360.00, '2020-01-13', 'Paid'),
(6, 'Installation', 6, '-', 0, 'Perodua Kancil', 'Change tires only', 25.00, 25.00, '2020-01-14', 'Paid'),
(7, 'Purchase & Installation', 7, 'Tyre Michelin Pilot Super Sport (for Car & Van)', 2, 'Proton Satria Neo', 'Purchase + change tires', 20.00, 240.00, '2020-01-14', 'Paid'),
(9, 'Purchase & Installation', 9, 'Tyre Michelin Pilot Sport 4 (for Car & Van)', 1, 'BMW X6', 'Purchase + change tires', 30.00, 140.00, '2020-01-14', 'Paid'),
(10, 'Purchase & Installation', 10, 'Tyre Michelin Pilot Sport 3 (for Car & Van)', 4, 'Volkswagen Golf', 'Purchase + change tires', 20.00, 420.00, '2020-01-14', 'Paid'),
(11, 'Purchase', 11, 'Tyre Goodyear Eagle F1 Asymmetric 3', 4, 'Proton Exora', 'Purchase tyre', 0.00, 320.00, '2020-01-15', 'Paid'),
(12, 'Purchase & Installation', 12, 'Tyre Michelin Energy XM2 + (for Car & Van)', 5, 'Proton X70', 'Purchase + change tires', 25.00, 475.00, '2020-01-15', 'Paid'),
(13, 'Purchase', 13, 'Tyre Michelin Energy XM2 (for Car & Van)', 4, 'Honda Accord', 'Purchase tyre', 0.00, 320.00, '2020-01-15', 'Paid'),
(14, 'Purchase', 14, 'Battery Century Hybrid', 1, 'Honda CR-V', 'Purchase battery', 0.00, 75.00, '2020-01-15', 'Paid'),
(15, 'Purchase', 7, 'Battery AMARON Hi Life', 1, 'Proton Satria Neo', 'Purchase battery', 0.00, 79.90, '2020-01-15', 'Paid'),
(16, 'Purchase & Installation', 15, 'Tail Lamp VLAND for Volkswagen Vento Polo 2011-2017 VW LED Turn Signal with Sequential Indicator Car Lamp', 2, 'Volkswagen Vento Polo', 'Purchase + install lamp', 35.00, 1633.00, '2020-01-16', 'Paid'),
(17, 'Purchase & Installation', 15, 'Tail Lamp VLAND for Volkswagen Vento Polo 2011-2017 VW LED Turn Signal with Sequential Indicator Car Lamp', 2, 'Volkswagen Vento Polo', 'Purchase + install lamp', 35.00, 1633.00, '2020-01-16', 'Paid'),
(18, 'Purchase & Installation', 16, 'Tail Lamp Mitsubishi Triton 15\' Tail Lamp L/R', 1, 'Mitsubishi Triton', 'Purchase + install lamp', 25.00, 132.00, '2020-01-17', 'Paid'),
(19, 'Purchase', 17, 'Battery Century Marathoner', 1, 'Toyota Alphard', 'Purchase battery only', 0.00, 70.00, '2020-01-17', 'Paid'),
(20, 'Purchase & Installation', 18, 'Tyre Michelin Pilot Super Sport (for Car & Van)', 4, 'Volkswagen Scirocco', 'Purchase + change tires', 30.00, 470.00, '2020-01-17', 'Paid'),
(21, 'Purchase', 18, 'Tyre Michelin Pilot Super Sport (for Car & Van)', 4, 'Volkswagen Scirocco', 'Purchase tyre', 0.00, 440.00, '2020-01-17', 'Paid'),
(22, 'Purchase', 2, 'Tyre Michelin Pilot Super Sport (for Car & Van)', 4, 'Volkswagen Jetta', 'Purchase tyre', 0.00, 440.00, '2020-01-18', 'Paid'),
(23, 'Purchase', 4, 'Tyre Michelin Pilot Super Sport (for Car & Van)', 4, 'Mini Cooper S', 'Purchase tyre', 0.00, 440.00, '2020-01-18', 'Paid'),
(24, 'Installation', 4, '-', 0, 'Mini Cooper S', 'Change tires only', 25.00, 25.00, '2020-01-18', 'Paid'),
(25, 'Purchase', 13, 'Tail Lamp VLAND for Toyota Camry 2014-2017 Red/Smoked Lens LED Car Light with Left Side & Right Side', 2, 'Honda Accord', 'Purchase lamp', 0.00, 2560.00, '2020-01-18', 'Paid'),
(26, 'Purchase & Installation', 11, 'Tyre Michelin Energy XM2 + (for Car & Van)', 4, 'Proton Exora', 'Purchase +install tires ', 20.00, 380.00, '2020-01-18', 'Paid'),
(27, 'Purchase', 14, 'Tyre Michelin Energy XM2 (for Car & Van)', 4, 'Honda CR-V', 'Purchase tyre', 0.00, 320.00, '2020-01-19', 'Paid'),
(28, 'Purchase & Installation', 9, 'Tyre Michelin Energy XM2 + (for Car & Van)', 4, 'BMW X6', 'Purchase + change tires', 35.00, 395.00, '2020-01-19', 'Paid'),
(29, 'Purchase', 5, 'Tyre Michelin Energy XM2 (for Car & Van)', 4, 'Perodua Myvi', 'Purchase tyre', 0.00, 320.00, '2020-01-19', 'Paid'),
(30, 'Purchase & Installation', 19, 'Battery Century Hybrid', 1, 'Toyota Camry', 'Purchase + install battery', 25.00, 100.00, '2020-01-19', 'Paid'),
(31, 'Purchase', 1, 'Turn Signal Switch Life Auto Part for Saga BLM/Gen 2/Persona (OEM)', 1, 'Proton Saga FLX', 'Purchase signal switch', 0.00, 88.00, '2020-01-19', 'Paid'),
(32, 'Purchase & Installation', 6, 'Battery Century Marathoner', 1, 'Perodua Kancil', 'Purchase battery', 20.00, 90.00, '2020-01-19', 'Paid'),
(33, 'Installation', 20, '-', 0, 'Perodua Myvi', 'Change battery only', 25.00, 25.00, '2020-01-19', 'Paid'),
(34, 'Purchase & Installation', 21, 'Tail Lamp VLAND for Volkswagen Vento/Polo 2011-2017 VW LED Turn Signal with Sequential Indicator Car Lamp', 1, 'Volkswagen Vento', 'Purchase + install lamp', 20.00, 819.00, '2020-01-20', 'Paid'),
(35, 'Installation', 22, '-', 0, 'Perodua Viva', 'Service engine', 90.00, 90.00, '2020-01-20', 'Paid'),
(37, 'Purchase', 24, 'Battery AMARON Hi Life', 1, 'Proton X70', 'Purchase battery only', 0.00, 79.90, '2020-01-20', 'Paid'),
(38, 'Purchase & Installation', 25, 'Turn Signal Switch Life Auto Part for Wira', 1, 'Proton Wira', 'Purchase + install signal switch', 25.00, 110.00, '2020-01-21', 'Paid'),
(39, 'Installation', 8, '-', 0, 'Proton Satria Neo', 'Install radio only', 50.00, 50.00, '2020-01-21', 'Pending'),
(42, 'Purchase', 9, 'Japan Car Jack (Used)', 1, 'Toyota Camry', 'Purchase car jack only', 0.00, 45.00, '2020-01-22', 'Pending'),
(43, 'Purchase & Installation', 10, 'Tyre Michelin Pilot Sport 3 (for Car & Van)', 4, 'Volkswagen Golf', 'Purchase + change tires', 30.00, 430.00, '2020-01-22', 'Paid'),
(44, 'Purchase', 12, 'Battery AMARON Pro', 1, 'Proton X70', 'Purchase battery only', 0.00, 78.00, '2020-01-22', 'Pending'),
(45, 'Installation', 16, '-', 0, 'Mitsubishi Triton', 'Install battery only', 35.00, 35.00, '2020-01-22', 'Pending'),
(47, 'Purchase', 30, 'Tyre Michelin Pilot Sport 3 (for Car & Van)', 3, 'saga', 'change tyre', 100.00, 0.00, '2020-02-03', 'Pending'),
(50, 'Purchase', 29, 'Japan Car Jack (Used)', 1, 'Proton Persona', 'Purchase car jack only', 0.00, 45.00, '2020-02-06', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `sp_id` int(11) NOT NULL,
  `sp_type` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `sp_brand` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `sp_desc` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `sp_price` float(11,2) NOT NULL,
  `sp_stock` int(15) NOT NULL,
  `sp_date` date NOT NULL DEFAULT current_timestamp(),
  `sp_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`sp_id`, `sp_type`, `sp_brand`, `sp_desc`, `sp_price`, `sp_stock`, `sp_date`, `sp_image`) VALUES
(6, 'Tyre ', 'Michelin', 'Tyre Michelin Pilot Sport Cup 2 (for Car & Van)', 90.00, 2, '2020-01-03', NULL),
(7, 'Tyre ', 'Michelin', 'Tyre Michelin Pilot Sport PS2 (for Car & Van)', 95.00, 4, '2020-01-03', NULL),
(8, 'Tyre', 'Michelin', 'Tyre Michelin Pilot Super Sport (for Car & Van)', 110.00, 8, '2020-01-03', NULL),
(9, 'Tyre', 'Michelin', 'Tyre Michelin Primacy 3 (for Car & Van)', 95.00, 4, '2020-01-03', NULL),
(10, 'Tyre', 'Michelin', 'Tyre Michelin Primacy 3 ST (for Car & Van)', 100.00, 4, '2020-01-03', NULL),
(11, 'Tyre', 'Michelin', 'Tyre Michelin Primacy 4 (for Car & Van)', 95.00, 4, '2020-01-03', NULL),
(13, 'Tyre', 'Goodyear', 'Tyre Goodyear Eagle F1 Asymmetric 2', 75.00, 4, '2020-01-03', NULL),
(14, 'Battery', 'AMARON', 'Battery AMARON Pro', 78.00, 4, '2020-01-03', NULL),
(15, 'Battery', 'AMARON', 'Battery AMARON Hi Life', 79.90, 8, '2020-01-03', NULL),
(16, 'Battery', 'Century', 'Battery Century Marathoner', 70.00, 5, '2020-01-03', NULL),
(17, 'Battery', 'Century', 'Battery Century Hybrid', 75.00, 5, '2020-01-03', NULL),
(18, 'Tail Lamp', 'Mitsubishi ', 'Tail Lamp Mitsubishi Triton 15\' Tail Lamp L/R', 107.00, 2, '2020-01-09', NULL),
(19, 'Tail Lamp', 'VLAND', 'Tail Lamp VLAND for Volkswagen Vento/Polo 2011-2017 VW LED Turn Signal with Sequential Indicator Car Lamp', 799.00, 4, '2020-01-09', NULL),
(20, 'Tail Lamp', 'VLAND', 'Tail Lamp VLAND for Toyota Camry 2014-2017 Red/Smoked Lens LED Car Light with Left Side & Right Side', 1280.00, 10, '2020-01-09', NULL),
(21, 'Wiper Switch', 'Life Auto Part', 'Wiper Switch Life Auto Part for Proton Exora', 130.00, 2, '2020-01-15', NULL),
(22, 'Turn Signal Switch', 'Life Auto Part', 'Turn Signal Switch Life Auto Part for Saga BLM/Gen 2/Persona (OEM)', 88.00, 6, '2020-01-15', NULL),
(23, 'Turn Signal Switch', 'Life Auto Part', 'Turn Signal Switch Life Auto Part for Avanza/Myvi/Viva/Alza/Axia', 95.00, 6, '2020-01-15', NULL),
(24, 'Turn Signal Switch', 'Life Auto Part', 'Turn Signal Switch Life Auto Part for Wira', 85.00, 2, '2020-01-15', NULL),
(25, 'Turn Signal Switch', 'Life Auto Part', 'Turn Signal Switch Life Auto Part for Proton Waja/Gen2/Persona (OEM)', 90.00, 5, '2020-01-15', NULL),
(33, 'Tyre', 'Michelin', 'Tyre Michelin Pilot Sport 3 (for Car & Van)', 100.00, 10, '2020-02-06', 0x696d616765732f322e6a7067),
(34, 'Tyre', 'Michelin', 'Tyre Michelin Pilot Sport 4 (for Car & Van)', 110.00, 10, '2020-02-06', 0x696d616765732f332e6a7067),
(35, 'Tyre', 'Goodyear', 'Tyre Goodyear Eagle F1 Asymmetric 3', 80.00, 8, '2020-02-06', 0x696d616765732f312e6a7067),
(36, 'Turn Signal Switch', 'Life Auto Part', 'Turn Signal Switch Life Auto Part for Kia Spectra Genuine Parts', 310.00, 3, '2020-02-06', 0x696d616765732f322e6a7067),
(37, 'Car Jack', 'Life Auto Part', 'Japan Car Jack (Used)', 45.00, 5, '2020-02-06', 0x696d616765732f332e6a7067),
(38, '-', '-', '-', 0.00, 100, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `st_id` int(11) NOT NULL,
  `st_username` varchar(15) NOT NULL,
  `st_salt` varchar(100) NOT NULL,
  `st_password` varchar(100) NOT NULL,
  `st_fullname` varchar(30) NOT NULL,
  `st_contact` varchar(20) NOT NULL,
  `st_gender` varchar(10) NOT NULL,
  `grant_level` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_id`, `st_username`, `st_salt`, `st_password`, `st_fullname`, `st_contact`, `st_gender`, `grant_level`) VALUES
(6, 'farah', 'y87dcEMHRf0bUbP4BrNpS', '$2a$05$y87dcEMHRf0bUbP4BrNpS.QOAtSjtuh480dGk.C42h1Ch7Xf2TAJO', 'Farah Hani', '016 0606660', 'Female', 'Staff'),
(7, 'fatin', 'zeHTHImqCpGGVJlCucBCp', '$2a$05$zeHTHImqCpGGVJlCucBCp.FXllSm5TaHdVv0lO9Z0dxxbo7F3o5wC', 'Fatin Afiqah', '017 0707770', 'Female', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `sv_id` int(11) NOT NULL,
  `sv_username` varchar(15) NOT NULL,
  `sv_salt` varchar(100) NOT NULL,
  `sv_password` varchar(100) NOT NULL,
  `sv_fullname` varchar(30) NOT NULL,
  `sv_contact` varchar(20) NOT NULL,
  `sv_gender` varchar(10) NOT NULL,
  `grant_level` varchar(15) NOT NULL DEFAULT 'Supervisor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`sv_id`, `sv_username`, `sv_salt`, `sv_password`, `sv_fullname`, `sv_contact`, `sv_gender`, `grant_level`) VALUES
(2, 'shafinaz', 'AN9bQqoN.z04ZZS7Gg7gP', '$2a$05$AN9bQqoN.z04ZZS7Gg7gP.aLRKtF9YvDlAqcQgKTZligNPzS1ZHFe', 'Nur Shafinaz', '012 0202220', 'Female', 'Supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`svc_id`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`sv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `svc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
