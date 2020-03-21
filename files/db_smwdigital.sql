-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: db_blog
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `idAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(100) NOT NULL,
  `emailAdm` varchar(50) NOT NULL,
  `senhaAdm` varchar(100) NOT NULL,
  `contatoAdm` varchar(20) NOT NULL,
  `acesso` varchar(30) NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_blog`
--

DROP TABLE IF EXISTS `tb_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_blog` (
  `idNot` int(11) NOT NULL AUTO_INCREMENT,
  `idcategory` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumo` varchar(255) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `nome_imagem` varchar(45) NOT NULL,
  `conteudo` mediumtext NOT NULL,
  `data_not` date NOT NULL,
  PRIMARY KEY (`idNot`),
  KEY `fk_category_idx` (`idcategory`),
  CONSTRAINT `fk_category` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_denuncia`
--

DROP TABLE IF EXISTS `tb_denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_denuncia` (
  `idDen` int(11) NOT NULL AUTO_INCREMENT,
  `idImovel` int(11) NOT NULL,
  `motivo` varchar(45) NOT NULL,
  PRIMARY KEY (`idDen`),
  KEY `fk_denuncia_idx` (`idImovel`),
  CONSTRAINT `fk_denuncia` FOREIGN KEY (`idImovel`) REFERENCES `tb_imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_foto`
--

DROP TABLE IF EXISTS `tb_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `tb_message`
--

DROP TABLE IF EXISTS `tb_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_message` (
  `idmsg` int(11) NOT NULL AUTO_INCREMENT,
  `nameMsg` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailMsg` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageDesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idmsg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'db_blog'
--
/*!50003 DROP PROCEDURE IF EXISTS `deletar_conta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`brenno`@`localhost` PROCEDURE `deletar_conta`(pIdUsu INT)
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`brenno`@`localhost` PROCEDURE `deletar_imovel`(pIdImovel INT)
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`brenno`@`localhost` PROCEDURE `inserir_usuario`(
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

-- Dump completed on 2020-03-21  9:38:25

INSERT INTO `tb_admin` (`nomeAdm`, `emailAdm`, `senhaAdm`, `contatoAdm`, `acesso`) VALUES ('Brenno Duarte de Lima', 'brenno.gnr@gmail.com', '$2y$10$s18Tk5Uk3il9KsLOjP60hOpdLDDpsiOCTRgDpRYCEPNvvqkhBznUy', '(88) 997286802', 'Administrador');
