-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2020 at 04:37 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `timeslot` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`appointment_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `timeslot`, `description`) VALUES
(12, 7, 6, '2020-11-01', '9:00-10:00', 'I have a cough'),
(17, 13, 12, '2020-11-02', '11:00-12:00', 'gina'),
(22, 13, 12, '2020-11-02', '15:00-16:00', 'gina'),
(18, 13, 6, '2020-11-02', '9:00-10:00', 'jeremy'),
(19, 13, 12, '2020-11-02', '14:00-15:00', 'gina'),
(20, 13, 6, '2020-11-02', '11:00-12:00', 'jeremy'),
(21, 13, 6, '2020-11-02', '11:00-12:00', 'jeremy'),
(23, 13, 12, '2020-11-02', '16:00-17:00', 'gina'),
(24, 13, 6, '2020-11-02', '14:00-15:00', 'jeremy');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_6`
--

DROP TABLE IF EXISTS `calendar_6`;
CREATE TABLE IF NOT EXISTS `calendar_6` (
  `calendar_date` date DEFAULT NULL,
  `9:00-10:00` varchar(2) DEFAULT NULL,
  `10:00-11:00` varchar(2) DEFAULT NULL,
  `11:00-12:00` varchar(2) DEFAULT NULL,
  `14:00-15:00` varchar(2) DEFAULT NULL,
  `15:00-16:00` varchar(2) DEFAULT NULL,
  `16:00-17:00` varchar(2) DEFAULT NULL,
  UNIQUE KEY `calendar_date` (`calendar_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_6`
--

INSERT INTO `calendar_6` (`calendar_date`, `9:00-10:00`, `10:00-11:00`, `11:00-12:00`, `14:00-15:00`, `15:00-16:00`, `16:00-17:00`) VALUES
('2020-11-12', '0', '0', '0', '0', '0', '0'),
('2020-11-11', '0', '0', '0', '0', '0', '0'),
('2020-11-10', '0', '0', '0', '0', '0', '0'),
('2020-11-09', '0', '0', '0', '0', '0', '0'),
('2020-11-04', '0', '0', '0', '0', '0', '0'),
('2020-11-05', '0', '0', '0', '0', '0', '0'),
('2020-11-06', '0', '0', '0', '0', '0', '0'),
('2020-11-07', '0', '0', '0', '0', '0', '0'),
('2020-11-08', '0', '0', '0', '0', '0', '0'),
('2020-11-03', '0', '0', '0', '0', '0', '0'),
('2020-11-02', '1', '1', '1', '1', '0', '0'),
('2020-10-28', '0', '0', '0', '0', '0', '0'),
('2020-10-27', '0', '0', '0', '0', '0', '0'),
('2020-10-26', '0', '0', '0', '0', '0', '0'),
('2020-10-20', '0', '0', '0', '0', '0', '0'),
('2020-10-21', '0', '0', '0', '0', '0', '0'),
('2020-10-22', '1', '0', '0', '0', '0', '0'),
('2020-10-23', '0', '0', '0', '0', '0', '0'),
('2020-10-24', '0', '0', '0', '0', '0', '0'),
('2020-10-25', '0', '0', '0', '0', '0', '0'),
('2020-10-29', '0', '0', '0', '0', '0', '0'),
('2020-10-30', '0', '0', '0', '0', '0', '0'),
('2020-10-31', '0', '0', '0', '0', '0', '1'),
('2020-11-01', '1', '0', '0', '0', '0', '0'),
('2020-11-13', '0', '0', '0', '0', '0', '0'),
('2020-11-14', '0', '0', '0', '0', '0', '0'),
('2020-11-15', '0', '0', '0', '0', '0', '0'),
('2020-11-16', '0', '0', '0', '0', '0', '0'),
('2020-11-17', '0', '0', '0', '0', '0', '0'),
('2020-11-18', '0', '0', '0', '0', '0', '0'),
('2020-11-19', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_12`
--

DROP TABLE IF EXISTS `calendar_12`;
CREATE TABLE IF NOT EXISTS `calendar_12` (
  `calendar_date` date DEFAULT NULL,
  `9:00-10:00` varchar(2) DEFAULT NULL,
  `10:00-11:00` varchar(2) DEFAULT NULL,
  `11:00-12:00` varchar(2) DEFAULT NULL,
  `14:00-15:00` varchar(2) DEFAULT NULL,
  `15:00-16:00` varchar(2) DEFAULT NULL,
  `16:00-17:00` varchar(2) DEFAULT NULL,
  `new` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`new`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_12`
--

INSERT INTO `calendar_12` (`calendar_date`, `9:00-10:00`, `10:00-11:00`, `11:00-12:00`, `14:00-15:00`, `15:00-16:00`, `16:00-17:00`, `new`) VALUES
('2020-11-12', '0', '0', '0', '0', '0', '0', 1),
('2020-11-11', '0', '0', '0', '0', '0', '0', 2),
('2020-11-10', '0', '0', '0', '0', '0', '0', 3),
('2020-11-09', '0', '0', '0', '0', '0', '0', 4),
('2020-11-04', '0', '0', '0', '0', '0', '0', 5),
('2020-11-05', '0', '0', '0', '0', '0', '0', 6),
('2020-11-06', '0', '0', '0', '0', '0', '0', 7),
('2020-11-07', '0', '0', '0', '0', '0', '0', 8),
('2020-11-08', '0', '0', '0', '0', '0', '0', 9),
('2020-11-03', '0', '0', '0', '0', '0', '0', 10),
('2020-11-02', '1', '1', '1', '1', '1', '1', 11),
('2020-10-28', '0', '0', '0', '0', '0', '0', 12),
('2020-10-27', '0', '0', '0', '0', '0', '0', 13),
('2020-10-26', '0', '0', '0', '0', '0', '0', 14),
('2020-10-20', '0', '0', '0', '0', '0', '0', 15),
('2020-10-21', '0', '0', '0', '0', '0', '0', 16),
('2020-10-22', '1', '0', '0', '0', '0', '0', 17),
('2020-10-23', '0', '0', '0', '0', '0', '0', 18),
('2020-10-24', '0', '0', '0', '0', '0', '0', 19),
('2020-10-25', '1', '0', '0', '0', '0', '0', 20),
('2020-10-29', '0', '0', '0', '0', '0', '0', 21),
('2020-10-30', '0', '0', '0', '0', '0', '0', 22),
('2020-10-31', '0', '0', '0', '0', '0', '1', 23),
('2020-11-01', '1', '0', '0', '0', '0', '0', 24),
('2020-11-13', '0', '0', '0', '0', '0', '0', 25),
('2020-11-14', '0', '0', '0', '0', '0', '0', 26),
('2020-11-15', '0', '0', '0', '0', '0', '0', 27),
('2020-11-16', '0', '0', '0', '0', '0', '0', 28),
('2020-11-17', '0', '0', '0', '0', '0', '0', 29),
('2020-11-18', '0', '0', '0', '0', '0', '0', 30),
('2020-11-19', '0', '0', '0', '0', '0', '0', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT 'patient',
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(22) DEFAULT NULL,
  `gender` varchar(8) NOT NULL DEFAULT 'Male',
  `profile_image` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `address`, `phone`, `gender`, `profile_image`) VALUES
(6, 'Jeremy', 'xiey0017@ntu.edu.sg', '202cb962ac59075b964b07152d234b70', 'doctor', NULL, NULL, 'Male', '1'),
(7, 'patient', 'xiey0017@gamil.com', '202cb962ac59075b964b07152d234b70', 'patient', 'Singapore, Nanyang Technological University, hall of 13, 64-05-1303', '88888888', 'Male', '1'),
(10, 'patient2', 'xiey0017@gmail.com', '202cb962ac59075b964b07152d234b70', 'patient', NULL, NULL, 'Male', '0'),
(12, 'Gina', 'gina@gmail.com', '202cb962ac59075b964b07152d234b70', 'doctor', NULL, NULL, 'Male', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
