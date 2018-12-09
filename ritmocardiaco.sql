-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2018 a las 17:09:02
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
(2, 0, 20, 'todas', 'no tiene observaciones', 78495689),
(3, 150, 120, 'no', 'laralala alal            ', 78561896),
(4, NULL, NULL, NULL, NULL, 78546985),
(5, 0, 0, '', 'La persona viene del planeta vegito                            ', 75558957),
(6, NULL, NULL, NULL, NULL, 76406431),
(7, NULL, NULL, NULL, NULL, 76549843),
(8, NULL, NULL, NULL, NULL, 2147483647);

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
(9, 'Un paciente muuyyy lok', 11354151, '2018-12-01 23:13:40'),
(11, 'Kjasdas ad asdjkas ka asjfkasj kasjf kl', 70598957, '2018-12-01 23:27:37'),
(12, 'otra pri jasdj kasndk  ', 11354151, '2018-12-01 23:28:19'),
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
('70485826', 'Lenyn Elí ', 'Flores balandra', 'San jerónimo', 'Lalenyn@gmail.com', '998745269', NULL, '12345', 'admin'),
('70598957', 'kevin', 'Quispe Lima', 'A.V Los libertadores - psj. Grau s/n ', 'unajmakev@gmail.com', '987075780', 983677639, '1234', 'paciente'),
('75558957', 'vegeta', 'kakaroto', 'Jr. los chancas S/N', 'vegeta@gmail.com', '985633214', 0, 'no', 'paciente'),
('76406431', 'julio', 'balandra ', 'AV. Los libertadores', 'julio@gmail.com', '999456147', 985666321, 'no', 'paciente'),
('76549843', 'admi', 'admi', 'Jr. los chancas S/N', 'admi@gmail.com', '963258741', 963258456, 'admi', 'admin'),
('78495689', 'Marcos', 'León perez', 'Av. lirios', 'marquitos@gmail.com', '985633215', NULL, '1234', 'paciente'),
('78546985', 'caty', 'verde castro ', 'AV. Los libertadores', 'caty@gmail.com', '987655416', NULL, 'no', 'paciente'),
('78945612', 'lclasm', 'lkmm', 'kjnjnnj', 'unajmakev@gmail.com', '98745', 48441212, 'mkmk', 'admi');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
