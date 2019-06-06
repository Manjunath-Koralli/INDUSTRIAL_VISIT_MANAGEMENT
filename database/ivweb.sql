-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 10:20 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookandpack`
--

CREATE TABLE `bookandpack` (
  `book_id` int(10) NOT NULL,
  `packageid` int(10) NOT NULL,
  `packagename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookandpack`
--

INSERT INTO `bookandpack` (`book_id`, `packageid`, `packagename`) VALUES
(1, 2, 'hello'),
(1, 2, 'hello'),
(29, 26, 'Bangalore package'),
(30, 26, 'Bangalore package'),
(0, 26, 'Bangalore package'),
(31, 26, 'Bangalore package'),
(32, 26, 'Bangalore package'),
(33, 29, 'Bosch');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(20) NOT NULL,
  `personal_id` int(10) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `d_date` date NOT NULL,
  `r_date` date NOT NULL,
  `no_ppl` bigint(30) NOT NULL,
  `add_req` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `personal_id`, `p_name`, `email`, `contact`, `d_date`, `r_date`, `no_ppl`, `add_req`) VALUES
(30, 1, 'Manjunath', 'mskoralli@gmail.com', 9880191001, '2018-11-16', '2018-11-21', 40, 'Non A/C Bus.20 Veg,20 Non Veg.'),
(31, 2, 'Nishmitha', 'nishi@gmail.com', 8197139394, '2018-11-16', '2018-11-21', 40, 'Non A/c Bus.Veg food'),
(32, 2, 'Nishmitha', 'nishi@gmail.com', 8197139394, '2018-11-16', '2018-11-21', 20, 'Non A/C Bus.10 Veg,10 Non Veg.'),
(33, 1, 'Manjunath', 'mskoralli@gmail.com', 9880191001, '2018-01-01', '2018-01-03', 40, 'Non A/c bus');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `f_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`f_id`, `p_id`, `p_name`, `email`, `message`) VALUES
(1, 1, 'Manjunath', 'mskoralli@gmail.com', 'EXCELLENT!!!!'),
(2, 2, 'Nishmitha', 'nishi@gmail.com', 'Excellent!!!The packages and the services provided by the packages are excellent. Affordable..'),
(3, 1, 'Manjunath', 'mskoralli@gmail.com', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `iid` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`iid`, `id`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 26, 'h1.jpg', '2018-11-06 10:39:11', '1'),
(2, 26, 'h2.jpg', '2018-11-06 10:39:11', '1'),
(3, 26, 'h3.jpg', '2018-11-06 10:39:11', '1'),
(4, 27, 'jv1.jpg', '2018-11-18 17:23:51', '1'),
(5, 27, 'jv2.jpg', '2018-11-18 17:23:51', '1'),
(27, 28, 'hal1.png', '2018-11-18 17:57:01', '1'),
(28, 28, 'HAL-2.jpg', '2018-11-18 17:57:01', '1'),
(29, 28, 'hal3.jpg', '2018-11-18 17:57:01', '1'),
(30, 0, 'infosys2.jpg', '2018-11-18 18:06:39', '1'),
(31, 0, 'infosys-mysore-3.jpg', '2018-11-18 18:06:39', '1'),
(32, 0, 'infy-mysore1.jpg', '2018-11-18 18:06:39', '1'),
(33, 0, 'ingy4.jpg', '2018-11-18 18:06:39', '1'),
(34, 0, 'infosys2.jpg', '2018-11-18 18:07:20', '1'),
(35, 0, 'infosys-mysore-3.jpg', '2018-11-18 18:07:20', '1'),
(36, 0, 'infy-mysore1.jpg', '2018-11-18 18:07:20', '1'),
(37, 0, 'ingy4.jpg', '2018-11-18 18:07:20', '1'),
(38, 29, 'bosch1.jpg', '2018-11-22 16:41:00', '1'),
(39, 29, 'bosch2.jpg', '2018-11-22 16:41:00', '1'),
(40, 0, 'infi1.jpg', '2018-11-22 16:49:04', '1'),
(41, 0, 'infi2.jpg', '2018-11-22 16:49:04', '1'),
(42, 30, 'L&T1.jpg', '2018-11-22 17:07:58', '1'),
(43, 30, 'L&T2.jpg', '2018-11-22 17:07:58', '1'),
(44, 31, 'tata1.jpg', '2018-11-22 17:17:16', '1'),
(45, 31, 'tata2.png', '2018-11-22 17:17:16', '1'),
(46, 32, 'cognizant1.jpg', '2018-11-22 17:22:39', '1'),
(47, 32, 'cognizant2.jpg', '2018-11-22 17:22:39', '1');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `p_id` int(10) NOT NULL,
  `pack_name` varchar(20) NOT NULL,
  `powner_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `p_location` varchar(20) NOT NULL,
  `i_locations` varchar(50) NOT NULL,
  `price` bigint(30) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `about` varchar(5000) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`p_id`, `pack_name`, `powner_name`, `email`, `contact`, `address`, `p_location`, `i_locations`, `price`, `duration`, `about`, `status`) VALUES
(26, 'Bangalore package', 'Durgamba Travels', 'durgamabatravels@gmail.com', 9449060917, 'Jyoti', 'Bangalore', 'Madikeri,Mysore', 2500, '4 days,3 nights', '', 0),
(27, 'JVS ELECTRONICS ', 'Durgamba', 'duragamba@gmail.com', 9449060911, 'Jyoti Circle,Mangalore', 'Bangalore', 'Madikeri,Mysore', 2500, '3 days', 'Reliable, Safe & Proven products that are Engineered to perfection is what JVS Electronics offers. Having been in the Electrical Protection Industry for over two decades, JVS has developed and manufactured products that have realized customer delight over the years.\r\n\r\nWith a strong and loyal customer base to boast about, JVS has designed and manufactured products that have been adding great value to businesses.\r\n\r\nStarted in the year 1991 in a small way, when acceptability of Small scale manufacturers to make high end products like relays was a challenge across the globe, JVS established itself by proving its excellence and commitment to inventing and producing products of great quality. JVS has since come a long way and is one of the leading relay manufacturers, supplying products in India and abroad.\r\n\r\n\r\n#121,Manchanayakanahalli, Bangalore Mysore Highway, \r\nBidadi, Ramanagara District - 562 109, Karnataka, India\r\n\r\nTel:+91-80-27204213\r\nbangalore@jvselectronics.in\r\nwww.jvselectronics.in', 0),
(28, 'HAL', 'VRL', 'vrl@gmail.com', 8197139394, 'Near Infosys,Kottara', 'Bangalore', 'Madikeri,Mysore', 3500, '3 days', 'The history and growth of the Hindustan Aeronautics Limited is synonymous with the growth of Aeronautical industry in India for more than 77 years.\r\nThe Company which had its origin as the Hindustan Aircraft Limited was incorporated on 23 Dec 1940 at Bangalore by Shri Walchand Hirachand  a farsighted visionary in association with the Government of Mysore with an Authorised Capital of Rs.4 crores (Paid up capital Rs.40 lakhs) and with the aim of manufacturing aircraft in India. In March 1941, the Government of India became one of the shareholders in the Company holding 1/3 of its paid-up capital and subsequently took over its management in 1942. In collaboration with the Inter Continental Aircraft Company of USA, Hindustan Aircraft Company commenced its business of manufacturing of Harlow Trainer, Curtiss Hawk Fighter and Vultee Bomber Aircraft.\r\n', 1),
(29, 'Bosch', 'Happy Travels ', 'Happyt@gmail.com', 9449991174, 'Chennai', 'Bangalore', 'Vellore,Krishnagiri', 3500, '4days', 'In India, Bosch is a leading supplier of technology and services in the areas of Mobility Solutions, Industrial Technology, Consumer Goods, and Energy and Building Technology. Additionally, Bosch has in India the largest development center outside Germany, for end to end engineering and technology solutions.', 1),
(30, 'Larsen and Toubro', 'Royalty Travels', 'RoyalT@gmail.com', 8112021021, 'Mangalore', 'Chennai', 'Bangalore', 2500, '2days', '\r\nLarsen & Toubro Limited, commonly known as L&T, is one of the largest Indian multi-national firms and leading construction company in India headquartered in Mumbai, Maharashtra, India. It was founded by two Danish engineers taking refuge in India. The company has business interests in engineering, construction, manufacturing goods, information technology, and financial services, and has offices worldwide.', 1),
(31, 'Tata Motors', 'Oasis', 'Oasis31@gmail.com', 8778454489, 'Kerala', 'Mangalore', 'Malavalli,Mysore,Bandipur,Mangalore', 3500, '4days', 'Indian multinational automotive manufacturing company and a member of the Tata Group. Its products include passenger cars, trucks, vans, coaches, buses, sports cars, construction equipment and military vehicles.', 1),
(32, 'Cognizant', 'Travel Right', 'Travelr95@gmail.com', 9880128821, 'Mangalore', 'Bangalore', 'Madikeri,Hassan', 2500, '3days', 'Cognizant is a multinational corporation that provides IT services, including digital, technology, consulting, and operations services.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`p_id`, `p_name`, `email`, `password`, `contact`, `gender`) VALUES
(1, 'Manjunath', 'mskoralli@gmail.com', 'manju', 9880191001, 'Male'),
(2, 'Nishmitha', 'nishi@gmail.com', 'nishi', 8197139394, 'Female'),
(3, 'Manish', 'manish@gmail.com', 'manish', 9449060917, 'Male'),
(4, 'Shreya', 'shreya@gmail.com', 'shreya', 9481764771, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `iid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
