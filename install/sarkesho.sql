-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2014 at 08:35 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.3

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
  `permissions` varchar(45) DEFAULT NULL,
  `pages` varchar(45) DEFAULT NULL,
  `show_header` tinyint(1) DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `plugin_idx` (`plugin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `value`, `plugin`, `position`, `permissions`, `pages`, `show_header`, `rank`) VALUES
(6, 'content', '0', 3, 'content', NULL, NULL, 0, 0),
(7, 'login', '0', 2, 'sidebar1', NULL, NULL, 1, 3),
(9, 'language_select', '0', 4, 'sidebar1', NULL, NULL, 0, 1),
(10, 'forget_password', '0', 2, 'sidebar1', NULL, NULL, NULL, 2),
(11, 'say', '0', 6, 'off', NULL, NULL, NULL, 0),
(12, 'show_menu', '0', 7, 'header', NULL, NULL, NULL, 0),
(13, 'show_menu', '0', 7, 'sidebar1', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `tittle` varchar(100) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `localize` int(11) NOT NULL,
  `date_publish` int(11) NOT NULL,
  `date_edite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `entry_id`, `tittle`, `user`, `localize`, `date_publish`, `date_edite`) VALUES
(1, 1, 'First news about sarkesh CMS', 1, 1, 123455555, 0);

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `label` varchar(90) NOT NULL,
  `show_tittle` tinyint(4) NOT NULL DEFAULT '1',
  `des` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `name`, `label`, `show_tittle`, `des`) VALUES
(1, 'last_news', 'Last News', 1, 'This entry is for publish last news about sarkesh cms.');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `patern_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `ref_id`, `value`, `patern_id`) VALUES
(1, 1, 'Sarkesh is open source software maintained and developed by a community of 12+ users and developers. It''s distributed under the terms of the GNU General Public License (or "GPL"), which means anyone is free to download it and share it with others. This open development model means that people are constantly working to make sure Drupal is a cutting-edge platform that supports the latest technologies that the Web has to offer. The Sarkesh project''s principles encourage modularity, standards, collaboration, ease-of-use, and more.\n<br /><kbd>this is a code</kbd>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fields_patern`
--

CREATE TABLE IF NOT EXISTS `fields_patern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'string',
  `label` varchar(90) NOT NULL DEFAULT 'label',
  `help` text,
  `options` text,
  `rank` int(11) NOT NULL DEFAULT '0',
  `entry_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fields_patern`
--

INSERT INTO `fields_patern` (`id`, `name`, `type`, `label`, `help`, `options`, `rank`, `entry_id`) VALUES
(2, 'last_news_body', 'string', 'Body', NULL, NULL, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `place`, `address`, `date`, `user`, `size`) VALUES
(4, 'pezeshkan(3).sql', 1, '87u2flwj7r.pezeshkan(3).sql', '1396203581', 1, 12526),
(5, 'pezeshkan(3).sql', 1, 's5f39g5j6d.pezeshkan(3).sql', '1396203721', 1, 12526),
(6, 'pezeshkan(3).sql', 1, 't9171sbp9l.pezeshkan(3).sql', '1396203734', 1, 12526),
(7, 'pezeshkan(3).sql', 1, 'wwq0crwy96.pezeshkan(3).sql', '1396206931', 1, 12526),
(8, 'pezeshkan(3).sql', 1, '5laik8e182.pezeshkan(3).sql', '1396207437', 1, 12526),
(9, 'pezeshkan(3).sql', 1, '4mxn09o8u0.pezeshkan(3).sql', '1396207629', 1, 12526),
(10, 'pezeshkan(3).sql', 1, '6xw0a8m1sb.pezeshkan(3).sql', '1396208134', 1, 12526),
(11, 'pezeshkan(3).sql', 1, '5qko5lfjur.pezeshkan(3).sql', '1396208145', 1, 12526),
(12, 'pezeshkan(3).sql', 1, 'qkscgq9vj5.pezeshkan(3).sql', '1396208178', 1, 12526),
(13, 'pezeshkan(3).sql', 1, '8ezbcherzq.pezeshkan(3).sql', '1396208246', 1, 12526),
(14, 'pezeshkan(3).sql', 1, 'j3krf6x8ob.pezeshkan(3).sql', '1396208262', 1, 12526),
(15, 'pezeshkan(3).sql', 1, '1gbfwae7xp.pezeshkan(3).sql', '1396208300', 1, 12526),
(16, 'pezeshkan(3).sql', 1, '6dmztnj2tw.pezeshkan(3).sql', '1396208350', 1, 12526),
(17, 'pezeshkan(3).sql', 1, 'gk6h5pvrja.pezeshkan(3).sql', '1396208405', 1, 12526),
(18, 'pezeshkan(3).sql', 1, 'x5nnzwt924.pezeshkan(3).sql', '1396208425', 1, 12526),
(19, 'pezeshkan(3).sql', 1, 'uzwgj1k8h4.pezeshkan(3).sql', '1396208445', 1, 12526),
(20, 'pezeshkan(3).sql', 1, 'ncrps0yryv.pezeshkan(3).sql', '1396208544', 1, 12526),
(21, 'pezeshkan(3).sql', 1, 'ghy6a32g9j.pezeshkan(3).sql', '1396208572', 1, 12526),
(22, 'pezeshkan(3).sql', 1, 'wv4uaucm1a.pezeshkan(3).sql', '1396208627', 1, 12526),
(23, 'pezeshkan(3).sql', 1, 'fa9b8kqkl1.pezeshkan(3).sql', '1396208645', 1, 12526),
(24, 'pezeshkan(3).sql', 1, 'vbgyz64d0k.pezeshkan(3).sql', '1396209287', 1, 12526),
(25, 'pezeshkan(3).sql', 1, 'p2xfyb4hi7.pezeshkan(3).sql', '1396209301', 1, 12526),
(26, 'pezeshkan(3).sql', 1, 'm09jwrexy1.pezeshkan(3).sql', '1396209352', 1, 12526),
(27, 'pezeshkan(3).sql', 1, 'y9qgz78rf1.pezeshkan(3).sql', '1396209485', 1, 12526),
(28, 'pezeshkan(3).sql', 1, 'kw3kbc5hbv.pezeshkan(3).sql', '1396209525', 1, 12526),
(29, 'pezeshkan(3).sql', 1, '5zckxsbehk.pezeshkan(3).sql', '1396209618', 1, 12526),
(30, 'pezeshkan(3).sql', 1, 'kuo7hacao7.pezeshkan(3).sql', '1396209658', 1, 12526),
(31, 'pezeshkan(3).sql', 1, 'czxu0bvdpb.pezeshkan(3).sql', '1396209735', 1, 12526),
(32, 'pezeshkan(3).sql', 1, 'hha6kqj8hx.pezeshkan(3).sql', '1396209979', 1, 12526),
(33, 'pezeshkan(3).sql', 1, 'knwk30rb9y.pezeshkan(3).sql', '1396210093', 1, 12526),
(34, 'pezeshkan(3).sql', 1, 'ujgruqwgy9.pezeshkan(3).sql', '1396210175', 1, 12526),
(35, 'pezeshkan(3).sql', 1, '6vih37bptj.pezeshkan(3).sql', '1396210218', 1, 12526),
(36, 'pezeshkan(3).sql', 1, 'lqu2vnbew2.pezeshkan(3).sql', '1396210876', 1, 12526),
(37, 'folder_64.png', 1, '3qntuml66i.folder_64.png', '1396471277', 0, 470),
(38, 'folder_64.png', 1, 'gtkcc37yoi.folder_64.png', '1396471284', 0, 470),
(39, 'folder_64.png', 1, 'lz3ezmzwbz.folder_64.png', '1396471285', 0, 470),
(40, 'folder_64.png', 1, 'yu7wo9ed2f.folder_64.png', '1396471290', 0, 470),
(41, 'def_avatar_32.png', 1, '69r27xcb04.def_avatar_32.png', '1396472658', 0, 3499),
(42, 'def_avatar_32.png', 1, 'vcsrcda0y2.def_avatar_32.png', '1396472700', 0, 3499),
(43, 'def_avatar_32.png', 1, 'h0aeldq7q0.def_avatar_32.png', '1396472707', 0, 3499),
(44, 'def_avatar_64.png', 1, '2g2k0sktx5.def_avatar_64.png', '1396472725', 0, 4224),
(45, 'folder_64.png', 1, '1z94pc51sq.folder_64.png', '1396472753', 0, 470),
(46, 'folder_64.png', 1, 'jp4hzm3i8k.folder_64.png', '1396472860', 0, 470),
(47, 'folder_64.png', 1, 'svc9a1z8i9.folder_64.png', '1396473001', 0, 470),
(48, 'folder_64.png', 1, 'lyjb10zxjr.folder_64.png', '1396473058', 0, 470),
(49, 'def_avatar_64.png', 1, 'ykjxduid3h.def_avatar_64.png', '1396473111', 0, 4224),
(50, 'def_avatar_64.png', 1, 'sc4fs54rgl.def_avatar_64.png', '1396473148', 0, 4224),
(51, 'def_avatar_64.png', 1, 'n8crz34qp1.def_avatar_64.png', '1396473239', 0, 4224),
(52, 'def_avatar_64.png', 1, '7oz23fhax2.def_avatar_64.png', '1396473257', 0, 4224),
(53, 'def_avatar_64.png', 1, 'x7l99trcnq.def_avatar_64.png', '1396473319', -1, 4224),
(54, 'def_avatar_32.png', 1, 'cbdohbbuej.def_avatar_32.png', '1396473368', -1, 3499),
(55, 'def_avatar_32.png', 1, 'jvvgsnxy99.def_avatar_32.png', '1396473409', -1, 3499),
(56, 'folder_64.png', 1, 'qkr9eqrcdc.folder_64.png', '1396473442', -1, 470),
(57, 'def_avatar_32.png', 1, 'vy7mxl5e83.def_avatar_32.png', '1396473726', -1, 3499),
(58, 'def_avatar_32.png', 1, '4a0j0nmifo.def_avatar_32.png', '1396473804', -1, 3499),
(59, 'def_avatar_64.png', 1, 'cgyq1p7otk.def_avatar_64.png', '1396509727', -1, 4224),
(60, 'def_avatar_32.png', 1, '51s41fbixg.def_avatar_32.png', '1396511346', -1, 3499),
(61, 'def_avatar_64.png', 1, 'fias2whz8n.def_avatar_64.png', '1396511553', -1, 4224),
(62, 'def_avatar_32.png', 1, 'g7tcvzrgze.def_avatar_32.png', '1396511582', -1, 3499),
(63, 'def_avatar_32.png', 1, 'k2406mngks.def_avatar_32.png', '1396511805', -1, 3499),
(64, 'def_avatar_64.png', 1, 'pw8lyxkj9b.def_avatar_64.png', '1396511913', -1, 4224),
(65, 'def_avatar_32.png', 1, 'f211j10bfg.def_avatar_32.png', '1396512025', -1, 3499),
(66, 'def_avatar_32.png', 1, '0v780lu7wj.def_avatar_32.png', '1396512069', -1, 3499),
(67, 'def_avatar_32.png', 1, 'm92knzt9bn.def_avatar_32.png', '1396512084', -1, 3499),
(68, 'def_avatar_32.png', 1, '1sk56lb7km.def_avatar_32.png', '1396512119', -1, 3499),
(69, 'def_avatar_64.png', 1, 'mgz7966unv.def_avatar_64.png', '1396512244', -1, 4224),
(70, 'def_avatar_32.png', 1, 'me9sflamd0.def_avatar_32.png', '1396512255', -1, 3499),
(71, 'complete_64.png', 1, 'qciznn01ky.complete_64.png', '1396515665', 1, 2067),
(72, 'folder_64.png', 1, 'rnr4okp9ov.folder_64.png', '1396677897', -1, 470),
(73, 'def_avatar_128.png', 1, '75pmirl6j6.def_avatar_128.png', '1396686369', -1, 5823);

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
(1, 1, 'Sarkesh', 'en_US', 'English - United States', '?plugin=users&action=register', 'info@sarkesh.org', 'gregorian', 'LTR'),
(2, 0, 'سرکش', 'fa_IR', 'فارسی - ایران', '?plugin=users&action=register', 'info@sarkesh.org', 'jallali', 'RTL');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `header` varchar(50) DEFAULT NULL,
  `direction` varchar(1) NOT NULL DEFAULT 'h',
  `position` varchar(50) NOT NULL,
  `localize` varchar(10) NOT NULL DEFAULT 'en_US',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `header`, `direction`, `position`, `localize`) VALUES
(1, 'home_menu', NULL, 'h', 'header', 'en_US'),
(3, 'home_menu', 'User Menu', 'v', 'sidebar1', 'en_US');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(11, 'files', 1, 0);

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
(5, 3, 'editor', '1'),
(6, 2, 'register', '1'),
(7, 3, 'bootstrap', '1'),
(8, 2, 'active_from_email', '1'),
(9, 2, 'default_permation', '2'),
(10, 5, 'template', 'simple'),
(11, 3, 'bootstrap_theme', 'bootstrap-theme'),
(12, 3, 'pace_theme', 'pace-theme-corner-indicator'),
(13, 2, 'register_captcha', '1'),
(14, 8, 'date_format', 'l jS \\of F Y h:i:s A'),
(15, 3, 'default_timezone', 'America/Los_Angeles'),
(16, 3, 'active_theme', 'blog');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `permission`, `validator`, `forget`, `last_login`) VALUES
(1, 'sarkesh', '621ac6ee82f8b66eea661745a05f96ef', 'info@sarkesh.org', 1, 43, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `validator`
--

INSERT INTO `validator` (`id`, `source`, `special_id`, `valid_time`) VALUES
(38, 'USERS_LOGIN', 'lt8n72wnub', '1396278409'),
(39, 'USERS_LOGIN', '2w83crc462', '1396552530'),
(40, 'USERS_LOGIN', 'mury4ymxnw', '1396590297'),
(41, 'USERS_LOGIN', '2z373wajoe', '1396874206'),
(42, 'USERS_LOGIN', 'paq2ivf5mn', '1397334024'),
(43, 'USERS_LOGIN', 'l2rfq2dqem', '1397334329');

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
