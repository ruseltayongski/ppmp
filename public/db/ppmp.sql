-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: ppmp
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge_to`
--

LOCK TABLES `charge_to` WRITE;
/*!40000 ALTER TABLE `charge_to` DISABLE KEYS */;
INSERT INTO `charge_to` VALUES (1,'0618','6','42','saa #90009090909','1000','0','1232-12-12','1',NULL,'2019-05-28 01:08:22','2019-05-28 01:08:22');
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
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (1,'{\"A. CONSUMABLES:\":[\"1. COMMON-USE\\/REGULAR\\/STANDARD OFFICE SUPPLIES:\",\"2. TRAINING SUPPLIES:\",\"3. EQUIPMENT CONSUMABLES\"],\"B. NON-CONSUMABLE:\":[],\"C. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION\":[]}','I. OFFICE SUPPLIES',NULL,NULL,NULL,'2019-05-28 19:18:09'),(2,NULL,'II. ACCOUNTABLE FORMS',NULL,NULL,NULL,NULL),(3,NULL,'III. DRUGS AND MEDICINES',NULL,NULL,NULL,NULL),(4,NULL,'IV. MEDICAL, DENTAL AND LABORATORY SUPPLIES',NULL,NULL,NULL,NULL),(5,NULL,'V. FUEL, OIL AND LUBRICANTS (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(6,NULL,'VI. SEMI-EXPENDABLE - OFFICE EQUIPMENT',NULL,NULL,NULL,NULL),(7,NULL,'VII. SEMI-EXPENDABLE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(8,NULL,'VIII. SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(9,NULL,'IX. SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(10,NULL,'X. SEMI-EXPENDABLE - MEDICAL EQUIPMENT',NULL,NULL,NULL,NULL),(11,NULL,'XI. SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(12,NULL,'XII. SEMI-EXPENDABLE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(13,NULL,'XIII. SEMI-EXPENDABLE - BOOKS (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(14,NULL,'XIV. OTHER SUPPLIES AND MATERIALS EXPENSE',NULL,NULL,NULL,NULL),(15,NULL,'XV. POSTAGE AND COURIER SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(16,NULL,'XVI. TELEPHONE - MOBILE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(17,NULL,'XVII. TELEPHONE - LANDLINE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(18,NULL,'XVIII. INTERNET SUBSCRIPTION EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(19,NULL,'XIX. CABLE, SATELLITE, TELEGRAPH AND RADIO EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(20,NULL,'XX. AWARDS/REWARDS EXPENSES',NULL,NULL,NULL,NULL),(21,NULL,'XXII. SURVEY EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(22,NULL,'XXIII. LEGAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(23,NULL,'XIV. CONSULTANCY SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(24,NULL,'XV. JANITORIAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(25,NULL,'XVI. SECURITY SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(26,NULL,'XVII. OTHER GENERAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(27,NULL,'XVIII. REPAIR MAINTENANCE - BUILDINGS',NULL,NULL,NULL,NULL),(28,NULL,'XXX. REPAIR MAINTENANCE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(29,NULL,'XXXI. REPAIR MAINTENANCE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(30,NULL,'XXXII. REPAIR MAINTENANCE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(31,NULL,'XXXIII. REPAIR MAINTENANCE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(32,NULL,'XXXIV. REPAIR MAINTENANCE - MOTOR VEHICLE',NULL,NULL,NULL,NULL),(33,NULL,'XXXV. REPAIR MAINTENANCE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(34,NULL,'XXXVI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OFFICE EQUIPMENT',NULL,NULL,NULL,NULL),(35,NULL,'XXXVII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(36,NULL,'XXXVIII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(37,NULL,'XXXIX. REPAIR MAINTENANCE - SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(38,NULL,'XL. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(39,NULL,'XLI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(40,NULL,'XLII.  ADVERTISING EXPENSES',NULL,NULL,NULL,NULL),(41,NULL,'XLIII. PRINTING AND PUBLICATION EXPENSES',NULL,NULL,NULL,NULL),(42,NULL,'XLIV.TRANSPORTATION AND DELIVERY EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(43,NULL,'XLV. RENT - BUILDING AND STRUCTURES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(44,NULL,'XLVI. RENT - MOTOR VEHICLE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(45,NULL,'XLVII. RENT - EQUIPMENT',NULL,NULL,NULL,NULL),(46,NULL,'XLVIII. RENT - ICT MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(47,NULL,'L. REPRESENTATION EXPENSES',NULL,NULL,NULL,NULL),(48,NULL,'LI. TRAINING EXPENSES',NULL,NULL,NULL,NULL);
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
  `userid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tranche` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'0618','1','1-A-1',NULL,'Clip - Backfold - 1\"','20','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(2,'0618','1','1-A-1',NULL,'Clip - Backfold - 2\"','21','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(3,'0618','1','1-A-1',NULL,'Clip - Paper, 32mm, 100\'s/box','22','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(4,'0618','1','1-A-1',NULL,'Clip - Paper, 48mm, 100\'s/box','23','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(5,'0618','1','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Blue','24','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(6,'0618','1','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Green','25','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(7,'0618','1','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Red','26','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(8,'0618','1','1-A-1',NULL,'Envelope - Brown, Long','27','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(9,'0618','1','1-A-1',NULL,'Envelope - Expanding, Long with garter','28','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(10,'0618','1','1-A-1',NULL,'Envelope - Mailing/Letter, Long, White, 500\'s/box','29','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(11,'0618','1','1-A-1',NULL,'Envelope - Mailing/Letter, Window, Long, White, 500\'s/box','30','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(12,'0618','1','1-A-1',NULL,'Fastener - Plastic, 50\'s','31','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(13,'0618','1','1-A-1',NULL,'Fastener - Screw type 4\'\'','32','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(14,'0618','1','1-A-1',NULL,'Fastener - Screw type 3\'\'','33','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(15,'0618','1','1-A-1',NULL,'Fastener - Screw type 2\'\'','34','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(16,'0618','1','1-A-1',NULL,'Fastener - Screw type 1\'\'','35','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(17,'0618','1','1-A-1',NULL,'Folder - Long, White, 14 pts.','36','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(18,'0618','1','1-A-1',NULL,'Glue - All Purpose, 130g ','37','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(19,'0618','1','1-A-1',NULL,'Ink - Stamp Pad, 50ml, violet','38','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(20,'0618','1','1-A-1',NULL,'Note Pad Stick-on  3\" x  4\", 100 sheets/pad','39','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(21,'0618','1','1-A-1',NULL,'Paper - Bondpaper, A4, Substance 20','40','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(22,'0618','1','1-A-1',NULL,'Paper - Bondpaper, Long, Substance 20','41','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(23,'0618','1','1-A-1',NULL,'Paper - Fax, 216mm x 30mm','42','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(24,'0618','1','1-A-1',NULL,'Paper - Laid, 8 1/2\"x11\", 500\'s/box (for Certificates/License)','43','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(25,'0618','1','1-A-1',NULL,'Pen - Ballpen, Black','44','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(26,'0618','1','1-A-1',NULL,'Pen - Ballpen, Blue','45','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(27,'0618','1','1-A-1',NULL,'Pen - Ballpen, Green','46','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(28,'0618','1','1-A-1',NULL,'Pen - Ballpen, Red (COA Only)','47','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(29,'0618','1','1-A-1',NULL,'Pen - Highlighter, Neon Green/Yellow','48','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(30,'0618','1','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Black','49','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(31,'0618','1','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Blue','50','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(32,'0618','1','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Red','51','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(33,'0618','1','1-A-1',NULL,'Pen - Signpen, 0.5 MM, Black','52','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(34,'0618','1','1-A-1',NULL,'Pen - Signpen, 0.5 MM, Blue','53','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(35,'0618','1','1-A-1',NULL,'Record Book - 150 Leaves, smyth sewn','54','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(36,'0618','1','1-A-1',NULL,'Record Book - 300 Leaves, smyth sewn','55','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(37,'0618','1','1-A-1',NULL,'Rubberband, 350 grams','56','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(38,'0618','1','1-A-1',NULL,'Staple Wire - # 35','57','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(39,'0618','1','1-A-1',NULL,'Staple Wire - # 23 x 10','58','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(40,'0618','1','1-A-1',NULL,'Tape - Masking, 1\", 25m','59','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(41,'0618','1','1-A-1',NULL,'Tape - Masking, 2\", 25m','60','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(42,'0618','1','1-A-1',NULL,'Tape - Masking, 2\", 50m','61','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(43,'0618','1','1-A-1',NULL,'Tape - Transparent, 1\", 50m','62','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(44,'0618','1','1-A-1',NULL,'Tape - Transparent, 2\", 25m','63','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(45,'0618','1','1-A-1',NULL,'USB 16 GB','64','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(46,'0618','1','1-A-2',NULL,'Cartolina, Assorted Color, 78 gsm min','65','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(47,'0618','1','1-A-2',NULL,'Cartolina, White, 99 gsm min','66','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(48,'0618','1','1-A-2',NULL,'Eraser - Whiteboard, Felt','67','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(49,'0618','1','1-A-2',NULL,'ID Sling - Garterized with name tags (landscape)','68','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(50,'0618','1','1-A-2',NULL,'Manila Paper, 36\" x 48\", Pre-cut','69','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(51,'0618','1','1-A-2',NULL,'Metacards (4 colors) 100\'s','70','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(52,'0618','1','1-A-2',NULL,'Pen - Whiteboard, Fine, Black','71','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(53,'0618','1','1-A-2',NULL,'Pen - Whiteboard, Fine, Blue','72','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(54,'0618','1','1-A-2',NULL,'Pen - Whiteboard, Fine, Green','73','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(55,'0618','1','1-A-2',NULL,'Pen - Whiteboard, Fine, Red','74','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(56,'0618','1','1-A-3',NULL,'Ink - Duplicating Machine ','75','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(57,'0618','1','1-A-3',NULL,'Master Roll - Duplicating Machine ','76','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(58,'0618','1','1-A-3',NULL,'Developer - Copier ','77','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(59,'0618','1','1-A-3',NULL,'Drum - Copier ','78','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(60,'0618','1','1-A-3',NULL,'Toner - Copier ','79','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(61,'0618','1','1-A-3',NULL,'Toner - Computer Printer','80','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(62,'0618','1','1-B',NULL,'Calculator, 12 digits, dual power','81','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(63,'0618','1','1-B',NULL,'Puncher, Heavy Duty, 2 Hole','82','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(64,'0618','1','1-B',NULL,'Ruler, 12\", Plastic, Transparent','83','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(65,'0618','1','1-B',NULL,'Scissors, 8\", Metal Handle','84','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(66,'0618','1','1-B',NULL,'Sharpener, Table Type, Heavy Duty','85','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(67,'0618','1','1-B',NULL,'Stamp Pad, 3\" x 5\"    ','86','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(68,'0618','1','1-B',NULL,'Stapler with Staple Remover # 35, Heavy Duty','87','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(69,'0618','1','1-B',NULL,'Stapler, Heavy Duty, 23/6 - 23/24mm staples, maximum paper 210 sheets','88','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(70,'0618','1','1-B',NULL,'Wire, Extension, 5 meters, 3 gangs','89','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL),(71,'0618','1','1-B',NULL,'USB Wireless Laser Pointer Presenter, USB 3.0/USB 2.0, 10m away, function page up and down','90','2000','20000','small value','5','5','5','5','5','5','5','5','5','5','5','5','approve',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (24,'2019_05_22_081031_create_expense_code',1),(46,'2014_10_12_000000_create_users_table',2),(47,'2014_10_12_100000_create_password_resets_table',2),(48,'2019_05_22_081031_create_expense',2),(49,'2019_05_23_042748_create_charge_to',2),(50,'2019_05_27_050408_create_pap',2),(51,'2019_05_28_014538_create_item',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pap`
--

DROP TABLE IF EXISTS `pap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pap`
--

LOCK TABLES `pap` WRITE;
/*!40000 ALTER TABLE `pap` DISABLE KEYS */;
INSERT INTO `pap` VALUES (1,'PAP1','PAP-001',NULL,NULL,NULL,NULL),(2,'PAP2','PAP-002',NULL,NULL,NULL,NULL),(3,'PAP3','PAP-003',NULL,NULL,NULL,NULL),(4,'PAP4','PAP-004',NULL,NULL,NULL,NULL),(5,'PAP5','PAP-005',NULL,NULL,NULL,NULL),(6,'PAP6','PAP-006',NULL,NULL,NULL,NULL),(7,'PAP7','PAP-007',NULL,NULL,NULL,NULL),(8,'PAP8','PAP-008',NULL,NULL,NULL,NULL),(9,'PAP9','PAP-009',NULL,NULL,NULL,NULL),(10,'PAP10','PAP-0010',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pap` ENABLE KEYS */;
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
-- Dumping events for database 'ppmp'
--

--
-- Dumping routines for database 'ppmp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-30  9:28:02
