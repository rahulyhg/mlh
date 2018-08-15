-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2018 at 05:51 PM
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
  `displayLevel` varchar(25) NOT NULL COMMENT 'SUBDOMAIN_LEVEL/DOMAIN_LEVEL',
  PRIMARY KEY (`move_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Domain Movement';

--
-- Dumping data for table `move_info`
--

INSERT INTO `move_info` (`move_Id`, `union_Id`, `createdOn`, `petitionTitle`, `toA_pName1`, `toA_dd1`, `toA_pName2`, `toA_dd2`, `toA_pName3`, `toA_dd3`, `toA_pName4`, `toA_dd4`, `toA_pName5`, `toA_dd5`, `issue_desc`, `issue_facedby`, `expectedSolution`, `move_img`, `move_status`, `openOn`, `closedOn`, `displayLevel`) VALUES
('12345', 'UPA533731685151', '2018-07-11 18:30:00', 'Petition', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OPEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'DOMAIN_LEVEL');

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
  PRIMARY KEY (`view_Id`)
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

--
-- Dumping data for table `newsfeed_info`
--

INSERT INTO `newsfeed_info` (`info_Id`, `bizUnionId`, `unionBranchId`, `artTitle`, `artShrtDesc`, `artDesc`, `createdOn`, `images`, `newsFeedType`, `displayLevel`, `status`) VALUES
('123455', 'UPA533731685151', 'UB16594981664917248917333', 'NewsFeed Article Title', 'NewsFeed Article Short Description', 'NewsFeed Article Long Description', '2018-07-04 05:04:13', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyFKrB7A-XT4LkxPTC41o4J2IpSBbdWqo0Njw-PdrPpCUb26gm', 'UNION', 'UNION_LEVEL', 'ACTIVE');

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
('UPA533731685151', '09-ITS', 'ITS-01-SN', 'UB16594981664917248917333', 'MyLocalHook', 'Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png', '2018-06-25 18:16:51', 'USR924357814934', '', '', '', '', '', '', '', '', '', '');

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
  PRIMARY KEY (`branch_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `admin_Id` (`admin_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`req_branch_Id`),
  KEY `union_Id` (`union_Id`,`reqBy`),
  KEY `reqBy` (`reqBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_branch_req`
--

INSERT INTO `unionprof_branch_req` (`req_branch_Id`, `union_Id`, `minlocation`, `location`, `state`, `country`, `reqOn`, `reqBy`) VALUES
('12345', 'UPA533731685151', 'Kukatpally', 'Ranga Reddy District', 'Telangana', 'India', '2018-07-04 09:08:46', 'USR128879133554');

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

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_chat`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_chat` (
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
-- Table structure for table `unionprof_mem_perm1`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_perm1` (
  `permission_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `createABranch` varchar(1) NOT NULL,
  `createABranchNotify` varchar(1) NOT NULL,
  `updateBranchInfo` varchar(1) NOT NULL,
  `updateBranchInfoNotify` varchar(1) NOT NULL,
  `deleteBranch` varchar(1) NOT NULL,
  `deleteBranchNotify` varchar(1) NOT NULL,
  `shiftMainBranch` varchar(1) NOT NULL,
  `shiftMainBranchNotify` varchar(1) NOT NULL,
  `createRole` varchar(1) NOT NULL,
  `createRoleNotify` varchar(1) NOT NULL,
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
  `createNewsFeedUnionLevel` varchar(1) NOT NULL,
  `createNewsFeedUnionLevelNotify` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevel` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevelNotify` varchar(1) NOT NULL,
  `createMovementBranchLevel` varchar(1) NOT NULL,
  `createMovementBranchLevelNotify` varchar(1) NOT NULL,
  `approveMovementBranchLevel` varchar(1) NOT NULL,
  `approveMovementBranchLevelNotify` varchar(1) NOT NULL,
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
  `answerUnionFAQ` varchar(1) NOT NULL,
  `answerBranchFAQ` varchar(1) NOT NULL,
  `updatedPermOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_req`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_req` (
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
  KEY `branch_Id` (`branch_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id_2` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  KEY `branch_Id` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_mem_roles`
--

INSERT INTO `unionprof_mem_roles` (`role_Id`, `union_Id`, `branch_Id`, `roleName`, `updatedOn`) VALUES
('PUR3123769563188899796114', 'UPA533731685151', 'UB16594981664917248917333', 'Founder and CEO', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `unionprof_sup`
--

INSERT INTO `unionprof_sup` (`support_Id`, `union_Id`, `user_Id`, `supportOn`) VALUES
('12345', 'UPA533731685151', 'USR924357814934', '2018-07-04 05:03:40');

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
('USR113561617186', 'Achuth', 'Achuytham', 'Achuytham', '2018-06-06', 'MALE', ' http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Parvathipuram', 'Araku', 'Andhra Pradesh', 'India', '2018-06-01 12:11:29', 'N', 'Asia/Kolkata', 'Y'),
('USR128879133554', 'Santosh', 'Santhu', 'Santo', '2018-04-07', 'MALE', 'http://192.168.1.4/mlh/android-web/images/avatar/5.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-06-01 11:06:13', 'N', '', 'Y'),
('USR255798352927', 'Saiteja', 'Srirambhatla', 'Saiteja', '1996-08-16', 'MALE', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-06-10 07:52:25', 'N', 'Asia/Kolkata', 'Y'),
('USR273782437846', 'geetha', 'Nellutla', 'Geetha Rani ', '2018-03-19', 'FEMALE', 'http://192.168.1.4/mlh/android-web/images/avatar/12.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-21 05:18:41', 'N', '', 'Y'),
('USR461726196865', 'anupwefe', 'Nelwefl', 'eeffwee', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Bijapur City', 'Bijapur', 'Karnataka', 'India', '2018-04-21 05:18:47', 'N', 'Asia/Kolkata', 'Y'),
('USR473525687856', 'Raju', 'Rajendra', 'Raju', '2009-10-14', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_293,y_133,w_694,h_694,z_0.1296,c_crop/v1526192946/IMG-20171019-WA0054_vexsaw.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-05-13 06:29:07', 'N', 'Asia/Kolkata', 'Y'),
('USR553425241674', 'anup123', 'Nellutlalnrao', 'Laxmi Narasimha', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Devar Hippargi', 'Bijapur', 'Karnataka', 'India', '2018-04-21 05:18:53', 'N', 'Asia/Kolkata', 'Y'),
('USR571322289932', 'svsdv', 'vdv', 'e', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', '', '', '', '', '2018-04-21 05:18:59', 'N', 'Asia/Kolkata', 'Y'),
('USR626729797799', 'asifkhan', 'Shareef', 'Asif Khan', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/3.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-21 05:19:05', 'N', 'Asia/Kolkata', 'Y'),
('USR715494757975', 'asdwww', 'aasc', 'acedqw', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/2.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-04-21 05:19:12', 'N', 'Asia/Kolkata', 'Y'),
('USR735875819411', 'anupchakravarthi', 'abcde', 'scc', '1991-10-10', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_13,y_13,w_230,h_230,z_0.3906,c_crop/v1529333612/sim-icon_fv64zu.png', '', 'Barwala', 'Hissar', 'Haryana', 'India', '2018-06-18 14:53:29', 'N', 'Asia/Kolkata', 'Y'),
('USR751143828474', 'anup12345f3rjf', 'ahchjdc', 'DXX ENX', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/1.jpg', '', 'Raichur Rural', 'Raichur', 'Karnataka', 'India', '2018-04-21 05:19:17', 'N', 'Asia/Kolkata', 'Y'),
('USR755171938565', 'qwert123', 'asdf123', 'adxdfcdg', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/images/avatar/5.jpg', '', 'Anantnag Region', 'Anantnag', 'Jammu And Kashmir', 'India', '2018-04-21 05:19:29', 'N', 'Asia/Kolkata', 'Y'),
('USR862369784264', 'Sai teja', 'Tej Sai Teja ', 'Sai Teja ', '2000-11-30', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_60,y_260,w_1080,h_1080,z_0.0833,c_crop/v1525800009/IMG_20180507_191759_y3yqnz.jpg', '', 'Wanaparthy', 'Mahbubnagar', 'Telangana', 'India', '2018-05-08 17:20:17', 'N', '', 'Y'),
('USR876657119297', 'k.adithya', 'Kankipati', 'adithya kankipati', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/6.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-04-21 05:19:34', 'N', 'Asia/Kolkata', 'Y'),
('USR916113175364', 'sde', 'wdqed', 'dqw', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/7.jpg', '', '', '', '', '', '2018-04-21 05:19:39', 'N', 'Asia/Kolkata', 'Y'),
('USR924357814934', 'anups', 'Nellutla', 'Anup Chakravarthi', '2015-11-12', 'MALE', 'http://localhost/mlh/android-web/images/avatar/3.jpg', '', 'Kuttanad', 'Mavelikara', 'Kerala', 'India', '2018-06-26 10:54:23', 'N', 'Asia/Kolkata', 'Y'),
('USR947899367838', 'ascadcad', 'acdc', 'dqwdde', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/images/avatar/8.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-04-21 05:19:59', 'N', 'Asia/Kolkata', 'Y'),
('USR984371315633', 'nellutlalnrao', 'NellutlaLNRao', 'AnupChakravarthi', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/3.jpg', '', 'Malappuram Region', 'Malappuram', 'Kerala', 'India', '2018-04-21 05:20:05', 'N', 'Asia/Kolkata', 'Y'),
('USR985685916147', 'ascasc', 'asc', 'cscc', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/images/avatar/2.jpg', '', 'Nandurbar', 'Nandurbar', 'Maharashtra', 'India', '2018-04-21 05:20:09', 'N', 'Asia/Kolkata', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE IF NOT EXISTS `user_contact` (
  `contact_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `mcountrycode` varchar(6) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `mob_val` varchar(1) NOT NULL,
  PRIMARY KEY (`contact_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`contact_Id`, `user_Id`, `mcountrycode`, `mobile`, `mob_val`) VALUES
('111', 'USR113561617186', '+91', '999228', 'Y'),
('112', 'USR876657119297', '+91', '999227', 'Y'),
('1230', 'USR273782437846', '+91', '9959633209', 'Y'),
('1231', 'USR461726196865', '+91', '9948390094', 'Y'),
('1232', 'USR715494757975', '+91', '9177221984', 'Y'),
('1233', 'USR255798352927', '+91', '9160869337', 'Y'),
('1234', 'USR273782437846', '+91', '9291532292', 'Y'),
('6464', 'USR876657119297', '91', '5345678191', 'Y');

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
('FREL113163289416289671228', '2018-07-03 12:31:27', 'Asia/Kolkata', 'USR255798352927', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', 'Y'),
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
('FREL492875446517343162711', '2018-06-02 18:15:37', 'Asia/Kolkata', 'USR473525687856', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL582849374534951452184', '2018-06-01 17:39:39', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL583581511597759711768', '2018-06-01 17:47:41', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL733761537718959391538', '2018-04-07 18:20:19', 'Asia/Kolkata', 'USR924357814934', 'USR715494757975', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL742155929929149896838', '2018-06-01 18:16:24', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL755933712817918856754', '2018-07-03 12:39:49', 'Asia/Kolkata', 'USR255798352927', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', 'Y'),
('FREL887711391824254432678', '2018-04-08 13:46:54', 'Asia/Kolkata', 'USR553425241674', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', '');

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
('SUBUSR2557983529272029000', 'USR255798352927', '03-MDA', 'MDA-01-PRES', '2018-08-14 18:00:59'),
('SUBUSR2557983529272358001', 'USR255798352927', '02-EDU', 'EDU-02-TCHR', '2018-08-14 17:59:38'),
('SUBUSR2557983529273556001', 'USR255798352927', '04-STP', 'STP-02-RE', '2018-08-14 18:02:08'),
('SUBUSR2557983529273556002', 'USR255798352927', '04-STP', 'STP-03-BPO', '2018-08-14 18:02:08'),
('SUBUSR2557983529278333000', 'USR255798352927', '02-EDU', 'EDU-01-STUD', '2018-08-14 17:45:54'),
('SUBUSR2557983529279139000', 'USR255798352927', '01-TPI', 'TPI-01-A', '2018-08-14 17:40:20'),
('SUBUSR2557983529279139001', 'USR255798352927', '01-TPI', 'TPI-02-B', '2018-08-14 17:40:20'),
('SUBUSR2557983529279139002', 'USR255798352927', '01-TPI', 'TPI-03-C', '2018-08-14 17:40:20'),
('SUBUSR9243578149341330000', 'USR924357814934', '02-EDU', 'EDU-01-STUD', '2018-06-17 16:53:55'),
('SUBUSR9243578149341330001', 'USR924357814934', '02-EDU', 'EDU-02-TCHR', '2018-06-17 16:53:55'),
('SUBUSR9243578149342360000', 'USR924357814934', '01-TPI', 'TPI-01-A', '2018-06-20 18:01:15'),
('SUBUSR9243578149342360001', 'USR924357814934', '01-TPI', 'TPI-02-B', '2018-06-20 18:01:15'),
('SUBUSR9243578149342360002', 'USR924357814934', '01-TPI', 'TPI-03-C', '2018-06-20 18:01:15'),
('SUBUSR9243578149346667011', 'USR924357814934', '04-STP', 'STP-12-TCH', '2018-06-20 18:06:45');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `move_info`
--
ALTER TABLE `move_info`
  ADD CONSTRAINT `move_info_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`);

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
  ADD CONSTRAINT `newsfeed_move_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`),
  ADD CONSTRAINT `newsfeed_move_ibfk_2` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`);

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
-- Constraints for table `unionprof_mem_req`
--
ALTER TABLE `unionprof_mem_req`
  ADD CONSTRAINT `unionprof_mem_req_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_3` FOREIGN KEY (`req_from`) REFERENCES `user_account` (`user_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_4` FOREIGN KEY (`req_to`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `unionprof_sup`
--
ALTER TABLE `unionprof_sup`
  ADD CONSTRAINT `unionprof_sup_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_sup_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

--
-- Constraints for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD CONSTRAINT `user_contact_ibfk_2` FOREIGN KEY (`user_Id`) REFERENCES `user_account` (`user_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
