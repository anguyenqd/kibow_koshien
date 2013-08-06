-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2013 at 05:01 AM
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
  `odds_top8` double NOT NULL,
  `odds_top4` double NOT NULL DEFAULT '0',
  `odds_top1` double NOT NULL DEFAULT '0',
  `school_status` int(11) NOT NULL COMMENT 'status id FK with school_status table',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `logo_url`, `map_img_url`, `background_url`, `address`, `video_url`, `description`, `odds_top8`, `odds_top4`, `odds_top1`, `school_status`) VALUES
(1, 'Obihiro Ohtani', 'uploads/Obihiro Ohtani.png', 'uploads/North Hokkaido(2).png', 'uploads/backblue.png', 'North Hokkaido', 'i9YXVTW_QwQ', 'First time', 33, 0, 0, 0),
(2, 'Hokusho', 'uploads/Hokusho.png', 'uploads/South Hokkaido.png', 'uploads/backgray.png', 'South Hokkaido', 'u76WTQ3TzMg', 'Championship x 2; \r\nInvitational tournament x 5', 7, 0, 0, 0),
(3, 'Hirosaki Gakuin Seiai', 'uploads/Hirosaki Gakuin Seiai.png', 'uploads/Aomori.png', 'uploads/backindigo.png', 'Aomori', 'nnETZG4dGHs', 'First time', 10, 0, 0, 0),
(4, 'Hanamaki Higashi', 'uploads/Hanamakihigashi.png', 'uploads/Iwate(2).png', 'uploads/backpink.png', 'Iwate', 'GazookDe7AE', 'Championship x 6; \r\nInvitational tournament x 2 (second place x1)', 7, 0, 0, 0),
(5, 'Akitasho', 'uploads/Akitasyou.png', 'uploads/Akita.png', 'uploads/backyellow.png', 'Akita', 'i9YXVTW_QwQ', 'Championship x 16;\r\nInvitational tournament x 6', 12, 0, 0, 0),
(6, 'Nichidai Yamagata', 'uploads/Nichidai yamaga.png', 'uploads/Yamagata(2).png', 'uploads/backyellow.png', 'Yamagata', 'i9YXVTW_QwQ', 'Championship x 15; \r\nInvitational tournament x 3', 15, 0, 0, 0),
(7, 'Sendai Ikuei', 'uploads/Sendai IKuei.png', 'uploads/Miyagi(2).png', 'uploads/backblue.png', 'Miyagi', '', 'Championship x 23 (second place x1); \r\nInvitational tournament x 10 (second place x1)', 2.4, 0, 0, 0),
(8, 'Seiko Gakuin', 'uploads/Seikogakuin.png', 'uploads/Fukushima(2).png', 'uploads/backgray.png', 'Fukushima', '', 'Championship x 9; \r\nInvitational tournament x 4', 4.5, 0, 0, 0),
(9, 'Joso Gakuin', 'uploads/Josogakuin.png', 'uploads/Ibaraki(2).png', 'uploads/backindigo.png', 'Ibaraki', '', 'Championship x 14 (champion x 1,second place x1); \r\nInvitational tournament x 7(champion x 1,second place x1)', 3.5, 0, 0, 0),
(10, 'Sakushin Gakuin', 'uploads/Sakushingakuin.png', 'uploads/Tochigi(2).png', 'uploads/backpink.png', 'Tochigi', '', 'Championship x 9  (champion x 1); \r\nInvitational tournament x 4  (champion x1)', 10, 0, 0, 0),
(11, 'Maebashi Ikuei', 'uploads/Maebashiikuei.png', 'uploads/Gunma.png', 'uploads/backpink.png', 'Gunma', '', 'Invitational tournament x1', 3.5, 0, 0, 0),
(12, 'Urawa Gakuin', 'uploads/Urawagakuin.png', 'uploads/Saitama(2).png', 'uploads/backyellow.png', 'Saitama', '', 'Championship x 11; \r\nInvitational tournament x 9 (champion x1)', 1.5, 0, 0, 0);

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
