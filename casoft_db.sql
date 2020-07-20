-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-07-2019 a las 16:31:42
-- Versión del servidor: 10.0.28-MariaDB-0+deb8u1
-- Versión de PHP: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `casoft_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adaministrador`
--

CREATE TABLE IF NOT EXISTS `adaministrador` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_ADMIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `adaministrador`
--

INSERT INTO `adaministrador` (`ID_USUARIO`, `COD_ADMIN`) VALUES
(21, 2019009022),
(33, 11777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE IF NOT EXISTS `auxiliar` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_AUXILIAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`ID_USUARIO`, `COD_AUXILIAR`) VALUES
(39, 201407069),
(41, 3333),
(44, 1234567890),
(45, 201209765),
(49, 287654329),
(50, 15451),
(52, 201309765),
(53, 152),
(54, 93),
(58, 101),
(60, 451),
(65, 123456789),
(67, 789456123),
(68, 12345698),
(69, 56325636),
(78, 123654),
(79, 201896344),
(81, 15365);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar_i`
--

CREATE TABLE IF NOT EXISTS `auxiliar_i` (
  `COD_AUXILIAR` int(11) NOT NULL,
  `NOMBRES` varchar(150) DEFAULT NULL,
  `APELLIDOS` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auxiliar_i`
--

INSERT INTO `auxiliar_i` (`COD_AUXILIAR`, `NOMBRES`, `APELLIDOS`) VALUES
(123, 'Alexandra', 'la'),
(1111, 'Fercho', 'wow'),
(4455, 'dark', 'dar'),
(112455, 'juan', 'q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_DOCENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ID_USUARIO`, `COD_DOCENTE`) VALUES
(2, 22),
(16, 555),
(22, 20190090),
(27, 201500010),
(30, 664455),
(38, 201409087),
(48, 209658976),
(55, 2516512),
(56, 2515132),
(57, 123456789),
(59, 123654789),
(61, 78956446),
(80, 256987);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_auxiliar`
--

CREATE TABLE IF NOT EXISTS `docente_auxiliar` (
  `ID_USUARIO` int(11) DEFAULT NULL,
  `COD_AUXILIAR` int(11) DEFAULT NULL,
  `DOC_ID_USUARIO` int(11) DEFAULT NULL,
  `COD_DOCENTE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente_auxiliar`
--

INSERT INTO `docente_auxiliar` (`ID_USUARIO`, `COD_AUXILIAR`, `DOC_ID_USUARIO`, `COD_DOCENTE`) VALUES
(39, 201407069, 2, 22),
(41, 3333, 2, 22),
(45, 201209765, 2, 22),
(49, 287654329, 48, 209658976),
(50, 15451, 2, 22),
(52, 201309765, 2, 22),
(54, 93, 2, 22),
(58, 101, 55, 2516512),
(60, 451, 56, 2515132),
(68, 12345698, 2, 22),
(69, 56325636, 2, 22),
(78, 123654, 2, 22),
(79, 201896344, 2, 22),
(81, 15365, 80, 256987);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_materia`
--

CREATE TABLE IF NOT EXISTS `docente_materia` (
  `ID_USUARIO` int(11) DEFAULT NULL,
  `COD_DOCENTE` int(11) DEFAULT NULL,
  `ID_MATERIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente_materia`
--

INSERT INTO `docente_materia` (`ID_USUARIO`, `COD_DOCENTE`, `ID_MATERIA`) VALUES
(2, 22, 10),
(2, 22, 11),
(2, 22, 15),
(2, 22, 16),
(2, 22, 17),
(2, 22, 19),
(2, 22, 20),
(2, 22, 23),
(2, 22, 24),
(48, 209658976, 3),
(55, 2516512, 21),
(56, 2515132, 22),
(80, 256987, 23),
(80, 256987, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_SYS` int(11) NOT NULL,
  `HABILITADO` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_USUARIO`, `COD_SYS`, `HABILITADO`) VALUES
(40, 223344, 1),
(42, 234567890, 1),
(43, 2100, 1),
(46, 201208654, 1),
(47, 201456789, 1),
(51, 201965432, 1),
(62, 21021, 1),
(63, 312, 1),
(64, 358, 1),
(66, 399, 1),
(70, 20145635, 1),
(71, 7896532, 1),
(72, 78965, 1),
(73, 45698723, 1),
(74, 2014856, 1),
(75, 20145698, 1),
(76, 2014562, 1),
(77, 201458, 1),
(82, 231, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_grupo`
--

CREATE TABLE IF NOT EXISTS `estudiante_grupo` (
  `ID_USUARIO` int(11) NOT NULL,
  `COD_SYS` int(11) NOT NULL,
  `COD_GRUPO` varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
  `HABILITADO` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiante_grupo`
--

INSERT INTO `estudiante_grupo` (`ID_USUARIO`, `COD_SYS`, `COD_GRUPO`, `HABILITADO`) VALUES
(40, 223344, 'int', 1),
(40, 223344, 'mach', 1),
(40, 223344, 'pro', 1),
(40, 223344, 'rec', 1),
(42, 234567890, 'pro', 1),
(43, 2100, 'tel', 1),
(46, 201208654, 'tel', 1),
(47, 201456789, 'mach', 1),
(51, 201965432, 'cir', 1),
(62, 21021, 'rec2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_grupo_i`
--

CREATE TABLE IF NOT EXISTS `estudiante_grupo_i` (
  `COD_SYS` int(11) NOT NULL,
  `COD_GRUPO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_grupo_i`
--

INSERT INTO `estudiante_grupo_i` (`COD_SYS`, `COD_GRUPO`) VALUES
(1542, 'elem'),
(1542, 'elem1'),
(1542, 'inge'),
(223311, 'elem');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_i`
--

CREATE TABLE IF NOT EXISTS `estudiante_i` (
  `COD_SYS` int(11) NOT NULL,
  `NOMBRES` varchar(150) DEFAULT NULL,
  `APELLIDOS` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_i`
--

INSERT INTO `estudiante_i` (`COD_SYS`, `NOMBRES`, `APELLIDOS`) VALUES
(1542, 'ronald', 'dan'),
(223311, 'Vicente', 'Tico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `COD_GRUPO` varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
  `ID_MATERIA` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `CAPACIDADG` int(11) NOT NULL,
  `COD_AUXILIAR` int(11) DEFAULT NULL,
  `DOC_ID_USUARIO` int(11) DEFAULT NULL,
  `COD_DOCENTE` int(11) DEFAULT NULL,
  `ID_LABORATORIO` int(11) DEFAULT NULL,
  `NOMBRE_GRUPO` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_INI` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`COD_GRUPO`, `ID_MATERIA`, `ID_USUARIO`, `CAPACIDADG`, `COD_AUXILIAR`, `DOC_ID_USUARIO`, `COD_DOCENTE`, `ID_LABORATORIO`, `NOMBRE_GRUPO`, `FECHA_INI`, `FECHA_FIN`) VALUES
('200c', 10, 54, 0, 93, 2, 22, 4, 'protones neutrones', '2019-06-02', '2019-06-05'),
('cir', 17, 52, 1, 201309765, 2, 22, 12, 'A20', '2019-06-14', '2019-06-30'),
('GDoc', 19, 68, 0, 12345698, 2, 22, 15, 'GDocR1', '2019-06-10', '2019-06-18'),
('gru', 24, 81, 0, 15365, 80, 256987, 4, 'grupo4', '2019-06-08', '0000-00-00'),
('int', 3, 49, 1, 287654329, 48, 209658976, 4, 'Gr20', '2019-06-10', '2019-06-27'),
('mach', 16, 45, 2, 201209765, 2, 22, 5, 'Machine', '2019-06-09', '2019-06-28'),
('pro', 15, 39, 2, 201407069, 2, 22, 10, 'grupo 8', '2019-05-31', '2019-06-10'),
('rec', 11, 50, 1, 15451, 2, 22, 4, 'g20', '2019-06-15', '2019-06-22'),
('rec1', 21, 58, 0, 101, 55, 2516512, 13, 'GDocR1', '2019-06-18', '2019-06-19'),
('rec2', 22, 60, 1, 451, 56, 2515132, 14, 'GDocR2', '2019-06-18', '2019-06-19'),
('tel', 10, 41, 2, 3333, 2, 22, 10, '10', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_i`
--

CREATE TABLE IF NOT EXISTS `grupo_i` (
  `COD_GRUPO` varchar(10) NOT NULL,
  `COD_AUXILIAR` int(11) DEFAULT NULL,
  `NOMBRE_GRUPO` varchar(100) DEFAULT NULL,
  `MATERIA` varchar(100) DEFAULT NULL,
  `COD_DOCENTE` int(11) DEFAULT NULL,
  `FECHA_INI` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_i`
--

INSERT INTO `grupo_i` (`COD_GRUPO`, `COD_AUXILIAR`, `NOMBRE_GRUPO`, `MATERIA`, `COD_DOCENTE`, `FECHA_INI`, `FECHA_FIN`) VALUES
('elem', 4455, '2a', 'Elementos de programacion y estructura de datos', 2, '2019-06-09', '2019-06-09'),
('elem1', 123, '1', 'Elementos de programacion y estructura de datos', 2, '2019-06-10', '2019-06-10'),
('inge', 1111, 'i1', 'Ingenieria de Software', 2, '2019-06-10', '2019-06-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `COD_GRUPO` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `HORA_ENTRADA` time DEFAULT NULL,
  `HORA_SALIDA` time DEFAULT NULL,
  `DIA` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`COD_GRUPO`, `HORA_ENTRADA`, `HORA_SALIDA`, `DIA`) VALUES
('pro', '14:15:00', '15:45:00', 'Martes'),
('tel', '17:15:00', '18:45:00', 'Viernes'),
('mach', '15:45:00', '17:15:00', 'Miercoles'),
('int', '15:45:00', '17:15:00', 'Martes'),
('rec', '15:45:00', '17:15:00', 'Miercoles'),
('cir', '15:45:00', '17:15:00', 'Miercoles'),
('200c', '14:15:00', '15:45:00', 'Martes'),
('rec1', '14:15:00', '15:45:00', 'Martes'),
('rec2', '14:15:00', '15:45:00', 'Miercoles'),
('GDoc', '14:15:00', '15:45:00', 'Martes'),
('gru', '15:45:00', '17:15:00', 'Martes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
`ID_LABORATORIO` int(11) NOT NULL,
  `NOMBRE_LABORATORIO` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`ID_LABORATORIO`, `NOMBRE_LABORATORIO`, `CAPACIDAD`) VALUES
(1, 'Laboratorio 1', 30),
(2, 'Laboratorio 2', 50),
(3, 'Laboratorio 3', 33),
(4, 'Laboratorio 4', 25),
(5, 'Laboratorio 5', 10),
(6, 'LAB 1', 50),
(7, 'Laboratorio 6', 31),
(8, 'Lab 2', 30),
(9, 'laboratorio x', 100),
(10, 'LAB4', 2),
(11, 'LAB 6', 25),
(12, 'Labo Redes Avanzadas', 20),
(13, 'LaboR1', 1),
(14, 'LabR2', 1),
(15, 'LabaratorioRec1', 1),
(16, 'LabaratorioRec2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
`ID_MATERIA` int(11) NOT NULL,
  `NOMBRE_MATERIA` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_MATERIA`, `NOMBRE_MATERIA`) VALUES
(1, 'Elementos de programacion y estructura de datos'),
(3, 'Introduccion a la Programacion'),
(4, 'Redes de Computadoras'),
(6, 'Sistemas de informacion I'),
(7, 'Sistemas de informacion II'),
(8, 'Informatica forense'),
(9, 'Ingenieria de Software'),
(10, 'Telematicos'),
(11, 'Recuperacion de la informacion'),
(12, 'Introducion'),
(13, 'Recuperacion'),
(14, 'Redes avanzadas '),
(15, 'Procesos agiles'),
(16, 'taller de Ing de Software'),
(17, 'Circuitos Electronicos'),
(18, 'm'),
(19, 'Materia R1 recuperatorio'),
(20, 'Materia R2 recuperatorio'),
(21, 'R1'),
(22, 'R2'),
(23, 'R3'),
(24, 'R4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE IF NOT EXISTS `portafolio` (
`ID_PORTAFOLIO` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `COD_SYS` int(11) DEFAULT NULL,
  `DIRECCION_FICHERO` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NOMBRE_FICH` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DIRECCION_RAIZ` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE IF NOT EXISTS `practica` (
`ID_PRACTICA` int(11) NOT NULL,
  `ID_PRACTICA_TAREA` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `COD_SYS` int(11) DEFAULT NULL,
  `NOMBRE_PRACTICA` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NOMBRE_FICHERO` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ASISTENCIA` tinyint(1) NOT NULL,
  `HORA_SUBIDA` datetime DEFAULT NULL,
  `NOTA_PRACTICA` int(11) DEFAULT NULL,
  `REVISADO_POR` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `OBSERVACION` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA_REVISION` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `practica`
--

INSERT INTO `practica` (`ID_PRACTICA`, `ID_PRACTICA_TAREA`, `ID_USUARIO`, `COD_SYS`, `NOMBRE_PRACTICA`, `NOMBRE_FICHERO`, `ASISTENCIA`, `HORA_SUBIDA`, `NOTA_PRACTICA`, `REVISADO_POR`, `OBSERVACION`, `FECHA_REVISION`) VALUES
(10, 8, 40, 223344, 'Xp como ciencia', '3.txt', 1, '2019-06-09 19:44:06', 100, 'Josefina Claros', 'Buen trabajo muchacho', '2019-06-09 19:46:03'),
(11, 9, 43, 2100, 'Las 22 capas inexistentes de osi', 'capas de osi.txt', 1, '2019-06-09 19:54:07', 98, 'Dark Vel', 'La practica que realizo esta completo', '2019-06-13 08:41:54'),
(12, 7, 40, 223344, 'Practica 1', '8.txt', 0, '2019-06-09 20:13:20', 50, 'Josefina Claros', 'bien', '2019-06-13 06:35:46'),
(13, 10, 42, 234567890, 'xp', '11.txt', 1, '2019-06-09 20:53:09', 95, 'Josefina Claros', 'Cumplio a medias con su practica', '2019-06-09 20:59:08'),
(14, 7, 42, 234567890, 'terminado', '12.txt', 1, '2019-06-09 21:04:05', 10, 'Josefina Claros', 'cumplio', '2019-06-09 21:05:55'),
(15, 8, 42, 234567890, 'treminado 2', '13.txt', 0, '2019-06-09 21:05:03', NULL, 'Josefina Claros', 'muy buen trabajo', '2019-06-09 21:09:02'),
(16, 11, 40, 223344, 'Nuevas tecnologias', 'caratu.docx', 1, '2019-06-09 21:19:36', 15, 'Nayeli Andrea Gamboa Illanes ', 'Realizo el trabajo con exito y sin ningun inconveniente', '2019-06-09 21:30:42'),
(17, 12, 47, 201456789, 'concluido', 'WhatsApp Image 2018-11-29 at 6.29.59 PM (6).jpeg', 1, '2019-06-10 05:23:12', 100, 'Nayeli Andrea Gamboa Illanes ', 'Muy buen trabajo', '2019-06-10 05:27:43'),
(18, 12, 40, 223344, 'Practica1', 'unos.docx', 1, '2019-06-10 06:20:31', 80, '', '', NULL),
(19, 7, 40, 223344, 'holo', 'reporte-costo-linea-verde.pdf', 1, '2019-06-14 17:15:08', 100, 'Josefina Claros', 'Excelente, termino todo y aumento detalles', '2019-06-14 17:23:06'),
(20, 14, 51, 201965432, 'Entrega Sistemas Paralelos', 'C.V.SARMIENTO1.pdf', 1, '2019-06-14 18:26:14', 80, 'Evo Morales Ayma', 'Cumplio con todo lo que se le pidio', '2019-06-14 18:27:47'),
(21, 15, 51, 201965432, 'Sistema Electrico Entrega', 'IMG_4594.jpg', 1, '2019-06-14 18:33:50', 40, 'Evo Morales Ayma', 'Excelente progreso apesar de tener dificultad', '2019-06-14 18:35:01'),
(22, 17, 62, 21021, 'tarea', 'tareaRec1.txt', 1, '2019-06-17 06:40:18', 74, 'Aux R2 recuperatorio', 'asfdfasdas', '2019-06-17 06:42:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_i`
--

CREATE TABLE IF NOT EXISTS `practica_i` (
  `COD_SYS` int(11) DEFAULT NULL,
  `ID_PRACTICA_TAREA` int(11) DEFAULT NULL,
  `ID_PRACTICA` int(11) NOT NULL,
  `NOMBRE_PRACTICA` varchar(150) DEFAULT NULL,
  `NOMBRE_FICHERO` varchar(150) DEFAULT NULL,
  `NOTA_PRACTICA` int(11) DEFAULT NULL,
  `ASISTENCIA` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `practica_i`
--

INSERT INTO `practica_i` (`COD_SYS`, `ID_PRACTICA_TAREA`, `ID_PRACTICA`, `NOMBRE_PRACTICA`, `NOMBRE_FICHERO`, `NOTA_PRACTICA`, `ASISTENCIA`) VALUES
(223311, 1, 1, 'Avance uno', 'Whats.jpeg', 90, 0),
(1542, 1, 2, 'smash', 'Informe SB.docx', 80, 1),
(1542, 3, 3, 'practica 1', 'lifecycle.pdf', 100, 1),
(1542, 2, 4, 'Cinema', 'CINEMATICA.docx', 98, 1),
(1542, 3, 5, 'Base 1', 'introduccionBase1.docx', 98, 1),
(223311, 2, 6, 'Modelo', 'modelo conceptual.docx', 0, 0),
(1542, 4, 7, 'informe', 'doc.pdf', 0, 0),
(1542, 1, 8, 'wow', '2-12-1-PB.pdf', 85, 1),
(1542, 6, 9, 'informess', 'informeee.docx', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_tarea`
--

CREATE TABLE IF NOT EXISTS `practica_tarea` (
`ID_PRACTICA_TAREA` int(11) NOT NULL,
  `COD_GRUPO` varchar(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NOMBRE_PRACTI` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `HORA_FECHA_ENTREGA` date NOT NULL,
  `FECHA_SUBID` datetime DEFAULT NULL,
  `NOMBRE_FICHEROT` varchar(70) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `practica_tarea`
--

INSERT INTO `practica_tarea` (`ID_PRACTICA_TAREA`, `COD_GRUPO`, `NOMBRE_PRACTI`, `HORA_FECHA_ENTREGA`, `FECHA_SUBID`, `NOMBRE_FICHEROT`) VALUES
(7, 'pro', 'Scrum separado', '2019-06-23', '2019-06-09 19:39:11', 'trabajo de base de datos 1.docx'),
(8, 'pro', 'Xp', '2019-06-17', '2019-06-09 19:42:09', '1.txt'),
(9, 'tel', 'Capas de osi', '2019-06-23', '2019-06-09 19:51:18', 'osi.txt'),
(10, 'pro', 'Practica 2 Procesos', '2019-06-13', '2019-06-09 20:32:29', '9.txt'),
(11, 'mach', 'Nuevas tecnologias', '2019-06-10', '2019-06-09 21:18:43', 'CARA.docx'),
(12, 'mach', 'Practica 3 Mac', '2019-06-15', '2019-06-10 05:22:31', 'WhatsApp Image 2018-11-29 at 6.29.59 PM (5).jpeg'),
(13, 'rec', 'Vectorial', '2019-06-28', '2019-06-14 17:32:22', 'reporte-tipo-pasajero-suben-bajan.pdf'),
(14, 'cir', 'Sistemas Paralelos', '2019-06-25', '2019-06-14 18:24:05', 'Sistemas Paralelos.pdf'),
(15, 'cir', 'Sistema Electrico', '2019-06-20', '2019-06-14 18:32:30', 'tabla de multiplicar .pdf'),
(16, '200c', 'Resistencia grafica', '2019-06-19', '2019-06-16 21:50:31', 'NP_2016_79.pdf'),
(17, 'rec2', 'PRec2', '2019-06-20', '2019-06-17 06:38:43', 'PRec2.txt'),
(18, 'rec1', 'PRec1', '2019-06-20', '2019-06-17 06:39:24', 'PRec1.txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_tarea_i`
--

CREATE TABLE IF NOT EXISTS `practica_tarea_i` (
  `COD_GRUPO` varchar(10) DEFAULT NULL,
  `ID_PRACTICA_TAREA` int(11) NOT NULL,
  `NOMBRE_PRACTI` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `practica_tarea_i`
--

INSERT INTO `practica_tarea_i` (`COD_GRUPO`, `ID_PRACTICA_TAREA`, `NOMBRE_PRACTI`) VALUES
('elem', 1, 'Backtracking'),
('elem', 2, 'recursividad con for'),
('elem1', 3, 'wow'),
('elem', 4, 'ejemplo'),
('elem', 5, 'ejemplo2'),
('inge', 6, 'Scrum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`ID_ROL` int(11) NOT NULL,
  `ROL` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `ROL`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'Auxiliar'),
(4, 'Estudiante'),
(5, 'Verde'),
(6, 'Ayudante de auxiliar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
`ID_SESION` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `COD_SYS` int(11) NOT NULL,
  `FECHA` datetime DEFAULT NULL,
  `HORA_CONECT` datetime DEFAULT NULL,
  `HORA_DISCONNECT` datetime DEFAULT NULL,
  `ASISTENCIA` tinyint(1) NOT NULL DEFAULT '1',
  `ACTIVIDADES` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`ID_SESION`, `ID_USUARIO`, `COD_SYS`, `FECHA`, `HORA_CONECT`, `HORA_DISCONNECT`, `ASISTENCIA`, `ACTIVIDADES`) VALUES
(30, 40, 223344, '2019-06-09 19:36:51', '2019-06-09 19:36:51', '2019-06-09 19:38:00', 1, NULL),
(31, 40, 223344, '2019-06-09 19:43:07', '2019-06-09 19:43:07', '2019-06-09 19:44:29', 1, NULL),
(32, 42, 234567890, '2019-06-09 19:51:25', '2019-06-09 19:51:25', '2019-06-09 19:52:03', 1, NULL),
(33, 43, 2100, '2019-06-09 19:53:11', '2019-06-09 19:53:11', '2019-06-09 19:57:00', 1, NULL),
(34, 40, 223344, '2019-06-09 20:00:34', '2019-06-09 20:00:34', '2019-06-09 20:00:37', 1, NULL),
(36, 40, 223344, '2019-06-09 20:09:01', '2019-06-09 20:09:01', '2019-06-09 20:13:08', 1, NULL),
(37, 40, 223344, '2019-06-09 20:22:25', '2019-06-09 20:22:25', '2019-06-09 20:28:07', 1, NULL),
(38, 42, 234567890, '2019-06-09 20:37:08', '2019-06-09 20:37:08', '2019-06-09 20:42:46', 1, NULL),
(39, 40, 223344, '2019-06-09 20:48:59', '2019-06-09 20:48:59', '2019-06-09 21:04:09', 1, NULL),
(41, 40, 223344, '2019-06-09 21:04:13', '2019-06-09 21:04:13', '2019-06-09 21:04:21', 1, NULL),
(42, 43, 2100, '2019-06-09 21:04:38', '2019-06-09 21:04:38', '2019-06-09 21:05:38', 1, NULL),
(43, 42, 234567890, '2019-06-09 21:05:47', '2019-06-09 21:05:47', '2019-06-09 21:11:10', 1, NULL),
(44, 46, 201208654, '2019-06-09 21:06:21', '2019-06-09 21:06:21', '2019-06-09 21:08:35', 1, NULL),
(45, 40, 223344, '2019-06-09 21:11:32', '2019-06-09 21:11:32', '2019-06-09 21:22:49', 1, NULL),
(46, 40, 223344, '2019-06-09 21:24:00', '2019-06-09 21:24:00', '2019-06-09 21:24:04', 1, NULL),
(47, 43, 2100, '2019-06-09 21:24:09', '2019-06-09 21:24:09', '2019-06-09 21:24:14', 1, NULL),
(48, 46, 201208654, '2019-06-09 21:24:22', '2019-06-09 21:24:22', '2019-06-09 21:37:30', 1, NULL),
(51, 40, 223344, '2019-06-09 21:42:47', '2019-06-09 21:42:47', '2019-06-09 21:43:22', 1, NULL),
(55, 40, 223344, '2019-06-09 22:56:53', '2019-06-09 22:56:53', '2019-06-09 22:58:11', 1, NULL),
(56, 46, 201208654, '2019-06-09 23:04:50', '2019-06-09 23:04:50', '2019-06-09 23:05:57', 1, NULL),
(57, 40, 223344, '2019-06-09 23:06:00', '2019-06-09 23:06:00', '2019-06-09 23:06:47', 1, NULL),
(59, 40, 223344, '2019-06-10 04:32:36', '2019-06-10 04:32:36', '2019-06-10 04:32:53', 1, NULL),
(60, 43, 2100, '2019-06-10 04:33:54', '2019-06-10 04:33:54', '2019-06-10 04:34:29', 1, NULL),
(61, 46, 201208654, '2019-06-10 04:35:08', '2019-06-10 04:35:08', '2019-06-10 04:35:44', 1, NULL),
(62, 43, 2100, '2019-06-10 04:35:51', '2019-06-10 04:35:51', '2019-06-10 04:35:56', 1, NULL),
(63, 40, 223344, '2019-06-10 04:35:59', '2019-06-10 04:35:59', '2019-06-10 04:39:50', 1, NULL),
(64, 47, 201456789, '2019-06-10 05:18:33', '2019-06-10 05:18:33', '2019-06-10 05:26:48', 1, NULL),
(66, 40, 223344, '2019-06-10 05:56:18', '2019-06-10 05:56:18', '2019-06-10 05:56:36', 1, NULL),
(67, 40, 223344, '2019-06-10 06:04:49', '2019-06-10 06:04:49', '2019-06-10 06:05:07', 1, NULL),
(68, 46, 201208654, '2019-06-10 06:05:14', '2019-06-10 06:05:14', '2019-06-10 06:06:31', 1, NULL),
(69, 40, 223344, '2019-06-10 06:17:51', '2019-06-10 06:17:51', '2019-06-10 06:33:56', 1, NULL),
(70, 40, 223344, '2019-06-10 06:36:58', '2019-06-10 06:36:58', '2019-06-10 06:43:12', 1, NULL),
(72, 40, 223344, '2019-06-10 07:53:24', '2019-06-10 07:53:24', '2019-06-10 07:54:04', 1, NULL),
(76, 40, 223344, '2019-06-13 06:24:57', '2019-06-13 06:24:57', '2019-06-13 06:25:30', 1, NULL),
(77, 40, 223344, '2019-06-13 06:30:18', '2019-06-13 06:30:18', '2019-06-13 06:35:20', 1, NULL),
(82, 40, 223344, '2019-06-14 14:44:27', '2019-06-14 14:44:27', '2019-06-14 14:47:22', 1, NULL),
(83, 40, 223344, '2019-06-14 15:27:01', '2019-06-14 15:27:01', '2019-06-14 15:27:08', 1, NULL),
(84, 40, 223344, '2019-06-14 15:30:19', '2019-06-14 15:30:19', '2019-06-14 15:32:40', 1, NULL),
(85, 40, 223344, '2019-06-14 15:33:53', '2019-06-14 15:33:53', '2019-06-14 15:34:29', 1, NULL),
(87, 40, 223344, '2019-06-14 16:05:03', '2019-06-14 16:05:03', '2019-06-14 16:05:08', 1, NULL),
(88, 40, 223344, '2019-06-14 16:15:35', '2019-06-14 16:15:35', '2019-06-14 16:20:40', 1, NULL),
(90, 40, 223344, '2019-06-14 17:21:00', '2019-06-14 17:21:00', '2019-06-14 17:21:55', 1, NULL),
(91, 40, 223344, '2019-06-14 17:22:41', '2019-06-14 17:22:41', '2019-06-14 18:16:28', 1, NULL),
(92, 51, 201965432, '2019-06-14 18:25:09', '2019-06-14 18:25:09', '2019-06-14 18:26:59', 1, NULL),
(93, 51, 201965432, '2019-06-14 18:32:42', '2019-06-14 18:32:42', '2019-06-14 18:33:57', 1, NULL),
(94, 40, 223344, '2019-06-16 17:57:19', '2019-06-16 17:57:19', '2019-06-16 17:57:32', 1, NULL),
(95, 40, 223344, '2019-06-16 21:56:00', '2019-06-16 21:56:00', '2019-06-16 22:05:50', 1, NULL),
(96, 40, 223344, '2019-06-17 03:28:11', '2019-06-17 03:28:11', NULL, 1, NULL),
(97, 40, 223344, '2019-06-17 06:10:27', '2019-06-17 06:10:27', '2019-06-17 06:23:56', 1, NULL),
(98, 62, 21021, '2019-06-17 06:31:27', '2019-06-17 06:31:27', '2019-06-17 06:32:38', 1, NULL),
(99, 63, 312, '2019-06-17 06:32:49', '2019-06-17 06:32:49', '2019-06-17 06:34:18', 1, NULL),
(100, 62, 21021, '2019-06-17 06:34:26', '2019-06-17 06:34:26', '2019-06-17 06:43:28', 1, NULL),
(101, 71, 7896532, '2019-06-17 06:40:50', '2019-06-17 06:40:50', '2019-06-17 06:40:59', 1, NULL),
(102, 40, 223344, '2019-06-17 06:56:00', '2019-06-17 06:56:00', '2019-06-17 07:01:49', 1, NULL),
(103, 74, 2014856, '2019-06-17 07:02:46', '2019-06-17 07:02:46', NULL, 1, NULL),
(104, 40, 223344, '2019-06-20 22:55:43', '2019-06-20 22:55:43', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`ID_USUARIO` int(11) NOT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `CORREO` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PASSWORD` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NOMBRES` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `APELLIDOS` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `DIRECCION` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `ID_ROL`, `CORREO`, `PASSWORD`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `DIRECCION`, `ESTADO`) VALUES
(2, 2, 'doc@gmail.com', '$2y$10$pjp7bmVaq94zmIuIajRDOuphmCDrTgfAkXQkhuLv0KIfJtClhflzy', 'David', 'Escalera', 60345123, 'buenos aires', 0),
(4, 1, 'adm@gmail.com', '$2y$10$UT0yEg8wOPrHZ9fo7h533OW9T7tpJdQw.9Z1OgLC56AZM2deCzS8K', 'rodrigo', 'Salazar', 777, 'capitan ustariz', 0),
(8, 2, 'leti@gmail.com', '$2y$10$6sJZ6N2oM7VsNRxqowvCwefxcabPX0uI2BAFyZDnL/yXm04.l0CDq', 'Leticia ', 'Blanco Coca', 70256458, 'av.pando/567', 0),
(15, 2, 'prueba5@gmail.com', '$2y$10$7EAJTO15Gf1FiwOW8ogFXuKkjOAWjtre3QKmv5ECA02PnGpGdtM4m', 'prueba', 'prueba', 6655, 'av prueba', 1),
(16, 2, 'prueba6@gmail.com', '$2y$10$CTpZntpA70nreBGpuGnJV./SB7rLc3SU.vpqZblhzffLS9aXmqG9C', 'prueba 2', 'prueba ', 456, 'av prueba', 1),
(21, 1, 'adm1@gmail.com', '$2y$10$BOkyWvjeUi8Gg0th4A5nSe6cFUDMrKF.w.A4ITqDcuHrbuoZVtKQS', 'Ronald', 'Cuellar', 777, 'capitan ustariz', 1),
(22, 2, 'masst@gmail.com', '$2y$10$CXvRl5sHhNYO4q.L3y0YHe35i4n/j91iC2dvt2edEu8jEWxO1N7mq', 'Ronald', 'Cuellar', 777, 'capitan ustariz', 1),
(27, 2, 'pat@gmail.com', '$2y$10$tNdSZcM.t80MTGDR9C.K7uIM60jjeV3HA.6LB.pRPtD/0UaIsVMy2', 'Patricia', 'Claros', 77886655, 'Av. Petrolera', 1),
(30, 2, 'dan@gmail.com', '$2y$10$l/lYjEHRijw6lsr7dp4qUedIfpQnokGAkdYOUgkWyk2uQklePwLFe', 'daniel', 'n', 1245, 'republica', 1),
(33, 1, 'adm2@gmail.com', '$2y$10$oHg90ChVN7MVUKwGEnW1Y.GGS//4s9ketKYTB9DWV4UswZwmzLLWO', 'Ronald', 'Miranda', 777, 'rhode', 1),
(38, 2, 'car@gmail.com', '$2y$10$55NfxnZixFUCiq/G9/NfD.IEP474pw/n19RQy.ozb.6.Z8jU6Mu4K', 'Carola', 'Chavez', 66778899, 'Av. espaÃ±a', 1),
(39, 3, 'jos@gmail.com', '$2y$10$0bm.x7IG4as2hGlbtRP48uBRvOdEJQyjW8Hl9sN3jCYEESfO3VfAy', 'Josefina', 'Claros', 77889966, 'Av. Villazon', 1),
(40, 4, 'est@gmail.com', '$2y$10$dnozAGKhK.5/IJPuOFpnk.sOqloAYb/k0QK76iAdWUBz/wOVV5G.K', 'javier', 'Cardona', 777, 'oquendo', 1),
(41, 3, 'aux@gmail.com', '$2y$10$MEeqUTtKoWecTRkjQbGI8OO6mbgMVnWN.XhD9XB4arMBcfp.oQkp.', 'Dark', 'Vel', 333222, 'oquendo', 1),
(42, 4, 'wen@gmail.com', '$2y$10$KxYqmIPYc.83q/Q8Yk.Zaesjy4nIlVSdhhH6P7UO3saEQ1UDaxLeG', 'Wenddy', 'Zelaya', 7899988, 'Av. Villazon', 1),
(43, 4, 'est1@gmail.com', '$2y$10$bgiacUSRYT3ttHUj.DlN/.LpFibN4XRCjvr8o/Rq8XnkVHWh3L.rO', 'Ronald', 'Miranda', 777, 'Capitan ustariz', 1),
(44, 3, 'val@gmail.com', '$2y$10$Wg98JRLZJvUYvuOjSp1yS.o9YijrTXkht6SgaFkVnGSDVeecWffG2', 'Valeria', 'Sol', 65788900, 'Av. espaÃ±a', 1),
(45, 3, 'nay@gmail.com', '$2y$10$NC/ITgE4xGUa1iuQXCq/iuWZHys3z0ZnxkSjZ0q1jW0vISSs8HaUm', 'Nayeli Andrea', 'Gamboa Illanes ', 46578543, 'Av.Heroes del Chaco', 1),
(46, 4, 'wil@gmail.com', '$2y$10$rVtZkw.zc38nyBP9/1BekuIINybJkxkBZIybGd4Tpygknhg2Sx8pW', 'Wilson', 'Chavez', 45467890, 'Av.Ingavi', 1),
(47, 4, 'ser@gmail.com', '$2y$10$Rgj0RPMStVLQ861K8Y3uiu7reVMYmSSPRRtpoAflycbN6ysI1HXHu', 'Sergio', 'Sarmiento', 66555444, 'Av. Suecia', 1),
(48, 2, 'ros@gmail.com', '$2y$10$X62mF2DLadsczjH4Uzi5U.BZkzJvVfq63o9zdPKpaCI8RbkEmfQ.y', 'Rosemary', 'Torrico', 42789543, 'Av.Villazon', 1),
(49, 3, 'ger@gmail.com', '$2y$10$YPoFaQoOYT9APBEJo48CBelpkAcfNRFrb.u.2HSaJS4.vSBpssj6O', 'Gerardo ', 'Zeballos', 45685432, 'Av.Cochabamba', 1),
(50, 3, 'aux2@gmail.com', '$2y$10$WoIErPqWP9xe0W53GyqbF.oAnJAd.jxAkJ8AOFKZ5vDA9t5SdoJI2', 'Juan', 'Quintana', 12223, 'fanboy', 1),
(51, 4, 'carlis@gmail.com', '$2y$10$9liiPp/C/.0HEZJv5sfc7eyZBu9vOg9eTSA1GDwAljGEO9Vhs3MT6', 'Carla ', 'Balanza', 43567543, 'Av.Jumbolt', 1),
(52, 3, 'evo@gmail.com', '$2y$10$DTKYSHLy59bItOBRdeTSl.nAUMeBTiF.DGE1/g7n8LD8CLPJLWAaq', 'Evo', 'Morales Ayma', 45678543, 'Calle Nestor Claure', 1),
(53, 3, 'aux3@gmail.com', '$2y$10$6YB.NtUbQj2QJXdjota1dOxD8JvGV8Thdfhgy7SB5ozwgbSxuWRu2', 'Demetrio', 'Cenelas Farfan', 4444233, 'av. Ecologica', 1),
(54, 3, 'aux4@gmail.com', '$2y$10$TObDashTsodJlPXjkDf7BO6K75H4TsbGpl7W8g4skM.I.f8cDSzPi', 'Daniel ', 'Santos Santander', 5666466, 'Av. Linde', 1),
(55, 2, 'doc5@gmail.com', '$2y$10$l351dDiMYhDMyU5pqQloD.bk303x0P/w85F851nYivbaRda0ruSeq', 'Doc R1', 'recuperatorio', 4551222, 'Av Oquendo', 1),
(56, 2, 'doc6@gmail.com', '$2y$10$Ka.w7/cgvnolY7VGPE55s.SnigVnLhqUzzaDriTcHpx3zDSCOEG66', 'Doc R2', 'recupera', 4555112, 'Av Oquendo', 1),
(57, 2, 'r3@gmail.com', '$2y$10$gVqbMNe8RUD3i63OoymVp.rnJa/VshpMgKbk0JsFEc3mEldSDoQxK', 'DocR3', 'R2', 62589426, 'av. Villazon', 1),
(58, 3, 'aux10@gmail.com', '$2y$10$3RriS2q9UQ7JLUMGRZyL5uMR6qh2w5VG/VYpckclw.JElkwN47Q5e', 'Aux R1', 'recupera', 4512122, 'Av Oquendo', 1),
(59, 2, 'doce@gmail.com', '$2y$10$KNnGM0T8Obo1eKNg5Rh62OzskLgYE20GKaXTqMe3MmH/S08.KECSa', 'Recuperatorio Doc R3', 'Alvarez', 65235456, 'av. Villazon', 1),
(60, 3, 'aux11@gmail.com', '$2y$10$LolPA2s7lyupdMRVoNDTOOd/ekCXT7Uo/Fmt6TRV54DurLNxk6Phi', 'Aux R2', 'recuperatorio', 1411, 'Av Oquendo', 1),
(61, 2, 'R4@gmail.com', '$2y$10$GVVlY0I8JjzmxUOliWO7feot9M5lrp5Wztr5v4itaMvyw7Z9jlubi', 'DocR4', 'Perez', 78936545, 'Av. Petrolera', 1),
(62, 4, 'est5@gmail.com', '$2y$10$c0gQKWw0glNLfklpWjxf3eSrEgbRbN0oEgWfLZASOQxLXlTCGuEx2', 'Est1GDocR1', 'recu', 111, 'av oquendo', 1),
(63, 4, 'est6@gmail.com', '$2y$10$fW1/fyJu3YhLMU1365Qps.FSGZfFgDJvbzQx0HV/Cr4qWw3cLa/sW', 'Est2GDocR1', 'recu', 1122, 'av oquendo', 1),
(64, 4, 'est7@gmail.com', '$2y$10$A6XWTwY90JTJdqkvNUxyTeGbM5GBaOAJFb91XEiGkSvXcQ5nFW/Oi', 'Est1GDocR2', 'recu', 1214, 'av oquendo', 1),
(65, 3, 'auxR1@gmail.com', '$2y$10$XJNkpLqAn0yX1oVxzCYkR.cF3Ir1pC87qyQcke1ttWjOZks5/KEXW', 'AuxR1', 'Lopez', 67479893, 'Av. Sebastian', 1),
(66, 4, 'est8@gmail.com', '$2y$10$pkzhQvpUv3VdTDt0fd3PEuiYvfCmRutWWBpvb3tPCX8Wp41CPt7Da', 'Est2GDocR2', 'recu', 144, 'av oquendo', 1),
(67, 3, 'auxR2@gmail.com', '$2y$10$YqkyTbf6cq0So6yHaSnvyuDD/60PLB/X6p1C4nAdfAa2chHxO2ZMe', 'AuxR2', 'Sanchez', 68521472, 'Av. Arce', 1),
(68, 3, 'auxR11@gmaiol.com', '$2y$10$huS7T2Io1ecZFfYnKJAP5e.JzKgeuUAy6NTP3ws8zwOLg4dYaiYtq', 'Aux R1', 'Alcon', 78965436, 'Av. Calama', 1),
(69, 3, 'auxR22@gmail.com', '$2y$10$HoMxEBUHGpcLmpHR9MhzAe..R1yvpVFfCWU4BUVhusJS/ydVKgYpW', 'Aux R2', 'Delgadillo', 78546258, 'Av. Colombia', 1),
(70, 4, 'est9@gmail.com', '$2y$10$/TcstWSWOpVsW415OvJKMOGw/A/Mm9.pj/gLbGK1nxDuTbmVLJw16', 'Est1GDocR1', 'Recuperacion', 78965412, 'Av. Cocha', 1),
(71, 4, 'est10@gmail.com', '$2y$10$bbb3/wy2dnMJCyV6p/Z2qeWmZItBvuBNEuMVCkYLXkP3nFZ0swjQG', 'Est1GDocR2', 'Chacon', 78965423, 'Av. Colomi', 1),
(72, 4, 'est11@gmail.com', '$2y$10$kj2HLfjdKRep8qT2Rk5TcOJd3V5VQo3ao0cZ0YJSIJTAVwdeY.RYu', 'Est1DocR2', 'PeÃ±a', 7564325, 'Av. colon', 1),
(73, 4, 'est12@gmail.com', '$2y$10$3xWj9MK4nCm6TmKi500GL.5xaxFF8b8.af9KLTAi8tGMxro2/A5h.', 'Est2GDocR2', 'Acosta', 7896542, 'Av. Colomi', 1),
(74, 4, 'est13@gmail.com', '$2y$10$K/rx9SMxIZY3Hjs81gi6FO5FXZ3TQiVn/gBEiyGIH80m1nArEV5sa', 'Est3DocR4', 'Alvarez', 78965423, 'Av. Colomi', 1),
(75, 4, 'est14@gmail.com', '$2y$10$qV1JSWogHVLLQ10/9tmZD.TJW63l5T6KHa2Rj5w6/q1BXkr2rSGS.', 'Est3GDocR3', 'Acosta', 78520256, 'av. Villazon', 1),
(76, 4, 'est15@gmail.com', '$2y$10$ubexIYhO9RX27r21UD4pyOr6M1fHIoySXJk5BtdBAo8LaVR1u78gK', 'Est3DocR4', 'Beni', 7598632, 'Av. Petrolera', 1),
(77, 4, 'est16@gmail.com', '$2y$10$qh.hCcFjuKYB8O6vEQVB7.UzbhgRYnpXburbJRP0EtljUaZiF9fmW', 'Est4GDocR4', 'Chacon', 785236, 'Av. Colomi', 1),
(78, 3, 'auxR3@gmail.com', '$2y$10$xzypo8OgyVDYxuebxLZJyugX1Xzry5kh8qYduRNtSxyu8wKEoq.zu', 'Aux 3', 'acero', 78965, 'Av. Petrolera', 1),
(79, 3, 'auxR4@gmail.com', '$2y$10$O3Ezlu8VhCfnvy159rShweqvKK6nOkmP/Z7dzK2EtaWKvGOfKpQXe', 'Aux 4', 'Perez', 7843965, 'Av. colon', 1),
(80, 2, 'Rec4@gmail.com', '$2y$10$6GQhbmefBlYd.AA9QNpnCOSphZlvhaokQBe1QaSnHRWTa1mWhxupm', 'R4', 'Acosta', 784365, 'Av. Arce', 1),
(81, 3, 'aux16@gmail.com', '$2y$10$85ipVVbyKZdnCVnifeAL6egpDNP4fYk9O74vnOWTc5r4OW7bYR/KW', 'aux3', 'Chacon', 784569325, 'Av. Arce', 1),
(82, 4, 'carlosroti21@hotmail.com', '$2y$10$7dIVeoDnk5wRxioH.yImQe5MwyMxNwqQsJrF8cEi1a7JZqW4SFIb2', 'Carlos', 'Quintana', 435, 'gu', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adaministrador`
--
ALTER TABLE `adaministrador`
 ADD PRIMARY KEY (`ID_USUARIO`,`COD_ADMIN`);

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
 ADD PRIMARY KEY (`ID_USUARIO`,`COD_AUXILIAR`);

--
-- Indices de la tabla `auxiliar_i`
--
ALTER TABLE `auxiliar_i`
 ADD PRIMARY KEY (`COD_AUXILIAR`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
 ADD PRIMARY KEY (`ID_USUARIO`,`COD_DOCENTE`);

--
-- Indices de la tabla `docente_auxiliar`
--
ALTER TABLE `docente_auxiliar`
 ADD UNIQUE KEY `ID_USUARIO` (`ID_USUARIO`), ADD KEY `FK_RELATIONSHIP_28` (`ID_USUARIO`,`COD_AUXILIAR`), ADD KEY `FK_RELATIONSHIP_29` (`DOC_ID_USUARIO`,`COD_DOCENTE`);

--
-- Indices de la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
 ADD UNIQUE KEY `ID_USUARIO` (`ID_USUARIO`,`COD_DOCENTE`,`ID_MATERIA`), ADD KEY `FK_RELATIONSHIP_21` (`ID_USUARIO`,`COD_DOCENTE`), ADD KEY `FK_RELATIONSHIP_24` (`ID_MATERIA`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
 ADD PRIMARY KEY (`ID_USUARIO`,`COD_SYS`);

--
-- Indices de la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
 ADD PRIMARY KEY (`ID_USUARIO`,`COD_SYS`,`COD_GRUPO`), ADD KEY `FK_RELATIONSHIP_20` (`COD_GRUPO`);

--
-- Indices de la tabla `estudiante_grupo_i`
--
ALTER TABLE `estudiante_grupo_i`
 ADD PRIMARY KEY (`COD_SYS`,`COD_GRUPO`), ADD KEY `FK_76` (`COD_GRUPO`);

--
-- Indices de la tabla `estudiante_i`
--
ALTER TABLE `estudiante_i`
 ADD PRIMARY KEY (`COD_SYS`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`COD_GRUPO`), ADD UNIQUE KEY `ID_USUARIO` (`ID_USUARIO`), ADD KEY `FK_RELATIONSHIP_14` (`ID_MATERIA`), ADD KEY `FK_RELATIONSHIP_17` (`DOC_ID_USUARIO`,`COD_DOCENTE`), ADD KEY `FK_RELATIONSHIP_18` (`ID_USUARIO`,`COD_AUXILIAR`), ADD KEY `FK_RELATIONSHIP_60` (`ID_LABORATORIO`);

--
-- Indices de la tabla `grupo_i`
--
ALTER TABLE `grupo_i`
 ADD PRIMARY KEY (`COD_GRUPO`), ADD KEY `FK_75` (`COD_AUXILIAR`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
 ADD UNIQUE KEY `COD_GRUPO` (`COD_GRUPO`), ADD KEY `FK_RELATIONSHIP_23` (`COD_GRUPO`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
 ADD PRIMARY KEY (`ID_LABORATORIO`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
 ADD PRIMARY KEY (`ID_MATERIA`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
 ADD PRIMARY KEY (`ID_PORTAFOLIO`), ADD KEY `FK_RELATIONSHIP_61` (`ID_USUARIO`,`COD_SYS`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
 ADD PRIMARY KEY (`ID_PRACTICA`), ADD KEY `FK_RELATIONSHIP_22` (`ID_USUARIO`,`COD_SYS`), ADD KEY `FK_RELATIONSHIP_27` (`ID_PRACTICA_TAREA`);

--
-- Indices de la tabla `practica_i`
--
ALTER TABLE `practica_i`
 ADD PRIMARY KEY (`ID_PRACTICA`), ADD KEY `FK_73` (`COD_SYS`), ADD KEY `FK_RELATIONSHIP_74` (`ID_PRACTICA_TAREA`);

--
-- Indices de la tabla `practica_tarea`
--
ALTER TABLE `practica_tarea`
 ADD PRIMARY KEY (`ID_PRACTICA_TAREA`), ADD KEY `FK_RELATIONSHIP_26` (`COD_GRUPO`);

--
-- Indices de la tabla `practica_tarea_i`
--
ALTER TABLE `practica_tarea_i`
 ADD PRIMARY KEY (`ID_PRACTICA_TAREA`), ADD KEY `FK_74` (`COD_GRUPO`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
 ADD PRIMARY KEY (`ID_SESION`), ADD KEY `FK_RELATIONSHIP_15` (`ID_USUARIO`,`COD_SYS`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`ID_USUARIO`), ADD KEY `FK_RELATIONSHIP_7` (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
MODIFY `ID_LABORATORIO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
MODIFY `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
MODIFY `ID_PORTAFOLIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
MODIFY `ID_PRACTICA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `practica_tarea`
--
ALTER TABLE `practica_tarea`
MODIFY `ID_PRACTICA_TAREA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
MODIFY `ID_SESION` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adaministrador`
--
ALTER TABLE `adaministrador`
ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `docente_auxiliar`
--
ALTER TABLE `docente_auxiliar`
ADD CONSTRAINT `FK_RELATIONSHIP_28` FOREIGN KEY (`ID_USUARIO`, `COD_AUXILIAR`) REFERENCES `auxiliar` (`ID_USUARIO`, `COD_AUXILIAR`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_29` FOREIGN KEY (`DOC_ID_USUARIO`, `COD_DOCENTE`) REFERENCES `docente` (`ID_USUARIO`, `COD_DOCENTE`);

--
-- Filtros para la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ID_USUARIO`, `COD_DOCENTE`) REFERENCES `docente` (`ID_USUARIO`, `COD_DOCENTE`),
ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`ID_USUARIO`, `COD_SYS`) REFERENCES `estudiante` (`ID_USUARIO`, `COD_SYS`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`COD_GRUPO`) REFERENCES `grupo` (`COD_GRUPO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estudiante_grupo_i`
--
ALTER TABLE `estudiante_grupo_i`
ADD CONSTRAINT `FK_72` FOREIGN KEY (`COD_SYS`) REFERENCES `estudiante_i` (`COD_SYS`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_76` FOREIGN KEY (`COD_GRUPO`) REFERENCES `grupo_i` (`COD_GRUPO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`DOC_ID_USUARIO`, `COD_DOCENTE`) REFERENCES `docente` (`ID_USUARIO`, `COD_DOCENTE`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`ID_USUARIO`, `COD_AUXILIAR`) REFERENCES `auxiliar` (`ID_USUARIO`, `COD_AUXILIAR`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_60` FOREIGN KEY (`ID_LABORATORIO`) REFERENCES `laboratorio` (`ID_LABORATORIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grupo_i`
--
ALTER TABLE `grupo_i`
ADD CONSTRAINT `FK_75` FOREIGN KEY (`COD_AUXILIAR`) REFERENCES `auxiliar_i` (`COD_AUXILIAR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
ADD CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`COD_GRUPO`) REFERENCES `grupo` (`COD_GRUPO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `practica`
--
ALTER TABLE `practica`
ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`ID_USUARIO`, `COD_SYS`) REFERENCES `estudiante` (`ID_USUARIO`, `COD_SYS`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_27` FOREIGN KEY (`ID_PRACTICA_TAREA`) REFERENCES `practica_tarea` (`ID_PRACTICA_TAREA`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_61` FOREIGN KEY (`ID_USUARIO`, `COD_SYS`) REFERENCES `estudiante` (`ID_USUARIO`, `COD_SYS`) ON DELETE CASCADE;

--
-- Filtros para la tabla `practica_i`
--
ALTER TABLE `practica_i`
ADD CONSTRAINT `FK_73` FOREIGN KEY (`COD_SYS`) REFERENCES `estudiante_i` (`COD_SYS`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_74` FOREIGN KEY (`ID_PRACTICA_TAREA`) REFERENCES `practica_tarea_i` (`ID_PRACTICA_TAREA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `practica_tarea`
--
ALTER TABLE `practica_tarea`
ADD CONSTRAINT `FK_RELATIONSHIP_26` FOREIGN KEY (`COD_GRUPO`) REFERENCES `grupo` (`COD_GRUPO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `practica_tarea_i`
--
ALTER TABLE `practica_tarea_i`
ADD CONSTRAINT `FK_74` FOREIGN KEY (`COD_GRUPO`) REFERENCES `grupo_i` (`COD_GRUPO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`ID_USUARIO`, `COD_SYS`) REFERENCES `estudiante` (`ID_USUARIO`, `COD_SYS`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
