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
-- Table structure for table `notikumi`
--

DROP TABLE IF EXISTS `notikumi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notikumi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_pret` int(11) DEFAULT NULL,
  `pret_id` varchar(7) DEFAULT NULL,
  `pasut_nr` varchar(10) DEFAULT NULL,
  `event_id` varchar(10) DEFAULT NULL,
  `event_npk` int(11) DEFAULT NULL,
  `persona` varchar(45) DEFAULT NULL,
  `uzdevums` varchar(200) DEFAULT NULL,
  `reg_time` datetime DEFAULT NULL,
  `termins` date DEFAULT NULL,
  `lemums` varchar(45) DEFAULT NULL,
  `izdevumi` decimal(10,0) DEFAULT NULL,
  `pedejais` tinyint(1) NOT NULL,
  `izpildes_dat` date DEFAULT NULL,
  `apraksts` text,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='Notikumi pec pretenzijas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notikumi`
--

LOCK TABLES `notikumi` WRITE;
/*!40000 ALTER TABLE `notikumi` DISABLE KEYS */;
INSERT INTO `notikumi` VALUES (9,44,'EP-','','EP-1',1,'','','2017-01-28 00:00:00',NULL,'',0,0,NULL,''),(8,44,'EP-','','EP-1',1,'','','2017-01-28 00:00:00',NULL,'',0,0,NULL,''),(7,44,'EP-','','EP-1',1,'','','2017-01-28 00:00:00',NULL,'',0,0,NULL,'');
/*!40000 ALTER TABLE `notikumi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-29 15:59:55
