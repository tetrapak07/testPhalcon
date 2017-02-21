-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.13 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных te2
CREATE DATABASE IF NOT EXISTS `te2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `te2`;


-- Дамп структуры для таблица te2.email_confirmations
CREATE TABLE IF NOT EXISTS `email_confirmations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `code` char(32) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `confirmed` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.email_confirmations: ~6 rows (приблизительно)
DELETE FROM `email_confirmations`;
/*!40000 ALTER TABLE `email_confirmations` DISABLE KEYS */;
INSERT INTO `email_confirmations` (`id`, `usersId`, `code`, `createdAt`, `modifiedAt`, `confirmed`) VALUES
	(1, 8, 'HOukMZ4rKRVEhLan6QmArmYarH3mCM7', 1487623861, 1487623871, 'Y'),
	(2, 2, 'Z38eksTqt5vUf68uQgNJrpSwASJdIEPK', 1487646702, NULL, 'N'),
	(3, 2, 'wTVxl4QcUgAkJ6TkNNA7HyRPE3NWDMTc', 1487646721, NULL, 'N'),
	(4, 2, 'oU5BSRywIsG5gLtY8HhBoeHUfczFdcO', 1487647729, NULL, 'N'),
	(5, 2, 'o1wblmT5uLKvobNogHs0pKRz3xGJVk', 1487648090, NULL, 'N'),
	(6, 9, 'rHpmkXpOSOkXePh5vFDRbuNvBX1ijp', 1487648193, NULL, 'N'),
	(7, 15, 'Hd9iOxLGkYUmxXZ5fdUYKP4eCWQQLbI', 1487698567, NULL, 'N');
/*!40000 ALTER TABLE `email_confirmations` ENABLE KEYS */;


-- Дамп структуры для таблица te2.failed_logins
CREATE TABLE IF NOT EXISTS `failed_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned DEFAULT NULL,
  `ipAddress` char(15) NOT NULL,
  `attempted` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.failed_logins: ~3 rows (приблизительно)
DELETE FROM `failed_logins`;
/*!40000 ALTER TABLE `failed_logins` DISABLE KEYS */;
INSERT INTO `failed_logins` (`id`, `usersId`, `ipAddress`, `attempted`) VALUES
	(1, 8, '127.0.0.1', 1487628910),
	(2, 8, '127.0.0.1', 1487629005),
	(3, 8, '127.0.0.1', 1487648221),
	(4, 8, '127.0.0.1', 1487702627),
	(5, 8, '127.0.0.1', 1487702889);
/*!40000 ALTER TABLE `failed_logins` ENABLE KEYS */;


-- Дамп структуры для таблица te2.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `active` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.groups: ~3 rows (приблизительно)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `active`) VALUES
	(1, 'Administrators', 'Y'),
	(2, 'Users', 'Y'),
	(3, 'Read-Only', 'Y');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Дамп структуры для таблица te2.password_changes
CREATE TABLE IF NOT EXISTS `password_changes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `ipAddress` char(15) NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.password_changes: ~1 rows (приблизительно)
DELETE FROM `password_changes`;
/*!40000 ALTER TABLE `password_changes` DISABLE KEYS */;
INSERT INTO `password_changes` (`id`, `usersId`, `ipAddress`, `userAgent`, `createdAt`) VALUES
	(1, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1487629352),
	(2, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', 1487702596);
/*!40000 ALTER TABLE `password_changes` ENABLE KEYS */;


-- Дамп структуры для таблица te2.remember_tokens
CREATE TABLE IF NOT EXISTS `remember_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `token` char(32) NOT NULL,
  `userAgent` varchar(120) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.remember_tokens: ~0 rows (приблизительно)
DELETE FROM `remember_tokens`;
/*!40000 ALTER TABLE `remember_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `remember_tokens` ENABLE KEYS */;


-- Дамп структуры для таблица te2.reset_passwords
CREATE TABLE IF NOT EXISTS `reset_passwords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `code` varchar(48) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `reset` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.reset_passwords: ~3 rows (приблизительно)
DELETE FROM `reset_passwords`;
/*!40000 ALTER TABLE `reset_passwords` DISABLE KEYS */;
INSERT INTO `reset_passwords` (`id`, `usersId`, `code`, `createdAt`, `modifiedAt`, `reset`) VALUES
	(1, 8, 'SqRcCwaY6Wv0fK5DhsG4QJduwpcEfU', 1487628880, 1487628890, 'Y'),
	(2, 8, 'kTsbt3FD5jwLothZ5KHT8JtnpVUQeP', 1487629276, 1487629287, 'Y'),
	(3, 8, 'kNUkhhATG9LvO2pMcz8hZMMxIBT8oouY', 1487629312, 1487629321, 'Y'),
	(4, 9, 'rGLW0ZdM7Rk35YG4JtWFksaBo7V4nij', 1487702388, 1487702485, 'Y'),
	(5, 9, 'HXkNFywrlWp3QbknJ9AI7zSTB07Gtk', 1487702478, NULL, 'N'),
	(6, 9, 'TOXJVnH7SWACg2DEgAzB9sKw53duOvb', 1487702507, 1487702515, 'Y'),
	(7, 8, 'xukJw5fcFxzomC3a2wDmVb7obmeWn2it', 1487702577, 1487702585, 'Y');
/*!40000 ALTER TABLE `reset_passwords` ENABLE KEYS */;


-- Дамп структуры для таблица te2.success_logins
CREATE TABLE IF NOT EXISTS `success_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `ipAddress` char(15) NOT NULL,
  `userAgent` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.success_logins: ~13 rows (приблизительно)
DELETE FROM `success_logins`;
/*!40000 ALTER TABLE `success_logins` DISABLE KEYS */;
INSERT INTO `success_logins` (`id`, `usersId`, `ipAddress`, `userAgent`) VALUES
	(1, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(2, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(3, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(4, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(5, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(6, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(7, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(8, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(9, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(10, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(11, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(12, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(13, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(14, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(15, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(16, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),
	(17, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');
/*!40000 ALTER TABLE `success_logins` ENABLE KEYS */;


-- Дамп структуры для таблица te2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `mustChangePassword` char(1) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.users: ~8 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `mustChangePassword`, `active`) VALUES
	(1, 'Annа', 'ann@test.com', '$2a$08$Lx1577KNhPa9lzFYKssadetmbhaveRtCoVaOnoXXxUIhrqlCJYWCW', 'N', 'Y'),
	(2, 'Petya', 'petya@test.com', '$2a$08$f4llgFQQnhPKzpGmY1sOuuu23nYfXYM/EVOpnjjvAmbxxDxG3pbX.', 'N', 'N'),
	(3, 'Vasya', 'vasya@test.com', '$2a$08$NQjrh9fKdMHSdpzhMj0xcOSwJQwMfpuDMzgtRyA89ADKUbsFZ94C2', 'N', 'Y'),
	(5, 'Vasya Petrov', 'vasyapetrov@test.com', '$2a$08$NQjrh9fKdMHSdpzhMj0xcOSwJQwMfpuDMzgtRyA89ADKUbsFZ94C2', 'N', 'Y'),
	(6, 'Vasya Vasilyev', 'vasyavasiliev@test.com', '$2a$08$NQjrh9fKdMHSdpzhMj0xcOSwJQwMfpuDMzgtRyA89ADKUbsFZ94C2', 'N', 'Y'),
	(7, 'Vasya Vaskin', 'vasyavaskin@test.com', '$2a$08$NQjrh9fKdMHSdpzhMj0xcOSwJQwMfpuDMzgtRyA89ADKUbsFZ94C2', 'N', 'Y'),
	(8, 'admin', 'vimmme1@gmail.com', '$2y$08$RmV4eHptbjlQaU9FMHU3bOAYESOyHIQGowp9q/V/pTK4yDr0Ning2', 'N', 'Y'),
	(9, 'dgdgd', 'tetrapak07@gmail.com', '$2y$08$MFdhT3dpZHR4QVVpc0tYRe8/lEE2yB5mVYvCVmuGozSvXczemjhsG', 'N', 'N'),
	(10, 'new', 'new@mail.com', '$2y$08$M0xkYkp0RlpCY0JTaG96bew/8prbJn1BQMXmaZXXt5z09SkvjHFfC', 'Y', 'Y'),
	(12, 'newe', 'newe@gmail.com', '$2y$08$eVRPNmZTUS9kREZ3S1BTeOkdf7RmrU714p4ZoNpUcn11yqxVVcJ.a', 'Y', 'N'),
	(13, 'werty', 'werty@df.com', '$2y$08$aW9IQXlZMm0vak1kWWw3buswMgYFwnfo7BMW3pn7dcmndMo/QBqqe', 'Y', 'N'),
	(14, 'dgdg', 'dgdg@gmail.com', '$2y$08$L0xiWjJxWnRGaVF6OFloT.DBIgKR8A4iQKiVlfDpGKJ0AxtH2bMIm', 'Y', 'Y'),
	(15, 'tetrapak07', 'tetrapak077@gmail.com', '$2y$08$UmZpV3FwMXF1ZVF4c3gwSunHZZZ/12WA//DeR1ahY6Moglxq1Witm', 'N', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Дамп структуры для таблица te2.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `groupId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_1_idx` (`userId`),
  KEY `fk_users_groups_2_idx` (`groupId`),
  CONSTRAINT `fk_users_groups_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_users_groups_2` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы te2.users_groups: ~7 rows (приблизительно)
DELETE FROM `users_groups`;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `userId`, `groupId`) VALUES
	(3, 3, 3),
	(5, 5, 1),
	(6, 5, 2),
	(7, 6, 1),
	(8, 8, 1),
	(9, 8, 2),
	(34, 12, 1),
	(35, 12, 2),
	(36, 13, 1),
	(37, 13, 3),
	(38, 14, 1),
	(43, 1, 1),
	(44, 1, 2),
	(45, 2, 1),
	(46, 2, 3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
