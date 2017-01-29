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
-- Table structure for table `kl_agenti`
--

DROP TABLE IF EXISTS `kl_agenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kl_agenti` (
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL DEFAULT ' ',
  `pasword` varchar(15) NOT NULL,
  `tiesibas` varchar(5) NOT NULL DEFAULT ' ',
  `loma` varchar(45) NOT NULL COMMENT 'Lomas: 1-A:aģents, 2-S:supervisor,3-Q:kvalitateskontrole,4-T:ITD darbinieki',
  PRIMARY KEY (`agenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kl_agenti`
--

LOCK TABLES `kl_agenti` WRITE;
/*!40000 ALTER TABLE `kl_agenti` DISABLE KEYS */;
INSERT INTO `kl_agenti` VALUES ('AC','Andrejs Cvetkovs','Andrejs','123',' A','A'),('AO','Arvis Ozoliņš','Arvis','123','R','T'),('IAU','Iveta Audzēviča','Iveta','123','L','T'),('IZ','Ivars Zandersons','Ivars','123','A','A'),('JP','Janīna Pozņaka','Jana','123','L','Q'),('NR','Normunds Rudmanis','Normunds','123',' A','A'),('RK','Roberts Kurma','Roberts','123','A','A'),('RKL','Romāns Kļučics','Romāns','123','A','A'),('SST','Sentis Strods','Sentis','123','A','A'),('TO','Tālivaldis Olekšs','Tālis','ristzemu','AS','S'),('ULL','Uldis Liepa-Liepiņš','Uldis','123','A','A'),('VL','Valērijs Lementujevs','Valerijs','123','R','T');
/*!40000 ALTER TABLE `kl_agenti` ENABLE KEYS */;
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
