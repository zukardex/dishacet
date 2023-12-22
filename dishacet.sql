-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 08:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishacet`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `eventid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phn` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `useragent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`eventid`, `name`, `phn`, `password`, `ip`, `useragent`) VALUES
('', 'name', 'phn', 'password', '::1', 'Mozilla/5.0');

-- --------------------------------------------------------

--
-- Table structure for table `deptpoints`
--

CREATE TABLE `deptpoints` (
  `Name` varchar(64) NOT NULL,
  `points` int(32) NOT NULL,
  `updatedTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deptpoints`
--

INSERT INTO `deptpoints` (`Name`, `points`, `updatedTime`) VALUES
('cs', 0, '2023-12-18 20:36:00'),
('ec', 0, '2023-12-18 20:36:12'),
('ar', 0, '2023-12-18 20:36:27'),
('me', 0, '2023-12-18 20:37:28'),
('ie', 0, '2023-12-18 20:37:36'),
('ee', 0, '2023-12-18 20:39:03'),
('ce', 0, '2023-12-18 20:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `participants` longtext DEFAULT NULL,
  `winners` mediumtext DEFAULT NULL,
  `groupEvent` int(11) DEFAULT NULL,
  `coordinators` longtext DEFAULT NULL,
  `phn` varchar(32) DEFAULT NULL,
  `dept` varchar(32) DEFAULT NULL,
  `ar` int(11) DEFAULT 0,
  `ce` int(11) DEFAULT 0,
  `cs` int(11) DEFAULT 0,
  `ec` int(11) DEFAULT 0,
  `ee` int(11) DEFAULT 0,
  `ie` int(11) DEFAULT 0,
  `me` int(11) DEFAULT 0,
  `approval` int(11) NOT NULL DEFAULT 0,
  `entryTime` timestamp(6) NULL DEFAULT NULL COMMENT 'time at which coordinators declared the winners'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `participants`, `winners`, `groupEvent`, `coordinators`, `phn`, `dept`, `ar`, `ce`, `cs`, `ec`, `ee`, `ie`, `me`, `approval`, `entryTime`) VALUES
('', 'cricket', 'arjuns, arjun k, heamanthnp, jonahs m', 'Sachin, Josh, evan', 1, 'Jewel', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '2023-12-22 00:00:08.000000'),
(NULL, 'skit', 'aparna, anu', 'Arjun, Hashim, Abin', 1, 'Aparna', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '2023-12-22 14:33:38.000000');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `name` varchar(64) NOT NULL,
  `dept` varchar(32) NOT NULL,
  `admn` int(12) NOT NULL,
  `phn` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`name`, `dept`, `admn`, `phn`, `email`) VALUES
('name', 'ae', 23, '220', 'email');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
