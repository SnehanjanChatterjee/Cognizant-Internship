-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 08:56 AM
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
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_no`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `class_section`
--

CREATE TABLE `class_section` (
  `class_section_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `class_no` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_section`
--

INSERT INTO `class_section` (`class_section_id`, `class_id`, `class_no`, `section`) VALUES
(1, 1, 1, 'A'),
(2, 1, 1, 'B'),
(3, 1, 1, 'C'),
(4, 2, 2, 'A'),
(5, 2, 2, 'B'),
(6, 2, 2, 'C'),
(7, 2, 2, 'D'),
(8, 3, 3, 'A'),
(9, 3, 3, 'B'),
(10, 3, 3, 'C'),
(11, 4, 4, 'A'),
(12, 4, 4, 'B'),
(13, 5, 5, 'A'),
(14, 5, 5, 'B'),
(15, 5, 5, 'C'),
(16, 5, 5, 'D'),
(17, 5, 5, 'E'),
(18, 6, 6, 'A'),
(19, 6, 6, 'B'),
(20, 7, 7, 'A'),
(21, 7, 7, 'B'),
(22, 7, 7, 'C'),
(23, 7, 7, 'D'),
(24, 8, 8, 'A'),
(25, 8, 8, 'B'),
(26, 8, 8, 'C'),
(27, 9, 9, 'A'),
(28, 9, 9, 'B'),
(29, 9, 9, 'C'),
(30, 9, 9, 'D'),
(31, 10, 10, 'A'),
(32, 10, 10, 'B'),
(33, 10, 10, 'C'),
(34, 10, 10, 'D'),
(35, 10, 10, 'E'),
(36, 11, 11, 'A'),
(37, 11, 11, 'B'),
(38, 11, 11, 'C'),
(39, 12, 12, 'A'),
(40, 12, 12, 'B'),
(41, 12, 12, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(13) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `passwordWithoutEncryption` varchar(100) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `user_role`, `password`, `passwordWithoutEncryption`, `last_login`, `status`) VALUES
(17, 'STU9512357801', 2, 'c5051037e523a3ec06b7', 'Snehanjan@1234', '2020-04-28 21:12:47', 1),
(18, 'STU9285310780', 2, '53444ffff4d3d922ab78', 'Ronit@123', '2020-04-24 21:33:26', 1),
(19, 'STU7859632140', 2, 'ec486349fe9f9b261d7a', '140#Sdas', '2020-04-24 21:08:13', 1),
(20, 'STU7865123490', 2, '50ec197b8258dfe43ee4', 'nil@C123', '2020-04-26 12:06:49', 1),
(21, 'STU9874563218', 2, '34874cee60ebb0210da7', '1234#Dchak', '2020-04-25 11:26:14', 1),
(22, 'STU6589741230', 2, 'ab5ec5fc94488d617522', 'San@4567890', '2020-04-24 21:58:14', 1),
(23, 'STU1236549870', 2, '12dc32456a3bd042ec0e', 'Rg@09887', '2020-04-24 22:14:37', 1),
(24, 'STU9562308406', 2, '968eba10abd06e45d990', 'Sm@12345', '2020-04-25 10:12:44', 1),
(25, 'STU8564321970', 2, 'd1612b86d2563059e990', 'Swe@12345', '2020-04-25 18:14:00', 1),
(30, 'STU7812365490', 2, '4c05cf24e28293e36567', 'omonub@mknubS@1', '2020-04-26 10:33:56', 1),
(32, 'STU3446567686', 2, 'fb06135f37e113b5d577', 'Asw123@fef', '2020-04-26 11:00:45', 1),
(34, 'STU6589086321', 2, '7003af2411505ad7620e', 'A@3sdr343', '2020-04-26 11:16:30', 1),
(35, 'STU4567892345', 2, '4ec7dc3e50bafa0026f5', 'A@s2345t', '2020-04-26 11:45:46', 1),
(36, 'STU8574963210', 2, '683d0c2590d094dc8016', 'S@ol%jnmm2', '2020-04-26 11:58:00', 1),
(37, 'STU8574102096', 2, 'e7ff018b5231214a6048', 'R%hj129ub', '2020-04-26 12:36:31', 1),
(38, 'STU9865742316', 2, '514697e151966c28dd2d', 'A12s@ddwdwd', '2020-04-28 06:19:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_values`
--

CREATE TABLE `user_values` (
  `id` int(11) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `passwordWithoutEncryption` varchar(100) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_values`
--

INSERT INTO `user_values` (`id`, `fname`, `lname`, `email`, `class`, `section`, `address`, `mobile_no`, `password`, `passwordWithoutEncryption`, `image`) VALUES
(34, 'As', 'dqdqd', 'AD@ddQD.NU', '11', 'B', 'SQS', '6589086321', '7003af2411505ad7620e', 'A@3sdr343', NULL),
(32, 'asas', 'saas', 'asas@h.no', '10', 'C', 'qeqe', '3446567686', 'fb06135f37e113b5d577', 'Asw123@fef', NULL),
(21, 'Dipan', 'Chakraborty', 'd.chak23@gmail.com', '1', 'A', 'qqwsazqz', '9874563218', '34874cee60ebb0210da7', '1234#Dchak', NULL),
(20, 'Nilanjan', 'Chatterjee', 'nil.ch@yahoo.com', '11', 'A', 'wwdwdqd', '7865123490', '50ec197b8258dfe43ee4', 'nil@C123', NULL),
(35, 'dqqd', 'dqdqd', 'qdqd@d.co', '9', 'C', 'www', '4567892345', '4ec7dc3e50bafa0026f5', 'A@s2345t', 'Snehanjan.jpg'),
(36, 'Ritabrata', 'Das', 'r.das@yahoo.com', '9', 'A', '36,JP Road', '8574963210', '683d0c2590d094dc8016', 'S@ol%jnmm2', 'ProfilePic.png'),
(23, 'Ranit', 'Garai', 'r.g@gmail.com', '12', 'C', 'qqsqsqsqs', '1236549870', '12dc32456a3bd042ec0e', 'Rg@09887', NULL),
(37, 'Rajarshi', 'Sinha', 'r.sinha@gmail.com', '10', 'A', '90,RtVN,kOL-67', '8574102096', 'e7ff018b5231214a6048', 'R%hj129ub', 'ProfilePic.png'),
(18, 'Ronit', 'Sarkar', 'r123@gmail.com', '10', 'A', 'dwdefws', '2147483647', '53444ffff4d3d922ab78', 'Ronit@123', NULL),
(22, 'Sandipan', 'Das', 's.d.178@gmail.com', '9', 'B', 'srgewt', '2147483647', 'ab5ec5fc94488d617522', 'San@4567890', NULL),
(19, 'Sudipta', 'Das', 's.das@gmail.com', '6', 'B', 'qwwws', '2147483647', 'ec486349fe9f9b261d7a', '140#Sdas', NULL),
(25, 'Snehashis', 'Ghosh', 's.g@gmail.com', '2', 'B', 'qsqs', '8564321970', 'd1612b86d2563059e990', 'Swe@12345', NULL),
(24, 'Sahil', 'Mukherjee', 's.m.123@gmail.com', '3', 'B', 'eqeewew', '9562308406', '968eba10abd06e45d990', 'Sm@12345', NULL),
(38, 'Snehanjan', 'Chatterjee', 's@g.com', '10', 'A', '123,dqddsd', '9865742316', '514697e151966c28dd2d', 'A12s@ddwdwd', 'Snehanjan.jpg'),
(17, 'Snehanjan', 'Chatterjee', 'SC@outlook.com', '8', 'B', '123,M.G Road,Kol-98', '9512357801', 'c5051037e523a3ec06b7', 'Snehanjan@1234', NULL),
(30, 'Snehanjan', 'Chatterjee', 'sn@gmail.com', '10', 'A', '157, S.N.Roy ROAD', '7812365490', '4c05cf24e28293e36567', 'omonub@mknubS@1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_section`
--
ALTER TABLE `class_section`
  ADD PRIMARY KEY (`class_section_id`),
  ADD KEY `fk_class_section` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_values`
--
ALTER TABLE `user_values`
  ADD PRIMARY KEY (`email`,`mobile_no`),
  ADD KEY `fk_user_values_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_section`
--
ALTER TABLE `class_section`
  MODIFY `class_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_section`
--
ALTER TABLE `class_section`
  ADD CONSTRAINT `fk_class_section` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `user_values`
--
ALTER TABLE `user_values`
  ADD CONSTRAINT `fk_user_values_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
