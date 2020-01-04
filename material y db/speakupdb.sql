-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2011 a las 11:27:46
-- Versión del servidor: 5.1.49
-- Versión de PHP: 5.3.3-1ubuntu9.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `speakup`
--
CREATE DATABASE `speakup` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `speakup`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cod_clase` int(11) NOT NULL,
  `cod_turno` smallint(6) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `hora` int(11) NOT NULL,
  `cedula_profesor` int(11) NOT NULL,
  `status_clase` varchar(20) NOT NULL,
  `observacion` text NOT NULL,
  `nivel` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `salon` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Volcar la base de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `cod_clase`, `cod_turno`, `fecha`, `hora`, `cedula_profesor`, `status_clase`, `observacion`, `nivel`, `tipo`, `salon`) VALUES
(51, 7, 0, '2011-02-14', 10, 0, 'PENDIENTE', '', 1, 4, 2),
(53, 8, 0, '2011-02-14', 10, 0, 'PENDIENTE', '', 1, 5, 1),
(54, 9, 0, '2011-02-21', 9, 0, 'PENDIENTE', '', 1, 1, 1),
(55, 10, 0, '2011-02-22', 10, 0, 'PENDIENTE', '', 1, 1, 2),
(56, 11, 0, '2011-02-23', 11, 0, 'PENDIENTE', '', 1, 1, 3),
(60, 12, 4, '2011-02-07', 10, 0, 'PENDIENTE', '', 1, 5, 3),
(61, 13, 4, '2011-02-14', 10, 0, 'PENDIENTE', '', 1, 5, 3),
(62, 14, 4, '2011-02-21', 10, 0, 'PENDIENTE', '', 1, 5, 3),
(63, 15, 0, '2011-02-22', 12, 0, 'PENDIENTE', '', 12, 2, 1),
(64, 16, 0, '2011-02-22', 13, 0, 'PENDIENTE', '', 2, 1, 1),
(66, 17, 5, '2011-03-02', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(67, 18, 5, '2011-03-09', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(68, 19, 5, '2011-03-16', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(69, 20, 5, '2011-03-23', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(70, 21, 5, '2011-03-30', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(71, 22, 5, '2011-04-06', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(72, 23, 5, '2011-04-13', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(73, 24, 5, '2011-04-20', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(74, 25, 5, '2011-04-27', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(75, 26, 5, '2011-05-04', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(76, 27, 5, '2011-05-11', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(77, 28, 5, '2011-05-18', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(78, 29, 5, '2011-05-25', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(79, 30, 5, '2011-06-01', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(80, 31, 5, '2011-06-08', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(81, 32, 5, '2011-06-15', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(82, 33, 5, '2011-06-22', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(83, 34, 5, '2011-06-29', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(84, 35, 5, '2011-07-06', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(85, 36, 5, '2011-07-13', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(86, 37, 5, '2011-07-20', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(87, 38, 5, '2011-07-27', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(88, 39, 5, '2011-08-03', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(89, 40, 5, '2011-08-10', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(90, 41, 5, '2011-08-17', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(91, 42, 5, '2011-08-24', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(92, 43, 5, '2011-08-31', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(93, 44, 5, '2011-09-07', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(94, 45, 5, '2011-09-14', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(95, 46, 5, '2011-09-21', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(96, 47, 5, '2011-09-28', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(97, 48, 5, '2011-10-05', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(98, 49, 5, '2011-10-12', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(99, 50, 5, '2011-10-19', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(100, 51, 5, '2011-10-26', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(101, 52, 5, '2011-11-02', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(102, 53, 5, '2011-11-09', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(103, 54, 5, '2011-11-16', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(104, 55, 5, '2011-11-23', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(105, 56, 5, '2011-11-30', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(106, 57, 5, '2011-12-07', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(107, 58, 5, '2011-12-14', 15, 0, 'PENDIENTE', '', 1, 5, 2),
(108, 59, 5, '2011-12-21', 15, 0, 'PENDIENTE', '', 1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_clases`
--

CREATE TABLE IF NOT EXISTS `detalle_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_clase` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `asistio` set('ASISTENTE','INASISTENTE','CANCELO') NOT NULL DEFAULT 'INASISTENTE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `clase_cedula_index` (`cod_clase`,`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Volcar la base de datos para la tabla `detalle_clases`
--

INSERT INTO `detalle_clases` (`id`, `cod_clase`, `cedula`, `asistio`) VALUES
(81, 7, 1, 'INASISTENTE'),
(83, 8, 2, 'INASISTENTE'),
(84, 9, 1, 'INASISTENTE'),
(85, 10, 1, 'INASISTENTE'),
(86, 11, 1, 'INASISTENTE'),
(100, 14, 4, 'INASISTENTE'),
(101, 15, 1, 'INASISTENTE'),
(102, 16, 1, 'INASISTENTE'),
(104, 16, 2, 'INASISTENTE'),
(106, 17, 994, 'INASISTENTE'),
(107, 18, 994, 'INASISTENTE'),
(108, 19, 994, 'INASISTENTE'),
(109, 20, 994, 'INASISTENTE'),
(110, 21, 994, 'INASISTENTE'),
(111, 22, 994, 'INASISTENTE'),
(112, 23, 994, 'INASISTENTE'),
(113, 24, 994, 'INASISTENTE'),
(114, 25, 994, 'INASISTENTE'),
(115, 26, 994, 'INASISTENTE'),
(116, 27, 994, 'INASISTENTE'),
(117, 28, 994, 'INASISTENTE'),
(118, 29, 994, 'INASISTENTE'),
(119, 30, 994, 'INASISTENTE'),
(120, 31, 994, 'INASISTENTE'),
(121, 32, 994, 'INASISTENTE'),
(122, 33, 994, 'INASISTENTE'),
(123, 34, 994, 'INASISTENTE'),
(124, 35, 994, 'INASISTENTE'),
(125, 36, 994, 'INASISTENTE'),
(126, 37, 994, 'INASISTENTE'),
(127, 38, 994, 'INASISTENTE'),
(128, 39, 994, 'INASISTENTE'),
(129, 40, 994, 'INASISTENTE'),
(130, 41, 994, 'INASISTENTE'),
(131, 42, 994, 'INASISTENTE'),
(132, 43, 994, 'INASISTENTE'),
(133, 44, 994, 'INASISTENTE'),
(134, 45, 994, 'INASISTENTE'),
(135, 46, 994, 'INASISTENTE'),
(136, 47, 994, 'INASISTENTE'),
(137, 48, 994, 'INASISTENTE'),
(138, 49, 994, 'INASISTENTE'),
(139, 50, 994, 'INASISTENTE'),
(140, 51, 994, 'INASISTENTE'),
(141, 52, 994, 'INASISTENTE'),
(142, 53, 994, 'INASISTENTE'),
(143, 54, 994, 'INASISTENTE'),
(144, 55, 994, 'INASISTENTE'),
(145, 56, 994, 'INASISTENTE'),
(146, 57, 994, 'INASISTENTE'),
(147, 58, 994, 'INASISTENTE'),
(148, 59, 994, 'INASISTENTE'),
(149, 17, 991, 'INASISTENTE'),
(150, 18, 991, 'INASISTENTE'),
(151, 19, 991, 'INASISTENTE'),
(152, 20, 991, 'INASISTENTE'),
(153, 21, 991, 'INASISTENTE'),
(154, 22, 991, 'INASISTENTE'),
(155, 23, 991, 'INASISTENTE'),
(156, 24, 991, 'INASISTENTE'),
(157, 25, 991, 'INASISTENTE'),
(158, 26, 991, 'INASISTENTE'),
(159, 27, 991, 'INASISTENTE'),
(160, 28, 991, 'INASISTENTE'),
(161, 29, 991, 'INASISTENTE'),
(162, 30, 991, 'INASISTENTE'),
(163, 31, 991, 'INASISTENTE'),
(164, 32, 991, 'INASISTENTE'),
(165, 33, 991, 'INASISTENTE'),
(166, 34, 991, 'INASISTENTE'),
(167, 35, 991, 'INASISTENTE'),
(168, 36, 991, 'INASISTENTE'),
(169, 37, 991, 'INASISTENTE'),
(170, 38, 991, 'INASISTENTE'),
(171, 39, 991, 'INASISTENTE'),
(172, 40, 991, 'INASISTENTE'),
(173, 41, 991, 'INASISTENTE'),
(174, 42, 991, 'INASISTENTE'),
(175, 43, 991, 'INASISTENTE'),
(176, 44, 991, 'INASISTENTE'),
(177, 45, 991, 'INASISTENTE'),
(178, 46, 991, 'INASISTENTE'),
(179, 47, 991, 'INASISTENTE'),
(180, 48, 991, 'INASISTENTE'),
(181, 49, 991, 'INASISTENTE'),
(182, 50, 991, 'INASISTENTE'),
(183, 51, 991, 'INASISTENTE'),
(184, 52, 991, 'INASISTENTE'),
(185, 53, 991, 'INASISTENTE'),
(186, 54, 991, 'INASISTENTE'),
(187, 55, 991, 'INASISTENTE'),
(188, 56, 991, 'INASISTENTE'),
(189, 57, 991, 'INASISTENTE'),
(190, 58, 991, 'INASISTENTE'),
(191, 59, 991, 'INASISTENTE'),
(192, 17, 996, 'INASISTENTE'),
(193, 18, 996, 'INASISTENTE'),
(194, 19, 996, 'INASISTENTE'),
(195, 20, 996, 'INASISTENTE'),
(196, 21, 996, 'INASISTENTE'),
(197, 22, 996, 'INASISTENTE'),
(198, 23, 996, 'INASISTENTE'),
(199, 24, 996, 'INASISTENTE'),
(200, 25, 996, 'INASISTENTE'),
(201, 26, 996, 'INASISTENTE'),
(202, 27, 996, 'INASISTENTE'),
(203, 28, 996, 'INASISTENTE'),
(204, 29, 996, 'INASISTENTE'),
(205, 30, 996, 'INASISTENTE'),
(206, 31, 996, 'INASISTENTE'),
(207, 32, 996, 'INASISTENTE'),
(208, 33, 996, 'INASISTENTE'),
(209, 34, 996, 'INASISTENTE'),
(210, 35, 996, 'INASISTENTE'),
(211, 36, 996, 'INASISTENTE'),
(212, 37, 996, 'INASISTENTE'),
(213, 38, 996, 'INASISTENTE'),
(214, 39, 996, 'INASISTENTE'),
(215, 40, 996, 'INASISTENTE'),
(216, 41, 996, 'INASISTENTE'),
(217, 42, 996, 'INASISTENTE'),
(218, 43, 996, 'INASISTENTE'),
(219, 44, 996, 'INASISTENTE'),
(220, 45, 996, 'INASISTENTE'),
(221, 46, 996, 'INASISTENTE'),
(222, 47, 996, 'INASISTENTE'),
(223, 48, 996, 'INASISTENTE'),
(224, 49, 996, 'INASISTENTE'),
(225, 50, 996, 'INASISTENTE'),
(226, 51, 996, 'INASISTENTE'),
(227, 52, 996, 'INASISTENTE'),
(228, 53, 996, 'INASISTENTE'),
(229, 54, 996, 'INASISTENTE'),
(230, 55, 996, 'INASISTENTE'),
(231, 56, 996, 'INASISTENTE'),
(232, 57, 996, 'INASISTENTE'),
(233, 58, 996, 'INASISTENTE'),
(234, 59, 996, 'INASISTENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pais` varchar(6) NOT NULL,
  `cod_estado` varchar(6) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pais_estado_index` (`cod_pais`,`cod_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `cod_pais`, `cod_estado`, `nombre_estado`) VALUES
(1, '000001', '000001', 'Nueva Esparta'),
(2, '000001', '000002', 'Sucre'),
(3, '000001', '000003', 'Monagas'),
(7, '000001', '000004', 'Aragua'),
(8, '000001', '000005', 'Detla Amacuro'),
(9, '000001', '000006', 'AnzoÃ¡tegui');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_menor` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `contrato` varchar(10) NOT NULL,
  `programa` varchar(30) DEFAULT NULL,
  `niveles_adquiridos` varchar(1) NOT NULL,
  `nivel_ini` varchar(20) DEFAULT NULL,
  `nivel_fin` varchar(20) DEFAULT NULL,
  `nivel_actual` varchar(20) DEFAULT NULL,
  `fecha_ini` date NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `locacion` varchar(30) DEFAULT NULL,
  `telefono1` varchar(15) NOT NULL,
  `telefono2` varchar(15) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `direccion_casa` varchar(80) NOT NULL,
  `direccion_trabajo` varchar(80) NOT NULL,
  `profesion` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `contrato` (`contrato`),
  KEY `key_programa` (`programa`),
  KEY `key_nivel_ini` (`nivel_ini`),
  KEY `key_nivel_fin` (`nivel_fin`),
  KEY `key_nivel_actual` (`nivel_actual`),
  KEY `key_status` (`status`),
  KEY `key_locaciones` (`locacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `cod_menor`, `cedula`, `nombres`, `apellidos`, `contrato`, `programa`, `niveles_adquiridos`, `nivel_ini`, `nivel_fin`, `nivel_actual`, `fecha_ini`, `status`, `locacion`, `telefono1`, `telefono2`, `email1`, `email2`, `direccion_casa`, `direccion_trabajo`, `profesion`, `fecha_nacimiento`, `edad`) VALUES
(5, 3, 3, 'Nombre 3', 'Apellido 3', '00001-1', 'Ingles', '1', 'BASICO', 'AVANZADO', 'AVANZADO', '2010-07-15', 'ACTIVO', 'AT HOME', '3', '3', '3', '3', '3', '3', '3', '2010-07-15', '3'),
(7, 1, 1, 'Nombre 1', 'Apellido 1', '00003-1', 'Ingles', '1', 'BASICO', 'BASICO', 'BASICO', '2010-07-15', 'ACTIVO', 'AT HOME', '1', '1', '1', '1', '1', '1', '1', '2010-07-15', '1'),
(8, 2, 2, 'Nombre2', 'Apellido2', '00002-1', 'Ingles', '3', 'BASICO', 'AVANZADO', 'BASICO', '2010-07-01', 'ACTIVO', 'INSTITUTE', '04167884848', '', 'jkskdhfkjsdf@kjjkdf.com', '', '', '', '', '2080-07-01', '21'),
(10, 4, 4, '44', '44', '', NULL, '', NULL, NULL, NULL, '0000-00-00', 'INACTIVO', NULL, '44', '44', '44', '44', '44', '44', '44', '2011-02-02', '44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_menores`
--

CREATE TABLE IF NOT EXISTS `estudiantes_menores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_menor` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cedula_padre` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `contrato` varchar(10) NOT NULL,
  `programa` varchar(30) DEFAULT NULL,
  `niveles_adquiridos` varchar(1) NOT NULL,
  `nivel_ini` varchar(20) DEFAULT NULL,
  `nivel_fin` varchar(20) DEFAULT NULL,
  `nivel_actual` varchar(20) DEFAULT NULL,
  `fecha_ini` date NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `locacion` varchar(30) DEFAULT NULL,
  `telefono1` varchar(15) NOT NULL,
  `telefono2` varchar(15) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `direccion_casa` varchar(80) NOT NULL,
  `direccion_trabajo` varchar(80) NOT NULL,
  `profesion` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `estudiantes_menores`
--

INSERT INTO `estudiantes_menores` (`id`, `cod_menor`, `cedula`, `cedula_padre`, `nombres`, `apellidos`, `contrato`, `programa`, `niveles_adquiridos`, `nivel_ini`, `nivel_fin`, `nivel_actual`, `fecha_ini`, `status`, `locacion`, `telefono1`, `telefono2`, `email1`, `email2`, `direccion_casa`, `direccion_trabajo`, `profesion`, `fecha_nacimiento`, `edad`) VALUES
(5, 995, 995, 3, 'Nombre 3', 'Apellido 3', '00001-1', 'Ingles', '1', 'BASICO', 'AVANZADO', 'AVANZADO', '2010-07-15', 'ACTIVO', 'AT HOME', '3', '3', '3', '3', '3', '3', '3', '2010-07-15', '3'),
(7, 994, 994, 1, 'Nombre 1', 'Apellido 1', '00003-1', 'Ingles', '1', 'BASICO', 'BASICO', 'BASICO', '2010-07-15', 'ACTIVO', 'AT HOME', '1', '1', '1', '1', '1', '1', '1', '2010-07-15', '1'),
(8, 993, 993, 3, 'Nombre2', 'Apellido2', '00002-1', 'Ingles', '3', 'BASICO', 'AVANZADO', 'BASICO', '2010-07-01', 'ACTIVO', 'INSTITUTE', '04167884848', '', 'jkskdhfkjsdf@kjjkdf.com', '', '', '', '', '2080-07-01', '21'),
(10, 992, 992, 4, '44', '44', '', NULL, '', NULL, NULL, NULL, '0000-00-00', 'INACTIVO', NULL, '44', '44', '44', '44', '44', '44', '44', '2011-02-02', '44'),
(13, 991, 991, 1, 'Pedro', 'Enrique Turkali', '', NULL, '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '', '', '', '', '', '', '', '2007-03-03', '4'),
(14, 996, 996, 1, 'Nuevo ', 'NiÃ±o', '', NULL, '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '', '', '', '', '', '', '', '2011-02-03', '2'),
(15, 997, 997, 1, 'xxxxxee', 'gfdgfg', '', NULL, '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '', '', '', '', '', '', '', '2010-11-10', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_2` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `codigo`, `nombre`) VALUES
(1, 1, 'Administradores del Sistema'),
(2, 2, 'Usuario Basico'),
(3, 3, 'Estudiantes'),
(4, 4, 'Profesores'),
(5, 5, 'Administradores Speakup');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locaciones`
--

CREATE TABLE IF NOT EXISTS `locaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locacion` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locaciones` (`locacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `locaciones`
--

INSERT INTO `locaciones` (`id`, `locacion`) VALUES
(1, 'AT HOME'),
(2, 'INSTITUTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) CHARACTER SET latin1 NOT NULL,
  `imagen` varchar(30) CHARACTER SET latin1 NOT NULL,
  `titulo` varchar(30) CHARACTER SET latin1 NOT NULL,
  `mensaje` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `codigo`, `imagen`, `titulo`, `mensaje`) VALUES
(1, '00001', 'prohibido.png', 'Acceso al Sistema NEGADO', 'Ha introducido informaciÃ³n errÃ³nea para acceder al sistema, por favor compruebe los datos ingresados e intÃ©ntelo de nuevo; si luego de tres intentos el problema persiste, contacte al personal encargado del sistema'),
(2, '00002', 'advertencia.png', 'Usuario Desactivado', 'El usuario con el cual estÃ¡ intentando tener acceso a la Intranet de la ContralorÃ­a del Estado Nueva Esparta, se encuentra actualmente DESACTIVADO, para mayor informaciÃ³n, consulte a la DirecciÃ³n de OrganizaciÃ³n y Sistemas'),
(3, '00003', 'sin_permiso.png', 'No tiene permisos suficientes', 'Usted no tiene permiso para acceder a la pÃ¡gina que desea abrir, si considera que estÃ¡ viendo este mensaje por error, contacte a la DirecciÃ³n de OrganizaciÃ³n y Sistemas para obtener los permisos necesarios'),
(4, '00004', 'sin_permiso.png', 'M&oacute;dulo NO INSCRITO', 'El mÃ³dulo que estÃ¡ intentando acceder no se encuentra inscrito en la Intranet de la ContralorÃ­a del Estado Nueva Esparta, comunÃ­quese con la DirecciÃ³n de OrganizaciÃ³n y Sistemas'),
(5, '00005', 'errorfloppy.png', 'Error Consultando Datos SQL', 'Ocurri&oacute; un error al momento de realizar la consulta a la base de datos del sistema, por favor notifique al responsable del sistema de esta situacion y de los pasos que han llevado a este error para que se apliquen los correctivos necesarios. Referencia:'),
(6, '00007', 'error_fecha.png', 'Error en Fecha', 'Ocurri&oacute un error en la fecha seleccionada, compruebe que es la fecha correcta y apropiada para el tipo de reporte que desea o para los datos que desea incluir.:'),
(7, '00006', 'usuario_existe.png', 'El Usuario Existe !', 'El usuario que est&aacute; intentando incluir, ya se encuentra registrado como usuario de la Intranet. Compruebe el n&uacute;mero de c&eacute;dula e int&eacute;ntelo de nuevo'),
(9, '00008', 'errorfloppy.png', 'Error Guardando Datos en BD', 'OcurriÃ³ un error al momento de guardar los datos en la base de datos, muy posiblemente por un error en la sentencia SQL o en las tablas de la Base de Datos en sÃ­; por favor notifique al encargado del Sistema de esta situaciÃ³n y de los pasos que han llevado a este error para que se apliquen los correctivos necesarios. Referencia:');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_usuarios`
--

CREATE TABLE IF NOT EXISTS `mensajes_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(500) NOT NULL DEFAULT 'Que tenga bien Día',
  `estatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= No se muestra, 1= Si se muestra',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `mensajes_usuarios`
--

INSERT INTO `mensajes_usuarios` (`id`, `mensaje`, `estatus`, `timestamp`) VALUES
(1, 'Este es un texto de prueba con un mensaje que se le puede colocar al usuario, sea cual sea, que no se olvide de hacer algo, que hay reuniÃ³n tal dia o que simplemente pase buen dia. Puede ser ta largo como se necesite siempre y cuando no se pase de 500 caracteres, lo que quiere decir que puede ser tan largo como esto, incluyendo el texto de relleno que se coloca para ver que tan largo puede ser y que tan bien se ve una vez que se encuentre en el placeholder de la pÃ¡gina principal del sistema.  ', 1, '2010-07-13 11:57:40'),
(2, 'Que tenga bien Día', 0, '2010-07-13 11:57:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_modulo` varchar(8) NOT NULL,
  `nombre_corto` varchar(60) NOT NULL,
  `nombre_largo` varchar(100) NOT NULL,
  `imagen_p` varchar(50) NOT NULL,
  `archivo_php` varchar(100) NOT NULL,
  `visible_en_menu` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_modulo` (`codigo_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Volcar la base de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `codigo_modulo`, `nombre_corto`, `nombre_largo`, `imagen_p`, `archivo_php`, `visible_en_menu`, `timestamp`) VALUES
(60, '10000000', 'Sistema', 'Sistema', '', '', 0, '2009-02-11 17:35:48'),
(97, '10010000', 'Modulos', 'Sistema->Modulos', '', '', 0, '2009-02-12 14:28:12'),
(98, '10010100', 'Incluir', 'Sistema->Modulos->Incluir', '', 'admin.modulos.incluir_modulos', 0, '2009-02-12 14:28:12'),
(99, '20000000', 'Administrar', 'Administrar', '', '', 0, '2009-02-12 18:57:58'),
(101, '10010200', 'Listar', 'Sistema->Modulos->Listar', '', 'admin.modulos.listar_modulos', 0, '2009-02-12 19:10:27'),
(102, '10020000', 'Grupos', 'Sistema->Grupos', '', '', 0, '2009-02-12 19:26:21'),
(103, '10020100', 'Incluir', 'Sistema->Grupos->Incluir', '', 'admin.grupos.incluir_grupos', 0, '2009-02-12 19:28:13'),
(108, '10030000', 'Usuarios', 'Sistema->Usuarios', '', '', 0, '2009-02-13 10:06:37'),
(109, '10030100', 'Incluir Usuario', 'Sistema->Usuarios->Incluir', 'add_user2.png', 'admin.usuarios.incluir_usuarios', 1, '2009-02-13 10:07:24'),
(124, '10020200', 'Listar', 'Sistema->Grupos->Listar', '', 'admin.grupos.listar_grupos', 0, '2009-02-13 23:08:05'),
(128, '10030200', 'Listar Usuario', 'Sistema->Usuarios->Listar', 'personas.png', 'admin.usuarios.listar_usuarios', 1, '2009-02-20 10:22:28'),
(129, '10020300', 'Permisos', 'Sistema->Grupos->Permisos', '', 'admin.grupos.asignar_permisos_grupos', 0, '2009-02-25 11:51:59'),
(130, '10030400', 'Asignar Grupo', 'Sistema->Usuarios->Asignar Grupo', '', 'admin.usuarios.asignar_usuarios_grupos', 0, '2009-02-26 18:07:30'),
(132, '10900000', 'Logs', 'Sistema->Logs', '', 'admin.logs.consultar_logs', 0, '2009-02-28 13:00:34'),
(178, '30200100', 'Cambiar Clave', 'Mi Perfil->Usuario->Cambiar Clave', '', 'admin.usuarios.cambiar_clave', 0, '2009-05-19 18:23:49'),
(186, '30000000', 'Mi Perfil', 'Mi Perfil', '', '', 0, '2009-09-10 23:37:00'),
(187, '30200000', 'Usuario', 'Mi Perfil->Usuario', '', '', 0, '2009-09-10 23:39:57'),
(188, '30200200', 'Actualizar Info', 'Mi Perfil->Usuario->Actualizar InformaciÃ³n', '', '', 0, '2009-09-10 23:44:36'),
(189, '20100000', 'Estudiantes', 'Administrar->Estudiantes', '', '', 0, '2010-07-12 20:03:46'),
(190, '20101000', 'Incluir Estudiante', 'Administrar->Estudiantes->Incluir Estudiante', 'add_student.png', 'admin.estudiantes.incluir_estudiantes', 1, '2010-07-12 20:05:39'),
(191, '10030500', 'Restricciones', 'Sistema->Usuarios->Restricciones', '', 'admin.usuarios.restricciones', 0, '2010-07-13 11:46:32'),
(192, '20200000', 'Clases', 'Administrar->Clases', '', '', 0, '2010-07-14 10:58:51'),
(193, '20201000', 'Class Board', 'Administrar->Clases->Reservar Clases', 'class_board.png', 'admin.clases.class_board', 1, '2010-07-14 11:00:17'),
(194, '10400000', 'Mensajes', 'Sistema->Mensajes', '', '', 0, '2010-07-18 13:19:06'),
(195, '10401000', 'Incluir Mensaje', 'Sistema->Mensajes->Incluir', '', 'admin.mensaje.incluir_mensaje', 0, '2010-07-18 13:20:44'),
(196, '10402000', 'Listar Mensajes', 'Sistema->Mensajes->Listar', '', 'admin.mensaje.listar_mensajes', 0, '2010-07-18 13:21:17'),
(197, '20102000', 'Admin. Estudiantes', 'Administrar Estudiantes', '', 'admin.estudiantes.admin_estudiantes', 0, '2011-02-19 11:48:48'),
(198, '20103000', 'Listar Estudiantes', 'Listar Estudiantes', '', 'admin.estudiantes.listar_estudiantes', 0, '2011-02-19 11:49:19'),
(199, '20050000', 'Adultos', 'Adultos', '', '', 0, '2011-02-19 14:02:11'),
(200, '20051000', 'Incluir Adulto', 'Incluir Adulto', '', 'admin.adultos.incluir_adulto', 0, '2011-02-19 14:02:46'),
(201, '20500000', 'Salones', 'Salones de Clases', '', '', 0, '2011-02-19 15:33:10'),
(202, '20501000', 'Administrar Salones', 'Administrar Salones', '', 'admin.salones.admin_salones', 0, '2011-02-19 15:34:16'),
(203, '20070000', 'NiÃ±os', 'NiÃ±os', '', '', 0, '2011-02-19 18:11:37'),
(204, '20071000', 'Incluir NiÃ±o', 'Incluir NiÃ±o', '', 'admin.ninos.incluir_nino', 0, '2011-02-19 18:12:18'),
(205, '20202000', 'Tipos de Clases', 'Administrar Tipos de Clases', '', 'admin.clases.admin_tipos', 0, '2011-02-19 18:33:33'),
(206, '20600000', 'Speakup Kids', 'Speakup Kids', '', '', 0, '2011-02-19 20:09:33'),
(207, '20601000', 'Admin. Turnos', 'Administrar Turnos', '', 'admin.kids.admin_turnos', 0, '2011-02-19 20:10:12'),
(208, '20602000', 'Inscripciones', 'Inscripciones en Speakup Kids', '', 'admin.kids.inscripciones_turnos', 0, '2011-02-23 10:20:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nivel` (`nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nivel`) VALUES
(3, 'AVANZADO'),
(1, 'BASICO'),
(2, 'INTERMEDIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pais` varchar(6) NOT NULL,
  `nombre_pais` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod_pais` (`cod_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `cod_pais`, `nombre_pais`) VALUES
(1, '000001', 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_grupos`
--

CREATE TABLE IF NOT EXISTS `permisos_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_grupo` int(5) NOT NULL,
  `codigo_modulo` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codigo_grupo` (`codigo_grupo`),
  KEY `codigo_modulo` (`codigo_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Volcar la base de datos para la tabla `permisos_grupos`
--

INSERT INTO `permisos_grupos` (`id`, `codigo_grupo`, `codigo_modulo`) VALUES
(1, 1, '10000000'),
(2, 1, '10010000'),
(3, 1, '20030100'),
(4, 1, '20030000'),
(5, 1, '20000000'),
(6, 1, '10900000'),
(7, 1, '10030400'),
(8, 1, '10030200'),
(9, 1, '10030100'),
(10, 1, '10030000'),
(11, 1, '10020300'),
(12, 1, '10020200'),
(13, 1, '10020100'),
(14, 1, '10020000'),
(15, 1, '10010200'),
(16, 1, '10010100'),
(17, 1, '20060100'),
(18, 1, '20060000'),
(19, 1, '20030200'),
(20, 1, '20070100'),
(21, 1, '20070000'),
(22, 1, '20060200'),
(25, 1, '50000000'),
(26, 1, '40010200'),
(27, 1, '40010100'),
(28, 1, '40010000'),
(29, 1, '40000000'),
(30, 1, '30200100'),
(31, 1, '30200000'),
(32, 1, '30000000'),
(33, 1, '20070200'),
(34, 1, '20100000'),
(35, 1, '20100100'),
(36, 2, '30000000'),
(37, 2, '30200000'),
(38, 2, '30200100'),
(39, 2, '40000000'),
(40, 2, '40010000'),
(41, 2, '40010100'),
(42, 2, '40010200'),
(43, 2, '50000000'),
(46, 1, '10040000'),
(47, 1, '10040100'),
(48, 1, '10040101'),
(49, 1, '10040102'),
(50, 1, '10040200'),
(53, 1, '50100000'),
(54, 1, '50200000'),
(55, 1, '50300000'),
(56, 2, '50100000'),
(57, 2, '50300000'),
(58, 2, '50200000'),
(59, 1, '50400000'),
(60, 1, '50500000'),
(61, 2, '50400000'),
(62, 2, '50500000'),
(63, 1, '30300000'),
(64, 1, '30301000'),
(65, 1, '30900000'),
(66, 2, '30900000'),
(67, 2, '30301000'),
(68, 2, '30300000'),
(69, 1, '20101000'),
(71, 5, '10020000'),
(72, 5, '10020300'),
(73, 5, '10020200'),
(74, 5, '10020100'),
(75, 5, '10030000'),
(76, 5, '10030100'),
(77, 5, '10030200'),
(78, 5, '10030400'),
(79, 5, '10900000'),
(80, 5, '20000000'),
(81, 5, '20100000'),
(82, 5, '20101000'),
(83, 5, '30000000'),
(84, 5, '30200000'),
(85, 5, '30200100'),
(86, 1, '10030500'),
(87, 1, '20200000'),
(88, 1, '20201000'),
(89, 1, '10400000'),
(90, 1, '10401000'),
(91, 1, '10402000'),
(92, 1, '20102000'),
(93, 1, '20103000'),
(94, 1, '30200200'),
(95, 1, '20050000'),
(96, 1, '20051000'),
(97, 1, '20500000'),
(98, 1, '20501000'),
(99, 1, '20071000'),
(100, 1, '20202000'),
(101, 1, '20600000'),
(102, 1, '20601000'),
(103, 1, '20602000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `programa` (`programa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `programa`) VALUES
(1, 'Ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rastreo`
--

CREATE TABLE IF NOT EXISTS `rastreo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `tipo` char(2) NOT NULL,
  `descripcion` longtext NOT NULL COMMENT 'I=Incluir, M=Modificar,E=Eliminar,C=Consulta,P=Procesamiento,L=Relacionado con Login',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) DEFAULT NULL COMMENT 'Direccion IP de la comp. Cliente',
  PRIMARY KEY (`id`),
  KEY `login` (`login`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

--
-- Volcar la base de datos para la tabla `rastreo`
--

INSERT INTO `rastreo` (`id`, `login`, `cedula`, `tipo`, `descripcion`, `timestamp`, `ip`) VALUES
(1, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-09 12:49:25', ''),
(2, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 10:50:45', ''),
(3, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 11:48:54', ''),
(4, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-12 11:49:42', ''),
(5, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 11:49:57', ''),
(6, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-12 11:52:03', ''),
(7, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 11:52:13', ''),
(8, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-12 11:56:06', ''),
(9, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 11:56:20', ''),
(10, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 14:15:54', ''),
(11, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-12 14:54:02', ''),
(12, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 14:54:14', ''),
(13, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 19:51:47', ''),
(14, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20100000 Nom:Administrar->Alumnos Arch:', '2010-07-12 20:03:47', ''),
(15, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20101000 Nom:Administrar->Alumnos->Incluir Alumnos Arch:admin.alumnos.incluir', '2010-07-12 20:05:39', ''),
(16, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20101000', '2010-07-12 20:05:54', ''),
(17, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 30200200', '2010-07-12 20:06:00', ''),
(18, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-12 21:23:21', ''),
(19, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-13 08:55:43', ''),
(20, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-13 10:18:50', ''),
(21, 'arrioja', '13729622', 'I', 'Insertado Grupo Cod:3 Cod. Org: Nombre:Estudiantes', '2010-07-13 11:23:09', ''),
(22, 'arrioja', '13729622', 'I', 'Insertado Grupo Cod:4 Cod. Org: Nombre:Profesores', '2010-07-13 11:23:24', ''),
(23, 'arrioja', '13729622', 'I', 'Insertado Grupo Cod:5 Cod. Org: Nombre:Administradores Speakup', '2010-07-13 11:23:36', ''),
(24, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10020000', '2010-07-13 11:24:03', ''),
(25, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10020300', '2010-07-13 11:24:07', ''),
(26, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10020200', '2010-07-13 11:24:11', ''),
(27, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10020100', '2010-07-13 11:24:13', ''),
(28, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10030000', '2010-07-13 11:24:17', ''),
(29, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10030100', '2010-07-13 11:24:19', ''),
(30, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10030200', '2010-07-13 11:24:21', ''),
(31, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10030400', '2010-07-13 11:24:22', ''),
(32, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 10900000', '2010-07-13 11:24:24', ''),
(33, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 20000000', '2010-07-13 11:24:28', ''),
(34, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 20100000', '2010-07-13 11:24:29', ''),
(35, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 20101000', '2010-07-13 11:24:31', ''),
(36, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 30000000', '2010-07-13 11:24:35', ''),
(37, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 30200000', '2010-07-13 11:24:36', ''),
(38, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 5 para acceder al m&oacute;dulo 30200100', '2010-07-13 11:24:41', ''),
(39, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:10030500 Nom:Administrar->Restricciones Arch:admin.usuarios.restricciones', '2010-07-13 11:46:32', ''),
(40, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 10030500', '2010-07-13 11:49:25', ''),
(41, 'arrioja', '13729622', 'I', 'Se han modificado las restricciones al usuario con el id: 1', '2010-07-13 11:51:26', ''),
(42, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:11111111 Nom:123123 Arch:123123', '2010-07-13 12:02:27', ''),
(43, 'arrioja', '13729622', 'I', 'Incluido el usuario C.I.: 14055011 Nombre: Maricruz Turkali / Login: mturkali', '2010-07-13 12:31:18', ''),
(44, 'arrioja', '13729622', 'I', 'Se ha incluido el usuario mturkali al grupo 3', '2010-07-13 12:34:42', ''),
(45, 'arrioja', '13729622', 'I', 'Se ha incluido el usuario mturkali al grupo 4', '2010-07-13 12:34:49', ''),
(46, 'arrioja', '13729622', 'M', 'El usuario arrioja ha cambiado su clave de acceso.', '2010-07-13 12:36:15', ''),
(47, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-13 12:36:19', ''),
(48, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-13 12:36:31', ''),
(49, 'arrioja', '13729622', 'M', 'El usuario arrioja ha cambiado su clave de acceso.', '2010-07-13 12:37:11', ''),
(50, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 09:09:00', ''),
(51, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 09:17:31', ''),
(52, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20200000 Nom:Administrar->Clases Arch:', '2010-07-14 10:58:51', ''),
(53, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20201000 Nom:Administrar->Clases->Reservar Clases Arch:admin.clases.class_board', '2010-07-14 11:00:18', ''),
(54, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20200000', '2010-07-14 11:00:32', ''),
(55, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20201000', '2010-07-14 11:00:33', ''),
(56, 'arrioja', '13729622', 'E', 'Restringido el grupo 1 de acceder al m&oacute;dulo 30200200', '2010-07-14 11:01:00', ''),
(57, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 13:11:28', ''),
(58, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 14:41:14', ''),
(59, 'arrioja', '13729622', 'I', 'Se han modificado las restricciones al usuario con el id: 1', '2010-07-14 14:41:49', ''),
(60, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 14:41:52', ''),
(61, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 14:42:00', ''),
(62, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 15:16:47', ''),
(63, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 15:16:57', ''),
(64, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 15:23:59', ''),
(65, '', '', 'L', 'Salida del sistema.', '2010-07-14 15:24:06', ''),
(66, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 15:24:50', ''),
(67, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 15:27:39', ''),
(68, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 15:27:50', ''),
(69, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 15:31:54', ''),
(70, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 15:32:04', ''),
(71, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-14 15:32:32', ''),
(72, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 15:32:42', ''),
(73, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-15 10:36:38', ''),
(74, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 10:42:59', ''),
(75, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-16 11:06:14', ''),
(76, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 11:06:22', ''),
(77, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-16 11:07:33', ''),
(78, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 11:07:41', ''),
(79, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 17:33:26', ''),
(80, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 18:01:20', ''),
(81, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-16 18:04:29', ''),
(82, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 21:56:00', ''),
(83, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-16 22:40:44', ''),
(84, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-17 06:37:17', ''),
(85, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-17 14:08:04', ''),
(86, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-17 14:52:57', ''),
(87, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-17 14:53:09', ''),
(88, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-17 14:55:20', ''),
(89, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-17 14:55:28', ''),
(90, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-17 15:56:45', ''),
(91, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-17 17:20:42', ''),
(92, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-18 09:21:30', ''),
(93, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-18 12:56:32', ''),
(94, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:10400000 Nom:Sistema->Mensajes Arch:', '2010-07-18 13:19:06', ''),
(95, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:10401000 Nom:Sistema->Mensajes->Incluir Arch:admin.mensaje.incluir_mensaje', '2010-07-18 13:20:44', ''),
(96, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:10402000 Nom:Sistema->Mensajes->Listar Arch:admin.mensaje.listar_mensaje', '2010-07-18 13:21:17', ''),
(97, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 10400000', '2010-07-18 13:21:54', ''),
(98, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 10401000', '2010-07-18 13:21:55', ''),
(99, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 10402000', '2010-07-18 13:21:57', ''),
(100, 'arrioja', '13729622', 'I', 'Se han modificado las restricciones al usuario con el id: 1', '2010-07-18 13:22:57', ''),
(101, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-18 13:23:00', ''),
(102, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-18 13:23:08', ''),
(103, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-19 12:55:18', ''),
(104, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2010-07-19 12:56:12', ''),
(105, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-19 08:45:34', ''),
(106, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2011-02-19 08:47:03', ''),
(107, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-19 11:44:02', ''),
(108, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20102000 Nom:Administrar Estudiantes Arch:admin.estudiantes.admin_estudiantes', '2011-02-19 11:48:48', ''),
(109, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20103000 Nom:Listar Estudiantes Arch:admin.estudiantes.listar_estudiantes', '2011-02-19 11:49:19', ''),
(110, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20102000', '2011-02-19 11:49:51', ''),
(111, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20103000', '2011-02-19 11:49:54', ''),
(112, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 30200200', '2011-02-19 11:49:55', ''),
(113, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-19 14:01:10', ''),
(114, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20050000 Nom:Adultos Arch:', '2011-02-19 14:02:11', ''),
(115, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20051000 Nom:Incluir Adulto Arch:admin.adultos.incluir_adulto', '2011-02-19 14:02:46', ''),
(116, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20050000', '2011-02-19 14:03:01', ''),
(117, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20051000', '2011-02-19 14:03:02', ''),
(118, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20500000 Nom:Salones de Clases Arch:', '2011-02-19 15:33:10', ''),
(119, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20501000 Nom:Administrar Salones Arch:admin.salones.admin_salones', '2011-02-19 15:34:16', ''),
(120, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20500000', '2011-02-19 15:34:27', ''),
(121, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20501000', '2011-02-19 15:34:28', ''),
(122, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 1 / SalÃ³n Nro 1 / Capacidad: 10', '2011-02-19 16:23:32', ''),
(123, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2011-02-19 16:50:12', ''),
(124, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-19 16:50:23', ''),
(125, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 2 / SalÃ³n Nro 2 / Capacidad: 152', '2011-02-19 17:13:35', ''),
(126, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 3 / SalÃ³n Nro 3 / Capacidad: 101', '2011-02-19 17:14:36', ''),
(127, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 4 / SalÃ³n Nro 4 / Capacidad: 111', '2011-02-19 17:19:16', ''),
(128, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 2 / SalÃ³n Nro 2 / Capacidad: 10', '2011-02-19 17:35:05', ''),
(129, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 3 / SalÃ³n Nro 3 / Capacidad: 10', '2011-02-19 17:35:13', ''),
(130, 'arrioja', '13729622', 'I', 'Se ha incluido el SalÃ³n: 3 / SalÃ³n Nro 3 / Capacidad: 10', '2011-02-19 17:40:24', ''),
(131, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-19 18:10:02', ''),
(132, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20070000 Nom:NiÃ±os Arch:', '2011-02-19 18:11:37', ''),
(133, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20071000 Nom:Incluir NiÃ±o Arch:admin.ninos.incluir_nino', '2011-02-19 18:12:18', ''),
(134, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20071000', '2011-02-19 18:12:35', ''),
(135, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20202000 Nom:Administrar Tipos de Clases Arch:admin.clases.admin_tipos', '2011-02-19 18:33:33', ''),
(136, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20202000', '2011-02-19 18:33:44', ''),
(137, 'arrioja', '13729622', 'I', 'Se ha incluido un nuevo tipo de clase: 5 / Speakup Kids', '2011-02-19 18:38:19', ''),
(138, 'arrioja', '13729622', 'I', 'Se ha incluido un nuevo tipo de clase: 5 / Speakup Kids', '2011-02-19 18:47:39', ''),
(139, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20600000 Nom:Speakup Kids Arch:', '2011-02-19 20:09:33', ''),
(140, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20601000 Nom:Administrar Turnos Arch:admin.kids.admin_turnos', '2011-02-19 20:10:12', ''),
(141, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20600000', '2011-02-19 20:10:52', ''),
(142, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20601000', '2011-02-19 20:10:53', ''),
(143, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-21 18:43:18', ''),
(144, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-21 21:08:04', ''),
(145, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-22 14:56:10', ''),
(146, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-23 04:51:34', ''),
(147, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-23 07:59:45', ''),
(148, 'arrioja', '13729622', 'I', 'Insertado M&oacute;dulo Cod:20602000 Nom:Inscripciones en Speakup Kids Arch:admin.kids.inscripciones_turnos', '2011-02-23 10:20:18', ''),
(149, 'arrioja', '13729622', 'I', 'Concedido permiso al grupo 1 para acceder al m&oacute;dulo 20602000', '2011-02-23 10:20:27', ''),
(150, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-23 12:54:31', ''),
(151, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-23 17:18:34', ''),
(152, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2011-02-23 18:27:59', ''),
(153, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-23 18:28:10', ''),
(154, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-02-23 19:17:34', ''),
(155, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2011-02-23 20:41:35', ''),
(156, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-03-01 11:51:26', ''),
(157, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2011-03-28 15:19:42', ''),
(158, 'arrioja', '13729622', 'L', 'Salida del sistema.', '2011-03-28 15:34:17', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE IF NOT EXISTS `salones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_salon` tinyint(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `capacidad` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `cod_salon`, `nombre`, `capacidad`) VALUES
(1, 1, 'SalÃ³n Nro 1', 10),
(5, 2, 'SalÃ³n Nro 2', 10),
(7, 3, 'SalÃ³n Nro 3', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_lab`
--

CREATE TABLE IF NOT EXISTS `sesion_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL,
  `computadora` tinyint(4) NOT NULL,
  `observacion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sesion_lab`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_clases`
--

CREATE TABLE IF NOT EXISTS `status_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_clase` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `status_clases`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_acceso`
--

CREATE TABLE IF NOT EXISTS `tipos_acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_acceso` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_acceso` (`tipo_acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipos_acceso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_clases`
--

CREATE TABLE IF NOT EXISTS `tipos_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo` smallint(6) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `tipos_clases`
--

INSERT INTO `tipos_clases` (`id`, `cod_tipo`, `descripcion`) VALUES
(1, 1, 'Clases'),
(2, 2, 'ExÃ¡men'),
(3, 3, 'Clase GramÃ¡tica'),
(4, 4, 'Orange Class'),
(6, 5, 'Speakup Kids');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_clases_nivel_imagen`
--

CREATE TABLE IF NOT EXISTS `tipos_clases_nivel_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `color` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `tipos_clases_nivel_imagen`
--

INSERT INTO `tipos_clases_nivel_imagen` (`id`, `cod_tipo`, `nivel`, `descripcion`, `imagen`, `color`) VALUES
(1, 1, 1, 'BASICO', 'class_1.png', '#ffa800'),
(2, 1, 2, 'INTERMEDIO', 'class_2.png', '#04b800'),
(3, 1, 3, 'AVANZADO', 'class_3.png', '#ff1200'),
(4, 2, 1, 'EXAMEN BASICO 1', 'test_1.png', '#5c58ff'),
(5, 2, 2, 'EXAMEN BASICO 2', 'test_2.png', '#5c58ff'),
(6, 2, 3, 'EXAMEN BASICO 3', 'test_3.png', '#5c58ff'),
(7, 2, 4, 'EXAMEN BASICO 4', 'test_4.png', '#5c58ff'),
(8, 2, 5, 'EXAMEN INTERMEDIO 1', 'test_5.png', '#5c58ff'),
(9, 2, 6, 'EXAMEN INTERMEDIO 2', 'test_6.png', '#5c58ff'),
(10, 2, 7, 'EXAMEN INTERMEDIO 3', 'test_7.png', '#5c58ff'),
(11, 2, 8, 'EXAMEN INTERMEDIO 4', 'test_8.png', '#5c58ff'),
(12, 2, 9, 'EXAMEN AVANZADO 1', 'test_9.png', '#5c58ff'),
(13, 2, 10, 'EXAMEN AVANZADO 2', 'test_10.png', '#5c58ff'),
(14, 2, 11, 'EXAMEN AVANZADO 3', 'test_11.png', '#5c58ff'),
(15, 2, 12, 'EXAMEN AVANZADO 4', 'test_12.png', '#5c58ff'),
(16, 4, 1, 'NIVEL UNICO', 'orange.png', '#ff5400'),
(17, 3, 1, 'NIVEL UNICO', 'grammar.png', '#ffa6a6'),
(18, 5, 1, 'NIVEL UNICO', 'kids.png', '#ff00cc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos_alumnos`
--

CREATE TABLE IF NOT EXISTS `turnos_alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_turno` int(11) NOT NULL,
  `cod_menor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `turnos_alumnos`
--

INSERT INTO `turnos_alumnos` (`id`, `cod_turno`, `cod_menor`) VALUES
(1, 5, 994),
(2, 5, 991),
(3, 5, 996);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos_clases`
--

CREATE TABLE IF NOT EXISTS `turnos_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_turno` smallint(6) NOT NULL DEFAULT '0',
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `dia` tinyint(1) NOT NULL,
  `hora` tinyint(2) NOT NULL,
  `cedula_profesor` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `observacion` text NOT NULL,
  `nivel` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cod_salon` tinyint(3) NOT NULL DEFAULT '1',
  `cupo_max` tinyint(2) NOT NULL COMMENT 'Cupo máximo asignado',
  `cupo_disp` tinyint(2) NOT NULL COMMENT 'Cupo disponible en la clase',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `turnos_clases`
--

INSERT INTO `turnos_clases` (`id`, `cod_turno`, `desde`, `hasta`, `dia`, `hora`, `cedula_profesor`, `status`, `observacion`, `nivel`, `tipo`, `cod_salon`, `cupo_max`, `cupo_disp`) VALUES
(9, 2, '2011-02-01', '2011-12-31', 1, 9, 0, 'ACTIVA', '', 3, 1, 1, 10, 0),
(25, 4, '2011-02-01', '2011-02-28', 1, 10, 0, 'ACTIVA', '', 1, 5, 3, 10, 2),
(26, 5, '2011-03-01', '2011-12-23', 3, 15, 0, 'ACTIVA', '', 1, 5, 2, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` varchar(6) NOT NULL,
  `cedula` int(10) unsigned NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cargo` set('GERENTE','ADMINISTRADOR','SECRETARIA','PROFESOR') NOT NULL DEFAULT 'PROFESOR',
  `estatus` varchar(1) NOT NULL DEFAULT '1' COMMENT '0=suspendido, 1=activo',
  `sexo` char(10) DEFAULT NULL,
  `telefono1` varchar(12) DEFAULT NULL,
  `telefono2` varchar(12) NOT NULL,
  `insertar` tinyint(1) NOT NULL DEFAULT '1',
  `modificar` tinyint(1) NOT NULL DEFAULT '0',
  `eliminar` tinyint(1) NOT NULL DEFAULT '0',
  `listar` tinyint(1) NOT NULL DEFAULT '1',
  `consultar` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cod_usuario`, `cedula`, `nombres`, `apellidos`, `login`, `clave`, `email`, `cargo`, `estatus`, `sexo`, `telefono1`, `telefono2`, `insertar`, `modificar`, `eliminar`, `listar`, `consultar`) VALUES
(1, '000001', 13729622, 'Pedro Enrique', 'Arrioja Marcano', 'arrioja', 'f3c1338d06d425ea8a132547971c85f4', 'pedroarrioja@gmail.com', 'PROFESOR', '1', 'MASCULINO', '', '0412-3506594', 1, 1, 1, 1, 1),
(2, '000002', 14055011, 'Maricruz', 'Turkali', 'mturkali', 'b0baee9d279d34fa1dfd71aadb908c3f', 'turkali@cantv.net', 'PROFESOR', '1', 'Femenino', '1111-1111111', '2222-2222222', 1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_grupos`
--

CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `codigo` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Volcar la base de datos para la tabla `usuarios_grupos`
--

INSERT INTO `usuarios_grupos` (`id`, `login`, `codigo`) VALUES
(139, 'arrioja', 1),
(142, 'mturkali', 4);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`programa`) REFERENCES `programas` (`programa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`nivel_ini`) REFERENCES `niveles` (`nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`nivel_fin`) REFERENCES `niveles` (`nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_4` FOREIGN KEY (`nivel_actual`) REFERENCES `niveles` (`nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_5` FOREIGN KEY (`status`) REFERENCES `status` (`status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_6` FOREIGN KEY (`locacion`) REFERENCES `locaciones` (`locacion`) ON UPDATE CASCADE;
