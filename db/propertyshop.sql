-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 05:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pwd`) VALUES
('admin@thecarshop.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_appointment`
--

CREATE TABLE `booking_appointment` (
  `booking_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `category_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`category_id`, `category`) VALUES
(1, 'New CAR'),
(2, 'Second Hand'),
(3, 'Branded');

-- --------------------------------------------------------

--
-- Table structure for table `property_img`
--

CREATE TABLE `property_img` (
  `img_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `p_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_img`
--

INSERT INTO `property_img` (`img_id`, `property_id`, `p_img`) VALUES
(1, 1, 'img/P1_1.PNG'),
(2, 2, 'img/P2_2.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `property_master`
--

CREATE TABLE `property_master` (
  `property_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `property_price` int(10) NOT NULL,
  `property_img` varchar(50) NOT NULL,
  `property_area` varchar(20) NOT NULL,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_master`
--

INSERT INTO `property_master` (`property_id`, `category_id`, `property_type`, `address`, `city`, `description`, `property_price`, `property_img`, `property_area`, `type`, `status`, `customer_id`) VALUES
(1, 2, 'VDI', 'Abrama. Valsad', 'Valsad', 'New Car for Shell', 592205, 'img/P1_729.PNG', 'East, Abrama', 0, 1, 0),
(2, 2, 'Second', 'Tithal, valsad', 'valsad', 'secind hand car for shelling', 60000, 'img/P2_510.PNG', 'West, Valsad', 0, 1, 0),
(3, 2, 'new abc', 'sdfjh', 'sdf', 'sdfvg', 1234, 'img/P3_902.PNG', 'df', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`customer_id`, `customer_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`) VALUES
(1, 'machhi', 'valsad', 'valsad', '9876545210', 'machhi@yahoo.com', '111111'),
(2, 'marmik', 'valsad', 'valsad', '8596322370', 'marmik@yahoo.com', '111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `booking_appointment`
--
ALTER TABLE `booking_appointment`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `property_img`
--
ALTER TABLE `property_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `property_master`
--
ALTER TABLE `property_master`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
