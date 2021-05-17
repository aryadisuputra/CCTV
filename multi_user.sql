-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 05:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_room_tl`
--

CREATE TABLE `list_room_tl` (
  `id` int(100) NOT NULL,
  `id_origin` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `tl_name` varchar(500) NOT NULL,
  `meeting_id` bigint(255) NOT NULL,
  `meeting_password` text NOT NULL,
  `owner` varchar(500) NOT NULL,
  `create_at` text NOT NULL,
  `update_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_room_tl`
--

INSERT INTO `list_room_tl` (`id`, `id_origin`, `name`, `tl_name`, `meeting_id`, `meeting_password`, `owner`, `create_at`, `update_at`) VALUES
(3, 0, 'a', '2', 0, '', '', '', ''),
(4, 0, 'test', 'tlc1', 0, '', 'tlc1', '', ''),
(6, 0, 'a', 'admin', 2147483647, 'dWVJMWhMMDBOZU9SVWtwYk5ISkZvUT09', 'admin', '2021-04-21', '2021-04-21'),
(26, 0, 'test', 'tl1', 2147483647, 'K2hZYXB3WnQxcURhVVpxQkNBQmxlZz09', 'admin2', '2021-04-26', '2021-04-26'),
(27, 0, 'a', 'tl1', 2147483647, 'ZVhyclZxc2VvcllreUZ3ejlVSWdUdz09', 'admin2', '2021-04-26', '2021-04-26'),
(32, 14, 'test', 'tl1', 2147483647, 'alZUa1U2ZkZ3L1BCK0FyQkxiaWtsdz09', 'admin2', '2021-04-26', '2021-04-26'),
(34, 13, 'a', 'tl1', 2147483647, 'T1R3ckVVOUdJVklSMys1NTI2ZUFtdz09', 'admin2', '2021-04-28', '2021-04-28'),
(35, 24, 'ab', 'tl1', 2147483647, 'Q0hCRUJObTQ3dExjYzBZQ25PVktOUT09', 'admin2', '2021-04-28', '2021-04-28'),
(40, 27, 'Coba Coba Coba', 'tl1', 2147483647, 'SGxaV0U5bHRHejlCNDdDbmIwUCsrdz09', 'admin2', '2021-04-29', '2021-04-29'),
(43, 28, 'Coba 29 April 2021', 'tl1', 73997501383, 'SmdESFFmMzk3OFJ5TnFVMmQzYXFXUT09', 'admin2', '2021-04-29', '2021-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `list_room_tlc`
--

CREATE TABLE `list_room_tlc` (
  `id` int(11) NOT NULL,
  `id_origin` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `tl_name` varchar(500) NOT NULL,
  `owner` varchar(500) NOT NULL,
  `create_at` text NOT NULL,
  `update_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_room_tlc`
--

INSERT INTO `list_room_tlc` (`id`, `id_origin`, `name`, `tl_name`, `owner`, `create_at`, `update_at`) VALUES
(5, 0, 'a', '1', 'admin', '', ''),
(7, 0, '22', '2', '', '', ''),
(8, 0, 'a', '213132', '', '', ''),
(9, 0, '1', '2', '', '', ''),
(10, 0, '1', '2', '', '', ''),
(11, 0, 'test', 'admin', '', '2021-04-20', '2021-04-20'),
(12, 0, 'adminaa', 'tlc1', 'admin', '2021-04-20', '2021-04-20'),
(24, 0, 'test2', 'tlc1', 'admin2', '2021-04-28', '2021-04-28'),
(28, 0, 'COBA COBA COBA', 'tlc1', 'admin2', '2021-04-29', '2021-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `supervisor` varchar(500) NOT NULL,
  `team_leader` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `uid_zoom` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `supervisor`, `team_leader`, `status`, `uid_zoom`) VALUES
(1, 'Malas Ngoding', 'malasngoding', 'malasngoding123', 'admin', '', '', '', ''),
(2, 'Diki Alfarabi Hadi', 'diki', 'diki123', 'staff', '', 'admin2', '', ''),
(3, 'Jamaludin', 'jamaludin', 'jamaludin123', 'pengurus', '', '', '', ''),
(4, 'tlc1', 'tlc1', '123', 'tlc', 'tlc1', 'tlc1', '', ''),
(5, 'adminab', 'admin', '123', 'admin', '', '', '', 'a'),
(6, 'admin2', 'admin2', '123', 'Admin', '', '', 'Pending', 'pVUInY2KSs-rZz41D1zCTg'),
(7, 'tl1', 'tl1', '123', 'TL', 'tlc1', 'tlc1', 'Pending', 'pVUInY2KSs-rZz41D1zCTg'),
(8, 'staff1', 'username1', '', 'Staff', 'admin2', 'admin2', 'Pending', ''),
(9, 'staff2', 'username2', '', 'Staff', 'tl1', 'admin2', 'Pending', ''),
(10, 'staff3', 'staff3', '', 'Staff', 'jamaludin', 'tlc1', '', ''),
(11, 'staff4', 'staff4', '', 'Staff', 'admin2', 'admin2', 'Pending', '1'),
(12, 'staff5', 'staff5', '', 'Staff', 'staff3', 'admin2', 'Pending', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_room_tl`
--
ALTER TABLE `list_room_tl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_room_tlc`
--
ALTER TABLE `list_room_tlc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_room_tl`
--
ALTER TABLE `list_room_tl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `list_room_tlc`
--
ALTER TABLE `list_room_tlc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
