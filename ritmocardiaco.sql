-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2018 a las 00:39:14
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
-- Estructura de tabla para la tabla `cardiologo`
--

CREATE TABLE `cardiologo` (
  `Idcardiologo` varchar(15) NOT NULL,
  `Usuario_DNI` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gorro`
--

CREATE TABLE `gorro` (
  `Idgorro` int(11) NOT NULL,
  `ips_gorro` varchar(50) DEFAULT NULL,
  `Ritmo_Idritmo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_incidencias`
--

CREATE TABLE `historial_incidencias` (
  `Id_histo` int(11) NOT NULL,
  `Fecha_in` date DEFAULT NULL,
  `Nivel_gravedad` varchar(45) DEFAULT NULL,
  `obserbaciones` varchar(80) DEFAULT NULL,
  `Gorro_Idgorro` int(11) NOT NULL,
  `Gorro_Ritmo_Idritmo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'prueba 2', 1234, '2018-12-01 22:37:10'),
(2, 'lalalalal', 12324, '2018-12-01 22:37:10'),
(3, 'haciendo prueba desde la plataforma', 70598957, '2018-12-01 22:37:10'),
(4, 'sas', 3487, '2018-12-01 22:37:10'),
(5, 'otra pruebita mas con lorem o sin lorem masdjakdna hjasdb jasb jasfnb jasfnbjnfd jas', 70598957, '2018-12-01 22:37:10'),
(6, 'larallaldsk lasdk lasdalk kld alañlal', 3487, '2018-12-01 22:40:30'),
(7, 'Prueba 1100', 70598957, '2018-12-01 22:41:27'),
(8, 'otra observacion', 70598957, '2018-12-01 22:59:44'),
(9, 'Un paciente muuyyy lok', 11354151, '2018-12-01 23:13:40'),
(11, 'Kjasdas ad asdjkas ka asjfkasj kasjf kl', 70598957, '2018-12-01 23:27:37'),
(12, 'otra pri jasdj kasndk  ', 11354151, '2018-12-01 23:28:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Idpaciente` int(11) NOT NULL,
  `Peso` decimal(10,0) DEFAULT NULL,
  `Talla` decimal(10,0) DEFAULT NULL,
  `Grupo_sanguineo` char(5) DEFAULT NULL,
  `Alergias` varchar(80) DEFAULT NULL,
  `Antecedentes` varchar(150) DEFAULT NULL,
  `Obserbaciones` varchar(150) DEFAULT NULL,
  `Historial` varchar(150) DEFAULT NULL,
  `Usuario_DNI` char(8) NOT NULL,
  `Cardiologo_Idcardiologo` varchar(15) NOT NULL,
  `Cardiologo_Usuario_DNI` char(8) NOT NULL,
  `Historial_incidencias_Id_histo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`Idpaciente`, `Peso`, `Talla`, `Grupo_sanguineo`, `Alergias`, `Antecedentes`, `Obserbaciones`, `Historial`, `Usuario_DNI`, `Cardiologo_Idcardiologo`, `Cardiologo_Usuario_DNI`, `Historial_incidencias_Id_histo`) VALUES
(1, '70', '2', 'O+', 'niguno', 'ninguno', 'ninguno', 'lalal', '70598957', 'lalal', 'a1236547', 12),
(2, '70', '2', 'O+', 'sasas', 'sasa', 'dadas', 'dasas', '12345678', 'sasass', '87456123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ritmo`
--

CREATE TABLE `ritmo` (
  `Idritmo` int(11) NOT NULL,
  `Medida_ritmo` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Contrasena` varchar(25) DEFAULT NULL,
  `Tipo_usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DNI`, `Nombre`, `Apellido`, `Direccion`, `Correo`, `Celular`, `Contrasena`, `Tipo_usuario`) VALUES
('11354151', 'lalenyn', 'safdsafdsdfsd', 'ndfasndjasn', 'lenynrara@gmail.com', NULL, '111', ''),
('70485826', 'Lenyn Elí ', 'Flores balandra', 'San jerónimo', 'Lalenyn@gmail.com', '998745269', '12345', 'admin'),
('70598957', 'kevin', 'quispel ima', 'A.V Los libertadores - psj. Grau s/n ', 'unajmakev@gmail.com', '987075780', '1234', 'paciente'),
('89568974', 'Admerson', 'cahuana', 'A.v piscina', 'admerson@gmail.com', NULL, 'admerson', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cardiologo`
--
ALTER TABLE `cardiologo`
  ADD PRIMARY KEY (`Idcardiologo`,`Usuario_DNI`);

--
-- Indices de la tabla `gorro`
--
ALTER TABLE `gorro`
  ADD PRIMARY KEY (`Idgorro`,`Ritmo_Idritmo`);

--
-- Indices de la tabla `historial_incidencias`
--
ALTER TABLE `historial_incidencias`
  ADD PRIMARY KEY (`Id_histo`,`Gorro_Idgorro`,`Gorro_Ritmo_Idritmo`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`Idpaciente`,`Usuario_DNI`,`Cardiologo_Idcardiologo`,`Cardiologo_Usuario_DNI`,`Historial_incidencias_Id_histo`);

--
-- Indices de la tabla `ritmo`
--
ALTER TABLE `ritmo`
  ADD PRIMARY KEY (`Idritmo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gorro`
--
ALTER TABLE `gorro`
  MODIFY `Idgorro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_incidencias`
--
ALTER TABLE `historial_incidencias`
  MODIFY `Id_histo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `Idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ritmo`
--
ALTER TABLE `ritmo`
  MODIFY `Idritmo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
