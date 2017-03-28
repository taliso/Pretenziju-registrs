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
-- Table structure for table `dati`
--

DROP TABLE IF EXISTS `dati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dati` (
  `ped_reg_nr` int(11) NOT NULL,
  `sodiena` datetime DEFAULT NULL,
  `versija` varchar(5) NOT NULL DEFAULT '0.0.1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='dati';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dati`
--

LOCK TABLES `dati` WRITE;
/*!40000 ALTER TABLE `dati` DISABLE KEYS */;
INSERT INTO `dati` VALUES (2,'2016-10-11 00:00:00','0.0.1'),(2,'2016-10-11 00:00:00','0.0.1');
/*!40000 ALTER TABLE `dati` ENABLE KEYS */;
UNLOCK TABLES;

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
  `epasts` varchar(45) NOT NULL DEFAULT '',
  `struktura_kods` varchar(5) NOT NULL DEFAULT '',
  `struktura` varchar(30) NOT NULL DEFAULT '',
  `aktivs` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`agenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kl_agenti`
--

LOCK TABLES `kl_agenti` WRITE;
/*!40000 ALTER TABLE `kl_agenti` DISABLE KEYS */;
INSERT INTO `kl_agenti` VALUES ('AC','Andrejs Cvetkovs','Andrejs','123',' A','A','','EPS','',1),('AO','Arvis Ozoliņš','Arvis','123','R','T','','TEH','',1),('DM','Dainis Millers','Dainis','123','L','L','dainis.millers@tenaxgrupa.lv','LOG',' ',1),('IAU','Iveta Audzēviča','Iveta','123','L','T','','LAB','',1),('IZ','Ivars Zandersons','Ivars','123','A','A','','KM','',1),('JN','Jēkabs Narvaišs','Jekabs','123','L','L','jekabs.narvaiss@tenaxgrupa.lv','LOG',' ',1),('JP','Janīna Pozņaka','Jana','123','L','Q','','ADM','',1),('NR','Normunds Rudmanis','Normunds','123',' A','A','','EPS','',1),('RK','Roberts Kurma','Roberts','123','A','A','','KM','',1),('RKL','Romāns Kļučics','Romāns','123','A','A','','KM','',1),('SST','Sentis Strods','Sentis','123','A','A','','KM','',1),('TO','Tālivaldis Olekšs','Tālis','ristzemu','AS','S','talivaldis.olekss@tenaxgrupa.lv','','',1),('ULL','Uldis Liepa-Liepiņš','UldisLL','123','A','A','','KM','',1),('UR','Uldis Rekners','UldisR','123','L','L','uldis.rekners@tenaxgrupa.lv','LAB',' ',1),('VL','Valērijs Lementujevs','Valerijs','123','R','T','','TEH','',1);
/*!40000 ALTER TABLE `kl_agenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lomas`
--

DROP TABLE IF EXISTS `lomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lomas` (
  `kods` varchar(3) CHARACTER SET utf8 NOT NULL DEFAULT ' ',
  `nosaukums` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci COMMENT='Lomu saraksts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lomas`
--

LOCK TABLES `lomas` WRITE;
/*!40000 ALTER TABLE `lomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `lomas` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `menju` VALUES (1,'Aģentu saraksts','admin.php','','Aģentu reģistrs',0,''),(2,'SP pretenzijas','pret_list.php','','Sendvičpaneļu pretenziju reģistrs',13,'SP'),(6,'Dekoru pretenzijas','pret_list.php','','Dekoru pretenziju reģistrs',1,'DE'),(3,'EPS pretenzijas','pret_list.php','','EPS pretenziju reģistrs',6,'EP'),(7,'DP pretenzija','pret_list.php','','Dobeles Paneļa pretenzija',0,'DP'),(8,'PU pretenzija','pret_list.php','','PU paneļu pretenzija',0,'PU'),(9,'PIR pretenzijas','pret_list.php',' ','PIR paneļu pretenzijas',0,'PI'),(10,'KM pretenzijas','pret_list.php','','KM paneļu pretenzijas',29,'KM');
/*!40000 ALTER TABLE `menju` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notikumi`
--

DROP TABLE IF EXISTS `notikumi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notikumi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_pret` int(11) DEFAULT NULL,
  `pret_id` varchar(7) CHARACTER SET latin1 DEFAULT NULL,
  `pasut_nr` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `npk` int(11) DEFAULT NULL,
  `event_id` varchar(9) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `teh_cilv` varchar(50) DEFAULT NULL,
  `lab_cilv` varchar(50) DEFAULT NULL,
  `log_cilv` varchar(50) DEFAULT NULL,
  `uzd_teh` varchar(150) DEFAULT NULL,
  `uzd_lab` varchar(150) DEFAULT NULL,
  `uzd_log` varchar(150) DEFAULT NULL,
  `dat_teh` date DEFAULT NULL,
  `dat_lab` date DEFAULT NULL,
  `dat_log` date DEFAULT NULL,
  `teh_atbild` varchar(100) DEFAULT '',
  `lab_atbild` varchar(100) DEFAULT '',
  `log_atbild` varchar(100) DEFAULT '',
  `izdevumi` int(11) DEFAULT NULL,
  `file_doc` varchar(150) DEFAULT '',
  `pedejais` int(1) DEFAULT NULL,
  `izpildes_dat` date DEFAULT NULL,
  `teh_izdev` int(11) DEFAULT NULL,
  `lab_izdev` int(11) DEFAULT NULL,
  `log_izdev` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='Notikumi pec pretenzijas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notikumi`
--

LOCK TABLES `notikumi` WRITE;
/*!40000 ALTER TABLE `notikumi` DISABLE KEYS */;
INSERT INTO `notikumi` VALUES (37,94,'KM-33','',3,'KM-33-3','2017-02-26','Arvis Ozoliņš','','Dainis Millers','aaaaaaaaaaaaaaa','','bbbbbbbbbbbbbbbbbbbbb',NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL),(36,94,'KM-33','',2,'KM-33-2','2017-02-26','Arvis Ozoliņš','','Dainis Millers','aaaaaaaaaaaaaaa','','bbbbbbbbbbbbbbbbbbbbb',NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL),(35,94,'KM-33','',1,'KM-33-1','2017-02-26','','Iveta Audzēviča','Dainis Millers','','sdgdgdg','sdfgdgdfg',NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL),(34,93,'KM-32','',2,'KM-32-2','2017-02-26','Arvis Ozoliņš','','Dainis Millers','','','ssssssssssssssssss',NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL),(33,93,'KM-32','',1,'KM-32-1','2017-02-26','Valērijs Lementujevs','',NULL,'aaaaaaaaaaaaa','','xxxxxxxxxxxxxxxxxxxxxxxxxxxxx',NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `notikumi` ENABLE KEYS */;
UNLOCK TABLES;

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
  `dokumenta_datums` date DEFAULT NULL,
  `sanemsanas_datums` date DEFAULT NULL,
  `registr_datums` datetime DEFAULT CURRENT_TIMESTAMP,
  `konstat_datums` date DEFAULT NULL,
  `pret_id` varchar(7) NOT NULL DEFAULT ' ',
  `iesniedzejs` varchar(100) NOT NULL,
  `agents` varchar(70) NOT NULL,
  `produkcija` varchar(100) NOT NULL,
  `pasutijuma_nr` varchar(10) NOT NULL,
  `daudzums_viss` tinyint(1) NOT NULL,
  `daudzums_pieg_part` tinyint(1) NOT NULL,
  `pieg_part_nr` varchar(11) NOT NULL,
  `daudzums_atsev_paneli` tinyint(1) NOT NULL,
  `daudzums_kvmet` int(11) DEFAULT '0',
  `daudzums_kubmet` int(11) DEFAULT '0',
  `no_partijas` varchar(15) NOT NULL,
  `par_laiks` tinyint(1) DEFAULT '0',
  `par_daudzumu` tinyint(1) DEFAULT '0',
  `par_bojats` tinyint(1) DEFAULT '0',
  `par_kvalitati` tinyint(1) DEFAULT '0',
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
  `obl_dok_crm` tinyint(1) DEFAULT '0',
  `obl_dok_akts` tinyint(1) DEFAULT '0',
  `apraksts` text NOT NULL,
  `file_foto` varchar(150) NOT NULL DEFAULT ' ',
  `file_pas` varchar(150) NOT NULL DEFAULT ' ',
  `file_apr` varchar(150) NOT NULL DEFAULT ' ',
  `status` varchar(10) NOT NULL DEFAULT 'NEW',
  `notikumu_sk` int(11) DEFAULT NULL,
  `atbildigais` varchar(30) DEFAULT '',
  `budzets` int(11) DEFAULT '0',
  `uzd_izpilda` varchar(45) NOT NULL DEFAULT ' ',
  `akt_uzdevums` varchar(100) DEFAULT NULL,
  `uzd_termins` date DEFAULT NULL,
  `sakuma_datums` date DEFAULT NULL,
  `nosutits_admin` tinyint(1) DEFAULT '0',
  `nosutits_razosana` tinyint(1) DEFAULT '0',
  `nosutits_logistika` varchar(45) DEFAULT NULL,
  `nosutits_tehniki` varchar(45) DEFAULT NULL,
  `atbildes_datums` date DEFAULT NULL,
  `saskanots_ar_klientu` date DEFAULT NULL,
  `vienosanas` text,
  `beigu_dat` date DEFAULT NULL,
  `izdevumi` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pretenzijas`
--

LOCK TABLES `pretenzijas` WRITE;
/*!40000 ALTER TABLE `pretenzijas` DISABLE KEYS */;
INSERT INTO `pretenzijas` VALUES (89,'28','KM','0000-00-00','0000-00-00','0000-00-00 00:00:00',NULL,'KM-28','','','','',0,0,'',0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'		    			    			    										','','','','REGISTER',0,'',0,'','','0000-00-00','0000-00-00',0,0,'0','0','0000-00-00','0000-00-00','','0000-00-00',NULL),(90,'29','KM','2017-02-13','2017-02-01','0000-00-00 00:00:00',NULL,'KM-29','aaaaaaaaaaaaaa','','','',0,0,'',0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,'		    				','','','','REGISTER',0,'',0,'','','0000-00-00','2017-02-25',0,0,'0','0','0000-00-00','0000-00-00','','0000-00-00',NULL),(92,'31','KM','2017-02-16','2017-02-08','0000-00-00 00:00:00',NULL,'KM-31','Kurši','Andrejs','','3456',1,0,'',0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,'		    			    			    										','','','','REGISTER',0,'',0,'','','0000-00-00','0000-00-00',0,0,'0','0','0000-00-00','0000-00-00','','0000-00-00',NULL),(93,'32','KM','2017-02-08','0000-00-00','0000-00-00 00:00:00',NULL,'KM-32','','','','',1,0,'',1,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'		    			    							','','','','REGISTER',2,'',0,'','','0000-00-00','2017-02-26',0,0,'0','0','0000-00-00','0000-00-00','','0000-00-00',NULL),(94,'33','KM','0000-00-00','0000-00-00','0000-00-00 00:00:00',NULL,'KM-33','','','','',0,0,'',0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'		    				;l;m;lm;lm,;\',\';\r\nljl;kjmjl;km\r\npojpjkpokpok[k[plkl\r\nkpokp[k[k[pkl[]pl[p','','','','REGISTER',3,'',0,'','','0000-00-00','2017-02-25',0,0,'0','0','0000-00-00','0000-00-00','','0000-00-00',NULL);
/*!40000 ALTER TABLE `pretenzijas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strukturas`
--

DROP TABLE IF EXISTS `strukturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `strukturas` (
  `kods` varchar(5) COLLATE utf8_latvian_ci NOT NULL DEFAULT ' ',
  `nosaukums` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strukturas`
--

LOCK TABLES `strukturas` WRITE;
/*!40000 ALTER TABLE `strukturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `strukturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiesibas`
--

DROP TABLE IF EXISTS `tiesibas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiesibas` (
  `kods` varchar(3) COLLATE utf8_latvian_ci NOT NULL DEFAULT ' ',
  `nosaukums` varchar(50) COLLATE utf8_latvian_ci NOT NULL,
  `tiesibas` varchar(100) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiesibas`
--

LOCK TABLES `tiesibas` WRITE;
/*!40000 ALTER TABLE `tiesibas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiesibas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uzdevumi`
--

DROP TABLE IF EXISTS `uzdevumi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uzdevumi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avots` varchar(30) DEFAULT NULL,
  `identifikators` varchar(15) DEFAULT NULL,
  `persona` varchar(45) DEFAULT NULL,
  `datums` date DEFAULT NULL,
  `uzdevums` varchar(200) DEFAULT NULL,
  `termins` date DEFAULT NULL,
  `atbilde` varchar(200) DEFAULT NULL,
  `izpild_dat` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uzdevumi`
--

LOCK TABLES `uzdevumi` WRITE;
/*!40000 ALTER TABLE `uzdevumi` DISABLE KEYS */;
INSERT INTO `uzdevumi` VALUES (1,'PRETENZIJA','KM-33-3','Arvis Ozoliņš','2017-02-26','aaaaaaaaaaaaaaa',NULL,NULL,NULL,0),(2,'PRETENZIJA','KM-33-3','Dainis Millers','2017-02-26','bbbbbbbbbbbbbbbbbbbbb',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `uzdevumi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-26 23:05:32
