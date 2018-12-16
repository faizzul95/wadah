-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2018 at 05:31 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `act_id` int(11) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(35) NOT NULL,
  `act_description` text NOT NULL,
  `act_date` date NOT NULL,
  `act_time` time NOT NULL,
  `act_venue` varchar(100) NOT NULL,
  `act_category` enum('Ahli','Awam') NOT NULL,
  `act_type` varchar(11) DEFAULT NULL,
  `act_fee` int(11) DEFAULT NULL,
  `naqib_ic` bigint(13) DEFAULT NULL,
  `speak_ic` bigint(13) DEFAULT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `act_name`, `act_description`, `act_date`, `act_time`, `act_venue`, `act_category`, `act_type`, `act_fee`, `naqib_ic`, `speak_ic`) VALUES
(1, 'Muktamar 1', 'Muktamar 1', '2018-12-13', '01:03:00', 'DSS', 'Ahli', 'Muktamar', 0, 111111111111, NULL),
(2, 'AKTIVITI AWAM 1', 'AKTIVITI AWAM 1', '2018-12-14', '12:50:00', 'CENGAL 1', 'Awam', '', 200, NULL, 111111111113),
(3, 'AKTIVITI AWAM 2', 'AKTIVITI AWAM 2', '2018-12-12', '14:00:00', 'Dahlia 2', 'Awam', '', 20, NULL, 111111111112),
(4, 'Event 2', 'TEST', '2018-12-17', '12:32:00', 'TEST', 'Ahli', 'Tamrin', 25, 111111111121, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `act_sponsorship`
--

DROP TABLE IF EXISTS `act_sponsorship`;
CREATE TABLE IF NOT EXISTS `act_sponsorship` (
  `sponsor_id` varchar(10) DEFAULT NULL,
  `act_id` int(11) DEFAULT NULL,
  `sponsor_amount` int(11) NOT NULL,
  `sps_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `act_sponsorship`
--

INSERT INTO `act_sponsorship` (`sponsor_id`, `act_id`, `sponsor_amount`, `sps_description`) VALUES
('1', 1, 200, 'Makanan untuk penceramah'),
('1', 1, 100, 'Makanan untuk peserta');

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

DROP TABLE IF EXISTS `asset`;
CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(10) NOT NULL AUTO_INCREMENT,
  `asset_type` varchar(12) DEFAULT NULL,
  `asset_status` varchar(20) DEFAULT NULL,
  `asset_quantity` int(10) DEFAULT NULL,
  `asset_desc` varchar(30) DEFAULT NULL,
  `asset_place` varchar(30) NOT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(10) DEFAULT NULL,
  `company_name` varchar(40) DEFAULT NULL,
  `company_address` varchar(40) DEFAULT NULL,
  `company_phone` int(15) DEFAULT NULL,
  `company_desc` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `edu_phone` bigint(13) DEFAULT NULL,
  `edu_course` varchar(60) DEFAULT NULL,
  `edu_level` varchar(50) DEFAULT NULL,
  `edu_start_date` varchar(25) DEFAULT NULL,
  `edu_end_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `member_ic` bigint(13) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  KEY `event_activity` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `Exp_id` int(10) NOT NULL,
  `Exp_name` varchar(10) NOT NULL,
  `Exp_date` date NOT NULL,
  `Exp_type` varchar(10) NOT NULL,
  `Exp_outstanding` float NOT NULL,
  `Exp_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`Exp_id`)
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
  `family_phone` varchar(13) DEFAULT NULL,
  `family_dob` date DEFAULT NULL,
  `family_email` varchar(40) DEFAULT NULL,
  `family_relation` varchar(25) DEFAULT NULL,
  `member_ic` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`family_ic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_ic` bigint(13) DEFAULT NULL,
  `activity_id` bigint(13) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL,
  `q9` int(11) DEFAULT NULL,
  `q10` int(11) DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `member_ic`, `activity_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES
(1, 950514025299, 1, 2, 4, 2, 1, 5, 1, 2, 4, 5, 1),
(2, 950514025299, NULL, 5, 1, 2, 1, 5, 1, 2, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `Fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_ic` varchar(25) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `Fee_amount` double DEFAULT NULL,
  `Fee_status` varchar(20) DEFAULT NULL,
  `Fee_date` date DEFAULT NULL,
  `Fee_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`Fee_id`, `member_ic`, `activity_id`, `Fee_amount`, `Fee_status`, `Fee_date`, `Fee_type`) VALUES
(1, '000000000000', NULL, NULL, 'Belum Dibayar', NULL, 'Yuran Ahli'),
(2, '111111111111', NULL, 20, 'Telah Dibayar', '2018-12-29', 'Yuran Ahli');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenance_id` int(10) DEFAULT NULL,
  `maintenance_days` int(10) DEFAULT NULL,
  `maintenance_status` varchar(40) DEFAULT NULL,
  `asset_id` int(10) DEFAULT NULL,
  `vendor_id` int(10) DEFAULT NULL,
  `maintenance_cost` int(10) NOT NULL,
  `maintenance_desc` varchar(40) NOT NULL
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
  `mbr_phone` bigint(13) DEFAULT NULL,
  `mbr_dob` date DEFAULT NULL,
  `mbr_email` varchar(40) DEFAULT NULL,
  `mbr_branch` varchar(225) DEFAULT NULL,
  `mbr_profile_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mbr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mbr_id`, `mbr_name`, `mbr_ic`, `mbr_address`, `mbr_gender`, `mbr_phone`, `mbr_dob`, `mbr_email`, `mbr_branch`, `mbr_profile_picture`) VALUES
(1, 'Ahli 1', '000000000000', 'Alamat Ahli 1', 'Perempuan', 123123123123, '2018-12-20', 'wadah@test', 'Terengganu', 'user.png'),
(2, 'Ahli 2', '111111111111', 'Test Alamat Ahli 2', 'Lelaki', 111111111111, '2018-12-20', 'wadah@test', 'Sabah', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `naqib`
--

DROP TABLE IF EXISTS `naqib`;
CREATE TABLE IF NOT EXISTS `naqib` (
  `naqib_ic` bigint(13) NOT NULL,
  `naqib_name` varchar(100) NOT NULL,
  `naqib_category` varchar(20) NOT NULL,
  `naqib_phone` int(20) NOT NULL,
  `naqib_address` varchar(255) DEFAULT NULL,
  `naqib_mail` varchar(50) NOT NULL,
  `naqib_branch` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`naqib_ic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `naqib`
--

INSERT INTO `naqib` (`naqib_ic`, `naqib_name`, `naqib_category`, `naqib_phone`, `naqib_address`, `naqib_mail`, `naqib_branch`) VALUES
(111111111111, 'Naqib 1', 'Naqib', 1111111111, 'Test Naqib 1', 'n1@naqib', 'Kedah'),
(111111111112, 'Naqib 2', 'Naqibah', 1111111112, 'Test Naqib 1', 'n2@naqib', 'Perlis'),
(111111111121, 'Naqibah 2', 'Naqib', 1222222222, 'Test Naqibah 2', 'nb2@naqib', 'Perak'),
(111111111122, 'Naqibah 1', 'Naqibah', 1111111111, 'Test Naqibah  1', 'nb1@naqib', 'Perak');

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
  `company_phone` bigint(123) DEFAULT NULL,
  `company_position` varchar(60) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `company_start_date` varchar(20) DEFAULT NULL,
  `company_end_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public`
--

DROP TABLE IF EXISTS `public`;
CREATE TABLE IF NOT EXISTS `public` (
  `public_id` varchar(20) NOT NULL,
  `public_name` varchar(500) NOT NULL,
  `public_add` varchar(500) NOT NULL,
  `public_phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`public_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `rent_id` int(10) NOT NULL,
  `rent_assettype` varchar(20) NOT NULL,
  `rent_days` int(10) NOT NULL,
  `rent_startdate` date NOT NULL,
  `rent_finishdate` date NOT NULL,
  `company_id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

DROP TABLE IF EXISTS `speaker`;
CREATE TABLE IF NOT EXISTS `speaker` (
  `speak_ic` bigint(13) NOT NULL,
  `speak_name` varchar(100) NOT NULL,
  `speak_address` varchar(255) NOT NULL,
  `speak_phone` bigint(13) NOT NULL,
  `speak_gender` varchar(15) NOT NULL,
  `speak_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`speak_ic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`speak_ic`, `speak_name`, `speak_address`, `speak_phone`, `speak_gender`, `speak_mail`) VALUES
(111111111111, 'Penceramah 1', 'Test Penceramah 1', 111111111111, 'Lelaki', 'p1@wadah'),
(111111111112, 'Penceramah 2', 'Test Penceramah 2', 222222222222, 'Perempuan', 'p2@wadah'),
(111111111113, 'Penceramah 3', 'Test Penceramah 3', 333333333333, 'Lelaki', 'p3@wadah');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `Sps_id` varchar(10) NOT NULL,
  `Sps_name` varchar(50) NOT NULL,
  `Sps_add` varchar(100) NOT NULL,
  `Sps_phoneNo` bigint(12) NOT NULL,
  `Sps_email` varchar(30) NOT NULL,
  `Sps_type` varchar(20) NOT NULL,
  PRIMARY KEY (`Sps_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`Sps_id`, `Sps_name`, `Sps_add`, `Sps_phoneNo`, `Sps_email`, `Sps_type`) VALUES
('1', 'PENAJA 1', 'PENAJA 1', 111111111111, 'pn1@wadah', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` varchar(15) NOT NULL,
  `staff_fullname` varchar(255) NOT NULL,
  `staff_telno` int(14) NOT NULL,
  `staff_address` text,
  `staff_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fullname`, `staff_telno`, `staff_address`, `staff_email`) VALUES
('staff', 'STAFF', 11111, 'wadah', 'staf.wadah@gmail.com');

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
(1, 'staff', 'staff', 'admin'),
(2, '000000000000', 'wadah123', 'member'),
(3, '111111111111', 'wadah123', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(20) DEFAULT NULL,
  `vendor_address` varchar(40) DEFAULT NULL,
  `vendor_phone` int(15) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
