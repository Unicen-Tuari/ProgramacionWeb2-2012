-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2012 at 05:58 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autos`
--

-- --------------------------------------------------------

--
-- Table structure for table `automoviles`
--

CREATE TABLE IF NOT EXISTS `automoviles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `automoviles`
--

INSERT INTO `automoviles` (`id`, `id_cat`, `modelo`, `precio`, `descripcion`) VALUES
(1, 1, 'fiat punto', 11111, 'excelente estado');

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mensaje` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`nombre`, `apellido`, `email`, `mensaje`) VALUES
('', '', '', 'coloooooooooooooooo!'),
('mati', 'cat', 'maticat', 'maticat'),
('asd', 'asd', 'asd', 'asd'),
('asd', 'asd', 'asd', 'asd'),
('asd', 'asd', 'asd', 'asd'),
('qwe', 'wqe', 'qwe', 'qwe'),
('asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_automoviles` int(11) NOT NULL,
  `ruta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id`, `id_automoviles`, `ruta`) VALUES
(2, 1, 'fiat-punto2.jpg'),
(3, 1111, 'fiat-punto.jpg'),
(4, 999, 'fiat-punto333.jpg'),
(5, 123, 'P1010009.JPG'),
(6, 0, 'P1010010.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marcas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id`, `marcas`) VALUES
(1, 'Fiat'),
(2, 'Peugeot'),
(3, 'Ford');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `password`) VALUES
(14, 'tomi', 'mito', 'miliatomas@gmail.com', '12345'),
(15, 'vanesa', 'vanesa', 'vanesa@gmail.com', '12345'),
(16, 'juano', 'martel', 'juano@gmail.com', '12345'),
(17, 'yerson', 'yerson', 'yerson@gmail.com', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
