-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2018 at 02:18 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5646880_pharmacare`
--

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `Branch` (
  `id` int(11) NOT NULL,
  `branchAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Branch`
--

INSERT INTO `Branch` (`id`, `branchAddress`, `pharmacyID`, `userID`) VALUES
(4, '56sd2', 3, 7),
(5, '34 street', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `BranchMedicine`
--

CREATE TABLE `BranchMedicine` (
  `medicineID` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BranchMedicine`
--

INSERT INTO `BranchMedicine` (`medicineID`, `branchID`, `quantity`) VALUES
(10, 4, 36),
(10, 4, 98),
(9, 4, 58),
(9, 4, 55),
(10, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE `Medicine` (
  `id` int(11) NOT NULL,
  `medicineName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Medicine`
--

INSERT INTO `Medicine` (`id`, `medicineName`, `price`) VALUES
(9, 'Medicine1', 35),
(10, 'Medicine2', 35);

-- --------------------------------------------------------

--
-- Table structure for table `Pharmacy`
--

CREATE TABLE `Pharmacy` (
  `id` int(11) NOT NULL,
  `pharmacyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Pharmacy`
--

INSERT INTO `Pharmacy` (`id`, `pharmacyName`) VALUES
(2, 'ph8'),
(3, 'ph2'),
(6, 'Habiba'),
(7, 'Hagar');

-- --------------------------------------------------------

--
-- Table structure for table `Prescription`
--

CREATE TABLE `Prescription` (
  `id` int(11) NOT NULL,
  `userIDDr` int(11) NOT NULL,
  `userIDNormal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Prescription`
--

INSERT INTO `Prescription` (`id`, `userIDDr`, `userIDNormal`) VALUES
(8, 1, 3),
(9, 1, 3),
(10, 8, 3),
(11, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `PrescriptionMedicine`
--

CREATE TABLE `PrescriptionMedicine` (
  `prescriptionID` int(11) NOT NULL,
  `medicineID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PrescriptionMedicine`
--

INSERT INTO `PrescriptionMedicine` (`prescriptionID`, `medicineID`) VALUES
(8, 9),
(8, 10),
(8, 10),
(8, 10),
(8, 9),
(9, 9),
(9, 9),
(9, 9),
(10, 10),
(10, 10),
(11, 9),
(11, 9),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userType` enum('admin','pharmacist','normal','dr') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `password`, `userType`) VALUES
(1, 'Hussein', 'husseinkk96@gmail.com', 'hussein123', 'admin'),
(2, 'heegar', 'heegaar@mail.com', '123456789', 'normal'),
(3, 'hagarrr', 'hagar@mail.com', '123456789', 'normal'),
(6, 'Ramy', 'ramy@mail.com', '123456789', 'pharmacist'),
(7, 'Reham', 'reham@mail.com', '123456789', 'pharmacist'),
(8, 'medhat', 'medhat@mail.com', '123456789', 'dr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Branch`
--
ALTER TABLE `Branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacyID` (`pharmacyID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `BranchMedicine`
--
ALTER TABLE `BranchMedicine`
  ADD KEY `branchID` (`branchID`),
  ADD KEY `medicineID` (`medicineID`);

--
-- Indexes for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Pharmacy`
--
ALTER TABLE `Pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userIDDr` (`userIDDr`),
  ADD KEY `userIDNormal` (`userIDNormal`);

--
-- Indexes for table `PrescriptionMedicine`
--
ALTER TABLE `PrescriptionMedicine`
  ADD KEY `prescriptionID` (`prescriptionID`),
  ADD KEY `medicineID` (`medicineID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Branch`
--
ALTER TABLE `Branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Medicine`
--
ALTER TABLE `Medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Pharmacy`
--
ALTER TABLE `Pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Prescription`
--
ALTER TABLE `Prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Branch`
--
ALTER TABLE `Branch`
  ADD CONSTRAINT `hasManager` FOREIGN KEY (`userID`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `hasPharmacy` FOREIGN KEY (`pharmacyID`) REFERENCES `Pharmacy` (`id`);

--
-- Constraints for table `BranchMedicine`
--
ALTER TABLE `BranchMedicine`
  ADD CONSTRAINT `has` FOREIGN KEY (`branchID`) REFERENCES `Branch` (`id`),
  ADD CONSTRAINT `hasMedicine` FOREIGN KEY (`medicineID`) REFERENCES `Medicine` (`id`);

--
-- Constraints for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD CONSTRAINT `hasDr` FOREIGN KEY (`userIDDr`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `hasPatient` FOREIGN KEY (`userIDNormal`) REFERENCES `User` (`id`);

--
-- Constraints for table `PrescriptionMedicine`
--
ALTER TABLE `PrescriptionMedicine`
  ADD CONSTRAINT `hasPrescription` FOREIGN KEY (`prescriptionID`) REFERENCES `Prescription` (`id`),
  ADD CONSTRAINT `hasRemedy` FOREIGN KEY (`medicineID`) REFERENCES `Medicine` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
