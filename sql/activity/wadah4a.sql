-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 11:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `radio` int(11) NOT NULL,
  `radio1` int(11) NOT NULL,
  `radio2` int(11) NOT NULL,
  `radio3` int(11) NOT NULL,
  `radio4` int(11) NOT NULL,
  `radio5` int(11) NOT NULL,
  `radio6` int(11) NOT NULL,
  `radio7` int(11) NOT NULL,
  `radio8` int(11) NOT NULL,
  `radio9` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public`
--

CREATE TABLE `public` (
  `public_id` varchar(20) NOT NULL,
  `public_name` varchar(500) NOT NULL,
  `public_add` varchar(500) NOT NULL,
  `public_phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public`
--

INSERT INTO `public` (`public_id`, `public_name`, `public_add`, `public_phone`) VALUES
('343', '43453', '43', 435);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`public_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
