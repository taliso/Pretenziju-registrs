-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tp_pretenz
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
  `reg_nr` varchar(11) DEFAULT NULL,
  `veids` varchar(10) DEFAULT NULL,
  `dokumenta_datums` date DEFAULT NULL,
  `sanemsanas_datums` date DEFAULT NULL,
  `registr_datums` datetime DEFAULT CURRENT_TIMESTAMP,
  `konstat_datums` date DEFAULT NULL,
  `pret_id` varchar(7) DEFAULT NULL,
  `iesniedzejs` varchar(100) DEFAULT NULL,
  `agents` varchar(70) DEFAULT NULL,
  `produkcija` varchar(100) DEFAULT NULL,
  `pasutijuma_nr` varchar(10) DEFAULT NULL,
  `daudzums_viss` tinyint(1) DEFAULT NULL,
  `daudzums_pieg_part` tinyint(1) DEFAULT NULL,
  `pieg_part_nr` varchar(11) DEFAULT NULL,
  `daudzums_atsev_paneli` tinyint(1) DEFAULT NULL,
  `daudzums_kvmet` int(11) DEFAULT NULL,
  `daudzums_kubmet` int(11) DEFAULT NULL,
  `no_partijas` varchar(15) DEFAULT NULL,
  `par_laiks` tinyint(1) DEFAULT NULL,
  `par_daudzumu` tinyint(1) DEFAULT NULL,
  `par_bojats` tinyint(1) DEFAULT NULL,
  `par_kvalitati` tinyint(1) DEFAULT NULL,
  `noform_pardev` tinyint(1) DEFAULT NULL,
  `noform_e_pasts` tinyint(1) DEFAULT NULL,
  `noform_oficial` tinyint(1) DEFAULT NULL,
  `iesniegts_nav` tinyint(1) DEFAULT NULL,
  `iesniegts_panel_foto` tinyint(1) DEFAULT NULL,
  `iesniegts_mark_foto` tinyint(1) DEFAULT NULL,
  `obl_dok_crm` tinyint(1) DEFAULT NULL,
  `obl_dok_akts` tinyint(1) DEFAULT NULL,
  `apraksts` text,
  `file_foto` varchar(150) DEFAULT NULL,
  `file_pas` varchar(150) DEFAULT NULL,
  `file_apr` varchar(150) DEFAULT NULL,
  `file_obl_doc` varchar(145) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NEW',
  `notikumu_sk` int(11) DEFAULT NULL,
  `budzets` int(11) DEFAULT NULL,
  `sakuma_datums` date DEFAULT NULL,
  `beigu_dat` date DEFAULT NULL,
  `izdevumi` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-20 12:18:20
