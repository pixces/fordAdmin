-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2014 at 12:20 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ford`
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
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `activity` enum('moderation','submission') NOT NULL DEFAULT 'moderation',
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`key`, `value`) VALUES
('site_url', 'http://localhost:8888/ford'),
('encryption_seed', '3782adf93db49e7239836bb23072f31'),
('environment', 'development'),
('youtube_api_url', 'https://gdata.youtube.com/feeds/api/videos/'),
('thumb_width', '125'),
('thumb_height', '90'),
('partners_thumb_width', '140'),
('partners_thumb_height', '42'),
('associates_thumb_width', '140'),
('associates_thumb_height', '70');

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
  `source` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `media_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alternate_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` enum('video','voice','image','text','ppt','pdf','doc','blog') CHARACTER SET utf8 NOT NULL,
  `author` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `channel_name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `authentication` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `notes` text CHARACTER SET utf8,
  `flags` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `is_ugc` tinyint(1) NOT NULL DEFAULT '0',
  `thumb_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alternate_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` enum('pending','active','inactive','deleted','rejected','approved','under_review','processing','error') CHARACTER SET utf8 NOT NULL DEFAULT 'pending',
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_submitted` tinyint(4) DEFAULT '0',
  `location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vote` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `gallery_fast` (`gallery_id`,`id`),
  KEY `gallery_id` (`gallery_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `social_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `environment_id` int(11) NOT NULL DEFAULT '1',
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

--
-- Dumping data for table `environments`
--

INSERT INTO `environments` (`id`, `name`, `shortcode`, `is_active`) VALUES
(1, 'Microsite', 'bs', 1),
(2, 'Facebook', 'fb', 1),
(3, 'YouTube', 'yt', 1),
(4, 'twitter', 'tw', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `thumb`, `description`, `order_id`, `title`, `status`, `is_ugc`, `voting_enabled`, `is_moderated`, `date_created`, `date_modified`) VALUES
(1, 'fordUGC', 'http://localhost:8888/fordAdmin/uploadedImages/thumb/gallery_1405183614_thumb.jpg', 'Submission of text and voice details by the users for the ford campaign', NULL, 'Ford UGC', 'active', 1, 1, 1, '2014-07-12 22:16:55', '2014-07-12 16:46:57');

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

--
-- Dumping data for table `geolocation_countries`
--

INSERT INTO `geolocation_countries` (`country_id`, `abbreviation`, `display_name`) VALUES
(1, 'af', 'Afghanistan'),
(2, 'ax', 'Åland Islands'),
(3, 'al', 'Albania'),
(4, 'dz', 'Algeria'),
(5, 'as', 'American Samoa'),
(6, 'ad', 'Andorra'),
(7, 'ao', 'Angola'),
(8, 'ai', 'Anguilla'),
(9, 'aq', 'Antarctica'),
(10, 'ag', 'Antigua and Barbuda'),
(11, 'ar', 'Argentina'),
(12, 'am', 'Armenia'),
(13, 'aw', 'Aruba'),
(14, 'au', 'Australia'),
(15, 'at', 'Austria'),
(16, 'az', 'Azerbaijan'),
(17, 'bs', 'Bahamas'),
(18, 'bh', 'Bahrain'),
(19, 'bd', 'Bangladesh'),
(20, 'bb', 'Barbados'),
(21, 'by', 'Belarus'),
(22, 'be', 'Belgium'),
(23, 'bz', 'Belize'),
(24, 'bj', 'Benin'),
(25, 'bm', 'Bermuda'),
(26, 'bt', 'Bhutan'),
(27, 'bo', 'Bolivia, Plurinational State of'),
(28, 'ba', 'Bosnia and Herzegovina'),
(29, 'bw', 'Botswana'),
(30, 'bv', 'Bouvet Island'),
(31, 'br', 'Brazil'),
(32, 'io', 'British Indian Ocean Territory'),
(33, 'bn', 'Brunei Darussalam'),
(34, 'bg', 'Bulgaria'),
(35, 'bf', 'Burkina Faso'),
(36, 'bi', 'Burundi'),
(37, 'kh', 'Cambodia'),
(38, 'cm', 'Cameroon'),
(39, 'ca', 'Canada'),
(40, 'cv', 'Cape Verde'),
(41, 'ky', 'Cayman Islands'),
(42, 'cf', 'Central African Republic'),
(43, 'td', 'Chad'),
(44, 'cl', 'Chile'),
(45, 'cn', 'China'),
(46, 'cx', 'Christmas Island'),
(47, 'cc', 'Cocos (Keeling) Islands'),
(48, 'co', 'Colombia'),
(49, 'km', 'Comoros'),
(50, 'cg', 'Congo'),
(51, 'cd', 'Congo, the Democratic Republic of the'),
(52, 'ck', 'Cook Islands'),
(53, 'cr', 'Costa Rica'),
(54, 'ci', 'Côte d''Ivoire'),
(55, 'hr', 'Croatia'),
(56, 'cu', 'Cuba'),
(57, 'cy', 'Cyprus'),
(58, 'cz', 'Czech Republic'),
(59, 'dk', 'Denmark'),
(60, 'dj', 'Djibouti'),
(61, 'dm', 'Dominica'),
(62, 'do', 'Dominican Republic'),
(63, 'ec', 'Ecuador'),
(64, 'eg', 'Egypt'),
(65, 'sv', 'El Salvador'),
(66, 'gq', 'Equatorial Guinea'),
(67, 'er', 'Eritrea'),
(68, 'ee', 'Estonia'),
(69, 'et', 'Ethiopia'),
(70, 'fk', 'Falkland Islands (Malvinas)'),
(71, 'fo', 'Faroe Islands'),
(72, 'fj', 'Fiji'),
(73, 'fi', 'Finland'),
(74, 'fr', 'France'),
(75, 'gf', 'French Guiana'),
(76, 'pf', 'French Polynesia'),
(77, 'tf', 'French Southern Territories'),
(78, 'ga', 'Gabon'),
(79, 'gm', 'Gambia'),
(80, 'ge', 'Georgia'),
(81, 'de', 'Germany'),
(82, 'gh', 'Ghana'),
(83, 'gi', 'Gibraltar'),
(84, 'gr', 'Greece'),
(85, 'gl', 'Greenland'),
(86, 'gd', 'Grenada'),
(87, 'gp', 'Guadeloupe'),
(88, 'gu', 'Guam'),
(89, 'gt', 'Guatemala'),
(90, 'gg', 'Guernsey'),
(91, 'gn', 'Guinea'),
(92, 'gw', 'Guinea-Bissau'),
(93, 'gy', 'Guyana'),
(94, 'ht', 'Haiti'),
(95, 'hm', 'Heard Island and McDonald Islands'),
(96, 'va', 'Holy See (Vatican City State)'),
(97, 'hn', 'Honduras'),
(98, 'hk', 'Hong Kong'),
(99, 'hu', 'Hungary'),
(100, 'is', 'Iceland'),
(101, 'in', 'India'),
(102, 'id', 'Indonesia'),
(103, 'ir', 'Iran, Islamic Republic of'),
(104, 'iq', 'Iraq'),
(105, 'ie', 'Ireland'),
(106, 'im', 'Isle of Man'),
(107, 'il', 'Israel'),
(108, 'it', 'Italy'),
(109, 'jm', 'Jamaica'),
(110, 'jp', 'Japan'),
(111, 'je', 'Jersey'),
(112, 'jo', 'Jordan'),
(113, 'kz', 'Kazakhstan'),
(114, 'ke', 'Kenya'),
(115, 'ki', 'Kiribati'),
(116, 'kp', 'Korea, Democratic People''s Republic of'),
(117, 'kr', 'Korea, Republic of'),
(118, 'kw', 'Kuwait'),
(119, 'kg', 'Kyrgyzstan'),
(120, 'la', 'Lao People''s Democratic Republic'),
(121, 'lv', 'Latvia'),
(122, 'lb', 'Lebanon'),
(123, 'ls', 'Lesotho'),
(124, 'lr', 'Liberia'),
(125, 'ly', 'Libyan Arab Jamahiriya'),
(126, 'li', 'Liechtenstein'),
(127, 'lt', 'Lithuania'),
(128, 'lu', 'Luxembourg'),
(129, 'mo', 'Macao'),
(130, 'mk', 'Macedonia, the former Yugoslav Republic of'),
(131, 'mg', 'Madagascar'),
(132, 'mw', 'Malawi'),
(133, 'my', 'Malaysia'),
(134, 'mv', 'Maldives'),
(135, 'ml', 'Mali'),
(136, 'mt', 'Malta'),
(137, 'mh', 'Marshall Islands'),
(138, 'mq', 'Martinique'),
(139, 'mr', 'Mauritania'),
(140, 'mu', 'Mauritius'),
(141, 'yt', 'Mayotte'),
(142, 'mx', 'Mexico'),
(143, 'fm', 'Micronesia, Federated States of'),
(144, 'md', 'Moldova, Republic of'),
(145, 'mc', 'Monaco'),
(146, 'mn', 'Mongolia'),
(147, 'me', 'Montenegro'),
(148, 'ms', 'Montserrat'),
(149, 'ma', 'Morocco'),
(150, 'mz', 'Mozambique'),
(151, 'mm', 'Myanmar'),
(152, 'na', 'Namibia'),
(153, 'nr', 'Nauru'),
(154, 'np', 'Nepal'),
(155, 'nl', 'Netherlands'),
(156, 'an', 'Netherlands Antilles'),
(157, 'nc', 'New Caledonia'),
(158, 'nz', 'New Zealand'),
(159, 'ni', 'Nicaragua'),
(160, 'ne', 'Niger'),
(161, 'ng', 'Nigeria'),
(162, 'nu', 'Niue'),
(163, 'nf', 'Norfolk Island'),
(164, 'mp', 'Northern Mariana Islands'),
(165, 'no', 'Norway'),
(166, 'om', 'Oman'),
(167, 'pk', 'Pakistan'),
(168, 'pw', 'Palau'),
(169, 'ps', 'Palestinian Territory, Occupied'),
(170, 'pa', 'Panama'),
(171, 'pg', 'Papua New Guinea'),
(172, 'py', 'Paraguay'),
(173, 'pe', 'Peru'),
(174, 'ph', 'Philippines'),
(175, 'pn', 'Pitcairn'),
(176, 'pl', 'Poland'),
(177, 'pt', 'Portugal'),
(178, 'pr', 'Puerto Rico'),
(179, 'qa', 'Qatar'),
(180, 're', 'Réunion'),
(181, 'ro', 'Romania'),
(182, 'ru', 'Russian Federation'),
(183, 'rw', 'Rwanda'),
(184, 'bl', 'Saint Barth?lemy'),
(185, 'sh', 'Saint Helena'),
(186, 'kn', 'Saint Kitts and Nevis'),
(187, 'lc', 'Saint Lucia'),
(188, 'mf', 'Saint Martin (French part)'),
(189, 'pm', 'Saint Pierre and Miquelon'),
(190, 'vc', 'Saint Vincent and the Grenadines'),
(191, 'ws', 'Samoa'),
(192, 'sm', 'San Marino'),
(193, 'st', 'Sao Tome and Principe'),
(194, 'sa', 'Saudi Arabia'),
(195, 'sn', 'Senegal'),
(196, 'rs', 'Serbia'),
(197, 'sc', 'Seychelles'),
(198, 'sl', 'Sierra Leone'),
(199, 'sg', 'Singapore'),
(200, 'sk', 'Slovakia'),
(201, 'si', 'Slovenia'),
(202, 'sb', 'Solomon Islands'),
(203, 'so', 'Somalia'),
(204, 'za', 'South Africa'),
(205, 'gs', 'South Georgia and the South Sandwich Islands'),
(206, 'es', 'Spain'),
(207, 'lk', 'Sri Lanka'),
(208, 'sd', 'Sudan'),
(209, 'sr', 'Suriname'),
(210, 'sj', 'Svalbard and Jan Mayen'),
(211, 'sz', 'Swaziland'),
(212, 'se', 'Sweden'),
(213, 'ch', 'Switzerland'),
(214, 'sy', 'Syrian Arab Republic'),
(215, 'tw', 'Taiwan, Province of China'),
(216, 'tj', 'Tajikistan'),
(217, 'tz', 'Tanzania, United Republic of'),
(218, 'th', 'Thailand'),
(219, 'tl', 'Timor-Leste'),
(220, 'tg', 'Togo'),
(221, 'tk', 'Tokelau'),
(222, 'to', 'Tonga'),
(223, 'tt', 'Trinidad and Tobago'),
(224, 'tn', 'Tunisia'),
(225, 'tr', 'Turkey'),
(226, 'tm', 'Turkmenistan'),
(227, 'tc', 'Turks and Caicos Islands'),
(228, 'tv', 'Tuvalu'),
(229, 'ug', 'Uganda'),
(230, 'ua', 'Ukraine'),
(231, 'ae', 'United Arab Emirates'),
(232, 'gb', 'United Kingdom'),
(233, 'us', 'United States'),
(234, 'um', 'United States Minor Outlying Islands'),
(235, 'uy', 'Uruguay'),
(236, 'uz', 'Uzbekistan'),
(237, 'vu', 'Vanuatu'),
(238, 've', 'Venezuela, Bolivarian Republic of'),
(239, 'vn', 'Viet Nam'),
(240, 'vg', 'Virgin Islands, British'),
(241, 'vi', 'Virgin Islands, U.S.'),
(242, 'wf', 'Wallis and Futuna'),
(243, 'eh', 'Western Sahara'),
(244, 'ye', 'Yemen'),
(245, 'zm', 'Zambia'),
(246, 'zw', 'Zimbabwe');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `seo_title`, `is_default`, `environment_id`, `status`, `title`, `description`, `thumb`, `share_text`, `theater_share_text`, `share_url`, `header`, `footer`, `partners`, `date_created`, `date_modified`) VALUES
(1, 'recruit', 'recruit', 1, 1, 'active', 'Announcement & Recruitment', '', 'http://localhost:8888/fordAdmin/uploadedImages/thumb/page_1405183830_thumb.jpg', '', '', '', 1, 1, 0, '2014-07-12 22:20:31', '2014-07-12 16:50:40');

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
  `submission` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `phase_name`, `page_id`, `page_name`, `page_label`, `link_type`, `submission`, `status`, `date_modified`) VALUES
(1, 'recruit', 1, 'recruit', 'Announcement & Recruitment', 'landing', 0, 'active', '2014-07-12 16:51:05');

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
  `access_token` text COLLATE utf8_unicode_ci,
  `access_secret` text COLLATE utf8_unicode_ci,
  `token_expiry` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `role` enum('superadmin','admin','user','agency') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `is_shortlisted` tinyint(1) NOT NULL DEFAULT '0',
  `is_winner` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_time` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `verification_code`, `is_verified`, `role`, `is_shortlisted`, `is_winner`, `last_login_time`, `date_created`, `date_modified`) VALUES
(1, 'Zainul', 'Abdeen', 'zainul@ford.com', '6d808ecfd24037ca31db96e3cb1d1e1e', 'active', NULL, 1, 'superadmin', 0, 0, '2014-07-14 21:46:59', '2014-07-12 00:00:00', '2014-07-14 16:16:59'),
(4, 'Zainul', 'Abdeen', 'pixces@yahoo.com', '9c14bc4bc3de067226a218c3c2977620', 'pending', 'd175e7bb195e7750ce6232686148d91f', 1, 'user', 0, 0, NULL, '2014-07-13 15:38:01', '2014-07-14 16:22:51'),
(5, 'Anju', 'Abdeen', 'zarina@gmail.com', '9c14bc4bc3de067226a218c3c2977620', 'pending', 'a88a19a7267b68d731249655db22d727', 1, 'user', 0, 0, NULL, '2014-07-13 15:48:07', '2014-07-14 16:23:01'),
(6, 'Rinku', 'Singh', 'rinku@gmail.com', 'b4fbc9556868501b99e7dbd23ea89b5e', 'pending', 'acc8816472cbb3cd68f4c86c9abe64c3', 1, 'user', 0, 0, '2014-07-14 23:24:08', '2014-07-13 15:51:51', '2014-07-14 17:54:08');

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
  `passport_number` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_authority` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_expiry` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `twitter` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `flickr` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `instagram` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `interview_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interview_address` text COLLATE utf8_unicode_ci,
  `travel_frequency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `international_travel` int(1) NOT NULL DEFAULT '0',
  `countries_visited` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sports_certificate` int(1) NOT NULL DEFAULT '0',
  `certificate_details` text COLLATE utf8_unicode_ci,
  `about_me` text COLLATE utf8_unicode_ci,
  `authenticated_from` enum('site','facebook','twitter','google') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'site',
  `skills` text COLLATE utf8_unicode_ci,
  `movies` text COLLATE utf8_unicode_ci,
  `books` text COLLATE utf8_unicode_ci,
  `music` text COLLATE utf8_unicode_ci,
  `sports` text COLLATE utf8_unicode_ci,
  `hobbies` text COLLATE utf8_unicode_ci,
  `others` text COLLATE utf8_unicode_ci,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `full_name`, `displayname`, `phone`, `mobile`, `dob`, `city`, `country`, `occupation`, `profile_image`, `passport`, `passport_number`, `passport_authority`, `passport_expiry`, `facebook`, `twitter`, `flickr`, `instagram`, `interview_location`, `interview_address`, `travel_frequency`, `international_travel`, `countries_visited`, `sports_certificate`, `certificate_details`, `about_me`, `authenticated_from`, `skills`, `movies`, `books`, `music`, `sports`, `hobbies`, `others`, `date_created`, `date_modified`) VALUES
(1, 4, 'Zainul Abdeen', 'Zainul', NULL, NULL, NULL, 'lucknow', NULL, NULL, 'http://localhost:8888/ford/upload/images/1405246081_20140406_234845.jpg', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 'site', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-07-13 15:38:01', '2014-07-13 10:08:01'),
(2, 5, 'Anju Abdeen', 'Anju', NULL, NULL, NULL, 'lucknow', NULL, NULL, 'http://localhost:8888/ford/upload/images/1405246687_20140412-104114.jpg', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 'site', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-07-13 15:48:07', '2014-07-13 10:18:07'),
(3, 6, 'Rinku Singh', 'Rinku', NULL, NULL, NULL, 'rae barielly', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 'site', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-07-13 15:51:51', '2014-07-13 10:21:51');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

--
-- Dumping data for table `widget_types`
--

INSERT INTO `widget_types` (`id`, `name`, `display_name`, `form_name`, `description`, `status`, `date_created`, `date_modified`) VALUES
(1, 'header', 'site header', 'header_form', 'Site header with logo and multiple partner logos', 'active', '2014-02-21 01:32:20', '2014-02-20 20:02:20'),
(2, 'footer', 'site footer', 'footer_form', 'Footer element of site with links and social icons', 'active', '2014-02-21 01:32:20', '2014-02-20 20:02:20'),
(3, 'partners', 'partner', 'partners_form', 'Logos of various partners and their hyperlinks. Displayed as slider on the bottom of page', 'active', '2014-02-21 01:26:36', '2014-02-20 20:02:20'),
(4, 'small_content', 'small content module', 'small_content_form', 'Content with title, small text and hyperlink', 'active', '2014-02-21 01:26:36', '2014-03-02 19:57:29'),
(5, 'timer', 'Countdown Timer ', 'countdown_timer_form', 'Count down time widget to display time in decreasing order', 'active', '2014-02-21 01:28:25', '2014-03-02 19:57:18'),
(6, 'accrodian', 'accrodian', 'accrodian_form', 'Text to be displayed as accrodian with title and small description', 'active', '2014-02-21 01:28:25', '2014-02-20 20:02:20'),
(7, 'content', 'Static Content', 'content_form', 'full text with title and large descriptions. No hyperlink', 'active', '2014-02-21 01:29:13', '2014-03-02 19:57:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
