# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Database: social-content
# Generation Time: 2023-03-13 12:15:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `upvotes` int(11) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `name`, `post`, `upvotes`, `created`)
VALUES
	(1,'amyrobson','Just finished up a great workout at the gym and feeling so energized!',12,'2022-12-14 14:04:14'),
	(2,'iamsarah','Brunch with friends is the best way to start the weekend',5,'2022-12-14 14:04:50'),
	(3,'flowerpower','Picked up some fresh flowers for the house - so nice to have a little bit of nature indoors!',4,'2022-12-14 14:05:09'),
	(4,'gregorygreg','Can\'t believe it\'s already October - this year is flying by...wait it\'s December?!',1,'2022-12-14 14:05:52'),
	(5,'bittersweet','Just took the most gorgeous sunset walk - what a way to end the day!',0,'2022-12-14 14:07:15');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table replies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `replies`;

CREATE TABLE `replies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `reply_to` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reply` text NOT NULL,
  `upvotes` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;

INSERT INTO `replies` (`id`, `reply_to`, `name`, `reply`, `upvotes`, `created`)
VALUES
	(1,4,'gregsboss','...and your 2 months overdue on that report!!!',-1,'2022-12-14 14:09:38'),
	(2,1,'julie1974','Nobody cares about your gym trip',-9,'2022-12-14 14:12:05');

/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
