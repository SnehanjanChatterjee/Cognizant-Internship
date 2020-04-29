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
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` char(2) NOT NULL,
  `country_name` varchar(40) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `region_id`) VALUES
('01', 'Kenya', 107),
('02', 'Brazil', 201),
('03', 'Japan', 302),
('04', 'Russia', 406),
('05', 'Norway', 504);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(4) NOT NULL,
  `department_name` varchar(30) NOT NULL,
  `manager_id` int(6) DEFAULT NULL,
  `location_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `manager_id`, `location_id`) VALUES
(5000, 'SALES', 856101, 1001),
(6000, 'ACCOUNTING', 856103, 1003),
(7000, 'OPERATIONS', 856103, 1002),
(8000, 'DESIGN', 856102, 1004),
(9000, 'RESEARCH', 856104, 1005);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(6) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `hire_date` date NOT NULL,
  `job_id` varchar(10) NOT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  `commission_pct` decimal(2,2) DEFAULT NULL,
  `manager_id` int(6) DEFAULT NULL,
  `department_id` int(4) DEFAULT NULL
) ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `phone_number`, `hire_date`, `job_id`, `salary`, `commission_pct`, `manager_id`, `department_id`) VALUES
(856101, 'Rahul', 'Shaw', 'rahul.shaw@gmail.com', '7896541230', '2018-09-13', '100', '25000.00', NULL, NULL, 6000),
(856102, 'Anindita', 'Ghosh', 'anindita.ghosh@gmail', '9896215478', '2015-03-24', '101', '58000.00', NULL, 856103, 7000),
(856103, 'Tridib', 'Santra', 'tridib.santra@gmail.', '9574197230', '2008-05-18', '102', '120000.00', NULL, NULL, 5000),
(856104, 'Somdutta', 'Deb', 'somdutta.deb@gmail.c', '8951741230', '2019-08-15', '100', '25000.00', NULL, NULL, 9000),
(856105, 'Soham', 'Samanta', 'soham.samanta@gmail.', '8568951225', '2018-08-12', '100', '25000.00', '0.99', NULL, 8000),
(856106, 'Raj', 'Majumdar', 'raj.majumdar@gmail.c', '8568955685', '2001-05-22', '104', '150000.00', '0.80', NULL, 7000),
(856107, 'Soham', 'Samanta', 'soham.samanta2@gmail', '7868955865', '2005-05-02', '102', '160000.00', '0.78', NULL, 6000),
(856108, 'Abhilash', 'Guha', 'abhilash.guha@gmail.', '7088958025', '2004-08-12', '104', '450000.00', '0.64', NULL, 5000),
(856109, 'Suparna', 'Mukherjee', 'suparna.mukherjee@gm', '8568950421', '2006-07-22', '102', '130000.00', NULL, NULL, 6000),
(856110, 'Sudipta', 'Das', 'sudipta.das@gmail.co', '8568951225', '2002-03-22', '102', '160000.00', NULL, NULL, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` varchar(10) NOT NULL,
  `job_title` varchar(35) NOT NULL,
  `min_salary` int(6) DEFAULT NULL,
  `max_salary` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `min_salary`, `max_salary`) VALUES
('100', 'Developer', 20000, 30000),
('101', 'Senior Developer', 50000, 80000),
('102', 'Team Manager', 100000, 150000),
('103', 'Accountant', 80000, 120000),
('104', 'President', 320000, 520000);

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `employee_id` int(6) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `job_id` varchar(10) NOT NULL,
  `department_id` int(4) DEFAULT NULL
) ;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`employee_id`, `start_date`, `end_date`, `job_id`, `department_id`) VALUES
(856106, '2001-05-22', '2016-06-21', '104', 7000),
(856107, '2005-05-02', '2018-05-22', '102', 6000),
(856108, '2004-08-12', '2017-06-30', '104', 5000),
(856109, '2006-07-22', '2016-03-11', '102', 6000),
(856110, '2002-03-22', '2011-07-31', '102', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(4) NOT NULL,
  `street_address` varchar(40) DEFAULT NULL,
  `postal_code` varchar(12) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state_province` varchar(25) DEFAULT NULL,
  `country_id` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `street_address`, `postal_code`, `city`, `state_province`, `country_id`) VALUES
(1001, '5th Floor NHIF Building Ragati Road', '34670', 'Nairobi', 'Nairobi', '01'),
(1002, '17, R. Greenalgh', '20251-28', 'Catumbi', 'Rio', '02'),
(1003, '3 Chome-4-417 Shirokanedai', '108-0071', 'Kanto', 'Tokyo', '03'),
(1004, 'Presnenskaya Naberezhnaya, 10', '123317', 'Central', 'Moscow', '04'),
(1005, 'Karoline Kristiansens vei 1', '0661', 'Ostlandet', 'Oslo', '05');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`) VALUES
(107, 'Nairobi'),
(201, 'Rio'),
(302, 'Tokyo'),
(406, 'Moscow'),
(504, 'Oslo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `fk_countires_region_id` (`region_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `fk_departments_location_id` (`location_id`),
  ADD KEY `fk_departments_manager_id` (`manager_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_employees_department_id` (`department_id`),
  ADD KEY `fk_employees_job_id` (`job_id`),
  ADD KEY `fk_employees_manager_id` (`manager_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`employee_id`,`start_date`),
  ADD KEY `fk_job_history_department_id` (`department_id`),
  ADD KEY `fk_job_history_job_id` (`job_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `fk_locations_region_id` (`country_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `fk_countires_region_id` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_departments_location_id` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`),
  ADD CONSTRAINT `fk_departments_manager_id` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `fk_employees_job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `fk_employees_manager_id` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `fk_job_history_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `fk_job_history_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `fk_job_history_job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `fk_locations_region_id` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
