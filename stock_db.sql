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
  `bill_id` int(4) NOT NULL AUTO_INCREMENT,
  `bill_date` date DEFAULT NULL,
  `bill_amount` int(6) DEFAULT NULL,
  `bill_image_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (1,'2016-09-30',21,'g'),(2,'2016-10-21',232,'fajkdlj'),(3,'2016-10-21',232,'fajkdlj'),(4,'2016-10-21',900,'bill_link'),(5,'2016-10-21',900,'bill_link'),(6,'2016-10-21',900,'bill_link'),(7,'2016-10-21',900,'bill_link'),(8,'2016-10-15',654,'jfldak');
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deleted_stock`
--

DROP TABLE IF EXISTS `deleted_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deleted_stock` (
  `stock_id` int(3) NOT NULL,
  `quantity` int(4) NOT NULL,
  `reason` varchar(500) NOT NULL,
  KEY `stock_id` (`stock_id`),
  CONSTRAINT `deleted_stock_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stock_description` (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deleted_stock`
--

LOCK TABLES `deleted_stock` WRITE;
/*!40000 ALTER TABLE `deleted_stock` DISABLE KEYS */;
INSERT INTO `deleted_stock` VALUES (2,15,'testing again'),(1,2,'testing exact');
/*!40000 ALTER TABLE `deleted_stock` ENABLE KEYS */;
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
  `return_status` enum('issued','pending','returned') NOT NULL DEFAULT 'issued',
  PRIMARY KEY (`issue_id`),
  KEY `user_id` (`user_id`),
  KEY `stock_id` (`stock_id`),
  CONSTRAINT `issued_stock_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `issued_stock_list_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock_description` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issued_stock_list`
--

LOCK TABLES `issued_stock_list` WRITE;
/*!40000 ALTER TABLE `issued_stock_list` DISABLE KEYS */;
INSERT INTO `issued_stock_list` VALUES (1,2,1,2,'2016-10-31','2016-11-14',0,0,NULL,'pending'),(2,2,3,3,'2016-10-31','2016-11-14',0,0,NULL,'issued');
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
  PRIMARY KEY (`purchase_id`,`stock_id`),
  KEY `bill_id` (`bill_id`),
  KEY `stock_id` (`stock_id`),
  CONSTRAINT `purchase_list_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`bill_id`),
  CONSTRAINT `purchase_list_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock_description` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_list`
--

LOCK TABLES `purchase_list` WRITE;
/*!40000 ALTER TABLE `purchase_list` DISABLE KEYS */;
INSERT INTO `purchase_list` VALUES (1,1,20,0),(2,2,110,2),(3,3,15,4),(4,4,15,8);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_description`
--

LOCK TABLES `stock_description` WRITE;
/*!40000 ALTER TABLE `stock_description` DISABLE KEYS */;
INSERT INTO `stock_description` VALUES (1,'motors','these are dc motors',NULL),(2,'wires','wires help in making connections',NULL),(3,'servo','they are precise motors','image not yet availlable'),(4,'wifi module','they can be used to easily communicate via wifi','jfaldj');
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
  `user_type` enum('student','admin') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ridhwan','ridhwan','202cb962ac59075b964b07152d234b70','luthraridhwan@gmail.com','admin'),(2,'ridh','ridh','202cb962ac59075b964b07152d234b70','student@stu.com','student');
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

-- Dump completed on 2016-11-07 10:51:03
