-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 01:09:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_lavadero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `DNI` varchar(20) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `Nombre`, `DNI`, `Telefono`, `Email`, `Estado`) VALUES
(4, 'gabriel', '38885466', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(7, 'gabriel', '123456', '03534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(8, '313131', '123456', 'gabriel', 'asdasd', 'Inactivo'),
(9, 'gabriel gastaldi', '123456', '3534229152', 'gabriel@gabriel', 'Inactivo'),
(10, 'gabriel', '38885466', '3534229152', 'gabriel@gabriel', 'Inactivo'),
(11, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi@gmail', 'Inactivo'),
(12, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(13, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(14, 'gabriel', '1234', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(15, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(16, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(17, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(18, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(19, 'gabriel', '666', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(20, 'gabriel', '3888546', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(21, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(22, 'gabriel', '7', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(23, 'gabriel', '123456', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(24, 'gabriel', '12345', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(25, 'gabriel gastaldi', '123', '3534229152', '123123@hotmail.com', 'Inactivo'),
(26, 'gabriel', '11111111111111111111', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(27, 'gabriel', '123', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Inactivo'),
(28, 'gabriel', '1234567', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(29, 'gabriel', '1234566', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(30, 'gabriel', '1234566', '3534229155', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(31, 'gabriel gastaldi gomez', '38885466', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(32, 'gabriel gastaldi', '12345678', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo'),
(33, 'gabriel', '12345689', '3534229152', 'gabriel.gastaldi.95@gmail.com', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `ID` int(11) NOT NULL,
  `Usuario_ID` int(11) DEFAULT NULL,
  `PermisoAltaServicio` tinyint(1) NOT NULL,
  `PermisoModificarCliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `TipoVehiculo` varchar(50) NOT NULL,
  `TipoServicio` varchar(50) NOT NULL,
  `Estado` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ID`, `Nombre`, `Descripcion`, `Precio`, `TipoVehiculo`, `TipoServicio`, `Estado`) VALUES
(206, 'encerado moto', NULL, 100000.00, 'auto', 'lavado', 'Inactivo'),
(211, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Activo'),
(212, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(213, 'lavado moto', NULL, 75000.00, 'auto', 'lavado', 'Inactivo'),
(214, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(217, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(218, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(219, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(220, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(221, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(222, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(223, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(224, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(225, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Inactivo'),
(226, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Activo'),
(227, 'lavado moto', NULL, 75000.00, 'moto', 'lavado', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciosrealizados`
--

CREATE TABLE `serviciosrealizados` (
  `ID` int(11) NOT NULL,
  `Vehiculo_ID` int(11) DEFAULT NULL,
  `Servicio_ID` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicio`
--

CREATE TABLE `tiposervicio` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiposervicio`
--

INSERT INTO `tiposervicio` (`ID`, `Nombre`, `Precio`) VALUES
(1, 'lavado', 1500.00),
(2, 'pulido', 2500.00),
(3, 'encerado', 2000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicios`
--

CREATE TABLE `tiposervicios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `tipo` varchar(50) NOT NULL,
  `precio` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`tipo`, `precio`) VALUES
('moto', 50),
('auto', 100),
('camioneta', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Rol` enum('Administrador','Operario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Contraseña`, `Rol`) VALUES
(1, 'admin', 'admin', 'Administrador'),
(2, 'juan', '1234', 'Operario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `ID` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Año` int(11) DEFAULT NULL,
  `Placa` varchar(20) NOT NULL,
  `Cliente_ID` int(11) DEFAULT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`ID`, `Marca`, `Modelo`, `Año`, `Placa`, `Cliente_ID`, `Estado`) VALUES
(8, 'ford', 'hjghjg', 1995, 'abc122', NULL, 'Activo'),
(11, 'ford', '', 1967, 'abc123', NULL, 'Activo'),
(12, 'ford', '', 1967, 'abc123', NULL, 'Inactivo'),
(13, 'ford', '', 321, 'tyyrtdf', NULL, 'Inactivo'),
(14, 'ford', 'falcon', 321, 'abc123', NULL, 'Inactivo'),
(15, 'ford', 'taunus', 1995, 'abc123', NULL, 'Inactivo'),
(34, 'ford', 'focus', 1955, 'abc123', NULL, 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Usuario_ID` (`Usuario_ID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `serviciosrealizados`
--
ALTER TABLE `serviciosrealizados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Vehiculo_ID` (`Vehiculo_ID`),
  ADD KEY `Servicio_ID` (`Servicio_ID`);

--
-- Indices de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tiposervicios`
--
ALTER TABLE `tiposervicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cliente_ID` (`Cliente_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT de la tabla `serviciosrealizados`
--
ALTER TABLE `serviciosrealizados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiposervicios`
--
ALTER TABLE `tiposervicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `serviciosrealizados`
--
ALTER TABLE `serviciosrealizados`
  ADD CONSTRAINT `serviciosrealizados_ibfk_1` FOREIGN KEY (`Vehiculo_ID`) REFERENCES `vehiculos` (`ID`),
  ADD CONSTRAINT `serviciosrealizados_ibfk_2` FOREIGN KEY (`Servicio_ID`) REFERENCES `servicios` (`ID`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`Cliente_ID`) REFERENCES `clientes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
