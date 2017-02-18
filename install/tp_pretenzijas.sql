-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2017 at 08:20 PM
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
(2, '2016-10-11 00:00:00', '0.0.1');

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
  `struktura_kods` varchar(5) NOT NULL default ' ',
  `struktura` varchar(50) NOT NULL default ' ',
  `aktivs` int(1) NOT NULL default '0',
  PRIMARY KEY  (`agenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';

--
-- Dumping data for table `kl_agenti`
--

INSERT INTO `kl_agenti` (`agenta_id`, `agents`, `username`, `pasword`, `tiesibas`, `loma`, `epasts`, `struktura_kods`, `struktura`, `aktivs`) VALUES
('AC', 'Andrejs Cvetkovs', 'Andrejs', '123', ' A', 'A', '', ' ', ' ', 0),
('AO', 'Arvis Ozoliņš', 'Arvis', '123', 'R', 'T', '', ' ', ' ', 0),
('IAU', 'Iveta Audzēviča', 'Iveta', '123', 'L', 'T', '', ' ', ' ', 0),
('IZ', 'Ivars Zandersons', 'Ivars', '123', 'A', 'A', '', ' ', ' ', 0),
('JP', 'Janīna Pozņaka', 'Jana', '123', 'L', 'Q', '', ' ', ' ', 0),
('NR', 'Normunds Rudmanis', 'Normunds', '123', ' A', 'A', '', ' ', ' ', 0),
('RK', 'Roberts Kurma', 'Roberts', '123', 'A', 'A', '', ' ', ' ', 0),
('RKL', 'Romāns Kļučics', 'Romāns', '123', 'A', 'A', '', ' ', ' ', 0),
('SST', 'Sentis Strods', 'Sentis', '123', 'A', 'A', '', ' ', ' ', 0),
('TO', 'Tālivaldis Olekšs', 'Tālis', 'ristzemu', 'AS', 'S', 'talivaldis.olekss@tenaxgrupa.lv', ' ', ' ', 0),
('ULL', 'Uldis Liepa-Liepiņš', 'Uldis', '123', 'A', 'A', '', ' ', ' ', 0),
('VL', 'Valērijs Lementujevs', 'Valerijs', '123', 'R', 'T', '', ' ', ' ', 0);

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
(10, 'KM pretenzijas', 'pret_list.php', '', 'KM paneļu pretenzijas', 33, 'KM');

-- --------------------------------------------------------

--
-- Table structure for table `notikumi`
--

CREATE TABLE IF NOT EXISTS `notikumi` (
  `ID` int(11) NOT NULL auto_increment,
  `id_pret` int(11) default NULL,
  `pret_id` varchar(7) character set latin1 default NULL,
  `pasut_nr` varchar(10) character set latin1 default NULL,
  `event_id` varchar(10) character set latin1 default NULL,
  `event_npk` int(11) default NULL,
  `persona` varchar(45) default NULL,
  `uzdevums` varchar(200) default NULL,
  `reg_time` datetime default NULL,
  `termins` date default NULL,
  `lemums` varchar(45) default NULL,
  `izdevumi` decimal(10,0) default NULL,
  `pedejais` tinyint(1) NOT NULL,
  `izpildes_dat` date default NULL,
  `apraksts` text,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Notikumi pec pretenzijas' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `notikumi`
--

INSERT INTO `notikumi` (`ID`, `id_pret`, `pret_id`, `pasut_nr`, `event_id`, `event_npk`, `persona`, `uzdevums`, `reg_time`, `termins`, `lemums`, `izdevumi`, `pedejais`, `izpildes_dat`, `apraksts`) VALUES
(21, 54, 'SP-13', '', 'SP-13-2', 2, 'Arvis Ozoliņš', '', '2017-01-29 00:00:00', '2017-03-25', '', 0, 0, '2017-03-25', ''),
(20, 54, 'SP-13', '', 'SP-13-1', 1, 'Valērijs Lementujevs', '', '2017-01-29 00:00:00', '0000-00-00', '', 0, 0, '0000-00-00', ''),
(19, 54, 'SP-13', '', 'SP-13-0', 0, 'Iveta Audzēviča', '', '2017-01-29 00:00:00', '2017-02-03', '', 0, 0, '0000-00-00', ''),
(18, 53, 'EP-6', '548793', 'EP-6-0', 0, 'Arvis Ozoliņš', 'Salabot', '2017-01-29 00:00:00', '0000-00-00', '', 0, 0, '0000-00-00', ''),
(17, 52, 'SP-12', '212123', 'SP-12-0', 0, 'Valērijs Lementujevs', 'Celtniecības darbi', '2017-01-29 00:00:00', '2017-01-31', '', 0, 0, '0000-00-00', ''),
(22, 54, 'SP-13', '', 'SP-13-0', 0, 'Valērijs Lementujevs', 'Pārkrāsot', '2017-01-29 00:00:00', '2017-04-30', '', 0, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pretenzijas`
--

CREATE TABLE IF NOT EXISTS `pretenzijas` (
  `ID` int(11) NOT NULL auto_increment,
  `reg_nr` varchar(11) NOT NULL,
  `veids` varchar(10) NOT NULL,
  `dokumenta_datums` date default NULL,
  `sanemsanas_datums` date default NULL,
  `registr_datums` date default NULL,
  `konstat_datums` date default NULL,
  `pret_id` varchar(7) NOT NULL default ' ',
  `iesniedzejs` varchar(100) NOT NULL,
  `agents` varchar(70) NOT NULL,
  `produkcija` varchar(100) NOT NULL,
  `pasutijuma_nr` varchar(10) NOT NULL,
  `daudzums_viss` tinyint(1) NOT NULL,
  `daudzums_pieg_part` tinyint(1) NOT NULL,
  `pieg_part_nr` varchar(11) NOT NULL,
  `daudzums_atsev_paneli` tinyint(1) NOT NULL,
  `daudzums_kvmet` int(11) default '0',
  `daudzums_kubmet` int(11) default '0',
  `no_partijas` varchar(15) NOT NULL,
  `par_laiks` tinyint(1) default '0',
  `par_daudzumu` tinyint(1) default '0',
  `par_bojats` tinyint(1) default '0',
  `par_kvalitati` tinyint(1) default '0',
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
  `obl_dok_crm` tinyint(1) default '0',
  `obl_dok_akts` tinyint(1) default '0',
  `apraksts` text NOT NULL,
  `file_foto` varchar(150) NOT NULL default ' ',
  `file_pas` varchar(150) NOT NULL default ' ',
  `file_apr` varchar(150) NOT NULL default ' ',
  `status` varchar(10) NOT NULL default 'NEW',
  `notikumu_sk` int(11) default NULL,
  `atbildigais` varchar(30) default '',
  `budzets` int(11) default '0',
  `uzd_izpilda` varchar(45) NOT NULL default ' ',
  `akt_uzdevums` varchar(100) default NULL,
  `uzd_termins` date default NULL,
  `sakuma_datums` date default NULL,
  `nosutits_admin` tinyint(1) default '0',
  `nosutits_razosana` tinyint(1) default '0',
  `nosutits_logistika` varchar(45) default NULL,
  `nosutits_tehniki` varchar(45) default NULL,
  `atbildes_datums` date default NULL,
  `saskanots_ar_klientu` date default NULL,
  `vienosanas` text,
  `beigu_dat` date default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs' AUTO_INCREMENT=95 ;

--
-- Dumping data for table `pretenzijas`
--

INSERT INTO `pretenzijas` (`ID`, `reg_nr`, `veids`, `dokumenta_datums`, `sanemsanas_datums`, `registr_datums`, `konstat_datums`, `pret_id`, `iesniedzejs`, `agents`, `produkcija`, `pasutijuma_nr`, `daudzums_viss`, `daudzums_pieg_part`, `pieg_part_nr`, `daudzums_atsev_paneli`, `daudzums_kvmet`, `daudzums_kubmet`, `no_partijas`, `par_laiks`, `par_daudzumu`, `par_bojats`, `par_kvalitati`, `par_izkr_trans`, `par_izkr_iepak`, `par_izkr_izpak`, `par_piemont_jaun`, `par_piemont_ekspl`, `noform_pardev`, `noform_e_pasts`, `noform_oficial`, `iesniegts_nav`, `iesniegts_panel_foto`, `iesniegts_mark_foto`, `obl_dok_crm`, `obl_dok_akts`, `apraksts`, `file_foto`, `file_pas`, `file_apr`, `status`, `notikumu_sk`, `atbildigais`, `budzets`, `uzd_izpilda`, `akt_uzdevums`, `uzd_termins`, `sakuma_datums`, `nosutits_admin`, `nosutits_razosana`, `nosutits_logistika`, `nosutits_tehniki`, `atbildes_datums`, `saskanots_ar_klientu`, `vienosanas`, `beigu_dat`) VALUES
(92, '31', 'KM', '2017-02-16', '2017-02-08', '0000-00-00', NULL, 'KM-31', 'Kurši', 'Andrejs', '', '3456', 1, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '		    			    			    										', '', '', '', 'REGISTER', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, 0, '0', '0', '0000-00-00', '0000-00-00', '', '0000-00-00'),
(93, '32', 'KM', '2017-02-08', '0000-00-00', '0000-00-00', NULL, 'KM-32', '', '', '', '', 1, 0, '', 1, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '		    			    							', '', '', '', 'REGISTER', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, 0, '0', '0', '0000-00-00', '0000-00-00', '', '0000-00-00'),
(94, '33', 'KM', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 'KM-33', '', '', '', '', 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '		    				;l;m;lm;lm,;'','';\r\nljl;kjmjl;km\r\npojpjkpokpok[k[plkl\r\nkpokp[k[k[pkl[]pl[p', '', '', '', 'NEW', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, 0, '0', '0', '0000-00-00', '0000-00-00', '', '0000-00-00');

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

