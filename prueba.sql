-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: prueba
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bloque`
--

DROP TABLE IF EXISTS `bloque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloque` (
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_bloque` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_bloque`,`cod_grupo`),
  KEY `idGrupoI` (`cod_grupo`),
  KEY `cod_grupo` (`cod_grupo`),
  CONSTRAINT `bloque_ibfk_1` FOREIGN KEY (`cod_grupo`) REFERENCES `grupo` (`cod_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloque`
--

LOCK TABLES `bloque` WRITE;
/*!40000 ALTER TABLE `bloque` DISABLE KEYS */;
INSERT INTO `bloque` VALUES ('0','Sin Clasificacion','3'),('1','Corriente','1'),('1','Corriente','2'),('2','No Corriente','1'),('2','No Corriente','2'),('3','Ordinario Positivo','4'),('4','Ordinario Negativo','4'),('5','Ordinario','4'),('6','Extraordinario','4');
/*!40000 ALTER TABLE `bloque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `cod_cuenta` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cuenta` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_rubro` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_cuenta`,`cod_rubro`,`cod_bloque`,`cod_grupo`),
  KEY `cod_rubro` (`cod_rubro`),
  KEY `cod_bloque` (`cod_bloque`),
  KEY `cod_grupo` (`cod_grupo`),
  CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`cod_rubro`) REFERENCES `rubro` (`cod_rubro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES ('001','Capital Suscripto','01','0','3'),('001','Caja','01','1','1'),('001','Proveedores','01','1','2'),('001','Deudores por Ventas','01','2','1'),('001','Proveedores','01','2','2'),('001','Ventas','01','3','4'),('001','Costo de Mercaderias Vendidas (CMV)','01','4','4'),('001','Ingreso Tenencia','01','5','4'),('001','Robo','01','6','4'),('001','Reserva Legal','02','0','3'),('001','Banco \"xx\" Plazo Fijo','02','1','1'),('001','Adelanto en c/c','02','1','2'),('001','Deudores Varios','02','2','1'),('001','Prevision para Despidos','02','2','2'),('001','Amortizacion de Rodados','02','4','4'),('001','Acciones','02','5','4'),('001','Deudores por Ventas','03','1','1'),('001','Honorarios a Pagar','03','1','2'),('001','Mercaderias','03','2','1'),('001','Sueldos(de administracion)','03','4','4'),('001','Deudores varios','04','1','1'),('001','Impuestos a Pagar','04','1','2'),('001','Participacion Permanente en Sociedades','04','2','1'),('001','Combustible','04','4','4'),('001','Intereses Ganados','04','5','4'),('001','Mercaderias','05','1','1'),('001','Anticipo de Clientes','05','1','2'),('001','Inmueble para Renta','05','2','1'),('001','Impuesto a las Ganancias','05','4','4'),('001','Sobrantes (mercaderia)','05','5','4'),('001','Bienes de Uso Desafectados','06','1','1'),('001','Dividendos a Pagar','06','1','2'),('001','Inmuebles','06','2','1'),('001','Socio \"xx\" Cuenta Particular','07','1','2'),('001','Marca de Fabrica','07','2','1'),('001','Prevision para Despidos','08','1','2'),('001','Llave de Negocio','09','2','1'),('002','Acciones en Circulacion','01','0','3'),('002','Banco \"xx\" c/c','01','1','1'),('002','Documentos a Pagar','01','1','2'),('002','Deudores Morosos','01','2','1'),('002','Documentos a Pagar','01','2','2'),('002','Perdida Tenencia','01','5','4'),('002','Incendio','01','6','4'),('002','Reserva Facultativa','02','0','3'),('002','Titulos Publicos','02','1','1'),('002','Prestamos a Pagar','02','1','2'),('002','Anticipo de Sueldo','02','2','1'),('002','Prevision para Juicios Pendientes','02','2','2'),('002','Gastos de Publicidad','02','4','4'),('002','Deudores Morosos','03','1','1'),('002','Sueldos a Pagar','03','1','2'),('002','Mercaderias Entregadas en Consignacion','03','2','1'),('002','Cargas sociales(de administracion)','03','4','4'),('002','Anticipo de Sueldo','04','1','1'),('002','IVA debito fiscal','04','1','2'),('002','Intereses Cedidos','04','5','4'),('002','Mercaderias Entregadas en Consignacion','05','1','1'),('002','Amortizacion Acumulada de Inmueble para Renta','05','2','1'),('002','Faltantes (mercaderia)','05','5','4'),('002','Muebles y Utiles','06','2','1'),('002','Alquileres Cobrados por Adelantado','07','1','2'),('002','Patente de Invencion','07','2','1'),('002','Prevision para Juicios Pendientes','08','1','2'),('003','Ajuste de Capital','01','0','3'),('003','Valores a Depositar','01','1','1'),('003','Intereses no devengados de Documentos a Pagar','01','1','2'),('003','Deudores en Gestion Judicial','01','2','1'),('003','Intereses no Devengados de Documentos a Pagar','01','2','2'),('003','Reserva Estatutaria','02','0','3'),('003','Acciones por Cotizacion','02','1','1'),('003','Prenda a Pagar','02','1','2'),('003','Anticipo de Gastos','02','2','1'),('003','Prevision para Service y Garantia','02','2','2'),('003','Sueldos(de vendedores)','02','4','4'),('003','Deudores en Gestion Judicial','03','1','1'),('003','Cargas Sociales a Pagar	','03','1','2'),('003','Mercaderias en Transito','03','2','1'),('003','Alquileres Cedidos','03','4','4'),('003','Anticipo de Gastos','04','1','1'),('003','IVA a pagar','04','1','2'),('003','Diferencia de Cambio Positiva','04','5','4'),('003','Mercaderias en Transito	','05','1','1'),('003','Titulos Publicos','05','2','1'),('003','Rodados','06','2','1'),('003','Concesiones','07','2','1'),('003','Prevision para Service y Garantia','08','1','2'),('004','Primas de Emision','01','0','3'),('004','Moneda Extranjera','01','1','1'),('004','Componente Financiero Implicito de Proveedores','01','1','2'),('004','Documento a Cobrar','01','2','1'),('004','Componente Financiero Implicito de Proveedores','01','2','2'),('004','Reserva para Renovacion de Equipos','02','0','3'),('004','Prestamos a Cobrar a Corto Plazo','02','1','1'),('004','Acreedores Prendarios','02','1','2'),('004','Seguros Pagados por Adelantado','02','2','1'),('004','Cargas Sociales(de vendedores)','02','4','4'),('004','Documento a Cobrar','03','1','1'),('004','ART a Pagar	','03','1','2'),('004','Anticipo a Proveedores','03','2','1'),('004','Seguros','03','4','4'),('004','Seguros Pagados por Adelantado','04','1','1'),('004','Retencion de Impuesto a las Ganancias','04','1','2'),('004','Diferencia de Cambio Negativa','04','5','4'),('004','Anticipo a Proveedores','05','1','1'),('004','Debentures','05','2','1'),('004','Instalaciones','06','2','1'),('004','Derecho de Autor','07','2','1'),('005','Aportes Irrevocables','01','0','3'),('005','Banco \"xx\" Caja de Ahorro','01','1','1'),('005','Acreedores Varios','01','1','2'),('005','Intereses No Devengados de Documentos a Cobrar','01','2','1'),('005','Acreedores Varios','01','2','2'),('005','Resultados no Asignados','02','0','3'),('005','Moneda Extranjera','02','1','1'),('005','Hipoteca a Pagar','02','1','2'),('005','Intereses a Cobrar','02','2','1'),('005','Alquileres Cedidos','02','4','4'),('005','Intereses no Devengados de Documentos a Cobrar','03','1','1'),('005','Sindicato a Pagar','03','1','2'),('005','Materias Primas','03','2','1'),('005','Gastos de Librería','03','4','4'),('005','Intereses a Cobrar','04','1','1'),('005','Retencion de IVA','04','1','2'),('005','Materias Primas','05','1','1'),('005','Prestamos a cobrar a largo plazo','05','2','1'),('005','Equipos de Computacion','06','2','1'),('005','Derecho de Edicion','07','2','1'),('006','Dividendos en Acciones','01','0','3'),('006','Fondo Fijo','01','1','1'),('006','Gastos a Pagar','01','1','2'),('006','Componente Financiero Implicito de Deudores por Ventas','01','2','1'),('006','Gastos a Pagar','01','2','2'),('006','Resultado del Ejercicio','02','0','3'),('006','Prevision por Desvalorizacion de Titulos y Acciones','02','1','1'),('006','Acreedores Hipotecarios','02','1','2'),('006','IVA Credito Fiscal','02','2','1'),('006','Fletes','02','4','4'),('006','Domponente Financiero Implicito de Deudores por Ventas','03','1','1'),('006','Productos en Proceso','03','2','1'),('006','Gastos Bancarios','03','4','4'),('006','IVA credito Fiscal','04','1','1'),('006','Productos en Proceso','05','1','1'),('006','Herramientas','06','2','1'),('006','Licencia de Fabricacion','07','2','1'),('007','Documentos a Cobrar Endosados','01','2','1'),('007','Socio \"xx\" Cuenta Particular','01','2','2'),('007','Prevision por Desvalorizacion de Moneda Extranjera','02','1','1'),('007','Accionistas','02','2','1'),('007','Deudores Incobrables','02','4','4'),('007','Documentos a Cobrar Endosados','03','1','1'),('007','Productos Terminados','03','2','1'),('007','Amortizacion de Muebles y Utiles','03','4','4'),('007','Accionistas','04','1','1'),('007','Productos Terminados','05','1','1'),('007','Maquinarias','06','2','1'),('007','Franquicias','07','2','1'),('008','Documentos a Cobrar Descontados','01','2','1'),('008','Alquileres Cobrados por Adelantado','01','2','2'),('008','Socio \"xx\" Cuenta Aporte','02','2','1'),('008','Seguros','02','4','4'),('008','Documentos a Cobrar Descontados','03','1','1'),('008','Prevision por Desvalorizacion de Moneda','03','2','1'),('008','Amortizacion de Inmuebles(afectado al sector adminsitrativo)','03','4','4'),('008','Socio \"xx\" Cuenta Aporte','04','1','1'),('008','Prevision por Desvalorizacion de Moneda','05','1','1'),('008','Terrenos','06','2','1'),('008','Gastos de Organización','07','2','1'),('009','Prevision por Deudores Incobrables','01','2','1'),('009','Deposito en Garantia','02','2','1'),('009','Amortizacion de Inmuebles(afectados al sector comercial)','02','4','4'),('009','Prevision por Deudores Incobrables','03','1','1'),('009','Deposito en Garantia','04','1','1'),('009','Amortizacion Acumulada de Cada Bien en Particular','06','2','1'),('009','Gastos de Investigacion y Desarrollo','07','2','1'),('010','Valores Diferidos a Depositar','02','2','1'),('010','Valores Diferidos a Depositar','04','1','1'),('010','Anticipo a Acreedores','06','2','1'),('010','Formulas','07','2','1'),('011','Hipotecas a Cobrar','02','2','1'),('011','Hipotecas a Cobrar','04','1','1'),('011','Amortizacion Acumulada de Cada Bien en Particular','07','2','1');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_saldo`
--

DROP TABLE IF EXISTS `cuenta_saldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta_saldo` (
  `cod_grupo` varchar(1) NOT NULL,
  `cod_bloque` varchar(1) NOT NULL,
  `cod_rubro` varchar(2) NOT NULL,
  `cod_cuenta` varchar(3) NOT NULL,
  `saldo` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_saldo`
--

LOCK TABLES `cuenta_saldo` WRITE;
/*!40000 ALTER TABLE `cuenta_saldo` DISABLE KEYS */;
INSERT INTO `cuenta_saldo` VALUES ('1','1','01','001',0.00),('1','1','01','002',2800.50),('1','1','01','003',0.00),('1','1','01','004',102875.65);
/*!40000 ALTER TABLE `cuenta_saldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `cuitEmpresa` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razonSocialEmpresa` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicioAct` date NOT NULL,
  PRIMARY KEY (`cuitEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES ('20309876547','Empresa_1','2020-06-01'),('21326549879','Empresa_2','2022-04-14');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_grupo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES ('1','Activo'),('2','Pasivo'),('3','Patrimonio Neto'),('4','Resultados');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubro`
--

DROP TABLE IF EXISTS `rubro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubro` (
  `cod_rubro` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_rubro` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_bloque` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_rubro`,`cod_bloque`,`cod_grupo`),
  KEY `idBloqueI` (`cod_bloque`),
  KEY `cod_grupo` (`cod_grupo`),
  CONSTRAINT `rubro_ibfk_1` FOREIGN KEY (`cod_bloque`) REFERENCES `bloque` (`cod_bloque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubro`
--

LOCK TABLES `rubro` WRITE;
/*!40000 ALTER TABLE `rubro` DISABLE KEYS */;
INSERT INTO `rubro` VALUES ('01','Aportes de los Propietarios','0','3'),('01','Caja y Bancos','1','1'),('01','Deudas Comerciales','1','2'),('01','Creditos por Ventas','2','1'),('01','Deudas','2','2'),('01','Ventas','3','4'),('01','Costos de los Bienes Vendidos y Servicios Prestados','4','4'),('01','Resultado de Evaluacion de Bienes de Cambio a VNR','5','4'),('01','Resultados Extraordinarios','6','4'),('02','Resultados Acumulados','0','3'),('02','Inversiones Temporarias','1','1'),('02','Prestamos','1','2'),('02','Otros Creditos','2','1'),('02','Previsiones','2','2'),('02','Gastos Comerciales','4','4'),('02','Resultado de Inversiones en Entes Relacionados','5','4'),('03','Creditos por Ventas','1','1'),('03','Remuneraciones y Cargas Sociales','1','2'),('03','Bienes de Cambio','2','1'),('03','Gastos Administrativos','4','4'),('03','Resultados de Otras Inversiones','5','4'),('04','Otros Creditos','1','1'),('04','Cargas Fiscales','1','2'),('04','Participacion Permanente en Sociedades','2','1'),('04','Otros Gastos','4','4'),('04','Resultados Financieros por Tenencia','5','4'),('05','Bienes de Cambio','1','1'),('05','Anticipo de Clientes','1','2'),('05','Otras Inversiones','2','1'),('05','Impuesto a las Ganancias','4','4'),('05','Otros Ingresos o Egresos','5','4'),('06','Otros Activos','1','1'),('06','Dividendos a Pagar','1','2'),('06','Bienes de Uso','2','1'),('06','Depreciacion de la Llave de Negocio','5','4'),('07','Otras Deudas','1','2'),('07','Activos Intangibles','2','1'),('07','Participacion Minoritaria sobre Resultados','5','4'),('08','Previsiones','1','2'),('08','Otros Activos','2','1'),('09','Llave de Negocio','2','1');
/*!40000 ALTER TABLE `rubro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombeUsuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `privilegios` tinyint(1) NOT NULL,
  `cuitEmpresa` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `cuitEmpresaI` (`cuitEmpresa`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cuitEmpresa`) REFERENCES `empresa` (`cuitEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin','admin@gmail.com','1234',1,'20309876547'),(2,'User','user@gmail.com','1234',0,'20309876547');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 18:10:55
