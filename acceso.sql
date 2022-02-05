-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2022 a las 14:29:19
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acceso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empeados_id` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `clave` varchar(128) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `pregunta1` varchar(30) NOT NULL,
  `respuesta1` varchar(30) NOT NULL,
  `pregunta2` varchar(30) NOT NULL,
  `respuesta2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empeados_id`, `correo`, `clave`, `nombre`, `nivel`, `pregunta1`, `respuesta1`, `pregunta2`, `respuesta2`) VALUES
(1, 'empleado1@gmail.com', '12345678', 'empleado1', 2, 'color', 'azul', 'numero', '4'),
(2, 'recepcionista@gmail.com', '123456', 'dsad', 1, 'dasdasd', 'dasdasd', '', 'dsadasdsad'),
(4, 'dasdas@gmail.com', '12345678|', 'dasd', 1, 'dsadasd', 'dasdasd', 'dasdasd', 'dsadasdad'),
(5, 'recepcionista@gmail.com', '123456', '', 1, '', '', '', ''),
(6, 'recepcionista@gmail.com', '123456', '', 1, '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empeados_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empeados_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
