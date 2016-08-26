-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (i686)
--
-- Host: localhost    Database: 17818319
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `FEEDBACK`
--

DROP TABLE IF EXISTS `FEEDBACK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FEEDBACK` (
  `feedbackid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `rating` decimal(4,2) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `recipientname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`feedbackid`),
  KEY `recipientid` (`recipientname`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FEEDBACK`
--

LOCK TABLES `FEEDBACK` WRITE;
/*!40000 ALTER TABLE `FEEDBACK` DISABLE KEYS */;
INSERT INTO `FEEDBACK` VALUES (29,'mark','4.00','Great to share','william'),(30,'william','5.00','Thank you','mark');
/*!40000 ALTER TABLE `FEEDBACK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ITEM`
--

DROP TABLE IF EXISTS `ITEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ITEM` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `isrequested` varchar(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `latitude` double(30,25) DEFAULT NULL,
  `longitude` double(30,25) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ITEM`
--

LOCK TABLES `ITEM` WRITE;
/*!40000 ALTER TABLE `ITEM` DISABLE KEYS */;
INSERT INTO `ITEM` VALUES (67,12,NULL,'23','uploads/mark/bicycle.jpg','bike','YES','mark','Tools',-37.7258500000000012164491636,145.0630400000000008731149137),(69,90,NULL,'24','uploads/william/macbook.jpg','macbook','YES','william','Electronics',-37.7258500000000012164491636,144.0630400000000008731149137),(70,2,NULL,'24','uploads/william/advert.jpg','shoes',NULL,'william','Clothes',-37.7258500000000012164491636,145.0030399999999985993781593),(71,50,NULL,'24','uploads/william/Bose_QC_20_Headphones_and_carrying_case.jpg','earphone',NULL,'william','Tools',-37.7199999999999988631316228,144.9030400000000042837200454),(72,25,NULL,'25','uploads/m/guitar.jpg','guitar',NULL,'m','Tools',-37.7058499999999980900611263,144.9030400000000042837200454);
/*!40000 ALTER TABLE `ITEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OFFEREDITEM`
--

DROP TABLE IF EXISTS `OFFEREDITEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OFFEREDITEM` (
  `offereditemid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `itemid` int(11) NOT NULL,
  `requesteditemid` int(11) NOT NULL,
  `approver` varchar(50) DEFAULT NULL,
  `feekback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`offereditemid`),
  KEY `username` (`username`),
  KEY `itemid` (`itemid`),
  KEY `requesteditemid` (`requesteditemid`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OFFEREDITEM`
--

LOCK TABLES `OFFEREDITEM` WRITE;
/*!40000 ALTER TABLE `OFFEREDITEM` DISABLE KEYS */;
INSERT INTO `OFFEREDITEM` VALUES (30,'william',68,0,'mark',NULL);
/*!40000 ALTER TABLE `OFFEREDITEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `REPORT`
--

DROP TABLE IF EXISTS `REPORT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `REPORT` (
  `reportid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reportid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `REPORT`
--

LOCK TABLES `REPORT` WRITE;
/*!40000 ALTER TABLE `REPORT` DISABLE KEYS */;
INSERT INTO `REPORT` VALUES (1,'ok','test',''),(2,'ok','test','ok'),(3,'ok','23123','123123'),(4,'Mark','ert','ert'),(5,'damen','we','ew'),(6,'abc','2','2'),(7,'m','2','report'),(8,'m','test','test');
/*!40000 ALTER TABLE `REPORT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `REQUEST`
--

DROP TABLE IF EXISTS `REQUEST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `REQUEST` (
  `requestid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `latitude` double(30,20) DEFAULT NULL,
  `longitude` double(30,20) DEFAULT NULL,
  PRIMARY KEY (`requestid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `REQUEST`
--

LOCK TABLES `REQUEST` WRITE;
/*!40000 ALTER TABLE `REQUEST` DISABLE KEYS */;
INSERT INTO `REQUEST` VALUES (34,'m','I wish I would have a laptop ',-37.71549999999999869260,145.80304000000000996806),(35,'mark','I would like to have a Samsung galaxy S7 active',-37.73933099999999996044,144.80305100000001061744);
/*!40000 ALTER TABLE `REQUEST` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `REQUESTEDITEM`
--

DROP TABLE IF EXISTS `REQUESTEDITEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `REQUESTEDITEM` (
  `requesteditemid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `itemid` int(11) NOT NULL,
  PRIMARY KEY (`requesteditemid`),
  KEY `username` (`username`),
  KEY `itemid` (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `REQUESTEDITEM`
--

LOCK TABLES `REQUESTEDITEM` WRITE;
/*!40000 ALTER TABLE `REQUESTEDITEM` DISABLE KEYS */;
INSERT INTO `REQUESTEDITEM` VALUES (64,'william',67),(65,'william',68),(66,'mark',69);
/*!40000 ALTER TABLE `REQUESTEDITEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(30) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (22,'admin','admin',NULL,NULL,NULL,NULL,'17818319@students.latrobe.edu.au','administrator','images/0admin.png','2016','La Trobe Unversity'),(23,'mark','1990','Mark','Duong',NULL,NULL,NULL,'user','images/1mark.jpg','2016','La Trobe Unversity'),(24,'william','1990','William','Tunner',NULL,NULL,'wiliam@gmail.com','user','images/guitar.jpg','2016','La Trobe Unversity'),(25,'m','1990','Strong','Man',NULL,NULL,NULL,'user','images/download.png','2016','La trobe unversity');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WAITINGFEEDBACK`
--

DROP TABLE IF EXISTS `WAITINGFEEDBACK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WAITINGFEEDBACK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requester` varchar(50) DEFAULT NULL,
  `approver` varchar(50) DEFAULT NULL,
  `feedbackforapprover` varchar(50) DEFAULT NULL,
  `feedbackforrequester` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resquester` (`requester`),
  KEY `approver` (`approver`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WAITINGFEEDBACK`
--

LOCK TABLES `WAITINGFEEDBACK` WRITE;
/*!40000 ALTER TABLE `WAITINGFEEDBACK` DISABLE KEYS */;
INSERT INTO `WAITINGFEEDBACK` VALUES (14,'william','mark','Left','Left');
/*!40000 ALTER TABLE `WAITINGFEEDBACK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WISHITEM`
--

DROP TABLE IF EXISTS `WISHITEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WISHITEM` (
  `wishlistid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  PRIMARY KEY (`wishlistid`,`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WISHITEM`
--

LOCK TABLES `WISHITEM` WRITE;
/*!40000 ALTER TABLE `WISHITEM` DISABLE KEYS */;
/*!40000 ALTER TABLE `WISHITEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WISHLIST`
--

DROP TABLE IF EXISTS `WISHLIST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WISHLIST` (
  `wishlistid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`wishlistid`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WISHLIST`
--

LOCK TABLES `WISHLIST` WRITE;
/*!40000 ALTER TABLE `WISHLIST` DISABLE KEYS */;
/*!40000 ALTER TABLE `WISHLIST` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-23 12:12:23
