-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 29, 2020 at 08:00 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ApplicationProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `Booking_id` int(11) NOT NULL,
  `Client_id` int(11) NOT NULL,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `ArrivalDate` date NOT NULL,
  `DepDate` date NOT NULL,
  `TotGuests` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`Booking_id`, `Client_id`, `First_Name`, `Last_Name`, `ArrivalDate`, `DepDate`, `TotGuests`, `RoomNumber`) VALUES
(282, 14, 'Nick', 'Grasso', '2020-06-18', '2020-06-19', 2, 201),
(373, 16, 'Eleno', 'Marche', '2020-05-14', '2020-05-16', 4, 400),
(374, 17, 'Martina', 'Lubiana', '2020-06-01', '2020-06-03', 5, 500),
(404, 18, 'Costanza', 'Tome', '2020-07-14', '2020-07-16', 5, 502),
(411, 12, 'lara', 'croft', '2020-04-07', '2020-04-08', 3, 300);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bookinginfo`
-- (See below for the actual view)
--
CREATE TABLE `bookinginfo` (
);

-- --------------------------------------------------------

--
-- Table structure for table `Cleaning`
--

CREATE TABLE `Cleaning` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cleaning`
--

INSERT INTO `Cleaning` (`id`, `FirstName`, `LastName`) VALUES
(11, 'Mario', 'Rossino'),
(12, 'Bianca', 'Verdi'),
(13, 'Francesco', 'Ghizzo'),
(14, 'Lorenzo', 'DelBen'),
(15, 'Alba', 'Moscatelli'),
(16, 'Emanuela ', 'Ballarin');

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` text NOT NULL,
  `Guests` int(11) NOT NULL,
  `ArrivalDate` date NOT NULL,
  `DepartureDate` date NOT NULL,
  `Children` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`id`, `Name`, `LastName`, `Email`, `Guests`, `ArrivalDate`, `DepartureDate`, `Children`) VALUES
(12, 'lara', 'croft', 'lara@gmail.com', 1, '2020-04-07', '2020-04-08', 2),
(14, 'Nick', 'Grasso', 'Conegliano', 2, '2020-06-18', '2020-06-19', 0),
(16, 'Eleno', 'Marche', 'ele@gmail.com', 2, '2020-05-14', '2020-05-16', 2),
(17, 'Martina', 'Lubiana', 'marti@gmail.com', 2, '2020-06-01', '2020-06-03', 3),
(18, 'Costanza', 'Tome', 'costi@gmail.com', 3, '2020-07-14', '2020-07-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `RoomNumber` int(11) NOT NULL,
  `BedNumber` int(11) NOT NULL,
  `Available` tinyint(1) NOT NULL,
  `CleaningId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`RoomNumber`, `BedNumber`, `Available`, `CleaningId`) VALUES
(100, 1, 1, 11),
(101, 1, 1, 11),
(102, 1, 1, 11),
(103, 1, 1, 11),
(200, 2, 1, 12),
(201, 2, 0, 12),
(202, 2, 1, 12),
(203, 2, 1, 12),
(300, 3, 0, 13),
(301, 3, 1, 13),
(302, 3, 1, 13),
(303, 3, 1, 13),
(400, 4, 0, 14),
(401, 4, 1, 14),
(402, 4, 1, 14),
(403, 4, 1, 14),
(500, 5, 0, 15),
(501, 5, 1, 15),
(502, 5, 0, 15),
(503, 5, 1, 15),
(600, 6, 1, 16),
(601, 6, 1, 16),
(602, 6, 1, 16),
(603, 6, 1, 16);

-- --------------------------------------------------------

--
-- Structure for view `bookinginfo`
--
DROP TABLE IF EXISTS `bookinginfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bookinginfo`  AS  (select `clients`.`id` AS `id`,`clients`.`Name` AS `Name`,`clients`.`LastName` AS `LastName`,`clients`.`ArrivalDate` AS `ArrivalDate`,`clients`.`DepartureDate` AS `DepartureDate`,(`clients`.`Guests` + `clients`.`Children`) AS `Guests`,`rooms`.`RoomNumber` AS `RoomNumber`,`cleaning`.`id` AS `Cleaning` from ((`clients` join `cleaning`) join `rooms`) where (((`clients`.`Guests` + `clients`.`Children`) <= `rooms`.`BedNumber`) and (`cleaning`.`RoomResponsible` = `rooms`.`RoomNumber`)) limit 1) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `Cleaning`
--
ALTER TABLE `Cleaning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`RoomNumber`),
  ADD KEY `Cleaning` (`CleaningId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT for table `Cleaning`
--
ALTER TABLE `Cleaning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD CONSTRAINT `Cleaning` FOREIGN KEY (`CleaningId`) REFERENCES `Cleaning` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
