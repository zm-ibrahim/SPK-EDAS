-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: spk_edas
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.22-MariaDB

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
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alternatif_un` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatif`
--

LOCK TABLES `alternatif` WRITE;
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
INSERT INTO `alternatif` VALUES (8,'S1','SMPN 23 Pekanbaru',''),(9,'S2','SMPN 6 Pekanbaru',''),(10,'S3','SMPN 34 Pekanbaru',''),(11,'S4','SMPN 27 Pekanbaru',''),(12,'S5','SMPIT Imam An Nawawi',''),(13,'S6','SMP Kartika',''),(14,'S7','SMPN 8 Pekanbaru',''),(15,'S8','SMPN Babussalam',''),(16,'S9','SMPN 37 Pekanbaru','');
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informasi_pengguna`
--

DROP TABLE IF EXISTS `informasi_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informasi_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informasi_pengguna`
--

LOCK TABLES `informasi_pengguna` WRITE;
/*!40000 ALTER TABLE `informasi_pengguna` DISABLE KEYS */;
INSERT INTO `informasi_pengguna` VALUES (-477762032,'user','user@gmail.com','$2y$10$XAXEEdnKv2f4S8yyXzhDrOmLSgH/laQuucNxSoelfVjml/kL4zDYO');
/*!40000 ALTER TABLE `informasi_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jarak_solusi_rata_rata`
--

DROP TABLE IF EXISTS `jarak_solusi_rata_rata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jarak_solusi_rata_rata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) DEFAULT NULL,
  `jarak` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alternatif` (`id_alternatif`),
  CONSTRAINT `jarak_solusi_rata_rata_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jarak_solusi_rata_rata`
--

LOCK TABLES `jarak_solusi_rata_rata` WRITE;
/*!40000 ALTER TABLE `jarak_solusi_rata_rata` DISABLE KEYS */;
/*!40000 ALTER TABLE `jarak_solusi_rata_rata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kriteria_un` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` VALUES (13,'K1','Koleksi',0.20,'','Cost'),(14,'K2','Sarana dan Prasarana Perpustakaan',0.15,'','Benefit'),(15,'K3','Pelayanan Perpustakaan',0.25,'','Benefit'),(16,'K4','Tenaga Perpustakaan',0.20,'','Benefit'),(17,'K5','Penyelenggaraan dan Pengelolaan Perpustakaan',0.15,'','Benefit'),(18,'K6','Penguat',0.05,'','Cost');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriks_evaluasi`
--

DROP TABLE IF EXISTS `matriks_evaluasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matriks_evaluasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_matriks_evaluasi_alternatif` (`id_alternatif`),
  KEY `fk_matriks_evaluasi_kriteria` (`id_kriteria`),
  CONSTRAINT `fk_matriks_evaluasi_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_matriks_evaluasi_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matriks_evaluasi_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`),
  CONSTRAINT `matriks_evaluasi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriks_evaluasi`
--

LOCK TABLES `matriks_evaluasi` WRITE;
/*!40000 ALTER TABLE `matriks_evaluasi` DISABLE KEYS */;
INSERT INTO `matriks_evaluasi` VALUES (28,8,13,95.00),(29,9,13,98.00),(30,10,13,97.00),(31,11,13,99.00),(32,12,13,99.00),(33,13,13,97.00),(34,14,13,99.00),(35,15,13,72.00),(36,16,13,74.00),(37,8,14,120.00),(38,9,14,128.00),(39,10,14,123.00),(40,11,14,135.00),(41,12,14,130.00),(42,13,14,132.00),(43,14,14,127.00),(44,15,14,97.00),(45,16,14,116.00),(46,8,15,63.00),(47,9,15,67.00),(48,10,15,65.00),(49,11,15,67.00),(50,12,15,62.00),(51,13,15,60.00),(52,14,15,63.00),(53,15,15,45.00),(54,16,15,47.00),(55,8,16,45.00),(56,9,16,41.00),(57,10,16,39.00),(58,11,16,43.00),(59,12,16,42.00),(60,13,16,40.00),(61,14,16,40.00),(62,15,16,25.00),(63,16,16,23.00),(64,8,17,43.00),(65,9,17,40.00),(66,10,17,45.00),(67,11,17,45.00),(68,12,17,44.00),(69,13,17,43.00),(70,14,17,44.00),(71,15,17,37.00),(72,16,17,34.00),(73,8,18,23.00),(74,9,18,23.00),(75,10,18,25.00),(76,11,18,24.00),(77,12,18,23.00),(78,13,18,23.00),(79,14,18,22.00),(80,15,18,14.00),(81,16,18,16.00);
/*!40000 ALTER TABLE `matriks_evaluasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `nsp_nsn`
--

DROP TABLE IF EXISTS `nsp_nsn`;
/*!50001 DROP VIEW IF EXISTS `nsp_nsn`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `nsp_nsn` AS SELECT 
 1 AS `id_alternatif`,
 1 AS `kode_alternatif`,
 1 AS `sp`,
 1 AS `sn`,
 1 AS `max_sp`,
 1 AS `nsp`,
 1 AS `max_sn`,
 1 AS `nsn`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pda_nda`
--

DROP TABLE IF EXISTS `pda_nda`;
/*!50001 DROP VIEW IF EXISTS `pda_nda`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pda_nda` AS SELECT 
 1 AS `id_alternatif`,
 1 AS `id_kriteria`,
 1 AS `jenis`,
 1 AS `kode_alternatif`,
 1 AS `kode_kriteria`,
 1 AS `nilai_alternatif`,
 1 AS `nilai_rata_rata`,
 1 AS `pda`,
 1 AS `nda`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `peringkat`
--

DROP TABLE IF EXISTS `peringkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peringkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alternatif` (`id_alternatif`),
  CONSTRAINT `peringkat_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peringkat`
--

LOCK TABLES `peringkat` WRITE;
/*!40000 ALTER TABLE `peringkat` DISABLE KEYS */;
/*!40000 ALTER TABLE `peringkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solusi_rata_rata`
--

DROP TABLE IF EXISTS `solusi_rata_rata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solusi_rata_rata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_rata_rata` decimal(5,2) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `solusi_rata_rata_un` (`id_kriteria`),
  CONSTRAINT `solusi_rata_rata_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solusi_rata_rata`
--

LOCK TABLES `solusi_rata_rata` WRITE;
/*!40000 ALTER TABLE `solusi_rata_rata` DISABLE KEYS */;
INSERT INTO `solusi_rata_rata` VALUES (120,92.22,13),(121,123.11,14),(122,59.89,15),(123,37.56,16),(124,41.67,17),(125,21.44,18);
/*!40000 ALTER TABLE `solusi_rata_rata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `sp_sn`
--

DROP TABLE IF EXISTS `sp_sn`;
/*!50001 DROP VIEW IF EXISTS `sp_sn`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sp_sn` AS SELECT 
 1 AS `id_alternatif`,
 1 AS `kode_alternatif`,
 1 AS `sp`,
 1 AS `sn`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_as`
--

DROP TABLE IF EXISTS `view_as`;
/*!50001 DROP VIEW IF EXISTS `view_as`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_as` AS SELECT 
 1 AS `id_alternatif`,
 1 AS `kode_alternatif`,
 1 AS `nilai_AS`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'spk_edas'
--

--
-- Final view structure for view `nsp_nsn`
--

/*!50001 DROP VIEW IF EXISTS `nsp_nsn`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nsp_nsn` AS select `sp_sn`.`id_alternatif` AS `id_alternatif`,`sp_sn`.`kode_alternatif` AS `kode_alternatif`,`sp_sn`.`sp` AS `sp`,`sp_sn`.`sn` AS `sn`,max(`sp_sn`.`sp`) over () AS `max_sp`,`sp_sn`.`sp` / max(`sp_sn`.`sp`) over () AS `nsp`,max(`sp_sn`.`sn`) over () AS `max_sn`,1 - `sp_sn`.`sn` / max(`sp_sn`.`sn`) over () AS `nsn` from `spk_edas`.`sp_sn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pda_nda`
--

/*!50001 DROP VIEW IF EXISTS `pda_nda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pda_nda` AS select `me`.`id_alternatif` AS `id_alternatif`,`me`.`id_kriteria` AS `id_kriteria`,`k`.`jenis` AS `jenis`,`a`.`kode` AS `kode_alternatif`,`k`.`kode` AS `kode_kriteria`,`me`.`nilai` AS `nilai_alternatif`,`av`.`nilai_rata_rata` AS `nilai_rata_rata`,case when `k`.`jenis` = 'Benefit' then greatest(0,(`me`.`nilai` - `av`.`nilai_rata_rata`) / `av`.`nilai_rata_rata`) else greatest(0,(`av`.`nilai_rata_rata` - `me`.`nilai`) / `av`.`nilai_rata_rata`) end AS `pda`,case when `k`.`jenis` = 'Benefit' then greatest(0,(`av`.`nilai_rata_rata` - `me`.`nilai`) / `av`.`nilai_rata_rata`) else greatest(0,(`me`.`nilai` - `av`.`nilai_rata_rata`) / `av`.`nilai_rata_rata`) end AS `nda` from (((`matriks_evaluasi` `me` join `alternatif` `a` on(`me`.`id_alternatif` = `a`.`id`)) join `kriteria` `k` on(`me`.`id_kriteria` = `k`.`id`)) join `solusi_rata_rata` `av` on(`me`.`id_kriteria` = `av`.`id_kriteria`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_sn`
--

/*!50001 DROP VIEW IF EXISTS `sp_sn`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_sn` AS select `pda_nda`.`id_alternatif` AS `id_alternatif`,`pda_nda`.`kode_alternatif` AS `kode_alternatif`,sum(`pda_nda`.`pda` * `k`.`bobot`) AS `sp`,sum(`pda_nda`.`nda` * `k`.`bobot`) AS `sn` from ((select `pda_nda`.`id_alternatif` AS `id_alternatif`,`pda_nda`.`id_kriteria` AS `id_kriteria`,`pda_nda`.`jenis` AS `jenis`,`pda_nda`.`kode_alternatif` AS `kode_alternatif`,`pda_nda`.`kode_kriteria` AS `kode_kriteria`,`pda_nda`.`nilai_alternatif` AS `nilai_alternatif`,`pda_nda`.`nilai_rata_rata` AS `nilai_rata_rata`,`pda_nda`.`pda` AS `pda`,`pda_nda`.`nda` AS `nda` from `spk_edas`.`pda_nda`) `pda_nda` join `spk_edas`.`kriteria` `k` on(`pda_nda`.`id_kriteria` = `k`.`id`)) group by `pda_nda`.`id_alternatif` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_as`
--

/*!50001 DROP VIEW IF EXISTS `view_as`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_as` AS select `nsp_nsn`.`id_alternatif` AS `id_alternatif`,`nsp_nsn`.`kode_alternatif` AS `kode_alternatif`,(`nsp_nsn`.`nsp` + `nsp_nsn`.`nsn`) / 2 AS `nilai_AS` from (select `nsp_nsn`.`id_alternatif` AS `id_alternatif`,`nsp_nsn`.`kode_alternatif` AS `kode_alternatif`,`nsp_nsn`.`sp` AS `sp`,`nsp_nsn`.`sn` AS `sn`,`nsp_nsn`.`max_sp` AS `max_sp`,`nsp_nsn`.`nsp` AS `nsp`,`nsp_nsn`.`max_sn` AS `max_sn`,`nsp_nsn`.`nsn` AS `nsn` from `spk_edas`.`nsp_nsn`) `nsp_nsn` */;
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

-- Dump completed on 2023-11-28 13:57:30
