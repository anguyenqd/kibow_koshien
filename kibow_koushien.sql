-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2013 at 12:33 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kibow_koshien`
--

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `bet_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `match_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`bet_id`, `bet_date`, `user_id`, `match_id`) VALUES
(1, '2013-07-29', 1, 0),
(2, '2013-07-31', 3, 0),
(3, '2013-07-31', 4, 0),
(4, '2013-07-31', 3, 0),
(5, '2013-07-31', 3, 0),
(6, '2013-08-01', 3, 0),
(7, '2013-08-05', 3, 0),
(8, '2013-08-05', 3, 0),
(9, '2013-08-05', 3, 0),
(10, '2013-08-05', 3, 0),
(11, '2013-08-05', 3, 0),
(12, '2013-08-05', 3, 0),
(13, '2013-08-05', 3, 0),
(14, '2013-08-05', 5, 0),
(15, '2013-08-05', 5, 0),
(16, '2013-08-05', 5, 0),
(17, '2013-08-05', 5, 0),
(18, '2013-08-05', 5, 0),
(19, '2013-08-06', 5, 0),
(20, '2013-08-06', 5, 0),
(21, '2013-08-06', 5, 0),
(22, '2013-08-07', 6, 0),
(23, '2013-08-07', 6, 0),
(24, '2013-08-07', 6, 0),
(25, '2013-08-07', 5, 0),
(26, '2013-08-07', 6, 0),
(27, '2013-08-07', 6, 0),
(28, '2013-08-08', 6, 0),
(29, '2013-08-08', NULL, 0),
(30, '2013-08-08', 11, 0),
(31, '2013-08-08', 11, 0),
(32, '2013-08-08', NULL, 0),
(33, '2013-08-08', NULL, 0),
(34, '2013-08-08', 10, 0),
(35, '2013-08-08', 11, 0),
(36, '2013-08-08', 13, 0),
(37, '2013-08-08', 13, 0),
(38, '2013-08-08', 13, 0),
(39, '2013-08-08', 13, 0),
(40, '2013-08-08', NULL, 0),
(41, '2013-08-08', 14, 0),
(42, '2013-08-08', 11, 0),
(43, '2013-08-08', NULL, 0),
(44, '2013-08-08', NULL, 0),
(45, '2013-08-08', 21, 0),
(46, '2013-08-08', 22, 0),
(47, '2013-08-08', 22, 0),
(48, '2013-08-08', 11, 0),
(49, '2013-08-08', 23, 0),
(50, '2013-08-08', 14, 0),
(51, '2013-08-08', 6, 0),
(52, '2013-08-08', 6, 0),
(53, '2013-08-08', 6, 0),
(54, '2013-08-08', 24, 0),
(55, '2013-08-08', 25, 0),
(56, '2013-08-08', 25, 0),
(57, '2013-08-08', 26, 0),
(58, '2013-08-08', 25, 0),
(59, '2013-08-08', 10, 0),
(60, '2013-08-08', 25, 0),
(61, '2013-08-08', 27, 0),
(62, '2013-08-08', 10, 0),
(63, '2013-08-08', 10, 0),
(64, '2013-08-08', 10, 0),
(65, '2013-08-08', 14, 0),
(66, '2013-08-08', 10, 0),
(67, '2013-08-08', 25, 0),
(68, '2013-08-08', 10, 0),
(69, '2013-08-08', 25, 0),
(70, '2013-08-08', 28, 0),
(71, '2013-08-09', 29, 0),
(72, '2013-08-09', 26, 0),
(73, '2013-08-09', 26, 2),
(74, '2013-08-09', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bet_details`
--

CREATE TABLE `bet_details` (
  `bet_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `bet_type` int(11) NOT NULL COMMENT '3 bet type : 1 - final, 2 - semi final , 3 - quarter final',
  `bet_amount` double NOT NULL DEFAULT '0',
  `bet_status` int(11) NOT NULL DEFAULT '3' COMMENT '1 : win - 2 : lose - 3 : waiting',
  PRIMARY KEY (`bet_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161 ;

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
(54, 18, 3, 3, 10, 3),
(55, 20, 33, 3, 1, 3),
(56, 21, 33, 3, 1, 3),
(57, 22, 3, 3, 4.5, 3),
(58, 23, 8, 2, 20, 3),
(59, 23, 9, 2, 20, 3),
(60, 23, 10, 2, 10, 3),
(61, 24, 3, 2, 10, 3),
(62, 28, 22, 2, 50, 3),
(63, 28, 21, 2, 100, 3),
(64, 28, 7, 2, 5, 3),
(65, 28, 46, 2, 100, 3),
(66, 30, 12, 2, 10, 3),
(67, 31, 31, 2, 10, 3),
(68, 33, 3, 2, 10, 3),
(69, 34, 1, 2, 3, 3),
(70, 34, 8, 2, 4, 3),
(71, 35, 21, 2, 10, 3),
(72, 35, 46, 2, 10, 3),
(73, 35, 51, 2, 10, 3),
(74, 38, 6, 2, 1, 3),
(75, 39, 2, 2, 1, 3),
(76, 40, 2, 2, 200, 3),
(77, 40, 3, 2, 120, 3),
(78, 40, 4, 2, 34, 3),
(79, 40, 10, 2, 43, 3),
(80, 40, 11, 2, 222, 3),
(81, 40, 39, 2, 223, 3),
(82, 41, 7, 2, 10, 3),
(83, 41, 9, 2, 10, 3),
(84, 41, 22, 2, 10, 3),
(85, 41, 21, 2, 10, 3),
(86, 41, 45, 2, 10, 3),
(87, 41, 56, 2, 5, 3),
(88, 41, 42, 2, 5, 3),
(89, 41, 12, 2, 10, 3),
(90, 42, 43, 2, 10, 3),
(91, 42, 39, 2, 10, 3),
(92, 42, 42, 2, 10, 3),
(93, 42, 36, 2, 10, 3),
(94, 42, 21, 2, 10, 3),
(95, 42, 7, 2, 10, 3),
(96, 42, 6, 2, 10, 3),
(97, 42, 5, 2, 10, 3),
(98, 43, 7, 2, 11, 3),
(99, 44, 7, 2, 11, 3),
(100, 45, 7, 2, 1, 3),
(101, 45, 8, 2, 1, 3),
(102, 46, 4, 2, 1, 3),
(103, 47, 21, 2, 111, 3),
(104, 48, 7, 2, 10, 3),
(105, 48, 21, 2, 10, 3),
(106, 48, 39, 2, 10, 3),
(107, 48, 43, 2, 10, 3),
(108, 48, 5, 2, 10, 3),
(109, 48, 6, 2, 10, 3),
(110, 48, 36, 2, 10, 3),
(111, 48, 42, 2, 10, 3),
(112, 49, 3, 2, 11, 3),
(113, 50, 7, 2, 1, 3),
(114, 50, 9, 2, 1, 3),
(115, 50, 21, 2, 1, 3),
(116, 50, 56, 2, 1, 3),
(117, 50, 12, 2, 1, 3),
(118, 50, 22, 2, 1, 3),
(119, 50, 31, 2, 1, 3),
(120, 50, 42, 2, 1, 3),
(121, 51, 7, 2, 30, 3),
(122, 52, 31, 2, 20, 3),
(123, 53, 40, 2, 100, 3),
(124, 54, 10, 2, 20, 3),
(125, 55, 2, 2, 10, 3),
(126, 55, 3, 2, 10, 3),
(127, 56, 2, 2, 10, 3),
(128, 57, 3, 3, 111, 3),
(129, 58, 1, 3, 10, 3),
(130, 59, 4, 3, 10, 3),
(131, 60, 15, 3, 200, 3),
(132, 61, 1, 3, 1, 3),
(133, 61, 7, 3, 1, 3),
(134, 62, 51, 3, 40, 3),
(135, 63, 29, 3, 20, 3),
(136, 64, 9, 3, 20, 3),
(137, 65, 56, 3, 10, 3),
(138, 65, 55, 3, 10, 3),
(139, 67, 3, 3, 500, 3),
(140, 68, 48, 3, 3, 3),
(141, 69, 1, 3, 10, 3),
(142, 70, 7, 3, 4, 3),
(143, 70, 8, 3, 2, 3),
(144, 70, 9, 3, 2, 3),
(145, 70, 11, 3, 2, 3),
(146, 70, 12, 3, 1, 3),
(147, 70, 23, 3, 5, 3),
(148, 70, 46, 3, 2, 3),
(149, 70, 45, 3, 2, 3),
(150, 70, 46, 2, 2, 3),
(151, 70, 23, 2, 2, 3),
(152, 70, 12, 2, 1, 3),
(153, 70, 7, 2, 2, 3),
(154, 70, 46, 1, 1, 3),
(155, 72, 2, 4, 12, 3),
(156, 72, 1, 4, 13, 3),
(157, 73, 2, 4, 1, 3),
(158, 73, 1, 4, 2, 3),
(159, 74, 9, 4, 10, 3),
(160, 74, 2, 4, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `match_date` datetime DEFAULT NULL,
  `team_1_id` int(11) NOT NULL,
  `team_1_odd` double NOT NULL,
  `description_1` text NOT NULL,
  `team_2_id` int(11) NOT NULL,
  `team_2_odd` double NOT NULL,
  `description_2` text NOT NULL,
  `winning_team_id` int(11) NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`match_id`, `match_date`, `team_1_id`, `team_1_odd`, `description_1`, `team_2_id`, `team_2_odd`, `description_2`, `winning_team_id`) VALUES
(3, '2013-08-09 06:30:00', 9, 1.7, 'å¸¸ç·å­¦é™¢ Joso Gakuin : Championship x 14 (champion x 1,second place x1); Invitational tournament x 7 (champion x 1,second place x1)', 2, 2.3, 'åŒ—ç…§ Hokusho : Championship x 2; Invitational tournament x 5', 0),
(4, '2013-08-09 23:00:00', 56, 1.95, 'Championship x 7 (second place x1); \r\nInvitational tournament x 8(champion x1, second place x1)', 42, 2.1, 'Championship x 15(second place x1); \r\nInvitational tournament x 11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `match_bets`
--

CREATE TABLE `match_bets` (
  `match_bet_id` int(11) NOT NULL DEFAULT '0',
  `match_id` int(11) NOT NULL,
  `bet_date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bet_amount` double NOT NULL,
  `bet_for_team_id` int(11) NOT NULL,
  PRIMARY KEY (`match_bet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `movie_category_id` int(11) NOT NULL,
  `youtub_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `moviecategories`
--

CREATE TABLE `moviecategories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `moviecategories`
--

INSERT INTO `moviecategories` (`id`, `title`) VALUES
(1, 'Type 1'),
(2, 'Type 2'),
(4, 'Type 3');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `map_img_url` varchar(255) NOT NULL,
  `background_url` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` text,
  `odds_top8` double NOT NULL DEFAULT '0',
  `odds_top4` double NOT NULL DEFAULT '0',
  `odds_top1` double NOT NULL DEFAULT '0',
  `school_status` int(11) NOT NULL COMMENT 'status id FK with school_status table',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `logo_url`, `map_img_url`, `background_url`, `address`, `video_url`, `description`, `odds_top8`, `odds_top4`, `odds_top1`, `school_status`) VALUES
(1, 'Obihiro Ohtani', 'uploads/Obihiro Ohtani.png', 'uploads/North Hokkaido(2).png', 'uploads/backblue.png', 'North Hokkaido', 'i9YXVTW_QwQ', 'North Hokkaido:\r\nFirst time', 33, 75, 151, 0),
(2, 'Hokusho', 'uploads/Hokusho.png', 'uploads/South Hokkaido.png', 'uploads/backgray.png', 'South Hokkaido', 'u76WTQ3TzMg', 'Championship x 2; \r\nInvitational tournament x 5', 7, 15, 31, 0),
(3, 'Hirosaki Gakuin Seiai', 'uploads/Hirosaki Gakuin Seiai.png', 'uploads/Aomori.png', 'uploads/backindigo.png', 'Aomori', 'nnETZG4dGHs', 'First time', 10, 21, 42, 0),
(4, 'Hanamaki Higashi', 'uploads/Hanamakihigashi.png', 'uploads/Iwate(2).png', 'uploads/backpink.png', 'Iwate', 'GazookDe7AE', 'Championship x 6; \r\nInvitational tournament x 2 (second place x1)', 7, 15, 31, 0),
(5, 'Akitasho', 'uploads/Akitasyou.png', 'uploads/Akita.png', 'uploads/backyellow.png', 'Akita', 'F30urLI3yP0', 'Championship x 16;\r\nInvitational tournament x 6', 12, 25, 51, 0),
(6, 'Nichidai Yamagata', 'uploads/Nichidai yamaga.png', 'uploads/Yamagata(2).png', 'uploads/backyellow.png', 'Yamagata', 'OOwRmEqR9Bg', 'Championship x 15; \r\nInvitational tournament x 3', 15, 35, 72, 0),
(7, 'Sendai Ikuei', 'uploads/Sendai IKuei.png', 'uploads/Miyagi(2).png', 'uploads/backblue.png', 'Miyagi', '2Gs2kcP2eNE', 'Championship x 23 (second place x1); \r\nInvitational tournament x 10 (second place x1)', 2.4, 3, 4.5, 0),
(8, 'Seiko Gakuin', 'uploads/Seikogakuin.png', 'uploads/Fukushima(2).png', 'uploads/backgray.png', 'Fukushima', 'L7-mWLYrDjw', 'Championship x 9; \r\nInvitational tournament x 4', 4.5, 10, 21, 0),
(9, 'Joso Gakuin', 'uploads/Josogakuin.png', 'uploads/Ibaraki(2).png', 'uploads/backindigo.png', 'Ibaraki', 'QEfu9rXNxR8', 'Championship x 14 (champion x 1,second place x1); \r\nInvitational tournament x 7(champion x 1,second place x1)', 3.5, 7.5, 15, 0),
(10, 'Sakushin Gakuin', 'uploads/Sakushingakuin.png', 'uploads/Tochigi(2).png', 'uploads/backpink.png', 'Tochigi', 'BcegXtBujCc', 'Championship x 9  (champion x 1); \r\nInvitational tournament x 4  (champion x1)', 10, 21, 42, 0),
(11, 'Maebashi Ikuei', 'uploads/Maebashiikuei.png', 'uploads/Gunma.png', 'uploads/backpink.png', 'Gunma', 'TH4UYbjTPUY', 'Invitational tournament x1', 3.5, 7.5, 15, 0),
(12, 'Urawa Gakuin', 'uploads/Urawagakuin.png', 'uploads/Saitama(2).png', 'uploads/backyellow.png', 'Saitama', 'POYQbMFqac8', 'Championship x 11; \r\nInvitational tournament x 9 (champion x1)', 1.5, 2, 3, 0),
(15, 'Kisarazu Sohgoh', 'uploads/Kisaradusohgoh.png', 'uploads/Chiba (1).png', 'uploads/backblue.png', 'Chiba', '1pxakPIiygA', 'Championship x 3; \r\nInvitational tournament x 1', 7, 15, 31, 0),
(16, 'Syutoku', 'uploads/Syutoku.png', 'uploads/East Tokyo (1).png', 'uploads/backgray.png', 'East Tokyo', 'pGJuyULf2Vc', 'Championship x 4; \r\nInvitational tournament x 3', 7, 15, 31, 0),
(21, 'Nichidai Sankou', 'uploads/Nichidai Sankou (1).png', 'uploads/West Tokyo (1).png', 'uploads/backindigo.png', 'West Tokyo', 'zwu4GEZMCMg', 'Championship x 15 (champion x2); \r\nInvitational tournament x 18 (champion x1,second place x3)', 2.4, 3, 5.5, 0),
(22, 'Yokohama', 'uploads/Yokohama (1).png', 'uploads/Kanagawa (1).png', 'uploads/backindigo.png', 'Kanagawa', 'wWayDh_fDQs', 'Championship x 14 (champion x2); \r\nInvitational tournament x 14 (champion x3,second place x1)', 3, 6, 10, 0),
(23, 'Hikawa', 'uploads/Hikawa (1).png', 'uploads/Yamanashi (1).png', 'uploads/backpink.png', 'Yamanashi', 'OPpqtAPe3Ws', 'Championship x 3; \r\nInvitational tournament x 1', 10, 21, 42, 0),
(25, 'Uedanishi', 'uploads/Uedanishi (1).png', 'uploads/Nagano (1).png', 'uploads/backblue.png', 'Nagano', 'iEmCriVA-0Y', 'First time', 12, 25, 51, 0),
(26, 'Tokoha Kikugawa', 'uploads/tokohakikugawa.png', 'uploads/Shizuoka (1).png', 'uploads/backgray.png', 'Shizuoka', 'XtcaJGEBZog', 'Championship x 3 (second place x1); \r\nInvitational tournament x 4 (champion x1)', 3.5, 7.5, 15, 0),
(27, 'Aikodai Meiden', 'uploads/Aikodai Meiden.png', 'uploads/Aichi (1).png', 'uploads/backgray.png', 'Aichi', 'dIin8-mwffw', 'Championship x 10; \r\nInvitational tournament x 9 (champion x1, second place x1)', 3.5, 7.5, 15, 0),
(29, 'Mie', 'uploads/Mie.png', 'uploads/Mie (1).png', 'uploads/backpink.png', 'Mie', '6X5rT4m0dec', 'Championship x 10; \r\nInvitational tournament x 11 (champion x1)', 7, 15, 31, 0),
(30, 'Toyama Daiichi', 'uploads/Toyama dai-ichi.png', 'uploads/Toyama (1).png', 'uploads/backyellow.png', 'Toyama', 'LRdycZV8pBQ', 'First time', 10, 21, 42, 0),
(31, 'Saibi', 'uploads/Saibi.png', 'uploads/Ehime.png', 'uploads/backblue.png', 'Ehime', 'fPXOwqCQFw4', 'Championship x 3 (second place x1); \r\nInvitational tournament x 2(champion x1, second place x1)', 2, 2.5, 4, 0),
(32, 'Meitoku Gijuku', 'uploads/Meitokugijuku.png', 'uploads/Koshi.png', 'uploads/backblue.png', 'Kochi', 'ausEWRtjm1E', 'Championship x 14 (champion x1); \r\nInvitational tournament x 14', 3.3, 7, 12, 0),
(33, 'Jiyugaoka', 'uploads/Jiyugaoka.png', 'uploads/Fukuoka(2).png', 'uploads/backgray.png', 'Fukuoka', 'sCMFXfKF5Lg', 'Invitational tournament x 1', 7, 15, 31, 0),
(34, 'Aritakou', 'uploads/Aritakou.png', 'uploads/Saga.png', 'uploads/backindigo.png', 'Saga', '', 'First time', 18, 51, 101, 0),
(35, 'Sasebo Jitsugyo', 'uploads/Sasebo Jitsugyoï¼ˆBusinessï¼‰.png', 'uploads/Nagasaki.png', 'uploads/backpink.png', 'Nagasaki', 'DP6WC8KRNVw', 'Championship x 4;\r\nInvitational tournament x 1', 12, 25, 51, 0),
(36, 'Kumamoto Kogyo', 'uploads/Kumamoto Technical High School.png', 'uploads/Kumamoto.png', 'uploads/backyellow.png', 'Kumamoto', '5STeMPs0MhM', 'Championship x 19;\r\nInvitational tournament x 20', 7, 15, 31, 0),
(37, 'Oita Shogyo', 'uploads/Oitasyou.png', 'uploads/Oita(2).png', 'uploads/backyellow.png', 'Oita', 'Iczka4_DbPE', 'Championship x 14;\r\nInvitational tournament x 5', 18, 51, 101, 0),
(38, 'Nobeoka Gakuen', 'uploads/Nobeokakuen.png', 'uploads/Miyazaki.png', 'uploads/backpink.png', 'Miyazaki', 'oMva_V7jp30', 'Championship x 6;\r\nInvitational tournament x 2', 15, 35, 72, 0),
(39, 'Shoanan', 'uploads/Shoanan.png', 'uploads/Kagoshima(2).png', 'uploads/backgray.png', 'Kagoshima', 'IUdSqYkmo1w', 'Championship x 17 (second place x1); \r\nInvitational tournament x 7', 4.5, 10, 21, 0),
(40, 'Okinawa Shogaku', 'uploads/Okinawasyougaku.png', 'uploads/Okinawa(2).png', 'uploads/backindigo.png', 'Okinawa', 'ZEtZ6I-pM5U', 'Championship x 5; \r\nInvitational tournament x 5 (champion x2)', 4.5, 10, 21, 0),
(42, 'Seiryo', 'uploads/Seiryo.png', 'uploads/Ishikawa.png', 'uploads/backblue.png', 'Ishikawa', 'T2W8GrMZw1Y', 'Championship x 15(second place x1); \r\nInvitational tournament x 11', 7, 15, 31, 0),
(43, 'Fukusho', 'uploads/Fukusho.png', 'uploads/Fukui.png', 'uploads/backblue.png', 'Fukui', 'bHhIu_PGe58', 'Championship x 21; \r\nInvitational tournament x 17(second place x1)', 7, 15, 31, 0),
(44, 'Hikone', 'uploads/Hikone.png', 'uploads/Shiga.png', 'uploads/backgray.png', 'Shiga', 'YJKvpkvIYDY', 'Invitational tournament x 3', 15, 35, 72, 0),
(45, 'Fukuchiyama Seibi', 'uploads/Fukuchiyamaseibi.png', 'uploads/Kyoto.png', 'uploads/backyellow.png', 'Kyoto', 'UxYIfcK08a0', 'Championship x 3; \r\nInvitational tournament x 1', 3.5, 7.5, 15, 0),
(46, 'Osaka Toin', 'uploads/Osaka Toin.png', 'uploads/Osaka.png', 'uploads/backpink.png', 'Osaka', '8TN7p8jIcLk&t=5', 'Championship x 6; \r\nInvitational tournament x 6(champion x1)', 2.8, 4, 6, 0),
(47, 'Nishiwaki', 'uploads/Nishiwaki.png', 'uploads/Hyogo.png', 'uploads/backindigo.png', 'Hyogo', 'wvsmctgCeSs', 'First time', 12, 25, 51, 0),
(48, 'Sakurai', 'uploads/Sakurai.png', 'uploads/Nara.png', 'uploads/backindigo.png', 'Nara', 'klvjfF5sjNQ', 'First time', 33, 75, 151, 0),
(50, 'Tamano Konan', 'uploads/Tamanokonan.png', 'uploads/Okayama.png', 'uploads/backblue.png', 'Okayama', 'g8o8IsT4dIQ', 'Championship x 2; \r\nInvitational tournament x 2', 7, 15, 31, 0),
(51, 'Setouchi', 'uploads/Setouchi.png', 'uploads/Hiroshima.png', 'uploads/backyellow.png', 'Hiroshima', '5Hcx3JVwvR8', 'Championship x 1; \r\nInvitational tournament x 2', 2.8, 5, 8, 0),
(52, 'Tottori Jouhoku', 'uploads/Tottori jouhoku.png', 'uploads/Tottori.png', 'uploads/backgray.png', 'Tottori', 'eZA7jWXyKjI', 'Championship x 2; \r\nInvitational tournament x 1', 12, 25, 51, 0),
(53, 'Iwamichisuikan', 'uploads/Iwamichisuikan.png', 'uploads/Shimane.png', 'uploads/backgray.png', 'Shimane', 'NjZMmEDzQPU&t=14', 'Championship x 7; \r\nInvitational tournament x 1', 33, 75, 151, 0),
(54, 'Iwakuni Sho', 'uploads/Iwakuni.png', 'uploads/Yamaguchi.png', 'uploads/backyellow.png', 'Yamaguchi', 'dcoYbUGM7jg', 'Championship x 3; \r\nInvitational tournament x 1', 7, 15, 31, 0),
(55, 'Marugame', 'uploads/Marugame.png', 'uploads/Kakawa (1).png', 'uploads/backindigo.png', 'Kagawa', 'EPtTr46GrII', 'Championship x 3; \r\nInvitational tournament x 1', 10, 21, 42, 0),
(56, 'Naruto', 'uploads/Naruto.png', 'uploads/Tokushima.png', 'uploads/backpink.png', 'Tokushima', 'xUcLqIZaVkk', 'Championship x 7 (second place x1); \r\nInvitational tournament x 8(champion x1, second place x1)', 7, 15, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_status`
--

CREATE TABLE `school_status` (
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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `sns_account` varchar(255) NOT NULL COMMENT 'SNS account of user',
  `sns_type` varchar(10) NOT NULL COMMENT 'SNS account type',
  `balance` double NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sns_account`, `sns_type`, `balance`) VALUES
(6, 'k.takemaki@gmail.com', 'facebook', 520.5),
(7, 'AnDanteN', 'twitter', 1000),
(8, 'BaseballKibow', 'twitter', 1000),
(9, 't_kawakita', 'twitter', 1000),
(10, 'melanierosetmendoza@yahoo.com', 'facebook', 900),
(11, 'aleng_09@yahoo.com.sg', 'facebook', 790),
(12, 'lin.r@kibow.asia', 'facebook', 1000),
(13, 'yendows@gmail.com', 'facebook', 998),
(14, 'bellamal18@yahoo.com', 'facebook', 902),
(15, 'congtuchuabietyeu7777@yahoo.com', 'facebook', 1000),
(24, 'haru_loc@yahoo.com', 'facebook', 980),
(25, 'y-kawada@bluebird-bb.co.jp', 'facebook', 250),
(26, 'a1provip002@gmail.com', 'facebook', 861),
(27, 'namvuonghcm@gmail.com', 'facebook', 998),
(28, 'strella_claudia@yahoo.com.tw', 'facebook', 972),
(29, 'koiju1224@gmail.com', 'facebook', 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
