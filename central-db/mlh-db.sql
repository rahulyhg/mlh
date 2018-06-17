-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2018 at 06:14 PM
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
-- Table structure for table `core_cookies`
--

CREATE TABLE IF NOT EXISTS `core_cookies` (
  `module` varchar(25) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `images` varchar(10000) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dash_info_biz`
--

INSERT INTO `dash_info_biz` (`info_Id`, `biz_Id`, `artTitle`, `artShrtDesc`, `artDesc`, `createdOn`, `images`, `status`) VALUES
('DUI1367419127383834463744', 'B1234', '', '', '', '2018-03-06 13:19:41', '', '');

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
('DIUL81732573294', 'DUI9173695655975266683967', 'USR924357814934', 'UNION'),
('DIUL81858252676', 'DUI8962198129647727944827', 'USR461726196865', 'UNION'),
('DIUL84253822285', 'DUI1367419127383834463744', 'USR924357814934', 'UNION');

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
('DIVW12726681427', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-28 15:21:01'),
('DIVW16147818824', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-06 14:57:15'),
('DIVW27239161176', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-01 17:00:40'),
('DIVW29913838591', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-28 15:24:52'),
('DIVW31783678898', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-21 09:35:13'),
('DIVW33797952592', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 20:43:52'),
('DIVW34644276776', 'DUI8962198129647727944827', 'USR924357814934', 'UNION', '2018-05-28 18:11:54'),
('DIVW37664733314', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 21:03:21'),
('DIVW42577677175', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-01 12:53:42'),
('DIVW43551581627', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:36:52'),
('DIVW43872622389', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:27:27'),
('DIVW47746856351', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-05 23:14:08'),
('DIVW47868634839', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-21 09:38:19'),
('DIVW47971863442', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:35:39'),
('DIVW51825833564', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-01 16:58:29'),
('DIVW52941361185', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:31:16'),
('DIVW53394427724', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:30:05'),
('DIVW55269336446', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 21:07:16'),
('DIVW75162683228', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-06 09:12:11'),
('DIVW78756317416', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-05 23:16:31'),
('DIVW79188567546', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-21 09:34:56'),
('DIVW84246965688', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-28 15:23:42'),
('DIVW88635758242', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-06 15:03:36'),
('DIVW88827355738', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-01 07:04:08'),
('DIVW94379444386', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-07 04:20:50'),
('DIVW97137888928', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-03-31 18:24:06'),
('DIVW97329176659', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-05-05 23:19:35'),
('DIVW99251461577', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', '2018-04-30 17:12:23');

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
('DIVO49131845397', 'DUI1367419127383834463744', 'USR924357814934', 'UNION', 'UP'),
('DIVO51548729934', 'DUI8962198129647727944827', 'USR924357814934', 'UNION', 'DOWN'),
('DIVO53116438424', 'DUI8962198129647727944827', 'USR461726196865', 'UNION', 'UP'),
('DIVO57776654736', 'DUI9173695655975266683967', 'USR924357814934', 'UNION', 'UP'),
('DIVO92856886884', 'DUI1367419127383834463744', 'USR113561617186', 'UNION', 'DOWN');

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
-- Table structure for table `dom_info_bak`
--

CREATE TABLE IF NOT EXISTS `dom_info_bak` (
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
-- Dumping data for table `dom_info_bak`
--

INSERT INTO `dom_info_bak` (`domain_Id`, `t_users`, `t_unions`, `t_move`, `o_move`, `c_move`, `t_signers`) VALUES
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
  `toA_pName4` varchar(60) NOT NULL,
  `toA_dd4` varchar(100) NOT NULL,
  `toA_pName5` varchar(60) NOT NULL,
  `toA_dd5` varchar(100) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `move_sign`
--

CREATE TABLE IF NOT EXISTS `move_sign` (
  `sign_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sign_Id`),
  KEY `move_Id` (`move_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `move_Id_2` (`move_Id`),
  KEY `user_Id_2` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_info`
--

CREATE TABLE IF NOT EXISTS `newsfeed_info` (
  `info_Id` varchar(25) NOT NULL,
  `bizUnionId` varchar(15) NOT NULL,
  `unionBranchId` varchar(25) NOT NULL,
  `artTitle` varchar(250) NOT NULL,
  `artShrtDesc` varchar(1500) NOT NULL,
  `artDesc` varchar(10000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` varchar(10000) NOT NULL,
  `newsFeedType` varchar(8) NOT NULL COMMENT 'BUSINESS/UNION',
  `displayLevel` varchar(25) NOT NULL COMMENT 'BRANCH_LEVEL/UNION_LEVEL/SUBDOMAIN_LEVEL/DOMAIN_LEVEL',
  `status` varchar(8) NOT NULL COMMENT 'ACTIVE/INACTIVE',
  PRIMARY KEY (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_move`
--

CREATE TABLE IF NOT EXISTS `newsfeed_move` (
  `nf_move_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  PRIMARY KEY (`nf_move_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `move_Id` (`move_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_fav`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_fav` (
  `nf_fav_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nf_fav_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_likes`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_likes` (
  `nf_like_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nf_like_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_views`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_views` (
  `view_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`view_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_votes`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_votes` (
  `vote_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `vote` varchar(4) NOT NULL COMMENT 'UP/DOWN',
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `user_Id` (`user_Id`)
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
-- Table structure for table `subs_dom_info`
--

CREATE TABLE IF NOT EXISTS `subs_dom_info` (
  `domain_Id` varchar(15) NOT NULL,
  `domainName` varchar(100) NOT NULL,
  PRIMARY KEY (`domain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_dom_info`
--

INSERT INTO `subs_dom_info` (`domain_Id`, `domainName`) VALUES
('01-TPI', 'Transportation'),
('02-EDU', 'Education'),
('03-MDA', 'Media'),
('04-STP', 'Startups'),
('05-REL', 'Religion'),
('06-FIN', 'Banking and Finance'),
('07-AGR', 'Agriculture'),
('08-ENT', 'Entertainment'),
('09-ITS', 'IT and Software');

-- --------------------------------------------------------

--
-- Table structure for table `subs_subdom_info`
--

CREATE TABLE IF NOT EXISTS `subs_subdom_info` (
  `subdomain_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomainName` varchar(100) NOT NULL,
  PRIMARY KEY (`subdomain_Id`),
  KEY `domain_Id` (`domain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_subdom_info`
--

INSERT INTO `subs_subdom_info` (`subdomain_Id`, `domain_Id`, `subdomainName`) VALUES
('EDU-01-STUD', '02-EDU', 'Students'),
('EDU-02-TCHR', '02-EDU', 'Teachers'),
('ENT-01-CIN', '08-ENT', 'Big Screen Cinema'),
('FIN-01-BNK', '06-FIN', 'Banking'),
('FIN-02-INS', '06-FIN', 'Insurance'),
('ITS-01-SN', '09-ITS', 'Social Network'),
('MDA-01-PRES', '03-MDA', 'Journalists'),
('REL-01-HIN', '05-REL', 'Hinduism'),
('REL-02-ISL', '05-REL', 'Islamic'),
('REL-03-CHR', '05-REL', 'Christianity'),
('STP-01-BAC', '04-STP', 'Building and Construction'),
('STP-02-RE', '04-STP', 'Real Estate'),
('STP-03-BPO', '04-STP', 'BPO'),
('STP-04-EDU', '04-STP', 'Education'),
('STP-05-EAU', '04-STP', 'Energy and Utilities'),
('STP-06-FIN', '04-STP', 'Finance'),
('STP-07-FAB', '04-STP', 'Food and Beverages'),
('STP-08-HC', '04-STP', 'Health Care'),
('STP-09-IG', '04-STP', 'Industrial Goods'),
('STP-10-MAP', '04-STP', 'Media and Publishing'),
('STP-11-RS', '04-STP', 'Retail Shops'),
('STP-12-TCH', '04-STP', 'Technology'),
('STP-13-TAA', '04-STP', 'Textiles and Apparel'),
('STP-14-TAL', '04-STP', 'Transportation and Logistics'),
('STP-15-TRL', '04-STP', 'Travel and Leisure'),
('TPI-01-A', '01-TPI', 'Auto'),
('TPI-02-B', '01-TPI', 'Bus'),
('TPI-03-C', '01-TPI', 'Cabs');

-- --------------------------------------------------------

--
-- Table structure for table `union_account`
--

CREATE TABLE IF NOT EXISTS `union_account` (
  `union_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `main_branch_Id` varchar(25) NOT NULL,
  `unionName` varchar(45) NOT NULL,
  `unionURLName` varchar(50) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`union_Id`),
  KEY `admin_Id` (`admin_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `admin_Id_2` (`admin_Id`),
  KEY `subdomain_Id` (`subdomain_Id`),
  KEY `main_branch_Id` (`main_branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_branch`
--

CREATE TABLE IF NOT EXISTS `union_branch` (
  `branch_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`branch_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `union_mem`
--

CREATE TABLE IF NOT EXISTS `union_mem` (
  `member_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `isAdmin` varchar(1) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(8) NOT NULL COMMENT 'ONLINE/OFFLINE',
  PRIMARY KEY (`member_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `union_mem_perm_branch`
--

CREATE TABLE IF NOT EXISTS `union_mem_perm_branch` (
  `branch_permission_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `branch_permissions` varchar(1) NOT NULL,
  `community_permissions` varchar(1) NOT NULL,
  `createRole` varchar(1) NOT NULL,
  `updateRole` varchar(1) NOT NULL,
  `DeleteRole` varchar(1) NOT NULL,
  `requestUsersToBeMembers` varchar(1) NOT NULL,
  `approveUsersToBeMembers` varchar(1) NOT NULL,
  `createNewsFeedBranchLevel` varchar(1) NOT NULL,
  `approveNewsFeedBranchLevel` varchar(1) NOT NULL,
  `createNewsFeedUnionLevel` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevel` varchar(1) NOT NULL,
  `createMovementBranchLevel` varchar(1) NOT NULL,
  `approveMovementBranchLevel` varchar(1) NOT NULL,
  `createMovementUnionLevel` varchar(1) NOT NULL,
  `approveMovementUnionLevel` varchar(1) NOT NULL,
  `createMovementSubDomainLevel` varchar(1) NOT NULL,
  `approveMovementSubDomainLevel` varchar(1) NOT NULL,
  `createMovementDomainLevel` varchar(1) NOT NULL,
  `approveMovementDomainLevel` varchar(1) NOT NULL,
  PRIMARY KEY (`branch_permission_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_mem_perm_union`
--

CREATE TABLE IF NOT EXISTS `union_mem_perm_union` (
  `union_permission_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `createABranch` varchar(1) NOT NULL,
  `updateBranchInfo` varchar(1) NOT NULL,
  `deleteBranch` varchar(1) NOT NULL,
  `shiftMainBranch` varchar(1) NOT NULL,
  `createNewsFeedUnionLevel` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevel` varchar(1) NOT NULL,
  `createMovementUnionLevel` varchar(1) NOT NULL,
  `approveMovementUnionLevel` varchar(1) NOT NULL,
  `createMovementsubdomainLevel` varchar(1) NOT NULL,
  `approveMovementsubdomainLevel` varchar(1) NOT NULL,
  PRIMARY KEY (`union_permission_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_mem_req`
--

CREATE TABLE IF NOT EXISTS `union_mem_req` (
  `request_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `req_from` varchar(15) NOT NULL,
  `req_to` varchar(15) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `req_from` (`req_from`),
  KEY `req_to` (`req_to`),
  KEY `branch_Id` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_mem_roles`
--

CREATE TABLE IF NOT EXISTS `union_mem_roles` (
  `role_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `roleName` varchar(60) NOT NULL,
  PRIMARY KEY (`role_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`)
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
  `branch_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `supportOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`support_Id`),
  KEY `union_Id` (`union_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `branch_Id` (`branch_Id`)
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
  `about_me` varchar(2000) NOT NULL,
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

INSERT INTO `user_account` (`user_Id`, `username`, `surName`, `name`, `mcountrycode`, `mobile`, `mob_val`, `dob`, `gender`, `profile_pic`, `about_me`, `minlocation`, `location`, `state`, `country`, `created_On`, `isAdmin`, `user_tz`, `acc_active`) VALUES
('USR113561617186', 'Achuth', 'Achuytham', 'Achuytham', '+91', '9160896337', 'Y', '2018-06-06', 'MALE', ' http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Parvathipuram', 'Araku', 'Andhra Pradesh', 'India', '2018-06-01 12:11:29', 'N', 'Asia/Kolkata', 'Y'),
('USR128879133554', 'Santosh', 'Santhu', 'Santo', '+91', '9491034468', 'Y', '2018-04-07', 'MALE', 'http://192.168.1.4/mlh/android-web/images/avatar/5.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-06-01 11:06:13', 'N', '', 'Y'),
('USR255798352927', 'Saiteja', 'Srirambhatla', 'Saiteja', '+91', '9581929584', 'Y', '1996-08-16', 'MALE', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-06-10 07:52:25', 'N', 'Asia/Kolkata', 'Y'),
('USR273782437846', 'geetha', 'Nellutla', 'Geetha Rani ', '+91', '9291532292', 'Y', '2018-03-19', 'FEMALE', 'http://192.168.1.4/mlh/android-web/images/avatar/12.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-21 05:18:41', 'N', '', 'Y'),
('USR461726196865', 'anupwefe', 'Nelwefl', 'eeffwee', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Bijapur City', 'Bijapur', 'Karnataka', 'India', '2018-04-21 05:18:47', 'N', 'Asia/Kolkata', 'Y'),
('USR473525687856', 'Raju', 'Rajendra', 'Raju', '+91', '9912995327', 'Y', '2009-10-14', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_293,y_133,w_694,h_694,z_0.1296,c_crop/v1526192946/IMG-20171019-WA0054_vexsaw.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-05-13 06:29:07', 'N', 'Asia/Kolkata', 'Y'),
('USR553425241674', 'anup123', 'Nellutlalnrao', 'Laxmi Narasimha', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Devar Hippargi', 'Bijapur', 'Karnataka', 'India', '2018-04-21 05:18:53', 'N', 'Asia/Kolkata', 'Y'),
('USR571322289932', 'svsdv', 'vdv', 'e', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', '', '', '', '', '2018-04-21 05:18:59', 'N', 'Asia/Kolkata', 'Y'),
('USR626729797799', 'asifkhan', 'Shareef', 'Asif Khan', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/3.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-21 05:19:05', 'N', 'Asia/Kolkata', 'Y'),
('USR715494757975', 'asdwww', 'aasc', 'acedqw', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/2.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-04-21 05:19:12', 'N', 'Asia/Kolkata', 'Y'),
('USR751143828474', 'anup12345f3rjf', 'ahchjdc', 'DXX ENX', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Raichur Rural', 'Raichur', 'Karnataka', 'India', '2018-04-21 05:19:17', 'N', 'Asia/Kolkata', 'Y'),
('USR755171938565', 'qwert123', 'asdf123', 'adxdfcdg', '', '', 'N', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/images/avatar/5.jpg', '', 'Anantnag Region', 'Anantnag', 'Jammu And Kashmir', 'India', '2018-04-21 05:19:29', 'N', 'Asia/Kolkata', 'Y'),
('USR862369784264', 'Sai teja', 'Tej Sai Teja ', 'Sai Teja ', '+91', '9581136564', 'Y', '2000-11-30', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_60,y_260,w_1080,h_1080,z_0.0833,c_crop/v1525800009/IMG_20180507_191759_y3yqnz.jpg', '', 'Wanaparthy', 'Mahbubnagar', 'Telangana', 'India', '2018-05-08 17:20:17', 'N', '', 'Y'),
('USR876657119297', 'k.adithya', 'Kankipati', 'adithya kankipati', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/6.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-21 05:19:34', 'N', 'Asia/Kolkata', 'Y'),
('USR916113175364', 'sde', 'wdqed', 'dqw', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/7.jpg', '', '', '', '', '', '2018-04-21 05:19:39', 'N', 'Asia/Kolkata', 'Y'),
('USR924357814934', 'anups', 'Nellutla123', 'Anup Chakravarthi', '+91', '9160869337', 'Y', '2015-11-12', 'MALE', 'http://192.168.1.4/mlh/android-web/images/avatar/3.jpg', '', 'Kuttanad', 'Mavelikara', 'Kerala', 'India', '2018-06-09 15:23:44', 'N', 'Asia/Kolkata', 'Y'),
('USR947899367838', 'ascadcad', 'acdc', 'dqwdde', '', '', 'N', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/images/avatar/8.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-04-21 05:19:59', 'N', 'Asia/Kolkata', 'Y'),
('USR984371315633', 'nellutlalnrao', 'NellutlaLNRao', 'AnupChakravarthi', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/3.jpg', '', 'Malappuram Region', 'Malappuram', 'Kerala', 'India', '2018-04-21 05:20:05', 'N', 'Asia/Kolkata', 'Y'),
('USR985685916147', 'ascasc', 'asc', 'cscc', '', '', 'N', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/2.jpg', '', 'Nandurbar', 'Nandurbar', 'Maharashtra', 'India', '2018-04-21 05:20:09', 'N', 'Asia/Kolkata', 'Y');

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
('FREL113163289416289671228', '2018-06-02 17:37:48', 'Asia/Kolkata', 'USR255798352927', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL187387334177284141946', '2018-06-01 17:39:27', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL216621668146357997868', '2018-06-01 18:16:28', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL323942158692231274458', '2018-06-02 18:04:18', 'Asia/Kolkata', 'USR461726196865', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL355323199734657944622', '2018-06-01 18:16:06', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL373546946265162946937', '2018-06-01 17:43:46', 'Asia/Kolkata', 'USR626729797799', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL398295761324325863596', '2018-06-01 18:15:11', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL418662147654876157835', '2018-06-01 17:40:47', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL443354954136494138944', '2018-06-01 17:39:44', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL465592416562739371251', '2018-06-01 17:37:07', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL473477679165452365849', '2018-06-01 18:16:20', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL492875446517343162711', '2018-06-02 18:15:37', 'Asia/Kolkata', 'USR473525687856', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL582849374534951452184', '2018-06-01 17:39:39', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL583581511597759711768', '2018-06-01 17:47:41', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL733761537718959391538', '2018-04-07 18:20:19', 'Asia/Kolkata', 'USR924357814934', 'USR715494757975', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL742155929929149896838', '2018-06-01 18:16:24', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
('FREL755933712817918856754', '2018-06-01 17:41:52', 'Asia/Kolkata', 'USR255798352927', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend'),
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

--
-- Dumping data for table `user_frnds_req`
--

INSERT INTO `user_frnds_req` (`req_Id`, `from_userId`, `to_userId`, `usr_frm_call_to`, `usr_to_call_from`, `req_on`, `req_tz`) VALUES
('FREQ131471494383972471526', 'USR924357814934', 'USR128879133554', 'My LocalHook Friend', '', '2018-06-02 18:05:14', ''),
('FREQ166991197716757357414', 'USR113561617186', 'USR128879133554', 'My LocalHook Friend', '', '2018-06-01 13:00:34', ''),
('FREQ176748496639515293966', 'USR113561617186', 'USR924357814934', 'My LocalHook Friend', '', '2018-06-01 10:59:12', ''),
('FREQ187884522278229519357', 'USR113561617186', 'USR553425241674', 'My LocalHook Friend', '', '2018-06-01 12:45:05', ''),
('FREQ225716379726455649186', 'USR113561617186', 'USR461726196865', 'My LocalHook Friend', '', '2018-06-01 12:44:19', ''),
('FREQ351264184133736277864', 'USR924357814934', 'USR461726196865', 'My LocalHook Friend', '', '2018-06-02 18:02:14', ''),
('FREQ444413517669158994848', 'USR113561617186', 'USR473525687856', 'My LocalHook Friend', '', '2018-06-01 12:45:14', ''),
('FREQ468776991962435817861', 'USR924357814934', 'USR255798352927', 'My LocalHook Friend', '', '2018-06-02 06:45:57', ''),
('FREQ712353652172731245879', 'USR113561617186', 'USR571322289932', 'My LocalHook Friend', '', '2018-06-01 12:46:31', ''),
('FREQ766335313762498154755', 'USR924357814934', 'USR273782437846', 'My LocalHook Friend', '', '2018-06-02 18:02:10', ''),
('FREQ952367994569533346233', 'USR924357814934', 'USR473525687856', 'My LocalHook Friend', '', '2018-06-02 18:02:18', '');

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
  `from_Id` varchar(15) NOT NULL,
  `notifyHeader` varchar(300) NOT NULL,
  `notifyTitle` varchar(300) NOT NULL,
  `notifyMsg` varchar(300) NOT NULL,
  `notifyType` varchar(60) NOT NULL,
  `notifyURL` varchar(500) NOT NULL,
  `notify_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `watched` varchar(1) NOT NULL,
  `popup` varchar(1) NOT NULL,
  `req_accepted` varchar(1) NOT NULL,
  `cal_event` varchar(1) NOT NULL COMMENT 'YES/NO',
  PRIMARY KEY (`notify_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notify`
--

INSERT INTO `user_notify` (`notify_Id`, `user_Id`, `from_Id`, `notifyHeader`, `notifyTitle`, `notifyMsg`, `notifyType`, `notifyURL`, `notify_ts`, `watched`, `popup`, `req_accepted`, `cal_event`) VALUES
('UNOT1368378364537488446123991877491', 'USR924357814934', 'UAI321663747936', '', '', '', 'COMMUNITY_MEMBERSHIP_REQUEST', 'http://192.168.43.47/mlh/android-web/app/notifications?notifyAction=NOTIFY_REQUEST_COMMUNITY', '2018-06-04 05:47:14', 'N', 'N', 'N', 'N'),
('UNOT9722679339491337613632338869315', 'USR924357814934', 'USR924357814934', '', '', '', 'PEOPLE_RELATIONSHIP_REQUEST', 'http://192.168.43.47/mlh/android-web/app/notifications?notifyAction=NOTIFY_REQUEST_PEOPLE', '2018-06-04 05:47:07', 'N', 'N', 'N', 'N');

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
('SUBUSR9243578149341330000', 'USR924357814934', '02-EDU', 'EDU-01-STUD', '2018-06-17 16:53:55'),
('SUBUSR9243578149341330001', 'USR924357814934', '02-EDU', 'EDU-02-TCHR', '2018-06-17 16:53:55');

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
  ADD CONSTRAINT `dom_stat_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info_bak` (`domain_Id`);

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
-- Constraints for table `newsfeed_move`
--
ALTER TABLE `newsfeed_move`
  ADD CONSTRAINT `newsfeed_move_ibfk_2` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`),
  ADD CONSTRAINT `newsfeed_move_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_fav`
--
ALTER TABLE `newsfeed_user_fav`
  ADD CONSTRAINT `newsfeed_user_fav_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_user_fav_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `newsfeed_user_likes`
--
ALTER TABLE `newsfeed_user_likes`
  ADD CONSTRAINT `newsfeed_user_likes_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `newsfeed_user_likes_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_views`
--
ALTER TABLE `newsfeed_user_views`
  ADD CONSTRAINT `newsfeed_user_views_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `newsfeed_user_views_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_votes`
--
ALTER TABLE `newsfeed_user_votes`
  ADD CONSTRAINT `newsfeed_user_votes_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `newsfeed_user_votes_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `srvy_info`
--
ALTER TABLE `srvy_info`
  ADD CONSTRAINT `srvy_info_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info_bak` (`domain_Id`),
  ADD CONSTRAINT `srvy_info_ibfk_2` FOREIGN KEY (`subdomain_Id`) REFERENCES `dom_info_bak` (`domain_Id`);

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
-- Constraints for table `subs_subdom_info`
--
ALTER TABLE `subs_subdom_info`
  ADD CONSTRAINT `subs_subdom_info_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`);

--
-- Constraints for table `union_account`
--
ALTER TABLE `union_account`
  ADD CONSTRAINT `union_account_ibfk_6` FOREIGN KEY (`subdomain_Id`) REFERENCES `subs_subdom_info` (`subdomain_Id`),
  ADD CONSTRAINT `union_account_ibfk_1` FOREIGN KEY (`admin_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `union_account_ibfk_4` FOREIGN KEY (`main_branch_Id`) REFERENCES `union_branch` (`branch_Id`),
  ADD CONSTRAINT `union_account_ibfk_5` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`);

--
-- Constraints for table `union_branch`
--
ALTER TABLE `union_branch`
  ADD CONSTRAINT `union_branch_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`);

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
  ADD CONSTRAINT `union_mem_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `union_mem_ibfk_3` FOREIGN KEY (`branch_Id`) REFERENCES `union_branch` (`branch_Id`),
  ADD CONSTRAINT `union_mem_ibfk_4` FOREIGN KEY (`role_Id`) REFERENCES `union_mem_roles` (`role_Id`);

--
-- Constraints for table `union_mem_chat`
--
ALTER TABLE `union_mem_chat`
  ADD CONSTRAINT `union_mem_chat_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_mem_chat_ibfk_2` FOREIGN KEY (`msg_by`) REFERENCES `union_mem` (`member_Id`);

--
-- Constraints for table `union_mem_perm_branch`
--
ALTER TABLE `union_mem_perm_branch`
  ADD CONSTRAINT `union_mem_perm_branch_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `union_mem_roles` (`role_Id`);

--
-- Constraints for table `union_mem_perm_union`
--
ALTER TABLE `union_mem_perm_union`
  ADD CONSTRAINT `union_mem_perm_union_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `union_mem_roles` (`role_Id`);

--
-- Constraints for table `union_mem_req`
--
ALTER TABLE `union_mem_req`
  ADD CONSTRAINT `union_mem_req_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_mem_req_ibfk_3` FOREIGN KEY (`req_to`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `union_mem_req_ibfk_4` FOREIGN KEY (`req_from`) REFERENCES `union_mem` (`member_Id`),
  ADD CONSTRAINT `union_mem_req_ibfk_5` FOREIGN KEY (`branch_Id`) REFERENCES `union_branch` (`branch_Id`);

--
-- Constraints for table `union_mem_roles`
--
ALTER TABLE `union_mem_roles`
  ADD CONSTRAINT `union_mem_roles_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `union_account` (`union_Id`),
  ADD CONSTRAINT `union_mem_roles_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `union_branch` (`branch_Id`);

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
  ADD CONSTRAINT `union_sup_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `union_sup_ibfk_3` FOREIGN KEY (`branch_Id`) REFERENCES `union_branch` (`branch_Id`);

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
  ADD CONSTRAINT `user_info_ibfk_2` FOREIGN KEY (`domain_Id`) REFERENCES `dom_info_bak` (`domain_Id`),
  ADD CONSTRAINT `user_info_ibfk_4` FOREIGN KEY (`subdomain_Id`) REFERENCES `dom_info_bak` (`domain_Id`);

--
-- Constraints for table `user_message`
--
ALTER TABLE `user_message`
  ADD CONSTRAINT `user_message_ibfk_1` FOREIGN KEY (`from_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_message_ibfk_2` FOREIGN KEY (`to_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_notify`
--
ALTER TABLE `user_notify`
  ADD CONSTRAINT `user_notify_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

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
  ADD CONSTRAINT `user_subscription_ibfk_3` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_subscription_ibfk_4` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`),
  ADD CONSTRAINT `user_subscription_ibfk_5` FOREIGN KEY (`subdomain_Id`) REFERENCES `subs_subdom_info` (`subdomain_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
