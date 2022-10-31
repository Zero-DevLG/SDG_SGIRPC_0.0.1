-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2020 a las 00:51:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `archivo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(4) NOT NULL,
  `id_documento` int(4) NOT NULL,
  `url` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `a_nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_archivo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `id_documento`, `url`, `a_nombre`, `tipo_archivo`) VALUES
(1, 52, '../imagenes/lobo y obeja.docx', '', 0),
(2, 53, '../imagenes/lobo y obeja.docx', '', 0),
(3, 53, '../imagenes/FORMATO CAPACITACION.xlsx', '', 0),
(4, 53, '../imagenes/PADRON INVENTARIAL DE COMPUTADORAS Y NOBREAK 2018.xlsx', '', 0),
(5, 54, '../imagenes/FORMATO CAPACITACION.xlsx', 'FORMATO CAPACITACION.xlsx', 0),
(6, 54, '../imagenes/REQUESICION DE HERRAMIENTA 2911.xlsx', 'REQUESICION DE HERRAMIENTA 2911.xlsx', 0),
(7, 54, '../imagenes/REQUISICIÓN DE UNIFORME DE SEGURIDAD 2721.xlsx', 'REQUISICIÓN DE UNIFORME DE SEGURIDAD 2721.xlsx', 0),
(8, 54, '../imagenes/REQUISICIÓN DE MANGUERA FLEX.  2981.xlsx', 'REQUISICIÓN DE MANGUERA FLEX.  2981.xlsx', 0),
(9, 54, '../imagenes/REQUISICIÓN DE CINTA DOBLE CARA 2111.xlsx', 'REQUISICIÓN DE CINTA DOBLE CARA 2111.xlsx', 0),
(10, 0, '../imagenes/Era un dia como cuaquier otro.docx', 'Era un dia como cuaquier otro.docx', 0),
(11, 14, '../imagenes/Documentación.docx', 'Documentación.docx', 0),
(12, 0, '../imagenes/avance 2.docx', 'avance 2.docx', 0),
(13, 13, '../imagenes/Documentación.docx', 'Documentación.docx', 0),
(14, 0, '../imagenes/DATA CENTER Requisición.docx', 'DATA CENTER Requisición.docx', 0),
(15, 7, '../imagenes/Formato_Hospedaje_Web.docx', 'Formato_Hospedaje_Web.docx', 2),
(16, 18, '../imagenes/11_02_2020.docx', '11_02_2020.docx', 2),
(17, 18, '../imagenes/10_02_2020.docx', '10_02_2020.docx', 2),
(18, 7, '../imagenes/default.gif', 'default.gif', 1),
(19, 7, '../imagenes/Qué es un alma gemela.docx', 'Qué es un alma gemela.docx', 2),
(20, 7, '../imagenes/Array_1590514521', 'Array_1590514521', 1),
(21, 7, '../imagenes/10_02_2020.docx_1590514606', '10_02_2020.docx_1590514606', 1),
(22, 7, '../imagenes/10_02_2020.docx', '10_02_2020.docx', 1),
(23, 7, '../imagenes/11_02_2020.docx', '11_02_2020.docx', 1),
(24, 7, '../imagenes/anotaciones cv.docx', 'anotaciones cv.docx', 2),
(25, 7, '../imagenes/solicitud de correos institucionales SGIRPC.xlsx', 'solicitud de correos institucionales SGIRPC.xlsx', 2),
(26, 7, '../imagenes/Documentación.docx', 'Documentación.docx', 3),
(27, 19, '../imagenes/Repositorio de Contraseñas.docx', 'Repositorio de Contraseñas.docx', 1),
(28, 24, '../imagenes/DATA CENTER Requisición.docx', 'DATA CENTER Requisición.docx', 1),
(29, 25, '../imagenes/Ventas Línea 1 Norte 2019.csv', 'Ventas Línea 1 Norte 2019.csv', 1),
(31, 27, '../imagenes/avance 2.docx', 'avance 2.docx', 1),
(32, 28, '../imagenes/Ventas Línea 1 Norte 2019.csv', 'Ventas Línea 1 Norte 2019.csv', 1),
(38, 30, '../imagenes/Query´s.docx', 'Query´s.docx', 1),
(39, 13, '../imagenes/', '', 1),
(40, 13, '../imagenes/requisicion 2019 2020.docx', 'requisicion 2019 2020.docx', 1),
(41, 29, '../imagenes/', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_dispositivo`
--

CREATE TABLE `catalogo_dispositivo` (
  `id_area` int(2) NOT NULL,
  `area` varchar(100) NOT NULL,
  `direccion` int(4) NOT NULL,
  `titular` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_dispositivo`
--

INSERT INTO `catalogo_dispositivo` (`id_area`, `area`, `direccion`, `titular`) VALUES
(3, 'Informática', 6, 'Luis Gabriel Verdiguel Carrillo'),
(4, 'Coordinacion de Tecnologias de la Informacion', 11, 'Luis Gabriel Verdiguel Carrillo'),
(5, 'Coordinacion de Programas Especiales', 16, 'Arcos'),
(6, 'Solo direccion', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id_cont` int(2) NOT NULL,
  `tipo` int(2) NOT NULL,
  `conteo` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_dir` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id_cont`, `tipo`, `conteo`, `id_dir`) VALUES
(1, 1, 0001, 11),
(2, 1, 0001, 6),
(3, 1, 0022, 15),
(4, 2, 0006, 15),
(5, 2, 0001, 11),
(6, 3, 0007, 15),
(7, 4, 0004, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conteo_direccion`
--

CREATE TABLE `conteo_direccion` (
  `id_direccion` int(4) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `num_folios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(4) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `titular` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id_equipo` int(2) NOT NULL,
  `no_serie` varchar(75) NOT NULL,
  `tipo_equipo` int(2) NOT NULL,
  `resguardo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(4) NOT NULL,
  `n_folio` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_oficio` date NOT NULL,
  `remitente` varchar(100) NOT NULL,
  `cargo_r` varchar(100) NOT NULL,
  `asunto` varchar(300) NOT NULL,
  `tipo_documento` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `n_folio`, `fecha_registro`, `fecha_oficio`, `remitente`, `cargo_r`, `asunto`, `tipo_documento`) VALUES
(1, 'DEAF/0001/2020', '2020-05-15', '2020-05-21', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de conteo 001', '1'),
(2, 'DEAF/0001/2020', '2020-05-15', '0000-00-00', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba aumentando la nota informativa en 1', '2'),
(3, 'DEAF/0002/2020', '2020-05-15', '2020-05-28', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Aumentamos en uno mas la nota informativa', '2'),
(4, 'DEAF//2020', '2020-05-15', '0000-00-00', '', '', '', ''),
(5, 'DEAF/0001/2020', '2020-05-15', '2020-05-28', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de bloqueo de tablas', '3'),
(6, 'DEAF/0001/2020', '2020-05-15', '2020-05-20', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 002 de bloqueo de tablas', '4'),
(7, 'DEAF/0003/2020', '2020-05-15', '2020-05-28', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba sin bloqueo', '1'),
(8, 'DEAF/0004/2020', '2020-05-15', '2020-05-20', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de desbloqueo con interlinea para cada instruccion 001', '1'),
(9, 'DEAF/0005/2020', '2020-05-15', '2020-05-28', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de documento con INNER JOIN 001', '1'),
(10, 'DEAF//2020', '2020-05-15', '0000-00-00', '', '', '', ''),
(11, 'DEAF/0001/2020', '2020-05-16', '0000-00-00', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de log de registro', '3'),
(12, 'DEAF/0006/2020', '2020-05-16', '2020-05-21', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de log 002', '1'),
(13, 'DEAF/0002/2020', '2020-05-16', '2020-05-21', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de log 004', '3'),
(14, 'DEAF/0008/2020', '2020-05-16', '2020-05-21', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de logs 06', '1'),
(15, 'DEAF/0004/2020', '2020-05-16', '0000-00-00', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de logs 07 despues hay reinicio', '3'),
(16, 'DEAF/0003/2020', '2020-05-16', '2020-05-14', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de logs 008 no hay reinicio, faltan mas pruebas', '2'),
(17, 'DEAF/0009/2020', '2020-05-16', '2020-05-21', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 009 logs', '1'),
(18, 'DEAF/0010/2020', '2020-05-16', '2020-05-22', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 010 logs', '1'),
(19, 'DEAF/0011/2020', '2020-05-16', '2020-05-21', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 011 de logs', '1'),
(20, 'DEAF/0012/2020', '2020-05-16', '2020-05-30', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 012 de logs', '1'),
(21, 'DEAF/0004/2020', '2020-05-18', '2020-05-27', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 009', '2'),
(22, 'DEAF/0005/2020', '2020-05-24', '2020-05-20', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de sistema', '3'),
(23, 'DEAF/0013/2020', '2020-05-28', '0000-00-00', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de textos largos llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllldsadsadsadadsadasdsadsadasdsadsadasdsadsdadsdasdsadsadasdsadagggtrynjgjnygnj', '1'),
(24, 'DEAF/0014/2020', '2020-05-28', '0000-00-00', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'overflow-wrap. The overflow-wrap property in CSS allows you to specify that the browser can break a line of text inside the targeted element onto multiple lines in an otherwise unbreakable place. This helps to avoid an unusually long string of text causing layout problems due to overflow.', '1'),
(25, 'DEAF/0002/2020', '2020-06-15', '2020-06-18', 'Prueba', 'Prueba', 'Prueba de documento generado/respuesta 01', '4'),
(26, 'DEAF/0005/2020', '2020-06-15', '2020-06-17', 'Prueba', 'Prueba', 'Prueba 002 Archivo con instruccion', '2'),
(27, 'DEAF/0015/2020', '2020-06-15', '2020-06-26', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de Documento 001', '1'),
(28, 'DEAF/0016/2020', '2020-06-15', '2020-06-17', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 003', '1'),
(29, 'DEAF/0017/2020', '2020-06-15', '2020-06-24', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba 004', '1'),
(30, 'DEAF/0018/2020', '2020-06-16', '2020-06-18', 'Prueba 05', 'Prueba 05', 'Prueba 05', '1'),
(31, 'DEAF/0019/2020', '2020-07-10', '0000-00-00', '', '', '', '1'),
(32, 'DEAF/0006/2020', '2020-07-14', '2020-07-23', 'Paulina', 'Auxiliar Administrativo', 'Prueba de documento ', '3'),
(33, 'DEAF/0020/2020', '2020-07-14', '2020-07-22', 'Paulina', 'Auxiliar Administrativo', 'Prueba 002', '1'),
(34, 'DEAF/0003/2020', '2020-07-14', '2020-07-23', 'Paulina', 'Auxiliar Administrativo', 'Prueba 003 ', '4'),
(35, 'DEAF/0021/2020', '2020-09-09', '0000-00-00', 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de documentos', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_externos`
--

CREATE TABLE `documentos_externos` (
  `id_documento` int(4) NOT NULL,
  `n_oficio` varchar(20) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `tipo_documento` int(4) NOT NULL,
  `fecha_oficio` date NOT NULL,
  `fecha_recibido` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_empleado_r` varchar(4) NOT NULL,
  `id_organismo` int(4) NOT NULL,
  `remitente` varchar(200) NOT NULL,
  `cargo_r` varchar(300) NOT NULL,
  `asunto` varchar(600) NOT NULL,
  `estatus` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos_externos`
--

INSERT INTO `documentos_externos` (`id_documento`, `n_oficio`, `folio`, `tipo_documento`, `fecha_oficio`, `fecha_recibido`, `fecha_registro`, `id_empleado_r`, `id_organismo`, `remitente`, `cargo_r`, `asunto`, `estatus`) VALUES
(1, '', '0', 1, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', 0),
(2, '', '0', 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', 0),
(3, '', '0', 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', 0),
(4, 'MBDEAF-009', '2209', 0, '2020-09-10', '2020-09-18', '2020-09-10', '29', 1, 'Maribel Hernandez', 'Auxiliar Administrativo', 'Prueba cachorrito', 0),
(5, 'RTPDEAF-009', '2230', 0, '2020-09-10', '2020-09-11', '2020-09-10', '29', 2, 'Luis Gabriel Verdiguel Carrillo', 'Coordinador de Tecnologias de la Informacion', 'Prueba de redireccion', 1),
(6, 'MBDEAF-010', '2232', 1, '2020-09-10', '2020-09-11', '2020-09-10', '29', 1, 'Maribel Hernandez', 'Auxiliar Administrativo', 'Prueba cachorrito redireccion', 1),
(7, 'MBDEAF-010', '22304432', 0, '2020-10-09', '2020-10-09', '2020-10-09', '30', 1, 'Prueba 05', 'Prueba 05', '', 0),
(8, 'RTPDEAF-009', '2230', 1, '2020-10-01', '2020-10-13', '2020-10-09', '30', 2, 'Prueba 05', 'Prueba', '', 0),
(9, 'CIV-0292', '22304432', 1, '2020-10-16', '2020-10-13', '2020-10-09', '30', 0, 'Prueba', 'Prueba', '', 0),
(10, 'HKJ-2098', '98765', 1, '2020-10-30', '2020-10-20', '2020-10-09', '30', 0, 'Luis Gabriel Verdiguel Carrillo', 'Prueba 05', '', 0),
(11, 'CIV-0292424', '2232', 0, '2020-10-16', '2020-10-20', '2020-10-09', '30', 0, 'Maribel Hernandez', 'Auxiliar Administrativo', '', 0),
(12, 'MB-123432', '54564', 1, '2020-10-19', '2020-10-20', '2020-10-19', '29', 1, 'Roberto Capuano', 'Director General de Metrobus', 'Solicitud de Operativos', 1),
(13, 'MB-1234565', '54564', 2, '2020-10-21', '2020-09-30', '2020-10-19', '29', 0, 'Roberto Capuano', 'Director General de Metrobus', 'Solicitud de prevencion', 1),
(14, 'MB-2589', '5456489', 3, '2020-10-19', '2020-10-20', '2020-10-19', '29', 1, 'Roberto Capuano', 'Director General de Metrobus', 'Solicitud de videos', 1),
(15, 'RTP-01236', '1489', 2, '2020-10-19', '2020-10-12', '2020-10-19', '29', 2, 'Hector Garcia Morales', 'JUD de Tecnologias', 'Propuesta de vacante', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_ciclo`
--

CREATE TABLE `documento_ciclo` (
  `id_ciclo` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `ubicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documento_ciclo`
--

INSERT INTO `documento_ciclo` (`id_ciclo`, `id_documento`, `estado`, `origen`, `ubicacion`) VALUES
(1, 7, 1, 15, 15),
(2, 8, 1, 15, 15),
(3, 9, 1, 15, 15),
(4, 10, 1, 15, 15),
(6, 13, 1, 15, 15),
(7, 14, 1, 15, 15),
(8, 15, 1, 15, 15),
(9, 16, 1, 15, 15),
(10, 17, 1, 15, 15),
(11, 18, 1, 15, 15),
(12, 19, 1, 15, 15),
(13, 20, 1, 15, 15),
(14, 21, 1, 15, 15),
(15, 14, 4, 15, 11),
(16, 14, 4, 15, 14),
(17, 14, 4, 15, 10),
(18, 22, 1, 15, 15),
(19, 19, 4, 15, 11),
(20, 19, 4, 15, 11),
(21, 23, 1, 15, 15),
(22, 24, 1, 15, 15),
(23, 24, 4, 15, 15),
(24, 24, 4, 15, 15),
(25, 7, 4, 15, 9),
(26, 25, 1, 15, 15),
(27, 26, 1, 15, 15),
(28, 27, 1, 15, 15),
(29, 28, 1, 15, 15),
(30, 29, 1, 15, 15),
(31, 30, 1, 15, 15),
(32, 31, 1, 15, 15),
(33, 32, 1, 15, 15),
(34, 33, 1, 15, 15),
(35, 34, 1, 15, 15),
(36, 35, 1, 15, 15),
(37, 3, 1, 15, 15),
(38, 3, 1, 15, 15),
(39, 3, 1, 15, 15),
(40, 3, 1, 15, 15),
(41, 3, 1, 15, 15),
(42, 3, 1, 15, 15),
(43, 3, 1, 15, 15),
(44, 3, 1, 15, 15),
(45, 3, 1, 15, 15),
(46, 3, 1, 15, 15),
(47, 3, 1, 15, 15),
(48, 3, 1, 15, 15),
(49, 4, 1, 15, 15),
(50, 5, 1, 15, 15),
(51, 6, 1, 15, 15),
(52, 7, 1, 9, 9),
(53, 8, 1, 9, 9),
(54, 9, 1, 9, 9),
(55, 10, 1, 9, 9),
(56, 11, 1, 9, 9),
(57, 12, 1, 9, 9),
(58, 13, 1, 9, 9),
(59, 14, 1, 9, 9),
(60, 15, 1, 9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_instruccion`
--

CREATE TABLE `documento_instruccion` (
  `id_instruccion` int(4) NOT NULL,
  `id_documento` int(4) NOT NULL,
  `direccion` int(2) NOT NULL,
  `area` int(2) NOT NULL,
  `instruccion` int(2) NOT NULL,
  `destinatario` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `cargo_d` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_limite` date NOT NULL,
  `fecha_instruccion` date NOT NULL,
  `prioridad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `documento_instruccion`
--

INSERT INTO `documento_instruccion` (`id_instruccion`, `id_documento`, `direccion`, `area`, `instruccion`, `destinatario`, `cargo_d`, `fecha_limite`, `fecha_instruccion`, `prioridad`) VALUES
(5, 15, 11, 4, 6, 'Prueba', 'Prueba', '2020-05-27', '2020-05-18', 0),
(6, 13, 9, 0, 5, 'Usuario Prueba', 'Cargo Prueba', '2020-05-20', '2020-05-19', 0),
(7, 19, 14, 0, 5, 'Usuario Prueba 2', 'Usuario prueba 2', '0000-00-00', '2020-05-19', 0),
(8, 15, 10, 0, 7, 'Prueba con logs', 'Prueba con logs', '2020-05-21', '2020-05-20', 0),
(9, 21, 15, 6, 7, 'Prueba con logs 02', 'logs 02', '2020-06-04', '2020-05-20', 0),
(10, 13, 11, 4, 8, 'folio 01', 'folio 01', '2020-05-14', '2020-05-20', 0),
(11, 14, 11, 4, 6, 'Luis Gabriel Verdiguel Carrillo', 'Coordinador del area de Tecnologias de la Informacion', '2020-05-28', '2020-05-20', 0),
(12, 14, 14, 6, 7, 'Prueba alerta Temprana', 'Prueba Alerta Temprana', '2020-05-28', '2020-05-22', 0),
(13, 14, 10, 6, 8, 'Prueba tactico operativo', 'Prueba tactico operativo', '2020-06-23', '2020-05-23', 0),
(14, 19, 11, 4, 6, 'Luis Gabriel', 'Prueba', '2065-02-17', '2020-05-26', 0),
(15, 19, 11, 0, 5, 'Prueba de archivo', 'Prueba de archivo', '2020-05-29', '2020-05-26', 0),
(16, 24, 15, 6, 8, 'Marco Antonio Lopez', 'J.U.D de compras', '2020-05-29', '2020-05-28', 0),
(17, 24, 15, 6, 6, 'Marco', 'JUD', '2020-05-21', '2020-05-28', 0),
(18, 7, 9, 0, 5, '', '', '0000-00-00', '2020-06-15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `puesto` int(2) NOT NULL,
  `edad` int(2) NOT NULL,
  `activo` int(2) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL,
  `area` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `plataforma` int(11) NOT NULL,
  `n_empleado` int(4) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `puesto`, `edad`, `activo`, `foto`, `usuario`, `password`, `tipo_usuario`, `area`, `direccion`, `plataforma`, `n_empleado`, `last_login`) VALUES
(22, 'Luis Gabriel', 'Verdiguel Carrillo', 0, 29, 1, '1575586632_1024px-Android_Studio_icon.svg.png', 'adminLG', 'endgame2019', 'administrator', 'Informática', 'Secretaria Particular de la Secretaria de Gestion Integral de Riesgos y Proteccion Civil', 0, 0, '2020-10-12 18:13:05'),
(25, 'Luis Alonso', 'Dominguez Nava', 0, 30, 1, '1579623205_38339f7a26d3060329bed14c4b272f08.png', 'adminLA', 'luiniDomino2', 'administrator', 'Informática', 'Secretaria Particular de la Secretaria de Gestión Integral de Riesgos y Protección Civil', 0, 0, '0000-00-00 00:00:00'),
(26, 'sandra Paulina', 'Mejia', 0, 36, 1, '1582934250_kisspng-user-profile-default-computer-icons-network-video-the-foot-problems-of-the-disinall-foot-care-founde-5b6346124a6e72.2963778415332326583049.png', 'SFinanzas', 'pruebaf', 'registro', 'Informática', 'Direccion Ejecutiva de Administracion y Finanzas', 0, 0, '0000-00-00 00:00:00'),
(27, 'Miriam', 'Ordaz', 0, 27, 1, '1580683689_Dakirby309-Simply-Styled-Blender.ico', 'SProteccion', 'warmachine20', 'registro', 'Informática', 'Direccion General Tactico Operativa', 0, 0, '0000-00-00 00:00:00'),
(28, 'PruebaUser', 'User', 0, 25, 1, '1590551727_38339f7a26d3060329bed14c4b272f08.png', 'SalertaTemprana', 'pruebaAT', 'registro', 'Informática', 'Direccion General de Resiliencia', 0, 0, '0000-00-00 00:00:00'),
(29, 'Maribel', 'Hernandez', 0, 32, 1, '1602544442_computer-icons-zip-document-file.jpg', 'MH2020', '12345', 'registro', 'Informática', 'Direccion General de Resiliencia', 0, 0, '2020-10-19 15:12:44'),
(30, 'Edgar', 'Medina', 0, 33, 1, '1600790939_user_d.jpg', 'pruebavehicular', '12345', 'registro', 'Informática', 'Direccion General de Resiliencia', 1, 455, '2020-10-12 15:12:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_registro`
--

CREATE TABLE `equipo_registro` (
  `id_direccion` int(2) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `titular` varchar(30) NOT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_registro`
--

INSERT INTO `equipo_registro` (`id_direccion`, `direccion`, `titular`, `codigo`) VALUES
(9, 'Direccion General de Resiliencia', 'Norlang Marcel García Arróliga', 'DGR'),
(10, 'Direccion General Tactico Operativa', 'Humberto González Arroyo', 'DGTO'),
(11, 'Secretaria Particular de la Secretaria de Gestion Integral de Riesgos y Proteccion Civil', 'Luz Elena Rivera Cano', 'SP'),
(12, 'Direccion de Evaluacion de Riesgos', 'Juan Gerardo Vargas Pino', 'DER'),
(13, 'Direccion General de Analisis de Riesgos', 'Rafael Humberto Marín Cambrani', 'DGAR'),
(14, 'Direccion de Alerta Temprana', 'Guillermo Ayala Álvarez', 'DAT'),
(15, 'Direccion Ejecutiva de Administracion y Finanzas', 'Jesús Ramos Cedillo', 'DEAF'),
(16, 'Direccion General de Vinculacion, Capacitacion y Difusion', 'Carlos Rodrigo Garibay Rubio', 'DGVCD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_tienda`
--

CREATE TABLE `equipo_tienda` (
  `id_equipo` int(3) NOT NULL,
  `item` varchar(12) NOT NULL,
  `no_serie` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `imei` int(30) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `sim_serial` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_tienda`
--

INSERT INTO `equipo_tienda` (`id_equipo`, `item`, `no_serie`, `modelo`, `imei`, `descripcion`, `sim_serial`, `status`) VALUES
(1, 'Tablet', 'R52M60TGGVT', 'SM-T385M', 2147483647, 'Tablet Samsung 16GB color negro, cable de carga, adaptador de corriente, protector universal de silicón rojo\r\n\r\n        ', '491197236F', 'bodega'),
(2, 'Tablet', 'r52m60tgm5t', 'SM-T385M', 2147483647, 'Tablet Samsung 16GB color negro, cable de carga, adaptador de corriente, protector universal de silicón rojo\r\n', '491197350F', 'bodega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'Generado'),
(2, 'Revision'),
(3, 'Aprobado'),
(4, 'Enviado/Sin Leer'),
(5, 'Enviado/Leido'),
(6, 'En Atencion'),
(7, 'Desfase'),
(8, 'Rechazado'),
(9, 'Atendido'),
(10, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id_estatus` int(4) NOT NULL,
  `detalles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `detalles`) VALUES
(1, 'Generado'),
(2, 'Revision');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folio_externo`
--

CREATE TABLE `folio_externo` (
  `id_folio` int(2) NOT NULL,
  `id_direccion` int(2) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `folio_externo`
--

INSERT INTO `folio_externo` (`id_folio`, `id_direccion`, `estado`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalador`
--

CREATE TABLE `instalador` (
  `id_instalador` int(2) NOT NULL,
  `nombre` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instalador`
--

INSERT INTO `instalador` (`id_instalador`, `nombre`) VALUES
(1, 'Luis Gabriel'),
(2, 'Luis Alonso'),
(3, 'Angel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrucciones`
--

CREATE TABLE `instrucciones` (
  `id_instruccion` int(11) NOT NULL,
  `n_instruccion` varchar(200) NOT NULL,
  `dir_instruccion` int(11) NOT NULL,
  `general` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instrucciones`
--

INSERT INTO `instrucciones` (`id_instruccion`, `n_instruccion`, `dir_instruccion`, `general`) VALUES
(5, 'Capacitar', 0, 1),
(6, 'Dirigir', 9, 0),
(7, 'Informar', 10, 0),
(8, 'Dar a conocer', 0, 1),
(9, 'llevar a secretaria de Finanzas', 15, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id_log` int(4) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `id_usr` int(2) NOT NULL,
  `id_direccion` int(2) NOT NULL,
  `accion` varchar(100) NOT NULL,
  `query` varchar(300) DEFAULT NULL,
  `id_documento` int(4) DEFAULT NULL,
  `fecha_accion` date NOT NULL,
  `hora_accion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id_log`, `usuario`, `id_usr`, `id_direccion`, `accion`, `query`, `id_documento`, `fecha_accion`, `hora_accion`) VALUES
(1, 'Maribel_Tester', 0, 0, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion)', 15, '2020-05-16', '00:00:00'),
(2, 'Maribel_Tester', 0, 0, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 20, '2020-05-16', '12:55:46'),
(3, 'Maribel_Tester', 0, 0, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 21, '2020-05-18', '01:51:01'),
(4, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 15, '2020-05-20', '18:11:15'),
(5, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 21, '2020-05-20', '18:12:14'),
(6, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 13, '2020-05-20', '18:30:28'),
(7, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 14, '2020-05-20', '22:52:28'),
(8, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 14, '2020-05-22', '22:07:31'),
(9, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 14, '2020-05-23', '12:30:31'),
(10, 'Maribel_Tester', 0, 0, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 22, '2020-05-24', '02:37:47'),
(11, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 19, '2020-05-26', '14:20:51'),
(12, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 19, '2020-05-26', '14:31:31'),
(13, 'Maribel_Tester', 0, 0, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 23, '2020-05-28', '11:54:27'),
(14, 'Maribel_Tester', 0, 0, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 24, '2020-05-28', '12:04:59'),
(15, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 24, '2020-05-28', '21:08:34'),
(16, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 24, '2020-05-28', '21:27:54'),
(17, 'Maribel_Tester', 0, 0, 'Insercion de instruccion', 'INSERT INTO documento_instruccion(id_documento,direccion,area,instruccion,destinatario,cargo_d,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:fecha_limite,:fecha_instruccion,:prioridad)', 7, '2020-06-15', '11:48:37'),
(18, 'Maribel_Tester', 0, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 25, '2020-06-15', '11:50:32'),
(19, 'Maribel_Tester', 0, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 26, '2020-06-15', '14:15:02'),
(20, 'Maribel_Tester', 29, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 27, '2020-06-15', '15:19:21'),
(21, 'Maribel_Tester', 29, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 28, '2020-06-15', '15:26:48'),
(22, 'Maribel_Tester', 29, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 29, '2020-06-15', '15:46:50'),
(23, 'Maribel_Tester', 29, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 30, '2020-06-16', '09:48:35'),
(24, 'Maribel_Tester', 29, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 31, '2020-07-10', '13:12:19'),
(25, 'SFinanzas', 26, 15, 'Registro de documento', 'INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 32, '2020-07-14', '14:09:28'),
(26, 'SFinanzas', 26, 15, 'Registro de documento', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 34, '2020-07-14', '14:23:08'),
(27, 'Maribel_Tester', 29, 15, 'Registro de documento', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 35, '2020-09-09', '15:13:47'),
(28, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-09', '15:22:47'),
(29, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-09', '15:24:40'),
(30, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-09', '15:26:58'),
(31, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-09', '15:27:59'),
(32, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-09', '15:30:12'),
(33, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:11:34'),
(34, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:13:42'),
(35, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:25:41'),
(36, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:26:35'),
(37, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:31:05'),
(38, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:33:14'),
(39, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 3, '2020-09-10', '11:35:40'),
(40, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 4, '2020-09-10', '11:37:52'),
(41, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 5, '2020-09-10', '11:42:51'),
(42, 'Maribel_Tester', 29, 15, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 6, '2020-09-10', '11:44:09'),
(43, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:06:16'),
(44, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:19:37'),
(45, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:21:18'),
(46, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:22:15'),
(47, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:23:18'),
(48, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:26:19'),
(49, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:26:21'),
(50, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:26:22'),
(51, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '21:28:01'),
(52, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:29:35'),
(53, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:30:55'),
(54, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:32:09'),
(55, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:35:06'),
(56, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:41:55'),
(57, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:42:06'),
(58, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:42:37'),
(59, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:43:36'),
(60, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '14:51:32'),
(61, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '15:07:15'),
(62, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '15:08:08'),
(63, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '15:08:23'),
(64, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '15:08:33'),
(65, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '16:07:34'),
(66, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-22', '17:30:54'),
(67, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '11:44:01'),
(68, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '11:45:45'),
(69, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '11:51:11'),
(70, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '11:51:43'),
(71, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '13:52:27'),
(72, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '14:16:20'),
(73, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-09-23', '14:30:16'),
(74, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '14:32:17'),
(75, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-23', '18:31:48'),
(76, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '10:56:41'),
(77, 'adminLG', 22, 11, 'inicio de sesion', '0', 0, '2020-09-24', '11:04:08'),
(78, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '11:04:31'),
(79, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '11:54:55'),
(80, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '11:55:07'),
(81, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '12:16:31'),
(82, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '12:20:59'),
(83, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '13:45:19'),
(84, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '15:39:21'),
(85, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '17:34:45'),
(86, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '17:38:01'),
(87, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '21:48:06'),
(88, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '21:48:48'),
(89, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-24', '21:52:03'),
(90, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '11:04:10'),
(91, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '11:05:05'),
(92, 'adminLG', 22, 11, 'inicio de sesion', '0', 0, '2020-09-28', '11:21:14'),
(93, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '12:54:34'),
(94, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-09-28', '13:26:14'),
(95, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '13:55:00'),
(96, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '14:05:22'),
(97, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '15:43:47'),
(98, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '15:46:54'),
(99, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '15:49:47'),
(100, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '18:26:58'),
(101, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-09-28', '18:56:44'),
(102, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '18:58:26'),
(103, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '18:58:49'),
(104, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-28', '21:01:18'),
(105, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '09:51:04'),
(106, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '10:11:15'),
(107, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '14:59:35'),
(108, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '15:52:23'),
(109, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '15:56:25'),
(110, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:00:56'),
(111, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:04'),
(112, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:07'),
(113, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:10'),
(114, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:15'),
(115, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:22'),
(116, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:28'),
(117, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:37'),
(118, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '16:01:58'),
(119, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:32:27'),
(120, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:32:29'),
(121, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:32:30'),
(122, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:32:31'),
(123, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:32:42'),
(124, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:40:16'),
(125, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:42:14'),
(126, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:53:45'),
(127, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:55:38'),
(128, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:57:31'),
(129, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-29', '23:59:10'),
(130, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-30', '09:48:44'),
(131, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-30', '09:56:30'),
(132, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-30', '09:58:26'),
(133, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-09-30', '18:03:54'),
(134, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-10-06', '19:25:27'),
(135, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-06', '19:26:03'),
(136, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-08', '13:19:27'),
(137, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-08', '13:39:24'),
(138, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-09', '11:54:20'),
(139, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-10-09', '12:41:21'),
(140, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-10-09', '13:01:34'),
(141, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-09', '13:12:15'),
(142, 'pruebavehicular', 30, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 7, '2020-10-09', '13:15:51'),
(143, 'pruebavehicular', 30, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 8, '2020-10-09', '13:16:23'),
(144, 'pruebavehicular', 30, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 9, '2020-10-09', '13:17:04'),
(145, 'pruebavehicular', 30, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 10, '2020-10-09', '13:18:43'),
(146, 'pruebavehicular', 30, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 11, '2020-10-09', '13:19:22'),
(147, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-10-12', '13:11:31'),
(148, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-12', '14:59:15'),
(149, 'Maribel_Tester', 29, 15, 'inicio de sesion', '0', 0, '2020-10-12', '15:00:01'),
(150, 'pruebavehicular', 30, 9, 'inicio de sesion', '0', 0, '2020-10-12', '15:12:56'),
(151, 'adminLG', 22, 11, 'inicio de sesion', '0', 0, '2020-10-12', '18:13:05'),
(152, 'Tester', 29, 9, 'inicio de sesion', '0', 0, '2020-10-12', '18:14:15'),
(153, 'Tester', 29, 9, 'inicio de sesion', '0', 0, '2020-10-13', '11:58:16'),
(154, 'Tester', 29, 9, 'inicio de sesion', '0', 0, '2020-10-19', '15:12:44'),
(155, 'Tester', 29, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 12, '2020-10-19', '16:02:21'),
(156, 'Tester', 29, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 13, '2020-10-19', '16:41:34'),
(157, 'Tester', 29, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 14, '2020-10-19', '16:46:28'),
(158, 'Tester', 29, 9, 'Registro de documento documento externo', 'INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)', 15, '2020-10-19', '16:55:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_documento`
--

CREATE TABLE `mensaje_documento` (
  `id_mensaje` int(2) NOT NULL,
  `id_documento` int(2) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `tipo_mensaje` int(2) NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `estado_mensaje` int(2) NOT NULL,
  `fecha_mensaje` date NOT NULL,
  `hora_mensaje` time NOT NULL,
  `foto_user` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje_documento`
--

INSERT INTO `mensaje_documento` (`id_mensaje`, `id_documento`, `usuario`, `tipo_mensaje`, `mensaje`, `estado_mensaje`, `fecha_mensaje`, `hora_mensaje`, `foto_user`) VALUES
(1, 9, 'Maribel_Tester', 1, 'mensaje de prueba 00', 0, '0000-00-00', '00:00:00', ''),
(2, 9, 'Maribel_Tester', 1, 'mensaje de prueba 01', 0, '2020-05-26', '18:34:57', ''),
(3, 7, 'Maribel_Tester', 1, 'Prueba 02 de mensajes', 0, '2020-05-26', '18:44:49', '1586964885_IMG-20200104-WA0003.jpg'),
(4, 7, 'Maribel_Tester', 1, 'Prueba 003 de mensajes', 0, '2020-05-26', '18:45:41', '1586964885_IMG-20200104-WA0003.jpg'),
(5, 7, 'Maribel_Tester', 1, 'otra mas ', 0, '2020-05-26', '18:46:55', '1586964885_IMG-20200104-WA0003.jpg'),
(6, 7, 'Maribel_Tester', 1, 'Prueba ', 0, '2020-05-26', '18:48:53', '1586964885_IMG-20200104-WA0003.jpg'),
(7, 7, 'Maribel_Tester', 1, '1', 0, '2020-05-26', '18:49:54', '1586964885_IMG-20200104-WA0003.jpg'),
(8, 7, 'Maribel_Tester', 1, 'q', 0, '2020-05-26', '18:51:21', '1586964885_IMG-20200104-WA0003.jpg'),
(9, 7, 'Maribel_Tester', 1, '3', 0, '2020-05-26', '18:52:30', '1586964885_IMG-20200104-WA0003.jpg'),
(10, 7, 'Maribel_Tester', 1, 'sas', 0, '2020-05-26', '18:53:44', '1586964885_IMG-20200104-WA0003.jpg'),
(11, 8, 'Maribel_Tester', 1, 'asas', 0, '2020-05-26', '19:01:27', '1586964885_IMG-20200104-WA0003.jpg'),
(12, 8, 'Maribel_Tester', 1, 'sasasas', 0, '2020-05-26', '19:01:40', '1586964885_IMG-20200104-WA0003.jpg'),
(13, 8, 'Maribel_Tester', 1, '2', 0, '2020-05-26', '19:01:45', '1586964885_IMG-20200104-WA0003.jpg'),
(14, 8, 'Maribel_Tester', 1, '4', 0, '2020-05-26', '19:01:51', '1586964885_IMG-20200104-WA0003.jpg'),
(15, 8, 'Maribel_Tester', 1, '6', 0, '2020-05-26', '19:01:57', '1586964885_IMG-20200104-WA0003.jpg'),
(16, 8, 'Maribel_Tester', 1, '9', 0, '2020-05-26', '19:02:00', '1586964885_IMG-20200104-WA0003.jpg'),
(17, 8, 'Maribel_Tester', 1, '22', 0, '2020-05-26', '19:02:04', '1586964885_IMG-20200104-WA0003.jpg'),
(18, 8, 'Maribel_Tester', 1, '22', 0, '2020-05-26', '19:02:08', '1586964885_IMG-20200104-WA0003.jpg'),
(19, 8, 'Maribel_Tester', 1, '212', 0, '2020-05-26', '19:02:12', '1586964885_IMG-20200104-WA0003.jpg'),
(20, 8, 'Maribel_Tester', 1, 'adsa', 0, '2020-05-26', '19:02:19', '1586964885_IMG-20200104-WA0003.jpg'),
(21, 10, 'Maribel_Tester', 1, 'dsd', 0, '2020-05-26', '19:04:14', '1586964885_IMG-20200104-WA0003.jpg'),
(22, 7, 'Maribel_Tester', 1, 'ss', 0, '2020-05-26', '19:04:43', '1586964885_IMG-20200104-WA0003.jpg'),
(23, 7, 'Maribel_Tester', 1, 'ssaq', 0, '2020-05-26', '19:05:21', '1586964885_IMG-20200104-WA0003.jpg'),
(24, 7, 'Maribel_Tester', 1, 'ss', 0, '2020-05-26', '19:06:47', '1586964885_IMG-20200104-WA0003.jpg'),
(25, 7, 'Maribel_Tester', 1, 'as', 0, '2020-05-26', '19:08:08', '1586964885_IMG-20200104-WA0003.jpg'),
(26, 7, 'Maribel_Tester', 1, 'kk', 0, '2020-05-26', '19:26:54', '1586964885_IMG-20200104-WA0003.jpg'),
(27, 7, 'Maribel_Tester', 1, 'ss', 0, '2020-05-26', '19:29:44', '1586964885_IMG-20200104-WA0003.jpg'),
(28, 7, 'Maribel_Tester', 1, 'll', 0, '2020-05-26', '19:36:07', '1586964885_IMG-20200104-WA0003.jpg'),
(29, 7, 'Maribel_Tester', 1, 'll9', 0, '2020-05-26', '19:37:30', '1586964885_IMG-20200104-WA0003.jpg'),
(30, 7, 'Maribel_Tester', 1, 'll9999k', 0, '2020-05-26', '19:37:59', '1586964885_IMG-20200104-WA0003.jpg'),
(31, 7, 'Maribel_Tester', 1, 'Prueba de contenido nuevo', 0, '2020-05-26', '19:44:58', '1586964885_IMG-20200104-WA0003.jpg'),
(32, 7, 'Maribel_Tester', 1, 'Prueba de contenido nuevo 2', 0, '2020-05-26', '19:45:45', '1586964885_IMG-20200104-WA0003.jpg'),
(33, 9, 'Maribel_Tester', 1, 'mensaje de prueba 004', 0, '2020-05-26', '21:37:03', '1586964885_IMG-20200104-WA0003.jpg'),
(34, 7, 'Maribel_Tester', 1, 'prueba de contenido', 0, '2020-05-26', '21:43:20', '1586964885_IMG-20200104-WA0003.jpg'),
(35, 7, 'Maribel_Tester', 1, 'prueba de contenido generado', 0, '2020-05-26', '21:44:27', '1586964885_IMG-20200104-WA0003.jpg'),
(36, 7, 'Maribel_Tester', 1, 'prueba de contenido generado 2', 0, '2020-05-26', '21:46:13', '1586964885_IMG-20200104-WA0003.jpg'),
(37, 7, 'SalertaTemprana', 2, 'Prueba de otro usuario', 0, '2020-05-26', '21:54:00', '1590551727_38339f7a26d3060329bed14c4b272f08.png'),
(38, 7, 'Maribel_Tester', 1, 'dad', 0, '2020-05-26', '22:13:54', '1586964885_IMG-20200104-WA0003.jpg'),
(39, 7, 'SalertaTemprana', 2, 'Prueba de otro usuario 002', 0, '2020-05-21', '22:21:24', '1590551727_38339f7a26d3060329bed14c4b272f08.png'),
(40, 7, 'SalertaTemprana', 2, 'Prueba de un texto muy largo, para ver como se acomoda o como deberia acomodarse', 0, '2020-05-30', '16:13:28', '1590551727_38339f7a26d3060329bed14c4b272f08.png'),
(41, 7, 'Maribel_Tester', 1, 'prueba de posicionamiento de los textos largos del usuario principal', 0, '2020-05-26', '23:23:58', '1586964885_IMG-20200104-WA0003.jpg'),
(42, 7, 'Maribel_Tester', 1, 'Segunda prueba del posicionamiento de mensajes largos del usuario principal, se verifica que el texto se acomode automaticamente', 0, '2020-05-26', '23:25:50', '1586964885_IMG-20200104-WA0003.jpg'),
(43, 20, 'Maribel_Tester', 1, 'Prueba de mensaje', 0, '2020-05-27', '16:27:50', '1586964885_IMG-20200104-WA0003.jpg'),
(44, 15, 'Maribel_Tester', 1, 'prueba de chat', 0, '2020-05-27', '23:39:40', '1586964885_IMG-20200104-WA0003.jpg'),
(45, 7, 'Maribel_Tester', 1, 'prueba de junio', 0, '2020-06-02', '21:17:06', '1586964885_IMG-20200104-WA0003.jpg'),
(46, 24, 'Maribel_Tester', 1, 'Esta es una anotacion en el documento XXX', 0, '2020-06-15', '11:43:13', '1586964885_IMG-20200104-WA0003.jpg'),
(47, 27, 'Maribel_Tester', 1, 'v', 0, '2020-06-16', '02:04:23', '1586964885_IMG-20200104-WA0003.jpg'),
(48, 30, 'Maribel_Tester', 1, 'lll', 0, '2020-06-16', '14:56:21', '1586964885_IMG-20200104-WA0003.jpg'),
(49, 1, 'Maribel_Tester', 1, 'prueba de mensaje', 0, '2020-10-12', '17:20:14', '1586964885_IMG-20200104-WA0003.jpg'),
(50, 1, 'Tester', 1, 'prueba 01', 0, '2020-10-19', '15:48:21', '1602544442_computer-icons-zip-document-file.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id_participante` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `p_nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `p_cargo` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id_participante`, `id_documento`, `p_nombre`, `p_cargo`) VALUES
(1, 0, '', ''),
(2, 0, '', ''),
(3, 0, '', ''),
(4, 0, '', ''),
(5, 0, '', ''),
(6, 0, '', ''),
(7, 0, 'prueba', ''),
(8, 0, 'prueba', ''),
(9, 0, 'luis', ''),
(10, 0, 'luz', ''),
(11, 0, 'linda', ''),
(12, 0, 'lila', ''),
(13, 0, 'luis', ''),
(14, 0, 'luz', ''),
(15, 0, 'linda', ''),
(16, 0, 'lila', ''),
(17, 0, 'luis', ''),
(18, 0, 'luz', ''),
(19, 0, 'linda', ''),
(20, 0, 'lila', ''),
(21, 0, 'lucia', ''),
(22, 0, 'lopez', ''),
(23, 0, 'lucia', ''),
(24, 0, 'lopez', ''),
(25, 0, 'lidia', ''),
(26, 54, 'lidia', ''),
(27, 54, 'lidia', ''),
(28, 54, 'lopez', ''),
(29, 54, 'lopez', ''),
(30, 54, 'lopez', ''),
(31, 54, 'fdf', ''),
(32, 54, 'lopez', ''),
(33, 54, 'fdf', ''),
(34, 54, 'lopez', ''),
(35, 54, '', ''),
(36, 54, 'Mario', 'secretario particular'),
(37, 54, 'Rene', 'auxiliar administrativo'),
(38, 54, 'lopez', 'auxiliar administrativo'),
(39, 54, 'lopez', 'auxiliar administrativo'),
(40, 54, 'lopez', 'auxiliar administrativo'),
(41, 53, 'lopez', 'div4'),
(42, 53, 'lidia', 'div3'),
(43, 33, 'lidia', 'div4'),
(44, 33, 'lopez', 'secretario particular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_f`
--

CREATE TABLE `temp_f` (
  `id_temp` int(4) NOT NULL,
  `folio_temp` int(4) NOT NULL,
  `id_direccion` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `id_tipo_doc` int(2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `direccion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`id_tipo_doc`, `descripcion`, `direccion`) VALUES
(1, 'Oficio', 0),
(2, 'Nota Informativa', 0),
(3, 'Circular', 0),
(4, 'Memorándum', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pass`
--

CREATE TABLE `usuario_pass` (
  `id_usuario` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_pass`
--

INSERT INTO `usuario_pass` (`id_usuario`, `nombre`, `usuario`, `password`, `tipo_usuario`) VALUES
(1, 'Luis Gabriel', 'adminLG', '123456', 'administrator'),
(2, 'prueba', 'prueba', '12345', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `catalogo_dispositivo`
--
ALTER TABLE `catalogo_dispositivo`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id_cont`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `documentos_externos`
--
ALTER TABLE `documentos_externos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `documento_ciclo`
--
ALTER TABLE `documento_ciclo`
  ADD PRIMARY KEY (`id_ciclo`);

--
-- Indices de la tabla `documento_instruccion`
--
ALTER TABLE `documento_instruccion`
  ADD PRIMARY KEY (`id_instruccion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `equipo_registro`
--
ALTER TABLE `equipo_registro`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `equipo_tienda`
--
ALTER TABLE `equipo_tienda`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `folio_externo`
--
ALTER TABLE `folio_externo`
  ADD PRIMARY KEY (`id_folio`);

--
-- Indices de la tabla `instalador`
--
ALTER TABLE `instalador`
  ADD PRIMARY KEY (`id_instalador`);

--
-- Indices de la tabla `instrucciones`
--
ALTER TABLE `instrucciones`
  ADD PRIMARY KEY (`id_instruccion`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `mensaje_documento`
--
ALTER TABLE `mensaje_documento`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participante`);

--
-- Indices de la tabla `temp_f`
--
ALTER TABLE `temp_f`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indices de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`id_tipo_doc`);

--
-- Indices de la tabla `usuario_pass`
--
ALTER TABLE `usuario_pass`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `catalogo_dispositivo`
--
ALTER TABLE `catalogo_dispositivo`
  MODIFY `id_area` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id_cont` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id_equipo` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `documentos_externos`
--
ALTER TABLE `documentos_externos`
  MODIFY `id_documento` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `documento_ciclo`
--
ALTER TABLE `documento_ciclo`
  MODIFY `id_ciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `documento_instruccion`
--
ALTER TABLE `documento_instruccion`
  MODIFY `id_instruccion` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `equipo_registro`
--
ALTER TABLE `equipo_registro`
  MODIFY `id_direccion` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `equipo_tienda`
--
ALTER TABLE `equipo_tienda`
  MODIFY `id_equipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id_estatus` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `folio_externo`
--
ALTER TABLE `folio_externo`
  MODIFY `id_folio` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instalador`
--
ALTER TABLE `instalador`
  MODIFY `id_instalador` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instrucciones`
--
ALTER TABLE `instrucciones`
  MODIFY `id_instruccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `mensaje_documento`
--
ALTER TABLE `mensaje_documento`
  MODIFY `id_mensaje` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `temp_f`
--
ALTER TABLE `temp_f`
  MODIFY `id_temp` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `id_tipo_doc` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_pass`
--
ALTER TABLE `usuario_pass`
  MODIFY `id_usuario` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
