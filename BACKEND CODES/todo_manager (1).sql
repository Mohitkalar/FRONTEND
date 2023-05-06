-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 08:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `application_id` int(11) DEFAULT NULL,
  `token_id` int(3) DEFAULT NULL,
  `Doc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecseatinfo`
--

CREATE TABLE `ecseatinfo` (
  `application_id` int(11) NOT NULL,
  `AI` int(3) DEFAULT 150,
  `CS` int(3) DEFAULT 150,
  `EC` int(3) DEFAULT 100,
  `appliedfor` varchar(2) NOT NULL,
  `allotedto` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rrseatinfo`
--

CREATE TABLE `rrseatinfo` (
  `application_id` int(11) DEFAULT NULL,
  `AI` int(3) DEFAULT 200,
  `CS` int(3) DEFAULT 200,
  `EC` int(3) DEFAULT 100,
  `EE` int(3) DEFAULT 50,
  `BT` int(2) DEFAULT 50,
  `appliedfor` varchar(2) NOT NULL,
  `allotedto` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `application_id` int(11) DEFAULT NULL,
  `Pessat_rank` int(4) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `slot` int(1) DEFAULT NULL,
  `timings` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `application_id` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `Pessat_rank` int(4) DEFAULT NULL,
  `Puc_marks` int(3) DEFAULT NULL,
  `Mobile_no` int(10) DEFAULT NULL,
  `DD_no` int(11) DEFAULT NULL,
  `DD_amt` int(11) DEFAULT NULL,
  `Branch` varchar(2) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `appliedfor` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`application_id`, `name`, `Pessat_rank`, `Puc_marks`, `Mobile_no`, `DD_no`, `DD_amt`, `Branch`, `photo`, `appliedfor`) VALUES
(1245, 'Chris Noell', 3000, 70, 2147483647, 1234567, 10000, 'EC', 'uploads/todo-7.jpg', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `application_id` varchar(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`application_id`, `email`, `PASSWORD`) VALUES
('1245', '94627@gmail.com', '123456'),
('567', 'abc@gmail.com', '1234567'),
('90247', 'abcd@gmail.cm', '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecseatinfo`
--
ALTER TABLE `ecseatinfo`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD UNIQUE KEY `Pessat_rank` (`Pessat_rank`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD UNIQUE KEY `Pessat_rank` (`Pessat_rank`),
  ADD UNIQUE KEY `Mobile_no` (`Mobile_no`),
  ADD UNIQUE KEY `DD_no` (`DD_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`application_id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
