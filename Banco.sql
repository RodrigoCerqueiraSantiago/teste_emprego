-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: teste_emprego
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `devedores`
--

DROP TABLE IF EXISTS `devedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `devedores` (
  `id_devedor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `cpf_cnpj` int DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `endereco` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_devedor`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devedores`
--

LOCK TABLES `devedores` WRITE;
/*!40000 ALTER TABLE `devedores` DISABLE KEYS */;
INSERT INTO `devedores` VALUES (1,'RODRIGO CERQUEIRA SANTIAGO  ',232,'2021-10-13','Rua Ibaiti 134, Caxias','2021-08-10 03:23:55'),(20,'Danielle Fernandes Santiago',12374674,'2021-10-29','Rua Wilson Natalino','2021-10-08 03:30:20'),(5,'Romário Silva',2147483647,'1977-03-10','Rua bariri olario rj','2021-05-10 21:10:06'),(7,'João Mendes',978763524,'1945-03-10','Rua sei lá 171 irajá rj','2021-06-10 13:10:19'),(17,'Sérgio cabral',2147483647,'2171-02-10','Rua Bangú 01, n. 171','2021-10-08 01:49:57'),(18,'Silva Mattos',670632,'1965-10-14','Rua Padre 23, n. 56 irajá','2021-10-08 02:28:59');
/*!40000 ALTER TABLE `devedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dividas`
--

DROP TABLE IF EXISTS `dividas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dividas` (
  `id_divida` int NOT NULL AUTO_INCREMENT,
  `fk_devedor` int DEFAULT NULL,
  `descricao_titulo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_divida`),
  KEY `fk_devedor` (`fk_devedor`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dividas`
--

LOCK TABLES `dividas` WRITE;
/*!40000 ALTER TABLE `dividas` DISABLE KEYS */;
INSERT INTO `dividas` VALUES (1,1,'Empréstimo',10.89,'2021-10-06',NULL),(2,1,'Comida',34.76,'2021-10-03',NULL),(3,5,'Fruta',23.77,'2021-07-02',NULL),(4,5,'Empréstimo',23.99,'2020-08-05',NULL),(5,5,'Empréstimo',14.98,'2019-09-10',NULL),(7,1,'teste',34,'2021-10-20','2021-10-08 12:47:14'),(8,1,'Cadastro dívida final antes entrega',23,'2021-11-23','2021-10-08 12:47:55');
/*!40000 ALTER TABLE `dividas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-08 10:41:03
