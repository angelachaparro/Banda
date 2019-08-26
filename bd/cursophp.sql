-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-08-2019 a las 13:12:48
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `bio` text,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `nombre`, `apellidos`, `bio`, `email`, `password`, `role`, `image`) VALUES
(2, 'Antonio', 'Perez', 'Profesional 3', 'antonio1@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '0', '1565923123-sena.png'),
(3, 'Manuel', 'Perez', 'Profesional 2', 'manuel1@gamil.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '1', '1565961136-sena.png'),
(4, 'David', 'Perez', 'Profesional 3', 'david@gamil.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1', NULL),
(10, 'sofia', 'Aranguren', 'Estudiante', 'sofia@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '1', NULL),
(19, 'Carlota', 'Diaz', 'Abogada', 'carlota@hotmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '0', NULL),
(20, 'oscar', 'Vargas', 'Empleado', 'oscar@yahoo.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '0', '1565972544-sena.png'),
(14, 'nestor', 'Velandia', 'Profesor', 'nestor@gmail.com', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', '0', '1565924935-sena.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
