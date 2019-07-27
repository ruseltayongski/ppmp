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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge_to`
--

LOCK TABLES `charge_to` WRITE;
/*!40000 ALTER TABLE `charge_to` DISABLE KEYS */;
INSERT INTO `charge_to` VALUES (1,'0618','6','42','saa #90009090909','1000','0','1232-12-12','1',NULL,'2019-05-28 01:08:22','2019-05-28 01:08:22'),(2,'0135','6','12','saa #99988888888','1000000','0','2019-06-13','1',NULL,'2019-06-12 22:09:42','2019-06-12 22:09:42'),(3,'197900046','6','39','saa #90009090909','10000000','0','2019-06-13','1',NULL,'2019-06-13 00:25:51','2019-06-13 00:25:51'),(4,'201700264','4','40','sa #77777777','77777777777777','0','2019-06-24','1',NULL,'2019-06-13 21:31:37','2019-06-13 21:31:37'),(5,'201900282','6','14','sa #88888888','999999999999','0','2019-06-18','1',NULL,'2019-06-17 22:10:08','2019-06-17 22:10:08'),(6,'199000052','6','11','saa #999999999','9000000000','0','2019-06-04','1',NULL,'2019-06-18 16:43:09','2019-06-18 16:43:09'),(7,'0623','6','5','saa #90009090909','123213213','0','2000-10-10','1',NULL,'2019-07-03 22:52:51','2019-07-03 22:52:51');
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
INSERT INTO `expense` VALUES (1,'6','{\"A. CONSUMABLES:\":[\"1. COMMON-USE\\/REGULAR\\/STANDARD OFFICE SUPPLIES:\",\"2. TRAINING SUPPLIES:\",\"3. EQUIPMENT CONSUMABLES\"],\"B. NON-CONSUMABLE:\":[],\"C. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION\":[]}','I. OFFICE SUPPLIES',NULL,NULL,NULL,'2019-05-28 19:18:09'),(2,'6',NULL,'II. ACCOUNTABLE FORMS',NULL,NULL,NULL,NULL),(3,'6',NULL,'III. DRUGS AND MEDICINES',NULL,NULL,NULL,NULL),(4,'6',NULL,'IV. MEDICAL, DENTAL AND LABORATORY SUPPLIES',NULL,NULL,NULL,NULL),(5,'6',NULL,'V. FUEL, OIL AND LUBRICANTS (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(6,'6',NULL,'VI. SEMI-EXPENDABLE - OFFICE EQUIPMENT',NULL,NULL,NULL,NULL),(7,'6',NULL,'VII. SEMI-EXPENDABLE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(8,'6',NULL,'VIII. SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(9,'6',NULL,'IX. SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(10,'6',NULL,'X. SEMI-EXPENDABLE - MEDICAL EQUIPMENT',NULL,NULL,NULL,NULL),(11,'6',NULL,'XI. SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(12,'6',NULL,'XII. SEMI-EXPENDABLE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(13,'6',NULL,'XIII. SEMI-EXPENDABLE - BOOKS (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(14,'6',NULL,'XIV. OTHER SUPPLIES AND MATERIALS EXPENSE',NULL,NULL,NULL,NULL),(15,'6',NULL,'XV. POSTAGE AND COURIER SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(16,'6',NULL,'XVI. TELEPHONE - MOBILE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(17,'6',NULL,'XVII. TELEPHONE - LANDLINE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(18,'6',NULL,'XVIII. INTERNET SUBSCRIPTION EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(19,'6',NULL,'XIX. CABLE, SATELLITE, TELEGRAPH AND RADIO EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(20,'6',NULL,'XX. AWARDS/REWARDS EXPENSES',NULL,NULL,NULL,NULL),(21,'6',NULL,'XXII. SURVEY EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(22,'6',NULL,'XXIII. LEGAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(23,'6',NULL,'XIV. CONSULTANCY SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(24,'6',NULL,'XV. JANITORIAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(25,'6',NULL,'XVI. SECURITY SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(26,'6',NULL,'XVII. OTHER GENERAL SERVICES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(27,'6',NULL,'XVIII. REPAIR MAINTENANCE - BUILDINGS',NULL,NULL,NULL,NULL),(28,'6',NULL,'XXX. REPAIR MAINTENANCE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(29,'6',NULL,'XXXI. REPAIR MAINTENANCE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(30,'6',NULL,'XXXII. REPAIR MAINTENANCE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(31,'6',NULL,'XXXIII. REPAIR MAINTENANCE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(32,'6',NULL,'XXXIV. REPAIR MAINTENANCE - MOTOR VEHICLE',NULL,NULL,NULL,NULL),(33,'6',NULL,'XXXV. REPAIR MAINTENANCE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(34,'6',NULL,'XXXVI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OFFICE EQUIPMENT',NULL,NULL,NULL,NULL),(35,'6',NULL,'XXXVII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - ICT EQUIPMENT',NULL,NULL,NULL,NULL),(36,'6',NULL,'XXXVIII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT',NULL,NULL,NULL,NULL),(37,'6',NULL,'XXXIX. REPAIR MAINTENANCE - SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT',NULL,NULL,NULL,NULL),(38,'6',NULL,'XL. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(39,'6',NULL,'XLI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - FURNITURE AND FIXTURES',NULL,NULL,NULL,NULL),(40,'6',NULL,'XLII.  ADVERTISING EXPENSES',NULL,NULL,NULL,NULL),(41,'6',NULL,'XLIII. PRINTING AND PUBLICATION EXPENSES',NULL,NULL,NULL,NULL),(42,'6',NULL,'XLIV.TRANSPORTATION AND DELIVERY EXPENSES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(43,'6',NULL,'XLV. RENT - BUILDING AND STRUCTURES (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(44,'6',NULL,'XLVI. RENT - MOTOR VEHICLE (One Line - Amount Only - for the Whole Division)',NULL,NULL,NULL,NULL),(45,'6',NULL,'XLVII. RENT - EQUIPMENT',NULL,NULL,NULL,NULL),(46,'6',NULL,'XLVIII. RENT - ICT MACHINERY AND EQUIPMENT',NULL,NULL,NULL,NULL),(47,'6',NULL,'L. REPRESENTATION EXPENSES',NULL,NULL,NULL,NULL),(48,'6',NULL,'LI. TRAINING EXPENSES',NULL,NULL,NULL,NULL),(49,'4',NULL,'Procurement of Office Supplies',NULL,NULL,NULL,NULL),(50,'4',NULL,'OTHER SUPPLIES',NULL,NULL,NULL,NULL),(51,'4',NULL,'LEGAL SERVICES',NULL,NULL,NULL,NULL),(52,'4',NULL,'DRUGS AND MEDICINES TOTAL',NULL,NULL,NULL,NULL),(53,'4',NULL,'Procurement of Fuel, Oil and Lubricants',NULL,NULL,NULL,NULL),(54,'4',NULL,'Payment of Semi-Expandable Office Equipment',NULL,NULL,NULL,NULL),(55,'4',NULL,'Payment of Semi-Expandable ICT Equipment',NULL,NULL,NULL,NULL),(56,'4',NULL,'Payment of Semi-Expandable Medical Equipment',NULL,NULL,NULL,NULL),(57,'4',NULL,'Payment of Semi-Expandable Other Machinery and Equipment',NULL,NULL,NULL,NULL),(58,'4',NULL,'Payment of Semi-Expandable Furniture and Fixtures',NULL,NULL,NULL,NULL),(59,'4',NULL,'Payment of Semi-Expandable Books',NULL,NULL,NULL,NULL),(60,'4',NULL,'Payment of Postage and Deliveries',NULL,NULL,NULL,NULL),(61,'4',NULL,'Payment of Telephone- Mobile',NULL,NULL,NULL,NULL),(62,'4',NULL,'Payment of Landline',NULL,NULL,NULL,NULL),(63,'4',NULL,'Payment of Internet subscription',NULL,NULL,NULL,NULL),(64,'4',NULL,'Payment of Cable, Satellite, Telegraph and Radio Expenses',NULL,NULL,NULL,NULL),(65,'4',NULL,'Awards/ Rewards Expenses',NULL,NULL,NULL,NULL),(66,'4',NULL,'Payment of Other General Services',NULL,NULL,NULL,NULL),(67,'4',NULL,'Payment of Security Services',NULL,NULL,NULL,NULL),(68,'4',NULL,'Repair and Maint.: Building',NULL,NULL,NULL,NULL),(69,'4',NULL,'Repair and Maint.: Office Equipment',NULL,NULL,NULL,NULL),(70,'4',NULL,'Repair and Maint.: ICT Equipment',NULL,NULL,NULL,NULL),(71,'4',NULL,'Repair and Maint.: Other Machinery and Equipment',NULL,NULL,NULL,NULL),(72,'4',NULL,'Repair and Maint.: Motor Vehicles',NULL,NULL,NULL,NULL),(73,'4',NULL,'Repair and Maint.: Furniture and Fixtures',NULL,NULL,NULL,NULL),(74,'4',NULL,'Payment of Taxes duties and licenses',NULL,NULL,NULL,NULL),(75,'4',NULL,'Payment of Advertising Expenses',NULL,NULL,NULL,NULL),(76,'4',NULL,'Payment of Printing and Publication',NULL,NULL,NULL,NULL),(77,'4',NULL,'Representation Expenses',NULL,NULL,NULL,NULL),(78,'4',NULL,'Payment of Transportation and Delivery',NULL,NULL,NULL,NULL),(79,'4',NULL,'Rent- Building and Structures',NULL,NULL,NULL,NULL),(80,'4',NULL,'Rent- Motor Vehicles',NULL,NULL,NULL,NULL),(81,'4',NULL,'Rent- Equipment',NULL,NULL,NULL,NULL),(82,'4',NULL,'Procurement of Office Supplies',NULL,NULL,NULL,NULL),(83,'4',NULL,'OTHER SUPPLIES',NULL,NULL,NULL,NULL),(84,'4',NULL,'LEGAL SERVICES',NULL,NULL,NULL,NULL),(85,'4',NULL,'DRUGS AND MEDICINES TOTAL',NULL,NULL,NULL,NULL),(86,'4',NULL,'Procurement of Fuel, Oil and Lubricants',NULL,NULL,NULL,NULL),(87,'4',NULL,'Payment of Semi-Expandable Office Equipment',NULL,NULL,NULL,NULL),(88,'4',NULL,'Payment of Semi-Expandable ICT Equipment',NULL,NULL,NULL,NULL),(89,'4',NULL,'Payment of Semi-Expandable Medical Equipment',NULL,NULL,NULL,NULL),(90,'4',NULL,'Payment of Semi-Expandable Other Machinery and Equipment',NULL,NULL,NULL,NULL),(91,'4',NULL,'Payment of Semi-Expandable Furniture and Fixtures',NULL,NULL,NULL,NULL),(92,'4',NULL,'Payment of Semi-Expandable Books',NULL,NULL,NULL,NULL),(93,'4',NULL,'Payment of Postage and Deliveries',NULL,NULL,NULL,NULL),(94,'4',NULL,'Payment of Telephone- Mobile',NULL,NULL,NULL,NULL),(95,'4',NULL,'Payment of Landline',NULL,NULL,NULL,NULL),(96,'4',NULL,'Payment of Internet subscription',NULL,NULL,NULL,NULL),(97,'4',NULL,'Payment of Cable, Satellite, Telegraph and Radio Expenses',NULL,NULL,NULL,NULL),(98,'4',NULL,'Awards/ Rewards Expenses',NULL,NULL,NULL,NULL),(99,'4',NULL,'Payment of Other General Services',NULL,NULL,NULL,NULL),(100,'4',NULL,'Payment of Security Services',NULL,NULL,NULL,NULL),(101,'4',NULL,'Repair and Maint.: Building',NULL,NULL,NULL,NULL),(102,'4',NULL,'Repair and Maint.: Office Equipment',NULL,NULL,NULL,NULL),(103,'4',NULL,'Repair and Maint.: ICT Equipment',NULL,NULL,NULL,NULL),(104,'4',NULL,'Repair and Maint.: Other Machinery and Equipment',NULL,NULL,NULL,NULL),(105,'4',NULL,'Repair and Maint.: Motor Vehicles',NULL,NULL,NULL,NULL),(106,'4',NULL,'Repair and Maint.: Furniture and Fixtures',NULL,NULL,NULL,NULL),(107,'4',NULL,'Payment of Taxes duties and licenses',NULL,NULL,NULL,NULL),(108,'4',NULL,'Payment of Advertising Expenses',NULL,NULL,NULL,NULL),(109,'4',NULL,'Payment of Printing and Publication',NULL,NULL,NULL,NULL),(110,'4',NULL,'Representation Expenses',NULL,NULL,NULL,NULL),(111,'4',NULL,'Payment of Transportation and Delivery',NULL,NULL,NULL,NULL),(112,'4',NULL,'Rent- Building and Structures',NULL,NULL,NULL,NULL),(113,'4',NULL,'Rent- Motor Vehicles',NULL,NULL,NULL,NULL),(114,'4',NULL,'Rent- Equipment',NULL,NULL,NULL,NULL),(115,'4','{\"A. Venue, Meals and Accommodation\":[]}','LOCAL HEALTH SUPPORT DIVISION, OFFICE OF THE CHIEF',NULL,NULL,NULL,'2019-06-13 21:38:52'),(116,'4','{\"NATIONAL AIDS STI PREVENTION AND CONTROL PROGRAM\":[],\"EMERGING AND RE-EMERGING OF INFECTIOUS DISEASES (EREID) PROGRAM\":[],\"FOOD AND WATER-BORNE DISEASES PREVENTION AND CONTROL PROGRAM\":[],\"NATIONAL DENGUE PREVENTION AND CONTROL PROGRAM\":[],\"SOIL-TRANSMITTED HELMINTHIASIS CONTROL PROGRAM\":[],\"NATIONAL RABIES PREVENTION AND CONTROL PROGRAM\":[],\"NATIONAL MALARIA CONTROL AND ELIMINATION PROGRAM\":[],\"NATIONAL FILARIASIS ELIMINATION PROGRAM\":[],\"NATIONAL LEPROSY CONTROL PROGRAM\":[],\"NATIONAL SCHISTOSOMIASIS CONTROL AND ELIMINATION PROGRAM\":[],\"NATIONAL TUBERCULOSIS CONTROL PROGRAM\":[]}','COMMUNICABLE DISEASES SECTION (CDS)',NULL,NULL,NULL,'2019-06-13 22:28:34'),(117,'4','{\"Venue, Meals and Accommodation\":[]}','FAMILY HEALTH SECTION',NULL,NULL,NULL,'2019-06-13 22:35:34'),(118,'4','{\"Regionwide\":[]}','Safe Motherhood Program',NULL,NULL,NULL,'2019-06-13 22:36:23'),(119,'4','{\"Regionwide\":[]}','Newborn and Infant Health',NULL,NULL,NULL,'2019-06-13 22:36:43'),(120,'4','{\"Regionwide\":[]}','Barangay Health Worker',NULL,NULL,NULL,'2019-06-13 22:39:04'),(121,'4','{\"Cebu Province\":[],\"Bohol Province\":[],\"Negros Oriental Province\":[],\"Siquijor Province\":[],\"Cebu City\":[],\"Regionwide\":[]}','Oral Health Program',NULL,NULL,NULL,'2019-06-13 22:39:04'),(122,'4','{\"Cebu Province\":[],\"Bohol Province\":[],\"Negros Oriental and Siquijor\":[],\"Regionwide\":[]}','Micronutrient Supplementation Program, Nutritional Status Assessment/Growth Monitoring and Promotion',NULL,NULL,NULL,'2019-06-13 22:50:03'),(123,'4',NULL,'Philippine Integrated Management on Acute Malnutrition (PIMAM)',NULL,NULL,NULL,NULL),(124,'4','{\"Expanded Program on Immunization\":[\"Regionwide\"]}','Child Health Programs',NULL,NULL,NULL,'2019-06-13 22:50:03'),(125,'4','{\"Management of Sick Child\":[\"Integrated Management of Childhood Illnes\"]}','Newborn Screening Program',NULL,NULL,NULL,'2019-06-13 22:50:03'),(126,'4','{\"Venue, Meals and Accommodation\":[\"Environmental and Occupational Health Unit (EOHU)\",\"Hospital Operations Management Service (HOMS)\",\"Medicine Access Service Unit (MASU)\"]}','HEALTH FACILITIES DEVELOPMENT SECTION (HFDS)',NULL,NULL,NULL,'2019-06-13 22:50:03'),(127,'4',NULL,'HEALTH FACILITIES ENHANCEMENT SECTION (HFES)',NULL,NULL,NULL,NULL),(128,'4',NULL,'HEALTH HUMAN RESOURCES DEVELOPMENT UNIT (HHRDU)',NULL,NULL,NULL,NULL),(129,'4','{\"Venue, Meals and Accommodation\":[]}','HEALTH RESEARCH, DEVELOPMENT, INFORMATION AND PROMOTION SECTION (HRDIPS)',NULL,NULL,NULL,'2019-06-13 22:50:03'),(130,'4','{\"Health Leadership and Governance Program (HLGP)\":[],\"Provincial Leadership and Governance Program (PLGP)\":[],\"Municipal Leadership and Governance Program (MLGP)\":[]}','HEALTH SYSTEMS DEVELOPMENT SECTION (HSDS)',NULL,NULL,NULL,'2019-06-13 22:50:04'),(131,'4',NULL,'HEALTH SECTOR PERFORMANCE MONITORING UNIT (HSPMU)',NULL,NULL,NULL,NULL),(132,'4','{\"Prevention of Blindness Program\":[\"Cebu Province\",\"Negros Oriental and Siquijor Province\",\"Bohol Province\"],\"Violence and Injury Prevention Program\":[\"Regionwide\"],\"Tobacco Control Program\\t\":[\"Regionwide\"],\"Substance Abuse Program\":[\"Regionwide\"],\"Mental Health and Persons with Disabilities Program\":[\"Regionwide\"]}','NON- COMMUNICABLE DISEASES SECTION (NCDS) ',NULL,NULL,NULL,'2019-06-13 22:50:04'),(133,'4',NULL,'PDOH - BOHOL PROVINCE',NULL,NULL,NULL,NULL),(134,'4',NULL,'PDOH - CEBU PROVINCE',NULL,NULL,NULL,NULL),(135,'4',NULL,'PDOH - NEGROS ORIENTAL PROVINCE',NULL,NULL,NULL,NULL),(136,'4',NULL,'PDOH - NEGROS ORIENTAL PROVINCE',NULL,NULL,NULL,NULL),(137,'4',NULL,'PDOH - SIQUIJOR',NULL,NULL,NULL,NULL),(138,'4',NULL,'HEALTH SECTOR RESEARCH DEVELOPMENT (HSRD)',NULL,NULL,NULL,NULL),(139,'4',NULL,'HEALTH PROMOTION (HP)',NULL,NULL,NULL,NULL),(140,'4',NULL,'LOCAL HEALTH SYSTEMS DEVELOPMENT AND ASSISSTANCE (LHSDA)',NULL,NULL,NULL,NULL),(141,'4',NULL,'HUMAN RESOURCES FOR HEALTH AND INSTITUTIONAL CAPACITY MANAGEMENT (HRHICM)',NULL,NULL,NULL,NULL),(142,'4',NULL,'EPIDEMIOLOGY AND SURVEILLANCE (ES)',NULL,NULL,NULL,NULL),(143,'4','{\"Prevention of Blindness Program\":[\"Cebu Province\",\"Negros Oriental and Siquijor Province\",\"Bohol Province\"],\"Violence and Injury Prevention Program\":[\"Regionwide\"],\"Tobacco Control Program\\t\":[\"Regionwide\"],\"Substance Abuse Program\":[\"Regionwide\"],\"Mental Health and Persons with Disabilities Program\":[\"Regionwide\"]}','Regional Epidemiology and Surveillance Unit (RESU)',NULL,NULL,NULL,'2019-06-13 22:50:04'),(144,'4','{\"Venue, meals and accommodation\":[]}','FIELD HEALTH SERVICES INFORMATION SYSTEM (FHSIS)',NULL,NULL,NULL,'2019-06-13 22:50:04'),(145,'4',NULL,'HEALTH EMERGENCY PREPAREDNESS AND RESPONSE  (HEPR)',NULL,NULL,NULL,NULL),(146,'4','{\"Preparedness\":[],\"Response\":[]}','Health Emergency Management Services (HEMS)	',NULL,NULL,NULL,'2019-06-13 22:50:04'),(147,'4',NULL,'OPERATION OF BLOOD CENTERS AND NATIONAL VOLUNTARY BLOOD SERVICES PROGRAM (OBCNVBSP)',NULL,NULL,NULL,NULL),(148,'4',NULL,'Procurement of Medical, Dental and Laboratory Supplies',NULL,NULL,NULL,NULL),(149,'4',NULL,'Payment of Subscription Expense - ICT Software Subscription',NULL,NULL,NULL,NULL),(150,'4',NULL,'Payment of Other Maintenance and Operating Expenses',NULL,NULL,NULL,NULL),(151,NULL,NULL,'',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=1217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'1','0454','1','6','42','1-A-1','2019-00008','Clip - Backfold - 1\"','pcs','0','10','120','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(2,'2','0618','1','6','42','1-A-1',NULL,'Clip - Backfold - 2\"','pcs','0','10','90','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(3,'3','0618','1','6','42','1-A-1',NULL,'Clip - Paper, 32mm, 100','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(4,'4','0618','1','6','42','1-A-1',NULL,'Clip - Paper, 48mm, 100','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(5,'5','0618','1','6','42','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(6,'6','0618','1','6','42','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Green','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(7,'7','0618','1','6','42','1-A-1',NULL,'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Red','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:44'),(8,'8','0618','1','6','42','1-A-1',NULL,'Envelope - Brown, Long','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(9,'9','0618','1','6','42','1-A-1',NULL,'Envelope - Expanding, Long with garter','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(10,'10','0618','1','6','42','1-A-1',NULL,'Envelope - Mailing/Letter, Long, White, 500','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(11,'11','0618','1','6','42','1-A-1',NULL,'Envelope - Mailing/Letter, Window, Long, White, 500','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(12,'12','0618','1','6','42','1-A-1',NULL,'Fastener - Plastic, 50','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(13,'13','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 4','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(14,'14','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 3','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(15,'15','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 2','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(16,'16','0618','1','6','42','1-A-1',NULL,'Fastener - Screw type 1','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(17,'17','0618','1','6','42','1-A-1',NULL,'Folder - Long, White, 14 pts.','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(18,'18','0618','1','6','42','1-A-1',NULL,'Glue - All Purpose, 130g','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(19,'19','0618','1','6','42','1-A-1',NULL,'Ink - Stamp Pad, 50ml, violet','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(20,'20','0618','1','6','42','1-A-1',NULL,'Note Pad Stick-on  3\" x  4\", 100 sheets/pad','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(21,'21','0618','1','6','42','1-A-1',NULL,'Paper - Bondpaper, A4, Substance 20','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(22,'22','0618','1','6','42','1-A-1',NULL,'Paper - Bondpaper, Long, Substance 20','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(23,'23','0618','1','6','42','1-A-1',NULL,'Paper - Fax, 216mm x 30mm','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(24,'24','0618','1','6','42','1-A-1',NULL,'Paper - Laid, 8 1/2\"x11\", 500','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(25,'25','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(26,'26','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(27,'27','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Green','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(28,'28','0618','1','6','42','1-A-1',NULL,'Pen - Ballpen, Red (COA Only)','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(29,'29','0618','1','6','42','1-A-1',NULL,'Pen - Highlighter, Neon Green/Yellow','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(30,'30','0618','1','6','42','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(31,'31','0618','1','6','42','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(32,'32','0618','1','6','42','1-A-1',NULL,'Pen - Marker, Permanent, Broad, Red','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(33,'33','0618','1','6','42','1-A-1',NULL,'Pen - Signpen, 0.5 MM, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(34,'34','0618','1','6','42','1-A-1',NULL,'Pen - Signpen, 0.5 MM, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:45'),(35,'35','0618','1','6','42','1-A-1',NULL,'Record Book - 150 Leaves, smyth sewn','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(36,'36','0618','1','6','42','1-A-1',NULL,'Record Book - 300 Leaves, smyth sewn','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(37,'37','0618','1','6','42','1-A-1',NULL,'Rubberband, 350 grams','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(38,'38','0618','1','6','42','1-A-1',NULL,'Staple Wire - # 35','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(39,'39','0618','1','6','42','1-A-1',NULL,'Staple Wire - # 23 x 10','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(40,'40','0618','1','6','42','1-A-1',NULL,'Tape - Masking, 1\", 25m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(41,'41','0618','1','6','42','1-A-1',NULL,'Tape - Masking, 2\", 25m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(42,'42','0618','1','6','42','1-A-1',NULL,'Tape - Masking, 2\", 50m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(43,'43','0618','1','6','42','1-A-1',NULL,'Tape - Transparent, 1\", 50m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(44,'44','0618','1','6','42','1-A-1',NULL,'Tape - Transparent, 2\", 25m','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(45,'45','0618','1','6','42','1-A-1',NULL,'USB 16 GB','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(46,'46','0618','1','6','42','1-A-2',NULL,'Cartolina, Assorted Color, 78 gsm min','pcs','0','10','0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(47,'47','0618','1','6','42','1-A-2',NULL,'Cartolina, White, 99 gsm min','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(48,'48','0618','1','6','42','1-A-2',NULL,'Eraser - Whiteboard, Felt','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(49,'49','0618','1','6','42','1-A-2',NULL,'ID Sling - Garterized with name tags (landscape)','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(50,'50','0618','1','6','42','1-A-2',NULL,'Manila Paper, 36\" x 48\", Pre-cut','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(51,'51','0618','1','6','42','1-A-2',NULL,'Metacards (4 colors) 100','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(52,'52','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Black','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(53,'53','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Blue','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(54,'54','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Green','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(55,'55','0618','1','6','42','1-A-2',NULL,'Pen - Whiteboard, Fine, Red','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(56,'56','0618','1','6','42','1-A-3',NULL,'Ink - Duplicating Machine','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(57,'57','0618','1','6','42','1-A-3',NULL,'Master Roll - Duplicating Machine','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(58,'58','0618','1','6','42','1-A-3',NULL,'Developer - Copier','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(59,'59','0618','1','6','42','1-A-3',NULL,'Drum - Copier','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:46'),(60,'60','0618','1','6','42','1-A-3',NULL,'Toner - Copier','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(61,'61','0618','1','6','42','1-A-3',NULL,'Toner - Computer Printer','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(62,'62','0618','1','6','42','1-B',NULL,'Calculator, 12 digits, dual power','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(63,'63','0618','1','6','42','1-B',NULL,'Puncher, Heavy Duty, 2 Hole','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(64,'64','0618','1','6','42','1-B',NULL,'Ruler, 12\", Plastic, Transparent','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(65,'65','0618','1','6','42','1-B',NULL,'Scissors, 8\", Metal Handle','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(66,'66','0618','1','6','42','1-B',NULL,'Sharpener, Table Type, Heavy Duty','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(67,'67','0618','1','6','42','1-B',NULL,'Stamp Pad, 3\" x 5\"','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(68,'68','0618','1','6','42','1-B',NULL,'Stapler with Staple Remover # 35, Heavy Duty','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(69,'69','0618','1','6','42','1-B',NULL,'Stapler, Heavy Duty, 23/6 - 23/24mm staples, maximum paper 210 sheets','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(70,'70','0618','1','6','42','1-B',NULL,'Wire, Extension, 5 meters, 3 gangs','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(71,'71','0618','1','6','42','1-B',NULL,'USB Wireless Laser Pointer Presenter, USB 3.0/USB 2.0, 10m away, function page up and down','pcs','0',NULL,'0','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fixed',NULL,NULL,'2019-07-27 00:23:47'),(72,NULL,'0618','2','6',NULL,'',NULL,'Check book/blank check, MDS','pcs','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(73,NULL,'0618','2','6',NULL,'',NULL,'Check book/blank check, TF','pcs','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(74,NULL,'0618','2','6',NULL,'',NULL,'Official Receipt','pcs','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(75,NULL,'0618','6','6',NULL,NULL,NULL,'Airconditioning Unit, window type, 1hp','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(76,NULL,'0618','6','6',NULL,NULL,NULL,'Camera, Digital','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(77,NULL,'0618','6','6',NULL,NULL,NULL,'Electric Fan','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(78,NULL,'0618','6','6',NULL,NULL,NULL,'Fax Machine','unit','','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(79,NULL,'0618','7','6',NULL,NULL,NULL,'Automatic Voltage Regulator',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(80,NULL,'0618','7','6',NULL,NULL,NULL,'Computer Desk Top (whole set)',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(82,NULL,'0618','7','6',NULL,NULL,NULL,'Keyboard',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(83,NULL,'0618','7','6',NULL,NULL,NULL,'Laptop',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(85,NULL,'0618','7','6',NULL,NULL,NULL,'Mouse',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(89,NULL,'0618','7','6',NULL,NULL,NULL,'Wireless Router',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(90,NULL,'0050','8','6',NULL,NULL,NULL,'Handheld Two-Way Radio',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(91,NULL,'0050','10','6',NULL,NULL,NULL,'BP Apparatus',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(92,NULL,'0050','11','6',NULL,NULL,NULL,'Compressor',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(93,NULL,'0050','12','6',NULL,NULL,NULL,'Chair',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(94,NULL,'0050','12','6',NULL,NULL,NULL,'Table',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(95,NULL,'0050','14','6',NULL,NULL,NULL,'Chemicals',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(96,NULL,'0050','14','6',NULL,NULL,NULL,'Jacket',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(97,NULL,'0050','14','6',NULL,NULL,NULL,'Tarpaulins',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(98,NULL,'0050','14','6',NULL,NULL,NULL,'T-shirts',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(99,NULL,'0050','20','6',NULL,NULL,NULL,'Frames',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(100,NULL,'0050','20','6',NULL,NULL,NULL,'Plaques',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(101,NULL,'0050','20','6',NULL,NULL,NULL,'Rings',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(102,NULL,'0050','27','6',NULL,NULL,NULL,'Ceiling',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(103,NULL,'0050','27','6',NULL,NULL,NULL,'Door',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(104,NULL,'0050','27','6',NULL,NULL,NULL,'Floor',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(105,NULL,'0050','27','6',NULL,NULL,NULL,'Wall',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(106,NULL,'0050','28','6',NULL,NULL,NULL,'Central Processing Unit',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(107,NULL,'0050','28','6',NULL,NULL,NULL,'Monitor',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(108,NULL,'0050','28','6',NULL,NULL,NULL,'Notebook',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(109,NULL,'0050','28','6',NULL,NULL,NULL,'Printer with Scanner and Copier',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL),(110,NULL,'0050','28','6',NULL,NULL,NULL,'Uninterrupted Power Supply',NULL,'','','','small value','','','','','','','','','','','','','fixed',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (24,'2019_05_22_081031_create_expense_code',1),(46,'2014_10_12_000000_create_users_table',2),(47,'2014_10_12_100000_create_password_resets_table',2),(48,'2019_05_22_081031_create_expense',2),(49,'2019_05_23_042748_create_charge_to',2),(50,'2019_05_27_050408_create_pap',2),(51,'2019_05_28_014538_create_item',2),(52,'2019_06_06_032429_create_mode_procurement',3),(53,'2019_07_27_021606_create_qty',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qty`
--

LOCK TABLES `qty` WRITE;
/*!40000 ALTER TABLE `qty` DISABLE KEYS */;
INSERT INTO `qty` VALUES (13,'1','1','0618','6','42','1','1','1','1','1','1','1','1','1','1','1','1',NULL,NULL,'2019-07-26 22:59:29','2019-07-27 00:15:14'),(14,'1','1','0619','6','42','1','1','1','1','1','1','1','1','1','1','1','1',NULL,NULL,'2019-07-27 00:07:06','2019-07-27 00:10:03'),(15,'2','2','0619','6','42','1','2','2','2','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-27 00:10:31','2019-07-27 00:23:44'),(16,'46','46','0618','6','42','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-27 00:18:26','2019-07-27 00:18:26');
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

-- Dump completed on 2019-07-27 16:25:03
