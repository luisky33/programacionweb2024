-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 03:13:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`) VALUES
(3, 'Pluma Azul', 'Pluma de tinta azul, punta fina.', 5.00, 177),
(6, 'Resaltador Amarillo', 'Marcador resaltador de color amarillo.', 8.00, 250),
(7, 'Regla 30cm', 'Regla de plástico transparente de 30 cm.', 10.00, 180),
(8, 'Folder Tamaño Carta', 'Folder de plástico tamaño carta para documentos.', 12.00, 150),
(9, 'Pegamento en Barra', 'Pegamento en barra de 10 gramos.', 6.50, 215),
(10, 'Calculadora Básica', 'Calculadora de bolsillo con funciones básicas.', 55.00, 3),
(11, 'sdf', 'asd', 123.00, 4232);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol`, `email`, `password`, `avatar`) VALUES
(4, 'vendedor', 'luisantoniom490@gmail.com', '$2y$10$.OTO6bBiUJqUv9yct.5lE.WEUGlbxQtlXCjFkmoiSzyPYaA2KwPcC', ''),
(9, 'vendedor', 'luis@gmail.com', '$2y$10$Ad5b2YAlnuEJzM8CRIkcS.wAOovvrlUhMnldjh6IzzSEKTn/ySU4K', ''),
(10, 'admin', 'dsfdfsdf@gmail.com', '$2y$10$dwk/snr.VdSMON3GtXj8Mu82UHMMjO0f.eUbMnWB4Lj1aOWEuDyWm', ''),
(11, 'admin', 'dplantonioyt@gmail.com', '$2y$10$oj03XytGtOunBJhzUVOUj.yIELf1zVzD5ptNXY2Ecp82w4Lu16Up2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `producto_id`, `vendedor_id`, `fecha`, `cantidad`, `total`) VALUES
(1, 1, 3, '2024-10-30 06:12:47', 2, 51.00),
(2, 1, 3, '2024-10-30 06:13:48', 2, 51.00),
(3, 2, 3, '2024-10-30 06:15:39', 2, 6.00),
(4, 9, 3, '2024-10-30 06:15:43', 2, 13.00),
(5, 9, 3, '2024-10-30 06:15:49', 1, 6.50),
(6, 1, 3, '2024-10-30 06:16:14', 2, 51.00),
(7, 1, 3, '2024-10-30 06:25:09', 1, 25.50),
(8, 1, 3, '2024-10-30 06:25:13', 1, 25.50),
(9, 1, 3, '2024-10-30 06:25:18', 1, 25.50),
(10, 1, 3, '2024-10-30 06:26:02', 1, 25.50),
(11, 1, 3, '2024-10-30 06:28:42', 1, 25.50),
(12, 1, 3, '2024-10-30 06:34:40', 1, 25.50),
(13, 1, 3, '2024-10-30 06:39:14', 1, 25.50),
(14, 1, 3, '2024-10-30 06:43:56', 1, 25.50),
(15, 1, 1, '2024-10-30 06:44:04', 2, 51.00),
(16, 1, 1, '2024-10-30 06:44:17', 1, 25.50),
(17, 1, 1, '2024-10-30 06:44:21', 5, 127.50),
(18, 9, 1, '2024-10-30 06:44:51', 1, 6.50),
(19, 9, 1, '2024-10-30 06:45:48', 1, 6.50),
(20, 1, 1, '2024-10-30 06:53:04', 1, 25.50),
(21, 1, 1, '2024-10-30 06:57:31', 1, 25.50),
(22, 1, 1, '2024-10-30 07:00:52', 1, 25.50),
(23, 1, 1, '2024-10-30 07:03:06', 1, 25.50),
(24, 1, 1, '2024-10-30 07:03:27', 1, 25.50),
(25, 1, 1, '2024-10-30 07:03:57', 1, 25.50),
(26, 1, 1, '2024-10-30 07:08:13', 1, 25.50),
(27, 1, 1, '2024-10-30 07:08:23', 1, 25.50),
(28, 1, 1, '2024-10-30 07:11:37', 1, 25.50),
(29, 1, 1, '2024-10-30 07:37:13', 1, 25.50),
(30, 1, 1, '2024-10-30 07:37:16', 1, 25.50),
(31, 1, 1, '2024-10-30 07:37:23', 1, 25.50),
(32, 1, 1, '2024-10-30 08:27:44', 12, 306.00),
(33, 1, 1, '2024-10-30 08:28:42', 12, 306.00),
(34, 1, 1, '2024-10-30 08:29:02', 12, 306.00),
(35, 1, 1, '2024-10-30 08:31:40', 12, 306.00),
(36, 1, 1, '2024-10-30 08:32:33', 12, 306.00),
(37, 1, 1, '2024-10-30 08:33:57', 1, 25.50),
(38, 1, 1, '2024-10-30 08:35:30', 1, 25.50),
(39, 1, 1, '2024-10-30 08:35:34', 1, 25.50),
(40, 1, 1, '2024-10-30 08:38:41', 1, 25.50),
(41, 1, 1, '2024-10-30 08:39:01', 1, 25.50),
(42, 1, 1, '2024-10-30 08:39:23', 1, 25.50),
(43, 4, 1, '2024-10-30 08:40:32', 1, 2.50),
(44, 4, 1, '2024-10-30 08:41:11', 1, 2.50),
(45, 4, 1, '2024-10-30 08:42:29', 1, 2.50),
(46, 10, 1, '2024-10-30 14:33:38', 12, 660.00),
(47, 10, 1, '2024-10-30 14:34:52', 12, 660.00),
(48, 10, 1, '2024-10-30 14:34:57', 12, 660.00),
(49, 10, 1, '2024-10-30 14:35:15', 12, 660.00),
(50, 10, 1, '2024-10-30 14:35:40', 12, 660.00),
(51, 10, 1, '2024-10-30 14:38:42', 12, 660.00),
(52, 4, 1, '2024-10-30 14:39:18', 3, 7.50),
(53, 4, 1, '2024-10-30 14:39:30', 3, 7.50),
(54, 4, 1, '2024-10-30 14:40:12', 3, 7.50),
(55, 4, 1, '2024-10-30 14:40:27', 3, 7.50),
(56, 4, 1, '2024-10-30 14:40:30', 3, 7.50),
(57, 4, 1, '2024-10-30 14:40:51', 3, 7.50),
(58, 4, 1, '2024-10-30 14:40:53', 3, 7.50),
(59, 4, 1, '2024-10-30 14:42:57', 3, 7.50),
(60, 4, 1, '2024-10-30 14:43:21', 3, 7.50),
(61, 4, 1, '2024-10-30 14:43:23', 3, 7.50),
(62, 4, 1, '2024-10-30 14:43:27', 3, 7.50),
(63, 4, 1, '2024-10-30 14:43:46', 3, 7.50),
(64, 4, 1, '2024-10-30 14:46:06', 3, 7.50),
(65, 4, 1, '2024-10-30 14:52:17', 3, 7.50),
(66, 4, 1, '2024-10-30 14:52:20', 3, 7.50),
(67, 4, 1, '2024-10-30 14:52:36', 3, 7.50),
(68, 4, 1, '2024-10-30 14:53:45', 3, 7.50),
(69, 4, 1, '2024-10-30 14:53:47', 3, 7.50),
(70, 2, 1, '2024-10-30 15:54:34', 12, 36.00),
(71, 2, 1, '2024-10-30 15:55:44', 12, 36.00),
(72, 2, 1, '2024-10-30 15:57:29', 12, 36.00),
(73, 2, 1, '2024-10-30 15:57:45', 12, 36.00),
(74, 2, 1, '2024-10-30 15:57:50', 12, 36.00),
(75, 2, 1, '2024-10-30 15:58:50', 12, 36.00),
(76, 2, 1, '2024-10-30 15:59:46', 12, 36.00),
(77, 2, 1, '2024-10-30 16:00:40', 12, 36.00),
(78, 2, 1, '2024-10-30 16:01:26', 12, 36.00),
(79, 2, 1, '2024-10-30 16:02:11', 12, 36.00),
(80, 2, 1, '2024-10-30 16:03:49', 12, 36.00),
(81, 2, 1, '2024-10-30 16:08:31', 5, 15.00),
(82, 2, 1, '2024-10-30 16:08:39', 5, 15.00),
(83, 3, 1, '2024-10-30 19:36:06', 123, 615.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
