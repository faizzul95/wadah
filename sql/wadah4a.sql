-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2018 at 12:35 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wadah4a`
--

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

DROP TABLE IF EXISTS `education_info`;
CREATE TABLE IF NOT EXISTS `education_info` (
  `edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_ic` varchar(15) DEFAULT NULL,
  `family_ic` varchar(15) DEFAULT NULL,
  `edu_name` varchar(50) DEFAULT NULL,
  `edu_address` varchar(255) DEFAULT NULL,
  `edu_phone` int(12) DEFAULT NULL,
  `edu_course` varchar(60) DEFAULT NULL,
  `edu_level` varchar(50) DEFAULT NULL,
  `edu_start_date` varchar(25) DEFAULT NULL,
  `edu_end_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
CREATE TABLE IF NOT EXISTS `family` (
  `family_ic` varchar(12) NOT NULL,
  `family_name` varchar(60) DEFAULT NULL,
  `family_address` varchar(155) DEFAULT NULL,
  `family_gender` varchar(10) NOT NULL,
  `family_phone` int(13) DEFAULT NULL,
  `family_dob` date DEFAULT NULL,
  `family_email` varchar(40) DEFAULT NULL,
  `family_relation` varchar(25) DEFAULT NULL,
  `member_ic` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`family_ic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `mbr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mbr_name` varchar(60) DEFAULT NULL,
  `mbr_ic` varchar(12) DEFAULT NULL,
  `mbr_address` varchar(255) DEFAULT NULL,
  `mbr_gender` varchar(10) DEFAULT NULL,
  `mbr_phone` int(13) DEFAULT NULL,
  `mbr_dob` date DEFAULT NULL,
  `mbr_email` varchar(40) DEFAULT NULL,
  `mbr_branch` varchar(225) DEFAULT NULL,
  `mbr_profile_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_info`
--

DROP TABLE IF EXISTS `occupation_info`;
CREATE TABLE IF NOT EXISTS `occupation_info` (
  `occupation_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_ic` varchar(15) DEFAULT NULL,
  `family_ic` varchar(15) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_phone` int(12) DEFAULT NULL,
  `company_position` varchar(60) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `company_start_date` varchar(25) DEFAULT NULL,
  `company_end_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_fullname` varchar(255) NOT NULL,
  `staff_telno` int(14) NOT NULL,
  `staff_address` text,
  `staff_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fullname`, `staff_telno`, `staff_address`, `staff_email`) VALUES
(1, 'Administrator', 123456789, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(15) DEFAULT NULL,
  `usr_password` varchar(15) DEFAULT NULL,
  `usr_role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `usr_username`, `usr_password`, `usr_role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'member', 'member', 'member'),
(3, 'speaker', 'speaker', 'speaker');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
