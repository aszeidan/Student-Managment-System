-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2020 at 09:49 PM
-- Server version: 10.4.10-MariaDB
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
  `AEmail` varchar(255) NOT NULL,
  `APassword` varchar(255) NOT NULL,
  `AFirstName` varchar(255) NOT NULL,
  `AMiddleName` varchar(255) NOT NULL,
  `ALastName` varchar(255) NOT NULL,
  `APhone` int(11) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AEmail`, `APassword`, `AFirstName`, `AMiddleName`, `ALastName`, `APhone`) VALUES
(1, 'aszeidan@hotmail.com', '123', 'Amira', 'Salim', 'Zaidan', 70980880);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) VALUES
(1, 'CSC1', 1, 2, 2, 1),
(2, 'CSC1', 1, 3, 3, 3),
(3, 'CSC2', 1, 3, 2, 4);

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
  `Coursefile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CourseId`),
  KEY `CourseId` (`CourseId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseCode`, `CourseName`, `CreditsNum`, `CourseDescription`, `Coursefile`) VALUES
(2, 'CSC301', 'Database', 3, 'spring 2020', NULL),
(3, 'CSC207', 'Networking', 3, 'fall 2020', NULL),
(4, 'CSC304', 'Software Engineering', 3, 'fall 2020', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

DROP TABLE IF EXISTS `majors`;
CREATE TABLE IF NOT EXISTS `majors` (
  `MajorId` int(11) NOT NULL AUTO_INCREMENT,
  `MajorTitle` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `MajorDescription` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`MajorId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`MajorId`, `MajorTitle`, `MajorDescription`) VALUES
(5, 'Business Administration and Management', 'Business majors develop many valuable skills and areas of knowledge that enable them to make a significant contribution to the corporate and not-for-profit worlds. They can think in numbers. Business majors can quantify a set of data, evaluate the financial impact of decisions, and use figures to back up their proposals.\r\n\r\nCollege students who major in business learn to write in a clear and concise manner while crafting case analyses and other business papers for their classes. Professors often require them to complete projects in groups so they learn the challenges and value of teamwork while refining their presentation and leadership skills.'),
(4, 'Accountant', 'Accounting supplies quantitative information essential to management decision-making and control, as well as a wide variety of tax and consulting services and information on management\'s effective use of an organization\'s resources. This major helps prepare students for careers in public, industrial, or governmental accounting and also provides an appropriate background for those planning to enter law school or graduate school. Public accounting is carried on by independent practitioners, most of whom are certified public accountants. '),
(6, 'Computer Science', 'Computer Science is primarily concerned with the analysis, design, and applications of computing software and systems. It includes programming languages, data structures, compilers, operating systems, data bases, and artificial intelligence.');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `RegistrationId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `MidtermGrade` int(11) DEFAULT NULL,
  `AssignemetGrade` int(11) DEFAULT NULL,
  `FinalGrade` int(11) DEFAULT NULL,
  PRIMARY KEY (`RegistrationId`),
  KEY `ClassId` (`ClassId`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegistrationId`, `StudentId`, `ClassId`, `MidtermGrade`, `AssignemetGrade`, `FinalGrade`) VALUES
(2, 1, 2, 0, 0, 0),
(4, 1, 1, NULL, NULL, NULL);

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
  `SPhoneNumber` int(11) NOT NULL,
  `SPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `SFirstName`, `SMiddleName`, `SLastName`, `SEmail`, `SPhoneNumber`, `SPassword`) VALUES
(1, 'Daniel', 'Marwan', 'Awde', 'dmawde@hotmail.com', 7065502, '123456');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherId`, `TFirstName`, `TMiddleName`, `TLastName`, `TEmail`, `TMobileNum`, `TPassword`) VALUES
(2, 'Nadine', 'Mofid', 'Kassamani', 'nmkassamani@hotmail.com', 70135757, 'Nad89'),
(3, 'Ihab', 'Kamal', 'Breich', 'ikbreich@hotmail.com', 79135757, 'cl23ih');

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
