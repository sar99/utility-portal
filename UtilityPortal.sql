-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2021 at 04:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MinorProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `forFemaleHostel` tinyint(1) NOT NULL,
  `hostel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `pass`, `forFemaleHostel`, `hostel`) VALUES
(1, 'e19d5cd5af0378da05f63f891c7467af', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `helpBy` varchar(100) NOT NULL,
  `isfemale` tinyint(1) NOT NULL,
  `hostel` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `compStatus` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `title`, `description`, `helpBy`, `isfemale`, `hostel`, `room`, `compStatus`, `date`) VALUES
(11, 'Broken Latch', 'The latch of my room door is broken', 'carpenter', 1, 1, 269, 1, '2021-11-22'),
(12, 'Leaking Tap', 'The tap in the bathroom near my room is leaking', 'plumber', 1, 1, 269, 0, '2021-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `id` int(11) NOT NULL,
  `isfemale` tinyint(1) NOT NULL,
  `hostel` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `leaveFrom` date NOT NULL,
  `leaveTill` date NOT NULL,
  `passStatus` int(11) NOT NULL,
  `dateFiled` date NOT NULL,
  `address` varchar(1000) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gatepass`
--

INSERT INTO `gatepass` (`id`, `isfemale`, `hostel`, `room`, `leaveFrom`, `leaveTill`, `passStatus`, `dateFiled`, `address`, `number`) VALUES
(7, 1, 1, 269, '2021-11-21', '2021-11-24', 3, '2021-11-22', 'Delhi', 1234567890),
(8, 1, 1, 269, '2021-11-24', '2021-11-27', -1, '2021-11-22', 'Varanasi', 1234567890),
(9, 1, 1, 269, '2021-11-27', '2021-12-07', -2, '2021-11-22', 'Varanasi', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `pass`) VALUES
('1', 'e19d5cd5af0378da05f63f891c7467af');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `yr` int(11) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `roll` int(11) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `isfemale` tinyint(1) NOT NULL,
  `hostel` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `foodrate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `yr`, `batch`, `roll`, `pass`, `isfemale`, `hostel`, `room`, `foodrate`) VALUES
(1, 2018, 'BCS', 48, 'e19d5cd5af0378da05f63f891c7467af', 1, 1, 269, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gatepass`
--
ALTER TABLE `gatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
