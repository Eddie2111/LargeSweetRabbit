-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 10:23 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteltest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@testmail.com', 'Test@1234', '2021-12-21 00:00:00', '2022-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `avail`
--

CREATE TABLE `avail` (
  `Guest_ID` int(11) NOT NULL,
  `Facilities_Code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `avail`
--

INSERT INTO `avail` (`Guest_ID`, `Facilities_Code`) VALUES
(1, 'ASW'),
(1, 'CBF'),
(1, 'IDG'),
(2, 'IDG'),
(2, 'NSW'),
(2, 'SPA'),
(3, 'IDG'),
(4, 'NSW'),
(5, 'NSW'),
(6, 'ASW'),
(6, 'IDG'),
(7, 'NSW'),
(7, 'SPA'),
(8, 'CBF'),
(8, 'SPA'),
(9, 'NSW'),
(10, 'IDG'),
(10, 'NSW'),
(11, 'ASW'),
(12, 'SPA'),
(13, 'NSW'),
(14, 'CBF'),
(15, 'NSW');

-- --------------------------------------------------------

--
-- Table structure for table `contactedus`
--

CREATE TABLE `contactedus` (
  `id` int(5) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `message` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactedus`
--

INSERT INTO `contactedus` (`id`, `name`, `email`, `message`) VALUES
(1, 'Jane smith', 'football@gmail.com', 'hello there,\r\n\r\nI\'am rubel hossain the player of the world!'),
(2, 'dsa', '321321@gmail.com', 'fdsfds dsgfds f');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `Facilities_Code` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` int(15) NOT NULL,
  `Time_Slot` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`Facilities_Code`, `Name`, `Price`, `Time_Slot`) VALUES
('ASW', 'Afternoon Swimming ', 1500, '2 PM - 4 PM'),
('CBF', 'Continental Breakfast', 700, '7 AM - 10 AM'),
('IDG', 'Indoor Games', 5000, '10 AM - 10 PM'),
('NSW', 'Night Swimming ', 1500, '8 PM - 10 PM'),
('SPA', 'Message Spa', 1000, '12 AM -11 PM');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `SSN` int(5) NOT NULL,
  `First_Name` varchar(60) NOT NULL,
  `Last_Name` varchar(60) NOT NULL,
  `Guest_ID` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(65) NOT NULL,
  `facilities` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`SSN`, `First_Name`, `Last_Name`, `Guest_ID`, `Age`, `Date_Of_Birth`, `Email`, `Password`, `facilities`) VALUES
(50001, 'Nick', 'C', 1, 21, '1999-01-01', 'Nickd@net.com', 'abc123', 'Afternoon Swimming'),
(50002, 'Steve', 'Hem', 2, 25, '1997-09-07', 'stevekk9ford@yahoo.com', 'huvuyuy6667@@', 'SPA'),
(50003, 'Den', 'Alvo', 3, 34, '1988-08-09', 'den00908@yahoo.com', 'kjbbi77!!@', 'Continental Breakfast'),
(50004, 'Jem', 'Deo', 4, 30, '1992-07-01', 'jem667deo@outlook.com', 'kbbrwzterwe34', 'SPA'),
(50005, 'Jon', 'Alvo', 5, 23, '1998-07-05', 'jonnnn444@gmail.com', 'ugigui0909', 'SPA'),
(50006, 'Olve', 'Ew', 6, 21, '1999-07-10', 'ow21999@gmail.com', 'gvgcy4w53w', 'SPA'),
(50007, 'Jon', 'Eldo', 7, 20, '2002-07-09', 'eldo002@yahoo.com', 'vuvuvu56ds455s', 'Afternoon Swimming'),
(50008, 'James', 'Peter', 8, 30, '1992-03-09', 'james992ter@yahoo.com', 'uhiugiugiug878', 'Afternoon Swimming'),
(50009, 'Shane', 'Dex', 9, 22, '2000-07-06', 'shane00886@gmail.com', 'iuhiulguilg778tt', NULL),
(50010, 'Hill', 'Clack', 10, 26, '1996-04-27', 'hillc1996@outlook.com', 'fytctycytc6544564', 'spa'),
(50011, 'Alex', 'Crise', 11, 27, '1995-02-15', 'alex1995@gmail.com', 'vutviytf654646', 'Indoor Games'),
(50012, 'Ham', 'Smith', 12, 22, '2000-05-07', 'hammm2000sm@yahoo.com', 'fctfrxt3w43434', 'Indoor Games'),
(50013, 'Aliy', 'Marry', 13, 29, '1993-08-15', 'aliyaliy@outlook.com', 'gygcy342199hjvjh', 'Indoor Games'),
(50014, 'Chris', 'Pit', 14, 27, '1995-06-08', 'chris0095@hotmail.com', 'hccfgc5564xrfx', 'SPA'),
(50015, 'Tim', 'Bed', 15, 22, '2000-08-08', 'timbed00@yahoo.com', 'gvkuvkuyvu6766', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotelbranch`
--

CREATE TABLE `hotelbranch` (
  `Hotel_ID` int(5) NOT NULL,
  `Hotel_admin` varchar(60) NOT NULL,
  `zipCode` varchar(60) NOT NULL,
  `phoneNumber` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelbranch`
--

INSERT INTO `hotelbranch` (`Hotel_ID`, `Hotel_admin`, `zipCode`, `phoneNumber`, `City`) VALUES
(11222, '95814', 'Carroline Stan', '5307336136', 'California'),
(11223, '12207', 'Semione Barbosa', '2153925920', 'New York'),
(12113, '32301', 'Garett Flint', '4797906588', 'Florida'),
(12313, '78701', 'Ashrook Neil', '6412016675', 'Texas'),
(13322, '98507', 'Harry Cook', '2536323853', 'Washington'),
(13332, '30303', 'Edward Carol', '5307336136', 'Georgia');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slot`
--

CREATE TABLE `parking_slot` (
  `id` int(3) NOT NULL,
  `Slot` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_slot`
--

INSERT INTO `parking_slot` (`id`, `Slot`, `status`) VALUES
(1, 'A1', 'FREE'),
(2, 'A2', 'FREE'),
(3, 'A3', 'FREE'),
(4, 'A4', 'FREE'),
(5, 'B1', 'OCCUPIED'),
(6, 'B2', 'OCCUPIED'),
(7, 'B3', 'FREE'),
(8, 'B4', 'FREE'),
(9, 'C1', 'FREE'),
(10, 'C2', 'FREE'),
(11, 'C3', 'FREE');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `feespm` int(11) NOT NULL,
  `foodstatus` int(11) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` int(11) NOT NULL,
  `course` varchar(500) NOT NULL,
  `regno` int(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `egycontactno` bigint(11) NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` bigint(11) NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `corresState` varchar(500) NOT NULL,
  `corresPincode` int(11) NOT NULL,
  `pmntAddress` varchar(500) NOT NULL,
  `pmntCity` varchar(500) NOT NULL,
  `pmnatetState` varchar(500) NOT NULL,
  `pmntPincode` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(14, 104, 4, 4000, 1, '2021-12-16', 9, 'Bachelor  of Science', 1010256, 'Kevin', 'Symonn', 'Patrick', 'male', 1704050603, 'test6@testmail.com', 1050504, 'Mrs Caroline Holloway', 'Mother', 808, '12, Bc City, Caroline halls', 'Dhaka', 'Dhaka', 265, '12, Bc City, Caroline halls', 'Dhaka', 'Dhaka', 265, '2021-12-24 10:29:56', ''),
(16, 102, 2, 2000, 0, '2022-04-27', 2, 'Bachelor  of Technology', 0, 'First', 'Second', 'Third', 'male', 88010101010, 'test5@testmail.com', 223, 'fdsf', 'fdsf', 245, 'gdf54gdf5g', 'dasdas', 'Cumilla', 265, 'gdf54gdf5g', 'dasdas', 'Cumilla', 265, '2022-04-26 16:28:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `Guest_ID` int(11) NOT NULL,
  `Hotel_ID` int(11) NOT NULL,
  `Room_no` int(11) NOT NULL,
  `Registration_date` date NOT NULL,
  `Check_in_date` date NOT NULL,
  `Check_out_date` date NOT NULL,
  `Discount` int(11) NOT NULL,
  `Payment_Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`Guest_ID`, `Hotel_ID`, `Room_no`, `Registration_date`, `Check_in_date`, `Check_out_date`, `Discount`, `Payment_Status`) VALUES
(1, 11223, 101, '2021-12-05', '2021-12-08', '2021-12-14', 20, 'COMPLETE'),
(2, 13332, 502, '2022-01-05', '2022-01-11', '2022-01-18', 10, 'INCOMPLETE'),
(3, 12313, 101, '2022-04-10', '2022-04-12', '2022-04-20', 0, 'INCOMPLETE'),
(4, 13322, 302, '2022-01-03', '2022-01-19', '2022-01-24', 12, 'COMPLETE'),
(5, 12113, 504, '2022-03-04', '2022-03-07', '2022-03-16', 0, 'COMPLETE'),
(6, 11223, 103, '2022-03-11', '2022-03-15', '2022-03-20', 15, 'COMPLETE'),
(7, 12113, 202, '2022-02-01', '2022-02-02', '2022-04-15', 5, 'COMPLETE'),
(8, 12313, 502, '2022-04-03', '2022-04-05', '2022-04-14', 0, 'INCOMPLETE'),
(9, 12313, 301, '2022-02-09', '2022-02-15', '2022-02-23', 25, 'INCOMPLETE'),
(10, 13322, 101, '2021-12-09', '2021-12-14', '2022-01-01', 26, 'COMPLETE'),
(11, 11222, 103, '2022-03-03', '2022-03-08', '2022-03-22', 0, 'COMPLETE'),
(12, 13332, 501, '2022-03-02', '2022-03-07', '2022-04-01', 30, 'COMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Hotel_ID` int(5) NOT NULL,
  `Room_Number` varchar(10) NOT NULL,
  `Price` int(5) NOT NULL,
  `Category` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Hotel_ID`, `Room_Number`, `Price`, `Category`) VALUES
(11222, '103', 10000, 'A'),
(11223, '101', 10000, 'A'),
(11223, '102', 8000, 'B'),
(11223, '103', 5000, 'C'),
(12113, '202', 10000, 'A'),
(12113, '403', 8000, 'B'),
(12113, '504', 8000, 'B'),
(12313, '101', 5000, 'C'),
(12313, '301', 10000, 'A'),
(12313, '502', 8000, 'B'),
(13322, '101', 8000, 'B'),
(13322, '103', 8000, 'B'),
(13322, '302', 10000, 'A'),
(13332, '501', 5000, 'C'),
(13332, '502', 5000, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(1, 2, 101, 2000, '2021-12-23 17:54:50'),
(6, 2, 102, 2000, '2021-12-23 17:54:50'),
(7, 2, 103, 2000, '2021-12-23 17:54:50'),
(8, 4, 104, 4000, '2021-12-23 17:54:50'),
(9, 4, 105, 4000, '2021-12-23 17:54:50'),
(10, 4, 106, 4000, '2021-12-23 17:54:50'),
(11, 2, 201, 2000, '2021-12-23 17:54:50'),
(12, 2, 202, 2000, '2021-12-23 17:54:50'),
(13, 2, 203, 2000, '2021-12-23 17:54:50'),
(14, 4, 204, 2000, '2021-12-23 17:54:50'),
(15, 4, 205, 4000, '2021-12-23 17:54:50'),
(16, 4, 206, 4000, '2021-12-23 17:54:50'),
(17, 2, 301, 2000, '2021-12-23 17:54:50'),
(18, 2, 302, 2000, '2021-12-23 17:54:50'),
(19, 2, 303, 2000, '2021-12-23 17:54:50'),
(20, 4, 304, 4000, '2021-12-23 17:54:50'),
(21, 4, 305, 4000, '2021-12-23 17:54:50'),
(22, 4, 306, 4000, '2021-12-23 17:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Chittagong'),
(2, 'Rangpur'),
(3, 'Rajshahi'),
(4, 'Dhaka'),
(5, 'Sylhet'),
(6, 'Jessore'),
(7, 'Dinajpur'),
(8, 'Rangpur'),
(9, 'Mymensingh'),
(10, 'Cumilla'),
(11, 'Faridpur'),
(12, 'Bogra'),
(13, 'Barishal'),
(14, 'Noakhali'),
(15, 'Pabna'),
(16, 'Kustia'),
(17, 'Cox\'s Bazar'),
(18, 'Brahmanbaria'),
(19, 'Sherpur'),
(20, 'Pabna'),
(21, 'Netrokona'),
(22, 'Kishoregonj'),
(23, 'Sunamganj'),
(24, 'Pabna'),
(25, 'Bakerganj'),
(37, 'Maulavibazar'),
(38, 'Thakurgaon'),
(39, 'Panchagarh'),
(40, 'Feni'),
(41, 'Lakhsmipur');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `ssn`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(23, '10125', 'First', 'Second', 'Third', 'male', 88010101010, 'test5@testmail.com', 'abc123', '2021-12-22 16:21:09', '', ''),
(26, '1010256', 'Kevin', 'Symonn', 'Patrick', 'male', 1704050603, 'test6@testmail.com', 'abc123', '2021-12-24 10:28:19', '', ''),
(27, '20101073', 'temp', 'temp', 'temp', 'male', 65, 'test@testmail.com', 'abc123', '2022-04-05 16:43:39', '', ''),
(28, '10254963', 'jane', 'smith', 'fiona', 'male', 778541236, 'somemail@test.com', 'apassword', '2022-04-16 08:19:34', '', ''),
(29, '321321', 'jane', 'smith', 'fiona', 'male', 321321321321, 'somemail1@test.com', 'apass', '2022-04-16 08:23:23', '', ''),
(30, '321321', 'jane', 'smith', 'fiona', 'male', 321321321321, 'somemail11@test.com', 'apass', '2022-04-16 08:25:20', '', ''),
(31, '321321', 'jane', 'smith', 'fiona', 'male', 321321321321, 'somemail12@test.com', 'apass', '2022-04-16 08:28:21', '', ''),
(32, '321321', 'jane', 'smith', 'fiona', 'male', 321321321321, 'somemail12@test.com', 'asa', '2022-04-16 08:28:30', '', ''),
(33, '12124321', 'asd', 'afa', 'aaaa', 'others', 2143543654, '321321@gmail.com', '12345', '2022-04-20 07:48:38', '', ''),
(34, '4214321', 'dsadsa', 'dsad', 'dsadsa', 'others', 421321, 'asp@gnet.com', 'abc123', '2022-04-27 07:43:14', '', ''),
(35, '4214321', 'dsadsa', 'dsad', 'dsadsa', 'male', 50001, 'Nickd@net.com', '12345', '2022-04-27 07:50:19', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactedus`
--
ALTER TABLE `contactedus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`Facilities_Code`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `parking_slot`
--
ALTER TABLE `parking_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`Guest_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Hotel_ID`,`Room_Number`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactedus`
--
ALTER TABLE `contactedus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
