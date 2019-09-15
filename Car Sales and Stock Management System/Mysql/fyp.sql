-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 05:00 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Photo`, `Password`, `Email`, `HP`, `Age`, `Name`, `Position`) VALUES
(1, 'Yee.jpg', '$2y$10$Cv6aaiZs8aC8W9kOvzBcReQLlXvQb.AXx7rRHQrmmaeFoPR2UdhMi', 'yee97917@gmail.com', '012-5269917', 20, 'Yee', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ID` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Image3` varchar(500) NOT NULL,
  `Image4` varchar(500) NOT NULL,
  `Image5` varchar(500) NOT NULL,
  `Make` varchar(50) NOT NULL,
  `Model` varchar(500) NOT NULL,
  `Transmission` varchar(500) NOT NULL,
  `Type` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Year` int(11) NOT NULL,
  `NoSeat` int(11) NOT NULL,
  `EngineCC` int(11) NOT NULL,
  `PlateNumber` varchar(500) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `Margin` int(11) NOT NULL,
  `BoughtIn` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ID`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Make`, `Model`, `Transmission`, `Type`, `Mileage`, `Year`, `NoSeat`, `EngineCC`, `PlateNumber`, `Color`, `Price`, `Margin`, `BoughtIn`, `Status`, `Date`, `Description`) VALUES
(15, 'Honda Accord 2005 (3).jpg', 'Honda Accord 2005.jpg', 'Honda Accord 2005 (2).jpg', 'Honda Accord 2005 (4).jpg', 'Honda Accord 2005 (6).jpg', 'Honda', 'Accord', 'Automatic', 'Sedan', '170000 - 179999', 2005, 5, 2000, 'PKK 97', 'Black', 26800, 800, 22000, 'Available', 2018, 'Perfect Condition'),
(18, '19359179_1828386037177325_1650984402_o.jpg', '19402740_1828386020510660_748804551_o.jpg', '19359148_1828386063843989_1022749041_o.jpg', '19359041_1828386043843991_888529567_o.jpg', '19358856_1828386047177324_412397050_o.jpg', 'Toyota', 'Altis', 'Automatic', 'Sedan', '110000 - 119999', 2010, 5, 1800, 'PMN 7363', 'White', 46500, 500, 43000, 'Available', 2018, 'Perfect Condition'),
(19, 'Inked19369187_1545813408797272_1067317412_o_LI.jpg', 'Inked19369169_1545813438797269_1643114037_o_LI.jpg', '19402520_1545813412130605_245609086_o.jpg', '19263845_1545813345463945_1723869416_o.jpg', '19369220_1545813368797276_1767256543_o.jpg', 'Honda', 'Odyssey', 'Automatic', 'MPV', '150000 - 159999', 1997, 8, 2000, 'PED 89', 'Grey', 15500, 600, 8000, 'Available', 2018, 'Perfect Condition'),
(21, 'Persona 2009 (3).jpg', 'Persona 2009 (2).jpg', 'Persona 2009 (4).jpg', 'Persona 2009 (5).jpg', 'Persona 2009 (1).jpg', 'Proton', 'Persona', 'Manual', 'Sedan', '90000 - 99999', 2008, 5, 1600, 'PJJ 1234', 'Silver', 12500, 700, 8000, 'Available', 2018, 'Perfect Condition');

-- --------------------------------------------------------

--
-- Table structure for table `companyprofile`
--

CREATE TABLE `companyprofile` (
  `ID` int(11) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `Whatsapp` varchar(20) NOT NULL,
  `Office` varchar(20) NOT NULL,
  `Instagram` varchar(200) NOT NULL,
  `Facebook` varchar(200) NOT NULL,
  `Twitter` varchar(200) NOT NULL,
  `Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`ID`, `Address`, `Email`, `HP`, `Whatsapp`, `Office`, `Instagram`, `Facebook`, `Twitter`, `Details`) VALUES
(1, '32, Lorong Seri Tambun 2, \r\nTaman Seri Tambun.', 'yee97917@gmail.com', '012-5269917', '012-5269918', '04-5868888', 'https://www.instagram.com/', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'MY ENTERPRISE is an used car company that was established on 31/12/2017. We provide the best consultation and customer services to every of our customer to make sure every customer would have a good buying experience with us. We test and maintenance every used car that we bought in to make sure the condition is good enough to be sell on the market. Besides, we have more than 60 types of used car for our customer to choose.');

-- --------------------------------------------------------

--
-- Table structure for table `customeraccount`
--

CREATE TABLE `customeraccount` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `HP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customeraccount`
--

INSERT INTO `customeraccount` (`ID`, `Email`, `Password`, `Photo`, `Name`, `Age`, `HP`) VALUES
(1, 'yee97917@gmail.com', '$2y$10$prNGvKhh8y2cVANf50UubORX.6ZHwy0R3dGO.LmjBCSy1MF0YmBIC', '19359179_1828386037177325_1650984402_o.jpg', 'Yee', 20, '010-5646632'),
(2, 'jason@gmail.com', '$2y$10$L.OOBfHywVsAmz7Y3iAisOkjGgn4RGiUJvGY4.LVI.2xcDT1wzrDi', '', 'Jason', 0, ''),
(11, 'vincent93_@hotmail.com', '$2y$10$gOqLY7dLRsW0zdw/yMQ8VO74Mpw82Ip8/HlPdGhUde8OUVzW4KjOK', '', 'Vincent', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `HP` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Age` int(11) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `WorkingHour` varchar(50) NOT NULL,
  `WorkingDays` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Photo`, `Name`, `HP`, `Email`, `Password`, `Age`, `Position`, `WorkingHour`, `WorkingDays`) VALUES
(2, '19359179_1828386037177325_1650984402_o.jpg', 'Yee', '012-5269917', 'yee97917@gmail.com', '$2y$10$dkEHMGmGlyj0UxmEHxzxweBkh2FmsINlxmPETT1q5ox3n9.kYzL/y', 21, 'Manager', '11am - 5pm', 'Monday - Sunday, Except Monday'),
(3, 'Jason.jpg', 'Jason', '012-3312342', 'vincent93_@hotmail.com', '$2y$10$bOFgG4Oz.X.7oKyBCZhDfuz5IqCELuXKO4cxCTYeNd9WZ.8PbFe8G', 21, 'Salesman', '11am - 6pm', 'Monday - Sunday, Except Wednesday'),
(6, '', 'Kobee', '012-1234567', 'Kobee@gmail.com', '$2y$10$leHGdXS/1kT8V1mM1Pa5IOzppQxTSTcDbJYvrIIxFi8RTDQZ1dcXG', 21, 'Salesman', '11am - 6pm', 'Monday - Sunday, Except Monday');

-- --------------------------------------------------------

--
-- Table structure for table `punchcard`
--

CREATE TABLE `punchcard` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Day` varchar(30) NOT NULL,
  `CheckIn` varchar(30) NOT NULL,
  `CheckOut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punchcard`
--

INSERT INTO `punchcard` (`ID`, `Name`, `Date`, `Day`, `CheckIn`, `CheckOut`) VALUES
(2, 'Yee', '15/03/2018', '', '15:20', '15:52'),
(3, 'Yee', '15/03/2018', '', '15:52', '16:18'),
(4, 'Jason', '15/03/2018', '', '16:18', '16:18'),
(5, 'Yee', '16/03/2018', '', '12:54', '12:54'),
(6, 'Yee', '23/03/2018', '', '15:01', '15:01'),
(7, 'Yee', '23/03/2018', '', '15:01', ''),
(8, 'Yee', '23/03/2018', '', '15:02', '15:03'),
(9, 'Yee', '09/04/2018', 'Monday', '16:45', '16:45'),
(10, 'Yee', '19/04/2018', 'Thursday', '8:02', '8:03'),
(11, 'Yee', '19/04/2018', 'Thursday', '21:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `Quantity`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 0),
(5, 1),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tradelist`
--

CREATE TABLE `tradelist` (
  `ID` int(11) NOT NULL,
  `Image1` varchar(200) NOT NULL,
  `Image2` varchar(200) NOT NULL,
  `Image3` varchar(200) NOT NULL,
  `Image4` varchar(200) NOT NULL,
  `Image5` varchar(200) NOT NULL,
  `Make` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Transmission` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Mileage` varchar(50) NOT NULL,
  `Year` int(11) NOT NULL,
  `NoSeat` int(11) NOT NULL,
  `EngineCC` int(11) NOT NULL,
  `PlateNumber` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `Margin` int(11) NOT NULL,
  `BoughtIn` int(11) NOT NULL,
  `LastPrice` int(11) NOT NULL,
  `Commission` int(11) NOT NULL,
  `SoldBy` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Date` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tradelist`
--

INSERT INTO `tradelist` (`ID`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Make`, `Model`, `Transmission`, `Type`, `Mileage`, `Year`, `NoSeat`, `EngineCC`, `PlateNumber`, `Color`, `Price`, `Margin`, `BoughtIn`, `LastPrice`, `Commission`, `SoldBy`, `Status`, `Date`, `Description`) VALUES
(7, 'Honda Accord 2005 (3).jpg', 'Honda Accord 2005 (2).jpg', '23113076_2019292014753392_69536492_o.jpg', 'Honda Accord 2005.jpg', 'Honda Accord 2005 (6).jpg', 'Hyundai', 'Elantra', 'Automatic', 'Sedan', '120000 - 129999', 2005, 5, 2000, '5995', 'Black', 25000, 500, 0, 24500, 350, 'Steven', 'Sold', 2018, 'trtrete'),
(9, '19359179_1828386037177325_1650984402_o.jpg', '19359041_1828386043843991_888529567_o.jpg', '19359148_1828386063843989_1022749041_o.jpg', '19358856_1828386047177324_412397050_o.jpg', '19263845_1545813345463945_1723869416_o.jpg', 'Mitsubishi', 'Lancer', 'Automatic', 'Sedan', '140000 - 149999', 2015, 5, 1200, 'PNA 97', 'White', 32600, 500, 26500, 32300, 700, 'Yee', 'Sold', 2018, 'dasdadsas'),
(10, 'Civic Front.jpg', 'Civic Back.jpg', 'Civic2.jpg', 'Civic4.jpg', 'Civic3.jpg', 'Honda', 'Civic', 'Automatic', 'Sedan', '100000 - 109999', 2010, 5, 1800, 'PJJ 6996', 'White', 54500, 550, 50000, 54300, 500, 'Yee', 'Sold', 2018, 'Perfect Condition'),
(11, '19359179_1828386037177325_1650984402_o.jpg', '19402740_1828386020510660_748804551_o.jpg', '19359148_1828386063843989_1022749041_o.jpg', '19359041_1828386043843991_888529567_o.jpg', '19358856_1828386047177324_412397050_o.jpg', 'Toyota', 'Altis', 'Automatic', 'Sedan', '110000 - 119999', 2010, 5, 1800, 'PMN 7363', 'White', 46700, 600, 42000, 46700, 700, 'Yee', 'Sold', 2018, 'Perfect Condition');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecard`
--

CREATE TABLE `vehiclecard` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `IC` varchar(30) NOT NULL,
  `HP` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `RegCardNo` varchar(100) NOT NULL,
  `Plate` varchar(50) NOT NULL,
  `NoEnjin` varchar(100) NOT NULL,
  `NoChasis` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `EngineCC` int(11) NOT NULL,
  `Colour` varchar(20) NOT NULL,
  `Year` int(11) NOT NULL,
  `BodyType` varchar(50) NOT NULL,
  `Seats` int(11) NOT NULL,
  `CoverageDate` varchar(20) NOT NULL,
  `ExpiredDate` varchar(20) NOT NULL,
  `HirePCompany` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclecard`
--

INSERT INTO `vehiclecard` (`ID`, `Name`, `IC`, `HP`, `Address`, `RegCardNo`, `Plate`, `NoEnjin`, `NoChasis`, `Model`, `EngineCC`, `Colour`, `Year`, `BodyType`, `Seats`, `CoverageDate`, `ExpiredDate`, `HirePCompany`) VALUES
(5, 'Tan Ah Poh', '701122-07-5532', '016-4147553', '32, Lorong Seri Tambun 2, Taman Seri Tambun, 14100 Simpang Ampat, Pulau Pinang', 'B1234567', 'PNH 33', '321231313', '123313321', 'Hyundai Tucson (A)', 2000, 'Silver', 2018, 'Sport Utility Vehicle', 4, '10/03/2018', '09/03/2018', 'Public Bank'),
(8, 'Eng Wooi Hoang', '970917-07-5299', '012-5269917', 'Taman Seri Tambun', 'A1234567', 'PNG 9917', 'VN12345678', 'AH3456789', 'Kia Forte (A)', 1600, 'White', 2015, 'Sedan', 5, '19/04/2018', '18/04/2018', 'Not Applicable');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Image3` varchar(500) NOT NULL,
  `Image4` varchar(500) NOT NULL,
  `Image5` varchar(500) NOT NULL,
  `Make` varchar(30) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Transmission` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Mileage` varchar(100) NOT NULL,
  `Year` int(11) NOT NULL,
  `NoSeat` int(11) NOT NULL,
  `EngineCC` int(11) NOT NULL,
  `PlateNumber` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`ID`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Make`, `Model`, `Transmission`, `Type`, `Mileage`, `Year`, `NoSeat`, `EngineCC`, `PlateNumber`, `Color`, `Price`, `Status`, `Description`, `Name`) VALUES
(11, '19359179_1828386037177325_1650984402_o.jpg', '19359041_1828386043843991_888529567_o.jpg', '19359148_1828386063843989_1022749041_o.jpg', '19358856_1828386047177324_412397050_o.jpg', '19263845_1545813345463945_1723869416_o.jpg', 'Mitsubishi', 'Lancer', 'Automatic', 'Sedan', '140000 - 149999', 2015, 5, 1200, 'PNA 97', 'White', 32600, 'Available', 'dasdadsas', 'Kirito'),
(15, 'Honda Accord 2005 (3).jpg', 'Honda Accord 2005.jpg', 'Honda Accord 2005 (2).jpg', 'Honda Accord 2005 (4).jpg', 'Honda Accord 2005 (6).jpg', 'Honda', 'Accord', 'Automatic', 'Sedan', '170000 - 179999', 2005, 5, 2000, 'PKK 97', 'Black', 26800, 'Available', 'Perfect Condition', 'Yee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customeraccount`
--
ALTER TABLE `customeraccount`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `punchcard`
--
ALTER TABLE `punchcard`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tradelist`
--
ALTER TABLE `tradelist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehiclecard`
--
ALTER TABLE `vehiclecard`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `companyprofile`
--
ALTER TABLE `companyprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customeraccount`
--
ALTER TABLE `customeraccount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `punchcard`
--
ALTER TABLE `punchcard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tradelist`
--
ALTER TABLE `tradelist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vehiclecard`
--
ALTER TABLE `vehiclecard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
