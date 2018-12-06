-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 02:47 PM
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
-- Table structure for table `act_activity`
--

CREATE TABLE IF NOT EXISTS `act_activity` (
  `act_date` date NOT NULL,
  `act_description` varchar(500) NOT NULL,
  `act_topic` varchar(500) NOT NULL,
  `act_venue` varchar(500) NOT NULL,
  `act_time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `act_member`
--

CREATE TABLE IF NOT EXISTS `act_member` (
  `member_id` varchar(20) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_add` varchar(200) NOT NULL,
  `member_phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `act_naqib`
--

CREATE TABLE IF NOT EXISTS `act_naqib` (
  `naqib_id` varchar(20) NOT NULL,
  `naqib_name` varchar(100) NOT NULL,
  `naqib_phone` int(20) NOT NULL,
  `naqib_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `act_public`
--

CREATE TABLE IF NOT EXISTS `act_public` (
  `public_id` varchar(30) NOT NULL,
  `public_name` varchar(100) NOT NULL,
  `public_add` varchar(200) NOT NULL,
  `public_phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `act_speak`
--

CREATE TABLE IF NOT EXISTS `act_speak` (
  `speak_id` varchar(20) NOT NULL,
  `speak_name` varchar(100) NOT NULL,
  `speak_position` varchar(100) NOT NULL,
  `speak_phone` int(20) NOT NULL,
  `speak_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `act_type`
--

CREATE TABLE IF NOT EXISTS `act_type` (
  `tamrin` varchar(200) NOT NULL,
  `muktamar` varchar(200) NOT NULL,
  `rehlah` varchar(200) NOT NULL,
  `usrah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `act_member`
--
ALTER TABLE `act_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `act_naqib`
--
ALTER TABLE `act_naqib`
  ADD PRIMARY KEY (`naqib_id`);

--
-- Indexes for table `act_public`
--
ALTER TABLE `act_public`
  ADD PRIMARY KEY (`public_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
