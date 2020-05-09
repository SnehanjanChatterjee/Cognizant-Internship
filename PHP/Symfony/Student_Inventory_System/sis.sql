-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 12:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200508193005', '2020-05-08 19:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `name`, `email`, `phone_no`, `dob`, `gender`) VALUES
(1, 'schatterjee', '{\"ROLE_STUDENT\": \"ROLE_STUDENT\"}', '$2y$13$ypUrxepfDLZMISBUHlb5Pe/37n2pnVrBvuCYebwFaaHjMmNHYctZm', 'Snehanjan Chatterjee', 's@gmail.com', 9887635242, '1990-02-02', 'Male'),
(2, 'rghosh', '{\"ROLE_TEACHER\": \"ROLE_TEACHER\"}', '$2y$13$N7OzSHvKbYPLVwg9L2rX1On77qpOajOAqdVBo/5NCO9MD9L/wbiyC', 'Rajarshi Ghosh', 'r@gmail.com', 8798456320, '1980-11-02', 'Male'),
(3, 'rroy', '{\"ROLE_ADMIN\": \"ROLE_ADMIN\"}', '$2y$13$l1q59mTZP4rp3fY7YESoO.BU1YGdQrBCx6SEl.5.538gKAkHCCeGG', 'Rahul Roy', 'roy@gmail.com', 8574963210, '1990-02-22', 'Male'),
(4, 'sdas', '[\"ROLE_TEACHER\"]', '$2y$13$AhCsWY1ByLcOQkcXmdyGB.rwRtPh1GC34fPgBsMnZPgqjcg4Df9lK', 'Soham Das', 's@gmail.com', 8574961579, '1978-08-08', 'Male'),
(5, 'spal', '[\"ROLE_ADMIN\"]', '$2y$13$sY/w3qrNFJmkddZuyXGdJ.h80qPT7p50GAn0UfvFscTDZVaQ7ToCy', 'Sudipta Pal', 's.p@gmail.com', 9876123407, '1995-05-05', 'Male'),
(7, 'sdutta', '[\"ROLE_STUDENT\"]', '$2y$13$9IT5QVx2ts8AszGe3cja5eNu2l4gTZTX2CxovqO66HHcJ8JQo8g3i', 'Sounak Dutta', 's@gmail.com', 9578641238, '1996-05-05', 'Male'),
(8, 'smajumder', '[\"ROLE_ADMIN\"]', '$2y$13$ZHKwLhnp/uLwQmV5estsW.mml/JHZ8oFyEIrsBIAIrtcGhkzlflei', 'Subhrajit Majumder', 'r.m@gmail.com', 9685741236, '1997-12-12', 'Male'),
(9, 'rsharma', '[\"ROLE_ADMIN\"]', '$2y$13$2v8q3WU2R4LTzJgcomM8P.zqvZnE3wAJizaRfQE5sLabFn0OqqMt.', 'Rohit Sharma', 's9dnn@gmail.com', 9182736452, '1982-07-08', 'Male'),
(10, 'ssaha', '[\"ROLE_STUDENT\"]', '$2y$13$D3uOE3arJL3IU5LkiQbene8lfUnv7ZMv17CyPZQFABhgfVeUV0m/i', 'Sagnik Saha', 'ssaha@gmail.com', 8597463210, '1996-12-26', 'Male'),
(11, 'aghosh', '[\"ROLE_STUDENT\"]', '$2y$13$Yc0mUd5VvRGpnxvULURaaes2j20GSAP2zx2E5X8Msbj1.S8SqFMdK', 'Ananya Ghosh', 'aghsoh@gmail.com', 8978456512, '1997-02-02', 'Female'),
(12, 'sgupta', '[\"ROLE_STUDENT\"]', '$2y$13$qnqQyuFjIdky7f.YJuU62uTybDgK9k.LK.y9aiwcnDK6C.hjh9Nry', 'Shraddha Gupta', 'sgupta@gmail.com', 9764318205, '1998-05-12', 'Female'),
(13, 'rsanyal', '[\"ROLE_TEACHER\"]', '$2y$13$rcieir1CbAHTM5HUEIUOIOm5b1c8QiXFvoPtGmYcd0xMBdla0kbXW', 'Riya Sanyal', 'r.s23@gmail.com', 9877563126, '1980-02-02', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
