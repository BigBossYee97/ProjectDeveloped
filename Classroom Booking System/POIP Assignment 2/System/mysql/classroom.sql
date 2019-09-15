-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 04:09 PM
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
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `addclass`
--

CREATE TABLE `addclass` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addclass`
--

INSERT INTO `addclass` (`ID`, `Name`, `Venue`, `Capacity`, `Status`, `Description`) VALUES
(1, 'Bill Gates', '4th floor ', 50, 'Available', 'For Lecturer and Practice Only.'),
(3, 'Larry Ellison', '4th floor ', 40, 'Available', 'For Lecturer Purpose Only.'),
(7, 'Steve Job', 'SEGI SPACE ', 55, 'Available', 'For Lecturer or Lab Practice Only'),
(11, 'Lecturer Hall', 'SEGI SPACE  ', 100, 'Available', 'For Presentation or Speech Only'),
(12, 'Auditorium', 'SEGI ACE', 300, 'Available', 'For Event, Lecturer, Presentation or Speech'),
(13, 'W504', 'WISMA PINANG II', 30, 'Available', 'For Lecturer Only'),
(14, 'W505', 'WISMA PINANG II', 35, 'Available', 'For Lecturer Only'),
(15, 'W503', 'WISMA PINANG II', 50, 'Available', 'For Lecturer or Presentation Only'),
(16, 'W506', 'WISMA PINANG II', 50, 'Available', 'For Lecturer or Presentation Only'),
(17, 'W501', 'WISMA PINANG II', 30, 'Available', 'For Lecturer Only'),
(18, 'W303', 'WISMA PINANG II', 100, 'Available', 'For Lecturer Only');

-- --------------------------------------------------------

--
-- Table structure for table `adminid`
--

CREATE TABLE `adminid` (
  `Admin_ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminid`
--

INSERT INTO `adminid` (`Admin_ID`, `username`, `password`, `email`) VALUES
(1, 'Stefan', '$2y$10$gu0oLUSjELaogDLUvFCZ3eXUcK4tsSLni8Ph.kEMCXOYdE/75Fot6', 'yee97917@gmail.com'),
(2, 'BigBoss', '$2y$10$nuoFhhsifJ.XhrnydzbRL.DNEwN/uJtiuk2ocTStn5O1JSNjs0h7K', 'BigBoss@gmail.com'),
(3, 'Jason', '$2y$10$nh/WsEhxukCSz4dODjlFouUQGXJySqBzcuZboZKHjgz/8fAlJ/9oW', 'Jason@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `amend`
--

CREATE TABLE `amend` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `classroom` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `approvedrequest`
--

CREATE TABLE `approvedrequest` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `classroom` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvedrequest`
--

INSERT INTO `approvedrequest` (`ID`, `FirstName`, `LastName`, `classroom`, `date`, `time`, `description`) VALUES
(2, 'Wei Ting', 'Han', 'Larry Ellison', '05/11/2017', '2PM - 5PM', 'For Lecturer Purpose.'),
(3, 'Bryan Teo', 'Kean Hong', 'Bill Gate', '06/11/2017', '9AM - 12PM', 'For Presentation Only.'),
(9, 'Wei Ting', 'Han', 'Bill Gates', '06/11/2017', '3PM - 5PM', 'For Lecturer'),
(10, 'Wei Ting', 'Han', 'Larry Ellison', '07/11/2017', '12PM - 3PM', 'For Presentation'),
(11, 'Wei Ting', 'Han', 'Lecturer Hall', '06/11/2017', '12PM - 3PM', 'For Seminar'),
(12, 'Wei Ting', 'Han', 'Steve Job', '07/11/2017', '3PM - 5PM', 'For Lecturer'),
(13, 'Wei Ting', 'Han', 'Steve Job', '09/11/2017', '3PM - 5PM', 'For Lecturer'),
(14, 'Wei Ting', 'Han', 'Auditorium', '10/11/2017', '12PM - 3PM', 'For Presentation'),
(15, 'Wei Ting', 'Han', 'Larry Ellison', '13/11/2017', '12PM - 3PM', 'For Lecturer Only'),
(16, 'Teo', 'Kean Hong', 'Larry Ellison', '11/11/2017', '12PM - 3PM', 'For Lecturer'),
(17, 'Wei Ting', 'Han', 'Steve Job', '12/11/2017', '3PM - 5PM', 'For Lecturer Only'),
(18, 'Wooi Ming', 'Eng', 'Bill Gate', '06/11/2017', '12PM - 3PM', 'For Lecturer'),
(19, 'Wooi Ming', 'Eng', 'Larry Ellison', '07/11/2017', '12PM - 3PM', 'For Lecturer'),
(20, 'Bryan Teo', 'Kean Hong', 'Lecturer Hall', '07/11/2017', '3PM - 5PM', 'For Presentation'),
(21, 'Bryan Teo', 'Kean Hong', 'Bill Gate', '07/11/2017', '3PM - 5PM', 'For Lecturer'),
(22, 'Teo', 'Kean Hong', 'Larry Ellison', '09/11/2017', '12PM - 3PM', 'For Lecturer Only'),
(23, 'Zhao Shen', 'Liu', 'Steve Job', '14/11/2017', '2PM - 5PM', 'For Lab Practice'),
(24, 'Teo', 'Kean Hong', 'Larry Ellison', '14/11/2017', '12PM - 3PM', 'For Lecturer'),
(25, 'Teo', 'Kean Hong', 'Bill Gates', '14/11/2017', '2PM - 5PM', 'For Lecturer'),
(26, 'Wei Ting', 'Han', '', '14/11/2017', '3PM - 5PM', 'For Lecturer'),
(27, 'Wei Ting', 'Han', 'W501', '15/11/2017', '12PM - 3PM', 'For Lecturer Only'),
(28, 'Wei Ting', 'Han', 'W505', '15/11/2017', '8PM - 11PM', 'For Lecturer Only'),
(29, 'Zhao Shen', 'Liu', 'Bill Gates', '16/11/2017', '12PM - 3PM', 'For Presentation Only'),
(30, 'Wei Ting', 'Han', 'W504', '17/11/2017', '12PM - 3PM', 'For Lecturer Only'),
(31, 'Wei Ting', 'Han', 'W503', '16/11/2017', '12PM - 3PM', 'For Practice only');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `ID` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `Office` varchar(50) NOT NULL,
  `Education` varchar(60) NOT NULL,
  `Consultation` varchar(30) NOT NULL,
  `employee` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`ID`, `Image`, `Name`, `Age`, `Email`, `Position`, `Office`, `Education`, `Consultation`, `employee`) VALUES
(3, 'img/Yee.jpg', 'Eng Wooi Hoang', 20, 'yee97917@gmail.com', 'Student', 'Home', 'Diploma in Information Technology ', 'Every Friday (3PM - 5PM)', 'Stefan'),
(4, 'kobee.jpg', 'Ryan Ang Jian Xiang', 20, 'angjianxiang@segi.edu.my ', 'Lecturer', 'SEGI Office', 'Master in Computer Science', 'Every Wednesday (2PM - 5PM)', 'BigBoss'),
(5, 'kobee.jpg', 'Han Wei Ting', 20, 'Kobee97@gmail.com', 'Student', 'Home', 'Diploma in Information Technology ', 'Every Tuesday (2PM - 5PM)', 'Kobee'),
(9, 'Jason.jpg', 'Heng Wee Jun', 20, 'wjheng97@gmail.com', 'Student', 'Home', 'Diploma in Information Technology ', 'Every Tuesday (2PM - 5PM)', 'Jason'),
(10, 'Bryan.jpg', 'Bryan Teo Kean Hong', 20, 'vincent93_@hotmail.com', 'Student', 'Home', 'Diploma in Information Technology ', 'Every Wednesday (2PM - 5PM)', 'Bryan'),
(11, 'Kirito.jpg', 'Liu Zhao Shen', 20, 'yee97917@gmail.com', 'Student', 'Home', 'Diploma in Information Technology ', 'Every Tuesday (2PM - 5PM)', 'Kirito');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedrequest`
--

CREATE TABLE `rejectedrequest` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `classroom` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedrequest`
--

INSERT INTO `rejectedrequest` (`ID`, `FirstName`, `LastName`, `classroom`, `date`, `time`, `description`) VALUES
(2, 'Wei Ting', 'Han', 'Steve Job', '05/11/2017', '12PM - 3PM', 'xsad'),
(3, 'Wei Ting', 'Han', 'Steve Job', '08/11/2017', '9PM - 12PM', 'For Lecturer'),
(4, 'Wei Ting', 'Han', 'Larry Ellison', '08/11/2017', '8PM - 12PM', 'For Lecturer'),
(5, 'Wei Ting', 'Han', 'Steve Job', '07/11/2017', '9AM - 12PM', 'For Lecturer Only'),
(6, 'Wei Ting', 'Han', 'Auditorium', '14/11/2017', '2PM - 5PM', 'For Presentation Only'),
(7, 'Zhao Shen', 'Liu', 'Lecturer Hall', '15/11/2017', '12PM - 3PM', 'For Lecturer Only'),
(8, 'Teo', 'Kean Hong', 'W503', '15/11/2017', '12PM - 3PM', 'For Lecturer Only');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `classroom` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ID`, `FirstName`, `LastName`, `classroom`, `date`, `time`, `description`, `Email`) VALUES
(22, 'Wei Ting', 'Han', 'W501', '17/11/2017', '2PM - 5PM', 'For lecture only', 'yee97917@gmail.com'),
(23, 'Zhao Shen', 'Liu', 'Larry Ellison', '2016-10-15', '12PM - 3PM', 'For Lecturer', 'yee97917@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userid`
--

CREATE TABLE `userid` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userid`
--

INSERT INTO `userid` (`ID`, `FirstName`, `LastName`, `Username`, `Password`, `Email`) VALUES
(1, 'Wei Ting', 'Han', 'Kobee', ' 5077106', 'yee97917@gmail.com'),
(5, 'Teo', 'Kean Hong', 'Bryan', '$2y$10$jP5KGDHMkpntpNuB5cxrL.SmpNQ54k1qrEAS1RH9U.9s2TuFSwzIW', 'vincent93_@hotmail.com'),
(6, 'Zhao Shen', 'Liu', 'Kirito', '$2y$10$Qsou54IF3e3Ga2yVR2azWeosYWV7t0XB24UD/3DKC8k64db2R.SH2', 'yee97917@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addclass`
--
ALTER TABLE `addclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `adminid`
--
ALTER TABLE `adminid`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `amend`
--
ALTER TABLE `amend`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `approvedrequest`
--
ALTER TABLE `approvedrequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rejectedrequest`
--
ALTER TABLE `rejectedrequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userid`
--
ALTER TABLE `userid`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FirstName` (`FirstName`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addclass`
--
ALTER TABLE `addclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `adminid`
--
ALTER TABLE `adminid`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `amend`
--
ALTER TABLE `amend`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `approvedrequest`
--
ALTER TABLE `approvedrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rejectedrequest`
--
ALTER TABLE `rejectedrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `userid`
--
ALTER TABLE `userid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
