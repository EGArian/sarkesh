-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2014 at 08:51 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pezeshkan`
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
  `permations` varchar(45) DEFAULT NULL,
  `pages` varchar(45) DEFAULT NULL,
  `show_header` tinyint(1) DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `plugin_idx` (`plugin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `value`, `plugin`, `position`, `permations`, `pages`, `show_header`, `rank`) VALUES
(6, 'content', '0', 3, 'content', NULL, NULL, 0, 0),
(7, 'login', '0', 2, 'off', NULL, NULL, 1, 3),
(9, 'language_select', '0', 4, 'sidebar1', NULL, NULL, 0, 1),
(10, 'forget_password', '0', 2, 'off', NULL, NULL, NULL, 2),
(11, 'say', '0', 6, 'off', NULL, NULL, NULL, 0),
(12, 'show_menu', '0', 7, 'sidebar1', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `label` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `ref_id`, `parent_id`, `label`, `url`, `enable`, `rank`) VALUES
(1, 1, 0, 'home', '<front_page>', 1, 0),
(2, 1, 0, 'Contact Us', '?plugin=contact&action=connect', 1, 1);

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
  `theme` varchar(45) NOT NULL,
  `calendar` varchar(20) NOT NULL DEFAULT 'gregorian',
  `direction` varchar(4) NOT NULL DEFAULT 'LTR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `localize`
--

INSERT INTO `localize` (`id`, `main`, `name`, `language`, `language_name`, `home`, `email`, `theme`, `calendar`, `direction`) VALUES
(1, 1, 'Sarkesh', 'en_US', 'English - United States', '?plugin=users&action=register', 'info@sarkesh.org', 'blog', 'gregorian', 'LTR'),
(2, 0, 'سرکش', 'fa_IR', 'فارسی - ایران', '?plugin=users&action=register', 'info@sarkesh.org', 'blog', 'jallali', 'RTL');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `position` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `position`) VALUES
(1, 'home_menu', 'sidebar1');

-- --------------------------------------------------------

--
-- Table structure for table `permations`
--

CREATE TABLE IF NOT EXISTS `permations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permations`
--

INSERT INTO `permations` (`id`, `name`, `enable`) VALUES
(1, 'Administrators', 1),
(2, 'users', 1),
(3, 'Not activated', 0),
(4, 'guest', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `enable`) VALUES
(1, 'permations', 1),
(2, 'users', 1),
(3, 'core', 1),
(4, 'languages', 1),
(5, 'email', 1),
(6, 'hello', 1),
(7, 'menu', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `registry`
--

INSERT INTO `registry` (`id`, `plugin`, `a_key`, `value`) VALUES
(1, 3, 'validator_last_check', '1387753577'),
(2, 3, 'validator_max_time', '77000'),
(3, 3, 'cookie_max_time', '77000'),
(4, 3, 'jquery', '1'),
(5, 3, 'editor', '1'),
(6, 2, 'register', '1'),
(7, 3, 'bootstrap', '1'),
(8, 2, 'active_from_email', '1'),
(9, 2, 'default_permation', '2'),
(10, 5, 'template', 'simple'),
(11, 3, 'bootstrap_theme', 'bootstrap-lumen'),
(12, 3, 'pace_theme', 'pace-theme-loading-bar'),
(13, 2, 'register_captcha', '1'),
(14, 3, 'yamm3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `validator` int(11) DEFAULT NULL,
  `forget` int(11) NOT NULL,
  `permation` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permation_idx` (`permation`),
  KEY `validator_idx` (`validator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `validator`, `forget`, `permation`, `last_login`) VALUES
(1, 'sarkesh', '90deff4b32c134f32e3f0d7e8a2aad92', 'alizadeh.babak@gmail.com', 470, 469, 1, NULL),
(9, 'babak', '7f7e4c0e56970beeaf2cac1185edde19', 'alizadeh.babak@live.com', 467, 468, 3, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=470 ;

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

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `permation` FOREIGN KEY (`permation`) REFERENCES `permations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
