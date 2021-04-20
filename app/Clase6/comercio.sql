-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2021 a las 03:37:49
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comercio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL,
  `FechadeCreacion` date NOT NULL,
  `ultimaModificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `tipo`, `stock`, `precio`, `FechadeCreacion`, `ultimaModificacion`) VALUES
(1001, 77900361, 'Westmacott', 'liquido', 33, 15.87, '2021-09-02', '2021-04-13'),
(1002, 77900362, 'Spirit', 'solido', 45, 69.74, '2020-02-02', '2021-04-13'),
(1003, 77900363, 'Newgrosh', 'polvo', 14, 68.19, '2020-11-29', '2021-04-13'),
(1004, 77900364, 'McNickle', 'polvo', 19, 53.51, '2020-11-28', '2021-04-13'),
(1005, 77900365, 'Hudd', 'solido', 68, 26.56, '2020-02-02', '2021-04-13'),
(1006, 77900366, 'Schrader', 'polvo', 17, 96.54, '2020-08-02', '2021-04-13'),
(1007, 77900367, 'Bachellier', 'solido', 59, 69.17, '2021-01-30', '2021-04-13'),
(1008, 77900368, 'Fleming', 'solido', 38, 66.77, '2020-10-26', '2020-10-03'),
(1009, 77900369, 'Hurry', 'solido', 44, 43.01, '2020-07-04', '2021-04-13'),
(1010, 77900310, 'Krauss', 'polvo', 73, 35.73, '2021-03-03', '2021-04-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechaDeRegistro` date NOT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `clave`, `email`, `fechaDeRegistro`, `localidad`) VALUES
(101, 'Mariano', 'Kautor', '123456', 'dkantor0@example.com', '2021-01-07', 'Quilmes'),
(102, 'German', 'Gerram', '123456', 'ggerram1@hud.gov', '0000-00-00', 'Berazategui'),
(103, 'Deloris', 'Fosis', '123456', 'bsharpe2@wisc.edu', '0000-00-00', 'Avellaneda'),
(104, 'Brok', 'Neiner', '123456', 'bblazic3@desdev.cn', '0000-00-00', 'Quilmes'),
(105, 'Garrick', 'Brent', '123456', 'gbrent4@theguardian.com', '0000-00-00', 'Moron'),
(106, 'Bili', 'Baus', '123456', 'bhoff5@addthis.com', '0000-00-00', 'Moreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaVenta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `IdProducto`, `IdUsuario`, `Cantidad`, `FechaVenta`) VALUES
(1, 1001, 101, 2, '2020-07-19'),
(2, 1008, 102, 3, '2020-01-08'),
(3, 1007, 102, 4, '2021-01-24'),
(4, 1006, 103, 5, '2021-01-14'),
(5, 1003, 104, 6, '2021-03-20'),
(6, 1005, 105, 7, '2021-02-22'),
(7, 1003, 104, 6, '2020-12-02'),
(8, 1003, 106, 6, '2020-06-10'),
(9, 1002, 106, 6, '2021-04-02'),
(10, 1001, 106, 1, '2020-05-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
