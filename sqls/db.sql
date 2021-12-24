-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.32-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table clitorizweb.clitorizweb_badges
CREATE TABLE IF NOT EXISTS `clitorizweb_badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `badge_name` varchar(100) DEFAULT NULL,
  `badge_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_banner
CREATE TABLE IF NOT EXISTS `clitorizweb_banner` (
  `bannertext` varchar(100) DEFAULT NULL,
  `textcolor` varchar(100) DEFAULT NULL,
  `bannercolor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_bans
CREATE TABLE IF NOT EXISTS `clitorizweb_bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ban_date` date DEFAULT NULL,
  `ban_note` varchar(100) DEFAULT NULL,
  `ban_username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_comments
CREATE TABLE IF NOT EXISTS `clitorizweb_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_username` varchar(255) DEFAULT NULL,
  `comment_description` varchar(100) DEFAULT NULL,
  `comment_date` varchar(100) DEFAULT current_timestamp(),
  `comment_profile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_friends
CREATE TABLE IF NOT EXISTS `clitorizweb_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buddy1` varchar(500) DEFAULT NULL,
  `buddy2` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_groups
CREATE TABLE IF NOT EXISTS `clitorizweb_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `group_owner` varchar(100) DEFAULT NULL,
  `group_description` varchar(100) DEFAULT NULL,
  `group_photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_group_users
CREATE TABLE IF NOT EXISTS `clitorizweb_group_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_user` varchar(100) DEFAULT NULL,
  `group_title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_logs
CREATE TABLE IF NOT EXISTS `clitorizweb_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_note` varchar(500) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=551 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_replies
CREATE TABLE IF NOT EXISTS `clitorizweb_replies` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_text` varchar(1000) DEFAULT NULL,
  `post_author` varchar(1000) DEFAULT NULL,
  `post_thread` int(11) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4818 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_reports
CREATE TABLE IF NOT EXISTS `clitorizweb_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_name` varchar(100) NOT NULL DEFAULT '0',
  `report_reason` varchar(100) NOT NULL DEFAULT '0',
  `report_description` varchar(100) NOT NULL DEFAULT '0',
  `user_reporter` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=336 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_users
CREATE TABLE IF NOT EXISTS `clitorizweb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(28) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `badge` varchar(100) NOT NULL DEFAULT 'user',
  `pfp` bigint(20) NOT NULL DEFAULT 0,
  `banner` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(255) DEFAULT NULL,
  `song` bigint(20) DEFAULT NULL,
  `video` bigint(20) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `css` text DEFAULT NULL,
  `joined` date DEFAULT current_timestamp(),
  `forum_cooldown` timestamp NULL DEFAULT current_timestamp(),
  `comment_cooldown` timestamp NULL DEFAULT current_timestamp(),
  `video_access` varchar(50) DEFAULT 'false',
  `custom_rank` varchar(100) DEFAULT NULL,
  `custom_stars` int(11) DEFAULT NULL,
  `custom_badge` varchar(100) DEFAULT NULL,
  `audio_file_type` varchar(50) DEFAULT 'mp3',
  `ip` text DEFAULT NULL,
  `isbanned` varchar(50) DEFAULT 'false',
  `forum_moderator` varchar(50) DEFAULT 'false',
  `audio_autoplay` varchar(50) DEFAULT 'true',
  `old_header` varchar(50) DEFAULT 'false',
  `htmlplacement` int(10) DEFAULT 1,
  `dhtml` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
