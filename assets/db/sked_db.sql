-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2015 at 08:46 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sked_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_user_tbl` (
  `user_id` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL DEFAULT '',
  `l_name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_user_tbl`
--

CREATE TABLE IF NOT EXISTS `business_user_tbl` (
  `user_id` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE IF NOT EXISTS `event_tbl` (
  `event_id` int(255) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follows_rel`
--

CREATE TABLE IF NOT EXISTS `follows_rel` (
  `normal_user_id` varchar(255) NOT NULL,
  `other_user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`normal_user_id`,`other_user_id`),
  KEY `other_user_id` (`other_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_rel`
--

CREATE TABLE IF NOT EXISTS `friend_rel` (
  `friend_one` varchar(255) NOT NULL,
  `friend_two` varchar(255) NOT NULL,
  `status` enum('pending','confirmed','sent') NOT NULL DEFAULT 'pending',
  KEY `friend_one` (`friend_one`),
  KEY `friend_two` (`friend_two`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_has_event_rel`
--

CREATE TABLE IF NOT EXISTS `group_has_event_rel` (
  `group_id` int(255) NOT NULL,
  `event_id` int(255) NOT NULL,
  PRIMARY KEY (`group_id`,`event_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_member_rel`
--

CREATE TABLE IF NOT EXISTS `group_member_rel` (
  `user_id` varchar(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE IF NOT EXISTS `group_tbl` (
  `group_id` int(255) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_description` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_user_tbl`
--

CREATE TABLE IF NOT EXISTS `main_user_tbl` (
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `normal_user_tbl`
--

CREATE TABLE IF NOT EXISTS `normal_user_tbl` (
  `user_id` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL DEFAULT '',
  `l_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `other_user_tbl`
--

CREATE TABLE IF NOT EXISTS `other_user_tbl` (
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `forget_pass_tbl`
--

CREATE TABLE IF NOT EXISTS `forget_pass_tbl` (
  `user_id` varchar(255) NOT NULL,
  `authToken` varchar(255) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_event_rel`
--

CREATE TABLE IF NOT EXISTS `user_has_event_rel` (
  `user_id` varchar(255) NOT NULL,
  `event_id` int(255) NOT NULL,
  PRIMARY KEY (`user_id`,`event_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_user_tbl`
--
ALTER TABLE `admin_user_tbl`
  ADD CONSTRAINT `admin_user_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `main_user_tbl` (`user_id`);

--
-- Constraints for table `business_user_tbl`
--
ALTER TABLE `business_user_tbl`
  ADD CONSTRAINT `business_user_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `main_user_tbl` (`user_id`);

--
-- Constraints for table `follows_rel`
--
ALTER TABLE `follows_rel`
  ADD CONSTRAINT `follows_rel_ibfk_1` FOREIGN KEY (`normal_user_id`) REFERENCES `normal_user_tbl` (`user_id`),
  ADD CONSTRAINT `follows_rel_ibfk_2` FOREIGN KEY (`other_user_id`) REFERENCES `other_user_tbl` (`user_id`);

--
-- Constraints for table `friend_rel`
--
ALTER TABLE `friend_rel`
  ADD CONSTRAINT `friend_rel_ibfk_1` FOREIGN KEY (`friend_one`) REFERENCES `normal_user_tbl` (`user_id`),
  ADD CONSTRAINT `friend_rel_ibfk_2` FOREIGN KEY (`friend_two`) REFERENCES `normal_user_tbl` (`user_id`);

--
-- Constraints for table `group_has_event_rel`
--
ALTER TABLE `group_has_event_rel`
  ADD CONSTRAINT `group_has_event_rel_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_tbl` (`group_id`),
  ADD CONSTRAINT `group_has_event_rel_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event_tbl` (`event_id`);

--
-- Constraints for table `group_member_rel`
--
ALTER TABLE `group_member_rel`
  ADD CONSTRAINT `group_member_rel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `normal_user_tbl` (`user_id`),
  ADD CONSTRAINT `group_member_rel_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group_tbl` (`group_id`);

--
-- Constraints for table `normal_user_tbl`
--
ALTER TABLE `normal_user_tbl`
  ADD CONSTRAINT `normal_user_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `main_user_tbl` (`user_id`);

--
-- Constraints for table `other_user_tbl`
--
ALTER TABLE `other_user_tbl`
  ADD CONSTRAINT `other_user_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `main_user_tbl` (`user_id`);

--
-- Constraints for table `user_has_event_rel`
--
ALTER TABLE `user_has_event_rel`
  ADD CONSTRAINT `user_has_event_rel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `main_user_tbl` (`user_id`),
  ADD CONSTRAINT `user_has_event_rel_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event_tbl` (`event_id`);

--
-- Constraints for table `forget_pass_tbl`
--
ALTER TABLE `forget_pass_tbl`
  ADD CONSTRAINT `forget_pass_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `main_user_tbl` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
