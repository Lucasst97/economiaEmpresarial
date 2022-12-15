-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 15-12-2022 a las 20:03:20
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `economia0611`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Muestra_tributaria` ()  select * from sittributaria$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `activocorrientesaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `activocorrientesaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `activonocorrientesaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `activonocorrientesaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE `asientos` (
  `numAsiento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(50) DEFAULT NULL,
  `id_comprobante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`numAsiento`, `fecha`, `detalle`, `id_comprobante`) VALUES
(1, '2022-09-27', 'ficha de stock', NULL),
(2, '2022-11-01', 'pedido de mercaderia', NULL),
(3, '2022-05-28', 'xxxx', NULL),
(4, '2022-05-05', 'xxxx', NULL),
(5, '2022-10-23', 'xxxxxx', NULL),
(6, '2022-10-23', 'xz', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento_cuenta`
--

CREATE TABLE `asiento_cuenta` (
  `id_asientoCuenta` int(11) NOT NULL,
  `numAsiento` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `tipo_saldo` tinyint(1) NOT NULL,
  `saldo_ac` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asiento_cuenta`
--

INSERT INTO `asiento_cuenta` (`id_asientoCuenta`, `numAsiento`, `id_cuenta`, `tipo_saldo`, `saldo_ac`) VALUES
(1, 1, 1, 0, '1500.00'),
(4, 1, 3, 1, '1250.00'),
(5, 1, 6, 0, '30.00'),
(6, 2, 10, 1, '1000.00'),
(7, 2, 15, 0, '1000.00'),
(8, 3, 11, 1, '2000.00'),
(9, 6, 1, 1, '5000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE `bloque` (
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_bloque` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  `razonSocial` varchar(90) NOT NULL,
  `id_sitTributaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `id_comprobante` int(11) NOT NULL,
  `numeroComprobante` varchar(13) NOT NULL,
  `id_tipoComprobante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `cod_cuenta` int(3) NOT NULL,
  `nombre_cuenta` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_rubro` int(2) NOT NULL,
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `saldo_cuenta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `cod_cuenta`, `nombre_cuenta`, `cod_rubro`, `cod_bloque`, `cod_grupo`, `saldo_cuenta`) VALUES
(1, 1, 'Capital Suscripto', 1, '0', '3', '1000.00'),
(2, 1, 'Caja', 1, '1', '1', '200000.00'),
(3, 1, 'Proveedores', 1, '1', '2', '0.00'),
(4, 1, 'Deudores por Ventas', 1, '2', '1', '0.00'),
(5, 1, 'Proveedores', 1, '2', '2', '0.00'),
(6, 1, 'Ventas', 1, '3', '4', '0.00'),
(7, 1, 'Costo de Mercaderias Vendidas (CMV)', 1, '4', '4', '0.00'),
(8, 1, 'Ingreso Tenencia', 1, '5', '4', '0.00'),
(9, 1, 'Robo', 1, '6', '4', '0.00'),
(10, 1, 'Reserva Legal', 2, '0', '3', '0.00'),
(11, 1, 'Banco \"xx\" Plazo Fijo', 2, '1', '1', '0.00'),
(12, 1, 'Adelanto en c/c', 2, '1', '2', '0.00'),
(13, 1, 'Deudores Varios', 2, '2', '1', '0.00'),
(14, 1, 'Prevision para Despidos', 2, '2', '2', '0.00'),
(15, 1, 'Amortizacion de Rodados', 2, '4', '4', '0.00'),
(16, 1, 'Acciones', 2, '5', '4', '0.00'),
(17, 1, 'Deudores por Ventas', 3, '1', '1', '0.00'),
(18, 1, 'Honorarios a Pagar', 3, '1', '2', '0.00'),
(19, 1, 'Mercaderias', 3, '2', '1', '0.00'),
(20, 1, 'Sueldos(de administracion)', 3, '4', '4', '0.00'),
(21, 1, 'Deudores varios', 4, '1', '1', '0.00'),
(22, 1, 'Impuestos a Pagar', 4, '1', '2', '0.00'),
(23, 1, 'Participacion Permanente en Sociedades', 4, '2', '1', '0.00'),
(24, 1, 'Combustible', 4, '4', '4', '0.00'),
(25, 1, 'Intereses Ganados', 4, '5', '4', '0.00'),
(26, 1, 'Mercaderias', 5, '1', '1', '0.00'),
(27, 1, 'Anticipo de Clientes', 5, '1', '2', '0.00'),
(28, 1, 'Inmueble para Renta', 5, '2', '1', '0.00'),
(29, 1, 'Impuesto a las Ganancias', 5, '4', '4', '0.00'),
(30, 1, 'Sobrantes (mercaderia)', 5, '5', '4', '0.00'),
(31, 1, 'Bienes de Uso Desafectados', 6, '1', '1', '0.00'),
(32, 1, 'Dividendos a Pagar', 6, '1', '2', '0.00'),
(33, 1, 'Inmuebles', 6, '2', '1', '0.00'),
(34, 1, 'Socio \"xx\" Cuenta Particular', 7, '1', '2', '0.00'),
(35, 1, 'Marca de Fabrica', 7, '2', '1', '0.00'),
(36, 1, 'Prevision para Despidos', 8, '1', '2', '0.00'),
(37, 1, 'Llave de Negocio', 9, '2', '1', '0.00'),
(38, 2, 'Acciones en Circulacion', 1, '0', '3', '0.00'),
(39, 2, 'Banco \"xx\" c/c', 1, '1', '1', '80.00'),
(40, 2, 'Documentos a Pagar', 1, '1', '2', '0.00'),
(41, 2, 'Deudores Morosos', 1, '2', '1', '0.00'),
(42, 2, 'Documentos a Pagar', 1, '2', '2', '0.00'),
(43, 2, 'Perdida Tenencia', 1, '5', '4', '0.00'),
(44, 2, 'Incendio', 1, '6', '4', '0.00'),
(45, 2, 'Reserva Facultativa', 2, '0', '3', '0.00'),
(46, 2, 'Titulos Publicos', 2, '1', '1', '0.00'),
(47, 2, 'Prestamos a Pagar', 2, '1', '2', '0.00'),
(48, 2, 'Anticipo de Sueldo', 2, '2', '1', '0.00'),
(49, 2, 'Prevision para Juicios Pendientes', 2, '2', '2', '0.00'),
(50, 2, 'Gastos de Publicidad', 2, '4', '4', '0.00'),
(51, 2, 'Deudores Morosos', 3, '1', '1', '0.00'),
(52, 2, 'Sueldos a Pagar', 3, '1', '2', '0.00'),
(53, 2, 'Mercaderias Entregadas en Consignacion', 3, '2', '1', '0.00'),
(54, 2, 'Cargas sociales(de administracion)', 3, '4', '4', '0.00'),
(55, 2, 'Anticipo de Sueldo', 4, '1', '1', '0.00'),
(56, 2, 'IVA debito fiscal', 4, '1', '2', '0.00'),
(57, 2, 'Intereses Cedidos', 4, '5', '4', '0.00'),
(58, 2, 'Mercaderias Entregadas en Consignacion', 5, '1', '1', '0.00'),
(59, 2, 'Amortizacion Acumulada de Inmueble para Renta', 5, '2', '1', '0.00'),
(60, 2, 'Faltantes (mercaderia)', 5, '5', '4', '0.00'),
(61, 2, 'Muebles y Utiles', 6, '2', '1', '0.00'),
(62, 2, 'Alquileres Cobrados por Adelantado', 7, '1', '2', '0.00'),
(63, 2, 'Patente de Invencion', 7, '2', '1', '0.00'),
(64, 2, 'Prevision para Juicios Pendientes', 8, '1', '2', '0.00'),
(65, 3, 'Ajuste de Capital', 1, '0', '3', '0.00'),
(66, 3, 'Valores a Depositar', 1, '1', '1', '-70.00'),
(67, 3, 'Intereses no devengados de Documentos a Pagar', 1, '1', '2', '0.00'),
(68, 3, 'Deudores en Gestion Judicial', 1, '2', '1', '0.00'),
(69, 3, 'Intereses no Devengados de Documentos a Pagar', 1, '2', '2', '0.00'),
(70, 3, 'Reserva Estatutaria', 2, '0', '3', '0.00'),
(71, 3, 'Acciones por Cotizacion', 2, '1', '1', '0.00'),
(72, 3, 'Prenda a Pagar', 2, '1', '2', '0.00'),
(73, 3, 'Anticipo de Gastos', 2, '2', '1', '0.00'),
(74, 3, 'Prevision para Service y Garantia', 2, '2', '2', '0.00'),
(75, 3, 'Sueldos(de vendedores)', 2, '4', '4', '0.00'),
(76, 3, 'Deudores en Gestion Judicial', 3, '1', '1', '0.00'),
(77, 3, 'Cargas Sociales a Pagar	', 3, '1', '2', '0.00'),
(78, 3, 'Mercaderias en Transito', 3, '2', '1', '0.00'),
(79, 3, 'Alquileres Cedidos', 3, '4', '4', '0.00'),
(80, 3, 'Anticipo de Gastos', 4, '1', '1', '0.00'),
(81, 3, 'IVA a pagar', 4, '1', '2', '0.00'),
(82, 3, 'Diferencia de Cambio Positiva', 4, '5', '4', '0.00'),
(83, 3, 'Mercaderias en Transito	', 5, '1', '1', '0.00'),
(84, 3, 'Titulos Publicos', 5, '2', '1', '0.00'),
(85, 3, 'Rodados', 6, '2', '1', '0.00'),
(86, 3, 'Concesiones', 7, '2', '1', '0.00'),
(87, 3, 'Prevision para Service y Garantia', 8, '1', '2', '0.00'),
(88, 4, 'Primas de Emision', 1, '0', '3', '0.00'),
(89, 4, 'Moneda Extranjera', 1, '1', '1', '0.00'),
(90, 4, 'Componente Financiero Implicito de Proveedores', 1, '1', '2', '0.00'),
(91, 4, 'Documento a Cobrar', 1, '2', '1', '0.00'),
(92, 4, 'Componente Financiero Implicito de Proveedores', 1, '2', '2', '0.00'),
(93, 4, 'Reserva para Renovacion de Equipos', 2, '0', '3', '0.00'),
(94, 4, 'Prestamos a Cobrar a Corto Plazo', 2, '1', '1', '0.00'),
(95, 4, 'Acreedores Prendarios', 2, '1', '2', '0.00'),
(96, 4, 'Seguros Pagados por Adelantado', 2, '2', '1', '0.00'),
(97, 4, 'Cargas Sociales(de vendedores)', 2, '4', '4', '0.00'),
(98, 4, 'Documento a Cobrar', 3, '1', '1', '0.00'),
(99, 4, 'ART a Pagar	', 3, '1', '2', '0.00'),
(100, 4, 'Anticipo a Proveedores', 3, '2', '1', '0.00'),
(101, 4, 'Seguros', 3, '4', '4', '0.00'),
(102, 4, 'Seguros Pagados por Adelantado', 4, '1', '1', '0.00'),
(103, 4, 'Retencion de Impuesto a las Ganancias', 4, '1', '2', '0.00'),
(104, 4, 'Diferencia de Cambio Negativa', 4, '5', '4', '0.00'),
(105, 4, 'Anticipo a Proveedores', 5, '1', '1', '0.00'),
(106, 4, 'Debentures', 5, '2', '1', '0.00'),
(107, 4, 'Instalaciones', 6, '2', '1', '0.00'),
(108, 4, 'Derecho de Autor', 7, '2', '1', '0.00'),
(109, 5, 'Aportes Irrevocables', 1, '0', '3', '0.00'),
(110, 5, 'Banco \"xx\" Caja de Ahorro', 1, '1', '1', '0.00'),
(111, 5, 'Acreedores Varios', 1, '1', '2', '0.00'),
(112, 5, 'Intereses No Devengados de Documentos a Cobrar', 1, '2', '1', '0.00'),
(113, 5, 'Acreedores Varios', 1, '2', '2', '0.00'),
(114, 5, 'Resultados no Asignados', 2, '0', '3', '0.00'),
(115, 5, 'Moneda Extranjera', 2, '1', '1', '0.00'),
(116, 5, 'Hipoteca a Pagar', 2, '1', '2', '0.00'),
(117, 5, 'Intereses a Cobrar', 2, '2', '1', '0.00'),
(118, 5, 'Alquileres Cedidos', 2, '4', '4', '0.00'),
(119, 5, 'Intereses no Devengados de Documentos a Cobrar', 3, '1', '1', '0.00'),
(120, 5, 'Sindicato a Pagar', 3, '1', '2', '0.00'),
(121, 5, 'Materias Primas', 3, '2', '1', '0.00'),
(122, 5, 'Gastos de Librería', 3, '4', '4', '0.00'),
(123, 5, 'Intereses a Cobrar', 4, '1', '1', '0.00'),
(124, 5, 'Retencion de IVA', 4, '1', '2', '0.00'),
(125, 5, 'Materias Primas', 5, '1', '1', '0.00'),
(126, 5, 'Prestamos a cobrar a largo plazo', 5, '2', '1', '0.00'),
(127, 5, 'Equipos de Computacion', 6, '2', '1', '0.00'),
(128, 5, 'Derecho de Edicion', 7, '2', '1', '0.00'),
(129, 6, 'Dividendos en Acciones', 1, '0', '3', '0.00'),
(130, 6, 'Fondo Fijo', 1, '1', '1', '0.00'),
(131, 6, 'Gastos a Pagar', 1, '1', '2', '0.00'),
(132, 6, 'Componente Financiero Implicito de Deudores por Ventas', 1, '2', '1', '0.00'),
(133, 6, 'Gastos a Pagar', 1, '2', '2', '0.00'),
(134, 6, 'Resultado del Ejercicio', 2, '0', '3', '0.00'),
(135, 6, 'Prevision por Desvalorizacion de Titulos y Acciones', 2, '1', '1', '0.00'),
(136, 6, 'Acreedores Hipotecarios', 2, '1', '2', '0.00'),
(137, 6, 'IVA Credito Fiscal', 2, '2', '1', '0.00'),
(138, 6, 'Fletes', 2, '4', '4', '0.00'),
(139, 6, 'Domponente Financiero Implicito de Deudores por Ventas', 3, '1', '1', '0.00'),
(140, 6, 'Productos en Proceso', 3, '2', '1', '0.00'),
(141, 6, 'Gastos Bancarios', 3, '4', '4', '0.00'),
(142, 6, 'IVA credito Fiscal', 4, '1', '1', '0.00'),
(143, 6, 'Productos en Proceso', 5, '1', '1', '0.00'),
(144, 6, 'Herramientas', 6, '2', '1', '0.00'),
(145, 6, 'Licencia de Fabricacion', 7, '2', '1', '0.00'),
(146, 7, 'Documentos a Cobrar Endosados', 1, '2', '1', '0.00'),
(147, 7, 'Socio \"xx\" Cuenta Particular', 1, '2', '2', '0.00'),
(148, 7, 'Prevision por Desvalorizacion de Moneda Extranjera', 2, '1', '1', '0.00'),
(149, 7, 'Accionistas', 2, '2', '1', '0.00'),
(150, 7, 'Deudores Incobrables', 2, '4', '4', '0.00'),
(151, 7, 'Documentos a Cobrar Endosados', 3, '1', '1', '0.00'),
(152, 7, 'Productos Terminados', 3, '2', '1', '0.00'),
(153, 7, 'Amortizacion de Muebles y Utiles', 3, '4', '4', '0.00'),
(154, 7, 'Accionistas', 4, '1', '1', '0.00'),
(155, 7, 'Productos Terminados', 5, '1', '1', '0.00'),
(156, 7, 'Maquinarias', 6, '2', '1', '0.00'),
(157, 7, 'Franquicias', 7, '2', '1', '0.00'),
(158, 8, 'Documentos a Cobrar Descontados', 1, '2', '1', '0.00'),
(159, 8, 'Alquileres Cobrados por Adelantado', 1, '2', '2', '0.00'),
(160, 8, 'Nueva Inversion', 2, '1', '1', '0.00'),
(161, 8, 'Socio \"xx\" Cuenta Aporte', 2, '2', '1', '0.00'),
(162, 8, 'Seguros', 2, '4', '4', '0.00'),
(163, 8, 'Documentos a Cobrar Descontados', 3, '1', '1', '0.00'),
(164, 8, 'Prevision por Desvalorizacion de Moneda', 3, '2', '1', '0.00'),
(165, 8, 'Amortizacion de Inmuebles(afectado al sector adminsitrativo)', 3, '4', '4', '0.00'),
(166, 8, 'Socio \"xx\" Cuenta Aporte', 4, '1', '1', '0.00'),
(167, 8, 'Prevision por Desvalorizacion de Moneda', 5, '1', '1', '0.00'),
(168, 8, 'Terrenos', 6, '2', '1', '0.00'),
(169, 8, 'Gastos de Organización', 7, '2', '1', '0.00'),
(170, 9, 'Prevision por Deudores Incobrables', 1, '2', '1', '0.00'),
(171, 9, 'Deposito en Garantia', 2, '2', '1', '0.00'),
(172, 9, 'Amortizacion de Inmuebles(afectados al sector comercial)', 2, '4', '4', '0.00'),
(173, 9, 'Prevision por Deudores Incobrables', 3, '1', '1', '0.00'),
(174, 9, 'Deposito en Garantia', 4, '1', '1', '0.00'),
(175, 9, 'Amortizacion Acumulada de Cada Bien en Particular', 6, '2', '1', '0.00'),
(176, 9, 'Gastos de Investigacion y Desarrollo', 7, '2', '1', '0.00'),
(177, 10, 'Valores Diferidos a Depositar', 2, '2', '1', '0.00'),
(178, 10, 'Valores Diferidos a Depositar', 4, '1', '1', '0.00'),
(179, 10, 'Anticipo a Acreedores', 6, '2', '1', '0.00'),
(180, 10, 'Formulas', 7, '2', '1', '0.00'),
(181, 11, 'Hipotecas a Cobrar', 2, '2', '1', '0.00'),
(182, 11, 'Amortizacion Acumulada de Cada Bien en Particular', 7, '2', '1', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `cuitEmpresa` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razonSocialEmpresa` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicioAct` date NOT NULL
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

CREATE TABLE `grupo` (
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_grupo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
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
-- Estructura Stand-in para la vista `pasivocorrientesaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pasivocorrientesaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pasivonocorrientesaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pasivonocorrientesaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pastrimonionetosaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pastrimonionetosaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  `razonSocial` varchar(90) NOT NULL,
  `sitTributaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resultadosextraordinariossaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `resultadosextraordinariossaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resultadosnegativossaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `resultadosnegativossaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resultadosordinariossaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `resultadosordinariossaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resultadospositivossaldo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `resultadospositivossaldo` (
`Rubro` varchar(80)
,`Total` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `cod_rubro` int(2) NOT NULL,
  `nombre_rubro` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL
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
(6, 'Otros Activos 01', '1', '1'),
(6, 'Dividendos a Pagar', '1', '2'),
(6, 'Bienes de Uso', '2', '1'),
(6, 'Depreciacion de la Llave de Negocio', '5', '4'),
(7, 'Otras Deudas', '1', '2'),
(7, 'Activos Intangibles', '2', '1'),
(7, 'Participacion Minoritaria sobre Resultados', '5', '4'),
(8, 'Previsiones', '1', '2'),
(8, 'Otros Activos 02', '2', '1'),
(9, 'Llave de Negocio', '2', '1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `saldocuentas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `saldocuentas` (
`IdCuenta` int(11)
,`Cuenta` varchar(80)
,`Saldo` decimal(33,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sittributaria`
--

CREATE TABLE `sittributaria` (
  `id_sitTributaria` int(11) NOT NULL,
  `sitTributaria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sittributaria`
--

INSERT INTO `sittributaria` (`id_sitTributaria`, `sitTributaria`) VALUES
(1, 'IVA Responsable Insc'),
(2, 'IVA Responsable no I'),
(3, 'IVA no Responsable'),
(4, 'IVA Sujeto Exento'),
(5, 'Consumidor Final'),
(6, 'Responsable Monotrib'),
(7, 'Sujeto no Categoriza'),
(8, 'Proveedor del Exteri'),
(9, 'Cliente del Exterior'),
(10, 'IVA Liberado – Ley N'),
(11, 'IVA Responsable Insc'),
(12, 'Pequeño Contribuyent'),
(13, 'Monotributista Socia'),
(14, 'Pequeño Contribuyent');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocomprobante`
--

CREATE TABLE `tipocomprobante` (
  `id_tipoComprobante` int(11) NOT NULL,
  `nombreTipoComprobante` varchar(50) NOT NULL,
  `id_sitTributaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombeUsuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `privilegios` tinyint(1) NOT NULL,
  `cuitEmpresa` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombeUsuario`, `correo`, `contraseña`, `privilegios`, `cuitEmpresa`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', 1, '20309876547'),
(2, 'User', 'user@gmail.com', '1234', 0, '20309876547');

-- --------------------------------------------------------

--
-- Estructura para la vista `activocorrientesaldo`
--
DROP TABLE IF EXISTS `activocorrientesaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activocorrientesaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 1 AND `c`.`cod_grupo` = 1 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Caja y Bancos' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `activonocorrientesaldo`
--
DROP TABLE IF EXISTS `activonocorrientesaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activonocorrientesaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 2 AND `c`.`cod_grupo` = 1 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Creditos por Ventas' AND `r`.`cod_rubro` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pasivocorrientesaldo`
--
DROP TABLE IF EXISTS `pasivocorrientesaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasivocorrientesaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 1 AND `c`.`cod_grupo` = 2 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Deudas Comerciales' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pasivonocorrientesaldo`
--
DROP TABLE IF EXISTS `pasivonocorrientesaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasivonocorrientesaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 2 AND `c`.`cod_grupo` = 2 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Deudas' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pastrimonionetosaldo`
--
DROP TABLE IF EXISTS `pastrimonionetosaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pastrimonionetosaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 0 AND `c`.`cod_grupo` = 3 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Aportes de Los Propietarios' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resultadosextraordinariossaldo`
--
DROP TABLE IF EXISTS `resultadosextraordinariossaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resultadosextraordinariossaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 6 AND `c`.`cod_grupo` = 4 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Resultados Extraordinarios' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resultadosnegativossaldo`
--
DROP TABLE IF EXISTS `resultadosnegativossaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resultadosnegativossaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 4 AND `c`.`cod_grupo` = 4 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Costos de los Bienes Vendidos y Servicios Prestados' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resultadosordinariossaldo`
--
DROP TABLE IF EXISTS `resultadosordinariossaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resultadosordinariossaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Resultado de Evaluacion de Bienes de Cambio a VNR' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resultadospositivossaldo`
--
DROP TABLE IF EXISTS `resultadospositivossaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resultadospositivossaldo`  AS SELECT `r`.`nombre_rubro` AS `Rubro`, sum(`c`.`saldo_cuenta`) AS `Total` FROM (`cuenta` `c` join `rubro` `r`) WHERE `c`.`cod_bloque` = 3 AND `c`.`cod_grupo` = 4 AND `r`.`cod_rubro` = `c`.`cod_rubro` AND `r`.`nombre_rubro` = 'Ventas' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `saldocuentas`
--
DROP TABLE IF EXISTS `saldocuentas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldocuentas`  AS SELECT `c`.`id_cuenta` AS `IdCuenta`, `c`.`nombre_cuenta` AS `Cuenta`, sum(`ac`.`saldo_ac`) AS `Saldo` FROM (`asiento_cuenta` `ac` join `cuenta` `c`) WHERE `ac`.`id_cuenta` = `c`.`id_cuenta` GROUP BY `c`.`nombre_cuenta` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD PRIMARY KEY (`numAsiento`),
  ADD KEY `id_comprobante` (`id_comprobante`);

--
-- Indices de la tabla `asiento_cuenta`
--
ALTER TABLE `asiento_cuenta`
  ADD PRIMARY KEY (`id_asientoCuenta`),
  ADD KEY `id_asiento` (`numAsiento`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`cod_bloque`,`cod_grupo`),
  ADD KEY `idGrupoI` (`cod_grupo`),
  ADD KEY `cod_grupo` (`cod_grupo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `sitTributaria` (`id_sitTributaria`),
  ADD KEY `id_sitTributaria` (`id_sitTributaria`);

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`id_comprobante`),
  ADD KEY `tipoComprobante` (`id_tipoComprobante`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `cod_rubro` (`cod_rubro`),
  ADD KEY `cod_bloque` (`cod_bloque`),
  ADD KEY `cod_grupo` (`cod_grupo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cuitEmpresa`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`cod_grupo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `sitTributaria` (`sitTributaria`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`cod_rubro`,`cod_bloque`,`cod_grupo`),
  ADD KEY `idBloqueI` (`cod_bloque`),
  ADD KEY `cod_grupo` (`cod_grupo`);

--
-- Indices de la tabla `sittributaria`
--
ALTER TABLE `sittributaria`
  ADD PRIMARY KEY (`id_sitTributaria`);

--
-- Indices de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
  ADD PRIMARY KEY (`id_tipoComprobante`),
  ADD KEY `id_sitTributaria` (`id_sitTributaria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `cuitEmpresaI` (`cuitEmpresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento_cuenta`
--
ALTER TABLE `asiento_cuenta`
  MODIFY `id_asientoCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id_comprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sittributaria`
--
ALTER TABLE `sittributaria`
  MODIFY `id_sitTributaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
  MODIFY `id_tipoComprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
