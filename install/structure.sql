-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2016 at 12:44 PM
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
  `ped_reg_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='dati';

-- --------------------------------------------------------

--
-- Table structure for table `kl_agenti`
--

CREATE TABLE IF NOT EXISTS `kl_agenti` (
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(70) NOT NULL,
  PRIMARY KEY  (`agenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';

-- --------------------------------------------------------

--
-- Table structure for table `pretenzijas`
--

CREATE TABLE IF NOT EXISTS `pretenzijas` (
  `reg_nr` varchar(10) NOT NULL,
  `dokumenta_datums` date NOT NULL,
  `sanemsanas_datums` date NOT NULL,
  `registr_datums` date default NULL,
  `konstat_datums` date NOT NULL,
  `iesniedzejs` varchar(100) NOT NULL,
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(70) NOT NULL,
  `produkcija` varchar(100) NOT NULL,
  `pasutijuma_nr` varchar(10) NOT NULL,
  `daudzums_viss` tinyint(1) NOT NULL,
  `daudzums_pieg_part` tinyint(1) NOT NULL,
  `pieg_part_nr` int(11) NOT NULL,
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
  `piev_atteli` varchar(150) NOT NULL,
  `piev_dok` varchar(150) NOT NULL,
  PRIMARY KEY  (`reg_nr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';
