-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2015 at 07:18 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sss`
--
-- DROP DATABASE `sss`;
CREATE DATABASE IF NOT EXISTS `sss` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sss`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(255) DEFAULT NULL,
  `admin_lname` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `admin` (`admin_fname`, `admin_lname`, `position`, `password`) VALUES
('aileen', 'sabellon', 'something', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
  `applicant_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `dateofbirth` varchar(255) DEFAULT NULL,
  `civilstatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_rel`
--

CREATE TABLE IF NOT EXISTS `appointment_rel` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `req_id` int(11) DEFAULT NULL,
  `appt_time` varchar(255) DEFAULT NULL,
  `appt_venue` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`app_id`),
  KEY `admin_id` (`admin_id`),
  KEY `req_id` (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `benef`
--

CREATE TABLE IF NOT EXISTS `benef` (
  `benef_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `benef_dateofbirth` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`benef_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `benef_rel`
--

CREATE TABLE IF NOT EXISTS `benef_rel` (
  `applicant_id` int(11) DEFAULT NULL,
  `benef_id` int(11) DEFAULT NULL,
  `form_type` varchar(255),
  KEY `applicant_id` (`applicant_id`),
  KEY `benef_id` (`benef_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_table`
--

CREATE TABLE IF NOT EXISTS `form_table` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request_rel`
--

CREATE TABLE IF NOT EXISTS `request_rel` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `req_date` varchar(255) DEFAULT NULL,
  `req_status` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`req_id`),
  KEY `form_id` (`form_id`),
  KEY `applicant_id` (`applicant_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `e1`
--

CREATE TABLE IF NOT EXISTS `e1` (
  `e1_id` int(11) NOT NULL,
  PRIMARY KEY (`e1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nw1`
--

CREATE TABLE IF NOT EXISTS `nw1` (
  `nw1_id` int(11) NOT NULL,
  `wrk_spouse_fullname` varchar(255) DEFAULT NULL,
  `wrk_spouse_ss_no` varchar(255) DEFAULT NULL,
  `nwrk_spouse_monthsalarycredit` varchar(255) DEFAULT NULL,
  `dateapprove` varchar(255) DEFAULT NULL,
  `startpaying_amnt` varchar(255) DEFAULT NULL,
  `startpaying_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nw1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ow1`
--

CREATE TABLE IF NOT EXISTS `ow1` (
  `ow1_id` int(11) NOT NULL,
  `foreign_add` varchar(255) DEFAULT NULL,
  `foreign_postal_code` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `monthly_salary` varchar(255) DEFAULT NULL,
  `mem_applied_for` varchar(255) DEFAULT NULL,
  `monthly_ss_cont` varchar(255) DEFAULT NULL,
  `start_of_payment` varchar(255) DEFAULT NULL,
  `flexifund_application` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ow1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rs1`
--

CREATE TABLE IF NOT EXISTS `rs1` (
  `rs_id` int(11) NOT NULL,
  `residence_telno` varchar(255) DEFAULT NULL,
  `office_telno` varchar(255) DEFAULT NULL,
  `prof_business_code` varchar(255) DEFAULT NULL,
  `year_prof_business_started` varchar(255) DEFAULT NULL,
  `date_coverage` varchar(255) DEFAULT NULL,
  `prev_ss_no` varchar(255) DEFAULT NULL,
  `tax_acc_no` varchar(255) DEFAULT NULL,
  `yearly_net_earnings` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `telno_rel`
--

CREATE TABLE IF NOT EXISTS `telno_rel` (
  `rs1_id` int(11) DEFAULT NULL,
  `telno_id` int(11) DEFAULT NULL,
  KEY `rs1_id` (`rs1_id`),
  KEY `telno_id` (`telno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `telno_table`
--

CREATE TABLE IF NOT EXISTS `telno_table` (
  `telno_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) DEFAULT NULL,
  `telno` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`telno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_rel`
--
ALTER TABLE `appointment_rel`
  ADD CONSTRAINT `appointment_rel_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `appointment_rel_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `request_rel` (`req_id`);

--
-- Constraints for table `benef_rel`
--
ALTER TABLE `benef_rel`
  ADD CONSTRAINT `benef_rel_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`),
  ADD CONSTRAINT `benef_rel_ibfk_2` FOREIGN KEY (`benef_id`) REFERENCES `benef` (`benef_id`);

--
-- Constraints for table `nw1`
--
ALTER TABLE `nw1`
  ADD CONSTRAINT `nw1_ibfk_1` FOREIGN KEY (`nw1_id`) REFERENCES `form_table` (`form_id`);

--
-- Constraints for table `ow1`
--
ALTER TABLE `ow1`
  ADD CONSTRAINT `ow1_ibfk_1` FOREIGN KEY (`ow1_id`) REFERENCES `form_table` (`form_id`);

--
-- Constraints for table `request_rel`
--
ALTER TABLE `request_rel`
  ADD CONSTRAINT `request_rel_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form_table` (`form_id`),
  ADD CONSTRAINT `request_rel_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`),
  ADD CONSTRAINT `request_rel_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `rs1`
--
ALTER TABLE `rs1`
  ADD CONSTRAINT `rs1_ibfk_1` FOREIGN KEY (`rs_id`) REFERENCES `form_table` (`form_id`);

--
-- Constraints for table `e1`
--
ALTER TABLE `e1`
  ADD CONSTRAINT `e1_ibfk_1` FOREIGN KEY (`e1_id`) REFERENCES `form_table` (`form_id`);

--
-- Constraints for table `telno_rel`
--
ALTER TABLE `telno_rel`
  ADD CONSTRAINT `telno_rel_ibfk_1` FOREIGN KEY (`rs1_id`) REFERENCES `rs1` (`rs_id`),
  ADD CONSTRAINT `telno_rel_ibfk_2` FOREIGN KEY (`telno_id`) REFERENCES `telno_table` (`telno_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
