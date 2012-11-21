-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-11-2012 a las 21:53:38
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dgm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clieconsulta`
--

CREATE TABLE IF NOT EXISTS `clieconsulta` (
  `nroconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusu` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(15) NOT NULL,
  `motivo` varchar(10) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`nroconsulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `clieconsulta`
--

INSERT INTO `clieconsulta` (`nroconsulta`, `nombreusu`, `email`, `telefono`, `motivo`, `comentario`) VALUES
(2, 'juan peres', 'juanperes@hotmail.com', 12345678, 'sugerencia', 'no funciona!'),
(3, 'juan peres', 'juanperes@hotmail.com', 12345678, 'sugerencia', 'no funciona!'),
(4, 'juan peres', 'juanperes@hotmail.com', 12345678, 'sugerencia', 'no funciona!'),
(5, 'juan peres', 'juanperes@hotmail.com', 12345678, 'reclamo', 'NO ANDAAAAAAAAAAA!!!!'),
(7, 'juan peres', 'juanperes@hotmail.com', 12345678, 'otros', 'zzzzzzzzzzzzz'),
(8, 'juan peres', 'juanperes@hotmail.com', 134235654, 'sugerencia', 'no funciono bien la recarga!'),
(9, 'arnaldoo', 'arnaldoa@hotmail.com', 12345678, '1', 'ANDA CON DATA OBJECT!!!! WIIIIIIIIII :D'),
(10, 'juan peres', 'juanperes@hotmail.com', 345677654, '0', 'prueba con nacho!');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
