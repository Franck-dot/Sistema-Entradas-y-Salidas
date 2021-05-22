-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 04:10:15
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sii_apaseoa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id_user` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `gasolina` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `notas` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_entrada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_user`, `id_auto`, `km`, `gasolina`, `notas`, `hora_entrada`) VALUES
(27, 1, 45000, '3/4', 'todo bien', '0000-00-00 00:00:00'),
(28, 1, 120000, '1/2', NULL, '0000-00-00 00:00:00'),
(27, 2, 150000, 'lleno', NULL, '2020-12-30 02:43:48'),
(31, 9, 100000, '3/3', 'falta placa delandera', '2020-12-31 06:57:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas`
--

CREATE TABLE `entradas_salidas` (
  `id_user` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `km_entrada` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `km_salida` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gas_entrada` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gas_salida` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nota` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_entrada` datetime DEFAULT current_timestamp(),
  `hora_salida` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas_salidas`
--

INSERT INTO `entradas_salidas` (`id_user`, `id_auto`, `km_entrada`, `km_salida`, `gas_entrada`, `gas_salida`, `nota`, `hora_entrada`, `hora_salida`) VALUES
(28, 1, '150,130', NULL, '1/2', NULL, 'tiene golpe', '0000-00-00 00:00:00', '2020-12-31 08:42:34'),
(28, 2, '100,000', '100000', '3/4', '3/4', 'falta placa delantera', '2020-12-31 08:47:24', '2020-12-31 08:47:24'),
(30, 16, '100,000', '168,430', '3/4', '1/4', 'falta placa trasera', '2021-01-07 10:41:00', '2020-12-31 18:10:01'),
(28, 1, '150,130', '100,000', '1/2', '1/4', 'tiene golpe', '0000-00-00 00:00:00', '2021-01-08 00:51:31'),
(30, 4, '150,130', '100,000', '1/2', '1/4', 'putazo puerta derecha', '0000-00-00 00:00:00', '2021-01-08 02:09:58'),
(30, 4, '150,130', '100,000', '1/2', 'lleno', 'putazo puerta derecha', '0000-00-00 00:00:00', '2021-01-09 12:56:33'),
(31, 9, '150,130', '100,000', '3/4', '3/4', 'putazo puerta derecha', '2021-01-09 22:46:51', '2021-01-09 22:19:23'),
(31, 2, '100,000', '150,130', 'lleno', '3/4', 'tiene golpe', '2021-01-14 16:23:53', '2021-01-09 22:47:59'),
(30, 9, '150,130', '150,130', '3/4', 'lleno', 'putazo puerta derecha', '2021-01-14 16:23:53', '2021-01-09 22:51:14'),
(31, 45, '150600', '100,000', 'lleno', '3/4', 'placa', '2021-01-17 09:30:53', '2021-01-14 20:42:54'),
(1005, 9, '150390', '150600', '1/2', 'lleno', '', '2021-01-18 04:33:13', '2021-01-17 02:28:38'),
(1005, 9, '150390', '150340', '1/2', 'lleno', '', '2021-01-18 04:33:13', '2021-01-17 21:28:56'),
(1005, 9, '150390', '150360', '1/2', 'lleno', '', '2021-01-18 04:33:13', '2021-01-17 21:32:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_user` int(7) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dependencia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `privilegio` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_user`, `nombre`, `apellido`, `dependencia`, `username`, `password`, `privilegio`) VALUES
(27, 'Francisco Javier', 'Carmona Olvera', 'oficialia mayor', 'franco_oficial', 'abc1234', 'Super_User'),
(28, 'Juan heriberto', 'Perez Rico', 'juridico', 'Juancho', 'abc1234', 'Admin'),
(30, 'Francisco Javier', 'Olvera Carmona', 'H Ayuntamiento', 'klero', 'abc1234', 'Admin'),
(31, 'Raul Alejandro', 'Martinez Chavez', 'Oficialia Mayor', 'Raul', 'abc1234', 'Usuario'),
(32, 'Alfredo', 'Jimenez Perez', 'Obras Publicas', 'Alfred', 'Usuario', 'Admin'),
(1001, 'Jose de Jesus', 'Carmona', 'Obras Publicas', 'jesus', 'abc1234', 'Admin'),
(1002, 'Jose de Jesus', 'Centeno', 'Obras Publicas', '1002', 'no aplica', 'Admin'),
(1003, 'Francisco Javier', 'Centeno Carmona', 'Obras Publicas', 'no aplica', 'no aplica', 'Usuario'),
(1005, 'Jose de Jesus', 'Centeno Carmona', 'Obras Publicas', '1005', 'no aplica', 'Usuario'),
(1006, 'Jose de Jesus', 'Centeno Carmona', 'Obras Publicas', '1006', 'no aplica', 'Usuario'),
(1007, 'Jose de Jesus', 'Centeno Carmona', 'Obras Publicas', '1007', 'no aplica', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_user` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `gasolina` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora_salida` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id_user`, `id_auto`, `km`, `gasolina`, `hora_salida`) VALUES
(27, 1, 150000, '1/4', '2020-12-30 15:17:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_auto` int(11) NOT NULL,
  `marca` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `no_placas` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_autos` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_auto`, `marca`, `modelo`, `no_placas`, `dependencia_autos`) VALUES
(0, 'Toyota', 'Yaris', 'GTH-hty', 'Oficialia Mayor'),
(1, 'chevrolet', 'aveoo', 'A5w-er46', 'DIF'),
(2, 'Ford', 'Explorer', 'GHT-658', 'Obras Publicas'),
(4, 'Toyota', 'Hylux', 'GTH-7897', 'Oficialia Mayor'),
(9, 'Toyota', 'Hylux', 'GTH-789', 'Obras Publicas'),
(10, 'Toyota', 'Hylux', 'GTH-784', 'DIF'),
(11, 'Ford', 'Ranger', 'GTH-6897', 'Oficialia Mayor'),
(12, 'Ford', 'Ranger', 'A5w-er45', 'Obras Publicas'),
(13, 'Dodge', 'Taurus', 'A5w-6r45', 'Juridico'),
(14, 'Chevrolet', 'Silverado', 'A5G-TY46', 'Obras Publicas'),
(15, 'Chevrolet', 'aveo', 'GTH-7R7', 'DIF'),
(16, 'Toyota', 'Yaris', 'ASD-9D5', 'Oficialia Mayor'),
(17, 'Toyota', 'Tacoma', 'GTH-H97', 'Obras Publicas'),
(18, 'Toyota', 'Hylux', 'GTH-767', 'Obras Publicas'),
(19, 'Toyota', 'Hylux', 'GTH-H5T', 'Obras Publicas'),
(45, 'Toyota', 'Silverado', 'GTH-78T', 'Oficialia Mayor'),
(89, 'Toyota', 'Hylux', 'GTH-GTY', 'Obras Publicas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indices de la tabla `entradas_salidas`
--
ALTER TABLE `entradas_salidas`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_auto`),
  ADD UNIQUE KEY `no_placas` (`no_placas`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `personal` (`id_user`),
  ADD CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `vehiculos` (`id_auto`);

--
-- Filtros para la tabla `entradas_salidas`
--
ALTER TABLE `entradas_salidas`
  ADD CONSTRAINT `entradas_salidas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `personal` (`id_user`),
  ADD CONSTRAINT `entradas_salidas_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `vehiculos` (`id_auto`);

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `salidas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `personal` (`id_user`),
  ADD CONSTRAINT `salidas_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `vehiculos` (`id_auto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
