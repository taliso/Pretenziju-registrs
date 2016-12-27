-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tp_pretenzijas
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `menju`
--

DROP TABLE IF EXISTS `menju`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menju` (
  `npk` int(11) NOT NULL,
  `teksts` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `forma` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `klase` varchar(20) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `reg_nr` int(11) NOT NULL,
  `prefiks` varchar(5) NOT NULL,
  PRIMARY KEY (`npk`),
  KEY `npk` (`npk`),
  KEY `npk_2` (`npk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menju`
--

LOCK TABLES `menju` WRITE;
/*!40000 ALTER TABLE `menju` DISABLE KEYS */;
INSERT INTO `menju` VALUES (1,'Aģentu saraksts','pret_list.php','','Aģentu reģistrs',0,''),(2,'SP pretenzijas','veidlapa_SP.php','','Sendvičpaneļu pretenziju reģistrs',12,'SP'),(6,'Dekoru pretenzijas','veidlapa_DE.php','','Dekoru pretenziju reģistrs',3,'DE'),(3,'EPS pretenzijas','veidlapa_EP.php','','EPS pretenziju reģistrs',0,'EP'),(7,'DP pretenzija','veidlapa_DP.php','','Dobeles Paneļa pretenzija',0,'DP'),(8,'PU pretenzija','veidlapa_PU.php','','PU paneļu pretenzija',0,'PU'),(9,'PIR pretenzijas','veidlapa_PI.php',' ','PIR paneļu pretenzijas',0,'PI');
/*!40000 ALTER TABLE `menju` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-27 23:51:15
