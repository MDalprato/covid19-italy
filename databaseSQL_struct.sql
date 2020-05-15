-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_name`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dpc-covid19-ita-andamento-nazionale`
--

CREATE TABLE IF NOT EXISTS `dpc-covid19-ita-andamento-nazionale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `stato` varchar(50) NOT NULL,
  `ricoverati_con_sintomi` int(11) NOT NULL,
  `terapia_intensiva` int(11) NOT NULL,
  `totale_ospedalizzati` int(11) NOT NULL,
  `isolamento_domiciliare` int(11) NOT NULL,
  `totale_positivi` int(11) NOT NULL,
  `variazione_totale_positivi` int(10) NOT NULL,
  `nuovi_positivi` int(11) NOT NULL,
  `dimessi_guariti` int(11) NOT NULL,
  `deceduti` int(11) NOT NULL,
  `totale_casi` int(11) NOT NULL,
  `tamponi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `dpc-covid19-ita-andamento-nazionale-statistiche`
--

CREATE TABLE IF NOT EXISTS `dpc-covid19-ita-andamento-nazionale-statistiche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `indx_grow_ricoverati_con_sintomi` decimal(10,0) NOT NULL,
  `indx_grow_terapia_intensiva` decimal(10,0) NOT NULL,
  `indx_grow_totale_ospedalizzati` decimal(10,0) NOT NULL,
  `indx_grow_isolamento_domiciliare` decimal(10,0) NOT NULL,
  `indx_grow_totale_attualmente_positivi` decimal(10,0) NOT NULL,
  `indx_grow_nuovi_attualmente_positivi` decimal(10,0) NOT NULL,
  `indx_grow_dimessi_guariti` decimal(10,0) NOT NULL,
  `indx_grow_deceduti` decimal(10,0) NOT NULL,
  `indx_grow_totale_casi` decimal(10,0) NOT NULL,
  `indx_grow_tamponi` decimal(10,0) NOT NULL,
  `stat_ricoverati_con_sintomi` int(11) NOT NULL,
  `stat_terapia_intensiva` int(11) NOT NULL,
  `stat_totale_ospedalizzati` int(11) NOT NULL,
  `stat_isolamento_domiciliare` int(11) NOT NULL,
  `stat_totale_attualmente_positivi` int(11) NOT NULL,
  `stat_nuovi_attualmente_positivi` int(11) NOT NULL,
  `stat_dimessi_guariti` int(11) NOT NULL,
  `stat_deceduti` int(11) NOT NULL,
  `stat_totale_casi` int(11) NOT NULL,
  `stat_tamponi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `dpc-covid19-ita-province`
--

CREATE TABLE IF NOT EXISTS `dpc-covid19-ita-province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `stato` varchar(50) NOT NULL,
  `codice_regione` int(11) NOT NULL,
  `denominazione_regione` varchar(50) NOT NULL,
  `codice_provincia` int(11) NOT NULL,
  `denominazione_provincia` varchar(50) NOT NULL,
  `sigla_provincia` varchar(50) NOT NULL,
  `lat` decimal(10,0) NOT NULL,
  `longit` decimal(10,0) NOT NULL,
  `totale_casi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10369 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `dpc-covid19-ita-regioni`
--

CREATE TABLE IF NOT EXISTS `dpc-covid19-ita-regioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `stato` varchar(50) NOT NULL,
  `codice_regione` int(11) NOT NULL,
  `denominazione_regione` varchar(50) NOT NULL,
  `lat` decimal(10,0) NOT NULL,
  `longit` decimal(10,0) NOT NULL,
  `ricoverati_con_sintomi` int(11) NOT NULL,
  `terapia_intensiva` int(11) NOT NULL,
  `totale_ospedalizzati` int(11) NOT NULL,
  `isolamento_domiciliare` int(11) NOT NULL,
  `totale_positivi` int(11) NOT NULL,
  `variazione_totale_positivi` int(10) NOT NULL,
  `nuovi_positivi` int(11) NOT NULL,
  `dimessi_guariti` int(11) NOT NULL,
  `deceduti` int(11) NOT NULL,
  `totale_casi` int(11) NOT NULL,
  `tamponi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1702 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `dpc-covid19-updates`
--

CREATE TABLE IF NOT EXISTS `dpc-covid19-updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dpc-covid19-ita-update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1149 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `string` varchar(5000) NOT NULL,
  `timestamp` datetime NOT NULL,
  `ip_src` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2524 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
