-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2018 at 02:13 PM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technely_pepper`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `cre_id` int(11) NOT NULL,
  `cus_id` int(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` double NOT NULL,
  `discription` varchar(250) NOT NULL,
  `dis_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `area`, `gender`, `city`, `address`, `date`) VALUES
(6, 'Albin', '8281791932', 'Tdpa', 'Male', 'Tdpa', '', '2018-06-06 14:10:35.957102'),
(7, 'Bonny', '9847070268', '', 'Male', '', '', '2018-06-06 14:11:27.521387'),
(9, 'Riya', '888009697', '', 'Female', '', '', '2018-06-06 14:23:55.636664'),
(10, 'Bennita', '6454689', '', 'Male', '', '', '2018-06-06 14:24:58.719776'),
(11, 'Alshoja', '8281389092', '', 'Male', '', '', '2018-06-06 14:28:37.750478'),
(15, 'Alsu', '122334', '', 'Female', '', '', '2018-06-07 03:33:22.553544');

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `deb_id` int(11) NOT NULL,
  `cus_id` int(250) NOT NULL,
  `amount` double NOT NULL,
  `discription` varchar(250) NOT NULL,
  `category_id` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `dis_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`deb_id`, `cus_id`, `amount`, `discription`, `category_id`, `date`, `dis_cat`) VALUES
(1, 6, 27, '', 'Dinner', '2018-06-06', 'badge-gradient-warning'),
(2, 7, 27, '', '', '2018-06-06', 'badge-gradient-warning'),
(3, 9, 70, '', '', '2018-06-06', 'badge-gradient-warning'),
(4, 10, 70, '', '', '2018-06-06', 'badge-gradient-warning'),
(5, 11, 80, '', 'Dinner', '2018-06-06', 'badge-gradient-warning'),
(9, 9, 24, '', 'Break Fast', '2018-06-07', 'badge-gradient-warning'),
(10, 10, 24, '', 'Break Fast', '2018-06-07', 'badge-gradient-warning'),
(11, 15, 24, '', 'Break Fast', '2018-06-07', 'badge-gradient-warning'),
(12, 9, 20, '', 'Meals', '2018-06-07', 'badge-gradient-warning'),
(13, 10, 20, '', 'Meals', '2018-06-07', 'badge-gradient-warning'),
(14, 10, 20, '', 'Meals', '2018-06-07', 'badge-gradient-warning'),
(15, 9, 40, '', '', '2018-06-10', 'badge-gradient-warning'),
(16, 9, 50, '', '', '2018-06-10', 'badge-gradient-warning');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `items` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `hash_key` varchar(200) NOT NULL,
  `account_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `created`, `modified`, `status`, `hash_key`, `account_status`) VALUES
(1, 'Alshoja', '5dbf827257fd79cd2e8a34ca1926584d', 'alshoja@gmail.com', '2018-06-01 00:00:00', '2018-06-01 00:00:00', 1, '', 'Admin'),
(2, 'Arun', '722279e9e630b3e731464b69968ea4b4', 'aruns@gmail.com', '2018-06-01 00:00:00', '2018-06-01 00:00:00', 1, '', 'Resturant Manager'),
(3, 'Abhijith', 'a5fc25a96b815cc9a26cee92ef9069e9', 'abhijith@gmail.com', '2018-06-01 00:00:00', '2018-06-01 00:00:00', 1, '', 'Resturant Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`cre_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`deb_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `cre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `deb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
