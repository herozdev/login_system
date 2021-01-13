-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 02:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(6) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` varchar(6) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `full_name`, `image`, `role_id`, `is_active`, `date_created`) VALUES
('328076', 'admin1', '$2y$10$fE6GNKkCgjk109AOS8Xps.ZSt1CZgJXeQkyFwtURSOJBfD66WnSsy', 'admin@admin.com', 'Mang Admin', 'default.jpg', 'USR01', 1, 1609997937),
('523917', 'admin', '$2y$10$nTax8gdXvuDKFBmygVRrIukTHC7O3wdhvWF/Clc613Pn9eRmlYuhy', 'herozdevstudio@gmail.com', 'Herotomo Fazry', 'default.jpg', 'USR01', 1, 1605672125),
('970123', 'ekafitriana', '$2y$10$FmXBJ3JiHKw6NHyTVVcO7e56hzCaUTCCLbfUKiEK0P1LHde4aR9Be', 'ekafitriana@gmail.com', 'Eka Fitriana', 'default.jpg', 'USR02', 1, 1606727208);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` varchar(6) NOT NULL,
  `role_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
('USR01', 'Administrator'),
('USR02', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
