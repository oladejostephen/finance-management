-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2019 at 12:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(500) NOT NULL,
  `payment_amount` varchar(50) NOT NULL,
  `payment_status` enum('Compulsory','Not Compulsory') NOT NULL,
  `payment_semester` enum('First Semester','Second Semester') NOT NULL,
  `payment_year` enum('ND I','ND II') NOT NULL,
  `date_reg` timestamp NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_id` int(50) NOT NULL,
  `payment_idd` int(50) NOT NULL,
  `payer_name` varchar(50) NOT NULL,
  `payer_matric` varchar(50) NOT NULL,
  `payer_email` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_amount` varchar(50) NOT NULL,
  `payment_semester` varchar(50) NOT NULL,
  `payer_year` enum('ND I','ND II') NOT NULL,
  `payment_status` enum('Paid','Not Paid') NOT NULL,
  `date_paid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payer_name` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `matric` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `class` enum('ND I','ND II') NOT NULL,
  `role` enum('admin','student','dude') NOT NULL,
  `date_reg` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matric` (`matric`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
