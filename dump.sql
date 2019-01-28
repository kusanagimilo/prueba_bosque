-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: sagrada_familia
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `numero_documento` int(100) DEFAULT NULL,
  `ciudad_residencia` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (3,'Juan Camilo','Cruz Franco','C.C',1019075739,'BOGOTA','CALLE 1234','3006163077'),(4,'Diego','Cruz','C.C',39681900,'BOGOTA','calle 1234','6975575'),(5,'MARIA CECILIA','FRANCO','C.C',396819003,'CALI','CALLE 123456','3006164897');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_tratamiento`
--

DROP TABLE IF EXISTS `paciente_tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_tratamiento` (
  `idpaciente_tratamiento` int(11) NOT NULL AUTO_INCREMENT,
  `idtratamiento` int(11) DEFAULT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpaciente_tratamiento`),
  KEY `fk_paciente_idx` (`idpaciente`),
  KEY `fk_tratamiento_idx` (`idtratamiento`),
  CONSTRAINT `fk_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tratamiento` FOREIGN KEY (`idtratamiento`) REFERENCES `tratamiento` (`idtratamiento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_tratamiento`
--

LOCK TABLES `paciente_tratamiento` WRITE;
/*!40000 ALTER TABLE `paciente_tratamiento` DISABLE KEYS */;
INSERT INTO `paciente_tratamiento` VALUES (4,1,5,48738.6,'2019-01-28 06:06:59'),(5,3,5,76239,'2019-01-28 06:06:59'),(6,4,5,399.6,'2019-01-28 06:07:16'),(7,5,5,5147,'2019-01-28 06:07:43'),(8,2,3,500000,'2019-01-28 06:08:51'),(9,5,3,5147,'2019-01-28 06:21:32');
/*!40000 ALTER TABLE `paciente_tratamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tratamiento` (
  `idtratamiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tratamiento` varchar(100) DEFAULT NULL,
  `valor_tratamiento` double DEFAULT NULL,
  `descuento` tinyint(4) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtratamiento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamiento`
--

LOCK TABLES `tratamiento` WRITE;
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
INSERT INTO `tratamiento` VALUES (1,'camilo',54154,1,1),(2,'PRUEBA',500000,1,1),(3,'ORUEBA 2',84710,1,1),(4,'Quimioterapia',444,1,1),(5,'EJEMPLO',5147,0,1),(6,'Fisioterapia',3000000,0,1),(7,'NUEVO TRATAMIENTO 1',3456223,1,0);
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-28  2:49:56
