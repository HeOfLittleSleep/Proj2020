-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 05:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sos`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `OrderNum` char(8) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `Address` char(30) NOT NULL,
  `CustName` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `ProductNum` char(8) NOT NULL,
  `OrderNum` char(8) NOT NULL,
  `AmtOrdered` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productinfo`
--

CREATE TABLE `productinfo` (
  `ProductName` char(25) NOT NULL,
  `ProductNum` char(8) NOT NULL,
  `QuantityAvail` int(6) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `ProductType` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productinfo`
--

INSERT INTO `productinfo` (`ProductName`, `ProductNum`, `QuantityAvail`, `Price`, `ProductType`) VALUES
('Dell R610', 'SE000610', 253, '79.99', 'server'),
('Dell R620', 'SE000620', 561, '139.99', 'server'),
('Dell R630', 'SE000630', 456, '229.99', 'server'),
('Dell R710', 'SE000710', 316, '119.99', 'server'),
('Dell R720', 'SE000720', 651, '299.99', 'server'),
('Dell R730', 'SE000730', 463, '939.99', 'server'),
('HP Proliant DL360p G8', 'SE00360P', 345, '139.99', 'server'),
('HP Proliant SE326M1 DL180', 'SE0326M1', 386, '114.99', 'server');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`OrderNum`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`ProductNum`,`OrderNum`);

--
-- Indexes for table `productinfo`
--
ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`ProductNum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
