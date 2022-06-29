-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2012 a las 17:24:28
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ipsopeb`
--
CREATE DATABASE `ipsopeb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ipsopeb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliados`
--

CREATE TABLE IF NOT EXISTS `afiliados` (
  `cedula` int(10) NOT NULL,
  `nacionalidad` char(2) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `jerarquia` varchar(17) NOT NULL,
  `empleado` char(8) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `edo_civil` varchar(15) NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `discapacidad` varchar(15) NOT NULL,
  `comisaria` varchar(80) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`cedula`, `nacionalidad`, `nombre`, `apellido`, `jerarquia`, `empleado`, `fecha_ingreso`, `edo_civil`, `fecha_nac`, `sexo`, `direccion`, `telefono`, `discapacidad`, `comisaria`) VALUES
(11111111, 'V-', 'ALEJANDRO ', 'JIMENEZ', 'EMPLEADO POLICIAL', 'JUBILADO', '0000-00-00', 'CASADO(A)', '0000-00-00', 'MASCULINO', 'NEGRO PRIMERO CASA SINI NUMERO', '133333333333', 'NINGUNA', 'VISTA HERMOSA CERCA DEL ESTADIO HERES'),
(13131313, 'V-', 'CRISTOFER', 'HURTADO', 'EMPLEADO POLICIAL', 'ACTIVO', '2012-11-09', 'DIVORCIADO(A)', '2012-11-10', 'MASCULINO', 'VVVVVVVVVVVVVVVVVVVVVVVVVVVV', '444444444444', 'NINGUNA', 'BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB'),
(18623532, 'V-', 'SAMUEL ALEJANDRO', 'HURTADO JIMENEZ', 'EMPLEADO POLICIAL', 'JUBILADO', '2012-01-11', 'SOLTERO(A)', '2012-02-11', 'MASCULINO', 'LAS MOREAS CALLE PRINCIPAL CERCA DE LA ESCUELA', '04165926937', 'NINGUNA', 'LAS MOREAS CALLE PRINCIPAL CERCA DE LA ESCUELA'),
(22222222, 'V-', 'REBECA', 'TORRES', 'EMPLEADO POLICIAL', 'ACTIVO', '2012-11-01', 'CASADO(A)', '2012-11-24', 'FEMENINO', 'BARRIO 19 DE ABRIL CALLE PRINCIPAL CASA 14', '444444444444', 'NINGUNA', 'BARRIO 19 DE ABRIL CALLE PRINCIPAL CASA 14 COMISARIA ROSA ELENA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares`
--

CREATE TABLE IF NOT EXISTS `familiares` (
  `id_f` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `nombre_f` varchar(25) NOT NULL,
  `parentesco` varchar(11) NOT NULL,
  `cedula_f` int(11) NOT NULL,
  `fecha_nac_f` date NOT NULL,
  PRIMARY KEY (`id_f`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `familiares`
--

INSERT INTO `familiares` (`id_f`, `cedula`, `nombre_f`, `parentesco`, `cedula_f`, `fecha_nac_f`) VALUES
(1, 18623532, 'ASDRUBAL JOSE', 'HIJO', 12121212, '2012-11-01'),
(2, 22222222, 'DANY GAMBOA', 'HIJO', 22222222, '2012-11-04'),
(4, 18623532, 'ANTONIO RINCON MORALES', 'CONYUGE', 44444444, '2012-11-26'),
(5, 22222222, 'JESUS BRICEÃ±O', 'PADRE', 12312312, '2012-11-25'),
(6, 22222222, 'ARMANDO RODRIGUEZ', 'CONYUGE', 41414134, '2006-11-17'),
(7, 18623532, 'RAMONO JOSE LOPEZ', 'PADRE', 46346456, '2012-11-15'),
(8, 18623532, 'MARIA EMILIA SANCHEZ', 'HIJA', 45666666, '2012-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(10) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `monto_s` float NOT NULL,
  `monto_o` float NOT NULL,
  `motivo1` varchar(15) NOT NULL,
  `motivo2` varchar(15) NOT NULL,
  `motivo3` varchar(15) NOT NULL,
  `motivo4` varchar(15) NOT NULL,
  `motivo5` varchar(15) NOT NULL,
  `motivo6` varchar(15) NOT NULL,
  `motivo7` varchar(15) NOT NULL,
  `documento1` varchar(30) NOT NULL,
  `documento2` varchar(30) NOT NULL,
  `documento3` varchar(30) NOT NULL,
  `documento4` varchar(30) NOT NULL,
  `documento5` varchar(30) NOT NULL,
  `documento6` varchar(30) NOT NULL,
  `documento7` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_prestamo`),
  UNIQUE KEY `cedula` (`cedula`,`fecha_solicitud`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `cedula`, `fecha_solicitud`, `monto_s`, `monto_o`, `motivo1`, `motivo2`, `motivo3`, `motivo4`, `motivo5`, `motivo6`, `motivo7`, `documento1`, `documento2`, `documento3`, `documento4`, `documento5`, `documento6`, `documento7`, `descripcion`) VALUES
(1, 18623532, '2012-11-01', 1000.23, 900.23, '', '', '', '', '', '', '', '', '', '', '', '', '', 'FFFFFFF', 'ESCULE ASOCIADA DE TUMEREMO'),
(2, 18623532, '2012-11-10', 12333, 12345, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'WWWWWWWWWWWWWWW');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `familiares`
--
ALTER TABLE `familiares`
  ADD CONSTRAINT `familiares_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `afiliados` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
