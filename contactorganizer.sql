-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 04:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midterm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactorganizer`
--

CREATE TABLE `contactorganizer` (
  `userID` int(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileNum` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactorganizer`
--

INSERT INTO `contactorganizer` (`userID`, `firstName`, `lastName`, `sex`, `address`, `mobileNum`, `email`, `image`) VALUES
(2, 'Bethy', 'Bagcal', 'Female', 'San Vicente', 97483647, 'bethbagcal@gmail.com', 'second.png'),
(3, 'Menang', 'Vicencio', 'Female', 'Natividad', 9463154, 'menang@gmail.com', 'third.jpg'),
(9, 'Lyra', 'Vicencio', 'Female', 'Manaoag', 97463734, 'lyrsrmnt@gmail.comm', 'first.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactorganizer`
--
ALTER TABLE `contactorganizer`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactorganizer`
--
ALTER TABLE `contactorganizer`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
