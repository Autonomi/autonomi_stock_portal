-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Stock
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bills` (
  `bill_id` int(4) NOT NULL,
  `bill_date` date DEFAULT NULL,
  `bill_amount` int(6) DEFAULT NULL,
  `bill_image_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issued_stock_list`
--

DROP TABLE IF EXISTS `issued_stock_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issued_stock_list` (
  `issue_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `stock_id` int(4) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT '1',
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `stock_condition_ok` tinyint(1) NOT NULL,
  `fine_amount` int(5) DEFAULT '0',
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `user_id` (`user_id`),
  KEY `stock_id` (`stock_id`),
  CONSTRAINT `issued_stock_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `issued_stock_list_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock_description` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issued_stock_list`
--

LOCK TABLES `issued_stock_list` WRITE;
/*!40000 ALTER TABLE `issued_stock_list` DISABLE KEYS */;
INSERT INTO `issued_stock_list` VALUES (1,20,1,1,'2016-10-23','2016-10-28',0,0,NULL),(2,20,1,1,'2016-10-23','2016-10-28',0,0,NULL),(3,20,1,1,'2016-10-24','2016-10-29',0,0,NULL),(4,20,1,1,'2016-10-24','2016-10-29',0,0,NULL),(5,20,2,1,'2016-10-24','2016-10-22',0,0,NULL),(6,20,1,2,'2016-10-24','2016-09-30',0,0,NULL),(7,20,1,21,'2016-10-24','2016-10-21',0,0,NULL),(8,20,2,1,'2016-10-24','2016-11-05',0,0,NULL),(9,20,1,1,'2016-10-24','2016-10-29',0,0,NULL),(10,20,2,1,'2016-10-24','2016-10-22',0,0,NULL),(11,20,1,2,'2016-10-24','2016-09-30',0,0,NULL),(12,20,1,21,'2016-10-24','2016-10-21',0,0,NULL),(13,20,2,1,'2016-10-24','2016-11-05',0,0,NULL);
/*!40000 ALTER TABLE `issued_stock_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_list`
--

DROP TABLE IF EXISTS `purchase_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_list` (
  `purchase_id` int(4) NOT NULL AUTO_INCREMENT,
  `stock_id` int(5) NOT NULL,
  `quantity` int(3) DEFAULT NULL,
  `bill_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`,`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_list`
--

LOCK TABLES `purchase_list` WRITE;
/*!40000 ALTER TABLE `purchase_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_description`
--

DROP TABLE IF EXISTS `stock_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_description` (
  `stock_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_description`
--

LOCK TABLES `stock_description` WRITE;
/*!40000 ALTER TABLE `stock_description` DISABLE KEYS */;
INSERT INTO `stock_description` VALUES (1,'motors','these are dc motors',NULL),(2,'wires','wires help in making connections',NULL);
/*!40000 ALTER TABLE `stock_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_fullname` char(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'he','klj','d41d8cd98f00b204e9800998ecf8427e','jlj'),(2,'','','d41d8cd98f00b204e9800998ecf8427e',''),(3,'','','d41d8cd98f00b204e9800998ecf8427e',''),(4,'','','d41d8cd98f00b204e9800998ecf8427e',''),(5,'','','d41d8cd98f00b204e9800998ecf8427e',''),(6,'gfs','sgf','d41d8cd98f00b204e9800998ecf8427e','sg'),(7,'HEYY','kjh','d41d8cd98f00b204e9800998ecf8427e','kjj@hkj'),(8,'','','d41d8cd98f00b204e9800998ecf8427e',''),(9,'','','d41d8cd98f00b204e9800998ecf8427e',''),(10,'','','d41d8cd98f00b204e9800998ecf8427e',''),(11,'','','d41d8cd98f00b204e9800998ecf8427e',''),(12,'e','','d41d8cd98f00b204e9800998ecf8427e',''),(13,'','','d41d8cd98f00b204e9800998ecf8427e',''),(14,'','','d41d8cd98f00b204e9800998ecf8427e',''),(15,'gjh','hj','d41d8cd98f00b204e9800998ecf8427e','hk@h.com'),(16,'ridhwan luthra','ridhwan','d41d8cd98f00b204e9800998ecf8427e','luthraridhwan@gmail.com'),(17,'rid','rid','d41d8cd98f00b204e9800998ecf8427e','we@e.com'),(18,'hk','hkjh','','jkh@hgk.com'),(19,'ef','efw','123','e@g.c'),(20,'gh','ridh','c4ca4238a0b923820dcc509a6f75849b','l@gm.com'),(21,'lkjjafd','heyy','81dc9bdb52d04dc20036dbd8313ed055','ljk@ljk.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-25  0:40:32
