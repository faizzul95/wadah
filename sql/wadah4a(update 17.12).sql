-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 03:02 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wadah4a`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `act_id` int(11) NOT NULL,
  `act_name` varchar(35) NOT NULL,
  `act_description` text NOT NULL,
  `act_date` date NOT NULL,
  `act_time` time NOT NULL,
  `act_venue` varchar(100) NOT NULL,
  `act_category` enum('Ahli','Awam') NOT NULL,
  `act_type` varchar(11) DEFAULT NULL,
  `act_fee` int(11) DEFAULT NULL,
  `naqib_ic` bigint(13) DEFAULT NULL,
  `speak_ic` bigint(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `act_name`, `act_description`, `act_date`, `act_time`, `act_venue`, `act_category`, `act_type`, `act_fee`, `naqib_ic`, `speak_ic`) VALUES
(1, 'Ke Mana Hala Tuju Yang Sebenar', 'tajuk utama untuk bulan ini', '2018-12-26', '10:00:00', 'Surau Ar-Rahman', 'Ahli', 'Usrah', 20, 890202105678, NULL),
(2, 'Santai Bersama Ustaz farid', 'berbincang mengenai isu-isu semasa', '2018-12-20', '20:45:00', 'Dewan Serbaguna Kg Rahmat', 'Awam', '', 15, NULL, 990908122957);

-- --------------------------------------------------------

--
-- Table structure for table `act_sponsorship`
--

CREATE TABLE IF NOT EXISTS `act_sponsorship` (
  `sponsor_id` varchar(10) DEFAULT NULL,
  `act_id` int(11) DEFAULT NULL,
  `sponsor_amount` int(11) NOT NULL,
  `sps_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(10) NOT NULL,
  `asset_type` varchar(12) DEFAULT NULL,
  `asset_status` varchar(20) DEFAULT NULL,
  `asset_quantity` int(10) DEFAULT NULL,
  `asset_desc` varchar(30) DEFAULT NULL,
  `asset_place` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_id`, `asset_type`, `asset_status`, `asset_quantity`, `asset_desc`, `asset_place`) VALUES
(1, 'komputer', 'Sangat Bagus', 3, '-', 'makmal'),
(2, 'dewan', 'Tidak Memuaskan', 2, 'untuk ceramah', 'perlis'),
(3, 'meja', 'Bagus', 6, '-', 'dewan dahlia'),
(4, 'PA sistem', 'Sangat Bagus', 2, '-', 'setor');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

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

CREATE TABLE IF NOT EXISTS `education_info` (
  `edu_id` int(11) NOT NULL,
  `member_ic` varchar(15) DEFAULT NULL,
  `family_ic` varchar(15) DEFAULT NULL,
  `edu_name` varchar(50) DEFAULT NULL,
  `edu_address` varchar(255) DEFAULT NULL,
  `edu_phone` bigint(13) DEFAULT NULL,
  `edu_course` varchar(60) DEFAULT NULL,
  `edu_level` varchar(50) DEFAULT NULL,
  `edu_start_date` varchar(25) DEFAULT NULL,
  `edu_end_date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `member_ic` bigint(13) NOT NULL,
  `activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `Exp_id` int(10) NOT NULL,
  `Exp_name` varchar(10) NOT NULL,
  `Exp_date` date NOT NULL,
  `Exp_type` varchar(10) NOT NULL,
  `Exp_outstanding` float NOT NULL,
  `Exp_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `family_ic` varchar(12) NOT NULL,
  `family_name` varchar(60) DEFAULT NULL,
  `family_address` varchar(155) DEFAULT NULL,
  `family_gender` varchar(10) NOT NULL,
  `family_phone` varchar(13) DEFAULT NULL,
  `family_dob` date DEFAULT NULL,
  `family_email` varchar(40) DEFAULT NULL,
  `family_relation` varchar(25) DEFAULT NULL,
  `member_ic` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL,
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
  `q10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `Fee_id` int(11) NOT NULL,
  `member_ic` varchar(25) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `Fee_amount` double DEFAULT NULL,
  `Fee_status` varchar(20) DEFAULT NULL,
  `Fee_date` date DEFAULT NULL,
  `Fee_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenance_id` int(10) DEFAULT NULL,
  `maintenance_days` int(10) DEFAULT NULL,
  `maintenance_status` varchar(40) DEFAULT NULL,
  `asset_id` int(10) DEFAULT NULL,
  `vendor_id` int(10) DEFAULT NULL,
  `maintenance_cost` int(10) NOT NULL,
  `maintenance_desc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance_id`, `maintenance_days`, `maintenance_status`, `asset_id`, `vendor_id`, `maintenance_cost`, `maintenance_desc`) VALUES
(NULL, 3, '80%', 1, 1, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mbr_id` int(11) NOT NULL,
  `mbr_name` varchar(60) DEFAULT NULL,
  `mbr_ic` varchar(12) DEFAULT NULL,
  `mbr_address` varchar(255) DEFAULT NULL,
  `mbr_gender` varchar(10) DEFAULT NULL,
  `mbr_phone` bigint(13) DEFAULT NULL,
  `mbr_dob` date DEFAULT NULL,
  `mbr_email` varchar(40) DEFAULT NULL,
  `mbr_branch` varchar(225) DEFAULT NULL,
  `mbr_profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `naqib`
--

CREATE TABLE IF NOT EXISTS `naqib` (
  `naqib_ic` bigint(13) NOT NULL,
  `naqib_name` varchar(100) NOT NULL,
  `naqib_category` varchar(20) NOT NULL,
  `naqib_phone` int(20) NOT NULL,
  `naqib_address` varchar(255) DEFAULT NULL,
  `naqib_mail` varchar(50) NOT NULL,
  `naqib_branch` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `naqib`
--

INSERT INTO `naqib` (`naqib_ic`, `naqib_name`, `naqib_category`, `naqib_phone`, `naqib_address`, `naqib_mail`, `naqib_branch`) VALUES
(880109123475, 'Kamil', 'Naqib', 187233465, 'Kajang', 'kamil_ismail@yahoo.com', 'Perak'),
(890202105678, 'Fatimah', 'Naqibah', 192897172, 'Perlis', 'fatimah@gmail.com', 'Perlis');

-- --------------------------------------------------------

--
-- Table structure for table `occupation_info`
--

CREATE TABLE IF NOT EXISTS `occupation_info` (
  `occupation_id` int(11) NOT NULL,
  `member_ic` varchar(15) DEFAULT NULL,
  `family_ic` varchar(15) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_phone` bigint(123) DEFAULT NULL,
  `company_position` varchar(60) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `company_start_date` varchar(20) DEFAULT NULL,
  `company_end_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public`
--

CREATE TABLE IF NOT EXISTS `public` (
  `public_id` varchar(20) NOT NULL,
  `public_name` varchar(500) NOT NULL,
  `public_add` varchar(500) NOT NULL,
  `public_phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `rent_id` int(10) NOT NULL,
  `rent_assettype` varchar(20) NOT NULL,
  `rent_days` int(10) NOT NULL,
  `rent_startdate` date NOT NULL,
  `rent_finishdate` date NOT NULL,
  `company_id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL,
  `rent_companyname` varchar(200) NOT NULL,
  `rent_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE IF NOT EXISTS `speaker` (
  `speak_ic` bigint(13) NOT NULL,
  `speak_name` varchar(100) NOT NULL,
  `speak_address` varchar(255) NOT NULL,
  `speak_phone` bigint(13) NOT NULL,
  `speak_gender` varchar(15) NOT NULL,
  `speak_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`speak_ic`, `speak_name`, `speak_address`, `speak_phone`, `speak_gender`, `speak_mail`) VALUES
(990908122957, 'Farid', 'Kuala Lumpur', 123552853, 'Lelaki', 'farid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `Sps_id` varchar(10) NOT NULL,
  `Sps_name` varchar(50) NOT NULL,
  `Sps_add` varchar(100) NOT NULL,
  `Sps_phoneNo` int(10) NOT NULL,
  `Sps_email` varchar(30) NOT NULL,
  `Sps_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

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

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `usr_username` varchar(15) DEFAULT NULL,
  `usr_password` varchar(15) DEFAULT NULL,
  `usr_role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `usr_username`, `usr_password`, `usr_role`) VALUES
(1, 'staff', 'staff', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(10) NOT NULL,
  `vendor_name` varchar(20) DEFAULT NULL,
  `vendor_address` varchar(40) DEFAULT NULL,
  `vendor_phone` int(15) DEFAULT NULL,
  `vendor_desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_address`, `vendor_phone`, `vendor_desc`) VALUES
(1, 'ysn enterprise', '', 67875479, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `education_info`
--
ALTER TABLE `education_info`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD KEY `event_activity` (`activity_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`Exp_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_ic`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`Fee_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mbr_id`);

--
-- Indexes for table `naqib`
--
ALTER TABLE `naqib`
  ADD PRIMARY KEY (`naqib_ic`);

--
-- Indexes for table `occupation_info`
--
ALTER TABLE `occupation_info`
  ADD PRIMARY KEY (`occupation_id`);

--
-- Indexes for table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`public_id`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`speak_ic`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`Sps_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `asset_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `education_info`
--
ALTER TABLE `education_info`
  MODIFY `edu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `Fee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mbr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `occupation_info`
--
ALTER TABLE `occupation_info`
  MODIFY `occupation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
