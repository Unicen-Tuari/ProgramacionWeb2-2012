-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2012 a las 18:30:10
-- Versión del servidor: 5.5.28
-- Versión de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tupar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `rubro` int(5) NOT NULL DEFAULT '1',
  `precio_venta` decimal(11,2) NOT NULL,
  `imagen_path` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `pk_articulo` (`id`),
  UNIQUE KEY `articulo_unq_nombre` (`nombre`),
  KEY `fk_rubro_articulo` (`rubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=642 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `localidad` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `motivo` smallint(6) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_respuesta` timestamp NULL DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '0',
  `comentario` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `pk_consulta` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE IF NOT EXISTS `rubro` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `pk_rubro` (`id`),
  UNIQUE KEY `rubro_unq_nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `apellido` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `password` varchar(64) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `unq_usuario` (`apellido`,`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vproducto`
--
CREATE TABLE IF NOT EXISTS `vproducto` (
`id_rubro` int(5)
,`nombre_rubro` varchar(80)
,`id_articulo` int(11)
,`nombre_articulo` varchar(80)
,`precio_venta` decimal(11,2)
,`imagen_path` varchar(100)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vproducto`
--
DROP TABLE IF EXISTS `vproducto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproducto` AS select `r`.`id` AS `id_rubro`,`r`.`nombre` AS `nombre_rubro`,`a`.`id` AS `id_articulo`,`a`.`nombre` AS `nombre_articulo`,`a`.`precio_venta` AS `precio_venta`,`a`.`imagen_path` AS `imagen_path` from (`articulo` `a` left join `rubro` `r` on((`a`.`rubro` = `r`.`id`)));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_rubro_articulo` FOREIGN KEY (`rubro`) REFERENCES `rubro` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
