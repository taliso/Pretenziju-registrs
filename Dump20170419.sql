-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tp_pretenzijas
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `faili`
--

DROP TABLE IF EXISTS `faili`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faili` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_master` int(11) DEFAULT NULL,
  `orginal_name` varchar(100) DEFAULT NULL,
  `konvert_name` varchar(100) DEFAULT NULL,
  `path` varchar(150) DEFAULT NULL,
  `source` varchar(45) DEFAULT NULL,
  `ident` varchar(15) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `submit_name` varchar(50) DEFAULT NULL,
  `datums` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kl_agenti`
--

DROP TABLE IF EXISTS `kl_agenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kl_agenti` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kl_notikumi`
--

DROP TABLE IF EXISTS `kl_notikumi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kl_notikumi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosaukums` varchar(45) DEFAULT NULL,
  `forma` varchar(45) DEFAULT NULL,
  `pret_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `izdevumi` int(11) DEFAULT NULL,
  `file_doc` varchar(150) DEFAULT '',
  `pedejais` int(1) DEFAULT NULL,
  `izpildes_dat` date DEFAULT NULL,
  `rec_sk` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `veids_nos` varchar(15) DEFAULT NULL COMMENT 'UZDEVUMS\nZIŅOJUMS\nLĒMUMS\nKOPSAVILKUMS\nREAKCIJA',
  `veids` varchar(1) DEFAULT NULL COMMENT 'U\nZ\nL\nK\nR',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COMMENT='Notikumi pec pretenzijas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personas_notikums`
--

DROP TABLE IF EXISTS `personas_notikums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas_notikums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `id_pers` int(11) DEFAULT NULL,
  `persona` varchar(70) DEFAULT NULL,
  `struktura_kods` varchar(7) DEFAULT NULL,
  `event_id` varchar(15) DEFAULT NULL,
  `uzdevums` varchar(150) DEFAULT NULL,
  `uzd_datums` date DEFAULT NULL,
  `atbilde` varchar(150) DEFAULT NULL,
  `atbild_datums` date DEFAULT NULL,
  `izdevumi` int(11) DEFAULT NULL,
  `izd_apstipr` tinyint(1) DEFAULT NULL,
  `file_atbild` varchar(150) DEFAULT NULL,
  `e_pasts` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COMMENT='Personas iesaistiitas notikumaa';
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `tmp_files`
--

DROP TABLE IF EXISTS `tmp_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submit_name` varchar(45) DEFAULT NULL,
  `source` varchar(45) DEFAULT NULL,
  `identif` varchar(45) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(120) DEFAULT NULL,
  `tmp_name` varchar(150) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `cmdDel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COMMENT='Pagaidu tabula, pievienojamo failu uzkrāšanai';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tmp_personas_notikums`
--

DROP TABLE IF EXISTS `tmp_personas_notikums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_personas_notikums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `id_pers` int(11) DEFAULT NULL,
  `persona` varchar(45) DEFAULT NULL,
  `strukturas_kods` varchar(7) DEFAULT NULL,
  `event_id` varchar(15) DEFAULT NULL,
  `uzdevums` varchar(150) DEFAULT NULL,
  `uzd_datums` date DEFAULT NULL,
  `e_pasts` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='Pagaidu fails datu uzkrāšanai jaunam notikumam';
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `atbilde` text,
  `fileAtbilde` varchar(150) DEFAULT NULL,
  `izpild_dat` date DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `id_source` int(11) DEFAULT NULL,
  `id_pers` int(11) DEFAULT NULL,
  `id_master` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 22:39:49
