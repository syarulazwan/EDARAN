-- MySQL dump 10.13  Distrib 5.7.38, for Win32 (AMD64)
--
-- Host: localhost    Database: hrm_db
-- ------------------------------------------------------
-- Server version	5.7.35-0ubuntu0.18.04.1

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
-- Table structure for table `project_member`
--

DROP TABLE IF EXISTS `project_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `location_id` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `exit_project` varchar(100) DEFAULT NULL,
  `exit_project_date` date DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `assign_as` varchar(100) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `requested_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_member`
--

LOCK TABLES `project_member` WRITE;
/*!40000 ALTER TABLE `project_member` DISABLE KEYS */;
INSERT INTO `project_member` VALUES (1,1,'1',NULL,NULL,7,NULL,'on','2022-09-10','1,2,3,4,5,6','designation test','deapartment test','branch test','unit test','2022-09-09',NULL,NULL,NULL,NULL,'2022-09-09 02:35:40','2022-09-09 16:43:54'),(2,1,'1',NULL,NULL,5,NULL,NULL,NULL,'2','designation test','deapartment test','branch test','unit test','2022-09-09',NULL,NULL,NULL,NULL,'2022-09-09 02:38:45','2022-09-09 17:00:13'),(3,1,'1',NULL,NULL,3,NULL,'on',NULL,'3,4',NULL,'deapartment test','branch test','unit test','2022-09-15',NULL,NULL,NULL,NULL,'2022-09-09 02:39:46','2022-09-09 16:48:16'),(4,1,'1',NULL,NULL,5,NULL,'on',NULL,'1','designation test',NULL,NULL,'unit test','2022-09-09',NULL,NULL,NULL,NULL,'2022-09-09 02:49:44','2022-09-09 16:44:54'),(5,1,'2',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'approve',NULL,'test','2022-09-10','2022-09-10 01:01:37','2022-09-10 17:03:02'),(8,1,'3',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pending',NULL,'plasee','2022-09-12','2022-09-11 16:08:41','2022-09-11 16:08:41'),(9,53,'4',NULL,NULL,30,NULL,'on','2022-09-12','5','Select State','Select State','Select State','Select State','2022-09-14',NULL,NULL,NULL,NULL,'2022-09-12 15:47:48','2022-09-12 15:47:48'),(10,53,'4',NULL,NULL,30,NULL,NULL,NULL,'6','Select State','Select State','Select State','Select State','2022-09-14',NULL,NULL,NULL,NULL,'2022-09-12 15:47:54','2022-09-12 17:14:02'),(11,53,'4',NULL,NULL,30,NULL,NULL,NULL,'6,7','Select State','Select State','Select State','Select State','2022-09-14',NULL,NULL,NULL,NULL,'2022-09-12 15:49:38','2022-09-12 16:48:54'),(12,53,'4',NULL,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'approve',NULL,'test','2022-09-13','2022-09-12 17:30:06','2022-09-12 17:31:10'),(13,53,'4',NULL,NULL,30,NULL,NULL,NULL,'6,7','Select State','Select State','Select State','Select State','2022-09-13',NULL,NULL,NULL,NULL,'2022-09-12 17:43:38','2022-09-12 17:43:38'),(14,53,'4',NULL,NULL,30,NULL,NULL,NULL,'6,7',NULL,NULL,NULL,NULL,'2022-09-13',NULL,NULL,NULL,NULL,'2022-09-12 17:48:00','2022-09-12 17:48:00'),(15,53,'4',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'approve',NULL,'tsdf','2022-09-13','2022-09-12 18:08:47','2022-09-12 18:09:11'),(16,53,'5',NULL,NULL,30,NULL,NULL,NULL,'6',NULL,'asdasd',NULL,NULL,'2022-09-15',NULL,'project member',NULL,NULL,'2022-09-15 06:14:56','2022-09-15 06:14:56'),(17,53,'5',NULL,NULL,31,NULL,NULL,NULL,'6',NULL,'asdasd',NULL,NULL,'2022-09-15',NULL,'project member',NULL,NULL,'2022-09-15 06:16:48','2022-09-15 06:16:48'),(18,53,'3',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'approve',NULL,'sdadadasdasd','2022-09-15','2022-09-15 06:33:37','2022-09-15 06:33:59'),(19,53,'5',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'approve',NULL,'tettst','2022-09-15','2022-09-15 07:13:56','2022-09-15 07:51:39'),(20,53,'5',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'approve',NULL,'tettst','2022-09-15','2022-09-15 07:14:24','2022-09-15 07:52:42'),(21,53,'5',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'reject',NULL,'tettst','2022-09-15','2022-09-15 07:15:36','2022-09-15 07:53:17'),(22,53,'5',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pending',NULL,'tettst','2022-09-15','2022-09-15 07:15:51','2022-09-15 07:15:51'),(27,53,'5',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pending',NULL,'kiloi','2022-09-15','2022-09-15 07:33:51','2022-09-15 07:33:51'),(28,53,'5',NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pending',NULL,'kiloi','2022-09-15','2022-09-15 07:34:16','2022-09-15 07:34:16');
/*!40000 ALTER TABLE `project_member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16  0:45:48
