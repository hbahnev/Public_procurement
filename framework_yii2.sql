-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2016 at 12:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `framework_yii2`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_number` int(11) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `deadline` datetime NOT NULL,
  `guarantee` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bulstat` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `Additional` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `isActive` enum('Yes','No') NOT NULL DEFAULT 'No',
  `filePath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contract_number` (`contract_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('create-contracts', '1', NULL),
('create-contracts', '3', NULL),
('create-contracts', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('create-contracts', 1, 'Allow user to create contracts', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `text` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `text`) VALUES
(1, 'First Blog', 'Blog mememee'),
(2, 'Second ', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `contractt`
--

CREATE TABLE IF NOT EXISTS `contractt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `price` decimal(19,2) NOT NULL,
  `deadline_complete` datetime NOT NULL,
  `deadline_application` datetime NOT NULL,
  `object` enum('Доставка','Строителство','Услуга','Other') NOT NULL,
  `contract_more` text NOT NULL,
  `guarantee` int(11) NOT NULL,
  `status` enum('Активен','Завършен','Замразен','В прогрес') NOT NULL,
  `annex` text NOT NULL,
  `checkout` enum('Предплата','Отложено','След свършване на проекта','Друг') NOT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `contractt`
--

INSERT INTO `contractt` (`id`, `title`, `price`, `deadline_complete`, `deadline_application`, `object`, `contract_more`, `guarantee`, `status`, `annex`, `checkout`, `filePath`) VALUES
(7, 'fsdfsdf', '33.00', '0000-00-00 00:00:00', '2016-08-10 00:00:00', 'Доставка', 'fsdfsdf', 15, 'В прогрес', 'fdsfsdfsdf', 'Предплата', NULL),
(25, 'test', '15.00', '2015-10-10 00:00:00', '2015-10-10 00:00:00', 'Строителство', 'фдгдфгдф', 15, 'В прогрес', 'гдфгдфгдфг', 'Отложено', 'uploads/Док.txt'),
(26, 'фсд фсд фсд ', '15.00', '2015-10-10 00:00:00', '2015-10-10 00:00:00', 'Строителство', 'fdsfsdfsd', 1551, 'В прогрес', 'gfdgdfgdf', 'Предплата', 'uploads/gym1.jpg'),
(27, 'Тестов договор', '3252.00', '2017-02-01 00:00:00', '2016-10-01 00:00:00', 'Услуга', 'gdsgsdgsdg', 15, 'Завършен', 'gfdgdfg', 'Отложено', 'uploads/Documentation.docx');

-- --------------------------------------------------------

--
-- Table structure for table `maintainers`
--

CREATE TABLE IF NOT EXISTS `maintainers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `obl` enum('Доставка','Стоителство','Услуга','') NOT NULL,
  `contract` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `maintainers`
--

INSERT INTO `maintainers` (`id`, `name`, `address`, `email`, `phone`, `obl`, `contract`) VALUES
(1, 'Пешо', 'Пешовски', 'nvjcompany@gmail', '555', 'Доставка', 'Договор 5');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1468478174),
('m130524_201442_init', 1468478211);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `isAdmin`, `created_at`, `updated_at`) VALUES
(1, 'nvjcompany', 'CKuCJb-cIpBsJIWTnvX_aPyqvELJD-IJ', '$2y$13$pQq6hwfzKwwql5JgO578W.84vW/R/JXF0baPAZhLeSNXGoiCv/ZIC', NULL, 'nvjcompany@gmail.com', 10, 1, 1468478254, 1468478254),
(2, '123321', 'f6nogkfrjA_6-QXitg9mypPRklKMWHhw', '$2y$13$mWErvQYvril6KbBsulonieFBXNKrw0XUdqt3rOT6WTk3i2SGehfI2', NULL, '123@abv.bg', 10, 0, 1469953364, 1469953364),
(3, 'nvjbulgaria', '6stcBpj__FWqHB9YEQTTcFBZFaV3YOYb', '$2y$13$PEND1lZ19yJm3avp4SNuIOdroXMi0ewGofS3Fo9eHzhFY452mVjsa', NULL, 'nvjbulgaria@abv.bg', 10, 1, 1470566496, 1470566496),
(4, 'tester', '0QC5iShttSJihOgM5f-evApbJRQCz2Bp', '$2y$13$Ax8aAMazzYP1Ghx4lDTUPe1UwSsbSdM3PvrwVffk43kXBc4WhjlgW', NULL, 'testesr@abv.bg', 10, 0, 1472194402, 1472194402),
(6, 'administrator', 'HA6unhuXIYgygCpZLyGh84LRLLVSIBOa', '$2y$13$rNn.POnbPTFEXKbRNTxJ/eMZxUmF3zNW04vxV1M3fNRHI8JnAe5PK', NULL, 'admin@admin.com', 10, 1, 1472911321, 1472911321),
(7, 'gallery', 'D2DeznHuEBMi8vspWuWQLUWqhV1ExixJ', '$2y$13$iC3VV7LhtCueDR8f6HLTxOKVmnCU7u/CfGkEYj1/XlIQLQ2OMBDJO', NULL, 'gallery@abv.bg', 10, 0, 1474129529, 1474129529);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`contract_number`) REFERENCES `contractt` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
