-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 02:13 PM
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
-- Database: `farmar`
--

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `crop_id` int(11) NOT NULL,
  `crop_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`crop_id`, `crop_name`) VALUES
(1, 'Cauliflower');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `name` varchar(50) NOT NULL,
  `dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`name`, `dates`) VALUES
('harsh', '2023-07-15 00:00:00'),
('desai', '2023-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fertigation`
--

CREATE TABLE `fertigation` (
  `fertigation_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `area` varchar(50) NOT NULL,
  `type` varchar(250) NOT NULL,
  `total` varchar(50) NOT NULL,
  `totalacre` varchar(50) NOT NULL,
  `typeofproduct` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertigation`
--

INSERT INTO `fertigation` (`fertigation_no`, `date`, `area`, `type`, `total`, `totalacre`, `typeofproduct`) VALUES
(1, '2023-07-19', 'nethouse', 'Urea', '10', '100', 'Cauliflower');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer`
--

CREATE TABLE `fertilizer` (
  `Fertilizer_no` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertilizer`
--

INSERT INTO `fertilizer` (`Fertilizer_no`, `Name`) VALUES
(1, 'Urea');

-- --------------------------------------------------------

--
-- Table structure for table `fungicide`
--

CREATE TABLE `fungicide` (
  `Fungicide_no` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Technical` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fungicide`
--

INSERT INTO `fungicide` (`Fungicide_no`, `Name`, `Technical`) VALUES
(1, 'Polyram', 'Metiram 70%');

-- --------------------------------------------------------

--
-- Table structure for table `harvesting`
--

CREATE TABLE `harvesting` (
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `totalkgs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harvesting`
--

INSERT INTO `harvesting` (`type`, `date`, `totalkgs`) VALUES
('dhairya', '2023-07-17', '190'),
('harsh', '2023-07-20', '490'),
('tomato', '2023-07-21', '50'),
('tomato', '2023-07-21', '50');

-- --------------------------------------------------------

--
-- Table structure for table `insecticide`
--

CREATE TABLE `insecticide` (
  `Insecticide_no` int(10) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Technical` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insecticide`
--

INSERT INTO `insecticide` (`Insecticide_no`, `Quantity`, `Name`, `Technical`) VALUES
(1, '25gm', 'Actara', 'Thiamethoxam 30%');

-- --------------------------------------------------------

--
-- Table structure for table `irrigation`
--

CREATE TABLE `irrigation` (
  `Irrigation_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `area` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `days` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `irrigation`
--

INSERT INTO `irrigation` (`Irrigation_no`, `date`, `area`, `time`, `type`, `days`) VALUES
(13, '2023-06-29', '2.5 ', '00:00:20', 'Muskmelon', '20 days');

-- --------------------------------------------------------

--
-- Table structure for table `pgr`
--

CREATE TABLE `pgr` (
  `PGR_no` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Technical` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pgr`
--

INSERT INTO `pgr` (`PGR_no`, `Name`, `Technical`) VALUES
(1, 'Lihocin', 'Chlormequat 50%');

-- --------------------------------------------------------

--
-- Table structure for table `plantation_index`
--

CREATE TABLE `plantation_index` (
  `Sr_no` bigint(20) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `Variety` varchar(50) NOT NULL,
  `Date_of_plantation` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Reviews` varchar(250) NOT NULL,
  `days` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantation_index`
--

INSERT INTO `plantation_index` (`Sr_no`, `Type`, `company`, `Variety`, `Date_of_plantation`, `Location`, `Area`, `Reviews`, `days`) VALUES
(1, 'type', 'company', 'varity', '70-01-01', 'location', 'bbbbb', 'review', '10 days');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(10) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `broker_name` varchar(250) NOT NULL,
  `kgs` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `total` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `Type`, `broker_name`, `kgs`, `rate`, `total`) VALUES
(1, 'Cauliflower', 'harsh', '10', '10', '100');

-- --------------------------------------------------------

--
-- Table structure for table `spray`
--

CREATE TABLE `spray` (
  `Type` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `TypeInsecticide` varchar(250) NOT NULL,
  `TechnicalInsecticide` varchar(250) NOT NULL,
  `TypeFungicide` varchar(50) NOT NULL,
  `TechnicalFungicide` varchar(250) NOT NULL,
  `TypeFertilizer` varchar(50) NOT NULL,
  `TypePGR` varchar(50) NOT NULL,
  `TechnicalPGR` varchar(250) NOT NULL,
  `Pump` varchar(50) NOT NULL,
  `Ltr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spray`
--

INSERT INTO `spray` (`Type`, `Area`, `Date`, `TypeInsecticide`, `TechnicalInsecticide`, `TypeFungicide`, `TechnicalFungicide`, `TypeFertilizer`, `TypePGR`, `TechnicalPGR`, `Pump`, `Ltr`) VALUES
('', '2.5', '2023-07-10', '1', 'Thiamethoxam 30%', '2', 'Fluxapyroxad + Pyraaclostrobin', '3', '1', 'Chlormequat 50%', '5', '1'),
('Muskmelon', '2.5', '2023-07-17', 'Actara', 'Thiamethoxam 30%', 'Blue Dot', 'Copper Oxychloride 50%', '0.52.34', 'Glycel', 'Glyphosate 41%', '2', '10'),
('dhairya', '2.5', '2023-07-17', 'dp', 'dhairya', 'dhairya p', 'dhairya', 'dhair', 'dhairya', 'dp', '5', '10'),
('harsh', '2.0', '2023-07-20', 'harsh', 'harsh insecticide tech', 'harsh fungicide', 'harsh fungicide tech', 'harsh fertilizer', 'harsh pgr', 'harsh pgr tech', '10', '2'),
('tomato', '2', '2023-07-21', 'Acrobat', 'Dimethomorph 50%', 'Polyram', 'Metiram 70%', 'Urea', 'harsh pgr', '123', '2', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`crop_id`);

--
-- Indexes for table `fertigation`
--
ALTER TABLE `fertigation`
  ADD PRIMARY KEY (`fertigation_no`);

--
-- Indexes for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD PRIMARY KEY (`Fertilizer_no`);

--
-- Indexes for table `fungicide`
--
ALTER TABLE `fungicide`
  ADD PRIMARY KEY (`Fungicide_no`);

--
-- Indexes for table `insecticide`
--
ALTER TABLE `insecticide`
  ADD PRIMARY KEY (`Insecticide_no`);

--
-- Indexes for table `irrigation`
--
ALTER TABLE `irrigation`
  ADD PRIMARY KEY (`Irrigation_no`);

--
-- Indexes for table `pgr`
--
ALTER TABLE `pgr`
  ADD PRIMARY KEY (`PGR_no`);

--
-- Indexes for table `plantation_index`
--
ALTER TABLE `plantation_index`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fertigation`
--
ALTER TABLE `fertigation`
  MODIFY `fertigation_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fertilizer`
--
ALTER TABLE `fertilizer`
  MODIFY `Fertilizer_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fungicide`
--
ALTER TABLE `fungicide`
  MODIFY `Fungicide_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insecticide`
--
ALTER TABLE `insecticide`
  MODIFY `Insecticide_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `irrigation`
--
ALTER TABLE `irrigation`
  MODIFY `Irrigation_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pgr`
--
ALTER TABLE `pgr`
  MODIFY `PGR_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plantation_index`
--
ALTER TABLE `plantation_index`
  MODIFY `Sr_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
