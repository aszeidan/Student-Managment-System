-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2020 at 10:29 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `AFirstName` varchar(255) NOT NULL,
  `AMiddleName` varchar(255) NOT NULL,
  `ALatName` varchar(255) NOT NULL,
  `APhone` int(11) NOT NULL,
  `AEmail` varchar(255) NOT NULL,
  `APassword` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AFirstName`, `AMiddleName`, `ALatName`, `APhone`, `AEmail`, `APassword`) VALUES
(3, '', '', '', 0, 'aszeidan@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `ClassId` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(255) NOT NULL,
  `SemesterId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `ScheduleId` int(11) NOT NULL,
  PRIMARY KEY (`ClassId`),
  KEY `ScheduleId` (`ScheduleId`),
  KEY `CourseId` (`CourseId`),
  KEY `TeacherId` (`TeacherId`),
  KEY `SemesterId` (`SemesterId`),
  KEY `ClassId` (`ClassId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) VALUES
(2, 'csc101', 1, 3, 3, 3),
(5, 'Ca103', 1, 2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CourseId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(255) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CreditsNum` int(11) NOT NULL,
  `CourseDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`CourseId`),
  KEY `CourseId` (`CourseId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseCode`, `CourseName`, `CreditsNum`, `CourseDescription`) VALUES
(1, 'CSC201', 'Computer and Their uses', 3, 'mjrkiumjy'),
(2, 'CSC301', 'Database', 3, 'spring 2020'),
(3, 'CSC207', 'Networking', 3, 'fall 2020'),
(4, 'csc304', 'Software Engineering', 3, 'fall 2020');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `RegistrationId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  PRIMARY KEY (`RegistrationId`),
  KEY `ClassId` (`ClassId`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegistrationId`, `StudentId`, `ClassId`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `ScheduleId` int(11) NOT NULL AUTO_INCREMENT,
  `Time` varchar(255) NOT NULL,
  PRIMARY KEY (`ScheduleId`),
  KEY `ScheduleId` (`ScheduleId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleId`, `Time`) VALUES
(1, 'MW 9:00-10:00'),
(2, 'MW 10:00-11:00'),
(3, 'TTH 9:30-11:30'),
(4, 'TTH 1:30-3:00');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `SemesterId` int(11) NOT NULL AUTO_INCREMENT,
  `SName` varchar(255) NOT NULL,
  PRIMARY KEY (`SemesterId`),
  KEY `SemesterId` (`SemesterId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemesterId`, `SName`) VALUES
(1, 'Fall2020'),
(2, 'Spring2020');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `SFirstName` varchar(255) NOT NULL,
  `SMiddleName` varchar(255) NOT NULL,
  `SLastName` varchar(255) NOT NULL,
  `SEmail` varchar(255) NOT NULL,
  `SPhone` int(11) NOT NULL,
  `SPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `SFirstName`, `SMiddleName`, `SLastName`, `SEmail`, `SPhone`, `SPassword`) VALUES
(1, 'Daniel', 'Marwan', 'Awde', 'dmawde@hotmail.com', 7065502, ''),
(2, 'Ghewa', 'Salim', 'Zeidan', 'gszeidan@hotmail.com', 71655502, '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `TeacherId` int(11) NOT NULL AUTO_INCREMENT,
  `TFirstName` varchar(255) NOT NULL,
  `TMiddleName` varchar(255) NOT NULL,
  `TLastName` varchar(255) NOT NULL,
  `TEmail` varchar(255) NOT NULL,
  `TMobileNum` int(11) NOT NULL,
  `TPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`TeacherId`),
  KEY `TeacherId` (`TeacherId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherId`, `TFirstName`, `TMiddleName`, `TLastName`, `TEmail`, `TMobileNum`, `TPassword`) VALUES
(1, 'Amira', 'Salim', 'Zeidan', 'aszeidan@hotmail.com', 71135757, ''),
(2, 'Nadine', 'Mofid', 'Kassamani', 'kassamani@hotmail.com', 70135757, '781'),
(3, 'Ihab', 'Kamal', 'Breich', 'ikbreich@hotmail.com', 79135757, '1234'),
(4, 'Saher', 'Monir', 'Jaafar', 'smj1@hotmail.com', 3135757, '124'),
(5, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, '$2y$10$4xnSH38xAN1hlWa52jQgKur.C5EbXgRUzaBy1LnDxCGcQOBQ7NCTu'),
(6, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, '$2y$10$lzPQCCmRxRTn5UY6DIEPeeiArBWDFuygae5TFz75X.pfwb6VP7rqa'),
(7, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, ')aD3!KLJ'),
(8, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, '$2y$10$5rlqvFcFphi0OIbMy9I.f.O2Jndr3O5fN4v.j32P6ST1XWO7Mudii'),
(9, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, '$2y$10$Dz6QgxIrxf0ldbJ0l7XiIu9A0bMGUBg26Z/xKZqBVORzk34x1Dnly'),
(10, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, '$2y$10$QcVKAIAHTq4fuK7FBwvOM.2dYhNXKEsswtxW0Sg2oIy/OBV9NF1vu'),
(11, 'AMIRA', 'SALIM', 'ZEIDAN', 'ghida@hotmail.com', 71135757, '$2y$10$L9n6jBE55vUDkWr.aklOhOPXtc4zyMZ/5dlZMXZ4gfQ9O6wRsRi9O');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `CourseId` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`),
  ADD CONSTRAINT `ScheduleId` FOREIGN KEY (`ScheduleId`) REFERENCES `schedule` (`ScheduleId`),
  ADD CONSTRAINT `SemesterId` FOREIGN KEY (`SemesterId`) REFERENCES `semester` (`SemesterId`),
  ADD CONSTRAINT `TeacherId` FOREIGN KEY (`TeacherId`) REFERENCES `teacher` (`TeacherId`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `ClassId` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`),
  ADD CONSTRAINT `StudentId` FOREIGN KEY (`StudentId`) REFERENCES `student` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
