-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2016 at 09:31 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitop_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `latitude`, `longitude`) VALUES
(3, 'Sta Rosa', '0.9999999999', '0.9999999999'),
(4, 'Sta Mesa', '0.9999999999', '0.9999999999'),
(5, 'Surigao', '0.9999999999', '0.9999999999'),
(6, 'Sta Mesa', '0.9999999999', '0.9999999999'),
(7, 'Sups', '-0.9999999999', '-0.9999999999'),
(8, 'Sian', '0.9999999999', '0.9999999999'),
(9, 'Sian', '0.9999999999', '0.9999999999');

-- --------------------------------------------------------

--
-- Table structure for table `km_price`
--

CREATE TABLE `km_price` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `km_price`
--

INSERT INTO `km_price` (`id`, `price`) VALUES
(1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `main_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`main_id`, `parent_id`, `location`, `latitude`, `longitude`) VALUES
(1, 0, 'SURIGAO', '9.7571', '125.5138'),
(2, 0, 'ROMBLON', '12.5778', '122.2691'),
(3, 0, 'ILOILO', '10.7202', '122.5621'),
(4, 0, 'CEBU', '10.3157', '123.8854'),
(5, 0, 'LAGUNA', '14.1407', '121.4692'),
(6, 1, 'DAPA', '9.7518', '126.0676'),
(7, 1, 'GENERAL LUNA', '9.7786', '126.1545'),
(8, 1, 'DEL CARMEN', '9.8750', '125.9806'),
(9, 1, 'PILAR', '9.8643', '126.0676'),
(10, 1, 'SOCORRO', '9.6176', '125.9370'),
(11, 2, 'SAN FERNANDO', '12.3267', '122.6051'),
(12, 2, 'LOOC', '12.2554', '122.0042'),
(13, 2, 'FERROL', '12.3216', '121.9587'),
(14, 2, 'BANTON', '12.9516', '122.0724'),
(15, 2, 'MAGDIWANG', '12.4674', '122.5260'),
(16, 3, 'PASSI CITY', '11.1688', '122.6504'),
(17, 3, 'ILOILO', '10.7202', '122.5621'),
(18, 3, 'CARLES', '11.5688', '123.2363'),
(19, 4, 'DANAO CITY', '10.5417', '123.9527'),
(20, 4, 'LAPU-LAPU', '10.2662', '123.9973'),
(21, 4, 'MANDAUE CITY', '10.3403', '123.9416'),
(22, 4, 'PORO', '10.7017', '124.4162'),
(23, 5, 'SANTA ROSA CITY', '14.2843', '121.0889'),
(24, 5, 'CALAMBA CITY', '14.1877', '121.1251'),
(25, 5, 'RIZAL', '14.0841', '121.4113'),
(37, 6, 'CABAWA', '', ''),
(38, 6, 'CAMBAS-AC', '', ''),
(40, 6, 'OSMEÃ±A', '', ''),
(41, 7, 'SANTA FE', '', ''),
(42, 7, 'SUYANGAN', '', ''),
(43, 7, 'LIBERTAD', '', ''),
(44, 7, 'DAKU', '', ''),
(45, 8, 'ANTIPOLO', '', ''),
(46, 8, 'CABUGAO', '', ''),
(47, 8, 'CANCOHOY', '', ''),
(48, 9, 'CARIDAD', '', ''),
(49, 9, 'SALVACION', '', ''),
(51, 10, 'DEL PILAR', '', ''),
(52, 10, 'HONRADO', '', ''),
(53, 10, 'SERING', '', ''),
(54, 11, 'CAMPALINGO', '', ''),
(55, 11, 'CANJALON', '', ''),
(56, 11, 'TACLOBO', '', ''),
(57, 12, 'AGOJO', '', ''),
(58, 12, 'BALATUCAN', '', ''),
(59, 12, 'BUENAVISTA', '', ''),
(60, 13, 'AGNONOC', '', ''),
(61, 13, 'BUNSORAN', '', ''),
(62, 13, 'CLARO M. RECTO', '', ''),
(63, 14, 'BALOGO', '', ''),
(64, 14, 'BANICE', '', ''),
(65, 14, 'LAGANG', '', ''),
(66, 15, 'AGSAO', '', ''),
(67, 15, 'AGUTAY', '', ''),
(68, 15, 'AMBULONG', '', ''),
(69, 16, 'AGDAHON', '', ''),
(70, 16, 'AGDAYAO', '', ''),
(71, 16, 'AGLALANA', '', ''),
(72, 17, 'ABETO MIRASOL TAFT SOUTH', '', ''),
(73, 17, 'AIRPORT', '', ''),
(74, 17, 'ARGUELLES', '', ''),
(75, 18, 'ABONG', '', ''),
(76, 18, 'ALIPATA', '', ''),
(77, 18, 'BANCAL', '', ''),
(78, 19, 'BALIANG', '', ''),
(79, 19, 'BAYABAS', '', ''),
(80, 19, 'BINALIW', '', ''),
(81, 20, 'BABAG', '', ''),
(82, 20, 'BANKAL', '', ''),
(83, 21, 'ALANG-ALANG', '', ''),
(84, 21, 'BAKILID', '', ''),
(85, 21, 'BANILAD', '', ''),
(86, 22, 'ADELA', '', ''),
(87, 22, 'ALTAVISTA', '', ''),
(88, 22, 'CAGCAGAN', '', ''),
(89, 23, 'APLAYA', '', ''),
(90, 23, 'BALIBAGO', '', ''),
(91, 23, 'CAINGIN', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `km_price`
--
ALTER TABLE `km_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`main_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `km_price`
--
ALTER TABLE `km_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `main_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
