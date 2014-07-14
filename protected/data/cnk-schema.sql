-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2014 at 10:44 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coxnkings`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse_reports`
--

CREATE TABLE `abuse_reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_id` int(11) NOT NULL DEFAULT '0',
  `report_time` datetime DEFAULT NULL,
  `ip_address` char(16) CHARACTER SET latin1 DEFAULT NULL,
  `reason` text CHARACTER SET latin1,
  PRIMARY KEY (`report_id`),
  KEY `content_id` (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE `AuthItem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `source` varchar(50) CHARACTER SET utf8 NOT NULL,
  `media_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alternate_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` enum('video','image','text') CHARACTER SET utf8 NOT NULL,
  `author` varchar(150) CHARACTER SET utf8 NOT NULL,
  `channel_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `authentication` varchar(150) CHARACTER SET utf8 NOT NULL,
  `notes` text CHARACTER SET utf8 NOT NULL,
  `flags` varchar(50) CHARACTER SET utf8 NOT NULL,
  `is_ugc` tinyint(1) NOT NULL DEFAULT '0',
  `thumb_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alternate_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` enum('pending','active','inactive','deleted') CHARACTER SET utf8 NOT NULL DEFAULT 'pending',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gallery_fast` (`gallery_id`,`id`),
  KEY `gallery_id` (`gallery_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;


-- --------------------------------------------------------
--
-- Table structure for table `content_views`
--

CREATE TABLE `content_views` (
  `content_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  `environment_id` int(11) NOT NULL,
  KEY `content_id` (`content_id`),
  KEY `environment_id` (`environment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_votes`
--

CREATE TABLE `content_votes` (
  `content_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `auth_source` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `environment_id` int(11) NOT NULL,
  KEY `environment_id` (`environment_id`),
  KEY `content_id` (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `environments`
--

CREATE TABLE `environments` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` char(64) CHARACTER SET latin1 DEFAULT NULL,
  `shortcode` varchar(3) CHARACTER SET latin1 NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `title` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `status` enum('pending','active','inactive','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending' COMMENT '-1 is Pending, 0 Inactive, 1 Active',
  `is_ugc` tinyint(1) NOT NULL DEFAULT '0',
  `voting_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `is_moderated` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `geolocation_countries`
--

CREATE TABLE `geolocation_countries` (
  `country_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `abbreviation` char(16) CHARACTER SET latin1 DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=247 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'is the phase home page',
  `environment_id` int(10) NOT NULL DEFAULT '1',
  `status` enum('pending','active','inactive') COLLATE utf8_unicode_ci DEFAULT 'pending',
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `thumb` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `share_text` text CHARACTER SET utf8,
  `theater_share_text` text CHARACTER SET utf8,
  `share_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `header` tinyint(1) NOT NULL DEFAULT '0',
  `footer` tinyint(1) NOT NULL DEFAULT '0',
  `partners` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;


-- --------------------------------------------------------

--
-- Table structure for table `page_galleries`
--

CREATE TABLE `page_galleries` (
  `page_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `order_id` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`,`order_id`),
  KEY `page_id` (`page_id`),
  KEY `gallery_id` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `page_id` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `views` int(11) DEFAULT NULL,
  `environment_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`,`date`,`environment_id`),
  KEY `environment_id` (`environment_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_widgets`
--

CREATE TABLE `page_widgets` (
  `page_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`,`order_id`),
  KEY `page_id` (`page_id`),
  KEY `widget_id` (`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phase_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_label` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link_type` enum('landing','associate') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'associate',
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_auths`
--

CREATE TABLE `social_auths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `social` enum('facebook','twitter','google','instagram','flicker') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'twitter',
  `identifier` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `access_secret` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_expiry` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_calls`
--

CREATE TABLE `social_calls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_id` int(11) NOT NULL,
  `source` enum('twitter','facebook','googleplus') COLLATE utf8_unicode_ci NOT NULL,
  `keyword_string` text COLLATE utf8_unicode_ci NOT NULL,
  `base_api_url` text COLLATE utf8_unicode_ci NOT NULL,
  `post_count` int(11) NOT NULL DEFAULT '100',
  `frequency` int(11) NOT NULL DEFAULT '3600',
  `last_call_time` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `next_call_time` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stream_id` (`stream_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_posts`
--

CREATE TABLE `social_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_id` int(11) NOT NULL,
  `source` enum('twitter','facebook','google') COLLATE utf8_unicode_ci NOT NULL,
  `post_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_hash` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `post_text` text COLLATE utf8_unicode_ci NOT NULL,
  `post_lang` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_source` text COLLATE utf8_unicode_ci,
  `post_url` text COLLATE utf8_unicode_ci,
  `post_type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_story_text` text COLLATE utf8_unicode_ci,
  `post_picture` text COLLATE utf8_unicode_ci,
  `post_link` text COLLATE utf8_unicode_ci,
  `post_name` text COLLATE utf8_unicode_ci,
  `post_caption` text COLLATE utf8_unicode_ci,
  `post_description` text COLLATE utf8_unicode_ci,
  `user_category` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_profile_image` text COLLATE utf8_unicode_ci,
  `user_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_screen_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_lang` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_location` text COLLATE utf8_unicode_ci,
  `user_followers_count` int(10) NOT NULL DEFAULT '0',
  `user_friend_count` int(10) NOT NULL DEFAULT '0',
  `user_status_count` int(10) NOT NULL DEFAULT '0',
  `post_likes` int(11) NOT NULL DEFAULT '0',
  `post_comments` int(11) NOT NULL DEFAULT '0',
  `user_url` text COLLATE utf8_unicode_ci,
  `post_status` enum('new','approved','rejected','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `date_published` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `date_published_ts` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `stream_id` (`stream_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_streams`
--

CREATE TABLE `social_streams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `is_phrase` tinyint(1) NOT NULL DEFAULT '0',
  `is_profile` tinyint(1) NOT NULL DEFAULT '0',
  `is_twitter` tinyint(1) NOT NULL DEFAULT '0',
  `is_facebook` tinyint(1) NOT NULL DEFAULT '0',
  `is_gplus` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('active','inactive','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`,`page_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(256) CHARACTER SET latin1 NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `status` enum('active','pending','deleted') CHARACTER SET latin1 NOT NULL DEFAULT 'pending',
  `verification_code` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT '0',
  `role` enum('superadmin','admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `last_login_time` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `displayname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `occupation` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `profile_image` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `passport` enum('1','0') CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `facebook` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `twitter` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `flickr` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `instagram` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `about_me` text COLLATE utf8_unicode_ci NOT NULL,
  `authenticated_from` enum('site','facebook','twitter','google') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'site',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `widget_type_id` int(11) NOT NULL,
  `data` text CHARACTER SET utf8,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `type_id` (`widget_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget_types`
--

CREATE TABLE `widget_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `form_name` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
