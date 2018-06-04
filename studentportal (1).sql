-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 01:19 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PN` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `PN`, `password`) VALUES
(2, '2000200010', 'e4cd5fdc4631a4032f3040e41522e22c'),
(3, '4444555512', 'e4cd5fdc4631a4032f3040e41522e22c');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(10) UNSIGNED NOT NULL,
  `LecturerID` int(10) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `LecturerID`, `Comment`, `date`) VALUES
(1, 2, 'ძალიან კარგი ლექტორია', 'Mon Feb 02, 2016 14:49'),
(2, 2, '^_^', 'Sun Jun 01, 2017'),
(3, 1, 'Some Random Comment out here', 'Sun Jun 03, 2018 14:41'),
(4, 1, 'შემდეგი კომენტარი ', 'Sun Jun 03, 2018 14:56'),
(5, 3, 'მათემატიკა მიყვარსსს\r\n', 'Mon Jun 04, 2018 10:32'),
(6, 1, 'ახალი კომენტარი სიმონ\r\n', 'Mon Jun 04, 2018 11:34');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PN` varchar(11) NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Birthdate` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `SumRating` int(11) NOT NULL,
  `CountRating` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Profession` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`ID`, `PN`, `FullName`, `Email`, `Password`, `Birthdate`, `PhoneNumber`, `SumRating`, `CountRating`, `Title`, `Profession`) VALUES
(1, '20001064441', 'Gvantsa Tsulaia', 'gvantsatsulaia@gmail.com', 'e4cd5fdc4631a4032f3040e41522e22c', '17/12/1997', '23232 2323 1', 0, 0, 'Associate professor', 'Computer Science'),
(2, '12345678912', 'Beso Tabatadze', 'besotabatadze@gmail.com', '80c71aa5a5b453751690fabe010f861f', '10/10/1990', '551 551 551', 0, 0, 'Professor', 'Computer Science'),
(3, '1231231231', 'Nikoloz Maglaperidze', 'nikoloz@gmail.com', '15152999e4f8d343989729e38793678e', '17/12/1997', '551 555555', 0, 0, 'Professor', 'Applied Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PN` varchar(11) NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Birthdate` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `UniversityID` int(10) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Course` int(11) NOT NULL,
  `Degree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `PN`, `FullName`, `Email`, `Password`, `Birthdate`, `PhoneNumber`, `UniversityID`, `Faculty`, `Course`, `Degree`) VALUES
(9, '20001064444', 'Natia Mestvirishvili', 'natia@gmail.com', 'e4cd5fdc4631a4032f3040e41522e22c', '12/12/1990', '591 05 09 52', 1, 'Bussiness', 1, 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `ID` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `Adress` varchar(250) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `SumRating` int(11) NOT NULL,
  `CountRating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`ID`, `FullName`, `Adress`, `Email`, `PhoneNumber`, `SumRating`, `CountRating`) VALUES
(1, 'Georgian American University', 'Merab Aleksidze 10, Tbilisi 0160', 'info@gau.ge', '2 20 65 20', 0, 0),
(2, 'Georgian Technical University', 'Kostava 77, 0175 Tbilisi', 'info@gtu.ge', '+995 32 2 36 51 52', 0, 0),
(3, 'ivane Javakhishvili Tbilisi state university', '1. Chavchavadze Avenue', 'rector@tsu.ge', '23232 2323 1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
