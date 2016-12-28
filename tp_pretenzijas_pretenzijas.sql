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
-- Table structure for table `pretenzijas`
--

DROP TABLE IF EXISTS `pretenzijas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pretenzijas` (
  `reg_nr` varchar(11) NOT NULL,
  `veids` varchar(10) NOT NULL,
  `dokumenta_datums` date NOT NULL,
  `sanemsanas_datums` date NOT NULL,
  `registr_datums` date NOT NULL,
  `konstat_datums` date NOT NULL,
  `iesniedzejs` varchar(100) NOT NULL,
  `agents` varchar(70) NOT NULL,
  `produkcija` varchar(100) NOT NULL,
  `pasutijuma_nr` varchar(10) NOT NULL,
  `daudzums_viss` tinyint(1) NOT NULL,
  `daudzums_pieg_part` tinyint(1) NOT NULL,
  `pieg_part_nr` varchar(11) NOT NULL,
  `daudzums_atsev_paneli` tinyint(1) NOT NULL,
  `daudzums_kvmet` int(11) NOT NULL,
  `no_partijas` varchar(15) NOT NULL,
  `par_laiks` tinyint(1) NOT NULL,
  `par_izkr_trans` tinyint(1) NOT NULL,
  `par_izkr_iepak` tinyint(1) NOT NULL,
  `par_izkr_izpak` tinyint(1) NOT NULL,
  `par_piemont_jaun` tinyint(1) NOT NULL,
  `par_piemont_ekspl` tinyint(1) NOT NULL,
  `noform_pardev` tinyint(1) NOT NULL,
  `noform_e_pasts` tinyint(1) NOT NULL,
  `noform_oficial` tinyint(1) NOT NULL,
  `iesniegts_nav` tinyint(1) NOT NULL,
  `iesniegts_panel_foto` tinyint(1) NOT NULL,
  `iesniegts_mark_foto` tinyint(1) NOT NULL,
  `apraksts` varchar(200) NOT NULL,
  `file_foto` varchar(150) NOT NULL DEFAULT ' ',
  `file_pas` varchar(150) NOT NULL DEFAULT ' ',
  `file_apr` varchar(150) NOT NULL DEFAULT ' ',
  `pret_id` varchar(7) NOT NULL DEFAULT ' ',
  `status` varchar(10) NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pretenzijas`
--

LOCK TABLES `pretenzijas` WRITE;
/*!40000 ALTER TABLE `pretenzijas` DISABLE KEYS */;
INSERT INTO `pretenzijas` VALUES ('8','SP','2016-12-17','2016-12-17','2016-12-17','2016-12-17','','a : aaa','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-8','NEW');
/*!40000 ALTER TABLE `pretenzijas` ENABLE KEYS */;
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
