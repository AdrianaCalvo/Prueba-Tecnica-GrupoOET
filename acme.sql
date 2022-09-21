-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2022 a las 07:49:56
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `cedula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `ciudad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`cedula`, `nombre`, `apellido`, `direccion`, `telefono`, `ciudad`) VALUES
(181199, 'Pepito', ' Perez', 'cra 29 # 28', '3218852', 'Pereira'),
(250356, 'Lucia', 'Cardona', 'Calle 58 # 15-27', '3256565', 'Cali'),
(339160, 'Juanito', 'Correa', 'Cra 25 # 4-12', '3282262', 'Manizales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `cedula` int(11) NOT NULL,
  `nombre_propietario` text NOT NULL,
  `apellido` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `ciudad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`cedula`, `nombre_propietario`, `apellido`, `direccion`, `telefono`, `ciudad`) VALUES
(228263, 'Juan Jose', 'Quintero', 'Cra 28 # 6-15', '3454545', 'Medellin'),
(260396, 'Daniel', 'Muñoz', 'Cra 15 # 6', '3589595', 'Medellin'),
(328456, 'Mario', 'Quintero', 'calle 25 A 89', '3246161', 'Armenia'),
(1193054860, 'Adriana', ' López', 'calle 58 # 14 A 27', '3215001033', 'Dosquebradas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `placa` text NOT NULL,
  `color` text NOT NULL,
  `marca` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `cc_propietario` int(11) NOT NULL,
  `cc_conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `color`, `marca`, `tipo`, `cc_propietario`, `cc_conductor`) VALUES
(1, 'HIL55E', 'Negro', 'TT', 1, 228263, 339160),
(2, 'DMT37F', 'Negro', ' DT', 1, 260396, 250356),
(3, 'APL37F', 'Azul', ' Mazda', 2, 1193054860, 181199);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehiculo_propietario` (`cc_propietario`),
  ADD KEY `fk_vehiculo_conductor` (`cc_conductor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculo_conductor` FOREIGN KEY (`cc_conductor`) REFERENCES `conductores` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vehiculo_propietario` FOREIGN KEY (`cc_propietario`) REFERENCES `propietario` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
