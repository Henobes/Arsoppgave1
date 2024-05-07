-- MySQL dump 10.13  Distrib 5.7.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: teknotoppen
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB

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
-- Table structure for table `kunde`
--

DROP TABLE IF EXISTS `kunde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunde` (
  `idKunde` int(11) NOT NULL AUTO_INCREMENT,
  `brukernavn` varchar(45) NOT NULL,
  `epost` varchar(45) NOT NULL,
  `leveringsadresse` varchar(45) NOT NULL,
  `passord` varchar(255) NOT NULL,
  `rolle` varchar(50) NOT NULL DEFAULT 'standard',
  PRIMARY KEY (`idKunde`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunde`
--

LOCK TABLES `kunde` WRITE;
/*!40000 ALTER TABLE `kunde` DISABLE KEYS */;
INSERT INTO `kunde` VALUES (1,'Henri','teknotoppen@gmail.com','kabelgata','12345','standard'),(27,'henri9','henri123@gmail.com','kuben','$2y$10$KLRuHQLPF3oKz4zq4aHYLOyGr9XNmRyQ1aESXryxq1Bv4YJ50vCWm','standard'),(29,'truls','12345678@gmail.com','smÃ¥lensgata','$2y$10$99s6pErtA6PAhz8J03OkbOYV25r.LzVWcSBGG7cafR1J/VLkDYy0e','standard'),(30,'Henri','henri123@gmail.com','kuben','$2y$10$ltp/.t9r0wlIWnmDeuch9OTvf6lQnn9nzwkgQyGf//CRVE.RuOBFC','standard'),(32,'Henri','henri123@gmail.com','kuben9','$2y$10$HZZVny8Q9MxkltE9BsWYIejO/GTmUUWz0NaxYDxBou6SJnZaJednu','administrator');
/*!40000 ALTER TABLE `kunde` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-07 12:53:56
