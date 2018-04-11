-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 06:25 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlh`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_and_info`
--

CREATE TABLE IF NOT EXISTS `app_and_info` (
  `info_Id` varchar(5) NOT NULL,
  `r_date` date NOT NULL,
  `app_v` varchar(5) NOT NULL,
  `v_features` varchar(10000) NOT NULL,
  `isPlayStore` varchar(1) NOT NULL,
  PRIMARY KEY (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_and_info`
--

INSERT INTO `app_and_info` (`info_Id`, `r_date`, `app_v`, `v_features`, `isPlayStore`) VALUES
('24857', '2017-06-01', '1.0.0', 'F1|F2|F3', 'N'),
('61131', '2017-08-01', '1.0.4', 'F1|F2|F3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `app_contacts`
--

CREATE TABLE IF NOT EXISTS `app_contacts` (
  `mobileNumber` varchar(15) NOT NULL,
  `email_Id` varchar(75) NOT NULL,
  PRIMARY KEY (`mobileNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_ftp_path`
--

CREATE TABLE IF NOT EXISTS `app_ftp_path` (
  `path_Id` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `URL` varchar(5000) NOT NULL,
  `addOn` date NOT NULL,
  `updatedOn` date NOT NULL,
  PRIMARY KEY (`path_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_ftp_path`
--

INSERT INTO `app_ftp_path` (`path_Id`, `name`, `URL`, `addOn`, `updatedOn`) VALUES
('001', 'MLH_001', 'None', '2017-05-11', '2017-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `area_history`
--

CREATE TABLE IF NOT EXISTS `area_history` (
  `area_Id` varchar(25) NOT NULL,
  `areadate` date NOT NULL,
  `area` varchar(25) NOT NULL,
  `t_users` int(11) NOT NULL,
  `t_unions` int(11) NOT NULL,
  `t_biz` int(11) NOT NULL,
  `o_move` int(11) NOT NULL,
  `c_move` int(11) NOT NULL,
  `t_move` int(11) NOT NULL,
  PRIMARY KEY (`area_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Area Statistics';

--
-- Dumping data for table `area_history`
--

INSERT INTO `area_history` (`area_Id`, `areadate`, `area`, `t_users`, `t_unions`, `t_biz`, `o_move`, `c_move`, `t_move`) VALUES
('1171636291413999823772375', '2017-08-15', 'L. B. Nagar', 0, 1, 0, 0, 0, 0),
('1731458363852738878997523', '2017-08-14', 'Kerala', 1, 0, 0, 0, 0, 0),
('1813231556517889353316384', '2017-08-15', 'Haveri', 0, 1, 0, 0, 0, 0),
('1859322888977975547652121', '2017-08-15', 'India', 0, 2, 0, 0, 0, 0),
('2864618118329394865797671', '2017-08-15', 'Telangana', 0, 1, 0, 0, 0, 0),
('2941361185337979525927479', '2017-08-15', 'North Goa', 0, 1, 0, 0, 0, 0),
('3352195782663634543913181', '2017-08-15', 'Gujarat', 0, 1, 0, 0, 0, 0),
('3885568348665469156268873', '2017-08-14', 'Nemmara', 1, 0, 0, 0, 0, 0),
('4278116126251649347427145', '2017-08-15', 'Karnataka', 0, 1, 0, 0, 0, 0),
('4492758325327599447196277', '2017-08-15', 'Porbandar', 0, 1, 0, 0, 0, 0),
('4571765297396971378889285', '2017-08-15', 'Goa', 0, 1, 0, 0, 0, 0),
('4691896925778536629488834', '2017-08-15', 'Hyderabad', 0, 1, 0, 0, 0, 0),
('4721949752612211526274154', '2017-08-15', 'Nizamabad', 0, 1, 0, 0, 0, 0),
('5233262463914776299733867', '2017-08-22', 'Malakpet', 1, 0, 0, 0, 0, 0),
('5271247429134642451799747', '2017-08-15', 'Hangal', 0, 1, 0, 0, 0, 0),
('5596697329176659935263426', '2017-08-15', 'Amberpet', 0, 1, 0, 0, 0, 0),
('5735767788321574176514917', '2017-08-15', 'Armur', 0, 1, 0, 0, 0, 0),
('6375535686293717133698269', '2017-08-14', 'Alathur', 1, 0, 0, 0, 0, 0),
('6417928633816717657445875', '2017-08-22', 'Telangana', 1, 0, 0, 0, 0, 0),
('7591782993148821551872333', '2017-08-15', 'Cumbarjua', 0, 1, 0, 0, 0, 0),
('7742313783956339547254494', '2017-08-22', 'India', 1, 0, 0, 0, 0, 0),
('8134353934131884743483642', '2017-08-14', 'India', 1, 0, 0, 0, 0, 0),
('8854838623697842645581367', '2017-08-15', 'Ranga Reddy District', 0, 1, 0, 0, 0, 0),
('9144714189156471837391446', '2017-08-15', 'Porbandar Region', 0, 1, 0, 0, 0, 0),
('9997249117431151119867147', '2017-08-22', 'Hyderabad', 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `area_stat`
--

CREATE TABLE IF NOT EXISTS `area_stat` (
  `area_Id` varchar(25) NOT NULL,
  `area` varchar(25) NOT NULL,
  `t_users` int(11) NOT NULL,
  `t_unions` int(11) NOT NULL,
  `t_biz` int(11) NOT NULL,
  `o_move` int(11) NOT NULL,
  `c_move` int(11) NOT NULL,
  `t_move` int(11) NOT NULL,
  PRIMARY KEY (`area_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Area Statistics';

--
-- Dumping data for table `area_stat`
--

INSERT INTO `area_stat` (`area_Id`, `area`, `t_users`, `t_unions`, `t_biz`, `o_move`, `c_move`, `t_move`) VALUES
('1265812546249668259851194', 'Gujarat', 0, 1, 0, 0, 0, 0),
('1633136123169881891159261', 'Malakpet', 1, 0, 0, 0, 0, 0),
('1779336391676675976252318', 'Karnataka', 0, 1, 0, 0, 0, 0),
('2884794675618621249961513', 'Amberpet', 0, 2, 0, 0, 0, 0),
('3655617735624499623484459', 'Nemmara', 1, 0, 0, 0, 0, 0),
('3769618469739282688138331', 'Hyderabad', 1, 2, 0, 0, 0, 0),
('4132754199287223683747474', 'Kerala', 1, 0, 0, 0, 0, 0),
('4282491367818197627285781', 'Porbandar Region', 0, 1, 0, 0, 0, 0),
('4354888859954457818416583', 'India', 2, 8, 0, 0, 0, 0),
('5389376274339169723335183', 'Cumbarjua', 0, 1, 0, 0, 0, 0),
('5587862919274476634795951', 'Alathur', 1, 0, 0, 0, 0, 0),
('5666969872354858654488168', 'Nizamabad', 0, 1, 0, 0, 0, 0),
('5929322194559722461464397', 'Armur', 0, 1, 0, 0, 0, 0),
('6247265196779587711564499', 'Hangal', 0, 1, 0, 0, 0, 0),
('6385687335659441611276883', 'Haveri', 0, 1, 0, 0, 0, 0),
('6632155672684546527289328', 'Porbandar', 0, 1, 0, 0, 0, 0),
('6676818127523786966876176', 'L. B. Nagar', 0, 2, 0, 0, 0, 0),
('7726227424334419787178522', 'Goa', 0, 1, 0, 0, 0, 0),
('8277296325231137532146735', 'North Goa', 0, 1, 0, 0, 0, 0),
('8821297163839916392856886', 'Telangana', 1, 5, 0, 0, 0, 0),
('8846884456692824735456834', 'Ranga Reddy District', 0, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `biz_account`
--

CREATE TABLE IF NOT EXISTS `biz_account` (
  `biz_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(5) NOT NULL,
  `subdomain_Id` varchar(5) NOT NULL,
  `bizname` varchar(45) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'ACTIVE/INACTIVE',
  PRIMARY KEY (`biz_Id`),
  KEY `admin_Id` (`admin_Id`),
  KEY `domain_Id` (`domain_Id`,`subdomain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biz_account`
--

INSERT INTO `biz_account` (`biz_Id`, `domain_Id`, `subdomain_Id`, `bizname`, `profile_pic`, `minlocation`, `location`, `state`, `country`, `created_On`, `admin_Id`, `status`) VALUES
('B1234', '', '', '', '', '', '', '', '', '2018-03-06 13:17:43', 'USR113561617186', '');

-- --------------------------------------------------------

--
-- Table structure for table `biz_lang`
--

CREATE TABLE IF NOT EXISTS `biz_lang` (
  `biz_Id` varchar(15) NOT NULL,
  `eng` varchar(1) NOT NULL,
  `tel` varchar(1) NOT NULL,
  PRIMARY KEY (`biz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Business Supportive languages';

-- --------------------------------------------------------

--
-- Table structure for table `biz_mkt`
--

CREATE TABLE IF NOT EXISTS `biz_mkt` (
  `biz_Id` varchar(15) NOT NULL,
  `mkt_Id` varchar(6) NOT NULL,
  `com_percent` double NOT NULL,
  `u_earn` double NOT NULL COMMENT 'Your Earnings',
  `s_earn` double NOT NULL COMMENT 'Site Earnings',
  `t_earn` double NOT NULL COMMENT 'Total Earnings',
  PRIMARY KEY (`biz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biz_pay_history`
--

CREATE TABLE IF NOT EXISTS `biz_pay_history` (
  `pay_Id` varchar(25) NOT NULL,
  `biz_Id` varchar(15) NOT NULL,
  `paytype` varchar(25) NOT NULL,
  `paid_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency` varchar(35) NOT NULL,
  `b_amount` double NOT NULL COMMENT 'before discount',
  `d_percent` double NOT NULL COMMENT 'discount percentage',
  `a_amount` double NOT NULL COMMENT 'after discount',
  `active_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active_upto` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pay_Id`),
  KEY `biz_Id` (`biz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biz_profile_geo`
--

CREATE TABLE IF NOT EXISTS `biz_profile_geo` (
  `biz_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`biz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biz_subscribe`
--

CREATE TABLE IF NOT EXISTS `biz_subscribe` (
  `subscribe_Id` varchar(15) NOT NULL,
  `biz_Id` varchar(15) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `subscribedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscribe_Id`),
  KEY `biz_Id` (`biz_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biz_subscribe`
--

INSERT INTO `biz_subscribe` (`subscribe_Id`, `biz_Id`, `user_Id`, `subscribedOn`) VALUES
('1', 'B1234', 'USR113561617186', '2018-03-06 13:27:04'),
('2', 'B1234', 'USR255798352927', '2018-03-06 13:27:04'),
('3', 'B1234', 'USR461726196865', '2018-03-06 13:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `cron_notify_user`
--

CREATE TABLE IF NOT EXISTS `cron_notify_user` (
  `cnotify_Id` varchar(15) NOT NULL,
  `notifyType` varchar(65) NOT NULL,
  `notify_Id` varchar(35) NOT NULL,
  `notify_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cnotify_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cron_notify_user`
--

INSERT INTO `cron_notify_user` (`cnotify_Id`, `notifyType`, `notify_Id`, `notify_ts`) VALUES
('111', 'BUSINESS_NEWSFEED', 'DUI1367419127383834463744', '2018-03-06 12:29:36'),
('C1233', 'STANDARD_HOOK_ALERT', 'MOV1234', '2018-03-07 11:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `dash_info_biz`
--

CREATE TABLE IF NOT EXISTS `dash_info_biz` (
  `info_Id` varchar(25) NOT NULL,
  `biz_Id` varchar(15) NOT NULL,
  `artTitle` varchar(250) NOT NULL,
  `artShrtDesc` varchar(1500) NOT NULL,
  `artDesc` varchar(10000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path_Id` varchar(5) NOT NULL,
  `images` varchar(10000) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`info_Id`),
  KEY `path_Id` (`path_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_biz`
--

INSERT INTO `dash_info_biz` (`info_Id`, `biz_Id`, `artTitle`, `artShrtDesc`, `artDesc`, `createdOn`, `path_Id`, `images`, `status`) VALUES
('DUI1367419127383834463744', 'B1234', '', '', '', '2018-03-06 13:19:41', '001', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dash_info_union`
--

CREATE TABLE IF NOT EXISTS `dash_info_union` (
  `info_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `artTitle` varchar(250) NOT NULL,
  `artShrtDesc` varchar(1500) NOT NULL,
  `artDesc` varchar(10000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` varchar(10000) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_union`
--

INSERT INTO `dash_info_union` (`info_Id`, `union_Id`, `artTitle`, `artShrtDesc`, `artDesc`, `createdOn`, `images`, `status`) VALUES
('DUI1367419127383834463744', 'UAI996769941529', 'My%20NewsFeed%20Title%20on%20Start%20A%20Free%20Trial', 'MY%20NewsFeed%20Short%20Summary%20on%20Start%20a%20Free%20Trial', '%3Cp%3EMY%20News%20Feed%20Short%20Summary%20on%20Start%20a%20Free%20Trial%20in%20describing%20News.%3C%2Fp%3E', '2018-01-26 09:44:43', 'https://randrtax.com/wp-content/themes/randr/images/900x300.png', 'ACTIVE'),
('DUI8962198129647727944827', 'UAI996769941529', 'Events%20News%20Feed%20Ground%20Work', 'Events%20News%20Feed%20Ground%20Work%20Short%20Summary', '%3Cp%3EEvents%20News%20Feed%20Ground%20Workascdcw%20eecwver%20rvrver%3C%2Fp%3E', '2017-12-12 09:44:51', 'https://randrtax.com/wp-content/themes/randr/images/900x300.png', 'ACTIVE'),
('DUI9173695655975266683967', 'UAI996769941529', 'My%20First%20NewsFeed', 'My%20First%20News%20Feed%20Short%20Summary', '%3Cp%3EMy%20First%20News%20Feed%26nbsp%3B%3Cspan%20style%3D%22color%3A%20rgb%2851%2C%2051%2C%2051%29%3B%20font-weight%3A%20bold%3B%22%3EDescribe%20News%3C%2Fspan%3E%3C%2Fp%3E', '2018-01-26 09:44:59', 'https://randrtax.com/wp-content/themes/randr/images/900x300.png', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `dash_info_user_fav`
--

CREATE TABLE IF NOT EXISTS `dash_info_user_fav` (
  `fav_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `newsType` varchar(10) NOT NULL COMMENT 'BUSINESS/UNION',
  PRIMARY KEY (`fav_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_user_fav`
--

INSERT INTO `dash_info_user_fav` (`fav_Id`, `info_Id`, `user_Id`, `newsType`) VALUES
('DIUF73177888713', 'DUI9173695655975266683967', 'USR461726196865', 'UNION'),
('DIUF82965942915', 'DUI8962198129647727944827', 'USR461726196865', 'UNION');

-- --------------------------------------------------------

--
-- Table structure for table `dash_info_user_likes`
--

CREATE TABLE IF NOT EXISTS `dash_info_user_likes` (
  `like_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `newsType` varchar(10) NOT NULL COMMENT 'BUSINESS/UNION',
  PRIMARY KEY (`like_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_user_likes`
--

INSERT INTO `dash_info_user_likes` (`like_Id`, `info_Id`, `user_Id`, `newsType`) VALUES
('DIUL81858252676', 'DUI8962198129647727944827', 'USR461726196865', 'UNION');

-- --------------------------------------------------------

--
-- Table structure for table `dash_info_user_views`
--

CREATE TABLE IF NOT EXISTS `dash_info_user_views` (
  `view_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `newsType` varchar(10) NOT NULL COMMENT 'BUSINESS/UNION',
  `viewedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`view_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_user_views`
--

INSERT INTO `dash_info_user_views` (`view_Id`, `info_Id`, `user_Id`, `newsType`, `viewedAt`) VALUES
('DIVW11674585425', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 20:25:56'),
('DIVW33797952592', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 20:43:52'),
('DIVW37664733314', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 21:03:21'),
('DIVW43551581627', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:36:52'),
('DIVW43872622389', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:27:27'),
('DIVW47971863442', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:35:39'),
('DIVW51825833564', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-01 16:58:29'),
('DIVW52941361185', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:31:16'),
('DIVW53394427724', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:30:05'),
('DIVW55269336446', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 21:07:16'),
('DIVW88827355738', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-01 07:04:08'),
('DIVW94379444386', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-07 04:20:50'),
('DIVW97137888928', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `dash_info_user_votes`
--

CREATE TABLE IF NOT EXISTS `dash_info_user_votes` (
  `vote_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `newsType` varchar(10) NOT NULL COMMENT 'BUSINESS/UNION',
  `vote` varchar(4) NOT NULL COMMENT 'UP/DOWN',
  PRIMARY KEY (`vote_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `user_Id_2` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_user_votes`
--

INSERT INTO `dash_info_user_votes` (`vote_Id`, `info_Id`, `user_Id`, `newsType`, `vote`) VALUES
('DIVO19345742385', 'DUI1367419127383834463744', 'USR461726196865', 'UNION', 'UP'),
('DIVO31219739677', 'DUI9173695655975266683967', 'USR461726196865', 'UNION', 'UP'),
('DIVO53116438424', 'DUI8962198129647727944827', 'USR461726196865', 'UNION', 'UP'),
('DIVO92856886884', 'DUI1367419127383834463744', 'USR113561617186', 'UNION', 'DOWN');

-- --------------------------------------------------------

--
-- Table structure for table `dash_move`
--

CREATE TABLE IF NOT EXISTS `dash_move` (
  `dmove_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `newsType` varchar(10) NOT NULL,
  PRIMARY KEY (`dmove_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_resp_history`
--

CREATE TABLE IF NOT EXISTS `dash_resp_history` (
  `resph_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL COMMENT 'dash_info primary key',
  `user_Id` varchar(15) NOT NULL,
  `notified_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `viewed_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`resph_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_view`
--

CREATE TABLE IF NOT EXISTS `dash_view` (
  `view_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `view_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`view_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_view_stat`
--

CREATE TABLE IF NOT EXISTS `dash_view_stat` (
  `viewstat_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `view_date` date NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`viewstat_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `info_Id_2` (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_vote`
--

CREATE TABLE IF NOT EXISTS `dash_vote` (
  `vote_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `vote_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_vote_stat`
--

CREATE TABLE IF NOT EXISTS `dash_vote_stat` (
  `votestat_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `vote_date` date NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`votestat_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `info_Id_2` (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dom_info`
--

CREATE TABLE IF NOT EXISTS `dom_info` (
  `domain_Id` varchar(15) NOT NULL,
  `t_users` int(11) NOT NULL COMMENT 'Total Users',
  `t_unions` int(11) NOT NULL,
  `t_move` int(11) NOT NULL COMMENT 'Total Movements',
  `o_move` int(11) NOT NULL COMMENT 'Open Movements',
  `c_move` int(11) NOT NULL COMMENT 'closed Movements',
  `t_signers` int(11) NOT NULL COMMENT 'Total Signers',
  PRIMARY KEY (`domain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dom_info`
--

INSERT INTO `dom_info` (`domain_Id`, `t_users`, `t_unions`, `t_move`, `o_move`, `c_move`, `t_signers`) VALUES
('', 0, 0, 0, 0, 0, 0),
('01-EDU-STUD', 0, 0, 0, 0, 0, 0),
('01-ITS-SN', 0, 0, 0, 0, 0, 0),
('01-MDA-PRES', 0, 0, 0, 0, 0, 0),
('01-STP-BAC', 0, 0, 0, 0, 0, 0),
('01-TPI', 0, 0, 0, 0, 0, 0),
('01-TPI-A', 0, 0, 0, 0, 0, 0),
('02-EDU', 0, 0, 0, 0, 0, 0),
('02-EDU-TCHR', 0, 0, 0, 0, 0, 0),
('02-STP-RE', 0, 0, 0, 0, 0, 0),
('02-TPI-B', 0, 0, 0, 0, 0, 0),
('03-MDA', 0, 0, 0, 0, 0, 0),
('03-STP-BPO', 0, 0, 0, 0, 0, 0),
('03-TPI-C', 0, 0, 0, 0, 0, 0),
('04-STP', 0, 0, 0, 0, 0, 0),
('04-STP-EDU', 0, 0, 0, 0, 0, 0),
('05-REL', 0, 0, 0, 0, 0, 0),
('05-STP-EAU', 0, 0, 0, 0, 0, 0),
('06-FIN', 0, 0, 0, 0, 0, 0),
('06-STP-FIN', 0, 0, 0, 0, 0, 0),
('07-AGR', 0, 0, 0, 0, 0, 0),
('07-STP-FAB', 0, 0, 0, 0, 0, 0),
('08-ACE', 0, 0, 0, 0, 0, 0),
('08-STP-HC', 0, 0, 0, 0, 0, 0),
('09-ITS', 0, 0, 0, 0, 0, 0),
('09-STP-IG', 0, 0, 0, 0, 0, 0),
('10-STP-MAP', 0, 0, 0, 0, 0, 0),
('11-STP-RS', 0, 0, 0, 0, 0, 0),
('12-STP-TCH', 0, 0, 0, 0, 0, 0),
('13-STP-TAA', 0, 0, 0, 0, 0, 0),
('14-STP-TAL', 0, 0, 0, 0, 0, 0),
('15-STP-TRL', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dom_role_history`
--

CREATE TABLE IF NOT EXISTS `dom_role_history` (
  `rhistory_Id` varchar(15) NOT NULL,
  `role_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `from_role` varchar(55) NOT NULL,
  `to_role` varchar(55) NOT NULL,
  `joined` varchar(1) NOT NULL,
  `updated` varchar(1) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`rhistory_Id`),
  KEY `to_role` (`to_role`),
  KEY `from_role` (`from_role`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dom_role_info`
--

CREATE TABLE IF NOT EXISTS `dom_role_info` (
  `role_Id` varchar(15) NOT NULL,
  `t_users` int(11) NOT NULL COMMENT 'Total Users',
  PRIMARY KEY (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dom_role_stat`
--

CREATE TABLE IF NOT EXISTS `dom_role_stat` (
  `rstat_Id` varchar(25) NOT NULL,
  `role_Id` varchar(15) NOT NULL,
  `area` varchar(25) NOT NULL,
  `role_date` date NOT NULL,
  `t_users` int(11) NOT NULL,
  PRIMARY KEY (`rstat_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dom_stat`
--

CREATE TABLE IF NOT EXISTS `dom_stat` (
  `dstat_Id` varchar(25) NOT NULL,
  `dom_date` date NOT NULL,
  `area` varchar(25) NOT NULL,
  `domain_Id` varchar(5) NOT NULL,
  `t_users` int(11) NOT NULL,
  `t_unions` int(11) NOT NULL,
  `o_move` int(11) NOT NULL COMMENT 'Open Movements',
  `c_move` int(11) NOT NULL COMMENT 'Close Movements',
  `signers` int(11) NOT NULL,
  PRIMARY KEY (`dstat_Id`),
  KEY `domain_Id` (`domain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `move_info`
--

CREATE TABLE IF NOT EXISTS `move_info` (
  `move_Id` varchar(8) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `petitionTitle` varchar(250) NOT NULL,
  `toA_pName1` varchar(60) NOT NULL,
  `toA_dd1` varchar(100) NOT NULL,
  `toA_pName2` varchar(60) NOT NULL,
  `toA_dd2` varchar(100) NOT NULL,
  `toA_pName3` varchar(60) NOT NULL,
  `toA_dd3` varchar(100) NOT NULL,
  `issue_desc` varchar(1000) NOT NULL,
  `issue_facedby` varchar(1000) NOT NULL,
  `expectedSolution` varchar(1000) NOT NULL,
  `move_img` varchar(1000) NOT NULL,
  `move_status` varchar(10) NOT NULL COMMENT 'NOTSTARTED/OPEN/CLOSED',
  `openOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`move_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Domain Movement';

--
-- Dumping data for table `move_info`
--

INSERT INTO `move_info` (`move_Id`, `union_Id`, `createdOn`, `petitionTitle`, `toA_pName1`, `toA_dd1`, `toA_pName2`, `toA_dd2`, `toA_pName3`, `toA_dd3`, `issue_desc`, `issue_facedby`, `expectedSolution`, `move_img`, `move_status`, `openOn`, `closedOn`) VALUES
('MOV1234', 'UAI996769941529', '2018-03-22 18:30:00', 'NGO Movement', '', '', '', '', '', '', '', '', '', '', '', '2018-03-22 18:30:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `move_sign`
--

CREATE TABLE IF NOT EXISTS `move_sign` (
  `sign_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`sign_Id`),
  KEY `move_Id` (`move_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `move_Id_2` (`move_Id`),
  KEY `user_Id_2` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `move_stat_deep`
--

CREATE TABLE IF NOT EXISTS `move_stat_deep` (
  `mstatdeep_Id` varchar(15) NOT NULL,
  `move_date` date NOT NULL,
  `t_signers` int(11) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  PRIMARY KEY (`mstatdeep_Id`),
  KEY `move_Id` (`move_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `move_stat_top`
--

CREATE TABLE IF NOT EXISTS `move_stat_top` (
  `mstattop_Id` varchar(15) NOT NULL,
  `move_date` date NOT NULL,
  `o_move` int(11) NOT NULL,
  `c_move` int(11) NOT NULL,
  `t_signers` int(11) NOT NULL,
  PRIMARY KEY (`mstattop_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srvy_info`
--

CREATE TABLE IF NOT EXISTS `srvy_info` (
  `srvy_Id` varchar(25) NOT NULL,
  `domain_Id` varchar(5) NOT NULL,
  `subdomain_Id` varchar(5) NOT NULL,
  `surveyor_Id` varchar(15) NOT NULL COMMENT 'Business/Union',
  `created_On` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `s_req_users` int(11) NOT NULL COMMENT 'Total Required Number of Users to close the Survey',
  `s_done` int(11) NOT NULL COMMENT 'Survey Done',
  `s_status` varchar(10) NOT NULL COMMENT 'OPEN/CLOSED/NOTSTARTED',
  `openOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `r_opt1` int(11) NOT NULL COMMENT 'Result Option 1',
  `r_opt2` int(11) NOT NULL COMMENT 'Result Option 2',
  `r_opt3` int(11) NOT NULL COMMENT 'Result Option 3',
  `r_opt4` int(11) NOT NULL COMMENT 'Result Option 4',
  `r_opt5` int(11) NOT NULL COMMENT 'Result Option 5',
  `r_opt6` int(11) NOT NULL COMMENT 'Result Option 6',
  `r_opt7` int(11) NOT NULL COMMENT 'Result Option 7',
  `r_opt8` int(11) NOT NULL COMMENT 'Result Option 8',
  `r_opt9` int(11) NOT NULL COMMENT 'Result Option 9',
  `r_opt10` int(11) NOT NULL COMMENT 'Result Option 10',
  PRIMARY KEY (`srvy_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each Survey info contains only one question';

-- --------------------------------------------------------

--
-- Table structure for table `srvy_info_stat`
--

CREATE TABLE IF NOT EXISTS `srvy_info_stat` (
  `sstat_Id` varchar(25) NOT NULL,
  `srvy_Id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `r_opt1` int(11) NOT NULL COMMENT 'Result Option 1',
  `r_opt2` int(11) NOT NULL COMMENT 'Result Option 2',
  `r_opt3` int(11) NOT NULL COMMENT 'Result Option 3',
  `r_opt4` int(11) NOT NULL COMMENT 'Result Option 4',
  `r_opt5` int(11) NOT NULL COMMENT 'Result Option 5',
  `r_opt6` int(11) NOT NULL COMMENT 'Result Option 6',
  `r_opt7` int(11) NOT NULL COMMENT 'Result Option 7',
  `r_opt8` int(11) NOT NULL COMMENT 'Result Option 8',
  `r_opt9` int(11) NOT NULL COMMENT 'Result Option 9',
  `r_opt10` int(11) NOT NULL COMMENT 'Result Option 10',
  PRIMARY KEY (`sstat_Id`),
  KEY `srvy_Id` (`srvy_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srvy_lang`
--

CREATE TABLE IF NOT EXISTS `srvy_lang` (
  `srvy_Id` varchar(25) NOT NULL,
  `eng` varchar(1) NOT NULL,
  `tel` varchar(1) NOT NULL,
  PRIMARY KEY (`srvy_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srvy_pay_history`
--

CREATE TABLE IF NOT EXISTS `srvy_pay_history` (
  `srvy_pay_Id` varchar(25) NOT NULL,
  `srvy_Id` varchar(25) NOT NULL,
  `paytype` varchar(25) NOT NULL,
  `paid_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency` varchar(35) NOT NULL,
  `b_amount` double NOT NULL COMMENT 'before discount',
  `d_percent` double NOT NULL,
  `a_amount` double NOT NULL COMMENT 'After discount',
  PRIMARY KEY (`srvy_pay_Id`),
  KEY `srvy_Id` (`srvy_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srvy_q_l_eng`
--

CREATE TABLE IF NOT EXISTS `srvy_q_l_eng` (
  `srvy_Id` varchar(25) NOT NULL,
  `question` varchar(50) NOT NULL,
  `opt1` varchar(30) NOT NULL COMMENT 'Option 1',
  `opt2` varchar(30) NOT NULL COMMENT 'Option 2',
  `opt3` varchar(30) NOT NULL COMMENT 'Option 3',
  `opt4` varchar(30) NOT NULL COMMENT 'Option 4',
  `opt5` varchar(30) NOT NULL COMMENT 'Option 5',
  `opt6` varchar(30) NOT NULL COMMENT 'Option 6',
  `opt7` varchar(30) NOT NULL COMMENT 'Option 7',
  `opt8` varchar(30) NOT NULL COMMENT 'Option 8',
  `opt9` varchar(30) NOT NULL COMMENT 'Option 9',
  `opt10` varchar(30) NOT NULL COMMENT 'Option 10',
  PRIMARY KEY (`srvy_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srvy_q_l_tel`
--

CREATE TABLE IF NOT EXISTS `srvy_q_l_tel` (
  `srvy_Id` varchar(25) NOT NULL,
  `question` varchar(50) NOT NULL,
  `opt1` varchar(30) NOT NULL COMMENT 'Option 1',
  `opt2` varchar(30) NOT NULL COMMENT 'Option 2',
  `opt3` varchar(30) NOT NULL COMMENT 'Option 3',
  `opt4` varchar(30) NOT NULL COMMENT 'Option 4',
  `opt5` varchar(30) NOT NULL COMMENT 'Option 5',
  `opt6` varchar(30) NOT NULL COMMENT 'Option 6',
  `opt7` varchar(30) NOT NULL COMMENT 'Option 7',
  `opt8` varchar(30) NOT NULL COMMENT 'Option 8',
  `opt9` varchar(30) NOT NULL COMMENT 'Option 9',
  `opt10` varchar(30) NOT NULL COMMENT 'Option 10',
  PRIMARY KEY (`srvy_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srvy_q_optusers`
--

CREATE TABLE IF NOT EXISTS `srvy_q_optusers` (
  `optInfo_Id` varchar(25) NOT NULL,
  `srvy_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`optInfo_Id`),
  KEY `srvy_Id` (`srvy_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_account`
--

CREATE TABLE IF NOT EXISTS `union_account` (
  `union_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `unionName` varchar(45) NOT NULL,
  `unionURLName` varchar(50) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`union_Id`),
  KEY `admin_Id` (`admin_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `admin_Id_2` (`admin_Id`),
  KEY `subdomain_Id` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_account`
--

INSERT INTO `union_account` (`union_Id`, `domain_Id`, `subdomain_Id`, `unionName`, `unionURLName`, `profile_pic`, `minlocation`, `location`, `state`, `country`, `created_On`, `admin_Id`) VALUES
('UAI321663747936', '02-EDU', '01-EDU-STUD', 'Sapthagiri LLB', 'sapthagiri-llb', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_43,y_43,w_553,h_553,z_0.1811,c_crop/v1513062452/23517423_124644751642331_5441382144061063536_n_szip6p.jpg', 'Bijapur City', 'Bijapur', 'Karnataka', 'India', '2018-01-20 15:01:04', 'USR461726196865'),
('UAI363543863775', '04-STP', '02-STP-RE', 'Maha Vikaas Nirman Maha Sena Sangam', 'maha-vikaas-nirman--maha-sena-sangam', 'https://res.cloudinary.com/dbcyhclaw/image/upload/w_150,c_scale/v1512374301/flags-500x500_est3vq.jpg', 'Gwalior Region', 'Gwalior', 'Madhya Pradesh', 'India', '2018-01-20 15:01:11', 'USR553425241674'),
('UAI428951365258', '02-EDU', '01-EDU-STUD', 'Akhila Bharatha Vidhya Sangam', 'bharat', 'https://res.cloudinary.com/dbcyhclaw/image/upload/w_150,c_scale/v1512473074/09_lb8o9m.jpg', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-01-20 15:01:18', 'USR553425241674'),
('UAI996769941529', '01-TPI', '01-TPI-A', 'Yuva Sena', 'yuva-sena', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_491,y_192,w_384,h_384,z_0.2604,c_crop/v1513026624/368383_SEilpnP_cvm0q7.jpg', 'Kochi', 'Ernakulam', 'Kerala', 'India', '2018-01-20 15:01:26', 'USR461726196865');

-- --------------------------------------------------------

--
-- Table structure for table `union_calndar`
--

CREATE TABLE IF NOT EXISTS `union_calndar` (
  `calendar_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `sch_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Schedule Timestamp',
  `sch_title` varchar(45) NOT NULL,
  `sch_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`calendar_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_lang`
--

CREATE TABLE IF NOT EXISTS `union_lang` (
  `union_Id` varchar(15) NOT NULL,
  `eng` varchar(1) NOT NULL,
  `tel` varchar(1) NOT NULL,
  PRIMARY KEY (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_lang`
--

INSERT INTO `union_lang` (`union_Id`, `eng`, `tel`) VALUES
('UAI321663747936', 'Y', 'Y'),
('UAI363543863775', 'Y', 'Y'),
('UAI428951365258', 'Y', 'Y'),
('UAI996769941529', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `union_mem`
--

CREATE TABLE IF NOT EXISTS `union_mem` (
  `member_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `roleName` varchar(20) NOT NULL,
  `isAdmin` varchar(1) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(8) NOT NULL COMMENT 'ONLINE/OFFLINE',
  PRIMARY KEY (`member_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_mem`
--

INSERT INTO `union_mem` (`member_Id`, `union_Id`, `user_Id`, `roleName`, `isAdmin`, `addedOn`, `status`) VALUES
('UMI219885596355', 'UAI321663747936', 'USR553425241674', 'Lawyers President', 'Y', '2018-03-05 16:33:03', ''),
('UMI253577958134', 'UAI996769941529', 'USR255798352927', 'President', 'Y', '2018-03-05 16:33:19', ''),
('UMI735922826293', 'UAI996769941529', 'USR113561617186', 'President', 'Y', '2018-03-05 16:33:12', ''),
('UMI858364269256', 'UAI996769941529', 'USR924357814934', 'President', 'Y', '2018-03-25 16:54:55', ''),
('UMI981526991557', 'UAI321663747936', 'USR626729797799', '', 'N', '2017-12-16 12:04:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `union_mem_chat`
--

CREATE TABLE IF NOT EXISTS `union_mem_chat` (
  `chat_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `msg_by` varchar(15) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msg` varchar(500) NOT NULL,
  PRIMARY KEY (`chat_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `msg_by` (`msg_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_mem_req`
--

CREATE TABLE IF NOT EXISTS `union_mem_req` (
  `request_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `req_from` varchar(15) NOT NULL,
  `req_to` varchar(15) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `req_from` (`req_from`),
  KEY `req_to` (`req_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_mem_stat`
--

CREATE TABLE IF NOT EXISTS `union_mem_stat` (
  `memstat_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `mem_date` date NOT NULL,
  `members` int(11) NOT NULL COMMENT 'Total members added on that day',
  PRIMARY KEY (`memstat_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_profile_geo`
--

CREATE TABLE IF NOT EXISTS `union_profile_geo` (
  `union_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_sup`
--

CREATE TABLE IF NOT EXISTS `union_sup` (
  `support_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `supportOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`support_Id`),
  KEY `union_Id` (`union_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_sup`
--

INSERT INTO `union_sup` (`support_Id`, `union_Id`, `user_Id`, `supportOn`) VALUES
('123', 'UAI996769941529', 'USR461726196865', '2018-03-05 16:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `union_sup_stat`
--

CREATE TABLE IF NOT EXISTS `union_sup_stat` (
  `supstat_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `sup_date` date NOT NULL,
  `supporters` int(11) NOT NULL,
  PRIMARY KEY (`supstat_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_Id` varchar(15) NOT NULL,
  `username` varchar(35) NOT NULL,
  `surName` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `mcountrycode` varchar(6) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `mob_val` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isAdmin` varchar(1) NOT NULL,
  `user_tz` varchar(35) NOT NULL,
  `acc_active` varchar(1) NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_Id`, `username`, `surName`, `name`, `mcountrycode`, `mobile`, `mob_val`, `dob`, `gender`, `profile_pic`, `minlocation`, `location`, `state`, `country`, `created_On`, `isAdmin`, `user_tz`, `acc_active`) VALUES
('USR113561617186', 'Achuth', 'Achuytham', 'Achuytham', '', '', 'N', '0000-00-00', '', ' http://192.168.1.4/mylocalhook/images/avatar/1.jpg', '', '', '', '', '2018-04-07 18:37:59', 'N', 'Asia/Kolkata', 'Y'),
('USR128879133554', 'Santosh', 'Ampani', 'Santosh Kumar', '+91', '9491034468', 'Y', '2018-04-07', 'MALE', 'http://192.168.1.4/mylocalhook/images/avatar/5.jpg', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-04-08 14:00:17', 'N', '', 'N'),
('USR255798352927', 'kittu', 'Nellutla', 'Nellutla Venkata Kishore', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/1.jpg', 'Ater', 'Bhind', 'Madhya Pradesh', 'India', '2018-04-07 18:38:14', 'N', 'Asia/Kolkata', 'Y'),
('USR273782437846', 'geetha', 'Nellutla', 'Geetha Rani ', '+91', '9291532292', 'Y', '2018-03-19', 'FEMALE', 'http://192.168.1.4/mylocalhook/images/avatar/12.jpg', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-07 18:40:02', 'N', '', 'Y'),
('USR461726196865', 'anupwefe', 'Nelwefl', 'eeffwee', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/1.jpg', 'Bijapur City', 'Bijapur', 'Karnataka', 'India', '2018-04-07 18:40:15', 'N', 'Asia/Kolkata', 'Y'),
('USR553425241674', 'anup123', 'Nellutlalnrao', 'Laxmi Narasimha', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/1.jpg', 'Devar Hippargi', 'Bijapur', 'Karnataka', 'India', '2018-04-07 18:40:26', 'N', 'Asia/Kolkata', 'Y'),
('USR571322289932', 'svsdv', 'vdv', 'e', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/1.jpg', '', '', '', '', '2018-04-07 18:40:34', 'N', 'Asia/Kolkata', 'Y'),
('USR626729797799', 'asifkhan', 'Shareef', 'Asif Khan', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/3.jpg', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-07 18:40:41', 'N', 'Asia/Kolkata', 'Y'),
('USR715494757975', 'asdwww', 'aasc', 'acedqw', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/2.jpg', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-04-07 18:40:48', 'N', 'Asia/Kolkata', 'Y'),
('USR751143828474', 'anup12345f3rjf', 'ahchjdc', 'DXX ENX', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/1.jpg', 'Raichur Rural', 'Raichur', 'Karnataka', 'India', '2018-04-07 18:40:58', 'N', 'Asia/Kolkata', 'Y'),
('USR755171938565', 'qwert123', 'asdf123', 'adxdfcdg', '', '', 'N', '0000-00-00', '', ' http://192.168.1.4/mylocalhook/images/avatar/5.jpg', 'Anantnag Region', 'Anantnag', 'Jammu And Kashmir', 'India', '2018-04-07 18:41:05', 'N', 'Asia/Kolkata', 'Y'),
('USR876657119297', 'k.adithya', 'Kankipati', 'adithya kankipati', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/6.jpg', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-07 18:41:12', 'N', 'Asia/Kolkata', 'Y'),
('USR916113175364', 'sde', 'wdqed', 'dqw', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/7.jpg', '', '', '', '', '2018-04-07 18:41:19', 'N', 'Asia/Kolkata', 'Y'),
('USR924357814934', 'anups', 'Nellutla', 'Anup Chakravarthi', '+91', '9160869337', 'Y', '2015-11-12', 'MALE', 'http://192.168.1.4/mylocalhook/images/avatar/3.jpg', 'Kuttanad', 'Mavelikara', 'Kerala', 'India', '2018-04-07 13:02:25', 'N', 'Asia/Kolkata', 'N'),
('USR947899367838', 'ascadcad', 'acdc', 'dqwdde', '', '', 'N', '0000-00-00', '', ' http://192.168.1.4/mylocalhook/images/avatar/8.jpg', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-04-07 18:41:26', 'N', 'Asia/Kolkata', 'Y'),
('USR984371315633', 'nellutlalnrao', 'NellutlaLNRao', 'AnupChakravarthi', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/3.jpg', 'Malappuram Region', 'Malappuram', 'Kerala', 'India', '2018-04-07 18:41:32', 'N', 'Asia/Kolkata', 'Y'),
('USR985685916147', 'ascasc', 'asc', 'cscc', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mylocalhook/images/avatar/2.jpg', 'Nandurbar', 'Nandurbar', 'Maharashtra', 'India', '2018-04-07 18:41:38', 'N', 'Asia/Kolkata', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_frnds`
--

CREATE TABLE IF NOT EXISTS `user_frnds` (
  `rel_Id` varchar(25) NOT NULL,
  `rel_from` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rel_tz` varchar(35) NOT NULL,
  `frnd1` varchar(15) NOT NULL,
  `frnd2` varchar(15) NOT NULL,
  `frnd1_call_frnd2` varchar(35) NOT NULL,
  `frnd2_call_frnd1` varchar(35) NOT NULL,
  PRIMARY KEY (`rel_Id`),
  KEY `frnd1` (`frnd1`,`frnd2`),
  KEY `frnd2` (`frnd2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_frnds`
--

INSERT INTO `user_frnds` (`rel_Id`, `rel_from`, `rel_tz`, `frnd1`, `frnd2`, `frnd1_call_frnd2`, `frnd2_call_frnd1`) VALUES
('FREL386847988282194576181', '2018-04-08 13:46:50', 'Asia/Kolkata', 'USR128879133554', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL733761537718959391538', '2018-04-07 18:20:19', 'Asia/Kolkata', 'USR924357814934', 'USR715494757975', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL887711391824254432678', '2018-04-08 13:46:54', 'Asia/Kolkata', 'USR553425241674', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend');

-- --------------------------------------------------------

--
-- Table structure for table `user_frnds_req`
--

CREATE TABLE IF NOT EXISTS `user_frnds_req` (
  `req_Id` varchar(25) NOT NULL,
  `from_userId` varchar(15) NOT NULL,
  `to_userId` varchar(15) NOT NULL,
  `usr_frm_call_to` varchar(35) NOT NULL,
  `usr_to_call_from` varchar(35) NOT NULL,
  `req_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `req_tz` varchar(35) NOT NULL,
  PRIMARY KEY (`req_Id`),
  KEY `from_userId` (`from_userId`,`to_userId`),
  KEY `to_userId_2` (`to_userId`),
  KEY `to_userId` (`to_userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(5) NOT NULL,
  `subdomain_Id` varchar(5) NOT NULL,
  `role_Id` varchar(8) NOT NULL,
  `t_req` varchar(5) NOT NULL COMMENT 'Total requests',
  `t_req_acpt` varchar(5) NOT NULL COMMENT 'Total requests Accepted',
  `t_req_pend` varchar(5) NOT NULL COMMENT 'Total requests Pending',
  `t_msg_io` varchar(5) NOT NULL COMMENT 'Total Msg sent and recieved',
  `t_msg_seen` varchar(5) NOT NULL COMMENT 'Total Recieved Messages',
  `t_msg_unseen` varchar(5) NOT NULL COMMENT 'Total Msgs unseen',
  `t_msg_sent` varchar(5) NOT NULL COMMENT 'Total Sent Msgs',
  `t_msg_del` varchar(5) NOT NULL COMMENT 'Total msg Deleted',
  PRIMARY KEY (`user_Id`),
  KEY `role_Id` (`role_Id`),
  KEY `domain_Id` (`domain_Id`,`subdomain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE IF NOT EXISTS `user_message` (
  `message_Id` varchar(15) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `from_Id` varchar(15) NOT NULL,
  `to_Id` varchar(15) NOT NULL,
  `message` varchar(500) NOT NULL,
  `seen` varchar(1) NOT NULL,
  PRIMARY KEY (`message_Id`),
  KEY `from_Id` (`from_Id`),
  KEY `to_Id` (`to_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_mkt`
--

CREATE TABLE IF NOT EXISTS `user_mkt` (
  `user_Id` varchar(15) NOT NULL,
  `mkt_Id` varchar(6) NOT NULL,
  `t_biz_done` int(11) NOT NULL,
  `t_earnings` double NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_mkt_stat`
--

CREATE TABLE IF NOT EXISTS `user_mkt_stat` (
  `mktstat_Id` varchar(25) NOT NULL,
  `mkt_Id` varchar(6) NOT NULL,
  `mkt_date` date NOT NULL,
  `com_percent` double NOT NULL COMMENT 'Commision Percentage',
  `biz_done` int(11) NOT NULL,
  `u_earn` double NOT NULL COMMENT 'Mkt_Earnings',
  `s_earn` double NOT NULL COMMENT 'Site Earnings',
  `t_earn` double NOT NULL COMMENT 'Total Earnings',
  PRIMARY KEY (`mktstat_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notify`
--

CREATE TABLE IF NOT EXISTS `user_notify` (
  `notify_Id` varchar(35) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `notifyHeader` varchar(300) NOT NULL,
  `notifyTitle` varchar(300) NOT NULL,
  `notifyMsg` varchar(300) NOT NULL,
  `notifyType` varchar(60) NOT NULL,
  `notifyURL` varchar(500) NOT NULL,
  `notify_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `watched` varchar(1) NOT NULL,
  `popup` varchar(1) NOT NULL,
  `req_accepted` varchar(1) NOT NULL,
  `cal_event_status` varchar(3) NOT NULL COMMENT 'IN/OUT',
  PRIMARY KEY (`notify_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notify`
--

INSERT INTO `user_notify` (`notify_Id`, `user_Id`, `notifyHeader`, `notifyTitle`, `notifyMsg`, `notifyType`, `notifyURL`, `notify_ts`, `watched`, `popup`, `req_accepted`, `cal_event_status`) VALUES
('CJUN19284933825', 'USR113561617186', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/MOV1234', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN26539618849', 'USR255798352927', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN39119565182', 'USR461726196865', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/MOV1234', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN41381797886', 'USR461726196865', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN45143867939', 'USR113561617186', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://192.168.1.4/mylocalhook/community/movement/MOV1234', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN46946265162', 'USR255798352927', ' posted in NewsFeed', '', '', 'BUSINESS_NEWSFEED', 'http://localhost/mylocalhook/app/news/business/DUI1367419127383834463744', '2018-03-06 12:29:36', 'N', '', '', ''),
('CJUN61578353735', 'USR113561617186', ' posted in NewsFeed', '', '', 'BUSINESS_NEWSFEED', 'http://localhost/mylocalhook/app/news/business/DUI1367419127383834463744', '2018-03-06 12:29:36', 'N', '', '', ''),
('CJUN62152113866', 'USR461726196865', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://192.168.1.4/mylocalhook/community/movement/MOV1234', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN62181955624', 'USR113561617186', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN68222197187', 'USR461726196865', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN71641992282', 'USR255798352927', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/MOV1234', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN75142497753', 'USR461726196865', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/app/community/movement/', '2018-03-06 14:29:42', 'N', '', '', ''),
('CJUN77715445392', 'USR113561617186', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/app/community/movement/', '2018-03-06 14:29:42', 'N', '', '', ''),
('CJUN86181842439', 'USR255798352927', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://192.168.1.4/mylocalhook/community/movement/MOV1234', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN89124618624', 'USR255798352927', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/app/community/movement/', '2018-03-06 14:29:42', 'N', '', '', ''),
('CJUN92533239112', 'USR255798352927', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT'),
('CJUN94693758358', 'USR461726196865', ' posted in NewsFeed', '', '', 'BUSINESS_NEWSFEED', 'http://localhost/mylocalhook/app/news/business/DUI1367419127383834463744', '2018-03-06 12:29:36', 'N', '', '', ''),
('CJUN99619388278', 'USR113561617186', 'Yuva Sena raised a Movement', 'NGO Movement', '', 'MOVEMENT_PARTICIPATION_REQUEST', 'http://localhost/mylocalhook/community/movement/', '2018-03-06 14:29:42', 'N', 'N', 'N', 'OUT');

-- --------------------------------------------------------

--
-- Table structure for table `user_phook_info`
--

CREATE TABLE IF NOT EXISTS `user_phook_info` (
  `phook_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `biz_union_Id` varchar(15) NOT NULL,
  `idtype` varchar(8) NOT NULL COMMENT 'BUSINESS/UNION',
  `target` int(11) NOT NULL,
  `price` double NOT NULL,
  `hookTitle` varchar(300) NOT NULL,
  `hookDesc` varchar(1000) NOT NULL,
  `hookImg` varchar(1000) NOT NULL,
  `pollquestion` varchar(1000) NOT NULL,
  `pollOpt01` varchar(100) NOT NULL,
  `pollOpt02` varchar(100) NOT NULL,
  `pollOpt03` varchar(100) NOT NULL,
  `pollOpt04` varchar(100) NOT NULL,
  `pollOpt05` varchar(100) NOT NULL,
  `pollOpt06` varchar(100) NOT NULL,
  `pollOpt07` varchar(100) NOT NULL,
  `pollOpt08` varchar(100) NOT NULL,
  `pollOpt09` varchar(100) NOT NULL,
  `pollOpt10` varchar(100) NOT NULL,
  `pollOpt11` varchar(100) NOT NULL,
  `pollOpt12` varchar(100) NOT NULL,
  `pollOpt13` varchar(100) NOT NULL,
  `pollOpt14` varchar(100) NOT NULL,
  `pollOpt15` varchar(100) NOT NULL,
  `pollOpt16` varchar(100) NOT NULL,
  `pollOpt17` varchar(100) NOT NULL,
  `pollOpt18` varchar(100) NOT NULL,
  `pollOpt19` varchar(100) NOT NULL,
  `pollOpt20` varchar(100) NOT NULL,
  `pollOpt21` varchar(100) NOT NULL,
  `pollOpt22` varchar(100) NOT NULL,
  `pollOpt23` varchar(100) NOT NULL,
  `pollOpt24` varchar(100) NOT NULL,
  `pollOpt25` varchar(100) NOT NULL,
  `pollusrchoose` varchar(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`phook_Id`),
  KEY `user_Id` (`user_Id`,`domain_Id`,`subdomain_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_phook_views`
--

CREATE TABLE IF NOT EXISTS `user_phook_views` (
  `view_Id` varchar(35) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `phook_Id` varchar(15) NOT NULL,
  `pollOpt01` varchar(1) NOT NULL,
  `pollOpt02` varchar(1) NOT NULL,
  `pollOpt03` varchar(1) NOT NULL,
  `pollOpt04` varchar(1) NOT NULL,
  `pollOpt05` varchar(1) NOT NULL,
  `pollOpt06` varchar(1) NOT NULL,
  `pollOpt07` varchar(1) NOT NULL,
  `pollOpt08` varchar(1) NOT NULL,
  `pollOpt09` varchar(1) NOT NULL,
  `pollOpt10` varchar(1) NOT NULL,
  `pollOpt11` varchar(1) NOT NULL,
  `pollOpt12` varchar(1) NOT NULL,
  `pollOpt13` varchar(1) NOT NULL,
  `pollOpt14` varchar(1) NOT NULL,
  `pollOpt15` varchar(1) NOT NULL,
  `pollOpt16` varchar(1) NOT NULL,
  `pollOpt17` varchar(1) NOT NULL,
  `pollOpt18` varchar(1) NOT NULL,
  `pollOpt19` varchar(1) NOT NULL,
  `pollOpt20` varchar(1) NOT NULL,
  `pollOpt21` varchar(1) NOT NULL,
  `pollOpt22` varchar(1) NOT NULL,
  `pollOpt23` varchar(1) NOT NULL,
  `pollOpt24` varchar(1) NOT NULL,
  `pollOpt25` varchar(1) NOT NULL,
  PRIMARY KEY (`view_Id`),
  KEY `user_Id` (`user_Id`,`phook_Id`),
  KEY `phook_Id` (`phook_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_geo`
--

CREATE TABLE IF NOT EXISTS `user_profile_geo` (
  `user_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_shook_info`
--

CREATE TABLE IF NOT EXISTS `user_shook_info` (
  `shook_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `hookTitle` varchar(250) NOT NULL,
  `hookdesc` varchar(1000) NOT NULL,
  `hookImg` varchar(1000) NOT NULL,
  `pollquestion` varchar(1000) NOT NULL,
  `pollOpt01` varchar(100) NOT NULL,
  `pollOpt02` varchar(100) NOT NULL,
  `pollOpt03` varchar(100) NOT NULL,
  `pollOpt04` varchar(100) NOT NULL,
  `pollOpt05` varchar(100) NOT NULL,
  `pollOpt06` varchar(100) NOT NULL,
  `pollOpt07` varchar(100) NOT NULL,
  `pollOpt08` varchar(100) NOT NULL,
  `pollOpt09` varchar(100) NOT NULL,
  `pollOpt10` varchar(100) NOT NULL,
  `pollOpt11` varchar(100) NOT NULL,
  `pollOpt12` varchar(100) NOT NULL,
  `pollOpt13` varchar(100) NOT NULL,
  `pollOpt14` varchar(100) NOT NULL,
  `pollOpt15` varchar(100) NOT NULL,
  `pollOpt16` varchar(100) NOT NULL,
  `pollOpt17` varchar(100) NOT NULL,
  `pollOpt18` varchar(100) NOT NULL,
  `pollOpt19` varchar(100) NOT NULL,
  `pollOpt20` varchar(100) NOT NULL,
  `pollOpt21` varchar(100) NOT NULL,
  `pollOpt22` varchar(100) NOT NULL,
  `pollOpt23` varchar(100) NOT NULL,
  `pollOpt24` varchar(100) NOT NULL,
  `pollOpt25` varchar(100) NOT NULL,
  `pollusrchoose` varchar(4) NOT NULL COMMENT 'ONE/MANY',
  PRIMARY KEY (`shook_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_shook_views`
--

CREATE TABLE IF NOT EXISTS `user_shook_views` (
  `frnds_Id` varchar(35) NOT NULL,
  `shook_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `pollOpt01` varchar(1) NOT NULL,
  `pollOpt02` varchar(1) NOT NULL,
  `pollOpt03` varchar(1) NOT NULL,
  `pollOpt04` varchar(1) NOT NULL,
  `pollOpt05` varchar(1) NOT NULL,
  `pollOpt06` varchar(1) NOT NULL,
  `pollOpt07` varchar(1) NOT NULL,
  `pollOpt08` varchar(1) NOT NULL,
  `pollOpt09` varchar(1) NOT NULL,
  `pollOpt10` varchar(1) NOT NULL,
  `pollOpt11` varchar(1) NOT NULL,
  `pollOpt12` varchar(1) NOT NULL,
  `pollOpt13` varchar(1) NOT NULL,
  `pollOpt14` varchar(1) NOT NULL,
  `pollOpt15` varchar(1) NOT NULL,
  `pollOpt16` varchar(1) NOT NULL,
  `pollOpt17` varchar(1) NOT NULL,
  `pollOpt18` varchar(1) NOT NULL,
  `pollOpt19` varchar(1) NOT NULL,
  `pollOpt20` varchar(1) NOT NULL,
  `pollOpt21` varchar(1) NOT NULL,
  `pollOpt22` varchar(1) NOT NULL,
  `pollOpt23` varchar(1) NOT NULL,
  `pollOpt24` varchar(1) NOT NULL,
  `pollOpt25` varchar(1) NOT NULL,
  PRIMARY KEY (`frnds_Id`),
  KEY `shook_Id` (`shook_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription`
--

CREATE TABLE IF NOT EXISTS `user_subscription` (
  `sub_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `sub_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subscription`
--

INSERT INTO `user_subscription` (`sub_Id`, `user_Id`, `domain_Id`, `subdomain_Id`, `sub_on`) VALUES
('USUB125876944443286742879', 'USR128879133554', '04-STP', '14-STP-TAL', '2018-04-07 12:54:23'),
('USUB128632553198354481133', 'USR128879133554', '01-TPI', '03-TPI-C', '2018-04-07 05:51:11'),
('USUB152284617948127596437', 'USR924357814934', '02-EDU', '02-EDU-TCHR', '2018-03-25 03:29:03'),
('USUB229222839875558991439', 'USR924357814934', '01-TPI', '03-TPI-C', '2018-03-25 03:29:01'),
('USUB237743647679927246618', 'USR128879133554', '04-STP', '09-STP-IG', '2018-04-07 12:54:18'),
('USUB246254459938953121229', 'USR924357814934', '04-STP', '02-STP-RE', '2018-03-25 04:38:03'),
('USUB247567151433471975317', 'USR128879133554', '04-STP', '08-STP-HC', '2018-04-07 12:54:17'),
('USUB268126326226743192936', 'USR128879133554', '02-EDU', '01-EDU-STUD', '2018-04-07 05:51:06'),
('USUB268535392969379981483', 'USR128879133554', '04-STP', '11-STP-RS', '2018-04-07 12:54:20'),
('USUB278745957197132734541', 'USR128879133554', '04-STP', '03-STP-BPO', '2018-04-07 12:54:12'),
('USUB283276326432235859768', 'USR128879133554', '01-TPI', '01-TPI-A', '2018-04-07 05:51:09'),
('USUB283461251894375399818', 'USR924357814934', '04-STP', '03-STP-BPO', '2018-03-25 04:38:04'),
('USUB317623395887982797213', 'USR924357814934', '04-STP', '06-STP-FIN', '2018-03-25 04:38:07'),
('USUB365334294314331789216', 'USR924357814934', '04-STP', '07-STP-FAB', '2018-03-25 04:38:08'),
('USUB423435357143248988763', 'USR128879133554', '01-TPI', '02-TPI-B', '2018-04-07 05:51:10'),
('USUB452276377276976922457', 'USR128879133554', '04-STP', '05-STP-EAU', '2018-04-07 12:54:14'),
('USUB477372647783411333423', 'USR924357814934', '01-TPI', '01-TPI-A', '2018-03-25 03:28:59'),
('USUB494145493924998141997', 'USR924357814934', '04-STP', '09-STP-IG', '2018-03-25 04:38:10'),
('USUB512859816449227376317', 'USR128879133554', '04-STP', '12-STP-TCH', '2018-04-07 12:54:21'),
('USUB543446888948415924997', 'USR924357814934', '04-STP', '08-STP-HC', '2018-03-25 04:38:09'),
('USUB553584716639535288566', 'USR128879133554', '03-MDA', '01-MDA-PRES', '2018-04-07 05:51:08'),
('USUB559549173743872622389', 'USR924357814934', '09-ITS', '01-ITS-SN', '2018-03-25 03:29:04'),
('USUB623156124955596562949', 'USR924357814934', '04-STP', '01-STP-BAC', '2018-03-25 04:38:02'),
('USUB623795623177672239289', 'USR128879133554', '04-STP', '01-STP-BAC', '2018-04-07 12:54:10'),
('USUB674131178449639188216', 'USR924357814934', '04-STP', '11-STP-RS', '2018-03-25 04:38:12'),
('USUB712268172498185651583', 'USR128879133554', '02-EDU', '02-EDU-TCHR', '2018-04-07 05:51:07'),
('USUB716612976574812566145', 'USR128879133554', '04-STP', '10-STP-MAP', '2018-04-07 12:54:19'),
('USUB728767893943149789817', 'USR128879133554', '04-STP', '13-STP-TAA', '2018-04-07 12:54:22'),
('USUB736173671933419554389', 'USR924357814934', '04-STP', '15-STP-TRL', '2018-03-25 04:38:16'),
('USUB759855348151712449477', 'USR924357814934', '07-AGR', '', '2018-03-25 04:38:55'),
('USUB773397492181575456772', 'USR924357814934', '04-STP', '12-STP-TCH', '2018-03-25 04:38:13'),
('USUB812914671727827896557', 'USR128879133554', '04-STP', '07-STP-FAB', '2018-04-07 12:54:16'),
('USUB828335279373791974147', 'USR924357814934', '04-STP', '13-STP-TAA', '2018-03-25 04:38:14'),
('USUB833166865727876352772', 'USR128879133554', '04-STP', '02-STP-RE', '2018-04-07 12:54:11'),
('USUB866876439884436144649', 'USR924357814934', '02-EDU', '01-EDU-STUD', '2018-03-25 03:29:02'),
('USUB873892591531583361986', 'USR924357814934', '01-TPI', '02-TPI-B', '2018-03-25 03:29:00'),
('USUB923431412529745862973', 'USR128879133554', '04-STP', '04-STP-EDU', '2018-04-07 12:54:13'),
('USUB925437763132269547948', 'USR128879133554', '04-STP', '06-STP-FIN', '2018-04-07 12:54:15'),
('USUB936624344356944687422', 'USR924357814934', '04-STP', '10-STP-MAP', '2018-03-25 04:38:11'),
('USUB936945211443886423167', 'USR924357814934', '04-STP', '14-STP-TAL', '2018-03-25 04:38:15'),
('USUB967332874149925586338', 'USR128879133554', '09-ITS', '01-ITS-SN', '2018-04-07 11:22:24'),
('USUB981596195946611596317', 'USR924357814934', '04-STP', '04-STP-EDU', '2018-03-25 04:38:05'),
('USUB985547989456789649559', 'USR128879133554', '04-STP', '15-STP-TRL', '2018-04-07 12:54:24'),
('USUB992364489561755993725', 'USR924357814934', '04-STP', '05-STP-EAU', '2018-03-25 04:38:06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biz_account`
--
ALTER TABLE `biz_account`
  ADD CONSTRAINT `biz_account_ibfk_2` FOREIGN KEY (`admin_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `biz_lang`
--
ALTER TABLE `biz_lang`
  ADD CONSTRAINT `biz_lang_ibfk_1` FOREIGN KEY (`biz_Id`) REFERENCES `biz_account` (`biz_Id`);

--
-- Constraints for table `biz_pay_history`
--
ALTER TABLE `biz_pay_history`
  ADD CONSTRAINT `biz_pay_history_ibfk_1` FOREIGN KEY (`biz_Id`) REFERENCES `biz_account` (`biz_Id`);

--
-- Constraints for table `biz_profile_geo`
--
ALTER TABLE `biz_profile_geo`
  ADD CONSTRAINT `biz_profile_geo_ibfk_1` FOREIGN KEY (`biz_Id`) REFERENCES `biz_account` (`biz_Id`);

--
-- Constraints for table `biz_subscribe`
--
ALTER TABLE `biz_subscribe`
  ADD CONSTRAINT `biz_subscribe_ibfk_1` FOREIGN KEY (`biz_Id`) REFERENCES `biz_account` (`biz_Id`),
  ADD CONSTRAINT `biz_subscribe_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dash_info_biz`
--
ALTER TABLE `dash_info_biz`
  ADD CONSTRAINT `dash_info_biz_ibfk_2` FOREIGN KEY (`path_Id`) REFERENCES `app_ftp_path` (`path_Id`);

--
-- Constraints for table `dash_info_user_fav`
--
ALTER TABLE `dash_info_user_fav`
  ADD CONSTRAINT `dash_info_user_fav_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dash_info_user_votes`
--
ALTER TABLE `dash_info_user_votes`
  ADD CONSTRAINT `dash_info_user_votes_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dash_resp_history`
--
ALTER TABLE `dash_resp_history`
  ADD CONSTRAINT `dash_resp_history_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `dash_info_biz` (`info_Id`),
  ADD CONSTRAINT `dash_resp_history_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dash_view`
--
ALTER TABLE `dash_view`
  ADD CONSTRAINT `dash_view_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `dash_info_biz` (`info_Id`),
  ADD CONSTRAINT `dash_view_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dash_view_stat`
--
ALTER TABLE `dash_view_stat`
  ADD CONSTRAINT `dash_view_stat_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `dash_info_biz` (`info_Id`);

--
-- Constraints for table `dash_vote`
--
ALTER TABLE `dash_vote`
  ADD CONSTRAINT `dash_vote_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `dash_info_biz` (`info_Id`),
  ADD CONSTRAINT `dash_vote_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dash_vote_stat`
--
ALTER TABLE `dash_vote_stat`
  ADD CONSTRAINT `dash_vote_stat_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `dash_info_biz` (`info_Id`);

--
-- Constraints for table `dom_role_history`
--
ALTER TABLE `dom_role_history`
  ADD CONSTRAINT `dom_role_history_ibfk_1` FOREIGN KEY (`from_role`) REFERENCES `dom_role_info` (`role_Id`),
  ADD CONSTRAINT `dom_role_history_ibfk_2` FOREIGN KEY (`to_role`) REFERENCES `dom_role_info` (`role_Id`),
  ADD CONSTRAINT `dom_role_history_ibfk_3` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `dom_stat`
--
ALTER TABLE `dom_stat`
  ADD CONSTRAINT `dom_stat_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info` (`domain_Id`);

--
-- Constraints for table `move_info`
--
ALTER TABLE `move_info`
  ADD CONSTRAINT `move_info_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

--
-- Constraints for table `move_sign`
--
ALTER TABLE `move_sign`
  ADD CONSTRAINT `move_sign_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`),
  ADD CONSTRAINT `move_sign_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `move_stat_deep`
--
ALTER TABLE `move_stat_deep`
  ADD CONSTRAINT `move_stat_deep_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`);

--
-- Constraints for table `srvy_info`
--
ALTER TABLE `srvy_info`
  ADD CONSTRAINT `srvy_info_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info` (`domain_Id`),
  ADD CONSTRAINT `srvy_info_ibfk_2` FOREIGN KEY (`subdomain_Id`) REFERENCES `dom_info` (`domain_Id`);

--
-- Constraints for table `srvy_info_stat`
--
ALTER TABLE `srvy_info_stat`
  ADD CONSTRAINT `srvy_info_stat_ibfk_1` FOREIGN KEY (`srvy_Id`) REFERENCES `srvy_info` (`srvy_Id`);

--
-- Constraints for table `srvy_lang`
--
ALTER TABLE `srvy_lang`
  ADD CONSTRAINT `srvy_lang_ibfk_1` FOREIGN KEY (`srvy_Id`) REFERENCES `srvy_info` (`srvy_Id`);

--
-- Constraints for table `srvy_pay_history`
--
ALTER TABLE `srvy_pay_history`
  ADD CONSTRAINT `srvy_pay_history_ibfk_1` FOREIGN KEY (`srvy_Id`) REFERENCES `srvy_info` (`srvy_Id`);

--
-- Constraints for table `srvy_q_l_eng`
--
ALTER TABLE `srvy_q_l_eng`
  ADD CONSTRAINT `srvy_q_l_eng_ibfk_1` FOREIGN KEY (`srvy_Id`) REFERENCES `srvy_info` (`srvy_Id`);

--
-- Constraints for table `srvy_q_l_tel`
--
ALTER TABLE `srvy_q_l_tel`
  ADD CONSTRAINT `srvy_q_l_tel_ibfk_1` FOREIGN KEY (`srvy_Id`) REFERENCES `srvy_info` (`srvy_Id`);

--
-- Constraints for table `srvy_q_optusers`
--
ALTER TABLE `srvy_q_optusers`
  ADD CONSTRAINT `srvy_q_optusers_ibfk_1` FOREIGN KEY (`srvy_Id`) REFERENCES `srvy_info` (`srvy_Id`),
  ADD CONSTRAINT `srvy_q_optusers_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `union_account`
--
ALTER TABLE `union_account`
  ADD CONSTRAINT `union_account_ibfk_1` FOREIGN KEY (`admin_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `union_account_ibfk_2` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info` (`domain_Id`),
  ADD CONSTRAINT `union_account_ibfk_3` FOREIGN KEY (`subdomain_Id`) REFERENCES `dom_info` (`domain_Id`);

--
-- Constraints for table `union_calndar`
--
ALTER TABLE `union_calndar`
  ADD CONSTRAINT `union_calndar_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

--
-- Constraints for table `union_lang`
--
ALTER TABLE `union_lang`
  ADD CONSTRAINT `union_lang_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

--
-- Constraints for table `union_mem`
--
ALTER TABLE `union_mem`
  ADD CONSTRAINT `union_mem_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_mem_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `union_mem_chat`
--
ALTER TABLE `union_mem_chat`
  ADD CONSTRAINT `union_mem_chat_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_mem_chat_ibfk_2` FOREIGN KEY (`msg_by`) REFERENCES `union_mem` (`member_Id`);

--
-- Constraints for table `union_mem_req`
--
ALTER TABLE `union_mem_req`
  ADD CONSTRAINT `union_mem_req_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_mem_req_ibfk_3` FOREIGN KEY (`req_to`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `union_mem_req_ibfk_4` FOREIGN KEY (`req_from`) REFERENCES `union_mem` (`member_Id`);

--
-- Constraints for table `union_mem_stat`
--
ALTER TABLE `union_mem_stat`
  ADD CONSTRAINT `union_mem_stat_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

--
-- Constraints for table `union_profile_geo`
--
ALTER TABLE `union_profile_geo`
  ADD CONSTRAINT `union_profile_geo_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

--
-- Constraints for table `union_sup`
--
ALTER TABLE `union_sup`
  ADD CONSTRAINT `union_sup_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_sup_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `union_sup_stat`
--
ALTER TABLE `union_sup_stat`
  ADD CONSTRAINT `union_sup_stat_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

--
-- Constraints for table `user_frnds`
--
ALTER TABLE `user_frnds`
  ADD CONSTRAINT `user_frnds_ibfk_1` FOREIGN KEY (`frnd1`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_frnds_ibfk_2` FOREIGN KEY (`frnd2`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_frnds_req`
--
ALTER TABLE `user_frnds_req`
  ADD CONSTRAINT `user_frnds_req_ibfk_1` FOREIGN KEY (`from_userId`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_frnds_req_ibfk_2` FOREIGN KEY (`to_userId`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `dom_role_info` (`role_Id`),
  ADD CONSTRAINT `user_info_ibfk_2` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info` (`domain_Id`),
  ADD CONSTRAINT `user_info_ibfk_4` FOREIGN KEY (`subdomain_Id`) REFERENCES `dom_info` (`domain_Id`);

--
-- Constraints for table `user_message`
--
ALTER TABLE `user_message`
  ADD CONSTRAINT `user_message_ibfk_1` FOREIGN KEY (`from_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_message_ibfk_2` FOREIGN KEY (`to_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_phook_info`
--
ALTER TABLE `user_phook_info`
  ADD CONSTRAINT `user_phook_info_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_phook_views`
--
ALTER TABLE `user_phook_views`
  ADD CONSTRAINT `user_phook_views_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_phook_views_ibfk_2` FOREIGN KEY (`phook_Id`) REFERENCES `user_phook_info` (`phook_Id`);

--
-- Constraints for table `user_profile_geo`
--
ALTER TABLE `user_profile_geo`
  ADD CONSTRAINT `user_profile_geo_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_shook_info`
--
ALTER TABLE `user_shook_info`
  ADD CONSTRAINT `user_shook_info_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_shook_views`
--
ALTER TABLE `user_shook_views`
  ADD CONSTRAINT `user_shook_views_ibfk_1` FOREIGN KEY (`shook_Id`) REFERENCES `user_shook_info` (`shook_Id`);

--
-- Constraints for table `user_subscription`
--
ALTER TABLE `user_subscription`
  ADD CONSTRAINT `user_subscription_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info` (`domain_Id`),
  ADD CONSTRAINT `user_subscription_ibfk_2` FOREIGN KEY (`subdomain_Id`) REFERENCES `dom_info` (`domain_Id`),
  ADD CONSTRAINT `user_subscription_ibfk_3` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
