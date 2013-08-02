-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2013 at 07:20 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kb_koshien`
--
CREATE DATABASE IF NOT EXISTS `kb_koshien` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kb_koshien`;

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `bet_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`bet_id`, `bet_date`, `user_id`) VALUES
(1, '2013-07-29', 1),
(2, '2013-07-31', 3),
(3, '2013-07-31', 4),
(4, '2013-07-31', 3),
(5, '2013-07-31', 3),
(6, '2013-08-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bet_details`
--

CREATE TABLE IF NOT EXISTS `bet_details` (
  `bet_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `bet_type` int(11) NOT NULL COMMENT '3 bet type : 1 - final, 2 - semi final , 3 - quarter final',
  `bet_amount` double NOT NULL DEFAULT '0',
  `bet_status` int(11) NOT NULL DEFAULT '3' COMMENT '1 : win - 2 : lose - 3 : waiting',
  PRIMARY KEY (`bet_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `bet_details`
--

INSERT INTO `bet_details` (`bet_detail_id`, `bet_id`, `school_id`, `bet_type`, `bet_amount`, `bet_status`) VALUES
(1, 1, 1, 1, 11, 3),
(2, 1, 1, 1, 11, 3),
(3, 1, 1, 1, 11, 3),
(4, 1, 2, 1, 11, 3),
(5, 1, 1, 1, 11, 3),
(6, 2, 1, 1, 100, 3),
(7, 2, 2, 2, 200, 3),
(8, 2, 3, 1, 300, 3),
(9, 2, 4, 3, 400, 3),
(10, 3, 1, 1, 100, 3),
(11, 3, 2, 2, 200, 3),
(12, 3, 3, 1, 300, 3),
(13, 3, 4, 3, 400, 3),
(14, 4, 1, 1, 100, 3),
(15, 4, 2, 2, 200, 3),
(16, 4, 3, 1, 300, 3),
(17, 4, 4, 3, 400, 3),
(18, 5, 1, 1, 100, 3),
(19, 5, 2, 2, 200, 3),
(20, 5, 3, 1, 300, 3),
(21, 5, 4, 3, 400, 3),
(22, 6, 2, 3, 222, 3),
(23, 6, 3, 3, 333, 3),
(24, 6, 1, 2, 1, 3),
(25, 6, 3, 1, 111, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `map_img_url` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` text,
  `odds` double NOT NULL,
  `school_status` int(11) NOT NULL COMMENT 'status id FK with school_status table',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `logo_url`, `map_img_url`, `video_url`, `description`, `odds`, `school_status`) VALUES
(1, 'Tokyo', 'files/uploads/sportsbet_sportsbet.en.zh_TW.png', 'files/uploads/WP_20130609_012.jpg', '', 'awdawd', 11111, 0),
(2, 'MIT 2', 'files/uploads/sportsbet_sportsbet.en.zh_TW.png', 'files/uploads/WP_20130609_012.jpg', '', 'awdawd', 11111, 0),
(3, 'MIT 3', 'files/uploads/sportsbet_sportsbet.en.zh_TW.png', 'files/uploads/WP_20130609_012.jpg', '', 'awdawd', 11111, 0),
(4, 'Osaka', 'files/uploads/sportsbet_sportsbet.en.zh_TW.png', 'files/uploads/WP_20130609_012.jpg', '', 'awdawd', 11111, 0),
(5, 'MIT', 'files/uploads/sportsbet_sportsbet.en.zh_TW.png', 'files/uploads/WP_20130609_012.jpg', '', 'awdawd', 11111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_status`
--

CREATE TABLE IF NOT EXISTS `school_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `school_status`
--

INSERT INTO `school_status` (`status_id`, `status_name`) VALUES
(1, '1 of 8 schools'),
(2, '1 of 4 schools'),
(3, 'champion'),
(4, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `sns_account` varchar(255) NOT NULL COMMENT 'SNS account of user',
  `sns_type` varchar(10) NOT NULL COMMENT 'SNS account type',
  `balance` double NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sns_account`, `sns_type`, `balance`) VALUES
(1, 'a1provip002', 'facebook', 1000),
(2, 'a1provip003', 'facebook', 1000),
(3, 'a1provip004', 'facebook', 1000),
(4, 'a1provip004', 'facebook', 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
