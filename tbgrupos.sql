-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2021 a las 01:24:58
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
-- Estructura de tabla para la tabla `tbgrupos`
--

CREATE TABLE `tbgrupos` (
  `codAut` int(11) NOT NULL,
  `Cod_grup` varchar(10) NOT NULL,
  `Cod_pdr` varchar(10) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Imprimec` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbgrupos`
--

INSERT INTO `tbgrupos` (`codAut`, `Cod_grup`, `Cod_pdr`, `Descripcion`, `Imprimec`) VALUES
(1, '11', '1', 'BANDEJA DE CERDO                                 ', ''),
(2, '12', '1', 'BANDEJA DE COSTILLA ON                           ', ''),
(3, '13', '1', 'BANDEJA DE PAVO                                  ', ''),
(4, '14        ', '1', 'BANDEJA DE POLLO                                  ', ''),
(5, '21', '2', 'CORTES                                           ', ''),
(6, '22', '2', 'ENTERO                                           ', ''),
(7, '31', '3', 'FRIAL                                            ', ''),
(8, '32', '3', 'TROZADOS                                         ', ''),
(9, '41', '4', 'ATUN                                             ', ''),
(10, '51', '5', 'CHORIZO                                          ', ''),
(11, '52', '5', 'JAMON                                            ', ''),
(12, '53', '5', 'MORTADELA                                        ', ''),
(13, '61', '6', 'VARIOS                                           ', ''),
(14, '71', '7', 'PROCESADOS                                       ', ''),
(15, '54', '5', 'PATE                                             ', ''),
(16, '55', '5', 'SALCHICHA                                        ', ''),
(17, '81', '8', 'AHUMADO                                          ', ''),
(18, '82', '8', 'QUESO ENRROLLADO                                 ', ''),
(19, '83', '8', 'SECOS                                            ', ''),
(20, '72', '7', 'HAMBURGUESA                                      ', ''),
(21, '73', '7', 'NUGGETS                                          ', ''),
(22, '91', '9', 'PODIUM                                           ', ''),
(23, '101', '10', 'CARNE DE RES                                     ', ''),
(24, '0111', '011', 'CONSERVAS                                        ', ''),
(25, '0121', '012', 'PAPAS FRITAS                                     ', ''),
(26, '7077', '7', 'API                                              ', ''),
(27, '8010', '80', 'FRUTAS Y VERDURAS CONGELADAS                     ', ''),
(28, '901', '90', 'ACEITE                                           ', ''),
(29, '0141', '014       ', 'PESCADO                                          ', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbgrupos`
--
ALTER TABLE `tbgrupos`
  ADD PRIMARY KEY (`codAut`),
  ADD UNIQUE KEY `Cod_grup` (`Cod_grup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbgrupos`
--
ALTER TABLE `tbgrupos`
  MODIFY `codAut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
