-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2017 a las 18:58:49
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gerac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `num_emp` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `appaterno` varchar(30) NOT NULL,
  `apmaterno` varchar(30) DEFAULT NULL,
  `plaza` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `num_emp`, `nombre`, `appaterno`, `apmaterno`, `plaza`, `activo`) VALUES
(22, 1231, 'DIANA', 'DE', 'LA ROSA', 1, 1),
(23, 4141, 'MARIBEL', 'HERNANDEZ', 'QUIROZ', 8, 1),
(25, 3121, 'GERARDO ', 'CRUZ', 'CRUZ ', 5, 1),
(50, 5141, 'JANNY', 'ROBLES', 'PULL ', 4, 1),
(51, 1324, 'JUAN', 'ALVAREZ', 'CORTES ', 9, 1),
(55, 9272, 'OCTAVIO ', 'CALDERON ', '', 2, 1),
(56, 5656, 'GVJY', 'YGYUG', 'UG', 2, 1),
(57, 5689, 'JHKHI', 'OOIOI', 'IPIPIPO', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazas`
--

CREATE TABLE `plazas` (
  `idPlaza` int(11) NOT NULL,
  `nomPlaza` varchar(40) NOT NULL,
  `uadmin` varchar(40) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plazas`
--

INSERT INTO `plazas` (`idPlaza`, `nomPlaza`, `uadmin`, `activo`) VALUES
(1, 'Analista de Desarrollo', 'Gerencia de Informatica', 1),
(2, 'Jefe de Departamento', 'Gerencia de Informatica', 1),
(3, 'Analista de DBA', 'Gerencia de Informatica', 1),
(4, 'Analista de BI', 'Gerencia de Informatica', 1),
(5, 'Analista de Personal', 'Gerencia de Recursos Humanos', 1),
(6, 'Analista de Desarrollo', 'Gerencia de Informatica', 1),
(7, 'Analista de Departamento', 'Gerencia de Recursos Humanos', 1),
(8, 'Analista de Capacitacion', 'Gerencia de Produccion', 1),
(9, 'Analista de Materiales', 'Gerencia de Materiales', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD UNIQUE KEY `num_emp` (`num_emp`);

--
-- Indices de la tabla `plazas`
--
ALTER TABLE `plazas`
  ADD PRIMARY KEY (`idPlaza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `plazas`
--
ALTER TABLE `plazas`
  MODIFY `idPlaza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
