-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-05-2019 a las 21:13:21
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `HomeSwitchHome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechasDisponibles`
--

CREATE TABLE `fechasDisponibles` (
  `idFecha` int(11) NOT NULL,
  `idHospedaje` int(11) DEFAULT NULL,
  `inicioSemana` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje`
--

CREATE TABLE `hospedaje` (
  `idHospedaje` int(11) NOT NULL,
  `titulo` varchar(85) DEFAULT NULL,
  `descripcion` text,
  `precio` float DEFAULT NULL,
  `imagenData` varchar(78) DEFAULT NULL,
  `imagenType` varchar(50) DEFAULT NULL,
  `cantidadPersonas` int(2) DEFAULT NULL,
  `cantidadSemanasDisp` int(2) DEFAULT NULL,
  `fechaInicioSubasta` date DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedaje`
--

INSERT INTO `hospedaje` (`idHospedaje`, `titulo`, `descripcion`, `precio`, `imagenData`, `imagenType`, `cantidadPersonas`, `cantidadSemanasDisp`, `fechaInicioSubasta`, `tipo`, `estado`) VALUES
(1, 'Hola mundo', 'Primer hospedaje', 420, '/opt/lampp/htdocs/HomeSwitchHome/Grupo7/Site/images/idHospedaje1.jpeg', 'image/jpeg', 4, 0, NULL, 'normal', 1),
(2, 'Hola mundo 2', 'aca', 420, '/opt/lampp/htdocs/HomeSwitchHome/Grupo7/Site/images/idHospedaje2.jpeg', 'image/jpeg', 4, 0, NULL, 'normal', 1),
(3, 'Camila linda', 'lamas linda es cami', 5555, '/opt/lampp/htdocs/HomeSwitchHome/Grupo7/Site/images/idHospedaje3.jpeg', 'image/jpeg', 4, 0, NULL, 'normal', 1),
(4, 'hola mundo 4', 'Aca en conceptos', 5555, '/opt/lampp/htdocs/HomeSwitchHome/Grupo7/Site/images/idHospedaje4.jpeg', 'image/jpeg', 3, 0, NULL, 'normal', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fechasDisponibles`
--
ALTER TABLE `fechasDisponibles`
  ADD PRIMARY KEY (`idFecha`),
  ADD KEY `idHospedaje` (`idHospedaje`);

--
-- Indices de la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  ADD PRIMARY KEY (`idHospedaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fechasDisponibles`
--
ALTER TABLE `fechasDisponibles`
  MODIFY `idFecha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  MODIFY `idHospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
