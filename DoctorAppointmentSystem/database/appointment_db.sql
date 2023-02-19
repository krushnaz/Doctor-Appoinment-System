-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2023 at 05:31 PM
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
-- Database: `appointment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appId` int(3) NOT NULL,
  `patientIc` bigint(12) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `appSymptom` varchar(100) NOT NULL,
  `appComment` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appId`, `patientIc`, `scheduleId`, `appSymptom`, `appComment`, `status`) VALUES
(88, 1, 51, 'fever', 'no', 'done'),
(89, 12, 54, 'no', 'np', 'done'),
(90, 1, 55, 'fevr and getting cold', 'no', 'done'),
(91, 1, 56, 'fevr and getting cold', 'no', 'process'),
(92, 11, 57, 'fevr and getting cold', 'no', 'process'),
(93, 12, 58, 'fevr and getting cold', 'no', 'process'),
(94, 1, 59, 'fevr and getting cold', 'no', 'done'),
(95, 1, 60, 'dental ', 'no', 'done'),
(96, 1, 61, 'dfgn', 'sdfgh', 'process'),
(97, 1, 62, 'ertyui', 'ertui', 'process'),
(98, 1, 63, 'wertyu', 'ertyui', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`name`, `email`, `phone`, `message`) VALUES
('krushna zarekar', 'krishnazarekar@gmail.com', 1234567890, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `icDoctor` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `doctorId` int(3) NOT NULL,
  `doctorFirstName` varchar(50) NOT NULL,
  `doctorLastName` varchar(50) NOT NULL,
  `doctorAddress` varchar(100) NOT NULL,
  `doctorPhone` varchar(15) NOT NULL,
  `doctorEmail` varchar(20) NOT NULL,
  `doctorDOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`icDoctor`, `password`, `doctorId`, `doctorFirstName`, `doctorLastName`, `doctorAddress`, `doctorPhone`, `doctorEmail`, `doctorDOB`) VALUES
(123456789, '123', 123, 'krushna', 'zarekar', 'ahmdnagar', '1234567890', 'krishnazarekar72@gma', '2000-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `scheduleId` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`scheduleId`, `scheduleDate`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(45, '2022-12-20', 'Monday', '10:00:00', '11:00:00', 'notavail'),
(51, '2022-12-21', 'Saturday', '10:20:00', '11:20:00', 'notavail'),
(54, '2022-12-22', 'Monday', '10:11:00', '11:11:00', 'notavail'),
(55, '2022-12-23', 'Monday', '11:00:00', '12:00:00', 'notavail'),
(56, '2022-12-24', 'Monday', '10:00:00', '11:00:00', 'notavail'),
(57, '2022-12-25', 'Monday', '10:00:00', '11:00:00', 'notavail'),
(58, '2022-12-29', 'Monday', '11:00:00', '12:00:00', 'notavail'),
(59, '2022-12-30', 'Monday', '11:00:00', '12:00:00', 'notavail'),
(60, '2023-01-17', 'Tuesday', '10:00:00', '05:00:00', 'notavail'),
(61, '2023-01-28', 'Saturday', '11:00:00', '11:30:00', 'notavail'),
(62, '2023-01-29', 'Monday', '12:00:00', '01:00:00', 'notavail'),
(63, '2023-01-30', 'Monday', '11:00:00', '12:31:00', 'notavail');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `phone`, `message`) VALUES
('krushna zarekar', 'krishnazarekar@gmail.com', 1234567890, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `icPatient` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `patientFirstName` varchar(20) NOT NULL,
  `patientLastName` varchar(20) NOT NULL,
  `patientMaritialStatus` varchar(10) DEFAULT NULL,
  `patientDOB` date NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientAddress` varchar(100) DEFAULT NULL,
  `patientPhone` varchar(15) DEFAULT NULL,
  `patientEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`icPatient`, `password`, `patientFirstName`, `patientLastName`, `patientMaritialStatus`, `patientDOB`, `patientGender`, `patientAddress`, `patientPhone`, `patientEmail`) VALUES
(1, '12345', 'krushna', 'zarekar', 'single', '2002-09-12', 'male', 'zapwadi', '1234567890', 'krishnazarekar72@gmail.com'),
(11, '12345', 'bhagwat', 'khandare', 'single', '1997-02-17', 'male', 'nagar', '1234567890', 'bhagawat@gmail.com'),
(12, '12345', 'kishor', 'tangal', 'single', '1997-12-17', 'male', 'nagar', '1234567890', 'tangal@gmail.com'),
(13, '123456', 'vaishnav', 'wakchaure', NULL, '1994-11-15', 'male', NULL, NULL, 'vaishnav@gmail.com'),
(15, '12345', 'vaishnavi', 'zarekar', NULL, '1997-06-12', 'male', NULL, NULL, 'vaishnavi@gmail.com'),
(920517105553, '123', 'kishor', 'tangal', 'single', '1992-05-13', 'male', 'nagar', '173567758', 'kishor@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appId`),
  ADD UNIQUE KEY `scheduleId_2` (`scheduleId`),
  ADD KEY `patientIc` (`patientIc`),
  ADD KEY `scheduleId` (`scheduleId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`icDoctor`);

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`scheduleId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`icPatient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`patientIc`) REFERENCES `patient` (`icPatient`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`scheduleId`) REFERENCES `doctorschedule` (`scheduleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
