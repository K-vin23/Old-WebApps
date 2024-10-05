-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 19:26:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elpiefeliz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `IDmercancia` int(10) NOT NULL,
  `IDmodelo` int(9) NOT NULL,
  `Talla` int(2) NOT NULL,
  `Unidades` int(4) NOT NULL,
  `Precio_Unit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`IDmercancia`, `IDmodelo`, `Talla`, `Unidades`, `Precio_Unit`) VALUES
(1, 110321410, 36, 30, '90000.00'),
(2, 110433122, 38, 23, '120000.00'),
(3, 110454162, 19, 50, '80000.00'),
(4, 120135442, 35, 46, '85900.00'),
(5, 110233462, 39, 36, '133000.00'),
(6, 112053412, 19, 60, '40000.00'),
(7, 110052443, 38, 80, '78000.00'),
(8, 120063225, 37, 18, '77000.00'),
(9, 110073145, 20, 70, '43000.00'),
(10, 120272345, 37, 55, '93000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `IDcolor` varchar(4) NOT NULL,
  `Color_princ` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`IDcolor`, `Color_princ`) VALUES
('AZUL', 'Azul'),
('BEIG', 'Beige'),
('BLCO', 'Blanco'),
('GRIS', 'Gris'),
('MRON', 'Marron'),
('NGRO', 'Negro'),
('ROJO', 'Rojo'),
('ROSA', 'Rosa'),
('VRDE', 'Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IDgenero` varchar(2) NOT NULL,
  `Genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IDgenero`, `Genero`) VALUES
('H', 'Hombre'),
('M', 'Mujer'),
('NH', 'Nino'),
('NM', 'Nina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `IDmarca` varchar(6) NOT NULL,
  `Marca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`IDmarca`, `Marca`) VALUES
('ACTLFE', 'ActiveLife'),
('CHKSHO', 'ChikShoes'),
('CLSSIC', 'Classico'),
('ELGMOV', 'ElegantMove'),
('FCYWLK', 'FancyWalk'),
('STEPUP', 'StepUp'),
('SWTSTP', 'SweetSteps'),
('TGHBOT', 'ToughBoots'),
('TYTRCK', 'TinyTracks'),
('URBNFT', 'UrbanFeet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `IDmodelo` int(9) NOT NULL,
  `Modelo` text NOT NULL,
  `IDmarca` varchar(6) NOT NULL,
  `IDtipocalzado` varchar(4) NOT NULL,
  `IDcolor` varchar(4) NOT NULL,
  `IDgenero` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`IDmodelo`, `Modelo`, `IDmarca`, `IDtipocalzado`, `IDcolor`, `IDgenero`) VALUES
(110052443, 'SportyFlex', 'ACTLFE', 'ZAPT', 'AZUL', 'H'),
(110073145, 'FunRunner', 'TYTRCK', 'ZAPT', 'VRDE', 'NH'),
(110233462, 'MountainGrip', 'TGHBOT', 'BOOT', 'NGRO', 'H'),
(110321410, 'Elegance 500', 'CLSSIC', 'TACN', 'NGRO', 'M'),
(110433122, 'StreetRun', 'URBNFT', 'ZAPT', 'BLCO', 'H'),
(110454162, 'LittleAdventure', 'STEPUP', 'BOOT', 'MRON', 'NH'),
(112053412, 'Mini Princess', 'SWTSTP', 'SAND', 'ROSA', 'NM'),
(120063225, 'Formal Lux', 'ELGMOV', 'MCIN', 'BEIG', 'M'),
(120135442, 'Crystal Heels', 'FCYWLK', 'TACN', 'ROJO', 'M'),
(120272345, 'UrbanCharm', 'CHKSHO', 'BOTI', 'GRIS', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_calzado`
--

CREATE TABLE `tipo_calzado` (
  `IDtipocalzado` varchar(4) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_calzado`
--

INSERT INTO `tipo_calzado` (`IDtipocalzado`, `Tipo`) VALUES
('BOOT', 'Botas'),
('BOTI', 'Botines'),
('MCIN', 'Mocasines'),
('SAND', 'Sandalias'),
('TACN', 'Tacones'),
('ZAPT', 'Zapatillas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`IDmercancia`),
  ADD KEY `FK_BOD_MODEL` (`IDmodelo`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`IDcolor`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IDgenero`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IDmarca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`IDmodelo`),
  ADD KEY `FK_MODE_MARCA` (`IDmarca`),
  ADD KEY `FK_MODE_TIPO` (`IDtipocalzado`),
  ADD KEY `FK_MODE_GENERO` (`IDgenero`),
  ADD KEY `FK_MODE_COLOR` (`IDcolor`);

--
-- Indices de la tabla `tipo_calzado`
--
ALTER TABLE `tipo_calzado`
  ADD PRIMARY KEY (`IDtipocalzado`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `FK_BOD_MODEL` FOREIGN KEY (`IDmodelo`) REFERENCES `modelo` (`IDmodelo`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `FK_MODE_COLOR` FOREIGN KEY (`IDcolor`) REFERENCES `color` (`IDcolor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MODE_GENERO` FOREIGN KEY (`IDgenero`) REFERENCES `genero` (`IDgenero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MODE_MARCA` FOREIGN KEY (`IDmarca`) REFERENCES `marca` (`IDmarca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MODE_TIPO` FOREIGN KEY (`IDtipocalzado`) REFERENCES `tipo_calzado` (`IDtipocalzado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
