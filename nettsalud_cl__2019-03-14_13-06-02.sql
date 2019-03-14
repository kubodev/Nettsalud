-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: nettsalud_cl_
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `nettsalud_cl_`
--


--
-- Table structure for table `Album`
--

DROP TABLE IF EXISTS `Album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Album` (
  `idAlbum` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `idSeccion` int(11) NOT NULL,
  PRIMARY KEY (`idAlbum`),
  KEY `fk_Album_Seccion1_idx` (`idSeccion`),
  CONSTRAINT `fk_Album_Seccion1` FOREIGN KEY (`idSeccion`) REFERENCES `Seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Album`
--

LOCK TABLES `Album` WRITE;
/*!40000 ALTER TABLE `Album` DISABLE KEYS */;
/*!40000 ALTER TABLE `Album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AlbumFoto`
--

DROP TABLE IF EXISTS `AlbumFoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AlbumFoto` (
  `idAlbumFoto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreArchivo` varchar(200) DEFAULT NULL,
  `idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`idAlbumFoto`),
  KEY `fk_AlbumFoto_Album1_idx` (`idAlbum`),
  CONSTRAINT `fk_AlbumFoto_Album1` FOREIGN KEY (`idAlbum`) REFERENCES `Album` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AlbumFoto`
--

LOCK TABLES `AlbumFoto` WRITE;
/*!40000 ALTER TABLE `AlbumFoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `AlbumFoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CodigoDescuento`
--

DROP TABLE IF EXISTS `CodigoDescuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CodigoDescuento` (
  `idCodigoDescuento` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(100) NOT NULL,
  `Porcentaje` int(3) DEFAULT NULL,
  `Monto` int(9) DEFAULT NULL,
  `MaxUsos` int(9) DEFAULT NULL,
  `Habilitado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCodigoDescuento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CodigoDescuento`
--

LOCK TABLES `CodigoDescuento` WRITE;
/*!40000 ALTER TABLE `CodigoDescuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `CodigoDescuento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CostoEnvio`
--

DROP TABLE IF EXISTS `CostoEnvio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CostoEnvio` (
  `idCostoEnvio` int(11) NOT NULL AUTO_INCREMENT,
  `idMetodoEnvio` int(11) NOT NULL DEFAULT '1',
  `Zona` varchar(200) NOT NULL,
  `Costo` int(9) NOT NULL,
  PRIMARY KEY (`idCostoEnvio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CostoEnvio`
--

LOCK TABLES `CostoEnvio` WRITE;
/*!40000 ALTER TABLE `CostoEnvio` DISABLE KEYS */;
/*!40000 ALTER TABLE `CostoEnvio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DatosComprador`
--

DROP TABLE IF EXISTS `DatosComprador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DatosComprador` (
  `idDatosComprador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `Telefono` varchar(200) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Rut` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Comentarios` text NOT NULL,
  `idPedido` int(11) NOT NULL,
  PRIMARY KEY (`idDatosComprador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DatosComprador`
--

LOCK TABLES `DatosComprador` WRITE;
/*!40000 ALTER TABLE `DatosComprador` DISABLE KEYS */;
/*!40000 ALTER TABLE `DatosComprador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Elemento`
--

DROP TABLE IF EXISTS `Elemento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Elemento` (
  `idElemento` int(11) NOT NULL AUTO_INCREMENT,
  `Identificador` varchar(200) DEFAULT NULL,
  `TieneTitulo` int(11) DEFAULT NULL,
  `TieneTexto` int(11) DEFAULT NULL,
  `TieneLink` int(1) NOT NULL,
  `TieneSubTitulo` int(1) NOT NULL,
  `Titulo` varchar(200) DEFAULT NULL,
  `Texto` mediumtext,
  `Link` varchar(500) NOT NULL,
  `SubTitulo` varchar(400) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `idElementoGrupo` int(11) DEFAULT NULL,
  `FotoNombreArchivo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idElemento`),
  KEY `fk_Elemento_Seccion_idx` (`idSeccion`),
  KEY `fk_Elemento_ElementoGrupo1_idx` (`idElementoGrupo`),
  CONSTRAINT `fk_Elemento_ElementoGrupo1` FOREIGN KEY (`idElementoGrupo`) REFERENCES `ElementoGrupo` (`idElementoGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Elemento_Seccion` FOREIGN KEY (`idSeccion`) REFERENCES `Seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Elemento`
--

LOCK TABLES `Elemento` WRITE;
/*!40000 ALTER TABLE `Elemento` DISABLE KEYS */;
INSERT INTO `Elemento` VALUES (1,NULL,1,0,0,0,'Horarios de atención:','','','',1,NULL,NULL),(2,NULL,1,0,0,1,'Lunes – Viernes','','','9:00 – 20:30',1,NULL,NULL),(3,NULL,1,0,0,1,'Sábado','','','9:00 – 20:30',1,NULL,NULL),(4,NULL,1,0,0,1,'Domingo','','','9:00 – 15:00',1,NULL,NULL),(5,NULL,1,0,1,0,'Atención Médica','','servicios-medicos','',1,NULL,'s1.png'),(6,NULL,1,0,1,0,'Atención Dental','','servicios-dentales','',1,NULL,'s2.png'),(7,NULL,1,0,1,0,'Urgencias 24 horas','','servicios-dentales','',1,NULL,'s3.png'),(8,NULL,1,0,1,0,'Psicología','','servicios-medicos','',1,NULL,'s4.png'),(9,NULL,1,1,0,0,'¿Necesitas atención médica integral y especializada?','<h1 class=\"fr-tag\">Nett Salud </h1><p class=\"fr-tag\">&nbsp;&nbsp; cuenta con un completo equipo de&nbsp; profesionales especializados&nbsp; &nbsp;en el área de medicina y salud bucal,&nbsp; &nbsp;para que&nbsp; tu atención&nbsp; &nbsp;sea la&nbsp; &nbsp;mejor&nbsp; ¡ven!&nbsp;&nbsp;</p>','','',1,NULL,'medico.png'),(10,NULL,1,0,1,1,'Higiene Dental Completa','','#','a solo $12.990',1,NULL,'item1.png'),(11,NULL,1,0,1,1,'Sanación Cristalina,','','#','Gemoterapia y Obsidianas',1,NULL,'item2.png'),(12,NULL,1,0,1,1,'Tratamiento de la piel con','','#','radiofrecuencia y mesoterapia',1,NULL,'item3.png'),(13,NULL,0,0,0,0,'','','','',3,NULL,'8okkhZbu5F8m.jpg'),(14,NULL,1,1,0,0,'Nuestra Filosofía','<p>Entregar calidad de vida a las personas y su grupo familiar, en la Comuna de San Fernando.</p>','','',3,NULL,NULL),(15,NULL,1,1,0,0,'Quienes Somos','<p>Nuestra sociedad nace con un sueño, mejorar la atención de salud privada, médico y dental, ofrecer un servicio de calidad a las personas que lo requieran.</p>','','',3,NULL,NULL),(16,NULL,1,1,0,0,'Misión','<p>Entregar, promover y educar a las personas en su salud física, espiritual y bucal, ayudando a mantener una cultura de salud en toda su vida.</p>','','',3,NULL,NULL),(17,NULL,1,1,0,0,'Visión','<p>Constituirse en una empresa médico y dental que entregue un servicio de atención preventiva y de especialidad no importando la edad de la persona.</p>','','',3,NULL,NULL),(18,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(19,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(20,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(21,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(22,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(23,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(24,NULL,1,0,0,1,'Dra. Camila Cabello','','','Odontologa',3,1,'item.png'),(25,NULL,1,1,0,0,'Medicina General','<p class=\"fr-tag\"><span>La medicina general constituye el primer nivel de atención médica. El médico general es un profesional capacitado para diagnosticar y manejar diferentes patologías comunes y derivar al especialista indicado cuando corresponda.</span></p>','','',4,NULL,'nP5ht5o2T6lh.jpg'),(26,NULL,1,1,0,0,'Nutrición','<p class=\"fr-tag\"><span>La evaluación del estado nutricional es fundamental para poder adquirir datos de la nutrición del paciente. De esta forma con la adecuada interpretación de la medición se puede guiar a la persona para que pueda corregir su alimentación y teneruna vida sana.</span></p>','','',4,NULL,'EbhdKyEPNzOd.jpg'),(27,NULL,1,1,0,0,'Psicologia','<p class=\"fr-tag\"><span>Trabajamos desde un enfoque multidisciplinario pensando en la importancia de la salud mental de personas y Familias.</span></p>','','',4,NULL,'rOMO0T3ONY9.jpg'),(28,NULL,1,1,0,0,'Kinesiologia','<p class=\"fr-tag\"><span>Tenemos como objetivo reintegrar al paciente a su actividad habitual y deportiva en el menor tiempo posible en las mejores condiciones y sin el riesgo de recaer en su lesión.</span></p>','','',4,NULL,'HCza8Z9A1ee.jpg'),(29,NULL,1,1,0,0,'Podologia','<p class=\"fr-tag\">Nos enfocamos en la salud de tus pies ,&nbsp; combinandolo con masajes de relajación para&nbsp; el cuidado y&nbsp; relación con el resto del cuerpo.</p>','','',4,NULL,'RjPeXd9XKLjY.jpg'),(30,NULL,1,1,0,0,'Terapia Complementaria','<p class=\"fr-tag\">Terapia integral y energetica para niños y adultos.&nbsp; &nbsp;Cuerpo, mente y espíritu equilibrio perfecto</p>','','',4,NULL,'K4QZGpWNrKon.jpg'),(31,NULL,1,1,0,0,'Urgencias','<p class=\"fr-tag\">Urgencias dentales las 24 horas del día de lunes a domingo, comunicate al&nbsp; (56) 9 7979 8971</p>','','',5,NULL,'dON6KLhT9BFU.jpg'),(32,NULL,1,1,0,0,'Odontología general','<p class=\"fr-tag\">Nos encargamos <span>de rehabilitar, mediante tapaduras, los dientes afectados por caries, traumatismos, erosiones, abrasiones y defectos congenitos.</span></p>','','',5,NULL,'iPgAe9QnlyA.jpg'),(33,NULL,1,1,0,0,'Rehabilitación','<p class=\"fr-tag\">Reperamos tu sonrisa,&nbsp; &nbsp;<span>devuelve la función estética y armonía oral mediante prótesis dentales de perdidas de dientes, grandes destrucciones o de solucionar problemas estéticos, siempre buscando una oclusión y función correcta.</span></p>','','',5,NULL,'5ArytXLQvjr.jpg'),(34,NULL,1,1,0,0,'Endodoncia','<p class=\"fr-tag\"><span style=\"color: rgb(103, 107, 109); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" verdana,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Nos especializamos&nbsp;en la extracción de la parte sensible del diente, este se sella para poder mantenerlo en boca, por medio de sistemas protésicos o restauradores. Una vez realizado el tratamiento el dolor desaparece, pero el diente debe ser restaurado o rehabilitado.</span></p>','','',5,NULL,'BgzlIfGrvnsO.jpg'),(35,NULL,1,1,0,0,'Ortodoncia','<p class=\"fr-tag\">Nos&nbsp;<span style=\"color: rgb(119, 119, 119); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">encargamos de todo estudio, prevención, diagnóstico y tratamiento de las anomalías de forma, posición, relación y función de los dientes, mediante el uso y control de diferentes tipos de fuerzas.</span></p>','','',5,NULL,'k93jjpkdqjJd.jpg'),(36,NULL,1,1,0,0,'Implantologia','<p class=\"fr-tag\"><span>Trabajamos en la planificación, colocación y mantenimiento de los implantes dentales, aparatos, prótesis o sustancias que se colocan en el cuerpo para mejorar alguna de sus funciones o con fines estéticos.</span></p>','','',5,NULL,'SgpiQOPSuD44.jpg'),(37,NULL,1,1,0,0,'Odontopediatria','<p class=\"fr-tag\">Contamos con especialistas en el area de salud dental para los mas pequeños de la casa&nbsp; trabajando la educación, prevención, tratamiento&nbsp; y mantención de&nbsp; la salud buco-dentaría en niños desde su nacimiento hasta la adolescencia.</p>','','',5,NULL,'ijTmQhMOZwx.jpg'),(38,NULL,0,0,0,0,NULL,NULL,'','',6,NULL,'trabaja.png'),(39,NULL,1,0,0,1,'Clinica General de Salud',NULL,'','Hasta 30% de descuento',7,2,'item1.png'),(40,NULL,1,0,0,1,'Clinica General de Salud',NULL,'','Hasta 30% de descuento',7,2,'item1.png'),(41,NULL,1,0,0,1,'Clinica General de Salud',NULL,'','Hasta 30% de descuento',7,2,'item1.png'),(42,NULL,1,0,0,1,'Clinica General de Salud',NULL,'','Hasta 30% de descuento',7,2,'item1.png'),(43,NULL,1,0,0,1,'Clinica General de Salud',NULL,'','Hasta 30% de descuento',7,2,'item1.png'),(44,NULL,1,0,0,1,'Clinica General de Salud',NULL,'','Hasta 30% de descuento',7,2,'item1.png'),(45,'Pop-up',0,0,0,0,'','','','',1,NULL,'6lWsHiR01cle.jpeg'),(46,NULL,1,0,0,1,'','','','',3,1,'item.png'),(47,NULL,1,1,0,0,'Fonoaudiología','<p class=\"fr-tag\"><span>Nos&nbsp; ocupamos de la prevención, la evaluación y la intervención de los trastornos de la&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Comunicaci%C3%B3n_humana\" title=\"Comunicación humana\">comunicación humana</a><span>, manifestados a través de&nbsp;</span><a href=\"https://es.wikipedia.org/wiki/Patolog%C3%ADa\" title=\"Patología\">patologías</a><span>&nbsp;y alteraciones en la voz, el habla, el lenguaje (oral, escrito y gestual), la audición y las funciones orofaciales, tanto en población infantil como adulta.</span></p>','','',4,NULL,'eplXbFCvcuz9.jpg'),(48,NULL,1,1,0,0,'Estética dental','<p class=\"fr-tag\">Contamos con especialistas en el area de salud dental para los mas pequeños de la casa&nbsp; trabajando la educación, prevención, tratamiento&nbsp; y mantención de&nbsp; la salud buco-dentaría en niños desde su nacimiento hasta la adolescencia.</p>','','',5,NULL,'PsiNyYaOASl.jpg');
/*!40000 ALTER TABLE `Elemento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ElementoGrupo`
--

DROP TABLE IF EXISTS `ElementoGrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ElementoGrupo` (
  `idElementoGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `Identificador` varchar(200) DEFAULT NULL,
  `idSeccion` int(11) NOT NULL,
  PRIMARY KEY (`idElementoGrupo`),
  KEY `fk_ElementoGrupo_Seccion1_idx` (`idSeccion`),
  CONSTRAINT `fk_ElementoGrupo_Seccion1` FOREIGN KEY (`idSeccion`) REFERENCES `Seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ElementoGrupo`
--

LOCK TABLES `ElementoGrupo` WRITE;
/*!40000 ALTER TABLE `ElementoGrupo` DISABLE KEYS */;
INSERT INTO `ElementoGrupo` VALUES (1,'Equipo profesional',3),(2,'Convenios',7);
/*!40000 ALTER TABLE `ElementoGrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EstadoFormularioContacto`
--

DROP TABLE IF EXISTS `EstadoFormularioContacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EstadoFormularioContacto` (
  `idEstadoFormularioContacto` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idEstadoFormularioContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstadoFormularioContacto`
--

LOCK TABLES `EstadoFormularioContacto` WRITE;
/*!40000 ALTER TABLE `EstadoFormularioContacto` DISABLE KEYS */;
INSERT INTO `EstadoFormularioContacto` VALUES (1,'Por responder'),(2,'Respondido');
/*!40000 ALTER TABLE `EstadoFormularioContacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EstadoPago`
--

DROP TABLE IF EXISTS `EstadoPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EstadoPago` (
  `idEstadoPago` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idEstadoPago`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstadoPago`
--

LOCK TABLES `EstadoPago` WRITE;
/*!40000 ALTER TABLE `EstadoPago` DISABLE KEYS */;
INSERT INTO `EstadoPago` VALUES (1,'Por pagar'),(2,'Pagado vía webpay'),(3,'Pagado vía transferencia');
/*!40000 ALTER TABLE `EstadoPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EstadoPedido`
--

DROP TABLE IF EXISTS `EstadoPedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EstadoPedido` (
  `idEstadoPedido` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idEstadoPedido`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstadoPedido`
--

LOCK TABLES `EstadoPedido` WRITE;
/*!40000 ALTER TABLE `EstadoPedido` DISABLE KEYS */;
INSERT INTO `EstadoPedido` VALUES (1,'Por entregar'),(2,'Entregado'),(3,'Archivado');
/*!40000 ALTER TABLE `EstadoPedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EstadoProducto`
--

DROP TABLE IF EXISTS `EstadoProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EstadoProducto` (
  `idEstadoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstadoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstadoProducto`
--

LOCK TABLES `EstadoProducto` WRITE;
/*!40000 ALTER TABLE `EstadoProducto` DISABLE KEYS */;
INSERT INTO `EstadoProducto` VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `EstadoProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EvidenciaPago`
--

DROP TABLE IF EXISTS `EvidenciaPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EvidenciaPago` (
  `idEvidenciaPago` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`idEvidenciaPago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EvidenciaPago`
--

LOCK TABLES `EvidenciaPago` WRITE;
/*!40000 ALTER TABLE `EvidenciaPago` DISABLE KEYS */;
/*!40000 ALTER TABLE `EvidenciaPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FormularioContacto`
--

DROP TABLE IF EXISTS `FormularioContacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FormularioContacto` (
  `idFormularioContacto` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Leido` int(1) NOT NULL,
  `idEstadoFormularioContacto` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idFormularioContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FormularioContacto`
--

LOCK TABLES `FormularioContacto` WRITE;
/*!40000 ALTER TABLE `FormularioContacto` DISABLE KEYS */;
INSERT INTO `FormularioContacto` VALUES (2,'2018-12-28 21:28:06','201.241.180.230',1,1),(3,'2019-01-03 10:20:12','66.249.69.244',1,1);
/*!40000 ALTER TABLE `FormularioContacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FormularioContactoInformacion`
--

DROP TABLE IF EXISTS `FormularioContactoInformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FormularioContactoInformacion` (
  `idFormularioContactoInformacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(45) NOT NULL,
  `idTipoDescripcion_campo` int(3) NOT NULL,
  PRIMARY KEY (`idFormularioContactoInformacion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FormularioContactoInformacion`
--

LOCK TABLES `FormularioContactoInformacion` WRITE;
/*!40000 ALTER TABLE `FormularioContactoInformacion` DISABLE KEYS */;
INSERT INTO `FormularioContactoInformacion` VALUES (1,'Nombre',1),(2,'Teléfono',1),(3,'E-mail',5),(4,'Mensaje',6);
/*!40000 ALTER TABLE `FormularioContactoInformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MetodoEnvio`
--

DROP TABLE IF EXISTS `MetodoEnvio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MetodoEnvio` (
  `idMetodoEnvio` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idMetodoEnvio`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MetodoEnvio`
--

LOCK TABLES `MetodoEnvio` WRITE;
/*!40000 ALTER TABLE `MetodoEnvio` DISABLE KEYS */;
INSERT INTO `MetodoEnvio` VALUES (1,'Encomienda'),(2,'Retiro en Tienda'),(3,'Despacho a Domicilio (Santiago)');
/*!40000 ALTER TABLE `MetodoEnvio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MetodoPago`
--

DROP TABLE IF EXISTS `MetodoPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MetodoPago` (
  `idMetodoPago` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idMetodoPago`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MetodoPago`
--

LOCK TABLES `MetodoPago` WRITE;
/*!40000 ALTER TABLE `MetodoPago` DISABLE KEYS */;
INSERT INTO `MetodoPago` VALUES (1,'Webpay'),(2,'Flow'),(3,'Khipu'),(4,'Transferencia bancaria o Deposito'),(5,'Pago contra Entrega'),(6,'Webpay.cl');
/*!40000 ALTER TABLE `MetodoPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedido`
--

DROP TABLE IF EXISTS `Pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroOrden` varchar(200) NOT NULL,
  `Fecha` datetime NOT NULL,
  `idUsuarios` int(11) DEFAULT NULL,
  `idMetodoEnvio` int(11) NOT NULL,
  `idMetodoPago` int(11) NOT NULL,
  `idEstadoPago` int(11) NOT NULL DEFAULT '1',
  `idEstadoPedido` int(11) NOT NULL DEFAULT '1',
  `idCostoEnvio` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido`
--

LOCK TABLES `Pedido` WRITE;
/*!40000 ALTER TABLE `Pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `Pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idProductoMarca` int(11) DEFAULT NULL,
  `idEstadoProducto` int(11) NOT NULL DEFAULT '1',
  `Precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (1,NULL,1,0),(2,NULL,1,NULL),(3,NULL,1,NULL),(4,NULL,1,NULL),(5,NULL,1,NULL),(6,NULL,1,NULL),(7,NULL,1,NULL),(8,NULL,1,NULL),(9,NULL,1,NULL),(10,NULL,1,NULL),(11,NULL,1,NULL),(12,NULL,1,NULL),(13,NULL,1,NULL),(14,NULL,1,NULL),(15,NULL,1,NULL),(18,NULL,1,NULL);
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoAtributo`
--

DROP TABLE IF EXISTS `ProductoAtributo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoAtributo` (
  `idProductoAtributo` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idProductoAtributo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoAtributo`
--

LOCK TABLES `ProductoAtributo` WRITE;
/*!40000 ALTER TABLE `ProductoAtributo` DISABLE KEYS */;
INSERT INTO `ProductoAtributo` VALUES (3,'Talla'),(2,'Colorrr');
/*!40000 ALTER TABLE `ProductoAtributo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoAtributoDetalle`
--

DROP TABLE IF EXISTS `ProductoAtributoDetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoAtributoDetalle` (
  `idProductoAtributoDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idProductoAtributo` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idProductoAtributoDetalle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoAtributoDetalle`
--

LOCK TABLES `ProductoAtributoDetalle` WRITE;
/*!40000 ALTER TABLE `ProductoAtributoDetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductoAtributoDetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoAtributoDetalle_colores`
--

DROP TABLE IF EXISTS `ProductoAtributoDetalle_colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoAtributoDetalle_colores` (
  `idProductoAtributoDetalle_colores` int(11) NOT NULL,
  `idProductoAtributoDetalle` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoAtributoDetalle_colores`
--

LOCK TABLES `ProductoAtributoDetalle_colores` WRITE;
/*!40000 ALTER TABLE `ProductoAtributoDetalle_colores` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductoAtributoDetalle_colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoCategoria`
--

DROP TABLE IF EXISTS `ProductoCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoCategoria` (
  `idProductoCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `Listar` int(1) DEFAULT '1',
  `Orden` int(11) DEFAULT '1',
  `img` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProductoCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoCategoria`
--

LOCK TABLES `ProductoCategoria` WRITE;
/*!40000 ALTER TABLE `ProductoCategoria` DISABLE KEYS */;
INSERT INTO `ProductoCategoria` VALUES (1,'Servicios medicos',1,0,'',''),(2,'Medicina general',1,0,'',''),(3,'Nutrición',1,0,'',''),(4,'Psicología',1,0,'',''),(5,'Kinesiología',1,0,'',''),(6,'Podología',1,0,'',''),(7,'Terapia Complementaria',1,0,'',''),(8,'Servicios dentales',1,0,'',''),(9,'Urgencias',1,0,'',''),(10,'Odontología general',1,0,'',''),(11,'Rehabilitación',1,0,'',''),(12,'Endodoncia',1,0,'',''),(13,'Ortodoncia',1,0,'',''),(14,'Implantología',1,0,'',''),(15,'Cirujano dentista',1,0,'',''),(17,'Estética orofacial',1,1,NULL,''),(18,'Odontopediatría',1,0,'','');
/*!40000 ALTER TABLE `ProductoCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoCriterioOrden`
--

DROP TABLE IF EXISTS `ProductoCriterioOrden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoCriterioOrden` (
  `idProductoCriterioOrden` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idProductoCriterioOrden`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoCriterioOrden`
--

LOCK TABLES `ProductoCriterioOrden` WRITE;
/*!40000 ALTER TABLE `ProductoCriterioOrden` DISABLE KEYS */;
INSERT INTO `ProductoCriterioOrden` VALUES (1,'Nombre ascendente'),(2,'Nombre descendente'),(3,'Precio ascendente'),(4,'Precio descendente');
/*!40000 ALTER TABLE `ProductoCriterioOrden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoDescuento`
--

DROP TABLE IF EXISTS `ProductoDescuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoDescuento` (
  `idProductoDescuento` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `Porcentaje` int(3) NOT NULL,
  `PrecioAnterior` int(11) NOT NULL,
  `PrecioNuevo` int(11) NOT NULL,
  PRIMARY KEY (`idProductoDescuento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoDescuento`
--

LOCK TABLES `ProductoDescuento` WRITE;
/*!40000 ALTER TABLE `ProductoDescuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductoDescuento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoDestacado`
--

DROP TABLE IF EXISTS `ProductoDestacado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoDestacado` (
  `idProductoDestacado` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProductoDestacado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoDestacado`
--

LOCK TABLES `ProductoDestacado` WRITE;
/*!40000 ALTER TABLE `ProductoDestacado` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductoDestacado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoFoto`
--

DROP TABLE IF EXISTS `ProductoFoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoFoto` (
  `idProductoFoto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreArchivo` varchar(200) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idProductoFoto`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoFoto`
--

LOCK TABLES `ProductoFoto` WRITE;
/*!40000 ALTER TABLE `ProductoFoto` DISABLE KEYS */;
INSERT INTO `ProductoFoto` VALUES (1,'zESlU5h4O1zi.png',1),(2,'VxN8TX37q2i7.png',2),(54,'WHfzEBLLKqQ.png',3),(33,'y7pQUmP5BljG.png',4),(22,'Z6IvDINlF0l4.png',5),(23,'tg4kkRtEQoLU.png',6),(48,'MOkOXZXqyH6.png',7),(36,'cMOv6qo4xWzm.png',8),(70,'z6CN5pY8yaDv.png',9),(77,'gAoyVkcwe8k.png',10),(75,'1V7Ham5ie4Dm.png',13),(73,'nKjROM4o8le9.png',12),(71,'xSVMlYhtHRf1.png',18);
/*!40000 ALTER TABLE `ProductoFoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoInformacion`
--

DROP TABLE IF EXISTS `ProductoInformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoInformacion` (
  `detalle` varchar(45) DEFAULT NULL,
  `idTipoDescripcion_campo` int(11) NOT NULL,
  `idProductoInformacion` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idProductoInformacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoInformacion`
--

LOCK TABLES `ProductoInformacion` WRITE;
/*!40000 ALTER TABLE `ProductoInformacion` DISABLE KEYS */;
INSERT INTO `ProductoInformacion` VALUES ('Nombre',1,1),('Caracteristicas',6,2);
/*!40000 ALTER TABLE `ProductoInformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductoMarca`
--

DROP TABLE IF EXISTS `ProductoMarca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductoMarca` (
  `idProductoMarca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProductoMarca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductoMarca`
--

LOCK TABLES `ProductoMarca` WRITE;
/*!40000 ALTER TABLE `ProductoMarca` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductoMarca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Publicacion`
--

DROP TABLE IF EXISTS `Publicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Publicacion` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(200) NOT NULL,
  `Texto` mediumtext NOT NULL,
  `NombreArchivo` varchar(200) NOT NULL,
  `idPublicacionCategoria` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idPublicacion`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Publicacion`
--

LOCK TABLES `Publicacion` WRITE;
/*!40000 ALTER TABLE `Publicacion` DISABLE KEYS */;
INSERT INTO `Publicacion` VALUES (1,'Reiki y Meditación','<p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Meditar, en el significado común y popular, significa pensar en algo concreto, a fin de comprender un significado con profundidad. En el&nbsp;<span>mundo occidental</span>, meditar significa concentrarse en un pensamiento, en una palabra, o en una situación, descartando taxativamente cualquier otra reflexión, con el objetivo de llegar a un estado alterado de conciencia.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">La meditación es una aventura; la mayor aventura que la mente humana puede alcanzar. Los adolescentes acostumbran fascinarse con la sexualidad; los más viejos, con el dinero y los bienes materiales pero, con el tiempo, descubren que todo eso no les proporciona la felicidad plena, y comienzan a buscarla en la espiritualidad. La meditación no es una fuga de los problemas económicos y sociales: debe ser sinónimo de alegría para todos, nunca de cansancio ni aburrimiento.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">La meditación hace que nuestro ser se encuentre en armonía con el universo.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Esos resultados pueden obtenerse a través de numerosas técnicas, algunas de origen occidental.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">En la&nbsp;<span>tradición oriental</span>, meditación significa no hacer nada, para llegar a un estado de perfecta paz interior, a un estado especial en el que la mente se encuentra ausente, silenciosa. Una situación en la que se experimenta una indescriptible sensación de paz y felicidad profundas.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">El estado meditativo es muy personal, y ocurre en cada uno de nosotros de manera única, resultando difícil a veces intentar una descripción de lo ocurrido.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Con la meditación nos sentiremos más tranquilos, más conscientes, dormiremos mejor, nos cansaremos menos, y nuestra aura comenzará a vibrar de una manera más armónica, reflejando un crecimiento espiritual, en una manera más fácil y distinta de relacionarnos con nuestros semejantes, elevaremos nuestro nivel inmunológico, haciendo que las células del cuerpo trabajen de manera uniforme y equilibrada.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">El Reiki puede ser un camino para realizar meditación profunda.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Al accionar el Reiki después de las meditaciones, sentiremos una diferencia significativa por encontrarnos más próximos y en contacto más estrecho con el universo y, por lo tanto, con la energía universal.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">La meditación presupone una serie de cosas que son comunes a todos los métodos. La primera norma para meditar es un cuerpo relajado, sin controlar la mente y sin concentrarse.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Los ojos deben permanecer cerrados, pues el 85% de nuestro contacto con el exterior se hace a través de los ojos. Es preferible encontrar una posición cómoda que tener que cambiarla durante el proceso. La segunda es limitarse a observar la mente, un pensamiento, como si fuese una película en la que solamente somos observadores, sin interferir, sea lo que fuese.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Observar la mente, sin juicio alguno y sin critica.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">La meditación es el simple existir sin hacer nada, sin acción, sin pensamiento, sin emoción, en ausencia de crítica y juicio; y, lentamente, se posesionará de nosotros un profundo silencio.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\">Esos son los tres puntos principales: relajamiento, observación y ausencia de crítica.</p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\"><br></p><p style=\"margin-bottom: 20px; color: rgb(0, 0, 0); font-family: \" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 300;=\"\" letter-spacing:=\"\" 1px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" class=\"fr-tag\"><span>En&nbsp; &nbsp;</span><a href=\"https://nettsalud.cl/\" rel=\"nofollow\" style=\"box-sizing: content-box; background-color: rgb(255, 255, 255); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 13px; font-family: aller_lightregular; cursor: pointer;\">Nettsalud&nbsp;</a><span>&nbsp;&nbsp; nos especializamos en&nbsp; estos temas, estamos ubicados en Av. Bernardo O\'higgins 0450, Local 6 Paseo San Fernando, San Fernando VI Región&nbsp; - Chile.</span><br></p>','Df145X3Wundq.jpg',1,'2018-12-27'),(2,'Ponerse a dieta, ¿es para niños?','<p class=\"fr-tag\"><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Todo el mundo lleva una dieta. ¿Te parece raro? Pues sí, es verdad. Una dieta es sencillamente el conjunto de alimentos que una persona ingiere regularmente. Pero la palabra \"dieta\" también se refiere al intento de perder peso, limitando la cantidad de calorías o bien determinados tipos de alimentos.</span><br></p><p class=\"fr-tag\">Es posible que conozcas a adultos y a niños a quienes les preocupa su peso y que dicen que están haciendo dieta. Tal vez te preguntes si deberías hacer dieta. Pero la mayoría de los niños&nbsp;<strong>no</strong>&nbsp;necesitan, ni deberían, ponerse a este tipo de dieta.</p><p class=\"fr-tag\">¿Por qué? Averigüémoslo.</p><h3 class=\"fr-tag\">Ponerse a dieta para perder peso</h3><p class=\"fr-tag\">Todos los alimentos y muchas bebidas contienen calorías, un tipo de energía. Cuando una persona se pone a dieta para perder peso intenta ingerir menos calorías que las que utiliza su cuerpo. Haciendo dieta, una persona puede perder grasa corporal y bajar de peso. Del mismo modo, si una persona ingiere más calorías que las que utiliza su cuerpo, ganará peso.</p><p class=\"fr-tag\">Los niños no suelen necesitar hacer este tipo de dieta. A diferencia de los adultos, los niños están creciendo y se están desarrollando. Durante el proceso de desarrollo, los niños necesitan una amplia variedad de alimentos saludables para que sus cuerpos sigan creciendo como deben crecer. Algunos niños tienen sobrepeso, pero incluso los niños con sobrepeso suelen poder mejorar su salud simplemente comiendo alimentos nutritivos y siendo más activos.</p><p class=\"fr-tag\">Tener sobrepeso puede desembocar en problemas de salud, pero los niños pueden dañar su salud todavía más haciendo algo drástico, como saltarse comidas o comer solo lechuga.</p><h3 class=\"fr-tag\">¿Quién necesita ponerse a dieta?</h3><p class=\"fr-tag\">Aunque hay gente que cree que pesa demasiado o demasiado poco, no existe una estructura corporal perfecta. Hay gente con una estructura corporal más grande (huesos de mayor tamaño), que siempre será más voluminosa y más pesada que la gente menos corpulenta.</p><p class=\"fr-tag\">Si tienes dudas relacionadas con tu peso, habla con tu médico. Él te revisará y evaluará tu índice de masa corporal (IMC). Es una forma de calcular cuánta grasa corporal tienes. Si a tu médico le preocupa tu peso, es posible que te recomiende un par de objetivos:</p><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">ganar peso a un ritmo más lento</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">mantener tu peso corporal actual</p></li></ul><p class=\"fr-tag\">El médico puede recomendar perder peso a algunos niños, pero estos siempre lo deberán hacer con la ayuda del médico. Los niños que necesiten perder peso es mejor que consulten a un dietista, quien les explicará cómo pueden reducir calorías de una forma segura mientras siguen incorporando todos los nutrientes que necesitan.</p><h3 class=\"fr-tag\">Dietas peligrosas</h3><p class=\"fr-tag\">Las dietas que no incluyan una amplia variedad de alimentos nutritivos o que contengan una cantidad insuficiente de calorías pueden ser peligrosas para los niños. Existe un tipo de dietas peligrosas para la salud que son las \"dietas relámpago\". Suelen prometer pérdidas rápidas de peso y exigen que la persona siga unas normas muy estrictas.</p><p class=\"fr-tag\">Algunas de estas dietas peligrosas para la salud eliminan categorías completas de alimentos o exigen que la personas solo coma un tipo de alimento, como sopa de col, ¡qué asco! La verdad es que no existen recetas rápidas para la pérdida de peso. Por lo tanto, las pastillas, las bebidas especiales, las dietas a base de líquidos y otros artilugios son absolutamente inadecuadas, sobre todo para los niños. Si alguien te ofrece una pastilla para adelgazar o te sugiere que empieces a tomar un batido mágico que te hará adelgazar, ¡no le hagas caso! Esas dietas pueden enfermar a la gente. Y suelen acabar con la persona volviendo a ganar lo que había perdido.</p><p class=\"fr-tag\">Algunas personas deseosas de hacer cambios radicales para estar más delgadas podrían padecer un trastorno de la conducta alimentaria. Estos trastornos incluyen la anorexia nerviosa (privarse de comida) y la bulimia nerviosa (comer y luego vomitar de forma voluntaria). Se trata de afecciones graves, que requieren atención médica.</p><h3 class=\"fr-tag\">Ayuda para quien esté siguiendo una dieta peligrosa</h3><p class=\"fr-tag\">Si tienes un amigo o un hermano que esté siguiendo una dieta peligrosa para la salud, necesitas contárselo a un adulto. Te puedes dirigir a uno de tus padres, a un profesor o a otro adulto de confianza. También le puedes decir a él directamente que sus hábitos alimentarios son insanos, pero lo más probable es que necesites implicar también a un adulto.</p><p class=\"fr-tag\">No es nada raro que los niños, o los adultos, deseen ser más altos o más delgados o quieran cambiar alguna parte de su aspecto físico. Si te sientes así, habla con un padre o un adulto en quien confíes. Quizás necesitas que alguien te ayude a entender esos sentimientos y a comprender que tu peso está directamente relacionado con tu salud.</p><p class=\"fr-tag\">Los cambios que ocurren en el cuerpo de un niño durante la pubertad incluyen el aumento de peso. Es algo normal, pero es una buena idea que hables con tu médico si tu o tus padres tenéis alguna duda al respecto.</p><h3 class=\"fr-tag\">¿Qué pueden hacer los niños?</h3><p class=\"fr-tag\">Entonces, si los niños no necesitan ponerse a dieta, ¿cómo pueden mantener un peso saludable? Todos los niños se benefician al seguir una dieta equilibrada y al hacer abundante actividad física.</p><p class=\"fr-tag\">Los niños tienen muchas opciones en lo que se refiere a la actividad física y el ejercicio. A algunos les gustan los deportes en equipo o bailar en grupo. Otros prefieren improvisar, yendo en bici o jugando al baloncesto en un parque. El mero hecho de ayudar a tus padres a pasar el rastrillo por el jardín o a limpiar la casa es un tipo de actividad física, ¡aunque no tan divertida como irse a la piscina! Asimismo, es una buena idea reducir las actividades pasivas, como ver la tele o jugar con la computadora.</p><p class=\"fr-tag\">Los niños también han de intentar comer una amplia variedad de alimentos saludables. Llevar una dieta equilibrada significa no comer lo mismo cada día e ingerir alimentos procedentes de grupos alimenticios diferentes, como:</p><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">frutas y verduras</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">leche y lácteos</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">carne, frutos secos y otros alimentos ricos en proteínas</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">cereales, sobre todos los integrales, como el pan integral</p></li></ul><p class=\"fr-tag\">Este tipo de dieta ayuda a tu cuerpo, al aportarle los nutrientes más adecuados. Por ejemplo, las proteínas ayudan a desarrollar los músculos y otras estructuras corporales. El calcio ayuda a los huesos a crecer. Y necesitas vitaminas y otros nutrientes para que tu cuerpo funcione como debe funcionar. La fibra previene el estreñimiento y los hidratos de carbono te dan energía, por mencionar unos pocos.</p><p class=\"fr-tag\">Ahora que sabes más cosas sobre las dietas, puedes explicar a la gente que sigues una muy especial: ¡una dieta equilibrada, saludable y fenomenal para un niño!</p><p class=\"fr-tag\"><br></p><p class=\"fr-tag\"><span>En&nbsp; &nbsp;</span><a href=\"https://nettsalud.cl/\" rel=\"nofollow\" style=\"box-sizing: content-box; background-color: rgb(255, 255, 255); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 13px; font-family: aller_lightregular; cursor: pointer;\">Nettsalud&nbsp;</a><span>&nbsp;&nbsp; nos especializamos en&nbsp; estos temas, estamos ubicados en Av. Bernardo O\'higgins 0450, Local 6 Paseo San Fernando, San Fernando VI Región&nbsp; - Chile.</span><br></p>','YR27hblsmTGF.jpg',1,'2018-12-27'),(3,'Lo que deben saber los padres de la salud bucal de sus hijos','<p class=\"fr-tag\"><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Una de las preguntas es por qué hay que llevar al bebé al dentista cuando todavía no tiene dientes. Y es necesario, porque los bebés pueden desarrollar &nbsp;patologías en la cavidad bucal que diagnosticadas a tiempo evitan problemas posteriores. Además, es importante practicar la buena higiene oral incluso antes de que salga el primer diente.</span></p><p class=\"fr-tag\">¿A qué edad puede mi bebé desarrollar caries? En cuanto tenga dientes, puede tener caries si su boca no es higienizada correctamente. También hay que evitar el biberón con el niño acostado y limpiar su boca en cuanto lo termine.</p><p class=\"fr-tag\">¿Cómo saber si hay caries dental? En su inicio, la caries es una mancha blanca difícil de diagnosticar a simple vista, aunque en ocasiones las vitaminas&nbsp; pigmentan&nbsp; las caries y facilitan su visibilidad. En etapas intermedias&nbsp; las caries adquiere un color amarillo claro por lo que solo un especialista es capaz de diagnosticarla en estas etapas iniciales.</p><p class=\"fr-tag\">¿Prevenir los problemas de espacio si llevo al bebé a tiempo al odontopediatra? Sí. Muchos de los problemas de espacios se originan por errores en los hábitos de masticación lo que produce niños perezosos para masticar y a su vez&nbsp; con falta de estímulo en el crecimiento de la boca. La orientación adecuada ayuda a prevenir este tipo de problemas.</p><p class=\"fr-tag\">En&nbsp; &nbsp;<a href=\"https://nettsalud.cl\" rel=\"nofollow\">Nettsalud&nbsp;</a> &nbsp; nos especializamos en&nbsp; estos temas, estamos ubicados en Av. Bernardo O\'higgins 0450, Local 6 Paseo San Fernando, San Fernando VI Región&nbsp; - Chile.</p>','0YvENi1IJTpH.jpg',1,'2018-12-27'),(4,'Aprueban proyecto que establece el derecho a amamantar libremente','<p class=\"fr-tag\" style=\"margin-left: 0px;\"><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Este jueves la Cámara de Diputados aprobó el proyecto de ley que </span><strong><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;\">protege el libre ejercicio de la lactancia materna, estableciéndolo como derecho de las mujeres y la niñez</span></strong><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">. El texto fue despachado a tercer trámite en el Senado.</span></p><p class=\"fr-tag\">La propuesta legal fue ratificada en general por <strong>125 votos a favor y dos en contra</strong>, en tanto que las normas de quórum especial fueron aprobadas por la unanimidad de <strong>132 votos favorables</strong>. El articulado fue apoyado con la misma votación.</p><p class=\"fr-tag\">La norma reconoce el valor fundamental de la maternidad y establece como un derecho de la niñez el acceso a lactancia materna, <strong>sancionando cualquier discriminación arbitraria que cause privación, perturbación o amenaza a estos derechos</strong>.</p><p class=\"fr-tag\">De acuerdo al texto respaldado por la Sala, la <strong>lactancia materna podrá realizarse conforme sea el interés superior del lactante, con el apoyo y colaboración del padre cuando fuese posible, sin que pueda imponerse condiciones</strong> o requisitos que exijan ocultar el amamantamiento, o restringirlo.</p><p class=\"fr-tag\">CONTENIDO</p><p class=\"fr-tag\">Los recintos, en ningún caso, podrán imponer cobros a las mujeres que deseen ejercer libremente el derecho a amamantar. <strong>El uso de salas especiales de amamantamiento existentes al interior de algún recinto será siempre voluntario para las madres</strong>. Dichas salas deberán presentar condiciones adecuadas de higiene, comodidad y seguridad.</p><p class=\"fr-tag\">Todas estas garantías se extienden también a la extracción y almacenamiento de leche materna. Las madres trabajadoras ejercerán este derecho de conformidad a lo establecido en el Código del Trabajo (art. 206) y el empleador deberá otorgar las facilidades a la madre para sacarse y conservar adecuadamente su leche.</p><p class=\"fr-tag\">La iniciativa, que fue debatida en la Comisión de Salud y cuyo informe fue rendido por la diputada Claudia Mix, establece, además, la posibilidad de que todas las madres -cuya condición de salud lo permita- puedan donar voluntariamente su leche para el uso o beneficio de los recién nacidos que no tengan posibilidad de ser alimentados por su propia madre o cuando la leche producida por su progenitora constituya un riesgo para la salud del lactante.</p><p class=\"fr-tag\"><em>Vía: ahoranoticias.cl</em></p>','g2IL0RV0zRUw.jpg',1,'2019-01-07'),(5,'Centro Médico Nett Salud firma convenio entre la Comisión Zonal de Bienestar del Poder Judicial de la Región de O\'Higgins','<p class=\"fr-tag\">El pasado viernes 25 de Enero, el Ministro Pedro Caro Romero y&nbsp;<a data-hovercard-prefer-more-content-show=\"1\" data-hovercard=\"/ajax/hovercard/user.php?id=1020507769&extragetparams=%7B%22__tn__%22%3A%22%2CdK-R-R%22%2C%22eid%22%3A%22ARCpeEw6OdBZfxMpW8hnEU9GkZpQB16WrGKcnlEzY4bfb7hk--G9h6ayykyrMaLnX_PjAVIVERuhVO9f%22%2C%22fref%22%3A%22mentions%22%7D\" href=\"https://www.facebook.com/annli.jc?__tn__=K-R&amp;eid=ARCpeEw6OdBZfxMpW8hnEU9GkZpQB16WrGKcnlEzY4bfb7hk--G9h6ayykyrMaLnX_PjAVIVERuhVO9f&amp;fref=mentions&amp;__xts__%5B0%5D=68.ARDGxRVk2GPolr9gAIXbWSXiUiWmUGr8KHzkdABVHgypY_Jg_SRoofyVAh9cXSz7LiUY6txxHl4O0xGPl-KAXHSzXfDhBVDNHSRjX68aGP6nz7PXLAMswj6vbzEf23Mnl-o2Tl02Di87m0QNM1ZiJBWVhbDykgVsXBs05FM9lDo2PttKc68sQjbG0Vyv49wtS3ZqYCvNWe-Y3g-_w-LxJU2eSpCTZu1udVt5BBqY170NM1gg6HAOGHqIhhUDoJUw0vlWwTF2-shYB1ve_s1WPZkBPfk-e6R9kf_Oq77rV0PreF1ZJQsao5aCNQC3jnYg4fuXlGUhyXXf18Oq2XjSVwaVD5if\">Annette Jaramillo Cáceres</a>, firmaron el convenio entre la Comisión Zonal de Bienestar de la Región de O\'higgins y&nbsp; &nbsp;&nbsp;&nbsp;<a data-hovercard-prefer-more-content-show=\"1\" data-hovercard=\"/ajax/hovercard/page.php?id=2289577517943397&extragetparams=%7B%22__tn__%22%3A%22%2CdK-R-R%22%2C%22eid%22%3A%22ARB8A7kNIsrL4d1Fs5IsRTuXRsCb5IfWpDaGc6hrcTbaDyvUDKRRHWSMAHt5NUTDMCl3BvJI6Y-T0ZPY%22%2C%22fref%22%3A%22mentions%22%7D\" href=\"https://www.facebook.com/NettSaludSanFernando/?__tn__=K-R&amp;eid=ARB8A7kNIsrL4d1Fs5IsRTuXRsCb5IfWpDaGc6hrcTbaDyvUDKRRHWSMAHt5NUTDMCl3BvJI6Y-T0ZPY&amp;fref=mentions&amp;__xts__%5B0%5D=68.ARDGxRVk2GPolr9gAIXbWSXiUiWmUGr8KHzkdABVHgypY_Jg_SRoofyVAh9cXSz7LiUY6txxHl4O0xGPl-KAXHSzXfDhBVDNHSRjX68aGP6nz7PXLAMswj6vbzEf23Mnl-o2Tl02Di87m0QNM1ZiJBWVhbDykgVsXBs05FM9lDo2PttKc68sQjbG0Vyv49wtS3ZqYCvNWe-Y3g-_w-LxJU2eSpCTZu1udVt5BBqY170NM1gg6HAOGHqIhhUDoJUw0vlWwTF2-shYB1ve_s1WPZkBPfk-e6R9kf_Oq77rV0PreF1ZJQsao5aCNQC3jnYg4fuXlGUhyXXf18Oq2XjSVwaVD5if\">Nett Salud</a>, Centro Médico y Dental de San Fernando, que posibilitará que todos los socios del departamento de bienestar accedan a distintos beneficios en nuestra institución.</p><p class=\"fr-tag\"><br></p><p class=\"fr-tag\"><span>Ven a&nbsp; &nbsp;&nbsp;</span><a href=\"https://nettsalud.cl/\" rel=\"nofollow\" style=\"box-sizing: content-box; background-color: rgb(255, 255, 255); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 13px; font-family: aller_lightregular; cursor: pointer;\">Nettsalud&nbsp;</a><span>&nbsp;, estamos ubicados en Av. Bernardo O\'higgins 0450, Local 6 Paseo San Fernando, San Fernando VI Región&nbsp; - Chile.</span><br></p>','YctEJFQaXhYg.png',1,'2019-02-07'),(6,'Otitis veraniegas','<p class=\"f-typewriter fr-tag\" style=\"text-align: justify;\"><span style=\"font-family: Arial,Helvetica; Courier New\" ;=\"\" font-size:=\"\" 16px;=\"\" 14px;\"=\"\">En vacaciones los niños visitan piscinas y playas, y se mantienen sumergidos en el agua durante largas horas, lo que puede generar dolor de oído.</span></p><p class=\"fr-tag\" style=\"text-align: justify;\"><span style=\"font-family: Arial,Helvetica; Courier New\" ;=\"\" font-style:=\"\" inherit;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-size:=\"\" 14px;\"=\"\">&nbsp;¿Por qué sucede esto? Es debido a que el agua al entrar al oído genera cambios en el ph y como consecuencia de ello proliferación de bacterias y hongos a nivel local. Esto se manifiesta con dolor, sensación del oído tapado, supuración y fiebre en algunos casos.</span></p><p class=\"fr-tag\" style=\"text-align: justify;\"><span style=\"font-family: Arial,Helvetica; Courier New\" ;=\"\" font-size:=\"\" 16px;=\"\" 14px;\"=\"\">¿Qué se debe hacer?&nbsp; &nbsp;Solo administrar analgésicos y evitar la manipulación del oído. El cuadro de otitis aguda puede complicarse si no es manejado por un especialista.</span></p><p class=\"fr-tag\" style=\"text-align: justify;\"><span style=\"font-family: Arial,Helvetica; Courier New\" ;=\"\" font-size:=\"\" 16px;=\"\" 14px;\"=\"\">Por: Dra. Génesis Benaventa Aponte.</span></p>','Munq0wQspjfk.jpg',1,'2019-02-20');
/*!40000 ALTER TABLE `Publicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PublicacionCategoria`
--

DROP TABLE IF EXISTS `PublicacionCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PublicacionCategoria` (
  `idPublicacionCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPublicacionCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PublicacionCategoria`
--

LOCK TABLES `PublicacionCategoria` WRITE;
/*!40000 ALTER TABLE `PublicacionCategoria` DISABLE KEYS */;
INSERT INTO `PublicacionCategoria` VALUES (1,'Noticias',NULL);
/*!40000 ALTER TABLE `PublicacionCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Seccion`
--

DROP TABLE IF EXISTS `Seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Seccion` (
  `idSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `Identificador` varchar(200) DEFAULT NULL,
  `Titulo` varchar(200) DEFAULT NULL,
  `Texto` mediumtext,
  `TieneTexto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSeccion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Seccion`
--

LOCK TABLES `Seccion` WRITE;
/*!40000 ALTER TABLE `Seccion` DISABLE KEYS */;
INSERT INTO `Seccion` VALUES (1,'Inicio','Inicio','',0),(2,'Footer','Footer','<p class=\"fr-tag\" style=\"text-align: justify;\">Nuestra sociedad nace con un sueño, mejorar la atención de salud privada, médico y dental, ofrecer un servicio de calidad a las personas que lo requieran.</p>',1),(3,'Nosotros','Nosotros',NULL,0),(4,'Servicios Médicos','Servicios Médicos','',0),(5,'Servicios Dentales','Servicios Dentales','',0),(6,'Trabaja con nosotros','Trabaja con nosotros','<p><b>NettSalud</b> quiere reclutar a los mejores profesionales del área de la medicina y salud dental, si usted desea integrarse  a nuestro equipo de trabajo, le invitamos a completar el siguiente formulario adjuntando <b>Curriculum Vitae</b>.</p>',1),(7,'Convenios','Convenios',NULL,0);
/*!40000 ALTER TABLE `Seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SeccionFoto`
--

DROP TABLE IF EXISTS `SeccionFoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SeccionFoto` (
  `idSeccionFoto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreArchivo` varchar(200) DEFAULT NULL,
  `Identificador` varchar(45) DEFAULT NULL,
  `idSeccion` int(11) NOT NULL,
  PRIMARY KEY (`idSeccionFoto`),
  KEY `fk_SeccionFoto_Seccion1_idx` (`idSeccion`),
  CONSTRAINT `fk_SeccionFoto_Seccion1` FOREIGN KEY (`idSeccion`) REFERENCES `Seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SeccionFoto`
--

LOCK TABLES `SeccionFoto` WRITE;
/*!40000 ALTER TABLE `SeccionFoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `SeccionFoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SliderFoto`
--

DROP TABLE IF EXISTS `SliderFoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SliderFoto` (
  `idSliderFoto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreArchivo` varchar(200) DEFAULT NULL,
  `idSeccion` int(11) NOT NULL,
  `TieneTitulo` int(11) DEFAULT NULL,
  `TieneTexto` int(11) DEFAULT NULL,
  `TieneBotonTitulo` int(11) DEFAULT NULL,
  `TieneBotonUrl` int(11) DEFAULT NULL,
  `Titulo` varchar(400) DEFAULT NULL,
  `Texto` mediumtext,
  `BotonTitulo` varchar(200) DEFAULT NULL,
  `BotonUrl` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idSliderFoto`),
  KEY `fk_SliderFoto_Seccion1_idx` (`idSeccion`),
  CONSTRAINT `fk_SliderFoto_Seccion1` FOREIGN KEY (`idSeccion`) REFERENCES `Seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SliderFoto`
--

LOCK TABLES `SliderFoto` WRITE;
/*!40000 ALTER TABLE `SliderFoto` DISABLE KEYS */;
INSERT INTO `SliderFoto` VALUES (1,'sWJBPx4Bb6eT.png',1,1,1,1,1,'De Vuelta a Clases','Control Médico / Pediatra / Otorrino / Urologa / Evaluación Nutricional / Evaluación Dental $57.000','Reserve su hora','reservar'),(2,'mMqcIqjrKN.jpg',1,1,1,1,1,'Término del Verano 2019','Control Médico / Electrocardiograma / Otorrino / Evaluación Nutricional /Evaluación Dental $65.000','Reserve su hora','reservar'),(4,'fMWqXEJp1EJ3.jpg',4,1,1,1,1,'Medicina General','Psicología - Kinesiología - Nutrición - Podología - Terapia Complementaria','Reserve su hora','reservar'),(5,'BqwGYh4J4PM.png',4,1,1,1,1,'De Vuelta a Clases','Control Médico / Pediatra / Otorrino / Urologa / Evaluación Nutricional / Evaluación Dental $57.000','Reserve su hora','reservar'),(6,'Lx4MjC5Zjwkh.jpg',5,1,1,1,1,'Salud Bucal','Operatoria - Rehabilitación - Endodoncia - Ortodoncia - Implantología','Reserve su hora','reservar'),(7,'sd2eOJNPAT4b.png',5,1,1,1,1,'De Vuelta a Clases','Control Médico / Pediatra / Otorrino / Urologa / Evaluación Nutricional / Evaluación Dental $57.000','Reserve su hora','reservar'),(8,'convenios.png',7,1,1,1,0,'Consigue hasta un','25% de descuento','en examenes anuales',''),(9,'convenios.png',7,1,1,1,0,'Consigue hasta un','25% de descuento','en examenes anuales',''),(10,'convenios.png',7,1,1,1,0,'Consigue hasta un','25% de descuento','en examenes anuales',''),(12,'8okkhZbu5F8m.jpg',3,0,0,0,0,'','','',''),(13,'Kx0s7c7LaCqd.jpg',3,0,0,0,0,'','','',''),(15,'IMt9Bmavfli0.jpg',1,1,1,1,1,'Urgencias Dentales 24 horas','Comunícate (+56) 9 7979 8971 ','Reserve su hora','reservar'),(18,'v5MmqEgxlbI.jpg',4,1,1,1,1,'Término del Verano 2019','Control Médico / Electrocardiograma / Otorrino / Evaluación Nutricional /Evaluación Dental $65.000','Reserve su hora','reservar'),(19,'ylVUHe6zEeQe.jpg',5,1,1,1,1,'Término del Verano 2019','Control Médico / Electrocardiograma / Otorrino / Evaluación Nutricional /Evaluación Dental $65.000','Control Médico / Electrocardiograma / Otorrino / Evaluación Nutricional /Evaluación Dental $65.000','reservar');
/*!40000 ALTER TABLE `SliderFoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoDescripcion_campo`
--

DROP TABLE IF EXISTS `TipoDescripcion_campo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoDescripcion_campo` (
  `idTipoDescripcion_campo` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTipoDescripcion_campo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoDescripcion_campo`
--

LOCK TABLES `TipoDescripcion_campo` WRITE;
/*!40000 ALTER TABLE `TipoDescripcion_campo` DISABLE KEYS */;
INSERT INTO `TipoDescripcion_campo` VALUES (1,'Texto'),(2,'Documento'),(3,'Rut'),(4,'Numero'),(5,'Email'),(6,'Textarea');
/*!40000 ALTER TABLE `TipoDescripcion_campo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `fechaRegistro` datetime NOT NULL,
  `idMascota` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsuariosAdmin`
--

DROP TABLE IF EXISTS `UsuariosAdmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuariosAdmin` (
  `idUsuariosAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(200) DEFAULT NULL,
  `Contrasena` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idUsuariosAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuariosAdmin`
--

LOCK TABLES `UsuariosAdmin` WRITE;
/*!40000 ALTER TABLE `UsuariosAdmin` DISABLE KEYS */;
INSERT INTO `UsuariosAdmin` VALUES (1,'nett','6effc44e9b45cbb85b339910401d8ee2');
/*!40000 ALTER TABLE `UsuariosAdmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsuariosInformacion`
--

DROP TABLE IF EXISTS `UsuariosInformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuariosInformacion` (
  `idUsuariosInformacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(255) NOT NULL,
  `idTipoDescripcion_campo` int(2) NOT NULL,
  PRIMARY KEY (`idUsuariosInformacion`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuariosInformacion`
--

LOCK TABLES `UsuariosInformacion` WRITE;
/*!40000 ALTER TABLE `UsuariosInformacion` DISABLE KEYS */;
INSERT INTO `UsuariosInformacion` VALUES (1,'Nombre',1),(2,'Apellido',1),(3,'Celular',4),(6,'Email',5),(8,'Contraseña',7),(9,'Telefono',4),(10,'Dirección',1),(11,'Comuna',1),(12,'Ciudad',1),(13,'Información adicional',6),(14,'Nombre de esta dirección',1);
/*!40000 ALTER TABLE `UsuariosInformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsuariosRecuperarPassw`
--

DROP TABLE IF EXISTS `UsuariosRecuperarPassw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuariosRecuperarPassw` (
  `idRecuperar` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(255) DEFAULT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `venc` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecuperar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuariosRecuperarPassw`
--

LOCK TABLES `UsuariosRecuperarPassw` WRITE;
/*!40000 ALTER TABLE `UsuariosRecuperarPassw` DISABLE KEYS */;
/*!40000 ALTER TABLE `UsuariosRecuperarPassw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VariablesConfiguracion`
--

DROP TABLE IF EXISTS `VariablesConfiguracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VariablesConfiguracion` (
  `idVariablesConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`idVariablesConfiguracion`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VariablesConfiguracion`
--

LOCK TABLES `VariablesConfiguracion` WRITE;
/*!40000 ALTER TABLE `VariablesConfiguracion` DISABLE KEYS */;
INSERT INTO `VariablesConfiguracion` VALUES (1,'sistemaPublicaciones','1'),(2,'sistemaPublicacionesCategoria','1'),(3,'CategoriasImg','0'),(4,'CategoriasDescripcion','0'),(5,'SistemaMarcas','0'),(6,'MarcasImg','0'),(7,'Debug','0'),(8,'Dominio','http://mmw.cl'),(9,'Ruta','/'),(10,'CarpetaPanel','panelAdmin'),(11,'Precios','0'),(12,'SistemaDescuentos','0'),(13,'SistemaModelos','0'),(14,'PublicacionesCategoriaImg','1'),(15,'SistemaUsuarios','0'),(16,'RutaPerfilUsuario','perfil/index.php'),(17,'DominioBruto','mmw.cl'),(18,'RutaRecuperarPassw','recuperar/index.php'),(19,'NombreProyecto','Nombre Empresa'),(20,'SistemaPedidos','0'),(21,'SistemaEnvios','0'),(22,'DebugWP','0'),(23,'URLExitoWP','1'),(24,'URLRechazoWP','1'),(25,'RutaAbsoluta','/var/www/vhosts/nettsalud.cl/httpdocs/'),(26,'ColorPrimario','#0047AF'),(27,'URLLogoEmail','https://mmw.cl/~myrsillas/img/logo2.svg'),(28,'ProductosRelacionados','0');
/*!40000 ALTER TABLE `VariablesConfiguracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VariablesInformacion`
--

DROP TABLE IF EXISTS `VariablesInformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VariablesInformacion` (
  `idVariablesInformacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `Valor` mediumtext,
  `idTipoDescripcion_campo` int(11) NOT NULL,
  PRIMARY KEY (`idVariablesInformacion`),
  KEY `fk_VariablesInformacion_TipoDescripcion_campo1_idx` (`idTipoDescripcion_campo`),
  CONSTRAINT `fk_VariablesInformacion_TipoDescripcion_campo1` FOREIGN KEY (`idTipoDescripcion_campo`) REFERENCES `TipoDescripcion_campo` (`idTipoDescripcion_campo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VariablesInformacion`
--

LOCK TABLES `VariablesInformacion` WRITE;
/*!40000 ALTER TABLE `VariablesInformacion` DISABLE KEYS */;
INSERT INTO `VariablesInformacion` VALUES (1,'Sufijo','Nettsalud San Fernando',1),(2,'Direccion','Av. Bernardo O´higgins 0450, local 6, Paseo San Fernando, San Fernando VI Región – Chile ',1),(3,'Telefono','(+56) 9 7979 8971',1),(4,'Email','recepcion@nettsalud.cl',5),(5,'MetaDescription','Nettsalud nace con un sueño, mejorar la atención de salud privada, médico y dental, ofrecer un servicio de calidad a las personas que lo requieran.',1),(6,'MetaKeywords','',1),(7,'Link FB','https://www.facebook.com/NettSaludSanFernando/',1),(8,'Link IN','https://www.instagram.com/nettsalud/',1),(9,'Activar PopUp (si o no)','NO',1),(10,'Email 2','contacto@nettsalud.cl',5);
/*!40000 ALTER TABLE `VariablesInformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WebpayTransacciones`
--

DROP TABLE IF EXISTS `WebpayTransacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WebpayTransacciones` (
  `idWebpayTransacciones` int(7) NOT NULL AUTO_INCREMENT,
  `idTipoTransaccion` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idOrdenCompra` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0=Por pagar,1=Pagado,2=Rechazado,3=Anulada',
  `cardNumber` varchar(200) DEFAULT NULL,
  `cardExpirationDate` varchar(200) DEFAULT NULL,
  `authorizationCode` varchar(200) DEFAULT NULL,
  `paymentTypeCode` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `sharesNumber` varchar(200) DEFAULT NULL,
  `commerceCode` varchar(200) DEFAULT NULL,
  `transactionDate` varchar(200) DEFAULT NULL,
  `nullify_authorizationCode` varchar(400) DEFAULT NULL,
  `nullify_authorizationDate` varchar(400) DEFAULT NULL,
  `nullify_balance` varchar(400) DEFAULT NULL,
  `nullify_nullifiedAmount` varchar(400) DEFAULT NULL,
  `nullify_token` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idWebpayTransacciones`),
  UNIQUE KEY `idOrdenCompra` (`idOrdenCompra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WebpayTransacciones`
--

LOCK TABLES `WebpayTransacciones` WRITE;
/*!40000 ALTER TABLE `WebpayTransacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `WebpayTransacciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_FormularioContacto_FormularioContactoInformacion`
--

DROP TABLE IF EXISTS `rel_FormularioContacto_FormularioContactoInformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_FormularioContacto_FormularioContactoInformacion` (
  `idrel_FormularioContacto_FormularioContactoInformacion` int(11) NOT NULL AUTO_INCREMENT,
  `idFormularioContacto` int(11) NOT NULL,
  `idFormularioContactoInformacion` int(11) NOT NULL,
  `detalle` text NOT NULL,
  PRIMARY KEY (`idrel_FormularioContacto_FormularioContactoInformacion`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_FormularioContacto_FormularioContactoInformacion`
--

LOCK TABLES `rel_FormularioContacto_FormularioContactoInformacion` WRITE;
/*!40000 ALTER TABLE `rel_FormularioContacto_FormularioContactoInformacion` DISABLE KEYS */;
INSERT INTO `rel_FormularioContacto_FormularioContactoInformacion` VALUES (5,2,1,'1'),(6,2,2,'2'),(7,2,3,'3'),(8,2,4,'4'),(9,3,1,''),(10,3,2,''),(11,3,3,''),(12,3,4,'');
/*!40000 ALTER TABLE `rel_FormularioContacto_FormularioContactoInformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_Pedido_CodigoDescuento`
--

DROP TABLE IF EXISTS `rel_Pedido_CodigoDescuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_Pedido_CodigoDescuento` (
  `idRel_Pedido_CodigoDescuento` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idCodigoDescuento` int(11) NOT NULL,
  PRIMARY KEY (`idRel_Pedido_CodigoDescuento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_Pedido_CodigoDescuento`
--

LOCK TABLES `rel_Pedido_CodigoDescuento` WRITE;
/*!40000 ALTER TABLE `rel_Pedido_CodigoDescuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_Pedido_CodigoDescuento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_Pedido_EvidenciaPago`
--

DROP TABLE IF EXISTS `rel_Pedido_EvidenciaPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_Pedido_EvidenciaPago` (
  `idRel_Pedido_EvidenciaPago` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idEvidenciaPago` int(11) NOT NULL,
  PRIMARY KEY (`idRel_Pedido_EvidenciaPago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_Pedido_EvidenciaPago`
--

LOCK TABLES `rel_Pedido_EvidenciaPago` WRITE;
/*!40000 ALTER TABLE `rel_Pedido_EvidenciaPago` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_Pedido_EvidenciaPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_Pedido_Producto`
--

DROP TABLE IF EXISTS `rel_Pedido_Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_Pedido_Producto` (
  `idRel_Pedido_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idProductoAtributoDetalle` int(11) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idRel_Pedido_Producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_Pedido_Producto`
--

LOCK TABLES `rel_Pedido_Producto` WRITE;
/*!40000 ALTER TABLE `rel_Pedido_Producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_Pedido_Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_ProductoAtributoDetalle_Producto`
--

DROP TABLE IF EXISTS `rel_ProductoAtributoDetalle_Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_ProductoAtributoDetalle_Producto` (
  `idRel_ProductoAtributoDetalle_Producto` int(11) NOT NULL,
  `idProductoAtributoDetalle` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `SKU` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_ProductoAtributoDetalle_Producto`
--

LOCK TABLES `rel_ProductoAtributoDetalle_Producto` WRITE;
/*!40000 ALTER TABLE `rel_ProductoAtributoDetalle_Producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_ProductoAtributoDetalle_Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_ProductoCategoria_ProductoCategoria`
--

DROP TABLE IF EXISTS `rel_ProductoCategoria_ProductoCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_ProductoCategoria_ProductoCategoria` (
  `idRel_ProductoCategoria_ProductoCategoria` int(7) NOT NULL AUTO_INCREMENT,
  `idProductoCategoria_Padre` int(7) NOT NULL,
  `idProductoCategoria_Hijo` int(7) NOT NULL,
  PRIMARY KEY (`idRel_ProductoCategoria_ProductoCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_ProductoCategoria_ProductoCategoria`
--

LOCK TABLES `rel_ProductoCategoria_ProductoCategoria` WRITE;
/*!40000 ALTER TABLE `rel_ProductoCategoria_ProductoCategoria` DISABLE KEYS */;
INSERT INTO `rel_ProductoCategoria_ProductoCategoria` VALUES (1,1,2),(2,1,3),(3,1,4),(4,1,5),(5,1,6),(6,1,7),(7,8,9),(16,8,10),(9,8,11),(10,8,12),(11,8,13),(12,8,14),(13,8,15),(19,8,17),(17,8,18);
/*!40000 ALTER TABLE `rel_ProductoCategoria_ProductoCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_ProductoInformacion_Producto`
--

DROP TABLE IF EXISTS `rel_ProductoInformacion_Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_ProductoInformacion_Producto` (
  `idRel_ProductoInformacion_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` longtext,
  `idProductoInformacion` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idRel_ProductoInformacion_Producto`),
  KEY `fk_ProductoInformacion_TipoDescripcion1_idx` (`idProductoInformacion`),
  KEY `fk_ProductoInformacion_Producto1_idx` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_ProductoInformacion_Producto`
--

LOCK TABLES `rel_ProductoInformacion_Producto` WRITE;
/*!40000 ALTER TABLE `rel_ProductoInformacion_Producto` DISABLE KEYS */;
INSERT INTO `rel_ProductoInformacion_Producto` VALUES (1,'Dr. Eduardo Recabarren Cabrera',1,1),(2,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Médico titulado en Cuba</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Diplomado en medicina familiar en la Pontificia Universidad Católica de Chile</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Diplomado en medicina familiar avanzada en la PUC</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Múltiples post grados en atención ambulatoria</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Se destaca por su Enfoque biosicosocial de la atención médica</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Atención de recién nacidos, lactantes, niños, adultos, embarazadas, y adultos mayores</p></li></ul>',2,1),(3,'Dra. Génesis Benaventa Aponte',1,2),(4,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Médico Cirujano – Otorrinolaringólogo</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Consulta niños y adultos.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Evaluación de oídos, nariz, faringe y laringe</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Audición, olfato, gusto, voz y deglución.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Manejo de enfermedades nasosinusales .</p></li></ul>',2,2),(5,'Psicóloga Bárbara Vargas Lagos',1,3),(6,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Licenciada en psicología</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Enfoque sistémico</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Especialidad infanto juvenile</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Evaluaciones psicológicas tanto en niños como adultos</p></li></ul>',2,3),(7,'Yasna Tolorza Alarcón',1,4),(8,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Licenciada en Kinesiología</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Rehabilitación Kinesiológica</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Traumatológica</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Respiratoria</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Neurológica</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Adulto mayor</p></li></ul><p class=\"fr-tag\"><br></p><p class=\"fr-tag\"><br></p><p class=\"fr-tag\">Ciencia que abarca un cuerpo propio del conocimiento, el movimiento humano normal y   <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">disfuncional, desde este punto de vista, la kinesioterapia se nutre de otras ciencias. </span></p><p class=\"fr-tag\"><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">El kinesiólogo,    </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">mediante un proceso reflexivo, basado en el razonamiento clínico, sobre los hallazgos obtenidos   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">en la evaluación del paciente (examen kinésico), determina y prioriza los objetivos de su   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">intervención. </span></p><p class=\"fr-tag\"><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Solo entonces decide los procedimientos terapéuticos que usara para lograr sus   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">objetivos y evaluara los resultados de la intervención.   Además, el trabajo del Kinesiólogo con los   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">individuos también es realizado para evitar la pérdida de la movilidad antes de que ocurra   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">mediante el desarrollo de estilos de vida saludables y de programas de bienestar orientados a   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">generar condiciones de vida saludables y niveles de mayor actividad en los individuos.</span></p>',2,4),(9,'Camila Castro Lizana',1,5),(10,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Nutricionista Dietista.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Licenciada en Nutrición y Dietética.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Atención nutricional integral, labores de intervención y educación para la salud nutricional</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">de la persona, familia y comunidad, en cada etapa del ciclo vital.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Atención nutricional de acuerdo a patologías y/o alergias alimentarias.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Instructora de Yoga Integral en formación.</p></li></ul>',2,5),(11,'Alicia Arenas Riquelme',1,6),(12,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Nutricionista y Dietista.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Licenciada en nutrición.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Atención dietoterapéutica en distintas etapas del ciclo vital(embarazadas, niños,</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">adolescentes, adultos y adultos mayores), patologías metabólicas, inmunológicas y <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">cardiovasculares.</span></p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Evaluación y diagnóstico nutricional integral. Control sano 5 meses y 3 años 6 meses.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Consulta de lactancia.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Atención y evaluación nutricional alimentaria a pacientes con parálisis cerebral, APLV,</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Celiacos.</p></li></ul>',2,6),(13,'Paola Andrea Vásquez Rojas',1,7),(14,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\" style=\"margin-left: 0px;\">Podóloga Clínica</p></li><li class=\"fr-tag\"><p class=\"fr-tag\" style=\"margin-left: 0px;\">Registro Minsal</p></li><li class=\"fr-tag\"><p class=\"fr-tag\" style=\"margin-left: 0px;\">Escuela de Podólogos de chile</p></li><li class=\"fr-tag\"><p class=\"fr-tag\" style=\"margin-left: 0px;\">Atenciones: Pie Diabético. Corte técnico de uñas(onicotomia). Uñas   <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">engrosadas(onicogrifosis). Uñas encarnadas(onicocriptosis). Uñas micóticas con   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">hongos(onicomicosis). Fisuras o grietas plantares- callos (helomas). Durezas   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">(hiperqueratosis).   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Diagnóstico y confección de ortesis de silicona. Hongos en la piel   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">(dermatomicosis). Plantillas Personalizadas. Técnica Moderna con Brackets en uñas con   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">mal formación. Uñas de resina. Masajes de relajación.</span></p></li></ul>',2,7),(15,'Marianela Segura Barrera',1,8),(16,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Terapeuta holística</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Master Reiki</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Certificada en sonoterapia y biosonica</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Terapeuta integrativa</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Terapias Integrativas Holísticas para niños, adultos, embarazadas, adolecentes,&nbsp; &nbsp;familia.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Terapias energéticas enfocadas en el crecimiento personal, emocional, físico, espiritual.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Terapias a través de sonidos, limpiezas de aura, alineación energética.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Sanación Cristalina, Gemoterapia, obsidianas.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Terapias complementarias para pacientes de cuidados paliativos abordando la situación del paciente desde la perpectiva holistica.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Terapias del sonido cuencos de cuarzos y Tibetanos frecuencia sanadora vibratoria y&nbsp;curativas a los cuerpos físicos y sutiles.</p></li></ul><p class=\"fr-tag\">Cuerpo, mente y espíritu equilibrio perfecto.</p>',2,8),(17,'Dra. Annette Jaramillo Cáceres',1,9),(18,'<p class=\"fr-tag\"><br></p><p class=\"fr-tag\">Se destaca por su gran vocación y calidad humana por el servicio público y social. El buen manejo   <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">con pacientes, capacidad de adaptación, resolución de problemas y pro actividad.</span></p><p class=\"fr-tag\"><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Vinculación con el medio de la facultad de odontología Universidad San Sebastián. Proyecto   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">colaborativo de atenciones dentales en el Centro de Atención y Diagnóstico Externo “Tierra   </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Nueva” de la comuna de La Granja.</span></p><p class=\"fr-tag\">Destacada participación en los Programas de gobierno de atención primaria</p><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\"> “Más sonrisas para Chile” en la comuna de Peralillo.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\"> “Atención odontológica integral para alumnos de 4tos medios” en Corporación municipal de San Fernando.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\"> Pionera en atención SAPU Cesfam Oriente San Fernando</p></li></ul><p class=\"fr-tag\">Atención en horario de extensión en Cesfam Oriente de San Fernando.</p><p class=\"fr-tag\">Actualmente y en conjunto con su atención en Nett Salud se desempeña como dentista en</p><p class=\"fr-tag\">CECOSF de Angostura.</p><p class=\"fr-tag\">Curso “Plasma rico en plaquetas” certificado por International College of Dentists</p><p class=\"fr-tag\">Curso Actualización Farmacología en Odontología certificado por AGC.</p>',2,9),(19,'Dra. María José Mira Abarca',1,10),(20,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Titulada de la Universidad Viña del Mar.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">El año 2017 realización una pasantía en Clínicas Odontológicas Universidad Católica Portuguesa en Portugal, Europa, mediante la beca INCHIPE<br></p></li></ul>',2,10),(21,'Dr. Pablo Tobar',1,11),(22,'<p class=\"fr-tag\">Especialista de implantes en Universidade Cidade de São Paulo UNICID</p><p class=\"fr-tag\"><br></p><p class=\"fr-tag\">HABILIDADES:</p><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Capacidad de ejecutar acciones de fomento, protección y recuperación de la salud bucal, en un contexto integral y sustentado por un marco de sólidos principios éticos y de respeto irrestricto por la normativa legal de bioseguridad y medioambiental vigente.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Capacitado para emprender, organizar, gestionar equipos de salud general y liderar equipos de salud bucal, en particular.</p></li></ul><p class=\"fr-tag\"><br></p><p class=\"fr-tag\">EXPERIENCIA PROFESIONAL Y OTRAS ACTIVIDADES AFINES:</p><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Cirujano Dentista contratado por 44 horas en CESFAM de Peralillo, Peralillo, VI Región, desde octubre del 2013 a Agosto de 2014.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Participación activa en programas en programas del gobierno desde el año 2013, en comunas de: Palmilla, Peralillo, Curicó, San Fernando.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Se desempeña conjuntamente a Nett salud en clínicas privadas, en las comunas de Peralillo y Santa Cruz.</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Curso Teórico-práctico de Resucitación Cardiopulmonar Básico y Desfibrilación Automática, bajo las normas chilenas de RCP 4 horas, año 2009.</p></li></ul>',2,11),(23,'Dra. María José Araneda Saldías',1,12),(24,'<ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Odontóloga, Especializada en Medicina Estética</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Perfeccionamiento en MARC MIAMI, EEUU</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Entrenamiento Avanzado. Bogotá, Colombia</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Cirujano Dentista con experiencia en procedimientos en Odontología General, Medicina estética   <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">facial y docencia de ambas áreas.</span></p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Se destaca por el buen manejo con pacientes, Alto índice de   <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">presupuestos concretados, capacidad de adaptación, resolución de problemas y pro actividad.</span></p></li></ul>',2,12),(25,'Dr. Juan Pablo Guzmán',1,13),(26,'<p class=\"fr-tag\">RESUMEN LABORAL:</p><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Cirujano Dentista, Especialista en Rehabilitación Oral</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Especialista en Implantología,</p></li><li class=\"fr-tag\"><p class=\"fr-tag\">Magister en Educación Universitaria en Ciencias de la Salud, con 11 años de   <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">experiencia en distintas Clínicas Odontológicas del sector privado y en el Servicio de </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Sanidad Dental de Carabineros de Chile, ejerciendo funciones clínicas, administrativas, </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">de coordinación y jefatura. </span></p></li></ul><ul class=\"fr-tag\"><li class=\"fr-tag\"><p class=\"fr-tag\">Actualmente, docente con 4 años de experiencia en la <span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Facultad de Odontología de la Universidad San Sebastián sede Santiago, como docente </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">instructor de la asignatura de Clínica Integral del Adulto I y II, docente de distintas </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">asignaturas y laboratorios de ciencias básicas y docente del Postgrado de </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Rehabilitación Oral de Universidad San Sebastián.  </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">Participación en distintas actividades </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">de Vinculación con el Medio. Motivación al logro de objetivos y resultados. Gran </span><span style=\"font-family: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;\">capacidad de trabajo en equipo.</span></p></li></ul><p class=\"fr-tag\"><br></p>',2,13),(27,'Dra. Paula Silva',1,14),(28,'',2,14),(29,'Dra. Pamela Farfán',1,15),(30,'',2,15),(35,'Dra. María Hortencia Maldonado',1,18),(36,'<ul style=\"box-sizing: content-box; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: medium; font-family: aller_lightregular; padding-left: 25px; list-style-type: disc;\" class=\"fr-tag\">  <li class=\"fr-tag\"><p class=\"fr-tag\">Médico Cirujano-Pediatra&nbsp;</p></li>  <li class=\"fr-tag\"><p class=\"fr-tag\">Puericultor-Nefrologo Infantil Control de Niños Sanos</p></li>  <li class=\"fr-tag\"><p class=\"fr-tag\">Enfermedades de la Infancia</p></li>  <li class=\"fr-tag\"><p class=\"fr-tag\">Especialista en Prevención, control y tratamiento de enfermedades agudas y crónicas Renales y de las vías urinarias</p></li></ul>',2,18);
/*!40000 ALTER TABLE `rel_ProductoInformacion_Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_Producto_Producto`
--

DROP TABLE IF EXISTS `rel_Producto_Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_Producto_Producto` (
  `idRel_Producto_Producto` int(11) NOT NULL,
  `idProducto_1` int(11) NOT NULL,
  `idProducto_2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_Producto_Producto`
--

LOCK TABLES `rel_Producto_Producto` WRITE;
/*!40000 ALTER TABLE `rel_Producto_Producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_Producto_Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_Producto_ProductoCategoria`
--

DROP TABLE IF EXISTS `rel_Producto_ProductoCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_Producto_ProductoCategoria` (
  `idrel_Producto_ProductoCategoria` int(7) NOT NULL AUTO_INCREMENT,
  `idProducto` int(7) NOT NULL,
  `idProductoCategoria` int(7) NOT NULL,
  PRIMARY KEY (`idrel_Producto_ProductoCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=281 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_Producto_ProductoCategoria`
--

LOCK TABLES `rel_Producto_ProductoCategoria` WRITE;
/*!40000 ALTER TABLE `rel_Producto_ProductoCategoria` DISABLE KEYS */;
INSERT INTO `rel_Producto_ProductoCategoria` VALUES (1,1,2),(2,2,2),(196,3,4),(85,4,5),(51,5,3),(52,6,3),(167,7,6),(88,8,7),(227,14,12),(279,10,15),(256,11,15),(242,15,11),(251,9,15),(278,10,10),(273,13,14),(269,12,17),(250,9,10),(272,13,11),(277,10,9),(249,9,9),(255,11,10),(267,18,2);
/*!40000 ALTER TABLE `rel_Producto_ProductoCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_Usuarios_UsuariosInformacion`
--

DROP TABLE IF EXISTS `rel_Usuarios_UsuariosInformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_Usuarios_UsuariosInformacion` (
  `idrel_Usuarios_UsuariosInformacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuariosInformacion` int(11) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`idrel_Usuarios_UsuariosInformacion`),
  KEY `fk_usuariosInformacionDetalle_Usuarios_idx` (`idUsuarios`),
  KEY `fk_usuariosInformacionDetalle_usuariosInformacion1_idx` (`idUsuariosInformacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_Usuarios_UsuariosInformacion`
--

LOCK TABLES `rel_Usuarios_UsuariosInformacion` WRITE;
/*!40000 ALTER TABLE `rel_Usuarios_UsuariosInformacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_Usuarios_UsuariosInformacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-14 13:06:09

