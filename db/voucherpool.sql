# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: voucher_pool
# Generation Time: 2017-11-21 21:17:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2017_11_08_114542_create_table_recipients',1),
	(2,'2017_11_08_114837_create_table_special_offers',1),
	(3,'2017_11_08_115144_create_table_voucher_codes',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table recipients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recipients_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;

INSERT INTO `recipients` (`id`, `name`, `email`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'usman','usman172@gmail.com',NULL,'2017-11-08 19:13:53',NULL),
	(2,'usman1','usman.172@gnail.com',NULL,'2017-11-09 00:43:47','2017-11-09 00:43:47'),
	(3,'usman1','usman@gnail.com',NULL,'2017-11-09 01:42:01','2017-11-09 01:42:01'),
	(4,'usman1','usmang@nail.com',NULL,'2017-11-09 02:59:56','2017-11-09 02:59:56'),
	(5,'usman1','usman1g@nail.com',NULL,'2017-11-09 03:04:53','2017-11-09 03:04:53');

/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table special_offers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `special_offers`;

CREATE TABLE `special_offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` double(2,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `special_offers` WRITE;
/*!40000 ALTER TABLE `special_offers` DISABLE KEYS */;

INSERT INTO `special_offers` (`id`, `offer_name`, `percentage`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'50 pecent off',50.00,NULL,'2017-11-08 19:14:12',NULL),
	(2,'70 percent off',70.00,NULL,'2017-11-10 02:25:44',NULL),
	(13,'offer1',0.00,NULL,'2017-11-15 01:24:26','2017-11-15 01:24:26');

/*!40000 ALTER TABLE `special_offers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table voucher_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `voucher_codes`;

CREATE TABLE `voucher_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_specialoffer_id` int(11) NOT NULL,
  `fk_receipent_id` int(11) NOT NULL,
  `code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not used, 1 = used',
  `used_dtm` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `voucher_codes_code_unique` (`code`),
  KEY `voucher_codes_code_fk_receipent_id_is_used_index` (`code`,`fk_receipent_id`,`is_used`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `voucher_codes` WRITE;
/*!40000 ALTER TABLE `voucher_codes` DISABLE KEYS */;

INSERT INTO `voucher_codes` (`id`, `fk_specialoffer_id`, `fk_receipent_id`, `code`, `expire_date`, `is_used`, `used_dtm`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'12345678','2017-11-10',0,NULL,NULL,'2017-11-08 19:17:56',NULL),
	(2,2,1,'44444','2017-11-10',0,NULL,NULL,'2017-11-10 02:25:27',NULL);

/*!40000 ALTER TABLE `voucher_codes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
