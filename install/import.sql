-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2014 at 10:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `value` varchar(100) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL DEFAULT '0',
  `plugin` int(11) NOT NULL,
  `position` varchar(45) NOT NULL,
  `permissions` varchar(45) DEFAULT NULL,
  `pages` varchar(45) DEFAULT NULL,
  `show_header` tinyint(1) DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `plugin_idx` (`plugin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `value`, `plugin`, `position`, `permissions`, `pages`, `show_header`, `rank`) VALUES
(6, 'content', '0', 3, 'content', NULL, '', 0, 0),
(7, 'login_block', '0', 2, 'sidebar1', NULL, NULL, 1, 3),
(12, 'select_lang', '0', 4, 'sidebar1', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `capcha`
--

CREATE TABLE IF NOT EXISTS `capcha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `solved` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this table store capcha values' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cardname` int(11) unsigned DEFAULT NULL,
  `price` int(11) unsigned DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `cardname`, `price`, `state`) VALUES
(1, 43434, 3434, 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `place` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `date` varchar(11) NOT NULL,
  `user` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `file_places`
--

CREATE TABLE IF NOT EXISTS `file_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `options` text NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `file_places`
--

INSERT INTO `file_places` (`id`, `name`, `class_name`, `options`, `state`) VALUES
(1, 'Local Strong', 'files_local', 'upload/files/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `ref_id`, `label`, `url`, `enable`, `rank`) VALUES
(1, 1, 'Home', '<FRONT>', 1, 0),
(2, 1, 'Forums', '?plugin=forum', 1, 1),
(3, 1, 'Downloads', '?plugin=content&action=show&cat=download', 1, 1),
(4, 1, 'About us', '?plugin=content&action=show&id=about_us', 1, 3),
(6, 1, 'TEST', 'http://google.com', 1, 0),
(7, 3, 'about us', 'dddd', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `localize`
--

CREATE TABLE IF NOT EXISTS `localize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main` int(1) NOT NULL,
  `name` varchar(90) NOT NULL,
  `language` varchar(7) NOT NULL,
  `language_name` varchar(30) DEFAULT 'English - United States',
  `home` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `calendar` varchar(20) NOT NULL DEFAULT 'gregorian',
  `direction` varchar(4) NOT NULL DEFAULT 'LTR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `localize`
--

INSERT INTO `localize` (`id`, `main`, `name`, `language`, `language_name`, `home`, `email`, `calendar`, `direction`) VALUES
(1, 0, 'Sarkesh', 'en_US', 'English - United States', '?plugin=users&action=register', 'info@sarkesh.org', 'gregorian', 'LTR'),
(2, 1, 'سرکش', 'fa_IR', 'فارسی - ایران', '?plugin=users', 'info@sarkesh.org', 'jallali', 'RTL');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `header` varchar(50) DEFAULT NULL,
  `direction` varchar(1) NOT NULL DEFAULT 'h',
  `position` varchar(50) NOT NULL,
  `localize` varchar(10) NOT NULL DEFAULT 'en_US',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  `core_admin_panel` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `enable`, `core_admin_panel`) VALUES
(1, 'Administrators', 1, 1),
(2, 'users', 1, 0),
(3, 'Not activated', 0, 0),
(4, 'guest', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `can_edite` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `enable`, `can_edite`) VALUES
(2, 'users', 1, 0),
(3, 'core', 1, 0),
(4, 'languages', 1, 0),
(5, 'email', 1, 0),
(6, 'hello', 1, 1),
(7, 'menu', 1, 0),
(8, 'content', 1, 1),
(11, 'files', 1, 0),
(12, 'card', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registry`
--

CREATE TABLE IF NOT EXISTS `registry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` int(11) NOT NULL,
  `a_key` varchar(45) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `fk_plugin_idx` (`plugin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `registry`
--

INSERT INTO `registry` (`id`, `plugin`, `a_key`, `value`) VALUES
(1, 3, 'validator_last_check', '1387753577'),
(2, 3, 'validator_max_time', '77000'),
(3, 3, 'cookie_max_time', '77000'),
(4, 3, 'jquery', '1'),
(5, 3, 'editor', '0'),
(6, 2, 'register', '1'),
(7, 3, 'bootstrap', '1'),
(8, 2, 'active_from_email', '1'),
(9, 2, 'default_permation', '2'),
(10, 5, 'template', 'simple'),
(12, 3, 'pace_theme', 'pace-theme-center-simple'),
(13, 2, 'register_captcha', '1'),
(14, 8, 'date_format', 'l jS \\of F Y h:i:s A'),
(15, 3, 'default_timezone', 'America/Los_Angeles'),
(16, 3, 'active_theme', 'sarkesh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permission` int(1) NOT NULL,
  `validator` int(11) DEFAULT NULL,
  `forget` int(11) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `login_key` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `permission`, `validator`, `forget`, `last_login`, `login_key`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'info@test.org', 1, 55, NULL, NULL, 56),
(2, 'sarttt', '25d55ad283aa400af464c76d713c07ad', 'ughugu@Ugugu.com', 3, 45, NULL, NULL, NULL),
(3, '', '', '', 0, NULL, NULL, NULL, 56);

-- --------------------------------------------------------

--
-- Table structure for table `validator`
--

CREATE TABLE IF NOT EXISTS `validator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(45) NOT NULL,
  `special_id` varchar(45) NOT NULL,
  `valid_time` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `validator`
--

INSERT INTO `validator` (`id`, `source`, `special_id`, `valid_time`) VALUES
(38, 'USERS_LOGIN', 'lt8n72wnub', '1396278409'),
(39, 'USERS_LOGIN', '2w83crc462', '1396552530'),
(40, 'USERS_LOGIN', 'mury4ymxnw', '1396590297'),
(41, 'USERS_LOGIN', '2z373wajoe', '1396874206'),
(42, 'USERS_LOGIN', 'paq2ivf5mn', '1397334024'),
(43, 'USERS_LOGIN', 'l2rfq2dqem', '1397334329'),
(45, 'USERS_ACTIVE', 'u85erc8xwk', '1397505851'),
(46, 'USERS_LOGIN', 'wm16a6365n', '1398237718'),
(47, 'USERS_LOGIN', '0zng1vgc2f', '1398426134'),
(48, 'USERS_LOGIN', 'jfcjaqz3n0', '1399013450'),
(49, 'USERS_LOGIN', 'l9l43zebcp', '1399039852'),
(50, 'USERS_LOGIN', '7v40usd1f3', '1399134305'),
(51, 'USERS_LOGIN', 'o8uxh6jswn', '1399352212'),
(54, 'USERS_LOGIN', 'qj4knruvgw', '1399639054'),
(55, 'USERS_LOGIN', 'onf0cooh46', '1399700686'),
(56, 'USERS_LOGIN', 'irbd4su8gv', '1408439000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `plugin` FOREIGN KEY (`plugin`) REFERENCES `plugins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registry`
--
ALTER TABLE `registry`
  ADD CONSTRAINT `fk_plugin` FOREIGN KEY (`plugin`) REFERENCES `plugins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
