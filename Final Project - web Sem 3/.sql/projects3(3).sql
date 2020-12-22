-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 07:17 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects3`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_Id` int(11) NOT NULL,
  `C_Name` varchar(30) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Id`, `C_Name`, `Age`, `Gender`, `PhoneNo`, `email`) VALUES
(1, '123', 1, '1', 12, 'sadadafdafa'),
(2, 'san', 11, 'sss', 121, 'adadad');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `D_Id` int(11) NOT NULL,
  `D_name` varchar(30) DEFAULT NULL,
  `D_Details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_Id` int(11) NOT NULL,
  `R_Id` int(11) DEFAULT NULL,
  `Feedback` varchar(255) DEFAULT NULL,
  `Reply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `Offer_Id` int(11) NOT NULL,
  `D_Id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `OfferDetails` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recharge`
--

CREATE TABLE `recharge` (
  `R_Id` int(11) NOT NULL,
  `C_Id` int(11) DEFAULT NULL,
  `D_Id` int(11) DEFAULT NULL,
  `R_date` date DEFAULT NULL,
  `R_Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_Id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_Id`, `username`, `password`, `type`) VALUES
(1, '123', '123', 'admin'),
(2, '1234', '1234', 'cust');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`D_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_Id`),
  ADD KEY `FK_FeedbackRecharge` (`R_Id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`Offer_Id`),
  ADD KEY `FK_Offers` (`D_Id`);

--
-- Indexes for table `recharge`
--
ALTER TABLE `recharge`
  ADD PRIMARY KEY (`R_Id`),
  ADD KEY `FK_RechargeCustomer` (`C_Id`),
  ADD KEY `FK_RechargeDish` (`D_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_FeedbackRecharge` FOREIGN KEY (`R_Id`) REFERENCES `recharge` (`R_Id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `FK_Offers` FOREIGN KEY (`D_Id`) REFERENCES `dish` (`D_Id`) ON DELETE CASCADE;

--
-- Constraints for table `recharge`
--
ALTER TABLE `recharge`
  ADD CONSTRAINT `FK_RechargeCustomer` FOREIGN KEY (`C_Id`) REFERENCES `customer` (`C_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RechargeDish` FOREIGN KEY (`D_Id`) REFERENCES `dish` (`D_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Users` FOREIGN KEY (`U_Id`) REFERENCES `customer` (`C_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
