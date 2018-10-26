-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2018 at 04:59 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlh_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_cookies`
--

CREATE TABLE IF NOT EXISTS `app_cookies` (
  `cookies_Id` varchar(5) NOT NULL,
  `cookie` varchar(60) NOT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cookies_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_cookies`
--

INSERT INTO `app_cookies` (`cookies_Id`, `cookie`, `lastupdated`) VALUES
('C0001', 'CATEGORIES', '2018-09-24 17:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_batch_account`
--

CREATE TABLE IF NOT EXISTS `cmp_batch_account` (
  `batch_Id` varchar(25) NOT NULL,
  `cmp_u_Id` varchar(15) NOT NULL,
  `cmp_sch_Id` varchar(15) NOT NULL,
  `cmp_course_Id` varchar(15) NOT NULL,
  `batchFrom` varchar(4) NOT NULL,
  `batchTo` varchar(4) NOT NULL,
  `admin_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`batch_Id`),
  KEY `cmp_u_Id` (`cmp_u_Id`,`cmp_sch_Id`,`cmp_course_Id`),
  KEY `cmp_u_Id_2` (`cmp_u_Id`),
  KEY `cmp_sch_Id` (`cmp_sch_Id`),
  KEY `cmp_course_Id` (`cmp_course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_batch_members`
--

CREATE TABLE IF NOT EXISTS `cmp_batch_members` (
  `member_Id` varchar(15) NOT NULL,
  `batch_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `memType` varchar(10) NOT NULL COMMENT 'Student/Professor',
  `isAdmin` varchar(1) NOT NULL,
  `memAddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_Id`),
  KEY `batch_Id` (`batch_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_batch_mem_chat`
--

CREATE TABLE IF NOT EXISTS `cmp_batch_mem_chat` (
  `chat_Id` varchar(25) NOT NULL,
  `batch_Id` varchar(25) NOT NULL,
  `msg_by` varchar(15) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msg` varchar(5000) NOT NULL,
  `reply_reference` varchar(25) NOT NULL,
  PRIMARY KEY (`chat_Id`),
  KEY `msg_by` (`msg_by`),
  KEY `batch_Id` (`batch_Id`),
  KEY `msg_by_2` (`msg_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_batch_mem_chat_status`
--

CREATE TABLE IF NOT EXISTS `cmp_batch_mem_chat_status` (
  `status_Id` varchar(25) NOT NULL,
  `chat_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`status_Id`),
  KEY `chat_Id` (`chat_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_batch_mem_req`
--

CREATE TABLE IF NOT EXISTS `cmp_batch_mem_req` (
  `request_Id` varchar(15) NOT NULL,
  `batch_Id` varchar(25) NOT NULL,
  `reqBy` varchar(15) NOT NULL,
  `reqOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reqMessage` varchar(300) NOT NULL,
  PRIMARY KEY (`request_Id`),
  KEY `batch_Id` (`batch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_sch_account`
--

CREATE TABLE IF NOT EXISTS `cmp_sch_account` (
  `cmp_sch_Id` varchar(15) NOT NULL,
  `instituteName` varchar(65) NOT NULL,
  `instituteType` varchar(10) NOT NULL,
  `cmp_u_Id` varchar(15) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `establishedOn` varchar(4) NOT NULL,
  `aboutInstitute` varchar(2500) NOT NULL,
  `foundedBy1` varchar(100) NOT NULL,
  `foundedBy2` varchar(100) NOT NULL,
  `foundedBy3` varchar(100) NOT NULL,
  `foundedBy4` varchar(100) NOT NULL,
  `foundedBy5` varchar(100) NOT NULL,
  `web_url` varchar(100) NOT NULL,
  `createdBy` varchar(15) NOT NULL,
  `approved` varchar(1) NOT NULL,
  PRIMARY KEY (`cmp_sch_Id`),
  KEY `cmp_u_Id` (`cmp_u_Id`),
  KEY `cmp_u_Id_2` (`cmp_u_Id`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp_sch_account`
--

INSERT INTO `cmp_sch_account` (`cmp_sch_Id`, `instituteName`, `instituteType`, `cmp_u_Id`, `profile_pic`, `establishedOn`, `aboutInstitute`, `foundedBy1`, `foundedBy2`, `foundedBy3`, `foundedBy4`, `foundedBy5`, `web_url`, `createdBy`, `approved`) VALUES
('SA2348986774568', 'QWERRTGT', 'Private', 'CUA213172737617', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_474,y_54,w_972,h_972,z_0.0926,c_crop/v1538322975/Fish-Images-HD_rdhxoe.jpg', '2007', 'dcfvf sdvsv svv wv vw ', 'rgererre', '', '', '', '', ' ', 'USR924357814934', 'Y'),
('SA4377631322695', 'Sri Indu Institute of Engineering and Technology', 'Private', 'CUA592871465615', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_225,y_25,w_450,h_450,z_0.2,c_crop/v1536991976/6EkoAJ01XXTWAI-WxuZlGIcAj5OmXZfhIcx6WXaWlAiHH41zyZ9dfvXIFOPkCB-Dwt_U_h900_r37ggm.jpg', '2010', 'Test Institute', 'Test Founder', '', '', '', '', '', 'USR924357814934', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_sch_coursemap`
--

CREATE TABLE IF NOT EXISTS `cmp_sch_coursemap` (
  `cmp_map_Id` varchar(25) NOT NULL,
  `cmp_u_Id` varchar(15) NOT NULL,
  `cmp_sch_Id` varchar(15) NOT NULL,
  `cmp_course_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`cmp_map_Id`),
  KEY `cmp_sch_Id` (`cmp_sch_Id`,`cmp_course_Id`),
  KEY `cmp_sch_Id_2` (`cmp_sch_Id`),
  KEY `cmp_course_Id` (`cmp_course_Id`),
  KEY `cmp_u_Id` (`cmp_u_Id`),
  KEY `cmp_sch_Id_3` (`cmp_sch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_uni_account`
--

CREATE TABLE IF NOT EXISTS `cmp_uni_account` (
  `cmp_u_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `institutionName` varchar(1000) NOT NULL,
  `institutionType` varchar(10) NOT NULL,
  `institutionBoard` varchar(25) NOT NULL,
  `aboutinstitution` varchar(2500) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `establishedOn` varchar(4) NOT NULL,
  `foundedBy1` varchar(100) NOT NULL,
  `foundedBy2` varchar(100) NOT NULL,
  `foundedBy3` varchar(100) NOT NULL,
  `foundedBy4` varchar(100) NOT NULL,
  `foundedBy5` varchar(100) NOT NULL,
  `web_url` varchar(100) NOT NULL,
  `createdBy` varchar(15) NOT NULL,
  `approved` varchar(1) NOT NULL,
  PRIMARY KEY (`cmp_u_Id`),
  KEY `domain_Id` (`domain_Id`,`subdomain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp_uni_account`
--

INSERT INTO `cmp_uni_account` (`cmp_u_Id`, `domain_Id`, `subdomain_Id`, `institutionName`, `institutionType`, `institutionBoard`, `aboutinstitution`, `profile_pic`, `establishedOn`, `foundedBy1`, `foundedBy2`, `foundedBy3`, `foundedBy4`, `foundedBy5`, `web_url`, `createdBy`, `approved`) VALUES
('CUA213172737617', '02-EDU', 'EDU-01-STUDTCHR', 'Osmania University', 'Public', 'UNIVERSITY_BOARD', 'Sample Institution', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_1020,y_117,w_2088,h_2088,z_0.0431,c_crop/v1538320794/JPEG_20180930_204922_529053506_blhy2h.jpg', '1941', 'Qryvdgjj', '', '', '', '', '', 'USR924357814934', 'Y'),
('CUA592871465615', '02-EDU', 'EDU-01-STUDTCHR', 'Board of Intermediate Education, Telangana', 'Public', 'COLLEGE_BOARD', 'Sample Institution', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_276,y_498,w_143,h_144,z_0.6286,c_crop/v1536774305/IMG-20180912-WA0118_dq69wy.jpg', '1993', 'Government of Telangana State, India', '', '', '', '', '', 'USR924357814934', 'Y'),
('CUA648872972799', '02-EDU', 'EDU-01-STUDTCHR', 'Board of Secondary Education, Telangana', 'Public', 'SSC_BOARD', 'Sample Institution', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_276,y_498,w_143,h_144,z_0.6286,c_crop/v1536774305/IMG-20180912-WA0118_dq69wy.jpg', '2002', 'Government of Telangana State, India', '', '', '', '', '', 'USR924357814934', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_uni_coursemap`
--

CREATE TABLE IF NOT EXISTS `cmp_uni_coursemap` (
  `cmp_map_Id` varchar(25) NOT NULL,
  `cmp_u_Id` varchar(15) NOT NULL,
  `cmp_course_Id` varchar(15) NOT NULL,
  `approved` varchar(1) NOT NULL,
  PRIMARY KEY (`cmp_map_Id`),
  KEY `cmp_u_Id` (`cmp_u_Id`),
  KEY `cmp_course_Id` (`cmp_course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp_uni_coursemap`
--

INSERT INTO `cmp_uni_coursemap` (`cmp_map_Id`, `cmp_u_Id`, `cmp_course_Id`, `approved`) VALUES
('CUC197871785228', 'CUA213172737617', 'CUC791555162182', 'Y'),
('CUC219455972246', 'CUA213172737617', 'CUC488168592932', 'Y'),
('CUC262274243344', 'CUA213172737617', 'CUC931767175111', 'N'),
('CUC393328353329', 'CUA213172737617', 'CUC277296325231', 'N'),
('CUC673232826685', 'CUA213172737617', 'CUC264411829164', 'N'),
('CUC742528823985', 'CUA213172737617', 'CUC996172995273', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_uni_courses`
--

CREATE TABLE IF NOT EXISTS `cmp_uni_courses` (
  `cmp_course_Id` varchar(15) NOT NULL,
  `courseName` varchar(100) NOT NULL COMMENT 'Classroom',
  `duration` varchar(5) NOT NULL,
  `begMonth` varchar(15) NOT NULL,
  `endMonth` varchar(15) NOT NULL,
  `institutionType` varchar(10) NOT NULL,
  `approved` varchar(1) NOT NULL,
  PRIMARY KEY (`cmp_course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp_uni_courses`
--

INSERT INTO `cmp_uni_courses` (`cmp_course_Id`, `courseName`, `duration`, `begMonth`, `endMonth`, `institutionType`, `approved`) VALUES
('CUC264411829164', 'B.Tech in Computer Science Engineering', '4', 'August', 'April', '', 'Y'),
('CUC277296325231', 'B.Tech in Information And Technology', '4', 'August', 'April', '', 'Y'),
('CUC488168592932', 'B.Tech in Electronics and Electrical Engineering', '4', 'August', 'April', '', 'Y'),
('CUC791555162182', 'B.Tech in Civil Engineering', '4', 'August', 'April', '', 'Y'),
('CUC931767175111', 'B.Tech in Mechanical Engineering', '4', 'August', 'April', '', 'Y'),
('CUC996172995273', 'B.Tech in Electronics and Communication Engineering', '4', 'August', 'April', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ent_fc_account`
--

CREATE TABLE IF NOT EXISTS `ent_fc_account` (
  `celeb_Id` varchar(15) NOT NULL,
  `celebName` varchar(100) NOT NULL,
  `aboutCeleb` varchar(1500) NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `otherName1` varchar(100) NOT NULL,
  `otherName2` varchar(100) NOT NULL,
  `otherName3` varchar(100) NOT NULL,
  `otherName4` varchar(100) NOT NULL,
  `otherName5` varchar(100) NOT NULL,
  `brandTag` varchar(55) NOT NULL,
  `bornOn` date NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `activeFrom` varchar(4) NOT NULL,
  `activeTo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ent_fc_aw`
--

CREATE TABLE IF NOT EXISTS `ent_fc_aw` (
  `artOfWork_Id` varchar(35) NOT NULL,
  `celeb_Id` varchar(15) NOT NULL,
  `artOfWorkType` varchar(10) NOT NULL COMMENT 'Movies/Drama',
  `celebRole` varchar(50) NOT NULL,
  `artTitle` varchar(100) NOT NULL,
  `artDescription` varchar(1500) NOT NULL,
  `recognOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`artOfWork_Id`),
  KEY `celeb_Id` (`celeb_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ent_fc_occmap`
--

CREATE TABLE IF NOT EXISTS `ent_fc_occmap` (
  `occMap_Id` varchar(25) NOT NULL,
  `celeb_Id` varchar(15) NOT NULL,
  `occupation_Id` varchar(25) NOT NULL,
  KEY `occMap_Id` (`occMap_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ent_occupations`
--

CREATE TABLE IF NOT EXISTS `ent_occupations` (
  `occupation_Id` varchar(25) NOT NULL,
  `occupationTitle` varchar(50) NOT NULL,
  PRIMARY KEY (`occupation_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ent_occupations`
--

INSERT INTO `ent_occupations` (`occupation_Id`, `occupationTitle`) VALUES
('ENT1', 'Actor'),
('ENT2', 'Producer'),
('ENT3', 'Dancer'),
('ENT4', 'Playback Singer');

-- --------------------------------------------------------

--
-- Table structure for table `hook_buddy_info`
--

CREATE TABLE IF NOT EXISTS `hook_buddy_info` (
  `hook_buddy_Id` varchar(25) NOT NULL,
  `hook_title` varchar(100) NOT NULL,
  `hook_desc` varchar(2500) NOT NULL,
  `hook_img` varchar(500) NOT NULL,
  `mediaURL` varchar(350) NOT NULL,
  `srvy_q` varchar(200) NOT NULL,
  `srvy_opt1` varchar(200) NOT NULL,
  `srvy_opt2` varchar(200) NOT NULL,
  `srvy_opt3` varchar(200) NOT NULL,
  `srvy_opt4` varchar(200) NOT NULL,
  `srvy_opt5` varchar(200) NOT NULL,
  `srvy_opt6` varchar(200) NOT NULL,
  `srvy_opt7` varchar(200) NOT NULL,
  `srvy_opt8` varchar(200) NOT NULL,
  `srvy_opt9` varchar(200) NOT NULL,
  `srvy_opt10` varchar(200) NOT NULL,
  `status` varchar(8) NOT NULL,
  `hook_by` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_buddy_Id`),
  KEY `hook_by` (`hook_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_buddy_srvy_r`
--

CREATE TABLE IF NOT EXISTS `hook_buddy_srvy_r` (
  `hook_buddy_srvy_Id` varchar(25) NOT NULL,
  `hook_buddy_Id` varchar(25) NOT NULL,
  `srvy_option` varchar(9) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_buddy_srvy_Id`),
  KEY `hook_buddy_Id` (`hook_buddy_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_buddy_users`
--

CREATE TABLE IF NOT EXISTS `hook_buddy_users` (
  `hook_buddy_usr_Id` varchar(25) NOT NULL,
  `hook_buddy_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_buddy_usr_Id`),
  KEY `hook_buddy_Id` (`hook_buddy_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `move_info`
--

CREATE TABLE IF NOT EXISTS `move_info` (
  `move_Id` varchar(8) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
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
  `displayLevel` varchar(25) NOT NULL COMMENT 'SUBDOMAIN_LEVEL/DOMAIN_LEVEL',
  PRIMARY KEY (`move_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`)
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
-- Table structure for table `move_views`
--

CREATE TABLE IF NOT EXISTS `move_views` (
  `view_Id` varchar(15) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`view_Id`),
  KEY `move_Id` (`move_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_info`
--

CREATE TABLE IF NOT EXISTS `newsfeed_info` (
  `info_Id` varchar(25) NOT NULL,
  `artTitle` varchar(250) NOT NULL,
  `artShrtDesc` varchar(1500) NOT NULL,
  `artDesc` varchar(10000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` varchar(10000) NOT NULL,
  `mediaURL01` varchar(350) NOT NULL,
  `mediaURL02` varchar(350) NOT NULL,
  `mediaURL03` varchar(350) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'SAVE/ACTIVE/INACTIVE',
  `writtenBy` varchar(15) NOT NULL,
  PRIMARY KEY (`info_Id`),
  KEY `writtenBy` (`writtenBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_info`
--

INSERT INTO `newsfeed_info` (`info_Id`, `artTitle`, `artShrtDesc`, `artDesc`, `createdOn`, `images`, `mediaURL01`, `mediaURL02`, `mediaURL03`, `status`, `writtenBy`) VALUES
('NFI1613311724592767271574', 'Finding%20Nemo', 'Finding%20Nemo%20is%20a%202003%20American%20computer-animated%20adventure%20film%20produced%20by%20Pixar%20Animation%20Studios%20and%20released%20by%20Walt%20Disney%20Pictures.%20Written%20and%20directed%20by%20Andrew%20Stanton%20with%20co-direction%20by%20Lee%20Unkrich,%20the%20film%20stars%20the%20voices%20of%20Albert%20Brooks,%20Ellen%20DeGeneres,%20Alexander%20Gould,%20and%20Willem%20Dafoe.', '%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3EA&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Amphiprioninae%22%20title=%22Amphiprioninae%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eclownfish%3C/a%3E&nbsp;couple,%20Marlin%20and%20Coral,%20are%20admiring%20their%20new%20home%20in%20the&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Great_Barrier_Reef%22%20title=%22Great%20Barrier%20Reef%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3EGreat%20Barrier%20Reef%3C/a%3E,&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Australia%22%20title=%22Australia%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3EAustralia%3C/a%3E,%20and%20their%20clutch%20of%20hundreds%20of%20eggs,%20when%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Barracuda%22%20title=%22Barracuda%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ebarracuda%3C/a%3E&nbsp;attacks.%20Marlin%20is%20knocked%20unconscious,%20and%20wakes%20up%20to%20find%20Coral%20and%20all%20but%20one%20of%20the%20eggs%20gone.%20He%20names%20this%20last%20egg&nbsp;%3Ci%3ENemo%3C/i%3E,%20a%20name%20that%20Coral%20had%20chosen.%3C/p%3E%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3EOn%20the%20first%20day%20of%20school,%20the%20overprotective%20Marlin%20embarrasses%20Nemo%20during%20a%20field%20trip.%20While%20Marlin%20talks%20to%20the%20teacher,%20Mr.%20Ray,%20Nemo%20sneaks%20away%20from%20the%20reef%20toward%20a%20boat%20and%20is%20captured%20by%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Scuba_diver%22%20class=%22mw-redirect%22%20title=%22Scuba%20diver%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Escuba%20diver%3C/a%3E.%20As%20the%20boat%20departs,%20one%20of%20the%20divers%20accidentally%20knocks%20his&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Diving_mask%22%20title=%22Diving%20mask%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ediving%20mask%3C/a%3E&nbsp;overboard.%20Marlin%20chases%20after%20the%20boat%20and%20meets%20Dory,%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Paracanthurus%22%20title=%22Paracanthurus%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eblue%20tang%3C/a%3E&nbsp;who%20suffers%20from&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Short-term_memory_loss%22%20class=%22mw-redirect%22%20title=%22Short-term%20memory%20loss%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eshort-term%20memory%20loss%3C/a%3E.%20The%20two%20encounter%20Bruce,%20Anchor%20and%20Chum,%20three%20reformed%20sharks%20who%20have%20renounced%20fish-eating%20diet.%20While%20at%20their&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Twelve-step_program%22%20title=%22Twelve-step%20program%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eprogress%20meeting%3C/a%3E,%20Marlin%20discovers%20the%20diver''s%20mask%20and%20notices%20an%20address%20written%20on%20it.%20However,%20Dory%20and%20Marlin%20fight%20over%20the%20mask,%20accidentally%20giving%20Dory%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Bloody_nose%22%20class=%22mw-redirect%22%20title=%22Bloody%20nose%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ebloody%20nose%3C/a%3E.%20The%20blood%20sends%20Bruce%20into%20a%20relapsed&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Feeding_frenzy%22%20title=%22Feeding%20frenzy%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Efeeding%20frenzy%3C/a%3E,%20and%20he%20attacks%20Marlin%20and%20Dory,%20who%20narrowly%20escape.%3C/p%3E%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3ENemo%20is%20placed%20in%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Fish_tank%22%20class=%22mw-redirect%22%20title=%22Fish%20tank%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Efish%20tank%3C/a%3E&nbsp;in%20a%20dentist''s%20office,%20where%20he%20meets%20the%20%22Tank%20Gang%22,%20a%20group%20of%20pet%20fish%20led%20by%20Gill.%20The%20gang%20learn%20Nemo%20is%20to%20be%20given%20to%20the%20dentist''s%20niece%20Darla,%20who%20has%20killed%20previous%20fish%20given%20to%20her.%20Gill%20devises%20a%20plan%20to%20escape:%20jam%20the%20tank''s&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Filter_(aquarium)%22%20title=%22Filter%20(aquarium)%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Efilter%3C/a%3E&nbsp;with%20a%20pebble%20so%20the%20dentist%20will%20have%20to%20put%20the%20fish%20in%20plastic%20bags%20to%20clean%20the%20tank,%20then%20roll%20out%20the%20window%20and%20into%20the%20harbor.%20Nemo%20attempts%20to%20jam%20the%20filter%20but%20fails,%20nearly%20dying%20in%20the%20process.%3C/p%3E%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3EThe%20mask%20falls%20into%20a%20trench%20in%20the%20deep%20sea,%20where,%20while%20battling%20an&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Anglerfish%22%20title=%22Anglerfish%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eanglerfish%3C/a%3E,%20Dory%20reads%20the%20address%20as%20%2242%20Wallaby%20Way,&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Sydney%22%20title=%22Sydney%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3ESydney%3C/a%3E%22.%20To%20her%20own%20disbelief,%20Dory%20remembers%20the%20address%20despite%20her%20short-term%20memory%20loss.%20Dory%20and%20Marlin%20receive%20directions%20to%20Sydney%20from%20a%20school%20of&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Silver_moony%22%20class=%22mw-redirect%22%20title=%22Silver%20moony%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Emoonfish%3C/a%3E.%20On%20the%20way,%20they%20encounter%20a%20bloom%20of&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Jellyfish%22%20title=%22Jellyfish%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ejellyfish%3C/a%3E&nbsp;that%20traps%20and%20nearly%20stings%20them%20to%20death.%20Marlin%20loses%20consciousness%20and%20awakens%20on%20the%20back%20of%20a%20sea%20turtle%20named%20Crush,%20who%20shuttles%20Marlin%20and%20Dory%20on%20the&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/E', '2018-10-18 11:04:31', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_0,y_60,w_1920,h_960,z_0.1563,c_crop/v1539860530/Fish-Images-HD_un5ozr.jpg', 'https://www.youtube.com/watch?v=SPHfeNgogVs', 'https://www.youtube.com/watch?v=uOkuhD-DDR0', 'https://www.youtube.com/watch?v=izRip45Eolw', 'ACTIVE', 'USR924357814934'),
('NFI4354888859954457818416', 'TEST%20NEWS', 'TESTHJJ%20GJKJJ%20YJKKJGH%20HJKJ', '%3Cp%3EFhhujjj%20uijhgvb%20jkkhhh%20jjhgfg%20hjjjgfv%20hhjj%3C/p%3E', '2018-10-24 17:17:07', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_0,y_690,w_1080,h_540,z_0.2778,c_crop/v1540401375/Screenshot_20181023-002214_Trello_w1b2e1.jpg', '', '', '', 'ACTIVE', 'USR924357814934'),
('NFI5783345756117198991981', 'ddtt%60d', 'vvhvv', '%3Cp%3Egcggcg%20cv%3C/p%3E', '2018-10-18 17:24:49', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_0,y_60,w_1920,h_960,z_0.1563,c_crop/v1539883441/Fish-Images-HD_pnpvah.jpg', 'https://www.youtube.com/watch?v=_ozLtmC8Q_E', '', '', 'ACTIVE', 'USR924357814934');

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
-- Table structure for table `newsfeed_share_i`
--

CREATE TABLE IF NOT EXISTS `newsfeed_share_i` (
  `ishare_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `view_members` varchar(1) NOT NULL,
  `view_subscribers` varchar(1) NOT NULL,
  `biz_Id` varchar(25) NOT NULL,
  `approvedBy` varchar(15) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ishare_Id`),
  KEY `bizUnionId` (`union_Id`),
  KEY `unionBranchId` (`branch_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `approvedBy` (`approvedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_share_i`
--

INSERT INTO `newsfeed_share_i` (`ishare_Id`, `info_Id`, `union_Id`, `branch_Id`, `view_members`, `view_subscribers`, `biz_Id`, `approvedBy`, `ts`) VALUES
('NIS5833885568348665469156', 'NFI4354888859954457818416', 'UPA147982212651', 'ALL', 'Y', 'Y', '', 'USR924357814934', '2018-10-24 17:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_share_r`
--

CREATE TABLE IF NOT EXISTS `newsfeed_share_r` (
  `rshare_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `view_members` varchar(1) NOT NULL,
  `view_subscribers` varchar(1) NOT NULL,
  `biz_Id` varchar(25) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rshare_Id`),
  KEY `bizUnionId` (`union_Id`),
  KEY `unionBranchId` (`branch_Id`),
  KEY `info_Id` (`info_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_share_r`
--

INSERT INTO `newsfeed_share_r` (`rshare_Id`, `info_Id`, `union_Id`, `branch_Id`, `view_members`, `view_subscribers`, `biz_Id`, `ts`) VALUES
('NRS2183578634884523979364', 'NFI1613311724592767271574', 'UPA147982212651', 'ALL', 'Y', 'Y', '', '2018-10-18 11:04:33'),
('NRS6855665137995949691157', 'NFI5783345756117198991981', 'UPA147982212651', 'ALL', 'Y', 'Y', '', '2018-10-18 17:24:51');

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
('09-ITS', 'IT and Software'),
('CDE', 'CDE');

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
('EDU-01-STUDTCHR', '02-EDU', 'Students / Teachers'),
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
-- Table structure for table `unionprof_account`
--

CREATE TABLE IF NOT EXISTS `unionprof_account` (
  `union_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `main_branch_Id` varchar(25) NOT NULL,
  `unionName` varchar(45) NOT NULL,
  `aboutUnion` varchar(10000) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  `issue01` varchar(250) NOT NULL,
  `issue02` varchar(250) NOT NULL,
  `issue03` varchar(250) NOT NULL,
  `issue04` varchar(250) NOT NULL,
  `issue05` varchar(250) NOT NULL,
  `issue06` varchar(250) NOT NULL,
  `issue07` varchar(250) NOT NULL,
  `issue08` varchar(250) NOT NULL,
  `issue09` varchar(250) NOT NULL,
  `issue10` varchar(250) NOT NULL,
  PRIMARY KEY (`union_Id`),
  KEY `admin_Id` (`admin_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `admin_Id_2` (`admin_Id`),
  KEY `subdomain_Id` (`subdomain_Id`),
  KEY `main_branch_Id` (`main_branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_account`
--

INSERT INTO `unionprof_account` (`union_Id`, `domain_Id`, `subdomain_Id`, `main_branch_Id`, `unionName`, `aboutUnion`, `profile_pic`, `created_On`, `admin_Id`, `issue01`, `issue02`, `issue03`, `issue04`, `issue05`, `issue06`, `issue07`, `issue08`, `issue09`, `issue10`) VALUES
('UPA147982212651', '02-EDU', 'EDU-01-STUDTCHR', 'UPB4533295688936684447756', 'QWWEWEF', 'awdeew', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_474,y_54,w_972,h_972,z_0.0926,c_crop/v1539536114/wallpaper2you_376452_fcw9ls.jpg', '2018-10-14 16:56:04', 'USR924357814934', 'qwded', 'qwded', 'qwdqwd', 'q', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_branch`
--

CREATE TABLE IF NOT EXISTS `unionprof_branch` (
  `branch_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  `publicInvitation` varchar(1) NOT NULL COMMENT 'Enable/Disable',
  PRIMARY KEY (`branch_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `admin_Id` (`admin_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_branch`
--

INSERT INTO `unionprof_branch` (`branch_Id`, `union_Id`, `minlocation`, `location`, `state`, `country`, `createdOn`, `admin_Id`, `publicInvitation`) VALUES
('UPB3793524526644674293272', 'UPA147982212651', 'Aizawl West â€“ II', 'Mizoram Region', 'Mizoram', 'India', '2018-10-14 18:49:56', 'USR924357814934', 'Y'),
('UPB5591484576579966944642', 'UPA147982212651', 'Aizawl West â€“ II', 'Mizoram Region', 'Mizoram', 'India', '2018-10-14 18:49:39', 'USR924357814934', 'Y'),
('UPB5836385273887899752381', 'UPA147982212651', 'Jagalur', 'Davanagere', 'Karnataka', 'India', '2018-10-14 18:19:51', 'USR924357814934', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_branch_req`
--

CREATE TABLE IF NOT EXISTS `unionprof_branch_req` (
  `req_branch_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `reqOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reqBy` varchar(15) NOT NULL,
  `reqMessage` varchar(300) NOT NULL,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`req_branch_Id`),
  KEY `union_Id` (`union_Id`,`reqBy`),
  KEY `reqBy` (`reqBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_calndar_branch`
--

CREATE TABLE IF NOT EXISTS `unionprof_calndar_branch` (
  `calendar_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `sch_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Schedule Timestamp',
  `sch_title` varchar(45) NOT NULL,
  `sch_desc` varchar(250) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`calendar_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_calndar_union`
--

CREATE TABLE IF NOT EXISTS `unionprof_calndar_union` (
  `calendar_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `sch_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Schedule Timestamp',
  `sch_title` varchar(45) NOT NULL,
  `sch_desc` varchar(250) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`calendar_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_faq_branch`
--

CREATE TABLE IF NOT EXISTS `unionprof_faq_branch` (
  `faq_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `askedBy` varchar(15) NOT NULL,
  `askedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` varchar(2500) NOT NULL,
  `answeredBy` varchar(15) NOT NULL,
  `answeredOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`faq_Id`),
  KEY `union_Id` (`union_Id`,`askedBy`,`answeredBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_faq_union`
--

CREATE TABLE IF NOT EXISTS `unionprof_faq_union` (
  `faq_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `askedBy` varchar(15) NOT NULL,
  `askedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` varchar(2500) NOT NULL,
  `answeredBy` varchar(15) NOT NULL,
  `answeredOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`faq_Id`),
  KEY `union_Id` (`union_Id`,`askedBy`,`answeredBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_lang`
--

CREATE TABLE IF NOT EXISTS `unionprof_lang` (
  `union_Id` varchar(15) NOT NULL,
  `eng` varchar(1) NOT NULL,
  `tel` varchar(1) NOT NULL,
  PRIMARY KEY (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem` (
  `member_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `cur_role_Id` varchar(25) NOT NULL,
  `prev_role_Id` varchar(25) NOT NULL,
  `roleNotify` varchar(1) NOT NULL,
  `roleUpdatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `memNotify` varchar(1) NOT NULL,
  `memAddedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `memAddedBy` varchar(15) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'ONLINE/OFFLINE',
  PRIMARY KEY (`member_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `role_Id` (`cur_role_Id`),
  KEY `prev_role_Id` (`prev_role_Id`),
  KEY `memAddedBy` (`memAddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_mem`
--

INSERT INTO `unionprof_mem` (`member_Id`, `union_Id`, `branch_Id`, `user_Id`, `cur_role_Id`, `prev_role_Id`, `roleNotify`, `roleUpdatedOn`, `memNotify`, `memAddedOn`, `memAddedBy`, `status`) VALUES
('UPM263337633836', 'UPA147982212651', 'UPB5591484576579966944642', 'USR924357814934', 'UPRO932453835669327754485', 'UPRO932453835669327754485', 'N', '2018-10-14 18:49:47', 'N', '2018-10-14 18:49:47', 'USR924357814934', 'OFFLINE'),
('UPM523414917733', 'UPA147982212651', 'UPB5836385273887899752381', 'USR924357814934', 'UPRO184165833885568348665', 'UPRO184165833885568348665', 'N', '2018-10-14 18:20:00', 'N', '2018-10-14 18:20:00', 'USR924357814934', 'OFFLINE'),
('UPM748222133368', 'UPA147982212651', 'UPB3793524526644674293272', 'USR924357814934', 'UPRO932453835669327754485', 'UPRO932453835669327754485', 'N', '2018-10-14 18:50:04', 'N', '2018-10-14 18:50:04', 'USR924357814934', 'OFFLINE');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_chat`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_chat` (
  `chat_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `msg_by` varchar(15) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msg` varchar(5000) NOT NULL,
  `reply_reference` varchar(25) NOT NULL,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`chat_Id`),
  KEY `msg_by` (`msg_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_perm1`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_perm1` (
  `permission1_Id` varchar(25) NOT NULL,
  `member_Id` varchar(15) NOT NULL,
  `createABranch` varchar(1) NOT NULL,
  `createABranchNotify` varchar(1) NOT NULL,
  `updateBranchInfo` varchar(1) NOT NULL,
  `updateBranchInfoNotify` varchar(1) NOT NULL,
  `deleteBranch` varchar(1) NOT NULL,
  `deleteBranchNotify` varchar(1) NOT NULL,
  `shiftMainBranch` varchar(1) NOT NULL,
  `shiftMainBranchNotify` varchar(1) NOT NULL,
  `createNewsFeedUnionLevel` varchar(1) NOT NULL,
  `createNewsFeedUnionLevelNotify` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevel` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevelNotify` varchar(1) NOT NULL,
  `createMovementUnionLevel` varchar(1) NOT NULL,
  `createMovementUnionLevelNotify` varchar(1) NOT NULL,
  `approveMovementUnionLevel` varchar(1) NOT NULL,
  `approveMovementUnionLevelNotify` varchar(1) NOT NULL,
  `createMovementSubDomainLevel` varchar(1) NOT NULL,
  `createMovementSubDomainLevelNotify` varchar(1) NOT NULL,
  `approveMovementSubDomainLevel` varchar(1) NOT NULL,
  `approveMovementSubDomainLevelNotify` varchar(1) NOT NULL,
  `createMovementDomainLevel` varchar(1) NOT NULL,
  `createMovementDomainLevelNotify` varchar(1) NOT NULL,
  `approveMovementDomainLevel` varchar(1) NOT NULL,
  `approveMovementDomainLevelNotify` varchar(1) NOT NULL,
  `updatedPermOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission1_Id`),
  KEY `role_Id` (`member_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_mem_perm1`
--

INSERT INTO `unionprof_mem_perm1` (`permission1_Id`, `member_Id`, `createABranch`, `createABranchNotify`, `updateBranchInfo`, `updateBranchInfoNotify`, `deleteBranch`, `deleteBranchNotify`, `shiftMainBranch`, `shiftMainBranchNotify`, `createNewsFeedUnionLevel`, `createNewsFeedUnionLevelNotify`, `approveNewsFeedUnionLevel`, `approveNewsFeedUnionLevelNotify`, `createMovementUnionLevel`, `createMovementUnionLevelNotify`, `approveMovementUnionLevel`, `approveMovementUnionLevelNotify`, `createMovementSubDomainLevel`, `createMovementSubDomainLevelNotify`, `approveMovementSubDomainLevel`, `approveMovementSubDomainLevelNotify`, `createMovementDomainLevel`, `createMovementDomainLevelNotify`, `approveMovementDomainLevel`, `approveMovementDomainLevelNotify`, `updatedPermOn`) VALUES
('UP1P138544782577262637952', 'USR113561617186', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2018-10-14 18:50:11'),
('UP1P568572155166246786938', 'USR924357814934', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'N', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2018-10-17 18:52:15'),
('UP1P639367976319874694372', 'USR113561617186', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2018-10-14 18:20:06'),
('UP1P656795596156592486565', 'USR924357814934', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2018-10-14 18:50:07'),
('UP1P737725517941116157456', 'USR113561617186', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2018-10-14 18:49:54'),
('UP1P794258632436641747143', 'USR924357814934', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2018-10-14 18:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_perm2`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_perm2` (
  `permission2_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `createRole` varchar(1) NOT NULL,
  `createRoleNotify` varchar(1) NOT NULL,
  `viewRoles` varchar(1) NOT NULL,
  `viewRoleNotify` varchar(1) NOT NULL,
  `updateRole` varchar(1) NOT NULL,
  `updateRoleNotify` varchar(1) NOT NULL,
  `deleteRole` varchar(1) NOT NULL,
  `deleteRoleNotify` varchar(1) NOT NULL,
  `requestUsersToBeMembers` varchar(1) NOT NULL,
  `requestUsersToBeMembersNotify` varchar(1) NOT NULL,
  `approveUsersToBeMembers` varchar(1) NOT NULL,
  `approveUsersToBeMembersNotify` varchar(1) NOT NULL,
  `createNewsFeedBranchLevel` varchar(1) NOT NULL,
  `createNewsFeedBranchLevelNotify` varchar(1) NOT NULL,
  `approveNewsFeedBranchLevel` varchar(1) NOT NULL,
  `approveNewsFeedBranchLevelNotify` varchar(1) NOT NULL,
  `createMovementBranchLevel` varchar(1) NOT NULL,
  `createMovementBranchLevelNotify` varchar(1) NOT NULL,
  `approveMovementBranchLevel` varchar(1) NOT NULL,
  `approveMovementBranchLevelNotify` varchar(1) NOT NULL,
  `updatedPermOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission2_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_mem_perm2`
--

INSERT INTO `unionprof_mem_perm2` (`permission2_Id`, `role_Id`, `createRole`, `createRoleNotify`, `viewRoles`, `viewRoleNotify`, `updateRole`, `updateRoleNotify`, `deleteRole`, `deleteRoleNotify`, `requestUsersToBeMembers`, `requestUsersToBeMembersNotify`, `approveUsersToBeMembers`, `approveUsersToBeMembersNotify`, `createNewsFeedBranchLevel`, `createNewsFeedBranchLevelNotify`, `approveNewsFeedBranchLevel`, `approveNewsFeedBranchLevelNotify`, `createMovementBranchLevel`, `createMovementBranchLevelNotify`, `approveMovementBranchLevel`, `approveMovementBranchLevelNotify`, `updatedPermOn`) VALUES
('UP2P142744635594294167115', 'UPRO932453835669327754485', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2018-10-14 18:49:42'),
('UP2P143173413467444741843', 'UPRO978942994654368311569', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2018-10-14 18:49:45'),
('UP2P281528826523852343326', 'UPRO978942994654368311569', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2018-10-14 18:50:02'),
('UP2P343539341318847434836', 'UPRO184165833885568348665', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2018-10-14 18:19:55'),
('UP2P421553727285337526716', 'UPRO469156268873637553568', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2018-10-14 18:19:58'),
('UP2P489472283436736219159', 'UPRO932453835669327754485', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2018-10-14 18:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_req`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_req` (
  `request_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `req_from` varchar(15) NOT NULL,
  `req_to` varchar(15) NOT NULL,
  `reqMessage` varchar(300) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`request_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `req_from` (`req_from`),
  KEY `req_to` (`req_to`),
  KEY `branch_Id` (`branch_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id_2` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_mem_req`
--

INSERT INTO `unionprof_mem_req` (`request_Id`, `union_Id`, `branch_Id`, `role_Id`, `req_from`, `req_to`, `reqMessage`, `sent_On`, `notify`, `watched`) VALUES
('UPMR23917634997', 'UPA147982212651', 'UPB5591484576579966944642', 'UPRO839195864313875881252', 'USR924357814934', 'USR113561617186', '', '2018-10-14 18:49:52', 'N', 'N'),
('UPMR23999569973', 'UPA147982212651', 'UPB3793524526644674293272', 'UPRO839195864313875881252', 'USR924357814934', 'USR113561617186', '', '2018-10-14 18:50:09', 'N', 'N'),
('UPMR86838516576', 'UPA147982212651', 'UPB5836385273887899752381', 'UPRO629371713369826917314', 'USR924357814934', 'USR113561617186', '', '2018-10-14 18:20:04', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_roles`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_roles` (
  `role_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `roleName` varchar(60) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id_2` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_mem_roles`
--

INSERT INTO `unionprof_mem_roles` (`role_Id`, `union_Id`, `branch_Id`, `roleName`, `updatedOn`) VALUES
('UPRO184165833885568348665', 'UPA147982212651', 'UPB5836385273887899752381', 'President', '2018-10-15 11:46:29'),
('UPRO469156268873637553568', 'UPA147982212651', 'UPB5836385273887899752381', 'Members', '2018-10-14 18:19:56'),
('UPRO932453835669327754485', 'UPA147982212651', 'UPB5591484576579966944642', 'Secretary', '2018-10-15 11:46:33'),
('UPRO978942994654368311569', 'UPA147982212651', 'UPB5591484576579966944642', 'Members', '2018-10-14 18:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_profile_geo`
--

CREATE TABLE IF NOT EXISTS `unionprof_profile_geo` (
  `union_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_sup`
--

CREATE TABLE IF NOT EXISTS `unionprof_sup` (
  `support_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `supportOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`support_Id`),
  KEY `union_Id` (`union_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `user_Id_2` (`user_Id`)
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

INSERT INTO `user_account` (`user_Id`, `username`, `surName`, `name`, `dob`, `gender`, `profile_pic`, `about_me`, `minlocation`, `location`, `state`, `country`, `created_On`, `isAdmin`, `user_tz`, `acc_active`) VALUES
('USR113561617186', 'Achuth', 'Achuytham', 'Achuytham', '2018-06-06', 'MALE', ' http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Parvathipuram', 'Araku', 'Andhra Pradesh', 'India', '2018-10-20 13:20:42', 'N', 'Asia/Kolkata', 'Y'),
('USR128879133554', 'Santosh', 'Santhu', 'Santo', '2018-04-07', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/5.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-10-20 13:24:19', 'N', 'Asia/Kolkata', 'Y'),
('USR255798352927', 'Saiteja', 'Srirambhatla', 'Saiteja', '1996-08-16', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:24:13', 'N', 'Asia/Kolkata', 'Y'),
('USR273782437846', 'geetha', 'Nellutla', 'Geetha Rani ', '2018-03-19', 'FEMALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/12.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:24:03', 'N', 'Asia/Kolkata', 'Y'),
('USR461726196865', 'anupwefe', 'Nelwefl', 'eeffwee', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Bijapur City', 'Bijapur', 'Karnataka', 'India', '2018-10-20 13:23:55', 'N', 'Asia/Kolkata', 'Y'),
('USR473525687856', 'Raju', 'Rajendra', 'Raju', '2009-10-14', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_293,y_133,w_694,h_694,z_0.1296,c_crop/v1526192946/IMG-20171019-WA0054_vexsaw.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-05-13 06:29:07', 'N', 'Asia/Kolkata', 'Y'),
('USR553425241674', 'anup123', 'Nellutlalnrao', 'Laxmi Narasimha', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Devar Hippargi', 'Bijapur', 'Karnataka', 'India', '2018-10-20 13:22:53', 'N', 'Asia/Kolkata', 'Y'),
('USR571322289932', 'svsdv', 'vdv', 'e', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', '', '', '', '', '2018-10-20 13:22:47', 'N', 'Asia/Kolkata', 'Y'),
('USR626729797799', 'asifkhan', 'Shareef', 'Asif Khan', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:22:40', 'N', 'Asia/Kolkata', 'Y'),
('USR715494757975', 'asdwww', 'aasc', 'acedqw', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/2.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-10-20 13:22:30', 'N', 'Asia/Kolkata', 'Y'),
('USR735875819411', 'anupchakravarthi', 'abcde', 'scc', '1991-10-10', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_13,y_13,w_230,h_230,z_0.3906,c_crop/v1529333612/sim-icon_fv64zu.png', '', 'Barwala', 'Hissar', 'Haryana', 'India', '2018-06-18 14:53:29', 'N', 'Asia/Kolkata', 'Y'),
('USR751143828474', 'anup12345f3rjf', 'ahchjdc', 'DXX ENX', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Raichur Rural', 'Raichur', 'Karnataka', 'India', '2018-10-20 13:23:38', 'N', 'Asia/Kolkata', 'Y'),
('USR755171938565', 'qwert123', 'asdf123', 'adxdfcdg', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/1/images/avatar/5.jpg', '', 'Anantnag Region', 'Anantnag', 'Jammu And Kashmir', 'India', '2018-10-20 13:23:46', 'N', 'Asia/Kolkata', 'Y'),
('USR787548352593', 'anupchakri', 'Nellutla', 'R', '1991-10-10', 'MALE', 'http://localhost/mlh/android-web/1/images/avatar/3.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:23:31', 'N', 'Asia/Kolkata', 'Y'),
('USR856754698562', 'venugopal', 'Nellutla', 'Venugopal Rao', '1956-01-10', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'Sangareddy', 'Medak', 'Telangana', 'India', '2018-10-20 13:22:09', 'N', 'Asia/Kolkata', 'Y'),
('USR862369784264', 'Sai teja', 'Tej Sai Teja ', 'Sai Teja ', '2000-11-30', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/6.jpg', '', 'Wanaparthy', 'Mahbubnagar', 'Telangana', 'India', '2018-10-20 13:22:01', 'N', 'Asia/Kolkata', 'Y'),
('USR876657119297', 'k.adithya', 'Kankipati', 'adithya kankipati', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/6.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:21:34', 'N', 'Asia/Kolkata', 'Y'),
('USR916113175364', 'sde', 'wdqed', 'dqw', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/7.jpg', '', '', '', '', '', '2018-10-20 13:21:18', 'N', 'Asia/Kolkata', 'Y'),
('USR924357814934', 'anups', 'Nellutla', 'Anup Chakravarthi', '2015-11-12', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'Kuttanad', 'Mavelikara', 'Kerala', 'India', '2018-10-20 13:21:13', 'N', 'Asia/Kolkata', 'Y'),
('USR947899367838', 'ascadcad', 'acdc', 'dqwdde', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/1/images/avatar/8.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-10-20 13:21:40', 'N', 'Asia/Kolkata', 'Y'),
('USR984371315633', 'nellutlalnrao', 'NellutlaLNRao', 'AnupChakravarthi', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'Malappuram Region', 'Malappuram', 'Kerala', 'India', '2018-10-20 13:21:48', 'N', 'Asia/Kolkata', 'Y'),
('USR985685916147', 'ascasc', 'asc', 'cscc', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/2.jpg', '', 'Nandurbar', 'Nandurbar', 'Maharashtra', 'India', '2018-10-20 13:23:02', 'N', 'Asia/Kolkata', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE IF NOT EXISTS `user_contacts` (
  `contact_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `mcountrycode` varchar(6) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `mob_val` varchar(1) NOT NULL,
  PRIMARY KEY (`contact_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`contact_Id`, `user_Id`, `mcountrycode`, `mobile`, `mob_val`) VALUES
('111', 'USR113561617186', '+91', '999228', 'Y'),
('112', 'USR876657119297', '+91', '999227', 'Y'),
('1230', 'USR273782437846', '+91', '9959633209', 'Y'),
('1231', 'USR461726196865', '+91', '9948390094', 'Y'),
('1232', 'USR715494757975', '+91', '9177221984', 'Y'),
('1233', 'USR924357814934', '+91', '9160869337', 'Y'),
('1234', 'USR273782437846', '+91', '9291532292', 'Y'),
('6464', 'USR876657119297', '+91', '5345678191', 'Y'),
('USRC672299184377', 'USR787548352593', '+91', '6300193369', 'Y'),
('USRC933712817918', 'USR856754698562', '+91', '6300195026', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_frnds`
--

CREATE TABLE IF NOT EXISTS `user_frnds` (
  `rel_Id` varchar(25) NOT NULL,
  `rel_from` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rel_tz` varchar(35) NOT NULL,
  `frnd1` varchar(15) NOT NULL COMMENT 'Request Sent',
  `frnd2` varchar(15) NOT NULL COMMENT 'Request Accepted',
  `frnd1_call_frnd2` varchar(35) NOT NULL,
  `frnd2_call_frnd1` varchar(35) NOT NULL,
  `notify` varchar(1) NOT NULL,
  PRIMARY KEY (`rel_Id`),
  KEY `frnd1` (`frnd1`,`frnd2`),
  KEY `frnd2` (`frnd2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_frnds`
--

INSERT INTO `user_frnds` (`rel_Id`, `rel_from`, `rel_tz`, `frnd1`, `frnd2`, `frnd1_call_frnd2`, `frnd2_call_frnd1`, `notify`) VALUES
('FREL187387334177284141946', '2018-06-01 17:39:27', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL216621668146357997868', '2018-06-01 18:16:28', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL323942158692231274458', '2018-06-02 18:04:18', 'Asia/Kolkata', 'USR461726196865', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL355323199734657944622', '2018-06-01 18:16:06', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL373546946265162946937', '2018-06-01 17:43:46', 'Asia/Kolkata', 'USR626729797799', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL398295761324325863596', '2018-06-01 18:15:11', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL418662147654876157835', '2018-06-01 17:40:47', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL443354954136494138944', '2018-06-01 17:39:44', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL465592416562739371251', '2018-06-01 17:37:07', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL473477679165452365849', '2018-06-01 18:16:20', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL492875446517343162711', '2018-09-23 11:16:52', 'Asia/Kolkata', 'USR473525687856', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', 'Y'),
('FREL582849374534951452184', '2018-06-01 17:39:39', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL583581511597759711768', '2018-06-01 17:47:41', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL742155929929149896838', '2018-06-01 18:16:24', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('USRF549792774728', '2018-10-20 17:30:55', 'Asia/Kolkata', 'USR113561617186', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', 'N'),
('USRF655773312939', '2018-09-23 14:23:44', 'Asia/Kolkata', 'USR856754698562', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', 'Y');

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
  `reqMessage` varchar(300) NOT NULL,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`req_Id`),
  KEY `from_userId` (`from_userId`,`to_userId`),
  KEY `to_userId_2` (`to_userId`),
  KEY `to_userId` (`to_userId`),
  KEY `from_userId_2` (`from_userId`),
  KEY `to_userId_3` (`to_userId`)
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
-- Table structure for table `user_profile_geo`
--

CREATE TABLE IF NOT EXISTS `user_profile_geo` (
  `user_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_geo`
--

INSERT INTO `user_profile_geo` (`user_Id`, `cur_lat`, `cur_long`, `geoUpdatedOn`) VALUES
('USR113561617186', '17.2975976', '78.560131', '2018-10-07 13:40:33'),
('USR273782437846', '0.0', '0.0', '2018-10-03 16:58:52'),
('USR571322289932', '0.0', '0.0', '2018-09-03 13:37:48'),
('USR924357814934', '17.3356668', '78.5248306', '2018-10-16 12:19:58');

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
  KEY `user_Id` (`user_Id`),
  KEY `user_Id_2` (`user_Id`),
  KEY `domain_Id_2` (`domain_Id`),
  KEY `subdomain_Id_2` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subscription`
--

INSERT INTO `user_subscription` (`sub_Id`, `user_Id`, `domain_Id`, `subdomain_Id`, `sub_on`) VALUES
('SUBUSR2557983529279139000', 'USR255798352927', '01-TPI', 'TPI-01-A', '2018-08-14 17:40:20'),
('SUBUSR2557983529279139001', 'USR255798352927', '01-TPI', 'TPI-02-B', '2018-08-14 17:40:20'),
('SUBUSR2557983529279139002', 'USR255798352927', '01-TPI', 'TPI-03-C', '2018-08-14 17:40:20'),
('SUBUSR9243578149342360000', 'USR924357814934', '01-TPI', 'TPI-01-A', '2018-06-20 18:01:15'),
('SUBUSR9243578149342360001', 'USR924357814934', '01-TPI', 'TPI-02-B', '2018-06-20 18:01:15'),
('SUBUSR9243578149342360002', 'USR924357814934', '01-TPI', 'TPI-03-C', '2018-06-20 18:01:15'),
('USRS196865959727525842894', 'USR787548352593', '06-FIN', 'FIN-02-INS', '2018-10-17 09:03:49'),
('USRS255633876612282166569', 'USR787548352593', '01-TPI', 'TPI-03-C', '2018-10-17 09:03:44'),
('USRS366521864538115839689', 'USR787548352593', '01-TPI', 'TPI-01-A', '2018-10-17 09:03:42'),
('USRS417871715125788473876', 'USR924357814934', '06-FIN', 'FIN-02-INS', '2018-10-07 12:25:13'),
('USRS815434953441644461919', 'USR924357814934', '06-FIN', 'FIN-01-BNK', '2018-10-07 12:25:11'),
('USRS925959232963692582675', 'USR787548352593', '01-TPI', 'TPI-02-B', '2018-10-17 09:03:40'),
('USRS998575357219462246172', 'USR787548352593', '06-FIN', 'FIN-01-BNK', '2018-10-17 09:03:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cmp_batch_account`
--
ALTER TABLE `cmp_batch_account`
  ADD CONSTRAINT `cmp_batch_account_ibfk_1` FOREIGN KEY (`cmp_u_Id`) REFERENCES `cmp_uni_account` (`cmp_u_Id`),
  ADD CONSTRAINT `cmp_batch_account_ibfk_2` FOREIGN KEY (`cmp_sch_Id`) REFERENCES `cmp_sch_account` (`cmp_sch_Id`),
  ADD CONSTRAINT `cmp_batch_account_ibfk_3` FOREIGN KEY (`cmp_course_Id`) REFERENCES `cmp_uni_courses` (`cmp_course_Id`);

--
-- Constraints for table `cmp_batch_members`
--
ALTER TABLE `cmp_batch_members`
  ADD CONSTRAINT `cmp_batch_members_ibfk_1` FOREIGN KEY (`batch_Id`) REFERENCES `cmp_batch_account` (`batch_Id`),
  ADD CONSTRAINT `cmp_batch_members_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `cmp_batch_mem_chat`
--
ALTER TABLE `cmp_batch_mem_chat`
  ADD CONSTRAINT `cmp_batch_mem_chat_ibfk_1` FOREIGN KEY (`batch_Id`) REFERENCES `cmp_batch_account` (`batch_Id`),
  ADD CONSTRAINT `cmp_batch_mem_chat_ibfk_2` FOREIGN KEY (`msg_by`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `cmp_batch_mem_chat_status`
--
ALTER TABLE `cmp_batch_mem_chat_status`
  ADD CONSTRAINT `cmp_batch_mem_chat_status_ibfk_1` FOREIGN KEY (`chat_Id`) REFERENCES `cmp_batch_mem_chat` (`chat_Id`),
  ADD CONSTRAINT `cmp_batch_mem_chat_status_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `cmp_sch_account`
--
ALTER TABLE `cmp_sch_account`
  ADD CONSTRAINT `cmp_sch_account_ibfk_1` FOREIGN KEY (`cmp_u_Id`) REFERENCES `cmp_uni_account` (`cmp_u_Id`),
  ADD CONSTRAINT `cmp_sch_account_ibfk_2` FOREIGN KEY (`createdBy`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `cmp_sch_coursemap`
--
ALTER TABLE `cmp_sch_coursemap`
  ADD CONSTRAINT `cmp_sch_coursemap_ibfk_1` FOREIGN KEY (`cmp_sch_Id`) REFERENCES `cmp_sch_account` (`cmp_sch_Id`),
  ADD CONSTRAINT `cmp_sch_coursemap_ibfk_2` FOREIGN KEY (`cmp_course_Id`) REFERENCES `cmp_uni_courses` (`cmp_course_Id`),
  ADD CONSTRAINT `cmp_sch_coursemap_ibfk_3` FOREIGN KEY (`cmp_u_Id`) REFERENCES `cmp_uni_account` (`cmp_u_Id`);

--
-- Constraints for table `cmp_uni_account`
--
ALTER TABLE `cmp_uni_account`
  ADD CONSTRAINT `cmp_uni_account_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`),
  ADD CONSTRAINT `cmp_uni_account_ibfk_2` FOREIGN KEY (`subdomain_Id`) REFERENCES `subs_subdom_info` (`subdomain_Id`);

--
-- Constraints for table `cmp_uni_coursemap`
--
ALTER TABLE `cmp_uni_coursemap`
  ADD CONSTRAINT `cmp_uni_coursemap_ibfk_1` FOREIGN KEY (`cmp_u_Id`) REFERENCES `cmp_uni_account` (`cmp_u_Id`),
  ADD CONSTRAINT `cmp_uni_coursemap_ibfk_2` FOREIGN KEY (`cmp_course_Id`) REFERENCES `cmp_uni_courses` (`cmp_course_Id`);

--
-- Constraints for table `hook_buddy_info`
--
ALTER TABLE `hook_buddy_info`
  ADD CONSTRAINT `hook_buddy_info_ibfk_1` FOREIGN KEY (`hook_by`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `move_info`
--
ALTER TABLE `move_info`
  ADD CONSTRAINT `move_info_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `move_info_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

--
-- Constraints for table `move_sign`
--
ALTER TABLE `move_sign`
  ADD CONSTRAINT `move_sign_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`),
  ADD CONSTRAINT `move_sign_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `move_views`
--
ALTER TABLE `move_views`
  ADD CONSTRAINT `move_views_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`),
  ADD CONSTRAINT `move_views_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `newsfeed_info`
--
ALTER TABLE `newsfeed_info`
  ADD CONSTRAINT `newsfeed_info_ibfk_1` FOREIGN KEY (`writtenBy`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `newsfeed_move`
--
ALTER TABLE `newsfeed_move`
  ADD CONSTRAINT `newsfeed_move_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_move_ibfk_2` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`);

--
-- Constraints for table `newsfeed_share_i`
--
ALTER TABLE `newsfeed_share_i`
  ADD CONSTRAINT `newsfeed_share_i_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_share_i_ibfk_2` FOREIGN KEY (`approvedBy`) REFERENCES `user_account` (`user_Id`);

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
  ADD CONSTRAINT `newsfeed_user_likes_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_user_likes_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `newsfeed_user_views`
--
ALTER TABLE `newsfeed_user_views`
  ADD CONSTRAINT `newsfeed_user_views_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_user_views_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `newsfeed_user_votes`
--
ALTER TABLE `newsfeed_user_votes`
  ADD CONSTRAINT `newsfeed_user_votes_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_user_votes_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `subs_subdom_info`
--
ALTER TABLE `subs_subdom_info`
  ADD CONSTRAINT `subs_subdom_info_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`);

--
-- Constraints for table `unionprof_account`
--
ALTER TABLE `unionprof_account`
  ADD CONSTRAINT `unionprof_account_ibfk_1` FOREIGN KEY (`admin_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `unionprof_account_ibfk_5` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`),
  ADD CONSTRAINT `unionprof_account_ibfk_6` FOREIGN KEY (`subdomain_Id`) REFERENCES `subs_subdom_info` (`subdomain_Id`);

--
-- Constraints for table `unionprof_branch`
--
ALTER TABLE `unionprof_branch`
  ADD CONSTRAINT `unionprof_branch_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_branch_ibfk_2` FOREIGN KEY (`admin_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `unionprof_branch_req`
--
ALTER TABLE `unionprof_branch_req`
  ADD CONSTRAINT `unionprof_branch_req_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_branch_req_ibfk_2` FOREIGN KEY (`reqBy`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `unionprof_calndar_union`
--
ALTER TABLE `unionprof_calndar_union`
  ADD CONSTRAINT `unionprof_calndar_union_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`);

--
-- Constraints for table `unionprof_mem`
--
ALTER TABLE `unionprof_mem`
  ADD CONSTRAINT `unionprof_mem_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`),
  ADD CONSTRAINT `unionprof_mem_ibfk_3` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `unionprof_mem_ibfk_6` FOREIGN KEY (`memAddedBy`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `unionprof_mem_req`
--
ALTER TABLE `unionprof_mem_req`
  ADD CONSTRAINT `unionprof_mem_req_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_3` FOREIGN KEY (`req_from`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_4` FOREIGN KEY (`req_to`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `unionprof_mem_roles`
--
ALTER TABLE `unionprof_mem_roles`
  ADD CONSTRAINT `unionprof_mem_roles_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_roles_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

--
-- Constraints for table `unionprof_sup`
--
ALTER TABLE `unionprof_sup`
  ADD CONSTRAINT `unionprof_sup_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_sup_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD CONSTRAINT `user_contacts_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_frnds_req`
--
ALTER TABLE `user_frnds_req`
  ADD CONSTRAINT `user_frnds_req_ibfk_1` FOREIGN KEY (`from_userId`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_frnds_req_ibfk_2` FOREIGN KEY (`to_userId`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_profile_geo`
--
ALTER TABLE `user_profile_geo`
  ADD CONSTRAINT `user_profile_geo_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_subscription`
--
ALTER TABLE `user_subscription`
  ADD CONSTRAINT `user_subscription_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `user_subscription_ibfk_2` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`),
  ADD CONSTRAINT `user_subscription_ibfk_3` FOREIGN KEY (`subdomain_Id`) REFERENCES `subs_subdom_info` (`subdomain_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
