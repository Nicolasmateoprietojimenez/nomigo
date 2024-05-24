-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2024 a las 17:59:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomigo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `activarCuenta` (IN `p_nroDocumento` VARCHAR(50))   BEGIN
    UPDATE empleado
    SET estado = 1
    WHERE nroDocumento = p_nroDocumento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerUltimoToken` (IN `p_nroDocumento` VARCHAR(10))   BEGIN
    DECLARE v_lastToken VARCHAR(255);

    SELECT token INTO v_lastToken
    FROM tokenverificacion
    WHERE nroDocumento = p_nroDocumento
    ORDER BY fechaCreacion DESC
    LIMIT 1;

    SELECT v_lastToken AS UltimoToken;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nroDocumento` varchar(10) NOT NULL,
  `idTipoDocumento` int(9) NOT NULL,
  `fechaExpedicion` varchar(10) DEFAULT NULL,
  `nombre1` varchar(10) NOT NULL,
  `nombre2` varchar(10) DEFAULT NULL,
  `nombre3` varchar(10) DEFAULT NULL,
  `apellido1` varchar(10) NOT NULL,
  `apellido2` varchar(10) DEFAULT NULL,
  `idRol` int(9) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `contrasena` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`nroDocumento`, `idTipoDocumento`, `fechaExpedicion`, `nombre1`, `nombre2`, `nombre3`, `apellido1`, `apellido2`, `idRol`, `correo`, `telefono`, `estado`, `contrasena`) VALUES
('1000381826', 1, '2024-05-08', 'Nicolas', 'Mateo', '', 'Prieto', 'Jimenez', 1, 'nicompj@gmail.com', '3026563790', 1, '$2y$10$WP5.NiK2mW/C1DSHl7nzzeziQV39X3aUwu2HTBKK7RBtn01j0mS5y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(9) NOT NULL,
  `descRol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `descRol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'OPERADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipoDocumento` int(9) NOT NULL,
  `descTipoDocumento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `descTipoDocumento`) VALUES
(1, 'CEDULA'),
(2, 'PASAPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokenverificacion`
--

CREATE TABLE `tokenverificacion` (
  `idTokenVerificacion` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `nroDocumento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tokenverificacion`
--

INSERT INTO `tokenverificacion` (`idTokenVerificacion`, `token`, `fechaCreacion`, `nroDocumento`) VALUES
(13, '9be89d8e432a61d17830f3324a08f520', '2024-05-12', '1000381826');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`nroDocumento`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`,`idRol`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `tokenverificacion`
--
ALTER TABLE `tokenverificacion`
  ADD PRIMARY KEY (`idTokenVerificacion`),
  ADD KEY `nroDocumento` (`nroDocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idTipoDocumento` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tokenverificacion`
--
ALTER TABLE `tokenverificacion`
  MODIFY `idTokenVerificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`);

--
-- Filtros para la tabla `tokenverificacion`
--
ALTER TABLE `tokenverificacion`
  ADD CONSTRAINT `tokenverificacion_ibfk_1` FOREIGN KEY (`nroDocumento`) REFERENCES `empleado` (`nroDocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
