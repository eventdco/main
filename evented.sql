-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 20 日 00:40
-- 服务器版本: 5.5.25
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `evented`
--

-- --------------------------------------------------------

--
-- 表的结构 `Message`
--

CREATE TABLE `Message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_partyID` int(11) NOT NULL,
  `m_userID` int(11) NOT NULL,
  `m_content` text CHARACTER SET utf8 NOT NULL,
  `m_timestamp` datetime NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `m_partyID` (`m_partyID`,`m_userID`),
  KEY `m_userID` (`m_userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `Message`
--

INSERT INTO `Message` (`m_id`, `m_partyID`, `m_userID`, `m_content`, `m_timestamp`) VALUES
(1, 1, 1, 'abbbbc', '2013-10-19 16:01:52');

-- --------------------------------------------------------

--
-- 表的结构 `Party`
--

CREATE TABLE `Party` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_userID` int(11) NOT NULL,
  `p_plannerID` int(11) NOT NULL,
  `p_budget` int(11) NOT NULL,
  `p_type` int(11) NOT NULL,
  `p_people` int(11) NOT NULL,
  `p_description` text CHARACTER SET utf8 NOT NULL,
  `p_location` text CHARACTER SET utf8 NOT NULL,
  `p_time` datetime NOT NULL,
  `p_status` int(11) NOT NULL,
  `p_timestamp` datetime NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_userID` (`p_userID`,`p_plannerID`),
  KEY `p_plannerID` (`p_plannerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `Party`
--

INSERT INTO `Party` (`p_id`, `p_userID`, `p_plannerID`, `p_budget`, `p_type`, `p_people`, `p_description`, `p_location`, `p_time`, `p_status`, `p_timestamp`) VALUES
(1, 1, 1, 1, 5, 10, 'abcfweofewoi', 'taipei', '2013-10-01 00:00:00', 1, '2013-10-19 15:38:31'),
(2, 1, 1, 1, 5, 10, 'abcfweofewoi', 'taipei', '2013-10-01 00:00:00', 1, '2013-10-19 15:39:38');

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE `User` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `u_type` int(11) NOT NULL,
  `u_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `u_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `u_password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`u_id`, `u_name`, `u_type`, `u_email`, `u_phone`, `u_password`) VALUES
(1, 'Tim', 1, 'yunnnyunnn@hotmail.com', '12329088765', '12355');

--
-- 限制导出的表
--

--
-- 限制表 `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`m_partyID`) REFERENCES `Party` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`m_userID`) REFERENCES `User` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `Party`
--
ALTER TABLE `Party`
  ADD CONSTRAINT `Party_ibfk_2` FOREIGN KEY (`p_plannerID`) REFERENCES `User` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Party_ibfk_1` FOREIGN KEY (`p_userID`) REFERENCES `User` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
