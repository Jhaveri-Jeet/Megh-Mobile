-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 11:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MeghEnterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `Companies`
--

CREATE TABLE `Companies` (
  `Id` int(11) NOT NULL,
  `CompanyName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `CustomerInfo` (
  `Id` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `CustomerNumber` varchar(250) NOT NULL,
  `BillDate` date NOT NULL,
  `EMIStartingDate` date NOT NULL,
  `EMIMonths` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `MobileId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Profit` int(11) NOT NULL,
  `Status` varchar(250) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `EMI` (
  `Id` int(11) NOT NULL,
  `CustomerInfoId` int(11) NOT NULL,
  `EMIDueDate` date DEFAULT NULL,
  `DueAmount` int(11) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Mobiles` (
  `Id` int(11) NOT NULL,
  `MobileName` varchar(15) NOT NULL,
  `CompanyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Companies`
--
ALTER TABLE `Companies`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FkCompanyIdInCustomerInfo` (`CompanyId`),
  ADD KEY `FkMobileIdInCustomerInfo` (`MobileId`);

--
-- Indexes for table `EMI`
--
ALTER TABLE `EMI`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkCustomerInfoIdIntEMI` (`CustomerInfoId`);

--
-- Indexes for table `Mobiles`
--
ALTER TABLE `Mobiles`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FkCompantIdInMobile` (`CompanyId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Companies`
--
ALTER TABLE `Companies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `EMI`
--
ALTER TABLE `EMI`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `Mobiles`
--
ALTER TABLE `Mobiles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  ADD CONSTRAINT `FkCompanyIdInCustomerInfo` FOREIGN KEY (`CompanyId`) REFERENCES `Companies` (`Id`),
  ADD CONSTRAINT `FkMobileIdInCustomerInfo` FOREIGN KEY (`MobileId`) REFERENCES `Mobiles` (`Id`);

--
-- Constraints for table `EMI`
--
ALTER TABLE `EMI`
  ADD CONSTRAINT `fkCustomerInfoIdIntEMI` FOREIGN KEY (`CustomerInfoId`) REFERENCES `CustomerInfo` (`Id`);

--
-- Constraints for table `Mobiles`
--
ALTER TABLE `Mobiles`
  ADD CONSTRAINT `FkCompantIdInMobile` FOREIGN KEY (`CompanyId`) REFERENCES `Companies` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
