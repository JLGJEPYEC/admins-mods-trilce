-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: trilce
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `dni` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `appaterno` varchar(70) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `apmaterno` varchar(70) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email_personal` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `telefono` int NOT NULL,
  `tipo_personal` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `admin_mod` int DEFAULT NULL,
  `sueldo` int NOT NULL,
  `banco` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `distrito_res` varchar(30) COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_user_admin_mod_idx` (`admin_mod`),
  CONSTRAINT `fk_user_admin_mod` FOREIGN KEY (`admin_mod`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (70010001,'Abigail Marife','Montes','Yngar','solentauro@gmail.com',900500123,'profesor',NULL,2500,'bcp','surco'),(70010002,'Alvaro','Espiritu','Inga','bachatero@outlook.com',999333666,'profesor',NULL,2500,'scotiabank','los olivos'),(70010003,'Pedro','Muñante','Loayza','filosofia@outlook.com',999333641,'profesor',NULL,2500,'interbank','san miguel'),(70010004,'Angelo Jesus','Davalos','Salvador','ventadecomics@hotmail.com',999323641,'profesor',NULL,2500,'bcp','madgalena'),(70010005,'Jaqueline Michelle','Flores','Echegaray','monbelle@hotmail.com',999323622,'profesor',NULL,3000,'bcp','pueblo libre'),(70042001,'Gustavo','Moreno','tito','titex@hotmail.com',903313501,'orientador',NULL,3500,'bcp','smp'),(70042002,'Adrian','Lazaro','Llacua','elfrio@hotmail.com',903313502,'tutor',NULL,2000,'bcp','rimac'),(70042003,'Camila','Ramos','Estrada','camlyr@hotmail.com',903313503,'tutor',NULL,2000,'bcp','rimac'),(70042004,'Frank','Herrera','Ramirez','frankmartin@hotmail.com',903313504,'orientador',NULL,3500,'interbank','lince'),(71000001,'marlon','reynoso','salazar','mrs@gmail.com',912555666,'administrador financiero',1,6000,'bcp','smp'),(71000004,'mauricio','haro','pinedo','mau@gmail.com',912555665,'supervisor',2,4000,'scotiabank','san borja'),(71000008,'walter','arauco','vera','walter_arauco@gmail.com',912555664,'supervisor',3,4000,'interbank','ate vitarte'),(72000001,'marco','forton','ochoa','f_o@hotmail.com',912555663,'supervisor',4,4000,'bcp','vmt'),(72000009,'luis','ninalaya','santiago','luis@outlook.com',912555662,'supervisor',5,4000,'bcp','ate vitarte'),(72030200,'Juan Lorenzo','Gutierrez','Jorgechagua','jolo@yahoo.com',900444123,'director',6,7000,'interbank','lince');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relacion_personal_sede`
--

DROP TABLE IF EXISTS `relacion_personal_sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relacion_personal_sede` (
  `id_rps` int NOT NULL AUTO_INCREMENT,
  `personal_id` int NOT NULL,
  `local_id` int NOT NULL,
  PRIMARY KEY (`id_rps`),
  KEY `fk_rps_personal` (`personal_id`),
  KEY `fk_rps_sede` (`local_id`),
  CONSTRAINT `fk_rps_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`dni`),
  CONSTRAINT `fk_rps_sede` FOREIGN KEY (`local_id`) REFERENCES `sede` (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacion_personal_sede`
--

LOCK TABLES `relacion_personal_sede` WRITE;
/*!40000 ALTER TABLE `relacion_personal_sede` DISABLE KEYS */;
INSERT INTO `relacion_personal_sede` VALUES (19,70010002,4),(20,71000001,4),(21,70042003,4),(22,72030200,2),(23,71000004,2),(24,70042004,2);
/*!40000 ALTER TABLE `relacion_personal_sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sede` (
  `id_sede` int NOT NULL AUTO_INCREMENT,
  `nombre_sede` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `distrito` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (1,'salaverry','av cuba c alm guisse','jesus maria'),(2,'salaverry 5to secundatia','av arequipa 1390','cercado de lima'),(3,'roma','calle emilio fernandez','cercado de lima'),(4,'los olivos','av tomas valle 845','san martin de porres'),(5,'salamanca','paracas 692','ate vitarte'),(6,'pro','panamericana norte km 23.5','los olivos'),(7,'marzano primaria','av caminos del inca y av andres tinoco','surco'),(8,'marzano secundaria','panamericana sur con tomas marzano','surco'),(9,'trilce chorrillos','alameda los horizontes','chorrillos'),(10,'callao','av saenz peña 1115','callao'),(11,'villa el salvador','av magisterio y av cesar vallejo','villa el salvador'),(12,'breña','jr zorritos 159','breña');
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `personal_dni` int NOT NULL,
  `pass` varchar(15) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email_generado` varchar(100) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `personal_admin_mod` varchar(45) COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personal_idx` (`personal_dni`),
  CONSTRAINT `fk_personal` FOREIGN KEY (`personal_dni`) REFERENCES `personal` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,71000001,'1234','marlon@trilce.com','admin'),(2,71000004,'1234','mauricio@trilce.com','mod'),(3,71000008,'5555','walter@trilce.com','mod'),(4,72000001,'1234','marco@trilce.com','mod'),(5,72000009,'6963','ninalaya@trilce.com','mod'),(6,72030200,'1234','juan@trilce.com','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'trilce'
--

--
-- Dumping routines for database 'trilce'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-17 10:26:23
