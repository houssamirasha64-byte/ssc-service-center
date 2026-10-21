-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 12:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `fault_description` varchar(50) NOT NULL,
  `received_date` varchar(50) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `customer_name`, `model`, `serial_number`, `fault_description`, `received_date`, `delivery_date`, `status`) VALUES
(9, 'Test Customer 1', 'SUNON PRO 3.5 KW', 'SN-1001', 'F55', '24-11-2025 at 11:45 am', '24-11-2025 at 11:54 am', 'Delivered'),
(10, 'Test Customer 2', 'SUNON PRO 3.5 KW', 'SN-1002', 'Electrical', '24-11-2025 at 12:15 pm', '-', 'Pending Repair'),
(11, 'Test Customer 3', 'SUNON PRO 3.5 KW', 'SN-1003', 'Lightning', '24-11-2025 at 12:15 pm', '-', 'Repaired'),
(12, 'Test Customer 4', 'SUNON PLUS 5.5 KW', 'SN-1004', 'Shock', '24-11-2025 at 12:16 pm', '-', 'Pending Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'demo_admin', '$2y$12$HLNJGrAYiemtRqIRHlSPO.rJAsHPVnCgyIknGxnwk.3bttwma8R2.', 'admin'),
(8, 'demo_admin2', '$2y$12$HLNJGrAYiemtRqIRHlSPO.rJAsHPVnCgyIknGxnwk.3bttwma8R2.', 'admin'),
(9, 'demo_staff', '$2y$12$HLNJGrAYiemtRqIRHlSPO.rJAsHPVnCgyIknGxnwk.3bttwma8R2.', 'normal'),
(10, 'demo_staff2', '$2y$12$HLNJGrAYiemtRqIRHlSPO.rJAsHPVnCgyIknGxnwk.3bttwma8R2.', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
