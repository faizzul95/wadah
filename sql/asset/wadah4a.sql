-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 02:38 PM
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
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(10) NOT NULL,
  `asset_type` varchar(12) DEFAULT NULL,
  `asset_status` varchar(20) DEFAULT NULL,
  `asset_quantity` int(10) DEFAULT NULL,
  `asset_desc` varchar(30) DEFAULT NULL,
  `asset_place` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_id`, `asset_type`, `asset_status`, `asset_quantity`, `asset_desc`, `asset_place`) VALUES
(1, 'kereta', 'Bagus', 3, 'boleh digunakan', 'padang'),
(2, 'kereta', 'Bagus', 3, 'boleh digunakan', 'padang'),
(3, 'Pembesar Sua', 'Tidak Memuaskan', 5, 'kegunaan pejabat', 'dewan dahlia');

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
  `asset_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(10) NOT NULL,
  `vendor_name` varchar(20) DEFAULT NULL,
  `vendor_address` varchar(40) DEFAULT NULL,
  `vendor_phone` int(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_address`, `vendor_phone`) VALUES
(1, 'syamss', 'perlis', 198765436),
(2, 'pahpus', 'kangar', 187282752);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `asset_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
