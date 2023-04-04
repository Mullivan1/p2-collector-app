# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.11.2-MariaDB-1:10.11.2+maria~ubu2204)
# Database: project2
# Generation Time: 2023-04-04 09:24:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table authors
# ------------------------------------------------------------
CREATE OR REPLACE DATABASE ;
USE ;

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `name`)
VALUES
	(1,'Anna Lembke'),
	(2,'Paulo Coelho'),
	(3,'Jon Krakauer'),
	(4,'Sally Rooney'),
	(5,'Laura Bates'),
	(6,'Roman Dial'),
	(7,'Dale Carnegie'),
	(8,'Laura Hillenbrand'),
	(9,'Kazou Ishiguro'),
	(10,'George Orwell');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` int(11) unsigned NOT NULL,
  `genre` int(11) unsigned DEFAULT NULL,
  `year` int(11) unsigned DEFAULT NULL,
  `progressperc` int(11) DEFAULT NULL,
  `rating10` int(11) DEFAULT NULL,
  `coverlink` varchar(255) DEFAULT NULL,
  `gr-link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authors` (`author`),
  KEY `genres` (`genre`),
  CONSTRAINT `authors` FOREIGN KEY (`author`) REFERENCES `authors` (`id`),
  CONSTRAINT `genres` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `year`, `progressperc`, `rating10`, `coverlink`, `gr-link`)
VALUES
	(1,'Dopamine Nation',1,2,2021,100,9,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1629679336i/55723020.jpg','https://www.goodreads.com/book/show/55723020-dopamine-nation'),
	(2,'The Alchemist',2,1,1988,100,8,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1654371463i/18144590.jpg','https://www.goodreads.com/book/show/18144590-the-alchemist'),
	(3,'Into Thin Air',3,2,1997,100,8,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1631501298i/1898.jpg','https://www.goodreads.com/book/show/1898.Into_Thin_Air'),
	(4,'Normal People',4,1,2018,100,6,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1571423190i/41057294.jpg','https://www.goodreads.com/book/show/41057294-normal-people'),
	(6,'The Adventurer\'s Son',6,2,2020,100,9,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1571076286i/46041442.jpg','https://www.goodreads.com/book/show/46041442-the-adventurer-s-son'),
	(7,'Into The Wild',3,2,1996,100,10,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1634587789i/1845.jpg','https://www.goodreads.com/book/show/1845.Into_the_Wild'),
	(8,'How to Win Friends And Influence People',7,2,1936,100,8,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1442726934i/4865.jpg','https://www.goodreads.com/book/show/4865.How_to_Win_Friends_and_Influence_People'),
	(9,'Unbroken: A World War II Story of Survival, Resilience and Redemption',8,2,2010,100,7,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1327861115i/8664353.jpg','https://www.goodreads.com/book/show/8664353-unbroken'),
	(10,'Under the Banner of Heaven: A Story of Violent Faith',3,2,2003,100,5,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1356441391i/10847.jpg','https://www.goodreads.com/book/show/10847.Under_the_Banner_of_Heaven'),
	(11,'Klara and the Sun',9,1,2021,100,7,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1603206535i/54120408.jpg','https://www.goodreads.com/book/show/54120408-klara-and-the-sun'),
	(12,'Animal Farm',10,1,1945,100,9,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1325861570i/170448.jpg','https://www.goodreads.com/book/show/170448.Animal_Farm');

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;

INSERT INTO `genres` (`id`, `genre`)
VALUES
	(1,'Fiction'),
	(2,'Non-fiction');

/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
