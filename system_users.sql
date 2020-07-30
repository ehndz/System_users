-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2020 a las 00:41:17
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `about` varchar(400) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `password`, `dni`, `phone`, `about`, `address`, `thumbnail`, `status`) VALUES
(1, 'ejhernandezj@gmail.com', 'Elvis', 'Hernandez', '$2y$10$TtImWuGLSxREO/fjf8PJXOpuDV5.pbESIhq8L3Fsl43UShLhIg3h6', '12312355', '954741027', 'Mi passiÃ³n es la programaciÃ³n...', 'VicuÃ±a mackenna 2935, San joaquin', '/system_users/uploads/4545454545.jpg', 1),
(17, 'stefany_pa@hotmail.com', 'Andrea Stefany', 'Melendez Palma', '$2y$10$HHel.p8J5B.vDUnp0HigROodlns0lbz3SqmjfA1ln0efg26PhxlSa', '19931036', '954741027', NULL, NULL, '/system_users/uploads/19931036.jpg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
