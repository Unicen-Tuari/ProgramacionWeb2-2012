-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2012 a las 20:11:39
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `artedigital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `Email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `email`) VALUES
(1, 'jyfhg', 'ghfhjg', 'evelinamichela@hotmail.com'),
(2, 'asdas', 'asds', 'carloscabecea10@hotmail.com'),
(3, 'asdas', 'asdasd', 'nachomartineztandil@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idconsulta`),
  UNIQUE KEY `idcliente` (`idcliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `descripcion`, `idcliente`) VALUES
(1, 'asdsdasd', 1),
(2, '22', 2),
(3, 'asdsad', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion`
--

CREATE TABLE IF NOT EXISTS `exposicion` (
  `idexposicion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Comentarios` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idexposicion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `exposicion`
--

INSERT INTO `exposicion` (`idexposicion`, `titulo`, `Comentarios`) VALUES
(2, 'Casa de te 2010', 'Fotos sacadas en la Casa de te, cerca del calvario en el año 2010'),
(18, 'Bellas Artes', 'Una experiencia unica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `path` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `descripcion`, `path`, `titulo`) VALUES
(20, 'alksjdalsdj', 'foto7.jpg', 'hola123'),
(2, 'Las creaciones nacen de fotografias o dibujos, pasan por edicion digital y en algunos casos las finalizo con intervenciones, en detalle de pintura. El proceso creativo, es lo que llamo Arte- Aventura. Conozco asi, su comienzo pero el final del trabajo es siempre un misterio. Desde la imagen de una textura, un trazo geometrico o una luz, inicio una bùsqueda, una exploracion, jugando con la edicion digital, ensayo-error y acierto hasta que encuentro un resultado estèticamente agradable.', 'foto2.jpg', 'foto2'),
(3, 'Las credddddaciones nacen de fotografias o dibujos, pasan por edicion digital y en algunos casos las finalizo con intervenciones, en detalle de pintura. El proceso creativo, es lo que llamo Arte- Aventura. Conozco asi, su comienzo pero el final del trabajo es siempre un misterio. Desde la imagen de una textura, un trazo geometrico o una luz, inicio una bùsqueda, una exploracion, jugando con la edicion digital, ensayo-error y acierto hasta que encuentro un resultado estèticamente agradable.', 'foto1.jpg', 'foto3'),
(4, 'Las creaciones nacen de fotografias o dibujos, pasan por edicion digital y en algunos casos las finalizo con intervenciones, en detalle de pintura. El proceso creativo, es lo que llamo Arte- Aventura. Conozco asi, su comienzo pero el final del trabajo es siempre un misterio. Desde la imagen de una textura, un trazo geometrico o una luz, inicio una bùsqueda, una exploracion, jugando con la edicion digital, ensayo-error y acierto hasta que encuentro un resultado estèticamente agradable.', 'foto4.jpg', 'foto4'),
(7, 'Las creaciones nacen de fotografias o dibujos, pasan por edicion digital y en algunos casos las finalizo con intervenciones, en detalle de pintura. El proceso creativo, es lo que llamo Arte- Aventura. Conozco asi, su comienzo pero el final del trabajo es siempre un misterio. Desde la imagen de una textura, un trazo geometrico o una luz, inicio una bùsqueda, una exploracion, jugando con la edicion digital, ensayo-error y acierto hasta que encuentro un resultado estèticamente agradable.', 'foto5.jpg', 'foto5'),
(24, 'asd', 'foto8.jpg', '234'),
(25, '5667', 'foto11.jpg', '345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `password`, `id`) VALUES
('evelina', '123', 1),
('evelina', '123', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
