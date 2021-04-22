-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2021 a las 01:39:19
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aron-9`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbctascow`
--

CREATE TABLE `tbctascow` (
  `codAut` int(11) NOT NULL,
  `pago` decimal(10,2) NOT NULL,
  `idCli` varchar(15) NOT NULL,
  `CiFunc` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(35) NOT NULL DEFAULT 'CREADO',
  `procesado` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbctascow`
--

INSERT INTO `tbctascow` (`codAut`, `pago`, `idCli`, `CiFunc`, `fecha`, `estado`, `procesado`) VALUES
(1, '800.00', '635281', '1', '2020-10-24 08:53:05', 'ENVIADO', 0),
(2, '700.00', '635281', '1', '2020-10-24 08:53:36', 'ENVIADO', 0),
(3, '7000.00', '635281', '1', '2020-10-24 08:55:32', 'ENVIADO', 0),
(4, '500.00', '3099918015', '1', '2020-10-24 09:08:18', 'ENVIADO', 0),
(5, '200.00', '3099918015', '1', '2020-10-24 09:09:07', 'ENVIADO', 0),
(6, '5467.00', '635281', '1', '2020-10-24 09:12:39', 'ENVIADO', 0),
(7, '100.00', '69586480', '10', '2020-11-07 08:58:14', 'CREADO', 0),
(8, '4432.00', '23', '7', '2020-12-05 08:27:26', 'ENVIADO', 0),
(9, '4000.00', '10000', '7', '2020-12-05 08:27:40', 'ENVIADO', 0),
(10, '2125.62', '10000', '7', '2021-04-20 09:24:37', 'ENVIADO', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbctascow`
--
ALTER TABLE `tbctascow`
  ADD PRIMARY KEY (`codAut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbctascow`
--
ALTER TABLE `tbctascow`
  MODIFY `codAut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
