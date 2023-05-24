-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2023 a las 08:18:03
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_supervisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizaciones`
--

CREATE TABLE `autorizaciones` (
  `id_auto` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `fecha_auto` date NOT NULL,
  `ingreso_auto` time NOT NULL,
  `salida_auto` time DEFAULT NULL,
  `autorizacion_auto` enum('Activo','Denegado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(11) NOT NULL,
  `nombres_emp` varchar(100) NOT NULL,
  `apellidos_emp` varchar(100) NOT NULL,
  `tipo_documento_emp` varchar(100) NOT NULL,
  `numero_documento_emp` int(11) NOT NULL,
  `foto_emp` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `empleados`
--
DELIMITER $$
CREATE TRIGGER `TR_DELETE_EMPLEADO_AUTORIZACIONES` BEFORE DELETE ON `empleados` FOR EACH ROW DELETE FROM autorizaciones
WHERE old.id_emp=autorizaciones.id_emp
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_autorizaciones_empleados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_autorizaciones_empleados` (
`id_emp` int(11)
,`nombres_emp` varchar(100)
,`apellidos_emp` varchar(100)
,`tipo_documento_emp` varchar(100)
,`numero_documento_emp` int(11)
,`foto_emp` varchar(250)
,`id_auto` int(11)
,`fecha_auto` date
,`ingreso_auto` time
,`salida_auto` time
,`autorizacion_auto` enum('Activo','Denegado')
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_autorizaciones_empleados`
--
DROP TABLE IF EXISTS `vw_autorizaciones_empleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_autorizaciones_empleados`  AS SELECT `empleados`.`id_emp` AS `id_emp`, `empleados`.`nombres_emp` AS `nombres_emp`, `empleados`.`apellidos_emp` AS `apellidos_emp`, `empleados`.`tipo_documento_emp` AS `tipo_documento_emp`, `empleados`.`numero_documento_emp` AS `numero_documento_emp`, `empleados`.`foto_emp` AS `foto_emp`, `autorizaciones`.`id_auto` AS `id_auto`, `autorizaciones`.`fecha_auto` AS `fecha_auto`, `autorizaciones`.`ingreso_auto` AS `ingreso_auto`, `autorizaciones`.`salida_auto` AS `salida_auto`, `autorizaciones`.`autorizacion_auto` AS `autorizacion_auto` FROM (`empleados` join `autorizaciones` on(`autorizaciones`.`id_emp` = `empleados`.`id_emp`)) ORDER BY `autorizaciones`.`id_auto` DESC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `FK_EMPLEADO_AUTORIZACION` (`id_emp`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`),
  ADD UNIQUE KEY `numero_documento_emp` (`numero_documento_emp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  ADD CONSTRAINT `FK_EMPLEADO_AUTORIZACION` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
