-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2012 at 07:59 PM
-- Server version: 5.0.96
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `irememberya`
--
CREATE DATABASE `irememberya` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `irememberya`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(256) NOT NULL,
  `type` varchar(128) default NULL,
  `size` varchar(128) default NULL,
  `industry` varchar(256) default NULL,
  `ticker` varchar(64) default NULL,
  `createdAt` timestamp NULL default NULL,
  `updatedAt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161879 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `idfeedback` int(11) NOT NULL auto_increment,
  `iduser` int(11) default NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `dateadded` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`idfeedback`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `logactions`
--

CREATE TABLE IF NOT EXISTS `logactions` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `action` varchar(32) NOT NULL,
  `arg1` varchar(256) default NULL,
  `arg2` varchar(256) default NULL,
  `notes` varchar(256) default NULL,
  `createdAt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=565 ;

-- --------------------------------------------------------

--
-- Table structure for table `logmessages`
--

CREATE TABLE IF NOT EXISTS `logmessages` (
  `id` int(11) NOT NULL auto_increment,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` varchar(1024) NOT NULL,
  `text` text NOT NULL,
  `createdAt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=279 ;

-- --------------------------------------------------------

--
-- Table structure for table `logshares`
--

CREATE TABLE IF NOT EXISTS `logshares` (
  `id` int(11) NOT NULL auto_increment,
  `from` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `message` text,
  `createdAt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `linkedin_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `summary` text,
  `startDate` date default NULL,
  `endDate` date default NULL,
  `isCurrent` tinyint(1) default NULL,
  `createdAt` timestamp NULL default NULL,
  `updatedAt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=473256 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL auto_increment,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `skill1` varchar(64) NOT NULL,
  `skill2` varchar(64) NOT NULL,
  `skill3` varchar(64) NOT NULL,
  `updatedAt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `createdAt` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=286 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills_history`
--

CREATE TABLE IF NOT EXISTS `skills_history` (
  `id` int(11) NOT NULL auto_increment,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `skill1` varchar(64) NOT NULL,
  `skill2` varchar(64) NOT NULL,
  `skill3` varchar(64) NOT NULL,
  `updatedAt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `createdAt` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=324 ;

-- --------------------------------------------------------

--
-- Table structure for table `skillslinkedin`
--

CREATE TABLE IF NOT EXISTS `skillslinkedin` (
  `id` int(11) NOT NULL auto_increment,
  `user_linkedin_id` varchar(64) NOT NULL,
  `skill` varchar(128) NOT NULL,
  `proficiency` varchar(32) default NULL,
  `years` int(11) default NULL,
  `updatedAt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `user_linkedin_id` (`user_linkedin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=263582 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL auto_increment,
  `level` int(11) NOT NULL,
  `description` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `linkedin_id` varchar(64) NOT NULL,
  `3sactive` tinyint(1) NOT NULL default '0',
  `email` varchar(512) default NULL,
  `username` varchar(256) default NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `headline` varchar(512) default NULL,
  `location` varchar(256) default NULL,
  `pictureUrl` varchar(512) default NULL,
  `publicProfileUrl` varchar(512) default NULL,
  `friendsLastUpdate` timestamp NULL default NULL,
  `createdAt` timestamp NULL default NULL,
  `updatedAt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `lastLoginAt` timestamp NULL default NULL,
  `skill1` varchar(64) default NULL,
  `skill2` varchar(64) default NULL,
  `skill3` varchar(64) default NULL,
  PRIMARY KEY  (`id`),
  KEY `linkedin_id` (`linkedin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80840 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_friends`
--

CREATE TABLE IF NOT EXISTS `users_friends` (
  `user_li_id` varchar(64) NOT NULL,
  `friend_li_id` varchar(64) NOT NULL,
  `note` varchar(256) default NULL,
  `invitation_sent` tinyint(4) default '0',
  `createdAt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_li_id`,`friend_li_id`),
  KEY `friend_li_id` (`friend_li_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_tasks`
--

CREATE TABLE IF NOT EXISTS `users_tasks` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `completedAt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`,`task_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `skills_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_friends`
--
ALTER TABLE `users_friends`
  ADD CONSTRAINT `users_friends_ibfk_1` FOREIGN KEY (`user_li_id`) REFERENCES `users` (`linkedin_id`),
  ADD CONSTRAINT `users_friends_ibfk_2` FOREIGN KEY (`friend_li_id`) REFERENCES `users` (`linkedin_id`);

--
-- Constraints for table `users_tasks`
--
ALTER TABLE `users_tasks`
  ADD CONSTRAINT `users_tasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `users_tasks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
