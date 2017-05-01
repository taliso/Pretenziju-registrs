-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2017 at 09:10 AM
-- Server version: 5.0.45
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tp_pretenzijas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dati`
--

CREATE TABLE IF NOT EXISTS `dati` (
  `ped_reg_nr` int(11) NOT NULL,
  `sodiena` datetime default NULL,
  `versija` varchar(5) NOT NULL default '0.0.1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='dati';

--
-- Dumping data for table `dati`
--

INSERT INTO `dati` (`ped_reg_nr`, `sodiena`, `versija`) VALUES
(2, '2016-10-11 00:00:00', '0.0.1'),
(2, '2016-10-11 00:00:00', '0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `faili`
--

CREATE TABLE IF NOT EXISTS `faili` (
  `id` int(11) NOT NULL auto_increment,
  `orginal_name` varchar(100) default NULL,
  `konvert_name` varchar(100) default NULL,
  `path` varchar(150) default NULL,
  `source` varchar(45) default NULL,
  `ident` varchar(15) default NULL,
  `size` int(11) default NULL,
  `submit_name` varchar(50) default NULL,
  `datums` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `faili`
--

INSERT INTO `faili` (`id`, `orginal_name`, `konvert_name`, `path`, `source`, `ident`, `size`, `submit_name`, `datums`) VALUES
(1, 'Argus_Elfa.xlsx', 'VEID_KM - 20_SD6_Argus_Elfa.xlsx', 'uploads/', 'VEIDLAPA', 'KM - 20', 9975, 'SD6', '2017-04-06'),
(5, 'diamond-png-4.png', 'NOTI_KM - 20-1_diamond-png-4.png', NULL, 'NOTIKUMS', 'KM - 20-1', 63506, 'doc_to_event', NULL),
(6, 'Avansa norekini_veidlapa.xlsm', 'VEID_KM - 20_SD6_Avansa norekini_veidlapa.xlsm', 'uploads/', 'VEIDLAPA', 'KM - 20', 41435, 'SD6', '2017-04-07'),
(7, 'Dokumentu strukturēšana 2.xlsx', 'NOTI_KM - 21-1_Dokumentu strukturēšana 2.xlsx', NULL, 'NOTIKUMS', 'KM - 21-1', 10978, 'doc_to_event', NULL),
(8, 'H81 atjaunosana.bat', 'NOTI_KM - 23-1_H81 atjaunosana.bat', NULL, 'NOTIKUMS', 'KM - 23-1', 105, 'doc_to_event', NULL),
(9, 'Capture.JPG', 'NOTI_KM - 22-1_fileUzdev_Capture.JPG', 'uploads/', 'NOTIKUMS', 'KM - 22-1', 27238, 'fileUzdev', '2017-04-11'),
(10, 'Capture2.JPG', 'NOTI_KM - 22-1_fileUzdev_Capture2.JPG', 'uploads/', 'NOTIKUMS', 'KM - 22-1', 35783, 'fileUzdev', '2017-04-11'),
(11, 'Capture.JPG', 'VEID_KM - 24_SD6_Capture.JPG', 'uploads/', 'VEIDLAPA', 'KM - 24', 27238, 'SD6', '2017-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `kl_agenti`
--

CREATE TABLE IF NOT EXISTS `kl_agenti` (
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL default ' ',
  `pasword` varchar(15) NOT NULL,
  `tiesibas` varchar(5) NOT NULL default ' ',
  `loma` varchar(45) NOT NULL COMMENT 'Lomas: 1-A:aģents, 2-S:supervisor,3-Q:kvalitateskontrole,4-T:ITD darbinieki',
  `epasts` varchar(45) NOT NULL default '',
  `struktura_kods` varchar(5) NOT NULL default '',
  `struktura` varchar(30) NOT NULL default '',
  `aktivs` int(11) NOT NULL default '0',
  PRIMARY KEY  (`agenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';

--
-- Dumping data for table `kl_agenti`
--

INSERT INTO `kl_agenti` (`agenta_id`, `agents`, `username`, `pasword`, `tiesibas`, `loma`, `epasts`, `struktura_kods`, `struktura`, `aktivs`) VALUES
('AC', 'Andrejs Cvetkovs', 'Andrejs', '123', ' A', 'A', '', 'EPS', '', 1),
('AO', 'Arvis Ozoliņš', 'Arvis', '123', 'R', 'T', '', 'TEH', '', 1),
('DM', 'Jānis Podkalns', 'Janis', '123', 'L', 'T', '', 'LOG', ' ', 1),
('IAU', 'Iveta Audzēviča', 'Iveta', '123', 'L', 'T', '', 'LAB', '', 1),
('IZ', 'Ivars Zandersons', 'Ivars', '123', 'A', 'A', '', 'KM', '', 1),
('JN', 'Jēkabs Narvaišs', 'Jekabs', '123', 'L', 'T', 'jekabs.narvaiss@tenaxgrupa.lv', 'LOG', ' ', 1),
('JP', 'Janīna Pozņaka', 'Jana', '123', 'L', 'Q', '', 'ADM', '', 1),
('NR', 'Normunds Rudmanis', 'Normunds', '123', ' A', 'A', '', 'EPS', '', 1),
('RK', 'Roberts Kurma', 'Roberts', '123', 'A', 'A', '', 'KM', '', 1),
('RKL', 'Romāns Kļučics', 'Romāns', '123', 'A', 'A', '', 'KM', '', 1),
('SST', 'Sentis Strods', 'Sentis', '123', 'A', 'A', '', 'KM', '', 1),
('TO', 'Tālivaldis Olekšs', 'Tālis', 'ristzemu', 'AS', 'S', 'talivaldis.olekss@tenaxgrupa.lv', '', '', 1),
('ULL', 'Uldis Liepa-Liepiņš', 'UldisLL', '123', 'A', 'A', '', 'KM', '', 1),
('UR', 'Uldis Rekners', 'UldisR', '123', 'L', 'T', 'uldis.rekners@tenaxgrupa.lv', 'LAB', ' ', 1),
('VL', 'Valērijs Lementujevs', 'Valerijs', '123', 'R', 'T', '', 'TEH', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kl_event_veidi`
--

CREATE TABLE IF NOT EXISTS `kl_event_veidi` (
  `id` int(11) NOT NULL auto_increment,
  `nosaukums` varchar(50) character set utf8 NOT NULL,
  `forma` varchar(20) character set utf8 NOT NULL,
  `status_name` varchar(20) character set utf8 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kl_event_veidi`
--

INSERT INTO `kl_event_veidi` (`id`, `nosaukums`, `forma`, `status_name`, `status`) VALUES
(1, 'Uzdevums', 'newevent1.php', 'PROCEESED', 1),
(2, 'Zinojums', 'INFO', '', 0),
(3, 'Lemums', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kl_notikumi`
--

CREATE TABLE IF NOT EXISTS `kl_notikumi` (
  `id` int(11) NOT NULL auto_increment,
  `nosaukums` varchar(45) default NULL,
  `forma` varchar(45) default NULL,
  `pret_status` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kl_notikumi`
--

INSERT INTO `kl_notikumi` (`id`, `nosaukums`, `forma`, `pret_status`) VALUES
(1, 'Uzdevums', 'newevent1.php', '1'),
(2, 'Zinojums', NULL, '2'),
(3, 'Lemums', NULL, '3'),
(4, 'Korektīvās darbības', NULL, '4');

-- --------------------------------------------------------

--
-- Table structure for table `lomas`
--

CREATE TABLE IF NOT EXISTS `lomas` (
  `kods` varchar(3) character set utf8 NOT NULL default ' ',
  `nosaukums` varchar(30) character set utf8 NOT NULL default ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci COMMENT='Lomu saraksts';

--
-- Dumping data for table `lomas`
--


-- --------------------------------------------------------

--
-- Table structure for table `menju`
--

CREATE TABLE IF NOT EXISTS `menju` (
  `npk` int(11) NOT NULL,
  `teksts` varchar(30) character set utf8 collate utf8_latvian_ci NOT NULL,
  `forma` varchar(30) character set utf8 collate utf8_latvian_ci NOT NULL,
  `klase` varchar(20) character set utf8 collate utf8_latvian_ci NOT NULL,
  `title` varchar(100) character set utf8 collate utf8_latvian_ci NOT NULL,
  `reg_nr` int(11) NOT NULL,
  `prefiks` varchar(5) NOT NULL,
  PRIMARY KEY  (`npk`),
  KEY `npk` (`npk`),
  KEY `npk_2` (`npk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menju`
--

INSERT INTO `menju` (`npk`, `teksts`, `forma`, `klase`, `title`, `reg_nr`, `prefiks`) VALUES
(1, 'Aģentu saraksts', 'admin.php', '', 'Aģentu reģistrs', 0, ''),
(2, 'SP pretenzijas', 'pret_list.php', '', 'Sendvičpaneļu pretenziju reģistrs', 13, 'SP'),
(6, 'Dekoru pretenzijas', 'pret_list.php', '', 'Dekoru pretenziju reģistrs', 1, 'DE'),
(3, 'EPS pretenzijas', 'pret_list.php', '', 'EPS pretenziju reģistrs', 6, 'EP'),
(7, 'DP pretenzija', 'pret_list.php', '', 'Dobeles Paneļa pretenzija', 0, 'DP'),
(8, 'PU pretenzija', 'pret_list.php', '', 'PU paneļu pretenzija', 0, 'PU'),
(9, 'PIR pretenzijas', 'pret_list.php', ' ', 'PIR paneļu pretenzijas', 0, 'PI'),
(10, 'KM pretenzijas', 'pret_list.php', '', 'KM paneļu pretenzijas', 24, 'KM');

-- --------------------------------------------------------

--
-- Table structure for table `notikumi`
--

CREATE TABLE IF NOT EXISTS `notikumi` (
  `ID` int(11) NOT NULL auto_increment,
  `id_pret` int(11) default NULL,
  `pret_id` varchar(7) character set latin1 default NULL,
  `pasut_nr` varchar(10) character set latin1 default NULL,
  `npk` int(11) default NULL,
  `event_id` varchar(9) default NULL,
  `event_date` date default NULL,
  `veids` varchar(50) NOT NULL,
  `izdevumi` int(11) default NULL,
  `file_doc` varchar(150) default '',
  `pedejais` int(1) default NULL,
  `izpildes_dat` date default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Notikumi pec pretenzijas' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notikumi`
--

INSERT INTO `notikumi` (`ID`, `id_pret`, `pret_id`, `pasut_nr`, `npk`, `event_id`, `event_date`, `veids`, `izdevumi`, `file_doc`, `pedejais`, `izpildes_dat`) VALUES
(1, 29, 'KM - 6', NULL, 1, 'KM - 6-1', '2017-04-03', '', NULL, '', NULL, NULL),
(2, 27, 'KM - 4', NULL, 1, 'KM - 4-1', '2017-04-03', '', NULL, '', NULL, NULL),
(3, 27, 'KM - 4', NULL, 2, 'KM - 4-2', '2017-04-03', '', NULL, '', NULL, NULL),
(4, 27, 'KM - 4', NULL, 3, 'KM - 4-3', '2017-04-03', '', NULL, '', NULL, NULL),
(5, 27, 'KM - 4', NULL, 4, 'KM - 4-4', '2017-04-03', '', NULL, '', NULL, NULL),
(6, 42, 'KM - 20', NULL, 1, 'KM - 20-1', '2017-04-06', '', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personas_notikums`
--

CREATE TABLE IF NOT EXISTS `personas_notikums` (
  `ID` int(11) NOT NULL auto_increment,
  `id_event` int(11) default NULL,
  `persona` varchar(70) default NULL,
  `struktura_kods` varchar(7) default NULL,
  `event_id` varchar(15) default NULL,
  `uzdevums` varchar(150) default NULL,
  `uzd_datums` date default NULL,
  `atbilde` varchar(150) default NULL,
  `atbild_datums` date default NULL,
  `izdevumi` int(11) default NULL,
  `izd_apstipr` tinyint(1) default NULL,
  `file_atbild` varchar(150) default NULL,
  `e_pasts` varchar(45) default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Personas iesaistiitas notikumaa' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `personas_notikums`
--

INSERT INTO `personas_notikums` (`ID`, `id_event`, `persona`, `struktura_kods`, `event_id`, `uzdevums`, `uzd_datums`, `atbilde`, `atbild_datums`, `izdevumi`, `izd_apstipr`, `file_atbild`, `e_pasts`) VALUES
(1, NULL, 'Iveta Audzēviča', 'LAB', 'KM - 6-1', '', '2017-04-03', NULL, NULL, NULL, NULL, NULL, ''),
(2, NULL, 'Jēkabs Narvaišs', 'LOG', 'KM - 6-1', '', '2017-04-03', NULL, NULL, NULL, NULL, NULL, 'jekabs.narvaiss@tenaxgrupa.lv'),
(3, NULL, 'Arvis Ozoliņš', 'TEH', 'KM - 4-1', '', '2017-04-03', NULL, NULL, NULL, NULL, NULL, ''),
(4, NULL, 'Uldis Rekners', 'LAB', 'KM - 4-2', '', '2017-04-03', NULL, NULL, NULL, NULL, NULL, 'uldis.rekners@tenaxgrupa.lv'),
(5, NULL, 'Jānis Podkalns', 'LOG', 'KM - 4-4', '', '2017-04-03', NULL, NULL, NULL, NULL, NULL, ''),
(6, NULL, 'Jānis Podkalns', 'LOG', 'KM - 20-1', '', '2017-04-06', NULL, NULL, NULL, NULL, NULL, ''),
(7, NULL, 'Jēkabs Narvaišs', 'LOG', 'KM - 21-1', 'Noskaidrot', '2017-04-07', NULL, NULL, NULL, NULL, NULL, 'jekabs.narvaiss@tenaxgrupa.lv'),
(8, NULL, 'Iveta Audzēviča', 'LAB', 'KM - 23-1', 'asdgrsdgherhgerfetrh', '2017-04-07', NULL, NULL, NULL, NULL, NULL, ''),
(9, NULL, 'Jānis Podkalns', 'LOG', 'KM - 23-1', '', '2017-04-07', NULL, NULL, NULL, NULL, NULL, ''),
(10, NULL, 'Iveta Audzēviča', 'LAB', 'KM - 22-1', '', '2017-04-12', NULL, NULL, NULL, NULL, NULL, ''),
(11, NULL, 'Arvis Ozoliņš', 'TEH', 'KM - 22-1', '', '2017-04-12', NULL, NULL, NULL, NULL, NULL, ''),
(12, NULL, 'Jēkabs Narvaišs', 'LOG', 'KM - 22-1', '', '2017-04-12', NULL, NULL, NULL, NULL, NULL, 'jekabs.narvaiss@tenaxgrupa.lv');

-- --------------------------------------------------------

--
-- Table structure for table `pretenzijas`
--

CREATE TABLE IF NOT EXISTS `pretenzijas` (
  `ID` int(11) NOT NULL auto_increment,
  `reg_nr` varchar(11) default NULL,
  `veids` varchar(10) default NULL,
  `dokumenta_datums` date default NULL,
  `sanemsanas_datums` date default NULL,
  `registr_datums` datetime default NULL,
  `konstat_datums` date default NULL,
  `pret_id` varchar(7) default NULL,
  `iesniedzejs` varchar(100) default NULL,
  `agents` varchar(70) default NULL,
  `produkcija` varchar(100) default NULL,
  `pasutijuma_nr` varchar(10) default NULL,
  `daudzums_viss` tinyint(1) default NULL,
  `daudzums_pieg_part` tinyint(1) default NULL,
  `pieg_part_nr` varchar(11) default NULL,
  `daudzums_atsev_paneli` tinyint(1) default NULL,
  `daudzums_kvmet` int(11) default NULL,
  `daudzums_kubmet` int(11) default NULL,
  `no_partijas` varchar(15) default NULL,
  `par_laiks` tinyint(1) default NULL,
  `par_daudzumu` tinyint(1) default NULL,
  `par_bojats` tinyint(1) default NULL,
  `par_kvalitati` tinyint(1) default NULL,
  `noform_pardev` tinyint(1) default NULL,
  `noform_e_pasts` tinyint(1) default NULL,
  `noform_oficial` tinyint(1) default NULL,
  `iesniegts_nav` tinyint(1) default NULL,
  `iesniegts_panel_foto` tinyint(1) default NULL,
  `iesniegts_mark_foto` tinyint(1) default NULL,
  `obl_dok_crm` tinyint(1) default NULL,
  `obl_dok_akts` tinyint(1) default NULL,
  `apraksts` text,
  `file_foto` varchar(150) default NULL,
  `file_pas` varchar(150) default NULL,
  `file_apr` varchar(150) default NULL,
  `file_obl_doc` varchar(145) default NULL,
  `status` varchar(10) NOT NULL default 'NEW',
  `notikumu_sk` int(11) default NULL,
  `budzets` int(11) default NULL,
  `sakuma_datums` date default NULL,
  `beigu_dat` date default NULL,
  `izdevumi` int(11) default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs' AUTO_INCREMENT=47 ;

--
-- Dumping data for table `pretenzijas`
--

INSERT INTO `pretenzijas` (`ID`, `reg_nr`, `veids`, `dokumenta_datums`, `sanemsanas_datums`, `registr_datums`, `konstat_datums`, `pret_id`, `iesniedzejs`, `agents`, `produkcija`, `pasutijuma_nr`, `daudzums_viss`, `daudzums_pieg_part`, `pieg_part_nr`, `daudzums_atsev_paneli`, `daudzums_kvmet`, `daudzums_kubmet`, `no_partijas`, `par_laiks`, `par_daudzumu`, `par_bojats`, `par_kvalitati`, `noform_pardev`, `noform_e_pasts`, `noform_oficial`, `iesniegts_nav`, `iesniegts_panel_foto`, `iesniegts_mark_foto`, `obl_dok_crm`, `obl_dok_akts`, `apraksts`, `file_foto`, `file_pas`, `file_apr`, `file_obl_doc`, `status`, `notikumu_sk`, `budzets`, `sakuma_datums`, `beigu_dat`, `izdevumi`) VALUES
(42, '20', 'KM', '2017-04-11', '0000-00-00', '2017-04-07 00:00:00', NULL, 'KM - 20', '', 'Andrejs Cvetkovs', '', '22222222', 1, 0, '', 1, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '', '', '', '', 'PROCESSED', 0, 0, '0000-00-00', '0000-00-00', NULL),
(43, '21', 'KM', '2017-04-08', '0000-00-00', '2017-04-07 00:00:00', NULL, 'KM - 21', '', 'Sentis Strods', '', '', 0, 0, '', 0, 0, 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', '', '', 'PROCESSED', 1, 0, '2017-04-07', '0000-00-00', NULL),
(44, '22', 'KM', '2017-04-17', '0000-00-00', '2017-04-10 00:00:00', NULL, 'KM - 22', '', 'Uldis Liepa-Liepiņš', '', '', 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', 'PROCESSED', 1, 0, '0000-00-00', '0000-00-00', NULL),
(45, '23', 'KM', '2017-04-10', '2017-04-05', '2017-04-07 00:00:00', NULL, 'KM - 23', 'Kursi', 'Romāns Kļučics', '', '', 1, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', 'PROCESSED', 1, 0, '2017-04-07', '0000-00-00', NULL),
(46, '24', 'KM', '2017-04-07', '2017-04-07', '2017-04-11 00:00:00', NULL, 'KM - 24', 'Indrek Meri', 'Sentis Strods', '', '42420', 0, 0, '', 1, 0, 0, '', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', 'NEW', 0, 0, '0000-00-00', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strukturas`
--

CREATE TABLE IF NOT EXISTS `strukturas` (
  `kods` varchar(5) collate utf8_latvian_ci NOT NULL default ' ',
  `nosaukums` varchar(50) character set utf8 NOT NULL default ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `strukturas`
--


-- --------------------------------------------------------

--
-- Table structure for table `tiesibas`
--

CREATE TABLE IF NOT EXISTS `tiesibas` (
  `kods` varchar(3) collate utf8_latvian_ci NOT NULL default ' ',
  `nosaukums` varchar(50) collate utf8_latvian_ci NOT NULL,
  `tiesibas` varchar(100) collate utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `tiesibas`
--


-- --------------------------------------------------------

--
-- Table structure for table `tmp_files`
--

CREATE TABLE IF NOT EXISTS `tmp_files` (
  `id` int(11) NOT NULL auto_increment,
  `submit_name` varchar(45) default NULL,
  `source` varchar(45) default NULL,
  `identif` varchar(45) default NULL,
  `name` varchar(30) default NULL,
  `type` varchar(120) default NULL,
  `tmp_name` varchar(150) default NULL,
  `size` int(11) default NULL,
  `cmdDel` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Pagaidu tabula, pievienojamo failu uzkrāšanai' AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tmp_files`
--


-- --------------------------------------------------------

--
-- Table structure for table `tmp_personas_notikums`
--

CREATE TABLE IF NOT EXISTS `tmp_personas_notikums` (
  `ID` int(11) NOT NULL auto_increment,
  `persona` varchar(45) default NULL,
  `strukturas_kods` varchar(7) default NULL,
  `event_id` varchar(15) default NULL,
  `uzdevums` varchar(150) default NULL,
  `uzd_datums` date default NULL,
  `e_pasts` varchar(45) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Pagaidu fails datu uzkrāšanai jaunam notikumam' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tmp_personas_notikums`
--

INSERT INTO `tmp_personas_notikums` (`ID`, `persona`, `strukturas_kods`, `event_id`, `uzdevums`, `uzd_datums`, `e_pasts`) VALUES
(7, 'Iveta Audzēviča', 'LAB', 'KM - 22-1', '', '0000-00-00', ''),
(8, 'Arvis Ozoliņš', 'TEH', 'KM - 22-1', '', '0000-00-00', ''),
(9, 'Jēkabs Narvaišs', 'LOG', 'KM - 22-1', '', '0000-00-00', 'jekabs.narvaiss@tenaxgrupa.lv');

-- --------------------------------------------------------

--
-- Table structure for table `uzdevumi`
--

CREATE TABLE IF NOT EXISTS `uzdevumi` (
  `id` int(11) NOT NULL auto_increment,
  `avots` varchar(30) default NULL,
  `identifikators` varchar(15) default NULL,
  `persona` varchar(45) default NULL,
  `datums` date default NULL,
  `uzdevums` varchar(200) default NULL,
  `termins` date default NULL,
  `atbilde` text,
  `fileAtbilde` varchar(150) default NULL,
  `izpild_dat` date default NULL,
  `status` int(1) default NULL,
  `id_source` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `uzdevumi`
--

INSERT INTO `uzdevumi` (`id`, `avots`, `identifikators`, `persona`, `datums`, `uzdevums`, `termins`, `atbilde`, `fileAtbilde`, `izpild_dat`, `status`, `id_source`) VALUES
(1, 'notikumi', 'KM - 6-1', NULL, '2017-04-03', '', '2017-04-03', NULL, NULL, NULL, NULL, 0),
(2, 'notikumi', 'KM - 6-1', NULL, '2017-04-03', '', '2017-04-03', NULL, NULL, NULL, NULL, 0),
(3, 'notikumi', 'KM - 4-1', NULL, '2017-04-03', '', '2017-04-03', NULL, NULL, NULL, NULL, 0),
(4, 'notikumi', 'KM - 4-2', NULL, '2017-04-03', '', '2017-04-03', NULL, NULL, NULL, NULL, 0),
(5, 'notikumi', NULL, NULL, '2017-04-03', NULL, '2017-04-03', NULL, NULL, NULL, NULL, 0),
(6, 'notikumi', 'KM - 4-4', NULL, '2017-04-03', '', '2017-04-03', NULL, NULL, NULL, NULL, 0),
(7, 'notikumi', 'KM - 20-1', NULL, '2017-04-06', '', '2017-04-06', NULL, NULL, NULL, NULL, 0),
(8, 'notikumi', 'KM - 21-1', NULL, '2017-04-07', 'Noskaidrot', '2017-04-07', NULL, NULL, NULL, NULL, 0),
(9, 'notikumi', 'KM - 23-1', NULL, '2017-04-07', '', '2017-04-07', NULL, NULL, NULL, NULL, 0);
