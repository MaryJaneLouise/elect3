-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 09:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentrecord_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentrecord_tbl`
--

CREATE TABLE `studentrecord_tbl` (
  `id` int(11) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `prelim` decimal(11,2) DEFAULT NULL,
  `midterm` decimal(11,2) DEFAULT NULL,
  `finals` decimal(11,2) DEFAULT NULL,
  `final_grade` decimal(11,2) GENERATED ALWAYS AS ((`prelim` + `midterm` + `finals`) / 3) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentrecord_tbl`
--

INSERT INTO `studentrecord_tbl` (`id`, `last_name`, `first_name`, `prelim`, `midterm`, `finals`) VALUES
(15, 'Gueco', 'Kathleen', 97.00, 92.21, 95.00),
(16, 'Ople', 'Bea', 92.32, 95.00, 73.00),
(17, 'Pama', 'Kevin', 90.00, 90.22, 85.00),
(18, 'Bituin', 'Patrick', 88.25, 89.00, 86.00),
(19, 'Sagcal', 'Renato', 89.00, 92.56, 98.00),
(20, 'Bondoc', 'Andrew', 76.00, 74.00, 96.00),
(21, 'Yco', 'Justin', 73.00, 72.00, 90.00),
(22, 'Diaz', 'Jericho', 99.00, 98.00, 97.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentrecord_tbl`
--
ALTER TABLE `studentrecord_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentrecord_tbl`
--
ALTER TABLE `studentrecord_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
