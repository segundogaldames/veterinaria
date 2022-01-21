-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: veterinaria
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rut` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `comuna_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'16800356-0','Monica Sanchez Torres','monica.sanchez@miempresa.cl','Los Alamos 157',4,'2021-12-27 21:03:45','2021-12-27 21:51:43'),(2,'18963789-6','Javiera Lara Pardo','jlarap@gmail.com','Bernardo O\'higgins 2356',4,'2022-01-19 01:38:55','2022-01-19 01:38:55');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunas`
--

DROP TABLE IF EXISTS `comunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comunas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `region_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunas`
--

LOCK TABLES `comunas` WRITE;
/*!40000 ALTER TABLE `comunas` DISABLE KEYS */;
INSERT INTO `comunas` VALUES (1,'Temuco',2,'2021-11-20 17:06:32','2021-11-20 17:06:32'),(2,'Concepción',3,'2021-11-20 17:06:32','2021-11-20 17:37:36'),(3,'San Miguel',1,'2021-11-20 17:06:32','2021-11-20 17:06:32'),(4,'Recoleta',1,'2021-11-20 17:06:32','2021-11-20 17:06:32'),(5,'Paine',1,'2021-11-20 17:35:24','2021-11-20 17:35:57');
/*!40000 ALTER TABLE `comunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_rol`
--

DROP TABLE IF EXISTS `funcionario_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario_rol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `funcionario_id` int NOT NULL,
  `rol_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_rol`
--

LOCK TABLES `funcionario_rol` WRITE;
/*!40000 ALTER TABLE `funcionario_rol` DISABLE KEYS */;
INSERT INTO `funcionario_rol` VALUES (2,1,2,'2021-11-29 20:43:18','2021-11-29 21:37:37'),(4,1,1,'2021-12-13 19:40:43','2021-12-13 19:40:43'),(5,3,3,'2021-12-13 20:08:12','2021-12-13 20:08:12'),(6,4,3,'2021-12-18 15:54:30','2021-12-18 15:54:30'),(8,4,2,'2021-12-18 16:05:06','2021-12-18 16:05:06');
/*!40000 ALTER TABLE `funcionario_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rut` varchar(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `comuna_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'16800356-9','Gabriela Nuñez Espinoza','gabriela.nunez@hotmail.com','San Martin 3345',1,'2021-11-22 21:27:08','2021-11-27 17:09:21'),(2,'1232561-4','Juan Perez Cotapos','jperez.c@gmail.com','Las Garzas 3365',1,'2021-12-06 20:36:36','2021-12-06 20:36:36'),(3,'1232561-4','Javiera Fernanda Gonzalez Fuentes','jgonzalez@gmail.com','Los alerces 0023',1,'2021-12-13 20:04:13','2021-12-13 20:04:13'),(4,'18792304-2','Raul Mora Jimenez','raul.mora@aiep.cl','Ohiggins 1014',3,'2021-12-18 15:51:41','2021-12-18 15:51:41');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_tipos`
--

DROP TABLE IF EXISTS `paciente_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente_tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `exotico` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_tipos`
--

LOCK TABLES `paciente_tipos` WRITE;
/*!40000 ALTER TABLE `paciente_tipos` DISABLE KEYS */;
INSERT INTO `paciente_tipos` VALUES (1,'Perro',2,'2022-01-05 23:07:40','2022-01-05 23:27:05'),(2,'Gato',2,'2022-01-10 19:50:58','2022-01-10 19:52:01'),(3,'Tortuga de tierra',1,'2022-01-10 19:51:22','2022-01-10 19:51:22');
/*!40000 ALTER TABLE `paciente_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `codigo_chip` varchar(255) DEFAULT NULL,
  `edad` int NOT NULL,
  `tamanio` int NOT NULL,
  `peso` decimal(8,6) NOT NULL,
  `paciente_tipo_id` int NOT NULL,
  `cliente_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Coco','',3,2,0.000000,1,1,'2022-01-10 21:14:01','2022-01-10 21:14:01'),(2,'Minino','',2,1,3.750000,2,1,'2022-01-10 21:15:13','2022-01-10 23:43:09'),(3,'Lucas','',1,1,1.560000,2,1,'2022-01-10 23:04:14','2022-01-10 23:04:14'),(4,'Rayita','',3,1,2.800000,2,2,'2022-01-19 01:40:28','2022-01-19 01:40:28');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regiones`
--

DROP TABLE IF EXISTS `regiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regiones`
--

LOCK TABLES `regiones` WRITE;
/*!40000 ALTER TABLE `regiones` DISABLE KEYS */;
INSERT INTO `regiones` VALUES (1,'Metropolitana de Santiago','2021-11-20 17:07:34','2021-11-20 17:07:34'),(2,'De la Araucania','2021-11-20 17:07:34','2021-11-20 17:07:34'),(3,'Del Biobio','2021-11-20 17:07:34','2021-11-20 17:07:34'),(4,'Del Maule','2021-11-20 16:34:44','2021-11-20 17:38:03');
/*!40000 ALTER TABLE `regiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador(a)','2021-11-27 17:34:45','2021-11-29 21:38:18'),(2,'Supervisor(a)','2021-11-29 20:13:58','2021-11-29 21:38:38'),(3,'Veterinario(a)','2021-11-29 20:14:20','2021-11-29 21:38:52');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_tipos`
--

DROP TABLE IF EXISTS `servicio_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicio_tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_tipos`
--

LOCK TABLES `servicio_tipos` WRITE;
/*!40000 ALTER TABLE `servicio_tipos` DISABLE KEYS */;
INSERT INTO `servicio_tipos` VALUES (1,'Cirugia','2022-01-18 23:59:55','2022-01-18 23:59:55'),(2,'Vacunas','2022-01-19 00:00:46','2022-01-19 00:00:46'),(3,'Esterilizaciones','2022-01-19 00:01:10','2022-01-19 00:05:20'),(4,'Examen de rutina','2022-01-21 18:44:10','2022-01-21 18:44:10');
/*!40000 ALTER TABLE `servicio_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `precio` int NOT NULL,
  `urgencia` int NOT NULL,
  `paciente_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `servicio_tipo_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Vacunacion de rutina',10000,2,4,1,2,'2022-01-21 17:14:12','2022-01-21 17:14:12'),(2,'Examen de rutina para verificar presencia de parasitos',15000,2,4,4,4,'2022-01-21 18:31:17','2022-01-21 18:44:38');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `movil` int NOT NULL,
  `telefonoable_id` int NOT NULL,
  `telefonoable_type` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonos`
--

LOCK TABLES `telefonos` WRITE;
/*!40000 ALTER TABLE `telefonos` DISABLE KEYS */;
INSERT INTO `telefonos` VALUES (1,956874563,1,1,'Funcionario','2021-12-13 22:11:55','2021-12-13 22:11:55'),(5,885645783,1,1,'Cliente','2021-12-27 22:30:49','2021-12-27 22:30:49'),(6,968743629,1,2,'Cliente','2022-01-19 01:39:40','2022-01-19 01:39:40');
/*!40000 ALTER TABLE `telefonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `activo` int NOT NULL,
  `funcionario_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'163bb9b6ef44ff46d9718d0e842dd7502e96030b',1,1,'2021-12-06 20:21:05','2021-12-11 17:28:36'),(2,'63aa9f5a93688fd219c1fb6a41a456019dd58378',1,2,'2021-12-13 20:02:50','2021-12-13 20:02:50'),(3,'63aa9f5a93688fd219c1fb6a41a456019dd58378',1,3,'2021-12-13 20:08:28','2021-12-20 20:38:00'),(4,'e1cdf89f35036e5d46e6ebe7af940f1a30cc7e60',1,4,'2022-01-21 18:28:23','2022-01-21 18:28:23');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `usuario_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (2,'Video de prueba 2','<iframe width=\"729\" height=\"410\" src=\"https://www.youtube.com/embed/3QUknuUj3xs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-03 19:06:50','2022-01-03 19:06:50'),(3,'Valores del Manifiesto Agil','<iframe width=\"547\" height=\"410\" src=\"https://www.youtube.com/embed/D3ME3l49rYE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-03 19:30:01','2022-01-03 19:30:01'),(4,'Proyecto Veterinaria - Video 1','<iframe width=\"849\" height=\"410\" src=\"https://www.youtube.com/embed/5Qr6iKdRChg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-04 00:00:17','2022-01-04 00:00:17'),(5,'Proyecto Veterinaria - Video 2','<iframe width=\"638\" height=\"360\" src=\"https://www.youtube.com/embed/odwExXnppI8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-06 18:13:23','2022-01-06 18:13:23'),(6,'Creacion de Pacientes - Parte 1','<iframe width=\"723\" height=\"349\" src=\"https://www.youtube.com/embed/7Pj4T6283jU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-11 17:24:35','2022-01-11 17:24:35'),(7,'Creacion de Pacientes - Parte 2','<iframe width=\"721\" height=\"349\" src=\"https://www.youtube.com/embed/F6TbkIaNAq8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-11 17:25:56','2022-01-11 17:25:56'),(8,'CRUD de Servicios Tipos','<iframe width=\"785\" height=\"380\" src=\"https://www.youtube.com/embed/4YhASsivSaE?list=PLe08SOA6_zN0QeJhXs5B5G9_TbyM7HoqD\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-19 02:39:23','2022-01-19 02:40:11'),(9,'Buscador de clientes por RUT','<iframe width=\"785\" height=\"380\" src=\"https://www.youtube.com/embed/s2X5_82A4zI?list=PLe08SOA6_zN0QeJhXs5B5G9_TbyM7HoqD\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-19 02:43:58','2022-01-19 02:43:58'),(10,'Creación de Servicios a partir del id de un paciente','<iframe width=\"849\" height=\"410\" src=\"https://www.youtube.com/embed/G3-uIsRSRYo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-21 19:50:31','2022-01-21 19:50:31'),(11,'Vista y edicion de un servicio','<iframe width=\"849\" height=\"410\" src=\"https://www.youtube.com/embed/i44shE7vMPg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',1,'2022-01-21 19:51:18','2022-01-21 19:51:18');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-21 19:51:58
