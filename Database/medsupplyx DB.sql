-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 05:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medsupplyx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(1, 'admin', '2/B , Polgahawela', '0714774726', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bidtable`
--

CREATE TABLE `bidtable` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `pharmacyId` int(11) NOT NULL,
  `pharmacyName` varchar(60) NOT NULL,
  `medicineName` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `category` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `bidAmount` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `deliveryDate` varchar(20) NOT NULL,
  `orderedDate` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `approvedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `acceptedDate` datetime DEFAULT NULL,
  `supplierId` int(11) NOT NULL,
  `supplierName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidtable`
--

INSERT INTO `bidtable` (`id`, `orderId`, `medicineId`, `pharmacyId`, `pharmacyName`, `medicineName`, `quantity`, `type`, `brand`, `status`, `category`, `volume`, `bidAmount`, `remarks`, `reply`, `reason`, `deliveryDate`, `orderedDate`, `approvedDate`, `acceptedDate`, `supplierId`, `supplierName`) VALUES
(37, 77, 23, 32, 'pharmacy', 'Paracetamol', 350, 'Tablets (mg)', 'Panadol', 'accepted', 'Pain Relief', '500', 3500, 'panadol dont ahve', 'ok i want', '', '2024-05-11', '2024-04-28 18:54:39', '2024-04-28 19:05:51', NULL, 33, 'supplier'),
(40, 82, 52, 32, 'pharmacy', 'Cetirizine', 550, '(mg) Tablets', 'zorpin', 'accepted', 'Antihistamine', '10', 10000, '', '', '', '2024-05-11', '2024-04-29 22:30:44', '2024-04-29 22:51:01', NULL, 76, 'Supplier2'),
(41, 82, 52, 32, 'pharmacy', 'Cetirizine', 550, '(mg) Tablets', 'zorpin', 'accepted', 'Antihistamine', '10', 15000, 'I have only 500', '', '', '2024-05-11', '2024-04-29 22:30:44', '2024-04-29 22:52:57', NULL, 77, 'abc'),
(42, 83, 27, 32, 'pharmacy', 'Amoxicillin', 350, 'Tablets (mg)', 'Axolin', 'accepted', 'Antibiotic', '250', 15000, '', '', '', '2024-05-18', '2024-04-30 08:46:34', '2024-04-30 00:00:00', NULL, 33, 'supplier'),
(49, 89, 21, 32, 'pharmacy', 'Aspirin', 220, 'Tablets (mg)', 'Zorprin', 'accepted', 'Pain Relief', '100', 3000, '', '', '', '2024-06-22', '2024-04-30 12:04:08', '2024-04-30 00:00:00', NULL, 33, 'supplier'),
(50, 90, 21, 32, 'pharmacy', 'Aspirin', 300, 'Tablets (mg)', 'Zorprin', 'delivered', 'Pain Relief', '100', 3000, '', '', '', '2024-06-22', '2024-04-30 14:02:24', '2024-04-30 00:00:00', NULL, 33, 'supplier');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `orderId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `medicineName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `batchNo` int(11) NOT NULL,
  `unitAmount` int(11) NOT NULL,
  `pharmacyId` int(11) NOT NULL,
  `billDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`orderId`, `customerName`, `medicineName`, `category`, `phone`, `quantity`, `price`, `batchNo`, `unitAmount`, `pharmacyId`, `billDate`) VALUES
(1, 'Jayantha', 'asprine', 'special', 751234567, 5, 25, 459, 5, 32, '2024-03-11 00:00:00'),
(2, 'Ravindu', 'piritan', 'general', 757894561, 10, 40, 1563, 4, 32, '2024-03-11 00:00:00'),
(3, 'Chandima', 'depamint', 'special', 771234567, 10, 100, 789, 10, 32, '2024-03-11 16:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `deliveredorders`
--

CREATE TABLE `deliveredorders` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `bidTableId` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `medicineName` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `manufacturedDate` date NOT NULL,
  `expireDate` date NOT NULL,
  `pharmacyId` int(11) NOT NULL,
  `pharmacyName` varchar(50) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveredorders`
--

INSERT INTO `deliveredorders` (`id`, `orderId`, `bidTableId`, `medicineId`, `medicineName`, `brand`, `volume`, `type`, `category`, `quantity`, `manufacturedDate`, `expireDate`, `pharmacyId`, `pharmacyName`, `supplierId`, `supplierName`, `createdAt`) VALUES
(6, 73, 36, 21, 'Aspirine', 'Asatab', 100, '(mg) Tablets', 'general', 100, '2024-04-01', '2024-05-15', 32, 'pharmacy', 33, 'supplier', '2024-04-28'),
(7, 73, 36, 21, 'Aspirine', 'Asatab', 100, '(mg) Tablets', 'general', 25, '2024-04-20', '2024-05-31', 32, 'pharmacy', 33, 'supplier', '2024-04-28'),
(8, 77, 37, 23, 'paracetamol', 'panadol', 100, '(mg) Tablets', 'general', 200, '2024-04-01', '2024-04-30', 32, 'pharmacy', 33, 'supplier', '2024-04-28'),
(9, 77, 37, 23, 'Paracetamol', 'Panadol', 500, 'Tablets (mg)', 'Pain Relief', 100, '2024-03-31', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-28'),
(10, 77, 37, 23, 'paracetamol', 'panadol', 100, '(mg) Tablets', 'general', 50, '2024-04-01', '2024-05-15', 32, 'pharmacy', 33, 'supplier', '2024-04-28'),
(11, 77, 37, 23, 'paracetamol', 'Panadol', 100, '(mg) Tablets', 'general', 350, '2024-04-01', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-29'),
(12, 77, 37, 23, 'paracetamol', 'panadol', 100, '(mg) Tablets', 'general', 25, '2024-04-01', '2024-05-15', 32, 'pharmacy', 33, 'supplier', '2024-04-29'),
(13, 73, 36, 21, 'Aspirine', 'Asatab', 100, '(mg) Tablets', 'general', 125, '2024-04-20', '2024-04-28', 32, 'pharmacy', 33, 'supplier', '2024-04-29'),
(14, 79, 38, 21, 'Aspirine', 'panadol', 100, '(mg) Tablets', 'general', 100, '2024-04-01', '2024-05-25', 32, 'pharmacy', 33, 'supplier', '2024-04-29'),
(15, 79, 38, 21, 'Aspirine', 'panadol', 100, '(mg) Tablets', 'general', 400, '2024-04-01', '2024-05-25', 32, 'pharmacy', 33, 'supplier', '2024-04-29'),
(16, 79, 38, 21, 'Aspirine', 'Zorprin', 100, '(mg) Tablets', 'general', 500, '2024-04-01', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-30'),
(17, 77, 37, 23, 'paracetamol', 'panadol', 100, '(mg) Tablets', 'general', 25, '2024-04-01', '2024-05-15', 32, 'pharmacy', 33, 'supplier', '2024-04-30'),
(18, 88, 48, 21, 'Aspirine', 'Zorprin', 100, '(mg) Tablets', 'general', 220, '2024-04-01', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-30'),
(19, 89, 49, 21, 'Aspirine', 'Zorprin', 100, '(mg) Tablets', 'general', 80, '2024-04-01', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-30'),
(20, 89, 49, 21, 'Aspirin', 'Zorprin', 100, 'Tablets (mg)', 'Pain Relief', 140, '2024-04-02', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-30'),
(21, 90, 50, 21, 'Aspirin', 'Zorprin', 100, 'Tablets (mg)', 'Pain Relief', 300, '2024-04-02', '2024-05-11', 32, 'pharmacy', 33, 'supplier', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `bidTableId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pharmacy_id` int(11) NOT NULL,
  `manu_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `unit_amount` varchar(255) NOT NULL,
  `medicineId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `bidTableId`, `name`, `refno`, `type`, `volume`, `brand`, `description`, `batch_no`, `category`, `quantity`, `supplier_id`, `pharmacy_id`, `manu_date`, `expire_date`, `status`, `unit_amount`, `medicineId`) VALUES
(31, 48, 'Aspirine', '', '(mg) Tablets', 100, 'Zorprin', 'this is a pain relief medicine', 'BCH151515', 'general', 220, 33, 32, '2024-04-01 00:00:00', '2024-05-11 00:00:00', '', '5', 21),
(32, 49, 'Aspirine', '', '(mg) Tablets', 100, 'Zorprin', 'this is a pain relief medicine', 'BCH565656', 'general', 80, 33, 32, '2024-04-01 00:00:00', '2024-05-11 00:00:00', '', '5', 21),
(33, 49, 'Aspirin', '', 'Tablets (mg)', 100, 'Zorprin', 'this is a pain relief medicine', 'BCH565656', 'Pain Relief', 140, 33, 32, '2024-04-02 00:00:00', '2024-05-11 00:00:00', '', '5', 21),
(9, 0, 'depamint', '', '', 0, '', '', '789', 'special', 1000, 0, 32, '2024-02-26 00:00:00', '2024-04-01 00:00:00', '', '10', 12345),
(30, 48, 'Aspirine', '', '(mg) Tablets', 100, 'Zorprin', 'this is a pain relief medicine', 'BCH151515', 'general', 220, 33, 32, '2024-04-01 00:00:00', '2024-05-11 00:00:00', '', '5', 21),
(17, 36, 'Aspirine', '', '(mg) Tablets', 100, 'Asatab', 'this is a pain relief medicine', 'BCH123479', 'general', 100, 33, 32, '2024-04-01 00:00:00', '2024-05-15 00:00:00', '', '100', 21),
(18, 36, 'Aspirine', '', '(mg) Tablets', 100, 'Asatab', 'this is a pain relief medicine', 'BCH123479', 'general', 25, 33, 32, '2024-04-20 00:00:00', '2024-05-31 00:00:00', '', '100', 21),
(19, 37, 'paracetamol', '', '(mg) Tablets', 100, 'panadol', 'this is a pain relief medicine', 'BCH123474', 'general', 200, 33, 32, '2024-04-01 00:00:00', '2024-04-30 00:00:00', '', '100', 23),
(20, 37, 'Paracetamol', '', 'Tablets (mg)', 500, 'Panadol', 'this is a pain relief medicine', 'BCH123474', 'Pain Relief', 100, 33, 32, '2024-03-31 00:00:00', '2024-05-11 00:00:00', '', '100', 23),
(21, 37, 'paracetamol', '', '(mg) Tablets', 100, 'panadol', 'this is a pain relief medicine', 'BCH123474', 'general', 50, 33, 32, '2024-04-01 00:00:00', '2024-05-15 00:00:00', '', '100', 23),
(22, 37, 'paracetamol', '', '(mg) Tablets', 100, 'panadol', 'this is a pain relief medicine', 'BCH123474', 'general', 200, 33, 32, '2024-04-01 00:00:00', '2024-04-30 00:00:00', '', '100', 23),
(23, 37, 'Paracetamol', '', 'Tablets (mg)', 500, 'Panadol', 'this is a pain relief medicine', 'BCH123474', 'Pain Relief', 100, 33, 32, '2024-03-31 00:00:00', '2024-05-11 00:00:00', '', '100', 23),
(24, 37, 'paracetamol', '', '(mg) Tablets', 100, 'panadol', 'this is a pain relief medicine', 'BCH123474', 'general', 50, 33, 32, '2024-04-01 00:00:00', '2024-05-15 00:00:00', '', '100', 23),
(25, 37, 'paracetamol', '', '(mg) Tablets', 100, 'Panadol', 'this is a pain relief medicine', 'BCH123474', 'general', 350, 33, 32, '2024-04-01 00:00:00', '2024-05-11 00:00:00', '', '100', 23),
(26, 37, 'paracetamol', '', '(mg) Tablets', 100, 'panadol', 'this is a pain relief medicine', 'BCH123474', 'general', 25, 33, 32, '2024-04-01 00:00:00', '2024-05-15 00:00:00', '', '100', 23),
(27, 36, 'Aspirine', '', '(mg) Tablets', 100, 'Asatab', 'this is a pain relief medicine', 'BCH123479', 'general', 100, 33, 32, '2024-04-01 00:00:00', '2024-05-15 00:00:00', '', '100', 21),
(28, 36, 'Aspirine', '', '(mg) Tablets', 100, 'Asatab', 'this is a pain relief medicine', 'BCH123479', 'general', 25, 33, 32, '2024-04-20 00:00:00', '2024-05-31 00:00:00', '', '100', 21),
(29, 36, 'Aspirine', '', '(mg) Tablets', 100, 'Asatab', 'this is a pain relief medicine', 'BCH123479', 'general', 125, 33, 32, '2024-04-20 00:00:00', '2024-04-28 00:00:00', '', '100', 21);

-- --------------------------------------------------------

--
-- Table structure for table `managerregistration`
--

CREATE TABLE `managerregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managerregistration`
--

INSERT INTO `managerregistration` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(31, 'manager', '222/1', '0715714175', 'manager@gmail.com', 'Ab@1234');

-- --------------------------------------------------------

--
-- Table structure for table `medicinebrands`
--

CREATE TABLE `medicinebrands` (
  `id` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `brandname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicinebrands`
--

INSERT INTO `medicinebrands` (`id`, `medicineId`, `brandname`) VALUES
(1, 21, 'Zorprin'),
(2, 21, 'Durlaza'),
(3, 21, 'Asatab'),
(4, 23, 'Panadol'),
(5, 23, 'Calpol'),
(6, 27, 'Moxilin'),
(7, 27, 'Trimox'),
(10, 64, 'amoxlin'),
(11, 64, 'amoxlin'),
(12, 66, 'Axolin'),
(13, 66, 'Axolin'),
(14, 68, 'Axoin'),
(15, 43, 'Panadol'),
(16, 27, 'Panadol'),
(17, 24, 'panadol'),
(18, 22, 'panadol'),
(19, 22, 'panadol'),
(20, 44, 'panadol'),
(21, 44, 'Axolin'),
(22, 21, 'panadol'),
(23, 27, 'Axolin'),
(24, 45, 'AXOLIN'),
(25, 45, 'panadol'),
(26, 46, 'AXOLIN'),
(27, 47, 'AXOLIN'),
(28, 48, 'AXOLIN'),
(29, 49, 'Panadol'),
(30, 50, 'Panadol'),
(31, 52, 'zorpin'),
(32, 55, 'Amazon Health'),
(33, 43, 'Moxilin'),
(34, 43, 'Calpol'),
(35, 56, 'axolin'),
(36, 60, 'axolin'),
(37, 60, 'panadol'),
(38, 61, 'Panadol'),
(39, 61, 'moxilin'),
(40, 62, 'AXOLIN'),
(41, 62, 'Panadol');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pharmacyId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `managerId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `pharmacyId`, `supplierId`, `managerId`, `adminId`, `sender`, `receiver`, `heading`, `message`, `createdDate`) VALUES
(11, 32, 0, 0, 0, 'pharmacy', 'manager', 'ask for new medicibne', 'i want that\r\n\r\nmedicine', '2024-04-23 16:12:06'),
(14, 32, 0, 31, 0, 'manager', 'pharmacy', 'ask for new medicibne', 'Ok send me more details', '2024-04-27 01:06:40'),
(15, 0, 0, 31, 0, 'manager', 'admin', 'regarding the system issue', 'i cant see medicine table', '2024-04-27 11:37:21'),
(16, 0, 0, 31, 0, 'manager', 'supplier', 'You have bad reviews', 'last week , we identified you have done some corrupted works', '2024-04-29 12:43:24'),
(22, 0, 0, 0, 0, 'admin@gmail.com', '', '', '', '2024-04-30 10:16:14'),
(19, 0, 0, 0, 0, 'supplier', 'manager', 'You have bad reviews', 'Ok send me more details', '2024-04-29 14:37:22'),
(20, 0, 0, 0, 0, 'admin@gmail.com', '', 'I sent email', 'this is a pain relief medicine', '2024-04-29 15:43:03'),
(21, 0, 0, 0, 0, 'admin', 'manager', 'For system issue', 'Page is not available', '2024-04-29 20:29:16'),
(23, 32, 0, 0, 0, 'regarding the system issue', 'admin', 'regarding the system issue', 'regarding the system issue', '2024-04-30 13:15:33'),
(24, 32, 0, 0, 0, 'pharmacy@gmail.com', 'supplier@gmail.com', 'I sent email', 'this is good for better healthy life', '2024-04-30 13:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacyregistration`
--

CREATE TABLE `pharmacyregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `licenceno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `licence` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacyregistration`
--

INSERT INTO `pharmacyregistration` (`id`, `name`, `address`, `phone`, `licenceno`, `email`, `password`, `licence`, `status`, `user_id`, `reason`) VALUES
(38, 'ABC pharmacy', '222/1 ,Athurugiriya Road , Kottawa Pannipitiya', '0715714175', '1231231', 'pharmacy2@gmail.com', '123456', 'pharmacyLicence.pdf', 'pending', 0, ''),
(40, 'XYZ pharmacy', '21 /3 , Anuradhapura', '0778882211', '123123XS', 'xyz@gmail.com', '123456', 'pharmacyLicence.pdf', 'pending', 0, ''),
(41, 'Ravindu', 'Mangala, Keradewala, Majuwana, Hikkaduwa', '0761913194', 'BA15425', 'ravindupasannanayakkara@gmail.com', '123456', 'pharmacyLicence.pdf', 'pending', 0, ''),
(49, 'Pharmacy', '222/1 , Athurugiriya Road , Kottawa , Pannipitiya', '0715714175', '123456B', 'pharmacy@gmail.com', '123456', 'pharmacyLicence.pdf', 'approved', 2, 'he is doing some curropted works');

-- --------------------------------------------------------

--
-- Table structure for table `regmedicines`
--

CREATE TABLE `regmedicines` (
  `medicineId` int(11) NOT NULL,
  `medicinename` varchar(50) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `manufacturedDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regmedicines`
--

INSERT INTO `regmedicines` (`medicineId`, `medicinename`, `refno`, `category`, `volume`, `type`, `description`, `manufacturedDate`) VALUES
(21, 'Aspirin', 'MED4212', 'Pain Relief', 100, 'Tablets (mg)', 'Relieves minor aches and pains.', '0000-00-00'),
(23, 'Paracetamol', 'MED6745', 'Pain Relief', 500, 'Tablets (mg)', 'Effective for headaches and fevers.', '0000-00-00'),
(24, 'Lisinopril', 'MED1589', 'Blood Pressure', 10, 'Tablets (mg)', 'Treats high blood pressure.', '0000-00-00'),
(27, 'Amoxicillin', 'MED1241', 'Antibiotic', 250, 'Tablets (mg)', 'Fights bacterial infections.', '0000-00-00'),
(43, 'boric acid', 'MED0234', 'pain', 50, 'units (g)', 'for pain killer', '0000-00-00'),
(50, 'panadol', 'MED1234', 'pain relief', 100, '(g) units', 'this is good for better healthy life', '0000-00-00'),
(51, 'Metformin', 'MED7891', 'Diabetes Management', 500, '(mg) Tablets', 'Oral medication used to manage type 2 diabetes.', '0000-00-00'),
(52, ' Cetirizine', 'MED8901', 'Antihistamine', 10, '(mg) Tablets', 'Used to relieve symptoms of allergies such as sneezing, itching, and runny nose.', '0000-00-00'),
(53, 'Metronidazole', 'MED9012', 'Antibiotic', 200, '(mg) Tablets', 'Antibiotic used to treat various bacterial and protozoal infections.', '0000-00-00'),
(54, ' Simvastatin', 'MED9016', 'Cholesterol Management', 500, '(mg) Tablets', 'Antibiotic used to treat various bacterial and protozoal infections.', '0000-00-00'),
(55, 'Vitamin C', 'MED1236', 'Vitamin Supplement', 1000, '(mg) Tablets', 'Commonly taken as a dietary supplement to support immune function and overall health.', '0000-00-00'),
(60, 'Medicine2', 'MED203024', 'pain relief', 500, '(mg)tablets', 'For pain killer', '2024-04-01'),
(61, 'Medicine3', 'MED102938', 'pain relief', 500, '(mg)tablets', 'For pain killer', '2024-04-01'),
(62, 'Medicine5', 'MED1426', 'pain relief', 500, '(mg)tablets', 'For Headache', '2024-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `requestorder`
--

CREATE TABLE `requestorder` (
  `id` int(11) NOT NULL,
  `pharmacyname` varchar(50) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `pharmacy_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `batchno` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `category` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deliveryDate` date NOT NULL,
  `orderEndDate` date NOT NULL,
  `reason` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestorder`
--

INSERT INTO `requestorder` (`id`, `pharmacyname`, `refno`, `pharmacy_id`, `medicine_name`, `medicine_id`, `batchno`, `createdAt`, `status`, `category`, `quantity`, `deliveryDate`, `orderEndDate`, `reason`, `type`, `volume`, `brand`) VALUES
(73, 'pharmacy', 'MED4212', 32, 'Aspirin', 21, '12345', '2024-04-23 13:41:22', 'delivered', 'Pain Relief', 250, '2024-05-03', '0000-00-00', '', 'Tablets (mg)', '100', 'asatab'),
(74, 'pharmacy', 'MED4212', 32, 'Aspirin', 21, '12345', '2024-04-23 13:56:41', 'cancelled', 'Pain Relief', 1000, '2024-04-30', '0000-00-00', '', 'Tablets (mg)', '100', 'Zorprin'),
(75, 'pharmacy', 'MED1241', 32, 'Amoxicillin', 27, '11223', '2024-04-24 15:52:50', 'cancelled', 'Antibiotic', 500, '2024-04-30', '0000-00-00', '', 'Tablets (mg)', '250', 'Moxilin'),
(76, 'pharmacy', 'MED4212', 32, 'Aspirin', 21, '', '2024-04-25 15:00:07', 'cancelled', 'Pain Relief', 590, '2024-05-10', '0000-00-00', '', 'Tablets (mg)', '100', 'Zorprin'),
(77, 'pharmacy', 'MED6745', 32, 'Paracetamol', 23, '', '2024-04-28 18:54:39', 'delivered', 'Pain Relief', 350, '2024-05-11', '0000-00-00', '', 'Tablets (mg)', '500', 'Panadol'),
(78, 'Nisal Wishwajith', 'MED4212', 74, 'Aspirin', 21, '', '2024-04-29 20:53:32', 'cancelled', 'Pain Relief', 500, '2024-05-11', '0000-00-00', '', 'Tablets (mg)', '100', 'Asatab'),
(81, 'pharmacy', 'MED1241', 32, 'Amoxicillin', 27, '', '2024-04-29 22:27:48', 'cancelled', 'Antibiotic', 550, '2024-05-11', '0000-00-00', '', 'Tablets (mg)', '250', 'Moxilin'),
(82, 'pharmacy', 'MED8901', 32, 'Cetirizine', 52, '', '2024-04-29 22:30:44', 'accepted', 'Antihistamine', 550, '2024-05-11', '0000-00-00', '', '(mg) Tablets', '10', 'zorpin'),
(83, 'pharmacy', 'MED1241', 32, 'Amoxicillin', 27, '', '2024-04-18 08:46:34', 'pending', 'Antibiotic', 350, '2024-05-18', '0000-00-00', '', 'Tablets (mg)', '250', 'Axolin'),
(88, 'pharmacy', 'MED4212', 32, 'Aspirin', 21, '', '2024-04-30 10:39:42', 'delivered', 'Pain Relief', 220, '2024-05-25', '0000-00-00', '', 'Tablets (mg)', '100', 'Zorprin'),
(90, 'pharmacy', 'MED4212', 32, 'Aspirin', 21, '', '2024-04-30 14:02:24', 'pending', 'Pain Relief', 300, '2024-06-22', '0000-00-00', '', 'Tablets (mg)', '100', 'Zorprin');

-- --------------------------------------------------------

--
-- Table structure for table `supplierinventory`
--

CREATE TABLE `supplierinventory` (
  `id` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `medicineName` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `batchNo` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `manufactureDate` date NOT NULL,
  `expireDate` date NOT NULL,
  `supplierId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplierinventory`
--

INSERT INTO `supplierinventory` (`id`, `medicineId`, `medicineName`, `brand`, `category`, `volume`, `type`, `batchNo`, `quantity`, `manufactureDate`, `expireDate`, `supplierId`) VALUES
(1, 21, 'Aspirine', 'Asatab', 'general', 100, '(mg) Tablets', 'BCH297482', 0, '2024-04-20', '2024-04-28', 33),
(2, 21, 'Aspirine', 'Asatab', 'general', 100, '(mg) Tablets', 'BCH295647', 0, '2024-04-01', '2024-05-15', 33),
(3, 21, 'Aspirine', 'Asatab', 'general', 100, '(mg) Tablets', 'BCH162739', 0, '2024-04-16', '2024-04-30', 33),
(4, 21, 'Aspirine', 'Zorprin', 'general', 100, '(mg) Tablets', 'BCH132435', 100, '2024-04-01', '2024-05-15', 33),
(5, 23, 'paracetamol', 'panadol', 'general', 100, '(mg) Tablets', 'BCH293847', 0, '2024-04-01', '2024-05-15', 33),
(6, 23, 'paracetamol', 'panadol', 'general', 100, '(mg) Tablets', 'BCH237654', 0, '2024-04-01', '2024-04-30', 33),
(9, 27, 'Amoxicillin', 'Moxilin', 'Antibiotic', 250, 'Tablets (mg)', 'BCH234567', 100, '2024-04-01', '2024-05-11', 33),
(10, 27, 'Amoxicillin', 'Moxilin', 'Antibiotic', 250, 'Tablets (mg)', 'BCH987654', 100, '2024-04-01', '2024-05-11', 33),
(11, 27, 'Amoxicillin', 'Panadol', 'Antibiotic', 250, 'Tablets (mg)', 'BCH123465', 100, '2024-03-31', '2024-05-11', 33),
(12, 23, 'Paracetamol', 'Panadol', 'Pain Relief', 500, 'Tablets (mg)', 'BCH123456', 0, '2024-03-31', '2024-05-11', 33),
(13, 23, 'paracetamol', 'Panadol', 'general', 100, '(mg) Tablets', 'BCH123474', 0, '2024-04-01', '2024-05-11', 33),
(14, 27, 'Amoxicillin', 'Panadol', 'Antibiotic', 250, 'Tablets (mg)', 'BCH123479', 350, '2024-04-04', '2024-05-11', 33),
(15, 21, 'Aspirine', 'Zorprin', 'general', 100, '(mg) Tablets', 'BCH123471', 0, '2024-04-01', '2024-05-11', 33),
(16, 21, 'Aspirine', 'panadol', 'general', 100, '(mg) Tablets', 'BCH123478', 0, '2024-04-01', '2024-05-25', 33),
(17, 21, 'Aspirine', 'Zorprin', 'general', 100, '(mg) Tablets', 'BCH123494', 500, '2024-04-01', '2024-05-25', 33),
(18, 21, 'Aspirine', 'Zorprin', 'general', 100, '(mg) Tablets', 'BCH200000', 0, '2024-04-01', '2024-05-11', 33),
(19, 21, 'Aspirin', 'Zorprin', 'Pain Relief', 100, 'Tablets (mg)', 'BCH454545', 10, '2024-04-02', '2024-05-11', 33);

-- --------------------------------------------------------

--
-- Table structure for table `supplierregistration`
--

CREATE TABLE `supplierregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `licenceno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `licence` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplierregistration`
--

INSERT INTO `supplierregistration` (`id`, `name`, `address`, `phone`, `licenceno`, `email`, `password`, `licence`, `status`, `reason`) VALUES
(14, 'supplier', '222/1, habanhena, matara', '0715714175', '1213414S', 'supplier@gmail.com', '123456', '', 'approved', ''),
(15, 'abc', '22/B , kaburupiiya ,Matara', '0705918924', '131424v', 'supplier1@gmail.com', '123456', 'SupplierLicence.pdf', 'pending', ''),
(18, 'abc', '54/E ,colombo 07', '0705918924', '131424B', 'wishwajith@gmail.com', '123456', 'SupplierLicence.pdf', 'pending', ''),
(19, 'Nanayakkara', 'Mangala, Keradewala, Majuwana, Hikkaduwa', '0761913194', 'SLN123456', 'nanayakkara@gmail.com', 'Nanayakkara@2001', 'SupplierLicence.pdf', 'pending', ''),
(20, 'abc', 'Kirillawala , polgahawela', '0705918924', '1123124', 'supplier3@gmail.com', 'Ab@1234', 'SupplierLicence.pdf', 'approved', ''),
(22, 'Supplier2', 'Colombo', '0715714175', '09876B', 'supplier2@gmail.com', 'Ab@1234', 'pharmacyLicence-2.pdf', 'approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created`, `userId`) VALUES
(13, 'admin', 'admin@gmail.com', '123456', 'admin', '2023-11-03 01:30:19', 1),
(31, 'manager', 'manager@gmail.com', 'Ab@1234', 'manager', '2023-11-03 08:37:57', 31),
(32, 'pharmacy', 'pharmacy@gmail.com', '123456', 'pharmacy', '2023-11-03 08:38:44', 49),
(33, 'supplier', 'supplier@gmail.com', '123456', 'supplier', '2023-11-03 08:38:48', 14),
(76, 'Supplier2', 'supplier2@gmail.com', 'Ab@1234', 'supplier', '2024-04-29 22:39:49', 22),
(77, 'abc', 'supplier3@gmail.com', 'Ab@1234', 'supplier', '2024-04-29 22:45:38', 20),
(81, 'Manager2', 'wishwajithnisal@gmail.com', '123456', 'manager', '2024-04-30 13:42:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidtable`
--
ALTER TABLE `bidtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `deliveredorders`
--
ALTER TABLE `deliveredorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managerregistration`
--
ALTER TABLE `managerregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinebrands`
--
ALTER TABLE `medicinebrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacyregistration`
--
ALTER TABLE `pharmacyregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regmedicines`
--
ALTER TABLE `regmedicines`
  ADD PRIMARY KEY (`medicineId`);

--
-- Indexes for table `requestorder`
--
ALTER TABLE `requestorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplierinventory`
--
ALTER TABLE `supplierinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplierregistration`
--
ALTER TABLE `supplierregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidtable`
--
ALTER TABLE `bidtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `customerorder`
--
ALTER TABLE `customerorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveredorders`
--
ALTER TABLE `deliveredorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `managerregistration`
--
ALTER TABLE `managerregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `medicinebrands`
--
ALTER TABLE `medicinebrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pharmacyregistration`
--
ALTER TABLE `pharmacyregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `regmedicines`
--
ALTER TABLE `regmedicines`
  MODIFY `medicineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `requestorder`
--
ALTER TABLE `requestorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `supplierinventory`
--
ALTER TABLE `supplierinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplierregistration`
--
ALTER TABLE `supplierregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
