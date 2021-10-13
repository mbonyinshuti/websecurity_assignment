-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 10:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partnership`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `no` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `creator` int(15) NOT NULL,
  `description` varchar(500) NOT NULL,
  `group_id` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `no` int(11) NOT NULL,
  `notification` varchar(5000) NOT NULL,
  `receiver` varchar(24) NOT NULL,
  `date` datetime(6) NOT NULL,
  `sender` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `group_id` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `username` varchar(13) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_org`
--

CREATE TABLE `user_org` (
  `Date` datetime NOT NULL,
  `User_id` int(15) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_org`
--

INSERT INTO `user_org` (`Date`, `User_id`, `First_name`, `Last_name`, `Email`, `Password`) VALUES
('2021-07-08 15:25:50', 26937, 'salomon', 'tangamahoro', 'mcallaway@gmail.com', 'kiki'),
('2021-07-08 15:24:56', 81593, 'salomon', 'bizimana', 'rynbizimana@gmail.com', 'kiki'),
('2021-07-08 15:13:45', 26238, 'salomon', 'bizimana', 'rynsalomon@gmail.com', 'kiki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `group_name` (`group_name`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`no`),
  ADD KEY `group_id_2` (`group_id`);

--
-- Indexes for table `user_org`
--
ALTER TABLE `user_org`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `User_id` (`User_id`),
  ADD UNIQUE KEY `Date` (`Date`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user_org` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
