-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 04:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `count` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `doctor_ID` int(11) NOT NULL,
  `schedDate` date NOT NULL,
  `schedTime` time NOT NULL,
  `ptnStatus` int(11) NOT NULL,
  `docStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`count`, `patient_ID`, `doctor_ID`, `schedDate`, `schedTime`, `ptnStatus`, `docStatus`) VALUES
(1, 1, 1, '2020-08-12', '09:30:00', 0, 1),
(4, 1, 1, '2020-08-12', '13:18:00', 1, 0),
(5, 1, 1, '2020-08-17', '09:00:00', 1, 1),
(6, 2, 2, '2020-08-11', '09:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_ID` int(11) NOT NULL,
  `dFullName` varchar(255) NOT NULL,
  `dUsername` varchar(255) NOT NULL,
  `dPassword` varchar(255) NOT NULL,
  `dEmail` varchar(255) NOT NULL,
  `dNumber` varchar(50) NOT NULL,
  `dAge` int(20) NOT NULL,
  `dBirthday` date NOT NULL,
  `dAddress` varchar(255) NOT NULL,
  `dGender` varchar(255) NOT NULL,
  `dProfilepic` varchar(255) NOT NULL,
  `dSpecialization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_ID`, `dFullName`, `dUsername`, `dPassword`, `dEmail`, `dNumber`, `dAge`, `dBirthday`, `dAddress`, `dGender`, `dProfilepic`, `dSpecialization`) VALUES
(1, 'Maxine Kang', 'doc_maxine', 'Docpass', 'maxine.kang@gmail.com', '09457724899', 20, '2020-05-14', 'Bulakan, Bulacan', 'Female', 'd1.png', 'Infectious Disease Specialists'),
(2, 'Rob Taylor', 'doc_rob', 'Docpass', 'rob.taylor@gmail.com', '09995213369', 25, '1995-02-14', 'Matungao, Bulakan Bulacan', 'Male', 'd2.png', 'General Physicians');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurse_ID` int(11) NOT NULL,
  `nFullName` varchar(255) NOT NULL,
  `nUsername` varchar(255) NOT NULL,
  `nPassword` varchar(255) NOT NULL,
  `nEmail` varchar(255) NOT NULL,
  `nNumber` varchar(50) NOT NULL,
  `nAge` int(20) NOT NULL,
  `nBirthday` date NOT NULL,
  `nAddress` varchar(255) NOT NULL,
  `nGender` varchar(255) NOT NULL,
  `nProfilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurse_ID`, `nFullName`, `nUsername`, `nPassword`, `nEmail`, `nNumber`, `nAge`, `nBirthday`, `nAddress`, `nGender`, `nProfilepic`) VALUES
(1, 'Thea Ford', 'nurse_thea', 'Nrspass', 'thea.ford@gmail.com', '09223566449', 22, '0001-02-03', 'Malolos Bulacan', 'Female', 'n1.png');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_ID` int(11) NOT NULL,
  `doctor_ID` int(20) NOT NULL,
  `pFullName` varchar(255) NOT NULL,
  `pUsername` varchar(255) NOT NULL,
  `pPassword` varchar(255) NOT NULL,
  `pEmail` varchar(255) NOT NULL,
  `pNumber` varchar(50) NOT NULL,
  `pAge` int(20) NOT NULL,
  `pBirthday` date NOT NULL,
  `pAddress` varchar(255) NOT NULL,
  `pGender` varchar(255) NOT NULL,
  `pProfilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_ID`, `doctor_ID`, `pFullName`, `pUsername`, `pPassword`, `pEmail`, `pNumber`, `pAge`, `pBirthday`, `pAddress`, `pGender`, `pProfilepic`) VALUES
(1, 1, 'Lucas Yoon', 'im_lucas', 'Ptnpass', 'lucas.yoon@gmail.com', '09662435772', 23, '1998-12-01', 'Matimbo Malolos, Bulacan', 'Male', 'p1.png'),
(2, 0, 'Maria Go', 'im_maria', 'Ptnpass', 'maria.go@gmail.com', '093697793391', 24, '1996-05-14', 'Pitpitan, Bulakan Bulacan', 'Female', 'p2.png');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `count` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `doctor_ID` int(11) NOT NULL,
  `prMeds` varchar(255) NOT NULL,
  `prDosage` varchar(255) NOT NULL,
  `prStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`count`, `patient_ID`, `doctor_ID`, `prMeds`, `prDosage`, `prStatus`) VALUES
(1, 1, 1, 'Antibiotics, cough medicine', 'once a day each', 1),
(2, 2, 2, 'Antibiotics, Pain relievers, cough medicine', 'once a day each', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `count` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `doctor_ID` int(11) NOT NULL,
  `nurse_ID` int(11) NOT NULL,
  `rpDisease` varchar(255) NOT NULL,
  `rpHeight` int(11) NOT NULL,
  `rpWeight` int(11) NOT NULL,
  `rpTemp` int(11) NOT NULL,
  `rpBloodPressure` varchar(50) NOT NULL,
  `rpSugarLevel` int(11) NOT NULL,
  `rpSymptoms` varchar(255) NOT NULL,
  `rpStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`count`, `patient_ID`, `doctor_ID`, `nurse_ID`, `rpDisease`, `rpHeight`, `rpWeight`, `rpTemp`, `rpBloodPressure`, `rpSugarLevel`, `rpSymptoms`, `rpStatus`) VALUES
(1, 1, 1, 1, 'Flu', 170, 55, 39, '180/90', 110, 'Fever, Dry cough, rashes, colds', 1),
(2, 2, 2, 1, 'Pneumonia', 155, 52, 39, '90/60', 200, 'chest pain, shortness of breath, dizziness, fatigue, cough with phlegm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_ID`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
