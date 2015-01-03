-- MySQL dump 10.14  Distrib 5.5.32-MariaDB, for Linux (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.32-MariaDB

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL,
  `trans` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(65) unsigned NOT NULL,
  `price` decimal(65,4) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (8,'SELL','2014-07-19 05:39:48.982127','SSO',100,118.0200),(8,'BUY','2014-07-19 05:40:11.062001','twtr',44,37.0500),(8,'BUY','2014-07-19 05:40:28.624764','fb',33,68.4199),(8,'SELL','2014-07-20 05:01:53.227531','AMZN',678,358.6600),(8,'SELL','2014-07-20 05:19:49.525257','LMT',11,162.4900),(8,'BUY','2014-07-20 05:20:19.876371','lmt',23,162.4900),(8,'BUY','2014-07-20 05:20:27.583463','lmt',23,162.4900),(8,'BUY','2014-07-20 05:21:02.000393','lmt',456,162.4900);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfo`
--

DROP TABLE IF EXISTS `portfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfo` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(65) unsigned NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfo`
--

LOCK TABLES `portfo` WRITE;
/*!40000 ALTER TABLE `portfo` DISABLE KEYS */;
INSERT INTO `portfo` VALUES (1,'AMZN',65),(1,'SSO',298),(2,'AMZN',444),(2,'SSO',400),(3,'AMZN',6),(3,'PM',34),(4,'AAPL',89),(4,'AMZN',68),(5,'AAPL',23),(5,'AMZN',78),(6,'AMZN',1444),(6,'SSO',400),(6,'V',23),(7,'AMZN',156),(8,'AAPL',26),(8,'FB',33),(8,'LMT',502),(8,'MSFT',89),(8,'TWTR',44);
/*!40000 ALTER TABLE `portfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000,''),(2,'hirschhorn','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000,''),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.0000,''),(4,'malan','$1$HA$azTGIMVlmPi9W9Y12cYSj/',10000.0000,''),(5,'milo','$1$HA$6DHumQaK4GhpX8QE23C8V1',10000.0000,''),(6,'skroob','$1$50$euBi4ugiJmbpIbvTTfmfI.',10000.0000,'bro@gmail.com'),(7,'zamyla','$1$50$uwfqB45ANW.9.6qaQ.DcF.',10000.0000,''),(8,'ath2ad','$1$ymMHjfOk$kvKGDC9VWpB0lCSAPlfDy/',177325.4233,'athomashayes@gmail.com'),(10,'lord dork','$1$jJ684GyT$hmEuFF8QT/b6Ah7RmGAuv/',10000.0000,'ath@fastmail.fm');
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

-- Dump completed on 2014-07-20  1:25:30
