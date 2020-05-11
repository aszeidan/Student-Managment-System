-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2020 at 11:36 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

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
  `ALastName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `APhone` int(11) NOT NULL,
  `AEmail` varchar(255) NOT NULL,
  `APassword` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AFirstName`, `AMiddleName`, `ALastName`, `APhone`, `AEmail`, `APassword`) VALUES
(3, 'Amira', '', 'Zaidan', 0, 'aszeidan@hotmail.com', '123');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) VALUES
(48, 'Java', 2, 1, 4, 1),
(49, 'PHP', 1, 3, 4, 1),
(52, 'PHP', 1, 3, 4, 4);

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
  `Coursefile` varchar(255) NOT NULL,
  `targetFileDirectory` varchar(255) NOT NULL,
  PRIMARY KEY (`CourseId`),
  KEY `CourseId` (`CourseId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseCode`, `CourseName`, `CreditsNum`, `CourseDescription`, `Coursefile`, `targetFileDirectory`) VALUES
(1, 'CSC201', 'Computer and Their uses', 3, 'mjrkiumjy', '9783642411144-c2.pdf', ''),
(2, 'CSC301', 'Database', 3, 'spring 2020', '9783642411144-c2.pdf', ''),
(3, 'CSC207', 'Networking', 3, 'fall 2020', '', ''),
(4, 'csc304', 'Software Engineering', 3, 'fall 2020', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `GradeId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  PRIMARY KEY (`GradeId`),
  KEY `StudentID` (`StudentID`),
  KEY `ClassId` (`ClassId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

DROP TABLE IF EXISTS `majors`;
CREATE TABLE IF NOT EXISTS `majors` (
  `MajorId` int(11) NOT NULL AUTO_INCREMENT,
  `MajorTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`MajorId`),
  KEY `MajorId` (`MajorId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`MajorId`, `MajorTitle`) VALUES
(2, 'Computing'),
(3, 'Business'),
(4, 'Bs'),
(5, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `RegistrationId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `MidtermGrade` int(11) NOT NULL,
  `AssignemetGrade` int(11) NOT NULL,
  `FinalGrade` int(11) NOT NULL,
  PRIMARY KEY (`RegistrationId`),
  KEY `ClassId` (`ClassId`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemesterId`, `SName`) VALUES
(1, 'Fall2020'),
(2, 'Spring2020'),
(4, 'Summer2020'),
(5, 'Fall2022');

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
  `MajorId` int(11) NOT NULL,
  `SAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `StudentID` (`StudentID`),
  KEY `MajorId` (`MajorId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `SFirstName`, `SMiddleName`, `SLastName`, `SEmail`, `SPhone`, `SPassword`, `MajorId`, `SAddress`) VALUES
(3, 'llllll', 'lllll', 'llllll', 'kkkk@hotmail.com', 111111, '$2y$10$ymQuTMgPVQG3yutB.56ul.lDMRB.VFxoWGIT8OcB2mr8WkifONra2', 3, 'lllll');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherId`, `TFirstName`, `TMiddleName`, `TLastName`, `TEmail`, `TMobileNum`, `TPassword`) VALUES
(4, 'Saher', 'Monir', 'Jaafar', 'smj@hotmail.com', 3135757, '123456');

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
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `GradeClassId` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `StudnetID` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `ClassId` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`),
  ADD CONSTRAINT `StudentId` FOREIGN KEY (`StudentId`) REFERENCES `student` (`StudentID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `MajorId` FOREIGN KEY (`MajorId`) REFERENCES `majors` (`MajorId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
