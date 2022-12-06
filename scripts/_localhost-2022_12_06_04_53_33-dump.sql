-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: hospital_buenos_ingenieros
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB-log

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
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `fecha_genero` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `atendido` tinyint(4) DEFAULT 0,
  `despachada` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_cita_id_paciente_idx` (`id_paciente`),
  CONSTRAINT `fk_cita_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` (`id`, `id_paciente`, `motivo`, `fecha_cita`, `fecha_genero`, `estado`, `atendido`, `despachada`) VALUES (17,11,'Chequeo general','2022-12-06','2022-12-07',1,1,0),(18,11,'Chequeo dos','2022-06-06','2022-12-07',1,1,0),(19,11,'tercera cita','2022-07-12','2022-12-07',1,1,0);
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medicamento` int(11) DEFAULT NULL,
  `id_presentacion` int(11) DEFAULT NULL,
  `id_usuario_grabo` bigint(20) unsigned DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `lote` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_tipo_movimiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_i_id_medicamento_idx` (`id_medicamento`),
  KEY `fk_i_id_presentacion_idx` (`id_presentacion`),
  KEY `fk_i_usuario_grabo` (`id_usuario_grabo`),
  KEY `fk_i_tipo_movimiento_idx` (`id_tipo_movimiento`),
  CONSTRAINT `fk_i_id_medicamento` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_i_id_presentacion` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_i_tipo_movimiento` FOREIGN KEY (`id_tipo_movimiento`) REFERENCES `tipo_movimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_i_usuario_grabo` FOREIGN KEY (`id_usuario_grabo`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`id`, `id_medicamento`, `id_presentacion`, `id_usuario_grabo`, `fecha_ingreso`, `fecha_vencimiento`, `lote`, `total`, `observaciones`, `id_tipo_movimiento`) VALUES (20,10,4,1,'2022-12-07','2023-12-12','ABC123','50',NULL,1),(21,10,4,1,'2022-12-07','2023-01-05','ABC6','45',NULL,1),(22,10,4,1,'2022-12-07','2023-12-12','ABC123','6',NULL,2),(23,10,4,1,'2022-12-07','2023-01-05','ABC6','2',NULL,2);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(18,0) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento`
--

LOCK TABLES `medicamento` WRITE;
/*!40000 ALTER TABLE `medicamento` DISABLE KEYS */;
INSERT INTO `medicamento` (`id`, `nombre`, `descripcion`, `precio`, `estado`) VALUES (10,'Desktetoprofeno','para aliviar el dolor',25,1);
/*!40000 ALTER TABLE `medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamento_presentacion`
--

DROP TABLE IF EXISTS `medicamento_presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamento_presentacion` (
  `id_medicamento` int(11) NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `precio` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id_medicamento`,`id_presentacion`),
  KEY `fk_mp_presentacion_idx` (`id_presentacion`),
  CONSTRAINT `fk_mp_medicamento` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mp_presentacion` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento_presentacion`
--

LOCK TABLES `medicamento_presentacion` WRITE;
/*!40000 ALTER TABLE `medicamento_presentacion` DISABLE KEYS */;
INSERT INTO `medicamento_presentacion` (`id_medicamento`, `id_presentacion`, `precio`) VALUES (10,4,25.00);
/*!40000 ALTER TABLE `medicamento_presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_12_04_144047_create_permission_tables',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1,'App\\User',2),(1,'App\\User',3),(1,'App\\User',4),(1,'App\\User',5),(1,'App\\User',6),(1,'App\\User',7),(2,'App\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `primer_nombre` varchar(45) DEFAULT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `primer_apellido` varchar(45) DEFAULT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `cui` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` (`id`, `nombres`, `apellidos`, `fecha_nacimiento`, `estado`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cui`) VALUES (11,'Edson Franzua','Andrez Gómez','1998-09-12',1,'Edson','Franzua','Andrez','Gómez','3188196511508');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orden_menu` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `icon` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `orden_menu`, `id_menu`, `icon`, `display_name`, `status`) VALUES (1,'crear','web',NULL,NULL,0,1,'fa-solid fa-plus','Crear',1),(2,'editar','web',NULL,NULL,0,1,'fa-solid fa-plus','Editar',1),(3,'eliminar','web',NULL,NULL,0,1,'fa-solid fa-plus','Eliminar',1),(4,'permisos','web',NULL,NULL,1,0,'fa-solid fa-plus','Permisos',1),(5,'registro','web',NULL,NULL,2,0,'fa-solid fa-plus','Registro',1),(6,'paciente','web',NULL,NULL,0,2,'fa-solid fa-plus','Paciente',1),(7,'servicio','web',NULL,NULL,3,0,'fa-solid fa-plus','Servicio',1),(8,'cita','web',NULL,NULL,0,3,'fa-solid fa-plus','Cita',1),(9,'farmacia','web',NULL,NULL,4,0,'fa-solid fa-plus','Farmacia',1),(10,'inventario','web',NULL,NULL,0,4,'fa-solid fa-plus','Inventario',1),(11,'medicamento','web',NULL,NULL,0,2,'fa-solid fa-plus','Medicamento',1),(12,'presentacion','web',NULL,NULL,0,2,'fa-solid fa-plus','Presentación',1),(13,'personal','web',NULL,NULL,5,0,'fa-solid fa-plus','Personal',1),(14,'empleado','web',NULL,NULL,0,5,'fa-solid fa-plus','Personal - Empleado',1),(15,'tipo-personal','web',NULL,NULL,0,5,'fa-solid fa-plus','Tipo Personal',1);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `presentacion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` (`id`, `presentacion`, `estado`) VALUES (4,'Pastilla',1),(5,'Tableta',1),(6,'Blister',1);
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receta_det`
--

DROP TABLE IF EXISTS `receta_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receta_enc` int(11) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL,
  `id_presentacion` int(11) DEFAULT NULL,
  `indicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rec_det_id_receta_idx` (`id_receta_enc`),
  KEY `fk_rec_det_id_medicamento_idx` (`id_medicamento`),
  KEY `fk_rec_det_id_presentacion_idx` (`id_presentacion`),
  CONSTRAINT `fk_rec_det_id_medicamento` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rec_det_id_presentacion` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rec_det_id_receta` FOREIGN KEY (`id_receta_enc`) REFERENCES `receta_enc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta_det`
--

LOCK TABLES `receta_det` WRITE;
/*!40000 ALTER TABLE `receta_det` DISABLE KEYS */;
INSERT INTO `receta_det` (`id`, `id_receta_enc`, `id_medicamento`, `id_presentacion`, `indicacion`) VALUES (19,21,10,4,'tomar cada 8 horas'),(20,22,10,4,'cada 8 horas'),(21,23,10,4,'seguir tom,ando cada 8');
/*!40000 ALTER TABLE `receta_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receta_enc`
--

DROP TABLE IF EXISTS `receta_enc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta_enc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) DEFAULT NULL,
  `id_doctor` bigint(20) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `atendido` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_re_id_cita_idx` (`id_cita`),
  KEY `fk_re_id_doctor_idx` (`id_doctor`),
  CONSTRAINT `fk_re_id_cita` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_re_id_doctor` FOREIGN KEY (`id_doctor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta_enc`
--

LOCK TABLES `receta_enc` WRITE;
/*!40000 ALTER TABLE `receta_enc` DISABLE KEYS */;
INSERT INTO `receta_enc` (`id`, `id_cita`, `id_doctor`, `fecha`, `diagnostico`, `atendido`) VALUES (21,17,1,'2022-12-07','dolor de espalda',0),(22,18,1,'2022-12-07','persiste el dolor de espalda',0),(23,19,1,'2022-12-07','persiste el dolor',0);
/*!40000 ALTER TABLE `receta_enc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1,1),(1,2),(2,4),(4,1),(4,2),(4,3),(4,4);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `status`) VALUES (1,'Doctor','web','2022-12-04 21:30:59','2022-12-04 22:16:34',1),(2,'Enfermero(a)','web','2022-12-04 21:32:20','2022-12-04 22:17:36',1),(3,'RRHH','web','2022-12-04 21:50:54','2022-12-04 21:50:54',1),(4,'Intendencia','web','2022-12-04 22:04:00','2022-12-04 22:17:35',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_movimiento`
--

DROP TABLE IF EXISTS `tipo_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  `factor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_movimiento`
--

LOCK TABLES `tipo_movimiento` WRITE;
/*!40000 ALTER TABLE `tipo_movimiento` DISABLE KEYS */;
INSERT INTO `tipo_movimiento` (`id`, `tipo`, `factor`) VALUES (1,'Ingreso',1),(2,'Salida',-1);
/*!40000 ALTER TABLE `tipo_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nombres`, `apellidos`, `estado`) VALUES (1,'test','test@gmail.com',NULL,'$2y$10$UH8YcbXPI2KYdvKLi4b5ueiM1qkdiwEQ.ryy0xacsT/fTGW6dRp4y',NULL,'2022-12-04 20:31:15','2022-12-04 17:21:02','test','test',0),(2,'edson','eandrez@outlook.es',NULL,'$2y$10$1rFPlBqNmiARF7xKaolMxeO08ZucXGcffTQO8dgyWd2IxEryicIla',NULL,'2022-12-04 20:32:31','2022-12-06 16:07:48','Edson ','Andrez',0),(5,'admin','admin@gmail.com',NULL,'$2y$10$J1O08eBFkHYjMYtcJnBYPeY2W5wOrYP7P6FXfxo9p4enUIYcjRpNC',NULL,'2022-12-05 19:33:30','2022-12-07 16:16:11','Administrador','Administrador',0),(6,'edson.andrez@outlook.es','edson.andrez@outlook.es',NULL,'$2y$10$fbua6bymL2pKLi/SziL1MuRYh2DuxXRGJaK.W4hOz4pbkDnwu9gnO',NULL,'2022-12-07 09:49:39','2022-12-07 09:49:39','Edson','Andrez',1),(7,'andyg','andyg@hospital.com',NULL,'$2y$10$AkboNvhvQrGAWj4j/34BROMwPkrlIfSBhsuYgdNp5qksXRHXEbn9W',NULL,'2022-12-07 16:34:18','2022-12-07 16:34:18','Andy','Gomez',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_det`
--

DROP TABLE IF EXISTS `ventas_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enc` int(11) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL,
  `id_presentacion` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(18,2) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_det`
--

LOCK TABLES `ventas_det` WRITE;
/*!40000 ALTER TABLE `ventas_det` DISABLE KEYS */;
INSERT INTO `ventas_det` (`id`, `id_enc`, `id_medicamento`, `id_presentacion`, `cantidad`, `precio`, `total`) VALUES (13,16,10,4,6,25.00,150.00),(14,17,10,4,2,25.00,50.00);
/*!40000 ALTER TABLE `ventas_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_enc`
--

DROP TABLE IF EXISTS `ventas_enc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_enc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_receta` int(11) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_enc`
--

LOCK TABLES `ventas_enc` WRITE;
/*!40000 ALTER TABLE `ventas_enc` DISABLE KEYS */;
INSERT INTO `ventas_enc` (`id`, `fecha`, `id_paciente`, `id_receta`, `total`) VALUES (16,'2022-12-07 09:54:12',11,22,NULL),(17,'2022-12-07 09:59:39',11,23,50.00);
/*!40000 ALTER TABLE `ventas_enc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_cita`
--

DROP TABLE IF EXISTS `vw_cita`;
/*!50001 DROP VIEW IF EXISTS `vw_cita`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_cita` (
  `id` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `motivo` tinyint NOT NULL,
  `fecha_cita` tinyint NOT NULL,
  `fecha_genero` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `atendido` tinyint NOT NULL,
  `nombres` tinyint NOT NULL,
  `apellidos` tinyint NOT NULL,
  `tiene_receta` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_imprimir_receta`
--

DROP TABLE IF EXISTS `vw_imprimir_receta`;
/*!50001 DROP VIEW IF EXISTS `vw_imprimir_receta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_imprimir_receta` (
  `id_receta` tinyint NOT NULL,
  `id_cita` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `fecha_cita` tinyint NOT NULL,
  `motivo_cita` tinyint NOT NULL,
  `nombre_paciente` tinyint NOT NULL,
  `diagnostico` tinyint NOT NULL,
  `medicina` tinyint NOT NULL,
  `presentacion` tinyint NOT NULL,
  `indicaciones` tinyint NOT NULL,
  `doctor_atendio` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_inventario`
--

DROP TABLE IF EXISTS `vw_inventario`;
/*!50001 DROP VIEW IF EXISTS `vw_inventario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_inventario` (
  `id` tinyint NOT NULL,
  `id_medicamento` tinyint NOT NULL,
  `id_presentacion` tinyint NOT NULL,
  `id_usuario_grabo` tinyint NOT NULL,
  `fecha_ingreso` tinyint NOT NULL,
  `fecha_vencimiento` tinyint NOT NULL,
  `lote` tinyint NOT NULL,
  `total` tinyint NOT NULL,
  `observaciones` tinyint NOT NULL,
  `id_tipo_movimiento` tinyint NOT NULL,
  `medicamento` tinyint NOT NULL,
  `presentacion` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_cita`
--

/*!50001 DROP TABLE IF EXISTS `vw_cita`*/;
/*!50001 DROP VIEW IF EXISTS `vw_cita`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_cita` AS select `hospital_buenos_ingenieros`.`cita`.`id` AS `id`,`hospital_buenos_ingenieros`.`cita`.`id_paciente` AS `id_paciente`,`hospital_buenos_ingenieros`.`cita`.`motivo` AS `motivo`,`hospital_buenos_ingenieros`.`cita`.`fecha_cita` AS `fecha_cita`,`hospital_buenos_ingenieros`.`cita`.`fecha_genero` AS `fecha_genero`,`hospital_buenos_ingenieros`.`cita`.`estado` AS `estado`,`hospital_buenos_ingenieros`.`cita`.`atendido` AS `atendido`,`hospital_buenos_ingenieros`.`paciente`.`nombres` AS `nombres`,`hospital_buenos_ingenieros`.`paciente`.`apellidos` AS `apellidos`,ifnull(`receta_enc`.`tiene_receta`,0) AS `tiene_receta` from ((`hospital_buenos_ingenieros`.`cita` join `hospital_buenos_ingenieros`.`paciente` on(`hospital_buenos_ingenieros`.`paciente`.`id` = `hospital_buenos_ingenieros`.`cita`.`id_paciente`)) left join (select count(0) AS `tiene_receta`,`hospital_buenos_ingenieros`.`receta_enc`.`id_cita` AS `id_cita` from `hospital_buenos_ingenieros`.`receta_enc` group by `hospital_buenos_ingenieros`.`receta_enc`.`id_cita`) `receta_enc` on(`receta_enc`.`id_cita` = `hospital_buenos_ingenieros`.`cita`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_imprimir_receta`
--

/*!50001 DROP TABLE IF EXISTS `vw_imprimir_receta`*/;
/*!50001 DROP VIEW IF EXISTS `vw_imprimir_receta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_imprimir_receta` AS select `enc`.`id` AS `id_receta`,`cita`.`id` AS `id_cita`,`cita`.`id_paciente` AS `id_paciente`,date_format(`cita`.`fecha_cita`,'%d/%m/%Y') AS `fecha_cita`,`cita`.`motivo` AS `motivo_cita`,concat(`paciente`.`nombres`,' ',`paciente`.`apellidos`) AS `nombre_paciente`,`enc`.`diagnostico` AS `diagnostico`,`medicamento`.`nombre` AS `medicina`,`presentacion`.`presentacion` AS `presentacion`,`det`.`indicacion` AS `indicaciones`,concat(`doctor`.`nombres`,' ',`doctor`.`apellidos`) AS `doctor_atendio` from ((((((`receta_enc` `enc` join `receta_det` `det` on(`det`.`id_receta_enc` = `enc`.`id`)) join `medicamento` on(`medicamento`.`id` = `det`.`id_medicamento`)) join `presentacion` on(`presentacion`.`id` = `det`.`id_presentacion`)) join `users` `doctor` on(`doctor`.`id` = `enc`.`id_doctor`)) join `cita` on(`cita`.`id` = `enc`.`id_cita`)) join `paciente` on(`paciente`.`id` = `cita`.`id_paciente`)) order by `enc`.`id_cita` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_inventario`
--

/*!50001 DROP TABLE IF EXISTS `vw_inventario`*/;
/*!50001 DROP VIEW IF EXISTS `vw_inventario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_inventario` AS select `inv`.`id` AS `id`,`inv`.`id_medicamento` AS `id_medicamento`,`inv`.`id_presentacion` AS `id_presentacion`,`inv`.`id_usuario_grabo` AS `id_usuario_grabo`,`inv`.`fecha_ingreso` AS `fecha_ingreso`,`inv`.`fecha_vencimiento` AS `fecha_vencimiento`,`inv`.`lote` AS `lote`,sum(`inv`.`total` * `movimiento`.`factor`) AS `total`,`inv`.`observaciones` AS `observaciones`,`inv`.`id_tipo_movimiento` AS `id_tipo_movimiento`,`med`.`nombre` AS `medicamento`,`pres`.`presentacion` AS `presentacion` from (((`inventario` `inv` join `medicamento` `med` on(`med`.`id` = `inv`.`id_medicamento`)) join `presentacion` `pres` on(`pres`.`id` = `inv`.`id_presentacion`)) join `tipo_movimiento` `movimiento` on(`movimiento`.`id` = `inv`.`id_tipo_movimiento`)) group by `inv`.`id_medicamento`,`inv`.`id_presentacion`,`inv`.`lote` order by `inv`.`fecha_vencimiento` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-06  4:53:34
