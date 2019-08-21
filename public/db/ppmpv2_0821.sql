-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: ppmpv2
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.8-MariaDB

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
-- Table structure for table `charge_to`
--

DROP TABLE IF EXISTS `charge_to`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charge_to` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginning_balance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_balance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datein` date DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge_to`
--

LOCK TABLES `charge_to` WRITE;
/*!40000 ALTER TABLE `charge_to` DISABLE KEYS */;
/*!40000 ALTER TABLE `charge_to` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `division` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (1,'6','{\"A. CONSUMABLES:\":[\"1. COMMON-USE\\/REGULAR\\/STANDARD OFFICE SUPPLIES:\",\"2. TRAINING SUPPLIES:\",\"3. EQUIPMENT CONSUMABLES\"],\"B. NON-CONSUMABLE:\":[],\"C. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION\":[]}','I. OFFICE SUPPLIES',NULL,NULL,NULL,'2019-05-28 19:18:09'),(2,'6',NULL,'II. ACCOUNTABLE FORMS',NULL,NULL,NULL,NULL),(3,'6',NULL,'III. DRUGS AND MEDICINES',NULL,NULL,NULL,NULL),(4,'6',NULL,'IV. MEDICAL, DENTAL AND LABORATORY SUPPLIES',NULL,NULL,NULL,NULL),(5,'6',NULL,'V. FUEL, OIL AND LUBRICANTS (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(6,'6',NULL,'VI. SEMI-EXPENDABLE - OFFICE EQUIPMENT',NULL,NULL,NULL,NULL),(7,'6',NULL,'VII. SEMI-EXPENDABLE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(8,'6',NULL,'VIII. SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(9,'6',NULL,'IX. SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(10,'6',NULL,'X. SEMI-EXPENDABLE - MEDICAL EQUIPMENT',NULL,NULL,NULL,NULL),(11,'6',NULL,'XI. SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(12,'6',NULL,'XII. SEMI-EXPENDABLE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(13,'6',NULL,'XIII. SEMI-EXPENDABLE - BOOKS (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(14,'6',NULL,'XIV. OTHER SUPPLIES AND MATERIALS EXPENSE',NULL,NULL,NULL,NULL),(15,'6',NULL,'XV. POSTAGE AND COURIER SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(16,'6',NULL,'XVI. TELEPHONE - MOBILE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(17,'6',NULL,'XVII. TELEPHONE - LANDLINE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(18,'6',NULL,'XVIII. INTERNET SUBSCRIPTION EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(19,'6',NULL,'XIX. CABLE, SATELLITE, TELEGRAPH AND RADIO EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(20,'6',NULL,'XX. AWARDS/REWARDS EXPENSES',NULL,NULL,NULL,NULL),(21,'6',NULL,'XXII. SURVEY EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(22,'6',NULL,'XXIII. LEGAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(23,'6',NULL,'XIV. CONSULTANCY SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(24,'6',NULL,'XV. JANITORIAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(25,'6',NULL,'XVI. SECURITY SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(26,'6',NULL,'XVII. OTHER GENERAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(27,'6',NULL,'XVIII. REPAIR MAINTENANCE - BUILDINGS',NULL,NULL,NULL,NULL),(28,'6',NULL,'XXX. REPAIR MAINTENANCE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(29,'6',NULL,'XXXI. REPAIR MAINTENANCE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(30,'6',NULL,'XXXII. REPAIR MAINTENANCE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(31,'6',NULL,'XXXIII. REPAIR MAINTENANCE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(32,'6',NULL,'XXXIV. REPAIR MAINTENANCE - MOTOR VEHICLE',NULL,NULL,NULL,NULL),(33,'6',NULL,'XXXV. REPAIR MAINTENANCE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(34,'6',NULL,'XXXVI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OFFICE EQUIPMENT',NULL,NULL,NULL,NULL),(35,'6',NULL,'XXXVII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(36,'6',NULL,'XXXVIII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(37,'6',NULL,'XXXIX. REPAIR MAINTENANCE - SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(38,'6',NULL,'XL. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(39,'6',NULL,'XLI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(40,'6',NULL,'XLII.  ADVERTISING EXPENSES',NULL,NULL,NULL,NULL),(41,'6',NULL,'XLIII. PRINTING AND PUBLICATION EXPENSES',NULL,NULL,NULL,NULL),(42,'6',NULL,'XLIV.TRANSPORTATION AND DELIVERY EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(43,'6',NULL,'XLV. RENT - BUILDING AND STRUCTURES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(44,'6',NULL,'XLVI. RENT - MOTOR VEHICLE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(45,'6',NULL,'XLVII. RENT - EQUIPMENT',NULL,NULL,NULL,NULL),(46,'6',NULL,'XLVIII. RENT - ICT MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(47,'6',NULL,'L. REPRESENTATION EXPENSES',NULL,NULL,NULL,NULL),(48,'6',NULL,'LI. TRAINING EXPENSES',NULL,NULL,NULL,NULL),(151,NULL,NULL,'',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tranche` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_measurement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_budget` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_procurement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `may` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jul` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sep` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oct` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nov` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dec` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `expense_id` (`expense_id`),
  KEY `tranche` (`tranche`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'1','0454','1','6','42','1-A-1','2019-00008','Clip - Backfold - 1\"','pcs','0','10','10','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(2,'2','0618','1','6','42','1-A-1',NULL,'Clip - Backfold - 2\"','pcs','0','10','10','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(3,'3','0618','1','6','42','1-A-1',NULL,'Clip - Paper, 32mm, 100','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(4,'4','0618','1','6','42','1-A-1',NULL,'Clip - Paper, 48mm, 100','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(5,'5','0618','1','6','42','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(6,'6','0618','1','6','42','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Green','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(7,'7','0618','1','6','42','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Red','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(8,'8','0618','1','6','42','1-A-1',NULL,'Envelope - Brown, Long','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(9,'9','0618','1','6','42','1-A-1',NULL,'Envelope - Expanding, Long with garter','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:40'),(10,'10','0618','1','6','42','1-A-1',NULL,'Envelope - Mailing/Letter, Long, White, 500','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(11,'11','0618','1','6','42','1-A-1',NULL,'Envelope - Mailing/Letter, Window, Long, White, 500','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(12,'12','0618','1','6','42','1-A-1',NULL,'Fastener - Plastic, 50','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(13,'13','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 4','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(14,'14','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 3','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(15,'15','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 2','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(16,'16','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 1','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(17,'17','0618','1','6','42','1-A-1',NULL,'Folder - Long, White, 14 pts.','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(18,'18','0618','1','6','42','1-A-1',NULL,'Glue - All Purpose, 130g','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(19,'19','0618','1','6','42','1-A-1',NULL,'Ink - Stamp Pad, 50ml, violet','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(20,'20','0618','1','6','42','1-A-1',NULL,'Note Pad Stick-on  3\" x  4\", 100 sheets/pad','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(21,'21','0618','1','6','42','1-A-1',NULL,'Paper - Bondpaper, A4, Substance 20','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(22,'22','0618','1','6','42','1-A-1',NULL,'Paper - Bondpaper, Long, Substance 20','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(23,'23','0618','1','6','42','1-A-1',NULL,'Paper - Fax, 216mm x 30mm','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(24,'24','0618','1','6','42','1-A-1',NULL,'Paper - Laid, 8 1/2\"x11\", 500','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(25,'25','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(26,'26','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(27,'27','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Green','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(28,'28','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Red (COA Only)','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:41'),(29,'29','0618','1','6','42','1-A-1',NULL,'Pen - Highlighter, Neon Green/Yellow','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(30,'30','0618','1','6','42','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(31,'31','0618','1','6','42','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(32,'32','0618','1','6','42','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Red','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(33,'33','0618','1','6','42','1-A-1',NULL,'Pen - Signpen, 0.5 MM, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(34,'34','0618','1','6','42','1-A-1',NULL,'Pen - Signpen, 0.5 MM, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(35,'35','0618','1','6','42','1-A-1',NULL,'Record Book - 150 Leaves, smyth sewn','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(36,'36','0618','1','6','42','1-A-1',NULL,'Record Book - 300 Leaves, smyth sewn','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(37,'37','0618','1','6','42','1-A-1',NULL,'Rubberband, 350 grams','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(38,'38','0618','1','6','42','1-A-1',NULL,'Staple Wire - # 35','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(39,'39','0618','1','6','42','1-A-1',NULL,'Staple Wire - # 23 x 10','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(40,'40','0618','1','6','42','1-A-1',NULL,'Tape - Masking, 1\", 25m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(41,'41','0618','1','6','42','1-A-1',NULL,'Tape - Masking, 2\", 25m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(42,'42','0618','1','6','42','1-A-1',NULL,'Tape - Masking, 2\", 50m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(43,'43','0618','1','6','42','1-A-1',NULL,'Tape - Transparent, 1\", 50m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(44,'44','0618','1','6','42','1-A-1',NULL,'Tape - Transparent, 2\", 25m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(45,'45','0618','1','6','42','1-A-1',NULL,'USB 16 GB','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(46,'46','0618','1','6','42','1-A-2',NULL,'Cartolina, Assorted Color, 78 gsm min','pcs','0','10','0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(47,'47','0618','1','6','42','1-A-2',NULL,'Cartolina, White, 99 gsm min','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(48,'48','0618','1','6','42','1-A-2',NULL,'Eraser - Whiteboard, Felt','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(49,'49','0618','1','6','42','1-A-2',NULL,'ID Sling - Garterized with name tags (landscape)','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(50,'50','0618','1','6','42','1-A-2',NULL,'Manila Paper, 36\" x 48\", Pre-cut','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(51,'51','0618','1','6','42','1-A-2',NULL,'Metacards (4 colors) 100','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:42'),(52,'52','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(53,'53','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(54,'54','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Green','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(55,'55','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Red','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(56,'56','0618','1','6','42','1-A-3',NULL,'Ink - Duplicating Machine','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(57,'57','0618','1','6','42','1-A-3',NULL,'Master Roll - Duplicating Machine','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(58,'58','0618','1','6','42','1-A-3',NULL,'Developer - Copier','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(59,'59','0618','1','6','42','1-A-3',NULL,'Drum - Copier','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(60,'60','0618','1','6','42','1-A-3',NULL,'Toner - Copier','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(61,'61','0618','1','6','42','1-A-3',NULL,'Toner - Computer Printer','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(62,'62','0618','1','6','42','1-B',NULL,'Calculator, 12 digits, dual power','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(63,'63','0618','1','6','42','1-B',NULL,'Puncher, Heavy Duty, 2 Hole','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(64,'64','0618','1','6','42','1-B',NULL,'Ruler, 12\", Plastic, Transparent','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(65,'65','0618','1','6','42','1-B',NULL,'Scissors, 8\", Metal Handle','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(66,'66','0618','1','6','42','1-B',NULL,'Sharpener, Table Type, Heavy Duty','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(67,'67','0618','1','6','42','1-B',NULL,'Stamp Pad, 3\" x 5\"','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(68,'68','0618','1','6','42','1-B',NULL,'Stapler with Staple Remover # 35, Heavy Duty','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(69,'69','0618','1','6','42','1-B',NULL,'Stapler, Heavy Duty, 23/6 - 23/24mm staples, maximum paper 210 sheets','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(70,'70','0618','1','6','42','1-B',NULL,'Wire, Extension, 5 meters, 3 gangs','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(71,'71','0618','1','6','42','1-B',NULL,'USB Wireless Laser Pointer Presenter, USB 3.0/USB 2.0, 10m away, function page up and down','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-08-12 23:54:43'),(72,'72','0618','2','6','42',NULL,NULL,'Check book/blank check, MDS','pcs','',NULL,'0','2','','','','','','','','','','','','','fixed',NULL,NULL,'2019-07-29 23:45:44'),(73,'73','0618','2','6','42',NULL,NULL,'Check book/blank check, TF','pcs','',NULL,'0','2','','','','','','','','','','','','','fixed',NULL,NULL,'2019-07-29 23:45:44'),(74,'74','0618','2','6','42',NULL,NULL,'Official Receipt','pcs','',NULL,'0','2','','','','','','','','','','','','','fixed',NULL,NULL,'2019-07-29 23:45:44'),(75,NULL,'0618','6','6',NULL,NULL,NULL,'Airconditioning Unit, window type, 1hp','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(76,NULL,'0618','6','6',NULL,NULL,NULL,'Camera, Digital','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(77,NULL,'0618','6','6',NULL,NULL,NULL,'Electric Fan','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(78,NULL,'0618','6','6',NULL,NULL,NULL,'Fax Machine','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(79,NULL,'0618','7','6',NULL,NULL,NULL,'Automatic Voltage Regulator',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(80,NULL,'0618','7','6',NULL,NULL,NULL,'Computer Desk Top (whole set)',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(82,NULL,'0618','7','6',NULL,NULL,NULL,'Keyboard',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(83,NULL,'0618','7','6',NULL,NULL,NULL,'Laptop',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(85,NULL,'0618','7','6',NULL,NULL,NULL,'Mouse',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(89,NULL,'0618','7','6',NULL,NULL,NULL,'Wireless Router',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(90,NULL,'0050','8','6',NULL,NULL,NULL,'Handheld Two-Way Radio',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(91,NULL,'0050','10','6',NULL,NULL,NULL,'BP Apparatus',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(92,NULL,'0050','11','6',NULL,NULL,NULL,'Compressor',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(93,NULL,'0050','12','6',NULL,NULL,NULL,'Chair',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(94,NULL,'0050','12','6',NULL,NULL,NULL,'Table',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(95,NULL,'0050','14','6',NULL,NULL,NULL,'Chemicals',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(96,NULL,'0050','14','6',NULL,NULL,NULL,'Jacket',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(97,NULL,'0050','14','6',NULL,NULL,NULL,'Tarpaulins',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(98,NULL,'0050','14','6',NULL,NULL,NULL,'T-shirts',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(99,NULL,'0050','20','6',NULL,NULL,NULL,'Frames',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(100,NULL,'0050','20','6',NULL,NULL,NULL,'Plaques',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(101,NULL,'0050','20','6',NULL,NULL,NULL,'Rings',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(102,NULL,'0050','27','6',NULL,NULL,NULL,'Ceiling',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(103,NULL,'0050','27','6',NULL,NULL,NULL,'Door',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(104,NULL,'0050','27','6',NULL,NULL,NULL,'Floor',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(105,NULL,'0050','27','6',NULL,NULL,NULL,'Wall',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(106,NULL,'0050','28','6',NULL,NULL,NULL,'Central Processing Unit',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(107,NULL,'0050','28','6',NULL,NULL,NULL,'Monitor',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(108,NULL,'0050','28','6',NULL,NULL,NULL,'Notebook',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(109,NULL,'0050','28','6',NULL,NULL,NULL,'Printer with Scanner and Copier',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(110,NULL,'0050','28','6',NULL,NULL,NULL,'Uninterrupted Power Supply',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(1217,'1217','0454','2','6','42',NULL,NULL,'test','pcs',NULL,'100','1000','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'deactivate',NULL,'2019-07-29 22:39:39','2019-08-13 19:13:45');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (24,'2019_05_22_081031_create_expense_code',1),(46,'2014_10_12_000000_create_users_table',2),(47,'2014_10_12_100000_create_password_resets_table',2),(48,'2019_05_22_081031_create_expense',2),(49,'2019_05_23_042748_create_charge_to',2),(50,'2019_05_27_050408_create_pap',2),(51,'2019_05_28_014538_create_item',2),(52,'2019_06_06_032429_create_mode_procurement',3),(53,'2019_07_27_021606_create_qty',4),(54,'2019_08_15_004059_create_papsection',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mode_procurement`
--

DROP TABLE IF EXISTS `mode_procurement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mode_procurement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mode_procurement`
--

LOCK TABLES `mode_procurement` WRITE;
/*!40000 ALTER TABLE `mode_procurement` DISABLE KEYS */;
INSERT INTO `mode_procurement` VALUES (1,'Small Value',NULL,NULL,NULL,NULL),(2,'Canvass',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `mode_procurement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pap`
--

DROP TABLE IF EXISTS `pap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pap`
--

LOCK TABLES `pap` WRITE;
/*!40000 ALTER TABLE `pap` DISABLE KEYS */;
INSERT INTO `pap` VALUES (13,'Regular Allotment','STO','STO - 00001','1000000',NULL,NULL,'2019-08-14 17:51:10','2019-08-14 17:51:10'),(14,'Regular Allotment','PHM','PHM - 00001','500000',NULL,NULL,'2019-08-14 18:00:39','2019-08-14 18:00:39'),(15,'Regular Allotment','RRHFS','RRHFS - 000001','200000',NULL,NULL,'2019-08-14 21:29:17','2019-08-14 21:29:17'),(16,'Regular Allotment','RESEARCH','RESEARCH - 000001','500000',NULL,NULL,'2019-08-14 21:36:54','2019-08-14 21:36:54'),(17,'Sub Allotment','SAA','SAA - 0000001','100000',NULL,NULL,'2019-08-14 21:40:09','2019-08-14 21:40:09');
/*!40000 ALTER TABLE `pap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `papsection`
--

DROP TABLE IF EXISTS `papsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `papsection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `pap_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `papsection`
--

LOCK TABLES `papsection` WRITE;
/*!40000 ALTER TABLE `papsection` DISABLE KEYS */;
INSERT INTO `papsection` VALUES (3,'200000',5,13,NULL,'2019-08-14 17:51:10','2019-08-14 17:51:10'),(4,'500000',6,13,NULL,'2019-08-14 17:51:10','2019-08-14 17:51:10'),(5,'10000',28,14,NULL,'2019-08-14 18:00:39','2019-08-14 18:00:39'),(6,'20000',29,14,NULL,'2019-08-14 18:00:40','2019-08-14 18:00:40'),(7,'30000',21,14,NULL,'2019-08-14 18:00:40','2019-08-14 18:00:40'),(8,'40000',30,14,NULL,'2019-08-14 18:00:40','2019-08-14 18:00:40'),(10,'200000',15,15,NULL,'2019-08-14 21:35:49','2019-08-14 21:35:49'),(11,'8000',6,15,NULL,'2019-08-14 21:35:49','2019-08-14 21:35:49'),(12,'100000',30,16,NULL,'2019-08-14 21:36:54','2019-08-14 21:36:54'),(13,'100000',42,17,NULL,'2019-08-14 21:40:09','2019-08-14 21:40:09');
/*!40000 ALTER TABLE `papsection` ENABLE KEYS */;
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
-- Table structure for table `qty`
--

DROP TABLE IF EXISTS `qty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `may` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jul` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sep` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oct` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nov` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dec` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qty`
--

LOCK TABLES `qty` WRITE;
/*!40000 ALTER TABLE `qty` DISABLE KEYS */;
INSERT INTO `qty` VALUES (13,'1','1','0618','6','42','1','1','1','1','1','1','1','1','1','1','1','1',NULL,NULL,'2019-07-26 22:59:29','2019-07-27 00:15:14'),(14,'1','1','0619','6','42','1','1','1','1','1','1','1','1','1','1','1','1',NULL,NULL,'2019-07-27 00:07:06','2019-07-27 00:10:03'),(15,'2','2','0619','6','42','1','2','2','2','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-27 00:10:31','2019-07-27 00:23:44'),(16,'46','46','0618','6','42','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-27 00:18:26','2019-07-27 00:18:26'),(17,'1','1','0454','6','42',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-29 22:38:42','2019-07-29 22:38:42'),(18,'1','1','0454','6','42',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10','5',NULL,NULL,NULL,NULL,NULL,'2019-07-29 22:39:39','2019-07-29 22:39:39'),(19,'1217','1217','0454','6','42',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10',NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-29 23:45:44','2019-07-29 23:45:44'),(20,'2','2','0454','6','42',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-12 23:54:40','2019-08-12 23:54:40');
/*!40000 ALTER TABLE `qty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ppmpv2'
--

--
-- Dumping routines for database 'ppmpv2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-21 14:43:25
