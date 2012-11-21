-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-11-2012 a las 20:40:50
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo`, `cat`) VALUES
(1, 'COMPUTADORAS'),
(2, 'CONSOLAS'),
(3, 'CELULARES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `con` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `caracteristicas` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigo_categoria` (`codigo_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `nombre_imagen`, `precio`, `cantidad`, `caracteristicas`, `fecha_ingreso`, `codigo_categoria`) VALUES
(1, 'HP ProBook 6565b', 'notebook.jpg', '$3500', 10, 'Procesador: AMD Quad-Core - Memoria RAM: 4 GB (actualizable hasta 16 GB) - HDD: SATA II (7200 rpm) 500 GB - Pantalla: 15.6" - Video: AMD Radeon HD 6520G GPU', '2012-05-14', 1),
(2, 'PlayStation 3', 'playstation.jpg', '$2500', 10, 'CPU: Cell Broadband Engine 3,2 GHz - GPU: NVIDIA/SCEI RSX 550 MHz - Memoria: XDR RAM 256 MB GDDR3 VRAM 256 MB - Soporte: Blu-ray Disc, DVD, CD - Almacenamiento: 320 GB - Controles: 1 DualShock 3 - Wifi - Salida HDMI', '2012-05-12', 2),
(3, 'BlackBerry Torch', 'blackberry.jpg', '$3000', 10, 'Dimensiones: 111mm x 62mm x 14.6mm - Peso: 161 gramos - Pantalla: TFT Touchscreen de 3.2 pulgadas - Teclado QWERTY - Trackpad optico - Sensor de proximidad - Tarjeta de memoria 4 GB incluida - Camara: 5 megapixeles - WiFi - Bluetooth', '2012-04-02', 3),
(4, 'iPhone 4', 'iphone.jpg', '$4000', 10, 'Capacidad: Memoria en flash USB de 8 GB - Dimensiones: 115.2mm x 58.6mm x 9.3 mm - Peso: 137 gramos - WiFi - Bluetooth - GPS - Sensores: Giroscopio de tres ejes, Acelerometro, Sensor de proximidad, Sensor de luz ambiental - Pantalla Multi-Touch de 3.5 pulgadas - Grabacion de videos HD (720p) - Camara de 5 megapixeles - Flash LED - Bateria de litio-ion recargable integrada - Auriculares', '2012-05-18', 3),
(5, 'Motorola Defy+', 'defyplus.jpg', '$900', 10, 'Dimensiones: 107mm x 59mm x 13.4mm - Peso: 118 gramos - Pantalla: TFT Touchscreen capacitivo de 3.7 pulgadas - Soporte Multi-touch - Sensores: Acelerometro, Sensor de proximidad, Sensor de luz ambiente - Memoria: 2 GB interna, tarjeta SD 8 GB incluida - Procesador: Cortex-A8 1GHz - Sistema Operativo: Android 2.3 Gingerbread - Camara: 5 megapixeles - Flash LED - WiFi - Bluetooth', '2012-04-06', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `usu`, `password`) VALUES
(1, 'test', 'test');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`codigo_categoria`) REFERENCES `categoria` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
