-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Servidor: mysql.webcindario.com
-- Tiempo de generación: 12-07-2022 a las 07:20:41
-- Versión del servidor: 5.6.39
-- Versión de PHP: 5.6.40-57+0~20211119.60+debian11~1.gbp8a9bd1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `economia20`
--
CREATE DATABASE `economia20` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `economia20`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE IF NOT EXISTS `bloque` (
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_bloque` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_bloque`,`cod_grupo`),
  KEY `idGrupoI` (`cod_grupo`),
  KEY `cod_grupo` (`cod_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bloque`
--

INSERT INTO `bloque` (`cod_bloque`, `nombre_bloque`, `cod_grupo`) VALUES
('0', 'Sin Clasificacion', '3'),
('1', 'Corriente', '1'),
('1', 'Corriente', '2'),
('2', 'No Corriente', '1'),
('2', 'No Corriente', '2'),
('3', 'Ordinario Positivo', '4'),
('4', 'Ordinario Negativo', '4'),
('5', 'Ordinario', '4'),
('6', 'Extraordinario', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `cod_cuenta` int(3) NOT NULL,
  `nombre_cuenta` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_rubro` int(2) NOT NULL,
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `saldo` decimal(11,2) NOT NULL,
  PRIMARY KEY (`cod_cuenta`,`cod_rubro`,`cod_bloque`,`cod_grupo`),
  KEY `cod_rubro` (`cod_rubro`),
  KEY `cod_bloque` (`cod_bloque`),
  KEY `cod_grupo` (`cod_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`cod_cuenta`, `nombre_cuenta`, `cod_rubro`, `cod_bloque`, `cod_grupo`, `saldo`) VALUES
(1, 'Capital Suscripto', 1, '0', '3', '0.00'),
(1, 'Caja', 1, '1', '1', '200000.00'),
(1, 'Proveedores', 1, '1', '2', '0.00'),
(1, 'Deudores por Ventas', 1, '2', '1', '0.00'),
(1, 'Proveedores', 1, '2', '2', '0.00'),
(1, 'Ventas', 1, '3', '4', '0.00'),
(1, 'Costo de Mercaderias Vendidas (CMV)', 1, '4', '4', '0.00'),
(1, 'Ingreso Tenencia', 1, '5', '4', '0.00'),
(1, 'Robo', 1, '6', '4', '0.00'),
(1, 'Reserva Legal', 2, '0', '3', '0.00'),
(1, 'Banco "xx" Plazo Fijo', 2, '1', '1', '0.00'),
(1, 'Adelanto en c/c', 2, '1', '2', '0.00'),
(1, 'Deudores Varios', 2, '2', '1', '0.00'),
(1, 'Prevision para Despidos', 2, '2', '2', '0.00'),
(1, 'Amortizacion de Rodados', 2, '4', '4', '0.00'),
(1, 'Acciones', 2, '5', '4', '0.00'),
(1, 'Deudores por Ventas', 3, '1', '1', '0.00'),
(1, 'Honorarios a Pagar', 3, '1', '2', '0.00'),
(1, 'Mercaderias', 3, '2', '1', '0.00'),
(1, 'Sueldos(de administracion)', 3, '4', '4', '0.00'),
(1, 'Deudores varios', 4, '1', '1', '0.00'),
(1, 'Impuestos a Pagar', 4, '1', '2', '0.00'),
(1, 'Participacion Permanente en Sociedades', 4, '2', '1', '0.00'),
(1, 'Combustible', 4, '4', '4', '0.00'),
(1, 'Intereses Ganados', 4, '5', '4', '0.00'),
(1, 'Mercaderias', 5, '1', '1', '0.00'),
(1, 'Anticipo de Clientes', 5, '1', '2', '0.00'),
(1, 'Inmueble para Renta', 5, '2', '1', '0.00'),
(1, 'Impuesto a las Ganancias', 5, '4', '4', '0.00'),
(1, 'Sobrantes (mercaderia)', 5, '5', '4', '0.00'),
(1, 'Bienes de Uso Desafectados', 6, '1', '1', '0.00'),
(1, 'Dividendos a Pagar', 6, '1', '2', '0.00'),
(1, 'Inmuebles', 6, '2', '1', '0.00'),
(1, 'Socio "xx" Cuenta Particular', 7, '1', '2', '0.00'),
(1, 'Marca de Fabrica', 7, '2', '1', '0.00'),
(1, 'Prevision para Despidos', 8, '1', '2', '0.00'),
(1, 'Llave de Negocio', 9, '2', '1', '0.00'),
(2, 'Acciones en Circulacion', 1, '0', '3', '0.00'),
(2, 'Banco "xx" c/c', 1, '1', '1', '80.00'),
(2, 'Documentos a Pagar', 1, '1', '2', '0.00'),
(2, 'Deudores Morosos', 1, '2', '1', '0.00'),
(2, 'Documentos a Pagar', 1, '2', '2', '0.00'),
(2, 'Perdida Tenencia', 1, '5', '4', '0.00'),
(2, 'Incendio', 1, '6', '4', '0.00'),
(2, 'Reserva Facultativa', 2, '0', '3', '0.00'),
(2, 'Titulos Publicos', 2, '1', '1', '0.00'),
(2, 'Prestamos a Pagar', 2, '1', '2', '0.00'),
(2, 'Anticipo de Sueldo', 2, '2', '1', '0.00'),
(2, 'Prevision para Juicios Pendientes', 2, '2', '2', '0.00'),
(2, 'Gastos de Publicidad', 2, '4', '4', '0.00'),
(2, 'Deudores Morosos', 3, '1', '1', '0.00'),
(2, 'Sueldos a Pagar', 3, '1', '2', '0.00'),
(2, 'Mercaderias Entregadas en Consignacion', 3, '2', '1', '0.00'),
(2, 'Cargas sociales(de administracion)', 3, '4', '4', '0.00'),
(2, 'Anticipo de Sueldo', 4, '1', '1', '0.00'),
(2, 'IVA debito fiscal', 4, '1', '2', '0.00'),
(2, 'Intereses Cedidos', 4, '5', '4', '0.00'),
(2, 'Mercaderias Entregadas en Consignacion', 5, '1', '1', '0.00'),
(2, 'Amortizacion Acumulada de Inmueble para Renta', 5, '2', '1', '0.00'),
(2, 'Faltantes (mercaderia)', 5, '5', '4', '0.00'),
(2, 'Muebles y Utiles', 6, '2', '1', '0.00'),
(2, 'Alquileres Cobrados por Adelantado', 7, '1', '2', '0.00'),
(2, 'Patente de Invencion', 7, '2', '1', '0.00'),
(2, 'Prevision para Juicios Pendientes', 8, '1', '2', '0.00'),
(3, 'Ajuste de Capital', 1, '0', '3', '0.00'),
(3, 'Valores a Depositar', 1, '1', '1', '-70.00'),
(3, 'Intereses no devengados de Documentos a Pagar', 1, '1', '2', '0.00'),
(3, 'Deudores en Gestion Judicial', 1, '2', '1', '0.00'),
(3, 'Intereses no Devengados de Documentos a Pagar', 1, '2', '2', '0.00'),
(3, 'Reserva Estatutaria', 2, '0', '3', '0.00'),
(3, 'Acciones por Cotizacion', 2, '1', '1', '0.00'),
(3, 'Prenda a Pagar', 2, '1', '2', '0.00'),
(3, 'Anticipo de Gastos', 2, '2', '1', '0.00'),
(3, 'Prevision para Service y Garantia', 2, '2', '2', '0.00'),
(3, 'Sueldos(de vendedores)', 2, '4', '4', '0.00'),
(3, 'Deudores en Gestion Judicial', 3, '1', '1', '0.00'),
(3, 'Cargas Sociales a Pagar	', 3, '1', '2', '0.00'),
(3, 'Mercaderias en Transito', 3, '2', '1', '0.00'),
(3, 'Alquileres Cedidos', 3, '4', '4', '0.00'),
(3, 'Anticipo de Gastos', 4, '1', '1', '0.00'),
(3, 'IVA a pagar', 4, '1', '2', '0.00'),
(3, 'Diferencia de Cambio Positiva', 4, '5', '4', '0.00'),
(3, 'Mercaderias en Transito	', 5, '1', '1', '0.00'),
(3, 'Titulos Publicos', 5, '2', '1', '0.00'),
(3, 'Rodados', 6, '2', '1', '0.00'),
(3, 'Concesiones', 7, '2', '1', '0.00'),
(3, 'Prevision para Service y Garantia', 8, '1', '2', '0.00'),
(4, 'Primas de Emision', 1, '0', '3', '0.00'),
(4, 'Moneda Extranjera', 1, '1', '1', '0.00'),
(4, 'Componente Financiero Implicito de Proveedores', 1, '1', '2', '0.00'),
(4, 'Documento a Cobrar', 1, '2', '1', '0.00'),
(4, 'Componente Financiero Implicito de Proveedores', 1, '2', '2', '0.00'),
(4, 'Reserva para Renovacion de Equipos', 2, '0', '3', '0.00'),
(4, 'Prestamos a Cobrar a Corto Plazo', 2, '1', '1', '0.00'),
(4, 'Acreedores Prendarios', 2, '1', '2', '0.00'),
(4, 'Seguros Pagados por Adelantado', 2, '2', '1', '0.00'),
(4, 'Cargas Sociales(de vendedores)', 2, '4', '4', '0.00'),
(4, 'Documento a Cobrar', 3, '1', '1', '0.00'),
(4, 'ART a Pagar	', 3, '1', '2', '0.00'),
(4, 'Anticipo a Proveedores', 3, '2', '1', '0.00'),
(4, 'Seguros', 3, '4', '4', '0.00'),
(4, 'Seguros Pagados por Adelantado', 4, '1', '1', '0.00'),
(4, 'Retencion de Impuesto a las Ganancias', 4, '1', '2', '0.00'),
(4, 'Diferencia de Cambio Negativa', 4, '5', '4', '0.00'),
(4, 'Anticipo a Proveedores', 5, '1', '1', '0.00'),
(4, 'Debentures', 5, '2', '1', '0.00'),
(4, 'Instalaciones', 6, '2', '1', '0.00'),
(4, 'Derecho de Autor', 7, '2', '1', '0.00'),
(5, 'Aportes Irrevocables', 1, '0', '3', '0.00'),
(5, 'Banco "xx" Caja de Ahorro', 1, '1', '1', '0.00'),
(5, 'Acreedores Varios', 1, '1', '2', '0.00'),
(5, 'Intereses No Devengados de Documentos a Cobrar', 1, '2', '1', '0.00'),
(5, 'Acreedores Varios', 1, '2', '2', '0.00'),
(5, 'Resultados no Asignados', 2, '0', '3', '0.00'),
(5, 'Moneda Extranjera', 2, '1', '1', '0.00'),
(5, 'Hipoteca a Pagar', 2, '1', '2', '0.00'),
(5, 'Intereses a Cobrar', 2, '2', '1', '0.00'),
(5, 'Alquileres Cedidos', 2, '4', '4', '0.00'),
(5, 'Intereses no Devengados de Documentos a Cobrar', 3, '1', '1', '0.00'),
(5, 'Sindicato a Pagar', 3, '1', '2', '0.00'),
(5, 'Materias Primas', 3, '2', '1', '0.00'),
(5, 'Gastos de Librería', 3, '4', '4', '0.00'),
(5, 'Intereses a Cobrar', 4, '1', '1', '0.00'),
(5, 'Retencion de IVA', 4, '1', '2', '0.00'),
(5, 'Materias Primas', 5, '1', '1', '0.00'),
(5, 'Prestamos a cobrar a largo plazo', 5, '2', '1', '0.00'),
(5, 'Equipos de Computacion', 6, '2', '1', '0.00'),
(5, 'Derecho de Edicion', 7, '2', '1', '0.00'),
(6, 'Dividendos en Acciones', 1, '0', '3', '0.00'),
(6, 'Fondo Fijo', 1, '1', '1', '0.00'),
(6, 'Gastos a Pagar', 1, '1', '2', '0.00'),
(6, 'Componente Financiero Implicito de Deudores por Ventas', 1, '2', '1', '0.00'),
(6, 'Gastos a Pagar', 1, '2', '2', '0.00'),
(6, 'Resultado del Ejercicio', 2, '0', '3', '0.00'),
(6, 'Prevision por Desvalorizacion de Titulos y Acciones', 2, '1', '1', '0.00'),
(6, 'Acreedores Hipotecarios', 2, '1', '2', '0.00'),
(6, 'IVA Credito Fiscal', 2, '2', '1', '0.00'),
(6, 'Fletes', 2, '4', '4', '0.00'),
(6, 'Domponente Financiero Implicito de Deudores por Ventas', 3, '1', '1', '0.00'),
(6, 'Productos en Proceso', 3, '2', '1', '0.00'),
(6, 'Gastos Bancarios', 3, '4', '4', '0.00'),
(6, 'IVA credito Fiscal', 4, '1', '1', '0.00'),
(6, 'Productos en Proceso', 5, '1', '1', '0.00'),
(6, 'Herramientas', 6, '2', '1', '0.00'),
(6, 'Licencia de Fabricacion', 7, '2', '1', '0.00'),
(7, 'Documentos a Cobrar Endosados', 1, '2', '1', '0.00'),
(7, 'Socio "xx" Cuenta Particular', 1, '2', '2', '0.00'),
(7, 'Prevision por Desvalorizacion de Moneda Extranjera', 2, '1', '1', '0.00'),
(7, 'Accionistas', 2, '2', '1', '0.00'),
(7, 'Deudores Incobrables', 2, '4', '4', '0.00'),
(7, 'Documentos a Cobrar Endosados', 3, '1', '1', '0.00'),
(7, 'Productos Terminados', 3, '2', '1', '0.00'),
(7, 'Amortizacion de Muebles y Utiles', 3, '4', '4', '0.00'),
(7, 'Accionistas', 4, '1', '1', '0.00'),
(7, 'Productos Terminados', 5, '1', '1', '0.00'),
(7, 'Maquinarias', 6, '2', '1', '0.00'),
(7, 'Franquicias', 7, '2', '1', '0.00'),
(8, 'Documentos a Cobrar Descontados', 1, '2', '1', '0.00'),
(8, 'Alquileres Cobrados por Adelantado', 1, '2', '2', '0.00'),
(8, 'Nueva Inversion', 2, '1', '1', '0.00'),
(8, 'Socio "xx" Cuenta Aporte', 2, '2', '1', '0.00'),
(8, 'Seguros', 2, '4', '4', '0.00'),
(8, 'Documentos a Cobrar Descontados', 3, '1', '1', '0.00'),
(8, 'Prevision por Desvalorizacion de Moneda', 3, '2', '1', '0.00'),
(8, 'Amortizacion de Inmuebles(afectado al sector adminsitrativo)', 3, '4', '4', '0.00'),
(8, 'Socio "xx" Cuenta Aporte', 4, '1', '1', '0.00'),
(8, 'Prevision por Desvalorizacion de Moneda', 5, '1', '1', '0.00'),
(8, 'Terrenos', 6, '2', '1', '0.00'),
(8, 'Gastos de Organización', 7, '2', '1', '0.00'),
(9, 'Prevision por Deudores Incobrables', 1, '2', '1', '0.00'),
(9, 'Deposito en Garantia', 2, '2', '1', '0.00'),
(9, 'Amortizacion de Inmuebles(afectados al sector comercial)', 2, '4', '4', '0.00'),
(9, 'Prevision por Deudores Incobrables', 3, '1', '1', '0.00'),
(9, 'Deposito en Garantia', 4, '1', '1', '0.00'),
(9, 'Amortizacion Acumulada de Cada Bien en Particular', 6, '2', '1', '0.00'),
(9, 'Gastos de Investigacion y Desarrollo', 7, '2', '1', '0.00'),
(10, 'Valores Diferidos a Depositar', 2, '2', '1', '0.00'),
(10, 'Valores Diferidos a Depositar', 4, '1', '1', '0.00'),
(10, 'Anticipo a Acreedores', 6, '2', '1', '0.00'),
(10, 'Formulas', 7, '2', '1', '0.00'),
(11, 'Hipotecas a Cobrar', 2, '2', '1', '0.00'),
(11, 'Amortizacion Acumulada de Cada Bien en Particular', 7, '2', '1', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `cuitEmpresa` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razonSocialEmpresa` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicioAct` date NOT NULL,
  PRIMARY KEY (`cuitEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`cuitEmpresa`, `razonSocialEmpresa`, `fechaInicioAct`) VALUES
('20309876547', 'Empresa_1', '2020-06-01'),
('21326549879', 'Empresa_2', '2022-04-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_grupo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`cod_grupo`, `nombre_grupo`) VALUES
('1', 'Activo'),
('2', 'Pasivo'),
('3', 'Patrimonio Neto'),
('4', 'Resultados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE IF NOT EXISTS `rubro` (
  `cod_rubro` int(2) NOT NULL,
  `nombre_rubro` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_rubro`,`cod_bloque`,`cod_grupo`),
  KEY `idBloqueI` (`cod_bloque`),
  KEY `cod_grupo` (`cod_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`cod_rubro`, `nombre_rubro`, `cod_bloque`, `cod_grupo`) VALUES
(1, 'Aportes de los Propietarios', '0', '3'),
(1, 'Caja y Bancos', '1', '1'),
(1, 'Deudas Comerciales', '1', '2'),
(1, 'Creditos por Ventas', '2', '1'),
(1, 'Deudas', '2', '2'),
(1, 'Ventas', '3', '4'),
(1, 'Costos de los Bienes Vendidos y Servicios Prestados', '4', '4'),
(1, 'Resultado de Evaluacion de Bienes de Cambio a VNR', '5', '4'),
(1, 'Resultados Extraordinarios', '6', '4'),
(2, 'Resultados Acumulados', '0', '3'),
(2, 'Inversiones Temporarias', '1', '1'),
(2, 'Prestamos', '1', '2'),
(2, 'Otros Creditos', '2', '1'),
(2, 'Previsiones', '2', '2'),
(2, 'Gastos Comerciales', '4', '4'),
(2, 'Resultado de Inversiones en Entes Relacionados', '5', '4'),
(3, 'Creditos por Ventas', '1', '1'),
(3, 'Remuneraciones y Cargas Sociales', '1', '2'),
(3, 'Bienes de Cambio', '2', '1'),
(3, 'Gastos Administrativos', '4', '4'),
(3, 'Resultados de Otras Inversiones', '5', '4'),
(4, 'Otros Creditos', '1', '1'),
(4, 'Cargas Fiscales', '1', '2'),
(4, 'Participacion Permanente en Sociedades', '2', '1'),
(4, 'Otros Gastos', '4', '4'),
(4, 'Resultados Financieros por Tenencia', '5', '4'),
(5, 'Bienes de Cambio', '1', '1'),
(5, 'Anticipo de Clientes', '1', '2'),
(5, 'Otras Inversiones', '2', '1'),
(5, 'Impuesto a las Ganancias', '4', '4'),
(5, 'Otros Ingresos o Egresos', '5', '4'),
(6, 'Otros Activos', '1', '1'),
(6, 'Dividendos a Pagar', '1', '2'),
(6, 'Bienes de Uso', '2', '1'),
(6, 'Depreciacion de la Llave de Negocio', '5', '4'),
(7, 'Otras Deudas', '1', '2'),
(7, 'Activos Intangibles', '2', '1'),
(7, 'Participacion Minoritaria sobre Resultados', '5', '4'),
(8, 'Previsiones', '1', '2'),
(8, 'Otros Activos', '2', '1'),
(9, 'Llave de Negocio', '2', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombeUsuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `privilegios` tinyint(1) NOT NULL,
  `cuitEmpresa` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `cuitEmpresaI` (`cuitEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombeUsuario`, `correo`, `contraseña`, `privilegios`, `cuitEmpresa`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', 1, '20309876547'),
(2, 'User', 'user@gmail.com', '1234', 0, '20309876547');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD CONSTRAINT `bloque_ibfk_1` FOREIGN KEY (`cod_grupo`) REFERENCES `grupo` (`cod_grupo`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`cod_rubro`) REFERENCES `rubro` (`cod_rubro`);

--
-- Filtros para la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD CONSTRAINT `rubro_ibfk_1` FOREIGN KEY (`cod_bloque`) REFERENCES `bloque` (`cod_bloque`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cuitEmpresa`) REFERENCES `empresa` (`cuitEmpresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
