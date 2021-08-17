-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for clitorizweb
CREATE DATABASE IF NOT EXISTS `clitorizweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `clitorizweb`;

-- Dumping structure for table clitorizweb.clitorizweb_badges
CREATE TABLE IF NOT EXISTS `clitorizweb_badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `badge_name` varchar(100) DEFAULT NULL,
  `badge_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_banner
CREATE TABLE IF NOT EXISTS `clitorizweb_banner` (
  `bannertext` varchar(100) DEFAULT NULL,
  `textcolor` varchar(100) DEFAULT NULL,
  `bannercolor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_friends
CREATE TABLE IF NOT EXISTS `clitorizweb_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buddy1` varchar(500) DEFAULT NULL,
  `buddy2` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_replies
CREATE TABLE IF NOT EXISTS `clitorizweb_replies` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_text` varchar(1000) DEFAULT NULL,
  `post_author` varchar(1000) DEFAULT NULL,
  `post_thread` int(11) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4660 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_reports
CREATE TABLE IF NOT EXISTS `clitorizweb_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_name` varchar(100) NOT NULL DEFAULT '0',
  `report_reason` varchar(100) NOT NULL DEFAULT '0',
  `report_description` varchar(100) NOT NULL DEFAULT '0',
  `user_reporter` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_threads
CREATE TABLE IF NOT EXISTS `clitorizweb_threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_title` varchar(85) DEFAULT NULL,
  `thread_text` varchar(1000) DEFAULT NULL,
  `thread_author` varchar(1000) DEFAULT NULL,
  `thread_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `thread_forum` text DEFAULT NULL,
  `thread_pinned` varchar(50) DEFAULT 'no',
  `thread_locked` varchar(50) DEFAULT 'no',
  PRIMARY KEY (`thread_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_users
CREATE TABLE IF NOT EXISTS `clitorizweb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `badge` varchar(100) NOT NULL DEFAULT 'user',
  `pfp` text NOT NULL DEFAULT '',
  `status` varchar(255) DEFAULT NULL,
  `song` bigint(20) DEFAULT NULL,
  `video` bigint(20) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `css` text DEFAULT NULL,
  `joined` date DEFAULT current_timestamp(),
  `forum_cooldown` timestamp NULL DEFAULT current_timestamp(),
  `video_access` varchar(50) DEFAULT 'false',
  `custom_rank` varchar(100) DEFAULT NULL,
  `custom_stars` int(11) DEFAULT NULL,
  `custom_badge` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
