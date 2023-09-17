-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 10:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h2o_watersupply`
--

-- --------------------------------------------------------

--
-- Table structure for table `retailer_table`
--

CREATE TABLE `retailer_table` (
  `id` int(11) NOT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `ownername` varchar(255) DEFAULT NULL,
  `licenseno` varchar(255) DEFAULT NULL,
  `retailer_phno` varchar(255) DEFAULT NULL,
  `retailer_address` varchar(255) DEFAULT NULL,
  `retailer_email` varchar(255) DEFAULT NULL,
  `retailer_password` varchar(255) DEFAULT NULL,
  `retailer_place` varchar(255) DEFAULT NULL,
  `retailer_zipcode` varchar(255) DEFAULT NULL,
  `retailer_district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retailer_table`
--

INSERT INTO `retailer_table` (`id`, `shopname`, `ownername`, `licenseno`, `retailer_phno`, `retailer_address`, `retailer_email`, `retailer_password`, `retailer_place`, `retailer_zipcode`, `retailer_district_id`) VALUES
(3, 'criteriax', 'sreehari', '221uhkh21k2', '9847991045', 'nill', 'mithunshaji2003@gmail.com', '1234567', 'kattappana', '123456', 12),
(4, 'mithuns water', 'mithun', '221uhkh21k2', '9847991045', 'nill', 'iammithunshaji@gmail.com', '12345678', 'kattappana', '234578', 6),
(6, 'mithuns water', 'mithun', '221uhkh21k2', '9847991045', 'nill', 'ebyjohn@gmail.com', '12345678', 'kattappana', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `retailer_table`
--
ALTER TABLE `retailer_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `retailer_email` (`retailer_email`),
  ADD KEY `fk_orders_customers` (`retailer_district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `retailer_table`
--
ALTER TABLE `retailer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `retailer_table`
--
ALTER TABLE `retailer_table`
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`retailer_district_id`) REFERENCES `district` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
