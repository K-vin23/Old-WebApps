-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2021 a las 14:35:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `learn_easy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `IDarchivo` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Tipo` varchar(7) NOT NULL,
  `ruta` text NOT NULL,
  `IDmaterial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`IDarchivo`, `Nombre`, `Tipo`, `ruta`, `IDmaterial`) VALUES
(1, 'LEARN-EASY', 'pdf', 'Files/LEARN-EASY.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `IDmessage` int(11) NOT NULL,
  `Usuario` varchar(40) NOT NULL,
  `Mensaje` text NOT NULL,
  `Creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`IDmessage`, `Usuario`, `Mensaje`, `Creacion`) VALUES
(1, '89797345', 'hola', '2021-10-25 07:12:46'),
(2, '89797345', 'hey', '2021-10-25 16:37:33'),
(3, '89797345', 'holi\r\n', '2021-10-29 13:46:54'),
(4, '79897345', 'que dice la pipol', '2021-10-29 13:48:49'),
(5, '89797345', 'Hola que tal', '2021-10-29 14:41:38'),
(6, '89797345', 'hola', '2021-10-29 14:43:58'),
(7, '89547345', 'holi\r\n', '2021-11-04 15:34:02'),
(8, '89547345', '', '2021-11-04 16:55:27'),
(9, '89547345', 'feos', '2021-11-04 16:55:34'),
(10, '89547345', 'hola', '2021-11-04 17:19:11'),
(12, '89797345', 'hola', '2021-11-05 17:03:51'),
(13, '6699734583', 'buenas tardes', '2021-11-05 17:06:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `IDdocente` bigint(12) NOT NULL,
  `nomb_docente` varchar(45) NOT NULL,
  `No_documento` int(11) NOT NULL,
  `IDinstitucion` int(11) NOT NULL,
  `IDusuario` bigint(12) NOT NULL,
  `Imagen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`IDdocente`, `nomb_docente`, `No_documento`, `IDinstitucion`, `IDusuario`, `Imagen`) VALUES
(0, 'Learn easy', 0, 7345, 0, 'imagen/Bib.png'),
(6699734583, 'Camilo Carvajal', 1193226699, 7345, 6699734583, 'imagen/docente.png'),
(7006734583, 'Javier Camacho', 1839127006, 7345, 7006734583, 'imagen/docente.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `IDestudiante` int(11) NOT NULL,
  `nomb_estudiante` varchar(45) NOT NULL,
  `IDgrado` int(11) NOT NULL,
  `No_documento` int(11) NOT NULL,
  `ID_Institucion` int(11) NOT NULL,
  `IDusuario` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`IDestudiante`, `nomb_estudiante`, `IDgrado`, `No_documento`, `ID_Institucion`, `IDusuario`) VALUES
(24387345, 'laura galvis', 11, 1108332438, 7345, 24387345),
(79897345, 'Maria Vera', 11, 1183227989, 7345, 79897345),
(89547345, 'paulo rodriguez', 11, 1182278954, 7345, 89547345),
(89797345, 'Laura Galvis', 11, 1193228979, 7345, 89797345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `IDgrado` int(11) NOT NULL,
  `grado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`IDgrado`, `grado`) VALUES
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, 'once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `IDinstitucion` int(11) NOT NULL,
  `nomb_institucion` varchar(25) NOT NULL,
  `direccion_institucion` varchar(25) NOT NULL,
  `tipo_institucion` varchar(25) NOT NULL,
  `IDusuario` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`IDinstitucion`, `nomb_institucion`, `direccion_institucion`, `tipo_institucion`, `IDusuario`) VALUES
(7345, 'ICIT', 'Cra 73 #45', 'Privada', 7345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `l_roles`
--

CREATE TABLE `l_roles` (
  `IDrol` int(11) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `l_roles`
--

INSERT INTO `l_roles` (`IDrol`, `Rol`) VALUES
(0, 'Estudiante'),
(2, 'Administrativos'),
(83, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_subido`
--

CREATE TABLE `material_subido` (
  `IDMaterial` int(11) NOT NULL,
  `IDmateria` int(11) NOT NULL,
  `IDrecursos` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Publicacion` text NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `Archivo` text NOT NULL,
  `IDdocente` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material_subido`
--

INSERT INTO `material_subido` (`IDMaterial`, `IDmateria`, `IDrecursos`, `Titulo`, `Publicacion`, `creacion`, `Archivo`, `IDdocente`) VALUES
(1, 1, 3, 'Modal Verbs', 'Modal verbs are a type of “auxiliary verb,” also called a “helping verb” as we hinted above. That means they work alongside other verbs to give your sentence a new meaning.\r\n\r\nFor example, they can change the tense of your main verb, or indicate the possibility, permission or necessity for something to happen.\r\n\r\nCommon English modal verbs are:', '2021-10-25 05:08:23', 'Files/', 7006734583),
(2, 1, 3, 'Verbo To Be', 'El verbo to be, que significa ser, estar o tener, según el contexto, es seguramente el verbo más utilizado en la lengua inglesa y también el más importante. Se utiliza como verbo principal y como auxiliar, y es irregular en pasado y en presente.\r\n\r\n', '2021-10-25 06:10:28', 'Files/', 0),
(6, 1, 1, 'Past Perfect', 'The past perfect, also called the pluperfect, is a verb tense used to talk about actions that were completed before some point in the past. ... The past perfect tense is for talking about something that happened before something else. Imagine waking up one morning and stepping outside to grab the newspaper.', '2021-10-25 13:32:14', 'Files/', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_visto`
--

CREATE TABLE `material_visto` (
  `IDMaterialvisto` int(11) NOT NULL,
  `IDMaterial` int(11) NOT NULL,
  `ID_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `IDmaterias` int(25) NOT NULL,
  `materia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`IDmaterias`, `materia`) VALUES
(1, 'Ingles'),
(2, 'Sociales'),
(3, 'Matematicas'),
(4, 'Ciencias Naturales'),
(5, 'Español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `IDrecursos` int(11) NOT NULL,
  `tipo_recurso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`IDrecursos`, `tipo_recurso`) VALUES
(1, 'Podcast'),
(2, 'Video'),
(3, 'Libro'),
(4, 'Didactico'),
(5, 'Imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDusuario` bigint(12) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `ID_rol` int(11) NOT NULL,
  `Img` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDusuario`, `Contrasena`, `ID_rol`, `Img`) VALUES
(0, 'Lau2331', 2, 'imagen/Bib.png'),
(7345, '1234', 2, 'imagen/admin.png'),
(24387345, '24387', 0, 'imagen/user.jpg'),
(79897345, '79897', 0, 'imagen/user.jpg'),
(89547345, '8954', 0, 'imagen/user.jpg'),
(89797345, '122333', 0, 'imagen/user.jpg'),
(6699734583, '66997', 83, 'imagen/docente.png'),
(7006734583, '1223', 83, 'imagen/docente.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`IDarchivo`),
  ADD KEY `IDmaterial` (`IDmaterial`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`IDmessage`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`IDdocente`),
  ADD KEY `IDinstitucion` (`IDinstitucion`),
  ADD KEY `IDusuario` (`IDusuario`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`IDestudiante`),
  ADD KEY `IDgrado` (`IDgrado`),
  ADD KEY `ID_Institucion` (`ID_Institucion`),
  ADD KEY `IDusuario` (`IDusuario`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`IDgrado`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`IDinstitucion`),
  ADD KEY `IDusuario` (`IDusuario`);

--
-- Indices de la tabla `l_roles`
--
ALTER TABLE `l_roles`
  ADD PRIMARY KEY (`IDrol`);

--
-- Indices de la tabla `material_subido`
--
ALTER TABLE `material_subido`
  ADD PRIMARY KEY (`IDMaterial`),
  ADD KEY `IDdocente` (`IDdocente`),
  ADD KEY `IDmateria` (`IDmateria`),
  ADD KEY `IDrecursos` (`IDrecursos`);

--
-- Indices de la tabla `material_visto`
--
ALTER TABLE `material_visto`
  ADD KEY `IDMaterial` (`IDMaterial`),
  ADD KEY `ID_estudiante` (`ID_estudiante`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`IDmaterias`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`IDrecursos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDusuario`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `IDarchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `IDmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `material_subido`
--
ALTER TABLE `material_subido`
  MODIFY `IDMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`IDmaterial`) REFERENCES `material_subido` (`IDMaterial`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`IDinstitucion`) REFERENCES `institucion` (`IDinstitucion`),
  ADD CONSTRAINT `docente_ibfk_3` FOREIGN KEY (`IDusuario`) REFERENCES `usuarios` (`IDusuario`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`IDgrado`) REFERENCES `grado` (`IDgrado`),
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`ID_Institucion`) REFERENCES `institucion` (`IDinstitucion`),
  ADD CONSTRAINT `estudiante_ibfk_5` FOREIGN KEY (`IDusuario`) REFERENCES `usuarios` (`IDusuario`);

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_ibfk_1` FOREIGN KEY (`IDusuario`) REFERENCES `usuarios` (`IDusuario`);

--
-- Filtros para la tabla `material_subido`
--
ALTER TABLE `material_subido`
  ADD CONSTRAINT `material_subido_ibfk_1` FOREIGN KEY (`IDdocente`) REFERENCES `docente` (`IDdocente`),
  ADD CONSTRAINT `material_subido_ibfk_2` FOREIGN KEY (`IDmateria`) REFERENCES `materias` (`IDmaterias`),
  ADD CONSTRAINT `material_subido_ibfk_3` FOREIGN KEY (`IDrecursos`) REFERENCES `recursos` (`IDrecursos`);

--
-- Filtros para la tabla `material_visto`
--
ALTER TABLE `material_visto`
  ADD CONSTRAINT `material_visto_ibfk_1` FOREIGN KEY (`IDMaterial`) REFERENCES `material_subido` (`IDMaterial`),
  ADD CONSTRAINT `material_visto_ibfk_2` FOREIGN KEY (`ID_estudiante`) REFERENCES `estudiante` (`IDestudiante`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `l_roles` (`IDrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
