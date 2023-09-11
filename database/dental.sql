-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020-11-04 15:28:29
-- 服务器版本: 5.5.44-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `root`
--

-- --------------------------------------------------------

--
-- 表的结构 `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `description` text,
  PRIMARY KEY (`appointment_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`),
  KEY `appointment_date` (`appointment_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `timeslot`, `description`) VALUES
(5, 3, 2, '2020-11-16', '15:00-16:00', 'Hi Gina I have a headache.'),
(4, 3, 1, '2020-11-06', '11:00-12:00', 'Hi Jeremy I have a fever');

-- --------------------------------------------------------

--
-- 表的结构 `calendar_1`
--

CREATE TABLE IF NOT EXISTS `calendar_1` (
  `calendar_date` date NOT NULL,
  `9:00-10:00` varchar(2) DEFAULT '0',
  `10:00-11:00` varchar(2) DEFAULT '0',
  `11:00-12:00` varchar(2) DEFAULT '0',
  `14:00-15:00` varchar(2) DEFAULT '0',
  `15:00-16:00` varchar(2) DEFAULT '0',
  `16:00-17:00` varchar(2) DEFAULT '0',
  PRIMARY KEY (`calendar_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `calendar_1`
--

INSERT INTO `calendar_1` (`calendar_date`, `9:00-10:00`, `10:00-11:00`, `11:00-12:00`, `14:00-15:00`, `15:00-16:00`, `16:00-17:00`) VALUES
('2020-11-12', '0', '0', '0', '0', '0', '0'),
('2020-11-11', '0', '0', '0', '0', '0', '0'),
('2020-11-10', '0', '0', '0', '0', '0', '0'),
('2020-11-09', '0', '0', '0', '0', '0', '0'),
('2020-11-04', '0', '0', '0', '0', '0', '0'),
('2020-11-05', '0', '0', '0', '0', '0', '0'),
('2020-11-06', '2', '2', '1', '2', '2', '2'),
('2020-11-07', '0', '0', '0', '0', '0', '0'),
('2020-11-08', '0', '0', '0', '0', '0', '0'),
('2020-11-03', '0', '0', '0', '0', '0', '0'),
('2020-11-02', '0', '0', '0', '0', '0', '0'),
('2020-10-28', '0', '0', '0', '0', '0', '0'),
('2020-10-27', '0', '0', '0', '0', '0', '0'),
('2020-10-26', '0', '0', '0', '0', '0', '0'),
('2020-10-20', '0', '0', '0', '0', '0', '0'),
('2020-10-21', '0', '0', '0', '0', '0', '0'),
('2020-10-22', '0', '0', '0', '0', '0', '0'),
('2020-10-23', '0', '0', '0', '0', '0', '0'),
('2020-10-24', '0', '0', '0', '0', '0', '0'),
('2020-10-25', '0', '0', '0', '0', '0', '0'),
('2020-10-29', '0', '0', '0', '0', '0', '0'),
('2020-10-30', '0', '0', '0', '0', '0', '0'),
('2020-10-31', '0', '0', '0', '0', '0', '0'),
('2020-11-01', '0', '0', '0', '0', '0', '0'),
('2020-11-13', '0', '0', '0', '0', '0', '0'),
('2020-11-14', '0', '0', '0', '0', '0', '0'),
('2020-11-15', '0', '0', '0', '0', '0', '0'),
('2020-11-16', '0', '0', '0', '0', '0', '0'),
('2020-11-17', '0', '0', '0', '0', '0', '0'),
('2020-11-18', '0', '0', '0', '0', '0', '0'),
('2020-11-19', '0', '0', '0', '0', '0', '0'),
('2020-11-20', '0', '0', '0', '0', '0', '0'),
('2020-11-21', '0', '0', '0', '0', '0', '0'),
('2020-11-22', '0', '0', '0', '0', '0', '0'),
('2020-11-23', '0', '0', '0', '0', '0', '0'),
('2020-11-24', '0', '0', '0', '0', '0', '0'),
('2020-11-25', '0', '0', '0', '0', '0', '0'),
('2020-11-26', '0', '0', '0', '0', '0', '0'),
('2020-11-27', '0', '0', '0', '0', '0', '0'),
('2020-11-28', '0', '0', '0', '0', '0', '0'),
('2020-11-29', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `calendar_2`
--

CREATE TABLE IF NOT EXISTS `calendar_2` (
  `calendar_date` date NOT NULL,
  `9:00-10:00` varchar(2) DEFAULT '0',
  `10:00-11:00` varchar(2) DEFAULT '0',
  `11:00-12:00` varchar(2) DEFAULT '0',
  `14:00-15:00` varchar(2) DEFAULT '0',
  `15:00-16:00` varchar(2) DEFAULT '0',
  `16:00-17:00` varchar(2) DEFAULT '0',
  PRIMARY KEY (`calendar_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `calendar_2`
--

INSERT INTO `calendar_2` (`calendar_date`, `9:00-10:00`, `10:00-11:00`, `11:00-12:00`, `14:00-15:00`, `15:00-16:00`, `16:00-17:00`) VALUES
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
('2020-10-22', '0', '0', '0', '0', '0', '0'),
('2020-10-23', '0', '0', '0', '0', '0', '0'),
('2020-10-24', '0', '0', '0', '0', '0', '0'),
('2020-10-25', '0', '0', '0', '0', '0', '0'),
('2020-10-29', '0', '0', '0', '0', '0', '0'),
('2020-10-30', '0', '0', '0', '0', '0', '0'),
('2020-10-31', '0', '0', '0', '0', '0', '0'),
('2020-11-01', '0', '0', '0', '0', '0', '0'),
('2020-11-13', '0', '0', '0', '0', '0', '0'),
('2020-11-14', '0', '0', '0', '0', '0', '0'),
('2020-11-15', '0', '0', '0', '0', '0', '0'),
('2020-11-16', '0', '0', '0', '0', '1', '0'),
('2020-11-17', '0', '0', '0', '0', '0', '0'),
('2020-11-18', '0', '0', '0', '0', '0', '0'),
('2020-11-19', '0', '0', '0', '0', '0', '0'),
('2020-11-20', '0', '0', '0', '0', '0', '0'),
('2020-11-21', '0', '0', '0', '0', '0', '0'),
('2020-11-22', '0', '0', '0', '0', '0', '0'),
('2020-11-23', '0', '0', '0', '0', '0', '0'),
('2020-11-24', '0', '0', '0', '0', '0', '0'),
('2020-11-25', '0', '0', '0', '0', '0', '0'),
('2020-11-26', '0', '0', '0', '0', '0', '0'),
('2020-11-27', '0', '0', '0', '0', '0', '0'),
('2020-11-28', '0', '0', '0', '0', '0', '0'),
('2020-11-29', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------


--
-- 表的结构 `users`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `address`, `phone`, `gender`, `profile_image`) VALUES
(1, 'Jeremy', 'jeremy@gmail.com', '202cb962ac59075b964b07152d234b70', 'doctor', 'Regent heights', '11111111', 'Male', '1'),
(2, 'Gina', 'gina@gmail.com', '202cb962ac59075b964b07152d234b70', 'doctor', NULL, NULL, 'Male', '1'),
(3, 'Jacob12138', 'xiey0017@ntu.edu.sg', '202cb962ac59075b964b07152d234b70', 'patient', 'Singapore, Nanyang Technological University, hall of 13, 64-05-1303', '90870139', 'Male', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;