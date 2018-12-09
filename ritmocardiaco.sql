-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2018 a las 22:45:32
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ritmocardiaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_paciente`
--

CREATE TABLE `datos_paciente` (
  `id` int(11) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `alergia` varchar(200) DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `dni_usuario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_paciente`
--

INSERT INTO `datos_paciente` (`id`, `peso`, `talla`, `alergia`, `observacion`, `dni_usuario`) VALUES
(1, 84, 169, 'Polio, penicilina, citomiricina.', '                                    Este tipo es el tipo                                                                               ', 70598957),
(9, NULL, NULL, NULL, NULL, 74589632),
(10, NULL, NULL, NULL, NULL, 31152319),
(11, NULL, NULL, NULL, NULL, 31149535);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id`, `observacion`, `id_usuario`, `fecha`) VALUES
(3, 'haciendo prueba desde la plataforma', 70598957, '2018-12-01 22:37:10'),
(5, 'otra pruebita mas con lorem o sin lorem masdjakdna hjasdb jasb jasfnb jasfnbjnfd jas', 70598957, '2018-12-01 22:37:10'),
(7, 'Prueba de modificadooo', 70598957, '2018-12-05 19:13:48'),
(8, 'otra observacion', 70598957, '2018-12-01 22:59:44'),
(11, 'Kjasdas ad asdjkas ka asjfkasj kasjf kl', 70598957, '2018-12-01 23:27:37'),
(13, 'otrita pruebita', 70598957, '2018-12-03 14:40:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `DNI` char(8) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) DEFAULT NULL,
  `celular2` int(9) DEFAULT NULL,
  `Contrasena` varchar(25) DEFAULT NULL,
  `Tipo_usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DNI`, `Nombre`, `Apellido`, `Direccion`, `Correo`, `Celular`, `celular2`, `Contrasena`, `Tipo_usuario`) VALUES
('', '', '', '', '', '', 0, 'no', 'admin'),
('31149535', 'Samuel', 'Ccoicca Flores', 'Psj. Rosales', '', '953821171', 0, 'no', 'paciente'),
('31152319', 'Roberto', 'Chirino sevallos', 'Jr. Los chancas S/N', '', '982045988', 0, 'no', 'paciente'),
('31551695', 'Rodolfo', 'Quispe peralta', 'Av. Los libertadores', 'rodoqp@gmail.com', '973631841', 0, 'no', 'paciente'),
('70485826', 'Lenyn Elí ', 'Flores balandra', 'San jerónimo', 'Lalenyn@gmail.com', '998745269', NULL, '12345', 'admin'),
('70598957', 'kevin', 'Quispe Lima', 'A.V Los libertadores - psj. Grau s/n ', 'unajmakev@gmail.com', '987075780', 983677639, '1234', 'paciente'),
('76549843', 'admi', 'admi', 'Jr. los chancas S/N', 'admin@gmail.com', '963258741', 963258456, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_paciente`
--
ALTER TABLE `datos_paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_paciente`
--
ALTER TABLE `datos_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
