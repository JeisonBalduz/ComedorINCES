-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 06:24:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inces2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta-solicitud`
--

CREATE TABLE `alerta-solicitud` (
  `idsoli` int(11) NOT NULL,
  `razon` varchar(200) DEFAULT NULL,
  `idpersonal_soli` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencia_justificada`
--

CREATE TABLE `ausencia_justificada` (
  `idpermiso` int(11) NOT NULL,
  `idpersonal` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(50) DEFAULT NULL,
  `fecha_fin` varchar(50) DEFAULT NULL,
  `id_permiso` int(11) NOT NULL,
  `fecha_aj` varchar(15) DEFAULT NULL,
  `hora_aj` varchar(15) DEFAULT NULL,
  `iden_usuario_aj` int(11) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ausencia_justificada`
--

INSERT INTO `ausencia_justificada` (`idpermiso`, `idpersonal`, `fecha_inicio`, `fecha_fin`, `id_permiso`, `fecha_aj`, `hora_aj`, `iden_usuario_aj`, `color`) VALUES
(1, 2, '2024-03-14', '2024-03-30', 1, '2024-03-14', '05:38:20:PM', 9, '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `idestado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idestado`, `estado`, `codigo`) VALUES
(1, 'Amazonas', 'VE-X'),
(2, 'Anzoátegui', 'VE-B'),
(3, 'Apure', 'VE-C'),
(4, 'Aragua', 'VE-D'),
(5, 'Barinas', 'VE-E'),
(6, 'Bolívar', 'VE-F'),
(7, 'Carabobo', 'VE-G'),
(8, 'Cojedes', 'VE-H'),
(9, 'Delta Amacuro', 'VE-Y'),
(10, 'Falcón', 'VE-I'),
(11, 'Guárico', 'VE-J'),
(12, 'Lara', 'VE-K'),
(13, 'Mérida', 'VE-L'),
(14, 'Miranda', 'VE-M'),
(15, 'Monagas', 'VE-N'),
(16, 'Nueva Esparta', 'VE-O'),
(17, 'Portuguesa', 'VE-P'),
(18, 'Sucre', 'VE-R'),
(19, 'Táchira', 'VE-S'),
(20, 'Trujillo', 'VE-T'),
(21, 'La Guaira', 'VE-W'),
(22, 'Yaracuy', 'VE-U'),
(23, 'Zulia', 'VE-V'),
(24, 'Distrito Capital', 'VE-A'),
(25, 'Dependencias Federales', 'VE-Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `idestatus` int(11) NOT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `estatus_fecha` varchar(20) DEFAULT NULL,
  `estatus_hora` varchar(15) DEFAULT NULL,
  `iden_usuario` int(11) DEFAULT NULL,
  `estado_estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idestatus`, `estatus`, `estatus_fecha`, `estatus_hora`, `iden_usuario`, `estado_estatus`) VALUES
(1, 'Contradado', '2023/04/14', '03:51:32:AM', 1, 1),
(2, 'Cooperativa', '2023/04/14', '03:51:56:AM', 1, 1),
(3, 'Coral', '2023/04/14', '03:52:05:AM', 1, 1),
(4, 'Empleado', '2023/04/14', '03:52:19:AM', 1, 1),
(5, 'Estudiante', '2023/04/14', '03:52:26:AM', 1, 1),
(6, 'Jubilado', '2023/04/14', '03:52:44:AM', 1, 1),
(7, 'Maestro', '2023/04/14', '03:52:52:AM', 1, 1),
(8, 'Obrero', '2023/04/14', '03:53:03:AM', 1, 1),
(9, 'Pasante', '2023/04/14', '03:53:11:AM', 1, 1),
(10, 'Tributo', '2023/04/14', '03:53:20:AM', 1, 1),
(11, 'Vigilancia', '2023/11/08', '04:01:32:PM', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `idinvitados` int(11) NOT NULL,
  `nombre_invi` varchar(100) DEFAULT NULL,
  `apellido_invi` varchar(100) DEFAULT NULL,
  `cedula_invi` varchar(50) DEFAULT NULL,
  `sede_inivitado` varchar(100) DEFAULT NULL,
  `estatus_invitado` varchar(100) DEFAULT NULL,
  `comida_invitado` varchar(30) DEFAULT NULL,
  `fecha_inv` varchar(30) DEFAULT NULL,
  `hora_inv` varchar(30) DEFAULT NULL,
  `id_usuario_invi` int(11) DEFAULT NULL,
  `estatus_invi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`idinvitados`, `nombre_invi`, `apellido_invi`, `cedula_invi`, `sede_inivitado`, `estatus_invitado`, `comida_invitado`, `fecha_inv`, `hora_inv`, `id_usuario_invi`, `estatus_invi`) VALUES
(1, 'Dasdasd', 'Asdasdad', '155222', 'Centro De Formación Textil', 'Invitado', 'Almuerzo', '2023-04-20 ', ' 06:08:55:PM', 1, 0),
(2, 'Juan', 'Pablo', '13156565656', 'Centro Navional De Mecánica Automotriz ', 'Invitado', 'Almuerzo', '2023-04-20 ', ' 06:18:05:PM', 1, 0),
(3, 'perez', ' perez', '12313123123123', 'Asdasdasdasdas', 'Invitado', 'Desayuno', '2023-04-20 ', ' 11:40:58:PM', 1, 0),
(4, 'kevin', 'gonzalez', '151515151515', 'Asdsadsadasdasd', 'Invitado', 'Desayuno', '2023-04-21 ', ' 09:40:33:AM', 1, 0),
(5, 'Pedro', 'Juanes', '30012939', 'Sede De Caracas', 'Invitado', 'Desayuno', '2023-04-22 ', ' 07:47:27:PM', 1, 0),
(6, 'Juan Pedro ', 'Linares', '1414141414', 'Sede La Romana', 'Invitado', 'Cena', '2023-04-23 ', ' 12:56:45:AM', 1, 0),
(7, 'Xiomara', 'Gonzalez', '213131', 'Depencia', 'Invitado', 'Almuerzo', '2023-09-28 ', ' 02:41:17:PM', 9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `lunes_menu` varchar(250) DEFAULT NULL,
  `martes_menu` varchar(250) DEFAULT NULL,
  `miercoles_menu` varchar(250) DEFAULT NULL,
  `jueves_menu` varchar(250) DEFAULT NULL,
  `viernes_menu` varchar(250) DEFAULT NULL,
  `sabado_menu` varchar(250) DEFAULT NULL,
  `iden_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `lunes_menu`, `martes_menu`, `miercoles_menu`, `jueves_menu`, `viernes_menu`, `sabado_menu`, `iden_usuario`) VALUES
(1, 'Ensalada de pollo a la plancha con quinoa y vegetales mixtos.', 'Tortilla de champiñones y espinacas con pan integral.', 'Wrap de atún con vegetales y hummus.', 'Ensalada de quinoa con garbanzos, aguacate y aderezo de limón.', 'Hamburguesa de pavo con pan integral, vegetales y queso bajo en grasa.', '', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedir_comida`
--

CREATE TABLE `pedir_comida` (
  `idcomer` int(11) NOT NULL,
  `idpersonal` int(11) DEFAULT NULL,
  `pd_ticket` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ticket_act` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedir_comida`
--

INSERT INTO `pedir_comida` (`idcomer`, `idpersonal`, `pd_ticket`, `id_usuario`, `id_ticket_act`) VALUES
(1, 3, 1, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermisos_aj` int(11) NOT NULL,
  `permisos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermisos_aj`, `permisos`) VALUES
(1, 'Vacaciones'),
(2, 'Proceso Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cedula` int(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `idsede` int(100) DEFAULT NULL,
  `idestatus` int(100) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombre`, `apellido`, `cedula`, `correo`, `idsede`, `idestatus`, `fecha`, `hora`, `activo`, `id_usuario`) VALUES
(1, 'Jeison', 'Balduz', 30012937, ' jeisonbalduz@gmail.com', 11, 9, '2023/04/14', '08:02:41:AM', 0, 1),
(2, 'Leydi', 'Balduz', 15533807, ' jeisonkid02@gmail.com', 11, 7, '2023/04/17', '05:55:40:PM', 1, 1),
(3, 'Xiomara', 'Gonzalez', 7236674, '   xiomara02@gmail.com', 11, 1, '2023/04/18', '09:19:25:PM', 1, 1),
(4, 'Jose', 'Gonzalez', 14995017, 'siul.soft@gmail.com', 35, 4, '2023/11/02', '01:54:29:PM', 1, 9),
(5, 'Isbelia', 'Marquina', 21098127, 'isbeliasofia@gmail.com', 35, 4, '2023/11/02', '02:00:21:PM', 1, 9),
(6, 'Alida', 'Arismendi', 9473909, 'alidaarismendi@gmail.com', 38, 4, '2023/11/02', '02:14:01:PM', 1, 9),
(7, 'Juan', 'Balduz', 7236678, 'juan02@gmail.com', 1, 1, '2023/11/04', '09:19:47:PM', 1, 9),
(8, 'jesus', 'correa', 12121212, 'JUAN@GMAIL', 1, 1, '20-20-20', '19:00', 0, 1),
(9, 'JuanD', 'JuanD', 2147483647, ' JUAaNPEDRO@GMAIL.COM', 11, 8, '2024/03/14', '08:57:37:AM', 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_eliminado`
--

CREATE TABLE `personal_eliminado` (
  `ideliminado` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `usuario_eli` varchar(100) DEFAULT NULL,
  `usuario_cedula_eli` int(20) DEFAULT NULL,
  `fecha_eli` varchar(20) DEFAULT NULL,
  `hora_eli` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal_eliminado`
--

INSERT INTO `personal_eliminado` (`ideliminado`, `idpersonal`, `usuario_eli`, `usuario_cedula_eli`, `fecha_eli`, `hora_eli`) VALUES
(69, 9, 'admin', 30012937, '14-03-2024', '08:58:11:am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perticket`
--

CREATE TABLE `perticket` (
  `idticket` int(11) NOT NULL,
  `idpersonal` int(11) DEFAULT NULL,
  `comida` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `lunes` varchar(100) DEFAULT NULL,
  `martes` varchar(100) DEFAULT NULL,
  `miercoles` varchar(100) DEFAULT NULL,
  `jueves` varchar(100) DEFAULT NULL,
  `viernes` varchar(100) DEFAULT NULL,
  `sabado` varchar(100) DEFAULT NULL,
  `iden_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perticket`
--

INSERT INTO `perticket` (`idticket`, `idpersonal`, `comida`, `fecha`, `hora`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `iden_usuario`) VALUES
(1, 3, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(4, 2, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(5, 4, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(6, 1, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(7, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(8, 3, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(9, 4, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(10, 5, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(11, 1, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(12, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(13, 1, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(14, 4, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(15, 3, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(16, 3, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(17, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(18, 1, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(19, 2, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(20, 4, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(21, 1, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(22, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(23, 3, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(24, 4, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(25, 5, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(26, 3, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(27, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(28, 1, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(29, 2, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(30, 4, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(31, 1, 'desayuno', '2024-03-14', '10:20:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(32, 2, 'desayuno', '2024-03-14', '11:30:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(33, 3, 'desayuno', '2024-03-14', '12:45:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(34, 4, 'desayuno', '2024-03-14', '13:00:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(35, 5, 'desayuno', '2024-03-14', '14:15:00', 'Lunes', NULL, NULL, NULL, NULL, NULL, 1),
(36, 3, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(37, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(38, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(39, 2, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(40, 4, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(41, 1, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(42, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(43, 3, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(44, 4, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(45, 1, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(46, 3, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(47, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(48, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(49, 2, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(50, 4, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(51, 1, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Miercoles', NULL, NULL, NULL, NULL, 1),
(52, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Miercoles', NULL, NULL, NULL, NULL, 1),
(53, 3, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Miercoles', NULL, NULL, NULL, NULL, 1),
(54, 4, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Miercoles', NULL, NULL, NULL, NULL, 1),
(55, 1, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Miercoles', NULL, NULL, NULL, NULL, 1),
(56, 3, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(57, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(58, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(59, 2, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(60, 4, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(61, 1, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(62, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(63, 3, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(64, 4, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(65, 1, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(66, 3, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(67, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(68, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(69, 2, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(70, 4, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(71, 1, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(72, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(73, 3, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(74, 4, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(75, 1, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(76, 3, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(77, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(78, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(79, 2, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(80, 4, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(81, 1, 'desayuno', '2024-03-15', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(82, 2, 'desayuno', '2024-03-15', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(83, 3, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(84, 4, 'desayuno', '2024-03-15', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(85, 1, 'desayuno', '2024-03-15', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(86, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(87, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(88, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(89, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(90, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, 'Martes', NULL, NULL, NULL, NULL, 1),
(91, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, 'Miercoles', NULL, NULL, NULL, 1),
(92, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, 'Miercoles', NULL, NULL, NULL, 1),
(93, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, 'Miercoles', NULL, NULL, NULL, 1),
(94, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, 'Miercoles', NULL, NULL, NULL, 1),
(95, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, 'Miercoles', NULL, NULL, NULL, 1),
(96, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(97, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(98, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(99, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(100, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(101, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(102, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(103, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(104, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(105, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(106, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(107, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(108, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(109, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(110, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(111, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(112, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(113, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(114, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(115, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(116, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(117, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(118, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(119, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(120, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(121, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(122, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(123, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(124, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(125, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(126, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(127, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(128, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(129, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(130, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(131, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(132, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(133, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(134, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(135, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(136, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(137, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(138, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(139, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(140, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(141, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(142, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(143, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(144, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(145, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(146, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(147, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(148, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(149, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(150, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(151, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(152, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(153, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(154, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(155, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(156, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(157, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(158, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(159, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(160, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(161, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(162, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(163, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(164, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(165, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(166, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(167, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(168, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(169, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(170, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(171, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(172, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(173, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(174, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(175, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(176, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(177, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(178, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(179, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(180, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(181, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(182, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(183, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(184, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(185, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(186, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(187, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(188, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(189, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(190, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(191, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(192, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(193, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(194, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(195, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(196, 3, 'desayuno', '2024-03-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(197, 2, 'desayuno', '2024-03-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(198, 5, 'desayuno', '2024-03-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(199, 3, 'desayuno', '2024-03-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(200, 4, 'desayuno', '2024-03-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(201, 2, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(202, 5, 'desayuno', '2024-03-16', '11:30:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(203, 3, 'desayuno', '2024-03-08', '12:45:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(204, 5, 'desayuno', '2024-03-08', '13:00:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(205, 4, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, 'Jueves', NULL, NULL, 1),
(206, 1, 'desayuno', '2024-05-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(207, 1, 'desayuno', '2024-04-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(208, 2, 'desayuno', '2024-04-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(209, 3, 'desayuno', '2024-05-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(210, 3, 'desayuno', '2024-04-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(211, 4, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(212, 1, 'desayuno', '2024-03-06', '11:30:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(213, 5, 'desayuno', '2024-02-08', '12:45:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(214, 1, 'desayuno', '2024-01-22', '13:00:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(215, 2, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(216, 1, 'desayuno', '2024-05-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(217, 1, 'desayuno', '2024-04-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(218, 2, 'desayuno', '2024-04-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(219, 3, 'desayuno', '2024-05-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(220, 3, 'desayuno', '2024-04-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(221, 4, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(222, 1, 'desayuno', '2024-03-06', '11:30:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(223, 5, 'desayuno', '2024-02-08', '12:45:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(224, 1, 'desayuno', '2024-01-22', '13:00:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(225, 2, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(226, 1, 'desayuno', '2024-05-11', '10:20:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(227, 1, 'desayuno', '2024-04-09', '11:30:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(228, 2, 'desayuno', '2024-04-15', '12:45:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(229, 3, 'desayuno', '2024-05-12', '13:00:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(230, 3, 'desayuno', '2024-04-03', '14:15:00', NULL, NULL, NULL, NULL, 'Vienes', NULL, 1),
(231, 4, 'desayuno', '2024-03-16', '10:20:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(232, 1, 'desayuno', '2024-03-06', '11:30:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(233, 5, 'desayuno', '2024-02-08', '12:45:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(234, 1, 'desayuno', '2024-01-22', '13:00:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(235, 2, 'desayuno', '2024-03-07', '14:15:00', NULL, NULL, NULL, NULL, NULL, 'Sabado', 1),
(236, 3, 'Almuerzo', '2024-03-14', '12:29:57:PM', NULL, NULL, NULL, 'Jueves', NULL, NULL, 9),
(237, 2, 'Almuerzo', '2024-03-14', '01:41:15:PM', NULL, NULL, NULL, 'Jueves', NULL, NULL, 9),
(238, 3, 'Almuerzo', '2024-03-14', '05:40:11:PM', NULL, NULL, NULL, 'Jueves', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Comedor'),
(3, 'Bienestar Social '),
(4, 'Admin RRHH'),
(5, 'Solicitador DCDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `idsede` int(11) NOT NULL,
  `sede` varchar(50) DEFAULT NULL,
  `idestados` int(11) DEFAULT NULL,
  `codigo` int(50) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `iden_usuario` int(20) DEFAULT NULL,
  `estado_sede` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`idsede`, `sede`, `idestados`, `codigo`, `fecha`, `hora`, `iden_usuario`, `estado_sede`) VALUES
(1, 'Coordinación Programa Turismo', 4, 11, '2023/04/13', '03:27:37:PM', 1, 1),
(2, 'Coordinación Programa Penitenciario', 4, 12, '2023/04/13', '03:28:03:PM', 1, 1),
(3, 'Centro Formación Comercial La Victoria', 4, 18, '2023/04/13', '03:29:27:PM', 1, 1),
(4, 'Centro Formación Comercial Maracay', 4, 19, '2023/04/13', '03:30:50:PM', 1, 1),
(5, 'Centro Formación Industrial El Limón', 4, 20, '2023/04/13', '03:32:17:PM', 1, 1),
(6, 'Centro Polivalente Villa De Cura', 4, 21, '2023/04/13', '03:32:48:PM', 1, 1),
(7, 'Centro De Formación Textil', 4, 22, '2023/04/13', '03:33:22:PM', 1, 1),
(8, 'Centro Tecnologico Industrial La Victoria', 4, 23, '2023/04/13', '03:35:53:PM', 1, 1),
(9, 'Centro Tecnológico Industrial Maracay', 4, 24, '2023/04/13', '03:36:32:PM', 1, 1),
(10, 'Centro De Formación Construcción', 4, 25, '2023/04/13', '03:37:58:PM', 1, 1),
(11, 'Centro Nacional De Mecánica Automotriz', 4, 26, '2023/04/13', '03:39:04:PM', 1, 1),
(12, 'Centro Polivalente Bermudez', 4, 27, '2023/04/13', '03:39:55:PM', 1, 1),
(13, 'Centro Polivalente Cagua', 4, 28, '2023/04/13', '03:40:54:PM', 1, 1),
(14, 'Centro Polivalente Ocumare De La Costa', 4, 29, '2023/04/13', '03:41:21:PM', 1, 1),
(15, 'C, F, S, A, La Providencia', 4, 30, '2023/04/13', '03:51:20:PM', 1, 1),
(16, 'C, F, S, A, Colonia Tovar', 4, 31, '2023/04/13', '03:52:05:PM', 1, 1),
(17, 'C, F, S, A, La Morita', 4, 32, '2023/04/13', '03:52:56:PM', 1, 1),
(18, 'C,F,S Construcción', 4, 32, '2023/04/13', '03:53:23:PM', 1, 1),
(19, 'C, F, S, Metal Minero La Victoria', 4, 32, '2023/04/13', '03:54:27:PM', 1, 1),
(20, 'C, F, S, Cema', 4, 32, '2023/04/13', '03:55:22:PM', 1, 1),
(21, 'C, F, S, Ocumare', 4, 32, '2023/04/13', '03:55:34:PM', 1, 1),
(22, 'C, F, S, Maracay', 4, 32, '2023/04/13', '03:55:52:PM', 1, 1),
(23, 'C, F, S, Textil', 4, 32, '2023/04/13', '03:56:21:PM', 1, 1),
(24, 'C, F, S, Bermudez', 4, 32, '2023/04/13', '03:56:35:PM', 1, 1),
(25, 'C, F, S, Cagua', 4, 32, '2023/04/13', '03:56:57:PM', 1, 1),
(26, 'C, F, S, Comercial La Victoria', 4, 32, '2023/04/13', '03:57:25:PM', 1, 1),
(27, 'C, F, S, El Limón', 4, 32, '2023/04/13', '03:57:57:PM', 1, 1),
(28, 'C, F, S, Metalminero Maracay', 4, 32, '2023/04/13', '03:58:26:PM', 1, 1),
(29, 'C, F, S, Programa Turismo', 4, 32, '2023/04/13', '04:01:32:PM', 1, 1),
(30, 'C, F, S, Villa Cura', 4, 32, '2023/04/13', '04:02:35:PM', 1, 1),
(31, 'CCFPI', 4, 32, '2023/04/13', '04:03:33:PM', 1, 1),
(32, 'Cema ', 4, 32, '2023/04/13', '04:12:58:PM', 1, 1),
(33, 'División De Administración', 4, 4, '2023/04/13', '03:22:47:PM', 1, 1),
(34, 'División De Sercio Y Mantenimineto ', 4, 5, '2023/04/13', '03:23:17:PM', 1, 1),
(35, 'División De Informatica', 4, 6, '2023/04/13', '03:23:37:PM', 1, 1),
(36, 'División De Formacion Profesional', 4, 7, '2023/04/13', '03:24:08:PM', 1, 1),
(37, 'División De Seguridad', 4, 8, '2023/04/13', '03:24:33:PM', 1, 1),
(38, 'División De Talento Humano ', 4, 3, '2023/04/13', '03:22:05:PM', 1, 1),
(39, 'Sede La Romana', 4, 32, '2023/04/13', '04:21:07:PM', 1, 1),
(40, 'Sede Regional Aragua ', 4, 32, '2023/04/13', '04:21:30:PM', 1, 1),
(41, 'Tributos Aragua', 4, 32, '2023/04/13', '04:21:50:PM', 1, 1),
(42, 'Unidad De Planificación', 4, 2, '2023/04/13', '04:26:02:PM', 1, 1),
(43, 'Unidad De Tecnología Educativa', 4, 9, '2023/04/13', '04:26:52:PM', 1, 1),
(44, 'Unidad De Adiestramiento De Empresa', 4, 13, '2023/04/13', '04:27:32:PM', 1, 1),
(45, 'Unidad De Formación Delegada', 4, 14, '2023/04/13', '04:28:17:PM', 1, 1),
(46, 'Unidad Programa Navional Aprendisaje', 4, 15, '2023/04/13', '04:29:31:PM', 1, 1),
(47, 'Unidades Móviles', 4, 16, '2023/04/13', '04:29:59:PM', 1, 1),
(48, 'Coordinación Programa Ferroviario', 4, 33, '2023/11/04', '02:10:00:AM', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes_codigo`
--

CREATE TABLE `sedes_codigo` (
  `idcs` int(11) NOT NULL,
  `codigo_sede` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes_codigo`
--

INSERT INTO `sedes_codigo` (`idcs`, `codigo_sede`) VALUES
(1, '44,000,021'),
(2, '441,000,021'),
(3, '443,000,021'),
(4, '444,000,021'),
(5, '445,000,021'),
(6, '446,000,021'),
(7, '447,000,021'),
(9, '447,200,021'),
(33, '447,301,021'),
(11, '447,304,021'),
(12, '447,306,021'),
(13, '447,310,021'),
(14, '447,311,021'),
(15, '447,312,021'),
(16, '447,313,021'),
(17, '447,400,021'),
(18, '447,411,021'),
(19, '447,412,021'),
(20, '447,421,021'),
(21, '447,422,021'),
(22, '447,423,021'),
(23, '447,424,021'),
(24, '447,425,021'),
(25, '447,426,021'),
(26, '447,427,021'),
(27, '447,431,021'),
(28, '447,432,021'),
(29, '447,433,021'),
(30, '447,441,021'),
(31, '447,442,021'),
(8, '448,000,021'),
(32, 'SIN-CDG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL,
  `idpersonal` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `comida` varchar(50) DEFAULT NULL,
  `estatus_ticket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula_usuario` int(20) NOT NULL,
  `idrol` int(20) NOT NULL,
  `fecha_usuario` varchar(20) DEFAULT NULL,
  `hora_usuario` varchar(20) DEFAULT NULL,
  `activo_us` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `contraseña`, `nombre`, `cedula_usuario`, `idrol`, `fecha_usuario`, `hora_usuario`, `activo_us`) VALUES
(1, 'Jeison', '30012937*', 'jeison', 30012937, 5, '2023/03/02', '11:02:52:PM', 'activado'),
(2, 'jose', '1212', 'pedrohh', 12456999, 4, '2023/03/24', '07:43:24:AM', 'desactivado'),
(3, 'joseluis', 'jose1212', 'jose', 14995017, 3, '2023/03/24', '11:10:56:AM', 'desactivado'),
(4, 'david', '5050 ', 'juan', 15533807, 2, '2023/03/29', '10:25:09:AM', 'activado'),
(9, 'admin', '123 ', 'admin', 30012937, 1, NULL, NULL, 'activado'),
(10, 'sofimarquina', '21098127', 'Isbelia', 21098127, 5, '2023/11/02', '02:02:32:PM', 'activado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta-solicitud`
--
ALTER TABLE `alerta-solicitud`
  ADD PRIMARY KEY (`idsoli`),
  ADD KEY `idpersonal_soli` (`idpersonal_soli`);

--
-- Indices de la tabla `ausencia_justificada`
--
ALTER TABLE `ausencia_justificada`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `idpersonal` (`idpersonal`),
  ADD KEY `iden_usuario_aj` (`iden_usuario_aj`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idestatus`),
  ADD KEY `iden_usuario` (`iden_usuario`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`idinvitados`),
  ADD KEY `id_usuario` (`id_usuario_invi`),
  ADD KEY `id_usuario_2` (`id_usuario_invi`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`),
  ADD KEY `iden_usuario` (`iden_usuario`);

--
-- Indices de la tabla `pedir_comida`
--
ALTER TABLE `pedir_comida`
  ADD PRIMARY KEY (`idcomer`),
  ADD KEY `idpersonal` (`idpersonal`),
  ADD KEY `idusuario` (`id_usuario`),
  ADD KEY `idactualizar` (`id_ticket_act`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermisos_aj`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`),
  ADD KEY `idsede` (`idsede`,`idestatus`),
  ADD KEY `estatus` (`idestatus`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `personal_eliminado`
--
ALTER TABLE `personal_eliminado`
  ADD PRIMARY KEY (`ideliminado`),
  ADD KEY `idpersonal` (`idpersonal`);

--
-- Indices de la tabla `perticket`
--
ALTER TABLE `perticket`
  ADD PRIMARY KEY (`idticket`),
  ADD KEY `idpersonal` (`idpersonal`),
  ADD KEY `iden_usuario` (`iden_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`idsede`),
  ADD KEY `idestados` (`idestados`),
  ADD KEY `iden_usuario` (`iden_usuario`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `sedes_codigo`
--
ALTER TABLE `sedes_codigo`
  ADD PRIMARY KEY (`idcs`),
  ADD KEY `codigo_sede` (`codigo_sede`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idticket`),
  ADD KEY `idpersonal` (`idpersonal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta-solicitud`
--
ALTER TABLE `alerta-solicitud`
  MODIFY `idsoli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ausencia_justificada`
--
ALTER TABLE `ausencia_justificada`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idestatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `idinvitados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedir_comida`
--
ALTER TABLE `pedir_comida`
  MODIFY `idcomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermisos_aj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_eliminado`
--
ALTER TABLE `personal_eliminado`
  MODIFY `ideliminado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `perticket`
--
ALTER TABLE `perticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `idsede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `sedes_codigo`
--
ALTER TABLE `sedes_codigo`
  MODIFY `idcs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta-solicitud`
--
ALTER TABLE `alerta-solicitud`
  ADD CONSTRAINT `soli-personal` FOREIGN KEY (`idpersonal_soli`) REFERENCES `personal` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ausencia_justificada`
--
ALTER TABLE `ausencia_justificada`
  ADD CONSTRAINT `id_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`idpermisos_aj`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iden_usaurio` FOREIGN KEY (`iden_usuario_aj`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD CONSTRAINT `identificador_estatus_usuario` FOREIGN KEY (`iden_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD CONSTRAINT `usuario_invitado` FOREIGN KEY (`id_usuario_invi`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `usuario_menu` FOREIGN KEY (`iden_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedir_comida`
--
ALTER TABLE `pedir_comida`
  ADD CONSTRAINT `comer_personal` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idactualizar` FOREIGN KEY (`id_ticket_act`) REFERENCES `personal` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `estatus` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sedes` FOREIGN KEY (`idsede`) REFERENCES `sedes` (`idsede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_eliminado`
--
ALTER TABLE `personal_eliminado`
  ADD CONSTRAINT `perosnal_personal` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perticket`
--
ALTER TABLE `perticket`
  ADD CONSTRAINT `personal_reporte` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`iden_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `codigo_sede` FOREIGN KEY (`codigo`) REFERENCES `sedes_codigo` (`idcs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estados` FOREIGN KEY (`idestados`) REFERENCES `estados` (`idestado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`iden_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `personal_ticket` FOREIGN KEY (`idpersonal`) REFERENCES `pedir_comida` (`idpersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `roles` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
