-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2013 at 12:45 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `bet_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`bet_id`, `bet_date`, `user_id`) VALUES
(1, '2013-07-29', 1),
(2, '2013-07-31', 3),
(3, '2013-07-31', 4),
(4, '2013-07-31', 3),
(5, '2013-07-31', 3),
(6, '2013-08-01', 3),
(7, '2013-08-05', 3),
(8, '2013-08-05', 3),
(9, '2013-08-05', 3),
(10, '2013-08-05', 3),
(11, '2013-08-05', 3),
(12, '2013-08-05', 3),
(13, '2013-08-05', 3),
(14, '2013-08-05', 5),
(15, '2013-08-05', 5),
(16, '2013-08-05', 5),
(17, '2013-08-05', 5),
(18, '2013-08-05', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

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
(25, 6, 3, 1, 111, 3),
(26, 7, 1, 3, 100, 3),
(27, 7, 2, 3, 100, 3),
(28, 7, 3, 3, 100, 3),
(29, 7, 1, 2, 10, 3),
(30, 7, 2, 2, 10, 3),
(31, 7, 1, 1, 1000, 3),
(32, 8, 1, 3, 100, 3),
(33, 8, 1, 2, 100, 3),
(34, 8, 1, 1, 100, 3),
(35, 9, 6, 3, 100, 3),
(36, 12, 2, 3, 100, 3),
(37, 12, 2, 2, 10, 3),
(38, 12, 2, 1, 100, 3),
(39, 13, 2, 3, 100, 3),
(40, 13, 2, 2, 10, 3),
(41, 13, 2, 1, 100, 3),
(42, 14, 2, 3, 10, 3),
(43, 14, 3, 3, 10, 3),
(44, 14, 4, 3, 10, 3),
(45, 14, 3, 2, 10, 3),
(46, 14, 4, 2, 10, 3),
(47, 14, 4, 1, 100, 3),
(48, 15, 1, 3, 200, 3),
(49, 15, 2, 3, 100, 3),
(50, 15, 3, 3, 100, 3),
(51, 15, 4, 3, 300, 3),
(52, 16, 2, 3, 100, 3),
(53, 17, 1, 3, 10, 3),
(54, 18, 3, 3, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `map_img_url` varchar(255) NOT NULL,
  `background_url` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` text,
  `odds` double NOT NULL,
  `school_status` int(11) NOT NULL COMMENT 'status id FK with school_status table',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `logo_url`, `map_img_url`, `background_url`, `address`, `video_url`, `description`, `odds`, `school_status`) VALUES
(1, 'Meiden', 'uploads/1.png', 'uploads/ramen_map_2.gif', 'uploads/back_2.png', 'Sapporo, Hokkaido', 'i9YXVTW_QwQ', 'Sapporo, Hokkaido', 0.5, 0),
(2, 'Akisho', 'uploads/2.png', 'uploads/ramen_map_2.gif', 'uploads/back_1.png', 'Sapporo, Hokkaido', 'i9YXVTW_QwQ', 'Sapporo, Hokkaido', 0.5, 0),
(3, '3', 'uploads/3.png', 'uploads/ramen_map_2.gif', 'uploads/back_5.png', 'Sapporo, Hokkaido', 'i9YXVTW_QwQ', 'Sapporo, Hokkaido', 0.5, 0),
(4, 'Seibi', 'uploads/4.png', 'uploads/ramen_map_2.gif', 'uploads/back_4.png', 'Sapporo, Hokkaido', 'i9YXVTW_QwQ', 'Sapporo, Hokkaido', 0.5, 0),
(5, 'FUKUSHO', 'uploads/5.png', 'uploads/ramen_map_2.gif', 'uploads/back_5.png', 'Sapporo, Hokkaido', 'i9YXVTW_QwQ', 'Sapporo, Hokkaido', 0.5, 0),
(6, '6', 'uploads/6.png', 'uploads/ramen_map_2.gif', 'uploads/back_3.png', 'Sapporo, Hokkaido', 'i9YXVTW_QwQ', 'Sapporo, Hokkaido', 0.5, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sns_account`, `sns_type`, `balance`) VALUES
(1, 'a1provip002', 'facebook', 1000),
(2, 'a1provip003', 'facebook', 1000),
(3, 'a1provip004', 'facebook', 1000),
(4, 'a1provip004', 'facebook', 1000),
(5, 'a1provip002@gmail.com', 'facebook', 280);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
