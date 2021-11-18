-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 02:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savearns`
--

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `id` int(11) NOT NULL,
  `usname` text NOT NULL,
  `sn` text NOT NULL,
  `status` text NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL,
  `ticket` text NOT NULL,
  `sbj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(11) NOT NULL,
  `usname` text NOT NULL,
  `datepaid` text NOT NULL,
  `plan` text NOT NULL,
  `duration` text NOT NULL,
  `amt` text NOT NULL,
  `status` text NOT NULL,
  `descrip` text NOT NULL,
  `mode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_his`
--

CREATE TABLE `t_his` (
  `id` int(11) NOT NULL,
  `t_ref` text NOT NULL,
  `amt` text NOT NULL,
  `datepaid` datetime NOT NULL,
  `username` text NOT NULL,
  `sn` text NOT NULL,
  `status` text NOT NULL,
  `paynote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `sn` text NOT NULL,
  `fname` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  `usname` text NOT NULL,
  `pword` text NOT NULL,
  `ref` text NOT NULL,
  `activator` text NOT NULL,
  `active` text NOT NULL,
  `datereg` datetime NOT NULL,
  `lastseen` datetime NOT NULL,
  `tpin` text NOT NULL,
  `inst` text NOT NULL,
  `dept` text NOT NULL,
  `level` text NOT NULL,
  `matric` text NOT NULL,
  `bname` text NOT NULL,
  `bact` text NOT NULL,
  `actname` text NOT NULL,
  `gend` text NOT NULL,
  `wallet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_his`
--
ALTER TABLE `t_his`
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
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_his`
--
ALTER TABLE `t_his`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
