-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-07-2010 a las 09:53:39
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `speakup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_clase` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cedula_profesor` int(11) NOT NULL,
  `status_clase` varchar(20) NOT NULL,
  `observacion` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_fecha_hora` (`fecha`,`hora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `clases`
--


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
  UNIQUE KEY `cedula_fecha_hora` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle_clases`
--


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
  `cedula` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `contrato` varchar(10) NOT NULL,
  `programa` varchar(30) NOT NULL,
  `niveles_adquiridos` varchar(1) NOT NULL,
  `nivel_ini` varchar(20) NOT NULL,
  `nivel_fin` varchar(20) NOT NULL,
  `nivel_actual` varchar(20) NOT NULL,
  `fecha_ini` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `locacion` varchar(30) NOT NULL,
  `tipo_acceso` varchar(20) NOT NULL,
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
  KEY `key_locaciones` (`locacion`),
  KEY `key_tipo_acceso` (`tipo_acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `estudiantes`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `locaciones`
--


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
(1, 'Este es un texto de prueba con un mensaje que se le puede colocar al usuario, sea cual sea, que no se olvide de hacer algo, que hay reunión tal dia o que simplemente pase buen día. Puede ser ta largo como se necesite siempre y cuando no se pase de 500 caracteres, lo que quiere decir que puede ser tan largo como esto, incluyendo el texto de relleno que se coloca para ver que tan largo puede ser y que tan bien se ve una vez que se encuentre en el placeholder de la página principal del sistema.   ', 1, '2010-07-13 11:57:40'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=192 ;

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
(109, '10030100', 'Incluir', 'Sistema->Usuarios->Incluir', '', 'admin.usuarios.incluir_usuarios', 0, '2009-02-13 10:07:24'),
(124, '10020200', 'Listar', 'Sistema->Grupos->Listar', '', 'admin.grupos.listar_grupos', 0, '2009-02-13 23:08:05'),
(128, '10030200', 'Listar', 'Sistema->Usuarios->Listar', '', 'admin.usuarios.listar_usuarios', 0, '2009-02-20 10:22:28'),
(129, '10020300', 'Permisos', 'Sistema->Grupos->Permisos', '', 'admin.grupos.asignar_permisos_grupos', 0, '2009-02-25 11:51:59'),
(130, '10030400', 'Asignar Grupo', 'Sistema->Usuarios->Asignar Grupo', '', 'admin.usuarios.asignar_usuarios_grupos', 0, '2009-02-26 18:07:30'),
(132, '10900000', 'Logs', 'Sistema->Logs', '', 'admin.logs.consultar_logs', 0, '2009-02-28 13:00:34'),
(178, '30200100', 'Cambiar Clave', 'Mi Perfil->Usuario->Cambiar Clave', '', 'admin.usuarios.cambiar_clave', 0, '2009-05-19 18:23:49'),
(186, '30000000', 'Mi Perfil', 'Mi Perfil', '', '', 0, '2009-09-10 23:37:00'),
(187, '30200000', 'Usuario', 'Mi Perfil->Usuario', '', '', 0, '2009-09-10 23:39:57'),
(188, '30200200', 'Actualizar Info', 'Mi Perfil->Usuario->Actualizar InformaciÃ³n', '', '', 0, '2009-09-10 23:44:36'),
(189, '20100000', 'Estudisntes', 'Administrar->Estudiantes', '', '', 0, '2010-07-12 20:03:46'),
(190, '20101000', 'Incluir Estudiante', 'Administrar->Estudiantes->Incluir Estudiante', 'personas.png', 'admin.estudiantes.incluir_estudiantes', 1, '2010-07-12 20:05:39'),
(191, '10030500', 'Restricciones', 'Administrar->Restricciones', '', 'admin.usuarios.restricciones', 0, '2010-07-13 11:46:32');

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
(1, 'BÁSICO'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

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
(70, 1, '30200200'),
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
(86, 1, '10030500');

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
(1, 'Inglés');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

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
(51, 'arrioja', '13729622', 'L', 'Entrada autorizada al sistema.', '2010-07-14 09:17:31', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `status`
--


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

INSERT INTO `usuarios` (`id`, `cod_usuario`, `cedula`, `nombres`, `apellidos`, `login`, `clave`, `email`, `estatus`, `sexo`, `telefono1`, `telefono2`, `insertar`, `modificar`, `eliminar`, `listar`, `consultar`) VALUES
(1, '000001', 13729622, 'Pedro Enrique', 'Arrioja Marcano', 'arrioja', 'f3c1338d06d425ea8a132547971c85f4', 'pedroarrioja@gmail.com', '1', 'MASCULINO', '', '0412-3506594', 1, 1, 1, 1, 1),
(2, '000002', 14055011, 'Maricruz', 'Turkali', 'mturkali', 'b0baee9d279d34fa1dfd71aadb908c3f', 'turkali@cantv.net', '1', 'Femenino', '1111-1111111', '2222-2222222', 1, 0, 1, 0, 1);

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
  ADD CONSTRAINT `estudiantes_ibfk_6` FOREIGN KEY (`locacion`) REFERENCES `locaciones` (`locacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_7` FOREIGN KEY (`tipo_acceso`) REFERENCES `tipos_acceso` (`tipo_acceso`) ON UPDATE CASCADE;
