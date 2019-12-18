-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: db_store
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `idsistema` int(11) DEFAULT NULL,
  `nomeFoto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfoto`),
  KEY `fk_sistemas_idx` (`idsistema`),
  CONSTRAINT `fk_sistemas` FOREIGN KEY (`idsistema`) REFERENCES `sistemas` (`idsistema`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (1,1,'clinicalsys.webp'),(2,1,'clinicalsys2.webp'),(3,2,'fecad.webp'),(4,2,'fecad2.webp'),(5,3,'controlvce2.webp'),(6,3,'controlvce3.webp'),(7,3,'controlvce.webp'),(8,1,'clinicalsys3.webp'),(9,4,'sysservicos.webp'),(10,4,'sysservicos2.webp'),(11,4,'sysservicos3.webp'),(12,5,'librarysb.webp'),(13,5,'librarysb2.webp'),(14,5,'librarysb3.webp'),(15,2,'fecad3.webp');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagens` (
  `idMsg` int(11) NOT NULL AUTO_INCREMENT,
  `nomeMsg` varchar(45) NOT NULL,
  `emailMsg` varchar(45) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`idMsg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistemas`
--

DROP TABLE IF EXISTS `sistemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistemas` (
  `idsistema` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(10) DEFAULT NULL,
  `demo` varchar(100) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `iframe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idsistema`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistemas`
--

LOCK TABLES `sistemas` WRITE;
/*!40000 ALTER TABLE `sistemas` DISABLE KEYS */;
INSERT INTO `sistemas` VALUES (1,'ClinicalSys','Sistema de consultório médico','clinicalsys.webp','Sistema de consultório médico e marcação de exames, com cadastro de pacientes, médicos, secretárias, convênios e administradores e emissão de relatórios.','1200','http://pag.ae/7VxKd7LB2','Sistema web','<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TR8V2eISRY4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),(2,'FECAD','Sistema de contratos administrativos','fecad.webp','Sistema de contratos administrativos e aditivos contratuais.','850','http://pag.ae/7VxKf-vHP','Sistema web','<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YoWHnH5oFfc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),(3,'ControlVCE','Sistema web','controlvce.webp','Sistema de vendas, controle de estoque, fluxo de caixa e emissão de relatórios mensais.','700','http://pag.ae/7VxKgvren','Sistema web',NULL),(4,'SysServicos','Sistem de ordem de serviço','sysservicos.webp','Sistema de ordem de serviço.','500','http://pag.ae/7VxKg-A9t','Sistema web',NULL),(5,'LibrarySB','Sistema para biblioteca','librarysb.webp','Sistema para biblioteca, com cadastro de empréstimos, livros e clientes.','200','https://pag.ae/7VxKkQ5Vu','Sistema desktop',NULL);
/*!40000 ALTER TABLE `sistemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_store'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-17 16:33:31
