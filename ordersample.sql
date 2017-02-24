-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2017 at 06:58 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordersample`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `orderid`, `name`, `number`, `date`, `time`, `amount`) VALUES
(1, '1236', 'Raj verma', 1234567898, '28 January 2017', '3:00 pm', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `ordermain`
--

CREATE TABLE `ordermain` (
  `id` int(11) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordermain`
--

INSERT INTO `ordermain` (`id`, `orderid`, `status`) VALUES
(1, '1234', 'pickup'),
(2, '1235', 'repair'),
(3, '1236', 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`id`, `orderid`, `name`, `number`, `date`, `time`) VALUES
(1, '1234', 'Raj Verma', '1234567898', '27 January 2017', '3:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `comments` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `orderid`, `time`, `comments`) VALUES
(1, '1235', '3:00 pm', 'Please reach on time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordermain`
--
ALTER TABLE `ordermain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ordermain`
--
ALTER TABLE `ordermain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
