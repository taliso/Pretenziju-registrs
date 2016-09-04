-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2016 at 05:38 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_pretenzijas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dati`
--

DROP TABLE IF EXISTS `dati`;
CREATE TABLE `dati` (
  `ped_reg_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='dati';

-- --------------------------------------------------------

--
-- Table structure for table `kl_agenti`
--

DROP TABLE IF EXISTS `kl_agenti`;
CREATE TABLE `kl_agenti` (
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';

-- --------------------------------------------------------

--
-- Table structure for table `pretenzijas`
--

DROP TABLE IF EXISTS `pretenzijas`;
CREATE TABLE `pretenzijas` (
  `reg_nr` varchar(10) NOT NULL,
  `dokumenta_datums` date NOT NULL,
  `sanemsanas_datums` date NOT NULL,
  `registr_datums` date DEFAULT NULL,
  `konstat_datums` date NOT NULL,
  `iesniedzejs` varchar(100) NOT NULL,
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(70) NOT NULL,
  `produkcija` varchar(100) NOT NULL,
  `pasutijuma_nr` varchar(10) NOT NULL,
  `daudzums_viss` tinyint(1) NOT NULL,
  `daudzums_pieg_part` tinyint(1) NOT NULL,
  `pieg_part_nr` varchar(11) NOT NULL,
  `daudzums_atsev_paneli` tinyint(1) NOT NULL,
  `daudzums_kvmet` int(11) NOT NULL DEFAULT '0',
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
  `file_foto` varchar(150) DEFAULT NULL,
  `file_pas` varchar(150) DEFAULT NULL,
  `file_apr` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kl_agenti`
--
ALTER TABLE `kl_agenti`
  ADD PRIMARY KEY (`agenta_id`);

--
-- Indexes for table `pretenzijas`
--
ALTER TABLE `pretenzijas`
  ADD PRIMARY KEY (`reg_nr`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
