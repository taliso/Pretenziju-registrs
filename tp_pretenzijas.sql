-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 08:33 PM
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

CREATE TABLE `dati` (
  `ped_reg_nr` int(11) NOT NULL,
  `sodiena` datetime DEFAULT NULL,
  `versija` varchar(5) NOT NULL DEFAULT '0.0.1'
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

CREATE TABLE `kl_agenti` (
  `agenta_id` varchar(5) NOT NULL,
  `agents` varchar(70) NOT NULL,
  `username` varchar(15) NOT NULL DEFAULT ' ',
  `pasword` varchar(15) NOT NULL,
  `tiesibas` varchar(5) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='P''ardo''sanas a''gentu saraksts';

--
-- Dumping data for table `kl_agenti`
--

INSERT INTO `kl_agenti` (`agenta_id`, `agents`, `username`, `pasword`, `tiesibas`) VALUES
('a', 'aaa', 'aaa', '123', ' '),
('b', 'bbb', ' bbb', 'bbb', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `menju`
--

CREATE TABLE `menju` (
  `npk` int(11) NOT NULL,
  `teksts` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `forma` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `klase` varchar(20) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `reg_nr` int(11) NOT NULL,
  `prefiks` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menju`
--

INSERT INTO `menju` (`npk`, `teksts`, `forma`, `klase`, `title`, `reg_nr`, `prefiks`) VALUES
(1, 'Aģentu saraksts', 'admin.php', '', 'Aģentu reģistrs', 0, ''),
(2, 'SP pretenzijas', 'veidlapa_SP.php', '', 'Sendvičpaneļu pretenziju reģistrs', 1, 'SP'),
(6, 'Dekoru pretenzijas', 'veidlapa_DEKO.php', '', 'Dekoru pretenziju reģistrs', 1, 'DEK'),
(3, 'EPS pretenzijas', 'veidlapa_EPS.php', '', 'EPS pretenziju reģistrs', 1, 'EPS'),
(7, 'DP pretenzija', 'veidlapa_DP.php', '', 'Dobeles Paneļa pretenzija', 1, 'DP'),
(8, 'PU pretenzija', 'veidlapa_PU.php', '', 'PU paneļu pretenzija', 1, 'PU');

-- --------------------------------------------------------

--
-- Table structure for table `pretenzijas`
--

CREATE TABLE `pretenzijas` (
  `reg_nr` varchar(11) DEFAULT NULL,
  `dokumenta_datums` date NOT NULL,
  `sanemsanas_datums` date NOT NULL,
  `registr_datums` date DEFAULT NULL,
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
  `file_apr` varchar(150) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pretenziju registrs';

--
-- Dumping data for table `pretenzijas`
--

INSERT INTO `pretenzijas` (`reg_nr`, `dokumenta_datums`, `sanemsanas_datums`, `registr_datums`, `konstat_datums`, `iesniedzejs`, `agents`, `produkcija`, `pasutijuma_nr`, `daudzums_viss`, `daudzums_pieg_part`, `pieg_part_nr`, `daudzums_atsev_paneli`, `daudzums_kvmet`, `no_partijas`, `par_laiks`, `par_izkr_trans`, `par_izkr_iepak`, `par_izkr_izpak`, `par_piemont_jaun`, `par_piemont_ekspl`, `noform_pardev`, `noform_e_pasts`, `noform_oficial`, `iesniegts_nav`, `iesniegts_panel_foto`, `iesniegts_mark_foto`, `apraksts`, `file_foto`, `file_pas`, `file_apr`) VALUES
('1', '2016-11-09', '2016-11-09', NULL, '2016-11-09', '', 'a : aaa', '', '', 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ' ', ' ', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kl_agenti`
--
ALTER TABLE `kl_agenti`
  ADD PRIMARY KEY (`agenta_id`);

--
-- Indexes for table `menju`
--
ALTER TABLE `menju`
  ADD PRIMARY KEY (`npk`),
  ADD KEY `npk` (`npk`),
  ADD KEY `npk_2` (`npk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
