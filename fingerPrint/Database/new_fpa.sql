-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2014 at 07:28 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alter_class`
--

CREATE TABLE IF NOT EXISTS `alter_class` (
  `course_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `time1_start` time NOT NULL DEFAULT '00:00:00',
  `time1_end` time NOT NULL DEFAULT '00:00:00',
  `time2_start` time NOT NULL,
  `time2_end` time NOT NULL,
  `type` varchar(1) NOT NULL,
  `count` int(11) NOT NULL,
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alter_class`
--

INSERT INTO `alter_class` (`course_id`, `date`, `day`, `time1_start`, `time1_end`, `time2_start`, `time2_end`, `type`, `count`) VALUES
('CSAD', '2014-01-28', 'Monday', '13:00:00', '17:00:00', '00:00:00', '00:00:00', 'C', 1),
('CSAD', '2014-01-26', 'Sunday', '11:00:00', '12:00:00', '00:00:00', '00:00:00', 'E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `userid` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`userid`, `timestamp`) VALUES
('ca1', '2014-01-22 12:51:31'),
('ca1', '2014-01-23 04:27:14'),
('ca2', '2014-01-23 04:29:15'),
('ca3', '2014-01-23 04:35:34'),
('ca4', '2014-01-23 04:42:25'),
('ca5', '2014-01-23 04:44:00'),
('ca6', '2014-01-23 04:46:00'),
('ca7', '2014-01-23 04:47:34'),
('ca8', '2014-01-23 04:49:30'),
('ca9', '2014-01-23 04:53:17'),
('ca10', '2014-01-23 04:55:03'),
('ca11', '2014-01-23 05:11:46'),
('ca12', '2014-01-23 05:12:58'),
('ca13', '2014-01-23 05:14:29'),
('ca14', '2014-01-23 05:15:52'),
('ca15', '2014-01-23 05:18:10'),
('ca16', '2014-01-23 05:23:14'),
('ca17', '2014-01-23 05:27:30'),
('ca18', '2014-01-23 07:31:42'),
('ca13', '2014-01-23 07:43:28'),
('ca14', '2014-01-23 07:43:41'),
('ca16', '2014-01-23 07:43:54'),
('ca17', '2014-01-23 07:44:16'),
('ca10', '2014-01-23 07:44:27'),
('ca12', '2014-01-23 07:56:30'),
('ca5', '2014-01-23 07:56:44'),
('ca11', '2014-01-23 07:56:59'),
('ca3', '2014-01-23 08:00:22'),
('ca1', '2014-01-23 08:00:58'),
('ca6', '2014-01-23 08:07:39'),
('ca9', '2014-01-23 08:08:03'),
('ca4', '2014-01-23 08:09:21'),
('ca7', '2014-01-23 08:10:24'),
('ca8', '2014-01-23 08:11:51'),
('ca2', '2014-01-23 08:15:47'),
('ca1', '2014-01-23 12:08:32'),
('ca2', '2014-01-24 03:42:55'),
('ca7', '2014-01-24 03:44:24'),
('ca12', '2014-01-24 03:44:39'),
('ca3', '2014-01-24 03:45:08'),
('ca16', '2014-01-24 03:45:34'),
('ca9', '2014-01-24 03:45:46'),
('ca14', '2014-01-24 03:48:38'),
('ca13', '2014-01-24 03:48:50'),
('ca11', '2014-01-24 03:54:52'),
('ca6', '2014-01-24 03:59:22'),
('ca5', '2014-01-24 03:59:38'),
('ca4', '2014-01-24 03:59:48'),
('ca8', '2014-01-24 04:01:07'),
('ca20', '2014-01-24 04:30:14'),
('ca1', '2014-01-24 04:30:25'),
('ca17', '2014-01-24 05:19:54'),
('ca10', '2014-01-24 05:59:13'),
('ca1', '2014-01-24 06:49:56'),
('ca10', '2014-01-24 07:11:49'),
('ca17', '2014-01-24 07:30:12'),
('ca13', '2014-01-24 07:48:09'),
('ca16', '2014-01-24 07:48:20'),
('ca11', '2014-01-24 07:48:28'),
('ca14', '2014-01-24 07:48:39'),
('ca5', '2014-01-24 07:49:17'),
('ca12', '2014-01-24 07:49:25'),
('ca3', '2014-01-24 07:50:57'),
('ca20', '2014-01-24 07:51:08'),
('ca1', '2014-01-24 07:53:37'),
('ca8', '2014-01-24 08:05:34'),
('ca9', '2014-01-24 08:05:45'),
('ca6', '2014-01-24 08:05:52'),
('ca4', '2014-01-24 08:05:58'),
('ca7', '2014-01-24 08:06:32'),
('ca2', '2014-01-24 08:40:17'),
('ca20', '2014-01-24 08:43:12'),
('ca3', '2014-01-24 08:43:20'),
('ca10', '2014-01-24 09:23:39'),
('ca13', '2014-01-27 03:02:42'),
('ca6', '2014-01-27 03:19:57'),
('ca14', '2014-01-27 03:21:55'),
('ca11', '2014-01-27 03:22:05'),
('ca4', '2014-01-27 03:30:29'),
('ca12', '2014-01-27 03:30:44'),
('ca8', '2014-01-27 03:31:03'),
('ca10', '2014-01-27 03:31:16'),
('ca2', '2014-01-27 03:32:48'),
('ca16', '2014-01-27 03:33:59'),
('ca18', '2014-01-27 03:36:43'),
('ca9', '2014-01-27 03:37:39'),
('ca3', '2014-01-27 03:54:14'),
('ca20', '2014-01-27 04:04:43'),
('ca17', '2014-01-27 06:11:03'),
('ca17', '2014-01-27 07:39:42'),
('ca10', '2014-01-27 07:39:49'),
('ca12', '2014-01-27 07:40:18'),
('ca3', '2014-01-27 07:40:50'),
('ca5', '2014-01-27 07:41:35'),
('ca13', '2014-01-27 07:43:55'),
('ca14', '2014-01-27 07:44:18'),
('ca16', '2014-01-27 07:44:26'),
('ca4', '2014-01-27 07:49:42'),
('ca6', '2014-01-27 07:49:51'),
('ca9', '2014-01-27 07:50:00'),
('ca8', '2014-01-27 07:50:09'),
('ca18', '2014-01-27 07:53:36'),
('ca11', '2014-01-27 07:53:45'),
('ca20', '2014-01-27 08:04:17'),
('ca2', '2014-01-27 08:05:30'),
('ca13', '2014-01-28 03:14:29'),
('ca6', '2014-01-28 03:22:12'),
('ca14', '2014-01-28 03:22:25'),
('ca11', '2014-01-28 03:23:03'),
('ca18', '2014-01-28 03:23:28'),
('ca10', '2014-01-28 03:33:00'),
('ca4', '2014-01-28 03:33:10'),
('ca5', '2014-01-28 03:33:19'),
('ca12', '2014-01-28 03:35:12'),
('ca2', '2014-01-28 03:35:43'),
('ca16', '2014-01-28 03:36:44'),
('ca9', '2014-01-28 03:41:12'),
('ca3', '2014-01-28 03:46:11'),
('ca7', '2014-01-28 03:47:00'),
('ca20', '2014-01-28 04:04:01'),
('ca1', '2014-01-28 04:44:29'),
('ca17', '2014-01-28 05:01:39'),
('ca3', '2014-01-28 07:33:09'),
('ca1', '2014-01-28 07:33:21'),
('ca2', '2014-01-28 07:38:27'),
('ca16', '2014-01-28 07:40:02'),
('ca5', '2014-01-28 07:40:13'),
('ca12', '2014-01-28 07:40:49'),
('ca11', '2014-01-28 07:41:04'),
('ca13', '2014-01-28 07:41:13'),
('ca18', '2014-01-28 07:41:23'),
('ca14', '2014-01-28 07:41:35'),
('ca9', '2014-01-28 08:00:16'),
('ca6', '2014-01-28 08:00:28'),
('ca7', '2014-01-28 08:00:38'),
('ca4', '2014-01-28 08:00:51'),
('ca8', '2014-01-28 08:01:04'),
('ca10', '2014-01-28 10:09:52'),
('ca17', '2014-01-28 11:27:48'),
('ca13', '2014-01-29 03:11:17'),
('ca11', '2014-01-29 03:21:37'),
('ca6', '2014-01-29 03:22:01'),
('ca14', '2014-01-29 03:22:10'),
('ca10', '2014-01-29 03:24:14'),
('ca8', '2014-01-29 03:29:43'),
('ca12', '2014-01-29 03:32:48'),
('ca5', '2014-01-29 03:35:14'),
('ca16', '2014-01-29 03:43:03'),
('ca18', '2014-01-29 03:46:35'),
('ca3', '2014-01-29 03:46:48'),
('ca4', '2014-01-29 04:00:20'),
('ca2', '2014-01-29 04:00:29'),
('ca20', '2014-01-29 04:03:16'),
('ca1', '2014-01-29 04:29:31'),
('ca17', '2014-01-29 05:31:07'),
('ca16', '2014-01-29 07:50:16'),
('ca14', '2014-01-29 07:50:24'),
('ca13', '2014-01-29 07:50:34'),
('ca12', '2014-01-29 07:50:47'),
('ca5', '2014-01-29 07:50:56'),
('ca18', '2014-01-29 07:53:05'),
('ca11', '2014-01-29 07:53:12'),
('ca6', '2014-01-29 08:02:28'),
('ca4', '2014-01-29 08:02:35'),
('ca8', '2014-01-29 08:02:46'),
('ca3', '2014-01-29 08:03:15'),
('ca20', '2014-01-29 08:30:20'),
('ca1', '2014-01-29 08:36:44'),
('ca2', '2014-01-29 08:38:18'),
('ca17', '2014-01-29 11:41:49'),
('ca14', '2014-01-30 03:23:27'),
('ca13', '2014-01-30 03:23:37'),
('ca10', '2014-01-30 03:23:52'),
('ca12', '2014-01-30 03:32:59'),
('ca9', '2014-01-30 03:35:24'),
('ca2', '2014-01-30 03:37:18'),
('ca5', '2014-01-30 03:38:32'),
('ca7', '2014-01-30 03:39:58'),
('ca20', '2014-01-30 03:48:08'),
('ca16', '2014-01-30 03:54:11'),
('ca3', '2014-01-30 03:56:44'),
('ca1', '2014-01-30 04:28:01'),
('ca11', '2014-01-30 04:49:04'),
('ca18', '2014-01-30 04:49:14'),
('ca17', '2014-01-30 05:36:14'),
('ca14', '2014-01-30 07:47:39'),
('ca13', '2014-01-30 07:47:54'),
('ca2', '2014-01-30 07:48:13'),
('ca3', '2014-01-30 07:53:51'),
('ca1', '2014-01-30 07:53:59'),
('ca5', '2014-01-30 07:56:26'),
('ca12', '2014-01-30 07:57:06'),
('ca11', '2014-01-30 07:57:33'),
('ca18', '2014-01-30 07:57:42'),
('ca9', '2014-01-30 07:57:50'),
('ca7', '2014-01-30 07:58:00'),
('ca16', '2014-01-30 08:03:55'),
('ca10', '2014-01-30 08:04:01'),
('ca4', '2014-01-30 08:20:58'),
('ca8', '2014-01-30 08:21:19'),
('ca6', '2014-01-30 08:21:45'),
('ca20', '2014-01-30 08:54:36'),
('ca17', '2014-01-30 09:36:05'),
('ca10', '2014-01-31 02:57:29'),
('ca13', '2014-01-31 03:10:42'),
('ca6', '2014-01-31 03:14:30'),
('ca11', '2014-01-31 03:22:35'),
('ca14', '2014-01-31 03:22:46'),
('ca3', '2014-01-31 03:28:36'),
('ca8', '2014-01-31 03:29:55'),
('ca5', '2014-01-31 03:32:55'),
('ca4', '2014-01-31 03:34:41'),
('ca12', '2014-01-31 03:34:49'),
('ca2', '2014-01-31 03:35:26'),
('ca7', '2014-01-31 03:35:45'),
('ca9', '2014-01-31 03:36:00'),
('ca20', '2014-01-31 03:44:03'),
('ca16', '2014-01-31 03:53:31'),
('ca1', '2014-01-31 05:05:56'),
('ca17', '2014-01-31 05:07:15'),
('ca17', '2014-01-31 05:07:24'),
('ca2', '2014-01-31 05:18:04'),
('ca20', '2014-01-31 05:37:09'),
('ca3', '2014-01-31 05:37:38'),
('ca10', '2014-01-31 07:29:52'),
('ca17', '2014-01-31 07:30:16'),
('ca3', '2014-01-31 07:39:06'),
('ca20', '2014-01-31 07:42:47'),
('ca2', '2014-01-31 07:43:05'),
('ca14', '2014-01-31 07:45:43'),
('ca16', '2014-01-31 07:45:51'),
('ca13', '2014-01-31 07:46:21'),
('ca1', '2014-01-31 07:46:32'),
('ca12', '2014-01-31 07:54:09'),
('ca5', '2014-01-31 07:54:16'),
('ca11', '2014-01-31 07:54:28'),
('ca6', '2014-01-31 08:04:53'),
('ca8', '2014-01-31 08:05:06'),
('ca4', '2014-01-31 08:05:46'),
('ca7', '2014-01-31 08:06:27'),
('ca9', '2014-01-31 08:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`count`) VALUES
(70);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE IF NOT EXISTS `course_details` (
  `course_name` varchar(30) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `id_no` varchar(15) NOT NULL,
  `starting_date` date NOT NULL,
  `finishing_date` date NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `id_no` (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_name`, `course_id`, `id_no`, `starting_date`, `finishing_date`) VALUES
('AdStAttd', 'CSAD', 'faculty', '2014-01-23', '2014-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `course_schedule`
--

CREATE TABLE IF NOT EXISTS `course_schedule` (
  `course_id` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time1_start` time NOT NULL,
  `time1_end` time NOT NULL,
  `time2_start` time NOT NULL,
  `time2_end` time NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`day`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_schedule`
--

INSERT INTO `course_schedule` (`course_id`, `day`, `time1_start`, `time1_end`, `time2_start`, `time2_end`, `count`) VALUES
('CSAD', 'Friday', '08:30:00', '12:30:00', '13:00:00', '17:00:00', 2),
('CSAD', 'Monday', '08:30:00', '12:30:00', '13:00:00', '17:00:00', 2),
('CSAD', 'Saturday', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0),
('CSAD', 'Sunday', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0),
('CSAD', 'Thursday', '08:30:00', '12:30:00', '13:00:00', '17:00:00', 2),
('CSAD', 'Tuesday', '08:30:00', '12:30:00', '13:00:00', '17:00:00', 2),
('CSAD', 'Wednesday', '08:30:00', '12:30:00', '13:00:00', '17:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_details`
--

CREATE TABLE IF NOT EXISTS `enrolled_details` (
  `id_no` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id_no`,`course_id`),
  KEY `course_id` (`course_id`),
  KEY `id_no` (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_details`
--

INSERT INTO `enrolled_details` (`id_no`, `course_id`) VALUES
('ca1', 'CSAD'),
('ca10', 'CSAD'),
('ca11', 'CSAD'),
('ca12', 'CSAD'),
('ca13', 'CSAD'),
('ca14', 'CSAD'),
('ca16', 'CSAD'),
('ca17', 'CSAD'),
('ca18', 'CSAD'),
('ca2', 'CSAD'),
('ca3', 'CSAD'),
('ca4', 'CSAD'),
('ca5', 'CSAD'),
('ca6', 'CSAD'),
('ca7', 'CSAD'),
('ca8', 'CSAD'),
('ca9', 'CSAD');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` varchar(15) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `password`) VALUES
('faculty', 'faculty'),
('fac', 'fac');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`date`) VALUES
('2014-01-13'),
('2014-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE IF NOT EXISTS `registered` (
  `serial_no` int(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_no` varchar(15) NOT NULL COMMENT 'emp_id / roll_no',
  `phone_no` int(15) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id_no`),
  UNIQUE KEY `serial_no` (`serial_no`),
  KEY `id_no` (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`serial_no`, `name`, `id_no`, `phone_no`, `email_id`) VALUES
(22, 'B', 'ca1', 456, 'a@gmail.com'),
(12, 'C', 'ca10', 789, 'a@gmail.com'),
(13, 'D', 'ca11', 147, 'a@gmail.com'),
(14, 'E', 'ca12', 258, 'a@gmail.com'),
(15, 'F', 'ca13', 369, 'a@gmail.com'),
(16, 'G', 'ca14', 741, 'a@gmail.com'),
(18, 'H', 'ca16', 852, 'a@gmail.com'),
(19, 'I', 'ca17', 963, 'a@gmail.com'),
(20, 'J', 'ca18', 321, 'a@gmail.com'),
(4, 'K', 'ca2', 654, 'a@gmail.com'),
(23, 'L', 'ca20', 987, 'a@gmail.com'),
(5, 'M', 'ca3', 785480, 'a@gmail.com'),
(6, 'N', 'ca4', 98568, 'a@gmail.com'),
(7, 'O', 'ca5', 745875623, 'a@gmail.com'),
(8, 'P', 'ca6', 1582345, 'a@gmail.com'),
(9, 'Q', 'ca7', 75846982, 'a@gmail.com'),
(10, 'R', 'ca8', 32165230, 'a@gmail.com'),
(11, 'S', 'ca9', 264875, 'a@gmail.com'),
(69, 'fac', 'fac', 7854682, 'a@gmail.com'),
(68, 'faculty', 'faculty', 5207856, 'a@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alter_class`
--
ALTER TABLE `alter_class`
  ADD CONSTRAINT `alter_class_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`course_id`);

--
-- Constraints for table `course_details`
--
ALTER TABLE `course_details`
  ADD CONSTRAINT `course_details_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `registered` (`id_no`);

--
-- Constraints for table `course_schedule`
--
ALTER TABLE `course_schedule`
  ADD CONSTRAINT `course_schedule_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_details`
--
ALTER TABLE `enrolled_details`
  ADD CONSTRAINT `enrolled_details_ibfk_3` FOREIGN KEY (`id_no`) REFERENCES `registered` (`id_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_details_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
