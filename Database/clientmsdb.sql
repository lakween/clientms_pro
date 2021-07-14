-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2021 at 05:24 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555562, 'admin@gmail.com', 'ceb6c970658f31504a901b89dcd3e461', '2019-10-21 01:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblclaim`
--

DROP TABLE IF EXISTS `tblclaim`;
CREATE TABLE IF NOT EXISTS `tblclaim` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ClaimName` varchar(150) DEFAULT NULL,
  `DistanceTravel` varchar(150) DEFAULT NULL,
  `UnitsofPetrol` varchar(150) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclaim`
--

INSERT INTO `tblclaim` (`ID`, `ClaimName`, `DistanceTravel`, `UnitsofPetrol`, `CreationDate`) VALUES
(1, 'TravelAllowance', '250', '25', '2020-02-08 15:37:51'),
(2, 'Travel Bonus for 250KM+ ', '620', '45', '2020-02-09 06:26:22'),
(3, 'Travel Bonus for  150KM - 250KM', '280', '35', '2020-02-09 06:26:52'),
(4, 'Travel Expense 01', '200', '8', '2020-02-09 23:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblclaiminvoice`
--

DROP TABLE IF EXISTS `tblclaiminvoice`;
CREATE TABLE IF NOT EXISTS `tblclaiminvoice` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Userid` varchar(120) DEFAULT NULL,
  `ServiceId` varchar(120) DEFAULT NULL,
  `ClaimId` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclaiminvoice`
--

INSERT INTO `tblclaiminvoice` (`ID`, `Userid`, `ServiceId`, `ClaimId`, `PostingDate`) VALUES
(1, '2', '1', '123414163', '2020-02-08 15:44:55'),
(2, '2', '1', '847697721', '2020-02-08 15:54:33'),
(3, '4', '1', '740252033', '2020-02-08 15:54:49'),
(4, '1', '3', '700734741', '2020-02-09 06:27:04'),
(5, '3', '2', '250251478', '2020-02-09 06:28:03'),
(6, '4', '3', '532577869', '2020-02-09 06:28:32'),
(7, '1', '4', '476511503', '2020-02-09 23:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblclient`
--

DROP TABLE IF EXISTS `tblclient`;
CREATE TABLE IF NOT EXISTS `tblclient` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AccountID` int DEFAULT NULL,
  `EmpCategory` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Department` varchar(120) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `City` varchar(120) DEFAULT NULL,
  `NationalIdentityNumber` bigint DEFAULT NULL,
  `ContactNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateofBirth` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclient`
--

INSERT INTO `tblclient` (`ID`, `AccountID`, `EmpCategory`, `FirstName`, `LastName`, `FullName`, `Department`, `Address`, `City`, `NationalIdentityNumber`, `ContactNumber`, `Email`, `Password`, `CreationDate`, `DateofBirth`) VALUES
(1, 219895990, 'Administrator', 'Wijemuni', 'De Zoysa', 'Wijemuni De Zoysa', 'Administretor', 'Gonapitiya Road,Thembiliyana, Kuruwita', 'Rathnapura', 9613828311, 715375179, 'unzoysa.un@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-09 06:11:55', '1996-05-16 13:00:00.000000'),
(2, 977054435, 'Accountant', 'Lakween', 'Senathilake', 'Lakween Lalanahansa Senathilake', 'Motor Claim', 'Sekkuwatta ,Mahabage', 'Colombo7', 9612522547, 746545465, 'lakweensenathilake@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-09 06:13:21', '1996-08-07 13:00:00.000000'),
(3, 403367102, 'Exclusive Agency Insurers', 'Gihara', 'Dulanjana', 'Gihahra Dulanjana Jayasinge', 'Human Resources', '6th Lane, Obesekarapura, Rajagiriya.', 'Colombo8', 8513828311, 752263773, 'giharadulanjana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-09 06:20:13', '1985-12-04 13:00:00.000000'),
(4, 546949255, 'Independent Agency Insurers', 'Gaythri', 'Darmarathne', 'Gyathri Anupama Darmarathne  ', 'Motor Claim', 'Senawana Niwasa, No16, Senkadagala Road, Kandy', 'Kandy', 9245618445, 774515181, 'gayathridarmarathna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-09 06:22:18', '1992-12-08 13:00:00.000000'),
(5, 417387906, 'Staff', 'Sunil', 'Perera', 'Sunil Amaris Perera', 'Staff ', 'Amaris Place, Jet7 street, Jaliyapura,Polonnaruwa.', 'Polonnaruwa', 8454542154, 715458451, 'sinul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-09 06:24:04', '1984-05-13 13:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

DROP TABLE IF EXISTS `tblinvoice`;
CREATE TABLE IF NOT EXISTS `tblinvoice` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Userid` varchar(120) DEFAULT NULL,
  `ServiceId` varchar(120) DEFAULT NULL,
  `BillingId` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`ID`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(1, '1', '1', '330186032', '2020-02-01 09:06:38'),
(2, '1', '3', '330186032', '2020-02-01 09:06:38'),
(3, '1', '1', '510248569', '2020-02-01 14:06:14'),
(4, '2', '2', '476938536', '2020-02-01 14:22:18'),
(5, '1', '1', '782393103', '2020-02-01 15:09:30'),
(6, '1', '3', '782393103', '2020-02-01 15:09:30'),
(7, '1', '1', '347202590', '2020-02-06 13:45:58'),
(8, '1', '4', '347202590', '2020-02-06 13:45:58'),
(9, '4', '1', '948704584', '2020-02-08 13:27:45'),
(10, '4', '3', '948704584', '2020-02-08 13:27:45'),
(11, '4', '6', '948704584', '2020-02-08 13:27:45'),
(12, '2', '1', '723035946', '2020-02-08 15:40:47'),
(13, '2', '3', '723035946', '2020-02-08 15:40:47'),
(14, '2', '6', '723035946', '2020-02-08 15:40:47'),
(15, '2', '1', '252022389', '2020-02-09 06:27:28'),
(16, '2', '2', '252022389', '2020-02-09 06:27:28'),
(17, '3', '3', '800717975', '2020-02-09 06:27:44'),
(18, '3', '4', '800717975', '2020-02-09 06:27:44'),
(19, '3', '5', '800717975', '2020-02-09 06:27:44'),
(20, '3', '6', '800717975', '2020-02-09 06:27:44'),
(21, '3', '7', '800717975', '2020-02-09 06:27:44'),
(22, '4', '8', '333067960', '2020-02-09 06:28:21'),
(23, '4', '9', '333067960', '2020-02-09 06:28:21'),
(24, '4', '10', '333067960', '2020-02-09 06:28:21'),
(25, '4', '11', '333067960', '2020-02-09 06:28:21'),
(26, '4', '12', '333067960', '2020-02-09 06:28:21'),
(27, '4', '13', '333067960', '2020-02-09 06:28:21'),
(28, '4', '14', '333067960', '2020-02-09 06:28:21'),
(29, '4', '15', '333067960', '2020-02-09 06:28:21'),
(30, '3', '17', '286113496', '2020-02-09 23:38:19'),
(31, '3', '18', '286113496', '2020-02-09 23:38:19'),
(32, '3', '15', '387268304', '2020-02-09 23:38:31'),
(33, '3', '16', '387268304', '2020-02-09 23:38:31'),
(34, '1', '1', '165561949', '2020-02-10 04:34:19'),
(35, '1', '2', '165561949', '2020-02-10 04:34:19'),
(36, '1', '3', '165561949', '2020-02-10 04:34:19'),
(37, '2', '1', '361325393', '2020-02-17 10:59:21'),
(38, '2', '2', '361325393', '2020-02-17 10:59:21'),
(39, '1', '1', '145961772', '2020-02-17 11:14:26'),
(40, '1', '4', '145961772', '2020-02-17 11:14:26'),
(41, '1', '13', '145961772', '2020-02-17 11:14:26'),
(42, '1', '14', '145961772', '2020-02-17 11:14:26'),
(43, '1', '1', '946968916', '2020-02-17 11:15:05'),
(44, '1', '2', '946968916', '2020-02-17 11:15:05'),
(45, '1', '3', '946968916', '2020-02-17 11:15:05'),
(46, '1', '11', '946968916', '2020-02-17 11:15:05'),
(47, '1', '12', '946968916', '2020-02-17 11:15:05'),
(48, '1', '1', '153991958', '2020-02-17 11:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', 'bghjgjhg', NULL, NULL, '2019-10-24 02:24:52'),
(2, 'contactus', 'Contact Us', 'D-204, Hole Town South West,Delhi-110096,India', 'info@gmail.com', 8529631237, '2019-10-24 02:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblsalary`
--

DROP TABLE IF EXISTS `tblsalary`;
CREATE TABLE IF NOT EXISTS `tblsalary` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `EmpCategory` varchar(200) DEFAULT NULL,
  `BasicSalary` varchar(200) DEFAULT NULL,
  `PftSharing` varchar(200) DEFAULT NULL,
  `Commission` varchar(250) DEFAULT NULL,
  `TravelExpenses` varchar(250) DEFAULT NULL,
  `Allowance` varchar(250) DEFAULT NULL,
  `OverTime` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsalary`
--

INSERT INTO `tblsalary` (`ID`, `EmpCategory`, `BasicSalary`, `PftSharing`, `Commission`, `TravelExpenses`, `Allowance`, `OverTime`, `CreationDate`) VALUES
(1, 'Administrator', '750', '120', '100', '250', '100', '250', '2020-02-09 06:06:36'),
(2, 'Accountant', '650', '60', '50', '100', '50', '60', '2020-02-09 06:06:57'),
(3, 'Exclusive Agency Insurers', '350', '150', '150', '60', '60', '60', '2020-02-09 06:07:20'),
(4, 'Independent Agency Insurers', '200', '150', '200', 'n/a', '60', '60', '2020-02-09 06:07:46'),
(5, 'Staff', '300', 'n/a', 'n/a', 'n/a', 'n/a', '80', '2020-02-09 06:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblsalaryinvoice`
--

DROP TABLE IF EXISTS `tblsalaryinvoice`;
CREATE TABLE IF NOT EXISTS `tblsalaryinvoice` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Userid` varchar(120) DEFAULT NULL,
  `ServiceId` varchar(120) DEFAULT NULL,
  `SalaryId` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsalaryinvoice`
--

INSERT INTO `tblsalaryinvoice` (`ID`, `Userid`, `ServiceId`, `SalaryId`, `PostingDate`) VALUES
(16, '5', '5', '969012099', '2020-02-09 06:29:02.312387'),
(15, '4', '4', '728266538', '2020-02-09 06:28:42.310939'),
(14, '3', '3', '996439772', '2020-02-09 06:27:54.638222'),
(13, '2', '2', '684507017', '2020-02-09 06:27:12.505968'),
(12, '1', '1', '834137035', '2020-02-09 06:24:41.693860'),
(11, '4', '4', '968924704', '2020-02-08 16:35:19.096512'),
(10, '2', '2', '708385948', '2020-02-08 16:35:10.209679');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ServiceType` varchar(250) DEFAULT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServicePrice` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceType`, `ServiceName`, `ServicePrice`, `CreationDate`) VALUES
(1, 'Personal', 'Divi Thilina Protection Plan ', '350', '2020-02-09 06:00:27'),
(2, 'Personal', 'Home Protect Insurance', '320', '2020-02-09 06:00:48'),
(3, 'Personal', 'Travel Protect', '380', '2020-02-09 06:01:14'),
(4, 'Personal', 'Sri Lanka Insurance Gaurawa', '420', '2020-02-09 06:01:34'),
(5, 'Personal', 'Freedom Retirement Plan', '330', '2020-02-09 06:01:52'),
(6, 'Personal', 'Minimuthu Dayada', '420', '2020-02-09 06:02:15'),
(7, 'Personal', 'Comprehensive Health Plus', '450', '2020-02-09 06:02:30'),
(8, 'Personal', 'Motor Plus', '330', '2020-02-09 06:02:46'),
(9, 'Personal', 'Mortgage Protection Plan', '250', '2020-02-09 06:03:00'),
(10, 'Business', 'Insurance for Business Premises', '450', '2020-02-09 06:03:39'),
(11, 'Business', 'Marine Cargo Insurance', '850', '2020-02-09 06:03:55'),
(12, 'Business', 'Electronic Equipment Insurance', '1250', '2020-02-09 06:04:13'),
(13, 'Business', 'Machinery Breakdown Insurance', '2400', '2020-02-09 06:04:28'),
(14, 'Business', 'Workmen\'s Compensation Insurance', '2400', '2020-02-09 06:04:46'),
(15, 'Business', 'Motor Plus Commercial Vehicle', '2400', '2020-02-09 06:05:01'),
(16, 'Personal', 'Burglary Insurance', '420', '2020-02-09 23:37:15'),
(17, 'Personal', 'Fire Insurance for Dwelling Houses', '250', '2020-02-09 23:37:31'),
(18, 'Personal', 'Home Protect Lite', '280', '2020-02-09 23:37:56'),
(19, 'Business', 'Retirement Health Plan', '250', '2020-02-17 04:27:28'),
(20, 'Business', 'Life Insurance', '120', '2020-02-17 11:16:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
