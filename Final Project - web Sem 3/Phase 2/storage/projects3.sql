-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 09:02 AM
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
  `Age` date DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `PhoneNo` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Id`, `C_Name`, `Age`, `Gender`, `PhoneNo`, `email`) VALUES
(0, 'admin', NULL, NULL, NULL, NULL),
(1, 'sandeep', '1996-07-05', 'male', '9633648985', 'sksandeep144@gmail.com'),
(2, 'sandeep', '2021-02-01', 'male', '8979455547', 'sk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `D_Id` int(11) NOT NULL,
  `D_Name` varchar(30) DEFAULT NULL,
  `D_Details` varchar(255) DEFAULT NULL,
  `D_Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`D_Id`, `D_Name`, `D_Details`, `D_Image`) VALUES
(0, 'tata sky', 'https://stackoverflow.com/', 0x73746f726167652f756e6e616d65642e6a7067),
(1, 'sun', 'dadagfugfua', ''),
(2, 'sun direct', 'adadff', '');

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
  `Offer_Name` varchar(200) NOT NULL,
  `D_Id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `OfferDetails` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`Offer_Id`, `Offer_Name`, `D_Id`, `price`, `OfferDetails`) VALUES
(1, 'deepavali', 1, 1000, '30 days;all channels+free music'),
(2, 'adad', 2, 100, 'sad'),
(3, 'dadad', 1, 200, 'dad'),
(4, 'super 9', 0, 5000, 'good offer'),
(5, 'super 10', 1, 11000, 'qdad');

-- --------------------------------------------------------

--
-- Table structure for table `recharge`
--

CREATE TABLE `recharge` (
  `R_Id` int(11) NOT NULL,
  `C_Id` int(11) DEFAULT NULL,
  `D_Id` int(11) DEFAULT NULL,
  `R_date` date DEFAULT NULL,
  `OfferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recharge`
--

INSERT INTO `recharge` (`R_Id`, `C_Id`, `D_Id`, `R_date`, `OfferID`) VALUES
(1, 1, 1, '2021-02-02', 1);

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
(0, 'admin', 'admin', 'admin'),
(1, 'sksandeep', '12345', 'cust'),
(2, 'sandeep', 'Akai@kami56', 'cust');

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
  ADD KEY `FK_RechargeDish` (`D_Id`),
  ADD KEY `FK_offerid` (`OfferID`);

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
  ADD CONSTRAINT `FK_RechargeDish` FOREIGN KEY (`D_Id`) REFERENCES `dish` (`D_Id`),
  ADD CONSTRAINT `FK_offerid` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`Offer_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Users` FOREIGN KEY (`U_Id`) REFERENCES `customer` (`C_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
