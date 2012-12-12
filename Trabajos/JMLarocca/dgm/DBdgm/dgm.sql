-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-12-2012 a las 20:12:24
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
  `email` varchar(60) NOT NULL,
  `motivo` varchar(10) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`nroconsulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `clieconsulta`
--

INSERT INTO `clieconsulta` (`nroconsulta`, `email`, `motivo`, `comentario`) VALUES
(21, 'juanperes@hotmail.com', '0', 'zdf'),
(22, 'arnaldoa@hotmail.com', '0', 'asfdfhg'),
(23, 'arnaldoa@hotmail.com', '0', 'asfdfhg'),
(24, 'arnaldoa@hotmail.com', '0', 'asdfg'),
(25, 'arnaldoa@hotmail.com', '0', 'ALBERTITO!'),
(26, 'juanperes@hotmail.com', '0', 'hola!'),
(27, 'juanperes@hotmail.com', '0', 'hola!'),
(28, 'juanperes@hotmail.com', '0', 'juen perez manda un mensaje!'),
(29, 'dgmadmin@gmail.com', '0', 'ROBERTOOOO!!!\r\n\r\nque rompiste? entre y no tengo producto del gaucho garmendi!');

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
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `mail`, `clave`) VALUES
(1, 'juan', 'perez', 30219345, 'rivadavia 800', 4454323, 'juanperes@hotmail.com', '1234'),
(2, 'jose', 'lopez', 35243245, 'peron 790', 4453245, 'joselopez@hotmail.com', ''),
(3, 'carlos', 'rodriguez', 33294567, 'san lorenzo 882', 4490549, 'carlosrodriguez@hotmail.com', ''),
(4, 'arnaldo', 'andre', 20546789, 'rodriguez 543', 430002, 'arnaldoa@hotmail.com', '1234'),
(10, 'Francesca', 'Franco', 31266209, 'Ap #353-1784 Sit Avenue', 1, 'Phasellus.fermentum@ridiculusmus.edu', ''),
(11, 'Kimberly', 'Sawyer', 35516085, '4653 Lectus. Street', 1, 'aliquam.iaculis.lacus@Vivamusnibh.org', ''),
(12, 'Karina', 'Bender', 32013241, '437-840 Quam, Rd.', 1, 'auctor.odio.a@disparturientmontes.ca', ''),
(13, 'Gavin', 'Hardin', 29365618, '2551 Quisque Street', 1, 'elit.a.feugiat@erosnectellus.ca', ''),
(14, 'Alfreda', 'Griffith', 29282730, '2361 In St.', 1, 'neque.sed@ipsumSuspendissenon.com', ''),
(15, 'Liberty', 'Peterson', 24475153, 'P.O. Box 856, 7359 Nunc Road', 1, 'egestas@amalesuada.com', ''),
(16, 'Palmer', 'Carey', 32883146, '297-8643 Donec Rd.', 1, 'augue@mattis.edu', ''),
(17, 'Mallory', 'Kent', 25268907, '8011 Venenatis Rd.', 1, 'sodales@ornare.org', ''),
(18, 'Shelly', 'Joyner', 35117986, '673-1882 Magna. Ave', 1, 'ac.feugiat.non@lectuspedeultrices.ca', ''),
(19, 'Yen', 'Oneal', 39475422, '3742 Dolor St.', 1, 'Nulla@tristiqueaceleifend.org', ''),
(20, 'Ira', 'Dale', 39070968, '4141 Suspendisse St.', 1, 'Etiam.imperdiet.dictum@sempercursus.edu', ''),
(21, 'Felix', 'Burt', 37062688, 'P.O. Box 598, 8115 Sit Road', 1, 'quam@Etiambibendum.org', ''),
(22, 'Galena', 'Harvey', 28511955, '916 Sed Avenue', 1, 'Aenean@mauris.org', ''),
(23, 'Rahim', 'Paul', 37554263, 'P.O. Box 938, 6559 Massa. Aven', 1, 'diam.dictum@euligulaAenean.com', ''),
(24, 'Emi', 'Nichols', 29926443, 'Ap #487-6774 Metus St.', 1, 'Nunc.quis.arcu@tincidunt.org', ''),
(25, 'Kelsie', 'Barker', 38696790, '3148 Donec St.', 1, 'lorem.ac@Sedeu.edu', ''),
(26, 'Cameron', 'Gallagher', 33571975, '317-472 Diam. St.', 1, 'a@molestieorcitincidunt.com', ''),
(27, 'Daryl', 'Booth', 22667166, 'Ap #253-5826 Quis, Road', 1, 'morbi.tristique.senectus@lacusUtnec.ca', ''),
(28, 'Walker', 'Robinson', 39852614, '3950 Nunc Rd.', 1, 'elit.sed@infelis.com', ''),
(29, 'James', 'Strong', 23552502, 'P.O. Box 193, 6589 Et, Rd.', 1, 'elit@miacmattis.org', ''),
(30, 'Yen', 'Hickman', 22738904, '733-5682 Id, St.', 1, 'sit@rhoncusNullam.com', ''),
(31, 'Caesar', 'Edwards', 26594210, '179-8715 Duis Street', 1, 'metus.vitae.velit@congue.edu', ''),
(32, 'Candace', 'Grant', 31825316, 'P.O. Box 841, 857 Aliquet Av.', 1, 'Etiam@magnaatortor.edu', ''),
(33, 'Abra', 'Callahan', 22991204, '758-314 Feugiat. Av.', 1, 'dolor.tempus@sed.edu', ''),
(34, 'Jameson', 'Watson', 26211822, 'P.O. Box 400, 7182 Nascetur Rd', 1, 'tincidunt.nunc.ac@Etiamlaoreetlibero.ca', ''),
(35, 'Perry', 'Villarreal', 35556907, 'P.O. Box 253, 7866 Ante. Rd.', 1, 'facilisis@enim.edu', ''),
(36, 'Myra', 'Huff', 39998746, '4621 Sit Road', 1, 'elit.a.feugiat@ultriciessemmagna.edu', ''),
(37, 'Clio', 'Buck', 25078041, 'Ap #547-186 Nunc Road', 1, 'consectetuer.adipiscing.elit@penatibuset.edu', ''),
(38, 'Jeremy', 'Hampton', 31039527, '184-2202 Non, St.', 1, 'sem@posuere.ca', ''),
(39, 'Jordan', 'Whitehead', 37380297, 'Ap #850-9646 Phasellus Avenue', 1, 'at@idmollis.edu', ''),
(40, 'Xyla', 'Spencer', 27413991, 'Ap #104-1579 Ac Street', 1, 'quis.pede@augueidante.com', ''),
(41, 'Genevieve', 'Hines', 23558427, 'Ap #633-3646 Tellus Street', 1, 'magna.Duis.dignissim@arcuCurabitur.org', ''),
(42, 'Galvin', 'Wilkerson', 38376554, 'Ap #925-3883 Scelerisque Avenu', 1, 'Vivamus.non.lorem@dolor.org', ''),
(43, 'Beau', 'Grant', 24495912, 'Ap #490-5621 Nisl Avenue', 1, 'sit@sodalesatvelit.org', ''),
(44, 'Murphy', 'Valenzuela', 20110673, 'P.O. Box 512, 7408 Dictum St.', 1, 'massa.Suspendisse.eleifend@Phasellusnulla.edu', ''),
(45, 'Chandler', 'West', 21905882, '7985 Nulla. Rd.', 1, 'dui@atliberoMorbi.edu', ''),
(46, 'Lareina', 'Conley', 35137805, 'P.O. Box 273, 8471 Turpis. Ave', 1, 'conubia@necorci.com', ''),
(47, 'Rashad', 'Mccullough', 20187712, '8388 Commodo St.', 1, 'dis.parturient.montes@euismodenimEtiam.ca', ''),
(48, 'Raphael', 'Carr', 23698328, '811-5760 Velit. Rd.', 1, 'taciti.sociosqu@ornareegestas.com', ''),
(49, 'Mikayla', 'David', 33214013, '916-7935 Dignissim. Av.', 1, 'eu@inmolestie.edu', ''),
(50, 'Nevada', 'Sexton', 25745552, 'Ap #520-4348 Enim St.', 1, 'sit@vitae.com', ''),
(51, 'Eleanor', 'Burch', 21730899, '127-5048 Nisi Road', 1, 'tincidunt.neque@accumsanlaoreetipsum.ca', ''),
(52, 'Emery', 'Holmes', 32745821, '3932 Faucibus Road', 1, 'nonummy.ut@sitamet.org', ''),
(53, 'Demetrius', 'Thomas', 26848528, 'Ap #619-2779 Dolor Road', 1, 'eu.tellus@Duismienim.ca', ''),
(54, 'Maxine', 'Pope', 23802895, '7251 Aenean Avenue', 1, 'Duis@nullaDonecnon.edu', ''),
(55, 'Wesley', 'Kim', 39201116, 'Ap #290-2151 Pellentesque Aven', 1, 'velit.dui@massa.ca', ''),
(56, 'Dorian', 'Norman', 27534296, 'P.O. Box 987, 7658 Volutpat. R', 1, 'at.velit@egestasurna.org', ''),
(57, 'Elaine', 'Silva', 22274973, 'P.O. Box 204, 1870 Est St.', 1, 'ullamcorper.magna.Sed@etultrices.org', ''),
(58, 'David', 'Whitehead', 21606091, 'Ap #260-422 Aliquet Street', 1, 'non.dapibus.rutrum@Crasdolordolor.com', ''),
(59, 'Bethany', 'Herrera', 32425751, '330-2058 Convallis Rd.', 1, 'inceptos.hymenaeos.Mauris@arcuimperdietullamcorper.ca', ''),
(60, 'Bertha', 'Ramos', 28269714, '713-6358 Arcu Street', 1, 'tristique@duiFusce.ca', ''),
(61, 'Ahmed', 'Murray', 27048815, 'P.O. Box 762, 8716 At Avenue', 1, 'magna.sed@sitamet.edu', ''),
(62, 'Isadora', 'Dyer', 21816301, 'Ap #550-4836 Sed Rd.', 1, 'tincidunt@iaculis.edu', ''),
(63, 'Morgan', 'Solomon', 23228346, '5456 Lacinia Street', 1, 'dui.Suspendisse@dapibusidblandit.org', ''),
(64, 'Yolanda', 'Irwin', 34037397, '7559 Ut Ave', 1, 'fringilla@nisiAeneaneget.org', ''),
(65, 'Vielka', 'Greene', 29343764, 'P.O. Box 629, 3132 Eu Av.', 1, 'dolor@purussapiengravida.edu', ''),
(66, 'Aurelia', 'Giles', 27401301, 'P.O. Box 533, 287 Eu Rd.', 1, 'nec.orci.Donec@Nullatemporaugue.org', ''),
(67, 'Patrick', 'Crawford', 25903393, '998-7794 Nec, Rd.', 1, 'malesuada@liberoduinec.org', ''),
(68, 'Maxwell', 'Long', 28238805, '605-2584 Erat. Rd.', 1, 'Vivamus@tristique.edu', ''),
(69, 'Allistair', 'Bray', 25178884, '3473 Nullam Street', 1, 'nec@posuerecubiliaCurae;.edu', ''),
(70, 'Sara', 'Tyson', 26615260, '521-8923 Pellentesque Street', 1, 'Donec@cursus.ca', ''),
(71, 'Stella', 'Gonzales', 30211950, '941-8047 Lobortis Rd.', 1, 'et.rutrum.non@mollis.com', ''),
(72, 'George', 'Fox', 31612929, '116 Magna. Rd.', 1, 'lobortis.quis.pede@telluslorem.com', ''),
(73, 'Isaac', 'Salas', 24459795, '9194 Nullam Ave', 1, 'rutrum@ornare.edu', ''),
(74, 'Jaime', 'Church', 37363151, '3837 Sed Avenue', 1, 'tellus@atrisus.com', ''),
(75, 'Kieran', 'Humphrey', 22667792, 'P.O. Box 216, 456 Sit Ave', 1, 'felis.orci@nuncest.ca', ''),
(76, 'Nadine', 'Mckee', 22349563, '8751 Vel, Road', 1, 'consectetuer.rhoncus.Nullam@Duissit.com', ''),
(77, 'Galvin', 'Washington', 27114713, '9125 Nunc Rd.', 1, 'semper.tellus.id@auctor.ca', ''),
(78, 'Hope', 'Fleming', 39792499, '260-4392 Auctor, St.', 1, 'cursus.diam@nec.edu', ''),
(79, 'Nehru', 'Hoover', 30255321, '4589 Sagittis St.', 1, 'ipsum.Suspendisse@ametnulla.org', ''),
(80, 'Erasmus', 'Hurley', 20912021, 'Ap #161-9260 Aliquam Avenue', 1, 'montes.nascetur@velitQuisque.edu', ''),
(81, 'Jesse', 'Rhodes', 24963992, 'Ap #778-1374 Ut Rd.', 1, 'consectetuer.adipiscing@elitAliquamauctor.edu', ''),
(82, 'Justin', 'Meyer', 29919824, '3387 Nonummy Street', 1, 'ornare.tortor@nisidictumaugue.ca', ''),
(83, 'Maile', 'Medina', 28146464, '998-354 Augue St.', 1, 'felis.adipiscing.fringilla@hendreritneque.edu', ''),
(84, 'Sawyer', 'Dawson', 24829963, 'P.O. Box 837, 8950 Ad St.', 1, 'placerat@orciDonecnibh.edu', ''),
(85, 'Madaline', 'Hensley', 25476551, '9829 Nec Road', 1, 'nunc@Morbiquis.edu', ''),
(86, 'Edward', 'Cortez', 29491066, 'Ap #569-4410 Dis Road', 1, 'justo.faucibus.lectus@malesuadautsem.edu', ''),
(87, 'Kiara', 'Holder', 34172743, 'P.O. Box 551, 2354 Tellus Aven', 1, 'dapibus@montesnascetur.com', ''),
(88, 'Zephania', 'Cooke', 22431704, '220 Mauris Rd.', 1, 'Vivamus.euismod@orci.ca', ''),
(89, 'Miriam', 'Vincent', 21040846, '805-7835 Suspendisse Street', 1, 'tincidunt@Inornare.org', ''),
(90, 'Armand', 'Cantu', 31273250, 'Ap #916-2901 Ante Rd.', 1, 'rutrum.eu.ultrices@orciadipiscingnon.com', ''),
(91, 'Kathleen', 'Simon', 29572408, '818 Hendrerit Ave', 1, 'dis@duinec.edu', ''),
(92, 'Bradley', 'Branch', 33325197, 'P.O. Box 385, 4061 Sed Avenue', 1, 'euismod.mauris.eu@facilisis.org', ''),
(93, 'Hashim', 'Hess', 31945092, 'P.O. Box 757, 8394 Gravida Ave', 1, 'enim.non@bibendum.ca', ''),
(94, 'Regina', 'Rivera', 32035564, 'Ap #935-7308 Ultrices Avenue', 1, 'sagittis.placerat@nonegestasa.org', ''),
(95, 'Brendan', 'Doyle', 28842652, 'Ap #991-2296 Egestas Road', 1, 'eu.ligula.Aenean@sollicitudinadipiscing.org', ''),
(96, 'Fritz', 'Cannon', 33886413, 'Ap #885-2504 Interdum Ave', 1, 'dolor.sit@urnaUttincidunt.ca', ''),
(97, 'Eden', 'Morgan', 25709610, 'Ap #470-3972 Orci. Av.', 1, 'nec@pretium.edu', ''),
(98, 'Uta', 'Livingston', 22164002, '4707 Orci, Rd.', 1, 'diam@molestie.edu', ''),
(99, 'Whilemina', 'Ware', 32448393, '981-6771 Erat St.', 1, 'orci.Phasellus.dapibus@NullafacilisisSuspendisse.org', ''),
(100, 'Maxine', 'Dawson', 21073362, '442-8209 Erat, Rd.', 1, 'felis@facilisis.com', ''),
(101, 'Aspen', 'Gaines', 39061778, '8637 Dolor Road', 1, 'at@ligulaeu.ca', ''),
(102, 'Molly', 'Olsen', 22373290, '8707 Tellus Avenue', 1, 'vulputate.risus@vulputateullamcorper.org', ''),
(103, 'Yoshi', 'Whitaker', 24175163, 'P.O. Box 345, 7247 Donec St.', 1, 'pede.Cras@ametornare.org', ''),
(104, 'Mariko', 'Bowers', 24784884, '4154 Nisl Avenue', 1, 'libero.Donec.consectetuer@conubia.edu', ''),
(105, 'Iliana', 'Osborn', 29503856, '404-3649 Tristique St.', 1, 'ipsum@dictumaugue.ca', ''),
(106, 'Bell', 'Robles', 39372615, '162-4487 Imperdiet, Road', 1, 'gravida.sagittis@at.edu', ''),
(107, 'Perry', 'Bell', 20143099, '424-7518 Imperdiet, Av.', 1, 'mollis.nec.cursus@Vivamusnonlorem.ca', ''),
(108, 'Baker', 'Compton', 35013216, '7587 Quam Road', 1, 'enim.consequat.purus@eleifendnunc.edu', ''),
(109, 'Sopoline', 'Holland', 36290489, '8539 Non, Road', 1, 'fermentum@dolor.ca', ''),
(110, 'gerente', 'dgm', 0, '00', 0, 'gerencia_dgm@hotmail.com', ''),
(111, 'dgmadmin', 'admin', 30000000, 'cuba 1048', 43567, 'dgmadmin@gmail.com', '4321');

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

--
-- Volcado de datos para la tabla `ordenestrabajo`
--

INSERT INTO `ordenestrabajo` (`nro_orden`, `id_cliente`, `fecha_ingreso`, `fecha_egreso`, `id_producto`, `tarea`, `descripcion_tarea`, `precio`) VALUES
(1, 4, '2012-03-12', '2012-03-20', 1, 2, 'remanofactura', 100.00),
(2, 1, '2012-12-03', '2012-12-06', 1, 1, 'recarga', 120.00),
(3, 3, '2012-04-23', '2012-05-05', 1, 1, 'recarga', 120.50),
(4, 10, '2010-10-04', '0000-00-00', 82, 4, '', 254.00),
(5, 23, '2001-03-22', '0000-00-00', 87, 4, '', 216.00),
(6, 41, '2007-01-21', '0000-00-00', 81, 1, '', 250.00),
(7, 14, '2008-01-26', '0000-00-00', 56, 6, '', 258.00),
(8, 1, '2002-09-20', '0000-00-00', 52, 5, '', 140.00),
(9, 1, '2005-06-12', '0000-00-00', 58, 6, '', 298.00),
(10, 1, '2008-01-01', '0000-00-00', 34, 2, '', 293.00),
(11, 33, '2008-07-15', '0000-00-00', 26, 2, '', 156.00),
(100, 71, '2010-02-14', '0000-00-00', 51, 6, '', 191.00),
(101, 71, '2005-07-25', '0000-00-00', 97, 6, '', 132.00),
(102, 38, '2009-05-22', '0000-00-00', 77, 4, '', 187.00),
(103, 32, '2000-08-10', '0000-00-00', 18, 5, '', 76.00),
(104, 1, '2008-04-23', '0000-00-00', 34, 5, '', 212.00),
(105, 25, '2000-02-23', '0000-00-00', 23, 3, '', 274.00),
(106, 17, '2000-11-02', '0000-00-00', 87, 6, '', 300.00),
(107, 1, '2006-03-31', '0000-00-00', 77, 2, '', 135.00),
(108, 28, '2008-01-21', '0000-00-00', 29, 6, '', 268.00),
(109, 25, '2008-06-16', '0000-00-00', 79, 2, '', 172.00),
(110, 1, '2002-04-27', '0000-00-00', 76, 1, '', 242.00),
(111, 85, '2010-03-10', '0000-00-00', 87, 6, '', 91.00),
(112, 4, '2011-01-02', '0000-00-00', 73, 5, '', 120.00),
(113, 86, '2010-07-08', '0000-00-00', 27, 2, '', 282.00),
(114, 13, '2011-03-16', '0000-00-00', 22, 6, '', 226.00),
(115, 89, '2007-12-06', '0000-00-00', 29, 1, '', 68.00),
(116, 48, '2005-12-21', '0000-00-00', 96, 6, '', 199.00),
(117, 75, '2009-08-08', '0000-00-00', 23, 1, '', 108.00),
(118, 89, '2011-08-27', '0000-00-00', 20, 6, '', 225.00),
(119, 98, '2004-04-11', '0000-00-00', 89, 6, '', 70.00),
(120, 61, '2000-12-12', '0000-00-00', 71, 3, '', 150.00),
(121, 89, '2005-12-05', '0000-00-00', 59, 2, '', 279.00),
(122, 71, '2001-06-22', '0000-00-00', 32, 4, '', 188.00),
(123, 1, '2008-08-15', '0000-00-00', 70, 4, '', 274.00),
(124, 65, '2011-10-05', '0000-00-00', 61, 3, '', 133.00),
(125, 75, '2012-05-19', '0000-00-00', 61, 4, '', 197.00),
(126, 72, '2008-11-12', '0000-00-00', 61, 2, '', 213.00),
(127, 49, '2009-10-03', '0000-00-00', 23, 5, '', 50.00),
(128, 85, '2000-03-29', '0000-00-00', 18, 3, '', 225.00),
(129, 67, '2008-05-03', '0000-00-00', 76, 4, '', 127.00),
(130, 98, '2000-03-13', '0000-00-00', 31, 6, '', 161.00),
(131, 91, '2002-12-24', '0000-00-00', 54, 3, '', 178.00),
(132, 4, '2010-03-26', '0000-00-00', 84, 6, '', 242.00),
(133, 45, '2008-05-09', '0000-00-00', 47, 3, '', 69.00),
(134, 99, '2002-07-13', '0000-00-00', 68, 5, '', 154.00),
(135, 82, '2007-06-20', '0000-00-00', 52, 3, '', 206.00),
(136, 60, '2005-03-24', '0000-00-00', 84, 2, '', 98.00),
(137, 59, '2000-12-18', '0000-00-00', 95, 4, '', 181.00),
(138, 25, '2002-02-15', '0000-00-00', 42, 6, '', 67.00),
(139, 87, '2010-10-13', '0000-00-00', 37, 4, '', 275.00),
(140, 21, '2000-03-22', '0000-00-00', 49, 5, '', 180.00),
(141, 86, '2009-05-15', '0000-00-00', 12, 4, '', 256.00),
(142, 70, '2009-04-01', '0000-00-00', 39, 2, '', 166.00),
(143, 81, '2007-03-12', '0000-00-00', 69, 1, '', 137.00),
(144, 52, '2004-06-03', '0000-00-00', 47, 4, '', 53.00),
(145, 42, '2011-06-27', '0000-00-00', 13, 4, '', 183.00),
(146, 46, '2006-03-25', '0000-00-00', 55, 4, '', 112.00),
(147, 83, '2006-08-16', '0000-00-00', 26, 1, '', 284.00),
(148, 65, '2011-10-04', '0000-00-00', 84, 3, '', 164.00),
(149, 86, '2006-06-11', '0000-00-00', 14, 2, '', 177.00),
(150, 44, '2010-09-04', '0000-00-00', 56, 6, '', 91.00),
(151, 25, '2004-01-26', '0000-00-00', 15, 4, '', 209.00),
(152, 53, '2007-01-27', '0000-00-00', 14, 4, '', 258.00),
(153, 18, '2009-03-11', '0000-00-00', 26, 3, '', 173.00),
(154, 72, '2012-05-12', '0000-00-00', 97, 5, '', 173.00),
(155, 23, '2001-05-01', '0000-00-00', 90, 3, '', 240.00),
(156, 4, '2001-08-11', '0000-00-00', 89, 2, '', 187.00),
(157, 94, '2010-08-01', '0000-00-00', 54, 1, '', 126.00),
(158, 10, '2010-01-25', '0000-00-00', 12, 3, '', 92.00),
(159, 17, '2006-07-16', '0000-00-00', 99, 5, '', 191.00),
(160, 13, '2012-04-21', '0000-00-00', 51, 3, '', 82.00),
(161, 67, '2001-08-09', '0000-00-00', 78, 4, '', 131.00),
(162, 75, '2008-10-16', '0000-00-00', 42, 5, '', 266.00),
(163, 32, '2000-01-11', '0000-00-00', 31, 4, '', 290.00),
(164, 20, '2010-05-22', '0000-00-00', 86, 4, '', 62.00),
(165, 39, '2000-06-24', '0000-00-00', 61, 3, '', 133.00),
(166, 63, '2003-11-18', '0000-00-00', 85, 4, '', 219.00),
(167, 84, '2011-04-09', '0000-00-00', 38, 2, '', 263.00),
(168, 79, '2012-04-23', '0000-00-00', 67, 6, '', 150.00),
(169, 45, '2001-02-22', '0000-00-00', 64, 5, '', 76.00),
(170, 97, '2000-02-12', '0000-00-00', 59, 6, '', 103.00),
(171, 81, '2010-08-31', '0000-00-00', 63, 2, '', 276.00),
(172, 49, '2011-08-07', '0000-00-00', 71, 6, '', 240.00),
(173, 31, '2010-10-11', '0000-00-00', 38, 1, '', 257.00),
(174, 22, '2003-12-13', '0000-00-00', 64, 4, '', 288.00),
(175, 92, '2002-09-26', '0000-00-00', 77, 5, '', 217.00),
(176, 43, '2009-08-26', '0000-00-00', 80, 1, '', 239.00),
(177, 44, '2000-01-13', '0000-00-00', 81, 6, '', 135.00),
(178, 39, '2008-02-14', '0000-00-00', 85, 4, '', 77.00),
(179, 48, '2012-04-07', '0000-00-00', 76, 1, '', 262.00),
(180, 46, '2009-01-13', '0000-00-00', 97, 4, '', 211.00),
(181, 34, '2010-09-11', '0000-00-00', 73, 3, '', 152.00),
(182, 36, '2004-07-05', '0000-00-00', 98, 3, '', 100.00),
(183, 74, '2003-07-08', '0000-00-00', 24, 6, '', 69.00),
(184, 95, '2001-10-11', '0000-00-00', 94, 6, '', 129.00),
(185, 75, '2005-01-19', '0000-00-00', 72, 4, '', 62.00),
(186, 57, '2009-04-04', '0000-00-00', 29, 1, '', 284.00),
(187, 4, '2007-09-30', '0000-00-00', 25, 5, '', 134.00),
(188, 21, '2000-08-12', '0000-00-00', 45, 6, '', 149.00),
(189, 17, '2002-09-18', '0000-00-00', 51, 5, '', 146.00),
(190, 48, '2004-12-01', '0000-00-00', 24, 4, '', 83.00),
(191, 39, '2000-01-04', '0000-00-00', 51, 2, '', 115.00),
(192, 45, '2003-06-25', '0000-00-00', 14, 4, '', 76.00),
(193, 77, '2009-08-07', '0000-00-00', 31, 1, '', 114.00),
(194, 50, '2007-07-18', '0000-00-00', 38, 2, '', 145.00),
(195, 53, '2005-10-09', '0000-00-00', 98, 5, '', 202.00),
(196, 43, '2000-05-30', '0000-00-00', 73, 1, '', 163.00),
(197, 23, '2009-05-09', '0000-00-00', 83, 6, '', 194.00),
(198, 98, '2012-05-28', '0000-00-00', 48, 5, '', 122.00),
(199, 89, '2000-12-17', '0000-00-00', 93, 4, '', 114.00);

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
  `path` varchar(512) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `marca`, `modelo`, `tipo`, `nombre`, `path`) VALUES
(1, 'hp', 'hp720', 1, 'toner hp720c', '1.jpg'),
(10, 'LEXMARK', 'MOD 7', 2, 'NOM 02', 'toners (13).jpg'),
(11, 'XEROX', 'MOD 3', 1, 'NOM 02', 'nn.jpg'),
(12, 'LEXMARK', 'MOD 6', 2, 'NOM 03', 'nn.jpg'),
(13, 'HP', 'MOD 1', 2, 'NOM 01', 'nn.jpg'),
(14, 'SAMSUNG', 'MOD 2', 1, 'NOM 01', 'nn.jpg'),
(15, 'XEROX', 'MOD 2', 1, 'NOM 04', 'nn.jpg'),
(16, 'XEROX', 'MOD 4', 2, 'NOM 04', 'nn.jpg'),
(17, 'CANON', 'MOD 8', 1, 'NOM 02', 'nn.jpg'),
(18, 'EPSON', 'MOD 2', 2, 'NOM 02', 'nn.jpg'),
(19, 'EPSON', 'MOD 8', 2, 'NOM 04', 'nn.jpg'),
(20, 'EPSON', 'MOD 3', 2, 'NOM 03', 'nn.jpg'),
(21, 'SAMSUNG', 'MOD 1', 1, 'NOM 01', 'nn.jpg'),
(22, 'EPSON', 'MOD 2', 1, 'NOM 04', 'nn.jpg'),
(23, 'EPSON', 'MOD 4', 2, 'NOM 01', 'nn.jpg'),
(24, 'XEROX', 'MOD 8', 1, 'NOM 01', 'nn.jpg'),
(25, 'XEROX', 'MOD 4', 1, 'NOM 04', 'nn.jpg'),
(26, 'EPSON', 'MOD 3', 1, 'NOM 02', 'nn.jpg'),
(27, 'HP', 'MOD 2', 2, 'NOM 02', 'nn.jpg'),
(28, 'EPSON', 'MOD 6', 2, 'NOM 02', 'nn.jpg'),
(29, 'XEROX', 'MOD 6', 1, 'NOM 01', 'nn.jpg'),
(30, 'EPSON', 'MOD 7', 2, 'NOM 02', 'nn.jpg'),
(31, 'SAMSUNG', 'MOD 4', 2, 'NOM 04', 'nn.jpg'),
(32, 'XEROX', 'MOD 5', 1, 'NOM 04', 'nn.jpg'),
(33, 'SAMSUNG', 'MOD 6', 2, 'NOM 03', 'nn.jpg'),
(34, 'HP', 'MOD 4', 1, 'NOM 03', 'toners (1).jpg'),
(35, 'EPSON', 'MOD 2', 1, 'NOM 03', 'nn.jpg'),
(36, 'EPSON', 'MOD 1', 2, 'NOM 04', 'nn.jpg'),
(37, 'CANON', 'MOD 4', 2, 'NOM 03', 'nn.jpg'),
(38, 'SAMSUNG', 'MOD 1', 1, 'NOM 03', 'nn.jpg'),
(39, 'EPSON', 'MOD 1', 2, 'NOM 03', 'nn.jpg'),
(40, 'HP', 'MOD 3', 2, 'NOM 02', 'nn.jpg'),
(41, 'XEROX', 'MOD 5', 1, 'NOM 01', 'nn.jpg'),
(42, 'HP', 'MOD 1', 2, 'NOM 02', 'nn.jpg'),
(43, 'HP', 'MOD 4', 2, 'NOM 01', 'nn.jpg'),
(44, 'SAMSUNG', 'MOD 5', 1, 'NOM 02', 'nn.jpg'),
(45, 'CANON', 'MOD 7', 2, 'NOM 02', 'nn.jpg'),
(46, 'EPSON', 'MOD 1', 1, 'NOM 02', 'nn.jpg'),
(47, 'EPSON', 'MOD 5', 2, 'NOM 02', 'nn.jpg'),
(48, 'EPSON', 'MOD 8', 2, 'NOM 01', 'nn.jpg'),
(49, 'SAMSUNG', 'MOD 8', 1, 'NOM 03', 'nn.jpg'),
(50, 'CANON', 'MOD 6', 1, 'NOM 01', 'nn.jpg'),
(51, 'CANON', 'MOD 7', 1, 'NOM 02', 'nn.jpg'),
(52, 'CANON', 'MOD 5', 2, 'NOM 03', 'nn.jpg'),
(53, 'XEROX', 'MOD 4', 2, 'NOM 01', 'nn.jpg'),
(54, 'LEXMARK', 'MOD 7', 2, 'NOM 04', 'nn.jpg'),
(55, 'XEROX', 'MOD 5', 2, 'NOM 03', 'nn.jpg'),
(56, 'SAMSUNG', 'MOD 7', 1, 'NOM 01', 'nn.jpg'),
(57, 'CANON', 'MOD 7', 1, 'NOM 03', 'nn.jpg'),
(58, 'XEROX', 'MOD 7', 1, 'NOM 04', 'toners (3).jpg'),
(59, 'HP', 'MOD 3', 2, 'NOM 02', 'nn.jpg'),
(60, 'CANON', 'MOD 2', 1, 'NOM 02', 'nn.jpg'),
(61, 'HP', 'MOD 7', 1, 'NOM 03', 'nn.jpg'),
(62, 'LEXMARK', 'MOD 7', 1, 'NOM 02', 'nn.jpg'),
(63, 'HP', 'MOD 2', 1, 'NOM 01', 'nn.jpg'),
(64, 'EPSON', 'MOD 1', 1, 'NOM 01', 'nn.jpg'),
(65, 'SAMSUNG', 'MOD 1', 1, 'NOM 01', 'nn.jpg'),
(66, 'XEROX', 'MOD 8', 1, 'NOM 03', 'nn.jpg'),
(67, 'SAMSUNG', 'MOD 4', 1, 'NOM 02', 'nn.jpg'),
(68, 'CANON', 'MOD 8', 2, 'NOM 04', 'nn.jpg'),
(69, 'XEROX', 'MOD 8', 1, 'NOM 03', 'nn.jpg'),
(70, 'LEXMARK', 'MOD 7', 1, 'NOM 03', 'nn.jpg'),
(71, 'HP', 'MOD 7', 1, 'NOM 03', 'nn.jpg'),
(72, 'SAMSUNG', 'MOD 8', 1, 'NOM 03', 'nn.jpg'),
(73, 'XEROX', 'MOD 3', 2, 'NOM 03', 'nn.jpg'),
(74, 'EPSON', 'MOD 7', 1, 'NOM 04', 'nn.jpg'),
(75, 'LEXMARK', 'MOD 4', 1, 'NOM 02', 'nn.jpg'),
(76, 'EPSON', 'MOD 3', 1, 'NOM 02', 'nn.jpg'),
(77, 'CANON', 'MOD 8', 2, 'NOM 02', 'nn.jpg'),
(78, 'HP', 'MOD 1', 1, 'NOM 04', 'nn.jpg'),
(79, 'HP', 'MOD 8', 1, 'NOM 03', 'nn.jpg'),
(80, 'HP', 'MOD 2', 1, 'NOM 04', 'nn.jpg'),
(81, 'EPSON', 'MOD 3', 1, 'NOM 03', 'nn.jpg'),
(82, 'HP', 'MOD 8', 2, 'NOM 04', 'nn.jpg'),
(83, 'XEROX', 'MOD 3', 2, 'NOM 01', 'nn.jpg'),
(84, 'EPSON', 'MOD 7', 2, 'NOM 04', 'nn.jpg'),
(85, 'HP', 'MOD 6', 2, 'NOM 03', 'nn.jpg'),
(86, 'LEXMARK', 'MOD 6', 2, 'NOM 02', 'nn.jpg'),
(87, 'EPSON', 'MOD 6', 1, 'NOM 01', 'nn.jpg'),
(88, 'SAMSUNG', 'MOD 8', 2, 'NOM 02', 'nn.jpg'),
(89, 'HP', 'MOD 3', 2, 'NOM 03', 'nn.jpg'),
(90, 'EPSON', 'MOD 1', 1, 'NOM 04', 'nn.jpg'),
(91, 'XEROX', 'MOD 5', 2, 'NOM 01', 'nn.jpg'),
(92, 'XEROX', 'MOD 8', 2, 'NOM 04', 'nn.jpg'),
(93, 'HP', 'MOD 8', 1, 'NOM 02', 'nn.jpg'),
(94, 'HP', 'MOD 1', 2, 'NOM 02', 'nn.jpg'),
(95, 'LEXMARK', 'MOD 7', 2, 'NOM 02', 'nn.jpg'),
(96, 'LEXMARK', 'MOD 6', 1, 'NOM 02', 'nn.jpg'),
(97, 'CANON', 'MOD 8', 1, 'NOM 03', 'nn.jpg'),
(98, 'SAMSUNG', 'MOD 3', 1, 'NOM 03', 'nn.jpg'),
(99, 'EPSON', 'MOD 8', 2, 'NOM 03', 'nn.jpg'),
(100, 'HP', 'MOD 4', 1, 'NOM 02', 'nn.jpg'),
(101, 'XEROX', 'MOD 7', 2, 'NOM 02', 'nn.jpg'),
(102, 'XEROX', 'MOD 8', 1, 'NOM 04', 'nn.jpg'),
(103, 'CANON', 'MOD 2', 2, 'NOM 01', 'nn.jpg'),
(104, 'XEROX', 'MOD 1', 1, 'NOM 02', 'nn.jpg'),
(105, 'XEROX', 'MOD 6', 2, 'NOM 03', 'nn.jpg'),
(106, 'EPSON', 'MOD 2', 1, 'NOM 03', 'nn.jpg'),
(107, 'LEXMARK', 'MOD 7', 2, 'NOM 03', 'nn.jpg'),
(108, 'CANON', 'MOD 2', 2, 'NOM 02', 'nn.jpg'),
(109, 'CANON', 'MOD 6', 1, 'NOM 04', 'nn.jpg');

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
-- Filtros para la tabla `ordenestrabajo`
--
ALTER TABLE `ordenestrabajo`
  ADD CONSTRAINT `fk_cliente_ordenestrabajo` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_ordenestrabajo` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
