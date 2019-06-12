-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 02:01 PM
-- Server version: 10.3.8-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `charge_to`
--

CREATE TABLE `charge_to` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charge_to`
--

INSERT INTO `charge_to` (`id`, `userid`, `division`, `section`, `description`, `beginning_balance`, `remaining_balance`, `datein`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0618', '6', '42', 'saa #90009090909', '1000', '0', '1232-12-12', '1', NULL, '2019-05-28 01:08:22', '2019-05-28 01:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `code`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '{\"A. CONSUMABLES:\":[\"1. COMMON-USE\\/REGULAR\\/STANDARD OFFICE SUPPLIES:\",\"2. TRAINING SUPPLIES:\",\"3. EQUIPMENT CONSUMABLES\"],\"B. NON-CONSUMABLE:\":[],\"C. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION\":[]}', 'I. OFFICE SUPPLIES', NULL, NULL, NULL, '2019-05-28 19:18:09'),
(2, NULL, 'II. ACCOUNTABLE FORMS', NULL, NULL, NULL, NULL),
(3, NULL, 'III. DRUGS AND MEDICINES', NULL, NULL, NULL, NULL),
(4, NULL, 'IV. MEDICAL, DENTAL AND LABORATORY SUPPLIES', NULL, NULL, NULL, NULL),
(5, NULL, 'V. FUEL, OIL AND LUBRICANTS (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(6, NULL, 'VI. SEMI-EXPENDABLE - OFFICE EQUIPMENT', NULL, NULL, NULL, NULL),
(7, NULL, 'VII. SEMI-EXPENDABLE - ICT EQUIPMENT', NULL, NULL, NULL, NULL),
(8, NULL, 'VIII. SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT', NULL, NULL, NULL, NULL),
(9, NULL, 'IX. SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT', NULL, NULL, NULL, NULL),
(10, NULL, 'X. SEMI-EXPENDABLE - MEDICAL EQUIPMENT', NULL, NULL, NULL, NULL),
(11, NULL, 'XI. SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT', NULL, NULL, NULL, NULL),
(12, NULL, 'XII. SEMI-EXPENDABLE - FURNITURE AND FIXTURES', NULL, NULL, NULL, NULL),
(13, NULL, 'XIII. SEMI-EXPENDABLE - BOOKS (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(14, NULL, 'XIV. OTHER SUPPLIES AND MATERIALS EXPENSE', NULL, NULL, NULL, NULL),
(15, NULL, 'XV. POSTAGE AND COURIER SERVICES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(16, NULL, 'XVI. TELEPHONE - MOBILE (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(17, NULL, 'XVII. TELEPHONE - LANDLINE (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(18, NULL, 'XVIII. INTERNET SUBSCRIPTION EXPENSES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(19, NULL, 'XIX. CABLE, SATELLITE, TELEGRAPH AND RADIO EXPENSES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(20, NULL, 'XX. AWARDS/REWARDS EXPENSES', NULL, NULL, NULL, NULL),
(21, NULL, 'XXII. SURVEY EXPENSES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(22, NULL, 'XXIII. LEGAL SERVICES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(23, NULL, 'XIV. CONSULTANCY SERVICES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(24, NULL, 'XV. JANITORIAL SERVICES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(25, NULL, 'XVI. SECURITY SERVICES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(26, NULL, 'XVII. OTHER GENERAL SERVICES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(27, NULL, 'XVIII. REPAIR MAINTENANCE - BUILDINGS', NULL, NULL, NULL, NULL),
(28, NULL, 'XXX. REPAIR MAINTENANCE - ICT EQUIPMENT', NULL, NULL, NULL, NULL),
(29, NULL, 'XXXI. REPAIR MAINTENANCE - COMMUNICATION EQUIPMENT', NULL, NULL, NULL, NULL),
(30, NULL, 'XXXII. REPAIR MAINTENANCE - DISASTER RESPONSE AND RESCUE EQUIPMENT', NULL, NULL, NULL, NULL),
(31, NULL, 'XXXIII. REPAIR MAINTENANCE - OTHER MACHINERY AND EQUIPMENT', NULL, NULL, NULL, NULL),
(32, NULL, 'XXXIV. REPAIR MAINTENANCE - MOTOR VEHICLE', NULL, NULL, NULL, NULL),
(33, NULL, 'XXXV. REPAIR MAINTENANCE - FURNITURE AND FIXTURES', NULL, NULL, NULL, NULL),
(34, NULL, 'XXXVI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OFFICE EQUIPMENT', NULL, NULL, NULL, NULL),
(35, NULL, 'XXXVII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - ICT EQUIPMENT', NULL, NULL, NULL, NULL),
(36, NULL, 'XXXVIII. REPAIR MAINTENANCE - SEMI-EXPENDABLE - COMMUNICATION EQUIPMENT', NULL, NULL, NULL, NULL),
(37, NULL, 'XXXIX. REPAIR MAINTENANCE - SEMI-EXPENDABLE - DISASTER RESPONSE AND RESCUE EQUIPMENT', NULL, NULL, NULL, NULL),
(38, NULL, 'XL. REPAIR MAINTENANCE - SEMI-EXPENDABLE - OTHER MACHINERY AND EQUIPMENT', NULL, NULL, NULL, NULL),
(39, NULL, 'XLI. REPAIR MAINTENANCE - SEMI-EXPENDABLE - FURNITURE AND FIXTURES', NULL, NULL, NULL, NULL),
(40, NULL, 'XLII.  ADVERTISING EXPENSES', NULL, NULL, NULL, NULL),
(41, NULL, 'XLIII. PRINTING AND PUBLICATION EXPENSES', NULL, NULL, NULL, NULL),
(42, NULL, 'XLIV.TRANSPORTATION AND DELIVERY EXPENSES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(43, NULL, 'XLV. RENT - BUILDING AND STRUCTURES (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(44, NULL, 'XLVI. RENT - MOTOR VEHICLE (One Line - Amount Only - for the Whole Division)', NULL, NULL, NULL, NULL),
(45, NULL, 'XLVII. RENT - EQUIPMENT', NULL, NULL, NULL, NULL),
(46, NULL, 'XLVIII. RENT - ICT MACHINERY AND EQUIPMENT', NULL, NULL, NULL, NULL),
(47, NULL, 'L. REPRESENTATION EXPENSES', NULL, NULL, NULL, NULL),
(48, NULL, 'LI. TRAINING EXPENSES', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `userid`, `expense_id`, `tranche`, `code`, `description`, `unit_measurement`, `qty`, `unit_cost`, `estimated_budget`, `mode_procurement`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0454', '1', '1-A-1', '2019-00008', 'Clip - Backfold - 1\"', 'pcs', '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(2, '0618', '1', '1-A-1', NULL, 'Clip - Backfold - 2\"', 'pcs', '21', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(3, '0618', '1', '1-A-1', NULL, 'Clip - Paper, 32mm, 100\'s/box', 'pcs', '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(4, '0618', '1', '1-A-1', NULL, 'Clip - Paper, 48mm, 100\'s/box', 'pcs', '23', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(5, '0618', '1', '1-A-1', NULL, 'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Blue', 'pcs', '24', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(6, '0618', '1', '1-A-1', NULL, 'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Green', 'pcs', '25', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(7, '0618', '1', '1-A-1', NULL, 'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Red', 'pcs', '26', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(8, '0618', '1', '1-A-1', NULL, 'Envelope - Brown, Long', 'pcs', '27', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(9, '0618', '1', '1-A-1', NULL, 'Envelope - Expanding, Long with garter', 'pcs', '28', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(10, '0618', '1', '1-A-1', NULL, 'Envelope - Mailing/Letter, Long, White, 500\'s/box', 'pcs', '29', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(11, '0618', '1', '1-A-1', NULL, 'Envelope - Mailing/Letter, Window, Long, White, 500\'s/box', 'pcs', '30', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(12, '0618', '1', '1-A-1', NULL, 'Fastener - Plastic, 50\'s', 'pcs', '31', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(13, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 4\'\'', 'pcs', '32', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(14, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 3\'\'', 'pcs', '33', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(15, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 2\'\'', 'pcs', '34', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(16, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 1\'\'', 'pcs', '35', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(17, '0618', '1', '1-A-1', NULL, 'Folder - Long, White, 14 pts.', 'pcs', '36', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(18, '0618', '1', '1-A-1', NULL, 'Glue - All Purpose, 130g ', 'pcs', '37', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(19, '0618', '1', '1-A-1', NULL, 'Ink - Stamp Pad, 50ml, violet', 'pcs', '38', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(20, '0618', '1', '1-A-1', NULL, 'Note Pad Stick-on  3\" x  4\", 100 sheets/pad', 'pcs', '39', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(21, '0618', '1', '1-A-1', NULL, 'Paper - Bondpaper, A4, Substance 20', 'pcs', '40', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(22, '0618', '1', '1-A-1', NULL, 'Paper - Bondpaper, Long, Substance 20', 'pcs', '41', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(23, '0618', '1', '1-A-1', NULL, 'Paper - Fax, 216mm x 30mm', 'pcs', '42', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(24, '0618', '1', '1-A-1', NULL, 'Paper - Laid, 8 1/2\"x11\", 500\'s/box (for Certificates/License)', 'pcs', '43', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(25, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Black', 'pcs', '44', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(26, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Blue', 'pcs', '45', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(27, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Green', 'pcs', '46', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(28, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Red (COA Only)', 'pcs', '47', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(29, '0618', '1', '1-A-1', NULL, 'Pen - Highlighter, Neon Green/Yellow', 'pcs', '48', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(30, '0618', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Broad, Black', 'pcs', '49', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(31, '0618', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Broad, Blue', 'pcs', '50', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(32, '0618', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Broad, Red', 'pcs', '51', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(33, '0618', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Black', 'pcs', '52', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(34, '0618', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Blue', 'pcs', '53', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(35, '0618', '1', '1-A-1', NULL, 'Record Book - 150 Leaves, smyth sewn', 'pcs', '54', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(36, '0618', '1', '1-A-1', NULL, 'Record Book - 300 Leaves, smyth sewn', 'pcs', '55', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(37, '0618', '1', '1-A-1', NULL, 'Rubberband, 350 grams', 'pcs', '56', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(38, '0618', '1', '1-A-1', NULL, 'Staple Wire - # 35', 'pcs', '57', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(39, '0618', '1', '1-A-1', NULL, 'Staple Wire - # 23 x 10', 'pcs', '58', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(40, '0618', '1', '1-A-1', NULL, 'Tape - Masking, 1\", 25m', 'pcs', '59', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(41, '0618', '1', '1-A-1', NULL, 'Tape - Masking, 2\", 25m', 'pcs', '60', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(42, '0618', '1', '1-A-1', NULL, 'Tape - Masking, 2\", 50m', 'pcs', '61', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(43, '0618', '1', '1-A-1', NULL, 'Tape - Transparent, 1\", 50m', 'pcs', '62', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(44, '0618', '1', '1-A-1', NULL, 'Tape - Transparent, 2\", 25m', 'pcs', '63', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(45, '0618', '1', '1-A-1', NULL, 'USB 16 GB', 'pcs', '64', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(46, '0618', '1', '1-A-2', NULL, 'Cartolina, Assorted Color, 78 gsm min', 'pcs', '65', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(47, '0618', '1', '1-A-2', NULL, 'Cartolina, White, 99 gsm min', 'pcs', '66', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(48, '0618', '1', '1-A-2', NULL, 'Eraser - Whiteboard, Felt', 'pcs', '67', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(49, '0618', '1', '1-A-2', NULL, 'ID Sling - Garterized with name tags (landscape)', 'pcs', '68', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(50, '0618', '1', '1-A-2', NULL, 'Manila Paper, 36\" x 48\", Pre-cut', 'pcs', '69', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(51, '0618', '1', '1-A-2', NULL, 'Metacards (4 colors) 100\'s', 'pcs', '70', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(52, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Black', 'pcs', '71', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(53, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Blue', 'pcs', '72', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(54, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Green', 'pcs', '73', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(55, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Red', 'pcs', '74', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(56, '0618', '1', '1-A-3', NULL, 'Ink - Duplicating Machine ', 'pcs', '75', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(57, '0618', '1', '1-A-3', NULL, 'Master Roll - Duplicating Machine ', 'pcs', '76', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(58, '0618', '1', '1-A-3', NULL, 'Developer - Copier ', 'pcs', '77', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(59, '0618', '1', '1-A-3', NULL, 'Drum - Copier ', 'pcs', '78', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(60, '0618', '1', '1-A-3', NULL, 'Toner - Copier ', 'pcs', '79', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(61, '0618', '1', '1-A-3', NULL, 'Toner - Computer Printer', 'pcs', '80', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(62, '0618', '1', '1-B', NULL, 'Calculator, 12 digits, dual power', 'pcs', '81', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(63, '0618', '1', '1-B', NULL, 'Puncher, Heavy Duty, 2 Hole', 'pcs', '82', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(64, '0618', '1', '1-B', NULL, 'Ruler, 12\", Plastic, Transparent', 'pcs', '83', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(65, '0618', '1', '1-B', NULL, 'Scissors, 8\", Metal Handle', 'pcs', '84', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(66, '0618', '1', '1-B', NULL, 'Sharpener, Table Type, Heavy Duty', 'pcs', '85', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(67, '0618', '1', '1-B', NULL, 'Stamp Pad, 3\" x 5\"    ', 'pcs', '86', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(68, '0618', '1', '1-B', NULL, 'Stapler with Staple Remover # 35, Heavy Duty', 'pcs', '87', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(69, '0618', '1', '1-B', NULL, 'Stapler, Heavy Duty, 23/6 - 23/24mm staples, maximum paper 210 sheets', 'pcs', '88', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(70, '0618', '1', '1-B', NULL, 'Wire, Extension, 5 meters, 3 gangs', 'pcs', '89', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(71, '0618', '1', '1-B', NULL, 'USB Wireless Laser Pointer Presenter, USB 3.0/USB 2.0, 10m away, function page up and down', 'pcs', '90', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(72, '0618', '2', '', NULL, 'Check book/blank check, MDS', 'pcs', '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(73, '0618', '2', '', NULL, 'Check book/blank check, TF', 'pcs', '21', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(74, '0618', '2', '', NULL, 'Official Receipt', 'pcs', '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(75, '0618', '6', NULL, NULL, 'Airconditioning Unit, window type, 1hp', 'unit', '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(76, '0618', '6', NULL, NULL, 'Camera, Digital', 'unit', '21', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(77, '0618', '6', NULL, NULL, 'Electric Fan', 'unit', '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(78, '0618', '6', NULL, NULL, 'Fax Machine', 'unit', '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(79, '0618', '7', NULL, NULL, 'Automatic Voltage Regulator', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(80, '0618', '7', NULL, NULL, 'Computer Desk Top (whole set)', NULL, '21', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(81, '0618', '7', NULL, NULL, 'Central Processing Unit', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(82, '0618', '7', NULL, NULL, 'Keyboard', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(83, '0618', '7', NULL, NULL, 'Laptop', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(84, '0618', '7', NULL, NULL, 'Monitor', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(85, '0618', '7', NULL, NULL, 'Mouse', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(86, '0618', '7', NULL, NULL, 'Notebook', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(87, '0618', '7', NULL, NULL, 'Printer with Scanner and Copier', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(88, '0618', '7', NULL, NULL, 'Uninterrupted Power Supply', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(89, '0618', '7', NULL, NULL, 'Wireless Router', NULL, '22', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(90, '0050', '8', NULL, NULL, 'Handheld Two-Way Radio', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(91, '0050', '10', NULL, NULL, 'BP Apparatus', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(92, '0050', '11', NULL, NULL, 'Compressor', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(93, '0050', '12', NULL, NULL, 'Chair', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(94, '0050', '12', NULL, NULL, 'Table', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(95, '0050', '14', NULL, NULL, 'Chemicals', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(96, '0050', '14', NULL, NULL, 'Jacket', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(97, '0050', '14', NULL, NULL, 'Tarpaulins', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(98, '0050', '14', NULL, NULL, 'T-shirts', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(99, '0050', '20', NULL, NULL, 'Frames', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(100, '0050', '20', NULL, NULL, 'Plaques', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(101, '0050', '20', NULL, NULL, 'Rings', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(102, '0050', '27', NULL, NULL, 'Ceiling', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(103, '0050', '27', NULL, NULL, 'Door', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(104, '0050', '27', NULL, NULL, 'Floor', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(105, '0050', '27', NULL, NULL, 'Wall', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(106, '0050', '28', NULL, NULL, 'Central Processing Unit', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(107, '0050', '28', NULL, NULL, 'Monitor', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(108, '0050', '28', NULL, NULL, 'Notebook', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(109, '0050', '28', NULL, NULL, 'Printer with Scanner and Copier', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(110, '0050', '28', NULL, NULL, 'Uninterrupted Power Supply', NULL, '20', '2000', '20000', NULL, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'inactivate', NULL, NULL, NULL),
(111, '0454', '1', '1-A-1', NULL, 'Clip - Backfold - 1\"', 'pc', '487', '2.75', '1339.25', NULL, '487', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(112, '0454', '1', '1-A-1', NULL, 'Clip - Backfold - 2\"', 'pc', '657', '4.75', '3120.75', NULL, '657', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(113, '0454', '1', '1-A-1', NULL, 'Clip - Paper, 32mm, 100', 'box', '54', '5.5', '297', NULL, '54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(114, '0454', '1', '1-A-1', NULL, 'Clip - Paper, 48mm, 100', 'box', '59', '15.5', '914.5', NULL, '59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(115, '0454', '1', '1-A-1', NULL, 'Eraser - Correction Tape, Refill', 'pc', '184', '62', '11408', NULL, '184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(116, '0454', '1', '1-A-1', NULL, 'Eraser - Correction Tape, Refillable', 'pc', '65', '160', '10400', NULL, '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(117, '0454', '1', '1-A-1', NULL, 'Eraser - Rubber', 'pc', '34', '2.16', '73.44', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(118, '0454', '1', '1-A-1', NULL, 'Note Pad Stick-on 3\" * 4\", 100 sheets/pad', 'pad', '167', '54.06', '9028.02', NULL, '167', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(119, '0454', '1', '1-A-1', NULL, 'Pen - Ballpen, Black', 'pc', '211', '4.2', '886.2', NULL, '211', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(120, '0454', '1', '1-A-1', NULL, 'Pen - Ballpen, Blue', 'pc', '260', '4.2', '1092', NULL, '260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(121, '0454', '1', '1-A-1', NULL, 'Pen - Ballpen, Green', 'pc', '84', '4', '336', NULL, '84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(122, '0454', '1', '1-A-1', NULL, 'Pen - Ballpen, Red', 'pc', '91', '4.2', '382.2', NULL, '91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:38'),
(123, '0454', '1', '1-A-1', NULL, 'Pen - Highlighter, Neon Green', 'pc', '108', '17.75', '1917', NULL, '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(124, '0454', '1', '1-A-1', NULL, 'Pen - Highlighter, Neon Yellow', 'pc', '108', '18.75', '2025', NULL, '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(125, '0454', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Black', 'pc', '257', '44.01', '11310.57', NULL, '257', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(126, '0454', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Blue', 'pc', '247', '44.01', '10870.47', NULL, '247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(127, '0454', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Red', 'pc', '60', '19.75', '1185', NULL, '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(128, '0454', '1', '1-A-1', NULL, 'Pencil, No.2', 'pc', '163', '5', '815', NULL, '163', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(129, '0454', '1', '1-A-1', NULL, 'USB 16 GB', 'pc', '91', '234', '21294', NULL, '91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(130, '0454', '1', '1-A-1', NULL, 'Air freshener, can, spray', 'bottle', '31', '300', '9300', NULL, '31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(131, '0454', '1', '1-A-1', NULL, 'Data file Box - Standard Size, Blue', 'pc', '110', '150', '16500', NULL, '110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(132, '0454', '1', '1-A-1', NULL, 'Data File Box - Standard Size, Green', 'pc', '0', '150', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(133, '0454', '1', '1-A-1', NULL, 'Data File Box - Standard Size, Red', 'pc', '40', '150', '6000', NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(134, '0454', '1', '1-A-1', NULL, 'Envelope - Brown, Long', 'pc', '410', '1.5', '615', NULL, '410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(135, '0454', '1', '1-A-1', NULL, 'Envelope - Expanding, Long with garter', 'pc', '830', '9', '7470', NULL, '830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(136, '0454', '1', '1-A-1', NULL, 'Envelope - Mailing/Letter, Long, White, 500', 'box', '6', '185', '1110', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:39'),
(137, '0454', '1', '1-A-1', NULL, 'Envelope - Mailing/Letter, Windows, Long, White,500', 'box', '0', '285', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(138, '0454', '1', '1-A-1', NULL, 'Fasterner - Plastic, 50', 'box', '89', '20.25', '1802.25', NULL, '89', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(139, '0454', '1', '1-A-1', NULL, 'Folder - Long, White, 14pts.', 'pc', '500', '6', '3000', NULL, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(140, '0454', '1', '1-A-1', NULL, 'Glue - All Purpose, 200g', 'bottle', '59', '48.88', '2883.92', NULL, '59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(141, '0454', '1', '1-A-1', NULL, 'Ink - Stamp Pad, 50ml, violet', 'bottle', '26', '25', '650', NULL, '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(142, '0454', '1', '1-A-1', NULL, 'Paper - Bondpaper, Multi-Purpose, A4,Substance 20', 'ream', '387', '124', '47988', NULL, '387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(143, '0454', '1', '1-A-1', NULL, 'Paper - Bondpaper, Multi-Purpose, Long, Substance 20', 'ream', '692', '138', '95496', NULL, '692', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(144, '0454', '1', '1-A-1', NULL, 'Paper - Fax, 216mm * 30mm', 'roll', '210', '60', '12600', NULL, '210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(145, '0454', '1', '1-A-1', NULL, 'Paper - Laid, 8 1/2\" * 11\", 500', 'box', '100', '550', '55000', NULL, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(146, '0454', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Fine, Black', 'pc', '58', '23.5', '1363', NULL, '58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(147, '0454', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Fine, Blue', 'pc', '53', '23.5', '1245.5', NULL, '53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(148, '0454', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Fine, Red', 'pc', '33', '23.5', '775.5', NULL, '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(149, '0454', '1', '1-A-1', NULL, 'Record Book - 150 Leaves, smyth sewn', 'pc', '19', '35.25', '669.75', NULL, '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(150, '0454', '1', '1-A-1', NULL, 'Record Book - 300 Leaves, symth sewn', 'pc', '38', '50', '1900', NULL, '38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(151, '0454', '1', '1-A-1', NULL, 'Record Book - 500 Leaves,', 'pc', '34', '70', '2380', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(152, '0454', '1', '1-A-1', NULL, 'Rubberband ,350 grams', 'pc', '6', '195', '1170', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(153, '0454', '1', '1-A-1', NULL, 'Staper Wire - # 23 * 10', 'box', '20', '50', '1000', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(154, '0454', '1', '1-A-1', NULL, 'Staple Wire - # 35', 'box', '80', '22', '1760', NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(155, '0454', '1', '1-A-1', NULL, 'Tape - Duct Tape, Gray, 2\"', 'roll', '12', '120', '1440', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(156, '0454', '1', '1-A-1', NULL, 'Tape - Masking, 1\", 25m', 'roll', '64', '28', '1792', NULL, '64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(157, '0454', '1', '1-A-1', NULL, 'Tape - Packaging, 2\", 50m', 'roll', '355', '13', '4615', NULL, '355', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(158, '0454', '1', '1-A-1', NULL, 'Tape - Transparent, 1\" 50m', 'roll', '106', '7.5', '795', NULL, '106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:40'),
(159, '0454', '1', '1-A-1', NULL, 'Tape - Transparent, 48mm', 'roll', '139', '50', '6950', NULL, '139', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 00:10:41'),
(160, '0454', '1', '1-A-2', NULL, 'Cartolina, Assorted Color, 78 gsm min', 'pc', '39', '4.3', '167.7', NULL, '39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(161, '0454', '1', '1-A-2', NULL, 'Cartolina, White, 99 gsm min', 'pc', '10', '3.75', '37.5', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(162, '0454', '1', '1-A-2', NULL, 'Eraser - Whiteboard, Felt', 'pc', '1', '10.07', '10.07', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(163, '0454', '1', '1-A-2', NULL, 'ID Clip', 'pc', '0', '12', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(164, '0454', '1', '1-A-2', NULL, 'ID Sling - Garterized With name Tags', 'pc', '0', '8', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(165, '0454', '1', '1-A-2', NULL, 'Manila Paper, 36\" * 48\", Pre-cut', 'pc', '0', '2', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(166, '0454', '1', '1-A-2', NULL, 'Metacards (4 colors)', 'pc', '1', '75', '75', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(167, '201700272', '1', '1-A-3', NULL, 'Toner-Copier (1 unit) (Konika Minolata Bizhub 363)', 'pc', '4', '7250', '29000', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(168, '201700272', '1', '1-A-3', NULL, 'Toner-printer (1 unit) (Brother DCP-L2540DW)', 'pc', '10', '1500', '15000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(169, '201700272', '1', '1-A-3', NULL, 'UV DYE INK 100 ml, Black', 'pc', '12', '150', '1800', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(170, '201700272', '1', '1-A-3', NULL, 'UV DYE INK 100 ml, Cyan', 'pc', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(171, '201700272', '1', '1-A-3', NULL, 'UV DYE INK 100 ml, Magenta', 'pc', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(172, '201700272', '1', '1-A-3', NULL, 'UV DYE INK 100 ml, Yellow', 'pc', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:08'),
(173, '201400182', '1', '1-A-3', NULL, 'Ink Toner JRJ-2380', 'box', '3', '6000', '18000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(174, '201700263', '1', '1-A-3', NULL, 'Developer, Copier (1 unit) (Konika Minolta Bizhub 363', 'pc', '1', '4950', '4950', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(175, '201700263', '1', '1-A-3', NULL, 'Drum-Copier (1 unit) (Konika Minolta Bizhub 363) for existing unit Copier (JRJ Solutions)', 'pc', '1', '8050', '8050', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(176, '201700263', '1', '1-A-3', NULL, 'Toner-Copier (1 unit) (Konika Minolata Bizhub 363)2', 'pc', '1', '7250', '7250', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(177, '201700263', '1', '1-A-3', NULL, 'Toner-printer (1 unit) (Brother DCP-L2540DW)', 'pc', '5', '1500', '7500', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(178, '201900282', '1', '1-A-3', NULL, 'Developer, Copier (1 unit) (Konika Minolta Bizhub 363', 'pc', '2', '4950', '9900', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(179, '201900282', '1', '1-A-3', NULL, 'Drum-Copier (1 unit) (Konika Minolta Bizhub 363) for existing unit Copier (JRJ Solutions)', 'pc', '2', '8050', '16100', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(180, '201900282', '1', '1-A-3', NULL, 'Tape cartridge, TZ-253 for Brother P-Touch 2730, 24mm, 1\",laminated', 'cart', '10', '1000', '10000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(181, '201900282', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR BLACK (CF210A)', 'box', '36', '2080', '74880', NULL, '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(182, '201900282', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR CYAN (CF212A)', 'box', '15', '2080', '31200', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(183, '201900282', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR MAGENTA (CF213A)', 'box', '15', '2080', '31200', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(184, '201900282', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR YELLOW (CF212A)', 'box', '15', '2080', '31200', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(185, '201900282', '1', '1-A-3', NULL, 'Toner-Copier (1 unit) (Konika Minolata Bizhub 363)2', 'pc', '5', '7250', '36250', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(186, '201900282', '1', '1-A-3', NULL, 'Toner-printer (1 unit) (Brother DCP-L2540DW)', 'pc', '2', '1500', '3000', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(187, '201900282', '1', '1-A-3', NULL, 'Toner, printer HP Laserjet M1120 MFP (36A)', 'pc', '2', '3900', '7800', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(188, '197900046', '1', '1-A-3', NULL, 'Ink refill for Printer(Black)', 'pc', '4', '400', '1600', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(189, '197900046', '1', '1-A-3', NULL, 'Ink refill for Printer(Cyan)', 'pc', '4', '400', '1600', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(190, '197900046', '1', '1-A-3', NULL, 'Ink refill for Printer(Magenta)', 'pc', '4', '400', '1600', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(191, '197900046', '1', '1-A-3', NULL, 'Ink refill for Printer(Yellow)', 'pc', '4', '400', '1600', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(192, '197900046', '1', '1-A-3', NULL, 'Ink Toner JRJ-2380', 'box', '3', '2000', '6000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(193, '197900046', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR BLACK (CF210A)', 'box', '20', '2080', '41600', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:09'),
(194, '197900046', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR CYAN (CF212A)', 'box', '20', '2080', '41600', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(195, '197900046', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR MAGENTA (CF213A)', 'box', '20', '2080', '41600', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(196, '197900046', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR YELLOW (CF212A)', 'box', '20', '2080', '41600', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(197, '200400037', '1', '1-A-3', NULL, 'Evolis Peeble Ink (Colored)', 'pc', '1', '4600', '4600', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(198, '200400037', '1', '1-A-3', NULL, 'Toner-printer (1 unit) (Brother DCP-L2540DW)', 'pc', '3', '1500', '4500', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(199, '201400177', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR BLACK (JRJ 55X)', 'box', '2', '4000', '8000', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(200, '198100040', '1', '1-A-3', NULL, 'Developer, Copier (1 unit) (Konika Minolta Bizhub 363', 'pc', '5', '4950', '24750', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(201, '198100040', '1', '1-A-3', NULL, 'Developer, Copier (2 units) (Canon IR 4570) for existing unit Copier (Max Copy Center)', 'pc', '5', '8000', '40000', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(202, '198100040', '1', '1-A-3', NULL, 'Drum-Copier (1 unit) (Konika Minolta Bizhub 363) for existing unit Copier (JRJ Solutions)', 'pc', '5', '8050', '40250', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(203, '198100040', '1', '1-A-3', NULL, 'Drum, Copier (2 units) (Canon IR4570) for existing unit Copier(Max Copy Center)', 'pc', '5', '8904', '44520', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(204, '198100040', '1', '1-A-3', NULL, 'Fixing Film for Canon IR 4570 Copier for existing unit Copier (Max Copy Center)', 'pc', '3', '8000', '24000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(205, '198100040', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR BLACK (CF210A)', 'box', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(206, '198100040', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR CYAN (CF212A)', 'box', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(207, '198100040', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR MAGENTA (CF213A)', 'box', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(208, '198100040', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR YELLOW (CF212A)', 'box', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(209, '198100040', '1', '1-A-3', NULL, 'Toner for Canon IR 4570 Copier for existing unit Copier (MaxCopy Center)', 'pouch', '50', '5000', '250000', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(210, '198100040', '1', '1-A-3', NULL, 'Toner-Copier (1 unit) (Konika Minolata Bizhub 363)2', 'pc', '20', '7250', '145000', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(211, '198100040', '1', '1-A-3', NULL, 'Toner, printer Brother HL5340D, TN3250', 'pc', '3', '3600', '10800', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(212, '198100040', '1', '1-A-3', NULL, 'Toner,Copier (2units) Canon IR4570)', 'pc', '15', '5000', '75000', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(213, '198100040', '1', '1-A-3', NULL, 'Toner,Printer (1 unit) (Brother HL53403 Laserprinter)', 'pc', '4', '4000', '16000', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(214, '198100040', '1', '1-A-3', NULL, 'Toner,printer (1unit) (HP Laserjet Pro 200 color MFP) Black', 'pc', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:10'),
(215, '198100040', '1', '1-A-3', NULL, 'Toner,printer (1unit) (HP Laserjet Pro 200 color MFP) cyan', 'pc', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(216, '198100040', '1', '1-A-3', NULL, 'Toner,printer (1unit) (HP Laserjet Pro 200 color MFP) Magenta', 'pc', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(217, '198100040', '1', '1-A-3', NULL, 'Toner,printer (1unit) (HP Laserjet Pro 200 color MFP) Yellow', 'pc', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(218, '198100040', '1', '1-A-3', NULL, 'Toner,printer (1unit) (HP Laserjet Pro M225dn, M201dw) Black', 'pc', '25', '2080', '52000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(219, '198100040', '1', '1-A-3', NULL, 'Toner,printer (2 units) (HP deskjet ink advantage 4615 all-in-one) Black', 'pc', '3', '1000', '3000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(220, '198100040', '1', '1-A-3', NULL, 'Toner,printer (2 units) (HP deskjet ink advantage 4615 all-in-one) Cyan', 'pc', '3', '1000', '3000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(221, '198100040', '1', '1-A-3', NULL, 'Toner,printer (2 units) (HP deskjet ink advantage 4615 all-in-one) Magenta', 'pc', '3', '1000', '3000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(222, '198100040', '1', '1-A-3', NULL, 'Toner,printer (2 units) (HP deskjet ink advantage 4615 all-in-one) Yellow', 'pc', '3', '1000', '3000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 02:17:11'),
(223, '199200016', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR BLACK (CF210A)', 'box', '24', '2080', '49920', NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:45'),
(224, '199200016', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR BLACK (JRJ 55X)', 'box', '6', '4000', '24000', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:45'),
(225, '199200016', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR CYAN (CF212A)', 'box', '12', '2080', '24960', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:45'),
(226, '199200016', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR MAGENTA (CF213A)', 'box', '12', '2080', '24960', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:45'),
(227, '199200016', '1', '1-A-3', NULL, 'TONER CARTRIDGE COLOR YELLOW (CF212A)', 'box', '12', '2080', '24960', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:45'),
(228, '0454', '1', '1-B', NULL, 'Binder Stapler (24mm)', 'PC', '2', '1500', '3000', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:45'),
(229, '0454', '1', '1-B', NULL, 'Calculator, 12 digits, dual power', 'pc', '22', '200', '4400', NULL, '22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(230, '0454', '1', '1-B', NULL, 'Document Tray, Metal Type, 3 Layers', 'pc', '14', '340', '4760', NULL, '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(231, '0454', '1', '1-B', NULL, 'Extension Wire, 5 meters, 3 gangs', 'pc', '18', '270', '4860', NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(232, '0454', '1', '1-B', NULL, 'Puncher, Heavy Duty, 2 Hole', 'pc', '10', '123.43', '1234.3000000000002', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(233, '0454', '1', '1-B', NULL, 'Ruler, 12\", Plastic, Transparent', 'pc', '30', '10', '300', NULL, '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(234, '0454', '1', '1-B', NULL, 'Scissors, 8\", Metal Handle', 'pc', '15', '55', '825', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(235, '0454', '1', '1-B', NULL, 'Sharpener, Table Type, Heavy Duty', 'pc', '4', '295', '1180', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(236, '0454', '1', '1-B', NULL, 'Stamp Pad, 3\" * 5\"', 'pc', '5', '29.06', '145.29999999999998', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46');
INSERT INTO `item` (`id`, `userid`, `expense_id`, `tranche`, `code`, `description`, `unit_measurement`, `qty`, `unit_cost`, `estimated_budget`, `mode_procurement`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(237, '0454', '1', '1-B', NULL, 'Stapler with Staple Remover #35, Heavy Duty', 'pc', '20', '220', '4400', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(238, '201700272', '1', '1-C', NULL, 'Alcohol, 70%, ethtl, unscented, 500ml', 'bottle', '5', '90', '450', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(239, '201700272', '1', '1-C', NULL, 'Alcohol, 70%, ethyl, scented, 500ml', 'bottle', '10', '70', '700', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(240, '201700272', '1', '1-C', NULL, 'Aluminum Screw 2\" , 100pcs', 'box', '2', '650', '1300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(241, '201700272', '1', '1-C', NULL, 'Aluminum Screw 3\" , 100pcs', 'box', '2', '800', '1600', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(242, '201700272', '1', '1-C', NULL, 'AVR (for computer and bundy clock)', 'pc', '5', '800', '4000', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(243, '201700272', '1', '1-C', NULL, 'Battery, size AA, alkaline, 4 pcs./packet', 'pack', '10', '150', '1500', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(244, '201700272', '1', '1-C', NULL, 'Dater', 'pcs', '2', '200', '400', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(245, '201700272', '1', '1-C', NULL, 'Dater, 2019 and above', 'pc', '1', '250', '250', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(246, '201700272', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 1\"', 'roll', '5', '30', '150', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(247, '201700272', '1', '1-C', NULL, 'Empty Box 12 x 15 x 10', 'pc', '200', '130', '26000', NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(248, '201700272', '1', '1-C', NULL, 'Insecticide', 'bottle', '2', '250', '500', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(249, '201700272', '1', '1-C', NULL, 'NOTARIAL FEE', 'job', '1', '200', '200', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(250, '201700272', '1', '1-C', NULL, 'Rubber stamp - Certified True Copy', 'pc', '1', '150', '150', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:46'),
(251, '201700272', '1', '1-C', NULL, 'Rubber stamp - PR with RMOP', 'pc', '4', '150', '600', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(252, '201700272', '1', '1-C', NULL, 'Rubber stamp - Receive', 'pc', '1', '200', '200', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(253, '201400182', '1', '1-C', NULL, '2-in-1 Board (Whiteboard and Cork Board Combination), 1200 x 900 mm, with silver aluminum frame', 'pc', '1', '6000', '6000', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(254, '201400182', '1', '1-C', NULL, 'Rubber Stamp', 'pc', '1', '200', '200', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(255, '201700263', '1', '1-C', NULL, 'Accountable forms', 'pad', '60', '150', '9000', NULL, '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(256, '201700263', '1', '1-C', NULL, 'Adding machine tape', 'roll', '25', '20', '500', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(257, '201700263', '1', '1-C', NULL, 'Adding Machine, 12 digits, DR-120 TM', 'unit', '1', '4000', '4000', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(258, '201700263', '1', '1-C', NULL, 'Alcohol, 70%, ethtl, unscented, 500ml', 'bottle', '16', '90', '1440', NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(259, '201700263', '1', '1-C', NULL, 'Aluminum Screw 2\" , 100pcs', 'box', '6', '650', '3900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(260, '201700263', '1', '1-C', NULL, 'Aluminum Screw 3\" , 100pcs', 'box', '6', '800', '4800', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(261, '201700263', '1', '1-C', NULL, 'Aluminum Screw, 4\" , 100pcs', 'box', '4', '950', '3800', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(262, '201700263', '1', '1-C', NULL, 'Bag (for liaison)', 'pc', '1', '500', '500', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(263, '201700263', '1', '1-C', NULL, 'Box (12 x 15 x 10) - brown color', 'pc', '100', '115', '11500', NULL, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(264, '201700263', '1', '1-C', NULL, 'Carbon Paper (Int', 'pack', '1', '680', '680', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(265, '201700263', '1', '1-C', NULL, 'Check book/blank check, MDS', 'booklet', '6', '900', '5400', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(266, '201700263', '1', '1-C', NULL, 'Check book/blank check, TF', 'booklet', '6', '900', '5400', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(267, '201700263', '1', '1-C', NULL, 'Clear book, long, green', 'pc', '2', '80', '160', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(268, '201700263', '1', '1-C', NULL, 'Cutter, big', 'pc', '2', '290', '580', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(269, '201700263', '1', '1-C', NULL, 'Dater, 2019 and above', 'pc', '3', '250', '750', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(270, '201700263', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 1\"', 'roll', '3', '30', '90', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(271, '201700263', '1', '1-C', NULL, 'Duct Tape', 'roll', '3', '400', '1200', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(272, '201700263', '1', '1-C', NULL, 'Ergonomic Swivel Chair, with arm rest, BLACK, heavy duty', 'pc', '2', '4500', '9000', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:47'),
(273, '201700263', '1', '1-C', NULL, 'Extension wire with individual switch and individual fuse per outlet', 'pc', '3', '1000', '3000', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(274, '201700263', '1', '1-C', NULL, 'Highlighter, neon green', 'pc', '15', '22', '330', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(275, '201700263', '1', '1-C', NULL, 'Highlighter, neon orange', 'pc', '15', '22', '330', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(276, '201700263', '1', '1-C', NULL, 'Insecticide', 'bottle', '3', '250', '750', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(277, '201700263', '1', '1-C', NULL, 'Note Post-It 1x3, neon green', 'pack', '20', '60', '1200', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(278, '201700263', '1', '1-C', NULL, 'Note Post-It 1x3, neon orange', 'pack', '20', '60', '1200', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(279, '201700263', '1', '1-C', NULL, 'Puncher, heavy duty, 2-hole', 'pc', '1', '660', '660', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(280, '201700263', '1', '1-C', NULL, 'Ribbon, black, epson LX 310', 'pc', '3', '195', '585', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(281, '201700263', '1', '1-C', NULL, 'RJ 45', 'pc', '1', '150', '150', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(282, '201700263', '1', '1-C', NULL, 'Ruler, 12\", transparent, plastic', 'pc', '2', '14', '28', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(283, '201700263', '1', '1-C', NULL, 'Scissors, 8\"', 'pair', '2', '200', '400', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(284, '201700263', '1', '1-C', NULL, 'Sharpener, table type, heavy duty', 'pc', '1', '295', '295', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(285, '201700263', '1', '1-C', NULL, 'Sign pen, 0.5mm (black)', 'pc', '40', '25', '1000', NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(286, '201700263', '1', '1-C', NULL, 'Sign pen, 0.5mm (blue)', 'pc', '40', '25', '1000', NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(287, '201700263', '1', '1-C', NULL, 'Stamp pad, felt pad, 60mm x 100mm', 'pc', '3', '45', '135', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(288, '201700263', '1', '1-C', NULL, 'Staple Remover , Steel Scissor Type', 'pc', '5', '150', '750', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(289, '201700263', '1', '1-C', NULL, 'Staple wire (for binder stapler 24mm)', 'box', '4', '35', '140', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(290, '201700263', '1', '1-C', NULL, 'Staple wire #35', 'box', '10', '22', '220', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(291, '201700263', '1', '1-C', NULL, 'Stapler #35 with staple remover, heavy duty', 'pc', '10', '340', '3400', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(292, '201700263', '1', '1-C', NULL, 'Tissue paper', 'roll', '60', '14', '840', NULL, '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(293, '201700263', '1', '1-C', NULL, 'Toner Cartridge Black (TN 2380)', 'box', '15', '1400', '21000', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(294, '201700263', '1', '1-C', NULL, 'Umbrella', 'pc', '2', '800', '1600', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(295, '201700263', '1', '1-C', NULL, 'USB, 8GB', 'piece', '40', '340', '13600', NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(296, '201700263', '1', '1-C', NULL, 'Warrant Register General Form 105', 'pc', '5', '500', '2500', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:48'),
(297, '201900282', '1', '1-C', NULL, 'Battery, size AA, alkaline, 4 pcs./packet', 'pack', '50', '150', '7500', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(298, '201900282', '1', '1-C', NULL, 'Battery, size AAA, alkaline, 4 pcs./packet', 'pack', '50', '150', '7500', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(299, '201900282', '1', '1-C', NULL, 'Tarpaulin printing 64x75', 'job', '3', '600', '1800', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(300, '0135', '1', '1-C', NULL, 'Battery, size AA, alkaline, 4 pcs./packet', 'pack', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(301, '0135', '1', '1-C', NULL, 'Battery, size AAA, alkaline, 4 pcs./packet', 'pack', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(302, '0135', '1', '1-C', NULL, 'Cutter, big', 'pc', '10', '290', '2900', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(303, '0135', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 1\"', 'roll', '5', '30', '150', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(304, '0135', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 2\"', 'pc', '5', '50', '250', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(305, '0135', '1', '1-C', NULL, 'Duct Tape for warehouse use', 'roll', '5', '120', '600', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(306, '0135', '1', '1-C', NULL, 'Fastener, screw type,1\"', 'pair', '200', '6', '1200', NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(307, '0135', '1', '1-C', NULL, 'Fastener, screw type,2\"', 'pair', '200', '6', '1200', NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(308, '0135', '1', '1-C', NULL, 'Garbage can with pedal(Plastic, medium)', 'pcs', '3', '150', '450', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(309, '0135', '1', '1-C', NULL, 'Gel Air Freshener 12 g, for hub-warehouse (Refillable with container)', 'pcs', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(310, '0135', '1', '1-C', NULL, 'Gel Air Freshener 12 g, Refill', 'pcs', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(311, '0135', '1', '1-C', NULL, 'Gloves, warehouse gloves', 'pair', '10', '275', '2750', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(312, '0135', '1', '1-C', NULL, 'Glue stick, 9\"', 'pc', '5', '100', '500', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(313, '0135', '1', '1-C', NULL, 'Insecticide, 600 ml (environmental friendly) for hub-warehouse and office use', 'bottle', '24', '300', '7200', NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(314, '0135', '1', '1-C', NULL, 'Pen, Permanent, Marker,JUMBO, blue (36), black (36) for hub-warehouse use', 'pc', '72', '115', '8280', NULL, '72', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(315, '0135', '1', '1-C', NULL, 'PPE sticker, 10cm x 6cm, glossy, sticker type', 'pc', '1000', '8.5', '8500', NULL, '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(316, '0135', '1', '1-C', NULL, 'Ring Binder Folder, BLUE, legal size', 'pc', '10', '400', '4000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(317, '0135', '1', '1-C', NULL, 'Rubber Stamp', 'pc', '5', '200', '1000', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(318, '0135', '1', '1-C', NULL, 'Rugby', 'bottle', '2', '60', '120', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(319, '0135', '1', '1-C', NULL, 'Staple Remover , Steel Scissor Type', 'pc', '6', '150', '900', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(320, '0135', '1', '1-C', NULL, 'Staple Wire Remover Heavy-Duty scissor type', 'pcs', '1', '250', '250', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(321, '0135', '1', '1-C', NULL, 'Stretching film', 'roll', '10', '450', '4500', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:49'),
(322, '0135', '1', '1-C', NULL, 'Tape, Packaging, 2\", 100 meters', 'roll', '200', '60', '12000', NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(323, '0135', '1', '1-C', NULL, 'Tape,transparent, 2\"', 'roll', '20', '30', '600', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(324, '0135', '1', '1-C', NULL, 'Twine, plastic, one kilo per roll', 'roll', '5', '100', '500', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(325, '0135', '1', '1-C', NULL, 'Umbrella', 'pc', '6', '300', '1800', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(326, '0135', '1', '1-C', NULL, 'USB, 8GB', 'pc', '10', '340', '3400', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(327, '201900282', '1', '1-C', NULL, 'Tarpaulin printing 64x75', 'job', '600', '2400', '1440000', NULL, '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(328, '197900046', '1', '1-C', NULL, 'Alcohol, 70%, ethyl, scented, 500ml', 'bottle', '12', '70', '840', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(329, '197900046', '1', '1-C', NULL, 'Aluminum Screw 2 1/2\"', 'box', '1', '675', '675', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(330, '197900046', '1', '1-C', NULL, 'Aluminum Screw 2\" , 100pcs', 'box', '1', '650', '650', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(331, '197900046', '1', '1-C', NULL, 'Aluminum Screw 3\" , 100pcs', 'box', '1', '800', '800', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(332, '197900046', '1', '1-C', NULL, 'Battery, size AA, alkaline, 4 pcs./packet', 'pack', '2', '150', '300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(333, '197900046', '1', '1-C', NULL, 'Battery, size AAA, alkaline, 4 pcs./packet', 'pack', '2', '150', '300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(334, '197900046', '1', '1-C', NULL, 'Box (12 x 15 x 10) - brown color', 'pc', '10', '115', '1150', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(335, '197900046', '1', '1-C', NULL, 'Chair for Conference Room With Arm, Heavy Duty Black(Sambag Conference Room)', 'pc.', '12', '5000', '60000', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(336, '197900046', '1', '1-C', NULL, 'Check book/blank check, MDS', 'booklet', '5', '900', '4500', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(337, '197900046', '1', '1-C', NULL, 'Clear book, long, green', 'pc', '5', '80', '400', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(338, '197900046', '1', '1-C', NULL, 'Clear book, Long, Red', 'pc', '5', '80', '400', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(339, '197900046', '1', '1-C', NULL, 'Combi Plastic Binding Comb', 'pc', '10', '100', '1000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(340, '197900046', '1', '1-C', NULL, 'Cork Board with aluminum frame', 'pc', '1', '199', '199', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(341, '197900046', '1', '1-C', NULL, 'Dater', 'pcs', '4', '200', '800', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(342, '197900046', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 1\"', 'roll', '33', '30', '990', NULL, '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(343, '197900046', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 2\"', 'pc', '5', '50', '250', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(344, '197900046', '1', '1-C', NULL, 'Duct Tape', 'roll', '1', '400', '400', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(345, '197900046', '1', '1-C', NULL, 'Ergonomic Swivel Chair, with arm rest, BLACK, heavy duty', 'pc', '4', '4500', '18000', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(346, '197900046', '1', '1-C', NULL, 'Folder, tagboard, long', 'pc', '150', '8', '1200', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:50'),
(347, '197900046', '1', '1-C', NULL, 'Index Card with lines', 'pack', '4', '50', '200', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(348, '197900046', '1', '1-C', NULL, 'LBP MDS, (blank check), Acct. #2014-9014-27 @ 800.00/booklet', 'booklet', '4', '800', '3200', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(349, '197900046', '1', '1-C', NULL, 'Mounting Tape, heavy duty, 1\" x 60 \"', 'roll', '1', '300', '300', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(350, '197900046', '1', '1-C', NULL, 'Mouse pad', 'pcs', '4', '50', '200', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(351, '197900046', '1', '1-C', NULL, 'Notarization', 'job', '1', '300', '300', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(352, '197900046', '1', '1-C', NULL, 'Note Post-It 1x3, neon green', 'pack', '12', '60', '720', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(353, '197900046', '1', '1-C', NULL, 'Paper - Bondpaper , colored, substance 24, long', 'reams', '2', '348', '696', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(354, '197900046', '1', '1-C', NULL, 'Plastic Cover #3', 'roll', '1', '850', '850', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(355, '197900046', '1', '1-C', NULL, 'Ring Bind for Manual', 'pc', '1', '75', '75', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(356, '197900046', '1', '1-C', NULL, 'Ring binder,two holes,blue', 'pc', '20', '150', '3000', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(357, '197900046', '1', '1-C', NULL, 'Rubber Stamp', 'pc', '4', '200', '800', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(358, '197900046', '1', '1-C', NULL, 'Rubber stamp - Receive', 'pc', '2', '200', '400', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(359, '197900046', '1', '1-C', NULL, 'Rubber Stamp (Big)', 'pc', '2', '100', '200', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(360, '197900046', '1', '1-C', NULL, 'Rubber Stamp (Small)', 'pc', '1', '50', '50', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(361, '197900046', '1', '1-C', NULL, 'Stamp Pad, Red', 'pc', '1', '250', '250', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(362, '197900046', '1', '1-C', NULL, 'Staple Remover super strength stainless steel', 'pc', '1', '52', '52', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(363, '197900046', '1', '1-C', NULL, 'Sticker Paper', 'pack', '4', '53', '212', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(364, '197900046', '1', '1-C', NULL, 'Tape, Double Sided , 2\"', 'rolls', '2', '48', '96', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(365, '197900046', '1', '1-C', NULL, 'Tarpaulin for \"Newly Promoted / Appointed Employees of DOH RO7\", 2ft x 3ft', 'pc', '2', '120', '240', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(366, '197900046', '1', '1-C', NULL, 'Tarpaulin, 24\" x 36\" (Printing w/ lamination)', 'pc', '3', '240', '720', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(367, '197900046', '1', '1-C', NULL, 'Tarpaulin, 45\" X 76\" (Printing w/ lamination)', 'pc', '3', '770', '2310', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(368, '197900046', '1', '1-C', NULL, 'Tarpaulin, 61.75 x 39.5\"', 'pc', '15', '900', '13500', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:51'),
(369, '197900046', '1', '1-C', NULL, 'Toner Cartridge Black (TN 2380)', 'box', '30', '1400', '42000', NULL, '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(370, '197900046', '1', '1-C', NULL, 'Transparent TAPE 1\" x 90m', 'roll', '3', '22.74', '68.22', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(371, '197900046', '1', '1-C', NULL, 'Transparent TAPE 2\" x 90m', 'roll', '2', '38.75', '77.5', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(372, '197900046', '1', '1-C', NULL, 'Whiteboard Marker Broad, Red, Blue, Black', 'pc', '1', '66', '66', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(373, '197900046', '1', '1-C', NULL, 'Whiteboard Marker Fine, Red,Blue,Black', 'pc', '1', '45', '45', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(374, '200400037', '1', '1-C', NULL, 'Card', 'box', '1', '3500', '3500', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(375, '200400037', '1', '1-C', NULL, 'Laminating Film, Thick', 'roll', '1', '3000', '3000', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(376, '200400037', '1', '1-C', NULL, 'Scissors, 8\"', 'pair', '2', '200', '400', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(377, '200400037', '1', '1-C', NULL, 'Storage Box, plastic, large', 'box', '2', '1000', '2000', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(378, '200400037', '1', '1-C', NULL, 'Storage Box, plastic, small', 'box', '2', '500', '1000', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(379, '200400037', '1', '1-C', NULL, 'whiteboard 48 inches x 36 inches', 'pc', '1', '3000', '3000', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(380, '201400177', '1', '1-C', NULL, 'Battery, size AA, alkaline, 4 pcs./packet', 'pack', '1', '150', '150', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(381, '201400177', '1', '1-C', NULL, 'Battery, size AAA, alkaline, 4 pcs./packet', 'pack', '1', '150', '150', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(382, '201400177', '1', '1-C', NULL, 'Dater', 'pcs', '1', '200', '200', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(383, '201400177', '1', '1-C', NULL, 'Insecticide', 'bottle', '1', '250', '250', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(384, '201400177', '1', '1-C', NULL, 'Plastic Cover # 4', 'roll', '1', '1100', '1100', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(385, '198100040', '1', '1-C', NULL, 'Carbon Paper (Int', 'pack', '1', '680', '680', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(386, '198100040', '1', '1-C', NULL, 'Clock (Wall)', 'pc', '1', '500', '500', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(387, '198100040', '1', '1-C', NULL, 'Construction paper,short,light blue', 'pc', '5', '3', '15', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(388, '198100040', '1', '1-C', NULL, 'Construction paper,short,light yellow', 'pc', '5', '3', '15', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(389, '198100040', '1', '1-C', NULL, 'Construction paper,short,orange', 'pc', '5', '3', '15', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(390, '198100040', '1', '1-C', NULL, 'Construction paper,short,yellow green', 'pc', '5', '3', '15', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(391, '198100040', '1', '1-C', NULL, 'Dater', 'pcs', '5', '200', '1000', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:52'),
(392, '198100040', '1', '1-C', NULL, 'Door Knob', 'pc', '2', '800', '1600', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(393, '198100040', '1', '1-C', NULL, 'Double Clip backfold 12pcs / box', 'box', '5', '65', '325', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(394, '198100040', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 1\"', 'roll', '5', '30', '150', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(395, '198100040', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 2\"', 'pc', '10', '50', '500', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(396, '198100040', '1', '1-C', NULL, 'Duct Tape', 'roll', '25', '400', '10000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(397, '198100040', '1', '1-C', NULL, 'Fastener, plastic 50', 'box', '50', '45', '2250', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(398, '198100040', '1', '1-C', NULL, 'Fastener, screw type,1\"', 'pair', '150', '6', '900', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(399, '198100040', '1', '1-C', NULL, 'Fastener, screw type,2\"', 'pair', '150', '6', '900', NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(400, '198100040', '1', '1-C', NULL, 'HANDBOOK On Philippine Government Procurement (RA 9184), 8th Edition', 'booklet', '20', '46.28', '925.6', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(401, '198100040', '1', '1-C', NULL, 'Heavy-Duty Staple Wire', 'pc', '10', '200', '2000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(402, '198100040', '1', '1-C', NULL, 'Heavy-Duty Stapler', 'pc', '3', '1300', '3900', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(403, '198100040', '1', '1-C', NULL, 'Index Box 3 x 5', 'pc', '4', '150', '600', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(404, '198100040', '1', '1-C', NULL, 'Index Box 5 x 8', 'pc', '6', '185', '1110', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(405, '198100040', '1', '1-C', NULL, 'Index Card with lines', 'pack', '25', '50', '1250', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(406, '198100040', '1', '1-C', NULL, 'Ink, stamp pad, 946 ml, violet', 'bottle', '3', '120', '360', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(407, '198100040', '1', '1-C', NULL, 'Loose Leaf Cover 8 1/2 x 14 ( color yellow at upper portion)', 'prs.', '16', '90', '1440', NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(408, '198100040', '1', '1-C', NULL, 'Loose Leaf Cover 8 1/2 x 14 (color red with color combination blue at the upper portion)', 'prs.', '16', '90', '1440', NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(409, '198100040', '1', '1-C', NULL, 'Loose Leaf Cover Color Orange with Yellow Color at the upper portion', 'pairs', '16', '90', '1440', NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(410, '198100040', '1', '1-C', NULL, 'Loose Leaf Cover size A3 with Plastic Cover (color skyblue with combination color dark blue at the upper potion', 'prs.', '6', '200', '1200', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(411, '198100040', '1', '1-C', NULL, 'Loose leaf cover,long', 'pair', '25', '200', '5000', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(412, '198100040', '1', '1-C', NULL, 'Mouse pad', 'pcs', '15', '50', '750', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(413, '198100040', '1', '1-C', NULL, 'Paper - Bondpaper , colored, substance 24, long', 'reams', '2', '348', '696', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(414, '198100040', '1', '1-C', NULL, 'Ribbon Film PC 402RF, (brother Fax-878)', 'roll', '1', '1290', '1290', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(415, '198100040', '1', '1-C', NULL, 'Ring binder,two holes,blue', 'pc', '500', '150', '75000', NULL, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:53'),
(416, '198100040', '1', '1-C', NULL, 'Rubber Stamp', 'pc', '5', '200', '1000', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(417, '198100040', '1', '1-C', NULL, 'Rubber stamp - PR with RMOP', 'pc', '2', '150', '300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(418, '198100040', '1', '1-C', NULL, 'Rubber stamp - Receive', 'pc', '3', '200', '600', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(419, '198100040', '1', '1-C', NULL, 'Rubber stamp - signature facsimile of MS. THELMA B. AMANTE', 'pc', '1', '150', '150', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(420, '198100040', '1', '1-C', NULL, 'Rugby', 'bot', '1', '60', '60', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(421, '198100040', '1', '1-C', NULL, 'Stamp, Name of Mrs. Elizabeth P. Tabasa', 'pc', '7', '52', '364', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(422, '198100040', '1', '1-C', NULL, 'Staple Remover super strength stainless steel', 'pc', '5', '250', '1250', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(423, '198100040', '1', '1-C', NULL, 'Staple Wire Remover Heavy-Duty scissor type', 'pcs', '5', '369', '1845', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(424, '198100040', '1', '1-C', NULL, 'Stapler with remover', 'pc', '25', '110', '2750', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(425, '198100040', '1', '1-C', NULL, 'Tape - Duct Tape, Gray, 2\"', 'roll', '4', '175', '700', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(426, '198100040', '1', '1-C', NULL, 'Tape Despenser', 'pc', '3', '12', '36', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(427, '198100040', '1', '1-C', NULL, 'Tape transparent 1/2\" x 90', 'roll', '50', '30', '1500', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(428, '198100040', '1', '1-C', NULL, 'Tape,transparent, 2\"', 'roll', '10', '520', '5200', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:54'),
(429, '198100040', '1', '1-C', NULL, 'Triple AAA Battery (2 pcs per pack) rechargeable', 'pc', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(430, '199200016', '1', '1-C', NULL, 'Adapter, Universal', 'pc', '1', '55', '55', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(431, '199200016', '1', '1-C', NULL, 'Alcohol, 70%, ethtl, unscented, 500ml', 'bottle', '3', '90', '270', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(432, '199200016', '1', '1-C', NULL, 'Alcohol, 70%, ethyl, scented, 500ml', 'bottle', '6', '70', '420', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(433, '199200016', '1', '1-C', NULL, 'Aluminum Screw 3\" , 100pcs', 'box', '4', '800', '3200', NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(434, '199200016', '1', '1-C', NULL, 'Banner for \"Philippine Civil Service Anniversary\", 6ft x 8ft', 'pc', '3', '960', '2880', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(435, '199200016', '1', '1-C', NULL, 'Battery, size AA, alkaline, 4 pcs./packet', 'pack', '2', '150', '300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(436, '199200016', '1', '1-C', NULL, 'Battery, size AAA, alkaline, 4 pcs./packet', 'pack', '2', '150', '300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(437, '199200016', '1', '1-C', NULL, 'Calculator, 12 digits, dual power', 'pc', '3', '800', '2400', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(438, '199200016', '1', '1-C', NULL, 'Clear book, long, green', 'pc', '500', '80', '40000', NULL, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(439, '199200016', '1', '1-C', NULL, 'Compensatory Time Off Cards', 'pcs', '1', '7', '7', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(440, '199200016', '1', '1-C', NULL, 'Dater, 2018 above, medium', 'pcs', '1', '200', '200', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(441, '199200016', '1', '1-C', NULL, 'Digital Voice Recorder', 'piece', '5', '5500', '27500', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(442, '199200016', '1', '1-C', NULL, 'DOUBLE SIDED TAPE 1\"', 'roll', '2', '30', '60', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(443, '199200016', '1', '1-C', NULL, 'Duct Tape', 'roll', '30', '400', '12000', NULL, '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(444, '199200016', '1', '1-C', NULL, 'Eraser, correction tape refill', 'pc', '7', '62', '434', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(445, '199200016', '1', '1-C', NULL, 'Ergonomic Swivel Chair, with arm rest, BLACK, heavy duty', 'pc', '10', '4500', '45000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(446, '199200016', '1', '1-C', NULL, 'Fastener, plastic 50', 'box', '50', '45', '2250', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(447, '199200016', '1', '1-C', NULL, 'Folder, long, WHITE', 'pc', '2', '4', '8', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(448, '199200016', '1', '1-C', NULL, 'Garbage can with pedal(Plastic, medium)', 'pcs', '2', '150', '300', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(449, '199200016', '1', '1-C', NULL, 'Glue Stick', 'pcs', '10', '10', '100', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:55'),
(450, '199200016', '1', '1-C', NULL, 'Highlighter, neon green', 'pc', '5', '20', '100', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(451, '199200016', '1', '1-C', NULL, 'Highlighter, neon orange', 'pc', '5', '20', '100', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(452, '199200016', '1', '1-C', NULL, 'Index Card with lines', 'pack', '5', '50', '250', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(453, '199200016', '1', '1-C', NULL, 'Ink Stamps - NAME TAG', 'pc', '2', '350', '700', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(454, '199200016', '1', '1-C', NULL, 'Leave Cards', 'pcs', '5', '7', '35', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(455, '199200016', '1', '1-C', NULL, 'Liquid Glue 473 ml', 'tube', '1', '250', '250', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(456, '199200016', '1', '1-C', NULL, 'Marker Pen, Permanent, broad (black)', 'pc', '25', '25', '625', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(457, '199200016', '1', '1-C', NULL, 'Masking Tape, 48 mm', 'roll', '15', '20', '300', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(458, '199200016', '1', '1-C', NULL, 'Mouse pad', 'pcs', '6', '50', '300', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(459, '199200016', '1', '1-C', NULL, 'Pencil', 'pcs', '20', '5', '100', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(460, '199200016', '1', '1-C', NULL, 'Plastic Envelope with handle', 'pc', '10', '20', '200', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(461, '199200016', '1', '1-C', NULL, 'Rubber Stamp', 'pc', '2', '200', '400', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(462, '199200016', '1', '1-C', NULL, 'Scissors, 8\"', 'pair', '6', '200', '1200', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(463, '199200016', '1', '1-C', NULL, 'Sharpener, table type, heavy duty', 'pc', '2', '295', '590', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(464, '199200016', '1', '1-C', NULL, 'Sign pen, 0.5 mm (green)', 'pc', '15', '30', '450', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56');
INSERT INTO `item` (`id`, `userid`, `expense_id`, `tranche`, `code`, `description`, `unit_measurement`, `qty`, `unit_cost`, `estimated_budget`, `mode_procurement`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(465, '199200016', '1', '1-C', NULL, 'Sign pen, 0.5mm (black)', 'pc', '40', '25', '1000', NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(466, '199200016', '1', '1-C', NULL, 'Sign pen, 0.5mm (blue)', 'pc', '30', '25.02', '750.6', NULL, '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(467, '199200016', '1', '1-C', NULL, 'Stamp pad ink, 946 ml, violet', 'bottle', '10', '100', '1000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(468, '199200016', '1', '1-C', NULL, 'Staple Remover , Steel Scissor Type', 'pc', '1', '150', '150', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(469, '199200016', '1', '1-C', NULL, 'Staple wire #35', 'box', '25', '22', '550', NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(470, '199200016', '1', '1-C', NULL, 'Tape, Packaging, 2\", 100 meters', 'roll', '5', '60', '300', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:56'),
(471, '199200016', '1', '1-C', NULL, 'Tarpaulin for \"Newly Promoted / Appointed Employees of DOH RO7\", 2ft x 3ft', 'pc', '12', '120', '1440', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(472, '199200016', '1', '1-C', NULL, 'Tissue paper', 'roll', '40', '14', '560', NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(473, '199200016', '1', '1-C', NULL, 'Toner Cartridge Black (TN 2380)', 'box', '10', '1400', '14000', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(474, '199200016', '1', '1-C', NULL, 'Triple AAA Battery (2 pcs per pack) rechargeable', 'pack', '5', '520', '2600', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(475, '199200016', '1', '1-C', NULL, 'Umbrella', 'pc', '1', '300', '300', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(476, '199200016', '1', '1-C', NULL, 'USB 4GB', 'piece', '15', '234', '3510', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(477, '199200016', '1', '1-C', NULL, 'USB, 8GB', 'piece', '6', '340', '2040', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57'),
(478, '199200016', '1', '1-C', NULL, 'whiteboard pen', 'pc', '5', '37', '185', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, NULL, '2019-06-12 03:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2019_05_22_081031_create_expense_code', 1),
(46, '2014_10_12_000000_create_users_table', 2),
(47, '2014_10_12_100000_create_password_resets_table', 2),
(48, '2019_05_22_081031_create_expense', 2),
(49, '2019_05_23_042748_create_charge_to', 2),
(50, '2019_05_27_050408_create_pap', 2),
(51, '2019_05_28_014538_create_item', 2),
(52, '2019_06_06_032429_create_mode_procurement', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mode_procurement`
--

CREATE TABLE `mode_procurement` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mode_procurement`
--

INSERT INTO `mode_procurement` (`id`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Small Value', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pap`
--

CREATE TABLE `pap` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pap`
--

INSERT INTO `pap` (`id`, `description`, `code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PAP1', 'PAP-001', NULL, NULL, NULL, NULL),
(2, 'PAP2', 'PAP-002', NULL, NULL, NULL, NULL),
(3, 'PAP3', 'PAP-003', NULL, NULL, NULL, NULL),
(4, 'PAP4', 'PAP-004', NULL, NULL, NULL, NULL),
(5, 'PAP5', 'PAP-005', NULL, NULL, NULL, NULL),
(6, 'PAP6', 'PAP-006', NULL, NULL, NULL, NULL),
(7, 'PAP7', 'PAP-007', NULL, NULL, NULL, NULL),
(8, 'PAP8', 'PAP-008', NULL, NULL, NULL, NULL),
(9, 'PAP9', 'PAP-009', NULL, NULL, NULL, NULL),
(10, 'PAP10', 'PAP-0010', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charge_to`
--
ALTER TABLE `charge_to`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `expense_id` (`expense_id`),
  ADD KEY `tranche` (`tranche`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode_procurement`
--
ALTER TABLE `mode_procurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pap`
--
ALTER TABLE `pap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charge_to`
--
ALTER TABLE `charge_to`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `mode_procurement`
--
ALTER TABLE `mode_procurement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pap`
--
ALTER TABLE `pap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
