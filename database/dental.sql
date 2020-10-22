-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2020-10-22 08:53:11
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `dental`
--

-- --------------------------------------------------------

--
-- 表的结构 `appointments`
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `timeslot`, `description`) VALUES
(12, 7, 6, '2020-11-01', '9:00-10:00', 'I have a cough');

-- --------------------------------------------------------

--
-- 表的结构 `calendar_6`
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
-- 转存表中的数据 `calendar_6`
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
('2020-11-02', '0', '0', '0', '0', '0', '0'),
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
-- 表的结构 `users`
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
-- 转存表中的数据 `users`
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
