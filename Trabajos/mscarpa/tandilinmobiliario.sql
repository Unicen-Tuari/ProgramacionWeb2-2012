-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2012 a las 18:34:41
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tandilinmobiliario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(150) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `PROP_FK` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `PROP_FK` (`PROP_FK`),
  KEY `PROP_FK_2` (`PROP_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=257 ;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`ID`, `URL`, `Nombre`, `PROP_FK`) VALUES
(215, 'image/50ab9ae3ce3bb.jpg', '50ab9ae3ce3bb.jpg', 153),
(216, 'image/50ab9ae3e845e.jpg', '50ab9ae3e845e.jpg', 153),
(217, 'image/50ab9ae407fdd.jpg', '50ab9ae407fdd.jpg', 153),
(218, 'image/50ab9b813241b.jpg', '50ab9b813241b.jpg', 154),
(219, 'image/50ab9b8140974.jpg', '50ab9b8140974.jpg', 154),
(220, 'image/50ab9b814adf3.jpg', '50ab9b814adf3.jpg', 154),
(221, 'image/50ab9bdfbca5e.jpg', '50ab9bdfbca5e.jpg', 155),
(222, 'image/50ab9bdfd186f.jpg', '50ab9bdfd186f.jpg', 155),
(223, 'image/50ab9bdfe8307.jpg', '50ab9bdfe8307.jpg', 155),
(224, 'image/50ab9c1e2536f.jpg', '50ab9c1e2536f.jpg', 156),
(225, 'image/50ab9c1e328ae.jpg', '50ab9c1e328ae.jpg', 156),
(226, 'image/50ab9c1e3b671.jpg', '50ab9c1e3b671.jpg', 156),
(227, 'image/50ab9dc6ebec2.jpg', '50ab9dc6ebec2.jpg', 157),
(228, 'image/50ab9dc705298.jpg', '50ab9dc705298.jpg', 157),
(229, 'image/50ab9dc7132a0.jpg', '50ab9dc7132a0.jpg', 157),
(230, 'image/50ab9e278b9c1.jpg', '50ab9e278b9c1.jpg', 158),
(231, 'image/50ab9e279bc72.jpg', '50ab9e279bc72.jpg', 158),
(232, 'image/50ab9e27a90d0.jpg', '50ab9e27a90d0.jpg', 158),
(233, 'image/50ab9eac83f91.jpg', '50ab9eac83f91.jpg', 159),
(234, 'image/50ab9eac8e613.jpg', '50ab9eac8e613.jpg', 159),
(235, 'image/50ab9eac985e9.jpg', '50ab9eac985e9.jpg', 159),
(236, 'image/50ab9f9f81477.jpg', '50ab9f9f81477.jpg', 160),
(237, 'image/50ab9f9f8e18a.jpg', '50ab9f9f8e18a.jpg', 160),
(238, 'image/50ab9f9f99ba0.jpg', '50ab9f9f99ba0.jpg', 160),
(239, 'image/50aba047da530.jpg', '50aba047da530.jpg', 161),
(240, 'image/50aba0480481b.jpg', '50aba0480481b.jpg', 161),
(241, 'image/50aba0482fec3.jpg', '50aba0482fec3.jpg', 161),
(242, 'image/50aba0820018a.jpg', '50aba0820018a.jpg', 162),
(243, 'image/50aba082121a0.jpg', '50aba082121a0.jpg', 162),
(244, 'image/50aba0821c49b.jpg', '50aba0821c49b.jpg', 162),
(245, 'image/50aba133c0e31.jpg', '50aba133c0e31.jpg', 163),
(246, 'image/50aba133cbc3e.jpg', '50aba133cbc3e.jpg', 163),
(247, 'image/50aba133d7512.jpg', '50aba133d7512.jpg', 163),
(248, 'image/50aba17887b1e.jpg', '50aba17887b1e.jpg', 164),
(249, 'image/50aba178a2c05.jpg', '50aba178a2c05.jpg', 164),
(250, 'image/50aba178b06d3.jpg', '50aba178b06d3.jpg', 164),
(251, 'image/50aba23aad2b3.jpg', '50aba23aad2b3.jpg', 165),
(252, 'image/50aba23abc473.jpg', '50aba23abc473.jpg', 165),
(253, 'image/50aba23ac69c3.jpg', '50aba23ac69c3.jpg', 165),
(254, 'image/50aba26f042bc.jpg', '50aba26f042bc.jpg', 166),
(255, 'image/50aba26f220b1.jpg', '50aba26f220b1.jpg', 166),
(256, 'image/50aba26f3c8ff.jpg', '50aba26f3c8ff.jpg', 166);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE IF NOT EXISTS `propiedad` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_FK` int(11) DEFAULT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Valor` int(11) NOT NULL,
  `TIPO_FK` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Usuario_FK` (`Usuario_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`ID`, `Usuario_FK`, `Titulo`, `Descripcion`, `Valor`, `TIPO_FK`) VALUES
(153, NULL, 'Casa en Florianópolis', 'Cod 112-MANSION 2 PISOS CON PISCINA FRENTE AL MAR-EN LA PLAYA JURERÉ INTERNACIONAL-FLORIANÓPOLIS-BRAZIL.Casa con 5 dormitorios siendo 5 suítes, 6 baños, cocina,garaje conespacio para 4 autos, dependencia de empleada,living, sala comedor,parrilla, 2 balcones, terraza, despensa, area externa,area de servicio,jardin,piscina ,adega,hidromasaje,escritorio,sala de Home Theater.VALOR: U$ 3.000.000,00 Dolares.Contacto:João BarbozaTELEFONO FIJO:(55)(48)3211-8966TELEFONO MOVIL:(55)(48)8471-8966SITE www.im', 3000000, 2),
(154, NULL, 'MANSION 2 PISOS CON PISCINA', 'Cod 026-MANSION 2 PISOS COM PISCINA EN LA PLAYA JURERE INTERNACIONAL-FLORIANOPOLIS-BRAZIL.Casa con 4 dormitorios siendo 4 suites, 7 baños, garaje para 4 autos,aire condicionado central, escritorio, dependencia de empleada, ascensor,gas central, hidromasaje, estufa, toilette,piscina,jardin, sala de Home Theater,living,sala de comer, sistema de alarma,cocina, area se servicio,área externa,parrilla.VALOR: U$ 3.750.000,00 Dolares.Contacto:João BarbozaTELEFONO FIJO:(55)(48)3211-8966TELEFONO MOVIL:(55', 2150000, 2),
(155, NULL, 'Increible Mansion -PLAYA', 'Cod 039-MANSION 2 PISOS-PLAYA JURERÉ INTERNACIONAL-FLORIANÓPOLIS-BRAZIL. Casa con 2 pisos, 4 dormitorios siendo 4 suites, 5 baños,living,sala comedor, sala de TV,sala de Home Theater, salon de fiesta con parrilla, piscina, mezanino, toilette, chimenea, pergolado,jardin,hidromasaje, armarios de cocina,area de servicio,gas central,cocina,garaje con espacio para 4 autos.VALOR: U$ 2.150.000,00 Dolares.Contacto:João BarbozaTELEFONO FIJO:(55)(48)3211-8966TELEFONO MOVIL:(55)(48)8471-8966SITE www.imovei', 1900000, 2),
(156, NULL, 'Casa Excelente ', 'La casa se encuentra en el country club san diego con 1600 mts2 de terreno y 260mts2 cubiertos. Esta distribuida en 2 plantas.\r\nTiene 3 cuartos muy amplios (1 en suite en la planta baja con hidromasaje y 2 en el primer piso).\r\nLa propiedad posee pileta de 12 x 5, yacuzzi, parrilla, galeria, lavadero, habitacion de servicio, living, comerdor y cocina abiertos. Mucha luminosidad.\r\nEstilo moderno, excelente estado. Recien pintada por fuera y por dentro.\r\nContactese con nosotros para visitarla al: 1', 550000, 2),
(157, NULL, 'Ruta 226 -Balcarce', 'VENTA A TRANQUERA CERRADA,TRACTORES VARIOS, SEMBRADORA,ETC.AUTOS MERCEDES BENZ,FORD,FIAT ETC.CASCO TOTALMENTE AMUEBLADO LISTO PARA IR A VIVIR,BAÑO EN SUITE,VAJILLAS MUY COMPLETO EN EXCELENTE ESTADO,ACEPTO EN PARTE DE PAGO PERMUTA EN EE.UU,URUGUAY.MEXICO ,ITALIA.CONSULTE VIA MAIL Y MUY GUSTOSAMENTE CONTESTAREMOS A SUS REQUERIMIENTOS.\r\n', 4400000, 4),
(158, NULL, 'Venta - Campo - Tandil', 'Vendo dos fincas Una esta enfrente de la otra, la separa solo una calle, como si fuera un callejon Una de 63 hectáreas y la otra de 34 hasLa de 63 has están todas cultivadas, solo 4 hectáreas que faltan nivelar. Derecho de riego superficial por el total. Derecho de agua subterráneas, pozo 80 mts profundidad, todo entubado y cementado caño 8¿, salida de 10¿, desde los 60 mts a los 80 mts con caño filtro. Electrobomba de 60HP de 6¿. Caudal aprox 300.000 lts/hora. Perforación para agua consumo y ri', 4000000, 4),
(159, NULL, 'Campo de 500 has - Azul', 'Campo de 500 has de las cuales 150 se encuentran desmontadas 40 has con plantación de alfalfa nueva, y 350 has de campo para desmontar. Derecho de riego definitivo para las 500 has.', 1500000, 4),
(160, NULL, 'Cochera-Vicente López', 'Actualmente desocupada, únicos gastos que tiene son: $30 de expensas (mensual), $22 (mensual) de Impuesto Municipal y $80 (anual) de Arba. Este último ya fue pagado en forma anual, si se hace un prorateo de este último, quedaría un total de $58 mensuales. La ganancia neta actual es de $270.- Se puede hacer la operacion en pesos. De interesarte, te pediría que te contactes conmigo ', 500000, 13),
(161, NULL, 'Mar del Tuyú- Chalet', 'La casa esta equipada con 1 Dormitorio con cama matrimonial de 2 plazas + 2 camas tipo cucheta\r\nCocina completa+Heladera Nueva con Freezer+Microondas.\r\nLiving comedor con mesa+4 sillas+sofa cama+TV con Cable.\r\nBaño con  Ducha y Bidet.\r\nGaleria con mesa cervecera+4 sillas\r\nJardin con entrada para 2 autos\r\nParrilla con Luz. \r\nAgua Corriente.\r\nLa casa tiene Rejas en todas las ventanas!\r\nHermosa casa rodeada de Pinos!!!', 400000, 3),
(162, NULL, 'Chalet- Claromeco', 'Chalet con Gran parque\r\nPileta\r\nDeck de madera\r\n3 habitaciones\r\nCapacidad para 8 personas\r\nA 1 cuadra del mar!!!', 600000, 3),
(163, NULL, 'Departamento- Necochea', 'El dpto es muy lindo y cómodo, totalmente equipado, a 7 cuadras del reloj Cu-cu y con una espectacular vista panorámica a todo el lago San Roque, la cuidad de Villa Carlos Paz y las Sierras de Córdoba. Cuenta con  ropa de cama, quincho, asadores, pileta y un gran parque con costa al Lago.', 150000, 5),
(164, NULL, 'Departamento- Mar del Plata', 'DEPARTAMENTOS PARA 3 , 4  Y  5 PERSONAS A 250 MTRS DEL MAR Y 4 CUADRAS DE LA PEATONAL, CON TV CABLE,VENTILADORES DE TECHO Y PATIO CON PARRILLA INDIVIDUALES.', 600000, 5),
(165, NULL, 'Increible Terreno!!', 'UNO DE LOS DOS MEJORES DEL BARRIO CERRADO LA MATA (EIDICO) EN TANDIL. SIN VECINOS POR EL CONTRAFRENTE (LADO NORTE) NI POR EL LADO ESTE. PASA EL ARROYO POR EL NORTE QUE ESTA AL PIE DE LA SIERRA. TIENE TODO EL RECORRIDO DEL SOL SIN OBSTACULOS Y LA VISTA PLENA A LA SIERRA.\r\nEL PRECIO ES LO PAGADO HASTA AHORA. RESTAN 23 CUOTAS Y UN ADELANTO, TODO EN PESOS. TOTAL U$S 87.000 AL VALOR OFICIAL \r\nCHARLAMOS EL VALOR DEL DOLAR', 300000, 10),
(166, NULL, 'Oportunidad Terreno ', 'DUEÑO VENDE EN TANDIL\r\n10 Terrenos con excelente vista a las Sierras\r\nexcelente inversión a corto plazo\r\nIdeal Inversores o gente particular que quiera vivir en una Ciudad muy tranquila y segura', 135000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`ID`, `Tipo`, `Descripcion`) VALUES
(2, 'Casa', ''),
(3, 'Chalet', ''),
(4, 'Campo', ''),
(5, 'Departamento', ''),
(10, 'Terreno', ''),
(13, 'Cochera', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `DNI` int(9) NOT NULL,
  `FechaNac` date NOT NULL,
  `Localidad` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Apellido`, `DNI`, `FechaNac`, `Localidad`, `Direccion`, `Usuario`, `Password`) VALUES
(13, 'Mauro', 'Scarpa', 34037738, '1988-06-09', 'Tandil', 'Callao 951', 'colo', 'colo'),
(89, 'rtyery', 'rty4', 5645654, '0000-00-00', '456456', '45645', '6456', '456456'),
(90, 'Roman', 'Riquelme', 21037738, '0000-00-00', 'Bs As', 'Libertador 1222', 'roman', 'roman');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
