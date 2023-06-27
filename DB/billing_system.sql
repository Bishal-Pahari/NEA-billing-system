-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 01:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BID` int(11) NOT NULL,
  `BDate` varchar(20) DEFAULT NULL,
  `BYear` varchar(20) DEFAULT NULL,
  `BMonth` varchar(20) DEFAULT NULL,
  `CUSID` int(11) NOT NULL,
  `Current_Reading` double DEFAULT NULL,
  `Prev_Reading` double DEFAULT NULL,
  `Bamount` double DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(20) NOT NULL,
  `currStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `SCND` int(11) NOT NULL,
  `CUSID` int(11) NOT NULL,
  `Fullname` varchar(1000) DEFAULT NULL,
  `AddressName` varchar(1000) DEFAULT NULL,
  `MobileNo` varchar(1000) DEFAULT NULL,
  `BranchId` int(11) NOT NULL,
  `demand_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demandrate`
--

CREATE TABLE `demandrate` (
  `demand_rate_id` int(20) NOT NULL,
  `demand_rate` varchar(20) NOT NULL,
  `effective_rate` varchar(20) NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `demand_type_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demandtype`
--

CREATE TABLE `demandtype` (
  `demand_type_id` int(11) NOT NULL,
  `descrip` varchar(1000) NOT NULL,
  `currStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandtype`
--

INSERT INTO `demandtype` (`demand_type_id`, `descrip`, `currStatus`) VALUES
(1, '5 AMP', '1'),
(2, '10 AMP', '1'),
(3, '20 AMP', '1'),
(5, '25 AMP', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PID` int(11) NOT NULL,
  `BID` int(11) NOT NULL,
  `PDate` date NOT NULL,
  `PAmount` double NOT NULL,
  `Payment_Option_Id` int(11) NOT NULL,
  `Rebeat_Amt` double NOT NULL,
  `Fine_Amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_option`
--

CREATE TABLE `payment_option` (
  `POID` int(11) NOT NULL,
  `paymentMethod` varchar(1000) NOT NULL,
  `currStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_option`
--

INSERT INTO `payment_option` (`POID`, `paymentMethod`, `currStatus`) VALUES
(101, 'Khalti', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'admin', 'admin@nepal.gov.np', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'bishal', 'bishal@example.com', 'user', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `CUSID` (`CUSID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSID`),
  ADD UNIQUE KEY `SCND` (`SCND`),
  ADD UNIQUE KEY `unique_MobileNo` (`MobileNo`) USING HASH,
  ADD KEY `customer_ibfk_1` (`BranchId`),
  ADD KEY `customer_ibfk_2` (`demand_type_id`);

--
-- Indexes for table `demandrate`
--
ALTER TABLE `demandrate`
  ADD PRIMARY KEY (`demand_rate_id`);

--
-- Indexes for table `demandtype`
--
ALTER TABLE `demandtype`
  ADD PRIMARY KEY (`demand_type_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `BID` (`BID`);

--
-- Indexes for table `payment_option`
--
ALTER TABLE `payment_option`
  ADD PRIMARY KEY (`POID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12325;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT for table `demandrate`
--
ALTER TABLE `demandrate`
  MODIFY `demand_rate_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `demandtype`
--
ALTER TABLE `demandtype`
  MODIFY `demand_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_option`
--
ALTER TABLE `payment_option`
  MODIFY `POID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`CUSID`) REFERENCES `customer` (`CUSID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`BranchId`) REFERENCES `branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`demand_type_id`) REFERENCES `demandtype` (`demand_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demandrate`
--
ALTER TABLE `demandrate`
  ADD CONSTRAINT `demandrate_ibfk_1` FOREIGN KEY (`demand_rate_id`) REFERENCES `demandtype` (`demand_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `bill` (`BID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
