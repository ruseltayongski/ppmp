-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 09:52 AM
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
  `userid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tranche` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `userid`, `expense_id`, `tranche`, `code`, `description`, `unit_measurement`, `qty`, `unit_cost`, `estimated_budget`, `mode_procurement`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0454', '1', '1-A-1', '2019-00008', 'Clip - Backfold - 1\"', 'pcs', '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(2, '0618', '1', '1-A-1', NULL, 'Clip - Backfold - 2\"', 'pcs', '21', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(3, '0618', '1', '1-A-1', NULL, 'Clip - Paper, 32mm, 100\'s/box', 'pcs', '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(4, '0618', '1', '1-A-1', NULL, 'Clip - Paper, 48mm, 100\'s/box', 'pcs', '23', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(5, '0618', '1', '1-A-1', NULL, 'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Blue', 'pcs', '24', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(6, '0618', '1', '1-A-1', NULL, 'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Green', 'pcs', '25', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(7, '0618', '1', '1-A-1', NULL, 'Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Red', 'pcs', '26', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(8, '0618', '1', '1-A-1', NULL, 'Envelope - Brown, Long', 'pcs', '27', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(9, '0618', '1', '1-A-1', NULL, 'Envelope - Expanding, Long with garter', 'pcs', '28', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(10, '0618', '1', '1-A-1', NULL, 'Envelope - Mailing/Letter, Long, White, 500\'s/box', 'pcs', '29', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(11, '0618', '1', '1-A-1', NULL, 'Envelope - Mailing/Letter, Window, Long, White, 500\'s/box', 'pcs', '30', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(12, '0618', '1', '1-A-1', NULL, 'Fastener - Plastic, 50\'s', 'pcs', '31', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(13, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 4\'\'', 'pcs', '32', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(14, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 3\'\'', 'pcs', '33', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(15, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 2\'\'', 'pcs', '34', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(16, '0618', '1', '1-A-1', NULL, 'Fastener - Screw type 1\'\'', 'pcs', '35', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(17, '0618', '1', '1-A-1', NULL, 'Folder - Long, White, 14 pts.', 'pcs', '36', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(18, '0618', '1', '1-A-1', NULL, 'Glue - All Purpose, 130g ', 'pcs', '37', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(19, '0618', '1', '1-A-1', NULL, 'Ink - Stamp Pad, 50ml, violet', 'pcs', '38', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(20, '0618', '1', '1-A-1', NULL, 'Note Pad Stick-on  3\" x  4\", 100 sheets/pad', 'pcs', '39', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(21, '0618', '1', '1-A-1', NULL, 'Paper - Bondpaper, A4, Substance 20', 'pcs', '40', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(22, '0618', '1', '1-A-1', NULL, 'Paper - Bondpaper, Long, Substance 20', 'pcs', '41', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(23, '0618', '1', '1-A-1', NULL, 'Paper - Fax, 216mm x 30mm', 'pcs', '42', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(24, '0618', '1', '1-A-1', NULL, 'Paper - Laid, 8 1/2\"x11\", 500\'s/box (for Certificates/License)', 'pcs', '43', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(25, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Black', 'pcs', '44', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(26, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Blue', 'pcs', '45', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(27, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Green', 'pcs', '46', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(28, '0618', '1', '1-A-1', NULL, 'Pen - Ballpen, Red (COA Only)', 'pcs', '47', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(29, '0618', '1', '1-A-1', NULL, 'Pen - Highlighter, Neon Green/Yellow', 'pcs', '48', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(30, '0618', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Broad, Black', 'pcs', '49', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(31, '0618', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Broad, Blue', 'pcs', '50', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(32, '0618', '1', '1-A-1', NULL, 'Pen - Marker, Permanent, Broad, Red', 'pcs', '51', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(33, '0618', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Black', 'pcs', '52', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(34, '0618', '1', '1-A-1', NULL, 'Pen - Signpen, 0.5 MM, Blue', 'pcs', '53', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(35, '0618', '1', '1-A-1', NULL, 'Record Book - 150 Leaves, smyth sewn', 'pcs', '54', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(36, '0618', '1', '1-A-1', NULL, 'Record Book - 300 Leaves, smyth sewn', 'pcs', '55', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(37, '0618', '1', '1-A-1', NULL, 'Rubberband, 350 grams', 'pcs', '56', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(38, '0618', '1', '1-A-1', NULL, 'Staple Wire - # 35', 'pcs', '57', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(39, '0618', '1', '1-A-1', NULL, 'Staple Wire - # 23 x 10', 'pcs', '58', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(40, '0618', '1', '1-A-1', NULL, 'Tape - Masking, 1\", 25m', 'pcs', '59', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(41, '0618', '1', '1-A-1', NULL, 'Tape - Masking, 2\", 25m', 'pcs', '60', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(42, '0618', '1', '1-A-1', NULL, 'Tape - Masking, 2\", 50m', 'pcs', '61', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(43, '0618', '1', '1-A-1', NULL, 'Tape - Transparent, 1\", 50m', 'pcs', '62', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(44, '0618', '1', '1-A-1', NULL, 'Tape - Transparent, 2\", 25m', 'pcs', '63', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(45, '0618', '1', '1-A-1', NULL, 'USB 16 GB', 'pcs', '64', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(46, '0618', '1', '1-A-2', NULL, 'Cartolina, Assorted Color, 78 gsm min', 'pcs', '65', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(47, '0618', '1', '1-A-2', NULL, 'Cartolina, White, 99 gsm min', 'pcs', '66', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(48, '0618', '1', '1-A-2', NULL, 'Eraser - Whiteboard, Felt', 'pcs', '67', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(49, '0618', '1', '1-A-2', NULL, 'ID Sling - Garterized with name tags (landscape)', 'pcs', '68', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(50, '0618', '1', '1-A-2', NULL, 'Manila Paper, 36\" x 48\", Pre-cut', 'pcs', '69', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(51, '0618', '1', '1-A-2', NULL, 'Metacards (4 colors) 100\'s', 'pcs', '70', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(52, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Black', 'pcs', '71', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(53, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Blue', 'pcs', '72', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(54, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Green', 'pcs', '73', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(55, '0618', '1', '1-A-2', NULL, 'Pen - Whiteboard, Fine, Red', 'pcs', '74', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(56, '0618', '1', '1-A-3', NULL, 'Ink - Duplicating Machine ', 'pcs', '75', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(57, '0618', '1', '1-A-3', NULL, 'Master Roll - Duplicating Machine ', 'pcs', '76', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(58, '0618', '1', '1-A-3', NULL, 'Developer - Copier ', 'pcs', '77', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(59, '0618', '1', '1-A-3', NULL, 'Drum - Copier ', 'pcs', '78', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(60, '0618', '1', '1-A-3', NULL, 'Toner - Copier ', 'pcs', '79', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(61, '0618', '1', '1-A-3', NULL, 'Toner - Computer Printer', 'pcs', '80', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(62, '0618', '1', '1-B', NULL, 'Calculator, 12 digits, dual power', 'pcs', '81', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(63, '0618', '1', '1-B', NULL, 'Puncher, Heavy Duty, 2 Hole', 'pcs', '82', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(64, '0618', '1', '1-B', NULL, 'Ruler, 12\", Plastic, Transparent', 'pcs', '83', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(65, '0618', '1', '1-B', NULL, 'Scissors, 8\", Metal Handle', 'pcs', '84', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(66, '0618', '1', '1-B', NULL, 'Sharpener, Table Type, Heavy Duty', 'pcs', '85', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(67, '0618', '1', '1-B', NULL, 'Stamp Pad, 3\" x 5\"    ', 'pcs', '86', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(68, '0618', '1', '1-B', NULL, 'Stapler with Staple Remover # 35, Heavy Duty', 'pcs', '87', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(69, '0618', '1', '1-B', NULL, 'Stapler, Heavy Duty, 23/6 - 23/24mm staples, maximum paper 210 sheets', 'pcs', '88', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(70, '0618', '1', '1-B', NULL, 'Wire, Extension, 5 meters, 3 gangs', 'pcs', '89', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(71, '0618', '1', '1-B', NULL, 'USB Wireless Laser Pointer Presenter, USB 3.0/USB 2.0, 10m away, function page up and down', 'pcs', '90', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(72, '0618', '2', '', NULL, 'Check book/blank check, MDS', 'pcs', '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(73, '0618', '2', '', NULL, 'Check book/blank check, TF', 'pcs', '21', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(74, '0618', '2', '', NULL, 'Official Receipt', 'pcs', '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(75, '0618', '6', NULL, NULL, 'Airconditioning Unit, window type, 1hp', 'unit', '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(76, '0618', '6', NULL, NULL, 'Camera, Digital', 'unit', '21', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(77, '0618', '6', NULL, NULL, 'Electric Fan', 'unit', '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(78, '0618', '6', NULL, NULL, 'Fax Machine', 'unit', '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(79, '0618', '7', NULL, NULL, 'Automatic Voltage Regulator', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(80, '0618', '7', NULL, NULL, 'Computer Desk Top (whole set)', NULL, '21', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(81, '0618', '7', NULL, NULL, 'Central Processing Unit', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(82, '0618', '7', NULL, NULL, 'Keyboard', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(83, '0618', '7', NULL, NULL, 'Laptop', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(84, '0618', '7', NULL, NULL, 'Monitor', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(85, '0618', '7', NULL, NULL, 'Mouse', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(86, '0618', '7', NULL, NULL, 'Notebook', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(87, '0618', '7', NULL, NULL, 'Printer with Scanner and Copier', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(88, '0618', '7', NULL, NULL, 'Uninterrupted Power Supply', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(89, '0618', '7', NULL, NULL, 'Wireless Router', NULL, '22', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(90, '0050', '8', NULL, NULL, 'Handheld Two-Way Radio', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(91, '0050', '10', NULL, NULL, 'BP Apparatus', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(92, '0050', '11', NULL, NULL, 'Compressor', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(93, '0050', '12', NULL, NULL, 'Chair', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(94, '0050', '12', NULL, NULL, 'Table', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(95, '0050', '14', NULL, NULL, 'Chemicals', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(96, '0050', '14', NULL, NULL, 'Jacket', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(97, '0050', '14', NULL, NULL, 'Tarpaulins', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(98, '0050', '14', NULL, NULL, 'T-shirts', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(99, '0050', '20', NULL, NULL, 'Frames', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(100, '0050', '20', NULL, NULL, 'Plaques', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(101, '0050', '20', NULL, NULL, 'Rings', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(102, '0050', '27', NULL, NULL, 'Ceiling', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(103, '0050', '27', NULL, NULL, 'Door', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(104, '0050', '27', NULL, NULL, 'Floor', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(105, '0050', '27', NULL, NULL, 'Wall', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(106, '0050', '28', NULL, NULL, 'Central Processing Unit', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(107, '0050', '28', NULL, NULL, 'Monitor', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(108, '0050', '28', NULL, NULL, 'Notebook', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(109, '0050', '28', NULL, NULL, 'Printer with Scanner and Copier', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL),
(110, '0050', '28', NULL, NULL, 'Uninterrupted Power Supply', NULL, '20', '2000', '20000', 'small value', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'approve', NULL, NULL, NULL);

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
(51, '2019_05_28_014538_create_item', 2);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
