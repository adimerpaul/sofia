-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2021 a las 17:06:39
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
-- Estructura de tabla para la tabla `tbpedidos`
--

CREATE TABLE `tbpedidos` (
  `codAut` int(11) NOT NULL,
  `NroPed` int(5) DEFAULT NULL,
  `cod_prod` varchar(25) DEFAULT NULL,
  `CIfunc` varchar(15) DEFAULT NULL,
  `idCli` varchar(15) DEFAULT NULL,
  `Cant` decimal(10,2) DEFAULT NULL,
  `Tipo1` decimal(10,2) NOT NULL,
  `Tipo2` decimal(10,2) NOT NULL,
  `Canttxt` varchar(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` varchar(35) NOT NULL DEFAULT 'CREADO',
  `estados` varchar(20) NOT NULL DEFAULT 'VAYA',
  `impreso` int(1) NOT NULL,
  `Observaciones` char(70) NOT NULL,
  `pagado` int(1) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbpedidos`
--
ALTER TABLE `tbpedidos`
  ADD PRIMARY KEY (`codAut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbpedidos`
--
ALTER TABLE `tbpedidos`
  MODIFY `codAut` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
