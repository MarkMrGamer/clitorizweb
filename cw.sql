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

-- Dumping structure for table clitorizweb.clitorizweb_friends
CREATE TABLE IF NOT EXISTS `clitorizweb_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buddy1` varchar(500) DEFAULT NULL,
  `buddy2` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_replies
CREATE TABLE IF NOT EXISTS `clitorizweb_replies` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_text` text DEFAULT NULL,
  `post_author` text DEFAULT NULL,
  `post_thread` int(11) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table clitorizweb.clitorizweb_threads
CREATE TABLE IF NOT EXISTS `clitorizweb_threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_title` text DEFAULT NULL,
  `thread_text` text DEFAULT NULL,
  `thread_author` text DEFAULT NULL,
  `thread_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `thread_forum` text DEFAULT NULL,
  PRIMARY KEY (`thread_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
  `song` mediumtext DEFAULT '/songs/default.mp3',
  `bio` varchar(1000) DEFAULT NULL,
  `css` text DEFAULT NULL,
  `joined` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
