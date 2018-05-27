-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2016 at 01:57 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `instrumenti`
--

-- --------------------------------------------------------

--
-- Table structure for table `instrumenti`
--

CREATE TABLE IF NOT EXISTS `instrumenti` (
  `inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `proizvodjac` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cijena` int(11) NOT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `instrumenti`
--

INSERT INTO `instrumenti` (`inst_id`, `naziv`, `proizvodjac`, `cijena`) VALUES
(1, 'Bubanj', 'Yamaha', 0),
(2, 'Gitara', 'Fender', 0),
(3, 'Bas gitara', 'Cort', 0),
(4, 'Doboš', 'Sonor', 0),
(5, 'Bubanj', 'DW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `korisnik_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `username`, `password`, `ime`, `prezime`, `mail`, `admin`) VALUES
(1, 'armin', 'armin', 'Armin', 'Alagić', 'armin@gmail.com', 0),
(2, 'admin', 'admin', 'Admin', 'Admin', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE IF NOT EXISTS `narudzba` (
  `narudzba_id` int(11) NOT NULL AUTO_INCREMENT,
  `artikal` int(11) NOT NULL,
  `br_komada` int(11) NOT NULL,
  `adresa` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`narudzba_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`narudzba_id`, `artikal`, `br_komada`, `adresa`) VALUES
(3, 1, 5, 'Plandišće 6'),
(4, 3, 4, 'Ceravačka brda 14'),
(5, 5, 1, 'Cazinska 15');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

CREATE TABLE IF NOT EXISTS `proizvodjaci` (
  `proizvodjac_id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`proizvodjac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `proizvodjaci`
--

INSERT INTO `proizvodjaci` (`proizvodjac_id`, `naziv`) VALUES
(1, 'Yamaha'),
(2, 'Sonor'),
(3, 'Cort'),
(4, 'Fender'),
(5, 'Gibson'),
(6, 'DW');
