-- MySQL dump 10.13  Distrib 8.0.17, for Linux (x86_64)
--
-- Host: localhost    Database: db_alugue
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

CREATE DATABASE db_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_blog;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_feed`
--

DROP TABLE IF EXISTS `tb_feed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_feed` (
  `idFeed` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFeed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_feed`
--

LOCK TABLES `tb_feed` WRITE;
/*!40000 ALTER TABLE `tb_feed` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_feed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_foto`
--

DROP TABLE IF EXISTS `tb_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_foto` (
  `idFoto` int(11) NOT NULL AUTO_INCREMENT,
  `idImovel` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `nomeFoto` varchar(200) NOT NULL,
  PRIMARY KEY (`idFoto`),
  KEY `fk_imovel2_idx` (`idImovel`),
  KEY `fk_usu_idx` (`idUsu`),
  CONSTRAINT `fk_imovel2` FOREIGN KEY (`idImovel`) REFERENCES `tb_imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usu` FOREIGN KEY (`idUsu`) REFERENCES `tb_usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_foto`
--

LOCK TABLES `tb_foto` WRITE;
/*!40000 ALTER TABLE `tb_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_imovel`
--

DROP TABLE IF EXISTS `tb_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_imovel` (
  `idImovel` int(11) NOT NULL AUTO_INCREMENT,
  `idUsu` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `numero` int(10) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` varchar(20) NOT NULL,
  PRIMARY KEY (`idImovel`),
  KEY `fk_usuario_idx` (`idUsu`),
  KEY `fk_cidade_idx` (`cidade`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsu`) REFERENCES `tb_usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imovel`
--

DROP TABLE IF EXISTS `tb_denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_denuncia` (
  `idDen` INT NOT NULL AUTO_INCREMENT,
  `idImovel` INT NOT NULL,
  `motivo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDen`),
  INDEX `fk_denuncia_idx` (`idImovel` ASC),
  CONSTRAINT `fk_denuncia` FOREIGN KEY (`idImovel`) REFERENCES `tb_imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tb_imovel` WRITE;
/*!40000 ALTER TABLE `tb_imovel` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `idUsu` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsu` varchar(100) NOT NULL,
  `reputacao` int(5) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `contato` varchar(20) NOT NULL,
  PRIMARY KEY (`idUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_admin` (
  `idAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAdm` VARCHAR(100) NOT NULL,
  `emailAdm` VARCHAR(50) NOT NULL,
  `senhaAdm` VARCHAR(100) NOT NULL,
  `contatoAdm` VARCHAR(20) NOT NULL,
  `acesso` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `tb_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_blog` (
  `idNot` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `resumo` VARCHAR(255) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  `imagem` VARCHAR(45) NOT NULL,
  `nome_imagem` VARCHAR(45) NOT NULL,
  `conteudo` TEXT(500) NOT NULL,
  `data_not` DATE NOT NULL,
  PRIMARY KEY (`idNot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_alugue'
--
/*!50003 DROP PROCEDURE IF EXISTS `deletar_conta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `deletar_conta`(pIdUsu INT)
BEGIN
	DELETE FROM tb_foto WHERE idUsu = pIdUsu;
    DELETE FROM tb_imovel WHERE idUsu = pIdUsu;
    DELETE FROM tb_usuario WHERE idUsu = pIdUsu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletar_imovel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `deletar_imovel`(pIdImovel INT)
BEGIN
	DELETE FROM tb_foto WHERE idImovel = pIdImovel;
    DELETE FROM tb_imovel WHERE idImovel = pIdImovel;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inserir_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `inserir_usuario`(
	pNomeUsu VARCHAR(100), 
	pContato VARCHAR(20), 
	pEmail VARCHAR(100), 
	pSenha VARCHAR(100)
)
BEGIN
	DECLARE pIdUsu INT;
	INSERT INTO tb_usuario (nomeUsu, reputacao, email, senha) 
	VALUES (pNomeUsu, reputacao, pEmail, pSenha);
    SET pIdUsu = last_insert_id();
    INSERT INTO tb_contato (idUsu, contato) VALUES (pIdUsu, pContato);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-06 10:08:23

INSERT INTO `tb_usuario` (`nomeUsu`, `reputacao`, `email`, `senha`, `contato`) VALUES ('Imóveis avista', '0', 'imoveisavista@gmail.com', '$2y$10$JkhXfE2Lqwd5dmQgWmx9VegWU.3IPzqlgnezS2T4TfVEC6xyWox5a', '(88) 997286802');

INSERT INTO `tb_admin` (`nomeAdm`, `emailAdm`, `senhaAdm`, `contatoAdm`, `acesso`) VALUES ('Brenno Duarte de Lima', 'brenno.gnr@gmail.com', '$2y$10$s18Tk5Uk3il9KsLOjP60hOpdLDDpsiOCTRgDpRYCEPNvvqkhBznUy', '(88) 997286802', 'Administrador');
