-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2012 a las 01:52:27
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
CREATE DATABASE `sgt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sgt`;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `apellido`, `tipo_doc`, `num_doc`, `email`, `consulta`) VALUES
(7, 'Matias Hidalgo', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'fsafdasfasdasda ads asd asdda'),
(8, 'Matias', 'Hidalgo', 'DNI', 36608291, 'mmh_x_100pre@hotmail.com', 'A ver si funciona esto??\r\n\r\nasdasd\r\n\r\nmas asdasd'),
(9, 'Matias', 'Hidalgo', 'DNI', 36608291, 'mmh_x_100pre@hotmail.com', 'A ver si funciona esto??\r\n\r\nasdasd\r\n\r\nmas asdasd'),
(10, 'Matias', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'sadadasda\r\nadasd\r\nasdasd'),
(11, 'Matias', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'nueva version'),
(12, 'Matias', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'nueva version'),
(13, 'Matias', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'nueva version'),
(14, 'Matias', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'nueva version'),
(15, 'Matias', 'Hidalgo', 'DNI', 36608291, 'chuj4pr0@hotmail.com', 'nueva version'),
(16, 'Matias', 'Hidalgo', 'DNI', 77887788, 'chuj4pr0@hotmail.com', 'Hola! si usted recibio este mail significa que Matias Hidalgo logro hacer funcionar los Emails en su SGT(Sistema de Gestion de Talleres).\r\nSi usted es Ignacio Jonas, le comunicamos que Matias Hidalgo no asistira a su domicilio esta tarde.\r\nEsperamos que este mail se visualize correctamente. Caso contrario adviertanos respondiendo este email.\r\n\r\nSaludos!');

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `tipo`, `modelo`, `marca`, `nro_serie`, `adquiridoen`, `nrofactura`, `fechacompra`) VALUES
(4, 'tv', 'mod1', 'marca1', 222, 'Desconocido', 51651, '2012-12-04'),
(7, 'tv', 'test', 'test', 123321, 'Fravega', 123123, '2012-12-14');

--
-- Volcado de datos para la tabla `equipos_so`
--

INSERT INTO `equipos_so` (`id_equipo_so`, `id_equipo`, `id_serviceo`, `cod_id_so`, `fecha_pedido`, `fecha_respuesta`, `estado`) VALUES
(3, 7, 1, 5555, '2012-12-13', '0000-00-00', 'En Taller');

--
-- Volcado de datos para la tabla `imagenes_equipos`
--

INSERT INTO `imagenes_equipos` (`id_imagen`, `id_equipo`, `direccion_web`, `nombre`) VALUES
(12, 7, 'img/uploads/50c7d3bcbd21e.jpg', '50c7d3bcbd21e.jpg'),
(13, 7, 'img/uploads/50c7d3bce7fe7.jpg', '50c7d3bce7fe7.jpg');

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `noticia`, `fecha`) VALUES
(1, 'Hola Mundo! Aqui estamos para comenzar con nuestra tarea de cada dia!\r\nSolucionar sus problemas electronicos!', '2012-12-01'),
(2, 'Buen dia estimado Cliente!\r\nLe comunicamos que el dia 25/12 no brindaremos atencion al publico debido al pequeño pedalin que nos vamos a pegar el 24/12 a la media noche... esto se repite y se aplica tambien para el 1/1 del año que viene!', '2012-12-04');

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`nro_orden`, `id_usuario`, `id_equipo`, `descripcion`, `observaciones`, `fecha_ingreso`, `fecha_presupuesto`, `fecha_reparado`, `fecha_prometido`, `fecha_entrega`, `estado`) VALUES
(156, 3, 4, 'TV roto', 'Equipo dañado', '2012-12-02', '2012-12-14', '2012-12-19', '2012-12-25', '2012-12-31', 'Desaparecido?');

--
-- Volcado de datos para la tabla `service_oficial`
--

INSERT INTO `service_oficial` (`id_serviceo`, `nombre`, `sitio_web`, `tipodeorden`) VALUES
(1, 'Samsung', 'www.samsung.com.ar', 'GSPN'),
(2, 'Philips', 'www.philips.com.ar', 'RPP');

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cuenta`, `admin`, `contras`, `nombre`, `apellido`, `direccion`, `telefono`, `celular`, `ciudad`, `email`, `observaciones`) VALUES
(2, 'admin', 1, 'admin', 'Leonardo', 'Hidalgo', '4 de abril 107', NULL, NULL, 'Tandil', 'lrhmvm@hotmail.com', 'El dueñooo'),
(3, 'matias', 1, 'matias', 'Matias', 'Hidalgo', '4 de abril 107', NULL, NULL, 'Tandil', 'chuj4pr0@hotmail.com', 'un loco mas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
