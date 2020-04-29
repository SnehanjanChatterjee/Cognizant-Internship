-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 08:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irctc`
--

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `station_id` int(4) NOT NULL,
  `station_name` char(30) DEFAULT NULL,
  `km` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`station_id`, `station_name`, `km`) VALUES
(100, 'MYSORE', 0),
(101, 'BANGALORE', 150),
(102, 'PUNE', 650),
(103, 'MUMBAI', 700),
(104, 'RAJKOT', 1150),
(105, 'DELHI', 1500),
(106, 'KOLKATA', 0),
(107, 'AHMEDABAD', 150),
(108, 'KOTA', 250),
(109, 'SELAM', 350),
(110, 'CHENNAI', 450),
(111, 'HYDERABAD', 260),
(112, 'KOCHI', 480),
(113, 'VISHAKAPATNAM', 250),
(114, 'RANCHI', 200),
(115, 'BHOPAL', 680);

-- --------------------------------------------------------

--
-- Table structure for table `train_info`
--

CREATE TABLE `train_info` (
  `train_no` int(4) NOT NULL,
  `train_name` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `s_station_id` int(4) DEFAULT NULL,
  `d_station_id` int(4) DEFAULT NULL,
  `distance` int(5) DEFAULT NULL,
  `mon` char(1) DEFAULT NULL,
  `tue` char(1) DEFAULT NULL,
  `wed` char(1) DEFAULT NULL,
  `thu` char(1) DEFAULT NULL,
  `fri` char(1) DEFAULT NULL,
  `sat` char(1) DEFAULT NULL,
  `sun` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_info`
--

INSERT INTO `train_info` (`train_no`, `train_name`, `type`, `s_station_id`, `d_station_id`, `distance`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`) VALUES
(1234, 'UDYAN', 'ORDINARY', 100, 104, 560, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(4321, 'KK', 'EXPRESS', 101, 107, 1500, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(6000, 'CAUVERY', 'EXPRESS', 103, 108, 820, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(6138, 'POORVA', 'EXPRESS', 103, 106, 450, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `train_schedule`
--

CREATE TABLE `train_schedule` (
  `train_no` int(4) DEFAULT NULL,
  `station_id` int(4) DEFAULT NULL,
  `arv_time` varchar(10) DEFAULT NULL,
  `dep_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_schedule`
--

INSERT INTO `train_schedule` (`train_no`, `station_id`, `arv_time`, `dep_time`) VALUES
(1234, 100, '02:10', '02:20'),
(1234, 101, '06:00', '06:10'),
(1234, 102, '23:05', '23:15'),
(1234, 103, '01:15', '01:30'),
(1234, 104, '18:00', '18:30'),
(4321, 101, '02:10', '02:20'),
(4321, 102, '06:00', '06:10'),
(4321, 103, '23:05', '23:15'),
(4321, 104, '01:15', '01:30'),
(4321, 105, '18:00', '18:30'),
(4321, 106, '23:00', '00:00'),
(4321, 107, '2:00', '4:40'),
(6000, 103, '13:05', '13:30'),
(6000, 104, '16:00', '16:05'),
(6000, 105, '17:00', '17:05'),
(6000, 106, '18:05', '18:10'),
(6000, 107, '19:15', '00:00'),
(6000, 108, '1:15', '3:00'),
(6138, 103, '12:05', '14:25'),
(6138, 104, '16:35', '21:15'),
(6138, 105, '2:05', '4:25'),
(6138, 106, '6:00', '9:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `train_info`
--
ALTER TABLE `train_info`
  ADD PRIMARY KEY (`train_no`);

--
-- Indexes for table `train_schedule`
--
ALTER TABLE `train_schedule`
  ADD KEY `train_no` (`train_no`),
  ADD KEY `station_id` (`station_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `train_schedule`
--
ALTER TABLE `train_schedule`
  ADD CONSTRAINT `train_schedule_ibfk_1` FOREIGN KEY (`train_no`) REFERENCES `train_info` (`train_no`),
  ADD CONSTRAINT `train_schedule_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `route` (`station_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
