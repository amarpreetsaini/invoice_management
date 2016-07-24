-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2016 at 09:37 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `component_invoices`
--

CREATE TABLE `component_invoices` (
  `invoice_id` int(200) NOT NULL,
  `in_date` date NOT NULL,
  `in_challan_no` varchar(200) NOT NULL,
  `component` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `in_numbers` varchar(200) NOT NULL,
  `out_challan_no` varchar(200) NOT NULL,
  `out_date` date NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `rejection` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component_invoices`
--

INSERT INTO `component_invoices` (`invoice_id`, `in_date`, `in_challan_no`, `component`, `weight`, `in_numbers`, `out_challan_no`, `out_date`, `quantity`, `balance`, `rejection`) VALUES
(1, '2016-05-10', 'CH-12', 'ALM S.H.B.', '23', '2', 'df233', '2016-05-18', '2', '23', '0'),
(2, '2016-07-09', 'WA-12', 'ALM S.H.B.', '23', '44', 'df233', '2016-05-18', '2', '23', '1111'),
(3, '2016-05-10', 'WA-122', 'ALM S.H.B.', '23', '44', 'df', '2016-05-18', '234', '234', '23'),
(4, '2016-05-01', '5781', 'ALM Cover Head', '234', '440', '102', '2016-05-18', '2', '23', '23'),
(5, '2016-07-28', 'CH-12', 'S.S.Coil', '123', '88', '32', '2016-07-17', '123', '32', '2');

-- --------------------------------------------------------

--
-- Table structure for table `lid_invoices`
--

CREATE TABLE `lid_invoices` (
  `lid_invoice_id` int(200) NOT NULL,
  `in_date` date NOT NULL,
  `in_challan_no` varchar(200) NOT NULL,
  `artical` varchar(200) NOT NULL,
  `outgoing` varchar(200) NOT NULL,
  `out_challan_no` varchar(200) NOT NULL,
  `out_date` date NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `rejection` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lid_invoices`
--

INSERT INTO `lid_invoices` (`lid_invoice_id`, `in_date`, `in_challan_no`, `artical`, `outgoing`, `out_challan_no`, `out_date`, `quantity`, `balance`, `rejection`) VALUES
(1, '2016-05-10', 'AB-11', 'MissMarry mini', '23', '323', '2016-06-08', '234', '23', '23'),
(2, '2016-05-10', 'AB-10', 'Hawkins Baby', '23', '323', '2016-06-08', '234', '23', '23'),
(3, '2016-05-10', 'Absdf23aj', 'None', '23', '323', '2016-06-08', '2', '23', '9'),
(4, '2016-06-11', '602315', 'Hawkins STD', '200', '5781', '2016-06-11', '400', '200', '0'),
(5, '2016-06-01', '602316', 'MissMarry mini', '300', '54334', '2016-06-11', '500', '200', '0'),
(7, '2016-05-10', '602312', 'Futurua', '320', '65023', '2016-06-11', '400', '80', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `component_invoices`
--
ALTER TABLE `component_invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `lid_invoices`
--
ALTER TABLE `lid_invoices`
  ADD PRIMARY KEY (`lid_invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `component_invoices`
--
ALTER TABLE `component_invoices`
  MODIFY `invoice_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lid_invoices`
--
ALTER TABLE `lid_invoices`
  MODIFY `lid_invoice_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
