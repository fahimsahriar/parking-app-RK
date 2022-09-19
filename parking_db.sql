-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 10:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `active`
--

CREATE TABLE `active` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(20) NOT NULL,
  `space` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `active`
--

INSERT INTO `active` (`id`, `date`, `location`, `space`, `username`) VALUES
(45, '2022-09-18 20:27:53', 'Notun Bazar ', 4, 'ppp ');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `space` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `customer` varchar(20) NOT NULL,
  `customer_review` int(11) NOT NULL,
  `renter` varchar(20) NOT NULL,
  `renter_review` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `complete` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `accept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `location`, `space`, `day`, `hour`, `cost`, `customer`, `customer_review`, `renter`, `renter_review`, `date`, `complete`, `payment`, `accept`) VALUES
(89, 'Notun Bazar', 1, 1, 1, 1000, 'ccc', 0, 'ppp ', 0, '2022-09-18 20:27:53', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Garage 1', 'Kalabagan, 2nd lane, Dhaka.', 23.747986, 90.381645, 'restaurant'),
(2, 'Garage 2', 'Dhanmondi 12, Dhaka.', 23.752506, 90.374931, 'bar'),
(3, 'Garage 3', 'Panthopath, Dhaka.', 23.751928, 90.379143, 'bar'),
(4, 'Garage 4', 'Shahjadpur School, Dhaka.', 23.794476, 90.423615, 'bar'),
(5, 'Garage 5', 'Baridhara J Block, Dhaka.', 23.799389, 90.423477, 'bar'),
(6, 'Garage 6', 'Dutabash Road, Dhaka.', 23.797892, 90.419380, 'restaurant'),
(7, 'Garage 7', 'Banani, Dhaka', 23.794146, 90.401764, 'restaurant'),
(8, 'Garage 8', 'Road 44, Gulshan, Dhaka.', 23.791584, 90.413376, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `username` varchar(20) NOT NULL,
  `role1` int(11) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `rating` float NOT NULL,
  `pass` varchar(20) NOT NULL,
  `NID` int(11) NOT NULL,
  `Car_Name` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `Registrations_NO` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`username`, `role1`, `fullName`, `phone`, `rating`, `pass`, `NID`, `Car_Name`, `Model`, `Registrations_NO`, `address`) VALUES
('ccc', 2, 'Fahim Sahriar', '01723265289', 4, '123', 101652827, 'BMW', 'x1', '12323232', 'Saidnagar B Block, Vatara, Dhaka'),
('ppp', 1, 'Tasmin Reza', '01303233888', 4, '123', 2134242342, '', '', '', 'Projapoti Garden, Satarkul, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonBooked` (`renter`),
  ADD KEY `FK_PersonWhoBooked` (`customer`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_message_ref` (`booking_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active`
--
ALTER TABLE `active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_PersonBooked` FOREIGN KEY (`renter`) REFERENCES `user_detail` (`username`),
  ADD CONSTRAINT `FK_PersonWhoBooked` FOREIGN KEY (`customer`) REFERENCES `user_detail` (`username`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_message_ref` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
