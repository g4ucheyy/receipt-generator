-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2026 at 04:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakereceipt`
--

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id_cust` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notel` varchar(15) NOT NULL,
  `emel` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_item`
--

CREATE TABLE `receipt_item` (
  `id_cust` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `flavour` varchar(200) NOT NULL,
  `filling` varchar(200) NOT NULL,
  `frosting` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qtty` int(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_type` varchar(255) NOT NULL,
  `total` double(6,2) NOT NULL,
  `discount` double(6,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD KEY `id_cust` (`id_cust`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD CONSTRAINT `receipt_item_ibfk_1` FOREIGN KEY (`id_cust`) REFERENCES `receipt` (`id_cust`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
