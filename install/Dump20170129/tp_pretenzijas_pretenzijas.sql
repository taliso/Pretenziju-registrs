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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `reg_nr` varchar(11) NOT NULL,
  `veids` varchar(10) NOT NULL,
  `dokumenta_datums` date NOT NULL,
  `sanemsanas_datums` date NOT NULL,
  `registr_datums` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `status` varchar(10) NOT NULL DEFAULT 'NEW',
  `sakuma_datums` date DEFAULT NULL,
  `notikumu_sk` int(11) DEFAULT NULL,
  `atbildigais` varchar(30) DEFAULT '0',
  `budzets` int(11) DEFAULT '0',
  `uzd_izpilda` varchar(45) NOT NULL DEFAULT ' ',
  `akt_uzdevums` varchar(100) DEFAULT NULL,
  `uzd_termins` date DEFAULT NULL,
  `beigu_dat` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pretenzijas`
--

LOCK TABLES `pretenzijas` WRITE;
/*!40000 ALTER TABLE `pretenzijas` DISABLE KEYS */;
INSERT INTO `pretenzijas` VALUES (27,'2','SP','2017-04-21','2017-05-21','2017-01-21 16:49:09','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(28,'3','SP','2017-01-21','2017-01-21','2017-01-21 17:09:25','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',1,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-4','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(29,'5','SP','2017-01-21','2017-01-21','2017-01-21 17:10:05','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,25,'',0,0,0,0,0,0,1,0,0,0,0,0,'',' ',' ',' ','SP-6','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(30,'7','SP','2017-02-21','2017-01-21','2017-01-21 17:10:29','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-8','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(31,'9','SP','2017-01-13','2017-01-21','2017-01-21 17:10:50','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-10','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(32,'11','SP','2017-01-21','2017-03-21','2017-01-21 17:11:15','2017-10-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-12','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(33,'','SP','2017-01-21','2017-01-21','2017-01-21 17:17:19','2017-01-21','','AC : Andrejs Cvetkovs','','4321',0,0,'12',0,34,'123',0,0,1,0,1,0,0,0,0,0,0,0,'',' ',' ',' ','SP-','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(34,'15','SP','2017-01-21','2017-01-21','2017-01-21 17:21:04','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,234,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-16','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(35,'17','SP','2017-01-21','2017-01-21','2017-01-21 17:28:34','2017-01-21','','Andrejs Cvetkovs','','',0,1,'12',1,34,'56',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-18','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(36,'25','SP','2017-01-21','2017-01-21','2017-01-21 18:19:26','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',1,23,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-26','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(37,'','SP','2017-01-21','2017-01-21','2017-01-21 18:33:50','2017-01-21','','AC : Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-43','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(38,'45','SP','2017-01-21','2017-01-21','2017-01-21 18:34:36','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-46','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(39,'47','SP','2017-01-21','2017-01-21','2017-01-21 18:36:03','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-48','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(40,'49','SP','2017-01-21','2017-01-21','2017-01-21 19:13:23','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-49','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(41,'50','SP','2017-01-21','2017-01-21','2017-01-21 19:14:21','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-50','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(42,'52','SP','2017-01-21','2017-01-21','2017-01-21 19:18:09','2017-01-21','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-52','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(43,'','SP','2017-01-21','2017-01-21','2017-01-21 19:19:55','2017-01-21','','AC : Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-54','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(44,'','EP','2017-02-21','2017-01-21','2017-01-21 21:31:20','2017-01-21','A/S Kurši','AC : Andrejs Cvetkovs','','',0,0,'',1,24,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','EP-','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(45,'','SP','2017-01-22','2017-01-22','2017-01-22 14:42:20','2017-01-22','','AC : Andrejs Cvetkovs','','',0,1,'',1,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-56','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(46,'14','SP','2017-01-24','2017-01-24','2017-01-24 22:55:50','2017-01-24','','Andrejs Cvetkovs','','54321',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-14','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(47,'44','SP','2017-01-29','2017-01-29','2017-01-29 14:29:05','2017-01-29','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-44','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL),(48,'45','SP','2017-01-29','2017-01-29','2017-01-29 14:29:25','2017-01-29','','Andrejs Cvetkovs','','',0,0,'',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'',' ',' ',' ','SP-45','NEW',NULL,NULL,'0',0,' ',NULL,NULL,NULL);
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

-- Dump completed on 2017-01-29 15:59:55
