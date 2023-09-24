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
-- Table structure for table `non_retailers_table`
--

CREATE TABLE `non_retailers_table` (
  `id` int(11) NOT NULL,
  `non_retailer_name` varchar(255) DEFAULT NULL,
  `non_retailer_email` varchar(255) DEFAULT NULL,
  `non_retailer_phno` varchar(20) DEFAULT NULL,
  `non_retailer_password` varchar(255) DEFAULT NULL,
  `non_retailer_place` varchar(255) DEFAULT NULL,
  `non_retailer_zipcode` varchar(10) DEFAULT NULL,
  `non_retailer_district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_retailers_table`
--

INSERT INTO `non_retailers_table` (`id`, `non_retailer_name`, `non_retailer_email`, `non_retailer_phno`, `non_retailer_password`, `non_retailer_place`, `non_retailer_zipcode`, `non_retailer_district_id`) VALUES
(4, 'Sreehari', 'sreehari@gmail.com', '9847991045', '123456', 'kattappana', '876876', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `non_retailers_table`
--
ALTER TABLE `non_retailers_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `non_retailer_email` (`non_retailer_email`),
  ADD KEY `fk` (`non_retailer_district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `non_retailers_table`
--
ALTER TABLE `non_retailers_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `non_retailers_table`
--
ALTER TABLE `non_retailers_table`
  ADD CONSTRAINT `fk` FOREIGN KEY (`non_retailer_district_id`) REFERENCES `district` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
