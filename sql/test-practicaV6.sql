-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2021 a las 22:53:24
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test-practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alarma`
--

CREATE TABLE `alarma` (
  `IdAlarma` int(11) NOT NULL,
  `nivelP511` int(11) NOT NULL,
  `nivelP840` int(11) NOT NULL,
  `nivelP430` int(11) NOT NULL,
  `sensorP511` int(11) NOT NULL,
  `sensorP840` int(11) NOT NULL,
  `sensorP430` int(11) NOT NULL,
  `nivelConcentracion` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alarma`
--

INSERT INTO `alarma` (`IdAlarma`, `nivelP511`, `nivelP840`, `nivelP430`, `sensorP511`, `sensorP840`, `sensorP430`, `nivelConcentracion`) VALUES
(1, 0, 0, 0, 0, 0, 0, ''),
(2, 0, 0, 0, 0, 0, 1, ''),
(3, 1, 1, 1, 1, 1, 1, ''),
(4, 0, 0, 0, 0, 0, 0, '0'),
(5, 1, 1, 1, 0, 0, 0, '0'),
(6, 1, 1, 1, 1, 1, 1, '1'),
(7, 1, 1, 1, 0, 0, 0, '0'),
(8, 1, 1, 1, 1, 1, 1, '1'),
(9, 1, 1, 1, 0, 0, 0, '0'),
(10, 1, 1, 1, 1, 1, 1, '1'),
(11, 1, 1, 1, 1, 1, 1, '0'),
(12, 1, 1, 1, 1, 1, 1, '2'),
(13, 1, 1, 1, 1, 1, 1, '1'),
(14, 1, 1, 1, 1, 1, 1, '0'),
(15, 1, 1, 1, 1, 1, 1, '1'),
(16, 1, 1, 1, 1, 1, 1, '2'),
(17, 0, 0, 0, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemovimiento`
--

CREATE TABLE `detallemovimiento` (
  `idDetalleEstanque` int(11) NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'Fecha en la cual ocurre este movimineto',
  `valor` double NOT NULL COMMENT 'valor del momimiento',
  `tipo` varchar(45) NOT NULL COMMENT 'Agregar o Extraer',
  `idUnidadMedida` int(11) NOT NULL COMMENT 'Clave Foránea de la tabla UnidadMedida',
  `tagEstanque` varchar(30) NOT NULL COMMENT 'Clave foránea proveniente de la talba Estanque',
  `estadoEstanque` varchar(1) NOT NULL,
  `capacidadActual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `engine`
--

CREATE TABLE `engine` (
  `tagEngine` varchar(30) NOT NULL,
  `tipo` varchar(45) NOT NULL COMMENT 'bomba o motor',
  `habilitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `engine`
--

INSERT INTO `engine` (`tagEngine`, `tipo`, `habilitado`) VALUES
('BOMBA-AB600', 'BOMBA', 1),
('BOMBA-ABCC', 'BOMBA', 1),
('BOMBA-H20', 'BOMBA', 1),
('BOMBA-P430', 'BOMBA', 1),
('BOMBA-P511', 'BOMBA', 1),
('BOMBA-P840', 'BOMBA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `engine_has_proceso`
--

CREATE TABLE `engine_has_proceso` (
  `idEngine_has_Proceso` int(11) NOT NULL,
  `Proceso_idProceso` int(11) NOT NULL,
  `Engine_tagEngine` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanque`
--

CREATE TABLE `estanque` (
  `tagEstanque` varchar(30) NOT NULL COMMENT 'Tag que da la empresa a este objeto',
  `capacidad` double NOT NULL COMMENT 'Capacidad maxima del tanque',
  `habilitado` int(11) NOT NULL COMMENT 'Permite especificar si el estanque esta habilitado o no en el sistema',
  `idUnidadMedida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estanque`
--

INSERT INTO `estanque` (`tagEstanque`, `capacidad`, `habilitado`, `idUnidadMedida`) VALUES
('Nipacide P430 0.3%', 1000, 1, 1),
('Nipacide P511 4%', 1000, 1, 1),
('Nipacide P840 0.5%', 1000, 1, 1),
('TK-3000-ABCC', 3000, 1, 1),
('TK-7500-AB600', 7500, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanque_has_proceso`
--

CREATE TABLE `estanque_has_proceso` (
  `idEstanque_has_Proceso` int(11) NOT NULL,
  `Estanque_tagEstanque` varchar(30) NOT NULL,
  `Proceso_idProceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `idProceso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroengine`
--

CREATE TABLE `registroengine` (
  `idRegistroEngine` int(11) NOT NULL,
  `estadoEngine` varchar(1) NOT NULL COMMENT 'Encendido o apagado',
  `fecha_inicio` datetime NOT NULL,
  `tiempoOperacion` double NOT NULL,
  `tagEngine` varchar(30) NOT NULL,
  `idUnidadMedida` int(11) NOT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrohistorico`
--

CREATE TABLE `registrohistorico` (
  `idRegistroHistorico` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `ab600Estado` varchar(1) NOT NULL,
  `ab600TOperativo` int(11) NOT NULL,
  `ab600Litros` double NOT NULL,
  `abccEstado` varchar(1) NOT NULL,
  `abccTOperativo` int(11) NOT NULL,
  `abccLitros` double NOT NULL,
  `P430Estado` varchar(1) NOT NULL,
  `P430TOperativo` int(11) NOT NULL,
  `P430Litros` double NOT NULL,
  `P511Estado` varchar(1) NOT NULL,
  `P511TOperativo` int(11) NOT NULL,
  `P511Litros` double NOT NULL,
  `P840Estado` varchar(1) NOT NULL,
  `P840TOperativo` int(11) NOT NULL,
  `P840Litros` double NOT NULL,
  `concentracion` double NOT NULL,
  `LitrosAgua` double NOT NULL COMMENT '1600 - (litros de abc600 + litros de abcc)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosensor`
--

CREATE TABLE `registrosensor` (
  `idRegistroSensor` int(11) NOT NULL,
  `valor` double NOT NULL,
  `fecha` datetime NOT NULL,
  `idUnidadMedida` int(11) NOT NULL,
  `tagSensor` varchar(30) NOT NULL,
  `estadoSensor` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Clienet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor`
--

CREATE TABLE `sensor` (
  `tagSensor` varchar(30) NOT NULL,
  `habilitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sensor`
--

INSERT INTO `sensor` (`tagSensor`, `habilitado`) VALUES
('DE-AB600', 1),
('FEV-H2O', 1),
('LE-SHSL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_has_proceso`
--

CREATE TABLE `sensor_has_proceso` (
  `idSensor_has_Proceso` int(11) NOT NULL,
  `Sensor_tagSensor` varchar(30) NOT NULL,
  `Proceso_idProceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `idUnidadMedida` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre de la unidad de medida ej: Metro',
  `abreviacion` varchar(10) NOT NULL COMMENT 'abreviatura de la unidad de medida ej: m',
  `habilitado` int(11) NOT NULL COMMENT 'campo que permite habilitar o no la unidad de medida'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidadmedida`
--

INSERT INTO `unidadmedida` (`idUnidadMedida`, `nombre`, `abreviacion`, `habilitado`) VALUES
(1, 'Litros', 'L', 1),
(2, 'Concentración', 'Con', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasena`, `correo`, `Rol_idRol`) VALUES
(1, 'Betech', 'e10adc3949ba59abbe56e057f20f883e', 'fcaceres@betechltda.cl', 1),
(2, 'Cliente', 'e10adc3949ba59abbe56e057f20f883e', 'vacio', 2),
(3, 'Lonzaquimetal', 'e10adc3949ba59abbe56e057f20f883e', 'vacio1', 1),
(4, 'Bycsa', 'e10adc3949ba59abbe56e057f20f883e', 'rgarrido@bycsa.cl', 1),
(5, 'Bycsa1', 'e10adc3949ba59abbe56e057f20f883e', 'rmacheo@bycsa.cl', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alarma`
--
ALTER TABLE `alarma`
  ADD PRIMARY KEY (`IdAlarma`);

--
-- Indices de la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD PRIMARY KEY (`idDetalleEstanque`),
  ADD KEY `fk_DetalleMovimiento_UnidadMedida1_idx` (`idUnidadMedida`),
  ADD KEY `fk_DetalleMovimiento_Estanque1_idx` (`tagEstanque`);

--
-- Indices de la tabla `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`tagEngine`);

--
-- Indices de la tabla `engine_has_proceso`
--
ALTER TABLE `engine_has_proceso`
  ADD PRIMARY KEY (`idEngine_has_Proceso`,`Proceso_idProceso`,`Engine_tagEngine`),
  ADD KEY `fk_Engine_has_Proceso_Proceso1_idx` (`Proceso_idProceso`),
  ADD KEY `fk_Engine_has_Proceso_Engine1_idx` (`Engine_tagEngine`);

--
-- Indices de la tabla `estanque`
--
ALTER TABLE `estanque`
  ADD PRIMARY KEY (`tagEstanque`),
  ADD KEY `fk_Estanque_UnidadMedida1_idx` (`idUnidadMedida`);

--
-- Indices de la tabla `estanque_has_proceso`
--
ALTER TABLE `estanque_has_proceso`
  ADD PRIMARY KEY (`idEstanque_has_Proceso`,`Estanque_tagEstanque`,`Proceso_idProceso`),
  ADD KEY `fk_Estanque_has_Proceso_Estanque1_idx` (`Estanque_tagEstanque`),
  ADD KEY `fk_Estanque_has_Proceso_Proceso1_idx` (`Proceso_idProceso`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idProceso`);

--
-- Indices de la tabla `registroengine`
--
ALTER TABLE `registroengine`
  ADD PRIMARY KEY (`idRegistroEngine`),
  ADD KEY `fk_RegistroEngine_Engine1_idx` (`tagEngine`),
  ADD KEY `fk_RegistroEngine_UnidadMedida1_idx` (`idUnidadMedida`);

--
-- Indices de la tabla `registrohistorico`
--
ALTER TABLE `registrohistorico`
  ADD PRIMARY KEY (`idRegistroHistorico`);

--
-- Indices de la tabla `registrosensor`
--
ALTER TABLE `registrosensor`
  ADD PRIMARY KEY (`idRegistroSensor`),
  ADD KEY `fk_RegistroSensor_UnidadMedida1_idx` (`idUnidadMedida`),
  ADD KEY `fk_RegistroSensor_Sensor1_idx` (`tagSensor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`tagSensor`);

--
-- Indices de la tabla `sensor_has_proceso`
--
ALTER TABLE `sensor_has_proceso`
  ADD PRIMARY KEY (`idSensor_has_Proceso`,`Sensor_tagSensor`,`Proceso_idProceso`),
  ADD KEY `fk_Sensor_has_Proceso_Sensor1_idx` (`Sensor_tagSensor`),
  ADD KEY `fk_Sensor_has_Proceso_Proceso1_idx` (`Proceso_idProceso`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`idUnidadMedida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_Usuario_Rol1_idx` (`Rol_idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alarma`
--
ALTER TABLE `alarma`
  MODIFY `IdAlarma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  MODIFY `idDetalleEstanque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `engine_has_proceso`
--
ALTER TABLE `engine_has_proceso`
  MODIFY `idEngine_has_Proceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estanque_has_proceso`
--
ALTER TABLE `estanque_has_proceso`
  MODIFY `idEstanque_has_Proceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `idProceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroengine`
--
ALTER TABLE `registroengine`
  MODIFY `idRegistroEngine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrohistorico`
--
ALTER TABLE `registrohistorico`
  MODIFY `idRegistroHistorico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrosensor`
--
ALTER TABLE `registrosensor`
  MODIFY `idRegistroSensor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sensor_has_proceso`
--
ALTER TABLE `sensor_has_proceso`
  MODIFY `idSensor_has_Proceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `idUnidadMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD CONSTRAINT `fk_DetalleMovimiento_Estanque1` FOREIGN KEY (`tagEstanque`) REFERENCES `estanque` (`tagEstanque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleMovimiento_UnidadMedida1` FOREIGN KEY (`idUnidadMedida`) REFERENCES `unidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `engine_has_proceso`
--
ALTER TABLE `engine_has_proceso`
  ADD CONSTRAINT `fk_Engine_has_Proceso_Engine1` FOREIGN KEY (`Engine_tagEngine`) REFERENCES `engine` (`tagEngine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Engine_has_Proceso_Proceso1` FOREIGN KEY (`Proceso_idProceso`) REFERENCES `proceso` (`idProceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estanque`
--
ALTER TABLE `estanque`
  ADD CONSTRAINT `fk_Estanque_UnidadMedida1` FOREIGN KEY (`idUnidadMedida`) REFERENCES `unidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estanque_has_proceso`
--
ALTER TABLE `estanque_has_proceso`
  ADD CONSTRAINT `fk_Estanque_has_Proceso_Estanque1` FOREIGN KEY (`Estanque_tagEstanque`) REFERENCES `estanque` (`tagEstanque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estanque_has_Proceso_Proceso1` FOREIGN KEY (`Proceso_idProceso`) REFERENCES `proceso` (`idProceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registroengine`
--
ALTER TABLE `registroengine`
  ADD CONSTRAINT `fk_RegistroEngine_Engine1` FOREIGN KEY (`tagEngine`) REFERENCES `engine` (`tagEngine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RegistroEngine_UnidadMedida1` FOREIGN KEY (`idUnidadMedida`) REFERENCES `unidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrosensor`
--
ALTER TABLE `registrosensor`
  ADD CONSTRAINT `fk_RegistroSensor_Sensor1` FOREIGN KEY (`tagSensor`) REFERENCES `sensor` (`tagSensor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RegistroSensor_UnidadMedida1` FOREIGN KEY (`idUnidadMedida`) REFERENCES `unidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sensor_has_proceso`
--
ALTER TABLE `sensor_has_proceso`
  ADD CONSTRAINT `fk_Sensor_has_Proceso_Proceso1` FOREIGN KEY (`Proceso_idProceso`) REFERENCES `proceso` (`idProceso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sensor_has_Proceso_Sensor1` FOREIGN KEY (`Sensor_tagSensor`) REFERENCES `sensor` (`tagSensor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
