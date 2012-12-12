-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2012 a las 16:55:08
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sgt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_doc` varchar(3) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `consulta` text NOT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `apellido`, `tipo_doc`, `num_doc`, `email`, `consulta`) VALUES
(7, 'Matias Hidalgo', 'Hidalgo', 'DNI', 55555555, 'chuj4pr0@hotmail.com', 'fsafdasfasdasda ads asd asdda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `nro_serie` int(50) NOT NULL,
  `adquiridoen` varchar(30) NOT NULL DEFAULT 'Desconocido',
  `nrofactura` int(50) DEFAULT NULL,
  `fechacompra` date DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_repuestos`
--

CREATE TABLE IF NOT EXISTS `equipos_repuestos` (
  `id_compatible` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  PRIMARY KEY (`id_compatible`),
  KEY `id_equipo` (`id_equipo`,`id_repuesto`),
  KEY `id_equipo_2` (`id_equipo`,`id_repuesto`),
  KEY `id_repuesto` (`id_repuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_so`
--

CREATE TABLE IF NOT EXISTS `equipos_so` (
  `id_equipo_so` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `id_serviceo` int(11) NOT NULL,
  `cod_id_so` int(50) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id_equipo_so`),
  UNIQUE KEY `cod_id_so` (`cod_id_so`),
  KEY `id_equipo` (`id_equipo`,`id_serviceo`),
  KEY `id_serviceo` (`id_serviceo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_equipos`
--

CREATE TABLE IF NOT EXISTS `imagenes_equipos` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `direccion_web` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `id_equipo` (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `noticia` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `nro_orden` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_presupuesto` date NOT NULL,
  `fecha_reparado` date NOT NULL,
  `fecha_prometido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`nro_orden`),
  KEY `id_usuario` (`id_usuario`,`id_equipo`),
  KEY `id_equipo` (`id_equipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE IF NOT EXISTS `repuestos` (
  `id_repuesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `observaciones` text NOT NULL,
  PRIMARY KEY (`id_repuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_oficial`
--

CREATE TABLE IF NOT EXISTS `service_oficial` (
  `id_serviceo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `sitio_web` varchar(100) NOT NULL,
  `tipodeorden` varchar(15) NOT NULL,
  PRIMARY KEY (`id_serviceo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(16) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `contras` varchar(16) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` int(12) DEFAULT NULL,
  `celular` int(12) DEFAULT NULL,
  `ciudad` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `observaciones` text NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cuenta`, `admin`, `contras`, `nombre`, `apellido`, `direccion`, `telefono`, `celular`, `ciudad`, `email`, `observaciones`) VALUES
(2, 'admin', 1, 'admin', 'Matias', 'Hidalgo', '4 de abril', NULL, NULL, 'Tandil', 'chuj4pr0@hotmail.com', 'asdasdasd');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos_repuestos`
--
ALTER TABLE `equipos_repuestos`
  ADD CONSTRAINT `equipos_repuestos_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_repuestos_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuestos` (`id_repuesto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos_so`
--
ALTER TABLE `equipos_so`
  ADD CONSTRAINT `equipos_so_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_so_ibfk_2` FOREIGN KEY (`id_serviceo`) REFERENCES `service_oficial` (`id_serviceo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_equipos`
--
ALTER TABLE `imagenes_equipos`
  ADD CONSTRAINT `imagenes_equipos_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
