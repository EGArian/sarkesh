-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2014 at 11:05 AM
-- Server version: 5.5.35-0ubuntu0.13.10.2
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
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `plugin_idx` (`plugin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `plugin`, `position`, `permations`, `pages`, `show_header`, `rank`) VALUES
(6, 'content', 3, 'content', NULL, NULL, 0, 0),
(7, 'login', 2, 'sidebar1', NULL, NULL, 0, 3),
(9, 'language_select', 4, 'sidebar1', NULL, NULL, 0, 1),
(10, 'forget_password', 2, 'off', NULL, NULL, NULL, 2);

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
  `direction` varchar(4) NOT NULL DEFAULT 'LTR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `localize`
--

INSERT INTO `localize` (`id`, `main`, `name`, `language`, `language_name`, `home`, `email`, `theme`, `direction`) VALUES
(1, 1, 'Sarkesh', 'en_US', 'English - United States', '?plugin=users&action=register', 'info@sarkesh.org', 'blog', 'LTR'),
(2, 0, 'سرکش', 'fa_IR', 'فارسی - ایران', '?plugin=users&action=register', 'info@sarkesh.org', 'blog', 'RTL');

-- --------------------------------------------------------

--
-- Table structure for table `permations`
--

CREATE TABLE IF NOT EXISTS `permations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permations`
--

INSERT INTO `permations` (`id`, `name`, `enable`) VALUES
(1, 'Administrators', 1),
(2, 'users', 1),
(3, 'Not activated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `enable`) VALUES
(1, 'permations', 1),
(2, 'users', 1),
(3, 'core', 1),
(4, 'languages', 1),
(5, 'email', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
(11, 3, 'bootstrap_theme', 'bootstrap-ubuntu'),
(12, 3, 'pace_theme', 'pace-theme-loading-bar');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `validator`, `forget`, `permation`, `last_login`) VALUES
(1, 'sarkesh', '7e9e169e32ebaadcbb2c73dacf82f8d3', 'alizadeh.babak@gmail.com', 465, 464, 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=465 ;

--
-- Dumping data for table `validator`
--

INSERT INTO `validator` (`id`, `source`, `special_id`, `valid_time`) VALUES
(370, 'USERS_ACTIVE', '9cl3d7rfp7', '1391507160'),
(371, 'USERS_ACTIVE', 'f98c1aq2na', '1391605949'),
(372, 'USERS_ACTIVE', 'pant4ntjw6', '1392265958'),
(374, 'USERS_FORGET', 'vw9yk9agby', '1392641362'),
(375, 'USERS_FORGET', '2gnfcq3tgt', '1392641873'),
(383, 'USERS_FORGET', '2wz7pe9671', '1392669037'),
(384, 'USERS_FORGET', 'ylimrt2kud', '1392669075'),
(385, 'USERS_FORGET', 'hh6dssqfp7', '1392669444'),
(386, 'USERS_FORGET', 'n60u1922ql', '1392669446'),
(387, 'USERS_FORGET', 'bbaamgqiub', '1392669447'),
(388, 'USERS_FORGET', 'tsqw4wn2kn', '1392669448'),
(389, 'USERS_FORGET', 'dhuhxupxzi', '1392669483'),
(390, 'USERS_FORGET', '2a1da0cqid', '1392669484'),
(391, 'USERS_FORGET', 'oa85xjwq05', '1392669485'),
(392, 'USERS_FORGET', 'yszoe8d5ey', '1392669495'),
(393, 'USERS_FORGET', 'imn458bm83', '1392669513'),
(394, 'USERS_FORGET', 'x7jbhleaf4', '1392669538'),
(395, 'USERS_FORGET', '88uris5xst', '1392669541'),
(396, 'USERS_FORGET', 'ofr047hshr', '1392669717'),
(397, 'USERS_FORGET', '9hfm9yg1ld', '1392669804'),
(398, 'USERS_FORGET', 'b3q5xmmqic', '1392670050'),
(399, 'USERS_FORGET', 'esuhzj2hic', '1392750439'),
(400, 'USERS_FORGET', '7kgqhwfv5k', '1392750459'),
(401, 'USERS_FORGET', '15q2vey5ew', '1392750601'),
(402, 'USERS_FORGET', '5k7qah2t9w', '1392750676'),
(403, 'USERS_FORGET', 'dchj6a8kyz', '1392750677'),
(404, 'USERS_FORGET', 'g88nqf69kv', '1392750741'),
(405, 'USERS_FORGET', 'cymkpw5d6y', '1392750775'),
(406, 'USERS_FORGET', 'm62igq856e', '1392751749'),
(407, 'USERS_FORGET', 'aymmz6p06k', '1392752612'),
(408, 'USERS_FORGET', 'jvcdis9s22', '1392752711'),
(409, 'USERS_FORGET', '1xdsqjmjfq', '1392752773'),
(410, 'USERS_FORGET', 'q8dn050owi', '1392752847'),
(411, 'USERS_FORGET', 'wzb7uc7a1t', '1392752908'),
(412, 'USERS_FORGET', '38hngeu4y6', '1392752909'),
(413, 'USERS_FORGET', '1apkmibmcn', '1392752910'),
(414, 'USERS_FORGET', 'k1zn7snoto', '1392753277'),
(415, 'USERS_FORGET', 'brmpunmk30', '1392753279'),
(416, 'USERS_FORGET', '82sife6lfm', '1392753291'),
(417, 'USERS_FORGET', '1imdfl7fne', '1392753636'),
(418, 'USERS_FORGET', 'z6z8kg07bu', '1392753637'),
(419, 'USERS_FORGET', 'bwcs1f53l4', '1392753655'),
(420, 'USERS_FORGET', 'nvn5xn1a7i', '1392753656'),
(421, 'USERS_FORGET', 'z633ln6q8a', '1392753865'),
(422, 'USERS_FORGET', 'zmgarla8b0', '1392753960'),
(423, 'USERS_FORGET', '5qr41c11cm', '1392753963'),
(424, 'USERS_FORGET', 'xc1grw7xjc', '1392754060'),
(425, 'USERS_FORGET', 'p00v8y9bbq', '1392754137'),
(426, 'USERS_FORGET', 'v0ncokxhew', '1392754294'),
(427, 'USERS_FORGET', 'j8ivjw0r3v', '1392754316'),
(428, 'USERS_FORGET', '4hb1jhymeo', '1392754381'),
(429, 'USERS_FORGET', 'apatozu2lu', '1392754493'),
(430, 'USERS_FORGET', 'mphssc2rnz', '1392754543'),
(431, 'USERS_FORGET', 'ok30narkh6', '1392754638'),
(432, 'USERS_FORGET', 'mnn5ap5a3d', '1392754674'),
(433, 'USERS_FORGET', '0ill29yod8', '1392755330'),
(434, 'USERS_FORGET', 'e0909cjegu', '1392756359'),
(435, 'USERS_FORGET', '5lnvo7js3b', '1392756460'),
(436, 'USERS_FORGET', 'lr0d6l1ele', '1392756502'),
(437, 'USERS_FORGET', '0ptb74pc64', '1392757521'),
(438, 'USERS_FORGET', 'v35s3svkxy', '1392759391'),
(439, 'USERS_FORGET', 'qeweieuprf', '1392791041'),
(440, 'USERS_FORGET', '97ccqis4wu', '1392794938'),
(441, 'USERS_FORGET', '589bm3hxoj', '1392795331'),
(442, 'USERS_FORGET', 'igx039a0sg', '1392795422'),
(443, 'USERS_FORGET', 'tboysi2hmq', '1392795424'),
(444, 'USERS_FORGET', 'gwehnygowt', '1392795643'),
(445, 'USERS_FORGET', '4o5rooe1qp', '1392795644'),
(446, 'USERS_FORGET', 'hruhxtoc44', '1392795852'),
(447, 'USERS_FORGET', 'o99gah42na', '1392795948'),
(448, 'USERS_FORGET', 'g4sxscxxhr', '1392795951'),
(449, 'USERS_FORGET', 'ny848fqfyu', '1392795952'),
(450, 'USERS_FORGET', 'zyueom2how', '1392795993'),
(451, 'USERS_FORGET', 'cv7fybyaz1', '1392796686'),
(452, 'USERS_FORGET', 'igr2uxd4kd', '1392796694'),
(453, 'USERS_FORGET', 'az8cmbqqn8', '1392796697'),
(454, 'USERS_FORGET', '6kfx3sdy52', '1392796704'),
(455, 'USERS_FORGET', 'zrfajezycz', '1392796804'),
(456, 'USERS_FORGET', '11kpim1amh', '1392796951'),
(457, 'USERS_FORGET', '2jonizewhg', '1392796952'),
(458, 'USERS_FORGET', '2r3r48zm00', '1392796966'),
(459, 'USERS_FORGET', 'ut02jpeiw6', '1392797003'),
(460, 'USERS_FORGET', 'webchgisuu', '1392797004'),
(461, 'USERS_FORGET', 'vzztbl0p97', '1392797027'),
(462, 'USERS_FORGET', 'ol5h6ys6mj', '1392797168'),
(463, 'USERS_FORGET', 'qd4mlqsnz4', '1392797216'),
(464, 'USERS_FORGET', 'atk2swvcka', '1392841637');

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
