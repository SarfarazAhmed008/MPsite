-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 12:50 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missing_person_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_ID` int(10) NOT NULL,
  `Location_ID` int(10) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_ID`, `Location_ID`, `Phone_Number`) VALUES
(1, 0, '1232'),
(2, 0, '01800003333'),
(3, 0, '0182'),
(4, 0, '0188');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `Date_ID` int(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`Date_ID`, `Date`) VALUES
(1, '2016-12-20'),
(2, '2016-11-12'),
(3, '2016-12-20'),
(4, '2017-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `found_person`
--

CREATE TABLE `found_person` (
  `FP_ID` int(10) NOT NULL,
  `Date_ID` int(10) NOT NULL,
  `Location_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(10) NOT NULL,
  `Street_Address` varchar(100) NOT NULL,
  `Postal_Code` varchar(20) DEFAULT NULL,
  `City` varchar(25) NOT NULL,
  `Country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `Member_ID` int(10) NOT NULL,
  `FName` varchar(25) DEFAULT NULL,
  `LName` varchar(25) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Contact_ID` int(10) NOT NULL,
  `Location_ID` int(10) NOT NULL,
  `Post_ID` int(10) NOT NULL,
  `Message_ID` int(10) NOT NULL,
  `IsAuthorized` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`Member_ID`, `FName`, `LName`, `Email`, `Username`, `Password`, `Contact_ID`, `Location_ID`, `Post_ID`, `Message_ID`, `IsAuthorized`) VALUES
(1, 'kamal', 'hossain', 'pil@yahoo.com', 'pil22', 'pip', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_ID` int(10) NOT NULL,
  `MEmail` varchar(30) NOT NULL,
  `MField` text NOT NULL,
  `Time_ID` int(10) NOT NULL,
  `Date_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `MEmail`, `MField`, `Time_ID`, `Date_ID`) VALUES
(1, 'noman@yahoo.com', 'Hello sir!!', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `missing_person`
--

CREATE TABLE `missing_person` (
  `MP_ID` int(10) NOT NULL,
  `Date_ID` int(10) NOT NULL,
  `Location_ID` int(10) NOT NULL,
  `IsFound` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_person`
--

INSERT INTO `missing_person` (`MP_ID`, `Date_ID`, `Location_ID`, `IsFound`) VALUES
(1, 0, 0, 'miss'),
(2, 0, 0, 'miss'),
(3, 0, 0, 'found'),
(4, 0, 0, 'miss');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Person_ID` int(10) NOT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Age` int(4) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Height` varchar(10) DEFAULT NULL,
  `Hair_Color` varchar(20) DEFAULT NULL,
  `Face_Type` varchar(30) DEFAULT NULL,
  `Physique` varchar(30) DEFAULT NULL,
  `MP_ID` int(10) NOT NULL,
  `FP_ID` int(10) NOT NULL,
  `Post_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Person_ID`, `First_Name`, `Last_Name`, `Age`, `Gender`, `Height`, `Hair_Color`, `Face_Type`, `Physique`, `MP_ID`, `FP_ID`, `Post_ID`) VALUES
(1, 'kamal', 'hossain', 23, 'male', '5ft', 'black', 'Round', 'medium', 0, 0, 0),
(3, 'rahima', 'Begum', 23, 'female', '4ft', 'brown', 'round', 'medium', 0, 0, 0),
(4, 'noman', 'khan', 23, 'male', '5ft', 'black', 'round', 'medium', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` int(10) NOT NULL,
  `Date_ID` int(10) NOT NULL,
  `Time_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `Time_ID` int(10) NOT NULL,
  `Time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_ID`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`Date_ID`);

--
-- Indexes for table `found_person`
--
ALTER TABLE `found_person`
  ADD PRIMARY KEY (`FP_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`Member_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_ID`);

--
-- Indexes for table `missing_person`
--
ALTER TABLE `missing_person`
  ADD PRIMARY KEY (`MP_ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Person_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`Time_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `Date_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `found_person`
--
ALTER TABLE `found_person`
  MODIFY `FP_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `Member_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `missing_person`
--
ALTER TABLE `missing_person`
  MODIFY `MP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `Person_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `Time_ID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
