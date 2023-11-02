-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2014 a las 16:54:26
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `institut`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumne`
--

CREATE TABLE IF NOT EXISTS `alumne` (
`id_alumne` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `adre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `grup` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `alumne`
--

INSERT INTO `alumne` (`id_alumne`, `nom`, `adre`, `grup`) VALUES
(6, 'lluis', 'c/25', 1),
(7, 'albert', 'c/30', 1),
(8, 'lluis', 'c/25', 1),
(9, 'albert', 'c/30', 1),
(10, 'rosa', 'c/30', 2),
(11, 'ana', 'c/45', 2),
(12, 'pere', 'C/80', 2),
(13, 'Carme', 'C/40', 2),
(14, 'Aitana', 'c/10', 1),
(15, 'Manel', 'C/29', 2),
(16, 'Roger', 'C/vic', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assig-profe`
--

CREATE TABLE IF NOT EXISTS `assig-profe` (
  `id_assig` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `data_hora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignatura`
--

CREATE TABLE IF NOT EXISTS `assignatura` (
`id_assignatura` int(11) NOT NULL,
  `descripció` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departament`
--

CREATE TABLE IF NOT EXISTS `departament` (
`id_departament` int(11) NOT NULL,
  `descripció` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grup`
--

CREATE TABLE IF NOT EXISTS `grup` (
`id_grup` int(11) NOT NULL,
  `nom` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `aula` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grup`
--

INSERT INTO `grup` (`id_grup`, `nom`, `aula`) VALUES
(1, '1daw', '2.12'),
(2, '2daw', '2.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id_alumne` int(11) NOT NULL,
  `id_assignatura` int(11) NOT NULL,
  `aval1` int(11) NOT NULL,
  `aval2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
`id_professor` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `adreça` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `departament` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumne`
--
ALTER TABLE `alumne`
 ADD PRIMARY KEY (`id_alumne`), ADD KEY `grup` (`grup`);

--
-- Indices de la tabla `assig-profe`
--
ALTER TABLE `assig-profe`
 ADD PRIMARY KEY (`id_assig`,`id_professor`), ADD KEY `id_professor` (`id_professor`);

--
-- Indices de la tabla `assignatura`
--
ALTER TABLE `assignatura`
 ADD PRIMARY KEY (`id_assignatura`);

--
-- Indices de la tabla `departament`
--
ALTER TABLE `departament`
 ADD PRIMARY KEY (`id_departament`);

--
-- Indices de la tabla `grup`
--
ALTER TABLE `grup`
 ADD PRIMARY KEY (`id_grup`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id_alumne`,`id_assignatura`), ADD KEY `id_assignatura` (`id_assignatura`);

--
-- Indices de la tabla `professor`
--
ALTER TABLE `professor`
 ADD PRIMARY KEY (`id_professor`), ADD KEY `departament` (`departament`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumne`
--
ALTER TABLE `alumne`
MODIFY `id_alumne` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `assignatura`
--
ALTER TABLE `assignatura`
MODIFY `id_assignatura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departament`
--
ALTER TABLE `departament`
MODIFY `id_departament` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grup`
--
ALTER TABLE `grup`
MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `professor`
--
ALTER TABLE `professor`
MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumne`
--
ALTER TABLE `alumne`
ADD CONSTRAINT `alumne_ibfk_1` FOREIGN KEY (`grup`) REFERENCES `grup` (`id_grup`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `assig-profe`
--
ALTER TABLE `assig-profe`
ADD CONSTRAINT `assig@002dprofe_ibfk_1` FOREIGN KEY (`id_assig`) REFERENCES `assignatura` (`id_assignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `assig@002dprofe_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `notes`
--
ALTER TABLE `notes`
ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_alumne`) REFERENCES `alumne` (`id_alumne`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_assignatura`) REFERENCES `assignatura` (`id_assignatura`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `professor`
--
ALTER TABLE `professor`
ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`departament`) REFERENCES `departament` (`id_departament`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
