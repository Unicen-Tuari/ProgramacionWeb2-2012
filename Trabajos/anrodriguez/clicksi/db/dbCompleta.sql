-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generaci?n: 03-12-2012 a las 11:04:08
-- Versi?n del servidor: 5.5.28
-- Versi?n de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;

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
  `imagen_path` varchar(512) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `pk_articulo` (`id`),
  UNIQUE KEY `articulo_unq_nombre` (`nombre`),
  KEY `fk_rubro_articulo` (`rubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=642 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `nombre`, `rubro`, `precio_venta`, `imagen_path`) VALUES
(1, 'CPU AMD  FX-4100 3.6GHZ 4MB L2', 6, 156.10, ''),
(2, 'CPU AMD  FX-6100 3.3GHZ 8MB', 6, 203.64, ''),
(3, 'CPU AMD  FX-8120 3.1GHZ 8MB', 6, 302.61, ''),
(4, 'CPU AMD APU A4-3300 2.5GHZ 1MB FM1', 6, 87.12, ''),
(5, 'CPU AMD APU A4-3400 2.7GHZ', 6, 94.66, ''),
(6, 'CPU AMD APU A6-3500 2.4GHZ 3MB FM1', 6, 130.65, ''),
(7, 'CPU AMD APU A6-3670 2.7GHZ 4MB FM1', 6, 165.87, ''),
(8, 'CPU AMD APU A8-3850 2.9GHZ 4MB FM1', 6, 187.33, ''),
(9, 'CPU AMD APU A8-3870 3.0GHZ 4MB FM1', 6, 194.64, ''),
(10, 'CPU AMD ATHLON II 250 X2 AM3', 6, 81.71, ''),
(11, 'CPU AMD ATHLON II 455 X3 AM3', 6, 102.30, ''),
(13, 'CPU AMD ATHLON II 460 X3 AM3', 6, 111.58, ''),
(14, 'CPU AMD ATHLON II 640 X4 AM3', 6, 136.07, ''),
(15, 'CPU AMD ATHLON II 645 X4 AM3', 6, 134.21, ''),
(16, 'CPU AMD PHENOM 9550 X4 AM2', 6, 160.93, ''),
(17, 'CPU AMD PHENOM 9750 X4 AM2', 6, 192.60, ''),
(18, 'CPU AMD PHENOM II 1075T X6', 6, 226.46, ''),
(19, 'CPU AMD PHENOM II 555 X2 AM3 BLACK', 6, 116.09, ''),
(20, 'CPU AMD PHENOM II 560 X2 3.3 7MB', 6, 119.45, ''),
(21, 'CPU AMD PHENOM II 565 X2 3.4 7MB', 6, 141.12, ''),
(22, 'CPU AMD PHENOM II 940 X4 AM2+ BLACK', 6, 252.00, ''),
(23, 'CPU CELERON E3300 2.5 DUALCORE', 6, 46.37, ''),
(24, 'CPU CELERON E3400 2.6 DUALCORE', 6, 54.01, ''),
(25, 'CPU E4600 CORE2DUO 2.4 2MB 775', 6, 161.97, ''),
(26, 'CPU E5400 DUALCORE 2.7 2MB 775', 6, 74.80, ''),
(27, 'CPU E5500 DUALCORE 2.8 2MB 775', 6, 79.85, ''),
(28, 'CPU E7200 CORE 2 D 2.53GHZ', 6, 85.40, ''),
(29, 'CPU E8400 CORE 2 D 3.0GHZ', 6, 111.00, ''),
(30, 'CPU G6950 DUALCORE 2.8GHZ 3MB 1156', 6, 100.80, ''),
(31, 'CPU I3-2100 3.10GHZ 3MB S1155', 6, 172.38, ''),
(32, 'CPU I3-540 3.06GHZ 4MB S1156', 6, 133.01, ''),
(33, 'CPU I3-550 3.20GHZ 4MB S1156', 6, 137.77, ''),
(34, 'CPU I5-2500 3.3GHZ 6MB S1155', 6, 301.91, ''),
(35, 'CPU I7-950 3.06GHZ 8MB', 6, 394.68, ''),
(36, 'CPU SEMPRON 145 AM3 1MB CACHE', 6, 46.90, ''),
(37, 'CPU SEMPRON 3200 AM2', 6, 46.29, ''),
(38, 'CPU SEMPRON LE-1250 AM2', 6, 38.07, ''),
(39, 'PC COMPAQ 100B AMD LR999L', 2, 409.89, ''),
(40, 'PC COMPAQ 100B AMD LS821L', 2, 610.44, ''),
(41, 'ALL IN ONE MSI AE2060-032SP', 3, 904.34, ''),
(42, 'APPLE IPAD WIFI 64 GB MB294E/A', 3, 944.64, ''),
(43, 'NOTEBOOK MSI A6200 I3-390/4GB/500GB', 3, 896.43, 'NOTEBOOK-MSI-A6200-I3-390-4GB-500GB.jpg'),
(44, 'NOTEBOOK MSI A6500 AMD E450/2GB/500', 3, 706.55, ''),
(45, 'NOTEBOOK MSI A6500 AMD E450/4GB/500', 3, 840.70, ''),
(65, 'HD 1.5TB SATA SEAGATE 5900 64MB', 8, 176.40, 'hdseagate5900.1.5tbsata.jpeg'),
(66, 'HD 120GB SAMSUNG 5400 SATA NOTEBOOK', 8, 84.43, ''),
(67, 'HD 120GB W.DIGITAL 7200', 8, 60.05, ''),
(68, 'HD 1TB LG 5400 USB EXT BLACK', 8, 164.92, ''),
(69, 'HD 1TB SAMSUNG 5400 USB EXT BLACK', 8, 212.79, ''),
(70, 'HD 1TB TOSHIBA 5400 USB 3.0 BLACK', 8, 196.77, ''),
(71, 'HD 200GB W.DIGITAL 7200 8MB', 8, 118.49, ''),
(72, 'HD 500GB EXT HITACHI USB 0S03123', 8, 122.33, ''),
(73, 'HD 500GB EXT SEAGATE USB 2.0', 8, 131.38, ''),
(74, 'HD 500GB HITACHI 5400 USB EXT BLACK', 8, 98.67, ''),
(75, 'HD 500GB SEAGATE 7200 SATA3 16MB', 8, 123.01, ''),
(76, 'HD 500GB W.DIGITAL 7200 SATA3 16MB', 8, 124.37, ''),
(77, 'HD 640GB LG 5400 USB EXT AZUL', 8, 132.72, ''),
(78, 'HD 640GB LG 5400 USB EXT BLACK', 8, 129.47, ''),
(79, 'HD 640GB LG 5400 USB EXT BLACK/RED', 8, 132.72, ''),
(80, 'HD 750GB SAMSUNG 5400 USB EXT BLACK', 8, 176.80, ''),
(81, 'HD CARRY D.USB IDE 5.25 HD/DVDRW', 8, 17.25, ''),
(82, 'HD CARRY DISK 2.0 5.25 NSP-ED525U', 8, 32.40, ''),
(83, 'GAB ATX COMPUCASE DOT               ', 14, 33.84, ''),
(84, 'GAB ATX KIT SENTEY CS3-1361         ', 14, 59.33, ''),
(85, 'GAB ATX KIT SENTEY PS1-3213         ', 14, 79.61, ''),
(86, 'GAB ATX KIT SENTEY PS1-3274         ', 14, 79.73, ''),
(87, 'GAB ATX KIT SENTEY PS1-3276         ', 14, 68.92, ''),
(88, 'GAB ATX KIT SENTEY PS2-3268         ', 14, 70.35, ''),
(89, 'GAB ATX SATELLITE MINI CX-06        ', 14, 82.89, ''),
(90, 'GAB ATX SENTEY BX1-4284 V2.1        ', 14, 102.85, ''),
(91, 'GAB ATX SENTEY BX1-4285 S/FUENTE    ', 14, 87.69, ''),
(92, 'GAB ATX SENTEY CS2-1331             ', 14, 47.79, ''),
(93, 'GAB ATX SENTEY CS2-1332             ', 14, 48.00, ''),
(94, 'GAB ATX SENTEY CS2-1333             ', 14, 48.00, ''),
(95, 'GAB ATX SENTEY DS1-4237FF          ', 14, 71.99, ''),
(96, 'GAB ATX SENTEY PS2-3272  CON LCD    ', 14, 77.75, ''),
(97, 'GAB COOLER MASTER STACKER 830 ALUBK ', 14, 316.71, ''),
(98, 'GAB SENTEY SS5-2514 BCP450-OI MINI  ', 14, 48.00, ''),
(120, 'PRINTER EPSON STYLUS CX3900         ', 4, 123.63, ''),
(121, 'PRINTER EPSON STYLUS T24            ', 4, 57.75, ''),
(122, 'PRINTER EPSON STYLUS T25            ', 4, 58.61, ''),
(123, 'PRINTER EPSON STYLUS TX 300F        ', 4, 93.68, ''),
(124, 'PRINTER EPSON STYLUS TX125          ', 4, 91.76, ''),
(125, 'PRINTER EPSON STYLUS TX135          ', 4, 63.71, ''),
(126, 'PRINTER HP DESKJET 1000             ', 4, 45.78, ''),
(127, 'PRINTER HP DESKJET 3050 WIRELESS    ', 4, 70.80, ''),
(128, 'PRINTER HP DESKJET D1660            ', 4, 44.59, ''),
(129, 'PRINTER HP DJ 3920                  ', 4, 43.79, ''),
(130, 'PRINTER HP DJ D1360 REMP 3920       ', 4, 43.69, ''),
(131, 'PRINTER HP LASERJET P1606DN         ', 4, 173.08, ''),
(132, 'PRINTER HP OFFICEJET 4000           ', 4, 78.29, ''),
(133, 'PRINTER HP OFFICEJET 4000 K210      ', 4, 76.52, ''),
(134, 'PRINTER HP OFFICEJET 6000           ', 4, 107.03, ''),
(135, 'PRINTER HP OFFICEJET PRO 8000       ', 4, 74.41, ''),
(137, 'PRINTER HP PHOTOSMART C4680         ', 4, 99.72, ''),
(138, 'PRINTER HP PHOTOSMART PLUS WIR 29P  ', 4, 137.39, ''),
(139, 'PRINTER HP PHOTOSMART TAU D110      ', 4, 108.99, ''),
(140, ' GAB ATX KIT BLACK W/ SILVER 200W     ', 13, 39.10, ''),
(141, ' GAB ATX KIT C5002                    ', 13, 41.92, ''),
(142, ' GAB ATX KIT C5010                    ', 13, 41.92, ''),
(143, ' GAB ATX KIT COMPUCASE BLACK TROOPER ', 13, 43.38, ''),
(144, ' GAB ATX KIT EQQUS 5822               ', 13, 45.62, ''),
(145, ' GAB ATX KIT EQQUS 5830               ', 13, 47.23, ''),
(146, ' GAB ATX KIT EQQUS 5836               ', 13, 47.17, ''),
(147, ' GAB ATX KIT RJA-S65C ATX-450 SENTEY  ', 13, 50.22, ''),
(148, ' GAB ATX KIT SATELLITE 207P           ', 13, 70.27, ''),
(149, ' GAB ATX KIT SATELLITE K631           ', 13, 52.44, ''),
(150, ' GAB ATX KIT SENTEY CS1-1398          ', 13, 51.57, ''),
(151, ' GAB ATX KIT SENTEY CS1-1399          ', 13, 55.37, ''),
(152, 'MEM DDR 256MB 333MHZ                 ', 7, 23.12, ''),
(153, 'MEM DDR 256MB 333MHZ ELIXIR          ', 7, 24.03, ''),
(154, 'MEM DDR2 1GB 1100MHZ OCZ GOLD        ', 7, 26.35, ''),
(155, 'MEM DDR2 1GB 533 OCZ S/DISIP         ', 7, 34.50, ''),
(156, 'MEM DDR2 1GB 533MHZ  NOTEBOOK        ', 7, 34.22, ''),
(157, 'MEM DDR2 1GB 533MHZ CORSAIR          ', 7, 38.50, ''),
(158, 'MEM DDR2 1GB 533MHZ LD               ', 7, 130.03, ''),
(159, 'MEM DDR2 1GB 533MHZ OCZ(512X2)DISIP  ', 7, 32.43, ''),
(160, 'MEM DDR2 1GB 667MHZ                  ', 7, 20.20, ''),
(161, 'MEM DDR2 1GB 667MHZ (512X2)C/DIS     ', 7, 16.81, ''),
(162, 'MEM DDR2 1GB 667MHZ CORSAIR          ', 7, 55.03, ''),
(163, 'MEM DDR2 1GB 667MHZ KINGSTON         ', 7, 27.60, ''),
(164, 'MEM DDR2 1GB 667MHZ KINGSTON NOTEBO  ', 7, 33.63, ''),
(165, 'MEM DDR2 1GB 667MHZ NOTEBOOK         ', 7, 17.19, ''),
(166, 'MEM DDR2 1GB 667MHZ OCZ              ', 7, 21.62, ''),
(167, 'MEM DDR2 1GB 675MHZ CORS.512X2 C/DI  ', 7, 20.42, ''),
(168, 'MEM DDR2 1GB 800MHZ KINGSTON         ', 7, 22.20, ''),
(169, 'MEM DDR2 1GB 800MHZ KINGSTON NOTEBO  ', 7, 33.63, ''),
(170, 'MEM DDR2 1GB 800MHZ MARKVISION       ', 7, 31.23, ''),
(171, 'MEM DDR2 256MB 533MHZ                ', 7, 5.88, ''),
(172, 'MEM DDR2 256MB 667MHZ GENERICA       ', 7, 5.88, ''),
(173, 'MEM DDR2 2GB 1066MHZ OCZ PLATINUM    ', 7, 75.90, ''),
(174, 'MEM DDR2 2GB 667MHZ OCZ S.E VISTA/U  ', 7, 54.05, ''),
(175, 'MEM DDR2 2GB 800MHZ KINGSTON NOTEBO  ', 7, 38.67, ''),
(176, 'MEM DDR2 2GB 800MHZ MARKVISION       ', 7, 62.45, ''),
(177, 'MEM DDR2 512MB 533MHZ                ', 7, 14.23, ''),
(178, 'MEM DDR2 512MB 533MHZ AENEON NOTEBO  ', 7, 38.87, ''),
(179, 'MEM DDR2 512MB 533MHZ NOTEBOOK       ', 7, 10.80, ''),
(180, 'MEM DDR2 512MB 533MHZ OCZ            ', 7, 11.50, ''),
(181, 'MEM DDR2 512MB 533MHZ SIMAX          ', 7, 37.72, ''),
(182, 'MEM DDR2 512MB 667MHZ AVA NOTEBOOK   ', 7, 46.58, ''),
(183, 'MEM DDR2 512MB 667MHZ KINGSTON NOT   ', 7, 13.21, ''),
(184, 'MEM DDR2 512MB 667MHZ NOTEBOOK       ', 7, 12.01, ''),
(185, 'MEM DDR2 512MB 667MHZ OCZ            ', 7, 12.01, ''),
(186, 'MEM DDR2 512MB 667MHZ OCZ C/DISIPAD  ', 7, 13.21, ''),
(187, 'MEM DDR2 512MB 667MHZ OCZ SYSTEMELI  ', 7, 13.62, ''),
(188, 'MEM DDR2 512MB 800MHZ OCZ PLAT-XTC   ', 7, 32.41, ''),
(189, 'MEM DDR2 512MB 800MHZ OCZ SYSTEMELI  ', 7, 14.89, ''),
(190, 'MEM DDR3 1GB 1333MHZ KINGSTON        ', 7, 19.26, ''),
(191, 'MEM DDR3 2GB 1333MHZ KINGSTON        ', 7, 19.30, ''),
(192, 'MEM DDR3 2GB 1333MHZ KINGSTON NB     ', 7, 62.09, ''),
(193, 'MEM DDR3 2GB 1333MHZ KINGSTON NOTEB  ', 7, 22.66, ''),
(194, 'MEM DDR3 2GB 800MHZ OCZ GOLD         ', 7, 60.53, ''),
(195, 'MEM DDR3 4GB 1333MHZ KINGSTON        ', 7, 34.46, ''),
(196, 'MEM DDR3 4GB 1333MHZ KINGSTON BULK   ', 7, 31.95, ''),
(197, 'MEM DDR3 4GB 1333MHZ KINGSTON NB     ', 7, 39.26, ''),
(198, 'MEM DDR3 4GB 1333MHZ SUPERTALENT     ', 7, 35.26, ''),
(199, 'MEM DIM 256MB 100MHZ GENERICA        ', 7, 15.76, ''),
(200, 'MEM DIM 512MB 133MHZ AUM             ', 7, 61.01, ''),
(201, 'MEM SD 2GB SANDISK                   ', 7, 9.34, ''),
(202, 'MEM SD 512MB OCZ                     ', 7, 7.51, ''),
(203, 'MEM SD MICRO 16GB KINGSTON 2EN1      ', 7, 28.12, ''),
(204, 'MEM SD MICRO 2GB GENERICO            ', 7, 27.53, ''),
(205, 'MEM SD MICRO 4GB KINGSTON 2EN1       ', 7, 9.90, ''),
(206, 'MEM USB 16GB KINGSTON BLACK          ', 7, 23.42, ''),
(207, 'MEM USB 16GB KINGSTON BLUE           ', 7, 47.09, ''),
(208, 'MEM USB 16GB KINGSTON TRAVELER       ', 7, 50.25, ''),
(209, 'MEM USB 16GB KINGSTON TRAVELER BLAC  ', 7, 26.41, ''),
(210, 'MEM USB 16GB KINGSTON WHITE, BLUE    ', 7, 27.63, ''),
(211, 'MEM USB 16GB PQI BLACK               ', 7, 48.12, ''),
(212, 'MEM USB 16GB PQI BROWN               ', 7, 48.12, ''),
(213, 'MEM USB 16GB PQI GRAY                ', 7, 48.12, ''),
(214, 'MEM USB 16GB PQI PINK                ', 7, 48.12, ''),
(215, 'MEM USB 16GB PQI RED                 ', 7, 48.12, ''),
(216, 'MEM USB 1GB KINGSTON TRAVELER        ', 7, 6.27, ''),
(217, 'MEM USB 256MB KINGSTON (KUSBDTI/256  ', 7, 33.27, ''),
(218, 'MEM USB 2GB KINGSTON NARANJA         ', 7, 10.45, ''),
(219, 'MEM USB 2GB KINGSTON YELLOW          ', 7, 8.48, ''),
(220, 'MEM USB 2GB PQI PINK                 ', 7, 9.61, ''),
(221, 'MEM USB 32GB KINGSTON 2.0 WHITE&RED  ', 7, 83.99, ''),
(222, 'MEM USB 32GB KINGSTON TRAVELER YELL  ', 7, 98.48, ''),
(223, 'MEM USB 32GB LEXAR                   ', 7, 62.21, ''),
(224, 'MEM USB 4GB KINGSTON WHITE           ', 7, 7.12, ''),
(225, 'MEM USB 8GB KINGSTON BLACK           ', 7, 15.28, ''),
(226, 'MEM USB 8GB KINGSTON TRAVELER RED    ', 7, 15.28, ''),
(227, 'MEM USB 8GB PQI BROWN                ', 7, 24.02, ''),
(228, 'MEM USB 8GB PQI DEEP BLUE            ', 7, 24.02, ''),
(229, 'MEM USB 8GB PQI GRAY                 ', 7, 24.02, ''),
(230, 'MEM USB 8GB PQI RED                  ', 7, 24.02, ''),
(231, 'MEM USB 8GB SUPERTALENT              ', 7, 15.00, ''),
(232, 'MOT ASROCK G31M-VS                   ', 9, 52.16, ''),
(233, 'MOT ASROCK RG41C-VS 775              ', 9, 58.13, ''),
(234, 'MOT BIOSTAR AM3 A880GB+              ', 9, 89.86, ''),
(235, 'MOT BIOSTAR AM3 A880GU3 DDR3         ', 9, 95.41, ''),
(236, 'MOT BIOSTAR AM3 TA890GXBHD           ', 9, 143.52, ''),
(237, 'MOT BIOSTAR FM1 A55MH                ', 9, 88.11, ''),
(238, 'MOT BIOSTAR FM1 TA75M                ', 9, 113.31, ''),
(239, 'MOT BIOSTAR FM1 TA75M+               ', 9, 128.59, ''),
(240, 'MOT BIOSTAR H61MH 1155               ', 9, 86.90, ''),
(241, 'MOT BIOSTAR H61ML 1155               ', 9, 78.40, ''),
(242, 'MOT BIOSTAR H61MU3 1155              ', 9, 91.40, ''),
(243, 'MOT BIOSTAR TH61 ITX 1155            ', 9, 100.58, ''),
(244, 'MOT MSI FM1 A55M-P35                 ', 9, 107.83, ''),
(245, 'MOT MSI FM1 A75MA-G55                ', 9, 129.29, ''),
(246, 'MOT MSI G41M-P26 S775 DDR3           ', 9, 66.33, ''),
(247, 'MOT MSI H61M-E23 S1155 DDR3          ', 9, 98.26, ''),
(248, 'MOT MSI H61M-P21 S1155 DDR3          ', 9, 82.56, ''),
(249, 'MOT MSI H61MU-E35 S1155 DDR3         ', 9, 114.26, ''),
(250, 'MOT MSI H67MA-E35 S1155 DDR3         ', 9, 124.62, ''),
(251, 'MOT MSI H67MA-E45 S1155 DDR3         ', 9, 147.18, ''),
(252, 'MOT MSI MINI ITX E3501A-E45          ', 9, 147.99, ''),
(253, 'CD DVD SAMSUNG SLIM USB BLURAY       ', 12, 126.23, ''),
(254, 'CD DVD+-RW 22X LG BLACK SATA', 12, 22.54, ''),
(255, 'CD DVD+-RW 22X LG SATA BLACK         ', 12, 25.54, ''),
(257, 'CD DVD+-RW 22X LITEON SATA BLACK     ', 12, 26.11, ''),
(258, 'CD DVD+-RW 22X SAMSUNG SATA BLACK    ', 12, 26.80, ''),
(260, 'CD DVD+-RW 24X SONY SATA BLACK       ', 12, 25.54, ''),
(261, 'CD DVD+-RW SAMSUNG SLIM USB BLACK    ', 12, 44.93, ''),
(262, 'CD DVDRW 8X LG BLU RAY SATA BK       ', 12, 216.00, ''),
(263, 'FLOPPY DRIVE 1.44 ALPS               ', 12, 7.51, ''),
(264, 'FLOPPY DRIVE 1.44 NOGANET            ', 12, 6.64, ''),
(265, 'FLOPPY DRIVE 1.44 SAMSUNG BGE        ', 12, 6.81, ''),
(266, 'FLOPPY DRIVE 1.44 SAMSUNG BK         ', 12, 6.70, ''),
(270, 'CD DVD+-RW 22X LG SATA BLACK ALT     ', 12, 23.98, ''),
(281, 'SPE EDIFIER IF 330 PLUS NEGRO       ', 11, 121.72, ''),
(282, 'SPE EDIFIER IF200 BEIGE             ', 11, 65.39, ''),
(283, 'SPE EDIFIER MP300 AR MIDNIGHT BLUE  ', 11, 110.03, ''),
(284, 'SPE EDIFIER MP300 AR SPICY RED      ', 11, 110.04, ''),
(285, 'SPE EDIFIER MP300 AR STORMY BLACK   ', 11, 135.86, ''),
(286, 'SPE EDIFIER MP300 BL SIN ESTUCHE    ', 11, 110.03, ''),
(287, 'SPE EDIFIER MP300 SV SIN ESTUCHE    ', 11, 110.04, ''),
(288, 'SPE EDIFIER R18 2.0 USB             ', 11, 24.39, ''),
(289, 'SPE GENIUS RS MEDIA POINTER 100     ', 11, 23.25, ''),
(290, 'SPE GENIUS SP - 400 PORTATIL METAL  ', 11, 32.45, ''),
(291, 'SPE GENIUS SP - HF360A PARA PC      ', 11, 24.92, ''),
(292, 'SPE GENIUS SP - S350 PARA PC        ', 11, 19.79, ''),
(293, 'SPE GENIUS SP-I160 NB MP3           ', 11, 11.36, ''),
(294, 'SPE GENIUS SP-J330                  ', 11, 19.50, ''),
(295, 'SPE GENIUS SP-S200                  ', 11, 14.28, ''),
(296, 'SPE GENIUS SP-U110 2.0 1W BLACK     ', 11, 6.19, ''),
(297, 'SPE SATELLITE AS-667U USB BLACK     ', 11, 7.80, ''),
(298, 'SPE SATELLITE AS311S 2.0 SIL/BK     ', 11, 6.25, ''),
(299, 'CAP EXT ENCORE TV USB C/REMOTO      ', 10, 34.80, ''),
(300, 'CAP EXT KWORLD TV BOX 1920          ', 10, 142.30, ''),
(302, 'CAP PCI KOZUMI TV KTV01C            ', 10, 37.58, ''),
(303, 'CAP PCI PINNACLE STUDIO 500 V.10    ', 10, 102.06, ''),
(304, 'CAP PCI-E KWORLD UNIV.TV TUNER DUAL ', 10, 69.60, ''),
(305, 'CAP PCI-E KWORLD UNIV.TV TUNER&FM   ', 10, 35.39, ''),
(306, 'CAP PCMCIA KOZUMI TV TURNER KTV-PCM ', 10, 72.93, ''),
(307, 'CAP SOF PINNACLE STUDIO V8 NTSC/PAL ', 10, 48.00, ''),
(308, 'CAP USB ENCORE VIDEO ENMVG          ', 10, 30.00, ''),
(309, 'CAP USB KWORLD EDITORA DE VIDEO     ', 10, 61.91, ''),
(310, 'CAP USB KWORLD TV TUNER             ', 10, 29.11, ''),
(311, 'CAP USB KWORLD TV TUNER UB400-I     ', 10, 42.00, ''),
(312, 'CAP USB PINNACLE CLEAN PLUS V 4.0   ', 10, 66.55, ''),
(313, 'CAP USB PINNACLE STUDIO 500 V10     ', 10, 127.39, ''),
(314, 'RED PCI ENCORE 10/100MBPS           ', 10, 4.40, ''),
(315, 'VGA PCI-E 1,5GB GTX580 EVGA         ', 10, 741.55, ''),
(316, 'VGA PCI-E 1,5GB GTX580 ZOTAC        ', 10, 814.28, ''),
(317, 'VGA PCI-E 1GB DDR3 GEFORCE8400 EVGA ', 10, 62.03, ''),
(318, 'VGA PCI-E 1GB GF8500GT XFX          ', 10, 86.46, ''),
(319, 'VGA PCI-E 1GB GF9500GT XFX          ', 10, 85.27, ''),
(320, 'VGA PCI-E 1GB GF9500GT XFX  DDR2 HD ', 10, 80.29, ''),
(321, 'VGA PCI-E 1GB GF9600GT ZOGIS        ', 10, 146.52, ''),
(322, 'VGA PCI-E 1GB GF9800GT EVGA         ', 10, 131.07, ''),
(323, 'VGA PCI-E 1GB GT430 ASUS            ', 10, 84.12, ''),
(324, 'VGA PCI-E 1GB GT430 DDR3 ZOTAC      ', 10, 114.74, ''),
(325, 'VGA PCI-E 1GB GT430 EVGA            ', 10, 80.85, ''),
(326, 'VGA PCI-E 1GB GT430 XFX             ', 10, 83.22, ''),
(327, 'VGA PCI-E 1GB GT520 ASUS            ', 10, 73.50, ''),
(328, 'VGA PCI-E 1GB GT520 EVGA            ', 10, 97.18, ''),
(330, 'VGA PCI-E 1GB GT520 ZOTAC DDR3 DVI  ', 10, 75.27, ''),
(331, 'VGA PCI-E 1GB GTS450 EVGA           ', 10, 197.34, ''),
(333, 'VGA PCI-E 1GB GTS450 EVGA DDR5 DVI- ', 10, 182.05, ''),
(335, 'VGA PCI-E 1GB GTX 560 ASSUS DDR5    ', 10, 405.34, ''),
(336, 'VGA PCI-E 1GB GTX 560 DDR5 ZOTAC    ', 10, 394.53, ''),
(337, 'VGA PCI-E 1GB GTX 560 EVGA          ', 10, 366.68, ''),
(340, 'VGA PCI-E 1GB GTX 560 TI EVGA       ', 10, 384.57, ''),
(341, 'VGA PCI-E 1GB GTX460 EVGA           ', 10, 303.67, ''),
(342, 'VGA PCI-E 1GB GTX460 EVGA GDDR5     ', 10, 263.80, ''),
(343, 'VGA PCI-E 1GB HD3870X2 MSI          ', 10, 504.42, ''),
(344, 'VGA PCI-E 1GB HD4350 PWC            ', 10, 67.26, ''),
(345, 'VGA PCI-E 1GB HD4350 XFX            ', 10, 69.08, ''),
(346, 'VGA PCI-E 1GB HD4350 XFX HDMI - DVI ', 10, 63.05, ''),
(347, 'VGA PCI-E 1GB HD4550 XFX            ', 10, 76.86, ''),
(348, 'VGA PCI-E 1GB HD4570 XFX            ', 10, 75.07, ''),
(349, 'VGA PCI-E 1GB HD4670 DDR2 XFX       ', 10, 75.27, ''),
(350, 'VGA PCI-E 1GB HD4670 XFX            ', 10, 101.41, ''),
(351, 'VGA PCI-E 1GB HD5770 DDR5 XFX S/VGA ', 10, 196.74, ''),
(352, 'VGA PCI-E 1GB HD5850 XFX            ', 10, 390.32, ''),
(353, 'VGA PCI-E 1GB HD6450 DDR3 XFX       ', 10, 89.32, ''),
(354, 'VGA PCI-E 1GB HD6570 DDR3 XFX       ', 10, 104.45, ''),
(355, 'VGA PCI-E 1GB HD6670 DDR3 XFX       ', 10, 114.25, ''),
(356, 'VGA PCI-E 1GB HD6670 DDR5 XFX       ', 10, 142.10, ''),
(357, 'VGA PCI-E 1GB HD6770 DDR5 XFX       ', 10, 182.94, ''),
(358, 'VGA PCI-E 1GB HD6850 DDR5 XFX       ', 10, 238.47, ''),
(359, 'VGA PCI-E 1GB N210 MSI DDR3 1000MHZ ', 10, 67.54, ''),
(360, 'VGA PCI-E 1GB N8400GS MSI DDR3      ', 10, 65.66, ''),
(361, 'VGA PCI-E 1GB N9800GX2-M2D1G MSI    ', 10, 816.13, ''),
(362, 'VGA PCI-E 1GB R4650 MSI             ', 10, 84.07, ''),
(363, 'VGA PCI-E 1GB R6570 MSI DDR3        ', 10, 99.15, ''),
(364, 'VGA PCI-E 256MB GF7600GS POINT OF V ', 10, 52.96, ''),
(365, 'VGA PCI-E 256MB N7100GS  ECS        ', 10, 58.55, ''),
(366, 'VGA PCI-E 256MB NX7800GTX-VT2DE MSI ', 10, 609.63, ''),
(367, 'VGA PCI-E 2GB GT430 DDR3 XFX        ', 10, 98.00, ''),
(368, 'VGA PCI-E 2GB GTX 560 EVGA          ', 10, 375.67, ''),
(369, 'VGA PCI-E 2GB HD5450 XFX            ', 10, 74.32, ''),
(370, 'VGA PCI-E 2GB HD6450 DDR3 XFX       ', 10, 92.16, ''),
(372, 'VGA PCI-E 3GB GTX580 EVGA           ', 10, 885.28, ''),
(373, 'VGA PCI-E 4GB HD6990 DDR5 XFX       ', 10, 1104.04, ''),
(374, 'VGA PCI-E 512MB G210 XFX            ', 10, 52.58, ''),
(375, 'VGA PCI-E 512MB GF7600GS ZOGIS      ', 10, 156.76, ''),
(376, 'VGA PCI-E 512MB GF8400GS BIOSTAR    ', 10, 44.75, ''),
(377, 'VGA PCI-E 512MB GF8400GS EVGA       ', 10, 50.44, ''),
(378, 'VGA PCI-E 512MB GF9800GT EVGA       ', 10, 154.09, ''),
(379, 'VGA PCI-E 512MB GF9800GT XFX        ', 10, 153.73, ''),
(381, 'VGA PCI-E 512MB GF9800GTX XFX       ', 10, 240.20, ''),
(382, 'VGA PCI-E 512MB HD4550 XFX          ', 10, 57.65, ''),
(383, 'VGA PCI-E 512MB HD4650 PWC          ', 10, 70.86, ''),
(384, 'VGA PCI-E 512MB HD4650 XFX          ', 10, 75.66, ''),
(385, 'VGA PCI-E 512MB HD5450 XFX          ', 10, 43.87, ''),
(386, 'VGA PCI-E 512MB N9800GTX-OC MSI     ', 10, 251.36, ''),
(387, 'VGA PCI-E 512MB X1550  PWC          ', 10, 136.34, ''),
(388, 'VGA PCI-E 512MB X1650PRO VISIONTEK  ', 10, 109.82, ''),
(391, 'CAP EXT KWORLD TV BOX 1920 ALT      ', 10, 84.46, ''),
(409, 'VGA PCI-E 1GB GF9500GT XFX ALT          ', 10, 85.27, ''),
(419, 'VGA PCI-E 1GB GT520 EVGA ALT            ', 10, 71.87, ''),
(422, 'VGA PCI-E 1GB GTS450 EVGA ALT          ', 10, 184.95, ''),
(424, 'VGA PCI-E 1GB GTS450 EVGA DDR5 DVI- ALT', 10, 177.16, ''),
(428, 'VGA PCI-E 1GB GTX 560 EVGA ALT          ', 10, 299.72, ''),
(437, 'VGA PCI-E 1GB HD4570 XFX ALT            ', 10, 75.07, ''),
(442, 'VGA PCI-E 1GB HD6450 DDR3 XFX ALT      ', 10, 89.32, ''),
(443, 'VGA PCI-E 1GB HD6570 DDR3 XFX ALT.1      ', 10, 104.45, ''),
(445, 'VGA PCI-E 1GB HD6670 DDR5 XFX ALT       ', 10, 142.10, ''),
(446, 'VGA PCI-E 1GB HD6770 DDR5 XFX ALT.1      ', 10, 182.94, ''),
(460, 'VGA PCI-E 2GB HD6450 DDR3 XFX ALT       ', 10, 84.05, ''),
(466, 'VGA PCI-E 512MB GF8400GS EVGA ALT       ', 10, 50.44, ''),
(468, 'VGA PCI-E 512MB GF9800GT XFX ALT.1        ', 10, 153.73, ''),
(469, 'VGA PCI-E 512MB GF9800GT XFX ALT       ', 10, 148.92, ''),
(474, 'VGA PCI-E 512MB HD5450 XFX ALT          ', 10, 43.87, ''),
(567, 'INTEL MOT BIOSTAR G41-D3C 775 DDR3', 9, 59.10, ''),
(568, 'INTEL MOT BIOSTAR TH67B 1155 DDR3', 9, 105.09, ''),
(569, 'INTEL MOT BIOSTAR TP45ECOMBO 775', 9, 123.70, ''),
(570, 'INTEL MOT GIGABYTE GA-8N-SLI ROYAL S775', 9, 141.40, ''),
(571, 'INTEL MOT INTEL D102GGC2L S775 BOX', 9, 103.78, ''),
(572, 'INTEL MOT MSI G31TM-P21  S775', 9, 58.24, ''),
(573, 'INTEL MOT MSI P43-C51  S775', 9, 106.68, ''),
(576, 'AMD GIGABYTE AM2 GA-M57SLI-S4', 9, 89.78, ''),
(577, 'TECLA+MOUSE MARKVISION USB BL/SIL    ', 15, 13.00, ''),
(578, 'TECLADO GENIUS KB-06XE BLACK USB     ', 15, 7.41, ''),
(579, 'TECLADO GENIUS SLIM STANDARD KIT     ', 15, 11.78, ''),
(580, 'TECLADO LOGITECH NS200               ', 15, 14.17, ''),
(581, 'TECLADO PS2 ESP A4TECH MM 19F BGE    ', 15, 9.44, ''),
(582, 'TECLADO PS2 OPTIMUS OPK 145          ', 15, 4.92, ''),
(583, 'TECLADO PS2 SATELLITE AK-814P        ', 15, 6.85, ''),
(584, 'TECLADO PS2 SATELLITE AK-900         ', 15, 5.64, ''),
(585, 'TECLADO PS2 SATELLITE AK-901P        ', 15, 5.40, ''),
(586, 'TECLADO PS2 SATELLITE AK-901W        ', 15, 4.80, ''),
(587, 'TECLADO PS2-USB MM AK-XP3 SATELLITE  ', 15, 14.16, ''),
(588, 'TECLADO PS2/USB SATELLITE SCR.BK/SI  ', 15, 14.36, ''),
(589, 'TECLADO USB A4TECH GAMMER BK         ', 15, 11.93, ''),
(590, 'TECLADO USB NUMERICO SATELLITE       ', 15, 9.60, ''),
(591, 'TECLADO USB SATELLITE AK-812S SIL/B  ', 15, 12.01, ''),
(592, 'TECLADO USB SATELLITE AK-818A SILVE  ', 15, 29.90, ''),
(593, 'TECLADO USB SATELLITE AK816P         ', 15, 13.25, ''),
(594, 'TECLADO USB TARGUS NUMERICO C/2 USB  ', 15, 15.43, ''),
(595, 'TECLADO USB X2 SATELLITE AK-808P     ', 15, 13.20, ''),
(596, 'TECLADO+MOUSE OPT.A4 MM B.FREEA+USB  ', 15, 29.89, ''),
(597, 'WIR TECLADO+MOUSE GENIUS I815 USB    ', 15, 29.57, ''),
(598, 'WIR TECLADO+MSE SATELLITE USB C/CAR  ', 15, 26.49, ''),
(599, 'HUB 4 PORTS USB OPTIMUS             ', 16, 6.13, ''),
(600, 'MOUSE GENIUS MICRO TRAV RUBY USB    ', 16, 7.71, ''),
(601, 'MOUSE GENIUS MICRO TRAVELER BLANCO  ', 16, 7.04, ''),
(602, 'MOUSE GENIUS MICRO TRAVELER NEGRO   ', 16, 7.80, ''),
(603, 'MOUSE GENIUS MICRO TRAVELER RUBY    ', 16, 6.68, ''),
(604, 'MOUSE GENIUS MICRO TRAVELER SILVER  ', 16, 7.71, ''),
(605, 'MOUSE GENIUS NS120 BLACK USB        ', 16, 4.99, ''),
(606, 'MOUSE GENIUS NS200 LASER PS2        ', 16, 6.73, ''),
(607, 'MOUSE INALAMBRICO OPM856 OPTIMUS    ', 16, 10.36, ''),
(608, 'MOUSE LOGITECH M 100 OPTICO BLACK   ', 16, 9.49, ''),
(609, 'MOUSE LOGITECH M125 BLUE            ', 16, 10.76, ''),
(610, 'MOUSE MINI OPT.SATELLITE U/P AZUL   ', 16, 6.63, ''),
(611, 'MOUSE MINI OPT.SATELLITE U/P BK     ', 16, 6.25, ''),
(612, 'MOUSE MINI OPT.SATELLITE U/PSILVER  ', 16, 7.56, ''),
(613, 'MOUSE MINI OPT.SATELLITE USB NARANJ ', 16, 6.63, ''),
(614, 'MOUSE MINI PS/2-USB SATELLITE A-15P ', 16, 6.99, ''),
(615, 'MOUSE PS2 OPT.SATELLITE A16P BK     ', 16, 3.98, ''),
(616, 'MOUSE PS2/USB OPT.SATELLITE A20A AZ ', 16, 6.61, ''),
(617, 'MOUSE PS2/USB OPT.SATELLITE A20P BK ', 16, 6.61, ''),
(618, 'MOUSE RETRACTIL OPM707 OPTIMUS      ', 16, 5.01, ''),
(619, 'MOUSE SUPER MINI OPT.SATE.U/P RED   ', 16, 7.23, ''),
(620, 'MOUSE SUPER MINI OPT.SATE.U/PSILVER ', 16, 7.23, ''),
(621, 'MOUSE SUPER MINI OPT.SATELLITE PINK ', 16, 9.00, ''),
(622, 'MOUSE USB OPM212 N/P OPTIMUS        ', 16, 5.01, ''),
(623, 'MOUSE USB OPT.SATELLITE A-2W WITHE  ', 16, 6.72, ''),
(624, 'MOUSE USB OPT.SATELLITE A-3P BLACK  ', 16, 8.40, ''),
(625, 'MOUSE USB OPT.SATELLITE A-3S SIL    ', 16, 7.95, ''),
(626, 'MOUSE USB OPT.SATELLITE A-8P BK/SIL ', 16, 4.68, ''),
(627, 'MOUSE USB OPT.SATELLITE A-8S GRIS   ', 16, 4.68, ''),
(628, 'MOUSE USB OPT.SATELLITE A25P BK     ', 16, 5.04, ''),
(629, 'MOUSE USB OPTICO SATELLITE A-29PS   ', 16, 24.02, ''),
(630, 'MOUSE USB TARGUS OP RETRACTIL       ', 16, 20.69, ''),
(631, 'WIR MOUSE A4 OPT.2SCR B.FREE 6B     ', 16, 20.41, ''),
(632, 'WIR MOUSE A4 OPT.2XTWO WHEEL BATFRE ', 16, 21.32, ''),
(633, 'WIR MOUSE LOGITECH M 215 OPTICO BLU ', 16, 15.37, ''),
(634, 'WIR MOUSE LOGITECH M 305 OPTICO SIL ', 16, 24.25, ''),
(635, 'WIR MOUSE USB MICROSOFT OPT.NOTEBOO ', 16, 35.76, ''),
(636, 'WIR MOUSE USB OPT.MINI SATELLITE BK ', 16, 10.24, ''),
(637, 'TEC+MOUSE MARKVISION BL/SIL      ', 16, 23.28, ''),
(638, 'TABLET PC TITAN 7001 16GB', 17, 193.07, ''),
(639, 'TABLET PC TITAN 7005 16GB', 17, 196.05, ''),
(640, 'TABLET PC TITAN 7005 8GB', 17, 183.10, ''),
(641, 'TABLET PC TITAN 7010 8GB GREEN', 17, 183.10, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `razonsocial`, `email`, `telefono`, `localidad`, `motivo`, `fecha_ingreso`, `fecha_respuesta`, `estado`, `comentario`) VALUES
(1, 'Alberto N. Rodr?­guez', 'alberto@gmail.com', '1212121', 'Tandil', 0, '2012-07-11 15:15:27', NULL, 0, 'Probar formulario de consulta'),
(2, 'Alberto N. Rodr?­guez', 'alberto@gmail.com', '44532662', 'Tandil', 2, '2012-07-11 15:16:57', NULL, 0, 'Reclamo desde formulario de contacto'),
(3, 'Alberto', 'alberto@gmail.com', '', 'Tandil', 1, '2012-07-11 16:03:33', NULL, 0, 'Sugerencia desde formulario de contacto'),
(4, 'Alberto N. Rodr?­guez', 'alberto@gmail.com', '', 'Tandil', 3, '2012-07-11 17:03:12', NULL, 0, 'Otro reclamo...'),
(5, 'Alberto N. Rodr?­guez', 'alberto@gmail.com', '3333', 'Tandil', 2, '2012-07-11 18:49:47', NULL, 0, 'Reclamo..'),
(6, 'Juan', 'juan@gmail.com', NULL, NULL, 0, '2012-10-25 01:46:06', NULL, 0, ''),
(7, 'Juan', 'juan@gmail.com', NULL, NULL, 0, '2012-10-25 01:47:40', NULL, 0, ''),
(8, 'Juan', 'juan@gmail.com', NULL, NULL, 0, '2012-10-25 01:49:01', NULL, 0, ''),
(9, 'Alberto', 'anrodriguez.click@gmail.com', NULL, NULL, 0, '2012-11-16 17:30:30', NULL, 0, ''),
(10, 'Yuki', 'yuki@gmail.com', NULL, NULL, 0, '2012-11-17 16:14:40', NULL, 0, ''),
(11, 'Alberto', 'anrodriguez@clicksi.com.ar', NULL, NULL, 0, '2012-11-21 15:14:35', NULL, 0, ''),
(12, 'Alberto', 'anrodriguez.click@gmail.com', NULL, 'Tandil', 3, '2012-11-21 15:26:17', NULL, 0, ''),
(13, 'Alberto', 'anrodriguez.click@gmail.com', NULL, 'Tandil', 0, '2012-11-21 15:26:37', NULL, 0, ''),
(14, 'Perez', 'anrodriguez.click@gmail.com', NULL, NULL, 1, '2012-11-21 21:44:27', NULL, 0, ''),
(15, 'Alberto', 'anrodriguez.click@gmail.com', NULL, NULL, 0, '2012-12-02 13:38:13', NULL, 0, ''),
(16, 'Alberto', 'anrodriguez.click@gmail.com', '5654', 'TANDIL', 2, '2012-12-02 14:13:07', NULL, 0, '');

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

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id`, `nombre`) VALUES
(5, 'ACCESORIOS'),
(2, 'COMPUTADORAS'),
(8, 'DISCOS RIGIDOS'),
(14, 'GABINETES'),
(4, 'IMPRESORAS'),
(13, 'KITS'),
(7, 'MEMORIAS'),
(6, 'MICROPROCESADORES'),
(9, 'MOTHER BOARDS'),
(16, 'MOUSES'),
(1, 'N/A'),
(3, 'NOTEBOOKS'),
(12, 'OPTICOS'),
(11, 'SONIDO'),
(17, 'TABLETS'),
(15, 'TECLADOS'),
(10, 'VIDEO');

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

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`apellido`, `nombre`, `email`, `password`) VALUES
('RODRIGUEZ', 'Alberto', 'alberto@gmail.com', '25d55ad283aa400af464c76d713c07ad');

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
,`imagen_path` varchar(512)
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
