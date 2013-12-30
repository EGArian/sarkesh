-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2013 at 10:57 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sarkesho`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `plugin` int(11) NOT NULL,
  `position` varchar(45) NOT NULL,
  `permations` varchar(45) DEFAULT NULL,
  `pages` varchar(45) DEFAULT NULL,
  `show_header` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plugin_idx` (`plugin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `plugin`, `position`, `permations`, `pages`, `show_header`) VALUES
(4, 'permation', 1, 'sidebar1', NULL, NULL, 1),
(6, 'content', 3, 'content', NULL, NULL, 0),
(7, 'login', 2, 'sidebar1', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `localize`
--

CREATE TABLE IF NOT EXISTS `localize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main` int(1) NOT NULL,
  `name` varchar(90) NOT NULL,
  `language` varchar(7) NOT NULL,
  `home` varchar(100) NOT NULL,
  `theme` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `localize`
--

INSERT INTO `localize` (`id`, `main`, `name`, `language`, `home`, `theme`) VALUES
(1, 1, 'Sarkesh', 'fa_IR', '?plugin=permations&action=action', 'beez');

-- --------------------------------------------------------

--
-- Table structure for table `permations`
--

CREATE TABLE IF NOT EXISTS `permations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `permations`
--

INSERT INTO `permations` (`id`, `name`, `enable`) VALUES
(1, 'Administrators', 1),
(2, 'users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `enable`) VALUES
(1, 'permations', 1),
(2, 'users', 1),
(3, 'core', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registry`
--

INSERT INTO `registry` (`id`, `plugin`, `a_key`, `value`) VALUES
(1, 3, 'validator_last_check', '1387753577'),
(2, 3, 'validator_max_time', '77000'),
(3, 3, 'cookie_max_time', '77000');

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
  `permation` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permation_idx` (`permation`),
  KEY `validator_idx` (`validator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `validator`, `permation`, `last_login`) VALUES
(1, 'sarkesh', '90deff4b32c134f32e3f0d7e8a2aad92', 'info@sarkesh.org', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `validator`
--

CREATE TABLE IF NOT EXISTS `validator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(45) NOT NULL,
  `spicial_id` varchar(45) NOT NULL,
  `valid_time` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `permation` FOREIGN KEY (`permation`) REFERENCES `permations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `validator` FOREIGN KEY (`validator`) REFERENCES `validator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
