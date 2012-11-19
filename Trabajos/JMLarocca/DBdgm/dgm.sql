-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2012 a las 22:33:47
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `dni` int(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` int(20) NOT NULL,
  `mail` varchar(60) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `mail` varchar(60) NOT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenestrabajo`
--

CREATE TABLE IF NOT EXISTS `ordenestrabajo` (
  `nro_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date NOT NULL,
  `id_producto` int(11) NOT NULL,
  `tarea` smallint(6) NOT NULL,
  `descripcion_tarea` varchar(100) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  PRIMARY KEY (`nro_orden`),
  KEY `fk_cliente_ordenestrabajo` (`id_cliente`),
  KEY `fk_producto_ordenestrabajo` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_ordenestrabajo`
--
CREATE TABLE IF NOT EXISTS `v_ordenestrabajo` (
`nro_orden` int(11)
,`id_cliente` int(11)
,`fecha_ingreso` date
,`fecha_egreso` date
,`id_producto` int(11)
,`tarea` smallint(6)
,`descripcion_tarea` varchar(100)
,`precio` decimal(11,2)
,`nombrecliente` varchar(20)
,`apellido` varchar(20)
,`dni` int(10)
,`direccion` varchar(30)
,`telefono` int(20)
,`mail` varchar(60)
,`nombreproducto` varchar(20)
,`marca` varchar(20)
,`modelo` varchar(30)
,`tipo` smallint(6)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `v_ordenestrabajo`
--
DROP TABLE IF EXISTS `v_ordenestrabajo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ordenestrabajo` AS select `o`.`nro_orden` AS `nro_orden`,`o`.`id_cliente` AS `id_cliente`,`o`.`fecha_ingreso` AS `fecha_ingreso`,`o`.`fecha_egreso` AS `fecha_egreso`,`o`.`id_producto` AS `id_producto`,`o`.`tarea` AS `tarea`,`o`.`descripcion_tarea` AS `descripcion_tarea`,`o`.`precio` AS `precio`,`c`.`nombre` AS `nombrecliente`,`c`.`apellido` AS `apellido`,`c`.`dni` AS `dni`,`c`.`direccion` AS `direccion`,`c`.`telefono` AS `telefono`,`c`.`mail` AS `mail`,`p`.`nombre` AS `nombreproducto`,`p`.`marca` AS `marca`,`p`.`modelo` AS `modelo`,`p`.`tipo` AS `tipo` from ((`ordenestrabajo` `o` left join `cliente` `c` on((`c`.`id_cliente` = `o`.`id_cliente`))) left join `productos` `p` on((`p`.`id_producto` = `o`.`id_producto`)));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `cliente` (`mail`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenestrabajo`
--
ALTER TABLE `ordenestrabajo`
  ADD CONSTRAINT `fk_cliente_ordenestrabajo` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_ordenestrabajo` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
